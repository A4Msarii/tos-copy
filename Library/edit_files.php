<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
// $query_fl="UPDATE `folders`
// SET `folder` = '$folder'
// WHERE `id`='$id'";
// $statement_fl = $connect->prepare($query_fl);
// $statement_fl->execute();

if (isset($_REQUEST['adminFileEdit'])) {
    $file_dashboard = $_FILES['file_dashboard']['name'];
    $fileID = $_REQUEST['pdf_loc_edit_id'];
    // echo $file_dashboard."<br>";
    // echo $fileID;
    // die();
    if (isset($file_dashboard)) {
        $filename = $_FILES['file_dashboard']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
         $uploadPath = '../includes/pages/files/' . $filename;
        // print_r($filename);
        if (move_uploaded_file($_FILES["file_dashboard"]["tmp_name"], $uploadPath)) {
            $query = "UPDATE files SET name = '$filename',type = '$ext' WHERE id = '$fileID'";
            $stmt = $connect->prepare($query);
            $stmt->execute();
            $_SESSION['success'] = "File Updated Successfully";
            header("Location:dashboard_library.php");
        }
    } else {
        $_SESSION['warning'] = "Please Select Any File";
            header("Location:dashboard_library.php");
    }

    echo 'Data inserted successfully';
}

if (isset($_REQUEST['userFileEdit'])) {
    $file_dashboard = $_FILES['file_dashboard']['name'];
    $fileID = $_REQUEST['pdf_loc_edit_id'];
    // echo $file_dashboard."<br>";
    // echo $fileID;
    // die();
    if (isset($file_dashboard)) {
        $filename = $_FILES['file_dashboard']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadPath = '../includes/pages/files/' . $filename;
        // print_r($filename);
        if (move_uploaded_file($_FILES["file_dashboard"]["tmp_name"], $uploadPath)) {
            $query = "UPDATE user_files SET filename = '$filename',type = '$ext' WHERE id = '$fileID'";
            $stmt = $connect->prepare($query);
            $stmt->execute();
            $_SESSION['success'] = "File Updated Successfully";
            header("Location:dashboard_library.php");
        }
    } else {
        
        $_SESSION['warning'] = "Please Select Any File...";
            header("Location:dashboard_library.php");
    }

    echo 'Data inserted successfully';
}

if (isset($_REQUEST['userFileEditdetail'])) {
    $file_dashboard = $_FILES['file_dashboard']['name'];
    $fileID = $_REQUEST['pdf_loc_edit_id'];
    // echo $file_dashboard."<br>";
    // echo $fileID;
    // die();
    if (isset($file_dashboard)) {
        $filename = $_FILES['file_dashboard']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadPath = '../includes/pages/files/' . $filename;
        // print_r($filename);
        if (move_uploaded_file($_FILES["file_dashboard"]["tmp_name"], $uploadPath)) {
            $query = "UPDATE user_files SET filename = '$filename',type = '$ext' WHERE id = '$fileID'";
            $stmt = $connect->prepare($query);
            $stmt->execute();
            $_SESSION['success'] = "File Updated Successfully";
            header("Location:alldetails.php");
        }
    } else {
       
        $_SESSION['warning'] = "Please Select Any File";
            header("Location:alldetails.php");
    }

    echo 'Data inserted successfully';
}
?>