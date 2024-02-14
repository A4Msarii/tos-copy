<?php

include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$course="select course";
$std_course = "";
if(isset($_REQUEST['noti_id'])){
  $noti_id=urldecode(base64_decode($_REQUEST['noti_id']));
  $update_read="UPDATE `notifications`
  SET `is_read` = 1 WHERE `id`='$noti_id'";
  $update_statement = $connect->prepare($update_read);
  $update_statement->execute();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Quiz</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
 <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>

<body>


    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>

<!--Head Navbar-->
<div id="header-hide">
<?php
include(ROOT_PATH.'includes/head_navbar.php');
$classcolor= "SELECT * FROM gradesheet where user_id='$fetchuser_id'";
$classcolorst= $connect->prepare($classcolor);
$classcolorst->execute();

if($classcolorst->rowCount() > 0)
  {
    $class="";  
  }
else
  {
    $class=""; 
  }
?>
</div>
<!--Main Content-->



<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">Quiz Page</h1>
        </div>
        <!-- End Page Header -->
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">

              <?php include 'courcecode.php';?>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
           
             <center>
                            <form class="insert-phases" id="actual" method="post" action="quiz_insert_data.php" style="width:fit-content;">
                                <h3>Class : <span style="font-size:larger; color:green;">Quiz</span></h3>
                                    <div class="input-field">
                                        <table class="table table-bordered" id="table-field-quiz">
                                            <tr>
                                                <input type="hidden" name="phase" class="form-control" value="<?php echo $phase ?>">
                                                <input type="hidden" name="ctp" class="form-control" value="<?php echo $std_course1?>">
                                                <td><input type="text" name="quiz[]" class="form-control" placeholder="Subject" required=""></td>
                                                <td><input class="form-control" type="number" name="percentage[]" placeholder="Percentage" value="100" readonly></td>
                                                <td><button type="button" name="add_quiz" id="add_quiz" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                                                
                                            </tr>
                                        </table>
                                        <button style="margin:10px;" class="btn btn-success" type="submit" name="submit_quiz">Save</button>
                                    </div>
                            </form> 
                    </center>
                    <hr>

                   <table style="margin: 5px;" class="table table-striped table-bordered table-hover" id="quiztable">
                          <input class="form-control" type="text" id="quizsearch" onkeyup="quiz()" placeholder="Search for Subjects.." title="Type in a name"><br>
                               <thead class="bg-dark">
                                  <th class="text-white">Sr No</th>
                                  <th class="text-white">Subject</th>
                                  <th class="text-white">Percentage</th>
                                  <th class="text-white">Action</th>              
                              </thead>
                                  <?php 
                                      // $output ="";
                                      $query2 = "SELECT * FROM quiz where ctp='$std_course1'";
                                      $statement2 = $connect->prepare($query2);
                                      $statement2->execute();
                                      if($statement2->rowCount() > 0)
                                          {
                                              $result2 = $statement2->fetchAll();
                                              $sn=1;
                                              foreach($result2 as $row)
                                               { 
                                                $quiz_id=$row['id'];
                                                ?>
                                                     
                                              <tr>
                                                  <td><?php echo $sn++;?></td>
                                                  <td><?php echo $row['quiz'] ?></td>
                                                  <td><?php echo $row['percentage'] ?></td>
                                                  <td><a href="" style="margin: 10px;" onclick="document.getElementById('id1').value='<?php echo $quiz_id=$row['id'] ?>';
                                                         document.getElementById('quiz1').value='<?php echo $row['quiz'] ?>';
                                                         document.getElementById('percenatage1').value='<?php echo $row['percentage'] ?>';" data-bs-toggle="modal" data-bs-target="#editquiz"><i style="color:green;" class="bi bi-pen-fill"></i></a>
                                                         <a href="quiz_delete.php?id=<?php echo $quiz_id?>"><i style="color:crimson;" class="bi bi-trash-fill"></i></a>
                                                     
                                                  </td>
                                               </tr>
                                                      <?php
                                                  }
                                              
                                              }else{?>
                                                <tr>
                                                  <td colspan='9' style="text-align:center">
                                                    No data
                                                </td>
                                                </tr>
                                              <?php  }
                                                ?>   
                              </table>
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->

</main>


<div class="modal fade" id="editquiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Edit Quiz</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              <div class="modal-body">
                <form method="post" action="edit_quiz.php">
                <input type="hidden" name="id" value="" id="id1">
                <input class="form-control" type="text" name="quiz" value="" id="quiz1"><br>
                <!-- <input class="form-control" type="text" name="subitem" value="" id="quiz1"><br> -->
                <input class="btn btn-success" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
         

<script>
function quiz() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("quizsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("quiztable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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

<script type="text/javascript">
      $(document).ready(function()
      {
          var html = '<tr>\
                  <td style="text-align: center;"><input type="text" name="quiz[]" class="form-control" placeholder="Subject"></td>\
                  <td><input class="form-control" type="number" name="percentage[]" value="100"></td>\
                  <td><button type="button" name="remove_quiz" id="remove_quiz" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
            var max = 100;
          var a = 1;

          $("#add_quiz").click(function()
          {
            if(a <= max)
            {
              $("#table-field-quiz").append(html);
              a++;
            }
          });
          $("#table-field-quiz").on('click','#remove_quiz',function()
          {
            $(this).closest('tr').remove();
            a--;
          });
      });
 </script>



 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>