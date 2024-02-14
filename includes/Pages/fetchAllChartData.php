<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['percent'])) {
    $percent = $_REQUEST['percent'];
    $courseCode = $_REQUEST['courseCode'];
    $courseName = $_REQUEST['courseName'];
    $totalClass = $_REQUEST['totalClass'];
    $std_course1 = $_REQUEST['ctpId'];
    $phase_ID = $_REQUEST['phaseId'];

    $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$courseCode' AND CourseName = '$courseName'");

    $left = 1;
    while ($selecAllUserData = $selecAllUser->fetch()) {
        $totalCount = 0;
        $progressPerPhase = 0;
        $classesCompleted = 0;
        $totalClassesPerPhase = 0;
        $uID = $selecAllUserData['StudentNames'];
        $classNames = ["actual", "sim"];
        $counter = 0;
        $totalElements = count($classNames);

        while ($counter < $totalElements) {
            $currentData = $classNames[$counter];

            if ($currentData == "actual") {
                $acQ = $connect->query("SELECT * FROM actual WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                while ($acData = $acQ->fetch()) {
                    $acId = $acData['id'];
                    $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='actual' AND class_id='$acId' AND user_id='$uID'");
                    $cdata = $sql->fetchColumn();
                    $totalCount = $totalCount + $cdata;
                }
            }

            if ($currentData == "sim") {
                $acQ = $connect->query("SELECT * FROM sim WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                while ($acData = $acQ->fetch()) {
                    $acId = $acData['id'];
                    $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='sim' AND class_id='$acId' AND user_id='$uID'");
                    $cdata = $sql->fetchColumn();
                    $totalCount = $totalCount + $cdata;
                }
            }

            $counter++;
        }
        $totalClassesPerPhase = $totalClass;
        $classesCompleted = $totalCount;
        if ($totalClassesPerPhase > 0) {
            $progressPerPhase = ($classesCompleted / $totalClassesPerPhase) * 100;
            // echo $progressPerPhase."<br>".$uID;

            // echo $percent;
        }
        if ($progressPerPhase > 100) {
            $progressPerPhase = 100;
        }
        if (floor($progressPerPhase) == floor($percent)) {
            // echo "varun";
            $mainUserImg = $connect->query("SELECT file_name FROM users WHERE id = '$uID'");
            $prof_pic11 = $mainUserImg->fetchColumn();
            $user_data_Fe = $connect->query("SELECT nickname FROM users WHERE id = '$uID'");
            $user_data_Fe_pic = $user_data_Fe->fetchColumn();
            if ($prof_pic11 != "") {
                $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                    $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                } else {
                    $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                }
            } else {
                $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
            // if ($progressPerPhase == 0) {
            //   $l = 22;
            // } else {
            $l = 22;

?>
            <div class="col-1 student fetchClassOfStu" data-ctpid="<?php echo $std_course1; ?>" data-phaseid="<?php echo $phase_ID; ?>" data-stuid="<?php echo $uID; ?>" style="cursor: pointer;">
                <div class="avatar-group avatar-group-lg">
                    <div style="display: grid; margin:2px;" id="study">
                        <img class="avatar avatar-circle avatar-sm" style="margin: 5px;" src="<?php echo $pic11; ?>" alt="Image Description">
                        <span style="margin: 15px;padding: 3px;margin-top: -10px;"><?php echo $user_data_Fe_pic ?></span>
                    </div>
                </div>
            </div>


    <?php
        }
    }
    ?>
    <div class="classChartData">


    </div>
<?php
}

