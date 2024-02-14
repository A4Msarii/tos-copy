<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$userId = $_SESSION['login_id'];

if (isset($_POST['msg'])) {
    $msg = $_REQUEST['msg'];
    $id = $_REQUEST['id'];

    $query1 = "INSERT INTO chats(senderId,receiverId,messages,date) VALUES ('$userId','$id','$msg',NOW())";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();
}

if (isset($_REQUEST['res'])) {
    $id = $_REQUEST['id'];

    $chatQ = $connect->query("SELECT * FROM chats WHERE receiverId = '$id' OR senderId = '$id' ORDER BY date asc");
    while ($chatData = $chatQ->fetch()) {
        $rsId = $chatData['receiverId'];
        $ssId = $chatData['senderId'];
        $rsData = $connect->query("SELECT nickname FROM users WHERE id = '$rsId'");
        $rsName = $rsData->fetchColumn();

        $rsData1 = $connect->query("SELECT file_name FROM users WHERE id = '$rsId'");
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
        <?php if ($chatData['senderId'] != $userId) { ?>
            <li class="agent clearfix">
                <span class="chat-img left clearfix mx-2">
                    <img style="height: 50px;width:50px;" src="<?php echo $pic111; ?>" alt="Agent" class="img-circle" />
                </span>
                <div class="chat-body clearfix bg-soft-success" style="color:black !important">
                    <div class="header clearfix">
                        <strong class="primary-font" style="color:black !important; font-size: initial;"><?php echo $ssName; ?></strong> <small class="right text-muted" style="color:black !important;margin:5px;">
                            <span class="glyphicon glyphicon-time"></span><?php echo date('h:i A', strtotime($chatData['date'])); ?></small>
                    </div><hr style="margin:0px;">
                    <p>
                        <?php echo $chatData['messages']; ?>
                    </p>
                </div>
            </li>
        <?php }
        if ($chatData['senderId'] == $userId) { ?>
            <li class="admin clearfix">
                <span class="chat-img right clearfix  mx-2">
                    <img style="height: 50px;width:50px;" src="<?php echo $pic11; ?>" alt="Admin" class="img-circle" />
                </span>
                <div class="chat-body clearfix bg-soft-primary" style="color:black !important">
                    <div class="header clearfix">
                        <strong class="right primary-font" style="color:black !important; font-size:initial;"><?php echo $rsName; ?></strong>
                        <small class="left text-muted" style="color:black !important;margin: 5px;"><span class="glyphicon glyphicon-time"></span><?php echo date('h:i A', strtotime($chatData['date'])); ?></small>
                        
                    </div><hr style="margin:0px;">
                    <p>
                        <?php echo $chatData['messages']; ?>
                    </p>
                </div>
            </li>
        <?php } ?>
        <br>
<?php
    }
}
