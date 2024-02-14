<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$phase_id = "";
$actclass = "";
$simclass = "";
$academicclass = "";
$vehnum = "";
$vehtype = "";
$in = "";
$class = "";
 $classid = "";
$over_all_comment = "";
$comments = "";
$noti_id = "";

$q21 = "SELECT * FROM roles";
$st21 = $connect->prepare($q21);
$st21->execute();
$re21 = $st21->fetchAll();
foreach ($re21 as $row21) {
   $row21['id'];
   $roled=unserialize($row21['permission']);
  if(isset($roled['fill_gradsheet'])){
if($roled['fill_gradsheet']==1){
    $roled=$row21['roles'];
$q2 = "SELECT * FROM users where role='$roled'";
$st2 = $connect->prepare($q2);
$st2->execute();
if ($st2->rowCount() > 0) {
  $re2 = $st2->fetchAll();
  foreach ($re2 as $row2) {
     $in .= '<option value="' . $row2['id'] . '">' . $row2['nickname'] . '</option>';
   }
   }
    }
     }
  
}


//fetch percentage details
$per_table_data = "";
$per = "SELECT * FROM percentage";
$per5 = $connect->prepare($per);
$per5->execute();
if ($per5->rowCount() > 0) {
  $reper55 = $per5->fetchAll();
  $sn = 1;
  foreach ($reper55 as $rowper5) {
    $per_table_data .= '<tr>
         <td>' . $sn++ . '</td>
         <td>' . $rowper5['percentagetype'] . '</td>
             <td>' . $rowper5['percentage'] . '</td>
             <td>' . $rowper5['color'] . '</td>

         </tr>';
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Grade Sheet</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                    initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

  <style type="text/css">
    .modal.modal-fullscreen .modal-dialog {
  width: 100vw;
  height: 100% !important;
  margin: 0;
  padding: 0;
  max-width: none; 
}

.modal.modal-fullscreen .modal-content {
  height: auto;
  height: 100vh;
  border-radius: 0;
  border: none; 
}

.modal.modal-fullscreen .modal-body {
  overflow-y: auto; 
}
.tox-statusbar__text-container
{
  display: none; 
}
.tox.tox-tinymce
{
  height: 500px !important;
}
.tox-statusbar__text-container
{
  display: none !important;
}

</style>

</head>



<div id="header-hide">
  <?php
  include(ROOT_PATH . 'includes/head_navbar.php');
  if(isset($_REQUEST['studentId'])){
    $fetchuser_id = $_REQUEST['studentId'];
  }
  ?></div>
<!--Input Phases-->
<!--Main contect We need to insert data here-->
<main id="content" role="main" class="main">
<?php include("php_value_gradesheetcl.php"); ?>
  <!-- Content -->
  <div>
    <div class="content container-fluid" style="height: 30rem;">
      <!-- Page Header -->
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      <div class="page-header" style="padding: 0px;">
        <div style="display: flex;">
          <?php
          $re_page = "";
          $re_page = $class_name . '.php';
          ?>
          <a href="<?php echo BASE_URL ?>includes/Pages/Home.php" class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Go To Home Page" style="text-decoration:none;padding: 10px;position: fixed;margin-left: 50px;margin-top: -10px;"><img src="<?php echo BASE_URL; ?>assets/svg/menuicon/home_1.png" style="height:20px; width:20px;"></a>
        
           <a style="position: fixed;margin-top: -10px;" class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Go to Previous Page" style="color:black; text-decoration:none;padding: 10px;margin-top: -10px;" href="<?php echo $re_page ?>"><i class="bi bi-arrow-left"></i></a>

        </div>
        <h1 class="text-success" style="margin-left:100px;">Cloned Sheet</h1>
      </div>
      <!-- End Page Header -->
    </div>
  </div>
  <!-- End Content -->

  <!-- Content -->
  <!--student info-->
    <div class="content container-fluid" style="margin-top: -19rem;">

     <div class="row justify-content-center">

      <?php include 'studentinfocl.php';?> 
    </div>
    <!-- End Row -->



    <div class="row justify-content-center">

        <?php include 'instructorinfocl.php';?>
    </div>
    <!-- End Row -->

    <div class="row justify-content-center">

      <?php include 'gradesheetinfocl.php';?>
    </div>

    
    <!-- End Row -->


  </div>
  <!-- End Content -->

</main>



  
<script>
    document.getElementById('select-all-u').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="radio"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>


</body>

</html>