<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$loginUserId = $_SESSION['login_id'];

if (isset($_REQUEST['permissionBtn'])) {
    $permissionPage = $_REQUEST['permissionPage'];
    $permissionType = $_REQUEST['permissionType'];
    $permissionCategory = $_REQUEST['permissionCategory'];
    $userId = $_REQUEST['userId'];

    if ($permissionType == 'None') {
        $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
        $statement = $connect->prepare($sql1);
        $statement->execute();
        $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','None','blue','$permissionCategory')";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:pageData.php?pId=$permissionPage");
    }

    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'Everyone') {
            $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE pagepermissions SET userId = '$permissionType',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:pageData.php?pId=$permissionPage");
            }

            if ($checkRes == 0) {
                $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
                $statement = $connect->prepare($sql1);
                $statement->execute();
                $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','blue','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:pageData.php?pId=$permissionPage");
            }
        }
    }
    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'All instructor') {
            $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE pagepermissions SET userId = '$permissionType',permissionType = '$permissionCategory',color = 'yellow' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:pageData.php?pId=$permissionPage");
            }

            if ($checkRes == 0) {
                // $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
                // $statement = $connect->prepare($sql1);
                // $statement->execute();
                $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','yellow','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:pageData.php?pId=$permissionPage");
            }
        }
    }



    if (isset($_REQUEST['userId'])) {
        $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
        $checkRes = $checkPerType->fetchColumn();
        $userId = $_REQUEST['userId'];
        $color = "green";
        $totalUser = count($userId);
        if ($checkRes != 0) {
            $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
            $statement = $connect->prepare($sql1);
            $statement->execute();
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];
                    $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                    $stmt = $connect->prepare($updateQuery);
                    $stmt->execute();
                }
            }
            $_SESSION['success'] = "Permission Given successfully..";
            header("Location:pageData.php?pId=$permissionPage");
        }
        if ($checkRes == 0) {
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];

                    $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = '$user_id'");
                    $checkRes = $checkPerType->fetchColumn();
                    if ($checkRes != 0) {
                        $updateQuery = "UPDATE pagepermissions SET userId = '$user_id',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                        $statement_editor = $connect->prepare($updateQuery);
                        $statement_editor->execute();
                    }
                    if ($checkRes == 0) {
                        $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                        $stmt = $connect->prepare($updateQuery);
                        $stmt->execute();
                    }
                }
            }
        }
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:pageData.php?pId=$permissionPage");
    }
}

if (isset($_REQUEST['permissionBtnDashboard'])) {
    $permissionPage = $_REQUEST['permissionPage'];
    $permissionType = $_REQUEST['permissionType'];
    $permissionCategory = $_REQUEST['permissionCategory'];
    $userId = $_REQUEST['userId'];

    if ($permissionType == 'None') {
        $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
        $statement = $connect->prepare($sql1);
        $statement->execute();
        $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','None','blue','$permissionCategory')";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:dashboard_library.php");
    }

    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'Everyone') {
            $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE pagepermissions SET userId = '$permissionType',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:dashboard_library.php");
            }

            if ($checkRes == 0) {
                $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
                $statement = $connect->prepare($sql1);
                $statement->execute();
                $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','blue','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:dashboard_library.php");
            }
        }
    }

    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'All instructor') {
            $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE pagepermissions SET userId = '$permissionType',permissionType = '$permissionCategory',color = 'yellow' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:dashboard_library.php");
            }

            if ($checkRes == 0) {
                // $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
                // $statement = $connect->prepare($sql1);
                // $statement->execute();
                $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','yellow','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:dashboard_library.php");
            }
        }
    }



    if (isset($_REQUEST['userId'])) {
        $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
        $checkRes = $checkPerType->fetchColumn();
        $userId = $_REQUEST['userId'];
        $color = "green";
        $totalUser = count($userId);
        if ($checkRes != 0) {
            $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
            $statement = $connect->prepare($sql1);
            $statement->execute();
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];
                    $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                    $stmt = $connect->prepare($updateQuery);
                    $stmt->execute();
                }
            }
            $_SESSION['success'] = "Permission Given successfully..";
            header("Location:dashboard_library.php");
        }
        if ($checkRes == 0) {
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];

                    $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = '$user_id'");
                    $checkRes = $checkPerType->fetchColumn();
                    if ($checkRes != 0) {
                        $updateQuery = "UPDATE pagepermissions SET userId = '$user_id',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                        $statement_editor = $connect->prepare($updateQuery);
                        $statement_editor->execute();
                    }
                    if ($checkRes == 0) {
                        $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                        $stmt = $connect->prepare($updateQuery);
                        $stmt->execute();
                    }
                }
            }
        }
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:dashboard_library.php");
    }
}

