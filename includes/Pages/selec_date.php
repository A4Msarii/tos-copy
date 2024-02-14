<?php 
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');

echo $id=$_POST['id'];
$query1 = "SELECT * FROM item where item='$id'";
                   $statement1 = $connect->prepare($query1);
                   $statement1->execute();
                  
                   if($statement1->rowCount() > 0)
                       {
                           $result1 = $statement1->fetchAll();
                           echo '<option value="" readonly>Select class</option>'; 
                            foreach($result1 as $row1)
                        {
                            $class_id=$row1['class_id'];
                            $class=$row1['class'];
                            $query2 = "SELECT class_id, instructor, date
                            FROM gradesheet
                            WHERE date=(
                            SELECT MAX(date) FROM gradesheet WHERE item='$id');";
                            $statement2 = $connect->prepare($query2);
                            $statement2->execute(); 
                            if($statement2->rowCount() > 0)
                            {
                                $result2 = $statement2->fetchAll();
                                foreach($result2 as $row2)
                                {
                                    if($class=="actual"){
                                    echo '<option value="'.$row2['id'].'">symbol :'.$row2['symbol'].' class :'.$class.'</option>';
                                    }else{
                                        echo '<option value="'.$row2['id'].'">symbol :'.$row2['symbol'].' class :'.$class.'</option>';
                                    }
                                }
                            }
                            
                        }
                    }else{
                        echo '<option>no class available</option>';
                    }
?>         