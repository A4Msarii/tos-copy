<div class="row justify-content-center">
    <div style="display: contents;">
<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['particular'])) {
    $examId = $_REQUEST['examId'];
    $query = $connect->query("SELECT examSubject as student_name FROM `studentexam` WHERE examId ='$examId'");
}

if(isset($_REQUEST['department'])){
    $depId = $_REQUEST['depId'];
    $query = $connect->query("SELECT userId as student_name FROM `userdepartment` WHERE departmentId ='$depId'");
}

if(isset($_REQUEST['role'])){
    $roleVal = $_REQUEST['roleVal'];
    $query = $connect->query("SELECT id as student_name FROM `users` WHERE `role`='$roleVal'");
}

if(isset($_REQUEST['course'])){
    $coursecode = $_REQUEST['coursecode'];
    $coursename = $_REQUEST['coursename'];
    $query = $connect->query("SELECT StudentNames as student_name FROM `newcourse` WHERE CourseName ='$coursename' and CourseCode='$coursecode'");
}

if(isset($_REQUEST['everyone'])){
    $query = $connect->query("SELECT id as student_name FROM `users` WHERE `role`!='super admin'");
}

while ($rowss = $query->fetch()) {
    $insId = $rowss['student_name'];
    $fetchInsDetail = $connect->query("SELECT nickname,file_name FROM users WHERE id = '$insId'");
    $instDData = $fetchInsDetail->fetch();
    $prof_pic11 = $instDData['file_name'];
    if ($prof_pic11 != "") {
        $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $img)) {
            $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
        } else {
            $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
        }
    } else {
        $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
    }
?>
    <div class="col-2" style="background: #f0f8ff85;width: fit-content;margin: 5px;border: 1px solid #71869d36;border-radius: 5px;padding: 5px;box-shadow: 0px 0px 6px 0px grey;text-align: center;display: flex;">
        <div class="avatar avatar-lg avatar-circle" id="avtimg<?php echo $insId; ?>" style="height: 30px; width:30px;">
            <img class="avatar-img" src="<?php echo $img; ?>" alt="Image Description" />
        </div>
        <div class="flex-grow-2 ms-2" style="margin-top: 4px;">
            <h3 class="mb-0 text-danger" style="font-weight:100; font-family: cursive;"><?php echo $instDData['nickname']; ?></h3>
        </div>
    </div>
<?php
}

?>
</div>
</div>