if (isset($_REQUEST['permissionBtnAllDetail'])) {
    $permissionPage = $_REQUEST['permissionPageID'];
    $permissionType = $_REQUEST['permissionType'];
    $permissionCategory = $_REQUEST['permissionCategory'];

    $userId = $_REQUEST['userId'];

    if ($permissionType == 'None') {
        $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
        $statement = $connect->prepare($sql1);
        $statement->execute();
        $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','None','blue','$permissionCategory')";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:alldetails.php");
    }

    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'Everyone') {
            $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE pagepermissions SET userId = '$permissionType',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:alldetails.php");
            }

            if ($checkRes == 0) {
                $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
                $statement = $connect->prepare($sql1);
                $statement->execute();
                $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','blue','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:alldetails.php");
            }
        }
    }
    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'All instructor') {
            $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE pagepermissions SET userId = '$permissionType',permissionType = '$permissionCategory',color = 'yellow' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:alldetails.php");
            }

            if ($checkRes == 0) {
                // $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
                // $statement = $connect->prepare($sql1);
                // $statement->execute();
                $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','yellow','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:alldetails.php");
            }
        }
    }



    if (isset($_REQUEST['userId'])) {
        $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
        $checkRes = $checkPerType->fetchColumn();
        $userId = $_REQUEST['userId'];
        $color = "green";
        $totalUser = count($userId);
        if ($checkRes != 0) {
            $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
            $statement = $connect->prepare($sql1);
            $statement->execute();
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];
                    $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                    $stmt = $connect->prepare($updateQuery);
                    $stmt->execute();
                }
            }
            $_SESSION['success'] = "Permission Given successfully..";
            header("Location:alldetails.php");
        }
        if ($checkRes == 0) {
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];

                    $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = '$user_id'");
                    $checkRes = $checkPerType->fetchColumn();
                    if ($checkRes != 0) {
                        $updateQuery = "UPDATE pagepermissions SET userId = '$user_id',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                        $statement_editor = $connect->prepare($updateQuery);
                        $statement_editor->execute();
                    }
                    if ($checkRes == 0) {
                        $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                        $stmt = $connect->prepare($updateQuery);
                        $stmt->execute();
                    }
                }
            }
        }
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:alldetails.php");
    }
}

if (isset($_REQUEST['permissionBtnFileManager'])) {
    $permissionPage = $_REQUEST['permissionPageID'];
    $permissionType = $_REQUEST['permissionType'];
    if (isset($_REQUEST['userId'])) {
        $userId = $_REQUEST['userId'];
        $totalUser = count($userId);
        $color = "green";
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $query = "INSERT INTO pagepermissionsfm (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$user_id','$color')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:../includes/Pages/file_management.php");
            }
        }
    } else {
        if ($permissionType == "All instructor") {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $query = "INSERT INTO pagepermissionsfm (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$permissionType','$color')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:../includes/Pages/file_management.php");
    }
}

if (isset($_REQUEST['filePermissionBtnDetails'])) {
    $permissionPage = $_REQUEST['permissionPageID'];
    $permissionType = $_REQUEST['permissionType'];
    if (isset($_REQUEST['userId'])) {
        $userId = $_REQUEST['userId'];
        $totalUser = count($userId);
        $color = "green";
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$user_id','$color')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:alldetails.php");
            }
        }
    } else {
        if ($permissionType == "All instructor") {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$permissionType','$color')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:alldetails.php");
    }
}

