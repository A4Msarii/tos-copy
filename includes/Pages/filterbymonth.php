 <?php
 include('../../includes/config.php');
 include(ROOT_PATH.'includes/connect.php');
                              
                              if(ISSET($_POST['search'])){
                                $date1 = date("Y-m-d", strtotime($_POST['date1']));
                                $date2 = date("Y-m-d", strtotime($_POST['date2']));
                                    
                                            
                                                $query_s = "SELECT * FROM phase where ctp='$std_course1'";
                                                
                                                $statement_s = $connect->prepare($query_s);
                                                $statement_s->execute();
                                                $result_s = $statement_s->fetchAll();
                                                        foreach($result_s as $row)
                                                        {
                                                      $phase_s=$row['id'];
                                                       $query1_s = "SELECT * FROM sim where date(`date`) BETWEEN '$date1' AND '$date2' AND ctp='$std_course1'";
                                                       
                                                            $statement1_s = $connect->prepare($query1_s);
                                                            $statement1_s->execute();  
                                                            $result1_s = $statement1_s->fetchAll();
                                                                foreach($result1_s as $row1){
                                                                 $class_sy_id_s=$row1['id'];?>
                                                                 <h4><span class="legend-indicator bg-danger"></span><?php echo $row1['shortsim']?></h4> 
                                                                 
                                                            
                                                            <?php } ?>
                                                             
                                                 <?php }
                                             }
                            ?>