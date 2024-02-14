<?php
include('../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

?>
<!DOCTYPE html>
<html>

<head>
  <title>Test</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/test.png">

<style type="text/css">
  .col-md-3:hover
  {
    background-color: #71869d47 !important;
  }
  /* Style the span elements */
span.badge {
  max-width: 100%; /* Set the maximum width to 100% of the parent container */
  white-space: nowrap; /* Prevent text from wrapping to a new line */
  overflow: hidden; /* Hide any overflowed content */
  text-overflow: ellipsis; /* Add ellipsis (...) for truncated text */
}

</style>
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
          <h1 class="text-secondary">Test</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5 d-none">
          <!-- Card -->
          <a class="card card-hover-shadow h-100" href="#">
            <div class="card-body">
              <h6 class="card-subtitle">Total Exam</h6>

              <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                  <?php 
                  
                  ?>
                  <h2 class="card-title text-inherit">40</h2>
                </div>
              </div>
              <!-- End Row -->

              <span class="badge bg-soft-success text-success">
                <i class="bi-graph-up"></i> 12.5%
              </span>
              <span class="text-body fs-6 ms-1">from 40</span>
            </div>
          </a>
          <!-- End Card -->
        </div>

      

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5 d-none">
          <!-- Card -->
          <a class="card card-hover-shadow h-100" href="#">
            <div class="card-body">
              <h6 class="card-subtitle">Total Users</h6>

              <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                  <h2 class="card-title text-inherit">56.8%</h2>
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->

              <span class="badge bg-soft-danger text-danger">
                <i class="bi-graph-down"></i> 4.4%
              </span>
              <span class="text-body fs-6 ms-1">from 61.2%</span>
            </div>
          </a>
          <!-- End Card -->
        </div>
      </div>

      <div class="row justify-content-center">

        <div class="col-lg-9 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
 
            <div class="card-body">
              <h6 class="card-subtitle text-dark"><h1>Today's Test</h1></h6>
               <hr class="text-dark">
               <?php include ROOT_PATH . 'Test/todaystest.php'; ?>
            </div>

           
    
          </div>
  
          <!-- End Card -->
        </div>

        <div class="col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
 
            <div class="card-body">
              <h6 class="card-subtitle text-dark"><h1>Upcoming Test</h1></h6>
               <hr class="text-dark">

               <div class="col-12" style="border-radius:5px; cursor: pointer;">
                
                  <?php 
                    $sql = "(SELECT en.*,'role' as data
                    FROM examname AS en
                    INNER JOIN roles AS r ON en.examFor = r.id
                    WHERE r.roles = '$role' and end_date>CURDATE() and dates>CURDATE()) UNION
                    
                    (SELECT *,'par' as data
                    FROM examname
                    WHERE examFor = 'par' and end_date>CURDATE() and dates>CURDATE())
                    UNION
                    (SELECT *,'course' as data
                    FROM examname
                    WHERE examFor = 'course' and end_date>CURDATE() and dates>CURDATE())
                    UNION
                    (SELECT *,'everyone' as data
                    FROM examname
                    WHERE examFor = 'everyone' and end_date>CURDATE() and dates>CURDATE())
                    UNION
                    (SELECT *,'dep' as data
                    FROM examname
                    WHERE examFor = 'dep' and end_date>CURDATE() and dates>CURDATE())
                    ";
             
                 // Execute the query.
                
                 $statement70 = $connect->prepare($sql);
                 $statement70->execute(); 
                 $results0 = $statement70->fetchAll();
                 // Loop through the results.
                 foreach ($results0 as $result) {
                 
                    $table_cont=$result['data'];
                    $depatment_id=$result['dep_id'];
                        $bar=$result['id']; 
                        $code_values=$result['code']; 
                      
                        $startTime =new DateTime($result['start_hours']);
                        $endTime=new DateTime($result['end_hours']);
                        
                        $duration = $startTime->diff($endTime);
                        $duration_string_hi = $duration->format('%H');
                        $duration_string_ii = $duration->format('%I');
                       $sql13 = "SELECT count(*) FROM `exam_question_ist` WHERE exam_id = '$bar'";
                       $result13 = $connect->prepare($sql13);
                       $result13->execute();
                        $number_of_rows13 = $result13->fetchColumn();
                       $sql14 = "SELECT count(*) FROM `studentexam` WHERE examId = '$bar' and examSubject='$user_id'";
                       $result14 = $connect->prepare($sql14);
                       $result14->execute();
                        $number_of_rows14 = $result14->fetchColumn();
                        $sql15 = "SELECT count(*) FROM `userdepartment` WHERE userId = '$user_id' and departmentId='$depatment_id'";
                        $result15 = $connect->prepare($sql15);
                        $result15->execute();
                         $number_of_rows15 = $result15->fetchColumn();
                       if($number_of_rows13>0 && $table_cont=="role" || $number_of_rows13>0 && $table_cont=="everyone" || $number_of_rows13>0 && $number_of_rows14>0 && $table_cont=="par" || $number_of_rows13>0 && $number_of_rows15>0 && $table_cont=="dep"){
                  
                   
                  ?>
                
                  <span class="badge bg-primary" style="width:100%;font-size: inherit;" title="Date:<?php echo $result['dates']; ?>,Time:<?php echo $duration_string_hi." hr ".$duration_string_ii." min"; ?>">
                    <?php echo $result['examName']; ?>
                      <label><i class="bi bi-calendar"></i></label><?php echo $result['dates']; ?>
                      <label><i class="bi bi-alarm"></i></label><?php echo $duration_string_hi." hr ".$duration_string_ii." min"; ?>
                  </span>
                
              <?php 
                  } 
                }
              
            ?>
            
                </div>
          
          <!-- End Row -->
           </div>

         </div>
        </div>
      </div>

     

      <div class="row justify-content-center">
        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
 
            <div class="card-body">
              <div class="row">
              <div style="float: left;" class="col-md-4">
              <h6 class="card-subtitle text-dark"><h1>Completed Test</h1></h6></div>
               <div style="justify-content: end;display: flex;" class="col-md-8">
               <?php if($role=="instructor"){?>
                <a class="btn btn-soft-primary" href="<?php echo BASE_URL;?>Test/dashboard/dashboard.php"><i class="bi bi-clipboard2-data-fill"></i></a>
                <?php }else{?>
                     <a class="btn btn-soft-primary" href="<?php echo BASE_URL;?>Test/studentpanel/alltestdetails.php"><i class="bi bi-clipboard2-data-fill"></i></a>
                <?php } ?>
                <!-- <label for="monthFilter">Filter by Month:</label> -->
                  <select id="monthFilter" style="margin: 5px;height: 35px;padding: 5px;border-radius: 10px;width: 20%;">
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

                  <select id="yearFilterExam" style="margin: 5px;height: 35px;padding: 5px;border-radius: 10px;width: 20%;">
                    <option value="all">All Years</option>
                    <!-- Add years dynamically based on your data -->
                    <?php
                      $currentYear = date('Y');
                      for ($year = $currentYear; $year >= $currentYear - 5; $year--) {
                        echo '<option value="' . $year . '">' . $year . '</option>';
                      }
                    ?>
                  </select>

                  <!-- <label for="result-filter">Filter by Result:</label> -->
                    <select id="result-filter" style="margin: 5px;height: 35px;padding: 5px;border-radius: 10px;width: 20%;">
                      <option value="all">All</option>
                      <option value="Pass">Pass</option>
                      <option value="Fail">Fail</option>
                    </select>
              </div>
            </div>
               <hr class="text-dark">  
            <div class="row justify-content-center">
              <div class="table-responsive">

              <table class="table text-nowrap text-lg-wrap table-hover table-centered" id="examTable">
                <input class="form-control" type="text" id="allExamSearch" onkeyup="Examsearch()" placeholder="Search for Exam.." title="Type in a name"><br>
                <thead class="table-light">
                  <tr>
                    <th>Test Info</th>
                    <th>Questions</th>
                    <th>Correct</th>
                    <th>Incorrect</th>
                    <th>Marks</th>
                    <th>Result</th>
                    <th>view</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $exam_name2="";$time12="";$exam_Types="";
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
                        $formatted_date = date("j-F-Y", strtotime($date_exams));
                        $exam_result = $row['result_hide_show'];
                        $time24 = $row['start_hours'];
                        if($time24!=NULL){
                        $time12 = convertTo12HourFormat($time24);
                        }
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
                        $exam_name="";   
                       
                  ?>
                  <tr>
                    <td>
                      <div>
                        <a href="#">
                          <h5 class="mb-1"><?php echo $exam_name2?></h5>
                        </a>
                        <small><?php echo $formatted_date." "; ?><?php echo $time12; ?></small>
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
                        <small><?php echo $formatted_date." "; ?><?php echo $time12; ?></small>
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

  <!-- Modal -->
