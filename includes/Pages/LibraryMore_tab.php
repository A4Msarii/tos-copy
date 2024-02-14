
<li class="nav-item" style="position: relative;">
  <a id="LibraryMoreMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-placement="bottom" title="Mega Menu">More</a>

  <!-- Mega Menu -->
  <div class="dropdown-menu bg-light" aria-labelledby="LibraryMoreMenu" style="position: absolute;left: -835px;width: 900px;">
    <div class="row ps-2 pe-2">
        
      <ul style="text-align: end;">
      <?php
             $query71 = "SELECT * FROM user_files where menu_type='files' LIMIT 1000 OFFSET 2";
            $statement71 = $connect->prepare($query71);
            $statement71->execute();
            $result71 = $statement71->fetchAll();
             foreach ($result71 as $row71) {
                $row71['type_id'];
                $string = $row71['filename'];
                $url = BASE_URL . 'includes/Pages/files/' . $string;
                if ($row71['type'] == 'pdf') {
                    echo '<button style="width: auto;" onclick="window.open(\'' . $url . '\', \'_blank\');" class="btn iconBtn btn-soft-secondary btn-sm" title="' . $row71['filename'] . '">' .  substr($string, 0, 5) . '<a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '" style="' . $remClass . '" class="delMenu"><i style="position:relative;top:-10px;right:15px;cursor:pointer;display:none;" class="bi bi-x-circle text-danger"></i></a></button>';
                } elseif ($row71['type'] == 'docx' || $row71['type'] == 'pptx' || $row71['type'] == 'xlsx') {
                    echo '<button style="width: auto;" class="docxLink_shel btn iconBtn btn-soft-secondary btn-sm" name="' . $row71['filename'] . '" value="' . $row71['type'] . '" title="' . $row71['filename'] . '">' .  substr($string, 0, 5) . '<a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '" class="delMenu"><i style="position:relative;top:-10px;right:15px;cursor:pointer;display:none;" class="bi bi-x-circle text-danger"></i></a></button>';
                } elseif ($row71['type'] == 'png' || $row71['type'] == 'jpg' || $row71['type'] == 'gif' || $row71['type'] == 'jpeg' || $row71['type'] == 'svg' || $row71['type'] == 'bmp' || $row71['type'] == 'mp4') {
                    echo '<button style="width: auto;" onclick="window.open(\'' . $url . '\', \'_blank\');" class="btn iconBtn btn-soft-secondary btn-sm" title="' . $row71['filename'] . '">' .  substr($string, 0, 5) . '<a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '" class="delMenu"><i style="position:relative;top:-10px;right:15px;cursor:pointer;display:none;" class="bi bi-x-circle text-danger"></i></a></button>';
                } elseif ($row71['type'] == 'online') {
                    $fName = $row71['filename'];
                    $lName = $row71['lastName'];
                    echo '<a target="_blank" style="width: auto;" class="btn iconBtn btn-soft-secondary btn-sm" href="' . $row71['filename'] . '">' .  substr($lName, 0, 5) . '<a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '" class="delMenu"><i style="position:relative;top:-10px;right:15px;cursor:pointer;display:none;" class="bi bi-x-circle text-danger"></i></a></a>';
                } elseif ($row71['type'] == 'offline') {
                    $fName = $row71['filename'];
                    $lName = $row71['lastName'];
                    echo '<button style="width: auto;" class="btn iconBtn btn-soft-secondary btn-sm driveLink1" value="' . $row71['filename'] . '">' .  substr($lName, 0, 5) . '<a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '" class="delMenu"><i style="position:relative;top:-10px;right:15px;cursor:pointer;display:none;" class="bi bi-x-circle text-danger"></i></a></button>';
                }?>
                <?php
                if ($_SESSION['role'] == 'super admin') {
                ?>
                    <a href="<?php echo BASE_URL; ?>Library/removeFiles.php?filesId=<?php echo $row71['id']; ?>"><i style="position:relative;top:-8px;right:20px;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>
                  
                <?php }
            }
            ?>



            <?php
            $query1_fm70 = "SELECT * FROM file_menu_name LIMIT 1000 OFFSET 2";
            $statement1_fm70 = $connect->prepare($query1_fm70);
            $statement1_fm70->execute();
            if ($statement1_fm70->rowCount() > 0) {
                $result1_fm70 = $statement1_fm70->fetchAll();
                foreach ($result1_fm70 as $row390) {

                    $m_id = $row390['id'];
                    $typeed=$row390['type_menu'];
                    $bgColor = $row390['color'];
                    if($typeed=='menu'){
                        if (!function_exists('getContrastColor')) {
                        function getContrastColor($hexColor) {
                            
                        // Calculate the relative luminance of the background color
                        $r = hexdec(substr($hexColor, 1, 2));
                        $g = hexdec(substr($hexColor, 3, 2));
                        $b = hexdec(substr($hexColor, 5, 2));

                        $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;

                        // Choose a contrasting text color based on the luminance
                        return ($luminance > 0.5) ? '#000' : '#fff';
                    }
                        }

                        
                    $contrastColor = getContrastColor($bgColor);
            ?>
            
                    <div class="dropdown dropdown1 addBreifFile" style="margin-right: -10px; margin-top:10px;display: inline-block;width:auto;color: <?php echo $contrastColor; ?>;" value="<?php echo $row390['id']; ?>" name="0" data-custom="NULL">
                        <button style="margin-right: 15px;background-color:<?php echo $row390['color']?>; color: <?php echo $contrastColor; ?>;" type="button" class="btn iconBtn btn-soft-secondary btn-sm dropdown-toggle menu<?php echo $row390['id']; ?>" id="navbarNotificationsDropdown" data-bs-toggle="dropdown">
                            <?php echo substr($row390['menu_name'], 0, 5); ?>
                        </button>
                        <?php
                        if ($_SESSION['role'] == 'super admin') {
                        ?>
                            <a style="position: absolute;right: 2px;top: 8px;" href="<?php echo BASE_URL; ?>Library/removeFiles.php?menuId=<?php echo $row390['id']; ?>"><i class="bi bi-x-circle" style="position: relative;top: -10px;right: 15px;cursor: pointer;color: <?php echo $contrastColor; ?>;"></i></a>
                            <a style="position: absolute;top: 25px;right: 2px;" data-bs-toggle="modal" data-bs-target="#editmodalmenus" onclick="document.getElementById('menuidess').value='<?php echo $row390['id'] ?>';document.getElementById('menunameess').value='<?php echo $row390['menu_name'] ?>';document.getElementById('color_menu').value='<?php echo $row390['color'] ?>';"><i style="position:relative;top:-10px;right:15px;cursor:pointer;" class="bi bi-pen-fill text-success" ></i></a>
                        <?php } ?>
                        <div class="dropdown-menu dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 20rem; position:absolute;top:30px;z-index:1;">
                            <!-- Header -->
                            <?php
                            if ($_SESSION['role'] == "super admin") {
                            ?>
                                <div class="card-header card-header-content-between">
                                    <h1 style="color:<?php echo $row390['color']?> "><?php echo $row390['menu_name']; ?></h1>
                                    <i style="font-size: 25px;margin-top: -20px;margin-right: -25px;margin-bottom: -20px;" onclick="document.getElementById('me_id').value='<?php echo $row390['id'] ?>';document.getElementById('me_ty').value='<?php echo $row390['type_menu'] ?>';" class="bi bi-plus-circle-fill btn" data-bs-toggle="modal" data-bs-target="#selectfiles"></i>
                                </div>
                            <?php } ?>
                            <div class="card-body-height">
                                <?php
                                $query1_fm701 = "SELECT * FROM user_files where menu_type='menu' and type_id='$m_id'";
                                $statement1_fm701 = $connect->prepare($query1_fm701);
                                $statement1_fm701->execute();
                                if ($statement1_fm701->rowCount() > 0) {
                                    $result1_fm701 = $statement1_fm701->fetchAll();
                                    foreach ($result1_fm701 as $row3901) {
                                        if ($row3901['type'] == 'pdf') {
                                            echo '
                                  <a style="padding: 5px;margin: 5px;" href="' . BASE_URL . 'includes/Pages/files/' . $row3901['filename'] . '" class="nav-link ahstyle" target="_blank">' . $row3901['filename'] . '</a></a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '" class="delMenu"><i style="position:relative;top:-40px;right:-270px;z-index:3000;display:none;" class="bi bi-x-circle text-danger"></i></a>';
                                        } elseif ($row3901['type'] == 'offline') {
                                            echo '
                                <a style="padding: 5px;margin: 5px;" href="#" class="offline nav-link ahstyle"  value="' . $row3901['filename'] . '">' . $row3901['lastName'] . '</a> </a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '" class="delMenu"><i style="position:relative;top:-40px;right:-270px;z-index:3000;display:none;" class="bi bi-x-circle text-danger"></i></a>';
                                        } elseif ($row3901['type'] == 'online') {
                                            echo '
                                <a target="_blank" style="padding: 5px;margin: 5px;" href="' . $row3901['filename'] . '" class=" nav-link ahstyle">' . $row3901['lastName'] . '</a></a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '" class="delMenu"><i style="position:relative;top:-40px;right:-270px;z-index:3000;display:none;" class="bi bi-x-circle text-danger"></i></a>';
                                        } elseif ($row3901['type'] == 'docx' || $row3901['type'] == 'pptx' || $row3901['type'] == 'xlsx') {
                                            echo '
                                <a style="padding: 5px;margin: 5px;" href="#" class="docxLink_shel nav-link ahstyle" name="' . $row3901['filename'] . '" value="' . $row3901['type'] . '">' . $row3901['filename'] . '</a></a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '" class="delMenu"><i style="position:relative;top:-40px;right:-270px;z-index:3000;display:none;" class="bi bi-x-circle text-danger"></i></a>';
                                        } elseif ($row3901['type'] == 'png' || $row3901['type'] == 'jpg' || $row3901['type'] == 'gif' || $row3901['type'] == 'jpeg' || $row3901['type'] == 'svg' || $row3901['type'] == 'bmp') {
                                            echo '
                                <a style="padding: 5px;margin: 5px;" href="' . BASE_URL . 'includes/Pages/files/' . $row3901['filename'] . '" target="_blank" class="nav-link ahstyle">' . $row3901['filename'] . '</a></a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '" class="delMenu"><i style="position:relative;top:-40px;right:-270px;z-index:3000;display:none;" class="bi bi-x-circle text-danger"></i></a>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
                if($typeed=='megmenu'){
                    ?>
                      <div class="dropdown dropdown1" style="margin-right:-10px; margin-top:10px;display: inline-block;width:auto;" data-class="mega<?php echo $row3901['id']; ?>" data-color="<?php if ($row3901['color'] == "") {
                       echo "gray";
                        } else {
                         echo $row3901['color'];
                        } ?>">
                        <button type="button" style="width: auto; margin-right:15px;padding: 8px;;background-color:<?php echo $row390['color']?>;color: <?php echo $contrastColor; ?>;" class="nav-link btn btn-soft-secondary dropdown-toggle mega<?php echo $row390['id']; ?>" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="landingsMegaMenu1">
                            <?php echo substr($row390['menu_name'], 0, 5); ?>
                        </button>
                        <?php
                        if ($_SESSION['role'] == 'super admin') {
                        ?>
                            <a style="position: absolute;right: 2px;top: 8px;" href="<?php echo BASE_URL; ?>Library/removeFiles.php?menuId=<?php echo $row390['id']; ?>"><i style="position:relative;top:-10px;right:15px;cursor:pointer;color: <?php echo $contrastColor; ?>;" class="bi bi-x-circle"></i></a>
                            <a style="position: absolute;top: 25px;right: 2px;" data-bs-toggle="modal" data-bs-target="#editmodalmenus" onclick="document.getElementById('menuidess').value='<?php echo $row390['id'] ?>';document.getElementById('menunameess').value='<?php echo $row390['menu_name'] ?>';document.getElementById('color_menu').value='<?php echo $row390['color'] ?>';"><i style="position:relative;top:-10px;right:15px;cursor:pointer;" class="bi bi-pen-fill text-success" ></i></a>
                        <?php } ?>
                        <div class="hs-mega-menu dropdown-menu bg-light" aria-labelledby="landingsMegaMenu1" style="width: 700px;margin-top: -3px;position: absolute;right: 15px;">
                            <div class="navbar-dropdown-menu-promo">
                                <!-- Promo Item -->
                                <?php
                                if ($_SESSION['role'] == "super admin") {
                                ?>
                                    <div class="card-header card-header-content-between">
                                        <h1 style="color:<?php echo $row390['color']?> "><?php echo $row390['menu_name']; ?></h1>
                                        <i style="font-size: 30px;margin-top: -25px;position: absolute;right:0px;margin-bottom: -15px;" onclick="document.getElementById('me_id').value='<?php echo $row390['id'] ?>';document.getElementById('me_ty').value='<?php echo $row390['type_menu'] ?>';" class="bi bi-plus-circle-fill btn" data-bs-toggle="modal" data-bs-target="#selectfiles"></i>
                                    </div>
                                <?php } ?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <?php
                                        $query1_fm701 = "SELECT * FROM user_files WHERE menu_type = 'megmenu' AND type_id = '$m_id'";
                                        $statement1_fm701 = $connect->prepare($query1_fm701);
                                        $statement1_fm701->execute();
                                        if ($statement1_fm701->rowCount() > 0) {
                                            $result1_fm701 = $statement1_fm701->fetchAll();
                                            foreach ($result1_fm701 as $row390) {
                                                if ($row390['type'] == 'pdf') {
                                                    echo '<div class="col-4 border ahstyle">
                                      <a href="' . BASE_URL . 'includes/Pages/files/' . $row390['filename'] . '" class="nav-link rounded-2" target="_blank">' . $row390['filename'] . '</a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row390['id'] . '" class="delMenu"><i style="position:relative;top:-35px;right:-250px;display:none;" class="bi bi-x-circle text-danger"></i></a></div>';
                                                } elseif ($row390['type'] == 'offline') {
                                                    echo '<div class="col-4 border ahstyle">
                                    <a class="driveLink1 offline nav-link rounded-2"  value="' . $row390['filename'] . '" href="">' . $row390['lastName'] . '</a></a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row390['id'] . '" class="delMenu"><i style="position:relative;top:-35px;right:-250px;display:none;" class="bi bi-x-circle text-danger"></i></a> </div>';
                                                } elseif ($row390['type'] == 'online') {
                                                    echo '<div class="col-4 border ahstyle">
                                    <a target="_blank" href="' . $row390['filename'] . '" class=" nav-link rounded-2" >' . $row390['lastName'] . '</a> </a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row390['id'] . '" class="delMenu"><i style="position:relative;top:-35px;right:-250px;display:none;" class="bi bi-x-circle text-danger"></i></a></div>';
                                                } elseif ($row390['type'] == 'docx' || $row390['type'] == 'pptx' || $row390['type'] == 'xlsx') {
                                                    echo '<div class="col-4 docxLink_shel border ahstyle" name="' . $row390['filename'] . '" value="' . $row390['type'] . '">
                                    <a href="#" class="nav-link rounded-2">' . $row390['filename'] . '</a> </a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row390['id'] . '" class="delMenu"><i style="position:relative;top:-35px;right:-250px;display:none;" class="bi bi-x-circle text-danger"></i></a></div>';
                                                } elseif ($row390['type'] == 'png' || $row390['type'] == 'jpg' || $row390['type'] == 'gif' || $row390['type'] == 'jpeg' || $row390['type'] == 'svg' || $row390['type'] == 'bmp') {
                                                    echo '<div class="col-4 border ahstyle">
                                    <a href="' . BASE_URL . 'includes/Pages/files/' . $row390['filename'] . '" target="_blank" class="nav-link rounded-2">' . $row390['filename'] . '</a> </a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row390['id'] . '" class="delMenu"><i style="position:relative;top:-35px;right:-250px;display:none;" class="bi bi-x-circle text-danger"></i></a></div>';
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php 
                }
             }
            }?>
          </ul>
    </div>





    <!-- End Promo Item -->
  </div>
  <!-- End Promo -->
</li>