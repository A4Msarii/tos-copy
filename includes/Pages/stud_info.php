<div class="d-flex">
  <?php
  if ($fetchuser_image != "") {
    $fetchuser_image1 = BASE_URL . 'includes/Pages/upload/' . $fetchuser_image;
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $fetchuser_image1)) {
      $fetchuser_image1 = BASE_URL . 'includes/Pages/upload/' . $fetchuser_image;
    } else {
      $fetchuser_image1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
    }
  }else{
    $fetchuser_image1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
  }

  if (!isset($course_code)) {
    $course_code = "";
  }

  ?>

  
    <div class="avatar avatar-lg avatar-circle" id="avtimg" style="height: 30px; width:30px;">
      <img style="height:30px; width:30px;" class="avatar" src="<?php echo $fetchuser_image1; ?>" alt="Logo">
    </div>
    <div class="flex-grow-2 ms-2" style="margin-top: 4px;">
      <h3 class="mb-0 text-danger" style="font-weight:bold; font-family: cursive;"><?php echo $fetchnickname ?></h3>
    </div>

</div>