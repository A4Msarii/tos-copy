<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <meta name="color-scheme" content="light dark">

    <title>Chat</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>Messenger/dist/assets/img/favicon/favicon2.png" type="image/x-icon">

    <!-- Template CSS -->

    <link class="css-lt" rel="stylesheet" href="<?php echo BASE_URL; ?>Messenger/dist/assets/css/template.bundle.css" media="(prefers-color-scheme: light)">
    <link class="css-dk" rel="stylesheet" href="<?php echo BASE_URL; ?>Messenger/dist/assets/css/template.dark.bundle.css" media="(prefers-color-scheme: dark)">

    <!-- Theme mode -->
    <script>
        if (localStorage.getItem('color-scheme')) {
            let scheme = localStorage.getItem('color-scheme');

            const LTCSS = document.querySelectorAll('link[class=css-lt]');
            const DKCSS = document.querySelectorAll('link[class=css-dk]');

            [...LTCSS].forEach((link) => {
                link.media = (scheme === 'light') ? 'all' : 'not all';
            });

            [...DKCSS].forEach((link) => {
                link.media = (scheme === 'dark') ? 'all' : 'not all';
            });
        }
    </script>
    <style type="text/css">
        body,
        html {
            overflow-y: clip !important;
        }

        #chatData {
            height: 590px;
            overflow-y: hidden;
        }

        .offcanvas-status {
            width: 70% !important;
        }
    </style>
</head>

