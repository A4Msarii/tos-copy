<?php
session_start();

include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['departmantName'])) {
    $id = $_REQUEST['id'];
    $departmantName = $_REQUEST['departmantName'];
    $_SESSION['department_Id'] = $id;
    $_SESSION['department_NAME'] = $departmantName;

    unset($_SESSION['division_COLOR']);
    unset($_SESSION['division_NAME']);
    unset($_SESSION['division_id']);

    // if (isset($_GET['returnUrl'])) {
    //     header("Location: " . $_GET['returnUrl']);
    // } else {
    //     // Default redirection if returnUrl is not set
    //     header('Location: Home.php');
    // }

    $querydivision1 = "SELECT * FROM division_department where departmentId='$id'";
    $data_division1 = $connect->prepare($querydivision1);
    $data_division1->execute();
    $result_division = $data_division1->fetchAll();
    foreach ($result_division as $key1) {
        $department_Id1 = $key1['divisionId'];
        $querydivision11 = "SELECT * FROM division where id='$department_Id1'";
        $data_division11 = $connect->prepare($querydivision11);
        $data_division11->execute();
        $result_division1 = $data_division11->fetchAll();
        foreach ($result_division1 as $dt) {
            $id_div = $dt['id'];
            $color3 = $dt['color'];
            $dName = $dt['divisionName'];
            $bURL = BASE_URL . "includes/Pages/setDivsion.php?divisionName=" . $dName . "&divisionColor=" . urlencode($color3) . "&id=" . $id_div . "&returnUrl=" . urlencode($_SERVER['REQUEST_URI']);
?>

            <div class="col-md-3 divisionsearch" style="width:auto;">
                <div class="col-12 rounded" style="cursor:pointer;">
                    <a href="<?php echo $bURL; ?>" style="text-align: center;">
                        <label class="data p-2 border text-white rounded" style="cursor:pointer;font-size:x-large;background:<?php
                        if ($color3 == "") {
                            echo "gray";
                        } else {
                            echo $color3;
                        }
                        ?>;" for="flexCheckDefault">
                            <?php echo $dt['divisionName'] ?>
                        </label>
                    </a>
                </div>
            </div>

<?php
        }
    }
}

if (isset($_REQUEST['addUserDepartment'])) {

    $users = $_REQUEST['users'];

    $departId = $_REQUEST['departId'];
    $name = 0;

    while ($name < count($users)) {

        $user1 = $users[$name];


        $sql1 = "INSERT INTO userdepartment (userId,departmentId)
            VALUES ('$user1','$departId')";
        $statement1 = $connect->prepare($sql1);

        $statement1->execute();
        $name++;
    }
    $_SESSION['success'] = "User Added Successfully";
    header("Location:department_list.php");
}

if (isset($_REQUEST['dId'])) {
    $dId = $_REQUEST['dId'];

    $userQuery = $connect->query("SELECT u.*
    FROM users u
    LEFT JOIN userdepartment ud ON u.id = ud.userId AND ud.departmentId = '$dId'
    WHERE ud.userId IS NULL AND u.role != 'super admin';");

    while ($userData = $userQuery->fetch()) {
        echo "<tr>";
        echo '<td><input type="checkbox" name="users[]" value="' . $userData['id'] . '"></td>';
        echo '<td>' . $userData['name'] . '</td>';
        echo '<td>' . $userData['studid'] . '</td>';
        $prof_pic11 = $userData['file_name'];
        if ($prof_pic11 != null) {
            $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
        } else {
            $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
        }

        echo '<td><div class="avatar avatar-sm avatar-circle">
        <img class="avatar-img" src="' . $pic11 . '" alt="Image Description">
      </div>
    </td>';
        echo '<td>' . $userData['role'] . '</td>';
        echo "</tr>";
    }
}

if (isset($_REQUEST['dUserId'])) {
    $dUserId = $_REQUEST['dUserId'];

    $duserQ = $connect->query("SELECT u.*
    FROM users u
    INNER JOIN userdepartment ud ON u.id = ud.userId
    WHERE ud.departmentId = '$dUserId';");

    while ($duserData = $duserQ->fetch()) {
        echo "<tr>";
        echo '<td><input type="checkbox" name="users[]" value="' . $duserData['id'] . '"></td>';
        echo '<td>' . $duserData['name'] . '</td>';
        echo '<td>' . $duserData['studid'] . '</td>';
        $prof_pic11 = $duserData['file_name'];
        if ($prof_pic11 != null) {
            $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
        } else {
            $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
        }

        echo '<td><div class="avatar avatar-sm avatar-circle">
        <img class="avatar-img" src="' . $pic11 . '" alt="Image Description">
      </div>
    </td>';
        echo '<td>' . $duserData['role'] . '</td>';
        echo "</tr>";
    }
}

if (isset($_REQUEST['deleteUserDepartment'])) {

    $delDepartId = $_REQUEST['delDepartId'];

    $users = $_REQUEST['users'];

    $name = 0;

    while ($name < count($users)) {

        $user1 = $users[$name];


        $sql1 = "DELETE FROM userdepartment WHERE userId = '$user1' AND departmentId = '$delDepartId'";
        $statement1 = $connect->prepare($sql1);

        $statement1->execute();
        $name++;
    }
    $_SESSION['danger'] = "User Removed From Department";
    header("Location:department_list.php");
}
