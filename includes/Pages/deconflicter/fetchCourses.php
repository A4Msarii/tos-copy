<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();

if (isset($_REQUEST['departId'])) {
    $departId = $_REQUEST['departId'];
?>
    <table class="table table-striped table-bordered" id="phasetable">
        <thead class="bg-dark">
            <tr>
                <th class="text-white">Sr No</th>
                <th class="text-white">Course Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fetchCourse = $connect->query("SELECT * FROM newcourse GROUP BY CourseName,CourseCode");
            $sr = 0;
            ?>
            <input type="hidden" name="departmentId" value="<?php echo $departId; ?>" />
            <?php
            while ($fetchCourseData = $fetchCourse->fetch()) {
                $sr++;
                $courseName = $fetchCourseData['CourseName'];
                $courseCode = $fetchCourseData['CourseCode'];
                $checkDepCourse = $connect->query("SELECT count(*) FROM course_in_department WHERE courseCode = '$courseCode' AND courseName = '$courseName'");
                if ($checkDepCourse->fetchColumn() <= 0) {
                    $fetchCtp = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '$courseName'");
            ?>
                    <tr>
                        <td><input type="checkbox" name="courseDetail[]" value="<?php echo $fetchCourseData['Courseid']; ?>" id=""></td>
                        <td><?php echo $fetchCtp->fetchColumn() . " -" . $courseCode; ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
<?php
}

if (isset($_REQUEST['addCourse'])) {
    $departmentId = $_REQUEST['departmentId'];
    $courseDetail = $_REQUEST['courseDetail'];
    $name = 0;

    while ($name < count(($courseDetail))) {
        $courseDetail1 = $courseDetail[$name];

        $fetchCourseDetail = $connect->query("SELECT CourseName,CourseCode FROM newcourse WHERE Courseid = '$courseDetail1'");
        $courseDetails = $fetchCourseDetail->fetch();

        $query = "INSERT INTO course_in_department (departmentId,courseCode,courseName) VALUES ('$departmentId','" . $courseDetails['CourseCode'] . "','" . $courseDetails['CourseName'] . "')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $name++;
    }

    $_SESSION['success'] = "Course Added Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['removeClass'])) {
    $removeClass = $_REQUEST['removeClass'];
    $sql = "DELETE FROM course_in_department WHERE id = '$removeClass'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "Course Removed Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

?>