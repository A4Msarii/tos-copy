<?php

$fetched_per = "";
$fetched_pers2 = "";
$fetch_notis2 = "SELECT * FROM notifications where is_read = '0' AND to_userid =  '$user_id' AND type != 'message' AND extra_data != 'threshold' AND extra_data != 'reached_cout' ORDER BY date DESC";

$fetch_noti2sts2 = $connect->prepare($fetch_notis2);
$fetch_noti2sts2->execute();

if ($fetch_noti2sts2->rowCount() > 0) {
  $re3 = $fetch_noti2sts2->fetchAll();
  foreach ($re3 as $row3) {
    $if_admin = $row3['if_admin'];
    //msg
    $msg = $row3['extra_data'];
    //notification asked for
    $selected_user = $row3['user_id'];
    $fetch_name_of_selected = $connect->prepare("SELECT name FROM `users` WHERE id=?");
    $fetch_name_of_selected->execute([$selected_user]);
    $of_user_id = $fetch_name_of_selected->fetchColumn();
    //for whic class
    $table_name_ofdata = $row3['type'];
    $id_of_data = $row3['data'];
    if ($table_name_ofdata == "actual") {
      $fetch_class_value = $connect->prepare("SELECT symbol FROM $table_name_ofdata WHERE id=?");
    } else if ($table_name_ofdata == "sim") {
      $fetch_class_value = $connect->prepare("SELECT shortsim FROM $table_name_ofdata WHERE id=?");
    } else if ($table_name_ofdata == "academic") {
      $fetch_class_value = $connect->prepare("SELECT shortacademic FROM $table_name_ofdata WHERE id=?");
    }
    $fetch_class_value->execute([$id_of_data]);
    $class_name = $fetch_class_value->fetchColumn();
    $for_userid1 = $row3['to_userid'];
    $fetch_std_name1 = $connect->prepare("SELECT name FROM `users` WHERE id=?");
    $fetch_std_name1->execute([$for_userid1]);
    $std_name1 = $fetch_std_name1->fetchColumn();
    $noti_id = $row3['id'];
    $extra_data = $row3['extra_data'];
    $cloned_ides = $row3['permission'];
    if ($extra_data == "filled your gradsheet for") {
      $fetched_pers2 .= '
                      <a href="' . BASE_URL . 'includes/Pages/newgradesheet.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $user_id . '&noti_id=' . $noti_id . '">
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
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span> ' . $msg . ' <span class="text-danger" style="text-decoration:underline;">' . $class_name . '</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row3['date'])) . '</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>';
    } else if ($extra_data == "Has Decline Academic For" || $extra_data == "Has Accepted Academic For") {
      $fetched_pers2 .= '
                      <a href="' . BASE_URL . 'includes/Pages/academic.php?noti_id=' . $noti_id . '">
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
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span> ' . $msg . ' <span class="text-danger" style="text-decoration:underline;">' . $class_name . '</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row3['date'])) . '</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>';
    } else if ($extra_data == "filled your repeated gradsheet for") {
      $fetched_pers2 .= '
                      <a href="' . BASE_URL . 'includes/Pages/newgradesheetcl.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $user_id . '&noti_id=' . $noti_id . '&clone_ides=' . urlencode(base64_encode($cloned_ides)) . '">
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
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span> ' . $msg . ' <span class="text-danger" style="text-decoration:underline;">' . $class_name . '- C' . $cloned_ides . '</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row3['date'])) . '</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>';
    }
  }
  $icon = '<span class="btn-status btn-sm-status btn-status-danger"></span>';
} else {
  // $fetched_per.='<li>No New Notification</li>';
  $icon = '<span></span>';
}

$fetched_pers11 = "";
$fetch_notis11 = "SELECT * FROM notifications where is_read='0' and user_id='$user_id' and to_userid='$user_id' and extra_data='threshold' ORDER BY date DESC";

$fetch_noti11sts2 = $connect->prepare($fetch_notis11);
$fetch_noti11sts2->execute();

