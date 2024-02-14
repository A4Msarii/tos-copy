<style type="text/css">
    @keyframes blink {

        0%,
        50%,
        100% {
            opacity: 1;
        }

        25%,
        75% {
            opacity: 0;
        }
    }

    .blink-animation1 {
        animation: blink 2s infinite;
        /* Adjust the animation duration as needed */
    }

/* Define the blink animation */
@keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 0; }
    100% { opacity: 1; }
}

/* Apply the animation to the h2 element */
h2.blink-todo {
    animation: blink 7s infinite; /* Change 1s to the duration you prefer */
}

</style>
<?php
if (isset($alert_data)) {
    foreach ($alert_data as $alert) {
        $username1 = $alert['user_id'];
        $mainIns1 = $connect->query("SELECT `file_name`, `nickname` FROM users WHERE id = '$username1'");
        $mainData1 = $mainIns1->fetch();
        if ($mainData1['file_name'] != "") {
            $pic111 = BASE_URL . 'includes/Pages/upload/' . $mainData1['file_name'];
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                $pic111 = BASE_URL . 'includes/Pages/upload/' . $mainData1['file_name'];
            } else {
                $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
        } else {
            $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
        }
        if ($alert['alert_file'] == 1) {
            $remove = 'display:none;';
        } else {
            $remove = '';
        }
        $checkMute = $connect->query("SELECT count(*) FROM mute_notification WHERE userId = '$user_id'");
        if ($checkMute->fetchColumn() > 0) {
            $sql = "INSERT INTO alertreply (alert_id,user_id,message) VALUES('" . $alert["id"] . "','$user_id','ok')";
            $stmt = $connect->prepare($sql);
            $stmt->execute();
            continue;
        }
        echo '<div style="width:98vw;height:100vh;position:fixed;top:0px;z-index:10000;background-color: rgba(0, 0, 0, 0.3);">

                <div class="modal-dialog rounded modal-lg" role="document" style="border-radius:40px; border:1px solid #9b9ba12b;box-shadow:9px 12px 15px 0px #9b9bd999; margin-top:250px;">
                    <div class="modal-content">
                    <div class="modal-header" style="background-color:' . $alert['color'] . '">
                        <h3 class="modal-title text-white" id="exampleModalLabel" style="font-size: xx-large;margin-bottom: 25px;"><img src="' . BASE_URL . 'assets/svg/alert/' . $alert['alert_icon'] . '" style="height: 40px; margin:5px; padding: 0px;" class="blink-animation1">' . $alert['alert_type'] . '</h3>
                        <h3 style="margin-bottom:25px;position: absolute;right: 85px;color:' . $alert['textcolor'] . '">' . time_elapsed_string($alert['date']) . '</h3>

                        <div class="dropdown" style="margin-bottom:25px;">
                            <div class="dropdown">
                                <button type="button" class="btn btn-icon rounded-circle btn-dark" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                                    <i class="bi bi-three-dots-vertical text-white"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                                    <div class="dropdown-item-text">
                                        <div class="align-items-center">
                                          <span class="text-success" style="font-weight:bold;">Sent By :</span> 
                                          <br>
                                          <div class="avatar-container d-flex" id="avt">
                                            <div class="avatar avatar-circle avatar-lg" id="avtimg">
                                              <img style="margin: 5px;" src="' . $pic111 . '" alt="MainIns" class="avatar avatar-img avatar-circle"  />
                                            </div>
                                            <div class="divside" style="margin:10px;">
                                              <h3 class="mb-0 text-dark">' . $mainData1['nickname'] . '</h3>
                                              <span class="card-text text-body">' . $alert['date'] . '</span><br>
                                              <span>ayushi</span>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        
                        <span style="font-size:x-large;">' . $alert['message'] . '</span>
                    </div>
                    
                    <div class="modal-footer">
                    <form action="' . BASE_URL . 'includes/alertreply.php" method="post">
                    <a class="btn btn-outline-primary" style="font-size: x-large;font-weight: bold; color:black;' . $remove . '" href="' . BASE_URL . 'includes/Pages/alert/' . $alert['alert_file'] . '" target="_blank">View File</a>
                    <input type="hidden" name="alert_id" value="' . $alert['id'] . '"/>
                        <input type="hidden" name="user_id" value="' . $user_id . '"/>
                        <button style="font-size: x-large;font-weight: bold;" type="submit" name="ok" value="ok" class="btn btn-outline-success" data-bs-dismiss="modal">OK</button>
                    </form>
                    <form action="' . BASE_URL . 'includes/alertreply.php" method="post">

                        <input type="hidden" name="alert_id" value="' . $alert['id'] . '"/>
                        <input type="hidden" name="user_id" value="' . $user_id . '"/>
                        <button style="font-size: x-large;font-weight: bold;" type="submit" name="close" value="close" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    </form>
                    </div>
                    </div>
                </div>
        </div>';
    }
}
if (isset($alert_datae)) {
    foreach ($alert_datae as $alert) {
        $username1 = $alert['user_id'];
        $mainIns1 = $connect->query("SELECT `file_name`, `nickname` FROM users WHERE id = '$username1'");
        $mainData1 = $mainIns1->fetch();
        if ($mainData1['file_name'] != "") {
            $pic111 = BASE_URL . 'includes/Pages/upload/' . $mainData1['file_name'];
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                $pic111 = BASE_URL . 'includes/Pages/upload/' . $mainData1['file_name'];
            } else {
                $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
        } else {
            $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
        }
        if ($alert['alert_file'] == 1) {
            $remove = 'display:none;';
        } else {
            $remove = '';
        }
        if ($checkMute->fetchColumn() > 0) {
            $sql = "INSERT INTO alertreply (alert_id,user_id,message) VALUES('" . $alert["id"] . "','$user_id','ok')";
            $stmt = $connect->prepare($sql);
            $stmt->execute();
            continue;
        }
        echo '<div style="width:98vw;height:100vh;position:fixed;top:0px;z-index:10000;background-color: rgba(0, 0, 0, 0.3);">

        <div class="modal-dialog rounded modal-lg" role="document" style="border-radius:40px; border:1px solid #9b9ba12b;box-shadow:9px 12px 15px 0px #9b9bd999; margin-top:250px;">
            <div class="modal-content">
            <div class="modal-header" style="background-color:' . $alert['color'] . '">
                <h3 class="modal-title text-white" id="exampleModalLabel" style="font-size: xx-large;margin-bottom: 25px;"><img src="' . BASE_URL . 'assets/svg/alert/' . $alert['alert_icon'] . '" style="height: 40px; margin:5px; padding: 0px;" class="blink-animation1">' . $alert['alert_type'] . '</h3>
                <h3 style="margin-bottom:25px;position: absolute;right: 85px;color:' . $alert['textcolor'] . '">' . time_elapsed_string($alert['date']) . '</h3>

                <div class="dropdown" style="margin-bottom:25px;">
                    <div class="dropdown">
                        <button type="button" class="btn btn-icon rounded-circle btn-dark" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                            <i class="bi bi-three-dots-vertical text-white"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                            <div class="dropdown-item-text">
                                <div class="align-items-center">
                                  <span class="text-success" style="font-weight:bold;">Sent By :</span> 
                                  <br>
                                  <div class="avatar-container d-flex" id="avt">
                                    <div class="avatar avatar-circle avatar-lg" id="avtimg">
                                      <img style="margin: 5px;" src="' . $pic111 . '" alt="MainIns" class="avatar avatar-img avatar-circle" />
                                    </div>
                                    <div class="divside" style="margin:10px;">
                                      <h3 class="mb-0 text-dark">' . $mainData1['nickname'] . '</h3>
                                      <span class="card-text text-body">' . $alert['date'] . '</span><br>
                                      
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                
                <span style="font-size:x-large;">' . $alert['message'] . '</span>
            </div>
            
            <div class="modal-footer">
            <form action="' . BASE_URL . 'includes/alertreply.php" method="post">
            <a class="btn btn-outline-primary" style="font-size: x-large;font-weight: bold; color:black;' . $remove . '" href="' . BASE_URL . 'includes/Pages/alert/' . $alert['alert_file'] . '" target="_blank">View File</a>
            <input type="hidden" name="alert_id" value="' . $alert['id'] . '"/>
                <input type="hidden" name="user_id" value="' . $user_id . '"/>
                <button style="font-size: x-large;font-weight: bold;" type="submit" name="ok" value="ok" class="btn btn-outline-success" data-bs-dismiss="modal">OK</button>
            </form>
            <form action="' . BASE_URL . 'includes/alertreply.php" method="post">

                <input type="hidden" name="alert_id" value="' . $alert['id'] . '"/>
                <input type="hidden" name="user_id" value="' . $user_id . '"/>
                <button style="font-size: x-large;font-weight: bold;" type="submit" name="close" value="close" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
            </form>
            </div>
            </div>
        </div>
</div>';
    }
}
if (isset($alert_data_re)) {
    foreach ($alert_data_re as $alert) {
        $username1 = $alert['user_id'];
        $mainIns1 = $connect->query("SELECT `file_name`, `nickname` FROM users WHERE id = '$username1'");
        $mainData1 = $mainIns1->fetch();
        if ($mainData1['file_name'] != "") {
            $pic111 = BASE_URL . 'includes/Pages/upload/' . $mainData1['file_name'];
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                $pic111 = BASE_URL . 'includes/Pages/upload/' . $mainData1['file_name'];
            } else {
                $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
        } else {
            $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
        }
        if ($alert['alert_file'] == 1) {
            $remove = 'display:none;';
        } else {
            $remove = '';
        }
        if ($checkMute->fetchColumn() > 0) {
            $sql = "INSERT INTO alertreply (alert_id,user_id,message) VALUES('" . $alert["id"] . "','$user_id','ok')";
            $stmt = $connect->prepare($sql);
            $stmt->execute();
            continue;
        }
        echo '<div style="width:98vw;height:100vh;position:fixed;top:0px;z-index:10000;background-color: rgba(0, 0, 0, 0.3);">

        <div class="modal-dialog rounded modal-lg" role="document" style="border-radius:40px; border:1px solid #9b9ba12b;box-shadow:9px 12px 15px 0px #9b9bd999; margin-top:250px;">
            <div class="modal-content">
            <div class="modal-header" style="background-color:' . $alert['color'] . '">
                <h3 class="modal-title text-white" id="exampleModalLabel" style="font-size: xx-large;margin-bottom: 25px;"><img src="' . BASE_URL . 'assets/svg/alert/' . $alert['alert_icon'] . '" style="height: 40px; margin:5px; padding: 0px;" class="blink-animation1">' . $alert['alert_type'] . '</h3>
                <h3 style="margin-bottom:25px;position: absolute;right: 85px;color:' . $alert['textcolor'] . '">' . time_elapsed_string($alert['date']) . '</h3>

                <div class="dropdown" style="margin-bottom:25px;">
                    <div class="dropdown">
                        <button type="button" class="btn btn-icon rounded-circle btn-dark" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                            <i class="bi bi-three-dots-vertical text-white"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                            <div class="dropdown-item-text">
                                <div class="align-items-center">
                                  <span class="text-success" style="font-weight:bold;">Sent By :</span> 
                                  <br>
                                  <div class="avatar-container d-flex" id="avt">
                                    <div class="avatar avatar-circle avatar-lg" id="avtimg">
                                      <img style="margin: 5px;" src="' . $pic111 . '" alt="MainIns" class="avatar avatar-img avatar-circle" />
                                    </div>
                                    <div class="divside" style="margin:10px;">
                                      <h3 class="mb-0 text-dark">' . $mainData1['nickname'] . '</h3>
                                      <span class="card-text text-body">' . $alert['date'] . '</span><br>
                                      
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                
                <span style="font-size:x-large;">' . $alert['message'] . '</span>
            </div>
            
            <div class="modal-footer">
            <form action="' . BASE_URL . 'includes/alertreply.php" method="post">
            <a class="btn btn-outline-primary" style="font-size: x-large;font-weight: bold; color:black;' . $remove . '" href="' . BASE_URL . 'includes/Pages/alert/' . $alert['alert_file'] . '" target="_blank">View File</a>
            <input type="hidden" name="alert_id" value="' . $alert['id'] . '"/>
                <input type="hidden" name="user_id" value="' . $user_id . '"/>
                <button style="font-size: x-large;font-weight: bold;" type="submit" name="ok" value="ok" class="btn btn-outline-success" data-bs-dismiss="modal">OK</button>
            </form>
            <form action="' . BASE_URL . 'includes/alertreply.php" method="post">

                <input type="hidden" name="alert_id" value="' . $alert['id'] . '"/>
                <input type="hidden" name="user_id" value="' . $user_id . '"/>
                <button style="font-size: x-large;font-weight: bold;" type="submit" name="close" value="close" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
            </form>
            </div>
            </div>
        </div>
       </div>';
    }
}


