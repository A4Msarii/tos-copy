<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$exam_id = "";
$unique_id1 = "";
session_start();
if (isset($_REQUEST['id'])) {
  $_SESSION['exam_id'] = $exam_id = urldecode(base64_decode($_REQUEST['id']));
} else if (isset($_SESSION['exam_id'])) {
  $exam_id = $_SESSION['exam_id'];
}
if (isset($_REQUEST['r_id'])) {
  $_SESSION['unique_id'] = $unique_id1 = urldecode(base64_decode($_REQUEST['r_id']));
} else if (isset($_SESSION['unique_id'])) {
  $unique_id1 = $_SESSION['unique_id'];
}



$seconds_between = "";


$exam_location = "";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Test</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/test.png">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style type="text/css">
    .main-wrapper {
      font-family: Georgia, 'Times New Roman', Times, serif;
      /*width: 100%;
    height: 90vh;
    display: inline-flex;*/
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    /*.quiz-container{
    background-color: rgb(231, 221, 221);
    box-shadow: gray 2px 2px 2px;
}*/
    .quiz-container>div {
      margin: 20px;
    }

    .each-answer {
      margin: 10px 0%;
    }

    .prev-next,
    .jumper-button {
      padding: 5px 10px;
      margin: 2px 0%;
      background-color: blue;
      color: white;
      border: white 1px solid;
      cursor: pointer;
    }

    .active {
      background-color: white;
      color: blue;
      border: blue solid 1px;
    }

    .action-btns button:hover {
      background-color: white;
      color: blue;
      border: blue solid 1px;
    }

    .result-wrapper {
      display: inline-flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .result-details {
      display: inline-flex;
      justify-content: center;
    }

    .result-details>div {
      margin: 20px;
    }

    .col-6.d-flex.hello:hover {
      background-color: #91989e5e;
      cursor: pointer;
    }

    /* Define a CSS class for styling the checkbox */
    .custom-checkbox {
      /*height: 25px;
    width: 25px;
    border-radius: 15px;*/
      border: 1px solid #8c98a4 !important;
    }

    .text {
      text-align: center;
      font-size: 70px;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
      background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .form-check-input {
      margin-top: 5px !important;
      height: 20px !important;
      width: 20px !important;
    }
  </style>

</head>

<body>
  <?php

  include(ROOT_PATH . 'Test/ts_loader.php');
  ?>
  <div id="header-hide" style="display:none;">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');


    ?> </div>
  <?php

  $exam_name = "";
  $sql = "SELECT * FROM examname WHERE id ='$exam_id'";

  $results = $connect->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  // Loop through the results.
  foreach ($results as $result) {
    if ($result['course_id'] != "") {
      $exam_names = $result['examName'];
      $fetch_exam_name = $connect->query("SELECT `shorttest` FROM test WHERE id = '$exam_names'");
      $exam_name = $fetch_exam_name->fetchColumn();
    } else {
      $exam_name = $result['examName'];
    }

    $exam_Types = $result['exam_Types'];
    $exam_location = $result['location'];

    if ($exam_Types == "repeat") {
      $countsql = "SELECT count(*) FROM `test_updates` WHERE `user_id`='$user_id' and `exam_id`='$exam_id' and status_end='0' and repeat_id='$unique_id1'";
      $countsql1 = "SELECT count(*) FROM `test_updates` WHERE `user_id`='$user_id' and `exam_id`='$exam_id' and status_end='1' and repeat_id='$unique_id1'";
    } else {
      $countsql = "SELECT count(*) FROM `test_updates` WHERE `user_id`='$user_id' and `exam_id`='$exam_id' and status_end='0'";
      $countsql1 = "SELECT count(*) FROM `test_updates` WHERE `user_id`='$user_id' and `exam_id`='$exam_id' and status_end='1'";
    }
    $countresult = $connect->prepare($countsql);
    $countresult->execute();
    $number_of_rowscount = $countresult->fetchColumn();
    $countresult1 = $connect->prepare($countsql1);
    $countresult1->execute();
    $number_of_rowscount1 = $countresult1->fetchColumn();
    if ($number_of_rowscount1 > 0) {
      //  echo 'already test submitted<a href="studentresult.php?exam_id1='.urlencode(base64_encode($exam_id)).'&repid='.urlencode(base64_encode($unique_id1)).'"> Click here to result page...</a>';
      echo ' <div class="container-fluid" id="content">

<div class="row justify-content-center">  

  <img src="' . BASE_URL . 'assets/svg/exam/exam-1.gif" style="width:800px; height:500px">  <center><a href="studentresult.php?exam_id1=' . urlencode(base64_encode($exam_id)) . '&repid=' . urlencode(base64_encode($unique_id1)) . '"><button type="button" class="btn btn-primary">Back to Result Page</button></a> </center>
</div>

</div>';

      exit;
    }
    if ($number_of_rowscount == 0) {
      $query_title = "INSERT INTO test_updates (user_id,exam_id,status_start,start_time,repeat_id) VALUES
        ('$user_id','$exam_id','1',NOW(),'$unique_id1')";
      $statement_title = $connect->prepare($query_title);
      $statement_title->execute();
    }


    $start_time = strtotime($result['start_hours']);
    $end_time = strtotime($result['end_hours']);
    if ($end_time < $start_time) {
      $end_time += 86400; // Add 24 hours in seconds
    }
    $seconds_between = $end_time - $start_time;
  }

  if ($exam_location == "india") {
    date_default_timezone_set('Asia/Kolkata');
  } else if ($exam_location == "abu") {
    date_default_timezone_set('Asia/Dubai');
  }
  $examDuration = $seconds_between;
  if (!isset($_SESSION['exam_start_time']) && isset($_SESSION['exam_remaining_time'])) {
    $_SESSION['exam_start_time'] = time() - ($examDuration - $_SESSION['exam_remaining_time']);
  } elseif (!isset($_SESSION['exam_start_time'])) {
    $_SESSION['exam_start_time'] = time();
  }
  $elapsedTime = time() - $_SESSION['exam_start_time'];
  $remainingTime = $examDuration - $elapsedTime;

  // If the remaining time is less than or equal to 0, redirect to the end exam page
  if ($remainingTime <= 0) {
    header("Location: end_exam.php?id=" . $exam_id . "&repeat_id=" . $unique_id1 . "&user_id=" . $user_id);
    exit();
  }

  $_SESSION['exam_remaining_time'] = $remainingTime;

  ?>

  <!--Main contect We need to insert data here-->

  <!-- Content -->
  <div>
    <div class="content container-fluid" style="height: 30rem;">
    </div>
  </div>
  <!-- End Content -->

  <!-- Content -->

  <div class="container-fluid" id="content" style="margin-top: -28rem;">

    <div class="row justify-content-center">
      <h1 class="text"><?php echo $exam_name ?></h1>
      <div class="col-lg-12 mb-3">
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
          <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
            <h1 class="text-secondary">Questions Tabs</h1>

          </div>
          <div class="card-body" style="background-color: aliceblue;">

            <div class="row">
              <?php

              $sql1 = "SELECT *FROM exam_question_ist WHERE exam_id ='$exam_id'";
              $results1 = $connect->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
              // Loop through the results.
              $sn = 1;
              foreach ($results1 as $result1) {
              ?>
                <div class="col">
                  <input style="height:25px; width:25px;" type="radio" class="form-check-input is-invalid openquestion custom-checkbox " checked id="get_check<?php echo $sn; ?>" value="<?php echo $sn; ?>">
                </div>
              <?php
                $sn++;
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">

      <div class="col-lg-12 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
          <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
            <h1 class="text-secondary">MCQ Test</h1>
            <?php

            ?>
            <h1 class="text-danger">Time : <i class="bi bi-stopwatch"></i><span id="timer"><?php echo $remainingTime; ?></span></h1>
            <!-- <p>You have  seconds to complete the exam.</p> -->
          </div>
          <!-- <div class="m-3" style="text-align:end;">
              <h1 class="text-danger">Time : <i class="bi bi-stopwatch"></i> 3:40 Min Left</h1>
            </div> -->
          <div id="question-container">
            <h1 id="question" class="card-subtitle" style="padding: 15px; font-size: x-large; color: black;"></h1>

            <div class="card-body">
              <div id="pagination-container">

              </div>
              <div id="getc_lables1">

              </div>
            </div>
            <div class="card-footer mb-5">
              <button id="previous-button" class="btn btn-primary" style="font-size: large; font-weight: bold;display:none;"><i class="bi bi-arrow-left"></i>Previous</button>
              <button id="next-button" class="btn btn-primary" style="font-size: large; font-weight: bold; float: right;display:none;">Next<i class="bi bi-arrow-right"></i></button>
              <button id="result-button" class="btn btn-soft-success" style="font-size: large; font-weight: bold; float: right;display:none;"><a onclick="return confirm('Are you sure to end exam');" href="<?php echo BASE_URL; ?>Test/studentpanel/end_exam.php?id=<?php echo $exam_id ?>&repeat_id=<?php echo $unique_id1 ?>&user_id=<?php echo $user_id ?>">End Exam</a></button>
            </div>
          </div>

        </div>
        <!-- End Card -->
      </div>
    </div>

  </div>

  <!-- Modal -->
  <div id="fullImageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="d-flex align-items-center justify-content-center h-100">
            <img class="img-fluid modal-preview-url imagePath" alt="#">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <div id="answerModal" class="modal fade" style="opacity:1;background: #f0f8ff8c;" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="border:1px solid #71869d8f;">
        <div class="modal-header bg-success">
          <h3 class="modal-title" id="exampleModalCenterTitle" style="margin-bottom: 15px;margin-top: -15px;">Correct Answer</h3>
          <button style="margin-bottom: 15px;" type="button" class="btn-close clsButton" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p style="font-size:large;">Your Answer Is Correct <i class="bi bi-check2-circle text-success" style="font-size: x-large;margin: 5px;"></i></p>
        </div>
        <div class="modal-footer" style="border-top: 1px solid #6777887a;">
          <button type="button" class="btn btn-soft-success clsButton" data-bs-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <div id="wrongAnswerModal" class="modal fade" style="opacity:1;background: #f0f8ff8c;" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="border:1px solid #71869d8f;">
        <div class="modal-header bg-danger">
          <h3 class="modal-title" id="exampleModalCenterTitle" style="margin-bottom: 15px;margin-top: -15px;">Wrong Answer</h3>
          <button style="margin-bottom: 15px;" type="button" class="btn-close clsButton" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p style="font-size: large;">Wrong Answer Pls Refer The Reference <i class="bi bi-x-circle text-danger" style="font-size: x-large;margin: 5px;"></i></p>
          <a style="display: none;" target="_blank" id="wrongAnswerRefModal" href="" class="btn btn-success">Reference</a>
        </div>
        <div class="modal-footer" style="border-top: 1px solid #6777887a;">
          <button type="button" class="btn btn-soft-danger clsButton" data-bs-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->

  <script>
    $(".clsButton").on('click', function() {
      $("#answerModal").css("display", "none");

      $("#wrongAnswerModal").css("display", "none");
    })
  </script>


  <script>
    var currentPage = 1;
    var curQues = 1;
    var attempts;
    $(document).ready(function() {
      var totalPages;


      // Function to load paginated data
      function loadPaginatedData(page) {
        var qC = 1;
        $.ajax({
          url: '<?php echo BASE_URL; ?>Test/studentpanel/fetch_questions.php?id=<?php echo $exam_id ?>&user_id=<?php echo $user_id ?>&uni_id=<?php echo $unique_id1 ?>',
          type: 'GET',
          data: {
            page: page
          },
          dataType: 'json',
          success: function(response) {
            // console.log(response);

            var data = response.data;
            // console.log(data);
            totalPages = response.totalPages;
            var html = '';
            var html1 = '';
            // Iterate through the data and build the HTML
            $.each(data, function(index, item) {
              // console.log(item.type);
              var imgName = "";
              if (item.imageName == null) {
                imgName = "none";
              } else {
                imgName = "";
              }
              var refClass = "";
              if (item.docRefData == null) {
                refClass = "none";
              } else {
                refClass = "";
              }
              if (item.type == "mcq") {
                attempts = item.attempts;
                attempts = parseInt(attempts) + 1;
              }
              var countAttempts = item.fetchAttemData;
              var disableAttr = "";
              var helloClass = "";
              var checkListClass = "";
              var lockImg = "";

              if (attempts > 0) {
                if (attempts == countAttempts || countAttempts > attempts) {
                  disableAttr = "disabled";
                  helloClass = "";
                  checkListClass = "";
                  lockImg = "<?php echo BASE_URL; ?>assets/svg/lock/lock.png";

                } else {
                  disableAttr = "";
                  helloClass = "hello";
                  checkListClass = "allcheckList";
                  lockImg = "<?php echo BASE_URL; ?>assets/svg/lock/unlock.png";

                }
              } else {
                disableAttr = "";
                helloClass = "hello";
                checkListClass = "allcheckList";
              }
              if (curQues == qC) {
                if (item.type == "mcq") {
                  html += '<div class="row"><span>Question ' + (index + 1) + '</span><h1 data-questionid="' + item.id + '" class="question_number"> ' + item.question + '<img class="unlockImg" src="' + lockImg + '" style="height: 50px;height: 50px;" /></h1>';
                  if (item.document != "" && item.document_name != "" && item.doc_type == "Open_Book") {
                    html += '<div class="col-12 d-flex" style="padding: 5px;border: 1px solid #8c98a43b;"><h3 style="margin:5px;color: #677788;font-size: large;">Document :';
                    if (item.file_type == "offline") {
                      html += '<a class="get_valuec' + item.id + '" style="display:none">' + item.document + '</a><a class="url_td" href="<?php echo BASE_URL; ?>openPageIllu.php" target="_blank" id="' + item.id + '">' + item.document_name + '</a>';
                    } else if (item.file_type == "online") {
                      html += '<a href="' + item.document + '" target="_blank">' + item.document_name + '</a>';
                    } else {
                      html += '<a href="<?php echo BASE_URL ?>includes/Pages/test_document/' + item.document + '" target="_blank">' + item.document_name + '</a>';
                    }
                    html += '<a style="display:' + refClass + '" href="<?php echo BASE_URL ?>Test/studentpanel/refPage.php?refId=' + item.docId + '" target="_blank">,<i class="bi bi-file-earmark-fill"></i></a></h3></div>';
                  }
                  html += '<div class="col-12 d-flex" style="padding: 5px;border: 1px solid #8c98a43b;border-bottom: none;justify-content:center;">';
                  html += '<center><img class="showImageFull" style="height:215px;width:350px;display:' + imgName + '" src="<?php echo BASE_URL; ?>includes/Pages/files/' + item.imageName + '" data-bs-toggle="modal" data-bs-target="#fullImageModal" data-imagename=' + item.imageName + '></center>';
                  html += '</div>';
                  html += '<div class="col-6 d-flex ' + helloClass + '" style="padding: 5px;border: 1px solid #8c98a43b;" id="' + (index + 1) + '" data-value="' + item.id + '" data-value1="a" data-type="' + item.type + '">';
                  if (item.correct_anw === "a") {
                    html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="a" checked>';
                  } else {
                    html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="a">';
                  }
                  html += '<h5 style="margin:5px;color: #677788;font-size: large;">A.' + item.option1 + '</h5>';
                  html += '</div>';
                  html += '<div class="col-6 d-flex ' + helloClass + '" style="padding: 5px;border: 1px solid #8c98a43b;" id="' + (index + 1) + '" data-value="' + item.id + '" data-value1="b" data-type="' + item.type + '">';
                  if (item.correct_anw === "b") {
                    html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="b" checked>';
                  } else {
                    html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="b">';
                  }
                  html += '<h5 style="margin:5px;color: #677788;font-size: large;">B.' + item.option2 + '</h5>';
                  html += '</div>';
                  html += '<div class="col-6 d-flex ' + helloClass + '" style="padding: 5px;border: 1px solid #8c98a43b;" id="' + (index + 1) + '" data-value="' + item.id + '" data-value1="c" data-type="' + item.type + '">';
                  if (item.correct_anw === "c") {
                    html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="c" checked>';
                  } else {
                    html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="c">';
                  }
                  html += '<h5 style="margin:5px;color: #677788;font-size: large;">C.' + item.option3 + '</h5>';
                  html += '</div>';
                  html += '<div class="col-6 d-flex ' + helloClass + '" style="padding: 5px;border: 1px solid #8c98a43b;" id="' + (index + 1) + '" data-value="' + item.id + '" data-value1="d" data-type="' + item.type + '">';
                  if (item.correct_anw === "d") {
                    html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="d" checked>';
                  } else {
                    html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="d">';
                  }
                  html += '<h5 style="margin:5px;color: #677788;font-size: large;">D.' + item.option4 + '</h5>';
                  html += '</div>';

                  html += '</div>';

                  $('#getc_lables1').hide();
                } else if (item.type == "true_false") {
                  html += '<div class="row"><span>Question ' + (index + 1) + '</span><h1 data-questionid="' + item.id + '" class="question_number"> ' + item.question + '</h1>';
                  if (item.document != "" && item.document_name != "" && item.doc_type == "Open_Book") {
                    html += '<div class="col-12 d-flex" style="padding: 5px;border: 1px solid #8c98a43b;"><h3 style="margin:5px;color: #677788;font-size: large;">Document :';
                    if (item.file_type == "offline") {
                      html += '<a class="get_valuec' + item.id + '" style="display:none">' + item.document + '</a><a class="url_td" href="<?php echo BASE_URL; ?>openPageIllu.php" target="_blank" id="' + item.id + '">' + item.document_name + '</a>';
                    } else if (item.file_type == "online") {
                      html += '<a href="' + item.document + '" target="_blank">' + item.document_name + '</a>';
                    } else {
                      html += '<a href="<?php echo BASE_URL ?>includes/Pages/test_document/' + item.document + '" target="_blank">' + item.document_name + '</a>';
                    }
                    html += '<a style="display:' + refClass + '" href="<?php echo BASE_URL ?>Test/studentpanel/refPage.php?refId=' + item.docId + '" target="_blank">,<i class="bi bi-file-earmark-fill"></i></a></h3></div>';
                  }
                  html += '<div class="col-12 d-flex" style="padding: 5px;border: 1px solid #8c98a43b;border-bottom: none;">';
                  html += '<center><img style="height:215px;width:350px;display:' + imgName + '" src="<?php echo BASE_URL; ?>includes/Pages/files/' + item.imageName + '" /></center>';
                  html += '</div>';
                  html += '<div class="col-6 d-flex hello" style="padding: 5px;border: 1px solid #8c98a43b;" id="' + (index + 1) + '" data-value="' + item.id + '" data-value1="true" data-type="' + item.type + '">';
                  if (item.correct_anw === "true") {
                    html += '<input type="radio" class="form-check-input is-valid allcheckList" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="true" checked>';
                  } else {
                    html += '<input type="radio" class="form-check-input is-valid allcheckList" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="true">';
                  }
                  html += '<h5 style="margin:5px;color: #677788;font-size: large;">' + item.option1 + '</h5>';
                  html += '</div>';
                  html += '<div class="col-6 d-flex hello" style="padding: 5px;border: 1px solid #8c98a43b;" id="' + (index + 1) + '" data-value="' + item.id + '" data-value1="false" data-type="' + item.type + '">';
                  if (item.correct_anw === "false") {
                    html += '<input type="radio" class="form-check-input is-valid allcheckList" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="false" checked>';
                  } else {
                    html += '<input type="radio" class="form-check-input is-valid allcheckList" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="false">';
                  }
                  html += '<h5 style="margin:5px;color: #677788;font-size: large;">' + item.option2 + '</h5>';
                  html += '</div>';

                  html += '</div>';
                  $('#getc_lables1').hide();
                } else if (item.type == "digrame") {
                  $('#getc_lables1').show();
                  html += '<div class="row justify-content-center"><span>Question ' + (index + 1) + '</span><h1 data-questionid="' + item.id + '" class="question_number"> ' + item.question + '</h1>';
                  html += '<div class="col-12 d-flex" style="padding: 5px;border: 1px solid #8c98a43b;border-bottom: none;text-align: center;justify-content: center;">';
                  html += '<img style="height:500px; width:500px;border-radius:40px;" src="<?php echo BASE_URL; ?>includes/Pages/test/diagram/' + item.fig + '">';
                  html += '</div>';


                  // Initialize the variable outside the loop

                  $.each(item.labels, function(labelKey, labelValue) {
                    html1 += '<div class="col-12 d-flex hello" style="padding: 5px;border: 1px solid #8c98a43b;border-bottom: none;">';
                    html1 += '<label>' + (labelKey + 1) + ':</label>';
                    html1 += '<input type="text" class="form-control" readonly value="' + labelValue + '">';
                    html1 += '<select class="form-control selct_ans" id="' + (index + 1) + '" data-value="' + item.id + '" data-suboption="' + labelValue + '"><option disabled selected>-select correct answer-</option>';

                    // Determine the number of dropdown options based on item.options
                    var get_count = item.options; // Replace with the actual count

                    // Generate the dropdown options (a, b, c, ...)
                    for (var i = 0; i < get_count; i++) {
                      var optionValue = String.fromCharCode(97 + i); // 'a', 'b', 'c', ...
                      html1 += '<option value="' + optionValue + '">' + optionValue + '</option>';
                    }

                    html1 += '</select>';
                    html1 += '</div>';

                    $('#getc_lables1').html(html1);
                  });

                  if (item.document != "" && item.document_name != "" && item.doc_type == "Open_Book") {
                    html += '<div class="col-12 d-flex" style="padding: 5px;border: 1px solid #8c98a43b;"><h3 style="margin:5px;color: #677788;font-size: large;">Document :';
                    if (item.file_type == "offline") {
                      html += '<a class="get_valuec' + item.id + '" style="display:none">' + item.document + '</a><a class="url_td" href="<?php echo BASE_URL; ?>openPageIllu.php" target="_blank" id="' + item.id + '">' + item.document_name + '</a>';
                    } else if (item.file_type == "online") {
                      html += '<a href="' + item.document + '" target="_blank">' + item.document_name + '</a>';
                    } else {
                      html += '<a href="<?php echo BASE_URL ?>includes/Pages/test_document/' + item.document + '" target="_blank">' + item.document_name + '</a>';
                    }
                    html += '<a style="display:' + refClass + '" href="<?php echo BASE_URL ?>Test/studentpanel/refPage.php?refId=' + item.docId + '" target="_blank">,<i class="bi bi-file-earmark-fill"></i></a></h3></div>';
                  }
                  html += '</div>';
                }
              }
              qC++;
            });

            // Append the HTML to the container
            $('#pagination-container').html(html);

            // Update the current page

            currentPage = page;

            // Show/hide "Previous" and "Next" buttons
            if (currentPage > 1) {
              $('#previous-button').show();
            } else {
              $('#previous-button').hide();
            }

            if (currentPage < totalPages) {
              $('#next-button').show();
              $('#result-button').hide(); // Hide "Result" button
            } else {
              $('#next-button').hide();
              $('#result-button').show(); // Show "Result" button
            }
          },
          error: function() {
            console.log('Error loading data');
          }
        });
      }

      // Initial load
      loadPaginatedData(currentPage);

      // "Next" button click event
      $('#next-button').click(function() {
        if (currentPage < totalPages) {
          curQues++;
          loadPaginatedData(currentPage + 1);
        }
      });

      // "Previous" button click event
      $('#previous-button').click(function() {
        if (currentPage > 1) {
          curQues--;
          loadPaginatedData(currentPage - 1);
        }
      });
      $('.openquestion').click(function() {

        var id1 = $(this).attr('value');
        curQues = id1;
        loadPaginatedData(id1);
        // alert(id1);
      });

    });
    $(document).on("click", ".hello", function() {
      var id = $(this).attr('id');

      var inputElement = $("#get_check" + id);

      var question_id = $(this).data('value');

      var ans = $(this).data('value1');
      var questioType = $(this).data("type");

      var type1 = "other";
      localStorage.setItem(question_id, ans);
      // Remove the 'is-invalid' class (if it exists)
      $("#get_check" + id).removeClass("is-invalid");
      // Add the 'is-valid' class
      $("#get_check" + id).addClass("is-valid");
      $.ajax({
        url: 'save_answer.php?userid=<?php echo $user_id; ?>&exam_id=<?php echo $exam_id ?>&repeat_id=<?php echo $unique_id1 ?>', // Replace with the actual PHP script URL
        type: 'GET',
        data: {
          question_id: question_id,
          answer: ans,
          type: type1,
        },
        success: function(response) {
          // alert(attempts);
          if (questioType == "mcq") {
            if (attempts > 0) {
              if (response == 1) {
                $("#answerModal").css("display", "block");
              }
              if (response == 0) {
                $("#wrongAnswerModal").css("display", "block");
              }
            }
          }
          var qC = 1;
          page = currentPage;
          $.ajax({
            url: '<?php echo BASE_URL; ?>Test/studentpanel/fetch_questions.php?id=<?php echo $exam_id ?>&user_id=<?php echo $user_id ?>&uni_id=<?php echo $unique_id1 ?>',
            type: 'GET',
            data: {
              page: page
            },
            dataType: 'json',
            success: function(response) {

              // console.log(response);
              var data = response.data;
              totalPages = response.totalPages;
              var html = '';
              var html1 = '';
              // Iterate through the data and build the HTML
              $.each(data, function(index, item) {
                $("#wrongAnswerRefModal").css("display", "none");
                // console.log(item.type);
                var imgName = "";
                if (item.imageName == null) {
                  imgName = "none";
                } else {
                  imgName = "";
                }
                var refClass = "";
                if (item.docRefData == null) {
                  refClass = "none";
                } else {
                  refClass = "";


                }
                if (item.questionRef != null) {
                  $("#wrongAnswerRefModal").css("display", "");
                  $("#wrongAnswerRefModal").attr("href", "<?php echo BASE_URL ?>Test/studentpanel/fetchAnswerRef.php?refDoc=" + item.questionRef);
                }


                if (item.type == "mcq") {
                  attempts = item.attempts;
                  attempts = parseInt(attempts) + 1
                }
                var lockImg = "";
                var countAttempts = item.fetchAttemData;
                var disableAttr = "";
                var helloClass = "";
                var checkListClass = "";
                if (attempts > 0) {
                  if (attempts == countAttempts || countAttempts > attempts) {
                    disableAttr = "disabled";
                    helloClass = "";
                    checkListClass = "";
                    lockImg = "<?php echo BASE_URL; ?>assets/svg/lock/lock.png";

                  } else {
                    disableAttr = "";
                    helloClass = "hello";
                    checkListClass = "allcheckList";
                    lockImg = "<?php echo BASE_URL; ?>assets/svg/lock/unlock.png";

                  }
                } else {
                  disableAttr = "";
                  helloClass = "hello";
                  checkListClass = "allcheckList";
                }
                if (curQues == qC) {
                  if (item.type == "mcq") {
                    html += '<div class="row"><span>Question ' + (index + 1) + '</span><h1 data-questionid="' + item.id + '" class="question_number"> ' + item.question + '<img class="unlockImg" src="' + lockImg + '" style="height: 50px;height: 50px;" /></h1>';
                    if (item.document != "" && item.document_name != "" && item.doc_type == "Open_Book") {
                      html += '<div class="col-12 d-flex" style="padding: 5px;border: 1px solid #8c98a43b;"><h3 style="margin:5px;color: #677788;font-size: large;">Document :';
                      if (item.file_type == "offline") {
                        html += '<a class="get_valuec' + item.id + '" style="display:none">' + item.document + '</a><a class="url_td" href="<?php echo BASE_URL; ?>openPageIllu.php" target="_blank" id="' + item.id + '">' + item.document_name + '</a>';
                      } else if (item.file_type == "online") {
                        html += '<a href="' + item.document + '" target="_blank">' + item.document_name + '</a>';
                      } else {
                        html += '<a href="<?php echo BASE_URL ?>includes/Pages/test_document/' + item.document + '" target="_blank">' + item.document_name + '</a>';
                      }
                      html += '<a style="display:' + refClass + '" href="<?php echo BASE_URL ?>Test/studentpanel/refPage.php?refId=' + item.docId + '" target="_blank">,<i class="bi bi-file-earmark-fill"></i></a></h3></div>';
                    }
                    html += '<div class="col-12 d-flex" style="padding: 5px;border: 1px solid #8c98a43b;border-bottom: none;justify-content:center;">';
                    html += '<img class="showImageFull" style="height:215px;width:350px;display:' + imgName + '" src="<?php echo BASE_URL; ?>includes/Pages/files/' + item.imageName + '" data-bs-toggle="modal" data-bs-target="#fullImageModal" data-imagename=' + item.imageName + '>';
                    html += '</div>';
                    html += '<div class="col-6 d-flex ' + helloClass + '" style="padding: 5px;border: 1px solid #8c98a43b;" id="' + (index + 1) + '" data-value="' + item.id + '" data-value1="a" data-type="' + item.type + '">';
                    if (item.correct_anw === "a") {
                      html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="a" checked>';
                    } else {
                      html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="a">';
                    }
                    html += '<h5 style="margin:5px;color: #677788;font-size: large;">A.' + item.option1 + '</h5>';
                    html += '</div>';
                    html += '<div class="col-6 d-flex ' + helloClass + '" style="padding: 5px;border: 1px solid #8c98a43b;" id="' + (index + 1) + '" data-value="' + item.id + '" data-value1="b" data-type="' + item.type + '">';
                    if (item.correct_anw === "b") {
                      html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="b" checked>';
                    } else {
                      html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="b">';
                    }
                    html += '<h5 style="margin:5px;color: #677788;font-size: large;">B.' + item.option2 + '</h5>';
                    html += '</div>';
                    html += '<div class="col-6 d-flex ' + helloClass + '" style="padding: 5px;border: 1px solid #8c98a43b;" id="' + (index + 1) + '" data-value="' + item.id + '" data-value1="c" data-type="' + item.type + '">';
                    if (item.correct_anw === "c") {
                      html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="c" checked>';
                    } else {
                      html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="c">';
                    }
                    html += '<h5 style="margin:5px;color: #677788;font-size: large;">C.' + item.option3 + '</h5>';
                    html += '</div>';
                    html += '<div class="col-6 d-flex ' + helloClass + '" style="padding: 5px;border: 1px solid #8c98a43b;" id="' + (index + 1) + '" data-value="' + item.id + '" data-value1="d" data-type="' + item.type + '">';
                    if (item.correct_anw === "d") {
                      html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="d" checked>';
                    } else {
                      html += '<input ' + disableAttr + ' type="radio" class="form-check-input is-valid ' + checkListClass + '" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="d">';
                    }
                    html += '<h5 style="margin:5px;color: #677788;font-size: large;">D.' + item.option4 + '</h5>';
                    html += '</div>';

                    html += '</div>';

                    $('#getc_lables1').hide();
                  } else if (item.type == "true_false") {
                    html += '<div class="row"><span>Question ' + (index + 1) + '</span><h1 data-questionid="' + item.id + '" class="question_number"> ' + item.question + '</h1>';
                    if (item.document != "" && item.document_name != "" && item.doc_type == "Open_Book") {
                      html += '<div class="col-12 d-flex" style="padding: 5px;border: 1px solid #8c98a43b;"><h3 style="margin:5px;color: #677788;font-size: large;">Document :';
                      if (item.file_type == "offline") {
                        html += '<a class="get_valuec' + item.id + '" style="display:none">' + item.document + '</a><a class="url_td" href="<?php echo BASE_URL; ?>openPageIllu.php" target="_blank" id="' + item.id + '">' + item.document_name + '</a>';
                      } else if (item.file_type == "online") {
                        html += '<a href="' + item.document + '" target="_blank">' + item.document_name + '</a>';
                      } else {
                        html += '<a href="<?php echo BASE_URL ?>includes/Pages/test_document/' + item.document + '" target="_blank">' + item.document_name + '</a>';
                      }
                      html += '<a style="display:' + refClass + '" href="<?php echo BASE_URL ?>Test/studentpanel/refPage.php?refId=' + item.docId + '" target="_blank">,<i class="bi bi-file-earmark-fill"></i></a></h3></div>';
                    }
                    html += '<div class="col-12 d-flex" style="padding: 5px;border: 1px solid #8c98a43b;border-bottom: none;">';
                    html += '<img style="height:215px;width:350px;display:' + imgName + '" src="<?php echo BASE_URL; ?>includes/Pages/files/' + item.imageName + '" />';
                    html += '</div>';
                    html += '<div class="col-6 d-flex hello" style="padding: 5px;border: 1px solid #8c98a43b;" id="' + (index + 1) + '" data-value="' + item.id + '" data-value1="true">';
                    if (item.correct_anw === "true") {
                      html += '<input type="radio" class="form-check-input is-valid allcheckList" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="true" checked>';
                    } else {
                      html += '<input type="radio" class="form-check-input is-valid allcheckList" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="true">';
                    }
                    html += '<h5 style="margin:5px;color: #677788;font-size: large;">' + item.option1 + '</h5>';
                    html += '</div>';
                    html += '<div class="col-6 d-flex hello" style="padding: 5px;border: 1px solid #8c98a43b;" id="' + (index + 1) + '" data-value="' + item.id + '" data-value1="false">';
                    if (item.correct_anw === "false") {
                      html += '<input type="radio" class="form-check-input is-valid allcheckList" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="false" checked>';
                    } else {
                      html += '<input type="radio" class="form-check-input is-valid allcheckList" id="' + (index + 1) + '" data-value="' + item.id + '" name="check" value="false">';
                    }
                    html += '<h5 style="margin:5px;color: #677788;font-size: large;">' + item.option2 + '</h5>';
                    html += '</div>';

                    html += '</div>';
                    $('#getc_lables1').hide();
                  } else if (item.type == "digrame") {
                    $('#getc_lables1').show();
                    html += '<div class="row justify-content-center"><span>Question ' + (index + 1) + '</span><h1 data-questionid="' + item.id + '" class="question_number"> ' + item.question + '</h1>';
                    html += '<div class="col-12 d-flex" style="padding: 5px;border: 1px solid #8c98a43b;border-bottom: none;text-align: center;justify-content: center;">';
                    html += '<img style="height:500px; width:500px;border-radius:40px;" src="<?php echo BASE_URL; ?>includes/Pages/test/diagram/' + item.fig + '">';
                    html += '</div>';


                    // Initialize the variable outside the loop

                    $.each(item.labels, function(labelKey, labelValue) {
                      html1 += '<div class="col-12 d-flex hello" style="padding: 5px;border: 1px solid #8c98a43b;border-bottom: none;">';
                      html1 += '<label>' + (labelKey + 1) + ':</label>';
                      html1 += '<input type="text" class="form-control" readonly value="' + labelValue + '">';
                      html1 += '<select class="form-control selct_ans" id="' + (index + 1) + '" data-value="' + item.id + '" data-suboption="' + labelValue + '"><option disabled selected>-select correct answer-</option>';

                      // Determine the number of dropdown options based on item.options
                      var get_count = item.options; // Replace with the actual count

                      // Generate the dropdown options (a, b, c, ...)
                      for (var i = 0; i < get_count; i++) {
                        var optionValue = String.fromCharCode(97 + i); // 'a', 'b', 'c', ...
                        html1 += '<option value="' + optionValue + '">' + optionValue + '</option>';
                      }

                      html1 += '</select>';
                      html1 += '</div>';

                      $('#getc_lables1').html(html1);
                    });

                    if (item.document != "" && item.document_name != "" && item.doc_type == "Open_Book") {
                      html += '<div class="col-12 d-flex" style="padding: 5px;border: 1px solid #8c98a43b;"><h3 style="margin:5px;color: #677788;font-size: large;">Document :';
                      if (item.file_type == "offline") {
                        html += '<a class="get_valuec' + item.id + '" style="display:none">' + item.document + '</a><a class="url_td" href="<?php echo BASE_URL; ?>openPageIllu.php" target="_blank" id="' + item.id + '">' + item.document_name + '</a>';
                      } else if (item.file_type == "online") {
                        html += '<a href="' + item.document + '" target="_blank">' + item.document_name + '</a>';
                      } else {
                        html += '<a href="<?php echo BASE_URL ?>includes/Pages/test_document/' + item.document + '" target="_blank">' + item.document_name + '</a>';
                      }
                      html += '<a style="display:' + refClass + '" href="<?php echo BASE_URL ?>Test/studentpanel/refPage.php?refId=' + item.docId + '" target="_blank">,<i class="bi bi-file-earmark-fill"></i></a></h3></div>';
                    }
                    html += '</div>';
                  }
                }
                qC++;
              });

              // Append the HTML to the container
              $('#pagination-container').html(html);

              // Update the current page

              currentPage = page;

              // Show/hide "Previous" and "Next" buttons
              if (currentPage > 1) {
                $('#previous-button').show();
              } else {
                $('#previous-button').hide();
              }

              if (currentPage < totalPages) {
                $('#next-button').show();
                $('#result-button').hide(); // Hide "Result" button
              } else {
                $('#next-button').hide();
                $('#result-button').show(); // Show "Result" button
              }
            },
            error: function() {
              console.log('Error loading data');
            }
          });

        },
        error: function() {
          console.log('Error saving answer');
        }
      });


    });
    $(document).on("click", ".selct_ans", function() {
      var id = $(this).attr('id');
      var inputElement = $("#get_check" + id);
      var question_id = $(this).data('value');
      var suboption = $(this).data('suboption');
      var ans = $(this).val();
      var type1 = "diagram";
      inputElement.removeClass("is-invalid");
      // Add the 'is-valid' class
      inputElement.addClass("is-valid");
      $.ajax({
        url: 'save_answer.php?userid=<?php echo $user_id; ?>&exam_id=<?php echo $exam_id ?>&repeat_id=<?php echo $unique_id1 ?>', // Replace with the actual PHP script URL
        type: 'GET',
        data: {
          question_id: question_id,
          answer: ans,
          type: type1,
          suboption1: suboption,
        },
        success: function(response) {

        },
        error: function() {
          console.log('Error saving answer');
        }
      });

    });
  </script>

  <script>
    // $(".showImageFull").on("click",function(){
    $(document).on("click", ".showImageFull", function() {
      const imageName = $(this).data("imagename");
      // alert(imageName);
      $(".imagePath").attr("src", "<?php echo BASE_URL; ?>includes/pages/files/" + imageName);
    });
  </script>

  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer" style="display:none;">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>

<script>
  // Timer countdown
  var examDuration = <?php echo $remainingTime; ?>;
  var timerElement = document.getElementById('timer');

  function updateTimer() {
    var hours = Math.floor(examDuration / 3600);
    var minutes = Math.floor((examDuration % 3600) / 60);
    var seconds = examDuration % 60;

    if (hours > 0) {
      timerElement.textContent = hours + "h " + minutes + "m " + seconds + "s";
    } else {
      timerElement.textContent = minutes + "m " + seconds + "s";
    }
  }

  var timer = setInterval(function() {
    examDuration--;

    if (examDuration <= 0) {
      clearInterval(timer); // Stop the timer
      alert("Time's up! Your session will be ended.");
      window.location.href = "end_exam.php?id=<?php echo $exam_id ?>&repeat_id=<?php echo $unique_id1 ?>&user_id=<?php echo $user_id ?>"; // Redirect to end exam page
    }

    updateTimer();
  }, 1000); // Update every 1 second

  // Initial timer display
  updateTimer();
</script>

<script>
  $(document).ready(function() {
    $(document).on("click", ".hello", function() {
      var id = $(this).attr('id');
      var inputElement = $("#get_check" + id);
      var question_id = $(this).data('value');
      var ans = $(this).data('value1');
      // alert(id);
      var checkbox = $(this).find('input[type="radio"]');
      checkbox.prop('checked', !checkbox.prop('checked'));
    });

    // Prevent the click on the checkbox itself from triggering the change event.
    $('.hello input[type="radio"]').on('click', function(event) {
      event.stopPropagation();
    });
  });
</script>

<script>
  $(document).on("click", ".url_td", function() {
    var id = $(this).attr('id');
    var text1 = $('.get_valuec' + id).text();
    var temp2 = $("<input>");
    $("body").append(temp2);
    temp2.val(text1).select();
    document.execCommand("copy");
    temp2.remove();
  });
</script>

</html>