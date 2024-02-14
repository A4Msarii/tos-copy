<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$output = "";
$course = "select course";
$std_course = "";
if (isset($_REQUEST['noti_id'])) {
  $noti_id = urldecode(base64_decode($_REQUEST['noti_id']));
  $update_read = "UPDATE `notifications`
  SET `is_read` = 1 WHERE `id`='$noti_id'";
  $update_statement = $connect->prepare($update_read);
  $update_statement->execute();
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Actual Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php include 'gs_thumbnail.php'; ?>


</head>

<body>


<script src="loading.js"></script>
  <div id="loading-screen" style="display:none;">
<?php include 'gsloader.php';?>
</div>

  <div id="header-hide">
    
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    $classcolor = "SELECT * FROM gradesheet where user_id='$fetchuser_id'";
    $classcolorst = $connect->prepare($classcolor);
    $classcolorst->execute();

    if ($classcolorst->rowCount() > 0) {
      $class = "";
    } else {
      $class = "";
    }
    ?>

  </div>



  <main id="content" role="main" class="main">
   
    <div class="content container-fluid" style="height: 30rem;">
     
      
    
    </div>

    <div class="content container-fluid" style="margin-top: -22rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            
            <div class="card-body">
              <div class="container mt-5">
                <div class="row">
                    
                </div>
            </div>

            </div>
          
          </div>
        </div>
        
      </div>
    </div>
      

  </main>

 




</body>




</html>