<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$ctp = "";
if (isset($fixed_ctp_id)) {
  $_SESSION['type_ctp'] = $ctp = $fixed_ctp_id;
} else if (isset($_SESSION['type_ctp'])) {
  $ctp = $_SESSION['type_ctp'];
}
$sql = "DELETE FROM testcatfil";
$statement = $connect->prepare($sql);
$statement->execute();



$course_name_es = "";
$q61 = "SELECT * FROM newcourse group by CourseName,CourseCode";
$st61 = $connect->prepare($q61);
$st61->execute();

if ($st61->rowCount() > 0) {
  $re61 = $st61->fetchAll();
  foreach ($re61 as $row61) {
    $std_course10 = $row61['CourseName'];
    $get_course_name11 = $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
    $get_course_name11->execute([$std_course10]);
    $course_code1s = $get_course_name11->fetchColumn();
    $course_name_es .= '<option value="' . $row61['Courseid'] . '">' . $course_code1s . '- 0' . $row61['CourseCode'] . '</option>';
  }
}
$roles_values = "";
$query1 = "SELECT * FROM roles where roles!='super admin'";
$statement1 = $connect->prepare($query1);
$statement1->execute();

if ($statement1->rowCount() > 0) {
  $result1 = $statement1->fetchAll();
  $sn = 1;
  foreach ($result1 as $row1) {
    $roles_values .= "<option value=" . $row1['id'] . ">" . $row1['roles'] . "</option>";
  }
}


$dep_values = "";
$query_dep = "SELECT * FROM homepage";
$statement_dep = $connect->prepare($query_dep);
$statement_dep->execute();

if ($statement_dep->rowCount() > 0) {
  $result_dep = $statement_dep->fetchAll();
  foreach ($result_dep as $row_dep) {
    $dep_values .= "<option value=" . $row_dep['id'] . ">" . $row_dep['department_name'] . "</option>";
  }
}

$category_names11 = "";
$q6 = "SELECT * FROM test_course";
$st6 = $connect->prepare($q6);
$st6->execute();



if ($st6->rowCount() > 0) {
  $re6 = $st6->fetchAll();
  foreach ($re6 as $row6) {
    $course_name_value = $row6['course_name'];
    $category_names11 .= '<option value="' . $row6['id'] . '">' . $course_name_value . '</option>';
  }
}

$quesCate10 = "";
$query2 = "SELECT * FROM test_course ORDER BY id ASC";
$statement2 = $connect->prepare($query2);
$statement2->execute();

if ($statement2->rowCount() > 0) {
  $result2 = $statement2->fetchAll();
  $sn = 1;
  foreach ($result2 as $row2) {
    $quesCate10 .= '<option name="document" value="' . $row2['id'] . '">' . $row2['course_name'] . '</option>';
  }
}

$document10 = "";
$query2 = "SELECT * FROM document_test ORDER BY id ASC";
$statement2 = $connect->prepare($query2);
$statement2->execute();

