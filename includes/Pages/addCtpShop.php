<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['ctpId'])) {
    $ctpId = $_REQUEST['ctpId'];
    $shopName = $_REQUEST['shopName'];
    //ctp inserted as shop
    $sql11 = "INSERT INTO shops(shops,ctpId) VALUES ('$shopName','$ctpId')";
    $statement11 = $connect->prepare($sql11);
    $statement11->execute();
    $last_id = $connect->lastInsertId();
    $last_id1 = "";
    //count shelf is there is not
    $nRows = $connect->query("select count(*) from shelf where library_id='1' and shelf='Course Training Standard'")->fetchColumn();
    if ($nRows == 0) {
        $sql112 = "INSERT INTO shelf(shelf,library_id) VALUES ('Course Training Standard','1')";
        $statement112 = $connect->prepare($sql112);
        $statement112->execute();
        $last_id1 = $connect->lastInsertId();
    } else {
        $query3 = "SELECT * FROM shelf where shelf='Course Training Standard' and library_id='1'";
        $statement2 = $connect->prepare($query3);
        $statement2->execute();
        $result2 = $statement2->fetchAll();
        foreach ($result2 as $row8) {
            $last_id1 = $row8['id'];
        }
    }
    //shop insert in shelf
    $sql11 = "INSERT INTO shelf_shop(user_id,shelf_id,shop_id,lib_id) VALUES ('$userId','$last_id1','$last_id','1')";
    $statement11 = $connect->prepare($sql11);
    $statement11->execute();

    //admin folder insert in shop
    $sql114 = "INSERT INTO folders(folder) VALUES ('Admin Folder')";
    $statement114 = $connect->prepare($sql114);
    $statement114->execute();
    $last_id7 = $connect->lastInsertId();
    $sql1136 = "INSERT INTO folder_shop_user(folder_id,shelf_id,user_id,shop_id,lib_id) VALUES ('$last_id7','$last_id1','$userId','$last_id','1')";
    $statement1316 = $connect->prepare($sql1136);
    $statement1316->execute();
    //acedemic folder insert in shop
    $sql1141 = "INSERT INTO folders(folder,ctpId) VALUES ('Academics','$ctpId')";
    $statement1141 = $connect->prepare($sql1141);
    $statement1141->execute();
    $last_id8 = $connect->lastInsertId();
    $fetchPhase = $connect->query("SELECT * FROM phase WHERE ctp = '$ctpId'");
    while ($phaseData = $fetchPhase->fetch()) {
        $pId = $phaseData['id'];
        $pName = $phaseData['phasename'];
        $query = "INSERT INTO user_briefcase (briefcase_name,user_id,folderId,shopid,role,color,className,phaseId) VALUES ('$pName','$userId','$last_id8','$last_id','super admin','red','academic','$pId')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
    }

    $sql11361 = "INSERT INTO folder_shop_user(folder_id,shelf_id,user_id,shop_id,lib_id) VALUES  ('$last_id8','$last_id1','$userId','$last_id','1')";
    $statement13161 = $connect->prepare($sql11361);
    $statement13161->execute();

    //phase folder 
    $fetchPhase = $connect->query("SELECT * FROM phase WHERE ctp = '$ctpId'");
    while ($phaseData = $fetchPhase->fetch()) {
        $pId = $phaseData['id'];
        $pName = $phaseData['phasename'];
        //folder phase
        $sql11 = "INSERT INTO folders(folder,phaseId) VALUES ('$pName','$pId')";
        $statement11 = $connect->prepare($sql11);
        $statement11->execute();
        $last_id2 = $connect->lastInsertId();

        $sql113 = "INSERT INTO folder_shop_user(folder_id,shelf_id,user_id,shop_id,lib_id) VALUES ('$last_id2','$last_id1','$userId','$last_id','1')";
        $statement131 = $connect->prepare($sql113);
        $statement131->execute();

        $fetchActualClass = $connect->query("SELECT * FROM actual WHERE phase = '$pId' AND ctp = '$ctpId'");
        while ($actualData = $fetchActualClass->fetch()) {
            $cId = $actualData['id'];
            $value = $actualData['symbol'];
            $query = "INSERT INTO user_briefcase (briefcase_name,user_id,folderId,shopid,role,color,classId,className) VALUES ('$value','$userId','$last_id2','$last_id','super admin','red','$cId','actual')";
            $stmt = $connect->prepare($query);
            $stmt->execute();
        }

        $fetchActualClass = $connect->query("SELECT * FROM sim WHERE phase = '$pId' AND ctp = '$ctpId'");
        while ($actualData = $fetchActualClass->fetch()) {
            $cId = $actualData['id'];
            $value = $actualData['shortsim'];
            $query = "INSERT INTO user_briefcase (briefcase_name,user_id,folderId,shopid,role,color,classId,className) VALUES ('$value','$userId','$last_id2','$last_id','super admin','red','$cId','sim')";
            $stmt = $connect->prepare($query);
            $stmt->execute();
        }
    }
    $fetch_ctp_name = $connect->query("SELECT `symbol` FROM ctppage WHERE CTPid = '$ctpId'");
    $ctp_name = $fetch_ctp_name->fetchColumn();
    $fetchcourse = $connect->query("SELECT * FROM newcourse WHERE CourseName = '$ctpId' group by CourseCode");
    while ($pcourseata = $fetchcourse->fetch()) {
        $cId = $pcourseata['Courseid'];
        $cName = $pcourseata['CourseCode'];
        echo $ctp_1Name = $ctp_name . " - " . $cName;
        // folder phase
        $sql11 = "INSERT INTO folders(folder,course_id) VALUES ('$ctp_1Name','$cId')";
        $statement11 = $connect->prepare($sql11);
        $statement11->execute();
        $last_id9 = $connect->lastInsertId();

        $sql113 = "INSERT INTO folder_shop_user(folder_id,shelf_id,user_id,shop_id,lib_id) VALUES ('$last_id9','$last_id1','$userId','$last_id','1')";
        $statement131 = $connect->prepare($sql113);
        $statement131->execute();

        $fetchStu = $connect->query("SELECT * FROM newcourse WHERE CourseName = '$ctpId' AND CourseCode = '$cName'");
        while ($fetchStuData = $fetchStu->fetch()) {
            $stuId = $fetchStuData['StudentNames'];
            $fetchNic = $connect->query("SELECT nickname FROM users WHERE id = '$stuId'");
            $name = $fetchNic->fetchColumn();

            $query = "INSERT INTO user_briefcase (briefcase_name,user_id,folderId,shopid,role,color,className,courseId,stuId) VALUES ('$name','$userId','$last_id9','$last_id','super admin','red','course','$cId','$stuId')";
            $stmt = $connect->prepare($query);
            $stmt->execute();
        }
    }

    $_SESSION['success'] = "Shop Added Successfully";
    header("Location:ctp_list.php");
}

if (isset($_REQUEST['phaseId'])) {
    $phaseId = $_REQUEST['phaseId'];
    $phaseName = $_REQUEST['phaseName'];

    $sql11 = "INSERT INTO folders(folder,phaseId) VALUES ('$phaseName','$phaseId')";
    $statement11 = $connect->prepare($sql11);
    $statement11->execute();

    $_SESSION['success'] = "Folder Added Successfully";
    header("Location:Next-home.php");
}

if (isset($_REQUEST['shopId'])) {
    $shopId = $_REQUEST['shopId'];
    $folderId = $_REQUEST['folderId'];
    $classId = $_REQUEST['classId'];
    $className = $_REQUEST['className'];
    $classTable = $_REQUEST['classTable'];

    $query = "INSERT INTO user_briefcase (briefcase_name,user_id,folderId,shopid,role,color,classId,className) VALUES ('$className','$userId','$folderId','$shopId','super admin','red','$classId','$classTable')";
    $stmt = $connect->prepare($query);
    $stmt->execute();

    $_SESSION['success'] = "Briefcase Added Successfully";
    header("Location:phase-view.php");
}
