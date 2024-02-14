<?php 

  include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 $cat=$_POST['cat'];
 $ctp=$_POST['ctp'];

$query1 = "SELECT * FROM $cat where ctp='$ctp'";
                   $statement1 = $connect->prepare($query1);
                   $statement1->execute();
                  
                   if($statement1->rowCount() > 0)
                       {
                           $result1 = $statement1->fetchAll();
                           echo '<option value="0" disabled>Select value</option>'; 
                           echo '<option value="all">All</option>';
                            foreach($result1 as $row1)
                        {
                          if($cat == "actual"){
                            echo '<option value="'.$row1['id'].'">'.$row1['symbol'].'</option>';
                          }elseif($cat == "sim"){
                            echo '<option value="'.$row1['id'].'">'.$row1['shortsim'].'</option>';
                          }elseif($cat == "academic"){
                            echo '<option value="'.$row1['id'].'">'.$row1['shortacademic'].'</option>';
                          }elseif($cat == "test"){
                            echo '<option value="'.$row1['id'].'">'.$row1['shorttest'].'</option>';
                          }
                         }

                    }else{
                        echo '<option value="0">no option</option>';
                    }
?>         