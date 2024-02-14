<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>includes/Pages/gradestyle.css">
<?php
$get_ins_name = "";

$vehicleName = $connect->query("SELECT vehicleName FROM ctppage WHERE CTPid = '$std_course1'");
$vehicleNameData = $vehicleName->fetchColumn();

if ($vehicleNameData == "") {
  $vehicleNameData1 = "-";
} else {
  $vehicleNameData1 = $vehicleNameData;
}
?>
<div class="col-lg-10 mb-3 mb-lg-5">
  <!-- Card -->
  <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

    <!-- Body -->
    <div class="card-body">
      <div class="row">
        <div class="col-11">
          <button class="btn btn-secondary" title="Check Reason For Unlock Gradesheet" style="font-size: large;padding: 5px;padding-top: 0px;padding-bottom: 0px;font-weight: bold;" data-bs-toggle="modal" data-bs-target="#lockReasonModalCloned"><i class="bi bi-card-list"></i></button>

      <?php $fetch_value_unlock = $connect->query("SELECT reason
      FROM unclock_gradsheet_reason1 where g_id='$grad_id' and cl_id='$get_clone_ides'
      ORDER BY id DESC
      LIMIT 1;");
      $fetch_value_unlockdata = $fetch_value_unlock->fetchColumn();
      echo '<span style="font-size: large;font-weight: bold;" class="text-secondary">Unlock Reason : </span>';
      echo '<span class="badge bg-danger" style="margin:5px;font-size:large;">'.$fetch_value_unlockdata.'</span>';  ?>
      <hr style="margin: 15px;">

      <?php
         $fetch_value_cleardata='';
              $fetch_value_clear = $connect->query("SELECT reason
             FROM gradeaheet_clear_reason1 where gradesheetId='$grad_id' and cloneid='$get_clone_ides'
             ORDER BY id DESC
             LIMIT 1;");
             $fetch_value_cleardata = $fetch_value_clear->fetchColumn();
             echo '<div style="float: inline-start;">';
             
             echo '<span class="badge bg-soft-danger text-danger" style="float:right;font-size:large;">'.$fetch_value_cleardata.'</span>'; 
             echo '<span class="text-secondary" style="float:right;font-size: large;font-weight: bold; margin-right: 8px;">Clear Reason : </span>'; 
             echo '<button class="btn btn-secondary" title="Check Reason For Clear Gradesheet" style="font-size: large;padding: 5px;padding-top: 0px;padding-bottom: 0px;font-weight: bold;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#ClearReasonModalCloned"><i class="bi bi-card-list"></i></button>';
             echo '</div>';
      ?>
        </div>
        <div class="col-1">
          <?php
      $lockQ = $connect->query("SELECT `status` FROM `cloned_gradesheet` WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class_id = '$classid' AND phase_id = '$phase_id' AND class = '$class_name'");
      $lockQData = $lockQ->fetchColumn();
      if ($lockQData == 1) {
      ?>
        <img class="lockImg" src="<?php echo BASE_URL; ?>assets/svg/lock/lock.png" style="height: 100px;">
      <?php } else { ?>
        <img class="lockImg" src="<?php echo BASE_URL; ?>assets/svg/lock/unlock.png" style="height: 100px;">
      <?php } ?>
      <img class="unlockImg" src="<?php echo BASE_URL; ?>assets/svg/lock/lock.png" style="height: 50px;display:none;margin-right: 10px;">
        </div>
      
 
      
    </div>
    </div><br><br>
      <div data-bs-toggle="modal" data-bs-target="#inst_modal" style="cursor: pointer;">
        <div class="text">
          <?php
          $get_ins = "SELECT * FROM cloned_gradesheet where user_id='$fetchuser_id' and course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' and cloned_id='$get_clone_ides'";
          $get_insst = $connect->prepare($get_ins);
          $get_insst->execute();
          if ($get_insst->rowCount() > 0) {
            $re1 = $get_insst->fetchAll();
            foreach ($re1 as $row1) {
              $added_ins = $row1['instructor'];
              $st_date = $row1['date'];
              $st_date = strtotime($st_date);
              $st_duration_hr = $row1['duration_hours'];
              $st_duration_min = $row1['duration_min'];
              $vec_id = $row1['vehicle'];
              $vec_name = $connect->prepare("SELECT VehicleNumber FROM `vehicle` WHERE id=?");
              $vec_name->execute([$vec_id]);
              $name2 = $vec_name->fetchColumn();
              $added_ins_name = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
              $added_ins_name->execute([$added_ins]);
              $get_ins_name = $added_ins_name->fetchColumn();
            }
          }
          if ($added_ins != "") {
            echo $get_ins_name;
          } else {
            echo "Select Instructor";
          }

          ?>
        </div><br>

        <div class="form-row">
          <div class="input-data">
            <label class="text-dark" style="font-weight: bold;font-size:x-large;"><?php echo $vehicleNameData1; ?> : <span class="text-secondary" style="font-weight:bold; font-size:x-large; font-family: cursive;"><?php echo $name2 ?></span></label>
            <div class="underline border"></div>

          </div>
          <div class="input-data">
            <label class="text-dark" style="font-weight: bold;font-size:x-large;">Duration : <span class="text-secondary" style="font-weight:bold; font-size:x-large; font-family:cursive;"><?php echo $st_duration_hr . " : " . $st_duration_min; ?></span></label>
            <div class="underline border"></div>

          </div>
          <div class="input-data">
            <label class="text-dark" style="font-weight: bold;font-size:x-large;">Date : <span class="text-secondary" style="font-weight:bold; font-size:x-large; font-family:cursive;"><?php if ($st_date != "") {

                                                                                                                                                                                          $st_date1 = date("Y-m-d", $st_date);

                                                                                                                                                                                          $timestamp = strtotime($st_date1);
                                                                                                                                                                                          $day =  date("l", $timestamp);
                                                                                                                                                                                          echo $day;
                                                                                                                                                                                          echo " ";
                                                                                                                                                                                          echo date('Y-m-d', $st_date);
                                                                                                                                                                                          echo " ";
                                                                                                                                                                                        } else {
                                                                                                                                                                                          echo "";
                                                                                                                                                                                        } ?></span></label>
            <div class="underline border"></div>

          </div>
        </div>
      </div>
      <hr>

      <div>

      <?php
      //  unlock the gradesheet
      $lock = "SELECT * FROM cloned_gradesheet where user_id='$fetchuser_id' and course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' and cloned_id='$get_clone_ides'";
      $lockst = $connect->prepare($lock);
      $lockst->execute();
      if ($lockst->rowCount() > 0) {
        $re = $lockst->fetchAll();
        foreach ($re as $row) {
      ?>
      <?php if (isset($_SESSION['permission']) && $permission['reset_gradsheet'] == "1") { ?>
        
            <button style="margin:5px; float: right; font-size: large; font-weight: bold;" onclick="document.getElementById('ins_reset_id').value='<?php echo $row['instructor'] ?>';document.getElementById('stu_reset_id').value='<?php echo $row['user_id'] ?>';" class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#admin_reset" id="ctpbtn">Clear</button> <input type="hidden" id="gradsheet_get_id" value="<?php echo $row['id'] ?>">
          <?php
          }

           if (isset($_SESSION['permission']) && $permission['askreset_gradsheet'] == "1") { ?>
            <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#ask_for_rest" style="float:right;margin-right:10px;font-size: large; font-weight: bold;">Reset</a>
            <div class="modal fade" id="ask_for_rest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">

                  <div class="modal-header btn-danger text-center" style="height: 110px;">
                    <h6 class="modal-title" id="exampleModalLabel" style="margin-top: -30px;font-size: x-large;color: white;">Ask Permission for Reset gradesheet</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top:-55px;"></button>
                  </div>

                  <div class="modal-body">
                    <div style="text-align: center;">
                      <i class="bi bi-x-circle" style="font-size:100px;"></i>
                    </div>
                    <hr>
                    <form action="reset_ask1.php" method="post" style="margin-left:5px; float: left;">
                      <input type="hidden" name="session_id" id="session_id" value="<?php echo $user_id ?>">
                      <input type="hidden" name="for_unlock" value="<?php echo $fetchuser_id ?>">
                      <input type="hidden" name="class_name" value="<?php echo $class_name ?>">
                      <input type="hidden" name="class_id" value="<?php echo $classid ?>">
                      <input type="hidden" name="get_clone_ides" value="<?php echo $get_clone_ides ?>">
                      <input type="submit" value="Ask" class="btn btn-outline-success" style="font-size:large; font-weight:bold; margin-left:315px;">
                    </form>
                    <button style="float: right; font-size:large; font-weight:bold;" onclick="document.getElementById('ins_reset_id').value='<?php echo $row['instructor'] ?>';document.getElementById('stu_reset_id').value='<?php echo $row['user_id'] ?>';" class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#admin_reset" id="ctpbtn">Reset</button> <input type="hidden" id="gradsheet_get_id" value="<?php echo $row['id'] ?>">

                  </div>
                </div>
              </div>
            </div>
          <?php }
          // if role is super admin and gradesheet table value is 1
          if (isset($_SESSION['permission']) && $permission['Unlock_gradsheet'] == "1" && $row['status'] == '1') { ?>
            <button style="margin:5px; float: right; font-size: large; font-weight: bold;" onclick="document.getElementById('gradesheetid').value='<?php echo $row['id'] ?>';" class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#unlock" id="ctpbtn">Unlock</button>

            <?php
          } else if (isset($_SESSION['permission']) && $permission['askUnlock_gradsheet'] == "1" && $row['status'] == '1') { ?>

            <button class="btn btn-outline-success" id="ask_for_unlock" data-bs-toggle="modal" data-bs-target="#ask_for_unlock_modal" style="float: right; margin-right:10px; font-size: large; font-weight: bold;">Unlock</button>

            <div class="modal fade" id="ask_for_unlock_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header btn-danger text-center" style="height: 110px;">
                    <h6 class="modal-title" id="exampleModalLabel" style="margin-top: -30px;font-size: x-large;color: white;">Ask Permission for Unlock gradesheet</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top:-55px;"></button>
                  </div>
                  <div class="modal-body">
                    <div style="text-align: center;">

                      <img src="<?php echo BASE_URL; ?>assets/svg/lock/lock.png">
                    </div>
                    <hr>
                    <input type="hidden" name="session_id" id="session_id" value="<?php echo $user_id ?>">
                    <input type="hidden" name="for_unlock" value="<?php echo $fetchuser_id ?>">
                    <input type="hidden" name="class_name" value="<?php echo $class_name ?>">
                    <input type="hidden" name="class_id" value="<?php echo $classid ?>">

                    <div style="float: right;">
                      <input type="button" id="Ask_to_unlock1" value="Ask" class="btn btn-outline-success" style="font-size:large; font-weight:bold;">

                      <button style="margin:5px; font-size:large; font-weight:bold;" onclick="document.getElementById('gradesheetid').value='<?php echo $row['id'] ?>';" class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#unlock" id="ctpbtn">Unlock</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>


      <?php }
        }
      }
      ?>
    </div>
    </div>
    <!-- End Body -->
  </div>
  <!-- End Card -->
</div>
<div class="modal fade" id="unlock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-danger text-center" style="height: 110px;">
        <h6 class="modal-title" id="exampleModalLabel" style="margin-top: -30px;font-size: x-large;color: white;">Unlock Gradesheet</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top:-55px;"></button>
      </div>
      <div class="modal-body">
        <center>
          <form>
            <input type="hidden" value="" id="gradesheetid" name="gradesheetid">
            <input class="form-control" type="text" id="check_admin_username" class="login-input" name="username" placeholder="Username" autofocus="true" /><br>
            <input class="form-control" type="password" id="check_admin_password" class="login-input" name="password" placeholder="Password" /><br>
            <textarea id="check_admin_reason" class="form-control" placeholder="Reason For clear"></textarea>
            <hr>
            <input class="btn btn-outline-success" type="button" value="Submit" id="unlock_gradsheet" name="login" class="login-button" style="font-weight:bold; font-size: large; float:right;" />
          </form>
        </center>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="admin_reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-danger text-center" style="height: 110px;">
        <h6 class="modal-title" id="exampleModalLabel" style="margin-top: -30px;font-size: x-large;color: white;">Reset Gradesheet</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top:-55px;"></button>
      </div>
      <div class="modal-body">
        <center>
          <form action="reset_gradsheet1.php" method="post">

            <input type="hidden" value="" id="ins_reset_id" name="ins_reset_id">
            <input type="hidden" value="" id="stu_reset_id" name="stu_reset_id">
            <input type="hidden" value="<?php echo $noti_id ?>" name="noti_id">
            <input type="hidden" value="<?php echo $get_clone_ides ?>" name="get_clone_ides">
            <input type="hidden" name="class_id" value="<?php echo $classid ?>"> <input type="hidden" name="class" value="<?php echo $class_name ?>"> <input type="hidden" name="u_id" value="<?php echo $fetchuser_id ?>">
            <input class="form-control" type="text" class="login-input" name="username" placeholder="Username" autofocus="true" /><br>
            <input class="form-control" type="password" class="login-input" name="password" placeholder="Password" /><br>

            <textarea class="form-control" style="height: 100px; width: 100%; border-radius: 20px;" name="clearReason" placeholder="Reason For Clear..." rows="4" required></textarea>
            <hr>
            <input type="submit" class="btn btn-outline-danger" value="Clear" style="font-weight:bold; font-size: large; float:right;">
          </form>
        </center>
      </div>
    </div>
  </div>
</div>



<!--inst modal 2nd row-->
<div class="modal fade" id="inst_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-success" id="exampleModalLabel">Fill Information</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input class="form-control" type="hidden" name="class_name" id="class_name" value="<?php echo $class_name ?>">
        <input type="hidden" id="get_std_id" value="<?php echo $fetchuser_id ?>">
        <input type="hidden" name="class_id" id="class_id" value="<?php echo $classid ?>">
        <center>
          <?php
          //fetch all vechile for form
          $q6 = "SELECT vehicle.VehicleNumber,vehicle.VehicleSpot,vehicle.id FROM vehicle INNER JOIN ctppage ON vehicle.VehicleType = ctppage.VehicleType where ctppage.CTPid='$std_course1'";

          $st6 = $connect->prepare($q6);
          $st6->execute();
          if ($st6->rowCount() > 0) {
            $re6 = $st6->fetchAll();
            foreach ($re6 as $row7) {
              $vehnum .= '<option value="' . $row7['id'] . '">' . $row7['VehicleNumber'] . '</option>';
            }
          } ?>
          <!-- form starts here -->

          <table style="width:100%;" id="user_Data_table">
            <tr style="display: none;">


              <td style="width:50%;"><label class="text-dark" style="font-weight:bolder;">StdId</label>
                <input class="form-control" type="text" name="stud_id" readonly value="<?php echo $fetchid ?>" style="background-color: #bfcfe09e;">
              </td>
              <td style="width:50%;"><label class="text-dark" style="font-weight:bolder;">Name</label>
                <input class="form-control" type="text" name="stud_name" readonly value="<?php echo $fetchnickname ?>" style="background-color: #bfcfe09e;">
              </td>
            </tr>
            <tr style="display: none;">
              <td style="width:50%;"><label class="text-dark" style="font-weight:bolder;">Role</label>
                <input class="form-control" type="text" name="stud_role" readonly value="<?php echo $fetchrole ?>" style="background-color: #bfcfe09e;">
              </td>
              <td style="width:50%;"><label class="text-dark" style="font-weight:bolder;">Phone</label>
                <input class="form-control" type="text" name="stud_phone" readonly value="<?php echo $fetchphone ?>" style="background-color: #bfcfe09e;">
              </td>
            </tr>
            <tr>

              <form action="stu_Data1.php" method="get" id="user_Data_table">
                <input type="hidden" name="st_id" value="<?php echo $fetchuser_id ?>">
                <input type="hidden" name="cl_na" value="<?php echo $class_name ?>">
                <input type="hidden" name="co_id" value="<?php echo $std_course1 ?>">
                <input type="hidden" name="ph_id" value="<?php echo $phase_id ?>">
                <input type="hidden" name="cl_id" value="<?php echo $classid ?>"> <input type="hidden" name="clo_id" value="<?php echo $get_clone_ides ?>">
                <td style="margin-top:5px; width:50%;"><label class="text-dark" class="form-label" for="instructor_id" style="font-weight:bolder; margin-top: 5px;">Instructor<span style="color:red"> (Select Instructor Will Notified)</span></label>

                  <!-- inserted instructor -->
                  <?php if ($added_ins != "") { ?>
                    <select type="text" class="form-control form-control-md" name="instructor_id" required>
                      <option selected hidden value="<?php echo $added_ins ?>"><?php echo $get_ins_name ?></option>
                      <option disabled value="">-select instructor-</option>
                      <?php echo $in ?>
                    </select>
                  <?php } else { ?>
                    <select type="text" class="form-control form-control-md" name="instructor_id" required>
                      <option selected disabled value="">-select instructor-</option>
                      <?php echo $in ?>
                    </select>
                  <?php } ?>




                </td>
                <td style="width:50%;"><label class="text-dark" style="font-weight:bolder; margin-top: -15px;">Vehicle</label>
                  <!-- inserted vechile number -->
                  <?php if ($vec_id != "") { ?>
                    <select type="text" id="vechile_dropdown" class="form-control form-control-md" name="vechile_id" required>
                      <option selected value="<?php echo $vec_id ?>"><?php echo $name2 ?></option>
                      <?php echo $vehnum ?>
                    </select>
                  <?php } else { ?>
                    <select type="text" class="form-control form-control-md" name="vechile_id" required>
                      <option selected disabled value="">-select Number-</option>
                      <?php echo $vehnum ?>
                    </select>
                  <?php } ?>


                  <span style="color:red"></span><span></span>
                </td>
            </tr>
            <tr>
              <!-- set inserted value of time -->
              <td><label class="text-dark" style="font-weight:bolder;">Time</label><input required class="form-control" type="time" id="time_filled" value="<?php if (isset($st_time)) {
                                                                                                                                                              $date = date("H:i", strtotime($st_time));
                                                                                                                                                              echo "$date";
                                                                                                                                                            } else {
                                                                                                                                                              echo "";
                                                                                                                                                            } ?>" name="time"></td>
              <!-- set inserted value of date -->
              <td><label class="text-dark" style="font-weight:bolder;">Date</label><input required class="form-control" type="date" id="date_filled" value="<?php if ($st_date != "") {
                                                                                                                                                              echo date('Y-m-d', $st_date);
                                                                                                                                                            } else {
                                                                                                                                                              echo "";
                                                                                                                                                            } ?>" name="date"></td>
            </tr>
            <tr>
              <td>
                <label class="text-dark" style="font-weight:bolder;">Duration</label><br>
                <div style="display: flex;">
                  <input class="form-control" style="width: auto;" type="number" id="duration-hours" name="duration_hours" value="<?php if (isset($st_duration_hr)) {
                                                                                                                                    echo $st_duration_hr;
                                                                                                                                  } else {
                                                                                                                                    echo "00";
                                                                                                                                  } ?>" min="0" max="23" placeholder="hh" style="width: 50px;" oninput="this.value = this.value.slice(0, 2)" oninput="this.value = Math.min(Math.max(parseInt(this.value), 0), 12)">

                  :
                  <input class="form-control" style="width: auto;" type="number" id="duration-minutes" name="duration_minutes" value="<?php if (isset($st_duration_min)) {
                                                                                                                                        echo $st_duration_min;
                                                                                                                                      } else {
                                                                                                                                        echo "00";
                                                                                                                                      } ?>" min="0" max="59" placeholder="mm" style="width: 50px;" oninput="this.value = this.value.slice(0, 2)" oninput="this.value = Math.min(Math.max(parseInt(this.value), 0), 60)">
                </div>

              </td>
            </tr>
          </table>
          <br>
          <input type="submit" class="btn btn-outline-success" value="Update" style="float: right; font-size: large; font-weight: bold;">

          </form>


        </center>


      </div>
    </div>
  </div>
