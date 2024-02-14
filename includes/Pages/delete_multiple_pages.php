<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
if (isset($_REQUEST['id'])) {
  $values = $_POST['values'];
  $id = $_POST['id'];
  $sql = "DELETE FROM editor_data WHERE id='$values'";

  $statement = $connect->prepare($sql);
  $statement->execute();
}

if (isset($_REQUEST['briefId'])) {
  $briefId = $_REQUEST['briefId'];
  $values = $_REQUEST['values'];

  $sql = "DELETE FROM user_briefcase WHERE id='$values'";
  $statement = $connect->prepare($sql);
  $statement->execute();

  $updateQuery = "UPDATE editor_data SET folderId = '0',shopid = '0',briefId = '0' WHERE briefId = '$values'";
  $statement_editor = $connect->prepare($updateQuery);
  $statement_editor->execute();

  $updateQuery1 = "UPDATE user_files SET folderId = '0',shopid = '0',briefId = '0' WHERE briefId = '$values'";
  $statement_editor1 = $connect->prepare($updateQuery1);
  $statement_editor1->execute();
}

if(isset($_REQUEST['folderId'])){
  $folderId = $_REQUEST['folderId'];
  $id = $_REQUEST['id'];

  $sql = "DELETE FROM folders WHERE id='$folderId'";
  $statement = $connect->prepare($sql);
  $statement->execute();

  $updateQuery = "UPDATE editor_data SET folderId = '0',shopid = '0' WHERE folderId = '$folderId'";
  $statement_editor = $connect->prepare($updateQuery);
  $statement_editor->execute();

  $updateQuery1 = "UPDATE user_files SET folderId = '0',shopid = '0' WHERE folderId = '$folderId'";
  $statement_editor1 = $connect->prepare($updateQuery1);
  $statement_editor1->execute();

  $updateQuery2 = "UPDATE user_briefcase SET folderId = '0',shopid = '0' WHERE folderId = '$folderId'";
  $statement_editor2 = $connect->prepare($updateQuery2);
  $statement_editor2->execute();

}

if(isset($_REQUEST['shopId'])){
  $shopId = $_REQUEST['shopId'];
  $id = $_REQUEST['id'];

  $sql = "DELETE FROM shops WHERE id='$shopId'";
  $statement = $connect->prepare($sql);
  $statement->execute();

  $updateQuery = "UPDATE editor_data SET shopid = '0' WHERE shopid = '$shopId'";
  $statement_editor = $connect->prepare($updateQuery);
  $statement_editor->execute();

  $updateQuery1 = "UPDATE user_files SET shopid = '0' WHERE shopid = '$shopId'";
  $statement_editor1 = $connect->prepare($updateQuery1);
  $statement_editor1->execute();

  $updateQuery2 = "UPDATE user_briefcase SET shopid = '0' WHERE shopid = '$shopId'";
  $statement_editor2 = $connect->prepare($updateQuery2);
  $statement_editor2->execute();

  $sql1 = "DELETE FROM folder_shop_user WHERE shop_id = '$shopId'";
  $statement1 = $connect->prepare($sql1);
  $statement1->execute();

  $sql2 = "DELETE FROM shelf_shop WHERE shop_id = '$shopId'";
  $statement2 = $connect->prepare($sql2);
  $statement2->execute();

}
