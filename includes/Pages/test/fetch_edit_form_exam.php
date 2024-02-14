<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$id = $_REQUEST['id'];

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

$q3 = "SELECT * FROM examname where id='$id'";
$st3 = $connect->prepare($q3);
$st3->execute();

if ($st3->rowCount() > 0) {
        $re3 = $st3->fetchAll();
        foreach ($re3 as $row3) {
                if ($row3['exam_created_type'] != "manual") {

?>

                        <input type="hidden" name="examid" class="form-control" value="<?php echo $row3['id'] ?>">
                        <label class="form-label">Exam Name : </label>
                        <input type="text" name="examname" class="form-control" id="examname" value="<?php echo $row3['examName'] ?>">
                        <label class="form-label">Number Of Question : </label>
                        <input type="text" name="question" class="form-control" id="question" value="<?php echo $row3['questionNumber'] ?>">
                        <label class="form-label">Easy : </label>
                        <input type="text" name="easy" class="form-control" id="easy" value="<?php echo $row3['percentageEasy'] ?>">
                        <label class="form-label">Medium : </label>
                        <input type="text" name="medium" class="form-control" id="medium" value="<?php echo $row3['percentageMedium'] ?>">
                        <label class="form-label">Hard : </label>
                        <input type="text" name="hard" class="form-control" id="hard" value="<?php echo $row3['percentageHard'] ?>">
                        <label class="form-label">Very Hard : </label>
                        <input type="text" name="veryhard" class="form-control" id="veryhard" value="<?php echo $row3['percentageveryhard'] ?>">
                        <label class="form-label">Exam Marks : </label>
                        <input type="text" name="exammarks" class="form-control" id="exammarks" value="<?php echo $row3['total_marks'] ?>">
                        <label class="form-label">Passing Marks : </label>
                        <input type="text" name="passmarks" class="form-control" id="passmarks" value="<?php echo $row3['passing_marks'] ?>">
                        <label class="form-label">Date : </label>
                        <input type="date" name="date" class="form-control" id="date" value="<?php echo $row3['dates'] ?>">

                <?php
                }
                if (($row3['exam_created_type'] == "manual")) {
                        $examFor = $row3['examFor'];

                        if ($examFor == "course") {
                                $examNameData = "course";
                        } else if ($examFor == "par") {

                                $examNameData = "Particular user";
                        } else if ($examFor == "dep") {

                                $examNameData = "Department";
                        } else if ($examFor == "everyone") {

                                $examNameData = "Everyone";
                        } else {
                                $examName = $connect->query("SELECT roles FROM roles WHERE id = '$examFor'");
                                $examNameData = $examName->fetchColumn();
                        }
                ?>
                        <input type="hidden" name="examid" class="form-control" value="<?php echo $row3['id'] ?>">
                        <label class="form-label">Exam Name : </label>
                        <input type="text" name="examname" class="form-control" id="examname" value="<?php echo $row3['examName'] ?>">
                        <label class="form-label text-dark" style="font-weight:bold;">Select Role</label>
                        <select class="form-control select_roles_test" name="exam_for" required>
                                <option selected value="<?php echo $examNameData; ?>"><?php echo $examNameData; ?></option>
                                <?php echo $roles_values; ?>
                                <option value="par">particular User</option>
                                <option value="course">Course</option>
                                <option value="everyone">Everyone</option>
                                <option value="dep">Department</option>
                        </select>
                        <div style="display: none;" id="user_idded">
                                <label class="form-label text-dark" style="font-weight:bold;">user name</label>
                                <input type="text" class="form-control" id="username-input" placeholder="Type to search for usernames">
                                <div id="suggestions" style="width:auto; border-radius: 10px;" class="bg-soft-dark">
                                </div>
                        </div>
                        <div id="course" style="display:none">
                                <label class="form-label text-dark" style="font-weight:bold;">Select Course</label>
                                <select class="form-control" name="course_id" id="select_course_test1">
                                        <option value="0" disabled>Select Course</option>
                                        <?php echo $course_name_es; ?>
                                </select>
                        </div>
                        <div id="dep_fetch" style="display:none">
                                <label class="form-label text-dark" style="font-weight:bold;">Select Department Name</label>
                                <select class="form-control" name="exam_dep">
                                        <?php echo $dep_values; ?>
                                </select>
                        </div>
                        <label class="form-label">Number Of Question : </label>
                        <input type="text" name="question" class="form-control" id="question" value="<?php echo $row3['questionNumber'] ?>" readonly>
                        <label class="form-label">Start Time : </label>
                        <input type="time" name="startTime" class="form-control" id="startTime" value="<?php echo $row3['start_hours'] ?>">
                        <label class="form-label">End Time : </label>
                        <input type="time" name="endTime" class="form-control" id="endTime" value="<?php echo $row3['end_hours'] ?>">
                        <label class="form-label">Start Date : </label>
                        <input type="date" name="startDate" class="form-control" id="startDate" value="<?php echo $row3['dates'] ?>">
                        <label class="form-label">End Date : </label>
                        <input type="date" name="endDate" class="form-control" id="endDate" value="<?php echo $row3['end_date'] ?>">
<?php
                }
        }
}
?>