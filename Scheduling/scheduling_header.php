<?php
include(ROOT_PATH.'includes/connect.php');
// for fetching ctp name 
$name_of_ctp = "";
$symbol_name = "";
$course_nickname = "";
$fetch_class_value = "";
$class_name = "";
$std_course1 = " ";
$fetchnickname = "";
$CourseCode11 = "";
$Coursename11 = "";
     $output2="";
     $query2 = "SELECT * FROM newcourse  ORDER BY Courseid ASC";
     $statement2 = $connect->prepare($query2);
     $statement2->execute();
    
     if($statement2->rowCount() > 0)
         {
             $result2 = $statement2->fetchAll();
             
             foreach($result2 as $row2)
             {
              $crs=$row2['CourseName'];
                                $crs_name= $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
                                $crs_name->execute([$crs]);
                                $name_crs = $crs_name->fetchColumn();
              $output2 .= '<option value="'.$row2['Courseid'].'">'.$name_crs.'</option>';
             }
         
         }

 // data according to the role  
session_start();
$username="";
if(isset($_SESSION['nickname']))
{
     $username=$_SESSION['nickname'];
}
if(isset($_SESSION['permission']))
{
     $permission=$_SESSION['permission'];
}
if(isset($_SESSION['role']))
{
     $role=$_SESSION['role'];
}

if(isset($_SESSION['login_id']))
{
     $user_id=$_SESSION['login_id'];
}else{
  $error ="<div class='alert alert-danger'>Please Login Again</div>";
  header("Location:index.php?error=".$error."");
}
if(isset($_SESSION['inst_id']))
{
     $inst_id=$_SESSION['inst_id'];
}
$institute="";
$department="";
// for fetching department name and institute name
$q1 = "SELECT * FROM homepage where user_id=$inst_id";
            $st1 = $connect->prepare($q1);
            $st1->execute();
    
      if($st1->rowCount() > 0){
        $result = $st1->fetchAll();
        foreach($result as $row)
                    {
                        $department=$row['department_name'];
                        $institute=$row['school_name'];
                    }
                  }

 // for fetching user profile pic         

            $profile= $connect->prepare("SELECT file_name FROM `users` WHERE id=?");
            $profile->execute([$user_id]);
            $prof_pic = $profile->fetchColumn();
            if($prof_pic!=null){
              $pic= BASE_URL.'upload/'.$prof_pic;
            }else{
              $pic= BASE_URL.'upload/avtar.png';
            }

          

            $icon="";
            $fetched_per="";


            // notification for instructor to fill gradesheet and unlock gradesheet
            $fetched_per2="";
            $fetch_noti2= "SELECT * FROM notifications where is_read='0' AND to_userid='$user_id' and type!='message' and extra_data!='threshold' and extra_data!='reached_cout'";
            
            $fetch_noti2st2 = $connect->prepare($fetch_noti2);
            $fetch_noti2st2->execute();
            
             if($fetch_noti2st2->rowCount() > 0)
                 {
                     $re3 = $fetch_noti2st2->fetchAll();
                   foreach($re3 as $row3)
                     {
                     
                      $msg=$row3['extra_data'];
                      //notification asked for
                      $selected_user=$row3['user_id'];
                      $fetch_name_of_selected= $connect->prepare("SELECT name FROM `users` WHERE id=?");
                      $fetch_name_of_selected->execute([$selected_user]);
                      $of_user_id = $fetch_name_of_selected->fetchColumn();
                      //for whic class
                       $table_name_ofdata=$row3['type'];
                      
                      if($table_name_ofdata=="actual"){
                        $fetch_class_value= $connect->prepare("SELECT symbol FROM $table_name_ofdata WHERE id=?");
                      }else if($table_name_ofdata=="sim"){
                        $fetch_class_value= $connect->prepare("SELECT shortsim FROM $table_name_ofdata WHERE id=?");
                       }else if($table_name_ofdata=="academic"){
                        $fetch_class_value= $connect->prepare("SELECT shortacademic FROM $table_name_ofdata WHERE id=?");
                }
                      $id_of_data=$row3['data'];
                      $fetch_class_value->execute([$id_of_data]);
                       $class_name = $fetch_class_value->fetchColumn();
                      $for_userid1=$row3['to_userid']; 
                      $fetch_std_name1= $connect->prepare("SELECT name FROM `users` WHERE id=?");
                      $fetch_std_name1->execute([$for_userid1]);
                      $std_name1 = $fetch_std_name1->fetchColumn();
                     $noti_id=$row3['id'];
                     $extra_data=$row3['extra_data'];
                     $cloned_ides=$row3['permission'];
                    if($extra_data=="is selected to fill gradsheet of" || $extra_data=="You requested gradsheet is unlock for"){
                      $fetched_per2.='
                      <a href="gradesheet.php?id='.urlencode(base64_encode($id_of_data)).'&class_name='.urlencode(base64_encode($table_name_ofdata)).'&std_id='.$selected_user.'&noti_id='.$noti_id.'">
                      <ul class="list-group list-group-flush navbar-card-list-group">
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                  <label class="form-check-label" for="notificationCheck1"></label>
                                </div>
                             </div>
                            </div>
                            <div class="col ms-n2">
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">'.$std_name1.'</span> '.$msg.'<span class="text-danger" style="text-decoration:underline;"> '.$class_name.'</span> for <span class="text-danger" style="text-decoration:underline;">'.$of_user_id.'</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row3['date'])).'</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>';
      // notification for to give academic class
                     }elseif($extra_data=="is requesting you to give acedemic for"){
                      $fetched_per2.='
                      <a data-bs-toggle="modal" id="'.$noti_id.'" class="noti_anchor" data-bs-target="#acedemic_modal">
                      <ul class="list-group list-group-flush navbar-card-list-group">
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                  <label class="form-check-label" for="notificationCheck1"></label>
                                </div>
                             </div>
                            </div>
                            <div class="col ms-n2">
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">'.$of_user_id.'</span> '.$msg.' <span class="text-danger" style="text-decoration:underline;">'.$class_name.'</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row3['date'])).'</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>';
                     }else if($extra_data=="cloned_gradsheet"){
                      $fetched_per2.='
                      <a href="cloned_gradsheet.php?id='.urlencode(base64_encode($id_of_data)).'&class_name='.urlencode(base64_encode($table_name_ofdata)).'&std_id='.$selected_user.'&noti_id='.$noti_id.'&clone_ides='.urlencode(base64_encode($cloned_ides)).'">
                      <ul class="list-group list-group-flush navbar-card-list-group">
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                  <label class="form-check-label" for="notificationCheck1"></label>
                                </div>
                             </div>
                            </div>
                            <div class="col ms-n2">
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">'.$std_name1.'</span> is selected to fill repeat gradsheet for <span class="text-danger" style="text-decoration:underline;">'.$class_name.'- C'.$cloned_ides.'</span> for <span class="text-danger" style="text-decoration:underline;">'.$of_user_id.'</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row3['date'])).'</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>';
                     }else if($extra_data=="clone_unlock_request"){
                      $fetched_per2.='
                      <a href="cloned_gradsheet.php?id='.urlencode(base64_encode($id_of_data)).'&class_name='.urlencode(base64_encode($table_name_ofdata)).'&std_id='.$selected_user.'&noti_id='.$noti_id.'&clone_ides='.urlencode(base64_encode($cloned_ides)).'">
                      <ul class="list-group list-group-flush navbar-card-list-group">
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                  <label class="form-check-label" for="notificationCheck1"></label>
                                </div>
                             </div>
                            </div>
                            <div class="col ms-n2">
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">'.$std_name1.'</span> You requested gradsheet is unlock for<span class="text-danger" style="text-decoration:underline;"> '.$class_name.' -C'.$cloned_ides.'</span> for <span class="text-danger" style="text-decoration:underline;">'.$of_user_id.'</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row3['date'])).'</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>';
                     }
                    }    
                 $icon='<span class="btn-status btn-sm-status btn-status-danger"></span>';
                 }else{
                  // $fetched_per.='<li>No New Notification</li>';
                  // $icon='<span></span>';
                 } 
           


                 $fetched_per3="";
                 $fetch_noti3= "SELECT * FROM notifications where is_read='0' AND if_admin='$role' and extra_data!='threshold' and extra_data!='reached_cout'";
                 
                 $fetch_noti3st2 = $connect->prepare($fetch_noti3);
                 $fetch_noti3st2->execute();
                 
                  if($fetch_noti3st2->rowCount() > 0)
                      {
                          $re4 = $fetch_noti3st2->fetchAll();
                        foreach($re4 as $row4)
                          {
                            $if_admin=$row4['if_admin'];
                           //msg
                            $msg=$row4['extra_data'];
                           //notification asked for
                           $selected_user=$row4['user_id'];
                           $fetch_name_of_selected= $connect->prepare("SELECT name FROM `users` WHERE id=?");
                           $fetch_name_of_selected->execute([$selected_user]);
                           $of_user_id = $fetch_name_of_selected->fetchColumn();
                           //for whic class
                           $table_name_ofdata=$row4['type'];
                           $id_of_data=$row4['data'];
                           if($table_name_ofdata=="actual"){
                             $fetch_class_value= $connect->prepare("SELECT symbol FROM $table_name_ofdata WHERE id=?");
                           }else if($table_name_ofdata=="sim"){
                             $fetch_class_value= $connect->prepare("SELECT shortsim FROM $table_name_ofdata WHERE id=?");
                            }else if($table_name_ofdata=="academic"){
                              $fetch_class_value= $connect->prepare("SELECT shortacademic FROM $table_name_ofdata WHERE id=?");
                      }
                           $fetch_class_value->execute([$id_of_data]);
                           $class_name = $fetch_class_value->fetchColumn();
                           $for_userid1=$row4['to_userid']; 
                           $fetch_std_name1= $connect->prepare("SELECT name FROM `users` WHERE id=?");
                           $fetch_std_name1->execute([$for_userid1]);
                           $std_name1 = $fetch_std_name1->fetchColumn();
                          $noti_id=$row4['id'];
                          $extra_data=$row4['extra_data'];
                          $cloned_ides=$row4['permission'];
                        if($extra_data=="requesting to unlock"){
                           $fetched_per3.='
                           <a href="gradesheet.php?id='.urlencode(base64_encode($id_of_data)).'&class_name='.urlencode(base64_encode($table_name_ofdata)).'&std_id='.$selected_user.'&noti_id='.$noti_id.'">
                           <ul class="list-group list-group-flush navbar-card-list-group">
                             <li class="list-group-item form-check-select">
                               <div class="row">
                                 <div class="col-auto">
                                   <div class="d-flex align-items-center">
                                     <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                       <label class="form-check-label" for="notificationCheck1"></label>
                                     </div>
                                  </div>
                                 </div>
                                 <div class="col ms-n2">
                                   <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">'.$std_name1.'</span> Asking for unlock <span class="text-danger" style="text-decoration:underline;">'.$class_name.'</span> for <span class="text-danger" style="text-decoration:underline;">'.$of_user_id.'</span></h5>
                                   <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row4['date'])).'</i></small>
                                   </div>
                                 </div>
                               </li>
                             </ul>
                                  </a>';
                        }else if($extra_data=="cloned delete ask"){
                          $fetched_per3.='
                          <a href="actual.php?noti_id='.urlencode(base64_encode($noti_id)).'">
                          <ul class="list-group list-group-flush navbar-card-list-group">
                            <li class="list-group-item form-check-select">
                              <div class="row">
                                <div class="col-auto">
                                  <div class="d-flex align-items-center">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                      <label class="form-check-label" for="notificationCheck1"></label>
                                    </div>
                                 </div>
                                </div>
                                <div class="col ms-n2">
                                  <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">'.$std_name1.'</span> Asking for Delete Cloned Class <span class="text-danger" style="text-decoration:underline;">'.$class_name.'</span> for <span class="text-danger" style="text-decoration:underline;">'.$of_user_id.'</span></h5>
                                  <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row4['date'])).'</i></small>
                                  </div>
                                </div>
                              </li>
                            </ul>
                                 </a>';
                        }if($extra_data=="requesting_unlock"){
                          $fetched_per3.='
                      <a href="cloned_gradsheet.php?id='.urlencode(base64_encode($id_of_data)).'&class_name='.urlencode(base64_encode($table_name_ofdata)).'&std_id='.$selected_user.'&noti_id='.$noti_id.'&clone_ides='.urlencode(base64_encode($cloned_ides)).'">
                         <ul class="list-group list-group-flush navbar-card-list-group">
                            <li class="list-group-item form-check-select">
                              <div class="row">
                                <div class="col-auto">
                                  <div class="d-flex align-items-center">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                      <label class="form-check-label" for="notificationCheck1"></label>
                                    </div>
                                 </div>
                                </div>
                                <div class="col ms-n2">
                                  <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">'.$std_name1.'</span> Asking for unlock <span class="text-danger" style="text-decoration:underline;">'.$class_name.' -C'.$cloned_ides.'</span> for <span class="text-danger" style="text-decoration:underline;">'.$of_user_id.'</span></h5>
                                  <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row4['date'])).'</i></small>
                                  </div>
                                </div>
                              </li>
                            </ul>
                                 </a>';
                        }

                          
                         }    
                      $icon='<span class="btn-status btn-sm-status btn-status-danger"></span>';
                      }else{
                       // $fetched_per.='<li>No New Notification</li>';
                       // $icon='<span></span>';
                      }
                      
