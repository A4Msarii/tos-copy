<?php
session_start();
include("../../includes/config.php");
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['chatId'])) {
    $chatId = $_REQUEST['chatId'];
    $chatQ = $connect->query("SELECT * FROM chats WHERE (receiverId = '$chatId' OR senderId = '$chatId') AND (receiverId = '$userId' OR senderId = '$userId') ORDER BY date asc");
    while ($chatData = $chatQ->fetch()) {
        $chatMainId = $chatData['messages'];
        $rsId = $chatData['receiverId'];
        $ssId = $chatData['senderId'];
        $rsData = $connect->query("SELECT nickname FROM users WHERE id = '$rsId'");
        $rsName = $rsData->fetchColumn();


        // print_r($rsData1);

        $ssData = $connect->query("SELECT nickname FROM users WHERE id = '$ssId'");
        $ssName = $ssData->fetchColumn();

        $ssData1 = $connect->query("SELECT file_name FROM users WHERE id = '$ssId'");
        $prof_pic111 = $ssData1->fetchColumn();
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
        <?php if ($chatData['senderId'] != $userId) {
            $mId = $chatData['id'];
            $checDel = $connect->query("SELECT count(*) FROM chatdeleteforme WHERE msgId = '$mId' AND userId = '$userId'");
            $checDelData = $checDel->fetchColumn();
            if ($checDelData <= 0) {
        ?>

                <?php
                if ($chatData['loca'] == "") {
                    if ($chatData['lastName'] == "") {
                ?>
                        <div class="message">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic111; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <?php if ($chatData['replyMsg'] != "") { ?>
                                                <blockquote class="blockquote overflow-hidden">
                                                    <p class="small text-truncate"><?php echo $chatData['replyMsg']; ?></p>
                                                </blockquote>
                                            <?php } ?>
                                            <p><?php echo $chatData['messages']; ?></p>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;list-style-type: none; font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $chatData['messages'] ?>';">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardMsgModal" style="cursor: pointer;list-style-type: none; font-size:large;" onclick="document.getElementById('forwardId').value='<?php echo $chatData['id'] ?>';document.getElementById('forwardMessage').value='<?php echo $chatData['messages'] ?>';">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center fetchTaskName" data-taskname="<?php echo $chatData['messages']; ?>" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;list-style-type: none; font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($chatData['lastName'] == "online") {
                    ?>
                        <div class="message">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <?php if ($chatData['replyMsg'] != "") { ?>
                                                <blockquote class="blockquote overflow-hidden">
                                                    <p class="small text-truncate"><?php echo $chatData['replyMsg']; ?></p>
                                                </blockquote>
                                            <?php } ?>
                                            <a href="http://<?php echo $chatData['messages']; ?>" target="_blank"><?php echo $chatData['lastName']; ?></a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="linkRepl dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" data-name="<?php echo $chatData['messages']; ?>">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="fetchLinkDetail dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#linkForwardModal" data-id="<?php echo $chatData['id']; ?>" data-type="<?php echo $chatData['fileType']; ?>" data-name="<?php echo $chatData['messages']; ?>" data-value="<?php echo $chatData['lastName']; ?>">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li> -->
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($chatData['lastName'] == "offline") {
                    ?>
                        <div class="message">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <?php if ($chatData['replyMsg'] != "") { ?>
                                                <blockquote class="blockquote overflow-hidden">
                                                    <p class="small text-truncate"><?php echo $chatData['replyMsg']; ?></p>
                                                </blockquote>
                                            <?php } ?>
                                            <a style="cursor: pointer;" class="driveLink1" value="<?php echo $chatData['messages']; ?>" target="_blank"><?php echo $chatData['lastName']; ?> </a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="linkRepl dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" data-name="<?php echo $chatData['messages']; ?>">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="fetchLinkDetail dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#linkForwardModal" data-id="<?php echo $chatData['id']; ?>" data-type="<?php echo $chatData['fileType']; ?>" data-name="<?php echo $chatData['messages']; ?>" data-value="<?php echo $chatData['lastName']; ?>">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li> -->
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($chatData['fileType'] == "jpeg" || $chatData['fileType'] == "jpg" || $chatData['fileType'] == "png" || $chatData['fileType'] == "gif") {
                    ?>
                        <div class="message">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-gallery">
                                            <div class="row gx-3">
                                                <div class="col">
                                                    <img class="img-fluid rounded imageUser" data-action="zoom" data-bs-target="#fullUserIamge" data-bs-toggle="modal" src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $chatData['messages']; ?>" data-value="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $chatData['messages']; ?>" alt="">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $chatData['messages'] ?>';">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardDocModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('forwardId').value='<?php echo $chatData['id'] ?>';document.getElementById('forwardDoc').value='<?php echo $chatData['messages'] ?>';document.getElementById('docLastName').value='<?php echo $chatData['lastName'] ?>';document.getElementById('docfileType').value='<?php echo $chatData['fileType'] ?>';">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li> -->
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($chatData['fileType'] == "pageData") {
                    ?>
                        <div class="message">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <a href="<?php echo BASE_URL; ?>chatbox/chatNewPage.php?pageId=<?php echo $chatData['id']; ?>"><?php echo $chatData['lastName']; ?></a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $chatData['lastName'] ?>';">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardEditorModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('forwardEditorId').value='<?php echo $chatData['id'] ?>';document.getElementById('forwardEditorMessage').value='<?php echo $chatData['lastName'] ?>';">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li> -->
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else {
                    ?>
                        <div class="message">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <a style="color:blue;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $chatData['messages']; ?>" target="_blank"><?php echo substr($chatData['messages'], 0, 10); ?> </a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $chatData['messages'] ?>';">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardDocModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('forwardId').value='<?php echo $chatData['id'] ?>';document.getElementById('forwardDoc').value='<?php echo $chatData['messages'] ?>';
                                                        document.getElementById('docLastName').value='<?php echo $chatData['lastName'] ?>';
                                                        document.getElementById('docfileType').value='<?php echo $chatData['fileType'] ?>';">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li> -->
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                } else if ($chatData['loca'] == "userfile") {
                    $newFileQ = $connect->query("SELECT * FROM user_files WHERE id = '$chatMainId'");
                    $newFileData = $newFileQ->fetch();
                    if ($newFileData['lastName'] == "") {
                        if ($newFileData['type'] == 'jpg' || $newFileData['type'] == 'jpeg' || $newFileData['type'] == 'png' || $newFileData['type'] == 'svg' || $newFileData['type'] == 'gif' || $newFileData['type'] == 'webp') {
                        ?>
                            <div class="message">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                    <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                                </a>

                                <div class="message-inner">
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="message-gallery">
                                                <div class="row gx-3">
                                                    <div class="col">
                                                        <img class="img-fluid rounded imageUser" data-action="zoom" data-bs-target="#fullUserIamge" data-bs-toggle="modal" src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $newFileData['filename']; ?>" data-value="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $newFileData['filename']; ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Dropdown -->
                                            <div class="message-action">
                                                <div class="dropdown">
                                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $newFileData['filename'] ?>';">
                                                                <span class="me-auto">Reply</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-reply"></i>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardDocModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('forwardId').value='<?php echo $chatData['id'] ?>';document.getElementById('forwardDoc').value='<?php echo $newFileData['filename'] ?>';document.getElementById('docLastName').value='<?php echo 'file' ?>';document.getElementById('docfileType').value='<?php echo $newFileData['type'] ?>';">
                                                                <span class="me-auto">Forward</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-forward"></i>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <!-- <li>
                                                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                                <span class="me-auto">Create Task</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-caret-right"></i>
                                                                </div>
                                                            </a>
                                                        </li> -->
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                                <span class="me-auto">Delete</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-trash3"></i>
                                                                </div>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="message">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                    <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                                </a>

                                <div class="message-inner">
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="message-text">
                                                <a style="color:blue;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $newFileData['filename']; ?>" target="_blank"><?php echo substr($newFileData['filename'], 0, 10); ?> </a>
                                            </div>

                                            <!-- Dropdown -->
                                            <div class="message-action">
                                                <div class="dropdown">
                                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $newFileData['filename'] ?>';">
                                                                <span class="me-auto">Reply</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-reply"></i>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardDocModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('forwardDocId').value='<?php echo $newFileData['id'] ?>';document.getElementById('forwardDoc').value='<?php echo $newFileData['filename'] ?>';
                                                        document.getElementById('docLastName').value='<?php echo 'file' ?>';
                                                        document.getElementById('docfileType').value='<?php echo $newFileData['type'] ?>';">
                                                                <span class="me-auto">Forward</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-forward"></i>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <!-- <li>
                                                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                                <span class="me-auto">Create Task</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-caret-right"></i>
                                                                </div>
                                                            </a>
                                                        </li> -->
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                                <span class="me-auto">Delete</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-trash3"></i>
                                                                </div>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    if ($newFileData['type'] == "offline") {
                        ?>
                        <div class="message">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <?php if ($chatData['replyMsg'] != "") { ?>
                                                <blockquote class="blockquote overflow-hidden">
                                                    <p class="small text-truncate"><?php echo $chatData['replyMsg']; ?></p>
                                                </blockquote>
                                            <?php } ?>
                                            <a style="cursor: pointer;" class="driveLink1" value="<?php echo $newFileData['filename']; ?>" target="_blank"><?php echo $newFileData['lastName']; ?> </a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="linkRepl dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" data-name="<?php echo $newFileData['filename']; ?>">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="fetchLinkDetail dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#linkForwardModal" data-id="<?php echo $newFileData['id']; ?>" data-type="<?php echo $newFileData['type']; ?>" data-name="<?php echo $newFileData['filename']; ?>" data-value="<?php echo $newFileData['lastName']; ?>">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center fetchTaskName" data-taskname="<?php echo $newFileData['lastName']; ?>" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    if ($newFileData['type'] == "online") {
                    ?>
                        <div class="message">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <?php if ($chatData['replyMsg'] != "") { ?>
                                                <blockquote class="blockquote overflow-hidden">
                                                    <p class="small text-truncate"><?php echo $chatData['replyMsg']; ?></p>
                                                </blockquote>
                                            <?php } ?>
                                            <a style="cursor: pointer;" class="" href="http://<?php echo $newFileData['filename']; ?>" target="_blank"><?php echo $newFileData['lastName']; ?> </a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="linkRepl dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" data-name="<?php echo $newFileData['filename']; ?>">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="fetchLinkDetail dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#linkForwardModal" data-id="<?php echo $newFileData['id']; ?>" data-type="<?php echo $newFileData['type']; ?>" data-name="<?php echo $newFileData['filename']; ?>" data-value="<?php echo $newFileData['lastName']; ?>">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center fetchTaskName" data-taskname="<?php echo $newFileData['lastName']; ?>" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else if ($chatData['loca'] == "page") {
                    $pageQ = $connect->query("SELECT * FROM editor_data WHERE id = '$chatMainId'");
                    $pageQData = $pageQ->fetch();
                    ?>
                    <div class="message">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                            <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                        </a>

                        <div class="message-inner">
                            <div class="message-body">
                                <div class="message-content">
                                    <div class="message-text">
                                        <a href="<?php echo BASE_URL; ?>Messenger/dist/chatNewPage.php?pageId=<?php echo $pageQData['id']; ?>"><?php echo $pageQData['pageName']; ?></a>
                                    </div>

                                    <!-- Dropdown -->
                                    <div class="message-action">
                                        <div class="dropdown">
                                            <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $pageQData['pageName'] ?>';">
                                                        <span class="me-auto">Reply</span>
                                                        <div class="icon">
                                                            <i class="bi bi-reply"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardEditorModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('forwardEditorId').value='<?php echo $pageQData['id'] ?>';document.getElementById('forwardEditorMessage').value='<?php echo $pageQData['pageName'] ?>';">
                                                        <span class="me-auto">Forward</span>
                                                        <div class="icon">
                                                            <i class="bi bi-forward"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center  fetchTaskName" data-taskname="<?php echo $pageQData['pageName']; ?>" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                        <span class="me-auto">Create Task</span>
                                                        <div class="icon">
                                                            <i class="bi bi-caret-right"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                        <span class="me-auto">Delete</span>
                                                        <div class="icon">
                                                            <i class="bi bi-trash3"></i>
                                                        </div>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>

        <?php
            }
        }
        ?>
        <!-- Message -->
        <?php if ($chatData['senderId'] == $userId) {
            $mId = $chatData['id'];
            $checDel = $connect->query("SELECT count(*) FROM chatdeleteforme WHERE msgId = '$mId' AND userId = '$userId'");
            $checDelData = $checDel->fetchColumn();
            if ($checDelData <= 0) {
                $rsData1 = $connect->query("SELECT file_name FROM users WHERE id = '$userId'");
                $prof_pic11 = $rsData1->fetchColumn();
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
                <?php
                if ($chatData['loca'] == "") {
                    if ($chatData['lastName'] == "") {
                ?>
                        <div class="message message-out">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <?php if ($chatData['replyMsg'] != "") { ?>
                                                <blockquote class="blockquote overflow-hidden">
                                                    <p class="small text-truncate"><?php echo $chatData['replyMsg']; ?></p>
                                                </blockquote>
                                            <?php } ?>
                                            <p><?php echo $chatData['messages']; ?></p>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center fetchGroupDetail" data-group="<?php echo $groupId; ?>" style="cursor: pointer;list-style-type: none; font-size:large;" data-bs-toggle="modal" data-bs-target="#msgEditModal" onclick="document.getElementById('msgId').value='<?php echo $chatData['id'] ?>';document.getElementById('messages').value='<?php echo $chatData['messages'] ?>';">
                                                            <span class="me-auto">Edit</span>
                                                            <div class="icon">
                                                                <i class="bi bi-pen"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;list-style-type: none; font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $chatData['messages'] ?>';">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardMsgModal" style="cursor: pointer;list-style-type: none; font-size:large;" onclick="document.getElementById('forwardId').value='<?php echo $chatData['id'] ?>';document.getElementById('forwardMessage').value='<?php echo $chatData['messages'] ?>';">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center fetchTaskName" data-taskname="<?php echo $chatData['messages']; ?>" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;list-style-type: none; font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($chatData['lastName'] == "online") {
                    ?>
                        <div class="message message-out">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <?php if ($chatData['replyMsg'] != "") { ?>
                                                <blockquote class="blockquote overflow-hidden">
                                                    <p class="small text-truncate"><?php echo $chatData['replyMsg']; ?></p>
                                                </blockquote>
                                            <?php } ?>
                                            <a href="http://<?php echo $chatData['messages']; ?>" target="_blank"><?php echo $chatData['lastName']; ?></a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center fetchLinkDetail" data-bs-toggle="modal" data-bs-target="#linkEditModal" data-id="<?php echo $chatData['id']; ?>" data-type="<?php echo $chatData['fileType']; ?>" data-name="<?php echo $chatData['messages']; ?>" data-value="<?php echo $chatData['lastName']; ?>">
                                                            <span class="me-auto">Edit</span>
                                                            <div class="icon">
                                                                <i class="bi bi-pen"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="linkRepl dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" data-name="<?php echo $chatData['messages']; ?>">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a class="fetchLinkDetail dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#linkForwardModal" data-id="<?php echo $chatData['id']; ?>" data-type="<?php echo $chatData['fileType']; ?>" data-name="<?php echo $chatData['messages']; ?>" data-value="<?php echo $chatData['lastName']; ?>">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li> -->
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($chatData['lastName'] == "offline") {
                    ?>
                        <div class="message message-out">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <?php if ($chatData['replyMsg'] != "") { ?>
                                                <blockquote class="blockquote overflow-hidden">
                                                    <p class="small text-truncate"><?php echo $chatData['replyMsg']; ?></p>
                                                </blockquote>
                                            <?php } ?>
                                            <a style="cursor: pointer;" class="driveLink1" value="<?php echo $chatData['messages']; ?>" target="_blank"><?php echo $chatData['lastName']; ?> </a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center fetchLinkDetail" data-bs-toggle="modal" data-bs-target="#linkEditModal" data-id="<?php echo $chatData['id']; ?>" data-type="<?php echo $chatData['fileType']; ?>" data-name="<?php echo $chatData['messages']; ?>" data-value="<?php echo $chatData['lastName']; ?>">
                                                            <span class="me-auto">Edit</span>
                                                            <div class="icon">
                                                                <i class="bi bi-pen"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="linkRepl dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" data-name="<?php echo $chatData['messages']; ?>">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="fetchLinkDetail dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#linkForwardModal" data-id="<?php echo $chatData['id']; ?>" data-type="<?php echo $chatData['fileType']; ?>" data-name="<?php echo $chatData['messages']; ?>" data-value="<?php echo $chatData['lastName']; ?>">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li> -->
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($chatData['fileType'] == "jpeg" || $chatData['fileType'] == "jpg" || $chatData['fileType'] == "png" || $chatData['fileType'] == "gif") {
                    ?>
                        <div class="message message-out">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-gallery">
                                            <div class="row gx-3">
                                                <div class="col">
                                                    <img class="img-fluid rounded imageUser" data-action="zoom" data-bs-target="#fullUserIamge" data-bs-toggle="modal" src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $chatData['messages']; ?>" data-value="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $chatData['messages']; ?>" alt="">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $chatData['messages'] ?>';">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardDocModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('forwardId').value='<?php echo $chatData['id'] ?>';document.getElementById('forwardDoc').value='<?php echo $chatData['messages'] ?>';document.getElementById('docLastName').value='<?php echo $chatData['lastName'] ?>';document.getElementById('docfileType').value='<?php echo $chatData['fileType'] ?>';">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li> -->
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($chatData['fileType'] == "pageData") {
                    ?>
                        <div class="message message-out">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <a href="<?php echo BASE_URL; ?>chatbox/chatNewPage.php?pageId=<?php echo $chatData['id']; ?>"><?php echo $chatData['lastName']; ?></a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                                            <a class="me-auto fetchGroupDetail" href="<?php echo BASE_URL; ?>chatbox/editEditor.php?chatId=<?php echo $chatId; ?>&editId=<?php echo $chatData['id']; ?>">Edit</a>
                                                            <div class="icon">
                                                                <i class="bi bi-pen"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $chatData['lastName'] ?>';">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardEditorModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('forwardEditorId').value='<?php echo $chatData['id'] ?>';document.getElementById('forwardEditorMessage').value='<?php echo $chatData['lastName'] ?>';">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a class="dropdown-item d-flex align-items-center " data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li> -->
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else {
                    ?>
                        <div class="message message-out">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <a style="color:white;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $chatData['messages']; ?>" target="_blank"><?php echo substr($chatData['messages'], 0, 10); ?> </a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $chatData['messages'] ?>';">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardDocModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('forwardId').value='<?php echo $chatData['id'] ?>';document.getElementById('forwardDoc').value='<?php echo $chatData['messages'] ?>';
                                                        document.getElementById('docLastName').value='<?php echo $chatData['lastName'] ?>';
                                                        document.getElementById('docfileType').value='<?php echo $chatData['fileType'] ?>';">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li> -->
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                } else if ($chatData['loca'] == "userfile") {
                    $newFileQ = $connect->query("SELECT * FROM user_files WHERE id = '$chatMainId'");
                    $newFileData = $newFileQ->fetch();
                    if ($newFileData['lastName'] == "") {
                        if ($newFileData['type'] == 'jpg' || $newFileData['type'] == 'jpeg' || $newFileData['type'] == 'png' || $newFileData['type'] == 'svg' || $newFileData['type'] == 'gif' || $newFileData['type'] == 'webp') {
                        ?>
                            <div class="message message-out">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                    <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                                </a>

                                <div class="message-inner">
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="message-gallery">
                                                <div class="row gx-3">
                                                    <div class="col">
                                                        <img class="img-fluid rounded imageUser" data-action="zoom" data-bs-target="#fullUserIamge" data-bs-toggle="modal" src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $newFileData['filename']; ?>" data-value="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $newFileData['filename']; ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Dropdown -->
                                            <div class="message-action">
                                                <div class="dropdown">
                                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $newFileData['filename'] ?>';">
                                                                <span class="me-auto">Reply</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-reply"></i>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardDocModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('forwardId').value='<?php echo $chatData['id'] ?>';document.getElementById('forwardDoc').value='<?php echo $newFileData['filename'] ?>';document.getElementById('docLastName').value='<?php echo 'file' ?>';document.getElementById('docfileType').value='<?php echo $newFileData['type'] ?>';">
                                                                <span class="me-auto">Forward</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-forward"></i>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <!-- <li>
                                                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                                <span class="me-auto">Create Task</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-caret-right"></i>
                                                                </div>
                                                            </a>
                                                        </li> -->
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                                <span class="me-auto">Delete</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-trash3"></i>
                                                                </div>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="message message-out">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                    <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                                </a>

                                <div class="message-inner">
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="message-text">
                                                <a style="color:white;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $newFileData['filename']; ?>" target="_blank"><?php echo substr($newFileData['filename'], 0, 10); ?> </a>
                                            </div>

                                            <!-- Dropdown -->
                                            <div class="message-action">
                                                <div class="dropdown">
                                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $newFileData['filename'] ?>';">
                                                                <span class="me-auto">Reply</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-reply"></i>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardDocModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('forwardDocId').value='<?php echo $newFileData['id'] ?>';document.getElementById('forwardDoc').value='<?php echo $newFileData['filename'] ?>';
                                                        document.getElementById('docLastName').value='<?php echo 'file' ?>';
                                                        document.getElementById('docfileType').value='<?php echo $newFileData['type'] ?>';">
                                                                <span class="me-auto">Forward</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-forward"></i>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <!-- <li>
                                                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                                <span class="me-auto">Create Task</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-caret-right"></i>
                                                                </div>
                                                            </a>
                                                        </li> -->
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                                <span class="me-auto">Delete</span>
                                                                <div class="icon">
                                                                    <i class="bi bi-trash3"></i>
                                                                </div>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    if ($newFileData['type'] == 'offline') {
                        ?>
                        <div class="message message-out">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <?php if ($chatData['replyMsg'] != "") { ?>
                                                <blockquote class="blockquote overflow-hidden">
                                                    <p class="small text-truncate"><?php echo $chatData['replyMsg']; ?></p>
                                                </blockquote>
                                            <?php } ?>
                                            <a style="cursor: pointer;color:white;" class="driveLink1" value="<?php echo $newFileData['filename']; ?>" target="_blank"><?php echo $newFileData['lastName']; ?> </a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center fetchLinkDetail" data-bs-toggle="modal" data-bs-target="#linkEditModal" data-id="<?php echo $newFileData['id']; ?>" data-type="<?php echo $newFileData['type']; ?>" data-name="<?php echo $newFileData['filename']; ?>" data-value="<?php echo $newFileData['lastName']; ?>" data-mainid="<?php echo $chatData['id']; ?>">
                                                            <span class="me-auto">Edit</span>
                                                            <div class="icon">
                                                                <i class="bi bi-pen"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="linkRepl dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" data-name="<?php echo $newFileData['filename']; ?>">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="fetchLinkDetail dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#linkForwardModal" data-id="<?php echo $newFileData['id']; ?>" data-type="<?php echo $newFileData['type']; ?>" data-name="<?php echo $newFileData['filename']; ?>" data-value="<?php echo $newFileData['lastName']; ?>">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center fetchTaskName" data-taskname="<?php echo $newFileData['lastName']; ?>" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    if ($newFileData['type'] == 'online') {
                    ?>
                        <div class="message message-out">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                            </a>

                            <div class="message-inner">
                                <div class="message-body">
                                    <div class="message-content">
                                        <div class="message-text">
                                            <?php if ($chatData['replyMsg'] != "") { ?>
                                                <blockquote class="blockquote overflow-hidden">
                                                    <p class="small text-truncate"><?php echo $chatData['replyMsg']; ?></p>
                                                </blockquote>
                                            <?php } ?>
                                            <a style="cursor: pointer;color:white;" href="http://<?php echo $newFileData['filename']; ?>" target="_blank"><?php echo $newFileData['lastName']; ?> </a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="message-action">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center fetchLinkDetail" data-bs-toggle="modal" data-bs-target="#linkEditModal" data-id="<?php echo $newFileData['id']; ?>" data-type="<?php echo $newFileData['type']; ?>" data-name="<?php echo $newFileData['filename']; ?>" data-value="<?php echo $newFileData['lastName']; ?>" data-mainid="<?php echo $chatData['id']; ?>">
                                                            <span class="me-auto">Edit</span>
                                                            <div class="icon">
                                                                <i class="bi bi-pen"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="linkRepl dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" data-name="<?php echo $newFileData['filename']; ?>">
                                                            <span class="me-auto">Reply</span>
                                                            <div class="icon">
                                                                <i class="bi bi-reply"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="fetchLinkDetail dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#linkForwardModal" data-id="<?php echo $newFileData['id']; ?>" data-type="<?php echo $newFileData['type']; ?>" data-name="<?php echo $newFileData['filename']; ?>" data-value="<?php echo $newFileData['lastName']; ?>">
                                                            <span class="me-auto">Forward</span>
                                                            <div class="icon">
                                                                <i class="bi bi-forward"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center fetchTaskName" data-taskname="<?php echo $newFileData['lastName']; ?>" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                            <span class="me-auto">Create Task</span>
                                                            <div class="icon">
                                                                <i class="bi bi-caret-right"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                            <span class="me-auto">Delete</span>
                                                            <div class="icon">
                                                                <i class="bi bi-trash3"></i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                <?php } else if ($chatData['loca'] == "page") {
                    $pageQ = $connect->query("SELECT * FROM editor_data WHERE id = '$chatMainId'");
                    $pageQData = $pageQ->fetch();
                ?>
                    <div class="message message-out">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                            <img class="avatar-img" src="<?php echo $pic11; ?>" alt="">
                        </a>

                        <div class="message-inner">
                            <div class="message-body">
                                <div class="message-content">
                                    <div class="message-text">
                                        <?php if ($chatData['replyMsg'] != "") { ?>
                                            <blockquote class="blockquote overflow-hidden">
                                                <p class="small text-truncate"><?php echo $chatData['replyMsg']; ?></p>
                                            </blockquote>
                                        <?php } ?>
                                        <a style="color:white;" href="<?php echo BASE_URL; ?>Messenger/dist/chatNewPage.php?pageId=<?php echo $pageQData['id']; ?>"><?php echo $pageQData['pageName']; ?></a>
                                    </div>

                                    <!-- Dropdown -->
                                    <div class="message-action">
                                        <div class="dropdown">
                                            <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>

                                            <ul class="dropdown-menu">

                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="<?php echo BASE_URL; ?>Messenger/dist/editEditor.php?chatId=<?php echo $chatId; ?>&editId=<?php echo $pageQData['id']; ?>&mainId=<?php echo $chatData['id']; ?>">
                                                        <span class="me-auto">Edit</span>
                                                        <div class="icon">
                                                            <i class="bi bi-pen"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('replyId').value='<?php echo $chatData['id'] ?>';document.getElementById('replyMessage').value='<?php echo $pageQData['pageName'] ?>';">
                                                        <span class="me-auto">Reply</span>
                                                        <div class="icon">
                                                            <i class="bi bi-reply"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#forwardEditorModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('forwardEditorId').value='<?php echo $pageQData['id'] ?>';document.getElementById('forwardEditorMessage').value='<?php echo $pageQData['pageName'] ?>';">
                                                        <span class="me-auto">Forward</span>
                                                        <div class="icon">
                                                            <i class="bi bi-forward"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center fetchTaskName" data-taskname="<?php echo $pageQData['pageName']; ?>" data-bs-toggle="modal" data-bs-target="#taskmodal" style="cursor: pointer;list-style-type: none; font-size:large;">
                                                        <span class="me-auto">Create Task</span>
                                                        <div class="icon">
                                                            <i class="bi bi-caret-right"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center text-danger" data-bs-toggle="modal" data-bs-target="#deleteMsgModal" style="cursor: pointer;font-size: large;" onclick="document.getElementById('deleteForEvery').value='<?php echo $chatData['id'] ?>';document.getElementById('deleteForMe').value='<?php echo $chatData['id'] ?>';">
                                                        <span class="me-auto">Delete</span>
                                                        <div class="icon">
                                                            <i class="bi bi-trash3"></i>
                                                        </div>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
<?php
            }
        }
    }
}

if (isset($_REQUEST['typeId'])) {
    $chatId = $_REQUEST['typeId'];
    $query = "INSERT INTO checktyping (userId,chatId) VALUES ('$userId','$chatId')";
    $stmt = $connect->prepare($query);
    $stmt->execute();
}

if (isset($_REQUEST['deleteTypeId'])) {
    $chatId = $_REQUEST['deleteTypeId'];
    $sql = "DELETE FROM checktyping WHERE userId = '$userId' AND chatId = '$chatId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
}

?>