if (isset($_REQUEST['userFilePermissionBtnDashboard'])) {
    $permissionPage = $_REQUEST['permissionPageID'];
    $permissionType = $_REQUEST['permissionType'];
    if (isset($_REQUEST['userId'])) {
        $userId = $_REQUEST['userId'];
        $totalUser = count($userId);
        $color = "green";
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$user_id','$color')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:dashboard_library.php");
            }
        }
    } else {
        if ($permissionType == "All instructor") {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$permissionType','$color')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:dashboard_library.php");
    }
}

if (isset($_REQUEST['userPagePermissionBtnDashboard'])) {
    $permissionPage = $_REQUEST['permissionPageID'];
    $permissionType = $_REQUEST['permissionType'];
    if (isset($_REQUEST['userId'])) {
        $userId = $_REQUEST['userId'];
        $totalUser = count($userId);
        $color = "green";
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $query = "INSERT INTO pagepermissions (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$user_id','$color')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:dashboard_library.php");
            }
        }
    } else {
        if ($permissionType == "All instructor") {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $query = "INSERT INTO pagepermissions (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$permissionType','$color')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:dashboard_library.php");
    }
}

if (isset($_REQUEST['adminFilePermissionBtnDashboard'])) {
    $permissionPage = $_REQUEST['permissionPageID'];
    $permissionType = $_REQUEST['permissionType'];
    if (isset($_REQUEST['userId'])) {
        $userId = $_REQUEST['userId'];
        $totalUser = count($userId);
        $color = "green";
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $query = "INSERT INTO filepermissionsfm (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$user_id','$color')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:dashboard_library.php");
            }
        }
    } else {
        if ($permissionType == "All instructor") {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $query = "INSERT INTO filepermissionsfm (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$permissionType','$color')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:dashboard_library.php");
    }
}

if (isset($_REQUEST['adminPagePermissionBtnDashboard'])) {
    $permissionPage = $_REQUEST['permissionPageID'];
    $permissionType = $_REQUEST['permissionType'];
    if (isset($_REQUEST['userId'])) {
        $userId = $_REQUEST['userId'];
        $totalUser = count($userId);
        $color = "green";
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $query = "INSERT INTO pagepermissionsfm (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$user_id','$color')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:dashboard_library.php");
            }
        }
    } else {
        if ($permissionType == "All instructor") {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $query = "INSERT INTO pagepermissionsfm (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$permissionType','$color')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:dashboard_library.php");
    }
}


if (isset($_REQUEST['pagePermissionBtnDetails'])) {
    $permissionPage = $_REQUEST['permissionPageID'];
    $permissionType = $_REQUEST['permissionType'];
    if (isset($_REQUEST['userId'])) {
        $userId = $_REQUEST['userId'];
        $totalUser = count($userId);
        $color = "green";
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $query = "INSERT INTO pagepermissions (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$user_id','$color')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:alldetails.php");
            }
        }
    } else {
        if ($permissionType == "All instructor") {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $query = "INSERT INTO pagepermissions (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$permissionType','$color')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:alldetails.php");
    }
}
if (isset($_REQUEST['adminFilePermissionBtn'])) {
    $permissionPage = $_REQUEST['permissionPage'];
    $permissionType = $_REQUEST['permissionType'];
    if (isset($_REQUEST['userId'])) {
        $userId = $_REQUEST['userId'];
        $totalUser = count($userId);
        $color = "green";
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $query = "INSERT INTO filepermissionsfm (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$user_id','$color')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:../includes/Pages/fheader1.php");
            }
        }
    } else {
        if ($permissionType == "All instructor") {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $query = "INSERT INTO filepermissionsfm (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$permissionType','$color')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:../includes/Pages/fheader1.php");
    }
}