// notification for message
                      $fetched_per4="";
                      $fetch_noti4= "SELECT * FROM notifications where is_read='0' AND type='message' and to_userid='$user_id' and extra_data!='threshold' and extra_data!='reached_cout'";
                      
                      $fetch_noti4st2 = $connect->prepare($fetch_noti4);
                      $fetch_noti4st2->execute();
                      
                       if($fetch_noti4st2->rowCount() > 0)
                           {
                               $re4 = $fetch_noti4st2->fetchAll();
                             foreach($re4 as $row4)
                               {

                               $for_userid1=$row4['user_id']; 
                                $fetch_std_name1= $connect->prepare("SELECT name FROM `users` WHERE id=?");
                                $fetch_std_name1->execute([$for_userid1]);
                                $std_name1 = $fetch_std_name1->fetchColumn();
                            
                                $fetched_per4.='
                                <a id="'.$row4['id'].'" class="get_id_of_noti">
                                <ul class="list-group list-group-flush navbar-card-list-group">
                                  <li class="list-group-item form-check-select">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                            <label class="form-check-label" for="notificationCheck1"></label>
                                          </div>
                                       </div>
                                      </div>
                                      <div class="col ms-n2">
                                       
                                      <h5 class="text-body text-dark">You Have Message From <span class="text-danger" style="text-decoration:underline;">'.$std_name1.'</span></h5>
                                        <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row4['date'])).'</i></small>
                                        <button style="float:right;" class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#view_msg">View</button>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                       </a>';
                               
                              }    
                           $icon='<span class="btn-status btn-sm-status btn-status-danger"></span>';
                           }else{
                            // $fetched_per.='<li>No New Notification</li>';
                            // $icon='<span></span>';
                           } 
                           $fetched_per15="";
                           $fetch_noti15= "SELECT * FROM notifications where is_read='0' and to_userid='$user_id' and extra_data='threshold'";
                           
                           $fetch_noti15st2 = $connect->prepare($fetch_noti15);
                           $fetch_noti15st2->execute();
                           
                            if($fetch_noti15st2->rowCount() > 0)
                                {
                                    $re15 = $fetch_noti15st2->fetchAll();
                                  foreach($re15 as $row15)
                                    {
                                     $data_id=$row15['data'];
                                     $selected_user1=$row15['user_id'];
                                     $extra_data=$row15['extra_data'];
                                     $fetch_name_of_selected1= $connect->prepare("SELECT name FROM `users` WHERE id=?");
                                     $fetch_name_of_selected1->execute([$selected_user1]);
                                     $of_user_id1 = $fetch_name_of_selected1->fetchColumn();
                                    $fetch_warning_name= $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
                                     $fetch_warning_name->execute([$data_id]);
                                     $warning_name = $fetch_warning_name->fetchColumn();
         
                                     if($extra_data=="threshold"){
                                       $fetched_per15.='
                                       <a>
                                       <ul class="list-group list-group-flush navbar-card-list-group">
                                         <li class="list-group-item form-check-select">
                                           <div class="row">
                                             <div class="col-auto">
                                               <div class="d-flex align-items-center">
                                                 <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                                   <label class="form-check-label" for="notificationCheck1"></label>
                                                 </div>
                                              </div>
                                             </div>
                                             <div class="col ms-n2">
                                               <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">'.$of_user_id1.'</span> Is about to reach <span class="text-danger" style="text-decoration:underline;">'.$warning_name.'</span></h5>
                                               <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row15['date'])).'</i></small>
                                               </div>
                                             </div>
                                           </li>
                                         </ul>
                                              </a>';
                                     }
                                   }    
                                $icon='<span class="btn-status btn-sm-status btn-status-danger"></span>';
                                }else{
                                 // $fetched_per.='<li>No New Notification</li>';
                                 // $icon='<span></span>';
                                } 
                          $fetched_per11="";
                          $fetch_noti11= "SELECT * FROM notifications where is_read='0' and to_userid='$user_id' and extra_data='reached_cout'";
                          
                          $fetch_noti11st2 = $connect->prepare($fetch_noti11);
                          $fetch_noti11st2->execute();
                          
                           if($fetch_noti11st2->rowCount() > 0)
                               {
                                   $re11 = $fetch_noti11st2->fetchAll();
                                 foreach($re11 as $row11)
                                   {
                                    $data_id=$row11['data'];
                                    $selected_user1=$row11['user_id'];
                                    $extra_data=$row11['extra_data'];
                                    $fetch_name_of_selected1= $connect->prepare("SELECT name FROM `users` WHERE id=?");
                                    $fetch_name_of_selected1->execute([$selected_user1]);
                                    $of_user_id1 = $fetch_name_of_selected1->fetchColumn();
                                    
                                    $fetch_warning_name= $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
                                    $fetch_warning_name->execute([$data_id]);
                                    $warning_name = $fetch_warning_name->fetchColumn();
                                    if($extra_data=="reached_cout"){
                                      $fetched_per11.='
                                      <a>
                                      <ul class="list-group list-group-flush navbar-card-list-group">
                                        <li class="list-group-item form-check-select">
                                          <div class="row">
                                            <div class="col-auto">
                                              <div class="d-flex align-items-center">
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                                  <label class="form-check-label" for="notificationCheck1"></label>
                                                </div>
                                             </div>
                                            </div>
                                            <div class="col ms-n2">
                                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">'.$of_user_id1.'</span> Has reached to <span class="text-danger" style="text-decoration:underline;">'.$warning_name.'</span></h5>
                                              <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row11['date'])).'</i></small>
                                              </div>
                                            </div>
                                          </li>
                                        </ul>
                                             </a>';
                                    }
                                  }    
                               $icon='<span class="btn-status btn-sm-status btn-status-danger"></span>';
                               }else{
                                // $fetched_per.='<li>No New Notification</li>';
                                // $icon='<span></span>';
                               } 
                               $fetched_per17="";
                               $fetch_noti17= "SELECT * FROM notifications where is_read='0' and if_admin='$role' and extra_data='threshold'";
                               
                               $fetch_noti17st2 = $connect->prepare($fetch_noti17);
                               $fetch_noti17st2->execute();
                               
                                if($fetch_noti17st2->rowCount() > 0)
                                    {
                                        $re17 = $fetch_noti17st2->fetchAll();
                                      foreach($re17 as $row17)
                                        {
                                         $data_id=$row17['data'];
                                         $selected_user1=$row17['user_id'];
                                         $extra_data=$row17['extra_data'];
                                         $fetch_name_of_selected1= $connect->prepare("SELECT name FROM `users` WHERE id=?");
                                         $fetch_name_of_selected1->execute([$selected_user1]);
                                         $of_user_id1 = $fetch_name_of_selected1->fetchColumn();
                                         
                                         $fetch_warning_name= $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
                                         $fetch_warning_name->execute([$data_id]);
                                         $warning_name = $fetch_warning_name->fetchColumn();
                                         if($extra_data=="reached_cout"){
                                           $fetched_per17.='
                                           <a>
                                           <ul class="list-group list-group-flush navbar-card-list-group">
                                             <li class="list-group-item form-check-select">
                                               <div class="row">
                                                 <div class="col-auto">
                                                   <div class="d-flex align-items-center">
                                                     <div class="form-check">
                                                       <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                                       <label class="form-check-label" for="notificationCheck1"></label>
                                                     </div>
                                                  </div>
                                                 </div>
                                                 <div class="col ms-n2">
                                                   <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">'.$of_user_id1.'</span> Has reached to <span class="text-danger" style="text-decoration:underline;">'.$warning_name.'</span></h5>
                                                   <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row17['date'])).'</i></small>
                                                   </div>
                                                 </div>
                                               </li>
                                             </ul>
                                                  </a>';
                                         }
                                       }    
                                    $icon='<span class="btn-status btn-sm-status btn-status-danger"></span>';
                                    }else{
                                     // $fetched_per.='<li>No New Notification</li>';
                                     // $icon='<span></span>';
                                    } 
                               $fetched_per16="";
                               $fetch_noti16= "SELECT * FROM notifications where is_read='0' and if_admin='$role' and extra_data='reached_cout'";
                               
                               $fetch_noti16st2 = $connect->prepare($fetch_noti16);
                               $fetch_noti16st2->execute();
                               
                                if($fetch_noti16st2->rowCount() > 0)
                                    {
                                        $re16 = $fetch_noti16st2->fetchAll();
                                      foreach($re16 as $row16)
                                        {
                                         $data_id=$row16['data'];
                                         $selected_user1=$row16['user_id'];
                                         $extra_data=$row16['extra_data'];
                                         $fetch_name_of_selected1= $connect->prepare("SELECT name FROM `users` WHERE id=?");
                                         $fetch_name_of_selected1->execute([$selected_user1]);
                                         $of_user_id1 = $fetch_name_of_selected1->fetchColumn();
                                         
                                         $fetch_warning_name= $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
                                         $fetch_warning_name->execute([$data_id]);
                                         $warning_name = $fetch_warning_name->fetchColumn();
                                         if($extra_data=="reached_cout"){
                                           $fetched_per16.='
                                           <a>
                                           <ul class="list-group list-group-flush navbar-card-list-group">
                                             <li class="list-group-item form-check-select">
                                               <div class="row">
                                                 <div class="col-auto">
                                                   <div class="d-flex align-items-center">
                                                     <div class="form-check">
                                                       <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                                       <label class="form-check-label" for="notificationCheck1"></label>
                                                     </div>
                                                  </div>
                                                 </div>
                                                 <div class="col ms-n2">
                                                   <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">'.$of_user_id1.'</span> Has reached to <span class="text-danger" style="text-decoration:underline;">'.$warning_name.'</span></h5>
                                                   <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row16['date'])).'</i></small>
                                                   </div>
                                                 </div>
                                               </li>
                                             </ul>
                                                  </a>';
                                         }
                                       }    
                                    $icon='<span class="btn-status btn-sm-status btn-status-danger"></span>';
                                    }else{
                                     // $fetched_per.='<li>No New Notification</li>';
                                     // $icon='<span></span>';
                                    } 
                
?>

<!-- for fetching vehicle type -->
<?php
$vehcate = "";
 $cate = "SELECT * FROM vehicletype ORDER BY vehid ASC";
 $state = $connect->prepare($cate);
 $state->execute();
 if($state->rowCount()>0)
 {
  $ans = $state->fetchAll();
  foreach($ans as $r)
  {
    $vehcate .= '<option value="'.$r['vehid'].'">'.$r['vehicletype'].'</option>';
  }
 }

// fetching phase manager

     $pm="";
     $q2= "SELECT * FROM users where role='Phase Manager'";
 $st2 = $connect->prepare($q2);
 $st2->execute();

 if($st2->rowCount() > 0)
     {
         $re2 = $st2->fetchAll();
       foreach($re2 as $row2)
         {
          $pm.= '<option value="'.$row2['name'].'">'.$row2['name'].'</option>';
         }
     
     }

// fetching course manager

     $cm="";
     $q3= "SELECT * FROM users where role='course manager'";
      $st3 = $connect->prepare($q3);
       $st3->execute();

 if($st3->rowCount() > 0)
     {
         $re3 = $st3->fetchAll();
       foreach($re3 as $row3)
         {
          $cm.= '<option value="'.$row3['id'].'">'.$row3['name'].'</option>';
         }
     
     }

// for fetching student

     $std="";
     $q4= "SELECT * FROM users where role='student'";
      $st4 = $connect->prepare($q4);
       $st4->execute();

 if($st4->rowCount() > 0)
     {
         $re4 = $st4->fetchAll();
       foreach($re4 as $row4)
         {
          $std.= '<option value="'.$row4['id'].'">'.$row4['name'].'</option>';
         }
     
     }

// student fetching for message

     $stu_msg="";
     $q_st= "SELECT * FROM users where role='student'";
      $st_st = $connect->prepare($q_st);
       $st_st->execute();

 if($st_st->rowCount() > 0)
     {
         $re4_st = $st_st->fetchAll();
       foreach($re4_st as $row)
         {
          $stu_msg.= '<option value="'.$row['id'].'">'.$row['name'].' - '.$row['role'].'</option>';
         }
     
     }

// instructor fetching for message

     $in_msg="";
     $q_in= "SELECT * FROM users where role='instructor'";
      $st_in = $connect->prepare($q_in);
       $st_in->execute();

 if($st_in->rowCount() > 0)
     {
         $re4_in = $st_in->fetchAll();
       foreach($re4_in as $row)
         {
          $in_msg.= '<option value="'.$row['id'].'">'.$row['name'].' - '.$row['role'].'</option>';
         }
     
     }

// admin fetching for message
     $ad_msg="";
     $q_ad= "SELECT * FROM users where role='super admin'";
      $st_ad = $connect->prepare($q_ad);
       $st_ad->execute();

 if($st_ad->rowCount() > 0)
     {
         $re4_ad = $st_ad->fetchAll();
       foreach($re4_ad as $row)
         {
          $ad_msg.= '<option value="'.$row['id'].'">'.$row['name'].' - '.$row['role'].'</option>';
         }
     
     }

//  phase manager fetched for message

     $ph_msg="";
     $q_ph= "SELECT * FROM users where role='phase manager'";
      $st_ph = $connect->prepare($q_ph);
       $st_ph->execute();

 if($st_ph->rowCount() > 0)
     {
         $re4_ph = $st_ph->fetchAll();
       foreach($re4_ph as $row)
         {
          $ph_msg.= '<option value="'.$row['id'].'">'.$row['name'].' - '.$row['role'].'</option>';
         }
     
     }

// course manager fetched for message

     $cs_msg="";
     $q_cs= "SELECT * FROM users where role='course manager'";
      $st_cs = $connect->prepare($q_cs);
       $st_cs->execute();

 if($st_cs->rowCount() > 0)
     {
         $re4_cs = $st_cs->fetchAll();
       foreach($re4_cs as $row)
         {
          $cs_msg.= '<option value="'.$row['id'].'">'.$row['name'].' - '.$row['role'].'</option>';
         }
     
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Side And Head</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo BASE_URL;?>favicon.ico">



  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/chart.js/dist/Chart.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/jsvectormap/dist/css/jsvectormap.min.css">

  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/snippets.min.css">


  <!-- CSS Front Template -->

  <link rel="preload" href="<?php echo BASE_URL;?>assets/css/theme.min.css" data-hs-appearance="default" as="style">
  <!-- <link rel="preload" href="<?php echo BASE_URL;?>assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style"> -->

  <style data-hs-appearance-onload-styles>
    *
    {
      transition: unset !important;
    }

    body
    {
      opacity: 0;
    }
    
  </style>

  <style type="text/css">
  .form-control, .form-select
  {
    border-radius:20px; 
    border:0.001rem solid #d0cbcb;
  }
  label
  {
    margin: 5px;
  }
  #loading-screen
{
  position: fixed; top: 0; left: 0; height: 100%; background-position: center;
  background-image: url("tos.svg");
  background-repeat: no-repeat;
  background-position: center;
  width: 100%;
  background-size: 100px;
}
.got_result:hover {
  background-color: lightgrey;
}
.form-check-select:hover
{
  cursor: pointer;
  background-color: #e7eaf3;
}
</style>

  <script>
            window.hs_config = {"autopath":"@@autopath","deleteLine":"hs-builder:delete","deleteLine:build":"hs-builder:build-delete","deleteLine:dist":"hs-builder:dist-delete","previewMode":false,"startPath":"/index.html","vars":{"themeFont":"https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap","version":"?v=1.0"},"layoutBuilder":{"extend":{"switcherSupport":true},"header":{"layoutMode":"default","containerMode":"container-fluid"},"sidebarLayout":"default"},"themeAppearance":{"layoutSkin":"default","sidebarSkin":"default","styles":{"colors":{"primary":"#377dff","transparent":"transparent","white":"#fff","dark":"132144","gray":{"100":"#f9fafc","900":"#1e2022"}},"font":"Inter"}},"languageDirection":{"lang":"en"},"skipFilesFromBundle":{"dist":["assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","assets/js/demo.js"],"build":["assets/css/theme.css","assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js","assets/js/demo.js","assets/css/theme-dark.css","assets/css/docs.css","assets/vendor/icon-set/style.css","assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js","assets/js/demo.js"]},"minifyCSSFiles":["assets/css/theme.css","assets/css/theme-dark.css"],"copyDependencies":{"dist":{"*assets/js/theme-custom.js":""},"build":{"*assets/js/theme-custom.js":"","node_modules/bootstrap-icons/font/*fonts/**":"assets/css"}},"buildFolder":"","replacePathsToCDN":{},"directoryNames":{"src":"<?php echo BASE_URL;?>src","dist":"<?php echo BASE_URL;?>dist","build":"<?php echo BASE_URL;?>build"},"fileNames":{"dist":{"js":"theme.min.js","css":"theme.min.css"},"build":{"css":"theme.min.css","js":"theme.min.js","vendorCSS":"vendor.min.css","vendorJS":"vendor.min.js"}},"fileTypes":"jpg|png|svg|mp4|webm|ogv|json"}
            window.hs_config.gulpRGBA = (p1) => {
  const options = p1.split(',')
  const hex = options[0].toString()
  const transparent = options[1].toString()

  var c;
  if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
    c= hex.substring(1).split('');
    if(c.length== 3){
      c= [c[0], c[0], c[1], c[1], c[2], c[2]];
    }
    c= '0x'+c.join('');
    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+',' + transparent + ')';
  }
  throw new Error('Bad Hex');
}
            window.hs_config.gulpDarken = (p1) => {
  const options = p1.split(',')

  let col = options[0].toString()
  let amt = -parseInt(options[1])
  var usePound = false

  if (col[0] == "#") {
    col = col.slice(1)
    usePound = true
  }
  var num = parseInt(col, 16)
  var r = (num >> 16) + amt
  if (r > 255) {
    r = 255
  } else if (r < 0) {
    r = 0
  }
  var b = ((num >> 8) & 0x00FF) + amt
  if (b > 255) {
    b = 255
  } else if (b < 0) {
    b = 0
  }
  var g = (num & 0x0000FF) + amt
  if (g > 255) {
    g = 255
  } else if (g < 0) {
    g = 0
  }
  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
}
            window.hs_config.gulpLighten = (p1) => {
  const options = p1.split(',')

  let col = options[0].toString()
  let amt = parseInt(options[1])
  var usePound = false

  if (col[0] == "#") {
    col = col.slice(1)
    usePound = true
  }
  var num = parseInt(col, 16)
  var r = (num >> 16) + amt
  if (r > 255) {
    r = 255
  } else if (r < 0) {
    r = 0
  }
  var b = ((num >> 8) & 0x00FF) + amt
  if (b > 255) {
    b = 255
  } else if (b < 0) {
    b = 0
  }
  var g = (num & 0x0000FF) + amt
  if (g > 255) {
    g = 255
  } else if (g < 0) {
    g = 0
  }
  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
}
</script>


