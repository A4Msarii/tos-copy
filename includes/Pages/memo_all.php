<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Clearance Log</title>
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
            <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Memorandum Icon.png">
            Memorandum For Record
          </h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
     <div class="content container-fluid" style="margin-top: -19rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
           <input type="text" placeholder="Search Student" style="border: 1px solid #bab5b547; margin:10px;" class="form-control" id="searchbyuser">
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
           <?php   $query101 = "SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'";
            $statement101 = $connect->prepare($query101);
            $statement101->execute();
            if ($statement101->rowCount() > 0) {
              $result101 = $statement101->fetchAll();
              foreach ($result101 as $row101) {
                $s_tid=$row101['StudentNames'];
                $query5 = "SELECT * FROM memo where course_id='$std_course1' and student_id='$s_tid' ORDER BY id DESC LIMIT 3";
            $statement5 = $connect->prepare($query5);
            $statement5->execute();
            if ($statement5->rowCount() > 0) {
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
            $result5 = $statement5->fetchAll();
            foreach ($result5 as $row5) {
              $memo = $row5['id'];
              if ($row5['topic'] == "") {
                $tId = $row5['categoryId'];
                if (is_numeric($row5['categoryId'])) {
                  $tQ = $connect->query("SELECT category FROM memocate WHERE id = '$tId'");
                  $tData = $tQ->fetchColumn();
                } else {
                  $tData = $row5['categoryId'];
                }
              } else {
                $tData = $row5['topic'];
              }

              $std_in = $row5['inst_id'];
              $instr_name = $connect->prepare("SELECT name FROM users WHERE id=?");
              $instr_name->execute([$std_in]);
              $name2 = $instr_name->fetchColumn();

            ?>
              

                <h4 style="margin:5px; padding: 5px;"><a href="" onclick="document.getElementById('memo').value='<?php echo $memo ?>';
                                                document.getElementById('date').value='<?php echo $row5['date'] ?>';
                                                document.getElementById('inst').value='<?php echo $name2; ?>';
                                                document.getElementById('topic').value='<?php echo $tData ?>';
                                                document.getElementById('comment').value='<?php echo $row5['comment'] ?>';
                                " data-bs-toggle="modal" data-bs-target="#memoinfo" id="cl_sy"><span class="legend-indicator bg-primary"></span><?php echo $tData; ?></a></h4><br>


              <hr>

            <?php }

           ?>
           <?php
           }
           ?>
           </div></div>
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
    <div class="modal fade" id="memoinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Memorandum</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input class="form-control" type="hidden" id="memo" name="memo" value="">
          <input class="form-control" type="date" name="date" id="date" readonly><br>
          <input class="form-control" type="text" name="inst_id" id="inst" readonly><br>
          <input class="form-control" type="text" name="topic" id="topic" readonly><br>
          <input class="form-control" type="text" name="comment" id="comment" readonly><br>
        </div>
      </div>
    </div>
  </div>
</main>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchbyuser');
        const cardBodies = document.querySelectorAll('.card-body');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();

            cardBodies.forEach(cardBody => {
                const rows = cardBody.querySelectorAll('.row');
                let shouldShowCard = false;

                rows.forEach(row => {
                    const rowContent = row.textContent.toLowerCase();

                    if (rowContent.includes(searchTerm)) {
                        row.style.display = 'block'; // Show the row
                        shouldShowCard = true; // Set flag to show the card
                    } else {
                        row.style.display = 'none'; // Hide the row
                    }
                });

                // Show or hide the card-body based on the flag
                cardBody.style.display = shouldShowCard ? 'block' : 'none';
            });
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