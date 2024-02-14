<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if(isset($_POST['page_redirection'])){
    $page_redirection = $_POST['page_redirection'];
}
$userId = $_SESSION['login_id'];
// if (isset($_REQUEST['submitfiles'])) {
//     $totalfiles = count($_FILES['file']['name']);

//     $permissionType = $_REQUEST['permissionType'];
//     $permissionUser = $_REQUEST['userId'];

//     for ($i = 0; $i < $totalfiles; $i++) {
//         $filename = $_FILES['file']['name'][$i];
//         $ext = pathinfo($filename, PATHINFO_EXTENSION);
//         $uploadPath = 'files/' . $filename;
//         print_r($filename);
//         if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $uploadPath)) {
//             $stmt = $connect->prepare("INSERT INTO files (name,type) VALUES (?,?)");
//             $stmt->execute([$filename,$ext]);
//             $lastQ = $connect->query("SELECT id FROM files ORDER BY id DESC LIMIT 1");
//             $lastId = $lastQ->fetchColumn();

//             if (isset($permissionUser)) {
//                 // $userId = $_REQUEST['userId'];
//                 $totalUser = count($permissionUser);
//                 $color = "green";
//                 if ($totalUser > 0) {
//                     for ($i = 0; $i < $totalUser; $i++) {
//                         $user_id = $permissionUser[$i];
//                         $query = "INSERT INTO filepermissionsfm (pageId,permissionId,userId,color) VALUES ('$lastId','$userId','$user_id','$color')";
//                         $stmt = $connect->prepare($query);
//                         $stmt->execute();
//                     }
//                 }
//             } else {
//                 if ($permissionType == "All instructor") {
//                     $color = "yellow";
//                 } else {
//                     $color = "blue";
//                 }
//                 $query = "INSERT INTO filepermissionsfm (pageId,permissionId,userId,color) VALUES ('$lastId','$userId','$permissionType','$color')";
//                 $stmt = $connect->prepare($query);
//                 $stmt->execute();
//             }

//         } else {
//             echo 'Error in uploading file - ' . $_FILES['file']['name'][$i] . '<br/>';
//         }
//     }

//     $error = "<div class='alert alert-success'>Files Inserted successfully..</div>";
//     header("Location:file_management.php?error=" . $error);
// }

if (isset($_REQUEST['submitfiles'])) {
    $totalfiles = count($_FILES['file']['name']);
    $briefCase_ID = 0;
    $folder_ID = 0;
    $userId = $_SESSION['login_id'];
    $permissionCategory = $_REQUEST['permissionCategory'];
    // $userBriefcase = $_REQUEST['fileBriefcase'];
    $role = $_SESSION['role'];
    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];

    if ($role == 'instructor' || $role=='instructors') {
        $color = "yellow";
    } elseif ($role == 'student') {
        $color = 'blue';
    } else {
        $color = 'red';
    }

    $permissionType = $_REQUEST['permissionType'];
    if (isset($_REQUEST['userId'])) {
        $permissionUser = $_REQUEST['userId'];
    }

    for ($i = 0; $i < $totalfiles; $i++) {

        $filename = $_FILES['file']['name'][$i];

        $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$filename'");
        $dupliData = $dupliQuery->fetchColumn();

        if ($dupliData >= 1) {
            $_SESSION['danger'] = "Duplicate File Not Allowed";
            if ($page_redirection == "admin") {
                $jsonResponse = json_encode([
                    'message' => $error,
                    'status' => '200'
                  ]);
                  // Set the appropriate response header
                  header('Content-Type: application/json');
                  // Send the JSON response back to the client
                  echo $jsonResponse;
            }
            if ($page_redirection == "user") {
                $jsonResponse = json_encode([
                    'message' => $error,
                    'status' => '200'
                  ]);
                  // Set the appropriate response header
                  header('Content-Type: application/json');
                  // Send the JSON response back to the client
                  echo $jsonResponse;
            }
        } else {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $uploadPath = 'files/' . $filename;
            if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $uploadPath)) {
                $query = "INSERT INTO user_files (filename,type,briefId,folderId,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy) VALUES ('$filename','$ext','$briefCase_ID','$folder_ID','$userId','$role','$color','$date','$date','$createdBy','$updatedBy')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
                $lastId = $lastQ->fetchColumn();

                if (isset($permissionUser)) {
                    // $userId = $_REQUEST['userId'];
                    $totalUser = count($permissionUser);
                    $color = "green";
                    if ($totalUser > 0) {
                        for ($i = 0; $i < $totalUser; $i++) {
                            $user_id = $permissionUser[$i];
                            $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$user_id','$color','$permissionCategory')";
                            $stmt = $connect->prepare($query);
                            $stmt->execute();
                        }
                    }
                } else {
                    if ($permissionType == "All instructor") {
                        $color = "yellow";
                    } else {
                        $color = "blue";
                    }
                    $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$permissionType','$color','$permissionCategory')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                }
            } else {
                echo 'Error in uploading file - ' . $_FILES['file']['name'][$i] . '<br/>';
            }
        }
    }
    $_SESSION['success'] = "Files Inserted Successfully";
    if ($page_redirection == "admin") {
        $jsonResponse = json_encode([
            'message' => $error,
            'status' => '200'
          ]);
          // Set the appropriate response header
          header('Content-Type: application/json');
          // Send the JSON response back to the client
          echo $jsonResponse;
    }
    if ($page_redirection == "user") {
        $jsonResponse = json_encode([
            'message' => $error,
            'status' => '200'
          ]);
          // Set the appropriate response header
          header('Content-Type: application/json');
          // Send the JSON response back to the client
          echo $jsonResponse;
    }
}