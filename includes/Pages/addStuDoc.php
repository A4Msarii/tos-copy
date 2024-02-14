<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];
$role = $_SESSION['role'];

if (isset($_REQUEST['submitTestFile'])) {
    $method = $_REQUEST['method'];

    if ($method == "addFile") {
        $userId = $_SESSION['login_id'];
        $date = $dt1 = date("Y-m-d");
        $createdBy = $_SESSION['nickname'];
        $updatedBy = $_SESSION['nickname'];
        if ($role == "super admin") {
            $color = "red";
        } elseif ($role == 'instructor') {
            $color = "yellow";
        } else {
            $color = "blue";
        }

        $filename = $_FILES['file']['name'];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadPath = 'files/' . $filename;

        $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$filename'");
        $dupliData = $dupliQuery->fetchColumn();


        if ($dupliData > 0) {
            $_SESSION['warning'] = "Duplicate File Not Allowed";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadPath)) {

                $query = "INSERT INTO user_files (filename,type,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy) VALUES ('$filename','$ext','$userId','$role','$color','$date','$date','$createdBy','$updatedBy')";
                $stmt = $connect->prepare($query);
                $stmt->execute();

                $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
                $lastId1 = $lastQ->fetchColumn();
            }
        }
    }
    if ($method == "addFileLoca") {

        $phase = $_REQUEST["phase"];
        $countPhase = $_REQUEST['phase'];
        $phaseName = $_REQUEST['phaseName'];
        $senderId = $_REQUEST['senderId'];
        $userId = $_SESSION['login_id'];
        $type = "offline";
        $name = 0;
        if ($role == 'instructor') {
            $color = "yellow";
        } elseif ($role == 'student') {
            $color = 'blue';
        } else {
            $color = 'red';
        }

        $date = $dt1 = date("Y-m-d");
        $createdBy = $_SESSION['nickname'];
        $updatedBy = $_SESSION['nickname'];
        $value = $phase;
        if ($phaseName == '') {
            $string = $phase;
            $substring = substr($string, 0, 10);
            $location = $substring;
        } else {
            $location = $phaseName;
        }
        $str = str_replace('\\', '\\\\', $value);
        $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
        $dupliData = $dupliQuery->fetchColumn();


        if ($dupliData > 0) {
            $_SESSION['warning'] = "Duplicate File Not Allowed";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {

            $sql = "INSERT INTO user_files (filename, lastName, type, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy) VALUES (:filename, :lastName, :type, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy)";

            $stmt = $connect->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':filename', $str);
            $stmt->bindParam(':lastName', $location);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':createdAt', $date);
            $stmt->bindParam(':updatedAt', $date);
            $stmt->bindParam(':createdBy', $createdBy);
            $stmt->bindParam(':updatedBy', $updatedBy);

            $stmt->execute();

            $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
            $lastId1 = $lastQ->fetchColumn();
        }
    }

    if ($method == "addFileLink") {
        $phase = $_REQUEST["link"];
        $countPhase = $_REQUEST['link'];
        $phaseName = $_REQUEST['linkName'];
        $userId = $_SESSION['login_id'];
        $type = "online";
        $name = 0;
        if ($role == 'instructor') {
            $color = "yellow";
        } elseif ($role == 'student') {
            $color = 'blue';
        } else {
            $color = 'red';
        }
        $date = $dt1 = date("Y-m-d");
        $createdBy = $_SESSION['nickname'];
        $updatedBy = $_SESSION['nickname'];
        $value = $phase;



        if ($phaseName == '') {
            $string = $phase;
            $substring = substr($string, 0, 10);
            $location = $substring;
        } else {
            $location = $phaseName;
        }

        $str = str_replace('\\', '\\\\', $value);
        $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
        $dupliData = $dupliQuery->fetchColumn();


        if ($dupliData > 0) {
            $_SESSION['warning'] = "Duplicate File Not Allowed";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {

            $sql = "INSERT INTO user_files (filename, lastName, type, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy) VALUES (:filename, :lastName, :type, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy)";

            // print_r($sql);
            // die();

            $stmt = $connect->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':filename', $str);
            $stmt->bindParam(':lastName', $location);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':createdAt', $date);
            $stmt->bindParam(':updatedAt', $date);
            $stmt->bindParam(':createdBy', $createdBy);
            $stmt->bindParam(':updatedBy', $updatedBy);

            // Execute the statement
            $stmt->execute();


            $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
            $lastId1 = $lastQ->fetchColumn();
        }
    }
    // $totalfiles = count($_FILES['textFile']['name']);
    $stuId = $_REQUEST['stuId'];
    $testId = $_REQUEST['testId'];
    $className = $_REQUEST['className'];
    $query = "INSERT INTO class_documnet (classId,className,fileName,userId,stuId) VALUES ('$testId','$className','$lastId1','$userId','$stuId')";
    $stmt = $connect->prepare($query);
    $stmt->execute();
    $_SESSION['success'] = "File Inserted Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['testFileId'])) {
    $testFileId = $_REQUEST['testFileId'];
    $className = $_REQUEST['className'];
    $stuId = $_REQUEST['stuId'];

    $fileQ = $connect->query("SELECT * FROM class_documnet WHERE classId = '$testFileId' AND className = '$className' AND stuId = '$stuId'");
    if ($fileQ->rowCount() > 0) {
        while ($fileData = $fileQ->fetch()) {
            $fileId = $fileData['fileName'];
            if (is_numeric($fileId)) {
                $fetchFile = $connect->query("SELECT * FROM user_files WHERE id = '$fileId'");
                $fileDataUser = $fetchFile->fetch();
                if ($fileDataUser['lastName'] == "") {
?>
                    <a target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileDataUser['filename']; ?>" style="width: auto;margin-right:12px;" class="btn iconBtn btn-soft-primary btn-sm" title="<?php echo $fileData['fileName']; ?>"><?php echo $fileDataUser['filename']; ?></a>
                    <?php
                    if ($_SESSION['role'] == 'super admin') {
                    ?><a href="<?php echo BASE_URL; ?>includes/Pages/addStuDoc?filesId=<?php echo $fileData['id']; ?>&fileClassName=<?php echo $fileData['className']; ?>"><i style="position:relative;top:-9px;right:28px;z-index:3000" class="bi bi-x-circle text-danger"></i></a>
                    <?php
                    }
                }

                if ($fileDataUser['type'] == "online") {
                    ?>
                    <a target="_blank" href="<?php echo $fileDataUser['filename']; ?>" style="width: auto;margin-right:12px;" class="btn iconBtn btn-soft-primary btn-sm" title="<?php echo $fileDataUser['filename']; ?>"><?php echo $fileDataUser['lastName']; ?></a>
                    <?php
                    if ($_SESSION['role'] == 'super admin') {
                    ?><a href="<?php echo BASE_URL; ?>includes/Pages/addStuDoc?filesId=<?php echo $fileData['id']; ?>&fileClassName=<?php echo $fileData['className']; ?>"><i style="position:relative;top:-9px;right:28px;z-index:3000" class="bi bi-x-circle text-danger"></i></a>
                    <?php
                    }
                }
                if ($fileDataUser['type'] == "offline") {
                    ?>
                    <a value="<?php echo $fileDataUser['filename']; ?>" style="width: auto;margin-right:12px;" class="btn iconBtn btn-soft-primary btn-sm driveLinkPer" title="<?php echo $fileDataUser['filename']; ?>"><?php echo $fileDataUser['lastName']; ?></a>
                    <?php
                    if ($_SESSION['role'] == 'super admin') {
                    ?><a href="<?php echo BASE_URL; ?>includes/Pages/addStuDoc?filesId=<?php echo $fileData['id']; ?>&fileClassName=<?php echo $fileData['className']; ?>"><i style="position:relative;top:-9px;right:28px;z-index:3000" class="bi bi-x-circle text-danger"></i></a>
<?php
                    }
                }
            }
        }
    } else {
        echo '<h1>No Data Found..</h1>';
    }
}

if (isset($_REQUEST['filesId'])) {
    $filesId = $_REQUEST['filesId'];
    $fileClassName = $_REQUEST['fileClassName'];

    $sql = "DELETE FROM class_documnet WHERE id = '$filesId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $_SESSION['danger'] = "File Deleted";
    if ($fileClassName == "test") {
        header('Location:testing.php');
    }
    if ($fileClassName == "quiz") {
        header('Location:quiz.php');
    }
}