<?php
include ROOT_PATH . 'includes/message.php';
displayMSG();
?>
<?php
include ROOT_PATH . 'includes/alert_for_users.php';
?>

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
        <!-- Sidebar -->

        <!-- Chat -->
        <main class="main is-visible">
            <div class="container-fluid h-100">

                <div class="d-flex flex-column h-100 position-relative">
                    <!-- Chat: Header -->
                    <div class="chat-header border-bottom py-4 py-lg-3">
                        <div class="row align-items-center">

                            <!-- Mobile: close -->
                            <div class="col-2 d-xl-none">
                                <a class="icon icon-lg text-muted" href="#" data-toggle-chat="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                                        <polyline points="15 18 9 12 15 6"></polyline>
                                    </svg>
                                </a>
                            </div>
                            <!-- Mobile: close -->
                            <?php
                            if (isset($_REQUEST['groupId'])) {
                                $chatId = $_REQUEST['groupId'];
                            }

                            $userId = $_SESSION['login_id'];
                            if (isset($chatId)) {
                                $chat_Data = $connect->query("SELECT groupName FROM chatgroup WHERE id = '$chatId'");
                                $chat_Name = $chat_Data->fetchColumn();

                                $chat_Data2 = $connect->query("SELECT groupDesc FROM chatgroup WHERE id = '$chatId'");
                                $chat_Desc = $chat_Data2->fetchColumn();

                                $chat_Data1 = $connect->query("SELECT groupProfile FROM chatgroup WHERE id = '$chatId'");
                                $prof_pic111 = $chat_Data1->fetchColumn();
                                if ($prof_pic111 != "") {
                                    $pic111 = BASE_URL . 'includes/Pages/groupProfile/' . $prof_pic111;
                                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                                        $pic111 = BASE_URL . 'includes/Pages/groupProfile/' . $prof_pic111;
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

                            <!-- Content -->
                            <div class="col-8 col-xl-12">
                                <div class="row align-items-center text-center text-xl-start">
                                    <!-- Title -->
                                    <div class="col-12 col-xl-6">
                                        <div class="row align-items-center gx-5">
                                            <div class="col-auto">
                                                <div class="avatar d-none d-xl-inline-block">
                                                    <img class="avatar-img avatar-circle" src="<?php echo $pic111; ?>" alt="">
                                                </div>
                                            </div>

                                            <div class="col overflow-hidden">
                                                <h5 class="text-truncate"><?php echo $chat_Name; ?></h5>
                                                <!-- <p class="text-truncate">35 members, 3 online</p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Title -->

                                    <!-- Toolbar -->
                                    <div class="col-xl-6 d-none d-xl-block">
                                        <div class="row align-items-center justify-content-end gx-6">
                                            <div class="col-auto">
                                                <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more-group" aria-controls="offcanvas-more-group">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar-group">
                                                    <?php
                                                    $fetchGroupMem = $connect->query("SELECT * FROM groupmember WHERE groupId = '$chatId' AND type != 'admin' ORDER BY id ASC LIMIT 3");
                                                    while ($fetchGroupMemData = $fetchGroupMem->fetch()) {
                                                        $memId = $fetchGroupMemData['userId'];

                                                        $fetchMemPic = $connect->query("SELECT file_name FROM users WHERE id = '$memId'");
                                                        $memPic = $fetchMemPic->fetchColumn();
                                                        if ($memPic != "") {
                                                            $pic1111 = BASE_URL . 'includes/Pages/upload/' . $memPic;
                                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic1111)) {
                                                                $pic1111 = BASE_URL . 'includes/Pages/upload/' . $memPic;
                                                            } else {
                                                                $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                            }
                                                        } else {
                                                            $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                        }
                                                    ?>
                                                        <a href="#" class="avatar avatar-sm">
                                                            <img class="avatar-img" src="<?php echo $pic1111; ?>" alt="#">
                                                        </a>
                                                    <?php } ?>

                                                    <a href="#" class="avatar avatar-sm" data-bs-toggle="modal" data-bs-target="#ParticipantModal">
                                                        <span class="avatar-text" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<strong>Add People</strong><p>Invite friends to group</p>">
                                                            <i class="bi bi-plus"></i>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Toolbar -->
                                </div>
                            </div>
                            <!-- Content -->

                            <!-- Mobile: more -->
                            <div class="col-2 d-xl-none text-end">
                                <div class="dropdown">
                                    <a class="text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="icon icon-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="12" cy="5" r="1"></circle>
                                                <circle cx="12" cy="19" r="1"></circle>
                                            </svg>
                                        </div>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-add-members" aria-controls="offcanvas-add-members">Add members</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more-group" aria-controls="offcanvas-more-group">More</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Mobile: more -->

                        </div>
                    </div>
                    <!-- Chat: Header -->

                    <!-- Chat: Content -->
                    <div class="chat-body hide-scrollbar flex-1 h-100">
                        <div class="chat-body-inner">
                            <div class="py-6 py-lg-12" id="chatData">


                            </div>
                        </div>
                    </div>
                    <!-- Chat: Content -->

                    <!-- Chat: Footer -->
                    <div class="chat-footer pb-3 pb-lg-7 position-absolute bottom-0 start-0">
                        <!-- Chat: Files -->
                        <div class="dz-preview bg-dark" id="dz-preview-row" data-horizontal-scroll="">
                        </div>
                        <!-- Chat: Files -->

                        <!-- Chat: Form -->
                        <?php if (isset($chatId)) { ?>
                            <div class="chat-form rounded-pill bg-dark" data-emoji-form="" style="bottom: 60px;position: absolute; width: 100%;">
                                <input type="hidden" name="senderId" value="<?php echo $chatId; ?>" id="senderId">
                                <div class="row align-items-center gx-0">
                                    <div class="col-auto">
                                        <a data-bs-toggle="modal" data-bs-target="#openfilemodal" class="btn btn-icon btn-link text-body rounded-circle">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip">
                                                <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                                            </svg>
                                        </a>
                                    </div>

                                    <div class="col">
                                        <div class="input-group">
                                            <!-- <textarea class="form-control px-0 text-dark" placeholder="Type your message..." rows="1" data-emoji-input="" data-autosize="true" id="chatInput" style="font-size: large;"></textarea> -->
                                            <input type="text" class="form-control px-0 text-dark" placeholder="Type your message..." rows="1" data-emoji-input="" data-autosize="true" id="chatInput" style="font-size: large;">

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
                                        <button id="sendChatMsg" type="button" class="btn btn-icon btn-primary rounded-circle ms-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                        <!-- Chat: Form -->
                    </div>
                    <!-- Chat: Footer -->
                </div>

            </div>
        </main>
        <!-- Chat -->

        <?php include ROOT_PATH . 'Messenger/dist/offcanvasstatus.php' ?>

        <!-- Chat: Info -->
        <div class="offcanvas offcanvas-end offcanvas-aside" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvas-more-group">
            <!-- Offcanvas Header -->
            <div class="offcanvas-header py-4 py-lg-7 border-bottom">
                <a class="icon icon-lg text-muted" href="#" data-bs-dismiss="offcanvas">
                    <i class="bi bi-chevron-left"></i>
                </a>


                <!-- Dropdown -->
                <!-- <div class="dropdown">
                    <a class="icon icon-lg text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
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
                </div> -->
            </div>
            <!-- Offcanvas Header -->

            <!-- Offcanvas Body -->
            <div class="offcanvas-body hide-scrollbar">
                <!-- Avatar -->
                <div class="text-center py-10">
                    <div class="row gy-6">
                        <div class="col-12">
                            <div class="avatar avatar-xl mx-auto">
                                <img src="<?php echo $pic111; ?>" alt="#" class="avatar-img">
                            </div>
                        </div>

                        <div class="col-12">
                            <h4><?php echo $chat_Name; ?></h4>
                            <p><?php echo $chat_Desc; ?></p>
                        </div>
                        <div class="col-12">
                            <center>
                                <button type="button" class="btn btn-primary" name="addMember" data-bs-toggle="modal" data-bs-target="#ParticipantModal"><i class="bi bi-people"></i>Add Participants</button>
                            </center>
                        </div>
                    </div>
                </div>
                <!-- Avatar -->

                <!-- Tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="pill" href="#offcanvas-group-tab-members" role="tab" aria-controls="offcanvas-group-tab-members" aria-selected="true">
                            People
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#offcanvas-group-tab-media" role="tab" aria-controls="offcanvas-group-tab-media" aria-selected="true">
                            Media
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#offcanvas-group-tab-files" role="tab" aria-controls="offcanvas-group-tab-files" aria-selected="false">
                            Files
                        </a>
                    </li>
                </ul>
                <!-- Tabs -->

                <!-- Tabs: Content -->
                <div class="tab-content py-2" role="tablist">
                    <!-- Members -->
                    <div class="tab-pane fade show active" id="offcanvas-group-tab-members" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            <?php
                            $checkAdminQ = $connect->query("SELECT count(*) FROM groupmember WHERE groupId = '$chatId' AND type = 'admin' AND userId = '$userId'");
                            $fetchAdminData = $checkAdminQ->fetchColumn();
                            $fetchMemberQ = $connect->query("SELECT * FROM groupmember WHERE groupId = '$chatId'");
                            while ($fetchMemberData = $fetchMemberQ->fetch()) {
                                $memId = $fetchMemberData['userId'];
                                $fetchMemNameQ = $connect->query("SELECT nickname FROM users WHERE id = '$memId'");

                                $fetchMemPic = $connect->query("SELECT file_name FROM users WHERE id = '$memId'");
                                $memPic = $fetchMemPic->fetchColumn();
                                if ($memPic != "") {
                                    $pic1111 = BASE_URL . 'includes/Pages/files/' . $memPic;
                                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic1111)) {
                                        $pic1111 = BASE_URL . 'includes/Pages/files/' . $memPic;
                                    } else {
                                        $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                    }
                                } else {
                                    $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                }
                            ?>
                                <li class="list-group-item">
                                    <div class="row align-items-center gx-5">
                                        <!-- Avatar -->

                                        <div class="col-auto">
                                            <a href="#" class="avatar">
                                                <img class="avatar-img" src="<?php echo $pic1111; ?>" alt="">
                                            </a>
                                        </div>
                                        <!-- Avatar -->

                                        <!-- Text -->
                                        <div class="col">
                                            <h5><a><?php echo $fetchMemNameQ->fetchColumn(); ?></a></h5>
                                        </div>
                                        <!-- Text -->

                                        <!-- Owner -->
                                        <?php if ($fetchMemberData['type'] == "admin") { ?>
                                            <div class="col-auto">
                                                <span class="extra-small text-primary">Admin</span>
                                            </div>
                                        <?php } ?>
                                        <!-- Owner -->

                                        <!-- Dropdown -->
                                        <?php if ($fetchAdminData > 0) { ?>
                                            <div class="col-auto">
                                                <div class="dropdown">
                                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </a>

                                                    <ul class="dropdown-menu">
                                                        <!-- <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Promote
                                                        <div class="icon ms-auto">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                                                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                                                <polyline points="17 6 23 6 23 12"></polyline>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </li> -->
                                                        <!-- <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Restrict
                                                        <div class="icon ms-auto">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down">
                                                                <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                                                <polyline points="17 18 23 18 23 12"></polyline>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </li> -->
                                                        <!-- <li>
                                                    <hr class="dropdown-divider">
                                                </li> -->

                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center text-danger" href="<?php echo BASE_URL; ?>Messenger/dist/removeUserFromGroup.php?groupId=<?php echo $chatId; ?>&memberId=<?php echo $memId; ?>">
                                                                Remove User
                                                                <div class="icon ms-auto">
                                                                    <i class="bi bi-trash"></i>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!-- Dropdown -->
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- Members -->

                    <!-- Media -->
                    <div class="tab-pane fade" id="offcanvas-group-tab-media" role="tabpanel">
                        <div class="row row-cols-3 g-3 py-6">

                            <?php
                            $fetchChatFiles = $connect->query("SELECT * FROM groupchats WHERE groupId = '$chatId' AND lastName = 'file' AND loca = 'userfile' ORDER BY id DESC");
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
                            <?php }
                            } ?>

                        </div>
                    </div>
                    <!-- Media -->

                    <!-- Files -->
                    <div class="tab-pane fade" id="offcanvas-group-tab-files" role="tabpanel">
                        <ul class="list-group list-group-flush">

                            <!-- Item -->

                            <?php
                            $fetchChatFiles = $connect->query("SELECT * FROM groupchats WHERE groupId = '$chatId' AND lastName = 'file' AND loca = 'userfile'");
                            while ($fetchChatFilesData = $fetchChatFiles->fetch()) {
                                $fileId = $fetchChatFilesData['messages'];
                                $fetchFileNameQ = $connect->query("SELECT filename FROM user_files WHERE id = '$fileId' AND (type = 'docx' OR type = 'pdf' OR type = 'xlsx' OR type = 'doc' OR type = 'html')");
                                $fName = $fetchFileNameQ->fetchColumn();
                                $fetchFileNameQ = $connect->query("SELECT type FROM user_files WHERE id = '$fileId' AND (type = 'docx' OR type = 'pdf' OR type = 'xlsx' OR type = 'doc' OR type = 'html')");
                                $ftype = $fetchFileNameQ->fetchColumn();
                                if ($fetchFileNameQ->rowCount() > 0) {
                                    $filesSId = $fetchChatFilesData['senderId'];
                            ?>
                                    <li class="list-group-item">
                                        <div class="row align-items-center gx-5">
                                            <!-- Icons -->
                                            <!-- <div class="col-auto">
                                        <div class="avatar-group">
                                            <a href="#" class="avatar avatar-sm">
                                                <img src="assets/img/avatars/6.jpg" class="avatar-img" alt="#">
                                            </a>

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
                                            <!-- <div class="col-auto">
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download">
                                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                                <polyline points="7 10 12 15 17 10"></polyline>
                                                                <line x1="12" y1="15" x2="12" y2="3"></line>
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
                                            <!-- Dropdown -->
                                        </div>
                                    </li>

                            <?php }
                            } ?>
                        </ul>
                    </div>
                    <!-- Files -->
                </div>
                <!-- Tabs: Content -->
            </div>
            <!-- Offcanvas Body -->
        </div>

        <!-- Chat: Add member -->
        <div class="offcanvas offcanvas-end offcanvas-aside" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvas-add-members">
            <!-- Offcanvas Header -->
            <div class="offcanvas-header py-4 py-lg-7 border-bottom ">
                <a class="icon icon-lg text-muted" href="#" data-bs-dismiss="offcanvas">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </a>

                <div class="visibility-xl-invisible overflow-hidden text-center">
                    <h5 class="text-truncate">Members</h5>
                    <p class="text-truncate">Add new members</p>
                </div>

                <a class="icon icon-lg text-muted" data-bs-toggle="collapse" href="#search-members" role="button" aria-expanded="false" aria-controls="search-members" onclick="event.preventDefault();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                    </svg>
                </a>
            </div>
            <!-- Offcanvas Header -->

            <!-- Offcanvas Body -->
            <div class="offcanvas-body hide-scrollbar py-0">

                <!-- Search -->
                <div class="collapse" id="search-members">
                    <div class="border-bottom py-6">

                        <form action="#">
                            <div class="input-group">
                                <div class="input-group-text" id="search-user">
                                    <div class="icon icon-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </div>
                                </div>

                                <input type="text" class="form-control form-control-lg ps-0" placeholder="User name or phone" aria-label="User name or phone" aria-describedby="search-user">
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Search -->

                <!-- Members -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <small class="text-uppercase text-muted">B</small>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar ">

                                    <img class="avatar-img" src="assets/img/avatars/6.jpg" alt="">


                                </div>
                            </div>
                            <div class="col">
                                <h5>Bill Marrow</h5>
                                <p>last seen 3 days ago</p>
                            </div>
                            <div class="col-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="id-add-user-user-1">
                                    <label class="form-check-label" for="id-add-user-user-1"></label>
                                </div>
                            </div>
                        </div>
                        <label class="stretched-label" for="id-add-user-user-1"></label>
                    </li>

                    <li class="list-group-item">
                        <small class="text-uppercase text-muted">D</small>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar ">

                                    <img class="avatar-img" src="assets/img/avatars/5.jpg" alt="">


                                </div>
                            </div>
                            <div class="col">
                                <h5>Damian Binder</h5>
                                <p>last seen within a week</p>
                            </div>
                            <div class="col-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="id-add-user-user-2">
                                    <label class="form-check-label" for="id-add-user-user-2"></label>
                                </div>
                            </div>
                        </div>
                        <label class="stretched-label" for="id-add-user-user-2"></label>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar avatar-online">


                                    <span class="avatar-text">D</span>

                                </div>
                            </div>
                            <div class="col">
                                <h5>Don Knight</h5>
                                <p>online</p>
                            </div>
                            <div class="col-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="id-add-user-user-3">
                                    <label class="form-check-label" for="id-add-user-user-3"></label>
                                </div>
                            </div>
                        </div>
                        <label class="stretched-label" for="id-add-user-user-3"></label>
                    </li>

                    <li class="list-group-item">
                        <small class="text-uppercase text-muted">E</small>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar avatar-online">

                                    <img class="avatar-img" src="assets/img/avatars/8.jpg" alt="">


                                </div>
                            </div>
                            <div class="col">
                                <h5>Elise Dennis</h5>
                                <p>online</p>
                            </div>
                            <div class="col-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="id-add-user-user-4">
                                    <label class="form-check-label" for="id-add-user-user-4"></label>
                                </div>
                            </div>
                        </div>
                        <label class="stretched-label" for="id-add-user-user-4"></label>
                    </li>

                    <li class="list-group-item">
                        <small class="text-uppercase text-muted">M</small>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar ">

                                    <img class="avatar-img" src="assets/img/avatars/11.jpg" alt="">


                                </div>
                            </div>
                            <div class="col">
                                <h5>Mila White</h5>
                                <p>last seen a long time ago</p>
                            </div>
                            <div class="col-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="id-add-user-user-5">
                                    <label class="form-check-label" for="id-add-user-user-5"></label>
                                </div>
                            </div>
                        </div>
                        <label class="stretched-label" for="id-add-user-user-5"></label>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar avatar-online">


                                    <span class="avatar-text">M</span>

                                </div>
                            </div>
                            <div class="col">
                                <h5>Michael Fuller</h5>
                                <p>online</p>
                            </div>
                            <div class="col-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="id-add-user-user-6">
                                    <label class="form-check-label" for="id-add-user-user-6"></label>
                                </div>
                            </div>
                        </div>
                        <label class="stretched-label" for="id-add-user-user-6"></label>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar ">


                                    <span class="avatar-text">M</span>

                                </div>
                            </div>
                            <div class="col">
                                <h5>Marshall Wallaker</h5>
                                <p>last seen within a month</p>
                            </div>
                            <div class="col-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="id-add-user-user-7">
                                    <label class="form-check-label" for="id-add-user-user-7"></label>
                                </div>
                            </div>
                        </div>
                        <label class="stretched-label" for="id-add-user-user-7"></label>
                    </li>

                    <li class="list-group-item">
                        <small class="text-uppercase text-muted">O</small>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar avatar-online">


                                    <span class="avatar-text">O</span>

                                </div>
                            </div>
                            <div class="col">
                                <h5>Ollie Chandler</h5>
                                <p>online</p>
                            </div>
                            <div class="col-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="id-add-user-user-8">
                                    <label class="form-check-label" for="id-add-user-user-8"></label>
                                </div>
                            </div>
                        </div>
                        <label class="stretched-label" for="id-add-user-user-8"></label>
                    </li>

                    <li class="list-group-item">
                        <small class="text-uppercase text-muted">W</small>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar ">

                                    <img class="avatar-img" src="assets/img/avatars/4.jpg" alt="">


                                </div>
                            </div>
                            <div class="col">
                                <h5>Warren White</h5>
                                <p>last seen recently</p>
                            </div>
                            <div class="col-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="id-add-user-user-9">
                                    <label class="form-check-label" for="id-add-user-user-9"></label>
                                </div>
                            </div>
                        </div>
                        <label class="stretched-label" for="id-add-user-user-9"></label>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar avatar-online">

                                    <img class="avatar-img" src="assets/img/avatars/7.jpg" alt="">


                                </div>
                            </div>
                            <div class="col">
                                <h5>William Wright</h5>
                                <p>online</p>
                            </div>
                            <div class="col-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="id-add-user-user-10">
                                    <label class="form-check-label" for="id-add-user-user-10"></label>
                                </div>
                            </div>
                        </div>
                        <label class="stretched-label" for="id-add-user-user-10"></label>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar avatar-online">


                                    <span class="avatar-text">W</span>

                                </div>
                            </div>
                            <div class="col">
                                <h5>Winton Wilkinson</h5>
                                <p>online</p>
                            </div>
                            <div class="col-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="id-add-user-user-11">
                                    <label class="form-check-label" for="id-add-user-user-11"></label>
                                </div>
                            </div>
                        </div>
                        <label class="stretched-label" for="id-add-user-user-11"></label>
                    </li>
                </ul>
                <!-- Members -->
            </div>
            <!-- Offcanvas Body -->

            <!-- Offcanvas Footer -->
            <div class="offcanvas-footer border-top py-4 py-lg-7">
                <a href="#" class="btn btn-lg btn-primary w-100 d-flex align-items-center">
                    Add members

                    <span class="icon ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </span>
                </a>
            </div>
            <!-- Offcanvas Footer -->
        </div>
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

    <!-- Modal: Profile -->
    <div class="modal fade" id="modal-profile1" tabindex="-1" aria-labelledby="modal-profile" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">

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

                            <div class="position-absolute top-0 start-0 py-6 px-5">
                                <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>

                        <div class="profile-body">
                            <div class="avatar avatar-xl">
                                <img class="avatar-img" src="./assets/img/avatars/1.jpg" alt="#">
                            </div>

                            <h4 class="mb-1">William Wright</h4>
                            <p>last seen 5 minutes ago</p>
                        </div>
                    </div>
                    <!-- Header -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Location</h5>
                                    <p>USA, Houston</p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>E-mail</h5>
                                    <p>william@studio.com</p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Phone</h5>
                                    <p>1-800-275-2273</p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call">
                                            <path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- List  -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    <ul class="list-group list-group-flush">
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
                    </ul>
                    <!-- List -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="#" class="text-danger">Logout</a>
                        </li>
                    </ul>
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
                                <img class="avatar-img" src="./assets/img/avatars/9.jpg" alt="#">

                                <a href="#" class="badge badge-lg badge-circle bg-primary text-white border-outline position-absolute bottom-0 end-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </a>
                            </div>

                            <h4 class="mb-1">William Wright</h4>
                            <p>last seen 5 minutes ago</p>
                        </div>
                    </div>
                    <!-- Header -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Location</h5>
                                    <p>USA, Houston</p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>E-mail</h5>
                                    <p>william@studio.com</p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Phone</h5>
                                    <p>1-800-275-2273</p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call">
                                            <path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- List -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    <ul class="list-group list-group-flush">
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
                    </ul>
                    <!-- List -->

                    <hr class="hr-bold modal-gx-n my-0">

                    <!-- List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="#" class="text-reset">Send Message</a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="text-danger">Block User</a>
                        </li>
                    </ul>
                    <!-- List -->
                </div>
                <!-- Modal body -->

            </div>
        </div>
    </div>


    <!-- chat file modal -->

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
                    <form method="post" enctype="multipart/form-data" id="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>Messenger/dist/addChatFiles.php">
                        <div class="input-field">
                            <table class="table table-bordered">
                                <tr>
                                    <input type="hidden" class="form-control" name="senderId" value="<?php echo $chatId; ?>">
                                    <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                                        <input type="file" class="form-control" name="file[]" id="" multiple />
                                    </td>
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
                    <form class="insert-phases" id="phase_form" method="post" action="<?php echo BASE_URL; ?>Messenger/dist/addChatFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
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
                    <form class="insert-phases" id="filelink" method="post" action="<?php echo BASE_URL; ?>Messenger/dist/addChatFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
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

    <!-- chat file modal end -->

    <!-- group file edit/delete modal -->

    <div class="modal fade" id="groupinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="avatar avatar-online d-none d-xl-inline-block">
                        <img class="avatar-img avatar-circle" src="<?php echo $pic111; ?>" alt="">
                    </div>
                    <h1 class="m-2 text-success"><?php echo $chat_Name; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <div class="modal-body" style="margin-top: -40px;">
                    <h3>Participants : </h3>
                    <?php
                    $allGropuQ = $connect->query("SELECT * FROM groupmember WHERE groupId = '$chatId'");
                    while ($groupData = $allGropuQ->fetch()) {
                        $user_Id = $groupData['userId'];
                        $username = $connect->query("SELECT nickname FROM users WHERE id = '$user_Id'");
                        $usernameData = $username->fetchColumn();
                        $userpic = $connect->query("SELECT file_name FROM users WHERE id = '$user_Id'");

                        $userpicData = $userpic->fetchColumn();
                        if ($userpicData != "") {
                            $userPro = BASE_URL . 'includes/Pages/upload/' . $userpicData;
                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $userPro)) {
                                $userPro = BASE_URL . 'includes/Pages/upload/' . $userpicData;
                            } else {
                                $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                            }
                        } else {
                            $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                        }
                    ?>
                        <div>
                            <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $userPro; ?>" alt="Image Description">
                            <span style="margin: 5px;">
                                <?php echo $usernameData;
                                $checAd = $connect->query("SELECT count(*) FROM groupmember WHERE userId = '$userId' AND groupId = '$chatId' AND type = 'admin'");
                                $adData = $checAd->fetchColumn();
                                if ($adData > 0 && $user_Id != $userId) {
                                ?>
                                    <a href="<?php echo BASE_URL; ?>Messenger/dist/fetchGroupChatData.php?deleteMember=<?php echo $user_Id; ?>&deleteGroupId=<?php echo $chatId; ?>"><i class="bi bi-x-circle"></i></a>
                                <?php } ?>
                            </span>
                            <?php if ($groupData['type'] == "admin") { ?>
                                <span style="float: right;background: #00c9a761;padding: 3px;border-radius: 25px;font-size: smaller; color: green;">Group Admin</span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <?php
                    if ($adData > 0) {
                    ?>
                        <button data-bs-target="#addParti" data-bs-toggle="modal" type="button" class="btn btn-soft-success"><i class="bi bi-person-add"></i>Add Participants</button>
                    <?php } ?>
                    <!-- <button type="button" class="btn btn-soft-danger">Exit Group</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <div class="modal fade" id="addParti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="avatar avatar-online d-none d-xl-inline-block">
                        <img class="avatar-img avatar-circle" src="<?php echo $pic111; ?>" alt="">
                    </div>
                    <h1 class="m-2 text-success"><?php echo $chat_Name; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <div class="modal-body" style="margin-top: -40px;">
                    <h3>Add Member</h3>
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/addGroup.php">
                        <input type="hidden" name="groupIDParti" value="<?php echo $chatId; ?>">
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
                                    $checkAvl = $connect->query("SELECT * FROM groupmember WHERE userId = '$othUsId' AND groupId = '$chatId'");
                                    $checAvlData = $checkAvl->fetchColumn();
                                    if ($checAvlData <= 0) {
                                        $userpic = $connect->query("SELECT file_name FROM users WHERE id = '$othUsId'");

                                        $userpicData = $userpic->fetchColumn();
                                        if ($userpicData != "") {
                                            $userPro = BASE_URL . 'includes/Pages/upload/' . $userpicData;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $userPro)) {
                                                $userPro = BASE_URL . 'includes/Pages/upload/' . $userpicData;
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
                        <input type="submit" value="Add" name="addOtherParti" class="btn btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- edit msg modal -->

    <div class="modal fade" id="msgEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editGroupMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <input type="hidden" name="msgId" id="msgId">
                        <label style="color:black; font-weight:bold; margin:5px;">Message:</label>
                        <input class="form-control" type="text" name="message" value="" id="messages">
                        <input type="submit" value="Edit" class="btn btn-success" name="editChatMsgBtn" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete msg group -->

    <div class="modal fade" id="deleteMsgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editGroupMsg.php" enctype="multipart/form-data" method="post" style="width: 49%;display: inline-block;">
                        <input type="hidden" name="deleteForMe" id="deleteForMe" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <input type="submit" value="Delete For Me" class="btn btn-danger" name="deleteForme" />
                    </form>
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editGroupMsg.php" enctype="multipart/form-data" method="post" style="width: 49%;display: inline-block;">
                        <input type="hidden" name="deleteForEvery" id="deleteForEvery" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <input type="submit" value="Delete For Everyone" class="btn btn-danger" name="deleteForevery" />
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
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editGroupMsg.php" enctype="multipart/form-data" method="post" style="width: 49%;display: inline-block;">
                        <input type="hidden" name="deleteForMe" id="deleteForMe" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <input type="submit" value="Delete For Me" class="btn btn-danger" name="deleteFormeOther" />
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
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editGroupMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="replyId" id="replyId" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <label style="color:black; font-weight:bold; margin:5px;">Message:</label>
                        <input class="form-control" type="text" name="replyMessage" value="" id="replyMessage" readonly>
                        <label style="color:black; font-weight:bold; margin:5px;">Reply:</label>
                        <input class="form-control" type="text" name="reply" value="" id="" required>
                        <input type="submit" value="Send" class="btn btn-success" name="replyBtn" />
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
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editGroupMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="forwardId" id="forwardId" />
                        <input type="hidden" name="chatId" value="<?php echo $chatId; ?>">
                        <label style="color:black; font-weight:bold; margin:5px;">Message:</label>
                        <input class="form-control" type="text" name="forwardMessage" value="" id="forwardMessage" readonly>
                        <table class="table table-striped table-bordered" id="phasetable">
                            <thead class="bg-dark">
                                <tr>
                                    <th class="text-light">Sr No</th>
                                    <th class="text-light">Group</th>
                                    <th class="text-light">Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $otheUser = $connect->query("SELECT * FROM chatgroup");
                                while ($otheUserData = $otheUser->fetch()) {
                                    $othUsId = $otheUserData['id'];
                                    $userpic = $connect->query("SELECT file_name FROM users WHERE id = '$othUsId'");

                                    $userpicData = $otheUserData['groupProfile'];
                                    if ($userpicData != "") {
                                        $userPro = BASE_URL . 'includes/Pages/groupProfile/' . $userpicData;
                                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $userPro)) {
                                            $userPro = BASE_URL . 'includes/Pages/groupProfile/' . $userpicData;
                                        } else {
                                            $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }
                                    } else {
                                        $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                    }
                                ?>
                                    <tr>
                                        <td><input type="checkbox" name="memberId[]" value="<?php echo $othUsId; ?>"></td>
                                        <td><?php echo $otheUserData['groupName']; ?></td>
                                        <td>
                                            <img src="<?php echo $userPro; ?>" alt="" class="avatar">
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                        <input type="submit" name="forwardBtn" value="Share" class="btn btn-success" />
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
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editGroupMsg.php" enctype="multipart/form-data" method="post">
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
                                    <th class="text-light">Group</th>
                                    <th class="text-light">Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $otheUser = $connect->query("SELECT * FROM chatgroup");
                                while ($otheUserData = $otheUser->fetch()) {
                                    $othUsId = $otheUserData['id'];
                                    $userpic = $connect->query("SELECT file_name FROM users WHERE id = '$othUsId'");

                                    $userpicData = $otheUserData['groupProfile'];
                                    if ($userpicData != "") {
                                        $userPro = BASE_URL . 'includes/Pages/groupProfile/' . $userpicData;
                                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $userPro)) {
                                            $userPro = BASE_URL . 'includes/Pages/groupProfile/' . $userpicData;
                                        } else {
                                            $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }
                                    } else {
                                        $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                    }
                                ?>
                                    <tr>
                                        <td><input type="checkbox" name="memberId[]" value="<?php echo $othUsId; ?>"></td>
                                        <td><?php echo $otheUserData['groupName']; ?></td>
                                        <td>
                                            <img src="<?php echo $userPro; ?>" alt="" class="avatar">
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                        <input type="submit" name="forwardDocBtn" value="Share" class="btn btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ParticipantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add Participant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/addGroup.php">
                        <input type="hidden" name="groupIDParti" value="<?php echo $chatId; ?>">
                        <div class="input-group">
                            <div class="input-group-text">
                                <div class="icon icon-lg">
                                    <i class="bi bi-search"></i>
                                </div>
                            </div>

                            <input type="text" class="form-control form-control-lg ps-0" placeholder="Search messages or users" aria-label="Search for messages or users..." id="searchInputParticipant">
                        </div>

                        <!-- Card -->
                        <div id="userCardContainergroup">
                            <?php
                            $otheUser = $connect->query("SELECT * FROM users");
                            while ($otheUserData = $otheUser->fetch()) {
                                $othUsId = $otheUserData['id'];
                                $checkAvl = $connect->query("SELECT * FROM groupmember WHERE userId = '$othUsId' AND groupId = '$chatId'");
                                $checAvlData = $checkAvl->fetchColumn();
                                if ($checAvlData <= 0) {
                                    $userpic = $connect->query("SELECT file_name FROM users WHERE id = '$othUsId'");

                                    $userpicData = $userpic->fetchColumn();
                                    if ($userpicData != "") {
                                        $userPro = BASE_URL . 'includes/Pages/upload/' . $userpicData;
                                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $userPro)) {
                                            $userPro = BASE_URL . 'includes/Pages/upload/' . $userpicData;
                                        } else {
                                            $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }
                                    } else {
                                        $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                    }

                            ?>
                                    <div class="card border-0 mt-5">
                                        <div class="card-body bg-dark" style="border-radius: 20px;margin: 5px;">

                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <div class="avatar ">

                                                        <img class="avatar-img" src="<?php echo $userPro; ?>" alt="">


                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5><?php echo $otheUserData['nickname']; ?></h5>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input style="border: 1px solid #95aac9;" class="form-check-input" type="checkbox" value="<?php echo $otheUserData['id']; ?>" name="memberId[]" id="id-member-<?php echo $otheUserData['id'] . $otheUserData['nickname']; ?>" />
                                                        <label class="form-check-label" for="id-member-<?php echo $otheUserData['id'] . $otheUserData['nickname']; ?>"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="stretched-label" for="id-member-<?php echo $otheUserData['id'] . $otheUserData['nickname']; ?>"></label>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </form>
                    <!-- Card -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="addOtherParti" value="Add Group" />
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
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editGroupMsg.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="linkId" id="linkId1" />
                        <input type="hidden" name="linkType" id="linkType1" />
                        <input type="hidden" name="mainId" class="mainId" />
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
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editGroupMsg.php" enctype="multipart/form-data" method="post">
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
                                    <th class="text-light">Group</th>
                                    <th class="text-light">Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $otheUser = $connect->query("SELECT * FROM chatgroup");
                                while ($otheUserData = $otheUser->fetch()) {
                                    $othUsId = $otheUserData['id'];
                                    $userpic = $connect->query("SELECT file_name FROM users WHERE id = '$othUsId'");

                                    $userpicData = $otheUserData['groupProfile'];
                                    if ($userpicData != "") {
                                        $userPro = BASE_URL . 'includes/Pages/groupProfile/' . $userpicData;
                                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $userPro)) {
                                            $userPro = BASE_URL . 'includes/Pages/groupProfile/' . $userpicData;
                                        } else {
                                            $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }
                                    } else {
                                        $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                    }
                                ?>
                                    <tr>
                                        <td><input type="checkbox" name="memberId[]" value="<?php echo $othUsId; ?>"></td>
                                        <td><?php echo $otheUserData['groupName']; ?></td>
                                        <td>
                                            <img src="<?php echo $userPro; ?>" alt="" class="avatar">
                                        </td>
                                    </tr>
                                <?php
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
                    <form action="<?php echo BASE_URL; ?>Messenger/dist/editGroupMsg.php" enctype="multipart/form-data" method="post">
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
                                $otheUser = $connect->query("SELECT * FROM chatgroup");
                                while ($otheUserData = $otheUser->fetch()) {
                                    $othUsId = $otheUserData['id'];
                                    $userpic = $connect->query("SELECT file_name FROM users WHERE id = '$othUsId'");

                                    $userpicData = $otheUserData['groupProfile'];
                                    if ($userpicData != "") {
                                        $userPro = BASE_URL . 'includes/Pages/groupProfile/' . $userpicData;
                                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $userPro)) {
                                            $userPro = BASE_URL . 'includes/Pages/groupProfile/' . $userpicData;
                                        } else {
                                            $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }
                                    } else {
                                        $userPro = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                    }
                                ?>
                                    <tr>
                                        <td><input type="checkbox" name="memberId[]" value="<?php echo $othUsId; ?>"></td>
                                        <td><?php echo $otheUserData['groupName']; ?></td>
                                        <td>
                                            <img src="<?php echo $userPro; ?>" alt="" class="avatar">
                                        </td>
                                    </tr>
                                <?php
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

    <!-- end group file edit/delete modal -->

    <!-- Modal: Media Preview -->
    <div class="modal fade" id="modal-media-preview" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">

                <!-- Modal: Header -->
                <div class="modal-header">
                    <button type="button" class="btn-close btn-close-arrow" data-bs-dismiss="modal" aria-label="Close"></button>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the input field and user cards container
        const searchInput = document.getElementById('searchInputParticipant');
        const userCardContainer = document.getElementById('userCardContainergroup');
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
    $("#fileOpt").change(function() {
        if ($(this).val() == "addFile") {
            $("#multipleFile").css("display", "block");
            $("#phase_form").css("display", "none");
            $("#filelink").css("display", "none");
            $("#newpageform").css("display", "none");
            $("#file").css("display", "block");
        }

        if ($(this).val() == "addFileLoca") {
            $("#phase_form").css("display", "block");
            $("#multipleFile").css("display", "none");
            $("#filelink").css("display", "none");
            $("#newpageform").css("display", "none");
            $("#file").css("display", "block");
        }
        if ($(this).val() == "addFileLink") {
            $("#phase_form").css("display", "none");
            $("#multipleFile").css("display", "none");
            $("#newpageform").css("display", "none");
            $("#filelink").css("display", "block");
            $("#file").css("display", "block");
        }
        if ($(this).val() == "addNewPage") {
            const chatUser = <?php echo $chatId; ?>;
            window.location.href = "<?php echo BASE_URL; ?>Messenger/dist/editorGroupPage.php?chatUser=" + chatUser;
        }
    });

    $(document).ready(function() {
        // Function to be called
        function myFunction() {
            const chatId = <?php echo $chatId ?>;
            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>Messenger/dist/fetchGroupChatData.php',
                data: {
                    chatId: chatId,
                },
                success: function(response) {
                    $("#chatData").empty();
                    $("#chatData").html(response);
                    scrollToBottom();
                }
            });
        }

        // Call the function on page load
        myFunction();

        // Call the function every 5 seconds
        setInterval(myFunction, 5000); // 5000 milliseconds = 5 seconds
    });

    $(".txt_search").keyup(function() {
        var search = $(this).val();
        // alert(search);
        if (search != "") {

            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>Library/getPermissionSearch.php',
                data: {
                    search: search,
                },
                success: function(response) {
                    $(".tableData").show();
                    $('.userDetail').empty();
                    $('.userDetail').append(response);
                    // console.log(response);

                }
            });
        } else {
            $('.searchResult').empty();
            $(".tableData").hide();
        }
    });
    $("#sendChatMsg").on("click", function() {
        const sId = $("#senderId").val();
        const chatMsg = $("#chatInput").val();
        if (chatMsg >= 0) {
            alert("Pls Write Any Msg...!");
        } else {
            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>Messenger/dist/sendGroupMsg.php',
                data: {
                    senderId: sId,
                    msg: chatMsg
                },
                success: function(response) {
                    $("#chatInput").val("");
                    myFunction();
                }
            });
        }
    });

    $("#chatInput").keypress(function(e) {
        // alert("hii");
        const sId = $("#senderId").val();
        const chatMsg = $("#chatInput").val();
        if (e.which === 13) {
            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>Messenger/dist/sendGroupMsg.php',
                data: {
                    senderId: sId,
                    msg: chatMsg
                },
                success: function(response) {
                    $("#chatInput").val("");
                    myFunction();
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.fetchLinkDetail', function() {
            const linkId = $(this).data("id");
            const linkType = $(this).data("type");
            const linkName = $(this).data("name");
            const linkLastName = $(this).data("value");
            const mainId = $(this).data("mainid");

            $(".mainId").val(mainId);

            $("#linkId1").val(linkId);
            $("#linkType1").val(linkType);
            $("#linkName5").val(linkName);
            $("#lastName1").val(linkLastName);

            $("#linkId").val(linkId);
            $("#linkType").val(linkType);
            $("#linkName").val(linkName);
            $("#lastName").val(linkLastName);
        });

        $(document).on('click', '.linkRepl', function() {
            const linkName = $(this).data("name");
            const replId = $(this).data("id")
            $("#replyMessage").val(linkName);
            $("#replyId").val(replId);
        });
    });
</script>

<script>
    $(".showImageFull").on("click", function() {
        const imageName = $(this).data("imagename");
        // alert(imageName);
        $(".imagePath").attr("src", "<?php echo BASE_URL; ?>includes/pages/files/" + imageName);
    });
</script>

<script>
    $(document).on("click", ".driveLink1", function() {
        const page = $(this).attr("value");

        var $tempInput = $("<input>");

        // Set the value of the temporary input element to the text
        $tempInput.val(page);

        // Append the temporary input element to the body
        $("body").append($tempInput);

        // Select the text in the temporary input element
        $tempInput.select();

        // Copy the selected text to the clipboard
        document.execCommand("copy");

        // Remove the temporary input element from the body
        $tempInput.remove();
        window.open('<?php echo BASE_URL; ?>openPageIllu.php', '_blank');
    });
</script>

<script>
    // Function to scroll to the bottom of the chatData div
    function scrollToBottom() {
        var chatDataDiv = document.getElementById('chatData');
        chatDataDiv.scrollTop = chatDataDiv.scrollHeight;
    }

    // Use window.onload to ensure the page is fully loaded before running the script
    window.onload = scrollToBottom;
</script>

</html>