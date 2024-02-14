<style type="text/css">
    .sidebar {
        width: 315px !important;
    }

    .avatar-online::before {
        background: #28a745 !important;
    }

    #ulButtons {
        -webkit-box-direction: normal !important;
        flex-direction: column !important;
    }
</style>
<div style="float: right;margin-top: -20px;">

    <ul class="nav navbar-nav justify-content-between justify-content-xl-center align-items-center w-100" role="tablist" id="ulButtons">
        <!-- Invisible item to center nav vertically -->
        <li class="nav-item d-none d-xl-block invisible flex-xl-grow-1">
            <a class="nav-link py-0 py-lg-8" href="#" title="">
                <div class="icon icon-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </a>
        </li>

        <!-- New chat -->
        <li class="nav-item m-3">
            <a class="nav-link py-0 py-lg-8" id="tab-create-chat" href="#tab-content-create-chat" title="Create chat" data-bs-toggle="tab" role="tab">
                <div class="icon icon-xl">
                    <i class="bi bi-people" style="font-size:x-large;"></i>
                </div>
            </a>
        </li>

        <!-- Friends -->
        <li class="nav-item m-3">
            <a class="nav-link py-0 py-lg-8" id="tab-friends" href="#tab-content-friends" title="Friends" data-bs-toggle="tab" role="tab">
                <div class="icon icon-xl">
                    <!-- <i class="bi bi-people" style="font-size:x-large;"></i> -->
                    <i class="bi bi-person" style="font-size:x-large;"></i>
                </div>
            </a>
        </li>

        <!-- Chats -->
        <li class="nav-item m-3">
            <a class="nav-link active py-0 py-lg-8" id="tab-chats" href="#tab-content-chats" title="Chats" data-bs-toggle="tab" role="tab">
                <div class="icon icon-xl icon-badged">
                    <i class="bi bi-chat-left" style="font-size:x-large;"></i>
                    <!-- <div class="badge badge-circle bg-primary">
                        <span>4</span>
                    </div> -->
                </div>
            </a>
        </li>

        <!-- Profile -->
    </ul>
</div>