if ($statement2->rowCount() > 0) {
  $result2 = $statement2->fetchAll();
  $sn = 1;
  foreach ($result2 as $row2) {
    $document10 .= '<option name="document" value="' . $row2['file_name'] . '">' . $row2['title'] . '</option>';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Create Manual Exam</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
    #suggestions {
      width: 300px;
      margin: 10px auto;
      padding: 5px;
      background-color: #f0f0f0;
      border: 1px solid #ccc;
      display: none;
    }

    .suggestion-item {
      padding: 5px;
      cursor: pointer;
    }

    .suggestion-item:hover {
      background-color: #91989e4f;
    }
  </style>
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
        <div class="page-header" style="padding: 0px; display:flex;">
          <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To Manage Test" style="color:black; text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/test/managetest.php" style="margin-bottom:5px;"><i class="bi bi-arrow-left"></i></a>
          <h1 class="text-success" style="margin:5px;">Create Exam</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">


        <div class="row justify-content-center">

          <div class="col-lg-11 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

              <div class="card-body">
                <!-- Step Form -->
                                <form class="js-step-form"
                                      data-hs-step-form-options='{
                                        "progressSelector": "#basicStepFormProgress",
                                        "stepsSelector": "#basicStepFormContent",
                                        "endSelector": "#createProjectFinishBtn"
                                      }' action="<?php echo BASE_URL; ?>includes/Pages/test/insert_exam_data1.php" method="post" enctype="multipart/form-data">
                                  <!-- Step -->
                                  <div class="card-header">
                                  <ul id="basicStepFormProgress" class="js-step-progress step step-sm step-icon-sm step-inline step-item-between">
                                    <li class="step-item">
                                      <a class="step-content-wrapper" href="javascript:;"
                                         data-hs-step-form-next-options='{
                                          "targetSelector": "#basicStepExamDeatil"
                                        }'>
                                        <span class="step-icon step-icon-soft-dark">1</span>
                                        <div class="step-content">
                                          <span class="step-title">Exam Detail</span>
                                        </div>
                                      </a>
                                    </li>

                                    <li class="step-item">
                                      <a class="step-content-wrapper" href="javascript:;"
                                         data-hs-step-form-next-options='{
                                           "targetSelector": "#selectStepCategory"
                                         }'>
                                        <span class="step-icon step-icon-soft-dark">2</span>
                                        <div class="step-content">
                                          <span class="step-title">Select Questions</span>
                                        </div>
                                      </a>
                                    </li>

                                    <li class="step-item">
                                      <a class="step-content-wrapper" href="javascript:;"
                                         data-hs-step-form-next-options='{
                                           "targetSelector": "#selectStepType"
                                         }'>
                                        <span class="step-icon step-icon-soft-dark">3</span>
                                        <div class="step-content">
                                          <span class="step-title">Exam Type/Attempts</span>
                                        </div>
                                      </a>
                                    </li>

                                    <li class="step-item">
                                      <a class="step-content-wrapper" href="javascript:;"
                                         data-hs-step-form-next-options='{
                                           "targetSelector": "#selectStepDifficulty"
                                         }'>
                                        <span class="step-icon step-icon-soft-dark">4</span>
                                        <div class="step-content">
                                          <span class="step-title">Set Time/Date</span>
                                        </div>
                                      </a>
                                    </li>

                                    <!-- <li class="step-item">
                                      <a class="step-content-wrapper" href="javascript:;"
                                         data-hs-step-form-next-options='{
                                           "targetSelector": "#selectStepAttempts"
                                         }'>
                                        <span class="step-icon step-icon-soft-dark">5</span>
                                        <div class="step-content">
                                          <span class="step-title">Exam Type/Attempts</span>
                                        </div>
                                      </a>
                                    </li>

                                    <li class="step-item">
                                      <a class="step-content-wrapper" href="javascript:;"
                                         data-hs-step-form-next-options='{
                                           "targetSelector": "#selectStepTime"
                                         }'>
                                        <span class="step-icon step-icon-soft-dark">6</span>
                                        <div class="step-content">
                                          <span class="step-title">Set Time/Date</span>
                                        </div>
                                      </a>
                                    </li> -->
                                  </ul></div>
                                  <!-- End Step -->

                                  <!-- Content Step Form -->
                                  <div id="basicStepFormContent">
                                    <div id="basicStepExamDeatil" class="active">
                                      <!-- <h4>Exam Detail</h4> -->

                                      <div>
                                        <table class="table">
                  <tr>
                    <td>
                      <label class="form-label text-secondary" style="font-weight: bold;font-size: large;font-style: italic;">Select Role</label>
                      <select class="form-control select_roles_test" name="exam_for" required>
                        <option value="" disabled>Select Role/people</option>
                        <?php echo $roles_values; ?>
                        <option value="par">particular User</option>
                        <option value="course">Course</option>
                        <option value="everyone">Everyone</option>
                        <option value="dep">Department</option>
                      </select>
                    </td>
                    <td id="not_Ctp_test">
                      <label class="form-label text-secondary" style="font-weight: bold;font-size: large;font-style: italic;">Exam Name</label>
                      <input type="text" name="exam_name" class="form-control bg-soft-secondary" />
                    </td>
                    <td id="course" style="display:none">
                      <label class="form-label text-secondary" style="font-weight: bold;font-size: large;font-style: italic;">Select Course</label>
                      <select class="form-control bg-soft-secondary" name="course_id" id="select_course_test">
                        <option value="0" disabled>Select Course</option>
                        <?php echo $course_name_es; ?>
                      </select>
                    </td>

                  </tr>
                  <tr>
                    <td>
                      <label class="form-label text-secondary" style="font-weight: bold;font-size: large;font-style: italic;">Number Of question</label>
                      <input type="number" name="question_number" class="form-control no_question bg-soft-secondary" required id="countInput" value="0" readonly>
                      <?php $nRows2 = $connect->query("select count(*) from exam_question")->fetchColumn();
                      echo "Total Question : " . $nRows2;
                      ?>
                    </td>

                    <td>
                      <label class="form-label text-secondary" style="font-weight: bold;font-size: large;font-style: italic;">Total marks</label>
                      <input type="number" name="total_marks" class="form-control bg-soft-secondary" id="total_marks_question" required autocomplete="off">
                    </td>

                  </tr>
                  <tr>
                    <td style="display:none">
                      <label class="form-label text-secondary" style="font-weight: bold;font-size: large;font-style: italic;">Select Marks type</label>
                      <select class="form-control" id="select_marks_types" required name="marks_type">
                        <option value="Equal" selected>Equal distribute</option>
                      </select>
                    </td>
                    <td style="display:none" id="user_idded">
                      <label class="form-label text-secondary" style="font-weight: bold;font-size: large;font-style: italic;">user name</label>
                      <input type="text" class="form-control bg-soft-secondary" id="username-input" placeholder="Type to search for usernames">
                      <div id="suggestions" style="width:auto; border-radius: 10px;" class="bg-soft-dark">
                      </div>
                    </td>
                    <td id="Ctp_test" style="display:none">
                      <label class="form-label text-secondary" style="font-weight: bold;font-size: large;font-style: italic;">Select Exam Name</label>
                      <select id="fetch_tets_class" class="form-control" name="exam_names">

                      </select>
                    </td>
                    <td id="dep_fetch" style="display:none">
                      <label class="form-label text-secondary" style="font-weight: bold;font-size: large;font-style: italic;">Select Department Name</label>
                      <select class="form-control" name="exam_dep">
                        <?php echo $dep_values; ?>
                      </select>
                    </td>
                  </tr>
                </table>
                                      </div>

                                      <!-- Footer -->
                                      <div class="d-flex align-items-center">
                                        <div class="ms-auto">
                                          <button type="button" class="btn btn-primary"
                                                  data-hs-step-form-next-options='{
                                                    "targetSelector": "#selectStepCategory"
                                                  }'>
                                            Next <i class="bi-chevron-right small"></i>
                                          </button>
                                        </div>
                                      </div>
                                      <!-- End Footer -->
                                    </div>

                                    <div id="selectStepCategory" style="display: none;">
                                      <!-- <h4>Select category</h4> -->

                                      <div class="row">
                  <div class="col-md-12 mb-3">
                    <div class="form-outline mb-2">
                      <table class="table table-striped table-hover" id="searchAllQuestioncatetable">
                        <div class="row">
                          <div class="col-6">
                            <input style="margin:5px;" class="form-control" type="text" id="searchAllQuestioncate" onkeyup="searchQuestions()" placeholder="Search Questions">
                          </div>

                          <div class="col-6" style="display:flex;float: right;">
                            <select id="difficultyFilter" onchange="filterByDifficultyAndType()" style="margin:5px;border-radius: 10px;">
                              <option value="all">Filter By Difficulty</option>
                              <option value="easy">Easy</option>
                              <option value="medium">Medium</option>
                              <option value="hard">Hard</option>
                              <option value="veryhard">Very Hard</option>
                            </select>

                            <select id="typeFilter" onchange="filterByDifficultyAndType()" style="margin:5px;border-radius: 10px;">
                              <option value="all">Filter By Type</option>
                              <option value="mcq">MCQ</option>
                              <option value="true_false">True and False</option>
                              <option value="diagram">Diagram</option>
                            </select>
                            <select id="documentFilter" onchange="filterByDifficultyAndType()" style="margin:5px;border-radius: 10px;">
                              <option value="all">Filter By Document</option>
                              <?php echo $document10; ?>
                            </select>

                            <select id="categoryFilter" onchange="filterByDifficultyAndType()" style="margin:5px;border-radius: 10px;" name="role">
                              <option value="all">Filter By Category</option>
                              <?php echo $quesCate10; ?>
                            </select>
                            <br>
                          </div>
                        </div>
                        <hr>
                        <!-- <thead>
                                  <tr>
                                      <th><input type="checkbox" name="question_id[]" id="checkbox1"></th>
                                      <th>Question List</th>
                                  </tr>
                              </thead> -->
                        <?php
                        $q1000 = "SELECT * FROM exam_question";
                        $st1000 = $connect->prepare($q1000);
                        $st1000->execute();

                        if ($st1000->rowCount() > 0) {
                          $re1000 = $st1000->fetchAll();
                          foreach ($re1000 as $row1000) {
                            $type = $row1000['type'];
                            $typeClasses = array(
                              'mcq' => '#00c9a7', // Use Bootstrap warning class
                              'true_false' => 'violet', // Use Bootstrap success class
                              'diagram' => 'orange' // Use Bootstrap info class
                            );
                            $typeClass = isset($typeClasses[$type]) ? $typeClasses[$type] : 'bg-secondary';

                            $difficulty = $row1000['difficulty'];
                            $difficultyClasses = array(
                              'easy' => 'yellow', // Use Bootstrap warning class
                              'medium' => 'green', // Use Bootstrap success class
                              'hard' => 'blue',
                              'veryhard' => 'red' // Use Bootstrap info class
                            );
                            $difficultyClasses = isset($difficultyClasses[$difficulty]) ? $difficultyClasses[$difficulty] : 'bg-secondary';

                            $doc_in = $row1000['document'];
                            $doc_name = $connect->prepare("SELECT file_name FROM document_test WHERE id=?");
                            $doc_name->execute([$doc_in]);
                            $doc2 = $doc_name->fetchColumn();
                        ?>
                            <tbody>
                              <tr>
                                <td><input type="checkbox" name="question_id[]" value="<?php echo $row1000['id']; ?>" id="checkbox1"></td>
                                <td><span class="legend-indicator" style="background-color:<?php echo $typeClass; ?>"></span><?php echo $row1000['question']; ?>
                                  <span style="display: none;" class="category"><?php echo $row1000['category']; ?></span>
                                  <span><?php echo $row1000['difficulty']; ?></span>
                                  <span class="badge rounded-pill text-black difficulty" style="background-color:<?php echo $difficultyClasses; ?>"><?php echo $row1000['difficulty']; ?></span>
                                  <span class="badge m-1 type d-none"><?php echo $row1000['type']; ?></span>
                                  <span class="d-none document"><?php echo $doc2; ?></span>
                                </td>
                              </tr>
                            </tbody>
                        <?php
                          }
                        }
                        ?>
                      </table>
                    </div>
                  </div>
                </div>

                                      <!-- Footer -->
                                      <div class="d-flex align-items-center">
                                        <button type="button" class="btn btn-ghost-secondary me-2"
                                           data-hs-step-form-prev-options='{
                                             "targetSelector": "#basicStepExamDeatil"
                                           }'>
                                          <i class="bi-chevron-left small"></i> Previous step
                                        </button>

                                        <div class="ms-auto">
                                          <button type="button" class="btn btn-primary"
                                                  data-hs-step-form-next-options='{
                                                    "targetSelector": "#selectStepType"
                                                  }'>
                                            Next <i class="bi-chevron-right small"></i>
                                          </button>
                                        </div>
                                      </div>
                                      <!-- End Footer -->
                                    </div>

                                    <div id="selectStepType" style="display: none;">
                                      <!-- <h4>Select type</h4> -->

                                      <div class="row">
                  <div class="col-md-4 mb-3">

                    <div class="form-outline mb-2">
                      <label class="form-label text-secondary" for="course" style="font-weight: bold;font-size: large;font-style: italic;">Select repeatation</label>
                      <select class="form-control" id="cat_dropdown1" name="exam_Types" required>
                        <option value="" disabled selected>Select</option>
                        <option value="once">Once</option>
                        <option value="repeat">Repeat</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="form-outline mb-2">
                      <label class="form-label text-secondary" for="course" style="font-weight: bold;font-size: large;font-style: italic;">Result</label>
                      <select class="form-control" name="type_reult" required>
                        <option value="" disabled selected>Select</option>
                        <option value="show">Show Result</option>
                        <option value="hide">Hide Result</option>
                      </select>
                    </div>
                  </div>

                
                  <div class="col-md-4 mb-3">

                    <div class="form-outline mb-2">
                      <label class="form-label text-secondary" for="course" style="font-weight: bold;font-size: large;font-style: italic;">Minimum Passing Value</label>
                      <input type="number" name="passing_marks" class="form-control bg-soft-secondary" oninput="checkMarks(this)" required>
                      <p class="error-message" style="color: red;"></p>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">

                    <div class="form-outline mb-2">
                      <label class="form-label text-secondary" for="course" style="font-weight: bold;font-size: large;font-style: italic;">Type Of Exam</label>
                      <select class="form-control" name="type_Exam" required>
                        <option value="" disabled selected>Select</option>
                        <option value="Open_Book">Open Book</option>
                        <option value="closed">closed</option>
                      </select>
                    </div>
                  </div>

                
                  <div class="col-md-4 mb-3">

                    <div class="form-outline mb-2">
                      <label class="form-label text-secondary" for="course" style="font-weight: bold;font-size: large;font-style: italic;">Need Code To start exam</label>
                      <select class="form-control" name="code" required>
                        <option value="" disabled selected>Select Option</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                      <input type="hidden" name="randomCode" id="randomCode" />
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="form-outline mb-2">
                      <label class="form-label text-secondary" for="course" style="font-weight: bold;font-size: large;font-style: italic;">Attempts</label>
                       <select class="form-control" name="attempts">
                        <option value="" disabled selected>Select Option</option>
                        <option value="no">No</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select>
                      <!-- <input type="hidden" name="randomCode" id="randomCode" /> -->
                    </div>
                    </div>
                </div>

                                      <div class="d-flex align-items-center">
                                        <button type="button" class="btn btn-ghost-secondary me-2"
                                           data-hs-step-form-prev-options='{
                                             "targetSelector": "#selectStepCategory"
                                           }'>
                                          <i class="bi-chevron-left small"></i> Previous step
                                        </button>

                                        <div class="ms-auto">
                                          <button type="button" class="btn btn-primary"
                                                  data-hs-step-form-next-options='{
                                                    "targetSelector": "#selectStepDifficulty"
                                                  }'>
                                            Next <i class="bi-chevron-right small"></i>
                                          </button>
                                        </div>
                                      </div>
                                      <!-- End Footer -->
                                    </div>

                                    <div id="selectStepDifficulty" style="display: none;">
                                      <!-- <h4>Add Difficulty</h4> -->

                                      <div class="row">
                  <div class="col-md-4 mb-3">

                    <div class="form-outline mb-2">
                      <label class="form-label text-secondary" for="course" style="font-weight: bold;font-size: large;font-style: italic;">start Time</label>
                      <input type="time" id="start-time" class="form-control bg-soft-secondary" name="starttimings" required>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="form-outline mb-2">
                      <label class="form-label text-secondary" for="course" style="font-weight: bold;font-size: large;font-style: italic;">End Time</label>
                      <input type="time" id="end-time" name="endtimings" class="form-control bg-soft-secondary" required>
                    </div>
                    <p id="result" style="font-size:20px"></p>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="form-outline mb-2">
                      <label class="form-label text-secondary" for="course" style="font-weight: bold;font-size: large;font-style: italic;">Start Date</label>
                      <input type="date" name="dates" class="form-control bg-soft-secondary" id="startDate" required>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="form-outline mb-2">
                      <label class="form-label text-secondary" for="course" style="font-weight: bold;font-size: large;font-style: italic;">End Date</label>
                      <input type="date" name="end_dates" class="form-control bg-soft-secondary" id="endDate" required>
                    </div>
                    <p id="result1" style="font-size:20px"></p>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="form-outline mb-2">
                      <label class="form-label text-secondary" for="course" style="font-weight: bold;font-size: large;font-style: italic;">Location</label>
                      <select class="form-control" name="location" required>
                        <option value="" disabled selected>Select Option</option>
                        <option value="abu">Abu dhabi</option>
                        <option value="india">india</option>
                      </select>
                    </div>
                  </div>
                </div>

                                      <!-- Footer -->
                                      <div class="d-sm-flex align-items-center">
                                        <button type="button" class="btn btn-ghost-secondary mb-3 mb-sm-0 me-2"
                                           data-hs-step-form-prev-options='{
                                             "targetSelector": "#selectStepType"
                                           }'>
                                          <i class="bi-chevron-left small"></i> Previous step
                                        </button>
                                        <!-- <div class="ms-auto">
                                          <button type="button" class="btn btn-primary"
                                                  data-hs-step-form-next-options='{
                                                    "targetSelector": "#selectStepAttempts"
                                                  }'>
                                            Next <i class="bi-chevron-right small"></i>
                                          </button>
                                        </div> -->

                                        <div class="d-flex justify-content-end ms-auto">
                                          <button type="button" class="btn btn-white me-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                                          <button id="createProjectFinishBtn" type="submit" class="btn btn-success" name="addExam">Create Exam</button>
                                        </div>
                                      </div>
                                      <!-- End Footer -->
                                    </div>
                                  </div>
                                  <!-- End Content Step Form -->

                                  <!-- Message Body -->
                                  <div id="basicStepSuccessMessage" style="display:none;">
                                    <div class="text-center">
                                      <img class="img-fluid mb-3" src="../assets/img/illustrations/create.png" alt="Image Description" style="max-width: 15rem;">

                                      <div class="mb-4">
                                        <h2>Successful!</h2>
                                        <p>New project has been successfully created.</p>
                                      </div>

                                      <div class="d-flex justify-content-center gap-3">
                                        <a class="btn btn-white" href="#">
                                          <i class="bi-chevron-left small ms-1"></i> Back to projects
                                        </a>
                                        <a class="btn btn-primary" href="#">
                                          <i class="tio-city me-1"></i> Add new project
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- End Message Body -->
                                </form>