if ($fetch_noti11sts2->rowCount() > 0) {
  $re11 = $fetch_noti11sts2->fetchAll();
  foreach ($re11 as $row11) {
    $data_id = $row11['data'];
    $selected_user1 = $row11['user_id'];
    $extra_data = $row11['extra_data'];
    $fetch_name_of_selected1 = $connect->prepare("SELECT name FROM `users` WHERE id=?");
    $fetch_name_of_selected1->execute([$selected_user1]);
    $of_user_id1 = $fetch_name_of_selected1->fetchColumn();
    $fetch_warning_name = $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
    $fetch_warning_name->execute([$data_id]);
    $warning_name = $fetch_warning_name->fetchColumn();

    if ($extra_data == "threshold") {
      $fetched_pers11 .= '
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
                                          <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $of_user_id1 . '</span> you are about to reach <span class="text-danger" style="text-decoration:underline;">' . $warning_name . '</span></h5><br>
                                          <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row11['date'])) . '</i></small>
                                          </div>
                                        </div>
                                      </li>
                                    </ul>
                                         </a>';
    }
  }
  $icon = '<span class="btn-status btn-sm-status btn-status-danger"></span>';
} else {
  // $fetched_per.='<li>No New Notification</li>';
  // $icon='<span></span>';
}

$fetched_pers12 = "";
$fetch_notis12 = "SELECT * FROM notifications where is_read='0' and user_id='$user_id' and to_userid='$user_id' and extra_data='reached_cout' ORDER BY date DESC";

$fetch_noti12sts2 = $connect->prepare($fetch_notis12);
$fetch_noti12sts2->execute();

if ($fetch_noti12sts2->rowCount() > 0) {
  $re12 = $fetch_noti12sts2->fetchAll();
  foreach ($re12 as $row12) {
    $noti_id = $row12['id'];
    $data_id = $row12['data'];
    $selected_user1 = $row12['user_id'];
    $extra_data = $row12['extra_data'];
    $fetch_name_of_selected1 = $connect->prepare("SELECT name FROM `users` WHERE id=?");
    $fetch_name_of_selected1->execute([$selected_user1]);
    $of_user_id1 = $fetch_name_of_selected1->fetchColumn();

    $fetch_warning_name = $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
    $fetch_warning_name->execute([$data_id]);
    $warning_name = $fetch_warning_name->fetchColumn();
    if ($extra_data == "reached_cout") {
      $fetched_pers12 .= '
                                       <a >
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
                                               <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $of_user_id1 . '</span> You Have reached to <span class="text-danger" style="text-decoration:underline;">' . $warning_name . '</span></h5><br>
                                               <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row12['date'])) . '</i></small>
                                               <button style="float:right;" id="' . $data_id . '" demo="' . $noti_id . '" class="btn btn-soft-success get_id_doc" data-bs-toggle="modal" data-bs-target="#view_doc">Read</button>
                                               </div>
                                             </div>
                                           </li>
                                         </ul>
                                              </a>';
    }
  }
  $icon = '<span class="btn-status btn-sm-status btn-status-danger"></span>';
} else {
  // $fetched_per.='<li>No New Notification</li>';
  // $icon='<span></span>';
}
// notification for instructor to fill gradesheet and unlock gradesheet
$fetched_per2 = "";
$fetch_noti2 = "SELECT * FROM notifications where is_read='0' AND to_userid='$user_id' and type!='message' and extra_data!='threshold' and extra_data!='reached_cout' ORDER BY date DESC";

$fetch_noti2st2 = $connect->prepare($fetch_noti2);
$fetch_noti2st2->execute();

