<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$role = $_SESSION['role'];
$error = '';


// $ctp=$_POST['ctp'];
if (isset($_POST['submit_discipline'])) {
    $std_id = $_POST['std_id'];
    $crs_id = $_POST['crs_id'];

    if ($_POST["date"] == "" || $_POST["topic"] == "" || $_POST["comment"] == "" || $_POST["dismarks"] == "") {
        $_SESSION['info'] = "Descipline Is Required";
        header("Location:discipline.php");
    } else {
        $date = $_POST['date'];
        $topic = $_POST['topic'];
        $inst_id = $_POST['inst_id'];
        $comment = $_POST['comment'];
        $dismarks = $_POST['dismarks'];
        $pageId = $_REQUEST['pageId'];
        $attachemnt = $_FILES['attachemnt'];
        $days = $_REQUEST['days'];
        foreach ($date as $key => $value) {
            $filename = $_FILES["attachemnt"]["name"][$key];
            // $ext = pathinfo($filename, PATHINFO_EXTENSION);
            // $uploadPath = 'files/' . $filename;

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

            // $filename = $_FILES['file']['name'];

            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $uploadPath = 'files/' . $filename;
            $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$filename'");
            $dupliData = $dupliQuery->fetchColumn();


            if ($dupliData > 0) {
                $_SESSION['warning'] = "Duplicate File Not Allowed";
                header("Location: {$_SERVER['HTTP_REFERER']}");
            } else {

                move_uploaded_file($_FILES["attachemnt"]["tmp_name"][$key], $uploadPath);
                if ($dismarks[$key] != "") {

                    $query = "INSERT INTO user_files (filename,type,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy) VALUES ('$filename','$ext','$userId','$role','$color','$date','$date','$createdBy','$updatedBy')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();

                    $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
                    $lastId = $lastQ->fetchColumn();

                    $query = "INSERT INTO discipline(date, inst_id, comment,dismarks,student_id,course_id,fileName,categoryId) values('" . $value . "', '" . $inst_id[$key] . "','" . $comment[$key] . "','" . $dismarks[$key] . "','$std_id','$crs_id','$lastId', '" . $topic[$key] . "')";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                }
                if ($days[$key] != "") {
                    $query = "INSERT INTO discipline(date, inst_id, comment,dismarks,student_id,course_id,fileName,fileExt,categoryId) values('" . $value . "', '" . $inst_id[$key] . "','" . $comment[$key] . "','" . $days[$key] . "','$std_id','$crs_id','$filename','$ext', '" . $topic[$key] . "')";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                }
            }

            // $error ="<div class='alert alert-primary'>Discipline inserted successfully..</div>";
            // header("Location:discipline.php?");
        }

        if ($pageId == 0) {
            $_SESSION['success'] = "Descipline Inserted Successfully";
            header("Location:discipline.php");
        }
        if ($pageId == 1) {
            $_SESSION['success'] = "Data Inserted Successfully";
            header("Location:itemsubitem.php");
        }
        if ($pageId == 2) {
            $_SESSION['success'] = "Data Inserted Successfully";
            header("Location:itemsubitemcl.php");
        }
    }
}

