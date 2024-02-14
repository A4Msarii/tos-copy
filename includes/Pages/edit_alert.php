<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['editAlert'])) {
    $altId = $_POST['altId'];
    $selectalerttype = $_REQUEST['selectalerttype'];
    $title = $_REQUEST['title'];
    $alertmessage = $_REQUEST['alertmessage'];
    $userid = $_REQUEST['userid'];

    $query = "UPDATE alerttable SET user_id = '$userid', alert_type = '$title', message = '$alertmessage', alertCategory = '$selectalerttype' WHERE id = '$altId'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $_SESSION['success'] = "Data Edited Successfully";
    header('Location:landingpage.php');
}

if(isset($_REQUEST['altertId'])){
    $altertId = $_REQUEST['altertId'];
    $fetchAlt = $connect->query("SELECT * FROM alerttable WHERE id = '$altertId'");
    while($altData = $fetchAlt->fetch()){
        echo '<input type="hidden" name="altId" id="alert_id" class="form-control" value="'. $altData['id'] .'" />';
        echo '<select class="form-control" name="selectalerttype" id="selecttypealert">';
        echo '<option value="'. $altData['alertCategory'] .'">'. $altData['alertCategory'] .'</option>';
        echo '<option value="general">General Announcement/Note to All</option>';
        echo '<option value="warning">Warning</option>';
        echo '<option value="caution">Caution</option>';
        echo '<option value="alert">Alert</option>';
        echo '<option value="remark">Remark</option>';
        echo '<option value="reminder">Reminder</option>';
        echo '<option value="notice">Urgent Notice</option>';
        echo '<option value="update">Update</option>';
        echo '<option value="instruction">Instruction</option>';
        echo '<option value="feedback">Feedback Request</option>';
        echo '<option value="action">Call To Action</option>';
        echo ' <option value="summary">Meeting Summary</option>';
        echo '<option value="report">Status Report</option>';
        echo '<option value="invite">Invitation</option>';
        echo '</select>';
        echo '<label class="form-label" style="color:black;">Alert Title</label>';
        echo '<input type="text" name="title" id="title_name1" class="form-control" value="'. $altData['alert_type'] .'" />';
        echo '<label class="form-label" style="color:black;">Alert Message</label>';
        echo '<textarea type="text" name="alertmessage" id="message_alert" class="form-control">'. $altData['message'] .'</textarea>';
    }
}
