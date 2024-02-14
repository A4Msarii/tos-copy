<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>CAP Log</title>
 <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width,
                   initial-scale=1" />
                   <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<style type="text/css">
  tr:hover {
          background-color: #accbec6b;
        }
</style>
<body>

<?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>


<div id="header-hide">

<?php
include ROOT_PATH . 'includes/head_navbar.php';

?>
</div>
<!--Fetching item info in this container-->
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

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
           
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
           <?php  $query101 = "SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'";
            $statement101 = $connect->prepare($query101);
            $statement101->execute();
            if ($statement101->rowCount() > 0) {
              $result101 = $statement101->fetchAll();
              foreach ($result101 as $row101) {
                $s_tid=$row101['StudentNames'];
                $query6_c = "SELECT * FROM notifications where to_userid='$s_tid' and extra_data='reached_cout' ORDER BY id DESC LIMIT 3";
                $statement6_c = $connect->prepare($query6_c);
                $statement6_c->execute();
                if ($statement6_c->rowCount() > 0) {
                $get_image = $connect->prepare("SELECT file_name FROM users WHERE id=?");
                 $get_image->execute([$s_tid]);
                 $get_image_name = $get_image->fetchColumn();
                                    $get_name_st = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                                    $get_name_st->execute([$s_tid]);
                                    $get_name_st_name = $get_name_st->fetchColumn();
                                    
                                    if ($get_image_name != "") {
                                      $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                                      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
                                          $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                                      } else {
                                          $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                      }
                                  }
                                  ?>
                                  <div class="row">
                                  <div class="col-1">
                                   <div style="display: grid; place-items: center;">
                                             
                                            <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">
                                            
                                                <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                                              </div></div>
                                              <div class="col-10" style="display:flex;">
                                  <?php 
                                
            $result6_c = $statement6_c->fetchAll();
            foreach ($result6_c as $row7) {


            ?>
              <tr>
                <?php
                $cap = $row7['data'];
                $over_all_grade1 = $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
                $over_all_grade1->execute([$cap]);
                $data_value = $over_all_grade1->fetchColumn();

                $over_all_grade11 = $connect->prepare("SELECT bgColor FROM `warning_data` WHERE id=?");
                $over_all_grade11->execute([$cap]);
                $data_value11 = $over_all_grade11->fetchColumn();
                if ($data_value11 == "") {
                  $bgColor = "gray";
                } else {
                  $bgColor = $data_value11;
                }
                ?>



                <h4 style="margin:5px; padding: 5px;"><a style="color:<?php echo $bgColor; ?>" href="" onclick="document.getElementById('capname').innerHTML='<?php echo $data_value ?>';
                                    document.getElementById('capmodalcolor').style.backgroundColor='<?php echo $bgColor ?>';
                                " data-bs-toggle="modal" data-bs-target="#CAPinfo" class="get_cap_noti" id="<?php echo $row7['id']; ?>"><span class="legend-indicator" style="background-color:<?php echo $bgColor; ?>"></span><?php echo $data_value ?></a></h4>


              </tr>

            <?php }
            ?><hr>
            <?php

            }?></div></div>
            <?php
          }
          }?>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->
    <div class="modal fade" id="CAPinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" id="capmodalcolor">
          <h3 class="modal-title text-light" id="capname" style="margin-bottom:20px;"></h3>
          <button style="margin-top: -40px;color: black;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="fetch_value_caps"></div>

        </div>
      </div>
    </div>
  </div>
</main>

<script>
  $(".get_cap_noti").on("click", function() {
    var getid = $(this).attr("id");
    $.ajax({
      type: 'POST',
      url: 'fetch_cap_data.php',
      data: 'id=' + getid,
      success: function(response) {
        $("#fetch_value_caps").empty();

        $("#fetch_value_caps").append(response);
      }
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