<div class="tab-content h-100" role="tablist" style="float:left;width: inherit;">
    <!-- Create -->
    <div class="tab-pane fade h-100" id="tab-content-create-chat" role="tabpanel">
        <div class="d-flex flex-column h-100">
            <div class="hide-scrollbar" style="margin-top: -30px;">

                <div class="container">

                    <!-- Title -->
                    <div class="mb-4">
                        <h2 class="fw-bold m-0">Create Group</h2>
                    </div>

                    <!-- Search -->
                    <div class="mb-4">
                        <!-- <div class="mb-5">
                            <form action="#">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <div class="icon icon-lg">
                                            <i class="bi bi-search"></i>
                                        </div>
                                    </div>

                                    <input type="text" class="form-control form-control-lg ps-0" placeholder="Search messages or users" aria-label="Search for messages or users...">
                                </div>
                            </form>
                        </div> -->

                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="pill" href="#create-chat-info" role="tab" aria-controls="create-chat-info" aria-selected="true">
                                    Add Group Details
                                </a>
                            </li>

                            <!-- <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="pill" href="#create-chat-members" role="tab" aria-controls="create-chat-members" aria-selected="true">
                                    People
                                </a>
                            </li> -->
                        </ul>
                    </div>

                    <!-- Tabs content -->
                    <div class="tab-content" role="tablist">
                        <form autocomplete="off" action="<?php echo BASE_URL; ?>Messenger/dist/addGroup.php" method="post" enctype="multipart/form-data">
                            <div class="tab-pane fade show active" id="create-chat-info" role="tabpanel">

                                <div class="card border-0">
                                    <div class="profile">
                                        <div class="profile-img text-primary rounded-top">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74">
                                                <defs>
                                                    <style>
                                                        .cls-2 {
                                                            fill: #fff;
                                                            opacity: 0.1;
                                                        }
                                                    </style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z" />
                                                        <path class="cls-2" d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z" />
                                                        <path class="cls-2" d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z" />
                                                        <circle class="cls-2" cx="94.5" cy="57.5" r="22.5" />
                                                        <path class="cls-2" d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>

                                        <div class="profile-body p-0">
                                            <div class="avatar avatar-lg">
                                                <span class="avatar-text bg-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image">
                                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                        <polyline points="21 15 16 10 5 21"></polyline>
                                                    </svg>
                                                </span>

                                                <div class="badge badge-lg badge-circle bg-primary border-outline position-absolute bottom-0 end-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    </svg>
                                                </div>

                                                <input id="upload-chat-img" name="groupProfile" class="d-none" type="file">
                                                <label class="stretched-label mb-0" for="upload-chat-img"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row gy-6">
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <input type="text" name="groupName" class="form-control" id="floatingInput" placeholder="Enter a chat name">
                                                    <label for="floatingInput">Enter group name</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Description" id="floatingTextarea" rows="8" data-autosize="true" style="min-height: 100px;" name="groupDesc"></textarea>
                                                    <label for="floatingTextarea">What's your purpose?</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <center>
                                                    <input type="button" class="btn btn-primary" name="addMember" value="Add Member" data-bs-toggle="modal" data-bs-target="#MemberModal" />
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Options -->
                                <!-- <div class="mt-8">

                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row gx-5">
                                                <div class="col">
                                                    <input type="submit" class="btn btn-primary" name="addGroup" value="Add Group" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                            <!-- Members -->


                            <div class="tab-pane fade" id="create-chat-members" role="tabpanel" style="margin-top: -500px;display: none;">

                                <nav>



                                </nav>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="MemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Add Participant</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <div class="icon icon-lg">
                                                            <i class="bi bi-search"></i>
                                                        </div>
                                                    </div>

                                                    <input type="text" class="form-control form-control-lg ps-0" placeholder="Search messages or users" aria-label="Search for messages or users..." id="searchInputMember">
                                                </div>
                                            </form>
                                            <!-- Card -->
                                            <div id="userCardContainer">
                                                <?php
                                                $userId = $_SESSION['login_id'];
                                                $allUsersgroup = $connect->query("SELECT * FROM users WHERE id != '$userId'");
                                                while ($allUsersDatagroup = $allUsersgroup->fetch()) {
                                                    $prof_pic111 = $allUsersDatagroup['file_name'];
                                                    if ($prof_pic111 != "") {
                                                        $pic111 = BASE_URL . 'includes/Pages/upload/' . $prof_pic111;
                                                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                                                            $pic111 = BASE_URL . 'includes/Pages/upload/' . $prof_pic111;
                                                        } else {
                                                            $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                        }
                                                    } else {
                                                        $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                    }
                                                ?>
                                                    <div class="card border-0 mt-5">
                                                        <div class="card-body bg-dark" style="border-radius: 20px;margin: 5px;">

                                                            <div class="row align-items-center gx-5">
                                                                <div class="col-auto">
                                                                    <div class="avatar ">

                                                                        <img class="avatar-img" src="<?php echo $pic111; ?>" alt="">


                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <h5><?php echo $allUsersDatagroup['nickname']; ?></h5>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="form-check bg-dark">
                                                                        <input style="border: 1px solid #95aac9;" class="form-check-input" type="checkbox" value="<?php echo $allUsersDatagroup['id']; ?>" name="addUsers[]" id="id-member-<?php echo $allUsersDatagroup['id']; ?>" />
                                                                        <label class="form-check-label" for="id-member-<?php echo $allUsersDatagroup['id']; ?>"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <label class="stretched-label" for="id-member-<?php echo $allUsersDatagroup['id']; ?>"></label>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <!-- Card -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" name="addGroup" value="Add Group" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- Tabs content -->
                </div>

            </div>
        </div>
    </div>

    <!-- Friends -->
    <div class="tab-pane fade h-100" id="tab-content-friends" role="tabpanel">
        <div class="d-flex flex-column h-100">
            <div class="hide-scrollbar" style="margin-top: -30px;">
                <div class="container">

                    <!-- Title -->
                    <div class="mb-4">
                        <h2 class="fw-bold m-0">Friends</h2>
                    </div>

                    <!-- Search -->
                    <div class="mb-4">
                        <form action="#">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <div class="icon icon-lg">
                                        <i class="bi bi-search"></i>
                                    </div>
                                </div>

                                <input type="text" class="form-control form-control-lg ps-0" id="searchbarfriends" placeholder="Search messages or users" aria-label="Search for messages or users...">
                            </div>
                        </form>

                        <!-- Invite button -->
                        <div class="mt-5" style="display: none;">
                            <a href="#" class="btn btn-lg btn-primary w-100 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-invite">
                                Find Friends

                                <span class="icon ms-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="8.5" cy="7" r="4"></circle>
                                        <line x1="20" y1="8" x2="20" y2="14"></line>
                                        <line x1="23" y1="11" x2="17" y2="11"></line>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- List -->
                <div style="height: 60vh;">
                    <div class="card-list" id="userCardList">
                        <!-- <div class="my-5">
                                            <small class="text-uppercase text-muted">B</small>
                                        </div> -->

                        <?php
                        $userId = $_SESSION['login_id'];
                        $allUsers = $connect->query("SELECT * FROM users WHERE id != '$userId'");
                        while ($allUsersData = $allUsers->fetch()) {
                            $prof_pic11 = $allUsersData['file_name'];
                            if ($prof_pic11 != "") {
                                $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                                    $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                } else {
                                    $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                }
                            } else {
                                $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                            }
                        ?>

                            <!-- Card -->

                            <div class="card border-0">
                                <a href="<?php echo BASE_URL; ?>Messenger/dist/chat-direct.php?chatId=<?php echo $allUsersData['id']; ?>" style="display: flex;">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-auto">
                                                <img class="avatar-img avatar" src="<?php echo $pic11; ?>" alt="">
                                            </div>

                                            <div class="col">
                                                <h5><?php echo $allUsersData['nickname']; ?></h5>
                                                <!-- <p>last seen 3 days ago</p> -->
                                            </div>

                                            <!-- <div class="col-auto">
                                                <div class="dropdown" style="position: absolute;top: 35px;right: 5px;">

                                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>

                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">New message</a></li>
                                                        <li><a class="dropdown-item" href="#">Edit contact</a>
                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-danger" href="#">Block user</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> -->

                                        </div>

                                    </div>
                                </a>
                            </div>

                            <!-- Card -->
                        <?php } ?>
                    </div>

                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Chats -->
    <div class="tab-pane fade h-100 show active" id="tab-content-chats" role="tabpanel">
        <div class="d-flex flex-column h-100 position-relative">
            <div class="hide-scrollbar" style="margin-top: -30px;">

                <div class="container">
                    <!-- Title -->
                    <div class="mb-4">
                        <h2 class="fw-bold m-0">Chats</h2>
                    </div>

                    <!-- Search -->
                    <div class="mb-4">
                        <form action="#">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <div class="icon icon-lg">
                                        <i class="bi bi-search"></i>
                                    </div>
                                </div>

                                <input type="text" class="form-control form-control-lg ps-0" id="chatSearchBar" placeholder="Search messages or users" aria-label="Search for messages or users...">
                            </div>
                        </form>
                    </div>

                    <!-- Chats -->
                    <div style="height: 60vh;">
                    <div class="card-list" id="cardListchat">
                         
                    </div>
                    </div>
                    <!-- Chats -->
                </div>

            </div>
        </div>
    </div>
