<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    
    $fetchuser_id = $_REQUEST['userId']; 
 if ($fetchuser_id != '0') { ?>
              <?php
              $query = "SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, cloned_id
          FROM (
              SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, NULL as cloned_id
              FROM gradesheet WHERE class = 'actual'
                                    AND course_id = '$std_course1'
                                    AND user_id = '$fetchuser_id'
                                    AND over_all_grade IS NOT NULL
              UNION
              SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, cloned_id
              FROM cloned_gradesheet WHERE class = 'actual'
                                    AND course_id = '$std_course1'
                                    AND user_id = '$fetchuser_id'
                                    AND over_all_grade IS NOT NULL
          ) AS combined_data
          ORDER BY date DESC
          LIMIT 3";
              $statement = $connect->prepare($query);
              $statement->execute();
              if ($statement->rowCount() > 0) {
              ?>
                <td>
                  <?php $result = $statement->fetchAll();
                  $cR = 0;
                  foreach ($result as $row) {

                    if ($cR == 3) {
                      break;
                    }
                    $gradess = $row['over_all_grade'];
                    $gradess_per = $row['over_all_grade_per'];
                    $class_ides = $row['class_id'];
                    $clone_id = $row['cloned_id'];
                    $class_name_fect = $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                    $class_name_fect->execute([$class_ides]);
                    $class_name_fects = $class_name_fect->fetchColumn();
                    $ins_id = $row['instructor'];
                    $sel_ins1 = $connect->prepare("SELECT `nickname` FROM `users` WHERE id=?");
                    $sel_ins1->execute([$ins_id]);
                    $sel_ins_name1 = $sel_ins1->fetchColumn();

                    $codeIdData = $row['gradsheet_status'];

                    $codeName = $connect->prepare("SELECT code FROM `status` WHERE id=?");
                    $codeName->execute([$codeIdData]);
                    $codeNameData = $codeName->fetchColumn();
                    if ($gradess == "U") {
                      $class1 = "btn btn-danger";
                    } elseif ($gradess == "F") {
                      $class1 = "btn btn-warning";
                    } elseif ($gradess == "G") {
                      $class1 = "btn btn-secondary";
                    } elseif ($gradess == "V") {
                      $class1 = "btn btn-success";
                    } elseif ($gradess == "E") {
                      $class1 = "btn btn-primary";
                    } elseif ($gradess == "N") {
                      $class1 = "btn btn-dark";
                    } else {
                      $class1 = "btn btn-dark";
                    }
                    $xString1 = str_repeat("x", $clone_id);
                  ?>
                    <div class="row">
                      <h4 class="btnFlip" style="position: relative;"><span class="legend-indicator bg-danger"></span>
                        <a style="font-weight:bold;" href="newgradesheet.php?id=<?php echo urlencode(base64_encode($class_ides)) ?>&class_name=<?php echo urlencode(base64_encode('actual')) ?>"><?php if ($clone_id != "") {
                                                                                                                                                                                                    echo $class_name_fects . $xString1;
                                                                                                                                                                                                  } else {
                                                                                                                                                                                                    echo $class_name_fects;
                                                                                                                                                                                                  } ?></a>
                        <span class="tooltip-text" class="top1" style="white-space: nowrap;"><?php echo $sel_ins_name1; ?></span>
                      </h4>
                      <div class="col-12">

                        <span style="font-weight:bolder; font-size:larger; width:5%; text-align:center; padding:5px;" class="badge<?php echo $class1 ?>"><?php echo $gradess; ?></span> -

                        <span style="font-weight:bolder; font-size:larger;" class="badge <?php echo $class1; ?>">
                          <i class="bi-graph-up"></i> <?php echo $gradess_per; ?>%
                        </span> -
                        <?php if ($codeNameData != "") { ?>
                          <span style="font-weight:bolder; font-size:larger;color: darkgoldenrod; font-family: cursive; background: #e2e4e6;" class="badge">
                            <span><?php echo $codeNameData; ?></span>
                          </span>
                        <?php } ?>


                        <div class="slidecontainer" style="margin-top:23px;">
                          <progress style="width:100%;" id="file" max="100" value=<?php echo $gradess_per ?>><?php echo $gradess_per ?></progress>

                        </div>
                        <hr>
                      </div>
                    </div>
                  <?php $cR++;
                  }
                  ?>
                </td>
            <?php
              }
            }
          }
            ?>