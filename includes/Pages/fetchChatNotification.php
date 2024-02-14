<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

$userId = $_SESSION['login_id'];

if (isset($_REQUEST['userId'])) {
    $notiQ = $connect->query("SELECT * FROM chats WHERE receiverId = '$userId' AND notification = '0'");
    if ($notiQ->rowCount() > 0) {
        while ($notiData = $notiQ->fetch()) {
            $cId = $notiData['id'];
            $ssId = $notiData['senderId'];
            $updateQuery = "UPDATE chats SET notification = '1' WHERE id = '$cId'";
            $statement_editor = $connect->prepare($updateQuery);
            $statement_editor->execute();
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
            <div id="liveToast" class="position-fixed toast fade show bg-white" role="alert" aria-live="assertive" aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;">
                <div class="toast-header bg-dark">
                    <div class="d-flex align-items-center flex-grow-1">
                        <div class="flex-shrink-0">
                            <img class="avatar avatar-sm avatar-circle" src="<?php echo $pic111; ?>" alt="Image description">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h2 class="mb-0"><?php echo $ssName; ?></h2>
                            <!-- <small class="ms-auto">20 mins ago</small> -->
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <div class="toast-body bg-dark text-dark" style="font-size: large;">
                    <?php
                    if ($notiData['loca'] == "userfile") {
                        $mId = $notiData['messages'];
                        $fileQ = $connect->query("SELECT filename FROM user_files WHERE id = '$mId'");
                        echo $fileQ->fetchColumn();
                    } elseif ($notiData['loca'] == "page") {
                        $mId = $notiData['messages'];
                        $pageQ = $connect->query("SELECT pageName FROM editor_data WHERE id = '$mId'");
                        echo $pageQ->fetchColumn();
                    } else {
                        echo $notiData['messages'];
                    }
                    ?>
                </div>
                <div class="toast-Footer bg-dark" style="float: right;margin: 5px;">
                    <a class="btn btn-primary" target="_blank" href="<?php echo BASE_URL; ?>Messenger/dist/chat-direct.php?chatId=<?php echo $ssId; ?>">View</a>
                </div>
            </div>

<?php
        }
    }
}

if (isset($_REQUEST['msgRead'])) {
    $checkMsg = $connect->query("SELECT count(*) FROM chats WHERE receiverId = '$userId' AND msgRead = '0'");
    $cuntMsg = $checkMsg->fetchColumn();
    echo $cuntMsg;
}

?>