<?php
include './config.php';
include ROOT_PATH . 'includes/connect.php';
if (isset($_REQUEST['depName'])) {
    echo "<option selected>Select Department</option>";
    $depQ = $connect->query("SELECT *
    FROM homepage
    WHERE id NOT IN (SELECT departmentName FROM orgchart_data WHERE type = 'department');");
    
    while ($depRes = $depQ->fetch()) {
        echo '<option value="' . $depRes['id'] . '">' . $depRes['department_name'] . '</option>';
    }
}

if (isset($_REQUEST['userName'])) {
    echo "<option selected>Select Users</option>";
    $depQ = $connect->query("SELECT * FROM users WHERE id != '11' AND id NOT IN (SELECT departmentName FROM orgchart_data WHERE type = 'user');");
    
    while ($depRes = $depQ->fetch()) {
        echo '<option value="' . $depRes['id'] . '">' . $depRes['nickname'] . '</option>';
    }
}

if (isset($_REQUEST['depPId'])) {
    $depPId = $_REQUEST['depPId'];
    $depName = $_REQUEST['depName1'];
    $depId = $_REQUEST['depId'];

    $sql = "DELETE FROM orgchart_data WHERE parentId='$depPId' AND id = '$depId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql = "INSERT INTO orgchart_data (id,departmentName,parentId,type) VALUES ('$depId','$depName','$depPId','department')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
}

if (isset($_REQUEST['userId'])) {
    $depPId = $_REQUEST['userPId'];
    $depName = $_REQUEST['userName1'];
    $depId = $_REQUEST['userId'];

    $sql = "DELETE FROM orgchart_data WHERE parentId='$depPId' AND id = '$depId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql = "INSERT INTO orgchart_data (id,departmentName,parentId,type) VALUES ('$depId','$depName','$depPId','user')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
}

if (isset($_REQUEST['fetchUser'])) {
    $userId = $_REQUEST['fetchUser'];
    $userType = $_REQUEST['userType'];
    $sn = 0;

    echo '<table class="table table-bordered" id="file_page">';
    echo '<thead class="bg-dark">';
    echo '<tr><th class="text-light">Sr No</th>';
    echo '<th class="text-light">Name</th>';
    echo '<th class="text-light">Image</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $userQ = $connect->query("SELECT * FROM users WHERE id = '$userId'");
    while ($userData = $userQ->fetch()) {
        $prof_pic11 = $userData['file_name'];
        $sn++;
        echo '<tr>';
        echo '<td>' . $sn . '</td>';
        echo '<td>' . $userData['nickname'] . '</td>';
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
        echo '<td><div class="avatar avatar-sm avatar-circle"><img class="avatar-img" src="' . $pic11 . '" alt="Image Description" /></div></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}

if (isset($_REQUEST['fetchDep'])) {
    $depId = $_REQUEST['fetchDep'];
    $userType = $_REQUEST['depType'];
    $sn = 0;

    echo '<table class="table table-bordered" id="file_page">';
    echo '<thead class="bg-dark">';
    echo '<tr><th class="text-light">Sr No</th>';
    echo '<th class="text-light">Name</th>';
    echo '<th class="text-light">Image</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $depuId = $connect->query("SELECT * FROM userdepartment WHERE departmentId = '$depId'");
    if ($depuId->rowCount() > 0) {
        while ($depUData = $depuId->fetch()) {
            $userId = $depUData['userId'];
            $userQ = $connect->query("SELECT * FROM users WHERE id = '$userId'");
            while ($userData = $userQ->fetch()) {
                $prof_pic11 = $userData['file_name'];
                $sn++;
                echo '<tr>';
                echo '<td>' . $sn . '</td>';
                echo '<td>' . $userData['nickname'] . '</td>';
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
                echo '<td><div class="avatar avatar-sm avatar-circle"><img class="avatar-img" src="' . $pic11 . '" alt="Image Description" /></div></td>';
                echo '</tr>';
            }
        }
    }else{
        echo '<tr>';
        echo '<td colspan="3">No User Found...</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
