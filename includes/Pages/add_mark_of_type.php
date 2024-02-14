<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$ctp=$_REQUEST['ctp'];
$type_ids=$_REQUEST['type_ids'];
$marks_of_type=$_REQUEST['marks_of_type'];
$ctp_id_data = "SELECT * FROM ctppage where CTPid='$ctp'";
    $statement = $connect->prepare($ctp_id_data);
    $statement->execute();
    
    if($statement->rowCount() > 0)
        {
            $result = $statement->fetchAll();
            $sn=1;
            foreach($result as $row)
            {
                $total_value=$row['total_mark'];
            }
        }
      
        $marks_sum = "SELECT SUM(`marks`) FROM type_data where NOT id='$type_ids' AND ctp='$ctp' ";
        $statement = $connect->prepare($marks_sum);
        $statement->execute();
        $total = $statement->fetch(PDO::FETCH_NUM); 
        $mark_sum=$total[0];
    
        

        $cal=$total_value-$mark_sum;
            if($marks_of_type>$cal){
            var_dump($cal==0);
            if($cal==0){
                $cal="";
                 
                $_SESSION['danger'] = "Can't Insert Data";
                header("Location:addtype.php?ctp=".$ctp); 
                  }else{
                

                    $_SESSION['danger'] = "You can add $cal percent or below.."; 
                    header("Location:addtype.php?error=ctp=".$ctp);
              }
        }else{
            $query="UPDATE `type_data`
            SET `marks` = '$marks_of_type' WHERE `id`='$type_ids'";
            $statement = $connect->prepare($query);
            $statement->execute();
            

            $_SESSION['success'] = "Data Inserted Successfully";
            header("Location:addtype.php?error=ctp=".$ctp);
        }
?>
