<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$std_course = "";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Dynamic</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>



  <div id="header-hide">
    <?php
    include ROOT_PATH . 'includes/head_navbar.php';
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
              <?php include 'courcecode.php'; ?>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">

              <div id="info-gradesheet">
                <?php
                $select_cat_data_id = "";
                $select_cl = "";
                // error message 
                
                 ?></div>
              <input type="hidden" id="ctp_value1" value="<?php echo $std_course1 ?>">
              <div class="row">
              <?php
              $query_phase = "SELECT * FROM phase where ctp='$std_course1'";
              $statement_phase = $connect->prepare($query_phase);
              $statement_phase->execute();
              $result_phase = $statement_phase->fetchAll();
              foreach ($result_phase as $row) {
                if($row['color'] == ""){
                  $bgColor = "gray";
                }else{
                  $bgColor = $row['color'];
                }
              ?>
                
                  <?php
                  //select id
                  $phase = $row['id'];
                  ?>
                  <div class="col-4 mb-3 mb-lg-15">
                    <div class="card card-hover-shadow h-100">
                      <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;background-color:<?php echo $bgColor; ?>;">
                        <h1 style="color:white;"><?php echo $row['phasename'] ?></h1>
                      </div>
                      <div class="card-body">
                        <table>
                  <?php
                  $query = "SELECT * FROM actual_phase where ctp_id='$std_course1'";
                  $statement = $connect->prepare($query);
                  $statement->execute();
                  $result = $statement->fetchAll();
                  foreach ($result as $row) { ?>
                    
                    <div class="container">
                      <tr>
                        <?php
                        $phase = $row['phase'];
                        ?></tr>
                      <tr>
                        <?php
                        $query1 = "SELECT * FROM actual where phase='$phase'";
                        $statement1 = $connect->prepare($query1);
                        $statement1->execute();
                        $result1 = $statement1->fetchAll();
                        foreach ($result1 as $row1) {
                          $ides = $row1['id'];
                          $table = "actual";
                          $className = $row1['symbol'];
                          // $className = str_replace(' ', '', $className1);

                          $over_all_grade = $connect->prepare("SELECT over_all_grade FROM `gradesheet` WHERE class=? and class_id=? and user_id=?");
                          $over_all_grade->execute([$table, $ides, $fetchuser_id]);
                           $grade = $over_all_grade->fetchColumn();
                          $get_ins_name = "";
                          $instructores = $connect->prepare("SELECT to_userid FROM `notifications` WHERE type=? and data=? and user_id=? and extra_data='is selected to fill gradsheet of'");
                          $instructores->execute([$table, $ides, $fetchuser_id]);
                          $instructor = $instructores->fetchColumn();

                          $codeId = $connect->prepare("SELECT gradsheet_status FROM `gradesheet` WHERE class=? and class_id=? and user_id=?");
                          $codeId->execute([$table, $ides, $fetchuser_id]);
                          $codeIdData = $codeId->fetchColumn();

                          $checkCode = 0;

                          $codeName = $connect->prepare("SELECT code FROM `status` WHERE id=?");
                          $codeName->execute([$codeIdData]);
                          $codeNameData = $codeName->fetchColumn();

                          $over_all_grade_per1 = $connect->prepare("SELECT over_all_grade_per FROM `gradesheet` WHERE class=? and class_id=? and user_id=?");
                          $over_all_grade_per1->execute([$table, $ides, $fetchuser_id]);
                          $over_all_grade_per = $over_all_grade_per1->fetchColumn();
                          $added_ins_name = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                          $added_ins_name->execute([$instructor]);
                          $get_ins_name = $added_ins_name->fetchColumn();

                          if ($grade == "U") {
                            $class = "btn btn-danger";
                          } elseif ($grade == "F") {
                            $class = "btn btn-warning";
                          } elseif ($grade == "G") {
                            $class = "btn btn-secondary";
                          } elseif ($grade == "V") {
                            $class = "btn btn-success";
                          } elseif ($grade == "E") {
                            $class = "btn btn-primary";
                          } elseif ($grade == "N") {
                            $class = "btn btn-soft-dark";
                          } else {
                            $class = "btn btn-dark";
                          }

                       
                          ?>

                          <a style="position:relative;margin-right:10px; margin-bottom:25px;" class="<?php echo $class; ?> btn" data-back="<?php echo $over_all_grade_per; ?>/<?php echo $get_ins_name; ?>" href="newgradesheet.php?id=<?php echo urlencode(base64_encode($row1['id'])); ?>&class_name=<?php echo urlencode(base64_encode($table)); ?>" data-front="<?php echo $row1['symbol']; ?>" ><span style="white-space: nowrap;"><?php echo $className; ?></span>
                          
                        </a>
                          <?php
                        }

                        ?>

                      <tr>
                        <hr style="color:white;">
                        
                      <?php } ?>

                </table>
                      </div>
                    </div>
                  </div>
                

              <?php } ?>
            </div>
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
  <div class="modal fade" id="assingclass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">delete Warning</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
          <form action="insertassing_warning.php" method="post">
          <input type="hidden" name="user_Id" value="<?php echo $fetchuser_id; ?>">
                                   <table class="table table-bordered" id="table-field" style="width:100%;">
                                   <input type="hidden" id="warning_value" name="warning" value="">
                                       
                                       <tr>
                                           <td>

                                               <select name="cat[]" class="select_Cat" style="border: 1px solid LightGray;border-radius:4px;padding:10px">
                                                   <option value="" disabled selected>-select value-</option>
                                                   <option value="actual">Actual</option>
                                                   <option value="sim">Sim</option>
                                                   <option value="test">Test</option>
                                                   <option value="other">Other</option>
                                                 </select>
                                           </td>
                                          
                                           <td>
                                               <div id="showdropselect_Cat">
                                                   <select name="cat_data[]" class="fetched_cat_dataselect_Cat" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">
                                                       <option selected value="0" disabled>-select category-</option>
                                                   </select>
                                               </div>
                                               <div id="showotherselect_Cat" style="display:none">
                                                   <textarea name="other[]" class="fetched_cat_data_otherselect_Cat">
                                                   </textarea>
                                               </div>
                                           </td>

                                           <td>
                                               <button type="button" name="add_phase" id="add_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button>
                                           </td>
                                       </tr>
                                   </table>
                                   <br>
              <button class="btn btn-danger" value="" id="get_noti_idey1" name="noti_id" type="submit">Add</button>
               </form>
            </center>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="firstdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">delete Warning</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
              <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#secdelete">Are You Sure To Delete Warning?</button>
            </center>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="secdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">delete Warning</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
          <form action="del_cap_noti.php" method="post">
              <button class="btn btn-danger" value="" id="get_noti_idey" name="noti_id" type="submit">Delete</button>
               </form>
            </center>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="fileLink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">All Warning</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo BASE_URL; ?>includes/Pages/updateWarning.php">
            <div>
              <input type="hidden" name="notId" id="notId" />
              <?php
              $warningQuery = $connect->query("SELECT * FROM warning_data");
              while ($warningData = $warningQuery->fetch()) {
              ?>
                <input type="radio" name="warningId" value="<?php echo $warningData['id']; ?>"> <?php echo $warningData['warning_name']; ?> </br>
              <?php
              }
              ?>
            </div>
            <br />
            <center>
              <input class="btn btn-success" type="submit" name="updateWarning" value="update" />
            </center>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="attch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">All Warning</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="insert_attchment_cap.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="noti_id" id="noti_id">
          <label class="form-label" style="color:black; font-weight:bold;">Attachment</label>
          <input type="file" class="form-control" name="files[]" multiple>
            <center>
              <input class="btn btn-success" type="submit" value="Add" />
            </center>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="assing_warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">Assing Warning</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo BASE_URL; ?>includes/Pages/assing_warning.php" method="post" enctype="multipart/form-data">
            <div id="assi_div">
              <input type="text" name="warId" id="warId" />
              <input type="text" name="u_id" value="<?php echo $fetchuser_id ?>" />
              <label>select attachment:</label><br>
              <input class="form-control" type="file" name="doc" accept="application/pdf" />
              <label>select class type:</label><br>
              <select name="cat" class="select_Cat form-control">
                <option value="actual">Actual</option>
                <option value="sim">Sim</option>
                <option value="test">Test</option>
              </select>
              <label>select class:</label><br>
              <select name="cat_data" class="fetched_cat_dataselect_Cat form-control">

              </select>
            </div>
            <br />
            <center>
              <input class="btn btn-success" type="submit" name="updateWarning" value="update" />
            </center>
          </form>
        </div>
      </div>
    </div>
  </div>

<!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>




</html>