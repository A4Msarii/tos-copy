<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$ctp=$_REQUEST['ctp'];
  
        $outof_marks=$_REQUEST['outof_marks'];
    if($ctp != "" || $outof_marks!=""){
        $query="UPDATE `ctppage`
        SET `total_mark`='$outof_marks' WHERE `CTPid`='$ctp'";
        $statement = $connect->prepare($query);
        $statement->execute();   
        $_SESSION['success'] = "Data Inserted Successfully";
        header("Location:addtype.php?ctp=".$ctp);
        $ctp_id_data = "SELECT * FROM type_data where ctp='$ctp'";
                $statement = $connect->prepare($ctp_id_data);
                $statement->execute();
                
                if($statement->rowCount() > 0)
                    {
                        $result = $statement->fetchAll();
                        $sn=1;
                        foreach($result as $row)
                        {
                            $query="UPDATE `type_data`
                            SET `marks`='0' WHERE `ctp`='$ctp'";
                            $statement = $connect->prepare($query);
                            $statement->execute(); 
                        }
                    }

    }else{
       
        $_SESSION['warning'] = "Some Data Is Missing";
            header("Location:addtype.php?ctp=".$ctp);   
    }

?>
