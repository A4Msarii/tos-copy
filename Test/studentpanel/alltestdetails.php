<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');


?>
<!DOCTYPE html>
<html>

<head>
  <title>Test Dashboard</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/test.png">

  
</head>

<body>
  <?php 
  include (ROOT_PATH. 'Test/ts_loader.php');
  ?>
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-secondary">All Test Details</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->
    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">
      <div class="row justify-content-center">
        <div class="col-lg-12 mb-3 mb-lg-5">
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
              <div class="col-lg-12 col-md-8 col-12">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="mb-3 mb-lg-0" style="float:left;">
                <h3 class="mb-1">My Test Attempt</h3>
               
              </div>
              <div style="float:right;">
                <label for="monthFilter">Filter by Month:</label>
                  <select id="monthFilter">
                    <option value="all">All Months</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                    <!-- Add more months as needed -->
                  </select>

                  <label for="result-filter">Filter by Result:</label>
  <select id="result-filter">
    <option value="all">All</option>
    <option value="Pass">Pass</option>
    <option value="Fail">Fail</option>
    <option value="Pending">Pending</option>
  </select>
              </div>

            </div>
            <!-- table -->
            <div class="table-responsive">

              <table class="table text-nowrap text-lg-wrap table-hover table-centered">
                <thead class="table-light">
                  <tr>
                    <th>Test Info</th>
                    <th>Questions</th>
                    <th>Correct</th>
                    <th>Incorrect</th>
                    <th>Marks</th>
                    <th>Result</th>
                    <th>Review</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $exam_name2=""; $time12="";
                   $queryss = "SELECT * FROM test_updates WHERE user_id = '$user_id' and status_end='1' group by exam_id order by id DESC LIMIT 5";
                   $resultss = $connect->query($queryss);
         
                   if ($resultss) {
                       foreach ($resultss as $rowss) {
                        $corret="";$marks_got="";
                        $exam_ides=$rowss['exam_id'];
                        $q4 = "SELECT * FROM examname WHERE id = '$exam_ides'";
                        $st4 = $connect->prepare($q4);
                        $st4->execute();
       
                        if ($st4->rowCount() > 0) {
                          $re4 = $st4->fetchAll();
                          foreach ($re4 as $row) {
                         $exam_namesd = $row['examName'];
                        $questionNumberes = $row['questionNumber'];
                        
                        $date_exams = $row['dates'];
                        $exam_result = $row['result_hide_show'];
                        $time24 = $row['start_hours'];
                        $time12 = convertTo12HourFormat($time24);
                        $exam_Types = $row['exam_Types'];
                        if($row['course_id']==""){
                          $exam_name2=$row['examName'];
                        }else{
                          $exam_name1=$row['examName'];
                          $fetch_exam_name = $connect->query("SELECT shorttest FROM test WHERE id = '$exam_name1'");
                          $exam_name2 = $fetch_exam_name->fetchColumn();
                        }
                          }
                        }
                    
                       if($exam_Types=="once"){
                          $corret=$rowss['correct_answer'];
                          $marks_got=$rowss['marks_got'];
                          $re_id=$rowss['repeat_id'];
                          $exam_status=$rowss['exam_status'];
                      
                        $wrong_an=$questionNumberes-$corret;
                  ?>
                  <tr>
                    <td>
                      <div>
                        <a href="#">
                          <h5 class="mb-1"><?php echo $exam_name2?></h5>
                        </a>
                        <small><?php echo $date_exams." "; ?><?php echo $time12; ?></small>
                      </div>
                    </td>
                    <td><?php echo $questionNumberes; ?></td>
                    <td><?php 
         
                    echo $corret;
                     ?></td>
                    <td><?php 
                     
                    echo $wrong_an;
                       ?></td>
                    <td><?php echo $marks_got; ?></td>
                    <td><?php if($exam_status=="failed"){ ?><span class="badge bg-soft-danger text-danger">Fail</span>
                    <?php }else{?>

                      <span class="badge bg-soft-success text-success">Pass</span>
                    <?php } ?>
                    </td>
                    <td>
                  <?php   if($exam_result=="show"){ ?>
                      <a href="<?php echo BASE_URL;?>Test/studentpanel/checkanswer.php?id=<?php echo $rowss['exam_id']; ?>&r_id=<?php echo $re_id;?>">View</a>
                    
                  <?php }else{
                    echo "-";
                    } ?>
                    </td>
                  </tr>
                  
                <?php }else{
                     $exam_status_f = $connect->query("SELECT `exam_status` FROM test_updates WHERE exam_id = '$exam_ides' and user_id='$user_id' and exam_status='pass'");
                     $exam_status = $exam_status_f->fetchColumn();
                     if($exam_status=="pass"){
                     $corret_f = $connect->query("SELECT `correct_answer` FROM test_updates WHERE exam_id = '$exam_ides' and user_id='$user_id' and exam_status='pass'");
                     $corret = $corret_f->fetchColumn();
                     $marks_got_f = $connect->query("SELECT `marks_got` FROM test_updates WHERE exam_id = '$exam_ides' and user_id='$user_id' and exam_status='pass'");
                     $marks_got = $marks_got_f->fetchColumn();
                     $re_id_f = $connect->query("SELECT `repeat_id` FROM test_updates WHERE exam_id = '$exam_ides' and user_id='$user_id' and exam_status='pass'");
                     $re_id = $re_id_f->fetchColumn();
                  
                     $wrong_an=$questionNumberes-$corret;
                  
                     ?>
                     <tr>
                    <td>
                      <div>
                        <a href="#">
                          <h5 class="mb-1"><?php echo $exam_name2?></h5>
                        </a>
                        <small><?php echo $date_exams." "; ?><?php echo $time12; ?></small>
                      </div>
                    </td>
                    <td><?php echo $questionNumberes; ?></td>
                    <td><?php 
                  
                    echo $corret;
                     ?></td>
                    <td><?php 
                   
                    echo $wrong_an;
                       ?></td>
                    <td><?php echo $marks_got; ?></td>
                    <td><?php if($exam_status=="failed"){ ?><span class="badge bg-soft-danger text-danger">Fail</span>
                    <?php }else{?>

                      <span class="badge bg-soft-success text-success">Pass</span>
                    <?php } ?>
                    </td>
                    <td>
                  <?php   if($exam_result=="show"){ ?>
                      <a href="<?php echo BASE_URL;?>Test/studentpanel/checkanswer.php?id=<?php echo $rowss['exam_id']; ?>&r_id=<?php echo $re_id;?>">View</a>
                    
                  <?php }else{
                    echo "-";
                    } ?>
                    </td>
                  </tr>
                     <?php 

                }
                      
                }}
              }?>
                 </tbody>
              </table>

            </div>

          </div>
        </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </main>

  <?php 
