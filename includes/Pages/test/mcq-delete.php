<?php
include('../../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$id=$_GET["id"];
$sql = "DELETE FROM exam_question WHERE id='" . $_GET["id"] . "'";
$statement = $connect->prepare($sql);

            $statement->execute();
            $_SESSION['danger'] = "Data Deleted Successfully";
            header('Location:../edit_question_answer.php');
?>