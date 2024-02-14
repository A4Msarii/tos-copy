

<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$userId = $_SESSION['login_id'];
$course = $_POST['course'];
$divisionType = $_REQUEST['divisionType'];
$manual = $_POST['manual'];
$Type = $_POST['Type'];
$VehicleType = $_POST['VehicleType'];
$Sponcors = $_POST['Sponcors'];
$Location = $_POST['Location'];
$symbol = $_POST['symbol'];
$CourseAim = $_POST['CourseAim'];
$ClassSize = $_POST['ClassSize'];
$description = $_POST['description'];
$duration = $_POST['duration'];
$goal = $_POST['goals'];
$vehicleName = $_REQUEST['vehicleName'];
$query1 = "SELECT CTPid FROM ctppage where course='$course'";
$statement1 = $connect->prepare($query1);
$statement1->execute();
$query2 = "SELECT CTPid FROM ctppage where symbol='$symbol'";

$statement2 = $connect->prepare($query2);
$statement2->execute();
if ($statement2->rowCount() > 0) {
  $_SESSION['danger'] = "Course symbol already exist";
  header("Location:ctp.php");
} else if ($statement1->rowCount() > 0) {
  $_SESSION['warning'] = "Course Name Already Exist";
  header("Location:ctp.php");
} else {

    $arrcount=count($goal);
    if($arrcount>0){
    $goal1 = implode(",", $goal);
    }else{
      $goal1=NULL; 
    }
  $sql = "INSERT INTO ctppage (course,symbol,Type,VehicleType,manual,Sponcors,Location,CourseAim,ClassSize,description,duration,goal,divisionType,vehicleName) VALUES ('$course','$symbol','$Type','$VehicleType','$manual','$Sponcors','$Location','$CourseAim','$ClassSize','$description','$duration','$goal1','$divisionType','$vehicleName')";

  $statement = $connect->prepare($sql);

  $statement->execute();
  // die();
  $last_id = $connect->lastInsertId();
  if ($last_id != "") {
    $sql1 = "INSERT INTO sidebar_ctp(ctp_id) VALUES ('$last_id')";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $sql11 = "INSERT INTO shops(shops,ctpId) VALUES ('$course','$last_id')";
    $statement11 = $connect->prepare($sql11);
    $statement11->execute();
    $last_id2 = $connect->lastInsertId();
    $nRows = $connect->query("select count(*) from shelf where library_id='1' and shelf='Course Training Standard'")->fetchColumn();
    if($nRows==0){
        $sql112 = "INSERT INTO shelf(shelf,library_id) VALUES ('Course Training Standard','1')";
        $statement112 = $connect->prepare($sql112);
        $statement112->execute(); 
        $last_id1 = $connect->lastInsertId();
    }else{
        $query3 = "SELECT * FROM shelf where shelf='Course Training Standard' and library_id='1'";
        $statement2 = $connect->prepare($query3);
        $statement2->execute();
        $result2 = $statement2->fetchAll();
        foreach ($result2 as $row8) {
             $last_id1=$row8['id'];
        }
      }
      $sql114 = "INSERT INTO folders(folder) VALUES ('Admin Folder')";
      $statement114 = $connect->prepare($sql114);
      $statement114->execute();
       $last_id7 = $connect->lastInsertId();
       $sql1136 = "INSERT INTO folder_shop_user(folder_id,shelf_id,user_id,shop_id,lib_id) VALUES ('$last_id7','$last_id1','$userId','$last_id2','1')";
       $statement1316 = $connect->prepare($sql1136);
       $statement1316->execute();
       //acedemic folder insert in shop
      $sql1141 = "INSERT INTO folders(folder,ctpId) VALUES ('Academics','$last_id')";
      $statement1141 = $connect->prepare($sql1141);
      $statement1141->execute();
      $last_id8 = $connect->lastInsertId();
      $sql11361 = "INSERT INTO folder_shop_user(folder_id,shelf_id,user_id,shop_id,lib_id) VALUES  ('$last_id8','$last_id1','$userId','$last_id2','1')";
      $statement13161 = $connect->prepare($sql11361);
      $statement13161->execute();
      $sql11 = "INSERT INTO shelf_shop(user_id,shelf_id,shop_id,lib_id) VALUES ('$userId','$last_id1','$last_id2','1')";
      $statement11 = $connect->prepare($sql11);
      $statement11->execute();
  }
  $_SESSION['success'] = "Successfully Added Course Training Plan";
  header("Location:Next-home.php");
}


?>