if ($fetch_noti2st2->rowCount() > 0) {
  $re3 = $fetch_noti2st2->fetchAll();
  foreach ($re3 as $row3) {

    $msg = $row3['extra_data'];
    //notification asked for
    $selected_user = $row3['user_id'];
    $fetch_name_of_selected = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
    $fetch_name_of_selected->execute([$selected_user]);
    $of_user_id = $fetch_name_of_selected->fetchColumn();
    //for whic class
    $table_name_ofdata = $row3['type'];

    if ($table_name_ofdata == "actual") {
      $fetch_class_value = $connect->prepare("SELECT symbol FROM $table_name_ofdata WHERE id=?");
    } else if ($table_name_ofdata == "sim") {
      $fetch_class_value = $connect->prepare("SELECT shortsim FROM $table_name_ofdata WHERE id=?");
    } else if ($table_name_ofdata == "academic") {
      $fetch_class_value = $connect->prepare("SELECT shortacademic FROM $table_name_ofdata WHERE id=?");
    }
    $id_of_data = $row3['data'];
    $fetch_class_value->execute([$id_of_data]);
    $class_name = $fetch_class_value->fetchColumn();
    $for_userid1 = $row3['to_userid'];
    $fetch_std_name1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
    $fetch_std_name1->execute([$for_userid1]);
    $std_name1 = $fetch_std_name1->fetchColumn();
    $noti_id = $row3['id'];
    $extra_data = $row3['extra_data'];
    $cloned_ides = $row3['permission'];
    if ($extra_data == "is selected to fill gradsheet of" || $extra_data == "You requested gradsheet is unlock for" || $extra_data == "You requested a gradesheet for a reset") {
      $fetched_per2 .= '
                      <a href="' . BASE_URL . 'includes/Pages/newgradesheet.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $selected_user . '&noti_id=' . $noti_id . '">
                      <ul class="list-group list-group-flush navbar-card-list-group">
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            <div class="col-auto">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                <span id='.$noti_id.' class="delet_notis"><i class="bi bi-x-circle-fill text-danger"></i></span>
                                </div>
                             </div>
                            </div>
                            <div class="col ms-n2">
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> ' . $msg . '<span class="text-danger" style="text-decoration:underline;"> ' . $class_name . '</span> for <span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row3['date'])) . '</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>';
      // notification for to give academic class
    } elseif ($extra_data == "has request you to give acedemic for") {
      $fetched_per2 .= '
                      <a data-bs-toggle="modal" id="' . $noti_id . '" class="noti_anchor" data-bs-target="#acedemic_modal">
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
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span> ' . $msg . ' <span class="text-danger" style="text-decoration:underline;">' . $class_name . '</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row3['date'])) . '</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>';
    } else if ($extra_data == "cloned_gradsheet") {
      $xString = str_repeat("X", $cloned_ides);
      $fetched_per2 .= '
      <div style="position: relative;display: inline-block;">
                            <div style="    position: absolute;top: 22px;z-index: 99;left: -13px;">
                              <div class="d-flex align-items-center">
                                <div class="form-check">
                                <a href="' . BASE_URL . 'includes/Pages/delete_notis.php?id='.$noti_id.'"><i class="bi bi-x-circle-fill text-danger"></i></a>
                                </div>
                             </div>
                            </div>
                      <a href="' . BASE_URL . 'includes/Pages/newgradesheetcl.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $selected_user . '&noti_id=' . $noti_id . '&clone_ides=' . urlencode(base64_encode($cloned_ides)) . '" style="display: inline-block;width: 95%;margin-left: 25px;">
                      <ul class="list-group list-group-flush navbar-card-list-group">
                        <li class="list-group-item form-check-select">
                          <div class="row">
                            
                            <div class="col ms-n2">
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> is selected to fill repeat gradsheet for <span class="text-danger" style="text-decoration:underline;">' . $class_name . $xString . '</span> for <span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row3['date'])) . '</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>
                             </div>';
    } else if ($extra_data == "clone_unlock_request") {
      $xString = str_repeat("X", $cloned_ides);
      $fetched_per2 .= '
                      <a href="' . BASE_URL . 'includes/Pages/newgradesheetcl.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $selected_user . '&noti_id=' . $noti_id . '&clone_ides=' . urlencode(base64_encode($cloned_ides)) . '">
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
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> You requested that the gradsheet be unlocked<span class="text-danger" style="text-decoration:underline;"> ' . $class_name . $xString . '</span> for <span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row3['date'])) . '</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>';
    }else if ($extra_data == "permission grade") {
      $fetched_per2 .= '
                      <a href="' . BASE_URL . 'includes/Pages/newgradesheet.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $selected_user . '&noti_id=' . $noti_id . '">
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
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> requested a gradsheet with a grade of E for<span class="text-danger" style="text-decoration:underline;"> ' . $class_name . '</span> for <span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row3['date'])) . '</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>';
      // notification for to give academic class
    }else if ($extra_data == "You requested a clone gradesheet for a reset") {
      $fetched_per2 .= '
                      <a href="' . BASE_URL . 'includes/Pages/newgradesheetcl.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $selected_user . '&noti_id=' . $noti_id . '&clone_ides=' . urlencode(base64_encode($cloned_ides)) . '">
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
                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> You requested a clone gradesheet for a reset<span class="text-danger" style="text-decoration:underline;"> ' . $class_name . ' -C' . $cloned_ides . '</span> for <span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span></h5><br>
                              <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row3['date'])) . '</i></small>
                              </div>
                            </div>
                          </li>
                        </ul>
                             </a>';
    }
  }
  $icon = '<span class="btn-status btn-sm-status btn-status-danger"></span>';
} else {
  // $fetched_per.='<li>No New Notification</li>';
  // $icon='<span></span>';
}

