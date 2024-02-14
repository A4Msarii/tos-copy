<?php
// session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$msg = "";
// $userId = $_SESSION['login_id'];
if (isset($_POST['save'])) {

    $user_id = $_POST['user_id'];

     $school_name = $_REQUEST['school_name'];
    $department_name = $_REQUEST['department_name'];
    $description = $_REQUEST['description'];
    $location = $_REQUEST['location'];
 $contact_number = $_REQUEST['contact_number'];
    $email = $_REQUEST['email'];
    $website = $_REQUEST['website'];
    $additional = $_REQUEST['additional'];
    $File = $_FILES['file'];
    $file_name = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $folder = "department/" . $file_name;
    $fileType = pathinfo($folder, PATHINFO_EXTENSION);
    $date = date("Y-m-d");
    if (!empty($_FILES["file"]["name"])) {
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($file_loc, $folder)) {
                $query_department1 = "INSERT INTO main_department (user_id,department_name) VALUES ('$user_id','$school_name')";
                $statement1 = $connect->prepare($query_department1);
                $statement1->execute();
                $LAST_ID =$connect->lastInsertId();
                $query_department = "INSERT INTO homepage (file_name,uploaded_on,user_id,school_name,department_name,description,location,contact_number,email,website,additional) VALUES ('$file_name','$date','$user_id','$LAST_ID','$department_name','$description','$location','$contact_number','$email','$website','$additional')";
                $statement = $connect->prepare($query_department);
                $statement->execute();
                $_SESSION['success'] = "Data Inserted Successfully";
                header("Location:devision.php");
            } else {
                
                $_SESSION['warning'] = "Error In Adding Data";
                header("Location:start0.php");
            }
        } else {
            
            $_SESSION['warning'] = "Add Image File Type";
            header("Location:start0.php");
        }
    } else {
                $query_department1 = "INSERT INTO main_department (user_id,department_name) VALUES ('$user_id','$school_name')";
                $statement1 = $connect->prepare($query_department1);
                $statement1->execute();
                $LAST_ID =$connect->lastInsertId();
        $query_department = "INSERT INTO homepage (file_name,uploaded_on,user_id,school_name,department_name,description,location,contact_number,email,website,additional) VALUES ('$file_name','$date','$user_id','$LAST_ID','$department_name','$description','$location','$contact_number','$email','$website','$additional')";
        $statement = $connect->prepare($query_department);
        $statement->execute();
        $_SESSION['success'] = "Data Inserted Successfully, But Image Not uploaded";
        header("Location:devision.php");
    }
}

if (isset($_REQUEST['otherDepartment'])) {


    // echo "hello";
    // die();

    $user_id = $_REQUEST['UserId'];

    $school_name = $_REQUEST['school_name'];
    $department_name = $_REQUEST['department_name'];
    $description = $_REQUEST['description'];
    $location = $_REQUEST['location'];
    $contact_number = $_REQUEST['contact_number'];
    $email = $_REQUEST['email'];
    $website = $_REQUEST['website'];
    $additional = $_REQUEST['additional'];
    $File = $_FILES['file'];
    $file_name = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    // $folder = "department/" . $file_name;
    $uploadedImages = array();
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    foreach ($file_loc as $key => $tmpName) {
        $fileName = $file_name[$key];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
            
            $folder = "department/" . $fileName;

            // Move the file to the desired location
            if (move_uploaded_file($tmpName, $folder)) {
                $uploadedImages[] = $fileName;
            }
        }
    }

    $date = date("Y-m-d");
    $name = 0;
    while ($name < count($school_name)) {
        $imgName = $uploadedImages[$name];
        $school_name1 = $school_name[$name];
        $department_name1 = $department_name[$name];
        $description1 = $description[$name];
        $location1 = $location[$name];
        $contact_number1 = $contact_number[$name];
        $email1 = $email[$name];
        $website1 = $website[$name];
        $additional1 = $additional[$name];

        $query_department = "INSERT INTO homepage (file_name,uploaded_on,user_id,school_name,department_name,description,location,contact_number,email,website,additional) VALUES ('$imgName','$date','$user_id','$school_name1','$department_name1','$description1','$location1','$contact_number1','$email1','$website1','$additional1')";

        // echo $query_department;
        // die();

        $statement = $connect->prepare($query_department);
        $statement->execute();
        $name++;
    }
    // die();
    $_SESSION['success'] = "Data Inserted Successfully";
    header("Location:devision.php");
} else {

    $_SESSION['danger'] = "Something Went Wrong";
    header("Location:devision.php");
}
