<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$std_course = "";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Critical Action Page</title>
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
          <h1 class="text-success">
            <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/CAP.png">
            Critical Action Page
          </h1>
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
                $query_warning = "SELECT * FROM warning_data where ctp='$std_course1'";
                $statement_warning = $connect->prepare($query_warning);
                $statement_warning->execute();
                $result_warning = $statement_warning->fetchAll();
                foreach ($result_warning as $row) {
                  if ($row['bgColor'] == "") {
                    $bgColor = "gray";
                  } else {
                    $bgColor = $row['bgColor'];
                  }
                ?>

                  <?php
                  //select id
                  $warning = $row['id'];
                  ?>
                  <div class="col-4 mb-3 mb-lg-15">
                    <div class="card card-hover-shadow h-100">
                      <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;background-color:<?php echo $bgColor; ?>;">
                        <h1 style="color:white;"><?php echo $row['warning_name'] ?></h1>
                      </div>
                      <div class="card-body">
                        <!-- print type name -->
                        <?php

                        $sql11 = "SELECT count(*) FROM notifications WHERE user_id='$fetchuser_id' and to_userid='$fetchuser_id' and data='$warning' and extra_data='reached_cout'";
                        $result11 = $connect->prepare($sql11);
                        $result11->execute();
                        $number_of_rows110 = $result11->fetchColumn();
                        if (isset($_SESSION['permission']) && $permission['assign_Cap'] == "1" && $number_of_rows110 == 0) {
                        ?>
                          <a class="btn btn-soft-danger btn-sm" href="<?php echo BASE_URL; ?>includes/Pages/assignWarning.php?warning_id=<?php echo $warning ?>"><i class="bi bi-exclamation-triangle-fill"></i></a>

                        <?php } ?>


                        <?php
                        $query_warning_data = "SELECT * FROM notifications where user_id='$fetchuser_id' and  to_userid='$fetchuser_id' and extra_data='reached_cout' and data='$warning'";
                        $statement_warning_data = $connect->prepare($query_warning_data);
                        $statement_warning_data->execute();
                        if ($statement_warning_data->rowCount() > 0) {
                          $result_warning_Data = $statement_warning_data->fetchAll();

                          foreach ($result_warning_Data as $row_data) {
                            $no_id = $row_data['id'];
                            $read_noti_student = $row_data['is_read'];
                            if ($role == "super admin") {
                        ?>
                              <!-- <button class="btn btn-soft-success btn-sm" data-bs-toggle="modal" data-bs-target="#attch" onclick="document.getElementById('noti_id').value='<?php echo $no_id ?>';"><i class="bi bi-paperclip"></i></button><br> -->
                              <?php
                            }
                            $type = $row_data['type'];

                            $feth_details_class = "SELECT * FROM new_warnning where notificationId='$no_id'";
                            $feth_details_classst = $connect->prepare($feth_details_class);
                            $feth_details_classst->execute();
                            if ($feth_details_classst->rowCount() > 0) {
                              $sns1 = '1';
                              $result_warning_Datast = $feth_details_classst->fetchAll();
                              echo '<span class="text-dark" style="font-weight:bold;list-style-type: circle;">&#8226; Class/Test : </span>';
                              foreach ($result_warning_Datast as $row_data1) {
                                $table_name1 = $row_data1['type'];
                                $symbol_id1 = $row_data1['classId'];
                                if ($table_name1 == "actual") {
                                  $q = $connect->prepare("SELECT symbol FROM $table_name1 WHERE id=?");
                                } else if ($table_name1 == "sim") {
                                  $q = $connect->prepare("SELECT shortsim FROM $table_name1 WHERE id=?");
                                } else if ($table_name1 == "test") {
                                  $q = $connect->prepare("SELECT shorttest FROM $table_name1 WHERE id=?");
                                }
                                $q->execute([$symbol_id1]);
                                $name = $q->fetchColumn();
                                if ($table_name1 == "other") {
                                  $name = $row_data1['classId'];
                                }
                                echo '<span style="color:red;">';
                                echo $sns1++ . ')' . $name . ' </span>';
                              }
                            }


                            if ($type != "") {
                              $query_cat_warning = "SELECT * FROM warning_category_data where id='$type'";
                              $statement_cat_warning = $connect->prepare($query_cat_warning);
                              $statement_cat_warning->execute();
                              $result_cat_warning = $statement_cat_warning->fetchAll();
                              foreach ($result_cat_warning as $row_cat) {
                              ?>
                                <span class="text-dark" style="font-weight:bold;">&#8226; Grades : </span><span style="color:red;"><?php echo $row_cat['grade'] ?></span><br>
                                <span class="text-dark" style="font-weight:bold;">&#8226; Warning Count : </span><span style="color:red;"><?php echo $row_cat['count'] ?></span>
                              <?php  }
                            }
                            $initial = "";
                            $q1 = $connect->prepare("SELECT permission FROM warning_permission WHERE std_id=? and	warning_id='$warning'");
                            $q1->execute([$fetchuser_id]);
                            $name1 = $q1->fetchColumn();
                            $select_ini = $connect->prepare("SELECT initial FROM users WHERE id=?");
                            $select_ini->execute([$fetchuser_id]);
                            $select_ini_id = $select_ini->fetchColumn();
                            if ($select_ini_id != "") {
                              $initial = $select_ini_id;
                            } else {
                              $initial = "not added yet";
                            }
                            if ($name1 == "accept") {
                              echo '<br><span class="text-dark" style="font-weight:bold;">&#8226; Notification Status :</span><span style="color:red;">Accepted</span>';
                              echo '<br><span class="text-dark" style="font-weight:bold;">&#8226; Initial : </span>';
                              echo '<span style="color:red;">'
                                . $initial;
                              echo '</span>';
                            }
                            if ($name1 == "not accept") {
                              echo '<br><span class="text-dark" style="font-weight:bold;">&#8226; Notification Status :</span><span style="color:red;">Decline</span>';
                            }
                            if ($name1 == "") {
                              echo '<br><span class="text-dark" style="font-weight:bold;">&#8226; Notification Status :</span><span style="color:red;">Not Accepted</span>';
                            }
                            echo '<br><span class="text-dark" style="font-weight:bold;">&#8226; Attachment : </span>';
                            $feth_doc_class = "SELECT * FROM assing_warning_doc where noti_id='$no_id'";
                            $feth_doc_classst = $connect->prepare($feth_doc_class);
                            $feth_doc_classst->execute();
                            $snatt = '1';
                            if ($feth_doc_classst->rowCount() > 0) {
                              $result_warning_Datast = $feth_doc_classst->fetchAll();
                              foreach ($result_warning_Datast as $row_data2) { 
                                $fileId = $row_data2['files'];
                                if (is_numeric($fileId)) {
                                $fetchFile = $connect->query("SELECT * FROM user_files WHERE id = '$fileId'");
                                $fileData = $fetchFile->fetch();
                                ?>

                                <table>
                                  <tr>
                                    <?php
                                    if($fileData['lastName'] == ""){
                                    ?>
                                    <td style="margin-left:20px;"> - <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileData['filename']; ?>" target="_blank"><?php echo $fileData['filename']; ?></a></td>
                                    <?php
                                   } 
                                   if($fileData['type'] == "online"){
                                   ?>
                                   <td style="margin-left:20px;"> - <a href="<?php echo $fileData['filename']; ?>" target="_blank"><?php echo $fileData['lastName']; ?></a></td>
                                   <?php
                                   }if($fileData['type'] == "offline"){
                                    ?>
                                    <td style="margin-left:20px;"> - <a class="driveLinkPer" value="<?php echo $fileData['filename']; ?>" target="_blank"><?php echo $fileData['lastName']; ?></a></td>
                                    <?php
                                    }
                                    ?>
                                    <td>
                                      <?php
                                      if ($_SESSION['role'] == "super admin") {
                                      ?>
                                        <a style="margin: 5px;" class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/deleteWarningDoc.php?docId=<?php echo $row_data2['id']; ?>&notiId=<?php echo $no_id; ?>"><i class="bi bi-trash-fill"></i></a>
                                      <?php } ?>
                                    </td>
                                  </tr>
                                </table>

                              <?php } }
                            }
                            echo '<hr>';
                            if ($_SESSION['role'] == "super admin") {
                              if ($read_noti_student == '1') { ?>

                                <span style="display:inline-block;">
                                  <form action="resend_noti.php" method="post"><button type="submit" class="btn btn-soft-primary" name="noti_id" value="<?php echo $no_id ?>"><i class="bi bi-arrow-repeat"></i></button></form>
                                </span>
                              <?php } ?>
                              <div style="text-align: center;">
                                <span style="display:inline-block;margin-left:15px;">
                                  <button type="button" class="btn btn-soft-danger" name="noti_id" data-bs-toggle="modal" data-bs-target="#firstdelete" onclick="document.getElementById('get_noti_idey').value='<?php echo $no_id ?>';"><i class="bi bi-x-circle"></i></button>
                                </span>
                                <span style="display:inline-block;margin-left:15px;">
                                  <button type="button" class="btn btn-soft-success" name="noti_id" data-bs-toggle="modal" data-bs-target="#assingclass" onclick="document.getElementById('get_noti_idey1').value='<?php echo $no_id ?>';document.getElementById('warning_value').value='<?php echo $warning ?>';"><i class="bi bi-plus-circle"></i></button>
                                </span>
                                <span style="display:inline-block;margin-left:15px;">
                                  <button class="btn btn-soft-secondary btn-sm getNotiId" data-bs-toggle="modal" data-bs-target="#attch" data-notid="<?php echo $no_id; ?>"><i class="bi bi-paperclip"></i></button>
                                </span>
                                <!-- <button data-bs-toggle="modal" class="catId btn btn-successs" value="<?php echo $select_cat_data1_id; ?>" data-bs-target="#fileLink"><i class="bi bi-arrows-move"></i></button> -->
                              </div>
                        <?php
                            }
                          }
                        } ?>


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
              <table class="table table-bordered" id="table-field-cap" style="width:100%;">
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
          <!-- <form action="insert_attchment_cap.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="noti_id" class="noti_id" />
            <label class="form-label text-dark" style="font-weight:bold;">Attachment</label>
            <input type="file" class="form-control" name="files[]" multiple>
            <center>
              <input class="btn btn-success" type="submit" value="Add" />
            </center>
          </form> -->

          <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="fileOptChecklist">
          <option selected>Select File Method</option>
          <!-- <option value="addNewPage">New Page</option> -->
          <option value="addFile">Attachment</option>
          <option value="addFileLoca">Drive Link</option>
          <option value="addFileLink">Link</option>
        </select>
        <br>
        <center>
          <form method="post" enctype="multipart/form-data" class="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>includes/Pages/insert_attchment_cap.php">
            <div class="input-field">
              <table class="table table-bordered">
              <input type="hidden" name="noti_id" class="noti_id" />
                <tr>
                  <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Files</label>
                    <input type="file" class="form-control" name="file" id="" />
                  </td>
              </table>
            </div><br>
            <hr>
            <center>
              <input style="margin:5px; float:right; font-weight:bold; font-size:large;" type="submit" value="Submit" name="addNewFile" class="btn btn-success" />

            </center>
          </form>
        </center>
        <center>
          <form class="insert-phases phase_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/insert_attchment_cap.php" style="width:80%;display:none;" enctype="multipart/form-data">
            <div class="input-field">
              <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
              <table class="table table-bordered" id="table-field">
              <input type="hidden" name="noti_id" class="noti_id" />
                <tr>
                  <td style="text-align: center;"><input type="text" placeholder="Link" name="phase" id="phaseval" class="form-control" value="" required /> </td>
                  <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName" id="phasename" class="form-control" value="" /> </td>
                </tr>
              </table>
            </div>
            <br>
            <hr>
            <center>
              <button style="margin:5px;float: right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="phase_submit" name="driveLink">Submit</button>
            </center>
          </form>
        </center>

        <center>
          <form class="insert-phases filelink" method="post" action="<?php echo BASE_URL; ?>includes/Pages/insert_attchment_cap.php" style="width:80%;display:none;" enctype="multipart/form-data">
            <div class="input-field">
            <input type="hidden" name="noti_id" class="noti_id" />
              <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
              <table class="table table-bordered" id="table-field-link">
                <tr>
                  <td style="text-align: center;"><input type="text" placeholder="Link" name="link" id="linkval" class="form-control" value="" required /> </td>
                  <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName" id="linkname" class="form-control" value="" /> </td>
                </tr>
              </table>
            </div>
            <br>
            <hr>
            <center>
              <button style="margin:5px; float:right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="link_submit" name="onlineLink">Submit</button>
            </center>
          </form>
        </center>
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



  <script type="text/javascript">
    $(document).ready(function() {

      var max = 80;
      var a = 1;

      $("#add_phase").click(function() {
        if (a <= max) {
          var html = '<tr class="second_all_data">\
							<td>\
              <div id="firstdivselect_Cat' + a + '">\
                            <select name="cat[]" class="select_Cat' + a + '" style="border: 1px solid LightGray;border-radius:4px;padding:10px" required>\
                            <option value="" disabled selected>-select value-</option>\
                            <option value="actual">Actual</option>\
                            <option value="sim">Sim</option>\
                            <option value="test">Test</option>\
                            <option value="other">Other</option>\
                            </select>\
                            <div>\
                            </td>\
                             <td>\
                            <div id="showdropselect_Cat' + a + '">\
                            <select name="cat_data[]" class="fetched_cat_dataselect_Cat' + a + '" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">\
                            <option selected value="0">-select category-</option>\
                            </select>\
                            </div>\
                            <div id="showotherselect_Cat' + a + '" style="display:none">\
                                                        <textarea name="other[]" class="fetched_cat_data_otherselect_Cat' + a + '">\
                                                        </textarea>\
                                                    </div>\
                            </td>\
							<td><button type="button" name="remove_actual" id="remove_phase' + a + '" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button>\
                            <br><center><a class="addbuttonselect_Cat' + a + '" style="display:none"><i class="bi bi-plus-circle-fill"></i></a></center>\
              </td>\
						</tr>';
          $("#table-field-cap").append(html);
          a++;

          $("#table-field-cap").on('click', '#remove_phase' + a, function() {
            $(this).closest('tr').remove();
            a--;
          });
        }
      });

    });
  </script>
  <script>
    $(document).ready(function() {
      $("#table-field-cap").on("change", "select", function() {
        var Class1;
        var Class1 = this.className;
        var cat_Sel = $(this).val();
        var dis_Ctp1 = $("#ctp_value1").val();
        if (cat_Sel == "actual" || cat_Sel == "sim" || cat_Sel == "test") {
          $("#showdrop" + Class1).show();
          $("#showother" + Class1).hide();
          $.ajax({
            type: 'POST',
            url: 'selec_ctp_dis2.php',
            data: 'cat=' + cat_Sel + '&ctp=' + dis_Ctp1,
            success: function(response) {

              $('.fetched_cat_data' + Class1).empty();
              $('.fetched_cat_data' + Class1).append(response);

            }
          });
        }
        if (cat_Sel == "other") {
          $("#showdrop" + Class1).hide();
          $("#showother" + Class1).show();
        }
      });

    });
  </script>

  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>



<script>
  $(".getNotiId").on("click",function(){
    const notiId = $(this).data("notid");
    $(".noti_id").val(notiId);
  })
</script>
<script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
</body>
</html>