</div>


<!--Lock Reason Modal -->
<div id="lockReasonModalCloned" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Reason To Unlock Gradesheet</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped table-hover">
          <thead class="bg-dark" style="text-align:center;">
            <tr>
              
              <th class="text-white">Date</th>
              <th class="text-white">Name</th>
              <th class="text-white">Reasons</th>
            </tr>
          </thead>
          <tbody style="text-align: center;">
            <?Php
              $get_reasonunlock = "SELECT * FROM unclock_gradsheet_reason1 where g_id='$grad_id' and cl_id='$get_clone_ides' order by id DESC";
              $get_reasonunlockst = $connect->prepare($get_reasonunlock);
              $get_reasonunlockst->execute();
              $sn_val=1;
              if ($get_reasonunlockst->rowCount() > 0) {
                $get_reasonre1 = $get_reasonunlockst->fetchAll();
                foreach ($get_reasonre1 as $get_reasonrow1) {
                  // $dateTimestamp = strtotime($get_reasonrow1['date']);
                  $clearDate = $get_reasonrow1['date'];

                  // Convert the date string to a timestamp
                  $dateTimestamp = strtotime($clearDate);

                  // Format the date
                  $formattedDate = date('j F Y', $dateTimestamp);
                  $unlockuseridse=$get_reasonrow1['user_id'];
                  $userunlockuserid = $connect->query("SELECT nickname, role FROM users WHERE id = '$unlockuseridse'");
                  $userunlockuseriddata = $userunlockuserid->fetch();
            ?>
            <tr>
              
              
              <td><?php echo $formattedDate; ?></td>
              <td>
                <?php
                    $textColor = 'black';  // Default color

                    if ($userunlockuseriddata['role'] == 'super admin') {
                        $textColor = '#c32e2e';
                    } elseif ($userunlockuseriddata['role'] == 'instructor') {
                        $textColor = '#c3b02e';
                    }
                    // echo 'style="color: ' . $textColor . ';"';
                ?>
                <span style="background-color:<?php echo $textColor;?>;font-weight: bold;color: white;" class="badge"><?php echo $userunlockuseriddata['nickname']; ?></span>
              </td>
              <td><span style="font-weight:bold;float: left;"><?php echo $get_reasonrow1['reason']; ?></span></td>
            </tr>
            <?php }}?>
          </tbody>
        </table>
        <!-- <hr>
        <input type="button" name="" value="Save" class="btn btn-success" style="float:right;"> -->
      </div>
    </div>
  </div>
