<?php
session_start();
include("../../includes/config.php");
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];
// echo $userId;
if (isset($_REQUEST['user'])) {
    // $chatQ = $connect->query("SELECT c.* FROM chats AS c JOIN ( SELECT senderId, MAX(id) AS max_id FROM chats WHERE receiverId = '$userId' GROUP BY senderId ) AS subquery ON c.senderId = subquery.senderId AND c.id = subquery.max_id WHERE c.senderId != '$userId' AND c.receiverId = '$userId' ");

    // $chatQ = $connect->query("SELECT * FROM chats WHERE (senderId = '$userId') GROUP BY receiverId");
    $rId = 0;
    $ssId = 0;

    $chatQ = $connect->query(" SELECT * FROM chats WHERE receiverId = '$userId' OR senderId = '$userId' GROUP BY senderId,receiverId ORDER BY id DESC");


    while ($chatData = $chatQ->fetch()) {

        if ($ssId != $rsId = $chatData['receiverId']) {
            $lId = $chatData['id'];
            $rsId = $chatData['receiverId'];
            $ssId = $chatData['senderId'];
            if ($rsId != $userId) {
                $fId = $rsId;
            }
            if ($ssId != $userId) {
                $fId = $ssId;
            }

            $rsData = $connect->query("SELECT nickname FROM users WHERE id = '$fId'");
            $rsName = $rsData->fetchColumn();

            $rsData1 = $connect->query("SELECT file_name FROM users WHERE id = '$fId'");
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
            $fetchLoc = $connect->query("SELECT loca FROM chats WHERE (senderId = '$ssId' AND receiverId = '$rsId') OR (senderId = '$rsId' AND receiverId = '$ssId') ORDER BY id DESC LIMIT 1");
            $loca = $fetchLoc->fetchColumn();
            if ($loca == "") {

?>
                <!-- Card -->
                <a href="<?php echo BASE_URL; ?>Messenger/dist/chat-direct.php?chatId=<?php echo $fId; ?>" class="card border-0 text-reset bg-light">

                    <div class="card-body bg-dark varun" style="box-shadow: 2px 5px 2px 0px #9b929229;border-radius: 10px;">
                        <div class="row gx-5">
                           
                            <div class="col-auto">
                                <div class="avatar avatar-online">
                                    <img src="<?php echo $pic11; ?>" alt="#" class="avatar-img">
                                </div>
                            </div>

                            <div class="col">
                                <div class="d-flex align-items-center mb-3">
                                    <h5 class="me-auto mb-0 bg-dark"><?php echo $rsName; ?></h5>
                                    <span class="text-muted extra-small ms-2"><?php echo date('h:i A', strtotime($chatData['date'])); ?></span>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="line-clamp me-auto">
                                        <?php
                                        $lastQ = $connect->query("SELECT messages FROM chats WHERE (senderId = '$ssId' AND receiverId = '$rsId') OR (senderId = '$rsId' AND receiverId = '$ssId') ORDER BY id DESC LIMIT 1");
                                        echo $lastQ->fetchColumn();
                                        // echo $chatData['messages'];
                                        ?>
                                    </div>

                                    <!-- <div class="badge badge-circle bg-primary ms-5">
                                                                <span>3</span>
                                                            </div> -->
                                </div>
                            </div>


                        </div>
                    </div><!-- .card-body -->
                </a>
            <?php } elseif ($loca == "userfile") { ?>
                <a href="<?php echo BASE_URL; ?>Messenger/dist/chat-direct.php?chatId=<?php echo $fId; ?>" class="card border-0 text-reset bg-light">
                    <div class="card-body bg-dark archana" style="box-shadow: 2px 5px 2px 0px #9b929229;border-radius: 10px;">
                        <div class="row gx-5">
                            <div class="col-auto">
                                <div class="avatar avatar-online">
                                    <img src="<?php echo $pic11; ?>" alt="#" class="avatar-img">
                                </div>
                            </div>

                            <div class="col">
                                <div class="d-flex align-items-center mb-3">
                                    <h5 class="me-auto mb-0 bg-dark"><?php echo $rsName; ?></h5>
                                    <span class="text-muted extra-small ms-2"><?php echo date('h:i A', strtotime($chatData['date'])); ?></span>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="line-clamp me-auto">
                                        <?php
                                        $lastQ = $connect->query("SELECT messages FROM chats WHERE (senderId = '$ssId' AND receiverId = '$rsId') OR (senderId = '$rsId' AND receiverId = '$ssId') ORDER BY id DESC LIMIT 1");
                                        $lastFileId = $lastQ->fetchColumn();
                                        $lastFileQ = $connect->query("SELECT lastName FROM user_files WHERE id = '$lastFileId'");
                                        echo $lastFileQ->fetchColumn();

                                        // echo $chatData['messages'];
                                        ?>
                                    </div>

                                    <!-- <div class="badge badge-circle bg-primary ms-5">
                                                                <span>3</span>
                                                            </div> -->
                                </div>
                            </div>
                        </div>
                    </div><!-- .card-body -->
                </a>
            <?php } elseif ($loca == "page") {
            ?>
                <a href="<?php echo BASE_URL; ?>Messenger/dist/chat-direct.php?chatId=<?php echo $fId; ?>" class="card border-0 text-reset bg-light">
                    <div class="card-body bg-dark ayushi" style="box-shadow: 2px 5px 2px 0px #9b929229;border-radius: 10px;">
                        <div class="row gx-5">
                           
                            <div class="col-auto">
                                <div class="avatar avatar-online">
                                    <img src="<?php echo $pic11; ?>" alt="#" class="avatar-img">
                                </div>
                            </div>

                            <div class="col">
                                <div class="d-flex align-items-center mb-3">
                                    <h5 class="me-auto mb-0 bg-dark"><?php echo $rsName; ?></h5>
                                    <span class="text-muted extra-small ms-2"><?php echo date('h:i A', strtotime($chatData['date'])); ?></span>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="line-clamp me-auto">
                                        <?php
                                        $lastQ = $connect->query("SELECT messages FROM chats WHERE (senderId = '$ssId' AND receiverId = '$rsId') OR (senderId = '$rsId' AND receiverId = '$ssId') ORDER BY id DESC LIMIT 1");
                                        $lastFileId = $lastQ->fetchColumn();
                                        $lastFileQ = $connect->query("SELECT pageName FROM editor_data WHERE id = '$lastFileId'");
                                        echo $lastFileQ->fetchColumn();

                                        // echo $chatData['messages'];
                                        ?>
                                    </div>

                                    <!-- <div class="badge badge-circle bg-primary ms-5">
                                                                <span>3</span>
                                                            </div> -->
                                </div>
                            </div>
                        </div>
                    </div><!-- .card-body -->
                </a>
            <?php
            } ?>
        <?php }
    }
?>
<br>
<?php
    $userId = $_SESSION['login_id'];
    $gropuQ = $connect->query("SELECT * FROM groupmember WHERE userId = '$userId'");
    while ($gropuData = $gropuQ->fetch()) {
        $groupId = $gropuData['groupId'];
        $groupDetail = $connect->query("SELECT * FROM chatgroup WHERE id = '$groupId'");
        while ($groupDetailData = $groupDetail->fetch()) {
            $groupImg = $groupDetailData['groupProfile'];
            if ($groupImg != "") {
                $groupProfile = BASE_URL . 'includes/Pages/groupProfile/' . $groupImg;
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $groupProfile)) {
                    $groupProfile = BASE_URL . 'includes/Pages/groupProfile/' . $groupImg;
                } else {
                    $groupProfile = BASE_URL . 'includes/Pages/avatar/avtar.png';
                }
            } else {
                $groupProfile = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
        ?>
            <?php
            $adminQ = $connect->query("SELECT count(*) FROM groupmember WHERE groupId = '$groupId' AND userId = '$userId' AND type = 'admin'");
            $adminData = $adminQ->fetchColumn();
            if ($adminData > 0) {
            
            ?>

            <div class="dropdown"><i class="bi bi-three-dots-vertical icon text-muted" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="position: absolute;right: 15px;z-index: 1;top: 50px;"></i>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fetchGroupDetail" data-group="<?php echo $groupId; ?>" data-bs-toggle="modal" data-bs-target="#editgroupMOdal">Edit contact</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item text-danger" href="<?php echo BASE_URL; ?>Messenger/dist/fetchGroupDetail.php?deleteId=<?php echo $groupId; ?>">Delete</a>
                    </li>
                </ul>
            </div>
            <?php } ?>

            <a href="<?php echo BASE_URL; ?>Messenger/dist/chat-group.php?groupId=<?php echo $groupId; ?>" class="card border-0 text-reset bg-light">
                <div class="card-body bg-dark mb-6" style="box-shadow: 2px 5px 2px 0px #9b929229;border-radius: 10px;">
                    <div class="row gx-5">
                        <div class="col-auto">
                            <div class="avatar">
                                <img src="<?php echo $groupProfile; ?>" alt="#" class="avatar-img">
                            </div>
                        </div>

                        <div class="col">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="me-auto mb-0 bg-dark"><?php echo $groupDetailData['groupName']; ?></h5>
                                <span class="text-muted extra-small ms-2">
                                    <?php
                                    $lastQ = $connect->query("SELECT date FROM groupchats WHERE groupId = '$groupId' ORDER BY id DESC LIMIT 1");
                                    $lastId = $lastQ->fetchColumn();
                                    echo date('h:i A', strtotime($lastId));
                                    ?>
                                </span>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="line-clamp me-auto">
                                    <?php
                                    $lastQ = $connect->query("SELECT loca FROM groupchats WHERE groupId = '$groupId' ORDER BY id DESC LIMIT 1");
                                    $lastQData = $lastQ->fetchColumn();
                                    if ($lastQData == "") {
                                        $lastMQ = $connect->query("SELECT messages FROM groupchats WHERE groupId = '$groupId' ORDER BY id DESC LIMIT 1");
                                        echo $lastMQ->fetchColumn();
                                    }
                                    if ($lastQData == "userfile") {
                                        $lastMQ = $connect->query("SELECT messages FROM groupchats WHERE groupId = '$groupId' ORDER BY id DESC LIMIT 1");
                                        $mId = $lastMQ->fetchColumn();
                                        $lastMQ1 = $connect->query("SELECT lastName FROM user_files WHERE id = '$mId'");
                                        echo $lastMQ1->fetchColumn();
                                    }
                                    if ($lastQData == "page") {
                                        $lastMQ = $connect->query("SELECT messages FROM groupchats WHERE groupId = '$groupId' ORDER BY id DESC LIMIT 1");
                                        $mId = $lastMQ->fetchColumn();
                                        $lastMQ1 = $connect->query("SELECT pageName FROM editor_data WHERE id = '$mId'");
                                        echo $lastMQ1->fetchColumn();
                                    }

                                    ?>
                                </div>

                                <!-- <div class="badge badge-circle bg-primary ms-5">
                                    <span>3</span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div><!-- .card-body -->
            </a>

    <?php
        }
    }
    ?>
<?php
} ?>


<!-- Modal -->
<div id="editgroupMOdal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Group</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo BASE_URL; ?>Messenger/dist/fetchGroupDetail.php" enctype="multipart/form-data" method="post">
                    <div id="gDetail">

                    </div>
                    <input type="submit" value="Update" class="btn btn-success" name="updateBtn" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->