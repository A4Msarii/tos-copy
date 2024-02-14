<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$id=$_REQUEST['id'];
$std_id=$_REQUEST['std_id'];
$ctp_ides=$_REQUEST['ctp_ides'];
$query1 = "SELECT * FROM actual where ctp='$ctp_ides'";
$statement1 = $connect->prepare($query1);
$statement1->execute();
$result1 = $statement1->fetchAll();
$snnn=1;
foreach($result1 as $row1)
                {
                    $ides=$row1['id'];
                    $symbol=$row1['symbol'];
                    $query = "SELECT * FROM clone_class where class_id='$ides' and cloned_id='$id' and std_id='$std_id' and class_name='actual'";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                   
                    if($statement->rowCount() <= 0)
                      {
                        echo '
                        <tr>
                        <td><input type="checkbox" name="clone_more_class[]" value="'.$ides.'"></td>
                        <td>'.$snnn++.'</td>
                        <td>'.$symbol.'</td>
                        </tr>
                        ';

                      }

                }
?>