</div>

<!--Clear Reason Modal -->
<div id="ClearReasonModalCloned" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Reason To Clear Gradesheet</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped table-hover">
          <thead class="bg-dark" style="text-align:center;">
            <tr>
              
              <th class="text-white">Date</th>
              <th class="text-white">Name</th>
              <th class="text-white">Reason Of Clear Gradesheet</th>
            </tr>
          </thead>
          <tbody style="text-align: center;">
          <?Php
              $get_reasonunlock1 = "SELECT * FROM gradeaheet_clear_reason1 where gradesheetId='$grad_id' and cloneid	='$get_clone_ides' order by id DESC";
              $get_reasonunlock1st = $connect->prepare($get_reasonunlock1);
              $get_reasonunlock1st->execute();
              $sn_val1=1;
              if ($get_reasonunlock1st->rowCount() > 0) {
                $get_reasonre2 = $get_reasonunlock1st->fetchAll();
                foreach ($get_reasonre2 as $get_reasonrow2) {
                  $clearDate = $get_reasonrow2['clearDate'];

                  // Convert the date string to a timestamp
                  $dateTimestamp1 = strtotime($clearDate);

                  // Format the date
                  $formattedDate = date('j F Y', $dateTimestamp1);
                  $unlockuseridse1=$get_reasonrow2['userId'];
                  $userunlockuserid1 = $connect->query("SELECT nickname, role FROM users WHERE id = '$unlockuseridse1'");
                  $userunlockuseriddata1 = $userunlockuserid1->fetch();
            ?>
            <tr>
              
              
              <td><?php echo $formattedDate; ?></td>
              <td>
                <?php
                    $textColor = 'black';  // Default color

                    if ($userunlockuseriddata1['role'] == 'super admin') {
                        $textColor = '#c32e2e';
                    } elseif ($userunlockuseriddata1['role'] == 'instructor') {
                        $textColor = '#c3b02e';
                    }
                    // echo 'style="color: ' . $textColor . ';"';
                ?>
                <span style="background-color:<?php echo $textColor;?>;font-weight: bold;color: white;" class="badge"><?php echo $userunlockuseriddata1['nickname']; ?></span>
                  
                </td>
              <td><span style="font-weight:bold;float: left;"><?php echo $get_reasonrow2['reason']; ?></span></td>
            </tr>
            <?php }}?>
          </tbody>
        </table>
        <!-- <hr>
        <input type="button" name="" value="Save" class="btn btn-success" style="float:right;"> -->
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on("change", "#instructor", function() {
    var ins = $(this).val();
    var std = $("#get_std_id").val();
    var class_name = $("#class_name").val();
    var class_id = $("#class_id").val();
    var cloned_id = $("#get_clone_ides_val").val();

    if (ins) {
      $.ajax({
        type: 'POST',
        url: 'insert_notification_instructor1.php',
        data: 'ins=' + ins + '&std=' + std + '&class_name=' + class_name + '&class_id=' + class_id + '&cloned_id=' + cloned_id,
        success: function(response) {
          window.location.reload();

        }
      });
    }
  });
</script>