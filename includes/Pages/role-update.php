<?php 
 $get_id=$_GET['id'];
 $name_get=$_GET['name'];
$array="";
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$output0="";

   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Role</title>
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>
<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  


<div id="header-hide">
<?php
include(ROOT_PATH.'includes/head_navbar.php');
?>
</div>
<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 25rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <!-- <div class="page-header page-header-light">
          <h1 class="text-dark">Gradesheet</h1>
        </div> -->
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h2>Edit Role</h2>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              
            <div class="mb-3">
             <form action="copy_rol.php" method="post">
                <div class="container">
                   <div class="row">
                    <!-- <label class="form-label" style="font-weight:bold; margin:5px;">Edit Role :</label> -->
                       <div class="col-md-6">
                           <label class="text-dark" style="font-weight: bold;">Role:</label>
                           <input type="text" class="form-control" name="role" value="<?php echo $name_get?>" readonly>
                       </div>
                       <div class="col-md-6">
                           <input type="hidden" name="copyto_id" value="<?php echo $get_id?>">
                           <label class="text-dark" style="font-weight:bold;">Select Role:</label>
                            <select class="form-control" name="copied_id">
                              <?php $rolesss12 = $connect->query("SELECT `copiedfrom` FROM roles where id='$get_id'");
             echo $rolesss1213 = $rolesss12->fetchColumn();
              $query1 = "SELECT * FROM roles where permission!='' and roles!='$name_get' ORDER BY id ASC";
              $statement1 = $connect->prepare($query1);
              $statement1->execute();
              if($statement1->rowCount() > 0)
              {
                  $result1 = $statement1->fetchAll();
                  $sn=1;
                  foreach($result1 as $row1)
                  { ?>
                      <option value="<?php echo $row1['id'] ?>" <?php if($rolesss1213==$row1['id']){ echo "selected";}?>><?php echo $row1['roles']?></option>";
                      <?php  }
              }?>
                            </select>
                       </div>
                       <div class="row" style="justify-content: end;">
                           <button type="submit" class="btn btn-success" style="margin:5px;float: right;width: auto;">Copy!</button>
                       </div>
                   </div> 
                </div>
                <!-- <label class="form-label" style="font-weight:bold; margin:5px;">Edit Role :</label>
                <input type="text" class="form-control" name="role" value="<?php echo $name_get?>" readonly>
                <input type="hidden" name="copyto_id" value="<?php echo $get_id?>">
                <select class="form-control" name="copied_id">
                      <?php echo $output0; ?>
                </select>
                <button type="submit" class="btn btn-success">Copy!</button> -->
            </form>
            <form action="edit_role_data.php" method="post">
            <input type="hidden"  readonly class="form-control" name="id" value="<?php echo $get_id?>">


            <div class="container">
                <?php 
                            $query = "SELECT * FROM roles where id='$get_id'";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            foreach($statement as $row){
                              $data=$row['permission'];  
                                $test = unserialize($data);
                             
                                    
                               ?> 
               <!-- Accordion -->
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingOne">
                      <a class="accordion-button" role="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Sidebar
                      </a>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                       <div class="row">
                            <div class="col-md-3 mb-2 m-1">
                              
                                <input type="checkbox" class="form-check-input" style="margin: 7px;" value="1" <?php if ($test['Dashboard'] == "1") {
                                            echo 'checked';
                                        } ?> name="Dashboard"><label class="text-dark" style="margin:5px;">Dashboard</label>
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                               <input type="checkbox" class="form-check-input" style="margin: 7px;" value="1" <?php if ($test['Start0'] == "1") {
                                        echo 'checked';
                                        } ?> name="Start0"><label class="text-dark" style="margin:5px;">Start Page</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                              
                              <input type="checkbox" class="form-check-input" style="margin: 7px;" value="1" <?php if ($test['alerts'] == "1") {
                                          echo 'checked';
                                      } ?> name="alerts"><label class="text-dark" style="margin:5px;">alerts</label>
                          </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" style="margin: 7px;" value="1" <?php if ($test['Datapage'] == "1") {
                                        echo 'checked';
                                        } ?> name="Datapage"><label class="text-dark" style="margin:5px;">Data Page</label>
                            </div>

                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" style="margin: 7px;" value="1" <?php if ($test['CTP'] == "1") {
                                        echo 'checked';
                                        } ?> name="CTP"><label class="text-dark" style="margin:5px;">CTP Page</label>
                            </div>

                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" style="margin: 7px;" value="1" <?php if ($test['Newcourse'] == "1") {
                                        echo 'checked';
                                        } ?> name="Newcourse"><label class="text-dark" style="margin:5px;">New Course Page</label>
                            </div>

                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" style="margin: 7px;" value="1" <?php if ($test['sidebar_phase'] == "1") {
                                        echo 'checked';
                                        } ?> name="sidebar_phase"><label class="text-dark" style="margin:5px;">Sidebar Phase</label>
                            </div>
                            
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" style="margin: 7px;" value="1" <?php if ($test['select_Course'] == "1") {
                                        echo 'checked';
                                        } ?> name="select_Course"><label class="text-dark" style="margin:5px;">select Course</label> 
                            </div>

                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" style="margin: 7px;" value="1" <?php if ($test['select_student_details'] == "1") {
                                        echo 'checked';
                                        } ?> name="select_student_details"><label class="text-dark" style="margin:5px;">select student details</label> 
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingTwo">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Mega Menu
                      </a>
                    </div>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['actual'] == "1") {
                                            echo 'checked';
                                        } ?> name="actual"><label class="text-dark" style="margin:5px;">Actual</label>
                            </div>

                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['sim'] == "1") {
                                            echo 'checked';
                                        } ?> name="sim"><label class="text-dark" style="margin:5px;">Simulation</label>
                            </div>

                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Academic'] == "1") {
                                            echo 'checked';
                                        } ?> name="Academic"><label class="text-dark" style="margin:5px;">Academic</label>
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Task'] == "1") {
                                            echo 'checked';
                                        } ?> name="Task"><label class="text-dark" style="margin:5px;">Task</label>
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['evaluation'] == "1") {
                                        echo 'checked';
                                        } ?> name="evaluation"><label class="text-dark" style="margin:5px;">Evaluation</label>
                            </div>
                             <div class="col-md-3 mb-2 m-1">
                               <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Student'] == "1") {
                                        echo 'checked';
                                         } ?> name="Student"><label class="text-dark" style="margin:5px;">Activity</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Testing'] == "1") {
                                        echo 'checked';
                                        } ?> name="Testing"><label class="text-dark" style="margin:5px;">Testing</label>
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Emergency'] == "1") {
                                        echo 'checked';
                                        } ?> name="Emergency"><label class="text-dark" style="margin:5px;">Emergency</label>
                            </div>

                            <div class="col-md-3 mb-2 m-1">
                               <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Qual'] == "1") {
                                        echo 'checked';
                                        } ?> name="Qual"><label class="text-dark" style="margin:5px;">Qual</label> 
                            </div>

                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Clearance'] == "1") {
                                        echo 'checked';
                                        } ?> name="Clearance"><label class="text-dark" style="margin:5px;">Clearance</label>
                            </div>

                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['CAP'] == "1") {
                                        echo 'checked';
                                        } ?> name="CAP"><label class="text-dark" style="margin:5px;">CAP</label>
                            </div>

                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Memo'] == "1") {
                                        echo 'checked';
                                        } ?> name="Memo"><label class="text-dark" style="margin:5px;">Memo</label>
                            </div>

                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Report'] == "1") {
                                        echo 'checked';
                                        } ?> name="Report"><label class="text-dark" style="margin:5px;">Report</label>
                            </div>

                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Discipline'] == "1") {
                                        echo 'checked';
                                        } ?> name="Discipline"><label class="text-dark" style="margin:5px;">Descipline</label>
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Quiz'] == "1") {
                                        echo 'checked';
                                        } ?> name="Quiz"><label class="text-dark" style="margin:5px;">Quiz</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['course_details'] == "1") {
                                        echo 'checked';
                                        } ?> name="course_details"><label class="text-dark" style="margin:5px;">Course Details</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['landing_page'] == "1") {
                                        echo 'checked';
                                        } ?> name="landing_page"><label class="text-dark" style="margin:5px;">Landing page</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['checklist_pages'] == "1") {
                                        echo 'checked';
                                        } ?> name="checklist_pages"><label class="text-dark" style="margin:5px;">Checklist page</label> 
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingcourse">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#headingcourse" aria-expanded="false" aria-controls="collapseTwo">
                    Dashboard
                      </a>
                    </div>
                    <div id="headingcourse" class="accordion-collapse collapse" aria-labelledby="headingcourse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                        <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['course_phase_man_dashbirad'] == "1") { echo 'checked';
                                  } ?> name="course_phase_man_dashbirad"><label class="text-dark" style="margin:5px;">Course manager Dashboard</label>    
                                   </div>
                                   <div class="col-md-3 mb-2 m-1">
                                      <input type="checkbox" class="form-check-input" value="1" <?php if ($test['test_dasborad'] == "1") { echo 'checked';
                                  } ?> name="test_dasborad"><label class="text-dark" style="margin:5px;">Test Details Dashboard</label> 
                           </div>
                           <div class="col-md-3 mb-2 m-1">
                                      <input type="checkbox" class="form-check-input" value="1" <?php if ($test['assingeresource'] == "1") { echo 'checked';
                                  } ?> name="assingeresource"><label class="text-dark" style="margin:5px;">Assign Resource</label> 
                           </div>
                        </div>
                        </div>
                      </div>
                    </div>
                 
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingThree">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Actual / Sim Page Access 
                      </a>
                    </div>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['clone_delete'] == "1") { echo 'checked';
                                  } ?> name="clone_delete"><label class="text-dark" style="margin:5px;">Clone delete</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['askclone_delete'] == "1") { echo 'checked';
                                  } ?> name="askclone_delete"><label class="text-dark" style="margin:5px;">Ask Clone delete</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['fill_gradsheet'] == "1") { echo 'checked';
                                  } ?> name="fill_gradsheet"><label class="text-dark" style="margin:5px;">Fill Gradsheet</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['reset_gradsheet'] == "1") { echo 'checked';
                                  } ?> name="reset_gradsheet"><label class="text-dark" style="margin:5px;">Reset Gradesheet</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['askreset_gradsheet'] == "1") { echo 'checked';
                                  } ?> name="askreset_gradsheet"><label class="text-dark" style="margin:5px;">Ask Reset </label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Unlock_gradsheet'] == "1") { echo 'checked';
                                  } ?> name="Unlock_gradsheet"><label class="text-dark" style="margin:5px;">Unlock Gradesheet</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['askUnlock_gradsheet'] == "1") { echo 'checked';
                                  } ?> name="askUnlock_gradsheet"><label class="text-dark" style="margin:5px;">Ask Unlock </label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['give_per_gradsheet'] == "1") { echo 'checked';
                                  } ?> name="give_per_gradsheet"><label class="text-dark" style="margin:5px;">permission for thoose people can grade E</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['ask_per_gradsheet'] == "1") { echo 'checked';
                                  } ?> name="ask_per_gradsheet"><label class="text-dark" style="margin:5px;">permission for giving can grade E</label> 
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingFour">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Academic Page Access
                      </a>
                    </div>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                           <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['give_Acedemic'] == "1") { echo 'checked';
                                  } ?> name="give_Acedemic"><label class="text-dark" style="margin:5px;">Give acedemic</label> 
                              </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Clear_Acedemic'] == "1") { echo 'checked';
                                  } ?> name="Clear_Acedemic"><label class="text-dark" style="margin:5px;">Clear acedemic</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['ask_Acedemic'] == "1") { echo 'checked';
                                  } ?> name="ask_Acedemic"><label class="text-dark" style="margin:5px;">Ask For acedemic</label> 
                            </div> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingNine">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                        Task Page Access 
                      </a>
                    </div>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3 mb-2 m-1">
                                 <input type="checkbox" class="form-check-input" value="1" <?php if ($test['delete_task'] == "1") { echo 'checked';
                                  } ?> name="delete_task"><label class="text-dark" style="margin:5px;">Delete task</label> 
                            </div> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingFive">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Evaluation Page Access
                      </a>
                    </div>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                           <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['give_marks_evalution'] == "1") { echo 'checked';
                                  } ?> name="give_marks_evalution"><label class="text-dark" style="margin:5px;">Give mark</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['view_marks_evalution'] == "1") { echo 'checked';
                                  } ?> name="view_marks_evalution"><label class="text-dark" style="margin:5px;">View mark</label> 
                            </div>
                            
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingTwelve">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                        Testing/Quiz Page Access
                      </a>
                    </div>
                    <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['give_marks_test'] == "1") { echo 'checked';
                                  } ?> name="give_marks_test"><label class="text-dark" style="margin:5px;">Give mark</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['unlock_test'] == "1") { echo 'checked';
                                  } ?> name="unlock_test"><label class="text-dark" style="margin:5px;">Unlock Test</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['askunlock_test'] == "1") { echo 'checked';
                                  } ?> name="askunlock_test"><label class="text-dark" style="margin:5px;">Ask Unlock Test</label> 
                            </div>
                            
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['add_attachment_test'] == "1") { echo 'checked';
                                  } ?> name="add_attachment_test"><label class="text-dark" style="margin:5px;">add attachment Test</label> 
                            </div> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingSix">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        Emergancy/Qual/Clearnace Page Access 
                      </a>
                    </div>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                           <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['delete_emergance'] == "1") { echo 'checked';
                                  } ?> name="delete_emergance"><label class="text-dark" style="margin:5px;">Delete</label> 
                            </div> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingTen">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                        CAP Page Access 
                      </a>
                    </div>
                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['assign_Cap'] == "1") { echo 'checked';
                                  } ?> name="assign_Cap"><label class="text-dark" style="margin:5px;">assign CAP</label> 
                            </div> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingEleven">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                        Memo/Descipline Page Access 
                      </a>
                    </div>
                    <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Create_memo'] == "1") { echo 'checked';
                                  } ?> name="Create_memo"><label class="text-dark" style="margin:5px;">Create</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Edit_memo'] == "1") { echo 'checked';
                                  } ?> name="Edit_memo"><label class="text-dark" style="margin:5px;">Edit</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Delete_memo'] == "1") { echo 'checked';
                                  } ?> name="Delete_memo"><label class="text-dark" style="margin:5px;">Delete</label> 
                            </div> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingSeven">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        Course Page Access 
                      </a>
                    </div>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['export_course'] == "1") { echo 'checked';
                                  } ?> name="export_course"><label class="text-dark" style="margin:5px;">Export</label> 
                            </div>
                           <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Delete_course'] == "1") { echo 'checked';
                                  } ?> name="Delete_course"><label class="text-dark" style="margin:5px;">Delete</label> 
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingEight">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        Landing Page Access 
                      </a>
                    </div>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Edit_landing'] == "1") { echo 'checked';
                                  } ?> name="Edit_landing"><label class="text-dark" style="margin:5px;">Edit</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['Delete_landing'] == "1") { echo 'checked';
                                  } ?> name="Delete_landing"><label class="text-dark" style="margin:5px;">Delete</label> 
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingEight">
                      <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                      Role permission
                      </a>
                    </div>
                    <div id="collapsenine" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['coursemanager'] == "1") { echo 'checked';
                                  } ?> name="coursemanager"><label class="text-dark" style="margin:5px;">course manager</label> 
                            </div>
                            <div class="col-md-3 mb-2 m-1">
                                <input type="checkbox" class="form-check-input" value="1" <?php if ($test['phasemanager'] == "1") { echo 'checked';
                                  } ?> name="phasemanager"><label class="text-dark" style="margin:5px;">phase manager</label> 
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Accordion --> 
            </div>
            <?php }?>
            <hr>
            <button type="submit" class="btn btn-success" style="float:right;">Submit</button> 

  
</form>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->
</main>


 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>