$fetched_per3 = "";  $xString12="";
$fetch_noti3 = "SELECT * FROM notifications where is_read='0' AND if_admin='$role' and extra_data!='threshold' and extra_data!='reached_cout' ORDER BY date DESC";

$fetch_noti3st2 = $connect->prepare($fetch_noti3);
$fetch_noti3st2->execute();

if ($fetch_noti3st2->rowCount() > 0) {
  $re4 = $fetch_noti3st2->fetchAll();
  foreach ($re4 as $row4) {
    $if_admin = $row4['if_admin'];
  
    //msg
    $msg = $row4['extra_data'];
    //notification asked for
    $selected_user = $row4['user_id'];
    $fetch_name_of_selected = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
    $fetch_name_of_selected->execute([$selected_user]);
    $of_user_id = $fetch_name_of_selected->fetchColumn();
    //for whic class
    $table_name_ofdata = $row4['type'];
    $id_of_data = $row4['data']; $extra_data = $row4['extra_data'];
    if($table_name_ofdata==""){
      $fetch_class_value = $connect->prepare("SELECT roles FROM roles WHERE id=?");
      $fetch_class_value->execute([$id_of_data]);
      $class_name = $fetch_class_value->fetchColumn();
     }elseif($table_name_ofdata!=""){
    if ($table_name_ofdata == "actual") {
      $fetch_class_value = $connect->prepare("SELECT symbol FROM $table_name_ofdata WHERE id=?");
    } else if ($table_name_ofdata == "sim") {
      $fetch_class_value = $connect->prepare("SELECT shortsim FROM $table_name_ofdata WHERE id=?");
    } else if ($table_name_ofdata == "academic") {
      $fetch_class_value = $connect->prepare("SELECT shortacademic FROM $table_name_ofdata WHERE id=?");
    }
    $fetch_class_value->execute([$id_of_data]);
    $class_name = $fetch_class_value->fetchColumn();
   }
   
    $for_userid1 = $row4['to_userid'];
    $fetch_std_name1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
    $fetch_std_name1->execute([$for_userid1]);
    $std_name1 = $fetch_std_name1->fetchColumn();
    $noti_id = $row4['id'];
   
    $cloned_ides = $row4['permission'];
    $xString12 = str_repeat("X", $cloned_ides);
    if ($extra_data == "requesting to unlock") {
      $fetched_per3 .= '
                           <a href="' . BASE_URL . 'includes/Pages/newgradesheet.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $selected_user . '&noti_id=' . $noti_id . '">
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
                                   <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> Asking for unlock <span class="text-danger" style="text-decoration:underline;">' . $class_name . '</span> for <span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span></h5>
                                   <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row4['date'])) . '</i></small>
                                   </div>
                                 </div>
                               </li>
                             </ul>
                                  </a>';
    } else if ($extra_data == "cloned delete ask") {
      $fetched_per3 .= '
                          <a href="' . BASE_URL . 'includes/Pages/actual.php?noti_id=' . urlencode(base64_encode($noti_id)) . '">
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
                                  <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> Asking for Delete Cloned Class <span class="text-danger" style="text-decoration:underline;">' . $class_name . '</span> for <span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span></h5>
                                  <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row4['date'])) . '</i></small>
                                  </div>
                                </div>
                              </li>
                            </ul>
                                 </a>';
    }
    if ($extra_data == "requesting to reset") {
      $fetched_per3 .= '
            <a href="' . BASE_URL . 'includes/Pages/newgradesheet.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $selected_user . '&noti_id=' . $noti_id . '">
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
                    <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> Asking for Reset <span class="text-danger" style="text-decoration:underline;">' . $class_name . '</span> for <span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span></h5>
                    <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row4['date'])) . '</i></small>
                    </div>
                  </div>
                </li>
              </ul>
                   </a>';
    }
    if ($extra_data == "requesting_unlock") {
      $fetched_per3 .= '
                      <a href="' . BASE_URL . 'includes/Pages/newgradesheetcl.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $selected_user . '&noti_id=' . $noti_id . '&clone_ides=' . urlencode(base64_encode($cloned_ides)) . '">
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
                                  <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> Asking for unlock <span class="text-danger" style="text-decoration:underline;">' . $class_name . $xString12 . '</span> for <span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span></h5>
                                  <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row4['date'])) . '</i></small>
                                  </div>
                                </div>
                              </li>
                            </ul>
                                 </a>';
    }
    if ($extra_data == "requesting to grade") {
      $fetched_per3 .= '
                           <a href="' . BASE_URL . 'includes/Pages/newgradesheet.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $selected_user . '&noti_id=' . $noti_id . '">
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
                                   <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> Asking for grade E <span class="text-danger" style="text-decoration:underline;">' . $class_name . '</span> for <span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span></h5>
                                   <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row4['date'])) . '</i></small>
                                   </div>
                                 </div>
                               </li>
                             </ul>
                                  </a>';
    }
    if ($extra_data == "requesting to reset clone") {
      $fetched_per3 .= '
                      <a href="' . BASE_URL . 'includes/Pages/newgradesheetcl.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $selected_user . '&noti_id=' . $noti_id . '&clone_ides=' . urlencode(base64_encode($cloned_ides)) . '">
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
                                  <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> Asking for Reset <span class="text-danger" style="text-decoration:underline;">' . $class_name . $xString12 . '</span> for <span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span></h5>
                                  <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row4['date'])) . '</i></small>
                                  </div>
                                </div>
                              </li>
                            </ul>
                                 </a>';
    }
    if ($extra_data == "requesting to grade clone") {
      $fetched_per3 .= '
                           <a href="' . BASE_URL . 'includes/Pages/newgradesheetcl.php?id=' . urlencode(base64_encode($id_of_data)) . '&class_name=' . urlencode(base64_encode($table_name_ofdata)) . '&std_id=' . $selected_user . '&noti_id=' . $noti_id . '&clone_ides=' . urlencode(base64_encode($cloned_ides)) . '">
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
                                   <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> Asking for grade E for clone class <span class="text-danger" style="text-decoration:underline;">' . $class_name .  $xString12 . '</span> for <span class="text-danger" style="text-decoration:underline;">' . $of_user_id . '</span></h5>
                                   <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row4['date'])) . '</i></small>
                                   </div>
                                 </div>
                               </li>
                             </ul>
                                  </a>';
    }
    if ($extra_data == "ask for role change") {
      $fetched_per3 .= '
                           <a href="role_noti_chage.php">
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
                                   <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span> Asking for Role  <span class="text-danger" style="text-decoration:underline;">' . $class_name. '</span></h5>
                                   <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row4['date'])) . '</i></small>
                                   </div>
                                 </div>
                               </li>
                             </ul>
                                  </a>';
    }
  }
  $icon = '<span class="btn-status btn-sm-status btn-status-danger"></span>';
} else {
  // $fetched_per.='<li>No New Notification</li>';
  // $icon='<span></span>';
}

