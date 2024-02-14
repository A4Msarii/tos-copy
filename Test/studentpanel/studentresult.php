<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$exam_id = urldecode(base64_decode($_REQUEST['exam_id1']));
$repid= urldecode(base64_decode($_REQUEST['repid']));
if (isset($exam_id)){
  $_SESSION['exam_id1']=$exam_id; 
  $_SESSION['repid']=$repid; 
} elseif (isset($_SESSION['exam_id1'])) {
  $exam_id=$_SESSION['exam_id']; 
  $repid=$_SESSION['repid']; 
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Test Result</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/test.png">
  <link rel="stylesheet" href="<?php echo BASE_URL;?>Test/studentpanel/result.css" />
</head>

<body>
  <?php 
  include (ROOT_PATH. 'Test/ts_loader.php');
  ?>
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
          <h1 class="text-secondary">Test Result</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-2 mb-lg-5">
           <div class="card" style="border:0.001rem solid #dddddd;">
            <!-- card body -->
            <div class="card-body">
               <?php 
                $total_question="";
                $table_type_value="";
                $correct_an="";
                $status="";$exam_Types="";
                $exam_name=""; $min_mark="";$exam_result="";
                                  $exam_data = "SELECT * FROM examname WHERE id ='$exam_id'";
                  $resultsexam_data = $connect->query($exam_data)->fetchAll(PDO::FETCH_ASSOC);
                   foreach ($resultsexam_data as $resultexam_data) {
                       $total_question=$resultexam_data['questionNumber'];
                       $total_marks=$resultexam_data['total_marks'];
                        $exam_Types=$resultexam_data['exam_Types'];
                        $exam_result = $resultexam_data['result_hide_show'];
                        $min_mark = $resultexam_data['passing_marks'];
                        if($resultexam_data['course_id']==""){
                          $exam_name = $resultexam_data['examName'];
                        }else{
                          $exam_name1 = $resultexam_data['examName'];
                        $test_value = $connect->query("SELECT shorttest FROM test WHERE id = '$exam_name1'");
                        $exam_name = $test_value->fetchColumn();
                    
                        }
                  }
                  $exam_data = "SELECT * FROM test_updates WHERE exam_id ='$exam_id' and user_id='$user_id' and repeat_id='$repid'";
                  $resultsexam_data = $connect->query($exam_data)->fetchAll(PDO::FETCH_ASSOC);
                   foreach ($resultsexam_data as $resultexam_data) {
                    $correct_an=$resultexam_data['correct_answer'];
                    $status=$resultexam_data['exam_status'];
                    $marks_got=$resultexam_data['marks_got'];

                    $wrong_an=$total_question-$correct_an;
                  }
                       
                ?>
                <center>
              <div class="result-container">
      <!-- Heading indicating quiz completion -->
      <h1 class="card-header text-dark" style="font-size:xx-large; font-weight: bold;">Quiz Completed!</h1><br>
       <div>
                  <?php if($status=="pass"){ ?>
              <h3 style="font-size:xx-large;font-style: italic;" class="text-dark">🎉 Congratulations. you <span class="text-primary blink"><?php echo $status ?>!!</span></h3
              >
              <p class="mb-0 px-lg-14 text-dark">You are successfully completed the quiz. Now you click on
                  finish and back to your quiz page.</p><br><br>
                <img src="<?php echo BASE_URL;?>assets/svg/congo/congrats.gif" style="weight:250px;height:250px">
                <?php }else{ ?>
                  <h3 style="font-size:xx-large;font-style: italic;" class="text-dark">Need to study hard <span class="text-danger blink"><?php echo $status ?>!!</span></h3>
                  <p class="mb-0 px-lg-14 text-dark">You are successfully completed the quiz. Now you click on
                  finish and back to your quiz page.</p>
                  <img src="<?php echo BASE_URL;?>assets/svg/failed/failed2.gif" style="weight:250px;height:250px">
               <?php  }?>
              </div>
      
      <!-- Circular display for the final score -->
    <center> 
     <div class="score-circle">
    <?php
    $fetch_details1 = "SELECT * FROM users where id='$user_id'";
    $fetch_detailsst22 = $connect->prepare($fetch_details1);
    $fetch_detailsst22->execute();

    if ($fetch_detailsst22->rowCount() > 0) {
        $re22 = $fetch_detailsst22->fetchAll();
        foreach ($re22 as $row22) {
        }
    }
    ?>
    <div class="avatar avatar-xl avatar-circle" id="final-score">
        <img class="avatar-img" src="<?php echo $pic; ?>" alt="Image Description">
    </div>

</div>
</center>
      
      <!-- Dashboard displaying correct and incorrect answers -->
      <div class="dashboard">
        <div class="dashboard-item">
          <!-- Icon and count for correct answers -->
          <h2 class="text-dark">
            <i class="bi bi-check2" style="color: #22dd22"></i> Correct
          </h2>
          <p id="correct-count">
            <h6 class="text-dark" style="font-size:large;"><?php if($exam_result=="show"){
                  echo '<span>'.$correct_an.'</span>';
                }else{
                  echo "-";
                }
                   ?></h6>
          </p>
        </div>
        <div class="dashboard-item row">
          <!-- Icon and count for incorrect answers -->
          <h2 class="text-dark">
            <i class="bi bi-x-lg" style="color: #ff474c"></i> Incorrect
          </h2>
          <p id="incorrect-count">
            <h6 class="text-dark" style="font-size:large;"><?php echo $wrong_an; ?></h6>
          </p>
        </div>
       
      </div>
      <div class="row">
        <h2 class="text-dark"><span class="badge bg-soft-secondary text-dark" style="font-size:xx-large;"><?php echo $marks_got; ?>/<?php echo $total_marks; ?></span></h2>
      </div>
      
      <!-- Comment section providing additional feedback -->
      <p class="comment" id="comment-text"></p>
      
      <!-- Button to play the quiz again -->
      <div class="row card-footer justify-content-center">
        <?php if($exam_result=="show"){?>
                  <button type="button" class="play-again-button"><a class="text-dark" href="<?php echo BASE_URL;?>Test/studentpanel/checkanswer.php?id=<?php echo $exam_id?>&r_id=<?php echo $repid ?>" target="_blank"><i class="bi bi-shield-check m-1"></i>Check Your Anwers</a></button>
                 <?php }
                   if($status=="failed" && $exam_Types=="repeat"){ 
                    $repid=$repid+1;
                    ?>
                  <a class="play-again-button text-dark" href="<?php echo BASE_URL;?>Test/studentpanel/mcqtest.php?id=<?php echo urlencode(base64_encode($exam_id)) ?>&r_id=<?php echo urlencode(base64_encode($repid)) ?>"><i class="bi bi-arrow-counterclockwise m-1"></i>Try Again</a>
                  <?php } ?>
                  <button type="button" class="play-again-button"><a class="text-dark" href="<?php echo BASE_URL;?>Test/index.php"><i class="bi bi-house-door m-1"></i>Dashboard</a></button>
      </div>

    </div>
  </center>
            </div>
            <div class="card-body p-10 text-center d-none">
              <?php 
                $total_question="";
                $table_type_value="";
                $correct_an="";
                $status="";$exam_Types="";
                $exam_name=""; $min_mark="";$exam_result="";
                                  $exam_data = "SELECT * FROM examname WHERE id ='$exam_id'";
                  $resultsexam_data = $connect->query($exam_data)->fetchAll(PDO::FETCH_ASSOC);
                   foreach ($resultsexam_data as $resultexam_data) {
                       $total_question=$resultexam_data['questionNumber'];
                       $total_marks=$resultexam_data['total_marks'];
                        $exam_Types=$resultexam_data['exam_Types'];
                        $exam_result = $resultexam_data['result_hide_show'];
                        $min_mark = $resultexam_data['passing_marks'];
                        if($resultexam_data['course_id']==""){
                          $exam_name = $resultexam_data['examName'];
                        }else{
                          $exam_name1 = $resultexam_data['examName'];
                        $test_value = $connect->query("SELECT shorttest FROM test WHERE id = '$exam_name1'");
                        $exam_name = $test_value->fetchColumn();
                    
                        }
                  }
                  $exam_data = "SELECT * FROM test_updates WHERE exam_id ='$exam_id' and user_id='$user_id' and repeat_id='$repid'";
                  $resultsexam_data = $connect->query($exam_data)->fetchAll(PDO::FETCH_ASSOC);
                   foreach ($resultsexam_data as $resultexam_data) {
                    $correct_an=$resultexam_data['correct_answer'];
                    $status=$resultexam_data['exam_status'];
                    $marks_got=$resultexam_data['marks_got'];
                  }
                       
                ?>
              <!-- text -->
              <div>
                  <?php if($status=="pass"){ ?>
              <h3 style="font-size:xx-large;" class="text-dark">🎉 Congratulations. You <span class="text-primary"><?php echo $status ?>!!</span></h3
              >
              <p class="mb-0 px-lg-14">You are successfully completed the quiz. Now you click on
                  finish and back to your quiz page.</p><br><br>
                <img src="<?php echo BASE_URL;?>assets/svg/congo/congrats.gif" style="weight:250px;height:250px">
                <?php }else{ ?>
                  <h3 style="font-size:xx-large;" class="text-dark">Need To Study Hard <span class="text-danger"><?php echo $status ?>!!</span></h3>
                  <p class="mb-0 px-lg-14">You are successfully completed the quiz. Now you click on
                  finish and back to your quiz page.</p>
                  <img src="<?php echo BASE_URL;?>assets/svg/failed/failed2.gif" style="weight:250px;height:250px">
               <?php  }?>
              </div>
              <!-- chart -->
              <!-- text -->
              <div class="mt-3">
                <h6 class="text-dark" style="font-size:large;"><?php if($exam_result=="show"){
                  echo '<span>'.$correct_an.'</span>';
                }else{
                  echo "-";
                }
                   ?> Of <?php echo $total_question; ?> Questions</h6>
                <h2 class="text-dark"><span class="badge bg-soft-primary text-primary" style="font-size:xx-large;"><?php echo $marks_got; ?>/<?php echo $total_marks; ?></span></h2><br>
              </div>

              <div class="circles-chart d-none" style="width: 100px; height: 100px;">
                    <div class="js-circle" data-hs-circles-options="{
                           &quot;value&quot;: 54,
                           &quot;maxValue&quot;: 100,
                           &quot;duration&quot;: 2000,
                           &quot;isViewportInit&quot;: true,
                           &quot;radius&quot;: 25,
                           &quot;width&quot;: 3,
                           &quot;fgStrokeLinecap&quot;: &quot;round&quot;,
                           &quot;textFontSize&quot;: 14,
                           &quot;additionalText&quot;: &quot;%&quot;,
                           &quot;textClass&quot;: &quot;circles-chart-content&quot;,
                           &quot;textColor&quot;: &quot;#377dff&quot;
                         }" id="circle-17320343219477918">
                         <div class="circles-wrap" style="position: relative; display: inline-block;">
                          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50">
                            <path fill="transparent" stroke="#e7eaf3" stroke-width="3" d="M 24.995213679713164 1.5000004874226 A 23.5 23.5 0 1 1 24.96735897145532 1.5000226688778362 Z" class="circles-maxValueStroke"></path>
                            <path fill="transparent" stroke="#377dff" stroke-width="3" d="M 24.995213679713164 1.5000004874226 A 23.5 23.5 0 1 1 19.181369552928786 47.768257283341114 " class="circles-valueStroke" stroke-linecap="round"></path>
                          </svg>
                          <div class="circles-chart-content" style="position: absolute; text-align: center; width: 100%; font-size: 14px; height: auto; line-height: normal; color: rgb(55, 125, 255);">54%</div>
                        </div>
                      </div>
                  </div>
              <!-- btn -->
              <div class="mt-5">
                <?php if($exam_result=="show"){?>
                  <button type="button" class="btn btn-success" style="font-weight:bold; font-size: large;"><a style="color: white;" href="<?php echo BASE_URL;?>Test/studentpanel/checkanswer.php?id=<?php echo $exam_id?>&r_id=<?php echo $repid ?>" target="_blank">Check Your Anwers</a></button>
                 <?php }
                   if($status=="failed" && $exam_Types=="repeat"){ 
                    $repid=$repid+1;
                    ?>
                  <a class="btn btn-primary" style="font-weight:bold; font-size: large;" href="<?php echo BASE_URL;?>Test/studentpanel/mcqtest.php?id=<?php echo urlencode(base64_encode($exam_id)) ?>&r_id=<?php echo urlencode(base64_encode($repid)) ?>">Try Again</a>
                  <?php } ?>
                  <button type="button" class="btn btn-secondary" style="font-weight:bold; font-size:large;"><a style="color: white;" href="<?php echo BASE_URL;?>Test/index.php">Dashboard</a></button>
              </div>
            </div>
          </div>
          

        </div>
      </div>

    </div>

    <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>

<!-- <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/dist/apexcharts.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/dist/apexcharts.js"></script> -->


 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>


</html>