<?php 

include('connect.php');
$course=$_POST['course'];
$id=$_POST['ides'];
echo $course;
echo $id;
 $query1 = "SELECT * FROM newcourse where CourseCode='$course' and CourseName='$id'";
//  echo $query1;
$statement1 = $connect->prepare($query1);
                   $statement1->execute();
                   echo '<option class="nav-link" value="all">All</option>';
                   if($statement1->rowCount() > 0)
                       {
                           $result1 = $statement1->fetchAll();
                            foreach($result1 as $row1)
                        {
                            $std_id=$row1['StudentNames'];
                          

                            $query2 = "SELECT * FROM users where id='$std_id'";
                            $statement2 = $connect->prepare($query2);
                            $statement2->execute(); 
                            if($statement2->rowCount() > 0)
                            {
                                $result2 = $statement2->fetchAll();
                                foreach($result2 as $row2)
                                {
                                echo '<option class="nav-link" value="'.$row2['id'].'">'.$row2['nickname'].'</option>';
                                // echo '<option class="nav-link" value="'.$row2['id'].'">'.$row2['file_name'].'</option>';
                                }
                            }
                      
                        
                    }
                    }else{
                        echo '<option>no student</option>';
                    }
?>          