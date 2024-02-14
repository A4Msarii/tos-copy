<div>
<?php
                          $pQuery = $connect->query("SELECT * FROM manage_role_course_phase WHERE intructor = '$user_id' OR b_up_manger = '$user_id' GROUP BY courseName,courseCode");
                          while ($pData = $pQuery->fetch()) {
                            $courseCode = $pData['courseCode'];
                            $courseName = $pData['courseName'];
                            $fetchCourseSym = $connect->query("SELECT symbol,color FROM ctppage WHERE CTPid = '$courseName'");
                            $courseSym = $fetchCourseSym->fetch();
                            if ($courseSym['color'] == "") {
                              $CourceColor = "#677788";
                            } else {
                              $CourceColor = $courseSym['color'];
                            }
                            $checkCManager = $connect->query("SELECT count(*) FROM newcourse WHERE CourseName = '$courseName' AND CourseCode = '$courseCode' AND CourseManager = '$user_id'");
                          ?>
                          <div class="col-md-3">
                            <div class="card card-hover-shadow m-1" style="height: fit-content;">
                              <div class="card-header" style="text-align:center;padding:5px;color: white;background:<?php echo $CourceColor; ?> ;">

                                <?php echo $courseSym['symbol'] . "-" . $courseCode; ?>
                                <br>
                                <?php if ($checkCManager->fetchColumn() > 0) {
                                  echo "Course Manager";
                                } ?>
                              </div>
                              <div class="card-body" style="padding: 5px; font-weight:bold;font-size: large;display: flex;">
                                <div class="row">
                                <?php
                                $fetchPhase = $connect->query("SELECT * FROM manage_role_course_phase WHERE courseName = '$courseName' AND courseCode = '$courseCode' AND (intructor = '$user_id' OR b_up_manger = '$user_id') GROUP BY phase_id");
                                while ($fetchPhaseData = $fetchPhase->fetch()) {
                                  $pId = $fetchPhaseData['phase_id'];
                                  $phaseQuery = $connect->query("SELECT phasename,color FROM phase WHERE id = '$pId'");
                                  $phaseQueryData = $phaseQuery->fetch();
                                  if ($phaseQueryData['color'] == "") {
                                    $PhaseColor = "#677788";
                                  } else {
                                    $PhaseColor = $phaseQueryData['color'];
                                  }
                                ?>
                                  <div class="col-md-4 border m-1" style="width:max-content;color:<?php echo $PhaseColor; ?>;font-size: small;">

                                    <?php echo $phaseQueryData['phasename']; ?>

                                  </div>
                                <?php
                                }
                                ?>
                              </div>
                              </div>
                            </div>
                          </div>
                            <?php

                          }
                          $fetchCourseManaCourse = $connect->query("SELECT * FROM newcourse WHERE CourseManager = '$user_id' GROUP BY courseName,courseCode");
                          while ($fetchCourseManaCourseData = $fetchCourseManaCourse->fetch()) {
                            $courseCode = $fetchCourseManaCourseData['CourseCode'];
                            $courseName = $fetchCourseManaCourseData['CourseName'];
                            $checkPhaseManager = $connect->query("SELECT count(*) FROM manage_role_course_phase WHERE intructor = '$user_id' AND courseName = '$courseName' AND courseCode = '$courseCode'");
                            if ($checkPhaseManager->fetchColumn() <= 0) {
                              $fetchCourseSym = $connect->query("SELECT symbol,color FROM ctppage WHERE CTPid = '$courseName'");
                              $courseSym = $fetchCourseSym->fetch();
                              if ($courseSym['color'] == "") {
                                $CourceColor = "#677788";
                              } else {
                                $CourceColor = $courseSym['color'];
                              }
                            ?>
                            <div class="col-md-3">
                              <div class="card card-hover-shadow m-1">
                                <div class="card-header" style="text-align:center;padding:0px;color: white;background:<?php echo $CourceColor; ?> ;">
                                
                                <span><?php echo $courseSym['symbol'] . "-" . $courseCode; ?></span>
                                </div>
                                <span style="background-color:#5c0080;color:white;padding: 1px;margin: 0px;position: relative;font-size: small;text-align: center;" id="co_mana">Course Manager</span>
                                <div class="card-body" style="padding: 5px; font-weight:bold;font-size: large;display: flex;">
                                <img src="<?php echo BASE_URL;?>assets/svg/test/nophase.gif" style="height: 80px;width: 150px;">
                                </div>
                              </div>
                            </div>
                          <?php
                            }
                          }
                          ?>
                          <div style="float:right; margin:5px;">
                        <i style="float: right; font-size:large; padding: 2px 4px 2px 4px;" class="bi bi-arrow-right-short btn btn-sm load-more-btn btn-outline-primary" data-section="<?php echo $sectionIndex; ?>" data-current-page="1"></i>

                    </div>
                        </div>