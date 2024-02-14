<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$role = $_SESSION['role'];
$error = '';

if (isset($_POST['submit_memo'])) {
    $std_id = $_POST['std_id'];
    $crs_id = $_POST['crs_id'];

    if ($_POST["date"] == "" || $_POST["topic"] == "" || $_POST["comment"] == "" || $_POST["memomarks"] == "") {

        $_SESSION['warning'] = "Data Is Required";
        header("Location:memo.php");
    } else {
        $date = $_POST['date'];
        $topic = $_POST['topic'];
        $inst_id = $_POST['inst_id'];
        $pageId = $_REQUEST['pageId'];
        // var_dump($inst_id);
        $comment = $_POST['comment'];
        $memomarks = $_POST['memomarks'];
        $days = $_REQUEST['days'];

        // echo "date";
        // print_r($date);
        // echo "topic";
        // print_r($topic);
        // echo "inst_id";
        // print_r($inst_id);
        // echo "page id";
        // print_r($pageId);
        // echo "comment";
        // print_r($comment);
        // echo "memomarks";
        // print_r($memomarks);
        // echo "days";
        // print_r($days);
        // die();

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
            $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$filename' and filename != '$filename'");
            $dupliData = $dupliQuery->fetchColumn();


            if ($dupliData > 0) {
                $_SESSION['warning'] = "Duplicate File Not Allowed";
                header("Location: {$_SERVER['HTTP_REFERER']}");
            } else {

                
                if (move_uploaded_file($_FILES["attachemnt"]["tmp_name"][$key], $uploadPath)){
                    $query = "INSERT INTO user_files (filename,type,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy) VALUES ('$filename','$ext','$userId','$role','$color','$date','$date','$createdBy','$updatedBy')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();

                    $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
                    $lastId = $lastQ->fetchColumn();

                    $query = "INSERT INTO memo(date, inst_id, comment,memomarks,student_id,course_id,fileName,categoryId) values('" . $value . "', '" . $inst_id[$key] . "','" . $comment[$key] . "','" . $memomarks[$key] . "','$std_id','$crs_id','$lastId', '" . $topic[$key] . "')";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                }else{
                    $query = "INSERT INTO memo(date, inst_id, comment,memomarks,student_id,course_id ,categoryId) values('" . $value . "', '" . $inst_id[$key] . "','" . $comment[$key] . "','" . $memomarks[$key] . "','$std_id','$crs_id', '" . $topic[$key] . "')";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                }
                if ($days[$key] != "") {
                    $query = "INSERT INTO memo(date, inst_id, comment,memomarks,student_id,course_id,fileName,fileExt,categoryId) values('" . $value . "', '" . $inst_id[$key] . "','" . $comment[$key] . "','" . $days[$key] . "','$std_id','$crs_id','$filename','$ext', '" . $topic[$key] . "')";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                }
            }
        }
        if ($pageId == 0) {
            $_SESSION['success'] = "Data Inserted Successfully";
            header("Location:memo.php");
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
    $query = "SELECT * FROM memo WHERE id = '$editId'";
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
                    $tQ = $connect->query("SELECT category FROM memocate WHERE id = '$tId'");
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
            <label style="color: black; font-weight:bold;">Instructor</label>
            <input class="form-control" type="text" name="inst_id" value="<?php echo $name2; ?>" id="inst1">
            <label style="color: black; font-weight:bold;">Date</label>
            <input class="form-control" type="date" name="date" value="<?php echo $row['date']; ?>" id="date1">
            <label style="color: black; font-weight:bold;">Topic</label>
            <select name="topic" id="" class="form-control" required>
                <option disabled selected value="<?php echo $tData; ?>"><?php echo $tData; ?></option>
                <?php
                $fetchDisi = $connect->query("SELECT * FROM memocate");
                while ($disiData = $fetchDisi->fetch()) {
                ?>
                    <option value="<?php echo $disiData['id']; ?>"><?php echo $disiData['category']; ?></option>
                <?php
                }
                ?>
            </select>
            <label style="color: black; font-weight:bold;">Marks</label>
            <input class="form-control" type="text" name="memomarks" value="<?php echo $row['memomarks']; ?>" id="dismarks1">
            <label style="color: black; font-weight:bold;">Comment</label>
            <input class="form-control" type="text" name="comment" value="<?php echo $row['comment']; ?>" id="comment1">
            <label style="color: black; font-weight:bold;">File :- <?php echo $row['fileName']; ?></label>
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
    $query = "SELECT * FROM memo WHERE id = '$editId'";
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
                    $tQ = $connect->query("SELECT category FROM memocate WHERE id = '$tId'");
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
            <label style="color: black; font-weight:bold;">Instructor</label>
            <input class="form-control" type="text" name="inst_id" value="<?php echo $name2; ?>" id="inst1">
            <label style="color: black; font-weight:bold;">Date</label>
            <input class="form-control" type="date" name="date" value="<?php echo $row['date']; ?>" id="date1">
            <label style="color: black; font-weight:bold;">Topic</label>
            <input class="form-control" type="text" name="" value="<?php if ($tData == "absent") {
                                                                        echo "Sick";
                                                                    } else {
                                                                        echo $tData;
                                                                    } ?>" id="" readonly />
            <input class="form-control" type="hidden" name="topic" value="<?php echo $tData; ?>" id="">
            <label style="color: black; font-weight:bold;">Days</label>
            <input class="form-control" type="text" name="memomarks" value="<?php echo $row['memomarks']; ?>" id="dismarks1">
            <label style="color: black; font-weight:bold;">Comment</label>
            <input class="form-control" type="text" name="comment" value="<?php echo $row['comment']; ?>" id="comment1">
            <label style="color: black; font-weight:bold;">File :- <?php echo $row['fileName']; ?></label>
            <input class="form-control" type="file" name="attachemnt" value="" id="">
            <input class="form-control" type="hidden" name="oldAttachemnt" value="<?php echo $row['fileName']; ?>" id="">
            <center>
                <input style="margin:10px;" class="btn btn-success" type="submit" name="submitAbsent" value="Submit">
            </center>
<?php
        }
    }
}

if (isset($_REQUEST['selVal'])) {
    $selVal = $_REQUEST['selVal'];
    $catQ = $connect->query("SELECT marks FROM memocate WHERE id = '$selVal'");
    echo $catQ->fetchColumn();
}

if (isset($_REQUEST['uId'])) {
    $itemValues = $_REQUEST['day'];
    $uId = $_REQUEST['uId'];

    $checkAv = $connect->query("SELECT count(*) FROM memoabs WHERE studentId = '$uId'");
    $checkAvData = $checkAv->fetchColumn();
    if ($checkAvData > 0) {
        $itquery = "UPDATE memoabs SET absday = '$itemValues' WHERE studentId = '$uId'";
        $statement_i = $connect->prepare($itquery);
        $statement_i->execute();
    } else {
        $query = "INSERT INTO memoabs(absday,studentId) values('$itemValues','$uId')";
        $statement = $connect->prepare($query);
        $statement->execute();
    }
}