</div>

<div class="navbar-vertical-footer bg-light" style="position: absolute; bottom: 0px;width: inherit; text-align: center;border-top: 1px solid #d9e4f0;">


     <center>
        <div style="width: 70%;">
                                <?php include ROOT_PATH . 'includes/Pages/rolecolor.php'; ?>
                                <hr style="color:black;margin: 0px;"></div>
                            </center>
    <!-- <hr style="color:black;"> -->
    <ul class="navbar-vertical-footer-list" style="-webkit-box-direction: normal !important;list-style-type: none;display: flex;justify-content: center;margin-left: -85px;">
        <li class="navbar-vertical-footer-list-item">
            <!-- Style Switcher -->
            <div class="dropdown dropup">
                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                    <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:25px; width: 25px; margin: 3px;">
                </button>

                <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown" style="width:210px;">
                    <span class="dropdown-header text-success" style="font-size:large;">Apps
                    </span>
                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/Home.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V2.1.0">
                        <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:30px; width: 30px; margin: 3px;">
                        <span class="text-truncate" style="font-size: large;font-weight: bold;">Grade sheet</span>
                    </a>
                    <!-- <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/apps-bri.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/BRI logo.svg" style="height:25px; width: 25px; margin: 5px;">
                                                <span class="text-truncate" style="font-size:larger;">BRI</span>
                                            </a> -->
                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>Library/index.php?checkValue=<?php echo "unchecked"; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="V1.2.0">
                        <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:30px; width: 30px; margin: 3px;">
                        <span class="text-truncate" style="font-size: large;font-weight: bold;">Library</span>
                    </a>
                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>Scheduling/home.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.1.0">
                        <img src="<?php echo BASE_URL; ?>assets/svg/new/S logo.svg" style="height:30px; width: 30px; margin: 3px;">
                        <span class="text-truncate" style="font-size: large;font-weight: bold;">Scheduling</span>
                    </a>
                    <?php if ($role != "super admin") { ?>
                                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>Test/index.php" data-placement="left" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                    <img style="height:30px; width:30px;" src="<?php echo BASE_URL; ?>assets/svg/new/test.png">
                                                    <span class="text-truncate" style="font-size: large;font-weight: bold; margin: 5px;">Test</span>
                                                </a>
                                            <?php } else { ?>
                                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>Test/dashboard/dashboard.php" data-placement="left" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                    <img style="height:30px; width:30px;" src="<?php echo BASE_URL; ?>assets/svg/new/test.png">
                                                    <span class="text-truncate" style="font-size: large;font-weight: bold; margin: 5px;">Test</span>
                                                </a><?php } ?>
                </div>
            </div>

            <!-- End Style Switcher -->
        </li>

        <li class="navbar-vertical-footer-list-item">
            <!-- Other Links -->
            <div class="dropdown dropup">
                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                    <i class="bi-info-circle text-dark" style="font-size:20px;"></i>
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
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newupdates">
                        <i class="bi-gift dropdown-item-icon"></i>
                        <span class="text-truncate" title="What's new?">What's new?</span>
                        <span><img src="<?php echo BASE_URL; ?>assets/svg/new2.gif" style="height: 25px;"></span>
                        <!-- <span class="badge bg-danger rounded-pill ms-1">New</span> -->
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

                <!-- Switcher -->
        <li class="nav-item d-none d-xl-block">
            <a class="switcher-btn nav-link py-0 py-lg-8" href="#!" title="Themes" style="font-size: x-large;bottom: -20px;position: absolute;">
                <div class="switcher-icon switcher-icon-dark icon icon-xl d-none" data-theme-mode="dark">
                    <i class="bi bi-moon-fill"></i>
                </div>
                <div class="switcher-icon switcher-icon-light icon icon-xl d-none" data-theme-mode="light">
                    <i class="bi bi-brightness-high"></i>
                </div>
            </a>
        </li>

    </ul>