<div class="modal fade" id="uniccode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="check_code.php">
            <input type="hidden" id="exma_id" name="exam_id">       
            <input type="hidden" id="r_id" name="r_id">      
             <input type="text" name="user_code" class="form-control">
          <hr>
            <button type="submit" class="btn btn-soft-dark" style="font-weight:bold; font-size:large; float:right;">Submit And Start</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

<script>
  function filterTable() {
    var selectedMonth = document.getElementById("monthFilter").value;
    var selectedYear = document.getElementById("yearFilterExam").value;
    var selectedResult = document.getElementById("result-filter").value;
    var table = document.getElementById("examTable");
    var rows = table.getElementsByTagName("tr");

    for (var i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
      var row = rows[i];
      var dateCell = row.cells[0]; // Assuming the date is in the first column; adjust if needed
      var resultCell = row.cells[5]; // Assuming the result is in the sixth column; adjust if needed

      if (dateCell && resultCell) {
        var dateString = dateCell.textContent.trim();
        var date = new Date(dateString);
        var rowMonth = (date.getMonth() + 1).toString().padStart(2, '0');
        var rowYear = date.getFullYear().toString();
        var rowResult = resultCell.textContent.trim();

        var monthMatch = selectedMonth === "all" || rowMonth === selectedMonth;
        var yearMatch = selectedYear === "all" || rowYear === selectedYear;
        var resultMatch = selectedResult === "all" || rowResult === selectedResult;

        if (monthMatch && yearMatch && resultMatch) {
          row.style.display = "table-row";
        } else {
          row.style.display = "none";
        }
      }
    }
  }

  document.getElementById("monthFilter").addEventListener("change", filterTable);
  document.getElementById("yearFilterExam").addEventListener("change", filterTable);
  document.getElementById("result-filter").addEventListener("change", filterTable);

  // Call the filter function initially to display the current month, year, and result data
  filterTable();
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

<script>
function Examsearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("allExamSearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("examTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>


</html>