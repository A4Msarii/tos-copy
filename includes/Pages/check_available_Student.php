<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$course=$_POST['courseid'];
 $sele_user = "SELECT * FROM users";

                   $select_query = $connect->prepare($sele_user);
                   $select_query->execute();
                  if($select_query->rowCount() > 0)
                       {
                           $result = $select_query->fetchAll();
                            foreach($result as $row)
                        {
                            $check_id=$row['id'];
                            $select_st = "SELECT * FROM item where item='$check_id' AND course_id='$ctp' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class'";
                            $select_stst = $connect->prepare($select_st);
                            $select_stst->execute();
                            if($select_stst->rowCount() <= 0)
                              {
                                    $query1 = "SELECT * FROM newcourse where Courseid='$course'";
                                    echo $query1;
                                                    $statement1 = $connect->prepare($query1);
                                                    $statement1->execute();
                                                    
                                                    if($statement1->rowCount() > 0)
                                                        {
                                                            $result1 = $statement1->fetchAll();
                                                            echo '<option value="" readonly>Select student</option>'; 
                                                                foreach($result1 as $row1)
                                                            {
                                                                $std_id=$row1['StudentNames'];
                                                                echo $std_id;
                                                                    $er=explode(",",$std_id);
                                                                    foreach($er as $data_array){

                                                                $query2 = "SELECT * FROM users where id='$data_array'";
                                                                $statement2 = $connect->prepare($query2);
                                                                $statement2->execute(); 
                                                                if($statement2->rowCount() > 0)
                                                                {
                                                                    $result2 = $statement2->fetchAll();
                                                                    foreach($result2 as $row2)
                                                                    {
                                                                    echo '<option value="'.$row2['id'].'">'.$row2['name'].'</option>';
                                                                    }
                                                                }
                                                                
                                                            }
                                                        }
                                                        }
                              }
                        }
                    }

?>         