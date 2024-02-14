<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Descipline Log</title>
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
            <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Discipline .png">
            Discipline Log
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
                $query6 = "SELECT * FROM discipline where course_id='$std_course1' and student_id='$s_tid' ORDER BY id DESC LIMIT 3";
                $statement6 = $connect->prepare($query6);
                $statement6->execute();
                if ($statement6->rowCount() > 0) {
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
                                              </div>
                                            </div>
                                            <div class="col-10" style="display:flex;">
                                              <?php  

            $result6 = $statement6->fetchAll();
            foreach ($result6 as $row6) {
              $desci = $row6['id'];
              if ($row6['topic'] == "") {
                $tId = $row6['categoryId'];
                if (is_numeric($row6['categoryId'])) {
                  $tQ = $connect->query("SELECT category FROM desccate WHERE id = '$tId'");
                  $tData = $tQ->fetchColumn();
                } else {
                  $tData = $row6['categoryId'];
                }
              } else {
                $tData = $row6['topic'];
              }

              $std_in_d = $row6['inst_id'];
              $instr_name_d = $connect->prepare("SELECT name FROM users WHERE id=?");
              $instr_name_d->execute([$std_in_d]);
              $name2_d = $instr_name_d->fetchColumn();

            ?>
              <tr>

                <h4 style="margin:5px; padding: 5px;"><a href="" onclick="document.getElementById('desci').value='<?php echo $desci ?>';
                                                document.getElementById('date_desc').value='<?php echo $row6['date'] ?>';
                                                document.getElementById('inst_desc').value='<?php echo $name2_d ?>';
                                                document.getElementById('topic_desc').value='<?php echo $tData ?>';
                                                document.getElementById('comment_desc').value='<?php echo $row6['comment'] ?>';
                                " data-bs-toggle="modal" data-bs-target="#disciplineinfo" id="cl_sy1"><span class="legend-indicator bg-primary"></span><?php echo $tData; ?></a></h4><br>
              </tr>
              <hr>
            <?php } ?> <?php }?>
            </div></div>
            <?php
            }
          }
            ?>

            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <div class="modal fade" id="disciplineinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">discipline</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input class="form-control" type="hidden" id="desci" name="desci" value="">
          <input class="form-control" type="date" name="date" id="date_desc" readonly><br>
          <input class="form-control" type="text" name="inst" id="inst_desc" readonly><br>
          <input class="form-control" type="text" name="topic" id="topic_desc" readonly><br>
          <input class="form-control" type="text" name="comment" id="comment_desc" readonly><br>
        </div>
      </div>
    </div>
  </div>
</main>


<!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>