// notification for message
$fetched_per4 = "";
$fetch_noti4 = "SELECT * FROM notifications where is_read='0' AND type='message' and to_userid='$user_id' and extra_data!='threshold' and extra_data!='reached_cout' ORDER BY date DESC";

$fetch_noti4st2 = $connect->prepare($fetch_noti4);
$fetch_noti4st2->execute();

if ($fetch_noti4st2->rowCount() > 0) {
  $re4 = $fetch_noti4st2->fetchAll();
  foreach ($re4 as $row4) {

    $for_userid1 = $row4['user_id'];
    $fetch_std_name1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
    $fetch_std_name1->execute([$for_userid1]);
    $std_name1 = $fetch_std_name1->fetchColumn();

    $fetched_per4 .= '
                                <a id="' . $row4['id'] . '" class="get_id_of_noti">
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

                                      <h5 class="text-body text-dark">You Have Message From <span class="text-danger" style="text-decoration:underline;">' . $std_name1 . '</span></h5>
                                        <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row4['date'])) . '</i></small>
                                        <button style="float:right;" class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#view_msg">View</button>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                       </a>';
  }
  $icon = '<span class="btn-status btn-sm-status btn-status-danger"></span>';
} else {
  // $fetched_per.='<li>No New Notification</li>';
  // $icon='<span></span>';
}
$fetched_per11 = "";
$fetched_per15 = "";
if ($role == "instructor") {
  $fetch_noti15 = "SELECT * FROM notifications where is_read='0' and to_userid='$user_id' and  extra_data='threshold' ORDER BY date DESC";

  $fetch_noti15st2 = $connect->prepare($fetch_noti15);
  $fetch_noti15st2->execute();

  if ($fetch_noti15st2->rowCount() > 0) {
    $re15 = $fetch_noti15st2->fetchAll();
    foreach ($re15 as $row15) {
      $data_id = $row15['data'];
      $selected_user1 = $row15['user_id'];
      $extra_data = $row15['extra_data'];
      $fetch_name_of_selected1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
      $fetch_name_of_selected1->execute([$selected_user1]);
      $of_user_id1 = $fetch_name_of_selected1->fetchColumn();
      $fetch_warning_name = $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
      $fetch_warning_name->execute([$data_id]);
      $warning_name = $fetch_warning_name->fetchColumn();

      if ($extra_data == "threshold") {
        $fetched_per15 .= '
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
                                               <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $of_user_id1 . '</span> Is about to reach <span class="text-danger" style="text-decoration:underline;">' . $warning_name . '</span></h5>
                                               <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row15['date'])) . '</i></small>
                                               </div>
                                             </div>
                                           </li>
                                         </ul>
                                              </a>';
      }
    }
    $icon = '<span class="btn-status btn-sm-status btn-status-danger"></span>';
  } else {
    // $fetched_per.='<li>No New Notification</li>';
    // $icon='<span></span>';
  }

  $fetch_noti11 = "SELECT * FROM notifications where is_read='0' and to_userid='$user_id' and extra_data='reached_cout' ORDER BY date DESC";

  $fetch_noti11st2 = $connect->prepare($fetch_noti11);
  $fetch_noti11st2->execute();

  if ($fetch_noti11st2->rowCount() > 0) {
    $re11 = $fetch_noti11st2->fetchAll();
    foreach ($re11 as $row11) {
      $data_id = $row11['data'];
      $selected_user1 = $row11['user_id'];
      $extra_data = $row11['extra_data'];
      $fetch_name_of_selected1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
      $fetch_name_of_selected1->execute([$selected_user1]);
      $of_user_id1 = $fetch_name_of_selected1->fetchColumn();

      $fetch_warning_name = $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
      $fetch_warning_name->execute([$data_id]);
      $warning_name = $fetch_warning_name->fetchColumn();
      if ($extra_data == "reached_cout") {
        $fetched_per11 .= '
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
                                              <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $of_user_id1 . '</span> Has reached to <span class="text-danger" style="text-decoration:underline;">' . $warning_name . '</span></h5>
                                              <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row11['date'])) . '</i></small>
                                              </div>
                                            </div>
                                          </li>
                                        </ul>
                                             </a>';
      }
    }
    $icon = '<span class="btn-status btn-sm-status btn-status-danger"></span>';
  } else {
    // $fetched_per.='<li>No New Notification</li>';
    // $icon='<span></span>';
  }
}
$fetched_per17 = "";
$fetch_noti17 = "SELECT * FROM notifications where is_read='0' and if_admin='$role' and extra_data='threshold' ORDER BY date DESC";