</div>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
<script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        function myFunctionChats() {
            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>Messenger/dist/fetchchatdata.php',
                data: {
                    user: "user",
                },
                success: function(response) {

                    // alert(response);
                    $("#cardListchat").empty();
                    $("#cardListchat").html(response);
                }
            });
        }
        myFunctionChats();
        // setInterval(myFunctionChats, 5000); // 5000 milliseconds = 5 seconds
    });

    // $(".fetchGroupDetail").on("click", function() {
    //     const groupId = $(this).data("group");
    //     $.ajax({
    //         type: 'POST',
    //         url: '<?php echo BASE_URL; ?>chatbox/fetchGroupDetail.php',
    //         data: {
    //             groupId: groupId,
    //         },
    //         success: function(response) {
    //             // alert(response);
    //             $("#gDetail").empty();
    //             $("#gDetail").html(response);
    //         }
    //     });
    // })
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the input field and card-list
        const searchBar = document.getElementById('searchbarfriends');
        const userCardList = document.getElementById('userCardList');

        // Add an input event listener to the search bar
        searchBar.addEventListener('input', function(e) {
            const searchText = e.target.value.toLowerCase();
            const cards = userCardList.querySelectorAll('.card');

            cards.forEach(card => {
                const username = card.querySelector('h5').textContent.toLowerCase();
                if (username.includes(searchText)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the input field and user cards container
        const searchInput = document.getElementById('searchInputMember');
        const userCardContainer = document.getElementById('userCardContainer');
        const cards = userCardContainer.getElementsByClassName('card');

        // Event listener for the input
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();

            Array.from(cards).forEach(card => {
                const userName = card.querySelector('h5').innerText.toLowerCase();
                const displayStyle = userName.includes(searchTerm) ? 'block' : 'none';
                card.style.display = displayStyle;
            });
        });
    });
</script>


<script>
    $(document).on("click", ".fetchGroupDetail", function() {
        const groupId = $(this).data("group");
        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>Messenger/dist/fetchGroupDetail.php',
            data: {
                groupId: groupId,
            },
            success: function(response) {
                // alert(response);
                $("#gDetail").empty();
                $("#gDetail").html(response);
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the input field and chat cards container
        const searchInput = document.getElementById('chatSearchBar');
        const chatCards = document.getElementById('cardListchat').getElementsByClassName('card');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();

            Array.from(chatCards).forEach(card => {
                const chatText = card.textContent.toLowerCase();
                const displayStyle = chatText.includes(searchTerm) ? 'block' : 'none';
                card.style.display = displayStyle;
            });
        });
    });
</script>
