<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_POST["savelink"])) {
  if (empty($_POST["link"])) {
    
    $_SESSION['warning'] = "Locations Required";
    header("Location:file_management.php");
  } else {
    $countPhase = $_REQUEST['phase'];
    $link = $_POST["link"];
    $name = 0;
    while ($name < count($countPhase)) {
      if ($phaseName[$name] == '') {
        $url = $phase[$name];
        $characters_before_last_slash = substr($url, 0, strrpos($url, '/'));
        $characters_before_last_slash = substr($characters_before_last_slash, strrpos($characters_before_last_slash, '/') + 1);
        $location = $characters_before_last_slash;
      } else {
        $location = $phaseName[$name];
      }
      // check if the necessary form data is present
      if (empty($_POST["id"]) || empty($_POST["location"]) || empty($_POST["type"])) {
        
        $_SESSION['warning'] = "Please fill all required fields";
        header("Location: phase-view.php");
      } else {
        // get the form data
        $id = $_POST['id'];
        $location = $_POST['location'];
        $type = $_POST['type'];

        $value = $phase[$name];


        $stmt = $connect->prepare("INSERT INTO files (`name`,`type`) VALUES (?,?)");
        $stmt->execute([$value, $location]);
        $name++;
      }
      $_SESSION['success'] = "Location Inserted Successfully";
      header("Location:file_management.php");
      // perform database update query
      $itquery = "UPDATE `academic`
                SET `file` = :location, `type` = :type
                WHERE `id` = :id";
      $stmt = $connect->prepare($itquery);
      $stmt->bindParam(':location', $location);
      $stmt->bindParam(':type', $type);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $result = $stmt->execute();

      // check if the update was successful
      if ($result) {
        $_SESSION['success'] = "File Location Updated Successfully";
      } else {
        $_SESSION['danger'] = "Error in uploading file";
      }

      // close statement and database connection
      $stmt->closeCursor();
      $connect = null;

      // redirect back to the form page with the appropriate message
      header("Location: phase-view.php?id=" . $id .);
    }
  }
}
