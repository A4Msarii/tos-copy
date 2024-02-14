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
                            $course_id=$row1['course_id'];
                            $phase_id=$row1['phase_id']; 
                            // $date=$row1['date'];
                            $query2 = "SELECT * FROM gradesheet where phase_id='$phase_id' AND course_id='$course_id' AND class='$class' AND class_id='$class_id' AND user_id=19";
                            $statement = $connect->prepare($query2);
                            $statement->execute();
                           
                            if($statement->rowCount() > 0)
                                {
                                    $result = $statement->fetchAll();
                                
                                     foreach($result as $row)
                                 {
                                    echo '<option value="'.$row['id'].'">'.$row['id'].'</option>'; 
                                 }
                                }  
                        }
                    }else{
                        echo '<option>no class available</option>';
                    }
?> 