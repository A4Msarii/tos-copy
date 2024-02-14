<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$studentid = $_REQUEST['studentid'];
$classid = $_REQUEST['classid'];
$classname = $_REQUEST['classname'];
$std = $connect->prepare("SELECT * FROM `users` WHERE id=?");
$std->execute([$studentid]);
// $name1 = $std->fetchColumn();
while ($res = $std->fetch()) {
?>
    <hr>
    <div class="d-flex align-items-center">
        <?php

        if ($res['file_name'] != NULL) {
            $uImg = $res['file_name'];
            $fetchuser_image1 = BASE_URL . "includes/Pages/upload/$uImg";
        } else {
            $fetchuser_image1 = BASE_URL . 'includes/Pages/upload/avtar.png';
        }

        ?>
        <div class="avatar avatar-lg avatar-circle">
            <img style="height:50px; width:50px;" class="avatar" src="<?php echo $fetchuser_image1; ?>" alt="Logo" data-hs-theme-appearance="default">
        </div>
        <div class="flex-grow-1 ms-3">
            <h3 class="mb-0 text-dark"><?php echo $res['name']; ?></h3>
            <?php
            if ($classname == "actual") {
                $q = $connect->prepare("SELECT symbol FROM $classname WHERE id=?");
            } else if ($classname == "sim") {
                $q = $connect->prepare("SELECT shortsim FROM $classname WHERE id=?");
            } else if ($classname == "academic") {
                $q = $connect->prepare("SELECT shortacademic FROM $classname WHERE id=?");
            } else if ($classname == "test") {
                $q = $connect->prepare("SELECT shorttest FROM $classname WHERE id=?");
            }
            $q->execute([$classid]);
            $name = $q->fetchColumn();
            ?>
            <span class="card-text text-body"><?php echo $name; ?></span>
        </div>
    </div><hr>
<?php } ?>
<!-- <h5><strong>Student Name : </strong><strong style="color:#4991ec;"><?php echo $res['name']; ?></strong></h5> -->
<div id="preUl" style="margin-left: -10px;">
    <?php
    $fet = "SELECT * FROM prereuisite_data WHERE class_id='$classid' AND class_table='$classname' group by class_id,class_table,id order by id DESC";

    $statement = $connect->prepare($fet);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row1) {
        $class = "btn btn-danger";
        $symbol_id1 = $row1["prereui_id"];
        $table_name1 = $row1["prereui_table"];
        if ($table_name1 == "actual" || $table_name1 == "sim") {
            $fetch_grade1 = $connect->prepare("SELECT id FROM gradesheet where class=? and class_id=? and user_id=?");
            $fetch_grade1->execute([$table_name1, $symbol_id1, $studentid]);
            $grade1 = $fetch_grade1->fetchColumn();
            if ($grade1 == "") {
                $class = "btn btn-danger";
            } elseif ($grade1 != "") {
                $class = "btn btn-success";
            }
        } elseif ($table_name1 == "academic") {
            $get_color = $connect->prepare("SELECT permission FROM acedemic_stu WHERE acedemic_id=? and std_id=?");
            $get_color->execute([$symbol_id1, $studentid]);
            $value_per = $get_color->fetchColumn();
            if ($value_per == '1') {
                $class = "btn btn-success";
            }
        } elseif ($table_name1 == "test") {
            $get_color1 = $connect->prepare("SELECT id FROM test_data WHERE test_id=? and student_id=?");
            $get_color1->execute([$symbol_id1, $studentid]);
            $value_per = $get_color1->fetchColumn();
            if ($value_per != "") {
                $class = "btn btn-success";
            }
        }

        if ($table_name1 == "actual") {
            $q = $connect->prepare("SELECT symbol FROM $table_name1 WHERE id=?");
        } else if ($table_name1 == "sim") {
            $q = $connect->prepare("SELECT shortsim FROM $table_name1 WHERE id=?");
        } else if ($table_name1 == "academic") {
            $q = $connect->prepare("SELECT shortacademic FROM $table_name1 WHERE id=?");
        } else if ($table_name1 == "test") {
            $q = $connect->prepare("SELECT shorttest FROM $table_name1 WHERE id=?");
        }
        $q->execute([$symbol_id1]);
        $name = $q->fetchColumn();
    ?>

        <ul class="preUl" style=" list-style-type: none; display: inline-block;">
            <li style="text-decoration: none;" class="<?php echo $class ?>"><?php echo $name; ?></li>
        </ul>
    <?php }
    ?>
</div>