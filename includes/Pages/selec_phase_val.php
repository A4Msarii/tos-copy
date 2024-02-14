<?php 

include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');

echo $phase=$_POST['phase'];

$query1 = "SELECT * FROM actual where phase='$phase'";
                   $statement1 = $connect->prepare($query1);
                   $statement1->execute();
                  
                   if($statement1->rowCount() > 0)
                       {
                           $result1 = $statement1->fetchAll();
                           echo '<option value="0" disabled>Select value</option>'; 
                            foreach($result1 as $row1)
                        {
                          echo '<option value="'.$row1['id'].'">'.$row1['symbol'].' - Actual class</option>';
                         }

                    }else{
                        echo '<option value="0">no values in actual</option>';
                    }
                    $query2 = "SELECT * FROM sim where phase='$phase'";
                    $statement2 = $connect->prepare($query2);
                    $statement2->execute();
                   
                    if($statement2->rowCount() > 0)
                        {
                            $result2 = $statement2->fetchAll();
                            // echo '<option value="" readonly selected>Select value</option>'; 
                             foreach($result2 as $row2)
                         {
                           echo '<option value="'.$row2['id'].'">'.$row2['shortsim'].' - Sim class</option>';
                          }
 
                     }else{
                         echo '<option value="0">no values in sim</option>';
                     }
?>         