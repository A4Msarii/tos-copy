<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$ctp = "";
if (isset($fixed_ctp_id)) {
  $_SESSION['type_ctp'] = $ctp = $fixed_ctp_id;
} else if (isset($_SESSION['type_ctp'])) {
  $ctp = $_SESSION['type_ctp'];
}
$course_names11 = "";
$q6 = "SELECT * FROM test_course";
$st6 = $connect->prepare($q6);
$st6->execute();

if ($st6->rowCount() > 0) {
  $re6 = $st6->fetchAll();
  foreach ($re6 as $row6) {
    $course_name_value = $row6['course_name'];
    $course_names11 .= '<option value="' . $row6['id'] . '">' . $course_name_value . '</option>';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Vehicle</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>

<body>
  <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
  <div id="loading-screen" style="display:none;">
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  </div>
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
          <h1 class="text-success">Include/Exclude Weekend For Progress Bar</h1>
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
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- <h1 class="text-success">Course-: -->
            <?php
            // $fetchCode = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '$std_course1'");
            // echo $fetchCode->fetchColumn() . " -" . $CourseCode11;
            // $checkCount = $connect->query("SELECT count(*) FROM progress_weekend WHERE ctpId = '$std_course1' AND courseCode = '$CourseCode11'");
            // if($checkCount->fetchColumn() <= 0){
            //   echo "Please Add Data";
            // }
            ?>
            <!-- </h1> -->
            <div class="card-body">
              <select name="" id="selectWeekCourse" class="form form-control">
                <option value="">--Select Course--</option>
                <?php
                $fetchAllCourse = $connect->query("SELECT * FROM newcourse GROUP BY CourseName,CourseCode");
                while ($allCourseData = $fetchAllCourse->fetch()) {
                  $courseCtpId = $allCourseData['CourseName'];
                  $fetchCode = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '$courseCtpId'");
                  // echo $fetchCode->fetchColumn();
                ?>
                  <option data-ctpid="<?php echo $courseCtpId ?>" data-courseid="<?php echo $allCourseData['CourseCode']; ?>"><?php echo $fetchCode->fetchColumn() . " - " . $allCourseData['CourseCode']; ?></option>
                <?php
                }
                ?>
              </select>
              <div id="weekFrom"></div>
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

  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>

<script>
  $("#selectWeekCourse").change(function() {

    var selectedOption = $("#selectWeekCourse option:selected");
    var ctpId = selectedOption.data("ctpid");
    var courseCode = selectedOption.data("courseid");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/deconflicter/progressWeekend.php',
      data: {
        checkWeekend: "checkWeekend",
        ctpId: ctpId,
        courseCode: courseCode
      },
      success: function(response) {
        $("#weekFrom").empty();
        $("#weekFrom").html(response);
      }
    });
  })
</script>

</html>