$checkTodo = $connect->query("SELECT count(*) FROM todo_ok WHERE userId = '$user_id'AND DATE(date) = CURDATE()");

if ($checkTodo->fetchColumn() <= 0) {

    $fetchTodayTodo = $connect->query("SELECT * FROM per_checklist WHERE user_id = '$user_id' AND mainCheckId IS NULL AND DATE(date) = CURDATE() ORDER BY date ASC LIMIT 1");
    while ($fetchTodayTodoData = $fetchTodayTodo->fetch()) {
        $checkMute = $connect->query("SELECT count(*) FROM mute_notification WHERE userId = '$user_id'");
        if ($checkMute->fetchColumn() > 0) {
            $date = date("Y-m-d");
            $sql = "INSERT INTO todo_ok (userId,date) VALUES ('$user_id','$date')";
            $stmt = $connect->prepare($sql);
            $stmt->execute();
            break;
        }
?>
        <div style="width:98vw;height:100vh;position:fixed;top:0px;z-index:10000;background-color: rgba(0, 0, 0, 0.3);">

            <div class="modal-dialog rounded modal-lg" role="document" style="border-radius:40px; border:1px solid #9b9ba12b;box-shadow:9px 12px 15px 0px #9b9bd999; margin-top:250px;">
                <div class="modal-content">
                    <div class="modal-header">
                          <h1 class="modal-title text-success">Today Todo</h1>
                          <p style="position: absolute;right: 72px;top: 35px;font-size: large;font-weight: bold;"><?php echo $fetchTodayTodoData['date']; ?></p>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        <?php
                        $fetchAllTodo = $connect->query("SELECT * FROM per_checklist WHERE user_id='$user_id' AND mainCheckId IS NULL AND DATE(date) = CURDATE() ORDER BY date ASC");
                        while ($fetchAllTodoData = $fetchAllTodo->fetch()) {
                            $percheckId = $fetchAllTodoData['id'];
                        ?>
                            
                                <h2 class="blink-todo" style="font-size:x-large;background-color: <?php echo $fetchAllTodoData['color']; ?>;font-weight: bold;color: white;margin: 5px;padding:5px;border-radius: 5px;
    text-align: center;"><?php echo $fetchAllTodoData['title']; ?></h2>
                                <ul>
                                    <div class="row">
                                    <?php
                                    $fetchSub = $connect->query("SELECT * FROM per_subchecklist WHERE main_checklist_id = '$percheckId'");
                                    while ($fetchSubData = $fetchSub->fetch()) {
                                    ?>
                                    <div class="col-3">
                                        <li style="list-style-type: circle;"><h6 style="font-size:large; font-weight:bold;"><?php echo $fetchSubData['name']; ?></h6></li>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                   </div>
                                </ul>
                            
                        <?php
                        }
                        ?>
                <?php
                echo '</div>
            
            <div class="modal-footer">
            <form action="' . BASE_URL . 'includes/Pages/todoRepl.php" method="post">
            <input type="hidden" name="toDoDate" value="' . date("Y-m-d") . '"/>
                <input type="hidden" name="user_id" value="' . $user_id . '"/>
                <button style="font-size: x-large;font-weight: bold;" type="submit" name="ok" value="ok" class="btn btn-outline-success" data-bs-dismiss="modal">OK</button>
            </form>
            </div>
            </div>
        </div>
       </div>';
            }
        }