</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">


  <script src="<?php echo BASE_URL;?>assets/js/hs.theme-appearance.js"></script>

  <script src="<?php echo BASE_URL;?>assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>
  
  <!-- <div id="loading-screen" class="spinner-border" style="height:50px; width:50px; display:none;">Loading...</div> -->
  
  <!-- ========== HEADER ========== -->

  <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
    <div class="navbar-nav-wrap">
      <!-- Logo -->
     
       <a class="navbar-brand" href="<?php echo BASE_URL;?>Home.php" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $institute.'/'.$department?>">
          <img style="display:none;" class="avatar" src="<?php echo $pic_department ?>" alt="Logo" data-hs-theme-appearance="default">
          <span class="nav-link-title text-primary" style="font-weight:bolder;"><?php if(isset($department)){?>
                <?php echo $institute.'/'.$department;?>
                <?php }?>
                </span>
         
        </a>
      
      <!-- End Logo -->

      <div class="navbar-nav-wrap-content-start">
        <!-- Navbar Vertical Toggle -->
       <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
          <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
          <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
        </button>
        <!-- End Navbar Vertical Toggle -->

        <!-- Search Form -->
        <div class="dropdown ms-2">
          <!-- Input Group -->
          <div class="d-none d-lg-block">
            <div class="input-group input-group-merge input-group-borderless input-group-hover-light navbar-input-group">
              <div class="input-group-prepend input-group-text">
                <i class="bi-search"></i>
              </div>

              <input type="search" id="myInput" name="search" onkeyup="myFunction()" class="js-form-search form-control" placeholder="Search in front" aria-label="Search in front" data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenu",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
              <a class="input-group-append input-group-text" href="javascript:;">
                <i id="clearSearchResultsIcon" class="bi-x-lg" style="display: none;"></i>
              </a>
            </div>
          </div>

          <button class="js-form-search js-form-search-mobile-toggle btn btn-ghost-secondary btn-icon rounded-circle d-lg-none" type="button" data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenu",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
            <i class="bi-search"></i>
          </button>
          <!-- End Input Group -->

          <!-- Card Search Content -->
          <div id="searchDropdownMenu" class="hs-form-search-menu-content dropdown-menu dropdown-menu-form-search navbar-dropdown-menu-borderless">
            <!-- Body -->
            <div class="card-body-height">
              <div class="d-lg-none">
                <div class="input-group input-group-merge navbar-input-group mb-5">
                  <div class="input-group-prepend input-group-text">
                    <i class="bi-search"></i>
                  </div>

                  <input type="search"  placeholder="Search for names.." title="Type in a name">
                </div>
              </div>

              <span class="dropdown-header">Recent searches</span>

              <div class="dropdown-item bg-transparent text-wrap" id="headsearchtable">
                <!-- <input class="form-control" type="search" id="myInput" name="search" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
                     <ul id="myUL" style="display: inline-block;">
                      <li style="display:inline-block; margin: 3px;">
                        <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>Home.php">
                          Home <i class="bi-search ms-1"></i>
                        </a>
                      </li>
                        <li style="display:inline-block; margin: 3px;">
                          <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>actual.php">
                           Actual <i class="bi-search ms-1"></i>
                          </a>
                        </li>

                        <li style="display:inline-block; margin: 3px;">
                          <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>sim.php">
                           Sim <i class="bi-search ms-1"></i>
                          </a>
                        </li><br>

                        <li style="display:inline-block; margin: 3px;">
                          <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>academic.php">
                           Academic <i class="bi-search ms-1"></i>
                          </a>
                        </li>

                        <li style="display:inline-block; margin: 3px;">
                          <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>tasklog.php">
                           Task <i class="bi-search ms-1"></i>
                          </a>
                        </li>

                        <li style="display:inline-block; margin: 3px;">
                          <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>stdactlog.php">
                           Activity <i class="bi-search ms-1"></i>
                          </a>
                        </li>

                        <li style="display:inline-block; margin: 3px;">
                          <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>testing.php">
                           Testing <i class="bi-search ms-1"></i>
                          </a>
                        </li>

                        <li style="display:inline-block; margin: 3px;">
                          <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>emergency.php">
                           Emergency <i class="bi-search ms-1"></i>
                          </a>
                        </li>

                        <li style="display:inline-block; margin: 3px;">
                          <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>qual.php">
                           Qual <i class="bi-search ms-1"></i>
                          </a>
                        </li>

                        <li style="display:inline-block; margin: 3px;">
                         <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>clearnace.php">
                           Clearance <i class="bi-search ms-1"></i>
                          </a>
                        </li>

                        <li style="display:inline-block; margin: 3px;">
                          <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>CAP.php">
                           CAP <i class="bi-search ms-1"></i>
                          </a>
                        </li>

                        <li style="display:inline-block; margin: 3px;">
                           <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>memo.php">
                           Memo <i class="bi-search ms-1"></i>
                          </a>
                        </li>

                        <li style="display:inline-block; margin: 3px;">
                          <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>classreport.php">
                           Report <i class="bi-search ms-1"></i>
                          </a>
                        </li>

                        <li style="display:inline-block; margin: 3px;">
                          <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL;?>discipline.php">
                           Descipline <i class="bi-search ms-1"></i>
                          </a>
                        </li>
                      </ul>
              
              </div> 

              <div class="dropdown-divider"></div>

              <span class="dropdown-header">Tutorials</span>

              <a class="dropdown-item" href="<?php echo BASE_URL;?>index.html">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <span class="icon icon-soft-dark icon-xs icon-circle">
                      <i class="bi-sliders"></i>
                    </span>
                  </div>

                  <div class="flex-grow-1 text-truncate ms-2">
                    <span>How to set up Gulp?</span>
                  </div>
                </div>
              </a>

              <a class="dropdown-item" href="<?php echo BASE_URL;?>index.html">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <span class="icon icon-soft-dark icon-xs icon-circle">
                      <i class="bi-paint-bucket"></i>
                    </span>
                  </div>

                  <div class="flex-grow-1 text-truncate ms-2">
                    <span>How to change theme color?</span>
                  </div>
                </div>
              </a>

              <div class="dropdown-divider"></div>

              <span class="dropdown-header">Members</span>

            </div>
            <!-- End Body -->

            <!-- Footer -->
            <a class="card-footer text-center" href="<?php echo BASE_URL;?>index.html">
              See all results <i class="bi-chevron-right small"></i>
            </a>
            <!-- End Footer -->
          </div>
          <!-- End Card Search Content -->

        </div>

        <!-- End Search Form -->
      </div>

      <div class="navbar-nav-wrap-content-end">
        <!-- Navbar -->
        <ul class="navbar-nav">

          <li class="hs-has-mega-menu nav-item">
              <a id="landingsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></a>

              <!-- Mega Menu -->
              <div class="hs-mega-menu dropdown-menu" aria-labelledby="landingsMegaMenu" style="width:1000px; margin-left:200px;">
                <div class="navbar-dropdown-menu-promo">
                  <!-- Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['actual'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>scheduling_tools.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/filled/Actual class.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title">Scheduling Tools</span>
                            
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                
                  <!-- End Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['sim'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <!-- <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/simulation.png">
                          </span> -->
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title"></span>

                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  

                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Academic'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <!-- <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/Academic.png">
                          </span> -->
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title"></span>
                             
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                </div>

                <div class="navbar-dropdown-menu-promo">
                  <!-- Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Task'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <!-- <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/task.png">
                          </span> -->
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title"></span>
                            
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                  <!-- End Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['evaluation'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>evaluation.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/filled/Evaluation.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title">Evaluation</span>

                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  

                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Student'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>stdactlog.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/priya/Student Activity.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title">Activity</span>
                             
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                </div>

                 <div class="navbar-dropdown-menu-promo">
                  <!-- Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Testing'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>testing.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/test.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title">Testing</span>
                            
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                  <!-- End Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Emergency'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>emergency.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/filled/Emergancy Log.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title">Emergency</span>

                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  

                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Qual'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>qual.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/priya/Qual.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title">Qual</span>
                             
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                </div>

                 <div class="navbar-dropdown-menu-promo">
                  <!-- Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Clearance'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>clearance.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                           <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/clearence.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title">Clearnace</span>
                            
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                  <!-- End Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['CAP'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>CAP.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/CAP.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title">CAP</span>

                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  

                 
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                     <?php if(!isset($_SESSION['permission']) || $permission['Memo'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>memo.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/priya/Memorandum Icon.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title">Memo</span>
                             
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  

                </div>

                <div class="navbar-dropdown-menu-promo">
                  <!-- Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Report'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>classreport.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/report.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title">Report</span>
                            
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                
                  <!-- End Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Discipline'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>discipline.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/discipline.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title">Discipline</span>

                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                  
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Quiz'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>quiz.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/priya/Quiz.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title">Quiz</span>
                             
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  

                </div>

                  
                  <!-- End Promo Item -->
                </div>
                <!-- End Promo -->
            </li>
            <!-- End Landings -->



          <li class="nav-item" style="display:none;">
           
            <div class="dropdown">
              <div class="dropdown">
              <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                <i class="bi bi-list"></i>
              </button>

              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                <div class="dropdown-item-text">
                  <ul>
                    <?php 
      // var_dump($permission);
           if(!isset($_SESSION['permission']) || $permission['Dashboard'] == "1"){?>
          <li class="nav-item m-2">
            <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL;?>Home.php">Home</a>
          </li>
          <?php } ?>

          <?php if(!isset($_SESSION['permission']) || $permission['class_page'] == "1"){?>
          <li class="nav-item m-1">
            <a class="dropdown-toggle" 
                type="button" 
                data-bs-toggle="dropdown" 
                aria-expanded="false" style="color:#8c98a4; font-size: 15px;" href="">Class</a>
                <ul class="dropdown-menu" style="float:right; margin-left: 450px;">
                    <?php if(!isset($_SESSION['permission']) || $permission['actual'] == "1"){?>
                                      <a class="nav-link " href="<?php echo BASE_URL;?>actual.php">Actual</a>
                                      <?php }?>
                                      <?php if(!isset($_SESSION['permission']) || $permission['sim'] == "1"){?>
                                      <a class="nav-link " href="<?php echo BASE_URL;?>sim.php">Simulation</a>
                                      <?php }?>
                                      <?php if(!isset($_SESSION['permission']) || $permission['Academic'] == "1"){?>
                                      <a class="nav-link " href="<?php echo BASE_URL;?>academic.php">Academic</a>
                                      <?php }?>
                </ul>
          </li>
          <?php } ?>

          <?php if(!isset($_SESSION['permission']) || $permission['Testing'] == "1"){?>
          <li class="nav-item m-1">
            <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL;?>testing.php">Testing</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['permission']) || $permission['evaluation'] == "1"){?>
          <li class="nav-item m-1">
            <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL;?>evaluation.php">Evaluation</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['permission']) || $permission['Task'] == "1"){?>
          <li class="nav-item m-1">
            <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL;?>tasklog.php">Task</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['permission']) || $permission['Student'] == "1"){?>
          <li class="nav-item m-1">
            <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL;?>stdactlog.php">Activity</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['permission']) || $permission['Emergency'] == "1"){?>
          <li class="nav-item m-1">
            <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL;?>emergency.php">Emergency</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['permission']) || $permission['Qual'] == "1"){?>
          <li class="nav-item m-1">
            <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL;?>qual.php">Qual</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['permission']) || $permission['Clearance'] == "1"){?>
          <li class="nav-item m-1">
            <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL;?>clearance.php">Clearance</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['permission']) || $permission['CAP'] == "1"){?>
          <li class="nav-item m-1">
            <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL;?>CAP.php">CAP</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['permission']) || $permission['Memo'] == "1"){?>
          <li class="nav-item m-1">
            <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL;?>memo.php">Memo</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['permission']) || $permission['Report'] == "1"){?>
          <li class="nav-item m-1">
            <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL;?>classreport.php">Report</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['permission']) || $permission['Discipline'] == "1"){?>
          <li class="nav-item m-1">
            <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL;?>discipline.php">Descipline</a>
          </li>
          <?php }?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
            
          </li>

          <li class="nav-item">
            <!-- message -->
            <div class="dropdown">
              <div class="dropdown">
              <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                <i class="bi bi-chat"></i>
              </button>

              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                <div class="dropdown-item-text">
                  <div class="d-flex align-items-center">
                   <form action="send_message.php" method="post">
                     <input type="text" name="to-user" id="message_to_user" placeholder="To" class="form-control" value="<?php echo $username;?>" readonly style="background-color: #bfcfe09e;"><br>

                     <input type="hidden" value="<?php echo $user_id ?>" id="get_session_id_user" name="session_id">
                     <input type="hidden" id="get_id_select" name="get_id_select">
                     <input type="text" id="txt_search" name="to_user" class="form-control" placeholder="To" autocomplete="off" required value="">
                     <br>
                     <ul class="searchResult">
                       
                     </ul><br>
                  

                   
                     <textarea class="form-control" id="message_send_user" placeholder="Write Message.." name="get_message" required></textarea><br>
                     <input style="float:right;" type="submit" name="msg" value="Send" id="send_message_to_user" class="btn btn-success">
                   </form>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- End message -->
          </li>

          <li class="nav-item d-none d-sm-inline-block">
            <!-- Notification -->
            <div class="dropdown">
              <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                <i class="bi-bell"></i>
                <?php echo $icon ?>
              </button>

              <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
                <!-- Header -->
                <div class="card-header card-header-content-between">
                  <h4 class="card-title mb-0">Notifications</h4>

                  <!-- Unfold -->
                  <div class="dropdown">
                    <?php if($role!="super admin"){?>
                  <button id="read_all_noti" class="btn btn-primary btn-sm">Read all</button>
                  <?php }else if($role=="super admin"){?>
                    <button id="read_all_noti_admin" class="btn btn-primary btn-sm">Read all</button>
                    <?php }?>
                  <input type="hidden" value="<?php echo $user_id?>" id="user_id_val">
                    <!-- <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdownSettings">
                      <span class="dropdown-header">Settings</span>
                      <a class="dropdown-item" href="#">
                        <i class="bi-archive dropdown-item-icon"></i> Archive all
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="bi-check2-all dropdown-item-icon"></i> Mark all as read
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="bi-toggle-off dropdown-item-icon"></i> Disable notifications
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="bi-gift dropdown-item-icon"></i> What's new?
                      </a>
                      <div class="dropdown-divider"></div>
                      <span class="dropdown-header">Feedback</span>
                      <a class="dropdown-item" href="#">
                        <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                      </a>
                    </div> -->
                  </div>
                  <!-- End Unfold -->
                </div>
                <!-- End Header -->

                <!-- Nav -->
                <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">
                <?php
                
                if($role!="super admin"){
                  $sql = "SELECT COUNT(`id`) FROM notifications WHERE to_userid='$user_id' and is_read=0 and extra_data!='requesting to unlock' and extra_data!='cloned delete ask' and extra_data!='requesting_unlock'";
                  $res = $connect->query($sql);
                  $count = $res->fetchColumn();
                }else if($role=="super admin"){
                  $sql = "SELECT COUNT(`id`) FROM notifications WHERE is_read=0 and if_admin='$role'";
                  $res = $connect->query($sql);
                  $count = $res->fetchColumn();
                }
                  ?>
                  <li class="nav-item">
                    <a class="nav-link active" href="#notificationNavOne" id="notificationNavOne-tab" data-bs-toggle="tab" data-bs-target="#notificationNavOne" role="tab" aria-controls="notificationNavOne" aria-selected="true">Notifications(<?php echo $count?>)</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#notificationNavTwo" id="notificationNavTwo-tab" data-bs-toggle="tab" data-bs-target="#notificationNavTwo" role="tab" aria-controls="notificationNavTwo" aria-selected="false">Read Messages</a>
                  </li>
                </ul>
                <!-- End Nav -->

                <!-- Body -->
                <div class="card-body-height">
                  <!-- Tab Content -->
                  <div class="tab-content" id="notificationTabContent">
                    <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel" aria-labelledby="notificationNavOne-tab">
                  <?php

                      echo $fetched_per15;
                   echo $fetched_per11;
                    echo $fetched_per3;
                    echo $fetched_per2;
                    echo $fetched_per4;
                    echo $fetched_per16;
                    echo $fetched_per17;
                    ?>
                          
                   </div>

                    <div class="tab-pane fade" id="notificationNavTwo" role="tabpanel" aria-labelledby="notificationNavTwo-tab">
               
               <?php    
               $fetched_per5="";
               $fetch_noti5= "SELECT * FROM notifications where is_read='1' AND type='message' and to_userid='$user_id' and extra_data!='threshold' and extra_data!='reached_cout' order by id desc";
                      
                      $fetch_noti5st2 = $connect->prepare($fetch_noti5);
                      $fetch_noti5st2->execute();
                      
                       if($fetch_noti5st2->rowCount() > 0)
                           {
                               $re5 = $fetch_noti5st2->fetchAll();
                             foreach($re5 as $row5)
                               {

                               $for_userid1=$row5['to_userid']; 
                                $fetch_std_name1= $connect->prepare("SELECT name FROM `users` WHERE id=?");
                                $fetch_std_name1->execute([$for_userid1]);
                                $std_name1 = $fetch_std_name1->fetchColumn();
                            
                                $fetched_per5.='
                                <a id="'.$row5['id'].'" class="get_id_of_noti">
                                <ul class="list-group list-group-flush navbar-card-list-group">
                                  <li class="list-group-item form-check-select bg-soft-info">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                            <label class="form-check-label" for="notificationCheck1"></label>
                                          </div>
                                       </div>
                                      </div>
                                      <div class="col ms-n2">
                                       
                                      <span class="text-body fs-5 text-dark">You Have Message From '.$std_name1.'<span><br>
                                        <small style="margin-left:110px" class="text-success"><i>'.date("F j, Y, g:i a",strtotime($row5['date'])).'</i></small>
                                        <button style="float:right;" class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#view_msg">View</button>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                       </a>';
                               
                              }  }?>  
                              <?php echo $fetched_per5?>
                            
                    </div>
                  </div>
                  <!-- End Tab Content -->
                </div>
                <!-- End Body -->

                <!-- Card Footer -->
               <!--  <a class="card-footer text-center" href="#">
                  View all notifications <i class="bi-chevron-right"></i>
                </a> -->
                <!-- End Card Footer -->
              </div>
            </div>
            <!-- End Notification -->
          </li>


          <li class="nav-item d-none d-sm-inline-block">
            <!-- Activity -->
            <button class="btn btn-ghost-secondary btn-icon rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasActivityStream" aria-controls="offcanvasActivityStream">
              <i class="bi-x-diamond"></i>
            </button>
            <!-- Activity -->
          </li>

          <li class="nav-item">
            <!-- user modal -->
            <div class="dropdown">
              <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                <div class="avatar avatar-sm avatar-circle">
                  <img class="avatar-img" src="<?php echo $pic ?>" alt="Image Description">
                  <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                </div>
              </a>

              <?php 
                            $fetch_details1= "SELECT * FROM users where id='$user_id'";
                            $fetch_detailsst22 = $connect->prepare($fetch_details1);
                            $fetch_detailsst22->execute();
                            
                             if($fetch_detailsst22->rowCount() > 0)
                                 {
                                     $re22 = $fetch_detailsst22->fetchAll();
                                   foreach($re22 as $row22)
                                     {
                                     
                                 }}   
                            ?>

              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                <div class="dropdown-item-text">
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-sm avatar-circle">
                      <img class="avatar-img" src="<?php echo $pic ?>" alt="Image Description">
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-0"><?php echo $username;?></h5>
                      <p class="card-text text-body"><?php echo $row22['email'] ?></p>
                    </div>
                  </div>
                </div>

                <div class="dropdown-divider"></div>


                <a class="dropdown-item" href="profile.php">Change Profile</a>
                <a class="dropdown-item" href="#">Settings</a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="logout.php">Sign out</a>
              </div>
            </div>
            <!-- End user modal -->
          </li>
        </ul>
        <!-- End Navbar -->
      </div>
    </div>
  </header>

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <!-- Navbar Vertical -->

  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white">
    <div class="navbar-vertical-container">
      <div class="navbar-vertical-footer-offset">
        <?php 
          $profile_department= $connect->prepare("SELECT file_name FROM `homepage` WHERE user_id=?");
          $profile_department->execute([$inst_id]);
          $prof_pic_dep = $profile_department->fetchColumn();
          if($prof_pic_dep!=null){
            // $pic_department= 'includes/pages/department/'.$prof_pic_dep;
          }else{
            $pic_department= 'department/avtar.png';
          }

        ?>
         <a class="navbar-brand" href="<?php echo BASE_URL;?>Home.php" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $institute.'/'.$department?>">
          <img class="avatar" src="<?php echo $pic_department ?>" alt="Logo" data-hs-theme-appearance="default">
          <span class="nav-link-title text-success" style="font-weight:bolder;"><?php if(isset($department)){?>
                <?php echo $institute.'/'.$department;?>
                <?php }?>
                </span>
         
        </a>

<!-- course name -->
            <div class="nav-item" >
              <?php 
              $fixed_ctp_id="";
              if(isset($_COOKIE['fixed_ctp_id'])){
                 $fixed_ctp_id= $_COOKIE['fixed_ctp_id'];
              }
           ?>
              <form method="post" data-bs-toggle="collapse" action="#">
                <a class="nav-link" role="button" aria-expanded="false">
                  <img style="height:15px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/New course.png">
                 
                  <span class="nav-link-title" style="color:black; font-weight:bold;">Course Name</span>
                  <select style="margin:5px;" type="text" id="course" data-bs-toggle="collapse" class="form-select" autocomplete="off" name="course">
                      <option readonly value="0">Select course</option>
                      <?php 
                      
                   $query1 = "SELECT newcourse.nick_name,newcourse.CourseCode,newcourse.CourseName,newcourse.Courseid
                   FROM newcourse
                   INNER JOIN sidebar_ctp ON newcourse.CourseName = sidebar_ctp.ctp_id group by CourseCode,CourseName";
                   
                   $statement1 = $connect->prepare($query1);
                   $statement1->execute();
                  
                   if($statement1->rowCount() > 0)
                       {
                           $result1 = $statement1->fetchAll();
                      
                            foreach($result1 as $row1)
                        {
                          $course_nickname=$row1['nick_name'];
                          $symbol_name=$row1['CourseCode'];
                          $course_name_value=$row1['CourseName'];
                                $cor_name= $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
                                $cor_name->execute([$course_name_value]);
                                $name_of_ctp = $cor_name->fetchColumn();
                          ?>
                           
                            <option id="<?php echo $row1['CourseCode']?>" class="<?php echo $row1['CourseName'] ?>" value="<?php echo $row1['Courseid'] ?>"><?php echo $name_of_ctp .' - '. '0'.$symbol_name;?></option>
                        <?php }
         
                         } ?>
                    </select>
                </a>
              </div>
<!-- student fetched according to the course -->
              <!-- <div class="nav-item" style="margin-bottom: -55px;"> -->
                <a class="nav-link" role="button" aria-expanded="false">
                  <img style="height:15px; width:15px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/User.png">
                  <span class="nav-link-title" style="color:black; font-weight:bold;">Student Name</span>
                  <select data-bs-toggle="collapse" type="text" id="state" class="form-select" autocomplete="off" name="student">
                  <?php  echo $allstudent= $_COOKIE['allstudent']; ?>
                    </select>
                    <?php
                      $fetchname="";
                      $phpcourse="";
                      $student="";
                      $fetchid="";
                      $fetchphone="";
                      $fetchrole="";
                      $fetchuser_id="";
                      $fetchnickname="";
                     
                      $course_code="";
                      $fetchuser_image="";
                         //set selected value from both dropdown in php 
                        if(isset($_COOKIE['phpgetcourse']) && isset($_COOKIE['student'])){
                        $phpcourse= $_COOKIE['phpgetcourse'];
                        $student= $_COOKIE['student'];
                        $fetchname="";
                     
                        $name= "SELECT * FROM users where id='$student'";
                                $stname2 = $connect->prepare($name);
                                $stname2->execute();
                              
                                if($stname2->rowCount() > 0)
                                    {
                                        $rename2 = $stname2->fetchAll();
                                        foreach($rename2 as $rowname2)
                                        {
                                        $fetchname =$rowname2['name'];
                                        $fetchid=$rowname2['studid'];                                 
                                        $fetchrole=$rowname2['role'];
                                        $fetchphone=$rowname2['phone'];
                                        $fetchemail=$rowname2['email'];
                                        $fetchuser_id=$rowname2['id'];
                                        $fetchuser_image=$rowname2['file_name'];
                                        $fetchnickname=$rowname2['nickname'];
                                      }
                                    }
                                  }
                                    // $cr_name = "SELECT COUNT(Courseid), StudentNames FROM newcourse GROUP BY StudentNames where Courseid='$phpcourse'";
                                    $cr_name= "SELECT * FROM ctppage where CTPid='$phpcourse'";
                                    $cr_st = $connect->prepare($cr_name);
                                    $cr_st->execute();
                        
                                    if($cr_st->rowCount() > 0)
                                        {
                                            $cr_result = $cr_st->fetchAll();
                                            foreach($cr_result as $row)
                                            {

                                           $std_course1=$row['CTPid'];
                                           $std_course=$row['course'];
                                           $Total_type_maarks=$row['total_mark'];
                                           $course_code=$row['symbol']; 
                                            }
                                        }
                                        $cr_name_data= "SELECT * FROM newcourse where StudentNames='$student'";
                                    $cr_st1 = $connect->prepare($cr_name_data);
                                    $cr_st1->execute();
                        
                                    if($cr_st1->rowCount() > 0)
                                        {
                                            $cr_result1 = $cr_st1->fetchAll();
                                            foreach($cr_result1 as $row1)
                                            {
                                              $CourseCode11=$row1['CourseCode'];
                                              $Coursename11=$row1['nick_name'];
                                            }
                                          }  

                      ?>
                      
                </a>
              
                <!-- <input style="width: max-content; margin-top:20px;" type="submit" name="" value="search" class="btn btn-primary"> -->
                
                
              </form>
        <hr>
        <?php if(!isset($_SESSION['permission']) || $permission['sidebar_phase'] == "1"){?>
        <div class="nav-item" style="margin-top:-20px; margin-bottom:-45px;">
                     <!-- <div class="tom-select-custom"> -->
                      <form action="Next-home.php" method="post" data-bs-toggle="collapse" style="margin-left: 15px;">
                        
                              <img style="height:15px; width:15px; margin-left:20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/CTP.png">
                              <span class="nav-link-title" style="color:black; font-weight:bold;">CTP</span>
                            <select style="width: 93%;" class="form-select" autocomplete="off" name="ctp" id="set_ctp">
                            
                            <?php if($output2!=""){?>
                              <option value="">Select ctp</option>
                            <?php  echo $output2;
                              }
                            else{ ?>
                           <option value="0">Please add ctp</option>
                            <?php   } ?>
                            </select>
                         
                          
                          </form><br><br>
                    <!--  </div> -->
              </div>
              <hr><?php }?>
        <!-- End Logo -->

        <!-- Navbar Vertical Toggle -->
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
          <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
          <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
        </button>

        <!-- End Navbar Vertical Toggle -->

        <!-- Content -->
        <div class="navbar-vertical-content">
          <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav" style="margin-top: -30px;">

            <div id="navbarVerticalMenuPagesMenu">
              
        
        <?php if(!isset($_SESSION['permission']) || $permission['Start0'] == "1"){?>

              <div class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#navbarpagesquare" role="button" data-bs-toggle="collapse" data-bs-target="#navbarpagesquare" aria-expanded="false" aria-controls="navbarpagesquare">
                        <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/Square.png">
                        <span class="nav-link-title">Square</span>
                      </a>

                      <div id="navbarpagesquare" class="nav-collapse collapse " data-bs-parent="#navbarUserssquareDiv">
                        <a class="nav-link" href="<?php echo BASE_URL;?>start0.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Start0">1</a>
                        <a class="nav-link" href="<?php echo BASE_URL;?>vehiclecate.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Vehicle Category">2</a>
                        <a class="nav-link" href="<?php echo BASE_URL;?>ctp.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Course Training Plan">3</a>
                        <a class="nav-link" href="<?php echo BASE_URL;?>newcourse.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create New Course">4</a>
                      </div>
                    </div>

               <!-- Collapse -->
              <!-- <div class="nav-item">
                <a class="nav-link" href="start0.php" role="button" aria-expanded="false">
                  <i class="bi-people nav-icon"></i>
                  <span class="nav-link-title">Square One</span>
                </a>
              </div> -->
              <?php }?>
              <!-- End Collapse -->
              <?php if(!isset($_SESSION['permission']) || $permission['Datapage'] == "1"){?>

               <!-- Collapse -->
              <!-- <div class="nav-item">
                <a class="nav-link" href="usersinfo.php" role="button" aria-expanded="false">
                  <i class="bi-people nav-icon"></i>
                  <span class="nav-link-title">Data Page</span>
                </a>
              </div> -->
              <!-- End Collapse -->
              <!-- Example split danger button -->

              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-split" href="<?php echo BASE_URL;?>usersinfo.php" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesEcommerceMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesEcommerceMenu">
                  <!-- <i class="bi-basket nav-icon"></i> -->
                  <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/New/Data Pg.png">
                  <span class="nav-link-title">Data Page<span class="badge bg-secondary rounded-pill ms-1">6</span></span>
                </a>

                <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse" data-bs-parent="#navbarVerticalMenuPagesMenu">

                  <div id="navbarUsersMenuDiv">
                    <!-- Collapse -->

                    <div class="nav-item">
                      <a class="nav-link active" href="<?php echo BASE_URL;?>usersinfo.php" role="button" aria-expanded="false">
                <img style="height:15px; width:15px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/all.png">
                <!-- <i class="bi-house-door nav-icon"></i> -->

                <span>All</span>
              </a>
                      
                    </div>

                    <!-- Collapse -->
                    <div class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#navbarCtpMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCtpMenu" aria-expanded="false" aria-controls="navbarCtpMenu">
                        <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/CTP.png">
                        <span>CTP</span>
                      </a>

                      <div id="navbarCtpMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                        <a class="nav-link " href="<?php echo BASE_URL;?>ctp.php">Add CTP</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>Next-home.php">Phase</a>
                        <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#ctp_data_head">CTP List</a>
                        <a class="nav-link " type="button" href="<?php echo BASE_URL;?>Grade_Sheet/prereuisite.php">Prereuisites</a>
                      </div>
                    </div>
                    <!-- End Collapse -->

                      <!-- Collapse -->
                    <div class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#navbarCourseMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCourseMenu" aria-expanded="false" aria-controls="navbarCourseMenu">
                        <img style="height:15px; width:20px; margin-right:10px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/New course.png">
                        <span>Course</span>
                      </a>

                       <div id="navbarCourseMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                        <a class="nav-link " href="<?php echo BASE_URL;?>newcourse.php">
                        Add New Course
                        </a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>quiz_data.php">Quiz</a>
                        <a class="nav-link" type="button" type="button" data-bs-toggle="modal" data-bs-target="#select_course">Add Group</a>
                        <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#course_list_head">Course List</a>
                      </div>
                    </div>
                    <!-- End Collapse -->

                    <div class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#navbarUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarUsersMenu" aria-expanded="false" aria-controls="navbarUsersMenu">
                        <img style="height:15px; width:15px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/Multiple Users.png">
                        <span>Users</span>
                      </a>

                      <div id="navbarUsersMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                        <a class="nav-link " href="<?php echo BASE_URL;?>roles.php">Manage Roles</a>
                        <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#newuser_head" onclick="register()">Register User</a>
                        <a class="nav-link" href="<?php echo BASE_URL;?>user_list.php">User List</a>
                        <a class="nav-link " href="<?php echo BASE_URL;?>profile.php">My Profile</a>
                      </div>
                    </div>
                    <!-- End Collapse -->

                    <!-- Collapse -->
                    <div class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#navbarpageMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarpageMenu" aria-expanded="false" aria-controls="navbarpageMenu">
                        <img style="height:15px; width:15px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/Pgs.png">
                        <span>Pages</span>
                      </a>

                      <div id="navbarpageMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>">Actual</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>.php">Simulation</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>.php">Academic</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>.php">Task</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>.php">Evaluation</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>.php">Activity</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>.php">Testing</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>emergency_data.php">Emergency Log</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>qual_data.php">Qual Log</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>clearance_data.php">Clearance Log</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>warning.php">CAP</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>.php">Memo</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>.php">Report</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>.php">Descipline</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>.php">Quiz</a>
                      </div>
                    </div>
                    <!-- End Collapse -->

                     <!-- Collapse -->
                    <div class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#navbarScoreMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarScoreMenu" aria-expanded="false" aria-controls="navbarScoreMenu">
                        <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/Scoring.png">
                        <span>Scoring</span>
                      </a>

                      <div id="navbarScoreMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                        <a class="nav-link" id="permissionbtn" type="button" data-bs-toggle="modal" data-bs-target="#per_list_head">Permission</a>
                        <a class="nav-link" onclick="scorebtn()" type="button" data-bs-toggle="modal" data-bs-target="#per_table_head">Percentage</a>
                        <a class="nav-link" type="button" href="<?php echo BASE_URL;?>addtype.php">Add Type</a>
                      </div>
                    </div>
                    <!-- End Collapse -->

                    <!-- Collapse -->
                    <div class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#navbarVehicleMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVehicleMenu" aria-expanded="false" aria-controls="navbarVehicleMenu">
                        <img style="height:15px; width:15px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/Vehicle.png">
                        <span>Vehicles Type/Tools</span>
                      </a>

                      <div id="navbarVehicleMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                        <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#add_cate_head" onclick="addcate()">Add Category</a>
                        <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#vehiclecate_list_head" onclick="addvehicle()">Vehicle Category List</a>
                        <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#addvehicle_head" onclick="addvehicle()">Add Vehicle</a>
                        <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#vehicle_list_head" onclick="addvehicle()">Vehicle List</a>
                      </div>
                    </div>
                    <!-- End Collapse -->


                    <!-- Collapse -->
                    <div class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#navbarSettingMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarSettingMenu" aria-expanded="false" aria-controls="navbarSettingMenu">
                        <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/Setting.png">
                        <span>Setting</span>
                      </a>

                      <div id="navbarSettingMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                        <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#department_list_head">Department</a>
                      </div>
                    </div>
                    <!-- End Collapse -->
                  </div>
                </div>
              </div>
                

              <!-- End Collapse -->


              <!-- End Collapse -->
              <?php }?>



            <!-- <span class="dropdown-header mt-1">APPS</span>
            <small class="bi-three-dots nav-subtitle-replacer"></small> -->

            <!-- Collapse -->
            <div id="navbarVerticalMenuPagesMenu" style="display: none;">
              
               <!-- Collapse -->
            <div class="nav-item">
              <a class="nav-link " href="<?php echo BASE_URL;?>page-login.php" data-placement="left">
                <i><img src="<?php echo BASE_URL;?>assets/svg/new/GS logo.svg" style="height:15px; width: 15px; margin: 3px;"></i>
                <!-- <img src="<?php echo BASE_URL;?>assets/svg/new/GS gray logo.svg" style="height:15px; width: 15px; margin: 5px;"> -->
                <span class="nav-link-title" style="margin-left: 5px;">Grade Sheet</span>
              </a>
            </div>
            <!-- End Collapse -->

               <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link " href="<?php echo BASE_URL;?>apps-library.php" data-placement="left">
                <img src="<?php echo BASE_URL;?>assets/svg/new/L logo.svg" style="height:15px; width: 15px; margin: 3px;">
                <span class="nav-link-title" style="margin-left: 5px;">Library</span>
              </a>
              </div>
              <!-- End Collapse -->

               <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link " href="<?php echo BASE_URL;?>apps-bri.php" data-placement="left">
                <img src="<?php echo BASE_URL;?>assets/svg/new/BRI logo.svg" style="height:15px; width: 15px; margin: 5px;">
                <span class="nav-link-title" style="margin-left: 5px;">BRI</span>
              </a>
              </div>
              <!-- End Collapse -->
              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link " href="<?php echo BASE_URL;?>apps-scheduling.php" data-placement="left">
                <img src="<?php echo BASE_URL;?>assets/svg/new/S logo.svg" style="height:15px; width: 15px; margin: 3px;">
                <span class="nav-link-title" style="margin-left: 5px;">Scheduling</span>
              </a>
              </div>

              <!-- <div class="nav-item">
                <a class="nav-link " href="<?php echo BASE_URL;?>hotwash.php" data-placement="left">
                <img style="height:15px; width:15px; margin:3px;" src="<?php echo BASE_URL;?>assets/svg/2D icons PNG/new/hotwash-logo.png">
                <span class="nav-link-title" style="margin-left: 5px;">Hotwash</span>
              </a>
              </div> -->
          </div>

        </div>
        <!-- End Content -->

       
        <div class="navbar-vertical-footer fixed bg-light" style="margin-bottom: 10px;">
        
            <center>
              <?php 
              $back="";
               if($role=="super admin"){
                $back="background-color:#c32e2e;color:white;";
                }
                if($role=="instructor"){
                  $back="background-color:#c3b02e;color:white";
                  }
                  if($role=="student"){
                  $back="background-color:green;color:white";
                  }
                  ?>
          <h6 style="<?php echo $back?>"><?php 
         
          echo $role;?></h6></center>
        
          <hr style="color:black; margin-top:-5px;">
          <ul class="navbar-vertical-footer-list" style="margin-top:-30px; margin-bottom:-10px;">
            <li class="navbar-vertical-footer-list-item">
              <!-- Style Switcher -->
              <div class="dropdown dropup">
                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-square" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                  <img src="<?php echo BASE_URL;?>assets/svg/new/GS logo.svg" style="height:15px; width: 15px; margin: 3px;">
                </button>

                <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown">
                  <span class="dropdown-header">Apps</span>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>index.php">
                    <img src="<?php echo BASE_URL;?>assets/svg/new/GS logo.svg" style="height:15px; width: 15px; margin: 3px;">
                    <span class="text-truncate" title="">Grade sheet</span>
                  </a>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>apps-bri.php">
                    <img src="<?php echo BASE_URL;?>assets/svg/new/BRI logo.svg" style="height:15px; width: 15px; margin: 5px;">
                    <span class="text-truncate" title="">BRI</span>
                  </a>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>apps-library.php">
                    <img src="<?php echo BASE_URL;?>assets/svg/new/L logo.svg" style="height:15px; width: 15px; margin: 3px;">
                    <span class="text-truncate" title="">Library</span>
                  </a>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>apps-scheduling.php">
                    <img src="<?php echo BASE_URL;?>assets/svg/new/S logo.svg" style="height:15px; width: 15px; margin: 3px;">
                    <span class="text-truncate" title="">Scheduling</span>
                  </a>

                <a class="dropdown-item" href="<?php echo BASE_URL;?>hotwash.php" data-placement="left">
                <img style="height:25px; width:25px;" src="<?php echo BASE_URL;?>assets/svg/2D icons PNG/new/MicrosoftTeams-image (21).png">
                <span class="text-truncate">Hotwash</span>
              </a>
              
                </div>
              </div>

              <!-- End Style Switcher -->
            </li>

            <li class="navbar-vertical-footer-list-item">
              <!-- Other Links -->
              <div class="dropdown dropup">
                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                  <i class="bi-info-circle"></i>
                </button>

                <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="otherLinksDropdown">
                  <span class="dropdown-header">Help</span>
                  <a class="dropdown-item" href="#">
                    <i class="bi-journals dropdown-item-icon"></i>
                    <span class="text-truncate" title="Resources &amp; tutorials">Resources &amp; tutorials</span>
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="bi-command dropdown-item-icon"></i>
                    <span class="text-truncate" title="Keyboard shortcuts">Hints</span>
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="bi-gift dropdown-item-icon"></i>
                    <span class="text-truncate" title="What's new?">What's new?</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <span class="dropdown-header">Contacts</span>
                  <a class="dropdown-item" href="#">
                    <i class="bi-chat-left-dots dropdown-item-icon"></i>
                    <span class="text-truncate" title="Contact support">Contact support</span>
                  </a>
                </div>
              </div>
              <!-- End Other Links -->
            </li>

            <li class="navbar-vertical-footer-list-item">
              <!-- Language -->
              <div class="dropdown dropup">
                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                  <img class="avatar avatar-xss avatar-circle" src="<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="United States Flag">
                </button>

                <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown">
                  <span class="dropdown-header">Select language</span>
                  <a class="dropdown-item" href="#">
                    <img class="avatar avatar-xss avatar-circle me-2" src="<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Flag">
                    <span class="text-truncate" title="English">English (US)</span>
                  </a>
                </div>
              </div>

              <!-- End Language -->
            </li>
            
          </ul>
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </aside>


  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== SECONDARY CONTENTS ========== -->

  <!-- Activity -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasActivityStream" aria-labelledby="offcanvasActivityStreamLabel" style="width:20%;">
    <div class="offcanvas-header">
      
      <h4 id="offcanvasActivityStreamLabel" class="mb-0">Status</h4>

      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

      <!-- Step -->
      
    </div>
  </div>
  <!-- End Activity -->

  <!-- Welcome Message Modal -->
  <div class="modal fade" id="welcomeMessageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Header -->
        <div class="modal-close">
          <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi-x-lg"></i>
          </button>
        </div>
        <!-- End Header -->

        <!-- Body -->
        <div class="modal-body p-sm-5">
          <div class="text-center">
            <div class="w-75 w-sm-50 mx-auto mb-4">
              <img class="img-fluid" src="<?php echo BASE_URL;?>assets/svg/illustrations/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="default">
              <img class="img-fluid" src="<?php echo BASE_URL;?>assets/svg/illustrations-light/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="dark">
            </div>

            <h4 class="h1">Welcome to Front</h4>

            <p>We're happy to see you in our community.</p>
          </div>
        </div>
        <!-- End Body -->

        <!-- Footer -->
        <div class="modal-footer d-block text-center py-sm-5">
          <small class="text-cap text-muted">Trusted by the world's best teams</small>

          <div class="w-85 mx-auto">
            <div class="row justify-content-between">
              <div class="col">
                <img class="img-fluid" src="<?php echo BASE_URL;?>assets/svg/brands/gitlab-gray.svg" alt="Image Description">
              </div>
              <div class="col">
                <img class="img-fluid" src="<?php echo BASE_URL;?>assets/svg/brands/fitbit-gray.svg" alt="Image Description">
              </div>
              <div class="col">
                <img class="img-fluid" src="<?php echo BASE_URL;?>assets/svg/brands/flow-xo-gray.svg" alt="Image Description">
              </div>
              <div class="col">
                <img class="img-fluid" src="<?php echo BASE_URL;?>assets/svg/brands/layar-gray.svg" alt="Image Description">
              </div>
            </div>
          </div>
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </div>


<!--register new user modal-->
<div class="modal fade" id="newuser_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Register New User</h3><br> 
              
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
              </div>
              <div class="modal-body">
                <center>
                <span class="get_val_res" style="color:red"></span>
  <form style="width: 60%; border: 2 px solid black;" class="form form-border" action="admin_register_user.php" novalidate id="reg_form_head">
<input type="hidden" name="ins_id" value="<?php echo $user_id?>">

                            <div class="col-md-12">
                               <input class="form-control" class="login-input" type="text" name="name" placeholder="Full Name" required>
                              
                            </div><br>

                            <div class="col-md-12">
                               <input class="form-control" class="login-input" type="text" name="nickname" placeholder="Nickname" required>
                               
                            </div><br>
                            <div class="col-md-12">
                                <input class="form-control" type="tel" class="login-input" name="phone" placeholder="Enter Your Phone Number" required>
                                
                            </div><br>

                           <div class="col-md-12">
                                <select class="form-select mt-3" name="role" required>
                                <option name="role" value="admin">Admin</option>
                                <option name="role" value="instructor">Instructor</option>
                                <option name="role" value="student">Student</option>
                                 <!-- <option name="role" value="phase manager">Phase Manager</option>
                                <option name="role" value="course manager">Course Manager</option> -->
                               </select>
                              
                           </div><br>

                            <div class="col-md-12">
                               <input class="form-control" type="text" class="login-input" name="email" placeholder="Email Adress">
                               
                            </div><br>

                            <div class="col-md-12">
                              
                               <input class="form-control reg_studid_head" type="text" name="studid"  placeholder="User Id/Username" required>
                               <p style="color:black;"><span style="color:red;">Note: </span>This will be your Login Id</p>
                            </div><br>

                           <div class="col-md-12">
                              <input class="form-control" type="password" name="password" placeholder="Password" required>
                               
                           </div><br>


                           <div class="col-md-12 mt-2">
                            <label class="mb-3 mr-1" for="gender" style="color:black; font-weight:bold; margin:5px;">Gender: </label>

                            <input type="radio" name="gender" id="male" value="male" autocomplete="off" required>
                            <label for="male">Male</label>

                            <input type="radio" name="gender" id="female" value="female" autocomplete="off" required>
                            <label for="female">Female</label>
                            </div><br>

                        <!-- <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label">I confirm that all data are correct</label>
                         <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                        </div> -->
                  

                            <div class="form-button mt-2">
                                <input class="btn btn-success" type="submit" name="submit" value="Register" class="login-button">
        <!-- <p class="link"><a href="login.php">Click to Login</a></p> -->
                            </div>
                        </form>
              </div>
            </div>
          </div>
        </div>

<!-- add vehicle category modal -->
<div class="modal fade" id="add_cate_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Add Vehicle/Tool/Equipment Category</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
                <form method="post" action="insert_vehiclecategory.php" style="width:80%;">
                  <label style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Category :</label>
                  <input class="form-control" type="text" name="vehicletype" value="">
                  <input style="margin:5px;" class="btn btn-success" type="submit" name="Submit" value="Submit">
                </form>
                
            </div>
          </div>
        </div>
      </div>

<!--Add Vehicle Modal-->
<div class="modal fade" id="addvehicle_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Vehicle/Tool/Equipment</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="vehicledata.php" method="post">

            <!-- <div class="form-outline">
                <label class="form-label" for="coursename" style="color:black; font-weight:bold; margin:5px;">Vehicle Name :</label>
                <input type="text" name="VehicleName" class="form-control form-control-md" />
            </div> -->

            <div class="form-outline">
                <label class="form-label" for="coursename" style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Number :</label>
                <input type="text" name="VehicleNumber" class="form-control form-control-md" />
            </div>
                            
            <div class="form-outline">
                <label class="form-label" for="coursename" style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Spot :</label>
                <input type="text" name="VehicleSpot" class="form-control form-control-md" />
            </div>

             <div class="form-outline">
                <label class="form-label" for="VehicleType" style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Category :</label>
                    <select type="text" class="form-control form-control-md" name="VehicleType" required>
                        <option selected disabled value="">-Select Vehicle Category-</option>
                        <?php echo $vehcate; ?>
                    </select>
            </div>
            <br>
            <input style="margin:5px;" class="btn btn-success btn-md" type="submit" value="Submit" name="submitvehicle" />
          </form>
        </center>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

<div class="modal fade" id="vehiclecate_list_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
             <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Vehicle Category list</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!--Vehicle Table-->
              <center>
              <table style="width: max-content;" class="table table-striped table-bordered" id="vehiclecatetablehead">
              <input style="margin:5px; width: 50%;" class="form-control" id="vehiclecateheadsearch" type="text" onkeyup="vehiclecatehead()" placeholder="Search for Vehicle name.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-light">Sr No</th>
               
                <th class="text-light">Category Type</th>
                <th class="text-light">Action</th>
              </thead>
                <?php 
                  
                  $querycate = "SELECT * FROM vehicletype  ORDER BY vehid ASC";
                  $statementcate = $connect->prepare($querycate);
                  $statementcate->execute();
                  if($statementcate->rowCount() > 0)
                    {
                      $resultcate = $statementcate->fetchAll();
                      $sn=1;
                      foreach($resultcate as $row)
                      {
                        
                ?>
                  <tr>
                    <td><?php echo $sn++;$id=$row['vehid'] ?></td>
                    
                    <td><?php echo $row['vehicletype']; ?></td>
                    <td><a onclick="document.getElementById('vehicate_id').value='<?php echo $id=$row['vehid'] ?>';
                         
                          document.getElementById('vec_cate').value='<?php echo $row['vehicletype']; ?>';
                          " data-bs-toggle="modal" data-bs-target="#editvehiclecate"><i class="bi bi-pen-fill text-success"></i></a>
                        </a>
                        <a href="vec_cate_delete.php?id=<?php echo $id?>"><i class="bi bi-trash-fill text-danger"></i></a>
                    </td>
                  </tr>
                  <?php
                    }
                                          
                    }        
                  ?>      
              </table>
            </center>
              </div>
        </div>
    </div>
</div>

<!-- edit vehicle modal -->
<div class="modal fade" id="editvehiclecate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title text-success" id="exampleModalLabel">Edit Vehicles Category</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <?php 
                    $quecate = "SELECT * FROM vehicletype where vehid='$id'";
                    $statecate = $connect->prepare($quecate);
                    $statecate->execute();
                    if($statecate->rowCount() > 0)
                      {
                        $resucate = $statecate->fetchAll();
                        $sn4=1;
                        foreach($resucate as $row)
                        {
                  ?>
                  <div class="container">
                    <form method="post" action="edit_vehiclecate_head.php">
                        <input class="form-control" type="hidden" name="vehicate_id" value="" id="vehicate_id" value="<?php echo $row['vehid'] ?>">
                        <label style="color:black; font-weight:bold; margin:5px;">Vehicle category :</label>
                        <input class="form-control" type="text" name="veh_cate" value="<?php echo $row['vehicletype'] ?>" id="vec_cate">
                        <br>
                        <input style="margin:5px;" class="btn btn-success" type="submit" name="submit" value="Submit">
                    </form>
                  </div>
                  <?php
                    }
                     }        
                  ?>     
            </div>
          </div>
        </div>
      </div>

<!-- vehicle list modal -->
<div class="modal fade" id="vehicle_list_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
             <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Vehicle/Tool/Equipment list</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!--Vehicle Table-->
              <center>
              <table style="width: max-content;" class="table table-striped table-bordered" id="vehicletablehead">
              <input style="margin:5px; width: 50%;" class="form-control" id="vehicleheadsearch" type="text" onkeyup="vehiclehead()" placeholder="Search for Vehicle name.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-light">Sr No</th>
               
                <th class="text-light">Vehicle Type</th>
                <th class="text-light">Vehicle Number</th>
                <th class="text-light">Vehicle Spot</th>
                <th class="text-light">Action</th>
              </thead>
                <?php 
                  
                  $query = "SELECT * FROM vehicle  ORDER BY id ASC";
                  $statement = $connect->prepare($query);
                  $statement->execute();
                  if($statement->rowCount() > 0)
                    {
                      $result = $statement->fetchAll();
                      $sn=1;
                      foreach($result as $row)
                      {
                        $vehtype=$row['VehicleType'];
                        $vehitype= $connect->prepare("SELECT vehicletype FROM vehicletype WHERE vehid=?");
                                 $vehitype->execute([$vehtype]);
                                $vehicletype = $vehitype->fetchColumn();
                ?>
                  <tr>
                    <td><?php echo $sn++;$id=$row['id'] ?></td>
                    
                    <td><?php echo $vehicletype; ?></td>
                    <td><?php echo $row['VehicleNumber'] ?></td>
                    <td><?php echo $row['VehicleSpot'] ?></td>
                    <td><a onclick="document.getElementById('vehicle_id').value='<?php echo $id=$row['id'] ?>';
                         
                          document.getElementById('veh_type').value='<?php echo $vehicletype; ?>';
                          document.getElementById('veh_nub').value='<?php echo $row['VehicleNumber'] ?>';
                          document.getElementById('veh_spot').value='<?php echo $row['VehicleSpot'] ?>';
                          " data-bs-toggle="modal" data-bs-target="#editvehicle"><i class="bi bi-pen-fill text-success"></i></a>
                        </a>
                        <a href="vec_delete.php?id=<?php echo $id?>"><i class="bi bi-trash-fill text-danger"></i></a>
                    </td>
                  </tr>
                  <?php
                    }
                                          
                    }        
                  ?>      
              </table>
            </center>
              </div>
        </div>
    </div>
</div>

<!-- edit vehicle modal -->
<div class="modal fade" id="editvehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title text-success" id="exampleModalLabel">Edit Vehicles/Tool/Equipment</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <?php 
                    $que = "SELECT * FROM vehicle where id='$id'";
                    $state = $connect->prepare($que);
                    $state->execute();
                    if($state->rowCount() > 0)
                      {
                        $resu = $state->fetchAll();
                        $sn4=1;
                        foreach($resu as $row11)
                        {
                  ?>
                  <div class="container">
                    <form method="post" action="edit_vehicle_head.php">
                        <input class="form-control" type="hidden" name="vehicle_id" value="" id="vehicle_id" value="<?php echo $row11['id'] ?>">
                  
                        <!-- <label style="color:black; font-weight:bold; margin:5px;">Vehicle Name :</label>
                        <input class="form-control" type="text" name="vec_name" value="<?php echo $row11['VehicleName'] ?>" id="vec_name"> -->

                        <label style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Spot :</label>
                        <input class="form-control" type="text" name="veh_spot" value="<?php echo $row11['VehicleSpot'] ?>" id="vec_spot">

                        <label style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Number :</label>
                        <input class="form-control" type="text" name="veh_nub" value="<?php echo $row11['VehicleNumber'] ?>" id="vec_nub">
                        <label class="form-label" style="color:black; font-weight:bold;">Vehicle/Tool/Equipment Type :</label>
                        <select class="form-control" name="veh_type" value="" id="vec_type">
                        <option value="" selected><?php echo $row11['VehicleType']; ?></option>
                        <option><?php echo $vehcate?></option>
                        </select>
                        <br>
                        <input style="margin:5px;" class="btn btn-success" type="submit" name="submit" value="Submit">
                    </form>
                  </div>
                  <?php
                    }
                     }        
                  ?>     
            </div>
          </div>
        </div>
      </div>
<!--Course List Modal-->
<div class="modal fade" id="acedemic_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                <H3>Do You Want To Give Acedemic?</h3>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="acedemic_selection.php" method="post"> 
                                <input type="hidden" id="get_noti_id" value="" name="noti_id">
                                <input type="hidden" id="get_ac_class_id" name="get_ac_class_id">
                                <button type="button" name="chose_button" id="accept_acdemic" value="1" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#accept_acedemic_modal">Accept</button>
                  
                                <button type="submit" name="chose_button" value="0" class="btn btn-danger">Decline</button> 
                                </form>
                              </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal fade" id="accept_acedemic_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                <H3>Do You Want To Give Acedemic?</h3>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                 <form action="selected_student.php" method="post"> 
                                  <input type="hidden" id="get_noti_ides" name="noties_id">
                                  <input type="hidden" id="get_ac_class_ide" name="ac_id">
                                 <table id="student_fetch" class="table table-striped table-bordered">
                                  <thead>
                                  <th>sr no</th>
                                  <th>Action</th>
                                  <th>student</th>
                                  </thead>
                                  <tbody>

                                  </tbody>
                                 </table>
                                <input type="submit" class="btn btn-success" value="Select">
                                </form>
                              </div>
                              </div>
                            </div>
                          </div>
<!-- course list modal -->
<div class="modal fade" id="course_list_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Course List</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table table-striped table-bordered" id="newcoursetable">
                <input style="margin: 5px;" class="form-control" type="text" id="newcoursesearch" onkeyup="course()" placeholder="Search for Course name.." title="Type in a name">
                <thead class="bg-dark">
                  <th class="text-light">Sr No</th>
                  <!-- <th class="text-light">Course Id</th> -->
                  <th class="text-light">Course Name</th>
                  <th class="text-light">Course Code</th>
                  <th class="text-light">Course Date</th>
                  <th class="text-light">Nick Name</th>
                  <th class="text-light">Student Names</th>
                  <th class="text-light">Course Manager</th>
                  <th class="text-light">Action</th>
                </thead>
                <?php 
                  
                  $query1_cs = "SELECT * FROM newcourse group by CourseCode,CourseName";
                  $statement1_cs = $connect->prepare($query1_cs);
                  $statement1_cs->execute();
                  if($statement1_cs->rowCount() > 0)
                    {
                      $result1_cs = $statement1_cs->fetchAll();
                      $sn1=1;
                      foreach($result1_cs as $row1)
                      {
                       $crs_name=$row1['CourseName'];
                                $course_name= $connect->prepare("SELECT course FROM ctppage WHERE CTPid=?");
                                $course_name->execute([$crs_name]);
                                $name2 = $course_name->fetchColumn();
                        $crs_man=$row1['CourseManager'];
                                $course_man= $connect->prepare("SELECT name FROM users WHERE id=?");
                                $course_man->execute([$crs_man]);
                                $name2_man = $course_man->fetchColumn();
                        ?>
                  <tr>
                    <td><?php echo $sn1++;?></td>
                    <td><?php echo $name2;?></td>
                    <td><?php echo $course=$row1['CourseCode'];?></td>
                    <td><?php echo $row1['CourseDate'];?></td>
                    <td><?php echo $row1['nick_name'];?></td>
                    <td><?php 
                    $query_for_student = "SELECT * FROM newcourse where CourseCode='$course' and CourseName='$crs_name'";
                    $statement_query_for_student = $connect->prepare($query_for_student);
                                       $statement_query_for_student->execute();
                                       if($statement_query_for_student->rowCount() > 0)
                                           {
                                               $result_query_for_student = $statement_query_for_student->fetchAll();
                                               foreach($result_query_for_student as $row_query_for_student)
                                            {
                                              $course_ides=$row_query_for_student['Courseid'];
                                                $std_id=$row_query_for_student['StudentNames'];
                                                $query2 = "SELECT * FROM users where id='$std_id'";
                                                $statement2 = $connect->prepare($query2);
                                                $statement2->execute(); 
                                                if($statement2->rowCount() > 0)
                                                {
                                                    $result2 = $statement2->fetchAll();
                                                 
                                                    foreach($result2 as $row2)
                                                    {
                                                      
                                                       ?>
                                                    
                                                      <ul style=" list-style-type: none; display: block;">
                                                      <li style="text-decoration: none;"><?php echo $row2['name'] ; ?>
                                                      <a href="delete_student_course.php?id=<?php echo $course_ides?>"><i class="bi bi-x-circle"></i></a>
                                                      
                                                    </li>
                                                     </ul>
                                                    <?php   }
                                                }
                                                
                                            
                                        }
                                      }
                    ?></td>
                    <td><?php echo $name2_man;?></td>
                    <td><a onclick="document.getElementById('Course_id').value='<?php echo $row1['Courseid'] ?>';
                                    document.getElementById('Course_Name').value='<?php echo $crs_name; ?>';
                                    document.getElementById('Course_Code').value='<?php echo $row1['CourseCode'] ?>';
                                    document.getElementById('Course_Date').value='<?php echo $row1['CourseDate'] ?>';
                                    document.getElementById('Symbol_').value='<?php echo $row1['nick_name'] ?>';
                                    document.getElementById('Course_Manager').value='<?php echo $name2_man; ?>';
                                    // document.getElementById('Ins').value='<?php echo $row1['Instructor'] ?>';
                                  " data-bs-toggle="modal" data-bs-target="#editcourse"><i class="bi bi-pen-fill text-success" class="fetch_course_data"></i></a>
                          <a href="newcourse_delete.php?Courseid=<?php echo $row1['Courseid'] ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                    </td>
                  </tr>
                  <?php
                    }
                    }        
                 ?>      
             </table>
            </div>
          </div>
        </div>
      </div>

      <!-- edit course modal -->
<div class="modal fade" id="editcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Edit New Course</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php 
                  
                 $ins="";
                 $qe2= "SELECT * FROM users where role='instructor'";
             $st12 = $connect->prepare($qe2);
             $st12->execute();
            
             if($st12->rowCount() > 0)
                 {
                     $re12 = $st12->fetchAll();
                   foreach($re12 as $row12)
                     {
                      $ins.= '<option value="'.$row12['id'].'">'.$row12['name'].'</option>';
                     }
                 
                 }
             
                ?>
                <form method="post" action="edit_course.php" id="course_edit_fetched_data">
                     <input class="form-control" type="text" name="Crsid" value="" id="Course_id" readonly hidden>
                    <label style="color:black; font-weight:bold; margin:5px;" hidden>Course Name :</label>
                    <input class="form-control" type="text" name="Course_Name" value="" id="Course_Name" hidden>
                    <label style="color:black; font-weight:bold; margin:5px;" hidden>Course Code :</label>
                    <input class="form-control" type="text" name="Course_Code" value="" id="Course_Code" hidden>
                    <label style="color:black; font-weight:bold; margin:5px;">Course Date :</label>
                    <input class="form-control" type="date" name="Course_Date" value="" id="Course_Date">
                    <label style="color:black; font-weight:bold; margin:5px;">Nick Name :</label>
                    <input class="form-control" type="text" name="Nick_name" value="" id="Symbol_">
                    <?php 
                     $std1="";
                     $select_std= "SELECT * FROM users where role='student'";
                     $select_std_st = $connect->prepare($select_std);
                       $select_std_st->execute();
 
                       if($select_std_st->rowCount() > 0)
                           {
                               $result_select_std = $select_std_st->fetchAll();
                             foreach($result_select_std as $row_select_std)
                               {
                                 $check_id=$row_select_std['id'];
                                 $check_std1 = "SELECT Courseid FROM newcourse where StudentNames='$check_id'";
                                 $check_std1st = $connect->prepare($check_std1);
                                 $check_std1st->execute();
                                   if($check_std1st->rowCount() <= 0)
                                   {
                                  $std1.= '<option value="'.$row_select_std['id'].'">'.$row_select_std['name'].'</option>';
                               }
                           
                           }
                         }
                    ?>
                    <label style="color:black; font-weight:bold; margin:5px;">Student Name :</label>
                    <select multiple class="form-control"  name="Student_Names[]" id="Student_Names1">
                    <?php echo $std1?>
                  </select> 
                    <label style="color:black; font-weight:bold; margin:5px;">Course Manager :</label>
                    <select type="text" id="Course_Manager" name="Course_Manager" class="form-control">
                      
                    <?php echo $ins?>
                       
                    </select>                    
                    <br>
                    <input class="btn btn-success" type="submit" name="submit1" value="Submit">
                </form>
              
            </div>
          </div>
        </div>
   </div> 

<!--Select which ctp u want-->
<div class="modal fade" id="select_ctp_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Select CTP</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <center>
                        <form action="Next-home.php" method="post">
                            <label class="form-label" for="student" style="color:black; font-weight:bold; margin:5px;">Select CTP :</label>
                            <select type="text" class="form-control form-control-md" name="ctp" required>
                                <option selected disabled value="">-select CTP-</option>
                                <?php echo $output2 ?>
                            </select>
                        <br>
                        <button class="btn btn-success" type="submit" name="submit_Phase">Way To Phase</button>
                        </form>
                </center>
              </div>
            </div>
          </div>
        </div>

<!--Ctp list data modal-->
<div class="modal fade" id="ctp_data_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">CTP List</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!--ctp table-->
             <table class="table table-striped" id="ctptable">
                <input style="margin:5px;" class="form-control" id="ctpsearch" type="text" onkeyup="ctp()" placeholder="Search for Course name.." title="Type in a name">
                <thead class="bg-dark">
                  <th class="text-light">Sr No</th>
                  <th class="text-light">Course Name</th>
                  <!-- <th class="text-light">Manual</th> -->
                  <th class="text-light">Type</th>
                  <th class="text-light">Vehicle Type</th>
                  <th class="text-light">Symbol</th>
                  <th class="text-light">Sponcors</th>
                  <th class="text-light">Location</th>
                  <th class="text-light">CourseAim</th>
                  <th class="text-light">ClassSize</th>
                  <th class="text-light">Action</th>
                </thead>
                <?php 
                  $query3 = "SELECT * FROM ctppage ORDER BY CTPid ASC";
                  $statement2 = $connect->prepare($query3);
                  $statement2->execute();
                    if($statement2->rowCount() > 0)
                      {
                        $result2 = $statement2->fetchAll();
                        $sn2=1;
                        foreach($result2 as $row8)
                        {
                          $vehtype1=$row8['VehicleType'];
                        $vehitype1= $connect->prepare("SELECT vehicletype FROM vehicletype WHERE vehid=?");
                                 $vehitype1->execute([$vehtype1]);
                                $vehicletype1 = $vehitype1->fetchColumn();
                ?>
                <tr>
                  <td><?php echo $sn2++;?></td>
                  
                  <td><?php echo $row8['course'];?></td>
                  <!-- <td><?php echo $row8['manual'];?></td> -->
                  <td><?php echo $row8['Type'];?></td>
                  <td><?php echo $vehicletype1;?></td>
                  <td><?php echo $row8['symbol'];?></td>
                  <td><?php echo $row8['Sponcors'];?></td>
                  <td><?php echo $row8['Location'];?></td>
                  <td><?php echo $row8['CourseAim'];?></td>
                  <td><?php echo $row8['ClassSize'];?></td>
                  <td><a onclick="document.getElementById('C_id').value='<?php echo $row8['CTPid'] ?>';
                                  document.getElementById('course_2').value='<?php echo $row8['course'] ?>';
                                  // document.getElementById('manual_2').value='<?php echo $row8['manual'] ?>';
                                  document.getElementById('Type_2').value='<?php echo $row8['Type'] ?>';
                                  document.getElementById('vehicle_type2').value='<?php echo $vehicletype1; ?>';
                                  document.getElementById('symbol_2').value='<?php echo $row8['symbol'] ?>';
                                  document.getElementById('Spon_2').value='<?php echo $row8['Sponcors'] ?>';
                                  document.getElementById('Location_2').value='<?php echo $row8['Location'] ?>';
                                  document.getElementById('Courseaim_2').value='<?php echo $row8['CourseAim'] ?>';
                                  document.getElementById('Classsize_2').value='<?php echo $row8['ClassSize'] ?>';
                                  " data-bs-toggle="modal" data-bs-target="#editctp"><i class="bi bi-pen-fill text-success"></i></a>
                        <a onclick="document.getElementById('ctp_id_to_del').value='<?php echo $row8['CTPid'] ?>';" data-bs-toggle="modal" data-bs-target="#first_confrim_ctp"><i class="bi bi-trash-fill text-danger"></i></a>
                  </td>
                </tr>
                <?php
                  }
                    }        
                ?>      
              </table>
            </div>
          </div>
        </div>
      </div>

  <!--Edit Ctp modal-->
   <div class="modal fade" id="editctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Edit CTP</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
                <form method="post" action="edit_ctp.php">
                    <!-- <label class="text-success" style="font-size:larger;">CTP Id</label> -->
                    <input class="form-control" type="hidden" name="Cid" value="" id="C_id" readonly>
                    <label style="color:black; font-weight:bold; margin:5px;">Course Name :</label>
                    <input class="form-control" type="text" name="course" value="" id="course_2">
                    <!-- <label style="color:black; font-weight:bold; margin:5px;">Manual :</label>
                    <input class="form-control" type="text" name="manual" value="" id="manual"> -->
                    <label style="color:black; font-weight:bold; margin:5px;">Type :</label>
                    <input class="form-control" type="text" name="type" value="" id="Type_2">
                    <label style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Type :</label>
                    <!-- <input class="form-control" type="text" name="vehtype" value="" id="vehicletype"> -->
                    <select class="form-control" type="text" name="vehtype" id="vehicle_type2">
                        <option selected disabled value="">-Select Vehicle/Tool/Equipment Category-</option>
                        <?php echo $vehicate; ?>
                    </select>
                    <label style="color:black; font-weight:bold; margin:5px;">Symbol :</label>
                    <input class="form-control" type="text" name="Symbol" value="" id="symbol_2">
                    <label style="color:black; font-weight:bold; margin:5px;">Sponcors :</label>
                    <input class="form-control" type="text" name="Spon" value="" id="Spon_2">
                    <label style="color:black; font-weight:bold; margin:5px;">Location :</label>
                    <input class="form-control" type="text" name="Location" value="" id="Location_2">
                    <label style="color:black; font-weight:bold; margin:5px;">Course Aim :</label>
                    <input class="form-control" type="text" name="Courseaim" value="" id="Courseaim_2">
                    <label style="color:black; font-weight:bold; margin:5px;">Course Size :</label>
                    <input class="form-control" type="text" name="Classsize" value="" id="Classsize_2"><br>
                    <input class="btn btn-success" type="submit" name="submit" value="Submit">
                </form>
              
            </div>
          </div>
        </div>
</div>
<!--confiramation modal box to delete ctp-->
<div class="modal fade" id="third_confrim_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Final confrim</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="ctp_delete.php" method="post">
            <input type="hidden" id="ctp_id_to_del" name="CTPid" value="">
            <label class="text-dark" style="font-weight:bolder;">please enter Admin Password:</label>
            <input type="Password" name="delete" class="form-control">
            <button type="submit" class="btn btn-danger">Delete</button>
            </form> 
        </div>
          
        </div>
      </div>
    </div>

<div class="modal fade" id="first_confrim_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">First confrim?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#second_confrim_ctp">are you sure to delete ctp?</button>
          </div>
          
        </div>
      </div>
    </div>
    <div class="modal fade" id="second_confrim_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Data which will Get deleted</h5>
            
           
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <ul>
                <li>Phase</li>
                <li>Class</li>
                <li>Item And Subitem</li>
                <li>Course</li>
                <li>Emergancy</li>
                <li>Test</li>
                
          </ul>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#third_confrim_ctp">are you really sure to delete ctp??</button>
          </div>
          
        </div>
      </div>
    </div>

<!--Permission grade modal-->
<div class="modal fade" id="per_list_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document"> 
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Grade List</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form method="get" action="update_grade_per.php">
              <table class="table table-striped">
               
                          <thead>
                        <th>Sr No</th>
                        <th>Type</th>
                        
                        <th>Action</th>
                      
                    </thead>
                                <?php 
                               $grade_per="";
                               $que = "SELECT * FROM grade_per ORDER BY id ASC";
                               $stat = $connect->prepare($que);
                               $stat->execute();
                               if($stat->rowCount() > 0)
                               {
                                   $result6 = $stat->fetchAll();
                                   $sn7=1;
                                   foreach($result6 as $row6)
                                   {
                                        ?>
                                         <tr>
                                        <td><?php echo $sn7++;?></td>
                                        <td><?php echo $row6['grade'];?></td>
                                        <td>
                                        <input type="hidden" name="grade_name[]" value="<?php echo $row6['grade']?>">
                                          <input type="checkbox" value="1" <?php if ($row6['permission'] == "1") {
                                            echo 'checked';
                                        } ?> name="grade[<?php echo $row6['grade'];?>]">
                                        </td>
             
                                       </tr>
              <?php
                                        }
                                    
                                    }        
       ?>      
       
                            </table>
                            <button class="btn btn-success" type="submit" name="savephase">Submit</button>
                            </form>
              </div>
            </div>
          </div>
        </div>

<!--Percentage table modal-->
<div class="modal fade" id="per_table_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Percentage Table</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table style=" width: max-content;" class="table table-striped">
                <input style="width:50%; display: none;" class="form-control" type="text" onkeyup="score()" placeholder="Search for name.." title="Type in a name">
                  <thead class="bg-dark">
                    <th class="text-light">Sr No</th>
                    <th class="text-light">Type</th>
                    <th class="text-light">Percentage</th>
                    <th class="text-light">Color</th>
                    <th class="text-light">Action</th>   
                  </thead>
                  <?php 
                    $output6 ="";
                    $query6 = "SELECT * FROM percentage  ORDER BY id ASC";
                    $statement6 = $connect->prepare($query6);
                    $statement6->execute();
                    if($statement6->rowCount() > 0)
                      {
                        $result6 = $statement6->fetchAll();
                        $sn6=1;
                        foreach($result6 as $row6)
                        {
                  ?>
                  <tr>
                     <td><?php echo $id=$row6['id'];?></td>
                     <td><?php echo $row6['percentagetype'];?></td>
                     <td><?php echo $row6['percentage'];?></td>
                     <td><?php echo $row6['color'];?></td>
                     <td><a onclick="document.getElementById('per_id_1').value='<?php echo $row6['id'] ?>';
                            document.getElementById('percentage_name_1').value='<?php echo $row6['percentage'] ?>';
                            " data-bs-toggle="modal" data-bs-target="#edit_percentage_head"><i class="bi bi-pen-fill text-success"></i></a>
                     </td>
                 </tr>
                 <?php
                  }
                                    
                  }        
                 ?>      
              </table>
            </div>
          </div>
        </div>
      </div>




<!--Edit Percentage Table-->
<div class="modal fade" id="edit_percentage_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Edit Percentage</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form method="post" action="edit_percentage.php">
                    <input class="form-control" type="hidden" name="id" value="" id="per_id_1">
                    <!-- <input type="text" name="percentagetype" value="" id="percentage_type"> -->
                    <input class="form-control" type="text" name="percentage" value="" id="percentage_name_1"><br>
                    <!-- <input type="text" name="color" value="" id="percentage_color"> -->
                    <center>
                    <input class="btn btn-success" type="submit" name="submit" value="Submit">
                  </center>
                </form>

            </div>
          </div>
        </div>
      </div>

<!-- department list modal -->

<div class="modal fade" id="department_list_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Department List</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                 <!--Department Table-->
                 <center>
              <table class="table table-striped table-bordered" id="departmenttablehead">
                  <input style=" margin:5px;" class="form-control" id="departmentsearchhead" type="text" onkeyup="departmenthead()" placeholder="Search for name.." title="Type in a name">
                  <thead class="bg-dark">
                    <th class="text-light">Sr No</th>
                    <!-- <th class="text-light">Id</th> -->
                    <th class="text-light">School Name</th>
                    <th class="text-light">Department Name</th>
                    <th class="text-light">Type</th>
                    <th class="text-light">Add Logo</th>
                    <th class="text-light">Action</th>
                  </thead>
                  <?php 
                    $query4 = "SELECT * FROM homepage ORDER BY id ASC";
                    $statement2 = $connect->prepare($query4);
                    $statement2->execute();
                    if($statement2->rowCount() > 0)
                      {
                        $result2 = $statement2->fetchAll();
                        $sn4=1;
                        foreach($result2 as $row2)
                        {
                  ?>
                  <tr>
                    <td><?php echo $sn4++;?></td>
                    <!-- <td><?php echo $row2['id'];?></td> -->
                    <td><?php echo $row2['school_name'];?></td>
                    <td><?php echo $row2['department_name'];?></td>
                    <td><?php echo $row2['type'];?></td>
                    <td><form action="department_logo.php" method="post" enctype="multipart/form-data" style="width:50%;">
              <table>
                <tr>
                  <td>
                            <input type="hidden" class="form-control" name="id" readonly value="<?php echo $row2['id'] ?>" style="width:50%;">
                              <input style="width:100px;" type="file" class="form-control" name="file"></td>
                              <td>  <input style="margin:5px;" type="submit" name="submit" value="Upload" class="btn btn-info"></td>
                              </tr>
                              </table>
                            </form></td>
                    <td><a onclick="document.getElementById('id_head').value='<?php echo $row2['id'] ?>';
                                    document.getElementById('school_name_head').value='<?php echo $row2['school_name'] ?>';
                                    document.getElementById('department_name_head').value='<?php echo $row2['department_name'] ?>';
                                    document.getElementById('type_head').value='<?php echo $row2['type'] ?>';
                                    " data-bs-toggle="modal" data-bs-target="#edit_department_head"><i class="bi bi-pen-fill text-success"></i></a>
                          <a href="department_delete.php?id=<?php echo $id?>"><i class="bi bi-trash-fill text-danger"></i></a>
                    </td>
                  </tr>
                  <?php
                    }
                     }        
                  ?>      
                </table></center>
            </div>
          </div>
        </div>
      </div>

<!--Edit Department modal-->
<div class="modal fade" id="edit_department_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Edit Department</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post" action="edit_department.php">
                  <!-- <label class="text-success" style="font-size:larger;">ID</label> -->
                  <input type="hidden" name="id" value="" id="id_head" readonly>
                  <label style="color:black; font-weight:bold; margin:5px;">School Name :</label>
                  <input type="text" name="school_name" value="" id="school_name_head" class="form-control">
                  <label style="color:black; font-weight:bold; margin:5px;">Department Name :</label>
                  <input type="text" name="department_name" value="" id="department_name_head" class="form-control">
                  <label style="color:black; font-weight:bold; margin:5px;">Type :</label>
                  <input type="text" name="type" value="" id="type_head" class="form-control"><br>
                  <input class="btn btn-success" type="submit" name="submit" value="Submit">
                  </form>
            </div>
          </div>
        </div>
      </div>


  <!-- Modal for view message -->
<div class="modal fade" id="view_msg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Message</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <input type="hidden" id="get_id_on_view">
        <h5 id="get_msg"></h5>
      
      </div>
    
    </div>
  </div>
</div>


<!--Select which ctp u want-->
<div class="modal fade" id="select_course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-primary" id="exampleModalLabel">Select Course</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <center>
                  <form action="add_group.php" method="post">
                  <span class="nav-link-title" style="color:black; font-weight:bold;">Course Name</span>
                  <select style="margin:5px;" type="text" id="course" data-bs-toggle="collapse" class="form-select" autocomplete="off" name="course">
                      <option readonly value="0">Select course</option>
                      <?php 
                      
                   $query1 = "SELECT newcourse.nick_name,newcourse.CourseCode,newcourse.CourseName,newcourse.Courseid
                   FROM newcourse
                   INNER JOIN sidebar_ctp ON newcourse.CourseName = sidebar_ctp.ctp_id group by CourseCode,CourseName";
                   
                   $statement1 = $connect->prepare($query1);
                   $statement1->execute();
                  
                   if($statement1->rowCount() > 0)
                       {
                           $result1 = $statement1->fetchAll();
                      
                            foreach($result1 as $row1)
                        {
                          $course_nickname=$row1['nick_name'];
                          $symbol_name=$row1['CourseCode'];
                          $course_name_value=$row1['CourseName'];
                                $cor_name= $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
                                $cor_name->execute([$course_name_value]);
                                $name_of_ctp = $cor_name->fetchColumn();
                          ?>
                           
                            <option id="<?php echo $row1['CourseCode']?>" class="<?php echo $row1['CourseName'] ?>" value="<?php echo $row1['Courseid'] ?>"><?php echo $name_of_ctp .' - '. '0'.$symbol_name;?></option>
                        <?php }
         
                         } ?>
                    </select>
                    </form>
                </center>
              </div>
            </div>
          </div>
        </div>
  <!-- End Welcome Message Modal -->
  <!-- ========== END SECONDARY CONTENTS ========== -->

  <!-- JS Global Compulsory  -->
  <script src="<?php echo BASE_URL;?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="<?php echo BASE_URL;?>assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

  <script src="<?php echo BASE_URL;?>assets/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/jsvectormap/dist/js/jsvectormap.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/jsvectormap/dist/maps/world.js"></script>

  <!-- JS Front -->
  <script src="<?php echo BASE_URL;?>assets/js/theme.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/js/hs.theme-appearance-charts.js"></script>

  <script src="<?php echo BASE_URL;?>assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/prism/prism.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/hs-show-animation/dist/hs-show-animation.min.js"></script>
  <script src="<?php echo BASE_URL;?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>
<a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
     data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": "2rem"
         },
         "show": {
           "bottom": "2rem"
         },
         "hide": {
           "bottom": "-2rem"
         }
       }
     }'>
    <i class="bi-chevron-up"></i>
  </a>

  <!-- <script>
  $(document).ajaxStart(function() {
    $("#loading-screen").show();
    $("#header").hide();
  });
  $(document).ajaxStop(function() {
    $("#loading-screen").hide();
    $("#header").show();
  });
</script> -->

  <script>
    (function() {
      // INITIALIZATION OF GO TO
      // =======================================================
      new HSGoTo('.js-go-to')

      
      // INITIALIZATION OF MEGA MENU
      // =======================================================
      new HSMegaMenu('.js-mega-menu', {
          desktop: {
            position: 'bottom'
          }
        })
    })()
  </script>

<script type="text/javascript">

  $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
</script>


  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
      $(document).on("click",".noti_anchor",function()
  {
    var id = $(this).attr('id');
     $("#get_noti_id").val(id);
     
     if(id){
      $.ajax({
        type:'POST',
        url:'update_noti.php',
        data:'id='+id,
        success:function(response){
          var got_id=$("#get_ac_class_id").val(response); 


        }
      });
   }
  

  });
  $(document).on("click",".get_id_of_noti",function()
  {
    var id = $(this).attr('id');
    
     $("#get_id_on_view").val(id);
     
     if(id){
      $.ajax({
        type:'POST',
        url:'fetch_msg.php',
        data:'id='+id,
        success:function(response){
          $('#get_msg').empty();
          $("#get_msg").append(response);
        }
      });
   }

    $(document).on("click",".fetch_course_data",function()
  {
   
    var courseid=$("#Course_id").val();
  
    alert(courseid);
    if(courseid){
    $.ajax({
        type:'POST',
        url:'check_available_Student.php',
        data:'courseid='+courseid,
        success:function(response){
          // alert(response);
          // window.location.reload();
        }
      });
    }
  }); 

  

  });
  $(document).on("click","#read_all_noti",function()
  {
    var id=$("#user_id_val").val();
    
    if(id){
      $.ajax({
        type:'POST',
        url:'mark_read.php',
        data:'id='+id,
        success:function(response){
          alert("Marked all read");
          window.location.reload();
          
        }
      });
   }

  });
  $(document).on("click","#read_all_noti_admin",function()
  {
    var id=$("#user_id_val").val();
    if(id){
      $.ajax({
        type:'POST',
        url:'mark_read_admin.php',
        data:'id='+id,
        success:function(response){
          alert("Marked all read");
          window.location.reload();
          
          
        }
      });
   }

  });
  
  $(document).on("click","#accept_acdemic",function()
  {
    //alert("hello");
    var id=$("#get_noti_id").val();
    $("#get_noti_ides").val(id);
    $("#get_ac_class_ide").val($("#get_ac_class_id").val());
        if(id){
          $.ajax({
              type:'POST',
              url:'fetch_student_acedemic.php',
              data:'id='+id,
               success:function(response){
                //alert(response);
                $('#student_fetch tbody').empty();
                $("#student_fetch tbody").append(response);

              }
            });
   }
  });
  $("#txt_search").keyup(function(){
        var search = $(this).val();
    // alert(search);
        if(search != ""){

            $.ajax({
              type:'POST',
             url:'getSearch.php',
               data:'search='+search,
                success:function(response){
             
                  $('.searchResult').empty();
                 $('.searchResult').append(response);
               
                }
            });
        }else{
          $('.searchResult').empty();
        }
    

    });
    $(document).on("click",".got_result",function()
     {
          var text=$(this).text();
          
          var get_ids=$(this).val();
        
          $("#txt_search").val(text);
         
          $('#get_id_select').attr('value',get_ids);
          $('.searchResult').empty();
        });



      $(document).on("keyup",".reg_studid_head",function()
      {
          var check=$(this).val();
    
          if(check){
            $.ajax({
              type:'POST',
              url:'check_id.php',
              data:'check='+check,
              success:function(response){
                $('.get_val_res').empty();
                $(".get_val_res").append(response);
              }
            });
        }
        }); 
      // INITIALIZATION OF DATERANGEPICKER
      // =======================================================
      $('.js-daterangepicker').daterangepicker();

      $('.js-daterangepicker-times').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'M/DD hh:mm A'
        }
      });

      var start = moment();
      var end = moment();

      function cb(start, end) {
        $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
      }

      $('#js-daterangepicker-predefined').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);

      cb(start, end);
    });
  </script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      window.onload = function () {
        

        // INITIALIZATION OF NAVBAR VERTICAL ASIDE
        // =======================================================
        new HSSideNav('.js-navbar-vertical-aside').init()


        // INITIALIZATION OF NAV SCROLLER
        // =======================================================
        new HsNavScroller('.js-nav-scroller', {
          delay: 400
        })


        // INITIALIZATION OF FORM SEARCH
        // =======================================================
        new HSFormSearch('.js-form-search')


        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()


        // INITIALIZATION OF CHARTJS
        // =======================================================
        var updatingChartDatasets = [
          [
            [18, 51, 60, 38, 88, 50, 40, 52, 88, 80, 60, 70],
            [27, 38, 60, 77, 40, 50, 49, 29, 42, 27, 42, 50]
          ],
          [
            [77, 40, 50, 49, 27, 38, 60, 42, 50, 29, 42, 27],
            [60, 38, 18, 51, 88, 50, 40, 52, 60, 70, 88, 80]
          ]
        ]


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init(document.querySelector('#updatingLineChart'), {
          data: {
            datasets: [
              {
                data: updatingChartDatasets[0][0]
              },
              {
                data: updatingChartDatasets[0][1]
              }
            ]
          }
        })

        const updatingLineChart = HSCore.components.HSChartJS.getItem(0)

        // Call when tab is clicked
        document.querySelectorAll('[data-bs-toggle="chart"]')
          .forEach($item => {
            $item.addEventListener('click', e => {
              let keyDataset = e.currentTarget.getAttribute('data-datasets')

              // Update datasets for chart
              updatingLineChart.data.datasets.forEach((dataset, key) => {
                dataset.data = updatingChartDatasets[keyDataset][key];
              });
              updatingLineChart.update();
            })
          })


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init(document.querySelector('.js-chartjs-doughnut-half'), {
          options: {
            tooltips: {
              postfix: "%"
            },
            cutoutPercentage: 85,
            rotation: Math.PI,
            circumference: Math.PI
          }
        });


        // INITIALIZATION OF VECTOR MAP
        // =======================================================
        const markers = [
          {
            "coords": [38, -97],
            "name": "United States",
            "active": 200,
            "new": 40,
            "flag": "<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/us.svg",
            "code": "US"
          },
          {
            "coords": [20, 77],
            "name": "India",
            "active": 300,
            "new": 100,
            "flag": "<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/in.svg",
            "code": "IN"
          },
          {
            "coords": [60, -105],
            "name": "Canada",
            "active": 400,
            "new": 500,
            "flag": "<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/ca.svg",
            "code": "CA"
          },
          {
            "coords": [51, 9],
            "name": "Germany",
            "active": 120,
            "new": 600,
            "flag": "<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/de.svg",
            "code": "DE"
          },
          {
            "coords": [54, -2],
            "name": "United Kingdom",
            "active": 140,
            "new": 100,
            "flag": "<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/gb.svg",
            "code": "GB"
          },
          {
            "coords": [1.3, 103.8],
            "name": "Singapore",
            "active": 56,
            "new": 0,
            "flag": "<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/sg.svg",
            "code": "SG"
          },
          {
            "coords": [9.0, 8.6],
            "name": "Nigeria",
            "active": 34,
            "new": 2,
            "flag": "<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/ng.svg",
            "code": "NG"
          },
          {
            "coords": [61.5, 105.3],
            "name": "Russia",
            "active": 135,
            "new": 46,
            "flag": "<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/ru.svg",
            "code": "RU"
          },
          {
            "coords": [35.8, 104.1],
            "name": "China",
            "active": 325,
            "new": 75,
            "flag": "<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/cn.svg",
            "code": "CN"
          },
          {
            "coords": [-10, -51],
            "name": "Brazil",
            "active": 242,
            "new": 17,
            "flag": "<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/br.svg",
            "code": "BR"
          }
        ];
        const tooltipTemplate = function (marker) {
          return `
          <span class="d-flex align-items-center mb-2">
            <img class="avatar avatar-xss avatar-circle" src="${marker.flag}" alt="Flag">
            <span class="h5 ms-2 mb-0">${marker.name}</span>
          </span>
          <div class="d-flex justify-content-between" style="max-width: 10rem;">
            <strong>Active:</strong>
            <span class="ms-2">${marker.active}</span>
          </div>
          <div class="d-flex justify-content-between" style="max-width: 10rem;">
            <strong>New:</strong>
            <span class="ms-2">${marker.new}</span>
          </div>
        `;
        };

        HSCore.components.HSJsVectorMap.init('.js-jsvectormap', {
          markers,
          onRegionTooltipShow(tooltip, code) {
            let marker = markers.find(function (marker) {
              return marker.code === code;
            });

            if (marker) {
              tooltip.selector.innerHTML = tooltipTemplate(marker);
            } else {
              tooltip.selector.style.display = 'none';
            }
          },
          onMarkerTooltipShow: function (tooltip, code) {
            tooltip.selector.innerHTML = tooltipTemplate(markers[code]);
          },
          backgroundColor: HSThemeAppearance.getAppearance() === 'dark' ? '#25282a' : '#132144'
        })

        const vectorMap = HSCore.components.HSJsVectorMap.getItem(0)

        window.addEventListener('on-hs-appearance-change', e => {
          vectorMap.setBackgroundColor(e.detail === 'dark' ? '#25282a' : '#132144')
        })
      }
    })()
  </script>

  <!-- Style Switcher JS -->

  <script>
      (function () {
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

        // Function to set active style in the dorpdown menu and set icon for dropdown trigger
        const setActiveStyle = function () {
          $variants.forEach($item => {
            if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
              $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
              return $item.classList.add('active')
            }

            $item.classList.remove('active')
          })
        }

        // Add a click event to all items of the dropdown to set the style
        $variants.forEach(function ($item) {
          $item.addEventListener('click', function () {
            HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
          })
        })

        // Call the setActiveStyle on load page
        setActiveStyle()

        // Add event listener on change style to call the setActiveStyle function
        window.addEventListener('on-hs-appearance-change', function () {
          setActiveStyle()
        })
      })()
    </script>

        <script>
          
