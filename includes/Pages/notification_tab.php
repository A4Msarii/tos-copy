<div class="dropdown">
  <button style="font-size:x-large;" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation data-bs-placement="bottom" title="Notifications">
    <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/notification_2.png" style="height: 30px;">
    <?php echo $icon; ?>
  </button>

  <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
    <!-- Header -->
    <div class="card-header card-header-content-between">

      <h4 class="card-title mb-0">Notifications</h4>

      <!-- Unfold -->
      <div class="dropdown">
        
      <div class="d-flex">
        <?php if ($role != "super admin") { ?>
          <button id="read_all_noti" class="btn btn-primary btn-sm">Read all</button>
        <?php } else if ($role == "super admin") { ?>
          <button id="read_all_noti_admin" class="btn btn-primary btn-sm">Read all</button>
        <?php } ?>
        <div class="form-check form-switch" data-bs-placement="bottom" title="Disable Swap Window" type="button" style="top: 10px;margin-left: 10px;">
        <?php
        $checkMute = $connect->query("SELECT count(*) FROM mute_notification WHERE userId = '$user_id'");
        if($checkMute->fetchColumn() > 0){
          $muteVal = "checked";
        }else{
          $muteVal = "unchecked";
        }
        ?>
          <input class="form-check-input muteBtn" type="checkbox" <?php echo $muteVal; ?> />

        </div>
      </div>
        <input type="hidden" value="<?php echo $user_id ?>" id="user_id_val">
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

      if ($role != "super admin") {
        $sql = "SELECT COUNT(`id`) FROM notifications WHERE to_userid='$user_id' and is_read=0 and extra_data!='requesting to unlock' and extra_data!='cloned delete ask' and extra_data!='requesting_unlock'";
        $res = $connect->query($sql);
        $count = $res->fetchColumn();
      } else if ($role == "super admin") {
        $sql = "SELECT COUNT(`id`) FROM notifications WHERE is_read=0 and if_admin='$role'";
        $res = $connect->query($sql);
        $count = $res->fetchColumn();
      }
      ?>
      <li class="nav-item">
        <a class="nav-link active" href="#notificationNavOne" id="notificationNavOne-tab" data-bs-toggle="tab" data-bs-target="#notificationNavOne" role="tab" aria-controls="notificationNavOne" aria-selected="true">Notifications(<?php echo $count ?>)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#notificationNavTwo" id="notificationNavTwo-tab" data-bs-toggle="tab" data-bs-target="#notificationNavTwo" role="tab" aria-controls="notificationNavTwo" aria-selected="false">Read Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#AllAlert" id="AllAlert-tab" data-bs-toggle="tab" data-bs-target="#AllAlert" role="tab" aria-controls="AllAlert" aria-selected="false">Alerts</a>
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
          echo $fetched_pers2;


          echo $fetched_pers11;

          echo $fetched_pers12;
          echo $fetched_per98;
          ?>

        </div>

        <div class="tab-pane fade" id="notificationNavTwo" role="tabpanel" aria-labelledby="notificationNavTwo-tab">

          <?php
          $fetched_per5 = "";
          $fetch_noti5 = "SELECT * FROM notifications where is_read='1' AND type='message' and to_userid='$user_id' and extra_data!='threshold' and extra_data!='reached_cout' order by id desc";

          $fetch_noti5st2 = $connect->prepare($fetch_noti5);
          $fetch_noti5st2->execute();

          if ($fetch_noti5st2->rowCount() > 0) {
            $re5 = $fetch_noti5st2->fetchAll();
            foreach ($re5 as $row5) {

              $for_userid1 = $row5['to_userid'];
              $fetch_std_name1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
              $fetch_std_name1->execute([$for_userid1]);
              $std_name1 = $fetch_std_name1->fetchColumn();

              $fetched_per5 .= '
                                <a id="' . $row5['id'] . '" class="get_id_of_noti">
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
                                       <a href="' . BASE_URL . 'includes/Pages/delete_shop.php?notificationId=' . $row5['id'] . '"><i style="position:relative;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>
                                      </div>
                                      <div class="col ms-n2">

                                      <span class="text-body fs-5 text-dark">You Have Message From ' . $std_name1 . '<span><br>
                                        <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row5['date'])) . '</i></small>
                                        <button style="float:right;" class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#view_msg">View</button>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                       </a>';
            }
          } ?>
          <?php echo $fetched_per5 ?>

        </div>

        <div class="tab-pane fade" id="AllAlert" role="tabpanel" aria-labelledby="AllAlert-tab">
          
          <?php include ROOT_PATH . 'includes/Pages/alertdiveoffcanvas.php'; ?>
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

