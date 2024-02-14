<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$userId = $_SESSION['login_id'];

$searchText = $_POST['search'];

$sql = "SELECT * FROM users WHERE id != '$userId' AND nickname like '%" . $searchText . "%'  order by name asc";

$statement1 = $connect->prepare($sql);
$statement1->execute();

if ($statement1->rowCount() > 0) {
    $result1 = $statement1->fetchAll();
    foreach ($result1 as $row1) {
        $prof_pic11 = $row1['file_name'];
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
        $id = $row1['id'];
        $name = $row1['nickname'];
        // echo '<li style="margin:5px;" value=' . $id . ' class="got_result">' . $name . '</li>';
        ?>
        
        <div class="nav-item" id="usershow">
            <img src="<?php echo $pic11; ?>" alt="UserPic" class="avatar-img avatar-circle avatar-lg" />
            <a href="<?php echo BASE_URL; ?>includes/Pages/chatPage.php?userId=<?php echo $id; ?>" style="font-size: large; font-weight:bold;"><?php echo $name; ?></a>

        </div>
        <hr style="margin:0px;">
        <?php
    }
}

?>
<style type="text/css">
    li.pointer {
        cursor: pointer;
    }
</style>