<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <meta name="color-scheme" content="light dark">

    <title>Messenger</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>Messenger/dist/assets/img/favicon/favicon2.png" type="image/x-icon">

    <!-- Font -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700" rel="stylesheet"> -->


    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link class="css-lt" rel="stylesheet" href="<?php echo BASE_URL;?>Messenger/dist/assets/css/template.bundle.css" media="(prefers-color-scheme: light)">
    <link class="css-dk" rel="stylesheet" href="<?php echo BASE_URL;?>Messenger/dist/assets/css/template.dark.bundle.css" media="(prefers-color-scheme: dark)">

        <!-- Theme mode -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
    if (localStorage.getItem('color-scheme')) {
        let scheme = localStorage.getItem('color-scheme');

        console.log('Color Scheme:', scheme); // Output the value of 'color-scheme'

        const LTCSS = document.querySelectorAll('link[class=css-lt]');
        const DKCSS = document.querySelectorAll('link[class=css-dk]');

        console.log('LTCSS:', LTCSS); // Output the selected elements

        [...LTCSS].forEach((link) => {
            link.media = (scheme === 'light') ? 'all' : 'not all';
        });

        [...DKCSS].forEach((link) => {
            link.media = (scheme === 'dark') ? 'all' : 'not all';
        });
    }
});

        </script>
<style type="text/css">
    body,html
    {
        overflow-y: clip !important;
    }
     .chat-body {
            /* Set container properties */
            overflow-y: auto; /* Add vertical scrollbar if needed */
            max-height: 70vh; /* Set maximum height as 80% of the viewport height */
            /* Other styles for the container */
        }

        /* Additional styles for demonstration */
        .chat-body {
/*            border: 1px solid #ccc;*/
            padding: 10px;
        }
        .chat-body-inner
        {
                padding-bottom: 24px;
    overflow-y: auto;
    height: 70vh;
        }
        /* For demonstration purpose */
        #chatData {
            height: 300px; /* Example content height */
        }
</style>

</head>

<body>
    <?php
                include ROOT_PATH . 'Messenger/dist/loader.php';
                ?>
    <div class="container-fluid" id="header-hide">
  <?php
                include ROOT_PATH . 'Messenger/dist/header.php';
                ?>     
