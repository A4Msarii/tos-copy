<?php
ini_set('display_errors', 1);
include('./includes/config.php');
include(ROOT_PATH . './includes/connect.php');
session_start();
$sessionId = session_id();

$username = $_REQUEST['username'];
$password = $_REQUEST["password"];


$password = md5($password);
// check user count 
if (isset($_REQUEST['username'])) {
    $q = "SELECT * from users where studid='$username' and `password`='$password'";
    $statement = $connect->prepare($q);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $q2 = "SELECT * from users where studid='$username' and `password`='$password'";
        $statement1 = $connect->prepare($q2);
        $statement1->execute();
        $result = $statement1->fetchAll();
        foreach ($result as $row) {
            session_start();
            $_SESSION['nickname'] = $row['nickname'];
            $role = $row['role'];
            $inst_id = $row['ins_id'];
            $_SESSION['login_id'] = $row['id'];
            $user_id = $row['id'];
            // $_SESSION['d_ID'] = $row['departmentId'];
            $id = $row['id'];

            $_SESSION['inst_id'] = $inst_id;
            $_SESSION['role'] = $role;

            $login = "DELETE FROM checkonline WHERE userId = '$id'";
            $statement = $connect->prepare($login);
            $statement->execute();

            $login1 = "DELETE FROM checktyping WHERE userId = '$id'";
            $statement = $connect->prepare($login1);
            $statement->execute();
            
            $login2 = "DELETE FROM enddays WHERE userId = '$id'";
            $statement = $connect->prepare($login2);
            $statement->execute();

            $login3 = "DELETE FROM course_cal WHERE userId = '$id'";
            $statement = $connect->prepare($login3);
            $statement->execute();

            $query = "INSERT INTO checkonline (userId,status) VALUES ('$id','online')";
            $stmt = $connect->prepare($query);
            $stmt->execute();

            if ($role != "super admin") {

                $lastDepartQ = $connect->query("SELECT departmentId
                    FROM userdepartment
                    WHERE userId = '$user_id'
                    ORDER BY departmentId DESC
                    LIMIT 1;");
                $lastDepartId = $lastDepartQ->fetchColumn();
                if ($lastDepartId !== false) {
                    $departMentQ = $connect->query("SELECT id FROM homepage WHERE id = '$lastDepartId'");
                    $departmentId = $departMentQ->fetchColumn();
                    $_SESSION['department_Id'] = $departmentId;
                    $diviQ = $connect->query("SELECT divisionId FROM division_department WHERE departmentId = '$departmentId' ORDER BY divisionId LIMIT 1;");
                    $divR = $diviQ->fetchColumn();

                    $divi = $connect->query("SELECT * FROM division where id='$divR' ORDER BY id DESC LIMIT 1;");
                    while ($divData = $divi->fetch()) {
                        if ($divData['color'] == "") {
                            $divisionColor = "gray";
                        } else {
                            $divisionColor = $divData['color'];
                        }
                        $id = $divData['id'];
                        $_SESSION['division_id'] = $id;
                        $_SESSION['division_NAME'] = $divData['divisionName'];
                        $_SESSION['division_COLOR'] = $divisionColor;
                    }
                }
            }

            if ($role == "super admin") {
                $q1 = $connect->query("SELECT id FROM homepage WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1;");
                $departmentId = $q1->fetchColumn();
                $_SESSION['department_Id'] = $departmentId;
                $diviQ = $connect->query("SELECT divisionId FROM division_department WHERE departmentId = '$departmentId' ORDER BY divisionId LIMIT 1;");
                $divR = $diviQ->fetchColumn();

                $divi = $connect->query("SELECT * FROM division where id = '$divR' ORDER BY id DESC LIMIT 1;");
                while ($divData = $divi->fetch()) {
                    if ($divData['color'] == "") {
                        $divisionColor = "gray";
                    } else {
                        $divisionColor = $divData['color'];
                    }
                    $id = $divData['id'];
                    $_SESSION['division_id'] = $id;
                    $_SESSION['division_NAME'] = $divData['divisionName'];
                    $_SESSION['division_COLOR'] = $divisionColor;
                }
            }

            // echo $departmentId."<br>";
            // echo $_SESSION['division_NAME'];
            // die();


            $sql = "DELETE FROM library WHERE id='1'";
            $statement = $connect->prepare($sql);
            $statement->execute();

            $result1 = $connect->query("SELECT COUNT(*) FROM library WHERE library = 'Main' OR library = 'main'");
            $data = $result1->fetchColumn();
            if ($data == 0) {
                $sql = "INSERT INTO library (id,library,user_id) VALUES('1','Main','super_admin')";
                $stmt = $connect->prepare($sql);
                $stmt->execute();
            }
            $sessionData = [
                'sessionId' => $sessionId,
                'nickname' => $_SESSION['nickname'],
                'loginId' => $_SESSION['login_id'],
                'instId' => $_SESSION['inst_id'],
                'role' => $_SESSION['role'],
                // Add other session variables as needed
            ];
            $file_path = 'C:\\xampp\\htdocs\\latest\\TOS\\session_data.json'; // Windows paths use backslashes
            file_put_contents($file_path, json_encode($sessionData));
            
                header("Location:includes/Pages/login_app.php");
         }
    } else {
        $_SESSION['danger'] = "Invalid Username Or password..";
        header("Location:index.php");
    }
} else {
    $_SESSION['danger'] = "Invalid Username Or password..";
    header("Location:index.php");
}
