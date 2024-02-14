<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['deleteId'])) {
    $deleteId = $_REQUEST['deleteId'];
 
    $sql1 = "DELETE FROM user_briefcase WHERE brief_id='$deleteId'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $sql2 = "DELETE FROM editor_data WHERE briefId='$deleteId'";
    $statement2 = $connect->prepare($sql2);
    $statement2->execute();

    $sql3 = "DELETE FROM user_files WHERE briefId='$deleteId'";
    $statement3 = $connect->prepare($sql3);
    $statement3->execute();

    $_SESSION['danger'] = "Briefcase Deleted Successfully";
    header("Location:grid_view_brief.php");
}

if (isset($_REQUEST['deleteUserId'])) {
    $deleteId = $_REQUEST['deleteUserId'];

    $sql = "DELETE FROM user_briefcase WHERE id='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql2 = "DELETE FROM editor_data WHERE briefId='$deleteId'";
    $statement2 = $connect->prepare($sql2);
    $statement2->execute();

    $sql3 = "DELETE FROM user_files WHERE briefId='$deleteId'";
    $statement3 = $connect->prepare($sql3);
    $statement3->execute();

    $_SESSION['danger'] = "Briefcase Deleted Successfully";
    header("Location:grid_view_brief.php");
}

if (isset($_REQUEST['deleteUserIddashboard'])) {
    $deleteUserIddashboard= $_REQUEST['deleteUserIddashboard'];

    $sql = "DELETE FROM user_briefcase WHERE id='$deleteUserIddashboard'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql2 = "DELETE FROM editor_data WHERE briefId='$deleteUserIddashboard'";
    $statement2 = $connect->prepare($sql2);
    $statement2->execute();

    $sql3 = "DELETE FROM user_files WHERE briefId='$deleteUserIddashboard'";
    $statement3 = $connect->prepare($sql3);
    $statement3->execute();

    $_SESSION['danger'] = "Briefcase Deleted Successfully";
    header("Location:dashboard_library.php");
}

if (isset($_REQUEST['deleteUserIddashboardadmin'])) {
    $deleteUserIddashboardadmin= $_REQUEST['deleteUserIddashboardadmin'];


    $sql1 = "DELETE FROM user_briefcase WHERE brief_id='$deleteUserIddashboardadmin'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $sql2 = "DELETE FROM editor_data WHERE briefId='$deleteUserIddashboardadmin'";
    $statement2 = $connect->prepare($sql2);
    $statement2->execute();

    $sql3 = "DELETE FROM user_files WHERE briefId='$deleteUserIddashboardadmin'";
    $statement3 = $connect->prepare($sql3);
    $statement3->execute();

    $_SESSION['danger'] = "Briefcase Deleted Successfully";
    header("Location:dashboard_library.php");
}

if (isset($_REQUEST['deleteUserIddetail'])) {
    $deleteUserIddetail= $_REQUEST['deleteUserIddetail'];

    $sql = "DELETE FROM user_briefcase WHERE id='$deleteUserIddetail'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql2 = "DELETE FROM editor_data WHERE briefId='$deleteUserIddetail'";
    $statement2 = $connect->prepare($sql2);
    $statement2->execute();

    $sql3 = "DELETE FROM user_files WHERE briefId='$deleteUserIddetail'";
    $statement3 = $connect->prepare($sql3);
    $statement3->execute();

    $_SESSION['danger'] = "Briefcase Deleted Successfully";
    header("Location:alldetails.php");
}

if(isset($_REQUEST['userBriefID'])){
    $deleteUserIddetail= $_REQUEST['userBriefID'];

    $sql = "DELETE FROM user_briefcase WHERE id='$deleteUserIddetail'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql2 = "DELETE FROM editor_data WHERE briefId='$deleteUserIddetail'";
    $statement2 = $connect->prepare($sql2);
    $statement2->execute();

    $sql3 = "DELETE FROM user_files WHERE briefId='$deleteUserIddetail'";
    $statement3 = $connect->prepare($sql3);
    $statement3->execute();

    $_SESSION['danger'] = "Briefcase Deleted Successfully";
    header("Location:../includes/Pages/file_management.php");
}
?>