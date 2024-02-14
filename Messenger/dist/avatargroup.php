<div class="col-xl-6 d-none d-xl-block">
                                        <div class="row align-items-center justify-content-end gx-6">
                                            <div class="col-auto">
                                                <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                            </div>

                                            <!-- <div class="col-auto">
                                                <div class="avatar-group">
                                                    <a href="#" class="avatar avatar-sm" data-bs-toggle="modal" data-bs-target="#modal-user-profile">
                                                        <img class="avatar-img" src="<?php echo $pic111; ?>" alt="#">
                                                    </a>

                                                    <a href="#" class="avatar avatar-sm" data-bs-toggle="modal" data-bs-target="#modal-profile">
                                                        <img class="avatar-img" src="<?php echo $pic11; ?>" alt="#">
                                                    </a>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>



    <!-- Modal: Profile -->
    <div class="modal fade" id="modal-profile" tabindex="-1" aria-labelledby="modal-profile" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">
                <!-- Modal body -->
                <?php 
                    $chat_Data = $connect->query("SELECT * FROM users WHERE id = '$userId'");
                    $chat_Name = $chat_Data->fetch();

                    $chat_Data1 = $connect->query("SELECT file_name FROM users WHERE id = '$userId'");
                    $prof_pic111 = $chat_Data1->fetchColumn();
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
                <div class="modal-body py-0">
                    <!-- Header -->
                    <div class="profile modal-gx-n">
                        <div class="profile-img text-primary rounded-top-xl">
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

                            <div class="position-absolute top-0 start-0 py-6 px-5">
                                <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>

                        <div class="profile-body">
                            <div class="avatar avatar-xl">
                                <img class="avatar-img" src="<?php echo $pic111; ?>" alt="#">
                            </div>

                            <h4 class="mb-1"><?php echo $chat_Name['nickname']; ?></h4>
                            <!-- <p>last seen 5 minutes ago</p> -->
                        </div>
                    </div>
                    <!-- Header -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>User Id</h5>
                                    <p><?php echo $chat_Name['studid']; ?></p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <i class="bi bi-globe"></i>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>E-mail</h5>
                                    <p><?php echo $chat_Name['email']; ?></p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Phone</h5>
                                    <p><?php echo $chat_Name['phone']; ?></p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- List  -->

                    <!-- <hr class="hr-bold modal-gx-n my-0"> -->

                    <!-- List -->
                    <!-- <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Active status</h5>
                                    <p>Show when you're active.</p>
                                </div>

                                <div class="col-auto">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="profile-status" checked>
                                        <label class="form-check-label" for="profile-status"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul> -->
                    <!-- List -->

                    <!-- <hr class="hr-bold modal-gx-n my-0"> -->

                    <!-- List -->
                    <!-- <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="#" class="text-danger">Logout</a>
                        </li>
                    </ul> -->
                    <!-- List -->
                </div>
                
                <!-- Modal body -->

            </div>
        </div>
    </div>

    <!-- Modal: User profile -->
    <div class="modal fade" id="modal-user-profile" tabindex="-1" aria-labelledby="modal-user-profile" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">

                <?php 
                    $chat_Data11 = $connect->query("SELECT * FROM users WHERE id = '$chatId'");
                    $chat_Name11 = $chat_Data11->fetch();

                    $chat_Data11 = $connect->query("SELECT file_name FROM users WHERE id = '$chatId'");
                    $prof_pic1111 = $chat_Data11->fetchColumn();
                    if ($prof_pic1111 != "") {
                        $pic1111 = BASE_URL . 'includes/Pages/upload/' . $prof_pic1111;
                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic1111)) {
                            $pic1111 = BASE_URL . 'includes/Pages/upload/' . $prof_pic1111;
                        } else {
                            $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                        }
                    } else {
                        $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                    }
                        ?>

                <!-- Modal body -->
                <div class="modal-body py-0">
                    <!-- Header -->
                    <div class="profile modal-gx-n">
                        <div class="profile-img text-primary rounded-top-xl">
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

                            <div class="position-absolute top-0 start-0 p-5">
                                <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>

                        <div class="profile-body">
                            <div class="avatar avatar-xl">
                                <img class="avatar-img" src="<?php echo $pic1111?>" alt="#">

                                <!-- <a href="#" class="badge badge-lg badge-circle bg-primary text-white border-outline position-absolute bottom-0 end-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </a> -->
                            </div>

                            <h4 class="mb-1"><?php echo $chat_Name11['nickname'];?></h4>
                            <!-- <p>last seen 5 minutes ago</p> -->
                        </div>
                    </div>
                    <!-- Header -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>User Id</h5>
                                    <p><?php echo $chat_Name11['studid'];?></p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <i class="bi bi-globe"></i>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>E-mail</h5>
                                    <p><?php echo $chat_Name11['email'];?></p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Phone</h5>
                                    <p><?php echo $chat_Name11['phone'];?></p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- List -->

                    <!-- <hr class="hr-bold modal-gx-n my-0"> -->

                    <!-- List -->
                    <!-- <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Notifications</h5>
                                    <p>Enable sound notifications</p>
                                </div>

                                <div class="col-auto">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user-notification-check">
                                        <label class="form-check-label" for="user-notification-check"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul> -->
                    <!-- List -->

                    <!-- <hr class="hr-bold modal-gx-n my-0"> -->

                    <!-- List -->
                    <!-- <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="#" class="text-reset">Send Message</a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="text-danger">Block User</a>
                        </li>
                    </ul> -->
                    <!-- List -->
                </div>
                
                <!-- Modal body -->

            </div>
        </div>
    </div>