if (isset($_REQUEST['editId'])) {
    $editId = $_REQUEST['editId'];
    $query = "SELECT * FROM discipline WHERE id = '$editId'";
    $statement = $connect->prepare($query);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
            $std_in = $row['inst_id'];
            if ($row['topic'] == "") {
                $tId = $row['categoryId'];
                if (is_numeric($row['categoryId'])) {
                    $tQ = $connect->query("SELECT category FROM desccate WHERE id = '$tId'");
                    $tData = $tQ->fetchColumn();
                } else {
                    $tData = $row['categoryId'];
                }
            } else {
                $tData = $row['topic'];
            }

            $instr_name = $connect->prepare("SELECT name FROM users WHERE id=?");
            $instr_name->execute([$std_in]);
            $name2 = $instr_name->fetchColumn();
?>
            <input class="form-control" type="hidden" name="id" value="<?php echo $editId; ?>" id="id" readonly>
            <label class="text-dark" style="font-weight:bold;">Instructor</label class="text-dark">
            <input class="form-control" type="text" name="inst_id" value="<?php echo $name2; ?>" id="inst1">
            <label class="text-dark" style="font-weight:bold;">Date</label class="text-dark">
            <input class="form-control" type="date" name="date" value="<?php echo $row['date']; ?>" id="date1">
            <label class="text-dark" style="font-weight:bold;">Topic</label class="text-dark">
            <select name="topic" id="" class="form-control" required>
                <option disabled selected value="<?php echo $tData; ?>"><?php echo $tData; ?></option>
                <?php
                $fetchDisi = $connect->query("SELECT * FROM desccate");
                while ($disiData = $fetchDisi->fetch()) {
                ?>
                    <option value="<?php echo $disiData['id']; ?>"><?php echo $disiData['category']; ?></option>
                <?php
                }
                ?>
            </select>
            <label class="text-dark" style="font-weight:bold;">Marks</label class="text-dark">
            <input class="form-control" type="text" name="dismarks" value="<?php echo $row['dismarks']; ?>" id="dismarks1">
            <label class="text-dark" style="font-weight:bold;">Comment</label class="text-dark">
            <input class="form-control" type="text" name="comment" value="<?php echo $row['comment']; ?>" id="comment1">
            <label class="text-dark" style="font-weight:bold;">File :- <?php echo $row['fileName']; ?></label class="text-dark">
            <input class="form-control" type="file" name="attachemnt" value="" id="">
            <input class="form-control" type="hidden" name="oldAttachemnt" value="<?php echo $row['fileName']; ?>" id="">
            <center>
                <input style="margin:10px;" class="btn btn-success" type="submit" name="submit" value="Submit">
            </center>
        <?php
        }
    }
}

if (isset($_REQUEST['absentId'])) {
    $editId = $_REQUEST['absentId'];
    $query = "SELECT * FROM discipline WHERE id = '$editId'";
    $statement = $connect->prepare($query);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
            $std_in = $row['inst_id'];
            if ($row['topic'] == "") {
                $tId = $row['categoryId'];
                if (is_numeric($row['categoryId'])) {
                    $tQ = $connect->query("SELECT category FROM desccate WHERE id = '$tId'");
                    $tData = $tQ->fetchColumn();
                } else {
                    $tData = $row['categoryId'];
                }
            } else {
                $tData = $row['topic'];
            }

            $instr_name = $connect->prepare("SELECT name FROM users WHERE id=?");
            $instr_name->execute([$std_in]);
            $name2 = $instr_name->fetchColumn();
        ?>
            <input class="form-control" type="hidden" name="id" value="<?php echo $editId; ?>" id="id" readonly>
            <label class="text-dark" style="font-weight:bold;">Instructor</label class="text-dark">
            <input class="form-control" type="text" name="inst_id" value="<?php echo $name2; ?>" id="inst1">
            <label class="text-dark" style="font-weight:bold;">Date</label class="text-dark">
            <input class="form-control" type="date" name="date" value="<?php echo $row['date']; ?>" id="date1">
            <label class="text-dark" style="font-weight:bold;">Topic</label class="text-dark">
            <input class="form-control" type="text" name="topic" value="<?php echo $tData; ?>" id="">
            <label class="text-dark" style="font-weight:bold;">Days</label class="text-dark">
            <input class="form-control" type="text" name="dismarks" value="<?php echo $row['dismarks']; ?>" id="dismarks1">
            <label class="text-dark" style="font-weight:bold;">Comment</label class="text-dark">
            <input class="form-control" type="text" name="comment" value="<?php echo $row['comment']; ?>" id="comment1">
            <label class="text-dark" style="font-weight:bold;">File :- <?php echo $row['fileName']; ?></label class="text-dark">
            <input class="form-control" type="file" name="attachemnt" value="" id="">
            <input class="form-control" type="hidden" name="oldAttachemnt" value="<?php echo $row['fileName']; ?>" id="">
            <center>
                <input style="margin:10px;" class="btn btn-success" type="submit" name="editAbsent" value="Submit">
            </center>
<?php
        }
    }
}

if (isset($_REQUEST['selVal'])) {
    $selVal = $_REQUEST['selVal'];
    $catQ = $connect->query("SELECT marks FROM desccate WHERE id = '$selVal'");
    echo $catQ->fetchColumn();
}