$fetch_noti17st2 = $connect->prepare($fetch_noti17);
$fetch_noti17st2->execute();

if ($fetch_noti17st2->rowCount() > 0) {
  $re17 = $fetch_noti17st2->fetchAll();
  foreach ($re17 as $row17) {
    $data_id = $row17['data'];
    $selected_user1 = $row17['user_id'];
    $extra_data = $row17['extra_data'];
    $fetch_name_of_selected1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
    $fetch_name_of_selected1->execute([$selected_user1]);
    $of_user_id1 = $fetch_name_of_selected1->fetchColumn();

    $fetch_warning_name = $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
    $fetch_warning_name->execute([$data_id]);
    $warning_name = $fetch_warning_name->fetchColumn();
    if ($extra_data == "reached_cout") {
      $fetched_per17 .= '
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
                                                   <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $of_user_id1 . '</span> Has reached to <span class="text-danger" style="text-decoration:underline;">' . $warning_name . '</span></h5>
                                                   <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row17['date'])) . '</i></small>
                                                   </div>
                                                 </div>
                                               </li>
                                             </ul>
                                                  </a>';
    }
  }
  $icon = '<span class="btn-status btn-sm-status btn-status-danger"></span>';
} else {
  // $fetched_per.='<li>No New Notification</li>';
  // $icon='<span></span>';
}
$fetched_per16 = "";
$fetch_noti16 = "SELECT * FROM notifications where is_read='0' and if_admin='$role' and extra_data='reached_cout' ORDER BY date DESC";