function convertTo12HourFormat($time24) {
  // Create a DateTime object from the 24-hour format time
  $dateTime = DateTime::createFromFormat('H:i', $time24);
  
  // Format the DateTime object in 12-hour format with 'am' or 'pm'
  $time12 = $dateTime->format('h:i a');
  
  return $time12;
}
?>
<script>
$(document).ready(function() {
  // Add change event listener to the select element
  $('#monthFilter').on('change', function() {
    var selectedMonth = $(this).val();
    console.log("Selected Month:", selectedMonth); // Debugging line

    // Show all rows by default
    $('table tbody tr').show();

    // Filter rows based on the selected month
    if (selectedMonth !== 'all') {
      $('table tbody tr').each(function() {
        var rowSmallText = $(this).find('small').text();
        var rowDate = new Date(rowSmallText); // Convert the text to a Date object
        var rowMonth = (rowDate.getMonth() + 1).toString().padStart(2, '0'); // Extract the month and format as "MM"
        console.log("Row Month:", rowMonth); // Debugging line
        if (rowMonth !== selectedMonth) {
          $(this).hide();
        }
      });
    }
  });
});
</script>

<script>
  $(document).ready(function () {
    $("#result-filter").change(function () {
      var selectedOption = $(this).val();

      // Show all rows initially
      $("tbody tr").show();

      // Filter rows based on the selected option
      if (selectedOption !== "all") {
        $("tbody tr").each(function () {
          var resultText = $(this).find("td:eq(5) .badge").text();
          if (resultText.toLowerCase() !== selectedOption.toLowerCase()) {
            $(this).hide();
          }
        });
      }
    });
  });
</script>







  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>


</html>