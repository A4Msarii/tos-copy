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
                          foreach($result1 as $row1)
                        {
                            $id=$row1['id'];
                            $phase=$row1['phasename'];
                            $query = "SELECT * FROM actual where phase='$id'";
                                $statement2 = $connect->prepare($query);
                                $statement2->execute();
                  
                                    if($statement2->rowCount() > 0)
                                     {
                                    $result2 = $statement2->fetchAll();
                                   
                                    foreach($result2 as $row2)
                                    {
                                    echo '<option value="'.$row2['id'].'" selected>'.$row2['symbol'].', phase[actual]- '.$phase.'</option>';
                                    }
                                }
                     
                                $query3 = "SELECT * FROM sim where phase='$id'";
                                $statement3 = $connect->prepare($query3);
                                $statement3->execute();
                  
                                    if($statement3->rowCount() > 0)
                                     {
                                    $result3 = $statement3->fetchAll();
                                   
                                    foreach($result3 as $row3)
                                    {
                                    echo '<option value="'.$row3['id'].'" selected>'.$row3['shortsim'].', phase[sim]- '.$phase.'</option>';
                                    }
                                }
                         }

                    }else{
                        echo '<option value="0">No value</option>';
                    }
?>         