$fetch_noti16st2 = $connect->prepare($fetch_noti16);
$fetch_noti16st2->execute();

if ($fetch_noti16st2->rowCount() > 0) {
  $re16 = $fetch_noti16st2->fetchAll();
  foreach ($re16 as $row16) {
    $data_id = $row16['data'];
    $selected_user1 = $row16['user_id'];
    $extra_data = $row16['extra_data'];
    $fetch_name_of_selected1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
    $fetch_name_of_selected1->execute([$selected_user1]);
    $of_user_id1 = $fetch_name_of_selected1->fetchColumn();

    $fetch_warning_name = $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
    $fetch_warning_name->execute([$data_id]);
    $warning_name = $fetch_warning_name->fetchColumn();
    if ($extra_data == "reached_cout") {
      $fetched_per16 .= '
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
                                                   <h5 class="text-body text-dark"><span class="text-danger" style="text-decoration:underline;">' . $of_user_id1 . '</span> Has reached to <span class="text-danger" style="text-decoration:underline;">' . $warning_name . '</span></h5>
                                                   <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row16['date'])) . '</i></small>
                                                   </div>
                                                 </div>
                                               </li>
                                             </ul>
                                                  </a>';
    }
  }
  $icon = '<span class="btn-status btn-sm-status btn-status-danger"></span>';
} else {
  // $fetched_per.='<li>No New Notification</li>';
  // $icon='<span></span>';
}
$fetched_per98 = "";
$fetch_noti98 = "SELECT * FROM notifications where is_read='0' and user_id='$user_id' and extra_data='test scheduled' ORDER BY date DESC";

$fetch_noti98st2 = $connect->prepare($fetch_noti98);
$fetch_noti98st2->execute();

if ($fetch_noti98st2->rowCount() > 0) {
  $re98 = $fetch_noti98st2->fetchAll();
  foreach ($re98 as $row98) {
    $data_id1 = $row98['data'];
    $selected_user11 = $row98['user_id'];
    $extra_data1 = $row98['extra_data'];
    $fetch_name_of_selected11 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
    $fetch_name_of_selected11->execute([$selected_user11]);
    $of_user_id11 = $fetch_name_of_selected11->fetchColumn();

    $fetch_exam_name = $connect->prepare("SELECT course_id FROM `examname` WHERE id=?");
    $fetch_exam_name->execute([$data_id1]);
    $examm_name1 = $fetch_exam_name->fetchColumn();
    $fetch_exam_name1 = $connect->prepare("SELECT examName FROM `examname` WHERE id=?");
    $fetch_exam_name1->execute([$data_id1]);
    $examm_name11 = $fetch_exam_name1->fetchColumn();
    $fetch_exam_name11 = $connect->prepare("SELECT start_hours FROM `examname` WHERE id=?");
    $fetch_exam_name11->execute([$data_id1]);
    $examm_name111 = $fetch_exam_name11->fetchColumn();
    $fetch_exam_name12 = $connect->prepare("SELECT dates FROM `examname` WHERE id=?");
    $fetch_exam_name12->execute([$data_id1]);
    $examm_name112 = $fetch_exam_name12->fetchColumn();
   $dateTime = DateTime::createFromFormat('H:i', $examm_name111);
    $time12 = $dateTime->format('h:i a');
    $exam_name = "";
              if ($examm_name1 == "") {
                $exam_name = $examm_name11;
              } else {
                $exam_name1 = $examm_name11;
                $fetch_exam_name = $connect->query("SELECT shorttest FROM test WHERE id = '$exam_name1'");
                $exam_name = $fetch_exam_name->fetchColumn();
              }
    if ($extra_data1 == "test scheduled") {
      $fetched_per98 .= '
                                           <a href="' . BASE_URL . 'Test/index.php">
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
                                                   <h5 class="text-body text-dark">' . $of_user_id11 .' your exam is scheduled for  <span class="text-danger" style="text-decoration:underline;"> '.$exam_name. ' on '.$examm_name112.' at ' . $time12 . '!</span></h5>
                                                   <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row98['date'])) . '</i></small>
                                                   </div>
                                                 </div>
                                               </li>
                                             </ul>
                                                  </a>';
    }
  }
  $icon = '<span class="btn-status btn-sm-status btn-status-danger"></span>';
} else {
  // $fetched_per.='<li>No New Notification</li>';
  // $icon='<span></span>';
}

?>