<!-- End Step Form -->
              </div>
            </div>
          </div>
        </div>


    <!-- End Content -->

  </main>

      <script src="<?php echo BASE_URL;?>assets/vendor/hs-step-form/dist/hs-step-form.min.js"></script>

  
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new HSStepForm('.js-step-form');
  });
</script>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".next-button").click(function() {
        // Get the current tab
        var currentTab = $(this).closest(".tab-pane");

        // Get the ID of the next tab
        var nextTabId = currentTab.next(".tab-pane").attr("id");

        // Switch to the next tab
        $('a[href="#' + nextTabId + '"]').tab('show');
      });

      $(".previous-button").click(function() {
        // Get the current tab
        var currentTab = $(this).closest(".tab-pane");

        // Get the ID of the previous tab
        var prevTabId = currentTab.prev(".tab-pane").attr("id");

        // Switch to the previous tab
        $('a[href="#' + prevTabId + '"]').tab('show');
      });
    });
  </script>

  <script>
    $(document).on("change", ".select_roles_test", function() {
      var get_val = $(this).val();
      if (get_val == "par") {
        $("#user_idded").show();
        $("#not_Ctp_test").show();
        $("#Ctp_test").hide();
        $("#course").hide();
        $("#dep_fetch").hide();
      } else if (get_val == "course") {
        $("#course").show();
        $("#not_Ctp_test").hide();
        $("#user_idded").hide();
        $("#Ctp_test").show();
        $("#dep_fetch").hide();
      } else if (get_val == "dep") {
        $("#dep_fetch").show();
        $("#course").hide();
        $("#not_Ctp_test").show();
        $("#user_idded").hide();
        $("#Ctp_test").hide();
      } else {
        $("#user_idded").hide();
        $("#course").hide();
        $("#not_Ctp_test").show();
        $("#Ctp_test").hide();
        $("#dep_fetch").hide();
      }
    });
    $(document).on("change", "#select_course_test", function() {
      var get_val1 = $(this).val();
      $.ajax({
        type: 'POST',
        url: 'fetch_course_Ctps.php',
        data: 'id=' + get_val1,
        success: function(html) {
          $('#fetch_tets_class').html(html);
        }
      });
    });
  </script>

  <script>
    $(document).ready(function() {

      const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

      let randomCode = '';

      for (let i = 0; i < 8; i++) {

        const randomIndex = Math.floor(Math.random() * characters.length);

        randomCode += characters.charAt(randomIndex);

      }

      $("#randomCode").val(randomCode);

    });
  </script>
  <script>
    $(document).ready(function() {
      // Initialize an empty array to store selected user IDs
      let selectedUserIds = [];

      $("#username-input").on("keyup", function() {
        let keyword = $(this).val();

        // Make an AJAX request to fetch username suggestions
        $.ajax({
          url: "fetch_user_info.php",
          method: "POST",
          data: {
            keyword: keyword
          },
          success: function(data) {
            // Parse the JSON response
            let suggestions = JSON.parse(data);

            // Clear and populate the suggestions box
            let suggestionsBox = $("#suggestions");
            suggestionsBox.empty();

            if (suggestions.length > 0) {
              suggestions.forEach(function(user) {
                let isChecked = selectedUserIds.includes(user.id) ? "checked" : "";
                suggestionsBox.append(
                  `<div class="suggestion-item" style="font-size:x-large;"><input style="height: 15px;width: 15px;margin: 5px;" type="checkbox" name="student[]" value="${user.id}" ${isChecked}>${user.nickname}</div>`
                );
              });

              suggestionsBox.show();
            } else {
              suggestionsBox.hide();
            }
          },
        });
      });

      // Handle checkbox clicks
      $("#suggestions").on("click", ".suggestion-item input[type='checkbox']", function() {
        let selectedUserId = $(this).val();
        if ($(this).prop("checked")) {
          // Add the selected user ID to the array if it's checked
          selectedUserIds.push(selectedUserId);
        } else {
          // Remove the selected user ID from the array if it's unchecked
          selectedUserIds = selectedUserIds.filter(id => id !== selectedUserId);
        }
        console.log("Selected User IDs: " + selectedUserIds.join(", "));
      });
    });

    $("#select_marks_types").on("change", function() {
      var nu = $(this).val();
      if (nu == "manual") {
        $('.show_marks_div').show();
      } else {
        $('.show_marks_div').hide();
      }
    });
  </script>

  <script>
    // $(".catSelect").on("click",function() {
    $("#table-field-multiplecate").on('mousedown', '.catSelect', function() {
      // console.log("clicked function");
      // filData();
      // alert("hello");
      const addUnCat = $(this).data("class");
      var option = $('<option>', {
        text: '--Select Category--',
        value: '',
        selected: true, // Add the 'selected' attribute
        // You can add more attributes here if needed
      });
      // alert(addUnCat);
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/test/fetchFilter.php',
        data: {
          chatId: 1,
        },
        success: function(response) {
          //  alert(response);
          $("." + addUnCat).empty();
          $("." + addUnCat).append(option);
          $("." + addUnCat).append(response);
        }
      });
    });

    // function filData() {
    //   
    // }

    // $(".catSelect").change(function() {
    $("#table-field-multiplecate").on('change', '.catSelect', function() {
      const catId = $(this).val();
      // console.log("change function")
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/test/fetchFilter.php',
        data: {
          catId: catId,
        },
        success: function(response) {
          // filData();
        }
      });
    })
  </script>
  <script>
    $(document).ready(function() {
      $('#categorySelect').change(function() {
        var selectedCategory = $('#categorySelect').val();
        if (selectedCategory !== "") {
          // Check if the category is already present in the textbox
          if ($('.categoryInput[value="' + selectedCategory + '"]').length === 0) {
            $.ajax({
              type: 'POST',
              url: 'temp_cat.php',
              data: 'id=' + selectedCategory,
              success: function(response) {
                // fetchValues();
                window.location.reload();
              }
            });
            //   function fetchValues() {
            //       $.ajax({
            //           type: "GET",
            //           url: "fetch_temp.php", // PHP script for fetching data from the database
            //           success: function(response) {
            //               $("#multiplecate1").html(response);
            //           }
            //       });
            //   }
            //     // Initial data load
            //     fetchValues();
          }
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {


      var html = '<tr>\
              <td style="width: 50%;">\
              <label style="font-weight:bold;" class="text-dark">Category</label>\
              <div class="form-outline mb-2">\
                        <select class="form-control text-dark" id="cat_dropdown1" name="examType[]" required>\
                          <option value="" disabled>select category</option>\
                          <?php echo  $category_names11; ?> < /
      select > \ <
        /div>\ < /
      td > \ <
        td style = "width: 50%;" > \
        <
        label style = "font-weight:bold;"
      class = "text-dark" > Percenatage < /label>\ <
      div class = "form-outline mb-2" > \
      <
      input type = "number"
      name = "examTypePer[]"
      placeholder = "Percentage"
      class = "form-control form-control-md marks-input typePer"
      min = "0"
      max = "100"
      value = "0"
      oninput = "checkInput(this)"
      required > \
        <
        p class = "error-message"
      style = "color: red;" > < /p>\ < /
      div > \ <
        /td>\ <
      td > \
        <
        button style = "margin:30px;"
      type = "button"
      name = "remove_category"
      id = "remove_category"
      class = "btn btn-soft-danger" > < i class = "bi bi-dash-circle-fill" > < /i></button > \
      <
      /td>\ < /
      tr > '
      var max = 100;
      var a = 1;

      $("#add_category").click(function() {
        if (a <= max) {
          $("#table-field-multiplecategory").append(html);
          a++;
        }
      });
      $("#table-field-multiplecategory").on('click', '#remove_category', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {


      var html = '<tr>\
              <td style="width: 50%;">\
              <label style="font-weight:bold;" class="text-dark">Type</label>\
              <div class="form-outline mb-2">\
                        <select class="form-control text-dark" id="cat_dropdown1" name="examType[]" required>\
                          <option value="" disabled>select category</option>\
                          <option value="mcq">Multiple Choice Question(MCQ)</option>\
                          <option value="true_false">True Or False</option>\
                          <option value="digrame">Diagram Labeling</option>\
                        </select>\
                      </div>\
            </td>\
            <td style="width: 50%;">\
              <label style="font-weight:bold;" class="text-dark">Percenatage</label>\
              <div class="form-outline mb-2">\
                        <input type="number" name="examTypePer[]" placeholder="Percentage" class="form-control form-control-md marks-input typePer" min="0" max="100" value="0" oninput="checkInput(this)" required>\
                        <p class="error-message" style="color: red;"></p>\
                      </div>\
            </td>\
                <td>\
                  <button style="margin:30px;" type="button" name="remove_typecate" id="remove_typecate" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button>\
                </td>\
                      </tr>'
      var max = 100;
      var a = 1;

      $("#add_typecate").click(function() {
        if (a <= max) {
          $("#table-field-multipletypecate").append(html);
          a++;
        }
      });
      $("#table-field-multipletypecate").on('click', '#remove_typecate', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script>

  <script>
    function checkMarks(input) {
      const errorMessage = input.nextElementSibling; // Get the next sibling (error message)
      const value = input.valueAsNumber;
      const marksVal = document.getElementById("total_marks_question").value;

      if (value > marksVal) {
        errorMessage.textContent = 'Minimum Value Will be Less Than Total Marks.';
        input.setCustomValidity('Invalid input');
      } else {
        errorMessage.textContent = '';
        input.setCustomValidity('');
      }
    }
  </script>

  <script>
    // Get references to the input fields and result paragraph
    const startTimeInput = document.getElementById("start-time");
    const endTimeInput = document.getElementById("end-time");
    const result = document.getElementById("result");

    // Function to calculate the duration
    function calculateDuration() {
      // Get the input values
      const startTimeValue = startTimeInput.value;
      const endTimeValue = endTimeInput.value;

      if (startTimeValue && endTimeValue) {
        // Convert the input values to Date objects
        const startTime = new Date(`1970-01-01T${startTimeValue}`);
        const endTime = new Date(`1970-01-01T${endTimeValue}`);

        // Check if the end time is earlier than the start time
        if (endTime < startTime) {
          // Display an error message
          result.textContent = "End time cannot be earlier than start time";
          // Clear the end time input
          endTimeInput.value = "";
        } else {
          // Calculate the time difference in milliseconds
          const durationInMilliseconds = endTime - startTime;

          // Convert milliseconds to hours and minutes
          const hours = Math.floor(durationInMilliseconds / (1000 * 60 * 60));
          const minutes = Math.floor((durationInMilliseconds % (1000 * 60 * 60)) / (1000 * 60));

          // Display the result
          result.textContent = `Duration: ${hours} hours and ${minutes} minutes`;
        }
      } else {
        // Clear the result if either input field is empty
        result.textContent = "";
      }
    }

    // Add input event listener to the start time input field
    startTimeInput.addEventListener("input", calculateDuration);

    // Add input event listener to the end time input field
    endTimeInput.addEventListener("input", calculateDuration);

    // Call calculateDuration initially in case there are default values in the input fields
    calculateDuration();
  </script>

  <script>
    $(document).ready(function() {
      $(".no_question").on("change keyup", function() {
        var inputValue = $(this).val();
        var $marksInput = $(".marks-input");
        var messageDiv = $("#messageDiv");

        $marksInput.off("input"); // Remove previous event handlers

        if (inputValue === "2" || inputValue === "3") {
          $marksInput.on("input", function() {
            var total = 0;

            $marksInput.each(function() {
              var val = parseFloat($(this).val()) || 0;
              total += val;
            });

            if (total > 100) {
              messageDiv.text("You can only input values from 1 to 100 in the " + inputValue + " textbox.");
              $(this).val("0");
            }
          });
        } else if (inputValue === "1") {
          $(".marks-input").on("input", function() {
            var $inputs = $(".marks-input");
            var total = 0;
            var $currentInput = $(this);

            $inputs.not($currentInput).val(0);

            $inputs.each(function() {
              total += parseInt($(this).val());
            });

            if (total > 100) {
              $currentInput.val(100);
            } else if (total < 100) {
              $currentInput.val(100);
            }
          });
        } else {
          $marksInput.on("input", function() {
            var total = 0;

            $marksInput.each(function() {
              var val = parseFloat($(this).val()) || 0;
              total += val;
            });

            if (total > 100) {
              messageDiv.text("You can only input values 100");
              $(this).val("0");
            }
          });
        }
      });
    });
    $(document).ready(function() {
      var count = 0;
      $("#countDisplay").text("Count: " + count);
      $("#countInput").val(count);

      $(":checkbox").change(function() {
        if ($(this).is(":checked")) {
          count++;
        } else {
          count--;
        }


        $("#countInput").val(count);
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#startDate, #endDate").on("change", function() {
        var startDate = new Date($("#startDate").val());
        var endDate = new Date($("#endDate").val());

        if (startDate > endDate) {
          alert("End date cannot be earlier than start date.");
          $("#endDate").val("");
          $("#result").text("Invalid date selection");
        } else {
          var timeDiff = Math.abs(endDate - startDate);
          var daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
          $("#result1").text("Number of days between the selected dates: " + daysDiff);
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $(".no_question").on("change keyup", function() {
        var inputValue = $(this).val();
        var $marksInput = $(".marks-input1");
        var messageDiv = $("#messageDiv1");

        $marksInput.off("input"); // Remove previous event handlers

        if (inputValue === "2" || inputValue === "3" || inputValue === "4") {
          $marksInput.on("input", function() {
            var total = 0;

            $marksInput.each(function() {
              var val = parseFloat($(this).val()) || 0;
              total += val;
            });

            if (total > 100) {
              messageDiv.text("You can only input values 100");
              $(this).val("0");
            }
          });
        } else if (inputValue === "1") {
          $(".marks-input1").on("input", function() {
            var $inputs = $(".marks-input1");
            var total = 0;
            var $currentInput = $(this);

            $inputs.not($currentInput).val(0);

            $inputs.each(function() {
              total += parseInt($(this).val());
            });

            if (total > 100) {
              $currentInput.val(100);
            } else if (total < 100) {
              $currentInput.val(100);
            }
          });
        } else {
          $marksInput.on("input", function() {
            var total = 0;

            $marksInput.each(function() {
              var val = parseFloat($(this).val()) || 0;
              total += val;
            });

            if (total > 100) {
              messageDiv.text("You can only input values from 1 to 100 in the " + inputValue + " textbox.");
              $(this).val("0");
            }
          });
        }
      });
    });
  </script>



  <!-- <script>
function searchQuestions() {
    const searchInput = document.getElementById("searchAllQuestioncate").value.toLowerCase();
    const rows = document.querySelectorAll("#searchAllQuestioncatetable tbody tr");

    rows.forEach(row => {
        const questionText = row.querySelector("td span:nth-child").textContent.toLowerCase();

        if (questionText.includes(searchInput)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}
</script> -->


  <script>
    function searchQuestions() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchAllQuestioncate");
      filter = input.value.toUpperCase();
      table = document.getElementById("searchAllQuestioncatetable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>



  <script>
   function filterByDifficultyAndType() {
  const difficultyFilter = document.getElementById("difficultyFilter");
  const typeFilter = document.getElementById("typeFilter");
  const documentFilter = document.getElementById("documentFilter");
  const categoryFilter = document.getElementById("categoryFilter");
  const selectedDifficulty = difficultyFilter.value;
  const selectedType = typeFilter.value;
  const selectedDocument = documentFilter.value;
  const selectedCategory = categoryFilter.value;

  const rows = document.querySelectorAll("#searchAllQuestioncatetable tbody tr");

  rows.forEach(row => {
    const difficultyElement = row.querySelector(".difficulty");
    const typeElement = row.querySelector(".type");
    const documentElement = row.querySelector(".document");
    const categoryElement = row.querySelector(".category");

    const matchesDifficulty = selectedDifficulty === "all" || difficultyElement.textContent === selectedDifficulty;
    const matchesType = selectedType === "all" || typeElement.textContent === selectedType;
    const matchesDocument = selectedDocument === "all" || documentElement.textContent === selectedDocument;
    const matchesCategory = selectedCategory === "all" || categoryElement.textContent === selectedCategory;

    if (matchesDifficulty && matchesType && matchesDocument && matchesCategory) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
}

  </script>

  <script>
    $(document).ready(function() {
        $("input.bg-soft-secondary").on("input", function() {
            var value = $(this).val().trim();
            if (value !== '' || value != 0) {
                $(this).removeClass("bg-soft-secondary").css("background-color", "white");
            } else if(value == 0) {
                $(this).addClass("bg-soft-secondary").css("background-color", "");
            } else {
                $(this).addClass("bg-soft-secondary").css("background-color", "");
            }
        });
    });
</script>



  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>

</html>