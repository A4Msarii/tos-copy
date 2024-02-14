<?php 
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

$id=$_POST['id'];
 $query1 = "SELECT * FROM newcourse where Courseid='$id'";
 
$statement1 = $connect->prepare($query1);
                   $statement1->execute();
               
                   if($statement1->rowCount() > 0)
                       {
                           $result1 = $statement1->fetchAll();
                            foreach($result1 as $row1)
                        {
                            $std_id=$row1['CourseName'];
                          

                            $query2 = "SELECT * FROM test where ctp='$std_id'";
                            $statement2 = $connect->prepare($query2);
                            $statement2->execute(); 
                            if($statement2->rowCount() > 0)
                            {
                                $result2 = $statement2->fetchAll();
                                foreach($result2 as $row2)
                                {
                                echo '<option class="nav-link" value="'.$row2['id'].'">'.$row2['shorttest'].'</option>';
                                
                                }
                            }
                      
                        
                    }
                    }else{
                        echo '<option value="0">no test</option>';
                    }
?>          