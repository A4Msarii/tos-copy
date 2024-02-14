<?php 
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
         $id=$_REQUEST['id'];
         
         $code=$_REQUEST['code'];

         $query_ad="UPDATE `examname`
        SET `gen_code` = '$code'
        WHERE `id`='$id'";

        $statement_ad = $connect->prepare($query_ad);

                    $statement_ad->execute();
        $_SESSION['success'] = "code created Successfully";

        header('Location:managetest.php');



?>