</div>
    <!-- Layout -->

    <div class="layout overflow-hidden" id="contentmain">

        <!-- Sidebar -->
        <aside class="sidebar bg-light">
            <?php
            include ROOT_PATH . 'Messenger/dist/asidebar.php';
            ?>
        </aside>
        <?php
        if (isset($_REQUEST['chatId'])) {
            $chatId = $_REQUEST['chatId'];
        }

        $userId = $_SESSION['login_id'];
        if (isset($chatId)) {

            $updateQuery = "UPDATE chats SET msgRead = '1' WHERE receiverId = '$userId' AND senderId = '$chatId'";
            $statement_editor = $connect->prepare($updateQuery);
            $statement_editor->execute();

            $updateQuery = "UPDATE chats SET notification = '1' WHERE receiverId = '$userId' AND senderId = '$chatId'";
            $statement_editor = $connect->prepare($updateQuery);
            $statement_editor->execute();

            $chat_Data = $connect->query("SELECT nickname FROM users WHERE id = '$chatId'");
            $chat_Name = $chat_Data->fetchColumn();

            $chat_Data1 = $connect->query("SELECT file_name FROM users WHERE id = '$chatId'");
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

            $mainUser = $connect->query("SELECT nickname FROM users WHERE id = '$userId'");
            $mainUserName = $mainUser->fetchColumn();

            $mainUserImg = $connect->query("SELECT file_name FROM users WHERE id = '$userId'");
            $prof_pic11 = $mainUserImg->fetchColumn();
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
        } else {
            $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
            $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
        }
        ?>
        <!-- Sidebar -->

        <!-- Chat -->
        <main class="main"> 
            <div class="container h-100">

                <div class="d-flex flex-column h-100 position-relative">
                    <!-- Chat: Header -->
                    <div class="chat-header border-bottom py-4 py-lg-7">
                        <div class="row align-items-center">

                            <!-- Mobile: close -->
                            <div class="col-2 d-xl-none">
                                <a class="icon icon-lg text-muted" href="#" data-toggle-chat="">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </div>
                            <!-- Mobile: close -->

                            <!-- Content -->
                            <div class="col-8 col-xl-12">
                                <div class="row align-items-center text-center text-xl-start">
                                    <!-- Title -->
                                    <div class="col-12 col-xl-6">
                                        <?php if (isset($chatId)) { ?>
                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <div class="avatar d-none d-xl-inline-block" data-bs-toggle="modal" data-bs-target="#modal-user-profile">
                                                        <img class="avatar-img" src="<?php echo $pic111; ?>" alt="">
                                                        <?php if (isset($chatId)) {
                                                            $checkSta = $connect->query("SELECT count(*) FROM checkonline WHERE userId = '$chatId'");
                                                            $sta = $checkSta->fetchColumn();
                                                            if ($sta > 0) {

                                                        ?>
                                                                <span class="avatar-status avatar-online avatar-status-success"></span>
                                                        <?php }
                                                        } ?>
                                                    </div>
                                                </div>

                                                <div class="col overflow-hidden">
                                                    <h5 class="text-truncate"><?php echo $chat_Name; ?></h5>
                                                    <p class="text-truncate" id="typeingData"></p>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- Title -->

                                    <!-- Toolbar -->
                                    <?php include ROOT_PATH . 'Messenger/dist/avatargroup.php' ?>
                                    <!-- Toolbar -->
                                </div>
                            </div>
                            <!-- Content -->

                            <!-- Mobile: more -->
                            <div class="col-2 d-xl-none text-end">
                                <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg>
                                </a>
                            </div>
                            <!-- Mobile: more -->

                        </div>
                    </div>
                    <!-- Chat: Header -->

                    <!-- Chat: Content -->
                    <div class="chat-body hide-scrollbar flex-1 h-100">
                        <div class="chat-body-inner">
                            <div class="py-6 py-lg-12" id="">

                            <?php
                                $pageId = $_REQUEST['pageId'];

                                $pageQuery = $connect->query("SELECT * FROM editor_data WHERE id = '$pageId'");
                                while ($pageData = $pageQuery->fetch()) {
                                    ?>
                                    <h1><?php echo $pageData['pageName']; ?></h1>
                                    <div>
                                        <?php echo $pageData['editorData']; ?>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <!-- Chat: Content -->

                    <!-- Chat: Footer -->
                    <?php if (isset($chatId)) { ?>
                        <div class="chat-footer pb-3 pb-lg-7 position-absolute bottom-0 start-0">
                            <!-- Chat: Files -->
                            <div class="dz-preview bg-dark" id="dz-preview-row" data-horizontal-scroll="">
                            </div>
                            <!-- Chat: Files -->

                            <!-- Chat: Form -->
                            <div class="chat-form rounded-pill bg-dark" style="bottom: 60px;position: absolute; width: 111%;left: -60px;">
                                <div class="row align-items-center gx-0">
                                    <div class="col-auto">
                                        <a data-bs-toggle="modal" data-bs-target="#openfilemodal" class="btn btn-icon rounded-circle">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip">
                                                <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <input type="hidden" name="senderId" value="<?php echo $chatId; ?>" id="senderId">

                                    <div class="col">
                                        <div class="input-group">
                                            <textarea class="form-control px-0" placeholder="Type your message..." rows="1" data-emoji-input="" data-autosize="true" id="chatInput"></textarea>

                                            <a href="#" class="input-group-text text-body pe-0" data-emoji-btn="">
                                                <span class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                                        <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                                        <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <button id="sendChatMsg" class="btn btn-icon btn-primary rounded-circle ms-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat: Form -->
                        </div>
                        <!-- Chat: Footer -->
                </div>
            <?php } ?>

            </div>
        </main>

        <!-- Chat -->

        <!-- Chat: Info -->
        <?php include ROOT_PATH . 'Messenger/dist/offcanvasprofile.php' ?>
    </div>
    <!-- Layout -->

    <!-- Modal: Invite -->
    <div class="modal fade" id="modal-invite" tabindex="-1" aria-labelledby="modal-invite" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">

                <!-- Modal: Body -->
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
                            <div class="avatar avatar-lg">
                                <span class="avatar-text bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="8.5" cy="7" r="4"></circle>
                                        <line x1="20" y1="8" x2="20" y2="14"></line>
                                        <line x1="23" y1="11" x2="17" y2="11"></line>
                                    </svg>
                                </span>
                            </div>

                            <h4 class="fw-bold mb-1">Invite your friends</h4>
                            <p style="font-size: 16px;">Send invitation links to your friends</p>
                        </div>
                    </div>
                    <!-- Header -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- Form -->
                    <div class="modal-py">
                        <form class="row gy-6">
                            <div class="col-12">
                                <label for="invite-email" class="form-label text-muted">E-mail</label>
                                <input type="email" class="form-control form-control-lg" id="invite-email" placeholder="name@example.com">
                            </div>

                            <div class="col-12">
                                <label for="invite-message" class="form-label text-muted">Message</label>
                                <textarea class="form-control form-control-lg" id="invite-message" rows="3" placeholder="Custom message"></textarea>
                            </div>
                        </form>
                    </div>
                    <!-- Form -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- Button -->
                    <div class="modal-py">
                        <a href="#" class="btn btn-lg btn-primary w-100 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#invite-modal">
                            Send

                            <span class="icon ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </span>
                        </a>
                    </div>
                    <!-- Button -->
                </div>
                <!-- Modal: Body -->

            </div>
        </div>
    </div>

    <!-- fileAdd modal -->

    <!-- Modal -->
    <div id="taskmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="taskmodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskmodalTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div>
                            <table class="table">
                                <tr>
                                    <td>
                                        <label class="form-label text-dark" style="font-weight:bold;">Create In</label>
                                        <select class="form-control select_roles_test" name="exam_for" required>
                                            <option value="" disabled>Select Type</option>
                                            <option value="par">Task</option>
                                            <option value="course">task</option>
                                            <option value="everyone">Everyone</option>
                                            <option value="dep">Department</option>
                                        </select>
                                    </td>
                                    <td id="course">
                                        <label class="form-label text-dark" style="font-weight:bold;">Priority</label>
                                        <select class="form-control" name="course_id" id="select_course_test">
                                            <option value="0" disabled>Select Priority</option>
                                            <option value="high">High</option>
                                            <option value="medium">Medium</option>
                                            <option value="low">Low</option>
                                        </select>
                                    </td>

                                    <td id="not_Ctp_test">
                                        <label class="form-label text-dark" style="font-weight:bold;">Due Date</label>
                                        <input type="date" name="date" class="form-control">
                                    </td>

                                </tr>

                                <tr>

                                    <label class="form-label text-dark" style="font-weight:bold;">Note</label>
                                    <textarea class="form-control"></textarea>

                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add Task</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->


    <div class="modal fade" id="openfilemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Files</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <select class="form-select" aria-label="Default select example" style="margin-bottom:25px;" id="fileOpt">
                        <option selected>Select File Method</option>
                        <option value="addNewPage">New Page</option>
                        <option value="addFile">Attachment</option>
                        <option value="addFileLoca">Drive Link</option>
                        <option value="addFileLink">Link</option>
                    </select>
                </div>
                <br>
                <center>
                    <form method="post" enctype="multipart/form-data" id="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>Messenger/dist/addFiles.php">
                        <div class="input-field">
                            <table class="table table-bordered">
                                <tr>
                                    <input type="hidden" class="form-control" name="senderId" value="<?php echo $chatId; ?>">
                                    <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                                        <input type="file" class="form-control" name="file[]" id="" multiple />
                                    </td>
                                    <!-- <td>
                                <div role="progressbar" class="removecss" style="--value:0; font-size: 1rem;">
                                  0%
                                </div>
                                <div class="progress mt-2">
                  <div class="progress-bar">0%</div>
                </div>
                              </td> -->
                            </table>
                        </div><br>

                        <center>
                            <table class="table">
                                <tr>
                                    <td>
                                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="Share Individual" />
                                    </td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                                            <option disabled>Select File Method</option>
                                            <option value="All instructor">Instructor Only</option>
                                            <option selected value="Everyone">Everyone</option>
                                            <option value="None">None</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionCategory">
                                            <option selected value="readOnly">ReadOnly</option>
                                            <option value="readAndWrite">Read And Write</option>
                                            <option value="None">None</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                            <table class="table table-bordered tableData" style="display:none;">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="text-light">#</th>
                                        <th class="text-light">Profile Image</th>
                                        <th class="text-light">Name</th>

                                    </tr>
                                </thead>
                                <tbody class="userDetail">

                                </tbody>
                            </table>
                        </center>
                        <hr>
                        <center>
                            <input style="margin:5px; float:right; font-weight:bold; font-size:large;" type="submit" value="Submit" name="attachement" class="btn btn-success" />

                        </center>
                    </form>
                </center>
                <center>
                    <form class="insert-phases" id="phase_form" method="post" action="<?php echo BASE_URL; ?>Messenger/dist/addFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
                        <div class="input-field">
                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                            <table class="table table-bordered" id="table-field">
                                <input type="hidden" class="form-control" name="senderId" value="<?php echo $chatId; ?>">
                                <tr>
                                    <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
                                    <td style="text-align: center;"><input type="text" placeholder="Link" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName[]" id="phasename" class="form-control" value="" /> </td>
                                    <td style="width:20px;"><button type="button" name="add_phase" id="add_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <center>
                            <table class="table">
                                <tr>
                                    <td>
                                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="Share Individual" />
                                    </td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                                            <option disabled>Select File Method</option>
                                            <option value="All instructor">Instructor Only</option>
                                            <option selected value="Everyone">Everyone</option>
                                            <option value="None">None</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionCategory">
                                            <option selected value="readOnly">ReadOnly</option>
                                            <option value="readAndWrite">Read And Write</option>
                                            <option value="None">None</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <br>

                            <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                            <table class="table table-bordered tableData" style="display:none;">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="text-light">#</th>
                                        <th class="text-light">Profile Image</th>
                                        <th class="text-light">Name</th>

                                    </tr>
                                </thead>
                                <tbody class="userDetail">

                                </tbody>
                            </table>
                        </center>
                        <hr>
                        <center>
                            <button style="margin:5px;float: right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="phase_submit" name="driveLink">Submit</button>
                        </center>
                    </form>
                </center>

                <center>
                    <form class="insert-phases" id="filelink" method="post" action="<?php echo BASE_URL; ?>Messenger/dist/addFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
                        <div class="input-field">
                            <input type="hidden" class="form-control" name="senderId" value="<?php echo $chatId; ?>">
                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                            <table class="table table-bordered" id="table-field-link">
                                <tr>
                                    <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
                                    <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required /> </td>
                                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName[]" id="linkname" class="form-control" value="" /> </td>
                                    <td style="width:20px;"><button type="button" name="add_link" id="add_link" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <center>

                            <table class="table">
                                <tr>
                                    <td>
                                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="Share Individual" />
                                    </td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                                            <option disabled>Select File Method</option>
                                            <option value="All instructor">Instructor Only</option>
                                            <option selected value="Everyone">Everyone</option>
                                            <option value="None">None</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionCategory">
                                            <option selected value="readOnly">ReadOnly</option>
                                            <option value="readAndWrite">Read And Write</option>
                                            <option value="None">None</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <br>


                            <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                            <table class="table table-bordered tableData" style="display:none;">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="text-light">#</th>
                                        <th class="text-light">Profile Image</th>
                                        <th class="text-light">Name</th>

                                    </tr>
                                </thead>
                                <tbody class="userDetail">

                                </tbody>
                            </table>
                        </center>
                        <hr>
                        <center>
                            <button style="margin:5px; float:right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="link_submit" name="onlineLink">Submit</button>
                        </center>
                    </form>
                </center>
            </div>
        </div>
    </div>


    <!-- chat modals -->

    <div class="modal fade" id="msgEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editChatMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <input type="hidden" name="msgId" id="msgId">
                        <label style="color:black; font-weight:bold; margin:5px;">Message:</label>
                        <input class="form-control" type="text" name="message" value="" id="messages">
                        <hr>
                        <input type="submit" value="Edit" class="btn btn-success" name="editChatMsgBtn" style="font-weight: bold; font-size:large; float:right;" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteMsgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-soft-danger">
                    <h3 class="modal-title" id="exampleModalLabel" style="margin-bottom:25px;">Are You Sure You Want To Delete This Message?</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-bottom: 10px;"></button>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <i class="bi bi-trash text-danger" style="font-size:200px;"></i>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editChatMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="deleteForMe" id="deleteForMe" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <input type="submit" value="Delete For Me" class="btn btn-soft-danger" name="deleteForme" />
                    </form>
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editChatMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="deleteForEvery" id="deleteForEvery" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <input type="submit" value="Delete For Everyone" class="btn btn-soft-danger" name="deleteForevery" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete other chat -->

    <div class="modal fade" id="deleteMsgOtherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editChatMsg.php" enctype="multipart/form-data" method="post" style="width: 49%;display: inline-block;">
                        <input type="hidden" name="deleteForMe" id="deleteForMe" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <hr>
                        <input type="submit" value="Delete For Me" class="btn btn-danger" name="deleteFormeOther" style="font-weight: bold; font-size:large; float:right;" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- reply modal -->

    <div class="modal fade" id="replyMsgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reply Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editChatMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="replyId" id="replyId" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <label style="color:black; font-weight:bold; margin:5px;">Message:</label>
                        <input class="form-control" type="text" name="replyMessage" value="" id="replyMessage" readonly>
                        <label style="color:black; font-weight:bold; margin:5px;">Reply:</label>
                        <input class="form-control" type="text" name="reply" value="" id="" required>
                        <hr>
                        <input type="submit" value="Send" class="btn btn-success" name="replyBtn" style="font-weight: bold; font-size:large; float:right;" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- forward modal -->

    <div class="modal fade" id="forwardMsgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forward Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editChatMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="forwardId" id="forwardId" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <label style="color:black; font-weight:bold; margin:5px;">Message:</label>
                        <input class="form-control" type="text" name="forwardMessage" value="" id="forwardMessage" readonly>
                        <table class="table table-striped table-bordered" id="phasetable">
                            <thead class="bg-dark">
                                <tr>
                                    <th class="text-light">Sr No</th>
                                    <th class="text-light">User</th>
                                    <th class="text-light">Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $otheUser = $connect->query("SELECT * FROM users");
                                while ($otheUserData = $otheUser->fetch()) {
                                    $othUsId = $otheUserData['id'];
                                    if ($othUsId != $userId) {
                                        $userpic = $connect->query("SELECT file_name FROM users WHERE id = '$othUsId'");

                                        $userpicData = $userpic->fetchColumn();
                                        if ($userpicData != "") {
                                            $userPro = BASE_URL . 'includes/Pages/uploads/' . $userpicData;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $userPro)) {
                                                $userPro = BASE_URL . 'includes/Pages/uploads/' . $userpicData;
                                            } else {
                                                $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                        } else {
                                            $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }
                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="memberId[]" value="<?php echo $othUsId; ?>"></td>
                                            <td><?php echo $otheUserData['nickname']; ?></td>
                                            <td>
                                                <img src="<?php echo $userPro; ?>" alt="" class="avatar">
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                        <hr>
                        <input type="submit" name="forwardBtn" value="Share" class="btn btn-success" style="font-weight: bold; font-size:large; float:right;" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- docx forward modal -->

    <div class="modal fade" id="forwardDocModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forward Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editChatMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="forwardDocId" id="forwardDocId" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <label style="color:black; font-weight:bold; margin:5px;">Message:</label>
                        <input class="form-control" type="text" name="forwardDoc" value="" id="forwardDoc" readonly>
                        <input type="hidden" name="docLastName" id="docLastName">
                        <input type="hidden" name="docfileType" id="docfileType">
                        <table class="table table-striped table-bordered" id="phasetable">
                            <thead class="bg-dark">
                                <tr>
                                    <th class="text-light">Sr No</th>
                                    <th class="text-light">User</th>
                                    <th class="text-light">Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $otheUser = $connect->query("SELECT * FROM users");
                                while ($otheUserData = $otheUser->fetch()) {
                                    $othUsId = $otheUserData['id'];
                                    if ($othUsId != $userId) {
                                        $userpic = $connect->query("SELECT file_name FROM users WHERE id = '$othUsId'");

                                        $userpicData = $userpic->fetchColumn();
                                        if ($userpicData != "") {
                                            $userPro = BASE_URL . 'includes/Pages/uploads/' . $userpicData;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $userPro)) {
                                                $userPro = BASE_URL . 'includes/Pages/uploads/' . $userpicData;
                                            } else {
                                                $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                        } else {
                                            $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }
                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="memberId[]" value="<?php echo $othUsId; ?>"></td>
                                            <td><?php echo $otheUserData['nickname']; ?></td>
                                            <td>
                                                <img src="<?php echo $userPro; ?>" alt="" class="avatar">
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                        <input type="submit" name="forwardDocBtn" value="Share" class="btn btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- link edit modal -->

    <div class="modal fade" id="linkEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editChatMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="linkId" id="linkId1" />
                        <input type="hidden" name="mainId" class="mainId" />
                        <input type="hidden" name="linkType" id="linkType1" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <label style="color:black; font-weight:bold; margin:5px;">Link Name:</label>
                        <input class="form-control" type="text" name="linkName" value="" id="linkName5" required>
                        <label style="color:black; font-weight:bold; margin:5px;">Last Name:</label>
                        <input class="form-control" type="text" name="lastName" value="" id="lastName1" required>
                        <input type="submit" value="Send" class="btn btn-success" name="editLinkBtn" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- link Forward modal -->

    <div class="modal fade" id="linkForwardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forward Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editChatMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="linkId" id="linkId" />
                        <input type="hidden" name="linkType" id="linkType" />
                        <input type="hidden" name="mainId" class="mainId" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <label style="color:black; font-weight:bold; margin:5px;">Link Name:</label>
                        <input class="form-control" type="text" name="linkName" value="" id="linkName" required>
                        <label style="color:black; font-weight:bold; margin:5px;">Last Name:</label>
                        <input class="form-control" type="text" name="lastName" value="" id="lastName" required>
                        <table class="table table-striped table-bordered" id="phasetable">
                            <thead class="bg-dark">
                                <tr>
                                    <th class="text-light">Sr No</th>
                                    <th class="text-light">User</th>
                                    <th class="text-light">Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $otheUser = $connect->query("SELECT * FROM users");
                                while ($otheUserData = $otheUser->fetch()) {
                                    $othUsId = $otheUserData['id'];
                                    if ($othUsId != $userId) {
                                        $userpic = $connect->query("SELECT file_name FROM users WHERE id = '$othUsId'");

                                        $userpicData = $userpic->fetchColumn();
                                        if ($userpicData != "") {
                                            $userPro = BASE_URL . 'includes/Pages/uploads/' . $userpicData;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $userPro)) {
                                                $userPro = BASE_URL . 'includes/Pages/uploads/' . $userpicData;
                                            } else {
                                                $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                        } else {
                                            $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }
                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="memberId[]" value="<?php echo $othUsId; ?>"></td>
                                            <td><?php echo $otheUserData['nickname']; ?></td>
                                            <td>
                                                <img src="<?php echo $userPro; ?>" alt="" class="avatar">
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                        <input type="submit" value="Share" class="btn btn-success" name="forwardLinkBtn" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- editor foreard modal -->

    <div class="modal fade" id="forwardEditorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forward Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editChatMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="forwardEditorId" id="forwardEditorId" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <label style="color:black; font-weight:bold; margin:5px;">Name:</label>
                        <input class="form-control" type="text" name="forwardEditorMessage" value="" id="forwardEditorMessage" required>
                        <table class="table table-striped table-bordered" id="phasetable">
                            <thead class="bg-dark">
                                <tr>
                                    <th class="text-light">Sr No</th>
                                    <th class="text-light">User</th>
                                    <th class="text-light">Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $otheUser = $connect->query("SELECT * FROM users");
                                while ($otheUserData = $otheUser->fetch()) {
                                    $othUsId = $otheUserData['id'];
                                    if ($othUsId != $userId) {
                                        $userpic = $connect->query("SELECT file_name FROM users WHERE id = '$othUsId'");

                                        $userpicData = $userpic->fetchColumn();
                                        if ($userpicData != "") {
                                            $userPro = BASE_URL . 'includes/Pages/uploads/' . $userpicData;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $userPro)) {
                                                $userPro = BASE_URL . 'includes/Pages/uploads/' . $userpicData;
                                            } else {
                                                $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                        } else {
                                            $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }
                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="memberId[]" value="<?php echo $othUsId; ?>"></td>
                                            <td><?php echo $otheUserData['nickname']; ?></td>
                                            <td>
                                                <img src="<?php echo $userPro; ?>" alt="" class="avatar">
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                        <input type="submit" value="Share" class="btn btn-success" name="forwardEditorBtn" />
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- image modal -->

    <div class="modal fade" id="fullUserIamge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="userImageFull" alt="" style="height: 100%;width:100%">
                </div>
            </div>
        </div>
    </div>

    <!-- end chat modals -->

    <!-- Modal: Media Preview -->
    <div class="modal fade" id="modal-media-preview" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">

                <!-- Modal: Header -->
                <div class="modal-header">
                    <button type="button" class="btn-close btn-close-arrow" data-bs-dismiss="modal" aria-label="Close"></button>

                    <!-- <div>
                        <div class="dropdown">
                            <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Download
                                        <div class="icon ms-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud">
                                                <polyline points="8 17 12 21 16 17"></polyline>
                                                <line x1="12" y1="12" x2="12" y2="21"></line>
                                                <path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path>
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Share
                                        <div class="icon ms-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2">
                                                <circle cx="18" cy="5" r="3"></circle>
                                                <circle cx="6" cy="12" r="3"></circle>
                                                <circle cx="18" cy="19" r="3"></circle>
                                                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                        <span class="me-auto">Delete</span>
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <!-- Modal: Header -->

                <!-- Modal: Body -->
                <div class="modal-body p-0">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <img class="img-fluid modal-preview-url imagePath" alt="#">
                    </div>
                </div>
                <!-- Modal: Body -->

                <!-- Modal: Footer -->
                <!-- <div class="modal-footer">
                    <div class="w-100 text-center">
                        <h6><a href="#">Marshall Wallaker</a></h6>
                        <p class="small">Today at 14:43</p>
                    </div>
                </div> -->
                <!-- Modal: Footer -->
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo BASE_URL; ?>Messenger/dist/assets/js/vendor.js"></script>
    <script src="<?php echo BASE_URL; ?>Messenger/dist/assets/js/template.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>


</body>
</html>