$(document).ready(function(){
  var get_id = sessionStorage.getItem('set_id');
            $('#set_ctp').val(get_id);
          $('#set_ctp').on('change', function(){
            var get_val = $(this).val();
            sessionStorage.setItem('set_id',get_val);
            document.cookie = "fixed_ctp_id = " +get_val;
            window.location.href = 'Next-home.php';
            // window.location.reload();
          });
  //set value for first dropdown on page change
      var course = sessionStorage.getItem('id');
      $('#course').val(course);
      //set value of javascript to php variable
      
        //on change of course dropdown send value to selec_std.php and fetch value
        $('#course').on('change', function(){
          
          var countryID = $(this).val();
          
          var id = $(this).children(":selected").attr("id");
         
          var class1 = $(this).children(":selected").attr("class");
          
          if(countryID){
          
            $.ajax({
                      type:'POST',
                      url:'selec_std.php',
                      data:'course='+id+'&ides='+class1,
                      success:function(html){
                       console.log(html);
                      sessionStorage.setItem('id',countryID);
                      
                      document.cookie = "phpgetcourse = " +class1;
                      document.cookie = "allstudent = " + html;
                      $('#state').html(html);
                      
                        }
                  }); 
              }
            
        });

          //onchange of second dropdown select dynamic value from selec.php
            $('#state').on('change', function(){
          
              var studentname = $(this).val();
            //  console.log(studentname);   
                if(studentname){
                
                  sessionStorage.setItem('student',studentname);
                  document.cookie = "student = " + studentname;
                  var getUrl =window.location;
                      var baseUrl =getUrl.pathname.split('/')[4];
                      
                        if(baseUrl=="gradesheet.php"){
                          window.location.href = 'actual.php';
                        }else{
                         window.location.reload();
                        }
                  }
            });
            //set value of selected student in javascript session
            var getstudent = sessionStorage.getItem('student');
            $('#state').val(getstudent);


});
</script>

<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
  <!-- End Style Switcher JS -->

  <script>
function course() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("newcoursesearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("newcoursetable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!--search bar for vehicle table-->
  <script>
function vehiclehead() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("vehicleheadsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("vehicletablehead");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<!--search bar for courselist table-->
  <script>
function vehiclecatehead() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("vehiclecateheadsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("vehiclecatetablehead");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<!--search bar for deparment list table-->
  <script>
function departmenthead() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("departmentsearchhead");
  filter = input.value.toUpperCase();
  table = document.getElementById("departmenttablehead");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<!--search bar for ctp list table-->
  <script>
function ctp() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("ctpsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("ctptable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


</body>
</html>