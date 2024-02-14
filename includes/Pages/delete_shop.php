<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST["id"])) {

  $id = $_REQUEST["id"];
  $page_type = $_REQUEST['page_type'];
  $sql = "DELETE FROM shop_folder WHERE shop_id='$id'";

  $statement = $connect->prepare($sql);
  $statement->execute();

  $sql1 = "DELETE FROM shops WHERE id='$id'";

  $statement1 = $connect->prepare($sql1);
  $statement1->execute();
  $sql2 = "UPDATE user_briefcase SET shopid = '0' WHERE shopid='$id'";
  $statement2 = $connect->prepare($sql2);
  $statement2->execute();

  $query1 = "UPDATE user_files SET shopid = '0' WHERE shopid = '$id'";
  $statement1 = $connect->prepare($query1);
  $statement1->execute();

  $query2 = "UPDATE editor_data SET shopid = '0'WHERE shopid = '$id'";
  $statement2 = $connect->prepare($query2);
  $statement2->execute();

  $shopDel = "DELETE FROM folder_shop_user WHERE shop_id='$id'";
  $shopStatement = $connect->prepare($shopDel);
  $shopStatement->execute();

  $shopShelfDel = "DELETE FROM shelf_shop WHERE shop_id='$id'";
  $shopShelfStatement = $connect->prepare($shopShelfDel);
  $shopShelfStatement->execute();

  $_SESSION['danger'] = "Folder Removed From Shop";
  if ($page_type == "admin") {
    header('Location:file_management.php');
  } else {
    header('Location:../../Library/file_management.php');
  }
}

if (isset($_REQUEST["delete_shop_id"])) {
  $id = $_REQUEST["delete_shop_id"];
  $sql = "DELETE FROM shop_folder WHERE shop_id='$id'";

  $statement = $connect->prepare($sql);
  $statement->execute();

  $sql1 = "DELETE FROM shops WHERE id='$id'";

  $statement1 = $connect->prepare($sql1);
  $statement1->execute();

  $shopDel = "DELETE FROM folder_shop_user WHERE shop_id='$id'";
  $shopStatement = $connect->prepare($shopDel);
  $shopStatement->execute();

  $shopShelfDel = "DELETE FROM shelf_shop WHERE shop_id='$id'";
  $shopShelfStatement = $connect->prepare($shopShelfDel);
  $shopShelfStatement->execute();

  $_SESSION['danger'] = "Folder Removed From Shop";
  header('Location:../../Library/file_management.php');
}

if(isset($_REQUEST['notificationId'])){

  $notificationId = $_REQUEST['notificationId'];

  $notificationDel = "DELETE FROM notifications WHERE id = '$notificationId'";
  $notificationStatement = $connect->prepare($notificationDel);
  $notificationStatement->execute();

  $_SESSION['danger'] = "Notification Deleted Successfully";
  header('Location:Home.php');

}
