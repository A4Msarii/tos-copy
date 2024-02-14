<div class="offcanvas offcanvas-end offcanvas-aside" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvas-more">
    <!-- Offcanvas Header -->
    <div class="offcanvas-header py-4 py-lg-7 border-bottom">
        <a class="icon icon-lg text-muted" href="#" data-bs-dismiss="offcanvas">
            <i class="bi bi-chevron-left"></i>
        </a>

        <!-- <div class="visibility-xl-invisible overflow-hidden text-center">
            <h5 class="text-truncate">Ollie Chandler</h5>
            <p class="text-truncate">last seen 5 minutes ago</p>
        </div> -->

        <!-- Dropdown -->
        <div class="dropdown" style="display: none;">
            <a class="icon icon-lg text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                    <circle cx="12" cy="12" r="1"></circle>
                    <circle cx="12" cy="5" r="1"></circle>
                    <circle cx="12" cy="19" r="1"></circle>
                </svg>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href="#" class="dropdown-item d-flex align-items-center">
                        Edit
                        <div class="icon ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item d-flex align-items-center">
                        Mute
                        <div class="icon ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                        </div>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a href="#" class="dropdown-item d-flex align-items-center text-danger">
                        Leave
                        <div class="icon ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Header -->

    <!-- Offcanvas Body -->
    <div class="offcanvas-body hide-scrollbar">
        <!-- Avatar -->
        <?php if (isset($chatId)) { ?>
            <div class="text-center py-10">
                <div class="row gy-6">
                    <div class="col-12">
                        <div class="avatar avatar-xl mx-auto">
                            <img src="<?php echo $pic111; ?>" alt="#" class="avatar-img">

                            <!-- <a href="#" class="badge badge-lg badge-circle bg-primary text-white border-outline position-absolute bottom-0 end-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </a> -->
                        </div>
                    </div>

                    <div class="col-12">
                        <h4>
                            <?php
                            $fetchCQ = $connect->query("SELECT nickname FROM users WHERE id = '$userId'");
                            echo $fetchCQ->fetchColumn();
                            ?>
                        </h4>
                        <!-- <p>Bootstrap is an open source <br> toolkit for developing web with <br> HTML, CSS, and JS.</p> -->
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <!-- Avatar -->

        <!-- Tabs -->
        <ul class="nav nav-pills nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="pill" href="#offcanvas-tab-profile" role="tab" aria-controls="offcanvas-tab-profile" aria-selected="true">
                    Profile
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#offcanvas-tab-media" role="tab" aria-controls="offcanvas-tab-media" aria-selected="true">
                    Media
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#offcanvas-tab-files" role="tab" aria-controls="offcanvas-tab-files" aria-selected="false">
                    Files
                </a>
            </li>
        </ul>
        <!-- Tabs -->

        <!-- Tabs: Content -->
        <div class="tab-content py-2" role="tablist">
            <!-- Profile -->
            <div class="tab-pane fade show active" id="offcanvas-tab-profile" role="tabpanel">
                <?php
                // $userId = 11;
                $allUsersgroup = $connect->query("SELECT * FROM users WHERE id = '$userId'");
                while ($allUsersDatagroup = $allUsersgroup->fetch()) {

                ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Phone</h5>
                                    <p><?php echo $allUsersDatagroup['phone']; ?></p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>User Id</h5>
                                    <p><?php echo $allUsersDatagroup['studid']; ?></p>
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
                                    <p><?php echo $allUsersDatagroup['email']; ?></p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- <ul class="list-group list-group-flush border-top mt-8">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Notifications</h5>
                                    <p>Enable sound notifications</p>
                                </div>

                                <div class="col-auto">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="accordion-security-check-5">
                                        <label class="form-check-label" for="accordion-security-check-5"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <ul class="list-group list-group-flush border-top mt-8">
                        <li class="list-group-item">
                            <a href="#" class="text-reset">Send Message</a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="text-danger">Delete Chat</a>
                        </li>
                    </ul> -->
                <?php
                }
                ?>
            </div>
            <!-- Profile -->

            <!-- Media -->
            <div class="tab-pane fade" id="offcanvas-tab-media" role="tabpanel">
                <?php
                // $imagesQuery = $connect->query("SELECT messages FROM chats WHERE user_id = '$chatId' AND fileType='png'");

                //  while ($imageData = $imagesQuery->fetch()) {
                ?>
                <div class="row row-cols-3 g-3 py-6">
                    <!-- <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-media-preview" data-theme-img-url="assets/img/chat/media-1.jpg">
                            <img class="img-fluid rounded" src="" alt="">

                        </a>
                    </div> -->

                    <?php
                    $fetchChatFiles = $connect->query("SELECT * FROM chats WHERE (senderId = '$userId' AND receiverId = '$chatId') OR (senderId = '$chatId' AND receiverId = '$userId') AND lastName = 'file' AND loca = 'userfile' ORDER BY id DESC");
                    while ($fetchChatFilesData = $fetchChatFiles->fetch()) {
                        $fileId = $fetchChatFilesData['messages'];
                        $fetchFileNameQ = $connect->query("SELECT filename FROM user_files WHERE id = '$fileId' AND (type = 'jpg' OR type = 'jpeg' OR type = 'png' OR type = 'svg' OR type = 'gif' OR type = 'webp')");
                        if ($fetchFileNameQ->rowCount() > 0) {
                        $fName = $fetchFileNameQ->fetchColumn();
                    ?>
                        <div class="col">
                            <a class="showImageFull" data-bs-toggle="modal" data-bs-target="#modal-media-preview" data-imagename="<?php echo $fName; ?>">
                                <img class="img-fluid rounded" src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fName; ?>" alt="<?php echo $fName; ?>">

                            </a>
                        </div>
                    <?php } } ?>
                </div>
                <?php
                // }
                ?>
            </div>
            <!-- Media -->

            <!-- Files -->
            <div class="tab-pane fade" id="offcanvas-tab-files" role="tabpanel">
                <ul class="list-group list-group-flush">

                    <!-- Item -->
                    <?php
                    $fetchChatFiles = $connect->query("SELECT * FROM chats WHERE (senderId = '$userId' AND receiverId = '$chatId') OR (senderId = '$chatId' OR receiverId = '$userId') AND lastName = 'file' AND loca = 'userfile' ORDER BY id DESC");
                    while ($fetchChatFilesData = $fetchChatFiles->fetch()) {
                        $fileId = $fetchChatFilesData['messages'];
                        
                        $fetchFileNameQ = $connect->query("SELECT filename FROM user_files WHERE id = '$fileId' AND (type = 'docx' OR type = 'pdf' OR type = 'xlsx' OR type = 'doc' OR type = 'html')");
                        $fName = $fetchFileNameQ->fetchColumn();
                        $fetchFileNameQ = $connect->query("SELECT type FROM user_files WHERE id = '$fileId' AND (type = 'docx' OR type = 'pdf' OR type = 'xlsx' OR type = 'doc' OR type = 'html')");
                        $ftype = $fetchFileNameQ->fetchColumn();
                        if($fetchFileNameQ->rowCount() > 0){
                            $filesSId = $fetchChatFilesData['senderId'];
                    ?>
                        <li class="list-group-item">
                            <div class="row align-items-center gx-5">
                                <!-- Icons -->
                                <!-- <div class="col-auto">
                                    <div class="avatar-group">

                                        <a href="#" class="avatar avatar-sm">
                                            <span class="avatar-text bg-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                    <polyline points="14 2 14 8 20 8"></polyline>
                                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                                    <polyline points="10 9 9 9 8 9"></polyline>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div> -->
                                <!-- Icons -->

                                <div class="col overflow-hidden">
                                    <h5 class="text-truncate">
                                        <a target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fName; ?>"><?php echo $fName ?></a>
                                    </h5>
                                    <ul class="list-inline m-0">
                                        <!-- <li class="list-inline-item">
                                                    <small class="text-uppercase text-muted">79.2 KB</small>
                                                </li> -->

                                        <li class="list-inline-item">
                                            <small class="text-uppercase text-muted"><?php echo $ftype ?></small>
                                            <small class="text-uppercase text-muted">->
                                                <?php
                                                $userName = $connect->query("SELECT nickname FROM users WHERE id = '$filesSId'");
                                                echo $userName->fetchColumn();
                                            ?>
                                            </small>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Dropdown -->
                                <div class="col-auto">
                                    <div class="dropdown">
                                        <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fName; ?>">
                                                    Download
                                                    <div class="icon ms-auto">
                                                        <i class="bi bi-download"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                                    <span class="me-auto">Delete</span>
                                                    <div class="icon">
                                                        <i class="bi bi-trash"></i>
                                                    </div>
                                                </a>
                                            </li> -->
                                        </ul>
                                    </div>
                                </div>
                                <!-- Dropdown -->
                            </div>
                        </li>

                    <?php } } ?>
                </ul>
                <hr>
            </div>
            <!-- Files -->
        </div>
        <!-- Tabs: Content -->
    </div>
    <!-- Offcanvas Body -->
</div>

<script>
    $(".showImageFull").on("click",function(){
        const imageName = $(this).data("imagename");
        // alert(imageName);
        $(".imagePath").attr("src","<?php echo BASE_URL; ?>includes/pages/files/" + imageName);
    });
</script>