if (isset($_REQUEST['filePermissionBtn'])) {
    $permissionPage = $_REQUEST['permissionPage'];
    $permissionType = $_REQUEST['permissionType'];
    $permissionCategory = $_REQUEST['permissionCategory'];

    $userId = $_REQUEST['userId'];

    if ($permissionType == 'None') {
        $sql1 = "DELETE FROM filepermissions WHERE pageId='$permissionPage'";
        $statement = $connect->prepare($sql1);
        $statement->execute();
        $updateQuery = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','None','blue','$permissionCategory')";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:userUrlPage.php?linkId=$permissionPage");
    }

    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'Everyone') {
            $checkPerType = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE filepermissions SET userId = '$permissionType',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:userUrlPage.php?linkId=$permissionPage");
            }

            if ($checkRes == 0) {
                $sql1 = "DELETE FROM filepermissions WHERE pageId='$permissionPage'";
                $statement = $connect->prepare($sql1);
                $statement->execute();
                $updateQuery = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','blue','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:userUrlPage.php?linkId=$permissionPage");
            }
        }
    }

    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'All instructor') {
            $checkPerType = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE filepermissions SET userId = '$permissionType',permissionType = '$permissionCategory',color = 'yellow' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:userUrlPage.php?linkId=$permissionPage");
            }

            if ($checkRes == 0) {
                // $sql1 = "DELETE FROM filepermissions WHERE pageId='$permissionPage'";
                // $statement = $connect->prepare($sql1);
                // $statement->execute();
                $updateQuery = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','yellow','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:userUrlPage.php?linkId=$permissionPage");
            }
        }
    }



    if (isset($_REQUEST['userId'])) {
        $checkPerType = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
        $checkRes = $checkPerType->fetchColumn();
        $userId = $_REQUEST['userId'];
        $color = "green";
        $totalUser = count($userId);
        if ($checkRes != 0) {
            $sql1 = "DELETE FROM filepermissions WHERE pageId='$permissionPage'";
            $statement = $connect->prepare($sql1);
            $statement->execute();
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];
                    $updateQuery = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                    $stmt = $connect->prepare($updateQuery);
                    $stmt->execute();
                }
            }
            $_SESSION['success'] = "Permission Given successfully..";
            header("Location:userUrlPage.php?linkId=$permissionPage");
        }
        if ($checkRes == 0) {
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];

                    $checkPerType = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$permissionPage' AND userId = '$user_id'");
                    $checkRes = $checkPerType->fetchColumn();
                    if ($checkRes != 0) {
                        $updateQuery = "UPDATE filepermissions SET userId = '$user_id',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                        $statement_editor = $connect->prepare($updateQuery);
                        $statement_editor->execute();
                    }
                    if ($checkRes == 0) {
                        $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                        $stmt = $connect->prepare($query);
                        $stmt->execute();
                    }
                }
            }
        }
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:userUrlPage.php?linkId=$permissionPage");
    }
}

if (isset($_REQUEST['filePermissionBtnDashboard'])) {
    $permissionPage = $_REQUEST['permissionPage'];
    $permissionType = $_REQUEST['permissionType'];
    $permissionCategory = $_REQUEST['permissionCategory'];

    $userId = $_REQUEST['userId'];

    if ($permissionType == 'None') {
        $sql1 = "DELETE FROM filepermissions WHERE pageId='$permissionPage'";
        $statement = $connect->prepare($sql1);
        $statement->execute();
        $updateQuery = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','None','blue','$permissionCategory')";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:dashboard_library.php");
    }

    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'Everyone') {
            $checkPerType = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE filepermissions SET userId = '$permissionType',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:dashboard_library.php");
            }

            if ($checkRes == 0) {
                $sql1 = "DELETE FROM filepermissions WHERE pageId='$permissionPage'";
                $statement = $connect->prepare($sql1);
                $statement->execute();
                $updateQuery = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','blue','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:dashboard_library.php");
            }
        }
    }

    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'All instructor') {
            $checkPerType = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE filepermissions SET userId = '$permissionType',permissionType = '$permissionCategory',color = 'yellow' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:dashboard_library.php");
            }

            if ($checkRes == 0) {
                // $sql1 = "DELETE FROM filepermissions WHERE pageId='$permissionPage'";
                // $statement = $connect->prepare($sql1);
                // $statement->execute();
                $updateQuery = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','yellow','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:dashboard_library.php");
            }
        }
    }



    if (isset($_REQUEST['userId'])) {
        $checkPerType = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
        $checkRes = $checkPerType->fetchColumn();
        $userId = $_REQUEST['userId'];
        $color = "green";
        $totalUser = count($userId);
        if ($checkRes != 0) {
            $sql1 = "DELETE FROM filepermissions WHERE pageId='$permissionPage'";
            $statement = $connect->prepare($sql1);
            $statement->execute();
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];
                    $updateQuery = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                    $stmt = $connect->prepare($updateQuery);
                    $stmt->execute();
                }
            }
            $_SESSION['success'] = "Permission Given successfully..";
            header("Location:dashboard_library.php");
        }

        if ($checkRes == 0) {
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];

                    $checkPerType = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$permissionPage' AND userId = '$user_id'");
                    $checkRes = $checkPerType->fetchColumn();
                    if ($checkRes != 0) {
                        $updateQuery = "UPDATE filepermissions SET userId = '$user_id',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                        $statement_editor = $connect->prepare($updateQuery);
                        $statement_editor->execute();
                    }
                    if ($checkRes == 0) {
                        $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                        $stmt = $connect->prepare($query);
                        $stmt->execute();
                    }
                }
            }
        }
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:dashboard_library.php");
    }
}

