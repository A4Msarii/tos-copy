<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$std_course = "";

if(isset($_REQUEST['ddlYears'])){
  $get_year=$_REQUEST['ddlYears'];
}else{
  $get_year=date("Y");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Class Report</title>
  <meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
                   <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<style type="text/css">
  tr:nth-child(even) {
   background-color: #f2f2f2;
}
tr:nth-child(odd) {
   background-color: #ffffff;
}

</style>
<body>

<?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>


<div id="header-hide">
<?php
include(ROOT_PATH.'includes/head_navbar.php');
?>
</div>
<!--Main Content-->
<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">
            <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Student_Report.png">
          Class Summary Report</h1>
        </div>
        <!-- End Page Header -->
      </div>
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
              <!--Student name And course name-->
              <?php include 'courcecode.php';?>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table" style="width: 100%;">
                <tr>
                  <td style="display:none;">
                    <center>
                      <div class="input-group">
                          <!-- Select -->
                          <div class="tom-select-custom">
                            <select id="SelctLevel" class="js-select form-select form-control" autocomplete="off"
                                    data-hs-tom-select-options='{
                                          "dropdownWidth": "300px"
                                        }'>
                              <option value="all" selected>All</option>
                              <option value="January">January</option>
                              <option value="February">February</option>
                              <option value="March">March</option>
                              <option value="April">April</option>
                              <option value="May">May</option>
                              <option value="June">June</option>
                              <option value="July">July</option>
                              <option value="August">August</option>
                              <option value="September">September</option>
                              <option value="October">Octomber</option>
                              <option value="November">November</option>
                              <option value="December">December</option>
                            </select>
                          </div>
                          <!-- End Select -->

                       <!--    <input type="text" class="form-control" name="fullName" placeholder="Search name or emails" aria-label="Search name or emails" aria-describedby="fullName">

                          <a class="btn btn-primary" href="javascript:;">Search</a> -->
                        </div></center>
                  </td>
                  <td>
                    <div class="input-group">
                      
                          <!-- Select -->
                          <div class="tom-select-custom">
                            <form action="" method="post">
                              <table>
                                <tr>
                                  <td>
                                  <label style="color:black; font-weight:bold;">Select Year</label>
                                <?php  echo '<select name="ddlYears" class="form-control"';
                                  $starting_year  =date('Y', strtotime('-10 year'));
                                  $ending_year = date('Y', strtotime('+10 year'));
                                  $current_year = date('Y');
                                  for($starting_year; $starting_year <= $ending_year; $starting_year++) {
                                      echo '<option value="'.$starting_year.'"';
                                      if( $starting_year ==  $current_year ) {
                                              echo ' selected="selected"';
                                      }
                                      echo ' >'.$starting_year.'</option>';
                                  }               
                                  echo '<select>';?>
                  <!-- <select name="ddlYears" id="ddlYears" class="form-select form-control" id="set_year" value="<?php?>"></select></td> -->
                                  <td><input style="margin-top:30px; margin-left:40px;" type="submit" class="btn btn-success" value="Search"></td>
                                </tr>
                              </table>
                            </form>
                          </div>
                          <!-- End Select -->

                       <!--    <input type="text" class="form-control" name="fullName" placeholder="Search name or emails" aria-label="Search name or emails" aria-describedby="fullName">

                          <a class="btn btn-primary" href="javascript:;">Search</a> -->
                        </div>
                  </td>
                </tr>
              </table>

            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
    </div>
      <!-- End Row -->

    <div class="container">
      <div class="row justify-content-center" id="January">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
             
               <h1 class="text-success">January</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                 
                                  <?php 
                                    $query = "SELECT * FROM gradesheet where class='actual' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='1'";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    if($statement->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="actual.php">Actual</a></span>
                                   <?php  $result = $statement->fetchAll();
                                            foreach($result as $row)
                                            {
                                              $gradess=$row['over_all_grade'];
                                               $class_ides=$row['class_id'];
                                              $class_name_fect= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                              $class_name_fect->execute([$class_ides]);
                                               $class_name_fects = $class_name_fect->fetchColumn();
                                               $ins_id=$row['instructor'];
                                               $sel_ins= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins->execute([$ins_id]);
                                               $sel_ins_name = $sel_ins->fetchColumn();
                                               if($gradess == "U")
                                            {
                                              $class1 = "btn btn-danger";
                                            }
                                            elseif ($gradess == "F") 
                                            {
                                              $class1 = "btn btn-warning";
                                            }
                                            elseif ($gradess == "G") 
                                            {
                                              $class1 = "btn btn-secondary";
                                            }
                                            elseif ($gradess == "V") 
                                            {
                                              $class1 = "btn btn-success";
                                            }
                                            elseif ($gradess == "E") 
                                            {
                                              $class1 = "btn btn-primary";
                                            }
                                            elseif ($gradess == "N") 
                                            {
                                              $class1 = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1 = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                            
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides))?>&class_name=<?php echo urlencode(base64_encode('actual'))?>"><?php echo $class_name_fects.' - '.$sel_ins_name.' / ' ?><span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1?>"><?php echo $gradess?></span>
                                                          
                                                            
                                                          </a></h4>
                                                         
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                           
                
                           <?php 
                                    $query = "SELECT * FROM gradesheet where class='sim' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='1'";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    if($statement->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Simulation</span>
                                   <?php  $result = $statement->fetchAll();
                                            foreach($result as $row)
                                            {
                                              $gradess=$row['over_all_grade'];
                                               $class_ides=$row['class_id'];
                                              $class_name_fect= $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                              $class_name_fect->execute([$class_ides]);
                                               $class_name_fects = $class_name_fect->fetchColumn();
                                               $ins_id=$row['instructor'];
                                               $sel_ins= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins->execute([$ins_id]);
                                               $sel_ins_name = $sel_ins->fetchColumn();
                                               if($gradess == "U")
                                            {
                                              $class1 = "btn btn-danger";
                                            }
                                            elseif ($gradess == "F") 
                                            {
                                              $class1 = "btn btn-warning";
                                            }
                                            elseif ($gradess == "G") 
                                            {
                                              $class1 = "btn btn-secondary";
                                            }
                                            elseif ($gradess == "V") 
                                            {
                                              $class1 = "btn btn-success";
                                            }
                                            elseif ($gradess == "E") 
                                            {
                                              $class1 = "btn btn-primary";
                                            }
                                            elseif ($gradess == "N") 
                                            {
                                              $class1 = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1 = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides))?>&class_name=<?php echo urlencode(base64_encode('sim'))?>"><?php echo $class_name_fects.' - '.$sel_ins_name.' / '?>
                                                          <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1?>"><?php echo $gradess?></span></a></h4>
                                                         
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                  
                  <?php 
                                    $query2 = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='1'";
                                    $statement2 = $connect->prepare($query2);
                                    $statement2->execute();
                                    if($statement2->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Acedemic</span>
                                   <?php  $result2 = $statement2->fetchAll();
                                            foreach($result2 as $row2)
                                            {
                                               $class_id_ac=$row2['data'];
                                              $class_name_fect_sc= $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                              $class_name_fect_sc->execute([$class_id_ac]);
                                               $class_name_fect_scs = $class_name_fect_sc->fetchColumn();
                                                $ins_ides=$row2['user_id'];
                                               $sel_ins_Ac= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_Ac->execute([$ins_ides]);
                                               $sel_ins_Ac_name = $sel_ins_Ac->fetchColumn();
                                             
                                            ?>
                                               
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_scs.' - '.$sel_ins_Ac_name;?></a></h4>
                                                        
                                           
                                            <?php
                                          }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                  <?php 
                                    $query3 = "SELECT * FROM test_data where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='1'";
                                    $statement3 = $connect->prepare($query3);
                                    $statement3->execute();
                                    if($statement3->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Test</span>
                                   <?php  $result3 = $statement3->fetchAll();
                                            foreach($result3 as $row3)
                                            {
                                              $marks_test=$row3['marks'];
                                              $class_id_te=$row3['test_id'];
                                              $class_name_fect_te= $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                              $class_name_fect_te->execute([$class_id_te]);
                                               $class_name_fect_tes = $class_name_fect_te->fetchColumn();

                                               $class_test="btn btn-dark";
                                                                      if($marks_test!=""){
                                                        if($marks_test<=50 && $marks_test>=0){
                                                              $class_test="btn btn-danger";
                                                        }else if($marks_test<=70 && $marks_test>=51){
                                                          $class_test="btn btn-warning";
                                                        }else if($marks_test<=80 && $marks_test>=71){
                                                          $class_test = "btn btn-secondary";
                                                        }else if($marks_test<=90 && $marks_test>=81){
                                                          $class_test = "btn btn-success";
                                                        }else if($marks_test<=100 && $marks_test>=91){
                                                          $class_test = "btn btn-primary";
                                                        }
                                                      }
                                               ?> 
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_test;?>"><?php echo $marks_test;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>


                  <?php 
                                    $query5 = "SELECT * FROM discipline where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='1'";
                                    $statement5 = $connect->prepare($query5);
                                    $statement5->execute();
                                    if($statement5->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Descipline</span>
                                   <?php  $result5 = $statement5->fetchAll();
                                            foreach($result5 as $row3)
                                            {
                                             
                                              $class_id_me=$row3['topic'];
                                              $desc_inst=$row3['inst_id'];
                                              $instr_name= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_name->execute([$desc_inst]);
                                              $name3 = $instr_name->fetchColumn();
                                              ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_me.' - '.$name3;?></a></h4>
                                                       
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query6_j = "SELECT * FROM memo where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='1'";
                                    $statement6_j = $connect->prepare($query6_j);
                                    $statement6_j->execute();
                                    if($statement6_j->rowCount() > 0)
                                    {
                                      ?>
                                 <td id="memo">
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Memo</span>
                                   <?php  $result6_j = $statement6_j->fetchAll();
                                            foreach($result6_j as $row3)
                                            {
                                             
                                              $class_id_mem_j=$row3['topic'];
                                              $desc_instm_j=$row3['inst_id'];
                                              $instr_namem_j= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_namem_j->execute([$desc_instm_j]);
                                              $name3m_j = $instr_namem_j->fetchColumn();
                                              ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_mem_j.' - '.$name3m_j;?></a></h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query_q = "SELECT * FROM quiz_marks where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='1'";
                                    $statement_q = $connect->prepare($query_q);
                                    $statement_q->execute();
                                    if($statement_q->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                  <span class="text-primary" style="font-weight: bold; font-size:large;">Quiz</span>
                                   <?php  $result_q = $statement_q->fetchAll();
                                            foreach($result_q as $row3)
                                            {
                                              $marks_quiz_q=$row3['marks'];
                                              $class_id_te_q=$row3['quiz_id'];
                                              $class_name_fect_te_q= $connect->prepare("SELECT quiz FROM quiz WHERE id=?");
                                              $class_name_fect_te_q->execute([$class_id_te_q]);
                                               $class_name_fect_tes_q = $class_name_fect_te_q->fetchColumn();

                                                $class_quiz_q="btn btn-dark";
                                                                      if($marks_quiz_q!=""){
                                                        if($marks_quiz_q<=50 && $marks_quiz_q>=0){
                                                              $class_quiz_q="btn btn-danger";
                                                        }else if($marks_quiz_q<=70 && $marks_quiz_q>=51){
                                                          $class_quiz_q="btn btn-warning";
                                                        }else if($marks_quiz_q<=80 && $marks_quiz_q>=71){
                                                          $class_quiz_q = "btn btn-secondary";
                                                        }else if($marks_quiz_q<=90 && $marks_quiz_q>=81){
                                                          $class_quiz_q = "btn btn-success";
                                                        }else if($marks_quiz_q<=100 && $marks_quiz_q>=91){
                                                          $class_quiz_q = "btn btn-primary";
                                                        }
                                                      }
                                               ?>
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_q?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_quiz_q;?>"><?php echo $marks_quiz_q;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                </tr>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <div class="row justify-content-center" id="February">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1 class="text-success">February</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                  
                                  <?php 
                                    $query_f = "SELECT * FROM gradesheet where class='actual' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='2'";
                                    $statement_f = $connect->prepare($query_f);
                                    $statement_f->execute();
                                    if($statement_f->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="actual.php">Actual</a></span>
                                   <?php  $result_f = $statement_f->fetchAll();
                                            foreach($result_f as $row)
                                            {
                                              $gradess_f=$row['over_all_grade'];
                                               $class_ides_f=$row['class_id'];
                                              $class_name_fect_f= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                              $class_name_fect_f->execute([$class_ides_f]);
                                               $class_name_fects_f = $class_name_fect_f->fetchColumn();
                                               $ins_id_f=$row['instructor'];
                                               $sel_ins_f= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_f->execute([$ins_id_f]);
                                               $sel_ins_name_f = $sel_ins_f->fetchColumn();
                                               if($gradess_f == "U")
                                            {
                                              $class1_f = "btn btn-danger";
                                            }
                                            elseif ($gradess_f == "F") 
                                            {
                                              $class1_f = "btn btn-warning";
                                            }
                                            elseif ($gradess_f == "G") 
                                            {
                                              $class1_f = "btn btn-secondary";
                                            }
                                            elseif ($gradess_f == "V") 
                                            {
                                              $class1_f = "btn btn-success";
                                            }
                                            elseif ($gradess_f == "E") 
                                            {
                                              $class1_f = "btn btn-primary";
                                            }
                                            elseif ($gradess_f == "N") 
                                            {
                                              $class1_f = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_f = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_f))?>&class_name=<?php echo urlencode(base64_encode('actual'))?>"><?php echo $class_name_fects_f.' - '.$sel_ins_name_f.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_f?>"><?php echo $gradess_f;?></span>
                                                          </a></h4>
                                                       

                                                        
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                           
                
                           <?php 
                                    $query1_f = "SELECT * FROM gradesheet where class='sim' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='2'";
                                    $statement1_f = $connect->prepare($query1_f);
                                    $statement1_f->execute();
                                    if($statement1_f->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="sim.php">Simulation</a></span>
                                   <?php  $result1_f = $statement1_f->fetchAll();
                                            foreach($result1_f as $row)
                                            {
                                              $gradess1_f=$row['over_all_grade'];
                                               $class_ides1_f=$row['class_id'];
                                              $class_name_fect1_f= $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                              $class_name_fect1_f->execute([$class_ides1_f]);
                                               $class_name_fects1_f = $class_name_fect1_f->fetchColumn();
                                               $ins_id1_f=$row['instructor'];
                                               $sel_ins1_f= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins1_f->execute([$ins_id1_f]);
                                               $sel_ins_name1_f = $sel_ins1_f->fetchColumn();

                                               if($gradess1_f == "U")
                                            {
                                              $class1 = "btn btn-danger";
                                            }
                                            elseif ($gradess1_f == "F") 
                                            {
                                              $class1 = "btn btn-warning";
                                            }
                                            elseif ($gradess1_f == "G") 
                                            {
                                              $class1 = "btn btn-secondary";
                                            }
                                            elseif ($gradess1_f == "V") 
                                            {
                                              $class1 = "btn btn-success";
                                            }
                                            elseif ($gradess1_f == "E") 
                                            {
                                              $class1 = "btn btn-primary";
                                            }
                                            elseif ($gradess1_f == "N") 
                                            {
                                              $class1 = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1 = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary '.$class1.'"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides1_f))?>&class_name=<?php echo urlencode(base64_encode('sim'))?>"><?php echo $class_name_fects1_f.' - '.$sel_ins_name1_f.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1?>"><?php echo $gradess1_f?></span>
                                                          </a></h4>
                                                        
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                  
                  <?php 
                                    $query2_f = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='2'";
                                    $statement2_f = $connect->prepare($query2_f);
                                    $statement2_f->execute();
                                    if($statement2_f->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="academic.php">Academic</a></span>
                                   <?php  $result2_f = $statement2_f->fetchAll();
                                            foreach($result2_f as $row2)
                                            {
                                               $class_id_ac_f=$row2['data'];
                                              $class_name_fect_sc_f= $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                              $class_name_fect_sc_f->execute([$class_id_ac_f]);
                                               $class_name_fect_scs_f = $class_name_fect_sc_f->fetchColumn();
                                                $ins_ides_f=$row2['user_id'];
                                               $sel_ins_Ac_f= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_Ac_f->execute([$ins_ides_f]);
                                               $sel_ins_Ac_name_f = $sel_ins_Ac_f->fetchColumn();
                                             
                                            ?>
                                               
                                                        
                                                          <h4><span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_scs_f.' - '.$sel_ins_Ac_name_f;?></a></h4>
                                                        
                                           
                                            <?php
                                          }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                  <?php 
                                    $query3_f = "SELECT * FROM test_data where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='2'";
                                    $statement3_f = $connect->prepare($query3_f);
                                    $statement3_f->execute();
                                    if($statement3_f->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Test</span>
                                   <?php  $result3_f = $statement3_f->fetchAll();
                                            foreach($result3_f as $row3)
                                            {
                                              $marks_test_f=$row3['marks'];
                                              $class_id_te_f=$row3['test_id'];
                                              $class_name_fect_te_f= $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                              $class_name_fect_te_f->execute([$class_id_te_f]);
                                               $class_name_fect_tes_f = $class_name_fect_te_f->fetchColumn();

                                               $class_test_f="btn btn-dark";
                                                                      if($marks_test_f!=""){
                                                        if($marks_test_f<=50 && $marks_test_f>=0){
                                                              $class_test_f="btn btn-danger";
                                                        }else if($marks_test_f<=70 && $marks_test_f>=51){
                                                          $class_test_f="btn btn-warning";
                                                        }else if($marks_test_f<=80 && $marks_test_f>=71){
                                                          $class_test_f = "btn btn-secondary";
                                                        }else if($marks_test_f<=90 && $marks_test_f>=81){
                                                          $class_test_f = "btn btn-success";
                                                        }else if($marks_test_f<=100 && $marks_test_f>=91){
                                                          $class_test_f = "btn btn-primary";
                                                        }
                                                      }
                                               ?> 
                                               
                                                          <h5 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_f?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_test_f;?>"><?php echo $marks_test_f;?></span>
                                                          </h5>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                    <?php 
                                    $query5_f = "SELECT * FROM discipline where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='2'";
                                    $statement5_f = $connect->prepare($query5_f);
                                    $statement5_f->execute();
                                    if($statement5_f->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="discipline.php">Descipline</a></span>
                                   <?php  $result5_f = $statement5_f->fetchAll();
                                            foreach($result5_f as $row3)
                                            {
                                             
                                              $class_id_me_f=$row3['topic'];
                                              $desc_inst_f=$row3['inst_id'];
                                              $instr_name_f= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_name_f->execute([$desc_inst_f]);
                                              $name3_f = $instr_name_f->fetchColumn();
                                              ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_me_f.' - '.$name3_f;?></a></h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                    <?php 
                                    $query6_f = "SELECT * FROM memo where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='2'";
                                    $statement6_f = $connect->prepare($query6_f);
                                    $statement6_f->execute();
                                    if($statement6_f->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="memo.php">Memo</a></span>
                                   <?php  $result6_f = $statement6_f->fetchAll();
                                            foreach($result6_f as $row3)
                                            {
                                             
                                              $class_id_mem_f=$row3['topic'];
                                              $desc_instm_f=$row3['inst_id'];
                                              $instr_namem_f= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_namem_f->execute([$desc_instm_f]);
                                              $name3m_f = $instr_namem_f->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_mem_f.' - '.$name3m_f;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query_qf = "SELECT * FROM quiz_marks where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='2'";
                                    $statement_qf = $connect->prepare($query_qf);
                                    $statement_qf->execute();
                                    if($statement_qf->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                  <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="quiz.php">Quiz</a></span>
                                   <?php  $result_qf = $statement_qf->fetchAll();
                                            foreach($result_qf as $row3)
                                            {
                                              $marks_quiz_qf=$row3['marks'];
                                              $class_id_te_qf=$row3['quiz_id'];
                                              $class_name_fect_te_qf= $connect->prepare("SELECT quiz FROM quiz WHERE id=?");
                                              $class_name_fect_te_qf->execute([$class_id_te_qf]);
                                               $class_name_fect_tes_qf = $class_name_fect_te_qf->fetchColumn();

                                                $class_quiz_qf="btn btn-dark";
                                                                      if($marks_quiz_qf!=""){
                                                        if($marks_quiz_qf<=50 && $marks_quiz_qf>=0){
                                                              $class_quiz_qf="btn btn-danger";
                                                        }else if($marks_quiz_qf<=70 && $marks_quiz_qf>=51){
                                                          $class_quiz_qf="btn btn-warning";
                                                        }else if($marks_quiz_qf<=80 && $marks_quiz_qf>=71){
                                                          $class_quiz_qf = "btn btn-secondary";
                                                        }else if($marks_quiz_qf<=90 && $marks_quiz_qf>=81){
                                                          $class_quiz_qf = "btn btn-success";
                                                        }else if($marks_quiz_qf<=100 && $marks_quiz_qf>=91){
                                                          $class_quiz_qf = "btn btn-primary";
                                                        }
                                                      }
                                               ?>
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_qf?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_quiz_qf;?>"><?php echo $marks_quiz_qf;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                </tr>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <div class="row justify-content-center" id="March">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1 class="text-success">March</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                   <?php 
                                    $query_m = "SELECT * FROM gradesheet where class='actual' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='3'";
                                    $statement_m = $connect->prepare($query_m);
                                    $statement_m->execute();
                                    if($statement_m->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="actual.php">Actual</a></span>
                                   <?php  $result_m = $statement_m->fetchAll();
                                            foreach($result_m as $row)
                                            {
                                              $gradess_m=$row['over_all_grade'];
                                               $class_ides_m=$row['class_id'];
                                              $class_name_fect_m= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                              $class_name_fect_m->execute([$class_ides_m]);
                                               $class_name_fects_m = $class_name_fect_m->fetchColumn();
                                               $ins_id_m=$row['instructor'];
                                               $sel_ins_m= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_m->execute([$ins_id_m]);
                                               $sel_ins_name_m = $sel_ins_m->fetchColumn();
                                               if($gradess_m == "U")
                                            {
                                              $class1_m = "btn btn-danger";
                                            }
                                            elseif ($gradess_m == "F") 
                                            {
                                              $class1_m = "btn btn-warning";
                                            }
                                            elseif ($gradess_m == "G") 
                                            {
                                              $class1_m = "btn btn-secondary";
                                            }
                                            elseif ($gradess_m == "V") 
                                            {
                                              $class1_m = "btn btn-success";
                                            }
                                            elseif ($gradess_m == "E") 
                                            {
                                              $class1_m = "btn btn-primary";
                                            }
                                            elseif ($gradess_m == "N") 
                                            {
                                              $class1_m = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_m = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_m))?>&class_name=<?php echo urlencode(base64_encode('actual'))?>"><?php echo $class_name_fects_m.' - '.$sel_ins_name_m.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_m?>"><?php echo $gradess_m?></span>
                                                          </a></h4>
                                                         
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                           
                
                           <?php 
                                    $query1_m = "SELECT * FROM gradesheet where class='sim' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='3'";
                                    $statement1_m = $connect->prepare($query1_m);
                                    $statement1_m->execute();
                                    if($statement1_m->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="sim.php">Simulation</a></span>
                                   <?php  $result1_m = $statement1_m->fetchAll();
                                            foreach($result1_m as $row)
                                            {
                                              $gradess1_m=$row['over_all_grade'];
                                               $class_ides1_m=$row['class_id'];
                                              $class_name_fect1_m= $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                              $class_name_fect1_m->execute([$class_ides1_m]);
                                               $class_name_fects1_m = $class_name_fect1_m->fetchColumn();
                                               $ins_id1_m=$row['instructor'];
                                               $sel_ins1_m= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins1_m->execute([$ins_id1_m]);
                                               $sel_ins_name1_m = $sel_ins1_m->fetchColumn();
                                               if($gradess1_m == "U")
                                            {
                                              $class1_mm = "btn btn-danger";
                                            }
                                            elseif ($gradess1_m == "F") 
                                            {
                                              $class1_mm = "btn btn-warning";
                                            }
                                            elseif ($gradess1_m == "G") 
                                            {
                                              $class1_mm = "btn btn-secondary";
                                            }
                                            elseif ($gradess1_m == "V") 
                                            {
                                              $class1_mm = "btn btn-success";
                                            }
                                            elseif ($gradess1_m == "E") 
                                            {
                                              $class1_mm = "btn btn-primary";
                                            }
                                            elseif ($gradess1_m == "N") 
                                            {
                                              $class1_mm = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_mm = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides1_m))?>&class_name=<?php echo urlencode(base64_encode('sim'))?>"><?php echo $class_name_fects1_m.' - '.$sel_ins_name1_m.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_mm?>"><?php echo $gradess1_m?></span>
                                                          </a></h4>
                                                         
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                  
                  <?php 
                                    $query2_m = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='3'";
                                    $statement2_m = $connect->prepare($query2_m);
                                    $statement2_m->execute();
                                    if($statement2_m->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="academic.php">Academic</a></span>
                                   <?php  $result2_m = $statement2_m->fetchAll();
                                            foreach($result2_m as $row2)
                                            {
                                               $class_id_ac_m=$row2['data'];
                                              $class_name_fect_sc_m= $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                              $class_name_fect_sc_m->execute([$class_id_ac_m]);
                                               $class_name_fect_scs_m = $class_name_fect_sc_m->fetchColumn();
                                                $ins_ides_m=$row2['user_id'];
                                               $sel_ins_Ac_m= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_Ac_m->execute([$ins_ides_m]);
                                               $sel_ins_Ac_name_m = $sel_ins_Ac_m->fetchColumn();
                                             
                                            ?>
                                               
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_scs_m.' - '.$sel_ins_Ac_name_m;?></a>
                                                        </h4>
                                           
                                            <?php
                                          }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                 <?php 
                                    $query3_m = "SELECT * FROM test_data where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='3'";
                                    $statement3_m = $connect->prepare($query3_m);
                                    $statement3_m->execute();
                                    if($statement3_m->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Test</span>
                                   <?php  $result3_m = $statement3_m->fetchAll();
                                            foreach($result3_m as $row3)
                                            {
                                              $marks_test_m=$row3['marks'];
                                              $class_id_te_m=$row3['test_id'];
                                              $class_name_fect_te_m= $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                              $class_name_fect_te_m->execute([$class_id_te_m]);
                                               $class_name_fect_tes_m = $class_name_fect_te_m->fetchColumn();

                                               $class_test_m="btn btn-dark";
                                                                      if($marks_test_m!=""){
                                                        if($marks_test_m<=50 && $marks_test_m>=0){
                                                              $class_test_m="btn btn-danger";
                                                        }else if($marks_test_m<=70 && $marks_test_m>=51){
                                                          $class_test_m="btn btn-warning";
                                                        }else if($marks_test_m<=80 && $marks_test_m>=71){
                                                          $class_test_m = "btn btn-secondary";
                                                        }else if($marks_test_m<=90 && $marks_test_m>=81){
                                                          $class_test_m = "btn btn-success";
                                                        }else if($marks_test_m<=100 && $marks_test_m>=91){
                                                          $class_test_m = "btn btn-primary";
                                                        }
                                                      }
                                               ?> 
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_m?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_test_m;?>"><?php echo $marks_test_m;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query5_m = "SELECT * FROM discipline where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='3'";
                                    $statement5_m = $connect->prepare($query5_m);
                                    $statement5_m->execute();
                                    if($statement5_m->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="discipline.php">Descipline</a></span>
                                   <?php  $result5_m = $statement5_m->fetchAll();
                                            foreach($result5_m as $row3)
                                            {
                                             
                                              $class_id_me_m=$row3['topic'];
                                              $desc_inst_m=$row3['inst_id'];
                                              $instr_name_m= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_name_m->execute([$desc_inst_m]);
                                              $name3_m = $instr_name_m->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_me_m.' - '.$name3_m;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query6_m = "SELECT * FROM memo where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='3'";
                                    $statement6_m = $connect->prepare($query6_m);
                                    $statement6_m->execute();
                                    if($statement6_m->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="memo.php">Memo</a></span>
                                   <?php  $result6_m = $statement6_m->fetchAll();
                                            foreach($result6_m as $row3)
                                            {
                                             
                                              $class_id_mem_m=$row3['topic'];
                                              $desc_instm_m=$row3['inst_id'];
                                              $instr_namem_m= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_namem_m->execute([$desc_instm_m]);
                                              $name3m_m = $instr_namem_m->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_mem_m.' - '.$name3m_m;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query_qm = "SELECT * FROM quiz_marks where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='3'";
                                    $statement_qm = $connect->prepare($query_qm);
                                    $statement_qm->execute();
                                    if($statement_qm->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                  <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="quiz.php">Quiz</a></span>
                                   <?php  $result_qm = $statement_qm->fetchAll();
                                            foreach($result_qm as $row3)
                                            {
                                              $marks_quiz_qm=$row3['marks'];
                                              $class_id_te_qm=$row3['quiz_id'];
                                              $class_name_fect_te_qm= $connect->prepare("SELECT quiz FROM quiz WHERE id=?");
                                              $class_name_fect_te_qm->execute([$class_id_te_qm]);
                                               $class_name_fect_tes_qm = $class_name_fect_te_qm->fetchColumn();

                                                $class_quiz_qm="btn btn-dark";
                                                                      if($marks_quiz_qm!=""){
                                                        if($marks_quiz_qm<=50 && $marks_quiz_qm>=0){
                                                              $class_quiz_qm="btn btn-danger";
                                                        }else if($marks_quiz_qm<=70 && $marks_quiz_qm>=51){
                                                          $class_quiz_qm="btn btn-warning";
                                                        }else if($marks_quiz_qm<=80 && $marks_quiz_qm>=71){
                                                          $class_quiz_qm = "btn btn-secondary";
                                                        }else if($marks_quiz_qm<=90 && $marks_quiz_qm>=81){
                                                          $class_quiz_qm = "btn btn-success";
                                                        }else if($marks_quiz_qm<=100 && $marks_quiz_qm>=91){
                                                          $class_quiz_qm = "btn btn-primary";
                                                        }
                                                      }
                                               ?>
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_qm?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_quiz_qm;?>"><?php echo $marks_quiz_qm;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                </tr>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <div class="row justify-content-center" id="April">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1 class="text-success">April</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                   <?php 
                                    $query_a = "SELECT * FROM gradesheet where class='actual' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='4'";
                                    $statement_a = $connect->prepare($query_a);
                                    $statement_a->execute();
                                    if($statement_a->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="actual.php">Actual</a></span>
                                   <?php  $result_a = $statement_a->fetchAll();
                                            foreach($result_a as $row)
                                            {
                                              $gradess_a=$row['over_all_grade'];
                                               $class_ides_a=$row['class_id'];
                                              $class_name_fect_a= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                              $class_name_fect_a->execute([$class_ides_a]);
                                               $class_name_fects_a = $class_name_fect_a->fetchColumn();
                                               $ins_id_a=$row['instructor'];
                                               $sel_ins_a= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_a->execute([$ins_id_a]);
                                               $sel_ins_name_a = $sel_ins_a->fetchColumn();
                                               if($gradess_a == "U")
                                            {
                                              $class1_a = "btn btn-danger";
                                            }
                                            elseif ($gradess_a == "F") 
                                            {
                                              $class1_a = "btn btn-warning";
                                            }
                                            elseif ($gradess_a == "G") 
                                            {
                                              $class1_a = "btn btn-secondary";
                                            }
                                            elseif ($gradess_a == "V") 
                                            {
                                              $class1_a = "btn btn-success";
                                            }
                                            elseif ($gradess_a == "E") 
                                            {
                                              $class1_a = "btn btn-primary";
                                            }
                                            elseif ($gradess_a == "N") 
                                            {
                                              $class1_a = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_a = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_a))?>&class_name=<?php echo urlencode(base64_encode('actual'))?>"><?php echo $class_name_fects_a.' - '.$sel_ins_name_a.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_a?>"><?php echo $gradess_a?></span>
                                                          </a>
                                                        </h4>
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                           
                
                           <?php 
                                    $query1_a = "SELECT * FROM gradesheet where class='sim' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='4'";
                                    $statement1_a = $connect->prepare($query1_a);
                                    $statement1_a->execute();
                                    if($statement1_a->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="sim.php">Simulation</a></span>
                                   <?php  $result1_a = $statement1_a->fetchAll();
                                            foreach($result1_a as $row)
                                            {
                                              $gradess1_a=$row['over_all_grade'];
                                               $class_ides1_a=$row['class_id'];
                                              $class_name_fect1_a= $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                              $class_name_fect1_a->execute([$class_ides1_a]);
                                               $class_name_fects1_a = $class_name_fect1_a->fetchColumn();
                                               $ins_id1_a=$row['instructor'];
                                               $sel_ins1_a= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins1_a->execute([$ins_id1_a]);
                                               $sel_ins_name1_a = $sel_ins1_a->fetchColumn();
                                               if($gradess1_a == "U")
                                            {
                                              $class1_aa = "btn btn-danger";
                                            }
                                            elseif ($gradess1_a == "F") 
                                            {
                                              $class1_aa = "btn btn-warning";
                                            }
                                            elseif ($gradess1_a == "G") 
                                            {
                                              $class1_aa = "btn btn-secondary";
                                            }
                                            elseif ($gradess1_a == "V") 
                                            {
                                              $class1_aa = "btn btn-success";
                                            }
                                            elseif ($gradess1_a == "E") 
                                            {
                                              $class1_aa = "btn btn-primary";
                                            }
                                            elseif ($gradess1_a == "N") 
                                            {
                                              $class1_aa = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_aa = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides1_a))?>&class_name=<?php echo urlencode(base64_encode('sim'))?>"><?php echo $class_name_fects1_a.' - '.$sel_ins_name1_a.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_aa?>"><?php echo $gradess1_a?></span>
                                                          </a>
                                                        </h4> 
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                  
                  <?php 
                                    $query2_a = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='4'";
                                    $statement2_a = $connect->prepare($query2_a);
                                    $statement2_a->execute();
                                    if($statement2_a->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="academic.php">Academic</a></span>
                                   <?php  $result2_a = $statement2_a->fetchAll();
                                            foreach($result2_a as $row2)
                                            {
                                               $class_id_ac_a=$row2['data'];
                                              $class_name_fect_sc_a= $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                              $class_name_fect_sc_a->execute([$class_id_ac_a]);
                                               $class_name_fect_scs_a = $class_name_fect_sc_a->fetchColumn();
                                                $ins_ides_a=$row2['user_id'];
                                               $sel_ins_Ac_a= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_Ac_a->execute([$ins_ides_a]);
                                               $sel_ins_Ac_name_a = $sel_ins_Ac_a->fetchColumn();
                                             
                                            ?>
                                               
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_scs_a.' - '.$sel_ins_Ac_name_a;?></a>
                                                        </h4>
                                           
                                            <?php
                                          }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                  <?php 
                                    $query3_a = "SELECT * FROM test_data where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='4'";
                                    $statement3_a = $connect->prepare($query3_a);
                                    $statement3_a->execute();
                                    if($statement3_a->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Test</span>
                                   <?php  $result3_a = $statement3_a->fetchAll();
                                            foreach($result3_a as $row3)
                                            {
                                              $marks_test_a=$row3['marks'];
                                              $class_id_te_a=$row3['test_id'];
                                              $class_name_fect_te_a= $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                              $class_name_fect_te_a->execute([$class_id_te_a]);
                                               $class_name_fect_tes_a = $class_name_fect_te_a->fetchColumn();

                                               $class_test_a="btn btn-dark";
                                                                      if($marks_test_a!=""){
                                                        if($marks_test_a<=50 && $marks_test_a>=0){
                                                              $class_test_a="btn btn-danger";
                                                        }else if($marks_test_a<=70 && $marks_test_a>=51){
                                                          $class_test_a="btn btn-warning";
                                                        }else if($marks_test_a<=80 && $marks_test_a>=71){
                                                          $class_test_a = "btn btn-secondary";
                                                        }else if($marks_test_a<=90 && $marks_test_a>=81){
                                                          $class_test_a = "btn btn-success";
                                                        }else if($marks_test_a<=100 && $marks_test_a>=91){
                                                          $class_test_a = "btn btn-primary";
                                                        }
                                                      }
                                               ?> 
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_a?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_test_a;?>"><?php echo $marks_test_a;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query5_a = "SELECT * FROM discipline where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='4'";
                                    $statement5_a = $connect->prepare($query5_a);
                                    $statement5_a->execute();
                                    if($statement5_a->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="discipline.php">Descipline</a></span>
                                   <?php  $result5_a = $statement5_a->fetchAll();
                                            foreach($result5_a as $row3)
                                            {
                                             
                                              $class_id_me_a=$row3['topic'];
                                              $desc_inst_a=$row3['inst_id'];
                                              $instr_name_a= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_name_a->execute([$desc_inst_a]);
                                              $name3_a = $instr_name_a->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_me_a.' - '.$name3_a;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                <?php 
                                    $query6_a = "SELECT * FROM memo where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='4'";
                                    $statement6_a = $connect->prepare($query6_a);
                                    $statement6_a->execute();
                                    if($statement6_a->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="memo.php">Memo</a></span>
                                   <?php  $result6_a = $statement6_a->fetchAll();
                                            foreach($result6_a as $row3)
                                            {
                                             
                                              $class_id_mem_a=$row3['topic'];
                                              $desc_instm_a=$row3['inst_id'];
                                              $instr_namem_a= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_namem_a->execute([$desc_instm_a]);
                                              $name3m_a = $instr_namem_a->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_mem_a.' - '.$name3m_a;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query_qa = "SELECT * FROM quiz_marks where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='4'";
                                    $statement_qa = $connect->prepare($query_qa);
                                    $statement_qa->execute();
                                    if($statement_qa->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                  <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="quiz.php">Quiz</a></span>
                                   <?php  $result_qa = $statement_qa->fetchAll();
                                            foreach($result_qa as $row3)
                                            {
                                              $marks_quiz_qa=$row3['marks'];
                                              $class_id_te_qa=$row3['quiz_id'];
                                              $class_name_fect_te_qa= $connect->prepare("SELECT quiz FROM quiz WHERE id=?");
                                              $class_name_fect_te_qa->execute([$class_id_te_qa]);
                                               $class_name_fect_tes_qa = $class_name_fect_te_qa->fetchColumn();

                                                $class_quiz_qa="btn btn-dark";
                                                                      if($marks_quiz_qa!=""){
                                                        if($marks_quiz_qa<=50 && $marks_quiz_qa>=0){
                                                              $class_quiz_qa="btn btn-danger";
                                                        }else if($marks_quiz_qa<=70 && $marks_quiz_qa>=51){
                                                          $class_quiz_qa="btn btn-warning";
                                                        }else if($marks_quiz_qa<=80 && $marks_quiz_qa>=71){
                                                          $class_quiz_qa = "btn btn-secondary";
                                                        }else if($marks_quiz_qa<=90 && $marks_quiz_qa>=81){
                                                          $class_quiz_qa = "btn btn-success";
                                                        }else if($marks_quiz_qa<=100 && $marks_quiz_qa>=91){
                                                          $class_quiz_qa = "btn btn-primary";
                                                        }
                                                      }
                                               ?>
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_qa?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_quiz_qa;?>"><?php echo $marks_quiz_qa;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                </tr>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <div class="row justify-content-center" id="May">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1 class="text-success">May</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                   <?php 
                                    $query_mm = "SELECT * FROM gradesheet where class='actual' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='5'";
                                    $statement_mm = $connect->prepare($query_mm);
                                    $statement_mm->execute();
                                    if($statement_mm->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="actual.php">Actual</a></span>
                                   <?php  $result_mm = $statement_mm->fetchAll();
                                            foreach($result_mm as $row)
                                            {
                                              $gradess_mm=$row['over_all_grade'];
                                               $class_ides_mm=$row['class_id'];
                                              $class_name_fect_mm= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                              $class_name_fect_mm->execute([$class_ides_mm]);
                                               $class_name_fects_mm = $class_name_fect_mm->fetchColumn();
                                               $ins_id_mm=$row['instructor'];
                                               $sel_ins_mm= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_mm->execute([$ins_id_mm]);
                                               $sel_ins_name_mm = $sel_ins_mm->fetchColumn();
                                               if($gradess_mm == "U")
                                            {
                                              $class1_mm = "btn btn-danger";
                                            }
                                            elseif ($gradess_mm == "F") 
                                            {
                                              $class1_mm = "btn btn-warning";
                                            }
                                            elseif ($gradess_mm == "G") 
                                            {
                                              $class1_mm = "btn btn-secondary";
                                            }
                                            elseif ($gradess_mm == "V") 
                                            {
                                              $class1_mm = "btn btn-success";
                                            }
                                            elseif ($gradess_mm == "E") 
                                            {
                                              $class1_mm = "btn btn-primary";
                                            }
                                            elseif ($gradess_mm == "N") 
                                            {
                                              $class1_mm = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_mm = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_mm))?>&class_name=<?php echo urlencode(base64_encode('actual'))?>"><?php echo $class_name_fects_mm.' - '.$sel_ins_name_mm.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_mm?>"><?php echo $gradess_mm?></span>
                                                          </a>
                                                        </h4>
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                           
                
                           <?php 
                                    $query1_mm = "SELECT * FROM gradesheet where class='sim' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='5'";
                                    $statement1_mm = $connect->prepare($query1_mm);
                                    $statement1_mm->execute();
                                    if($statement1_mm->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="sim.php">Simulation</a></span>
                                   <?php  $result1_mm = $statement1_mm->fetchAll();
                                            foreach($result1_mm as $row)
                                            {
                                              $gradess1_mm=$row['over_all_grade'];
                                               $class_ides1_mm=$row['class_id'];
                                              $class_name_fect1_mm= $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                              $class_name_fect1_mm->execute([$class_ides1_mm]);
                                               $class_name_fects1_mm = $class_name_fect1_mm->fetchColumn();
                                               $ins_id1_mm=$row['instructor'];
                                               $sel_ins1_mm= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins1_mm->execute([$ins_id1_mm]);
                                               $sel_ins_name1_mm = $sel_ins1_mm->fetchColumn();
                                               if($gradess1_mm == "U")
                                            {
                                              $class1_mm = "btn btn-danger";
                                            }
                                            elseif ($gradess1_mm == "F") 
                                            {
                                              $class1_mm = "btn btn-warning";
                                            }
                                            elseif ($gradess1_mm == "G") 
                                            {
                                              $class1_mm = "btn btn-secondary";
                                            }
                                            elseif ($gradess1_mm == "V") 
                                            {
                                              $class1_mm = "btn btn-success";
                                            }
                                            elseif ($gradess1_mm == "E") 
                                            {
                                              $class1_mm = "btn btn-primary";
                                            }
                                            elseif ($gradess1_mm == "N") 
                                            {
                                              $class1_mm = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_mm = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides1_mm))?>&class_name=<?php echo urlencode(base64_encode('sim'))?>"><?php echo $class_name_fects1_mm.' - '.$sel_ins_name1_mm.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_mm?>"><?php echo $gradess1_mm?></span>
                                                          </a>
                                                        </h4> 
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                  
                  <?php 
                                    $query2_mm = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='5'";
                                    $statement2_mm = $connect->prepare($query2_mm);
                                    $statement2_mm->execute();
                                    if($statement2_mm->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="academic.php">Academic</a></span>
                                   <?php  $result2_mm = $statement2_mm->fetchAll();
                                            foreach($result2_mm as $row2)
                                            {
                                               $class_id_ac_mm=$row2['data'];
                                              $class_name_fect_sc_mm= $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                              $class_name_fect_sc_mm->execute([$class_id_ac_mm]);
                                               $class_name_fect_scs_mm = $class_name_fect_sc_mm->fetchColumn();
                                                $ins_ides_mm=$row2['user_id'];
                                               $sel_ins_Ac_mm= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_Ac_mm->execute([$ins_ides_mm]);
                                               $sel_ins_Ac_name_mm = $sel_ins_Ac_mm->fetchColumn();
                                             
                                            ?>
                                               
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_scs_mm.' - '.$sel_ins_Ac_name_mm;?></a>
                                                        </h4>
                                           
                                            <?php
                                          }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                  <?php 
                                    $query3_mm = "SELECT * FROM test_data where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='5'";
                                    $statement3_mm = $connect->prepare($query3_mm);
                                    $statement3_mm->execute();
                                    if($statement3_mm->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Test</span>
                                   <?php  $result3_mm = $statement3_f->fetchAll();
                                            foreach($result3_mm as $row3)
                                            {
                                              $marks_test_mm=$row3['marks'];
                                              $class_id_te_mm=$row3['test_id'];
                                              $class_name_fect_te_mm= $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                              $class_name_fect_te_mm->execute([$class_id_te_mm]);
                                               $class_name_fect_tes_mm = $class_name_fect_te_mm->fetchColumn();

                                               $class_test_mm="btn btn-dark";
                                                                      if($marks_test_mm!=""){
                                                        if($marks_test_mm<=50 && $marks_test_mm>=0){
                                                              $class_test_mm="btn btn-danger";
                                                        }else if($marks_test_mm<=70 && $marks_test_mm>=51){
                                                          $class_test_mm="btn btn-warning";
                                                        }else if($marks_test_mm<=80 && $marks_test_mm>=71){
                                                          $class_test_mm = "btn btn-secondary";
                                                        }else if($marks_test_mm<=90 && $marks_test_mm>=81){
                                                          $class_test_mm = "btn btn-success";
                                                        }else if($marks_test_mm<=100 && $marks_test_mm>=91){
                                                          $class_test_mm = "btn btn-primary";
                                                        }
                                                      }
                                               ?> 
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_mm?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_test_mm;?>"><?php echo $marks_test_mm;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query5_mm = "SELECT * FROM discipline where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='5'";
                                    $statement5_mm = $connect->prepare($query5_mm);
                                    $statement5_mm->execute();
                                    if($statement5_mm->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="discipline.php">Descipline</a></span>
                                   <?php  $result5_mm = $statement5_mm->fetchAll();
                                            foreach($result5_mm as $row3)
                                            {
                                             
                                              $class_id_me_mm=$row3['topic'];
                                              $desc_inst_mm=$row3['inst_id'];
                                              $instr_name_mm= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_name_mm->execute([$desc_inst_mm]);
                                              $name3_mm = $instr_name_mm->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_me_mm.' - '.$name3_mm;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query6_m = "SELECT * FROM memo where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='5'";
                                    $statement6_m = $connect->prepare($query6_m);
                                    $statement6_m->execute();
                                    if($statement6_m->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="memo.php">Memo</a></span>
                                   <?php  $result6_m = $statement6_m->fetchAll();
                                            foreach($result6_m as $row3)
                                            {
                                             
                                              $class_id_mem_m=$row3['topic'];
                                              $desc_instm_m=$row3['inst_id'];
                                              $instr_namem_m= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_namem_m->execute([$desc_instm_m]);
                                              $name3m_m = $instr_namem_m->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_mem_m.' - '.$name3m_m;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                  <?php 
                                    $query_qm = "SELECT * FROM quiz_marks where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='5'";
                                    $statement_qm = $connect->prepare($query_qm);
                                    $statement_qm->execute();
                                    if($statement_qm->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                  <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="quiz.php">Quiz</a></span>
                                   <?php  $result_qm = $statement_qm->fetchAll();
                                            foreach($result_qm as $row3)
                                            {
                                              $marks_quiz_qm=$row3['marks'];
                                              $class_id_te_qm=$row3['quiz_id'];
                                              $class_name_fect_te_qm= $connect->prepare("SELECT quiz FROM quiz WHERE id=?");
                                              $class_name_fect_te_qm->execute([$class_id_te_qm]);
                                               $class_name_fect_tes_qm = $class_name_fect_te_qm->fetchColumn();

                                                $class_quiz_qm="btn btn-dark";
                                                                      if($marks_quiz_qm!=""){
                                                        if($marks_quiz_qm<=50 && $marks_quiz_qm>=0){
                                                              $class_quiz_qm="btn btn-danger";
                                                        }else if($marks_quiz_qm<=70 && $marks_quiz_qm>=51){
                                                          $class_quiz_qm="btn btn-warning";
                                                        }else if($marks_quiz_qm<=80 && $marks_quiz_qm>=71){
                                                          $class_quiz_qm = "btn btn-secondary";
                                                        }else if($marks_quiz_qm<=90 && $marks_quiz_qm>=81){
                                                          $class_quiz_qm = "btn btn-success";
                                                        }else if($marks_quiz_qm<=100 && $marks_quiz_qm>=91){
                                                          $class_quiz_qm = "btn btn-primary";
                                                        }
                                                      }
                                               ?>
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_qm?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_quiz_qm;?>"><?php echo $marks_quiz_qm;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                </tr>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <div class="row justify-content-center" id="June">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1 class="text-success">June</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                   <?php 
                                    $query_j = "SELECT * FROM gradesheet where class='actual' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='6'";
                                    $statement_j = $connect->prepare($query_j);
                                    $statement_j->execute();
                                    if($statement_j->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="actual.php">Actual</a></span>
                                   <?php  $result_j = $statement_j->fetchAll();
                                            foreach($result_j as $row)
                                            {
                                              $gradess_j=$row['over_all_grade'];
                                               $class_ides_j=$row['class_id'];
                                              $class_name_fect_j= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                              $class_name_fect_j->execute([$class_ides_j]);
                                               $class_name_fects_j = $class_name_fect_j->fetchColumn();
                                               $ins_id_j=$row['instructor'];
                                               $sel_ins_j= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_j->execute([$ins_id_j]);
                                               $sel_ins_name_j = $sel_ins_j->fetchColumn();
                                               if($gradess_j == "U")
                                            {
                                              $class1_j = "btn btn-danger";
                                            }
                                            elseif ($gradess_j == "F") 
                                            {
                                              $class1_j = "btn btn-warning";
                                            }
                                            elseif ($gradess_j == "G") 
                                            {
                                              $class1_j = "btn btn-secondary";
                                            }
                                            elseif ($gradess_j == "V") 
                                            {
                                              $class1_j = "btn btn-success";
                                            }
                                            elseif ($gradess_j == "E") 
                                            {
                                              $class1_j = "btn btn-primary";
                                            }
                                            elseif ($gradess_j == "N") 
                                            {
                                              $class1_j = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_j = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_j))?>&class_name=<?php echo urlencode(base64_encode('actual'))?>"><?php echo $class_name_fects_j.' - '.$sel_ins_name_j.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_j?>"><?php echo $gradess_j?></span>
                                                          </a>
                                                        </h4>
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                           
                
                           <?php 
                                    $query1_j = "SELECT * FROM gradesheet where class='sim' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='6'";
                                    $statement1_j = $connect->prepare($query1_j);
                                    $statement1_j->execute();
                                    if($statement1_j->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="sim.php">Simulation</a></span>
                                   <?php  $result1_j = $statement1_j->fetchAll();
                                            foreach($result1_j as $row)
                                            {
                                              $gradess1_j=$row['over_all_grade'];
                                               $class_ides1_j=$row['class_id'];
                                              $class_name_fect1_j= $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                              $class_name_fect1_j->execute([$class_ides1_j]);
                                               $class_name_fects1_j = $class_name_fect1_j->fetchColumn();
                                               $ins_id1_j=$row['instructor'];
                                               $sel_ins1_j= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins1_j->execute([$ins_id1_j]);
                                               $sel_ins_name1_j = $sel_ins1_j->fetchColumn();
                                               if($gradess1_j == "U")
                                            {
                                              $class_j = "btn btn-danger";
                                            }
                                            elseif ($gradess1_j == "F") 
                                            {
                                              $class_j = "btn btn-warning";
                                            }
                                            elseif ($gradess1_j == "G") 
                                            {
                                              $class_j = "btn btn-secondary";
                                            }
                                            elseif ($gradess1_j == "V") 
                                            {
                                              $class_j = "btn btn-success";
                                            }
                                            elseif ($gradess1_j == "E") 
                                            {
                                              $class_j = "btn btn-primary";
                                            }
                                            elseif ($gradess1_j == "N") 
                                            {
                                              $class_j = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class_j = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides1_j))?>&class_name=<?php echo urlencode(base64_encode('sim'))?>"><?php echo $class_name_fects1_j.' - '.$sel_ins_name1_j.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class_j?>"><?php echo $gradess1_j?></span>
                                                          </a>
                                                        </h4>
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                  
                  <?php 
                                    $query2_j = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='6'";
                                    $statement2_j = $connect->prepare($query2_j);
                                    $statement2_j->execute();
                                    if($statement2_j->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="academic.php">Academic</a></span>
                                   <?php  $result2_j = $statement2_j->fetchAll();
                                            foreach($result2_j as $row2)
                                            {
                                               $class_id_ac_j=$row2['data'];
                                              $class_name_fect_sc_j= $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                              $class_name_fect_sc_j->execute([$class_id_ac_j]);
                                               $class_name_fect_scs_j = $class_name_fect_sc_j->fetchColumn();
                                                $ins_ides_j=$row2['user_id'];
                                               $sel_ins_Ac_j= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_Ac_j->execute([$ins_ides_j]);
                                               $sel_ins_Ac_name_j = $sel_ins_Ac_j->fetchColumn();
                                             
                                            ?>
                                               
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_scs_j.' - '.$sel_ins_Ac_name_j;?></a>
                                                        </h4>
                                           
                                            <?php
                                          }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                  <?php 
                                    $query3_j = "SELECT * FROM test_data where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='6'";
                                    $statement3_j = $connect->prepare($query3_j);
                                    $statement3_j->execute();
                                    if($statement3_j->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Test</span>
                                   <?php  $result3_j = $statement3_j->fetchAll();
                                            foreach($result3_j as $row3)
                                            {
                                              $marks_test_j=$row3['marks'];
                                              $class_id_te_j=$row3['test_id'];
                                              $class_name_fect_te_j= $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                              $class_name_fect_te_j->execute([$class_id_te_j]);
                                               $class_name_fect_tes_j = $class_name_fect_te_j->fetchColumn();

                                               $class_test_j="btn btn-dark";
                                                                      if($marks_test_j!=""){
                                                        if($marks_test_j<=50 && $marks_test_j>=0){
                                                              $class_test_j="btn btn-danger";
                                                        }else if($marks_test_j<=70 && $marks_test_j>=51){
                                                          $class_test_j="btn btn-warning";
                                                        }else if($marks_test_j<=80 && $marks_test_j>=71){
                                                          $class_test_j = "btn btn-secondary";
                                                        }else if($marks_test_j<=90 && $marks_test_j>=81){
                                                          $class_test_j = "btn btn-success";
                                                        }else if($marks_test_j<=100 && $marks_test_j>=91){
                                                          $class_test_j = "btn btn-primary";
                                                        }
                                                      }
                                               ?> 
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_j?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_test_j;?>"><?php echo $marks_test_j;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query5_j = "SELECT * FROM discipline where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='6'";
                                    $statement5_j = $connect->prepare($query5_j);
                                    $statement5_j->execute();
                                    if($statement5_j->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="discipline.php">Descipline</a></span>
                                   <?php  $result5_j = $statement5_j->fetchAll();
                                            foreach($result5_j as $row3)
                                            {
                                             
                                              $class_id_me_j=$row3['topic'];
                                              $desc_inst_j=$row3['inst_id'];
                                              $instr_name_j= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_name_j->execute([$desc_inst_j]);
                                              $name3_j = $instr_name_j->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_me_j.' - '.$name3_j;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query6_jj = "SELECT * FROM memo where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='6'";
                                    $statement6_jj = $connect->prepare($query6_jj);
                                    $statement6_jj->execute();
                                    if($statement6_jj->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="memo.php">Memo</a></span>
                                   <?php  $result6_jj = $statement6_jj->fetchAll();
                                            foreach($result6_jj as $row3)
                                            {
                                             
                                              $class_id_mem_jj=$row3['topic'];
                                              $desc_instm_jj=$row3['inst_id'];
                                              $instr_namem_jj= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_namem_jj->execute([$desc_instm_jj]);
                                              $name3m_jj = $instr_namem_jj->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_mem_jj.' - '.$name3m_jj;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query_qj = "SELECT * FROM quiz_marks where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='6'";
                                    $statement_qj = $connect->prepare($query_qj);
                                    $statement_qj->execute();
                                    if($statement_qj->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                  <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="quiz.php">Quiz</a></span>
                                   <?php  $result_qj = $statement_qj->fetchAll();
                                            foreach($result_qj as $row3)
                                            {
                                              $marks_quiz_qj=$row3['marks'];
                                              $class_id_te_qj=$row3['quiz_id'];
                                              $class_name_fect_te_qj= $connect->prepare("SELECT quiz FROM quiz WHERE id=?");
                                              $class_name_fect_te_qj->execute([$class_id_te_qj]);
                                               $class_name_fect_tes_qj = $class_name_fect_te_qj->fetchColumn();

                                                $class_quiz_qj="btn btn-dark";
                                                                      if($marks_quiz_qj!=""){
                                                        if($marks_quiz_qj<=50 && $marks_quiz_qj>=0){
                                                              $class_quiz_qj="btn btn-danger";
                                                        }else if($marks_quiz_qj<=70 && $marks_quiz_qj>=51){
                                                          $class_quiz_qj="btn btn-warning";
                                                        }else if($marks_quiz_qj<=80 && $marks_quiz_qj>=71){
                                                          $class_quiz_qj = "btn btn-secondary";
                                                        }else if($marks_quiz_qj<=90 && $marks_quiz_qj>=81){
                                                          $class_quiz_qj = "btn btn-success";
                                                        }else if($marks_quiz_qj<=100 && $marks_quiz_qj>=91){
                                                          $class_quiz_qj = "btn btn-primary";
                                                        }
                                                      }
                                               ?>
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_qj?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_quiz_qj;?>"><?php echo $marks_quiz_qj;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                </tr>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <div class="row justify-content-center" id="July">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1 class="text-success">July</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                   <?php 
                                    $query_jj = "SELECT * FROM gradesheet where class='actual' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='7'";
                                    $statement_jj = $connect->prepare($query_jj);
                                    $statement_jj->execute();
                                    if($statement_jj->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="actual.php">Actual</a></span>
                                   <?php  $result_jj = $statement_jj->fetchAll();
                                            foreach($result_jj as $row)
                                            {
                                              $gradess_jj=$row['over_all_grade'];
                                               $class_ides_jj=$row['class_id'];
                                              $class_name_fect_jj= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                              $class_name_fect_jj->execute([$class_ides_jj]);
                                               $class_name_fects_jj = $class_name_fect_jj->fetchColumn();
                                               $ins_id_jj=$row['instructor'];
                                               $sel_ins_jj= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_jj->execute([$ins_id_jj]);
                                               $sel_ins_name_jj = $sel_ins_jj->fetchColumn();
                                               if($gradess_jj == "U")
                                            {
                                              $class_jj = "btn btn-danger";
                                            }
                                            elseif ($gradess_jj == "F") 
                                            {
                                              $class_jj = "btn btn-warning";
                                            }
                                            elseif ($gradess_jj == "G") 
                                            {
                                              $class_jj = "btn btn-secondary";
                                            }
                                            elseif ($gradess_jj == "V") 
                                            {
                                              $class_jj = "btn btn-success";
                                            }
                                            elseif ($gradess_jj == "E") 
                                            {
                                              $class_jj = "btn btn-primary";
                                            }
                                            elseif ($gradess_jj == "N") 
                                            {
                                              $class_jj = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class_jj = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_jj))?>&class_name=<?php echo urlencode(base64_encode('actual'))?>"><?php echo $class_name_fects_jj.' - '.$sel_ins_name_jj.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class_jj?>"><?php echo $gradess_jj?></span>
                                                          </a>
                                                        </h4> 
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                           
                
                           <?php 
                                    $query1_jj = "SELECT * FROM gradesheet where class='sim' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='7'";
                                    $statement1_jj = $connect->prepare($query1_jj);
                                    $statement1_jj->execute();
                                    if($statement1_jj->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="sim.php">Simulation</a></span>
                                   <?php  $result1_jj = $statement1_jj->fetchAll();
                                            foreach($result1_jj as $row)
                                            {
                                              $gradess1_jj=$row['over_all_grade'];
                                               $class_ides1_jj=$row['class_id'];
                                              $class_name_fect1_jj= $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                              $class_name_fect1_jj->execute([$class_ides1_jj]);
                                               $class_name_fects1_jj = $class_name_fect1_jj->fetchColumn();
                                               $ins_id1_jj=$row['instructor'];
                                               $sel_ins1_jj= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins1_jj->execute([$ins_id1_jj]);
                                               $sel_ins_name1_jj = $sel_ins1_jj->fetchColumn();
                                               if($gradess1_jj == "U")
                                            {
                                              $class1_jj = "btn btn-danger";
                                            }
                                            elseif ($gradess1_jj == "F") 
                                            {
                                              $class1_jj = "btn btn-warning";
                                            }
                                            elseif ($gradess1_jj == "G") 
                                            {
                                              $class1_jj = "btn btn-secondary";
                                            }
                                            elseif ($gradess1_jj == "V") 
                                            {
                                              $class1_jj = "btn btn-success";
                                            }
                                            elseif ($gradess1_jj == "E") 
                                            {
                                              $class1_jj = "btn btn-primary";
                                            }
                                            elseif ($gradess1_jj == "N") 
                                            {
                                              $class1_jj = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_jj = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides1_jj))?>&class_name=<?php echo urlencode(base64_encode('sim'))?>"><?php echo $class_name_fects1_jj.' - '.$sel_ins_name1_jj.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_jj?>"><?php echo $gradess1_jj?></span>
                                                          </a>
                                                        </h4>
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                  
                  <?php 
                                    $query2_jj = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='7'";
                                    $statement2_jj = $connect->prepare($query2_jj);
                                    $statement2_jj->execute();
                                    if($statement2_jj->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="academic.php">Academic</a></span>
                                   <?php  $result2_jj = $statement2_jj->fetchAll();
                                            foreach($result2_jj as $row2)
                                            {
                                               $class_id_ac_jj=$row2['data'];
                                              $class_name_fect_sc_jj= $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                              $class_name_fect_sc_jj->execute([$class_id_ac_jj]);
                                               $class_name_fect_scs_jj = $class_name_fect_sc_jj->fetchColumn();
                                                $ins_ides_jj=$row2['user_id'];
                                               $sel_ins_Ac_jj= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_Ac_jj->execute([$ins_ides_jj]);
                                               $sel_ins_Ac_name_jj = $sel_ins_Ac_jj->fetchColumn();
                                             
                                            ?>
                                               
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_scs_jj.' - '.$sel_ins_Ac_name_jj;?></a>
                                                        </h4>
                                           
                                            <?php
                                          }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                  <?php 
                                    $query3_jj = "SELECT * FROM test_data where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='7'";
                                    $statement3_jj = $connect->prepare($query3_jj);
                                    $statement3_jj->execute();
                                    if($statement3_jj->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Test</span>
                                   <?php  $result3_jj = $statement3_jj->fetchAll();
                                            foreach($result3_jj as $row3)
                                            {
                                              $marks_test_jj=$row3['marks'];
                                              $class_id_te_jj=$row3['test_id'];
                                              $class_name_fect_te_jj= $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                              $class_name_fect_te_jj->execute([$class_id_te_jj]);
                                               $class_name_fect_tes_jj = $class_name_fect_te_jj->fetchColumn();

                                               $class_test_jj="btn btn-dark";
                                                                      if($marks_test_jj!=""){
                                                        if($marks_test_jj<=50 && $marks_test_jj>=0){
                                                              $class_test_jj="btn btn-danger";
                                                        }else if($marks_test_jj<=70 && $marks_test_jj>=51){
                                                          $class_test_jj="btn btn-warning";
                                                        }else if($marks_test_jj<=80 && $marks_test_jj>=71){
                                                          $class_test_jj = "btn btn-secondary";
                                                        }else if($marks_test_jj<=90 && $marks_test_jj>=81){
                                                          $class_test_jj = "btn btn-success";
                                                        }else if($marks_test_jj<=100 && $marks_test_jj>=91){
                                                          $class_test_jj = "btn btn-primary";
                                                        }
                                                      }
                                               ?> 
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_jj?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_test_jj;?>"><?php echo $marks_test_jj;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                <?php 
                                    $query5_jj = "SELECT * FROM discipline where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='7'";
                                    $statement5_jj = $connect->prepare($query5_jj);
                                    $statement5_jj->execute();
                                    if($statement5_jj->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="discipline.php">Descipline</a></span>
                                   <?php  $result5_jj = $statement5_jj->fetchAll();
                                            foreach($result5_jj as $row3)
                                            {
                                             
                                              $class_id_me_jj=$row3['topic'];
                                              $desc_inst_jj=$row3['inst_id'];
                                              $instr_name_jj= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_name_jj->execute([$desc_inst_jj]);
                                              $name3_jj = $instr_name_jj->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_me_jj.' - '.$name3_jj;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                    <?php 
                                    $query6_jjj = "SELECT * FROM memo where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='7'";
                                    $statement6_jjj = $connect->prepare($query6_jjj);
                                    $statement6_jjj->execute();
                                    if($statement6_jjj->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="memo.php">Memo</a></span>
                                   <?php  $result6_jjj = $statement6_jjj->fetchAll();
                                            foreach($result6_jjj as $row3)
                                            {
                                             
                                              $class_id_mem_jjj=$row3['topic'];
                                              $desc_instm_jjj=$row3['inst_id'];
                                              $instr_namem_jjj= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_namem_jjj->execute([$desc_instm_jjj]);
                                              $name3m_jjj = $instr_namem_jjj->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_mem_jjj.' - '.$name3m_jjj;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                   
                   <?php 
                                    $query_qjj = "SELECT * FROM quiz_marks where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='7'";
                                    $statement_qjj = $connect->prepare($query_qjj);
                                    $statement_qjj->execute();
                                    if($statement_qjj->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                  <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="quiz.php">Quiz</a></span>
                                   <?php  $result_qjj = $statement_qjj->fetchAll();
                                            foreach($result_qjj as $row3)
                                            {
                                              $marks_quiz_qjj=$row3['marks'];
                                              $class_id_te_qjj=$row3['quiz_id'];
                                              $class_name_fect_te_qjj= $connect->prepare("SELECT quiz FROM quiz WHERE id=?");
                                              $class_name_fect_te_qjj->execute([$class_id_te_qjj]);
                                               $class_name_fect_tes_qjj = $class_name_fect_te_qjj->fetchColumn();

                                                $class_quiz_qjj="btn btn-dark";
                                                                      if($marks_quiz_qjj!=""){
                                                        if($marks_quiz_qjj<=50 && $marks_quiz_qjj>=0){
                                                              $class_quiz_qjj="btn btn-danger";
                                                        }else if($marks_quiz_qjj<=70 && $marks_quiz_qjj>=51){
                                                          $class_quiz_qjj="btn btn-warning";
                                                        }else if($marks_quiz_qjj<=80 && $marks_quiz_qjj>=71){
                                                          $class_quiz_qjj = "btn btn-secondary";
                                                        }else if($marks_quiz_qjj<=90 && $marks_quiz_qjj>=81){
                                                          $class_quiz_qjj = "btn btn-success";
                                                        }else if($marks_quiz_qjj<=100 && $marks_quiz_qjj>=91){
                                                          $class_quiz_qjj = "btn btn-primary";
                                                        }
                                                      }
                                               ?>
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_qjj?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_quiz_qjj;?>"><?php echo $marks_quiz_qjj;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?> 
                </tr>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <div class="row justify-content-center" id="August">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1 class="text-success">August</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <?php 
                                    $query_aa = "SELECT * FROM gradesheet where class='actual' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='8'";
                                    $statement_aa = $connect->prepare($query_aa);
                                    $statement_aa->execute();
                                    if($statement_aa->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="actual.php">Actual</a></span>
                                   <?php  $result_aa = $statement_aa->fetchAll();
                                            foreach($result_aa as $row)
                                            {
                                              $gradess_aa=$row['over_all_grade'];
                                               $class_ides_aa=$row['class_id'];
                                              $class_name_fect_aa= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                              $class_name_fect_aa->execute([$class_ides_aa]);
                                               $class_name_fects_aa = $class_name_fect_aa->fetchColumn();
                                               $ins_id_aa=$row['instructor'];
                                               $sel_ins_aa= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_aa->execute([$ins_id_aa]);
                                               $sel_ins_name_aa = $sel_ins_aa->fetchColumn();
                                               if($gradess_aa == "U")
                                            {
                                              $class_aa = "btn btn-danger";
                                            }
                                            elseif ($gradess_aa == "F") 
                                            {
                                              $class_aa = "btn btn-warning";
                                            }
                                            elseif ($gradess_aa == "G") 
                                            {
                                              $class_aa = "btn btn-secondary";
                                            }
                                            elseif ($gradess_aa == "V") 
                                            {
                                              $class_aa = "btn btn-success";
                                            }
                                            elseif ($gradess_aa == "E") 
                                            {
                                              $class_aa = "btn btn-primary";
                                            }
                                            elseif ($gradess_aa == "N") 
                                            {
                                              $class_aa = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class_aa = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_aa))?>&class_name=<?php echo urlencode(base64_encode('actual'))?>"><?php echo $class_name_fects_aa.' - '.$sel_ins_name_aa.' / '?>
                                                          <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class_aa?>"><?php echo $gradess_aa?></span>
                                                          </a>
                                                       </h4>
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                           
                
                           <?php 
                                    $query1_aa = "SELECT * FROM gradesheet where class='sim' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='8'";
                                    $statement1_aa = $connect->prepare($query1_aa);
                                    $statement1_aa->execute();
                                    if($statement1_aa->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="sim.php">Simulation</a></span>
                                   <?php  $result1_aa = $statement1_aa->fetchAll();
                                            foreach($result1_aa as $row)
                                            {
                                              $gradess1_aa=$row['over_all_grade'];
                                               $class_ides1_aa=$row['class_id'];
                                              $class_name_fect1_aa= $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                              $class_name_fect1_aa->execute([$class_ides1_aa]);
                                               $class_name_fects1_aa = $class_name_fect1_aa->fetchColumn();
                                               $ins_id1_aa=$row['instructor'];
                                               $sel_ins1_aa= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins1_aa->execute([$ins_id1_aa]);
                                               $sel_ins_name1_aa = $sel_ins1_aa->fetchColumn();
                                               if($gradess1_aa == "U")
                                            {
                                              $class1_aa = "btn btn-danger";
                                            }
                                            elseif ($gradess1_aa == "F") 
                                            {
                                              $class1_aa = "btn btn-warning";
                                            }
                                            elseif ($gradess1_aa == "G") 
                                            {
                                              $class1_aa = "btn btn-secondary";
                                            }
                                            elseif ($gradess1_aa == "V") 
                                            {
                                              $class1_aa = "btn btn-success";
                                            }
                                            elseif ($gradess1_aa == "E") 
                                            {
                                              $class1_aa = "btn btn-primary";
                                            }
                                            elseif ($gradess1_aa == "N") 
                                            {
                                              $class1_aa = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_aa = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides1_aa))?>&class_name=<?php echo urlencode(base64_encode('sim'))?>"><?php echo $class_name_fects1_aa.' - '.$sel_ins_name1_aa.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_aa?>"><?php echo $gradess1_aa?></span>
                                                          </a>
                                                        </h4> 
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                  
                  <?php 
                                    $query2_aa = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='8'";
                                    $statement2_aa = $connect->prepare($query2_aa);
                                    $statement2_aa->execute();
                                    if($statement2_aa->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="academic.php">Academic</a></span>
                                   <?php  $result2_aa = $statement2_aa->fetchAll();
                                            foreach($result2_aa as $row2)
                                            {
                                               $class_id_ac_aa=$row2['data'];
                                              $class_name_fect_sc_aa= $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                              $class_name_fect_sc_aa->execute([$class_id_ac_aa]);
                                               $class_name_fect_scs_aa = $class_name_fect_sc_aa->fetchColumn();
                                                $ins_ides_aa=$row2['user_id'];
                                               $sel_ins_Ac_aa= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_Ac_aa->execute([$ins_ides_aa]);
                                               $sel_ins_Ac_name_aa = $sel_ins_Ac_aa->fetchColumn();
                                             
                                            ?>
                                               
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_scs_aa.' - '.$sel_ins_Ac_name_aa;?></a>
                                                        </h4>
                                           
                                            <?php
                                          }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                  <?php 
                                    $query3_aa = "SELECT * FROM test_data where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='8'";
                                    $statement3_aa = $connect->prepare($query3_aa);
                                    $statement3_aa->execute();
                                    if($statement3_aa->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Test</span>
                                   <?php  $result3_aa = $statement3_aa->fetchAll();
                                            foreach($result3_aa as $row3)
                                            {
                                              $marks_test_aa=$row3['marks'];
                                              $class_id_te_aa=$row3['test_id'];
                                              $class_name_fect_te_aa= $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                              $class_name_fect_te_aa->execute([$class_id_te_aa]);
                                               $class_name_fect_tes_aa = $class_name_fect_te_aa->fetchColumn();

                                               $class_test_aa="btn btn-dark";
                                                                      if($marks_test_aa!=""){
                                                        if($marks_test_aa<=50 && $marks_test_aa>=0){
                                                              $class_test_aa="btn btn-danger";
                                                        }else if($marks_test_aa<=70 && $marks_test_aa>=51){
                                                          $class_test_aa="btn btn-warning";
                                                        }else if($marks_test_aa<=80 && $marks_test_aa>=71){
                                                          $class_test_aa = "btn btn-secondary";
                                                        }else if($marks_test_aa<=90 && $marks_test_aa>=81){
                                                          $class_test_aa = "btn btn-success";
                                                        }else if($marks_test_aa<=100 && $marks_test_aa>=91){
                                                          $class_test_aa = "btn btn-primary";
                                                        }
                                                      }
                                               ?> 
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_aa?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_test_aa;?>"><?php echo $marks_test_aa;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query5_aa = "SELECT * FROM discipline where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='8'";
                                    $statement5_aa = $connect->prepare($query5_aa);
                                    $statement5_aa->execute();
                                    if($statement5_aa->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="discipline.php">Descipline</a></span>
                                   <?php  $result5_aa = $statement5_aa->fetchAll();
                                            foreach($result5_aa as $row3)
                                            {
                                             
                                              $class_id_me_aa=$row3['topic'];
                                              $desc_inst_aa=$row3['inst_id'];
                                              $instr_name_aa= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_name_aa->execute([$desc_inst_aa]);
                                              $name3_aa = $instr_name_aa->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_me_aa.' - '.$name3_aa;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query6_aa = "SELECT * FROM memo where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='8'";
                                    $statement6_aa = $connect->prepare($query6_aa);
                                    $statement6_aa->execute();
                                    if($statement6_aa->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="memo.php">Memo</a></span>
                                   <?php  $result6_aa = $statement6_aa->fetchAll();
                                            foreach($result6_aa as $row3)
                                            {
                                             
                                              $class_id_mem_aa=$row3['topic'];
                                              $desc_instm_aa=$row3['inst_id'];
                                              $instr_namem_aa= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_namem_aa->execute([$desc_instm_aa]);
                                              $name3m_aa = $instr_namem_aa->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_mem_aa.' - '.$name3m_aa;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                    <?php 
                                    $query_qaa = "SELECT * FROM quiz_marks where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='8'";
                                    $statement_qaa = $connect->prepare($query_qaa);
                                    $statement_qaa->execute();
                                    if($statement_qaa->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                  <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="quiz.php">Quiz</a></span>
                                   <?php  $result_qaa = $statement_qaa->fetchAll();
                                            foreach($result_qaa as $row3)
                                            {
                                              $marks_quiz_qaa=$row3['marks'];
                                              $class_id_te_qaa=$row3['quiz_id'];
                                              $class_name_fect_te_qaa= $connect->prepare("SELECT quiz FROM quiz WHERE id=?");
                                              $class_name_fect_te_qaa->execute([$class_id_te_qaa]);
                                               $class_name_fect_tes_qaa = $class_name_fect_te_qaa->fetchColumn();

                                                $class_quiz_qaa="btn btn-dark";
                                                                      if($marks_quiz_qaa!=""){
                                                        if($marks_quiz_qaa<=50 && $marks_quiz_qaa>=0){
                                                              $class_quiz_qaa="btn btn-danger";
                                                        }else if($marks_quiz_qaa<=70 && $marks_quiz_qaa>=51){
                                                          $class_quiz_qaa="btn btn-warning";
                                                        }else if($marks_quiz_qaa<=80 && $marks_quiz_qaa>=71){
                                                          $class_quiz_qaa = "btn btn-secondary";
                                                        }else if($marks_quiz_qaa<=90 && $marks_quiz_qaa>=81){
                                                          $class_quiz_qaa = "btn btn-success";
                                                        }else if($marks_quiz_qaa<=100 && $marks_quiz_qaa>=91){
                                                          $class_quiz_qaa = "btn btn-primary";
                                                        }
                                                      }
                                               ?>
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_qaa?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_quiz_qaa;?>"><?php echo $marks_quiz_qaa;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                </tr>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <div class="row justify-content-center" id="September">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1 class="text-success">September</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <?php 
                                    $query_s = "SELECT * FROM gradesheet where class='actual' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='9'";
                                    $statement_s = $connect->prepare($query_s);
                                    $statement_s->execute();
                                    if($statement_s->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="actual.php">Actual</a></span>
                                   <?php  $result_s = $statement_s->fetchAll();
                                            foreach($result_s as $row)
                                            {
                                              $gradess_s=$row['over_all_grade'];
                                               $class_ides_s=$row['class_id'];
                                              $class_name_fect_s= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                              $class_name_fect_s->execute([$class_ides_s]);
                                               $class_name_fects_s = $class_name_fect_s->fetchColumn();
                                               $ins_id_s=$row['instructor'];
                                               $sel_ins_s= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_s->execute([$ins_id_s]);
                                               $sel_ins_name_s = $sel_ins_s->fetchColumn();
                                               if($gradess_s == "U")
                                            {
                                              $class_s = "btn btn-danger";
                                            }
                                            elseif ($gradess_s == "F") 
                                            {
                                              $class_s = "btn btn-warning";
                                            }
                                            elseif ($gradess_s == "G") 
                                            {
                                              $class_s = "btn btn-secondary";
                                            }
                                            elseif ($gradess_s == "V") 
                                            {
                                              $class_s = "btn btn-success";
                                            }
                                            elseif ($gradess_s == "E") 
                                            {
                                              $class_s = "btn btn-primary";
                                            }
                                            elseif ($gradess_s == "N") 
                                            {
                                              $class_s = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class_s = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_s))?>&class_name=<?php echo urlencode(base64_encode('actual'))?>"><?php echo $class_name_fects_s.' - '.$sel_ins_name_s.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class_s?>"><?php echo $gradess_s?></span>
                                                          </a>
                                                        </h4>
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                           
                
                           <?php 
                                    $query1_s = "SELECT * FROM gradesheet where class='sim' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='9'";
                                    $statement1_s = $connect->prepare($query1_s);
                                    $statement1_s->execute();
                                    if($statement1_s->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="sim.php">Simulation</a></span>
                                   <?php  $result1_s = $statement1_s->fetchAll();
                                            foreach($result1_s as $row)
                                            {
                                              $gradess1_s=$row['over_all_grade'];
                                               $class_ides1_s=$row['class_id'];
                                              $class_name_fect1_s= $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                              $class_name_fect1_s->execute([$class_ides1_s]);
                                               $class_name_fects1_s = $class_name_fect1_s->fetchColumn();
                                               $ins_id1_s=$row['instructor'];
                                               $sel_ins1_s= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins1_s->execute([$ins_id1_s]);
                                               $sel_ins_name1_s = $sel_ins1_s->fetchColumn();
                                               if($gradess1_s == "U")
                                            {
                                              $class1_s = "btn btn-danger";
                                            }
                                            elseif ($gradess1_s == "F") 
                                            {
                                              $class1_s = "btn btn-warning";
                                            }
                                            elseif ($gradess1_s == "G") 
                                            {
                                              $class1_s = "btn btn-secondary";
                                            }
                                            elseif ($gradess1_s == "V") 
                                            {
                                              $class1_s = "btn btn-success";
                                            }
                                            elseif ($gradess1_s == "E") 
                                            {
                                              $class1_s = "btn btn-primary";
                                            }
                                            elseif ($gradess1_s == "N") 
                                            {
                                              $class1_s = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_s = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides1_s))?>&class_name=<?php echo urlencode(base64_encode('sim'))?>"><?php echo $class_name_fects1_s.' - '.$sel_ins_name1_s.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_s?>"><?php echo $gradess1_s?></span>
                                                          </a>
                                                        </h4>
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                  
                  <?php 
                                    $query2_s = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='9'";
                                    $statement2_s = $connect->prepare($query2_s);
                                    $statement2_s->execute();
                                    if($statement2_s->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="academic.php">Academic</a></span>
                                   <?php  $result2_s = $statement2_s->fetchAll();
                                            foreach($result2_s as $row2)
                                            {
                                               $class_id_ac_s=$row2['data'];
                                              $class_name_fect_sc_s= $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                              $class_name_fect_sc_s->execute([$class_id_ac_s]);
                                               $class_name_fect_scs_s = $class_name_fect_sc_s->fetchColumn();
                                                $ins_ides_s=$row2['user_id'];
                                               $sel_ins_Ac_s= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_Ac_s->execute([$ins_ides_s]);
                                               $sel_ins_Ac_name_s = $sel_ins_Ac_s->fetchColumn();
                                             
                                            ?>
                                               
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_scs_s.' - '.$sel_ins_Ac_name_s;?></a>
                                                        </h4>
                                           
                                            <?php
                                          }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                 <?php 
                                    $query3_s = "SELECT * FROM test_data where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='9'";
                                    $statement3_s = $connect->prepare($query3_s);
                                    $statement3_s->execute();
                                    if($statement3_s->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Test</span>
                                   <?php  $result3_s = $statement3_s->fetchAll();
                                            foreach($result3_s as $row3)
                                            {
                                              $marks_test_s=$row3['marks'];
                                              $class_id_te_s=$row3['test_id'];
                                              $class_name_fect_te_s= $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                              $class_name_fect_te_s->execute([$class_id_te_s]);
                                               $class_name_fect_tes_s = $class_name_fect_te_s->fetchColumn();

                                               $class_test_s="btn btn-dark";
                                                                      if($marks_test_s!=""){
                                                        if($marks_test_s<=50 && $marks_test_s>=0){
                                                              $class_test_s="btn btn-danger";
                                                        }else if($marks_test_s<=70 && $marks_test_s>=51){
                                                          $class_test_s="btn btn-warning";
                                                        }else if($marks_test_s<=80 && $marks_test_s>=71){
                                                          $class_test_s = "btn btn-secondary";
                                                        }else if($marks_test_s<=90 && $marks_test_s>=81){
                                                          $class_test_s = "btn btn-success";
                                                        }else if($marks_test_s<=100 && $marks_test_s>=91){
                                                          $class_test_s = "btn btn-primary";
                                                        }
                                                      }
                                               ?> 
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_s?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_test_s;?>"><?php echo $marks_test_s;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                      <?php 
                                    $query5_s = "SELECT * FROM discipline where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='9'";
                                    $statement5_s = $connect->prepare($query5_s);
                                    $statement5_s->execute();
                                    if($statement5_s->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="discipline.php">Descipline</a></span>
                                   <?php  $result5_s = $statement5_s->fetchAll();
                                            foreach($result5_s as $row3)
                                            {
                                             
                                              $class_id_me_s=$row3['topic'];
                                              $desc_inst_s=$row3['inst_id'];
                                              $instr_name_s= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_name_s->execute([$desc_inst_s]);
                                              $name3_s = $instr_name_s->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_me_s.' - '.$name3_s;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                    <?php 
                                    $query6_s = "SELECT * FROM memo where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='9'";
                                    $statement6_s = $connect->prepare($query6_s);
                                    $statement6_s->execute();
                                    if($statement6_s->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="memo.php">Memo</a></span>
                                   <?php  $result6_s = $statement6_s->fetchAll();
                                            foreach($result6_s as $row3)
                                            {
                                             
                                              $class_id_mem_s=$row3['topic'];
                                              $desc_instm_s=$row3['inst_id'];
                                              $instr_namem_s= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_namem_s->execute([$desc_instm_s]);
                                              $name3m_s = $instr_namem_s->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_mem_s.' - '.$name3m_s;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                    <?php 
                                    $query_qs = "SELECT * FROM quiz_marks where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='9'";
                                    $statement_qs = $connect->prepare($query_qs);
                                    $statement_qs->execute();
                                    if($statement_qs->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                  <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="quiz.php">Quiz</a></span>
                                   <?php  $result_qs = $statement_qs->fetchAll();
                                            foreach($result_qs as $row3)
                                            {
                                              $marks_quiz_qs=$row3['marks'];
                                              $class_id_te_qs=$row3['quiz_id'];
                                              $class_name_fect_te_qs= $connect->prepare("SELECT quiz FROM quiz WHERE id=?");
                                              $class_name_fect_te_qs->execute([$class_id_te_qs]);
                                               $class_name_fect_tes_qs = $class_name_fect_te_qs->fetchColumn();

                                                $class_quiz_qs="btn btn-dark";
                                                                      if($marks_quiz_qs!=""){
                                                        if($marks_quiz_qs<=50 && $marks_quiz_qs>=0){
                                                              $class_quiz_qs="btn btn-danger";
                                                        }else if($marks_quiz_qs<=70 && $marks_quiz_qs>=51){
                                                          $class_quiz_qs="btn btn-warning";
                                                        }else if($marks_quiz_qs<=80 && $marks_quiz_qs>=71){
                                                          $class_quiz_qs = "btn btn-secondary";
                                                        }else if($marks_quiz_qs<=90 && $marks_quiz_qs>=81){
                                                          $class_quiz_qs = "btn btn-success";
                                                        }else if($marks_quiz_qs<=100 && $marks_quiz_qs>=91){
                                                          $class_quiz_qs = "btn btn-primary";
                                                        }
                                                      }
                                               ?>
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_qs?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_quiz_qs;?>"><?php echo $marks_quiz_qs;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                </tr>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <div class="row justify-content-center" id="October">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1 class="text-success">October</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <?php 
                                    $query_o = "SELECT * FROM gradesheet where class='actual' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='10'";
                                    $statement_o = $connect->prepare($query_o);
                                    $statement_o->execute();
                                    if($statement_o->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="actual.php">Actual</a></span>
                                   <?php  $result_o = $statement_o->fetchAll();
                                            foreach($result_o as $row)
                                            {
                                              $gradess_o=$row['over_all_grade'];
                                               $class_ides_o=$row['class_id'];
                                              $class_name_fect_o= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                              $class_name_fect_o->execute([$class_ides_o]);
                                               $class_name_fects_o = $class_name_fect_o->fetchColumn();
                                               $ins_id_o=$row['instructor'];
                                               $sel_ins_o= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_o->execute([$ins_id_o]);
                                               $sel_ins_name_o = $sel_ins_o->fetchColumn();
                                               if($gradess_o == "U")
                                            {
                                              $class_o = "btn btn-danger";
                                            }
                                            elseif ($gradess_o == "F") 
                                            {
                                              $class_o = "btn btn-warning";
                                            }
                                            elseif ($gradess_o == "G") 
                                            {
                                              $class_o = "btn btn-secondary";
                                            }
                                            elseif ($gradess_o == "V") 
                                            {
                                              $class_o = "btn btn-success";
                                            }
                                            elseif ($gradess_o == "E") 
                                            {
                                              $class_o = "btn btn-primary";
                                            }
                                            elseif ($gradess_o == "N") 
                                            {
                                              $class_o = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class_o = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_o))?>&class_name=<?php echo urlencode(base64_encode('actual'))?>"><?php echo $class_name_fects_o.' - '.$sel_ins_name_o.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class_o?>"><?php echo $gradess_o?></span>
                                                          </a>
                                                        </h4>
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                           
                
                           <?php 
                                    $query1_o = "SELECT * FROM gradesheet where class='sim' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='10'";
                                    $statement1_o = $connect->prepare($query1_o);
                                    $statement1_o->execute();
                                    if($statement1_o->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="sim.php">Simulation</a></span>
                                   <?php  $result1_o = $statement1_o->fetchAll();
                                            foreach($result1_o as $row)
                                            {
                                              $gradess1_o=$row['over_all_grade'];
                                               $class_ides1_o=$row['class_id'];
                                              $class_name_fect1_o= $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                              $class_name_fect1_o->execute([$class_ides1_o]);
                                               $class_name_fects1_o = $class_name_fect1_o->fetchColumn();
                                               $ins_id1_o=$row['instructor'];
                                               $sel_ins1_o= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins1_o->execute([$ins_id1_o]);
                                               $sel_ins_name1_o = $sel_ins1_o->fetchColumn();

                                               if($gradess1_o == "U")
                                            {
                                              $class1_o = "btn btn-danger";
                                            }
                                            elseif ($gradess1_o == "F") 
                                            {
                                              $class1_o = "btn btn-warning";
                                            }
                                            elseif ($gradess1_o == "G") 
                                            {
                                              $class1_o = "btn btn-secondary";
                                            }
                                            elseif ($gradess1_o == "V") 
                                            {
                                              $class1_o = "btn btn-success";
                                            }
                                            elseif ($gradess1_o == "E") 
                                            {
                                              $class1_o = "btn btn-primary";
                                            }
                                            elseif ($gradess1_o == "N") 
                                            {
                                              $class1_o = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_o = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides1_o))?>&class_name=<?php echo urlencode(base64_encode('sim'))?>"><?php echo $class_name_fects1_o.' - '.$sel_ins_name1_o.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_o?>"><?php echo $gradess1_o?></span>
                                                          </a>
                                                        </h4>
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                  
                  <?php 
                                    $query2_o = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='10'";
                                    $statement2_o = $connect->prepare($query2_o);
                                    $statement2_o->execute();
                                    if($statement2_o->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="academic.php">Academic</a></span>
                                   <?php  $result2_o = $statement2_o->fetchAll();
                                            foreach($result2_o as $row2)
                                            {
                                               $class_id_ac_o=$row2['data'];
                                              $class_name_fect_sc_o= $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                              $class_name_fect_sc_o->execute([$class_id_ac_o]);
                                               $class_name_fect_scs_o = $class_name_fect_sc_o->fetchColumn();
                                                $ins_ides_o=$row2['user_id'];
                                               $sel_ins_Ac_o= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_Ac_o->execute([$ins_ides_o]);
                                               $sel_ins_Ac_name_o = $sel_ins_Ac_o->fetchColumn();
                                             
                                            ?>
                                               
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_scs_o.' - '.$sel_ins_Ac_name_o;?></a>
                                                        </h4>
                                           
                                            <?php
                                          }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                  <?php 
                                    $query3_o = "SELECT * FROM test_data where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='10'";
                                    $statement3_o = $connect->prepare($query3_o);
                                    $statement3_o->execute();
                                    if($statement3_o->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Test</span>
                                   <?php  $result3_o = $statement3_o->fetchAll();
                                            foreach($result3_o as $row3)
                                            {
                                              $marks_test_o=$row3['marks'];
                                              $class_id_te_o=$row3['test_id'];
                                              $class_name_fect_te_o= $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                              $class_name_fect_te_o->execute([$class_id_te_o]);
                                               $class_name_fect_tes_o = $class_name_fect_te_o->fetchColumn();

                                               $class_test_o="btn btn-dark";
                                                                      if($marks_test_o!=""){
                                                        if($marks_test_o<=50 && $marks_test_o>=0){
                                                              $class_test_o="btn btn-danger";
                                                        }else if($marks_test_o<=70 && $marks_test_o>=51){
                                                          $class_test_o="btn btn-warning";
                                                        }else if($marks_test_o<=80 && $marks_test_o>=71){
                                                          $class_test_o = "btn btn-secondary";
                                                        }else if($marks_test_o<=90 && $marks_test_o>=81){
                                                          $class_test_o = "btn btn-success";
                                                        }else if($marks_test_o<=100 && $marks_test_o>=91){
                                                          $class_test_o = "btn btn-primary";
                                                        }
                                                      }
                                               ?> 
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_o?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_test_o;?>"><?php echo $marks_test_o;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                    <?php 
                                    $query5_o = "SELECT * FROM discipline where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='10'";
                                    $statement5_o = $connect->prepare($query5_o);
                                    $statement5_o->execute();
                                    if($statement5_o->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="discipline.php">Descipline</a></span>
                                   <?php  $result5_o = $statement5_o->fetchAll();
                                            foreach($result5_o as $row3)
                                            {
                                             
                                              $class_id_me_o=$row3['topic'];
                                              $desc_inst_o=$row3['inst_id'];
                                              $instr_name_o= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_name_o->execute([$desc_inst_o]);
                                              $name3_o = $instr_name_o->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_me_o.' - '.$name3_o;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                    <?php 
                                    $query6_o = "SELECT * FROM memo where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='10'";
                                    $statement6_o = $connect->prepare($query6_o);
                                    $statement6_o->execute();
                                    if($statement6_o->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="memo.php">Memo</a></span>
                                   <?php  $result6_o = $statement6_o->fetchAll();
                                            foreach($result6_o as $row3)
                                            {
                                             
                                              $class_id_mem_o=$row3['topic'];
                                              $desc_instm_o=$row3['inst_id'];
                                              $instr_namem_o= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_namem_o->execute([$desc_instm_o]);
                                              $name3m_o = $instr_namem_o->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_mem_o.' - '.$name3m_o;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                    <?php 
                                    $query_qo = "SELECT * FROM quiz_marks where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='10'";
                                    $statement_qo = $connect->prepare($query_qo);
                                    $statement_qo->execute();
                                    if($statement_qo->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                  <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="quiz.php">Quiz</a></span>
                                   <?php  $result_qo = $statement_qo->fetchAll();
                                            foreach($result_qo as $row3)
                                            {
                                              $marks_quiz_qo=$row3['marks'];
                                              $class_id_te_qo=$row3['quiz_id'];
                                              $class_name_fect_te_qo= $connect->prepare("SELECT quiz FROM quiz WHERE id=?");
                                              $class_name_fect_te_qo->execute([$class_id_te_qo]);
                                               $class_name_fect_tes_qo = $class_name_fect_te_qo->fetchColumn();

                                                $class_quiz_qo="btn btn-dark";
                                                                      if($marks_quiz_qo!=""){
                                                        if($marks_quiz_qo<=50 && $marks_quiz_qo>=0){
                                                              $class_quiz_qo="btn btn-danger";
                                                        }else if($marks_quiz_qo<=70 && $marks_quiz_qo>=51){
                                                          $class_quiz_qo="btn btn-warning";
                                                        }else if($marks_quiz_qo<=80 && $marks_quiz_qo>=71){
                                                          $class_quiz_qo = "btn btn-secondary";
                                                        }else if($marks_quiz_qo<=90 && $marks_quiz_qo>=81){
                                                          $class_quiz_qo = "btn btn-success";
                                                        }else if($marks_quiz_qo<=100 && $marks_quiz_qo>=91){
                                                          $class_quiz_qo = "btn btn-primary";
                                                        }
                                                      }
                                               ?>
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_qo?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_quiz_qo;?>"><?php echo $marks_quiz_qo;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                </tr>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <div class="row justify-content-center" id="November">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1 class="text-success">November</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <?php 
                                    $query_n = "SELECT * FROM gradesheet where class='actual' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='11'";
                                    $statement_n = $connect->prepare($query_n);
                                    $statement_n->execute();
                                    if($statement_n->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="actual.php">Actual</a></span>
                                   <?php  $result_n = $statement_n->fetchAll();
                                            foreach($result_n as $row)
                                            {
                                              $gradess_n=$row['over_all_grade'];
                                               $class_ides_n=$row['class_id'];
                                              $class_name_fect_n= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                              $class_name_fect_n->execute([$class_ides_n]);
                                               $class_name_fects_n = $class_name_fect_n->fetchColumn();
                                               $ins_id_n=$row['instructor'];
                                               $sel_ins_n= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_n->execute([$ins_id_n]);
                                               $sel_ins_name_n = $sel_ins_n->fetchColumn();
                                               if($gradess_n == "U")
                                            {
                                              $class_n = "btn btn-danger";
                                            }
                                            elseif ($gradess_n == "F") 
                                            {
                                              $class_n = "btn btn-warning";
                                            }
                                            elseif ($gradess_n == "G") 
                                            {
                                              $class_n = "btn btn-secondary";
                                            }
                                            elseif ($gradess_n == "V") 
                                            {
                                              $class_n = "btn btn-success";
                                            }
                                            elseif ($gradess_n == "E") 
                                            {
                                              $class_n = "btn btn-primary";
                                            }
                                            elseif ($gradess_n == "N") 
                                            {
                                              $class_n = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class_n = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_n))?>&class_name=<?php echo urlencode(base64_encode('actual'))?>"><?php echo $class_name_fects_n.' - '.$sel_ins_name_n.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class_n?>"><?php echo $gradess_n?></span>
                                                          </a>
                                                        </h4>
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                           
                
                           <?php 
                                    $query1_n = "SELECT * FROM gradesheet where class='sim' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='11'";
                                    $statement1_n = $connect->prepare($query1_n);
                                    $statement1_n->execute();
                                    if($statement1_n->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="sim.php">Simulation</a></span>
                                   <?php  $result1_n = $statement1_n->fetchAll();
                                            foreach($result1_n as $row)
                                            {
                                              $gradess1_n=$row['over_all_grade'];
                                               $class_ides1_n=$row['class_id'];
                                              $class_name_fect1_n= $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                              $class_name_fect1_n->execute([$class_ides1_n]);
                                               $class_name_fects1_n = $class_name_fect1_n->fetchColumn();
                                               $ins_id1_n=$row['instructor'];
                                               $sel_ins1_n= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins1_n->execute([$ins_id1_n]);
                                               $sel_ins_name1_n = $sel_ins1_n->fetchColumn();
                                               if($gradess1_n == "U")
                                            {
                                              $class1_n = "btn btn-danger";
                                            }
                                            elseif ($gradess1_n == "F") 
                                            {
                                              $class1_n = "btn btn-warning";
                                            }
                                            elseif ($gradess1_n == "G") 
                                            {
                                              $class1_n = "btn btn-secondary";
                                            }
                                            elseif ($gradess1_n == "V") 
                                            {
                                              $class1_n = "btn btn-success";
                                            }
                                            elseif ($gradess1_n == "E") 
                                            {
                                              $class1_n = "btn btn-primary";
                                            }
                                            elseif ($gradess1_n == "N") 
                                            {
                                              $class1_n = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_n = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides1_n))?>&class_name=<?php echo urlencode(base64_encode('sim'))?>"><?php echo $class_name_fects1_n.' - '.$sel_ins_name1_n.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_n?>"><?php echo $gradess1_n?></span>
                                                          </a>
                                                        </h4> 
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                  
                  <?php 
                                    $query2_n = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='11'";
                                    $statement2_n = $connect->prepare($query2_n);
                                    $statement2_n->execute();
                                    if($statement2_n->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="academic.php">Academic</a></span>
                                   <?php  $result2_n = $statement2_n->fetchAll();
                                            foreach($result2_n as $row2)
                                            {
                                               $class_id_ac_n=$row2['data'];
                                              $class_name_fect_sc_n= $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                              $class_name_fect_sc_n->execute([$class_id_ac_n]);
                                               $class_name_fect_scs_n = $class_name_fect_sc_n->fetchColumn();
                                                $ins_ides_n=$row2['user_id'];
                                               $sel_ins_Ac_n= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_Ac_n->execute([$ins_ides_n]);
                                               $sel_ins_Ac_name_n = $sel_ins_Ac_n->fetchColumn();
                                             
                                            ?>
                                               
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_scs_n.' - '.$sel_ins_Ac_name_n;?></a>
                                                        </h4>
                                           
                                            <?php
                                          }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                 <?php 
                                    $query3_n = "SELECT * FROM test_data where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='11'";
                                    $statement3_n = $connect->prepare($query3_n);
                                    $statement3_n->execute();
                                    if($statement3_n->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Test</span>
                                   <?php  $result3_n = $statement3_n->fetchAll();
                                            foreach($result3_n as $row3)
                                            {
                                              $marks_test_n=$row3['marks'];
                                              $class_id_te_n=$row3['test_id'];
                                              $class_name_fect_te_n= $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                              $class_name_fect_te_n->execute([$class_id_te_n]);
                                               $class_name_fect_tes_n = $class_name_fect_te_n->fetchColumn();

                                               $class_test_n="btn btn-dark";
                                                                      if($marks_test_n!=""){
                                                        if($marks_test_n<=50 && $marks_test_n>=0){
                                                              $class_test_n="btn btn-danger";
                                                        }else if($marks_test_n<=70 && $marks_test_n>=51){
                                                          $class_test_n="btn btn-warning";
                                                        }else if($marks_test_n<=80 && $marks_test_n>=71){
                                                          $class_test_n = "btn btn-secondary";
                                                        }else if($marks_test_n<=90 && $marks_test_n>=81){
                                                          $class_test_n = "btn btn-success";
                                                        }else if($marks_test_n<=100 && $marks_test_n>=91){
                                                          $class_test_n = "btn btn-primary";
                                                        }
                                                      }
                                               ?> 
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_n?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_test_n;?>"><?php echo $marks_test_n;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                  <?php 
                                    $query5_n = "SELECT * FROM discipline where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='11'";
                                    $statement5_n = $connect->prepare($query5_n);
                                    $statement5_n->execute();
                                    if($statement5_n->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="discipline.php">Descipline</a></span>
                                   <?php  $result5_n = $statement5_n->fetchAll();
                                            foreach($result5_n as $row3)
                                            {
                                             
                                              $class_id_me_n=$row3['topic'];
                                              $desc_inst_n=$row3['inst_id'];
                                              $instr_name_n= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_name_n->execute([$desc_inst_n]);
                                              $name3_n = $instr_name_n->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_me_n.' - '.$name3_n;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                    <?php 
                                    $query6_n = "SELECT * FROM memo where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='11'";
                                    $statement6_n = $connect->prepare($query6_n);
                                    $statement6_n->execute();
                                    if($statement6_n->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="memo.php">Memo</a></span>
                                   <?php  $result6_n = $statement6_n->fetchAll();
                                            foreach($result6_n as $row3)
                                            {
                                             
                                              $class_id_mem_n=$row3['topic'];
                                              $desc_instm_n=$row3['inst_id'];
                                              $instr_namem_n= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_namem_n->execute([$desc_instm_n]);
                                              $name3m_n = $instr_namem_n->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_mem_n.' - '.$name3m_n;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                    <?php 
                                    $query_qn = "SELECT * FROM quiz_marks where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='11'";
                                    $statement_qn = $connect->prepare($query_qn);
                                    $statement_qn->execute();
                                    if($statement_qn->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                  <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="quiz.php">Quiz</a></span>
                                   <?php  $result_qn = $statement_qn->fetchAll();
                                            foreach($result_qn as $row3)
                                            {
                                              $marks_quiz_qn=$row3['marks'];
                                              $class_id_te_qn=$row3['quiz_id'];
                                              $class_name_fect_te_qn= $connect->prepare("SELECT quiz FROM quiz WHERE id=?");
                                              $class_name_fect_te_qn->execute([$class_id_te_qn]);
                                               $class_name_fect_tes_qn = $class_name_fect_te_qn->fetchColumn();

                                                $class_quiz_qn="btn btn-dark";
                                                                      if($marks_quiz_qn!=""){
                                                        if($marks_quiz_qn<=50 && $marks_quiz_qn>=0){
                                                              $class_quiz_qn="btn btn-danger";
                                                        }else if($marks_quiz_qn<=70 && $marks_quiz_qn>=51){
                                                          $class_quiz_qn="btn btn-warning";
                                                        }else if($marks_quiz_qn<=80 && $marks_quiz_qn>=71){
                                                          $class_quiz_qn = "btn btn-secondary";
                                                        }else if($marks_quiz_qn<=90 && $marks_quiz_qn>=81){
                                                          $class_quiz_qn = "btn btn-success";
                                                        }else if($marks_quiz_qn<=100 && $marks_quiz_qn>=91){
                                                          $class_quiz_qn = "btn btn-primary";
                                                        }
                                                      }
                                               ?>
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_qn?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_quiz_qn;?>"><?php echo $marks_quiz_qn;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                </tr>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <div class="row justify-content-center" id="December">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1 class="text-success">December</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <?php 
                                    $query_d = "SELECT * FROM gradesheet where class='actual' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='12'";
                                    $statement_d = $connect->prepare($query_d);
                                    $statement_d->execute();
                                    if($statement_d->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="actual.php">Actual</a></span>
                                   <?php  $result_d = $statement_d->fetchAll();
                                            foreach($result_d as $row)
                                            {
                                              $gradess_d=$row['over_all_grade'];
                                               $class_ides_d=$row['class_id'];
                                              $class_name_fect_d= $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                                              $class_name_fect_d->execute([$class_ides_d]);
                                               $class_name_fects_d = $class_name_fect_d->fetchColumn();
                                               $ins_id_d=$row['instructor'];
                                               $sel_ins_d= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_d->execute([$ins_id_d]);
                                               $sel_ins_name_d = $sel_ins_d->fetchColumn();
                                               if($gradess_d == "U")
                                            {
                                              $class_d = "btn btn-danger";
                                            }
                                            elseif ($gradess_d == "F") 
                                            {
                                              $class_d = "btn btn-warning";
                                            }
                                            elseif ($gradess_d == "G") 
                                            {
                                              $class_d = "btn btn-secondary";
                                            }
                                            elseif ($gradess_d == "V") 
                                            {
                                              $class_d = "btn btn-success";
                                            }
                                            elseif ($gradess_d == "E") 
                                            {
                                              $class_d = "btn btn-primary";
                                            }
                                            elseif ($gradess_d == "N") 
                                            {
                                              $class_d = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class_d = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_d))?>&class_name=<?php echo urlencode(base64_encode('actual'))?>"><?php echo $class_name_fects_d.' - '.$sel_ins_name_d.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class_d?>"><?php echo $gradess_d?></span>
                                                          </a>
                                                       </h4> 
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                           
                
                           <?php 
                                    $query1_d = "SELECT * FROM gradesheet where class='sim' and course_id='$std_course1' and user_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='12'";
                                    $statement1_d = $connect->prepare($query1_d);
                                    $statement1_d->execute();
                                    if($statement1_d->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="sim.php">Simulation</a></span>
                                   <?php  $result1_d = $statement1_d->fetchAll();
                                            foreach($result1_d as $row)
                                            {
                                              $gradess1_d=$row['over_all_grade'];
                                               $class_ides1_d=$row['class_id'];
                                              $class_name_fect1_d= $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                              $class_name_fect1_d->execute([$class_ides1_d]);
                                               $class_name_fects1_d = $class_name_fect1_d->fetchColumn();
                                               $ins_id1_d=$row['instructor'];
                                               $sel_ins1_d= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins1_d->execute([$ins_id1_d]);
                                               $sel_ins_name1_d = $sel_ins1_d->fetchColumn();
                                                if($gradess1_d == "U")
                                            {
                                              $class1_d = "btn btn-danger";
                                            }
                                            elseif ($gradess1_d == "F") 
                                            {
                                              $class1_d = "btn btn-warning";
                                            }
                                            elseif ($gradess1_d == "G") 
                                            {
                                              $class1_d = "btn btn-secondary";
                                            }
                                            elseif ($gradess1_d == "V") 
                                            {
                                              $class1_d = "btn btn-success";
                                            }
                                            elseif ($gradess1_d == "E") 
                                            {
                                              $class1_d = "btn btn-primary";
                                            }
                                            elseif ($gradess1_d == "N") 
                                            {
                                              $class1_d = "btn btn-light";
                                            }
                                            else
                                            {
                                              $class1_d = "btn btn-dark";
                                            }
                                               ?>
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" href="gradesheet.php?id=<?php echo urlencode(base64_encode($class_ides1_d))?>&class_name=<?php echo urlencode(base64_encode('sim'))?>"><?php echo $class_name_fects1_d.' - '.$sel_ins_name1_d.' / '?>
                                                            <span style="font-weight:bold; font-size:large; text-align:center; padding:5px;" class="badge<?php echo $class1_d?>"><?php echo $gradess1_d?></span>
                                                          </a>
                                                        </h4> 
                                          <?php  }
                                            ?>
                                              </td>
                                            <?php
                                          }
                                  ?>
                  
                  <?php 
                                    $query2_d = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='12'";
                                    $statement2_d = $connect->prepare($query2_d);
                                    $statement2_d->execute();
                                    if($statement2_d->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="academic.php">Academic</a></span>
                                   <?php  $result2_d = $statement2_d->fetchAll();
                                            foreach($result2_d as $row2)
                                            {
                                               $class_id_ac_d=$row2['data'];
                                              $class_name_fect_sc_d= $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                              $class_name_fect_sc_d->execute([$class_id_ac_d]);
                                               $class_name_fect_scs_d = $class_name_fect_sc_d->fetchColumn();
                                                $ins_ides_d=$row2['user_id'];
                                               $sel_ins_Ac_d= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                               $sel_ins_Ac_d->execute([$ins_ides_d]);
                                               $sel_ins_Ac_name_d = $sel_ins_Ac_d->fetchColumn();
                                             
                                            ?>
                                               
                                                        <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_scs_d.' - '.$sel_ins_Ac_name_d;?></a>
                                                        </h4>
                                           
                                            <?php
                                          }?>
                                             </td>
                                    <?php    }
                                  ?>
                  
                  <?php 
                                    $query3_d = "SELECT * FROM test_data where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='12'";
                                    $statement3_d = $connect->prepare($query3_d);
                                    $statement3_d->execute();
                                    if($statement3_d->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;">Test</span>
                                   <?php  $result3_d = $statement3_d->fetchAll();
                                            foreach($result3_d as $row3)
                                            {
                                              $marks_test_d=$row3['marks'];
                                              $class_id_te_d=$row3['test_id'];
                                              $class_name_fect_te_d= $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                              $class_name_fect_te_d->execute([$class_id_te_d]);
                                               $class_name_fect_tes_d = $class_name_fect_te_d->fetchColumn();

                                               $class_test_d="btn btn-dark";
                                                                      if($marks_test_d!=""){
                                                        if($marks_test_d<=50 && $marks_test_d>=0){
                                                              $class_test_d="btn btn-danger";
                                                        }else if($marks_test_d<=70 && $marks_test_d>=51){
                                                          $class_test_d="btn btn-warning";
                                                        }else if($marks_test_d<=80 && $marks_test_d>=71){
                                                          $class_test_d = "btn btn-secondary";
                                                        }else if($marks_test_d<=90 && $marks_test_d>=81){
                                                          $class_test_d = "btn btn-success";
                                                        }else if($marks_test_d<=100 && $marks_test_d>=91){
                                                          $class_test_d = "btn btn-primary";
                                                        }
                                                      }
                                               ?> 
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_d?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_test_d;?>"><?php echo $marks_test_d;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                    <?php 
                                    $query5_d = "SELECT * FROM discipline where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='12'";
                                    $statement5_d = $connect->prepare($query5_d);
                                    $statement5_d->execute();
                                    if($statement5_d->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="discipline.php">Descipline</a></span>
                                   <?php  $result5_d = $statement5_d->fetchAll();
                                            foreach($result5_d as $row3)
                                            {
                                             
                                              $class_id_me_d=$row3['topic'];
                                              $desc_inst_d=$row3['inst_id'];
                                              $instr_name_d= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_name_d->execute([$desc_inst_d]);
                                              $name3_d = $instr_name_d->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_me_d.' - '.$name3_d;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                    <?php 
                                    $query6_d = "SELECT * FROM memo where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(date)='$get_year' AND month(date)='12'";
                                    $statement6_d = $connect->prepare($query6_d);
                                    $statement6_d->execute();
                                    if($statement6_d->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                 <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="memo.php">Memo</a></span>
                                   <?php  $result6_d = $statement6_d->fetchAll();
                                            foreach($result6_d as $row3)
                                            {
                                             
                                              $class_id_mem_d=$row3['topic'];
                                              $desc_instm_d=$row3['inst_id'];
                                              $instr_namem_d= $connect->prepare("SELECT name FROM users WHERE id=?");
                                              $instr_namem_d->execute([$desc_instm_d]);
                                              $name3m_d = $instr_namem_d->fetchColumn();
                                              ?>
                                               <h4>
                                                          <span class="legend-indicator bg-secondary"></span><a style="color:black; font-weight:bold;" ><?php echo $class_id_mem_d.' - '.$name3m_d;?></a>
                                                        </h4>
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>

                    <?php 
                                    $query_qd = "SELECT * FROM quiz_marks where `course_id`='$std_course1'  and student_id='$fetchuser_id' and YEAR(created)='$get_year' AND month(created)='12'";
                                    $statement_qd = $connect->prepare($query_qd);
                                    $statement_qd->execute();
                                    if($statement_qd->rowCount() > 0)
                                    {
                                      ?>
                                 <td>
                                  <span class="text-primary" style="font-weight: bold; font-size:large;"><a href="quiz.php">Quiz</a></span>
                                   <?php  $result_qd = $statement_qd->fetchAll();
                                            foreach($result_qd as $row3)
                                            {
                                              $marks_quiz_qd=$row3['marks'];
                                              $class_id_te_qd=$row3['quiz_id'];
                                              $class_name_fect_te_qd= $connect->prepare("SELECT quiz FROM quiz WHERE id=?");
                                              $class_name_fect_te_qd->execute([$class_id_te_qd]);
                                               $class_name_fect_tes_qd = $class_name_fect_te_qd->fetchColumn();

                                                $class_quiz_qd="btn btn-dark";
                                                                      if($marks_quiz_qd!=""){
                                                        if($marks_quiz_qd<=50 && $marks_quiz_qd>=0){
                                                              $class_quiz_qd="btn btn-danger";
                                                        }else if($marks_quiz_qd<=70 && $marks_quiz_qd>=51){
                                                          $class_quiz_qd="btn btn-warning";
                                                        }else if($marks_quiz_qd<=80 && $marks_quiz_qd>=71){
                                                          $class_quiz_qd = "btn btn-secondary";
                                                        }else if($marks_quiz_qd<=90 && $marks_quiz_qd>=81){
                                                          $class_quiz_qd = "btn btn-success";
                                                        }else if($marks_quiz_qd<=100 && $marks_quiz_qd>=91){
                                                          $class_quiz_qd = "btn btn-primary";
                                                        }
                                                      }
                                               ?>
                                               
                                                          <h4 style="margin:5px; padding: 5px;"><span class="legend-indicator bg-danger"></span><a style="color:black; font-weight:bold;" ><?php echo $class_name_fect_tes_qd?></a> - 
                                                            <span style="font-weight:bolder; width:5%; text-align:center; padding:5px; border-radius: 5px;" class="badge<?php echo $class_quiz_qd;?>"><?php echo $marks_quiz_qd;?></span>
                                                          </h4>
                                                        
                                     <?php      }?>
                                             </td>
                                    <?php    }
                                  ?>
                </tr>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
        </div>
      </div>
    </div>

    <div class="container" style="border: 1 px solid black; display:none;">
      <div class="row justify-content-center">
        <div class="col-lg-10 mb-3 mb-lg-5">
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1 class="text-success"><?php echo $get_year;?></h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <td>
                     <span class="text-primary" style="font-weight: bold; font-size:large;">Actual</span>

                             <?php
                                $d = "SELECT * FROM actual WHERE YEAR(date) = '".$get_year."' AND ctp='$std_course1'";
                                $stat_d = $connect->prepare($d);
                                $stat_d->execute();  
                                $result_d = $stat_d->fetchAll();
                                    foreach($result_d as $row){
                                      $class_sy_id_d=$row['id'];
                                        echo '<div class="row">
                                                <div class="col-12">
                                                  <table>
                                                  <tr>
                                                  <td>
                                                  <h4><span class="legend-indicator bg-primary"></span>'.$row['symbol'].'</h4></td>
                                                  </tr>
                                                  </table>
                                                </div>
                                              </div>';
                                              
                                      }
                                ?>
                  </td>

                  <td>
                     <span class="text-info" style="font-weight: bold; font-size:large;">Simulation</span>

                             <?php
                                $ds = "SELECT * FROM sim WHERE YEAR(date) = '".$get_year."' AND ctp='$std_course1'";
                                $stat_ds = $connect->prepare($ds);
                                $stat_ds->execute();  
                                $result_ds = $stat_ds->fetchAll();
                                    foreach($result_ds as $row){
                                      $class_sy_id_ds=$row['id'];
                                        echo '<div class="row">
                                                <div class="col-12">
                                                  <table>
                                                  <tr>
                                                  <td>
                                                  <h4><span class="legend-indicator bg-primary"></span>'.$row['shortsim'].'</h4></td>
                                                  </tr>
                                                  </table>
                                                </div>
                                              </div>';
                                              
                                      }
                                ?>
                  </td>

                  <td>
                     <span class="text-warning" style="font-weight: bold; font-size:large;">Academic</span>

                             <?php
                                $da = "SELECT * FROM academic WHERE YEAR(date) = '".$get_year."' AND month(date)=1 AND ctp='$std_course1'";
                                $stat_da = $connect->prepare($da);
                                $stat_da->execute();  
                                $result_da = $stat_da->fetchAll();
                                    foreach($result_da as $row){
                                      $class_sy_id_da=$row['id'];
                                        echo '<div class="row">
                                                <div class="col-12">
                                                  <table>
                                                  <tr>
                                                  <td>
                                                  <h4><span class="legend-indicator bg-primary"></span>'.$row['shortacademic'].'</h4></td>
                                                  </tr>
                                                  </table>
                                                </div>
                                              </div>';
                                              
                                      }
                                ?>
                  </td>

                  <td>
                     <span class="text-danger" style="font-weight: bold; font-size:large;">Test</span>

                             <?php
                                $dt = "SELECT * FROM test WHERE YEAR(date) = '".$get_year."' AND ctp='$std_course1'";
                                $stat_dt = $connect->prepare($dt);
                                $stat_dt->execute();  
                                $result_dt = $stat_dt->fetchAll();
                                    foreach($result_dt as $row){
                                      $class_sy_id_dt=$row['id'];
                                        echo '<div class="row">
                                                <div class="col-12">
                                                  <table>
                                                  <tr>
                                                  <td>
                                                  <h4><span class="legend-indicator bg-primary"></span>'.$row['shorttest'].'</h4></td>
                                                  </tr>
                                                  </table>
                                                </div>
                                              </div>';
                                              
                                      }
                                ?>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End Content -->

</main>

<script src="report.js"></script>

<script type="text/javascript">
    window.onload = function () {
        //Reference the DropDownList.
        var ddlYears = document.getElementById("ddlYears");
 
        //Determine the Current Year.
        var currentYear = (new Date()).getFullYear();
 
        //Loop and add the Year values to DropDownList.
        for (var i = 1950; i <= 2100; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            ddlYears.appendChild(option);
        }
    };


</script>

<script type="text/javascript">
  var get_id = sessionStorage.getItem('set_id');
            $('#set_year').val(get_id);
          $('#set_year').on('change', function(){
            var get_val = $(this).val();
            sessionStorage.setItem('set_id',get_val);
            document.cookie = "get_year = " +get_val;
            window.location.reload();
          });
</script>


 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>
        