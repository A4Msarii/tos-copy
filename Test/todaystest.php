<div class="row justify-content-center">
               <!-- Todays test -->
                            <?php 
                           
                              $sql3 = "SELECT en.*, 'role' as data
                             FROM examname AS en
                             INNER JOIN roles AS r ON en.examFor = r.id
                             WHERE r.roles = '$role' AND CURDATE() BETWEEN en.dates AND en.end_date
                             
                             UNION
                             
                             SELECT *, 'par' as data
                             FROM examname
                             WHERE examFor = 'par' AND CURDATE() BETWEEN dates AND end_date
                             
                             UNION
                             
                             SELECT *, 'course' as data
                             FROM examname
                             WHERE examFor = 'course' AND CURDATE() BETWEEN dates AND end_date
                             
                             UNION
                             
                             SELECT *, 'everyone' as data
                             FROM examname
                             WHERE examFor = 'everyone' AND CURDATE() BETWEEN dates AND end_date
                             
                             UNION
                             
                             SELECT *, 'dep' as data
                             FROM examname
                             WHERE examFor = 'dep' AND CURDATE() BETWEEN dates AND end_date;";
                    
               
                        // Execute the query.
                        $statement7 = $connect->prepare($sql3);
                        $statement7->execute(); 
                        $results = $statement7->fetchAll();
                    
                        // Loop through the results. 
                        if($role!="super admin"){
                          $sql1 = "SELECT SUM(cnt) as total_count
               FROM (
                   SELECT COUNT(*) as cnt
                   FROM examname AS en
                   INNER JOIN roles AS r ON en.examFor = r.id
                   WHERE r.roles = '$role' AND CURDATE() BETWEEN en.dates AND en.end_date
                   
                   UNION ALL
                   
                   SELECT COUNT(*) as cnt
                   FROM examname
                   WHERE examFor = 'par' AND CURDATE() BETWEEN dates AND end_date
                   
                   UNION ALL
                   
                   SELECT COUNT(*) as cnt
                   FROM examname
                   WHERE examFor = 'course' AND CURDATE() BETWEEN dates AND end_date
                   
                   UNION ALL
                   
                   SELECT COUNT(*) as cnt
                   FROM examname
                   WHERE examFor = 'everyone' AND CURDATE() BETWEEN dates AND end_date
                   
                   UNION ALL
                   
                   SELECT COUNT(*) as cnt
                   FROM examname
                   WHERE examFor = 'dep' AND CURDATE() BETWEEN dates AND end_date
               ) AS subquery;";
               $result1 = $connect->prepare($sql1);
               $result1->execute();
                $number_of_rows = $result1->fetchColumn();
                        if($number_of_rows>0){

                     
                        foreach ($results as $result) {
                          $number_of_rows151=0;
                           $table_cont=$result['data'];
                           $depatment_id=$result['dep_id'];
                                $bar=$result['id']; 
                               $code_values=$result['code']; 
                               $number_of_rows97=0;
                               $unique_id=0;
                               if($result['exam_Types']=="once"){
                                $sql131 = "SELECT count(*) FROM `test_updates` WHERE exam_id = '$bar' and status_end='1' and user_id='$user_id'";
                                }else{
                                  $check_course_code= "SELECT max(`repeat_id`) as id_count FROM `test_updates` WHERE `user_id`='$user_id' and `exam_id`='$bar' and status_end='1'";
                                 $check_course_codest = $connect->prepare($check_course_code);
                                $check_course_codest->execute();
                                if($check_course_codest->rowCount() > 0)
                                  {
                                      $re = $check_course_codest->fetchAll();
                                      foreach($re as $get_all)
                                      {
                                        $unique_id=$get_all['id_count'];
                                        $unique_id+=1;
                                        $unique_id;
                                      }
                                  }else{
                                    $unique_id;
                                  }
                                  $sql131 = "SELECT count(*) FROM `test_updates` WHERE exam_id = '$bar' and status_end='1' and user_id='$user_id' and exam_status='pass'";
                                }
                                
                                $result131 = $connect->prepare($sql131);
                                $result131->execute();
                                 $number_of_rows97 = $result131->fetchColumn();
                                if($number_of_rows97==0){
                                  if($result['location']=="abu"){
                                    date_default_timezone_set('Asia/Dubai');
                                  }else if($result['location']=="india"){
                                    date_default_timezone_set('Asia/Kolkata');
                                  }else{
                                    date_default_timezone_set('Asia/Dubai');
                                  }
                                  $currentDateTime = new DateTime();
                                  $currentDate = $currentDateTime->format('Y-m-d');
                                $startTime1=$result['start_hours'];
                                $endTime1=$result['end_hours'];
                                $date=$result['dates'];

                                $startDateTime = DateTime::createFromFormat('H:i',$startTime1);
                                $endDateTime = DateTime::createFromFormat('H:i',$endTime1);
                                
                                if ($currentDateTime <= $endDateTime){ 
                               $startTime =new DateTime($result['start_hours']);
                               $endTime=new DateTime($result['end_hours']);
                               
                               $duration = $startTime->diff($endTime);
                               $duration_string_h = $duration->format('%H');
                               $duration_string_i = $duration->format('%I');
                              $sql13 = "SELECT count(*) FROM `exam_question_ist` WHERE exam_id = '$bar'";
                              $result13 = $connect->prepare($sql13);
                              $result13->execute();
                               $number_of_rows13 = $result13->fetchColumn();
                              $sql14 = "SELECT count(*) FROM `studentexam` WHERE examId = '$bar' and examSubject='$user_id'";
                              $result14 = $connect->prepare($sql14);
                              $result14->execute();
                               $number_of_rows14 = $result14->fetchColumn();
                               $sql15 = "SELECT count(*) FROM `userdepartment` WHERE userId = '$user_id' and departmentId='$depatment_id'";
                               $result15 = $connect->prepare($sql15);
                               $result15->execute();
                                $number_of_rows15 = $result15->fetchColumn();
                                $exam_name="";
                            //  var_dump($number_of_rows13>0 && $table_cont=="course");
                              if($number_of_rows13>0 && $table_cont=="role" || $number_of_rows13>0 && $table_cont=="everyone" || $number_of_rows13>0 && $number_of_rows14>0 && $table_cont=="par" || $number_of_rows13>0 && $number_of_rows15>0 && $table_cont=="dep"){
                                $exam_name=$result['examName'];
                              } else if($number_of_rows13>0 && $table_cont=="course"){
                                $coursed_ided=$result['course_id'];
                                $sql = "SELECT CourseName, CourseCode FROM newcourse WHERE Courseid = :course_id";
                                 $stmt = $connect->prepare($sql);
                                 $stmt->bindParam(':course_id', $coursed_ided, PDO::PARAM_INT);
                                 $stmt->execute();
                                 $result1333 = $stmt->fetch(PDO::FETCH_ASSOC);
                                if ($result1333) {
                                     $CourseNamess=$result1333['CourseName'];
                                     $CourseCodess=$result1333['CourseCode'];
                                }
                                $sql15 = "SELECT count(*) FROM `newcourse` WHERE StudentNames = '$user_id' and CourseName ='$CourseNamess' and CourseCode='$CourseCodess'";
                                $result15 = $connect->prepare($sql15);
                                $result15->execute();
                                 $number_of_rows151 = $result15->fetchColumn();
                                 if($number_of_rows151>0){
                                $test_ides=$result['examName'];
                                $test_value = $connect->query("SELECT shorttest FROM test WHERE id = '$test_ides'");
                                $test_value_name = $test_value->fetchColumn();
                                $exam_name=$test_value_name;
                              }
                            }
                            // echo $exam_name;
                            if($number_of_rows13>0 && $table_cont=="role" || $number_of_rows13>0 && $table_cont=="everyone" || $number_of_rows13>0 && $number_of_rows14>0 && $table_cont=="par" || $number_of_rows13>0 && $number_of_rows15>0 && $table_cont=="dep" || $number_of_rows13>0 && $table_cont=="course" && $number_of_rows151>0){
                              ?>
                           
                            <div class="col-md-3 border m-2 p-2 bg-soft-secondary" style="border-radius:5px; cursor: pointer;">
                             <div class="card text-center">
                                <div class="card-header bg-soft-dark" style="padding:10px">
                                
                                  <h1 style="display:flex;text-align: center; justify-content: center;"><?php echo $exam_name; if($result['exam_Types']=="repeat"){
                                    ?>
                                    <img src="<?php echo BASE_URL; ?>assets/exam_imag/repeat1.png" style="width:20px;height:20px;margin-top:5px;">
                                    <?php
                                  }else{
                                    ?>
                                        <img src="<?php echo BASE_URL; ?>assets/exam_imag/once3d.png" style="width:20px;height:20px">
                                       <?php
                                  } ?> </h1>
                                    <label><i class="bi bi-alarm-fill"></i><?php echo $duration_string_h."h :".$duration_string_i."m"; ?></label><br>
                                  <span class="card-title badge rounded-pill bg-success" title="Start Date"><i class="bi bi-calendar-check m-1"></i><?php echo $result['dates']; ?></span>
                                  <span class="card-title badge rounded-pill bg-danger" title="End Date"><i class="bi bi-calendar-check m-1"></i><?php echo $result['end_date']; ?></span>
                                
                                  <br><h5><span class="card-title"><?php echo $result['questionNumber']; ?> Questions</span> - 
                                  <span class="card-title"><?php echo $result['total_marks']; ?> Marks</span></h5>
                                 <?php 
                                  
                                  ?>
                                </div>
                                <hr style="margin: 0px;">
                                <div class="card-body" style="padding:5px">
                                 
                                 <?php 
                                
                                 if ($currentDateTime >= $startDateTime && $currentDateTime <= $endDateTime) {
                                 if($code_values=="yes"){?>
                                  <button type="button" class="btn btn-soft-dark" style="font-weight:bold; font-size:large; border-radius: 20px;width: -webkit-fill-available;padding: 5px;" data-bs-toggle="modal" data-bs-target="#uniccode" onclick="document.getElementById('exma_id').value='<?php echo $result['id'] ?>';document.getElementById('r_id').value='<?php echo $unique_id ?>';">Start Test</button>
                                  <?php }else{ ?>
                                    <a type="button" class="btn btn-soft-dark" style="font-weight:bold; font-size:large; border-radius: 20px;width: -webkit-fill-available;padding: 5px;" href="<?php echo BASE_URL;?>Test/studentpanel/mcqtest.php?id=<?php echo urlencode(base64_encode($result['id'])) ?>&r_id=<?php echo urlencode(base64_encode($unique_id)) ?>">Start Test</a>
                                    <?php }
                                  }else if($currentDateTime >= $endDateTime){
                                    echo "Test Is over";
                                  }else if($currentDateTime <= $startDateTime){
                                    echo "Test time is not started";
                                  }
                                  ?>
                                </div>
                                
                              </div>
                            </div>
                            
                          <?php 
                          }
                        }
                        }
                      }   }else{
                        ?>  <img src="<?php echo BASE_URL ?>assets/svg/exam/notest.gif" style="width:300px; height:300px;margin-top: -120px;margin-bottom: -35px;">
                        <?php 
                      }
                    }
                          ?>
                        


              </div>