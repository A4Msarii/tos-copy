<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_REQUEST['updateDep'])) {
    $id = $_REQUEST['id'];
    $user_id = $_REQUEST['uid'];
    $department_name = $_REQUEST['department_name'];
    $description = $_REQUEST['description'];
    $location = $_REQUEST['location'];
    $contact_number = $_REQUEST['contact_number'];
    $email = $_REQUEST['email'];
    $website = $_REQUEST['website'];
    $additional = $_REQUEST['additional'];
    var_dump($id);
    if ($id != "") {
        $updateQuery = "UPDATE main_department SET department_name='$department_name',description='$description',location='$location',
contact_number='$contact_number',email='$email',website='$website',additional='$additional' WHERE id = '$id'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
    } else {
        echo $query_department = "INSERT INTO main_department (user_id,department_name,description,location,contact_number,email,website,additional) 
    VALUES ('$user_id','$department_name','$description','$location','$contact_number','$email','$website','$additional')";
        $statement = $connect->prepare($query_department);
        $statement->execute();
    }
    $_SESSION['success'] = "Data Updated Successfully";
    header("Location:department.php");
}

if (isset($_REQUEST['submitImg'])) {
    $depId = $_REQUEST['depId'];
    $depImg = $_REQUEST['depImg'];
    $date = date("Y-m-d");

    $filename = $_FILES['depImg']['name'];
    $uploadPath = 'department/' . $filename;
    if (move_uploaded_file($_FILES["depImg"]["tmp_name"], $uploadPath)) {
        $query_editor = "UPDATE main_department SET file_name = '$filename',uploaded_on = '$date' WHERE id = '$depId'";
        $statement_editor = $connect->prepare($query_editor);
        $statement_editor->execute();
        $_SESSION['success'] = "File Updated";
        header("Location:department.php");
    }
}
