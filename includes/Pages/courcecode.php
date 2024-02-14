<!-- <style>
.hoverimg{
  display: none;
  position: absolute;
  height: 200px;
  width: 200px;
  z-index: 10000000;
  border-radius: 200px;
  top: 10px;
  left: 10px;
  transition:2s;
}
#avtimg:hover .hoverimg{
  display: block;
  box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}
</style> -->

<div class="d-flex">
  <?php
  if ($fetchuser_image != "") {
    $fetchuser_image1 = BASE_URL . 'includes/Pages/upload/' . $fetchuser_image;
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $fetchuser_image1)) {
      $fetchuser_image1 = BASE_URL . 'includes/Pages/upload/' . $fetchuser_image;
    } else {
      $fetchuser_image1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
    }
  }

  if (!isset($course_code)) {
    $course_code = "";
  }

  ?>

  
    <div class="avatar avatar-lg avatar-circle" id="avtimg" style="height: 150px; width:150px;">
      <img style="height:150px; width:150px;" class="avatar" src="<?php echo $fetchuser_image1; ?>" alt="Logo">
    </div>
    <div class="flex-grow-2 ms-5">
      <h3 class="mb-0 text-danger" style="font-weight:bold; font-size:xxx-large; font-family: cursive;"><?php echo $fetchnickname ?></h3>
      <span class="card-text text-body" style="font-weight:bold;"><?php echo $course_code . ' - ' . '0' . $CourseCode11; ?></span><br>
      <span class="card-text text-body" style="font-weight:bold;"><?php echo $Coursename11; ?></span></br>
      <span class="card-text text-body" id="class_Name" style="font-weight:bold;"></span>
    </div>

</div>