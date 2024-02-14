<div class="row justify-content-center">
  <div class="col-lg-12">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <!-- Header -->
      <div class="card-header card-header-content-between">
        <h3 class="text-success">Alerts</h3>
      </div>
      <!-- End Header -->
      <!-- Body -->
      <div class="card-body">
        <?php
        $url = $_SERVER['PHP_SELF'];
        $filename2 = basename($url);
        $title = $connect->query("SELECT *
        FROM alerttable
        GROUP BY user_id, alert_type, message
        ORDER BY id DESC");
        $titledat = $title->fetchAll();
        foreach ($titledat as $aldata) {
          if ($aldata['alertCategory'] == "General Announcement/Note To All") {
        ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax " role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>">
              <div class="card-body" style="margin:0px;padding:0px;">
                <div>
                  <div class="row align-items-center">
                    <div class="col-md-3 maintool">
                      <span class="badge h3" style="background-color:<?php echo $aldata['color']; ?>; font-size: large; width:90%; cursor:pointer;">
                        <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/announcement_w.png" style="height: 20px; margin:5px; padding: 0px;"> -->
                        <?php echo limitTexttitle($aldata['alert_type'], 20); ?></span>
                      <span class="badge tooldata"><?php echo $aldata['alertCategory']; ?></span>
                    </div>
                    <div class="col-md-8" title="<?php echo $aldata['message'] ?>">
                      <span class="legend-indicator" style="background-color:<?php echo $aldata['color']; ?>;" ></span><?php echo $aldata['message'] ?>
                    </div>
                  </div>
                </div>
              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
                <?php
                if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                }
                if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
                  <?php
                }   ?>
              </div>
            </div><br>
          <?php
          } elseif ($aldata['alertCategory'] == "Warning") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax  bg-warning" role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >
              <div class="card-body" style="margin:0px;padding:0px;">
                <span style="color: black; font-size: initial;" title="<?php echo $aldata['message'] ?>">
                  <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/warning_b.png" style="height: 20px; margin:5px;"> -->
                  <?php echo limitTexttitle($aldata['alert_type'], 20); ?> - <?php echo $aldata['message'] ?></span>
                  
              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
                <?php
                       if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                 ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                  }
                if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div><br>
          <?php
          } elseif ($aldata['alertCategory'] == "Caution") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax " role="alert" style="background-color: #ecbf13b3;" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >
              <div class="card-body" style="margin:0px;padding:0px;">
                 <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/caution_w.png" style="height: 20px; margin:5px;"> -->
                 <span style="color: white; font-size: initial" title="<?php echo $aldata['message'] ?>"><?php echo limitTexttitle($aldata['alert_type'], 20); ?> -
                  <?php echo $aldata['message'] ?></span>
              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
                <?php
                 if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                  }
                  if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                  ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div><br>
          <?php
          } elseif ($aldata['alertCategory'] == "Alert") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax  bg-danger" role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >
              <div class="card-body" style="margin:0px;padding:0px;">
                <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/alert_w.png" style="height: 20px; margin:5px;"> -->
                <span style="color:white; font-size:initial;" title="<?php echo $aldata['message'] ?>">
                  <?php echo limitTexttitle($aldata['alert_type'], 20); ?> - <?php echo $aldata['message'] ?>
                </span>
              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
              <?php
                 if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                  }
                  if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                  ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-white"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div><br>
          <?php
          } elseif ($aldata['alertCategory'] == "Remarks") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax " role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >

              <div class="card-body" style="margin:0px;padding:0px;">
                <div>
                  <div class="row align-items-center">
                    <div class="col-md-3 maintool">

                      <span class="badge h3" style="background-color:<?php echo $aldata['color']; ?>; font-size: large; width:90%; cursor:pointer;">
                        <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/remark_w.png" style="height: 20px; margin:5px;"> -->
                        <?php echo limitTexttitle($aldata['alert_type'], 20); ?></span>
                      <span class="badge tooldata"><?php echo $aldata['alertCategory']; ?></span>
                    </div>
                    <div class="col-md-8" title="<?php echo $aldata['message'] ?>">
                      <span class="legend-indicator" style="background-color:<?php echo $aldata['color']; ?>;" ></span><?php echo $aldata['message'] ?>
                    </div>
                  </div>
                </div>

              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
              <?php
                 if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                  }
                  if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                  ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div>
          <?php
          } elseif ($aldata['alertCategory'] == "Reminder") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax " role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >

              <div class="card-body" style="margin:0px;padding:0px;">

                <div>
                  <div class="row align-items-center">
                    <div class="col-md-3 maintool">
                      <span class="badge h3" style="background-color:<?php echo $aldata['color']; ?>; font-size: large; width:90%; cursor:pointer;">
                        <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/reminder_w.png" style="height: 20px; margin:5px;"> -->
                        <?php echo limitTexttitle($aldata['alert_type'], 20); ?></span>
                      <span class="badge tooldata"><?php echo $aldata['alertCategory']; ?></span>
                    </div>
                    <div class="col-md-8" title="<?php echo $aldata['message'] ?>">
                      <span class="legend-indicator" style="background-color:<?php echo $aldata['color']; ?>;" ></span><?php echo $aldata['message'] ?>
                    </div>
                  </div>
                </div>

              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
              <?php
                 if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                  }
                  if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                  ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div><br>
          <?php
          } elseif ($aldata['alertCategory'] == "Urgent Notice") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax " role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >

              <div class="card-body" style="margin:0px;padding:0px;">

                <div>
                  <div class="row align-items-center">
                    <div class="col-md-3 maintool">
                      <span class="badge h3" style="background-color:<?php echo $aldata['color']; ?>; font-size: large; width:90%; cursor:pointer;">
                        <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/urgent_w.png" style="height: 20px; margin:5px;"> -->
                        <?php echo limitTexttitle($aldata['alert_type'], 20); ?></span>
                      <span class="badge tooldata"><?php echo $aldata['alertCategory']; ?></span>
                    </div>
                    <div class="col-md-8" title="<?php echo $aldata['message'] ?>">
                      <span class="legend-indicator" style="background-color:<?php echo $aldata['color']; ?>;" ></span><?php echo $aldata['message'] ?>
                    </div>
                  </div>
                </div>

              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
              <?php
                 if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                  }
                  if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                  ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div><br>
          <?php
          } elseif ($aldata['alertCategory'] == "Updates") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax " role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >

              <div class="card-body" style="margin:0px;padding:0px;">
                <div>
                  <div class="row align-items-center">
                    <div class="col-md-3 maintool">
                      <span class="badge h3" style="background-color:<?php echo $aldata['color']; ?>; font-size: large; width:90%; cursor:pointer;">
                        <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/update_w.png" style="height: 20px; margin:5px;"> -->
                        <?php echo limitTexttitle($aldata['alert_type'], 20); ?></span>
                      <span class="badge tooldata"><?php echo $aldata['alertCategory']; ?></span>
                    </div>
                    <div class="col-md-8" title="<?php echo $aldata['message'] ?>">
                      <span class="legend-indicator" style="background-color:<?php echo $aldata['color']; ?>;" ></span><?php echo $aldata['message'] ?>
                    </div>
                  </div>
                </div>

              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
              <?php
                 if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                  }
                  if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                  ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div><br>
          <?php
          } elseif ($aldata['alertCategory'] == "Instructions") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax " role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >

              <div class="card-body" style="margin:0px;padding:0px;">

                <div>
                  <div class="row align-items-center">
                    <div class="col-md-3 maintool">
                      <span class="badge h3" style="background-color:<?php echo $aldata['color']; ?>; font-size: large; width:90%; cursor:pointer;">
                        <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/instrcution_w.png" style="height: 20px; margin:5px;"> -->
                        <?php echo limitTexttitle($aldata['alert_type'], 20); ?></span>
                      <span class="badge tooldata"><?php echo $aldata['alertCategory']; ?></span>
                    </div>
                    <div class="col-md-8" title="<?php echo $aldata['message'] ?>">
                      <span class="legend-indicator" style="background-color:<?php echo $aldata['color']; ?>;" ></span><?php echo $aldata['message'] ?>
                    </div>
                  </div>
                </div>

              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
              <?php
                 if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                  }
                  if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                  ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div><br>
          <?php
          } elseif ($aldata['alertCategory'] == "Feedback Request") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax " role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >

              <div class="card-body" style="margin:0px;padding:0px;">


                <div>
                  <div class="row align-items-center">
                    <div class="col-md-3 maintool">
                      <span class="badge h3" style="background-color:<?php echo $aldata['color']; ?>; font-size: large; width:90%; cursor:pointer;">
                        <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/feedback_w.png" style="height: 20px; margin:5px;"> -->
                        <?php echo limitTexttitle($aldata['alert_type'], 20); ?></span>
                      <span class="badge tooldata"><?php echo $aldata['alertCategory']; ?></span>
                    </div>
                    <div class="col-md-8" title="<?php echo $aldata['message'] ?>">
                      <span class="legend-indicator" style="background-color:<?php echo $aldata['color']; ?>;" ></span><?php echo $aldata['message'] ?>
                    </div>
                  </div>
                </div>

              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
              <?php
                 if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                  }
                  if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                  ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div>
          <?php
          } elseif ($aldata['alertCategory'] == "Call To Action") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax " role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >

              <div class="card-body" style="margin:0px;padding:0px;">


                <div>
                  <div class="row align-items-center">
                    <div class="col-md-3 maintool">
                      <span class="badge h3" style="background-color:<?php echo $aldata['color']; ?>; font-size: large; width:90%; cursor:pointer;">
                        <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/action_w.png" style="height: 20px; margin:5px;"> -->
                        <?php echo limitTexttitle($aldata['alert_type'], 20); ?></span>
                      <span class="badge tooldata"><?php echo $aldata['alertCategory']; ?></span>
                    </div>
                    <div class="col-md-8" title="<?php echo $aldata['message'] ?>">
                      <span class="legend-indicator" style="background-color:<?php echo $aldata['color']; ?>;" ></span><?php echo $aldata['message'] ?>
                    </div>

                  </div>
                </div>

              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
              <?php
                 if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                  }
                  if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                  ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div><br>
          <?php
          } elseif ($aldata['alertCategory'] == "Meeting Summaries") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax " role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >

              <div class="card-body" style="margin:0px;padding:0px;">


                <div>
                  <div class="row align-items-center">
                    <div class="col-md-3 maintool">
                      <span class="badge h3" style="background-color:<?php echo $aldata['color']; ?>; font-size: large; width:90%; cursor:pointer;">
                        <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/summary_w.png" style="height: 20px; margin:5px;"> -->
                        <?php echo limitTexttitle($aldata['alert_type'], 20); ?></span>
                      <span class="badge tooldata"><?php echo $aldata['alertCategory']; ?></span>
                    </div>
                    <div class="col-md-8" title="<?php echo $aldata['message'] ?>">
                      <span class="legend-indicator" style="background-color:<?php echo $aldata['color']; ?>;" ></span><?php echo $aldata['message'] ?>
                    </div>
                  </div>
                </div>

              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
              <?php
                 if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                  }
                  if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                  ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div>
          <?php
          } elseif ($aldata['alertCategory'] == "Status Reports") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax " role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >

              <div class="card-body" style="margin:0px;padding:0px;">


                <div>
                  <div class="row align-items-center">
                    <div class="col-md-3 maintool">
                      <span class="badge h3" style="background-color:<?php echo $aldata['color']; ?>; font-size: large; width:90%; cursor:pointer;">
                        <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/status_report_w.png" style="height: 20px; margin:5px;"> -->
                        <?php echo limitTexttitle($aldata['alert_type'], 20); ?></span>
                      <span class="badge tooldata"><?php echo $aldata['alertCategory']; ?></span>
                    </div>
                    <div class="col-md-8" title="<?php echo $aldata['message'] ?>">
                      <span class="legend-indicator" style="background-color:<?php echo $aldata['color']; ?>;" ></span><?php echo $aldata['message'] ?>
                    </div>
                  </div>
                </div>

              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
              <?php
                 if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                  }
                  if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Delete_landing'] == "1") {
                  ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div><br>
          <?php
          } elseif ($aldata['alertCategory'] == "Invitation") {
          ?>
            <div class="card card-hover-shadow alert position-relative tool toolajax " role="alert" data-bs-toggle="modal" data-bs-target="#landingalert" data-alertid="<?php echo $aldata['id'] ?>" >

              <div class="card-body" style="margin:0px;padding:0px;">


                <div>
                  <div class="row align-items-center">
                    <div class="col-md-3 maintool">
                      <span class="badge h3" style="background-color:<?php echo $aldata['color']; ?>; font-size: large; width:90%; cursor:pointer;">
                        <!-- <img src="<?php echo BASE_URL;?>assets/svg/alert/invitation_w.png" style="height: 20px; margin:5px;"> -->
                        <?php echo limitTexttitle($aldata['alert_type'], 20); ?></span>
                      <span class="badge tooldata"><?php echo $aldata['alertCategory']; ?></span>
                    </div>
                    <div class="col-md-8" title="<?php echo $aldata['message'] ?>">
                      <span class="legend-indicator" style="background-color:<?php echo $aldata['color']; ?>;" ></span><?php echo $aldata['message'] ?>
                    </div>
                  </div>
                </div>

              </div>
              <span class="text-dark position-absolute bottom-0 end-0 me-2"><?php echo time_elapsed_string($aldata['date']); ?></span>
              <div class="position-absolute top-0  end-0 me-2">
                <?php
           if ($aldata['user_id'] == $user_id || isset($_SESSION['permission']) && $permission['Edit_landing'] == "1") {
                ?>
                  <a style="text-decoration:none; color:black; font-size: large; width:60%; cursor:pointer;" href="" style="margin: 10px;" data-bs-toggle="modal" data-bs-target="#edit_alert" name="<?php echo $aldata['alert_type']; ?>" value="<?php echo $aldata['id']; ?>" class="altCat">
                    <i class="bi bi-pencil-square text-success"></i>
                  </a>
                  <?php
                }
                ?>
                  <a style="text-decoration: none; color:black; font-size: large; width:60%; cursor:pointer;" href="<?php echo BASE_URL ?>includes/Pages/deletealert.php?deletealertId=<?php echo $aldata['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                    <i class="bi bi-trash3-fill text-danger"></i>
                  </a>
              
              </div>
            </div><br>
        <?php
          }
        }
        ?>
        <!-- End Body -->
      </div>
      <!-- End Card -->
    </div>
  </div>
  <!-- End Row -->

  <div class="modal fade" id="landingalert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.3);">
    <div class="modal-dialog modal-notify modal-danger modal-lg" role="document" style="margin-top:250px;">
      <!--Content-->
      <div class="modal-content text-center alerthtmlset">
        <!--Header-->
        
      </div>
    </div>
  </div>
  <!-- edit modal -->
  <div class="modal fade" id="edit_alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-success" id="exampleModalLabel"><span id="alert_cate"></span>
          </h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="<?php echo BASE_URL; ?>includes/Pages/edit_alert.php" method="post">
            <div id="editAltData"></div><br>
            <button style="float:right; font-weight:bold; font-size:large;" type="submit" class="btn btn-success" id="submit" name="editAlert">Edit</button>
          </form>

        </div>
      </div>
    </div>
  </div>