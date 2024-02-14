<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    $course_Code = $_REQUEST['courseCode'];
    $course_Name = $_REQUEST['courseName'];
    $c_id = $_REQUEST['courseId'];
    $fetchuser_id = $_REQUEST['userId']; 

                $fetchPhaseDetail = $connect->query("SELECT * FROM manage_role_course_phase WHERE courseName = '$std_course1' AND courseCode = '$course_Code' GROUP BY phase_id,courseName,courseCode");
                if ($fetchPhaseDetail->rowCount() > 0) {
                ?>
                  <div class="row mb-2">
                    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
                      <div class="card-body">
                        <!-- <h6 class="text-success">
                          <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/phaseM.png"> &nbsp;&nbsp;Phase Manager's
                        </h6>
                        <hr style="margin: 10px;margin-top: -5px;"> -->
                        <!-- <hr class="text-dark"> -->
                        <div class="row" id="demoPhase">
                          <?php
                          while ($phaseDetail = $fetchPhaseDetail->fetch()) {
                            $phaseId = $phaseDetail['phase_id'];
                            $instId = $phaseDetail['intructor'];
                            $backupIns = $phaseDetail['b_up_manger'];
                            $fetchPhaseName = $connect->query("SELECT phasename,color FROM phase WHERE id = '$phaseId'");
                            $phaseData = $fetchPhaseName->fetch();
                            if ($phaseData['color'] == "") {
                              $PhaseColor = "gray";
                            } else {
                              $PhaseColor = $phaseData['color'];
                            }
                            $fetchInstName = $connect->query("SELECT nickname FROM users WHERE id = '$instId'");
                            $fetchBackInstName = $connect->query("SELECT nickname FROM users WHERE id = '$backupIns'");
                            // echo  . "-" . $fetchInstName->fetchColumn();
                            // echo "<br>";

                          ?>
                            <!-- <div class="row"> -->
                            <div class="col-md-3 mb-1">
                              <span style="background-color:<?php echo $PhaseColor; ?>;font-size: large;width: 50%;" title="<?php echo $phaseData['phasename']; ?>" class="badge rounded-pill"><?php echo substr($phaseData['phasename'], 0, 15); ?></span> -
                              <span style="font-size:large;font-weight: bold;background-color:#020080;color:white;padding: 5px;border-radius: 5px;"><?php echo $fetchInstName->fetchColumn(); ?> / <?php echo $fetchBackInstName->fetchColumn(); ?></span>

                            </div>
                            <!-- </div> -->
                          <?php
                          }
                          ?>
                        </div>
                      </div>
                    </div>

                    <!-- End Col -->
                  </div>

                <?php } }?>