if (isset($_REQUEST['filePermissionBtnAllDetail'])) {
    $permissionPage = $_REQUEST['permissionPageID'];
    $permissionType = $_REQUEST['permissionType'];
    $permissionCategory = $_REQUEST['permissionCategory'];

    // echo $permissionCategory."<br>";
    // echo $permissionType."<br>";
    // echo $permissionPage."<br>";
    // die();

    $userId = $_REQUEST['userId'];

    if ($permissionType == 'None') {
        $sql1 = "DELETE FROM filepermissions WHERE pageId='$permissionPage'";
        $statement = $connect->prepare($sql1);
        $statement->execute();
        $updateQuery = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','None','blue','$permissionCategory')";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:alldetails.php");
    }

    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'Everyone') {
            $checkPerType = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE filepermissions SET userId = '$permissionType',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:alldetails.php");
            }

            if ($checkRes == 0) {
                $sql1 = "DELETE FROM filepermissions WHERE pageId='$permissionPage'";
                $statement = $connect->prepare($sql1);
                $statement->execute();
                $updateQuery = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','blue','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:alldetails.php");
            }
        }
    }

    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'All instructor') {
            $checkPerType = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE filepermissions SET userId = '$permissionType',permissionType = '$permissionCategory'color = 'yellow' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:alldetails.php");
            }

            if ($checkRes == 0) {
                // $sql1 = "DELETE FROM filepermissions WHERE pageId='$permissionPage'";
                // $statement = $connect->prepare($sql1);
                // $statement->execute();
                $updateQuery = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','yellow','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:alldetails.php");
            }
        }
    }



    if (isset($_REQUEST['userId'])) {
        $checkPerType = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
        $checkRes = $checkPerType->fetchColumn();
        $userId = $_REQUEST['userId'];
        $color = "green";
        $totalUser = count($userId);
        if ($checkRes != 0) {
            $sql1 = "DELETE FROM filepermissions WHERE pageId='$permissionPage'";
            $statement = $connect->prepare($sql1);
            $statement->execute();
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];
                    $updateQuery = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                    $stmt = $connect->prepare($updateQuery);
                    $stmt->execute();
                }
            }
            $_SESSION['success'] = "Permission Given successfully..";
            header("Location:alldetails.php");
        }

        if ($checkRes == 0) {
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];

                    $checkPerType = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$permissionPage' AND userId = '$user_id'");
                    $checkRes = $checkPerType->fetchColumn();
                    if ($checkRes != 0) {
                        $updateQuery = "UPDATE filepermissions SET userId = '$user_id',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                        $statement_editor = $connect->prepare($updateQuery);
                        $statement_editor->execute();
                    }
                    if ($checkRes == 0) {
                        $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                        $stmt = $connect->prepare($query);
                        $stmt->execute();
                    }
                }
            }
        }
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:alldetails.php");
    }
}

