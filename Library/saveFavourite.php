<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['favouriteId'])) {
    if (isset($_REQUEST['colorName'])) {
        $colorName = $_REQUEST['colorName'];
        $favouriteId = $_REQUEST['favouriteId'];

        $checkColorInsert = $connect->query("SELECT COUNT(*) FROM favouritepages WHERE pageId = '$favouriteId' AND favouriteColors = '$colorName' AND userId = '$userId'");
        $data = $checkColorInsert->fetchColumn();
        if ($data == 0) {

            $query_editor = "INSERT INTO favouritepages (favouriteColors,pageId,userId) VALUES ('$colorName','$favouriteId','$userId')";
            $statement_editor = $connect->prepare($query_editor);
            $statement_editor->execute();
            $_SESSION['success']="Page Favourited successfully..";
            header("Location:pageData.php");
        } else {
            $_SESSION['danger']="Can't Insert same favourite color...";
            header("Location:pageData.php?pId=$favouriteId");
        }
    } else {
        $_SESSION['danger']="Some Issues..";
        header("Location:pageData.php?pId=$favouriteId");
    }
}

if (isset($_REQUEST['favouriteFileId'])) {
    if (isset($_REQUEST['colorName'])) {
        $colorName = $_REQUEST['colorName'];
        $favouriteId = $_REQUEST['favouriteFileId'];
        $fileType = $_REQUEST['fileType'];

        $checkColorInsert = $connect->query("SELECT COUNT(*) FROM favouritefiles WHERE fileID = '$favouriteId' AND favouriteColors = '$colorName' AND userId = '$userId'");
        $data = $checkColorInsert->fetchColumn();
        if ($data == 0) {
            $query_editor = "INSERT INTO favouritefiles (favouriteColors,fileId,fileType,userId) VALUES ('$colorName','$favouriteId','$fileType','$userId')";
            $statement_editor = $connect->prepare($query_editor);
            $statement_editor->execute();
            $_SESSION['success']="Favourite color Inserted...";
            header("Location:userUrlPage.php?linkId=$favouriteId");
        } else {
            $_SESSION['danger']="Can't Insert same favourite color...";
            header("Location:userUrlPage.php?linkId=$favouriteId");
        }
    } else {
        $_SESSION['danger']="Some Issues..";
        header("Location:userUrlPage.php?linkId=$favouriteId");
    }
}

if (isset($_REQUEST['favouriteDocxId'])) {
    if (isset($_REQUEST['colorName'])) {
        $colorName = $_REQUEST['colorName'];
        $favouriteId = $_REQUEST['favouriteDocxId'];
        $fileType = $_REQUEST['fileType'];

        $checkColorInsert = $connect->query("SELECT COUNT(*) FROM favouritefiles WHERE fileID = '$favouriteId' AND favouriteColors = '$colorName' AND userId = '$userId'");
        $data = $checkColorInsert->fetchColumn();
        if ($data == 0) {
            $query_editor = "INSERT INTO favouritefiles (favouriteColors,fileId,fileType,userId) VALUES ('$colorName','$favouriteId','$fileType','$userId')";
            $statement_editor = $connect->prepare($query_editor);
            $statement_editor->execute();
            $_SESSION['success']="Favourite color Inserted...";
            header("Location:openpdfpage.php?fileID=$favouriteId");
        } else {
            $_SESSION['danger']="Can't Insert same favourite color...";
            header("Location:openpdfpage.php?fileID=$favouriteId");
        }
    } else {
        $_SESSION['danger']="Some Issues..";
        header("Location:openpdfpage.php?fileID=$favouriteId");
    }
}

// if (isset($_REQUEST['favSubmit'])) {
//     $pageID = $_REQUEST['pageId'];
//     $favColor = $_REQUEST['favColor'];

//     $name = 0;
//     while ($name < count($favColor)) {

//         $value = $favColor[$name];


//         $query_editor = "UPDATE editor_data SET favouriteColor = '$value' WHERE id = '$pageID'";
//         $statement_editor = $connect->prepare($query_editor);
//         $statement_editor->execute();
//         $name++;
//     }
//     $error = "<div class='alert alert-success'>Page Favourited successfully..</div>";
//     header("Location:pageData.php?error=" . $error);
// }
