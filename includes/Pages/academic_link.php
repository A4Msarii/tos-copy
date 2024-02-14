<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_POST["savelink"])) {
  // check if the necessary form data is present
  if (empty($_POST["id"]) || empty($_POST["link"]) || empty($_POST["type"])) {


    $_SESSION['info'] = "Please fill all required fields.";
    header('Location:phase-view.php');
  } else {
    // get the form data
    $id = $_POST['id'];
    $fileName = $_POST['link'];
    $type = $_POST['type'];

    $role = $_SESSION['role'];
    $userId = $_SESSION['login_id'];

    if ($role == 'instructor') {
      $color = "yellow";
    } elseif ($role == 'student') {
      $color = 'blue';
    } else {
      $color = 'red';
    }
    $permissionType = $_REQUEST['permissionType'];
    $permissionUser = $_REQUEST['userId'];

    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    $permissionCategory = $_REQUEST['permissionCategory'];

    $string = $fileName;
    $substring = substr($string, 0, 10);
    $location = $substring;

    $str = str_replace('\\', '\\\\', $fileName);
    $fileLoc = "academic";
    $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$filename'");
    $dupliData = $dupliQuery->fetchColumn();
    if ($dupliData > 0) {
      $_SESSION['warning'] = "Duplicate File Not Allowed";
      header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {

      $sql = "INSERT INTO user_files (filename, lastName, type, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy, fileLocation) VALUES (:filename, :lastName, :type, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy, :fileLocation)";
      $stmt = $connect->prepare($sql);
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
      $stmt->bindParam(':fileLocation', $fileLoc);
      $stmt->execute();
      $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
      $lastId = $lastQ->fetchColumn();
      $type1 = "user_file";
      $itquery = "UPDATE `academic` SET `file` = :location, `type` = :type WHERE `id` = :id";
      $stmt = $connect->prepare($itquery);
      $stmt->bindParam(':location', $lastId);
      $stmt->bindParam(':type', $type1);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $result = $stmt->execute();

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
    }

    // check if the update was successful
    if ($result) {
      $_SESSION['success'] = "Link Updated Successfully";
    } else {

      $_SESSION['danger'] = "Error updating file location..";
    }

    // close statement and database connection
    $stmt->closeCursor();
    $connect = null;

    // redirect back to the form page with the appropriate message
    header("Location: phase-view.php?id=" . $id . "");
  }
}
