<?php 

include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');

echo $ctp=$_POST['ctp'];

$query1 = "SELECT * FROM phase where ctp='$ctp'";
                   $statement1 = $connect->prepare($query1);
                   $statement1->execute();
                  
                   if($statement1->rowCount() > 0)
                       {
                           $result1 = $statement1->fetchAll();
                           echo '<option value="0" disabled>Select value</option>';
                           echo '<option value="all">All</option>'; 

                            foreach($result1 as $row1)
                        {
                          echo '<option value="'.$row1['id'].'">'.$row1['phasename'].'</option>';
                         }

                    }else{
                        echo '<option value="0">Select ctp first</option>';
                    }
?>         