if (isset($_REQUEST['classFetch'])) {
    $std_course1 = $_REQUEST['ctpId'];
    $phase_ID = $_REQUEST['phaseId'];
    $fetchuser_id = $_REQUEST['stuId'];
?>
    <?php
    $classNames = ["Actual", "Sim"];
    $counter = 0;
    $totalElements = count($classNames);
    while ($counter < $totalElements) {
        $currentData = $classNames[$counter];
        $totalCount = 0;

        if ($currentData == "Actual") {
            $checkCountActClass = $connect->query("SELECT count(*) FROM actual WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
            if ($checkCountActClass->fetchColumn() > 0) {

    ?>
                <div class="row">
                    <p style="margin: 5px; font-weight:bold; text-align:center;font-size: large;" class="text-success bg-soft-success">
                        <img style="height:20px; width:25px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Actual_class.png"><?php echo $currentData; ?>
                    </p>

                    <?php
                    $acQ = $connect->query("SELECT * FROM actual WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                    while ($acData = $acQ->fetch()) {
                        $acId = $acData['id'];
                        $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='actual' AND class_id='$acId' AND user_id='$fetchuser_id' AND course_id = '$std_course1' AND phase_id = '$phase_ID' AND over_all_grade IS NOT NULL");
                        $cdata = $sql->fetchColumn();

                        $fetchInst = $connect->query("SELECT instructor FROM `gradesheet` WHERE class='actual' AND class_id='$acId' AND user_id='$fetchuser_id' AND course_id = '$std_course1' AND phase_id = '$phase_ID' AND over_all_grade IS NOT NULL");
                        $fetchInstData = $fetchInst->fetchColumn();
                        $instName = $connect->query("SELECT nickname FROM users WHERE id = '$fetchInstData'");
                        // $cdata = $sql->fetchColumn();
                        $totalCount = $totalCount + $cdata;
                    ?>
                        <div class="col-1 aaayyy" style="display: inline-block;">
                            <h6 title="<?php echo $instName->fetchColumn(); ?>" class="badge bg-soft-secondary rounded-pill text-dark" style="width:auto;">
                                <?php if ($cdata > 0) { ?>
                                    <i class="bi bi-check-circle text-success"></i>
                                <?php } else { ?>
                                    <i class="bi bi-x-circle text-danger"></i>
                                <?php } ?>
                                <?php echo $acData['symbol']; ?>
                            </h6>
                        </div>
                    <?php
                    }
                }
            }

            if ($currentData == "Sim") {
                $checkCountSimClass = $connect->query("SELECT count(*) FROM sim WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                if ($checkCountSimClass->fetchColumn() > 0) {
                    ?>
                    <p style="margin: 5px; font-weight:bold; text-align:center;font-size: large;" class="text-success bg-soft-success">
                        <img style="height:20px; width:25px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Stimulation_Class.png"><?php echo $currentData; ?>
                    </p>

                    <?php
                    $acQ = $connect->query("SELECT * FROM sim WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                    while ($acData = $acQ->fetch()) {
                        $acId = $acData['id'];
                        $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='sim' AND class_id='$acId' AND user_id='$fetchuser_id' AND over_all_grade IS NOT NULL");
                        $cdata = $sql->fetchColumn();
                        $fetchInst = $connect->query("SELECT instructor FROM `gradesheet` WHERE class='sim' AND class_id='$acId' AND user_id='$fetchuser_id' AND course_id = '$std_course1' AND phase_id = '$phase_ID' AND over_all_grade IS NOT NULL");
                        $fetchInstData = $fetchInst->fetchColumn();
                        $instName = $connect->query("SELECT nickname FROM users WHERE id = '$fetchInstData'");
                        $totalCount = $totalCount + $cdata;
                    ?>
                        <div class="col-1 aaayyy" style="display: inline-block;">
                            <h6 title="<?php echo $instName->fetchColumn(); ?>" class="badge bg-soft-secondary rounded-pill text-dark" style="width:auto;">
                                <?php if ($cdata != 0) { ?>
                                    <i class="bi bi-check-circle text-success"></i>
                                <?php } else { ?>
                                    <i class="bi bi-x-circle text-danger"></i>
                                <?php } ?>
                                <?php echo $acData['shortsim']; ?>
                            </h6>
                        </div>
        <?php
                    }
                }
            }

            $counter++;
        }
        ?>
                </div>
            <?php
        }

            ?>