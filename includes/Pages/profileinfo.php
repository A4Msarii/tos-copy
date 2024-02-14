<div class="dropdown">
                            <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                                <div class="avatar avatar-circle">
                                    <img class="avatar-img" src="<?php echo $pic ?>" alt="Image Description">
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>

                            <?php
                            $fetch_details1 = "SELECT * FROM users where id='$user_id'";
                            $fetch_detailsst22 = $connect->prepare($fetch_details1);
                            $fetch_detailsst22->execute();

                            if ($fetch_detailsst22->rowCount() > 0) {
                                $re22 = $fetch_detailsst22->fetchAll();
                                foreach ($re22 as $row22) {
                                }
                            }
                            ?>

                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                                <div class="dropdown-item-text">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="<?php echo $pic; ?>" alt="Image Description">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="mb-0"><?php echo $username; ?></h5>
                                            <p class="card-text text-body"><?php echo $row22['email'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>


                                <a class="dropdown-item" href="<?php echo BASE_URL;?>includes/Pages/profile.php">My Profile</a>
                                <a class="dropdown-item" href="<?php echo BASE_URL;?>includes/Pages/organization.php">Organization Chart</a>
                                <a class="dropdown-item" href="<?php echo BASE_URL;?>includes/Pages/per_checklist.php">Checklist</a>
                                <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#EsignMOdal">ESign</a>
                                <!-- <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#newupdates" style="cursor: pointer;">New Updates </a> -->
                                
                                <a class="dropdown-item" href="<?php echo BASE_URL;?>includes/Pages/dashboard/files.php">Document Management</a>
                                <a class="dropdown-item" href="<?php echo BASE_URL;?>includes/Pages/role_noti_chage.php">Role Change request</a>
                                <div id="navbarVerticalMenuPagesMenu">
                                    <div class="nav-item">
                                        <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarFavorite" aria-expanded="false" aria-controls="navbarFavorite">
                                            <span class="nav-link-title">Favourite</span>
                                        </a>
                                        <div id="navbarFavorite" class="nav-collapse collapse hide" data-bs-parent="#navbarFavorite" hs-parent-area="#navbarFavorite">

                                            <div id="navbarUsersMenuDiv">
                                                <div class="nav-item">
                                                    <div style="position:relative; display: inline-block; margin: 5px;">
                                                        <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="redcolor">
                                                            <span style="color:black; position:absolute; z-index: 99;" class="nav-link-title" id="red"></span>
                                                        </a>

                                                    </div>
                                                    <div style="position:relative; display: inline-block; margin: 5px;">
                                                        <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="greencolor">
                                                            <span style="color:black; position:absolute; z-index: 99;" class="nav-link-title" id="green"></span>
                                                        </a>

                                                    </div>
                                                    <div style="position:relative; display: inline-block; margin:5px;">
                                                        <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="yellowcolor">
                                                            <span style="color:black; position:absolute; z-index: 99;" class="nav-link-title" id="yellow"></span>
                                                        </a>

                                                    </div>
                                                    <div style="position:relative; display: inline-block; margin: 5px;">
                                                        <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="bluecolor">
                                                            <span style="color:black; position:absolute; z-index: 99;" class="nav-link-title" id="blue"></span>
                                                        </a>

                                                    </div>
                                                    <div style="position:relative; display: inline-block; margin: 5px;">
                                                        <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="greycolor">
                                                            <span style="color:black; position:absolute; z-index:99;" class="nav-link-title" id="grey"></span>
                                                        </a>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/logout.php">Sign out</a>
                            </div>
                        </div>





