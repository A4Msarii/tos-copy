<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$ex_idid=$_REQUEST['ex_id'];
$type=$_REQUEST['type'];
$query = $connect->prepare("SELECT * FROM examname WHERE id = :exam_ides");
$query->bindParam(':exam_ides', $ex_idid);
$query->execute();

$row = $query->fetch(PDO::FETCH_ASSOC);
$exam_total = $row['total_marks'];
$exam_namesd = $row['examName'];
$questionNumberes = $row['questionNumber'];
$date_exams = $row['dates'];
$exam_result = $row['result_hide_show'];
 $time24 = $row['start_hours'];
$exam_Types = $row['exam_Types'];
$time12 = convertTo12HourFormat($time24);
$examFor = $row['examFor'];
$coursed_ided=$row['course_id'];$dep_id=$row['dep_id'];
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
          <h1 class="text-secondary">Test Dashboard</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->
    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">
      <div class="row g-4 mb-4 justify-content-center">
      <!-- Counter item -->
      <div class="col-md-3 col-xxl-3" style="width: 10% !important;">
        <div class="card card-body bg-primary bg-opacity-5 p-4 h-100" style="border-radius: 80px;width: min-content;">
          <div class="d-flex justify-content-between align-items-center">
            <!-- Digit -->
            <div>
              <?php
              $student_count=0; 
              if($examFor =="course"){
                $examNameData="course";
           
                $sql = "SELECT CourseName, CourseCode FROM newcourse WHERE Courseid = :course_id";
                $stmt = $connect->prepare($sql);
                $stmt->bindParam(':course_id', $coursed_ided, PDO::PARAM_INT);
                $stmt->execute();
                $result1333 = $stmt->fetch(PDO::FETCH_ASSOC);
               if ($result1333) {
                    $CourseNamess=$result1333['CourseName'];
                    $CourseCodess=$result1333['CourseCode'];
               }
               $sql12 = "SELECT count(`StudentNames`) FROM `newcourse` WHERE CourseName ='$CourseNamess' and CourseCode='$CourseCodess'";
              $result12 = $connect->prepare($sql12);
              $result12->execute();
              $student_count = $result12->fetchColumn();
              }else if($examFor=="par"){
                $sql12 = "SELECT count(`examSubject`) FROM `studentexam` WHERE examId ='$ex_idid'";
                $result12 = $connect->prepare($sql12);
                $result12->execute();
                $student_count = $result12->fetchColumn();
                $examNameData="Particular user";
              }else if($examFor=="dep"){
                $sql12 = "SELECT count(`userId`) FROM `userdepartment` WHERE departmentId ='$dep_id'";
                $result12 = $connect->prepare($sql12);
                $result12->execute();
                $student_count = $result12->fetchColumn();
                $examNameData="Department";
              }else if($examFor=="everyone"){
                $sql12 = "SELECT count(`id`) FROM `users` WHERE `role`!='super admin'";
                $result12 = $connect->prepare($sql12);
                $result12->execute();
                $student_count = $result12->fetchColumn();
                $examNameData="Everyone";
              }else{
                $examName = $connect->query("SELECT roles FROM roles WHERE id = '$examFor'");
               $examNameData = $examName->fetchColumn();
               $sql12 = "SELECT count(`id`) FROM `users` WHERE `role`='$examNameData'";
               $result12 = $connect->prepare($sql12);
               $result12->execute();
               $student_count = $result12->fetchColumn();
              }
              ?>
              <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="1958" data-purecounter-delay="200" data-purecounter-duration="0"><?php echo $student_count?></h2>
              <span class="mb-0 h6 fw-light">Total</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Counter item -->
      <div class="col-md-6 col-xxl-3" style="width: 30% !important;">
        <div class="card card-body bg-success bg-opacity-5 p-4 h-100">
          <div class="d-flex justify-content-between align-items-center">
            <!-- Digit -->
            <div>
              <?php 
              $nRows=0;
              $nRows = $connect->query("select count(*) from test_updates WHERE status_end='1' and exam_status='pass' and exam_id='$ex_idid'")->fetchColumn();
              ?>
              <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="1600" data-purecounter-delay="200" data-purecounter-duration="0"><?php echo $nRows; ?></h2>
              <span class="mb-0 h6 fw-light">Successfull</span>
            </div>
          </div>
        </div>
      </div>
      <?php if($type=="once"){?>
      <!-- Counter item -->
      <div class="col-md-6 col-xxl-3" style="width: 30% !important;">
        <div class="card card-body bg-danger bg-opacity-5 p-4 h-100">
          <div class="d-flex justify-content-between align-items-center">
            <!-- Digit -->
            <div>
            <?php 
            $nRows1=0;
             if($type=="once"){
             $nRows1 = $connect->query("select count(*) from test_updates WHERE status_end='1' and exam_status='failed' and exam_id='$ex_idid'")->fetchColumn();
            }else{
              
            }
           
               ?>
              <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="1235" data-purecounter-delay="200" data-purecounter-duration="0"><?php echo $nRows1; ?></h2>
              <span class="mb-0 h6 fw-light">Failed</span>
            </div>
          </div>
        </div>
      </div>
<?php } 
if($type=="once"){
?>
      <!-- Counter item -->
      <div class="col-md-6 col-xxl-3" style="width: 30% !important;">
        <div class="card card-body bg-opacity-5 p-4 h-100" style="background-color:#ffc107">
          <div class="d-flex justify-content-between align-items-center">
            <!-- Digit -->
            <div>
              <div>
              <?php 
              $nRows2=0;
             if($type=="once"){
              $nRows2 = $connect->query("select count(*) from test_updates WHERE status_start='1' and exam_id='$ex_idid' and end_time is null")->fetchColumn();
            }?>
              <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="1600" data-purecounter-delay="200" data-purecounter-duration="0"><?php echo $nRows2; ?></h2>
              <span class="mb-0 h6 fw-light">Pending</span>
            </div>
            </div>
          </div>
        </div>
      </div>
      <?php }else{
        ?>
      <div class="col-md-6 col-xxl-3" style="width: 30% !important;">
        <div class="card card-body bg-opacity-5 p-4 h-100" style="background-color:#ffc107">
          <div class="d-flex justify-content-between align-items-center">
            <!-- Digit -->
            <div>
              <div>
              <?php 
              $rep_pend=0;
           $rep_pend=$student_count-$nRows;
            ?>
              <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="1600" data-purecounter-delay="200" data-purecounter-duration="0"><?php echo $rep_pend; ?></h2>
              <span class="mb-0 h6 fw-light">Pending</span>
            </div>
            </div>
          </div>
        </div>
      </div>
        <?php
      } ?>
    </div>
      <div class="row justify-content-center">
        <div class="col-lg-12 mb-3 mb-lg-5">
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
              <!-- Nav -->
                <ul class="nav nav-pills justify-content-center" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="successful-tab" href="#successful" data-bs-toggle="pill" data-bs-target="#successful" role="tab" aria-controls="successful" aria-selected="true">
                      <div class="d-flex align-items-center">
                        Successful
                      </div>
                    </a>
                  </li>
                  <?php if($type=="once"){?>
                  <li class="nav-item">
                    <a class="nav-link" id="failed-tab" href="#failed" data-bs-toggle="pill" data-bs-target="#failed" role="tab" aria-controls="failed" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Failed
                      </div>
                    </a>
                  </li>
                  <?php } ?>
                  <li class="nav-item">
                    <a class="nav-link" id="pending-tab" href="#pending" data-bs-toggle="pill" data-bs-target="#pending" role="tab" aria-controls="pending" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Pending
                      </div>
                    </a>
                  </li>
                </ul>
                <!-- End Nav -->
            </div>
          </div>
        </div>
      </div>


      <div class="row justify-content-center">
        <div class="col-lg-12 mb-3 mb-lg-5">
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
              <!-- Tab Content -->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="successful" role="tabpanel" aria-labelledby="successful-tab">
                    <div class="row">
                      <div class="col-md-8">
                        <input class="form-control" type="text" id="successsearch" onkeyup="successsearch()" placeholder="Search for Test name.." title="Type in a name">
                      </div>
                      <div class="col-md-4">
                        <div style="float: right;">
                      <!-- <label for="roleFilter">Filter by Role:</label>
                      <select id="roleFilter">
                        <option value="all">All Role</option>
                       <option value="student">Student</option>
                        <option value="Instructor">Instructor</option> -->
        <!-- Add more months as needed -->
                      </select>
                      <label for="monthFilter">Filter by Month:</label>
                      <select id="monthFilter">
                        <option value="all">All Months</option>
                       <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
        <!-- Add more months as needed -->
                      </select>
                </div>
                      </div>
                    </div><hr>                    
                    <div class="table-responsive datatable-custom">
                      <table id="datatablesuccess" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                        <thead class="thead-light">
                          <tr>
                            <th>
                              sn no.
                            </th>
                            <th class="table-column-ps-0">Full name</th>
                            <th>Exam Name</th>
                            <th>Date</th>
                            <th>correct answer</th>
                            <th>wrong answer</th>
                            <th>marks</th>
                            <th>view</th>
                          </tr>
                        </thead>
                        <?php  
                        if($type=="once"){
                        $queryss = "SELECT * FROM test_updates WHERE status_end='1' and exam_status='pass' and exam_id='$ex_idid' order by id DESC";
                        }else{
                          $queryss = "SELECT * FROM test_updates WHERE exam_status='pass' and exam_id='$ex_idid' order by id DESC";
                        }
                         $resultss = $connect->query($queryss);
                         $sn_v=1;
                        if ($resultss) {
                       foreach ($resultss as $rowss) {
                        $corret="";$marks_got="";
                        $exam_ides=$rowss['exam_id'];
                         $u_ides_da=$rowss['user_id'];
                        $user_id_fetch = $connect->query("SELECT nickname FROM users WHERE id = '$u_ides_da'");
                        $user_id_fetch_name = $user_id_fetch->fetchColumn();
                        $user_id_fetch_pic = $connect->query("SELECT file_name FROM users WHERE id = '$u_ides_da'");
                        $user_id_fetch_pic_name = $user_id_fetch_pic->fetchColumn();
                  
                          $corret=$rowss['correct_answer'];
                          $marks_got=$rowss['marks_got'];
                          $re_id=$rowss['repeat_id'];
                          $exam_status=$rowss['exam_status'];
                          $wrong_an=$questionNumberes-$corret;
                        ?>
                        <tbody>
                          <tr>
                            <td>
                             <?php echo $sn_v++; ?>
                            </td>
                            <td class="table-column-ps-0">
                              <?php 

                         $prof_pic11=$user_id_fetch_pic_name;
                         if ($prof_pic11 != "") {
                                                      $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                                                            $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                                        } else {
                                                            $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                        }
                                                    }
                         ?>
                               <a class="d-flex align-items-center" href="#">
                                 <div class="flex-shrink-0">
                                   <div class="avatar avatar-sm avatar-circle">
                                     <img class="avatar-img" src="<?php echo $pic11; ?>" alt="Image Description">
                                   </div>
                                 </div>
                                 <div class="flex-grow-1 ms-3">
                                   <h5 class="text-inherit mb-0"><?php echo $user_id_fetch_name?><i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></h5>
                                 </div>
                               </a>
                            </td>
                            <td>
                              <?php echo $exam_namesd?>
                            </td>
                            <td>
                              <?php echo $date_exams?>
                            </td>
                            <td>
                              <?php echo $corret." / ".$questionNumberes?>
                            </td>
                            <td>
                              <?php echo $wrong_an." / ".$questionNumberes?>
                            </td>
                            <td>
                              <?php echo $marks_got." / ".$exam_total?>
                            </td>
                            <td>
                            <a href="<?php echo BASE_URL;?>Test/studentpanel/checkanswer.php?id=<?php echo $ex_idid; ?>&r_id=<?php echo $re_id;?>&user_id=<?php echo $u_ides_da; ?>">View</a>
                            </td>
                          </tr>

                       
                        <?php 
                     } 
                }  
                  ?> 
                  </tbody>
                      </table>
                    </div>
                  </div>
                  <?php if($type=="once"){?>
                  <div class="tab-pane fade" id="failed" role="tabpanel" aria-labelledby="failed-tab">
              
                    <div class="table-responsive datatable-custom">
                      <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                               "columnDefs": [{
                                  "targets": [0, 1, 4],
                                  "orderable": false
                                }],
                               "order": [],
                               "info": {
                                 "totalQty": "#datatableWithPaginationInfoTotalQty"
                               },
                               "search": "#datatableSearch",
                               "entries": "#datatableEntries",
                               "pageLength": 8,
                               "isResponsive": false,
                               "isShowPaging": false,
                               "pagination": "datatablePagination"
                             }'>
                             <thead class="thead-light">
                          <tr>
                            <th>
                              sn no.
                            </th>
                            <th class="table-column-ps-0">Full name</th>
                            <th>Exam Name</th>
                            <th>Date</th>
                            <th>correct answer</th>
                            <th>wrong answer</th>
                            <th>marks</th>
                            <th>view</th>
                          </tr>
                        </thead>
                        <?php  
                        if($type=="once"){
                        $queryss = "SELECT * FROM test_updates WHERE status_end='1' and exam_id='$ex_idid' and exam_status='failed' order by id DESC";
                        }else{
                           $queryss = "SELECT *,max(`repeat_id`) as repeat_id FROM test_updates WHERE status_end='1' and exam_id='$ex_idid' group by exam_id,user_id order by id DESC";
                        }
                         $resultss = $connect->query($queryss);
                         $sn_v=1;
                        if ($resultss) {
                       foreach ($resultss as $rowss) {
                        $exam_ides=$rowss['exam_id'];
                        $exam_status=$rowss['exam_status'];
                        $exam_ui=$rowss['user_id'];
                         $sql121 = "SELECT count(`id`) FROM `test_updates` WHERE `exam_id`='$exam_ides' and user_id='$exam_ui' and exam_status='pass'";
                       $result121 = $connect->prepare($sql121);
                       $result121->execute();
                         $student_count121 = $result121->fetchColumn();
                       
                        if($exam_status=="failed" && $type=="repeat" && $student_count121==0 || $type=="once"){
                        $corret="";$marks_got="";
                      
                         $u_ides_da=$rowss['user_id'];
                        $user_id_fetch = $connect->query("SELECT nickname FROM users WHERE id = '$u_ides_da'");
                        $user_id_fetch_name = $user_id_fetch->fetchColumn();
                        $user_id_fetch_pic = $connect->query("SELECT file_name FROM users WHERE id = '$u_ides_da'");
                        $user_id_fetch_pic_name = $user_id_fetch_pic->fetchColumn();
                  
                          $corret=$rowss['correct_answer'];
                          $marks_got=$rowss['marks_got'];
                          $re_id=$rowss['repeat_id'];
                          $exam_status=$rowss['exam_status'];
                          $wrong_an=$questionNumberes-$corret;
                        ?>
                        <tbody>
                          <tr>
                            <td>
                             <?php echo $sn_v++; ?>
                            </td>
                            <td class="table-column-ps-0">
                              <?php 

                         $prof_pic11=$user_id_fetch_pic_name;
                         if ($prof_pic11 != "") {
                                                      $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                                                            $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                                        } else {
                                                            $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                        }
                                                    }
                         ?>
                               <a class="d-flex align-items-center" href="#">
                                 <div class="flex-shrink-0">
                                   <div class="avatar avatar-sm avatar-circle">
                                     <img class="avatar-img" src="<?php echo $pic11; ?>" alt="Image Description">
                                   </div>
                                 </div>
                                 <div class="flex-grow-1 ms-3">
                                   <h5 class="text-inherit mb-0"><?php echo $user_id_fetch_name?><i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></h5>
                                 </div>
                               </a>
                            </td>
                            <td>
                              <?php echo $exam_namesd?>
                            </td>
                            <td>
                              <?php echo $date_exams?>
                            </td>
                            <td>
                              <?php echo $corret." / ".$questionNumberes?>
                            </td>
                            <td>
                              <?php echo $wrong_an." / ".$questionNumberes?>
                            </td>
                            <td>
                              <?php echo $marks_got." / ".$exam_total?>
                            </td><td>
                            <a href="<?php echo BASE_URL;?>Test/studentpanel/checkanswer.php?id=<?php echo $ex_idid; ?>&r_id=<?php echo $re_id;?>&user_id=<?php echo $u_ides_da; ?>">View</a>
                            </td>
                          </tr>

                       
                        <?php 
                     } 
                }  
              }
                  ?> 
                  </tbody>
                      </table>
                    </div>
                  </div>
                  <?php } ?>
                  <?php if($type=="once"){ ?>
             <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                
                    <div class="table-responsive datatable-custom">
                      <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                               "columnDefs": [{
                                  "targets": [0, 1, 4],
                                  "orderable": false
                                }],
                               "order": [],
                               "info": {
                                 "totalQty": "#datatableWithPaginationInfoTotalQty"
                               },
                               "search": "#datatableSearch",
                               "entries": "#datatableEntries",
                               "pageLength": 8,
                               "isResponsive": false,
                               "isShowPaging": false,
                               "pagination": "datatablePagination"
                             }'>
                             <thead class="thead-light">
                          <tr>
                            <th>
                              sn no.
                            </th>
                            <th class="table-column-ps-0">Full name</th>
                            <th>Exam Name</th>
                            <th>Date</th>
                            <th>correct answer</th>
                            <th>wrong answer</th>
                            <th>marks</th>
                          </tr>
                        </thead>
                        <?php  
                        if($type=="once"){
                        $queryss = "SELECT * FROM test_updates WHERE status_start='1' and exam_id='$ex_idid' and end_time is null order by id DESC";
                        }else{
                           $queryss = "SELECT *,max(`repeat_id`) as repeat_id FROM test_updates WHERE status_end='' and status_start='1' and exam_id='$ex_idid' group by exam_id,user_id order by id DESC";
                        }
                         $resultss = $connect->query($queryss);
                         $sn_v=1;
                        if ($resultss) {
                       foreach ($resultss as $rowss) {
                        $exam_status=$rowss['exam_status'];
                       
                        $corret="";$marks_got="";
                        $exam_ides=$rowss['exam_id'];
                         $u_ides_da=$rowss['user_id'];
                        $user_id_fetch = $connect->query("SELECT nickname FROM users WHERE id = '$u_ides_da'");
                        $user_id_fetch_name = $user_id_fetch->fetchColumn();
                        $user_id_fetch_pic = $connect->query("SELECT file_name FROM users WHERE id = '$u_ides_da'");
                        $user_id_fetch_pic_name = $user_id_fetch_pic->fetchColumn();
                  
                          $corret=$rowss['correct_answer'];
                          $marks_got=$rowss['marks_got'];
                          $re_id=$rowss['repeat_id'];
                          $exam_status=$rowss['exam_status'];
                          $wrong_an=$questionNumberes-$corret;
                        ?>
                        <tbody>
                          <tr>
                            <td>
                             <?php echo $sn_v++; ?>
                            </td>
                            <td class="table-column-ps-0">
                              <?php 

                         $prof_pic11=$user_id_fetch_pic_name;
                         if ($prof_pic11 != "") {
                                                      $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                                                            $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                                        } else {
                                                            $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                        }
                                                    }
                         ?>
                               <a class="d-flex align-items-center" href="#">
                                 <div class="flex-shrink-0">
                                   <div class="avatar avatar-sm avatar-circle">
                                     <img class="avatar-img" src="<?php echo $pic11; ?>" alt="Image Description">
                                   </div>
                                 </div>
                                 <div class="flex-grow-1 ms-3">
                                   <h5 class="text-inherit mb-0"><?php echo $user_id_fetch_name?><i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></h5>
                                 </div>
                               </a>
                            </td>
                            <td>
                              <?php echo $exam_namesd?>
                            </td>
                            <td>
                              <?php echo $date_exams?>
                            </td>
                            <td>
                              <?php echo " - "?>
                            </td>
                            <td>
                              <?php echo " - "?>
                            </td>
                            <td>
                              <?php echo " - "?>
                            </td>
                          </tr>

                       
                        <?php 
                     } 
                }  
            
                  ?> 
                  </tbody>
                      </table>
                    </div>
                  </div>
                  <?php }else{
                    ?>
                     <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                
                <div class="table-responsive datatable-custom">
                  <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                           "columnDefs": [{
                              "targets": [0, 1, 4],
                              "orderable": false
                            }],
                           "order": [],
                           "info": {
                             "totalQty": "#datatableWithPaginationInfoTotalQty"
                           },
                           "search": "#datatableSearch",
                           "entries": "#datatableEntries",
                           "pageLength": 8,
                           "isResponsive": false,
                           "isShowPaging": false,
                           "pagination": "datatablePagination"
                         }'>
                         <thead class="thead-light">
                      <tr>
                        <th>
                          sn no.
                        </th>
                        <th class="table-column-ps-0">Full name</th>
                       </tr>
                    </thead>
                    <?php  
                    if($examFor =="course"){
                      $sql = "SELECT CourseName, CourseCode FROM newcourse WHERE Courseid = :course_id";
                      $stmt = $connect->prepare($sql);
                      $stmt->bindParam(':course_id', $coursed_ided, PDO::PARAM_INT);
                      $stmt->execute();
                      $result1333 = $stmt->fetch(PDO::FETCH_ASSOC);
                     if ($result1333) {
                          $CourseNamess=$result1333['CourseName'];
                          $CourseCodess=$result1333['CourseCode'];
                     }
                     $queryss = "SELECT StudentNames as student_name FROM `newcourse` WHERE CourseName ='$CourseNamess' and CourseCode='$CourseCodess'";
                    
                    }else if($examFor=="par"){
                      $queryss = "SELECT examSubject as student_name FROM `studentexam` WHERE examId ='$ex_idid'";
                     
                    }else if($examFor=="dep"){
                      $queryss = "SELECT userId as student_name FROM `userdepartment` WHERE departmentId ='$dep_id'";
                     
                    }else if($examFor=="everyone"){
                      $queryss = "SELECT id as student_name FROM `users` WHERE `role`!='super admin'";
                      
                    }else{
                      $examName = $connect->query("SELECT roles FROM roles WHERE id = '$examFor'");
                     $examNameData = $examName->fetchColumn();
                     $queryss = "SELECT id as student_name FROM `users` WHERE `role`='$examNameData'";
                   
                    }
                    
                     $resultss = $connect->query($queryss);
                     $sn_v=1;
                    if ($resultss) {
                   foreach ($resultss as $rowss) {
                     $u_ides_da=$rowss['student_name'];
                    $user_id_fetch = $connect->query("SELECT nickname FROM users WHERE id = '$u_ides_da'");
                    $user_id_fetch_name = $user_id_fetch->fetchColumn();
                    $user_id_fetch_pic = $connect->query("SELECT file_name FROM users WHERE id = '$u_ides_da'");
                    $user_id_fetch_pic_name = $user_id_fetch_pic->fetchColumn();
                    $nRows = $connect->query("select count(*) from test_updates where user_id='$u_ides_da' and exam_id='$ex_idid' and exam_status='pass'")->fetchColumn();
                    if($nRows==0){
                  ?>
                    <tbody>
                      <tr>
                        <td>
                         <?php echo $sn_v++; ?>
                        </td>
                        <td class="table-column-ps-0">
                          <?php 

                     $prof_pic11=$user_id_fetch_pic_name;
                     if ($prof_pic11 != "") {
                                                  $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                                                        $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                                    } else {
                                                        $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                    }
                                                }
                     ?>
                           <a class="d-flex align-items-center" href="#">
                             <div class="flex-shrink-0">
                               <div class="avatar avatar-sm avatar-circle">
                                 <img class="avatar-img" src="<?php echo $pic11; ?>" alt="Image Description">
                               </div>
                             </div>
                             <div class="flex-grow-1 ms-3">
                               <h5 class="text-inherit mb-0"><?php echo $user_id_fetch_name?><i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></h5>
                             </div>
                           </a>
                        </td>
                        
                      </tr>

                   
                    <?php 
                    }
                 } 
            }  
        
              ?> 
              </tbody>
                  </table>
                </div>
              </div>

                    <?php 
                  } ?>
                </div>
                <!-- End Tab Content -->
            </div>
          </div>
        </div>
      </div>


      <div class="row justify-content-center d-none">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- <div class="m-3" style="text-align:end;">
              <h1 class="text-danger">Time : <i class="bi bi-stopwatch"></i> 3:40 Min Left</h1>
            </div> -->
            <div class="card-body">
              <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                      <div class="row justify-content-between align-items-center flex-grow-1">
                        <div class="col-md">
                          <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-header-title">Users</h4>

                            <!-- Datatable Info -->
                            <div id="datatableCounterInfo" style="display: none;">
                              <div class="d-flex align-items-center">
                                <span class="fs-6 me-3">
                                  <span id="datatableCounter">0</span>
                                  Selected
                                </span>
                                <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                                  <i class="tio-delete-outlined"></i> Delete
                                </a>
                              </div>
                            </div>
                            <!-- End Datatable Info -->
                          </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                          <!-- Filter -->
                          <div class="row align-items-sm-center">
                            <div class="col-sm-auto">
                              <div class="row align-items-center gx-0">
                                <div class="col">
                                  <span class="text-secondary me-2">Status:</span>
                                </div>
                                <!-- End Col -->

                                <div class="col-auto">
                                  <!-- Select -->
                                  <div class="tom-select-custom tom-select-custom-end">
                                    <select class="js-select js-datatable-filter form-select form-select-sm form-select-borderless" data-target-column-index="2" data-target-table="datatable" autocomplete="off" data-hs-tom-select-options='{
                                              "searchInDropdown": false,
                                              "hideSearch": true,
                                              "dropdownWidth": "10rem"
                                            }'>
                                      <option value="null" selected>All</option>
                                      <option value="successful">Successful</option>
                                      <option value="overdue">Overdue</option>
                                      <option value="pending">Pending</option>
                                    </select>
                                  </div>
                                  <!-- End Select -->
                                </div>
                                <!-- End Col -->
                              </div>
                              <!-- End Row -->
                            </div>
                            <!-- End Col -->

                            <div class="col-sm-auto">
                              <div class="row align-items-center gx-0">
                                <div class="col">
                                  <span class="text-secondary me-2">Signed up:</span>
                                </div>
                                <!-- End Col -->

                                <div class="col-auto">
                                  <!-- Select -->
                                  <div class="tom-select-custom tom-select-custom-end">
                                    <select class="js-select js-datatable-filter form-select form-select-sm form-select-borderless" data-target-column-index="5" data-target-table="datatable" autocomplete="off" data-hs-tom-select-options='{
                                              "searchInDropdown": false,
                                              "hideSearch": true,
                                              "dropdownWidth": "10rem"
                                            }'>
                                      <option value="null" selected>All</option>
                                      <option value="1 year ago">1 year ago</option>
                                      <option value="6 months ago">6 months ago</option>
                                    </select>
                                  </div>
                                  <!-- End Select -->
                                </div>
                                <!-- End Col -->
                              </div>
                              <!-- End Row -->
                            </div>
                            <!-- End Col -->

                            <div class="col-md">
                              <form>
                                <!-- Search -->
                                <div class="input-group input-group-merge input-group-flush">
                                  <div class="input-group-prepend input-group-text">
                                    <i class="bi-search"></i>
                                  </div>
                                  <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                                </div>
                                <!-- End Search -->
                              </form>
                            </div>
                            <!-- End Col -->
                          </div>
                          <!-- End Filter -->
                        </div>
                        <!-- End Col -->
                      </div>
                      <!-- End Row -->
                    </div>
                    <!-- End Header -->

        <!-- Table -->
        <div class="table-responsive datatable-custom">
          <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                   "columnDefs": [{
                      "targets": [0, 1, 4],
                      "orderable": false
                    }],
                   "order": [],
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 8,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatablePagination"
                 }'>
            <thead class="thead-light">
              <tr>
                <th scope="col" class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                    <label class="form-check-label" for="datatableCheckAll"></label>
                  </div>
                </th>
                <th class="table-column-ps-0">Full name</th>
                <th>Status</th>
                <!-- <th>Type</th> -->
                <th>Email</th>
                <!-- <th>Signed up</th> -->
                <th>User ID</th>
              </tr>
            </thead>
            <?php  $query7 = "SELECT * FROM users";
 $statement = $connect->prepare($query7);
 $statement->execute();

 if($statement->rowCount() > 0)
     {
         $result = $statement->fetchAll();
         $sn=1;
         foreach($result as $row)
         {
            ?>
            <tbody>
              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck2">
                    <label class="form-check-label" for="usersDataCheck2"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <?php 
             $prof_pic11=$row['file_name'];
            

            if ($prof_pic11 != "") {


                                            $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                                                $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                            } else {
                                                $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                        }
             ?>
                  <a class="d-flex align-items-center" href="#">
                    <div class="flex-shrink-0">
                      <div class="avatar avatar-sm avatar-circle">
                        <img class="avatar-img" src="<?php echo $pic11; ?>" alt="Image Description">
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="text-inherit mb-0"><?php echo $row['name']?><i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></h5>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="legend-indicator bg-success"></span>Successful
                </td>
                <!-- <td>Unassigned</td> -->
                <td><?php echo $row['email']?></td>
                <!-- <td>1 year ago</td> -->
                <td><?php echo $row['studid']?></td>
              </tr>

            </tbody>
            <?php 
         }
      
     }       ?> 
          </table>
        </div>
        <!-- End Table -->

        <!-- Footer -->
        <div class="card-footer">
          <!-- Pagination -->
          <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
            <div class="col-sm mb-2 mb-sm-0">
              <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                <span class="me-2">Showing:</span>

                <!-- Select -->
                <div class="tom-select-custom">
                  <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true
                          }'>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="8" selected>8</option>
                    <option value="12">12</option>
                  </select>
                </div>
                <!-- End Select -->

                <span class="text-secondary me-2">of</span>

                <!-- Pagination Quantity -->
                <span id="datatableWithPaginationInfoTotalQty"></span>
              </div>
            </div>
            <!-- End Col -->

            <div class="col-sm-auto">
              <div class="d-flex justify-content-center justify-content-sm-end">
                <!-- Pagination -->
                <nav id="datatablePagination" aria-label="Activity pagination"></nav>
              </div>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Pagination -->
        </div>
        <!-- End Footer -->
      </div>
            </div>

          </div>
          <!-- End Card -->
        </div>
      </div>

    </div>

    <!-- End Row -->
    </div>
    <!-- End Content -->

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
    $(document).on('ready', function () {
      // INITIALIZATION OF DATERANGEPICKER
      // =======================================================
      $('.js-daterangepicker').daterangepicker();

      $('.js-daterangepicker-times').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'M/DD hh:mm A'
        }
      });

      var start = moment();
      var end = moment();

      function cb(start, end) {
        $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
      }

      $('#js-daterangepicker-predefined').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);

      cb(start, end);
    });


    // INITIALIZATION OF DATATABLES
    // =======================================================
    HSCore.components.HSDatatables.init($('#datatable'), {
      select: {
        style: 'multi',
        selector: 'td:first-child input[type="checkbox"]',
        classMap: {
          checkAll: '#datatableCheckAll',
          counter: '#datatableCounter',
          counterInfo: '#datatableCounterInfo'
        }
      },
      language: {
        zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
      }
    });

    const datatable = HSCore.components.HSDatatables.getItem(0)

    document.querySelectorAll('.js-datatable-filter').forEach(function (item) {
      item.addEventListener('change',function(e) {
        const elVal = e.target.value,
    targetColumnIndex = e.target.getAttribute('data-target-column-index'),
    targetTable = e.target.getAttribute('data-target-table');

    HSCore.components.HSDatatables.getItem(targetTable).column(targetColumnIndex).search(elVal !== 'null' ? elVal : '').draw()
      })
    })
  </script>

  <script>
    (function() {
      window.onload = function () {
        

        // INITIALIZATION OF NAVBAR VERTICAL ASIDE
        // =======================================================
        new HSSideNav('.js-navbar-vertical-aside').init()


        // INITIALIZATION OF FORM SEARCH
        // =======================================================
        const HSFormSearchInstance = new HSFormSearch('.js-form-search')

        if (HSFormSearchInstance.collection.length) {
          HSFormSearchInstance.getItem(1).on('close', function (el) {
            el.classList.remove('top-0')
          })

          document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
            let dataOptions = JSON.parse(e.currentTarget.getAttribute('data-hs-form-search-options')),
              $menu = document.querySelector(dataOptions.dropMenuElement)

            $menu.classList.add('top-0')
            $menu.style.left = 0
          })
        }


        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()


        // INITIALIZATION OF CHARTJS
        // =======================================================
        Chart.plugins.unregister(ChartDataLabels);
        HSCore.components.HSChartJS.init('.js-chart')


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('#updatingBarChart')
        const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart')

        // Call when tab is clicked
        document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
          item.addEventListener('click', e => {
            let keyDataset = e.currentTarget.getAttribute('data-datasets')

            const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart', HSThemeAppearance.getAppearance())

            if (keyDataset === 'lastWeek') {
              updatingBarChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25", "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"];
              updatingBarChart.data.datasets = [
                {
                  "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                  "backgroundColor": styles.data.datasets[0].backgroundColor,
                  "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                  "borderColor": styles.data.datasets[0].borderColor
                },
                {
                  "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
                  "backgroundColor": styles.data.datasets[1].backgroundColor,
                  "borderColor": styles.data.datasets[1].borderColor
                }
              ];
              updatingBarChart.update();
            } else {
              updatingBarChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"];
              updatingBarChart.data.datasets = [
                {
                  "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                  "backgroundColor": styles.data.datasets[0].backgroundColor,
                  "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                  "borderColor": styles.data.datasets[0].borderColor
                },
                {
                  "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                  "backgroundColor": styles.data.datasets[1].backgroundColor,
                  "borderColor": styles.data.datasets[1].borderColor
                }
              ]
              updatingBarChart.update();
            }
          })
        })


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('.js-chart-datalabels', {
          plugins: [ChartDataLabels],
          options: {
            plugins: {
              datalabels: {
                anchor: function (context) {
                  var value = context.dataset.data[context.dataIndex];
                  return value.r < 20 ? 'end' : 'center';
                },
                align: function (context) {
                  var value = context.dataset.data[context.dataIndex];
                  return value.r < 20 ? 'end' : 'center';
                },
                color: function (context) {
                  var value = context.dataset.data[context.dataIndex];
                  return value.r < 20 ? context.dataset.backgroundColor : context.dataset.color;
                },
                font: function (context) {
                  var value = context.dataset.data[context.dataIndex],
                    fontSize = 25;

                  if (value.r > 50) {
                    fontSize = 35;
                  }

                  if (value.r > 70) {
                    fontSize = 55;
                  }

                  return {
                    weight: 'lighter',
                    size: fontSize
                  };
                },
                offset: 2,
                padding: 0
              }
            }
          }
        })

        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select')


        // INITIALIZATION OF CLIPBOARD
        // =======================================================
        HSCore.components.HSClipboard.init('.js-clipboard')
      }
    })()
  </script>

<script>
function successsearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("successsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("datatablesuccess");
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

<script>
function checkAll() {
    var checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
    var checkAllCheckbox = document.getElementById('datatableCheckAll');

    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = checkAllCheckbox.checked;
    }
}
</script>


<script>
$(document).ready(function() {
  // Add change event listener to the select element
  $('#monthFilter').on('change', function() {
    var selectedMonth = $(this).val();

    // Show all rows by default
    $('#datatablesuccess tbody tr').show();

    // Filter rows based on the selected month
    if (selectedMonth !== 'all') {
      $('#datatablesuccess tbody tr').each(function() {
        var rowDate = $(this).find('td:nth-child(5)').text(); // Get the date column
        var rowMonth = rowDate.split(' ')[0]; // Extract the month from the date
        if (rowMonth !== selectedMonth) {
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