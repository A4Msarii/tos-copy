<style type="text/css">
    /* Initial style for the elements */
    .studentavatar {
        transition: transform 0.20s ease;
    }

    span {
        transition: font-size 0.20s ease;
    }

    /* Hover effect: enlarge image and name */
    .set_student:hover .studentavatar {
        transform: scale(1.5);
        /* Change the scale value as needed */
        z-index: 1;
    }

    .set_student:hover span {
        font-size: 1.5em;
        /* Change the font size value as needed */
        margin: 2px;
    }
</style>
<?php

include('./connect.php');
include './config.php';
$course = $_POST['course'];
$id = $_POST['ides'];
$query1 = "SELECT * FROM newcourse where CourseCode='$course' and CourseName='$id'"; ?>
<div class="col-12 set_student set_studentall bg-soft-secondary" id="test12_all" data-id="all" style="margin:5px;width: -webkit-fill-available;border-radius: 10px;cursor: pointer;">
    <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo BASE_URL; ?>assets\exam_imag\group_user.png" alt="Image Description">
    <span value="all" style="margin: 5px;">All</span>
</div>
<?php
$statement1 = $connect->prepare($query1);
$statement1->execute();
if ($statement1->rowCount() > 0) {
    $result1 = $statement1->fetchAll();
    foreach ($result1 as $row1) {
        $std_id = $row1['StudentNames'];
        $query2 = "SELECT * FROM users where id='$std_id'";
        $statement2 = $connect->prepare($query2);
        $statement2->execute();
        if ($statement2->rowCount() > 0) {
            $result2 = $statement2->fetchAll();
            foreach ($result2 as $row2) {
?>

                <div style="margin:5px;width: -webkit-fill-available;border-radius: 10px;cursor: pointer;" class="col-12 set_student set_student<?php echo $row2['id']; ?> bg-soft-secondary" data-id="<?php echo $row2['id']; ?>" id="test12_<?php echo $row2['id']; ?>" data-value="varun">
                    <img class="avatar avatar-sm avatar-circle avatar-img studentavatar" src="<?php echo BASE_URL; ?>includes/Pages/upload/<?php echo $row2['file_name'] ?>" alt="Image Description">
                    <span value="<?php echo $row2['id']; ?>" style="margin: 5px;font-weight: bold;" class="text-secondary"><?php echo $row2['nickname']; ?></span>
                </div>

    <?php
            }
        }
    }
} else { ?>
    no student
<?php }
?>