if (isset($_REQUEST['permissionBtnFileManagerlibrary'])) {
    $permissionPage = $_REQUEST['permissionPageID'];
    $permissionType = $_REQUEST['permissionType'];
    if (isset($_REQUEST['userId'])) {
        $userId = $_REQUEST['userId'];
        $totalUser = count($userId);
        $color = "green";
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $query = "INSERT INTO pagepermissionsfm (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$user_id','$color')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:file_management.php");
            }
        }
    } else {
        if ($permissionType == "All instructor") {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $query = "INSERT INTO pagepermissionsfm (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$permissionType','$color')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:file_management.php");
    }
}

if (isset($_REQUEST['permissionBtnFileManageradmin'])) {

    $permissionPage = $_REQUEST['permissionPageIDAdmin'];
    $permissionType = $_REQUEST['permissionType'];
    $permissionCategory = $_REQUEST['permissionCategory'];
    $userId = $_REQUEST['userId'];

    if ($permissionType == 'None') {
        $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
        $statement = $connect->prepare($sql1);
        $statement->execute();
        $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','None','blue','$permissionCategory')";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:file_management.php");
    }

    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'Everyone') {
            $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE pagepermissions SET userId = '$permissionType',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:file_management.php");
            }

            if ($checkRes == 0) {
                $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
                $statement = $connect->prepare($sql1);
                $statement->execute();
                $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','blue','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:file_management.php");
            }
        }
    }
    if (!(isset($_REQUEST['userId']))) {
        if ($permissionType == 'All instructor') {
            $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
            $checkRes = $checkPerType->fetchColumn();
            if ($checkRes != 0) {
                $updateQuery = "UPDATE pagepermissions SET userId = '$permissionType',permissionType = '$permissionCategory',color = 'yellow' WHERE pageId = '$permissionPage'";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:file_management.php");
            }

            if ($checkRes == 0) {
                // $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
                // $statement = $connect->prepare($sql1);
                // $statement->execute();
                $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$permissionType','yellow','$permissionCategory')";
                $statement_editor = $connect->prepare($updateQuery);
                $statement_editor->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:file_management.php");
            }
        }
    }



    if (isset($_REQUEST['userId'])) {
        $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = 'Everyone'");
        $checkRes = $checkPerType->fetchColumn();
        $userId = $_REQUEST['userId'];
        $color = "green";
        $totalUser = count($userId);
        if ($checkRes != 0) {
            $sql1 = "DELETE FROM pagepermissions WHERE pageId='$permissionPage'";
            $statement = $connect->prepare($sql1);
            $statement->execute();
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $userId[$i];
                    $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                    $stmt = $connect->prepare($updateQuery);
                    $stmt->execute();
                }
            }
            $_SESSION['success'] = "Permission Given successfully..";
            header("Location:file_management.php");
        }
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $checkPerType = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$permissionPage' AND userId = '$user_id'");
                $checkRes = $checkPerType->fetchColumn();
                if ($checkRes != 0) {
                    $updateQuery = "UPDATE pagepermissions SET userId = '$user_id',permissionType = '$permissionCategory' WHERE pageId = '$permissionPage'";
                    $statement_editor = $connect->prepare($updateQuery);
                    $statement_editor->execute();
                }
                if ($checkRes == 0) {
                    $updateQuery = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES('$permissionPage','$loginUserId','$user_id','$color','$permissionCategory')";
                    $stmt = $connect->prepare($updateQuery);
                    $stmt->execute();
                }
            }
        }
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:file_management.php");
    }
}

if (isset($_REQUEST['permissionBtnFileManagerAdminLibrary'])) {
    $permissionPage = $_REQUEST['permissionPageIDAdmin'];
    $permissionType = $_REQUEST['permissionType'];

    if (isset($_REQUEST['userId'])) {
        $userId = $_REQUEST['userId'];
        $totalUser = count($userId);
        $color = "green";
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $query = "INSERT INTO pagepermissions (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$user_id','$color')";
                $stmt->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:file_management.php");
            }
        }
    } else {
        if ($permissionType == "All instructor") {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $query = "INSERT INTO pagepermissions (pageId,permissionId,userId,color) VALUES ('$permissionPage','$loginUserId','$permissionType','$color')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:file_management.php");
    }
}
