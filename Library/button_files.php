<?php
include('../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['addNewFile'])) {
  $file_ides = $_REQUEST['file_ides'];
  $userId = $_REQUEST['u_ides'];
  $role = $_REQUEST['role'];
  $date = $dt1 = date("Y-m-d");
  $q = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
  $q->execute([$userId]);
  $name = $q->fetchColumn();
  $tempFilePath = $_FILES['fileUpload']['tmp_name'];
  $filename = $_FILES['fileUpload']['name'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  $destination = '../includes/pages/files/' . $filename;
  $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$filename'");
  $dupliData = $dupliQuery->fetchColumn();


  if ($dupliData > 0) {
    $_SESSION['warning'] = "Duplicate File Not Allowed";
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {

    if (move_uploaded_file($tempFilePath, $destination)) {
      $query = "INSERT INTO user_files (filename,type,briefId,folderId,shopid,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy,menu_type,type_id) VALUES ('$filename','$ext','0','0','0','$userId','$role','red','$date','$date','$name','$name','files',$file_ides)";
      $stmt = $connect->prepare($query);
      $stmt->execute();
    }
  }
  $_SESSION['success'] = "File Inserted Successfully";
  header("Location:index.php");
}

if (isset($_REQUEST['addFile'])) {
  $me_id = $_REQUEST['me_id'];
  $me_ty = $_REQUEST['me_ty'];
  $fsid2 = $_REQUEST['fsid2'];

  $name = 0;

  while ($name < count($fsid2)) {
    $fsid21 = $fsid2[$name];

    $updateQuery = "UPDATE user_files SET menu_type = '$me_ty',type_id = '$me_id' WHERE id = '$fsid21'";
    // echo $updateQuery."<br>";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();


    $name++;
  }

  $_SESSION['success'] = "Files Added Successfully";
  // header("Location:index.php");

  if (isset($_GET['returnUrl'])) {
    header("Location: " . $_GET['returnUrl']);
  } else {
    // Default redirection if returnUrl is not set
    header('Location: index.php');
  }
}

if (isset($_REQUEST['driveLink'])) {
  $role = $_SESSION['role'];
  $userId = $_SESSION['login_id'];
  $file_ides = $_REQUEST['file_ides'];
  $newPhaseLinkName = $_REQUEST['phase'];
  $newPhaseLinkLastName = $_REQUEST['phaseName'];
  $date = date("Y-m-d");
  $updatedBy = $_SESSION['nickname'];
  $type = "offline";
  $createdBy = $_SESSION['nickname'];
  $updatedBy = $_SESSION['nickname'];
  if ($role == "super admin") {
    $color = "red";
  } elseif ($role == 'instructor') {
    $color = "yellow";
  } else {
    $color = "blue";
  }
  $menuType = "files";

  if ($newPhaseLinkLastName == '') {
    $string = $newPhaseLinkLastName;
    $substring = substr($string, 0, 10);
    $location = $substring;
  } else {
    $location = $newPhaseLinkLastName;
  }


  $str = str_replace('\\', '\\\\', $newPhaseLinkName);
  $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
  $dupliData = $dupliQuery->fetchColumn();


  if ($dupliData > 0) {
    $_SESSION['warning'] = "Duplicate File Not Allowed";
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {

    $sql = "INSERT INTO user_files (filename, lastName, type, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy,menu_type,type_id) VALUES (:filename, :lastName, :type, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy,:menuType,:typeId)";



    $stmt = $connect->prepare($sql);
    // menu_type,type_id

    $stmt->bindParam(':filename', $str);
    $stmt->bindParam(':lastName', $location);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':createdAt', $date);
    $stmt->bindParam(':updatedAt', $date);
    $stmt->bindParam(':createdBy', $createdBy);
    $stmt->bindParam(':updatedBy', $updatedBy);
    $stmt->bindParam(':menuType', $menuType);
    $stmt->bindParam(':typeId', $file_ides);
    // Execute the statement
    $stmt->execute();

    $_SESSION['success'] = "Link Added Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
  }
}

if (isset($_REQUEST['onlineLink'])) {
  $role = $_SESSION['role'];
  $userId = $_SESSION['login_id'];
  $file_ides = $_REQUEST['file_ides'];
  $newPhaseLinkName = $_REQUEST['link'];
  $newPhaseLinkLastName = $_REQUEST['linkName'];
  $date = date("Y-m-d");
  $updatedBy = $_SESSION['nickname'];
  $type = "online";
  $createdBy = $_SESSION['nickname'];
  $updatedBy = $_SESSION['nickname'];
  if ($role == "super admin") {
    $color = "red";
  } elseif ($role == 'instructor') {
    $color = "yellow";
  } else {
    $color = "blue";
  }
  $menuType = "files";

  // echo $newPhaseLinkLastName;
  // die();

  if ($newPhaseLinkLastName == '') {
    $string = $newPhaseLinkLastName;
    $substring = substr($string, 0, 10);
    $location = $substring;
  } else {
    $location = $newPhaseLinkLastName;
  }

  


  $str = str_replace('\\', '\\\\', $newPhaseLinkName);
  $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
  $dupliData = $dupliQuery->fetchColumn();


  if ($dupliData > 0) {
    $_SESSION['warning'] = "Duplicate File Not Allowed";
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {

    $sql = "INSERT INTO user_files (filename, lastName, type, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy,menu_type,type_id) VALUES (:filename, :lastName, :type, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy,:menuType,:typeId)";

    $stmt = $connect->prepare($sql);
    // menu_type,type_id

    $stmt->bindParam(':filename', $str);
    $stmt->bindParam(':lastName', $location);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':createdAt', $date);
    $stmt->bindParam(':updatedAt', $date);
    $stmt->bindParam(':createdBy', $createdBy);
    $stmt->bindParam(':updatedBy', $updatedBy);
    $stmt->bindParam(':menuType', $menuType);
    $stmt->bindParam(':typeId', $file_ides);
    // $stmt->bindParam(':fileLocation', $fileLoc);

    // Execute the statement
    $stmt->execute();

    $_SESSION['success'] = "Link Added Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
  }
}
