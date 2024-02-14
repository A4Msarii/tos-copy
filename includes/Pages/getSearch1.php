<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

$searchText = $_POST['search'];
$u_id = $_POST['u_id'];
$fo_id = $_POST['fo_id'];

$briefCaseId = $connect->query("SELECT briefId FROM (
    SELECT briefId FROM user_files
    WHERE (folderId = '$fo_id' AND user_id = '$u_id') OR (role = 'super admin' AND folderId = '$fo_id')
    UNION
    SELECT briefId FROM editor_data
    WHERE (folderId = '$fo_id' AND userId = '$fo_id') OR (userRole = 'super admin' AND folderId = '$fo_id')
) AS uniqueBriefIds");

while ($briefIdData = $briefCaseId->fetch()) {
    $briefCasId = $briefIdData['briefId'];
    $briefCaseName = $connect->query("SELECT * FROM user_briefcase WHERE id = '$briefCasId' AND briefcase_name like '%" . $searchText . "%' order by briefcase_name asc");
    while ($briefCases = $briefCaseName->fetch()) {
        $id = $briefCases['id'];
        $name = $briefCases['briefcase_name'];
        $userId = $briefCases['user_id'];
        echo '<li style="margin:5px; list-style-type:none;" value=' . $id . $userId . ' class="got_result nav-link">' . $name . '</li>';
    }
}

$briefCaseId = $connect->query("SELECT briefId FROM (
    SELECT briefId FROM user_files
    WHERE (folderId = '$fo_id' AND user_id = '$u_id') OR (role = 'super admin' AND folderId = '$fo_id')
    UNION
    SELECT briefId FROM editor_data
    WHERE (folderId = '$fo_id' AND userId = '$u_id') OR (userRole = 'super admin' AND folderId = '$fo_id')
) AS uniqueBriefIds");

while ($briefIdData = $briefCaseId->fetch()) {
    $briefCasId = $briefIdData['briefId'];
    $briefCaseName = $connect->query("SELECT * FROM user_briefcase WHERE id = '$briefCasId'");
    while ($briefCases = $briefCaseName->fetch()) {
        $userbriefId = $briefCases['id'];

        $file_fetch2 = "SELECT * FROM user_files where filename like '%" . $searchText . "%' AND briefId='$userbriefId' AND folderId='$fo_id'";
        $file_fetch_st2 = $connect->prepare($file_fetch2);
        $file_fetch_st2->execute();
        if ($file_fetch_st2->rowCount() > 0) {
            $result_file2 = $file_fetch_st2->fetchAll();
            foreach ($result_file2 as $row_file2) {
                // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                // while ($brefData = $fetchBrief->fetch()) {
                $id1 = $row_file2['id'];
                $name1 = $row_file2['filename'];
                if ($_SESSION['role'] == 'student' && $row_file2['role'] == "super admin") {
                    $filePermission = $connect->query("SELECT count(*) FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$u_id') AND pageId = '$fileID'");
                    $perFileData = $filePermission->fetchColumn();
                    if ($perFileData <= 0) {
                        continue;
                    }
                }
                if ($_SESSION['role'] == 'instructor' && $row_file2['role'] == "super admin") {
                    $filePermission = $connect->query("SELECT count(*) FROM filepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$u_id') AND pageId = '$fileID'");
                    $perFileData = $filePermission->fetchColumn();
                    if ($perFileData <= 0) {
                        continue;
                    }
                }
                $base_url = BASE_URL ;
                if($row_file2['type']=='pdf'){
                    echo '<a href="'. $base_url ."Library/openpdfpage.php?pdfPageName=$name1&fileID=$id1".'"><li style="margin:5px; list-style-type:none;" value=' . $id1 . ' class="got_result_link nav-link" name="' . $userbriefId . $u_id . '">' . $name1 . '</li></a>';
                }elseif($row_file2['type']=='offline'){
                    echo '<a class="driveLink1" value="'.$name1.'" href="'. $base_url ."Library/openpdfpage.php?pdfPageName=$name1&fileID=$id1".'"><li style="margin:5px; list-style-type:none;" value=' . $id1 . ' class="got_result_link nav-link" name="' . $userbriefId . $u_id . '">' . $name1 . '</li></a>';
                }elseif($row_file2['type']=='online'){
                    echo '<a href="'.$name1.'" target="_blank"><li style="margin:5px; list-style-type:none;" value=' . $id1 . ' class="got_result_link nav-link" name="' . $userbriefId . $u_id . '">' . $name1 . '</li></a>';
                }elseif($row_file2['type']=='docx' || $row_file2['type']=='pptx' || $row_file2['type']=='xlsx'){
                    echo '<a class="docxLink" name="'.$name1.'" value="'.$row_file2['type'].'" href="'. $base_url ."Library/openpdfpage.php?pdfPageName=$name1&fileID=$id1".'"><li style="margin:5px; list-style-type:none;" value=' . $id1 . ' class="got_result_link nav-link" name="' . $userbriefId . $u_id . '">' . $name1 . '</li></a>';
                }

            }
        }

        $file_fetch12 = "SELECT * FROM editor_data WHERE pageName like '%" . $searchText . "%' AND briefId='$userbriefId' AND folderId='$fo_id'";
        $file_fetch_st12 = $connect->prepare($file_fetch12);
        $file_fetch_st12->execute();
        if ($file_fetch_st12->rowCount() > 0) {
            $result_file12 = $file_fetch_st12->fetchAll();
            foreach ($result_file12 as $row_file12) {
                $id3 = $row_file12['id'];
                $name3 = $row_file12['pageName'];
                $breifId = $row_file12['id'];
                if ($_SESSION['role'] == 'student' && $row_file12['userRole'] == "super admin") {
                    $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$u_id') AND pageId = '$breifId'");
                    $perFileData = $filePermission->fetchColumn();
                    if ($perFileData <= 0) {
                        continue;
                    }
                }
                if ($_SESSION['role'] == 'instructor' && $row_file12['userRole'] == "super admin") {
                    $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$u_id') AND pageId = '$breifId'");
                    $perFileData = $filePermission->fetchColumn();
                    if ($perFileData <= 0) {
                        continue;
                    }
                }

                echo '<li style="margin:5px; list-style-type:none; " value=' . $id3 . ' class="got_result_user_page nav-link" name="' . $userbriefId . $u_id . '">' . $name3 . '</li>';
            }
        }
    }
}

$emptyBriefCase = $connect->query("SELECT * FROM user_briefcase WHERE briefcase_name like '%" . $searchText . "%' AND ((folderId = '$fo_id' AND      user_id = '$u_id') OR (role = 'super admin' AND folderId = '$fo_id')) AND id NOT IN (SELECT briefId FROM user_files UNION SELECT briefId FROM editor_data)");
while ($emptyData = $emptyBriefCase->fetch()) {
    $id = $emptyData['id'];
    $name = $emptyData['briefcase_name'];
    $userId = $emptyData['user_id'];
    echo '<li style="margin:5px; list-style-type:none;" value=' . $id . $userId . ' class="got_result nav-link">' . $name . '</li>';
}


$briefIdArray = array();
$briefI = 0;
if ($_SESSION['role'] == 'student') {
    $permissionPageId = $connect->query("SELECT * FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$u_id') AND permissionId != '$u_id'");
}
if ($_SESSION['role'] == 'instructor') {
    $permissionPageId = $connect->query("SELECT * FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$u_id' OR userId = 'All instructor') AND permissionId != '$u_id'");
}
if ($_SESSION['role'] == 'super admin') {
    $permissionPageId = $connect->query("SELECT * FROM pagepermissions WHERE permissionId != '$u_id'");
}
while ($perId = $permissionPageId->fetch()) {
    $pageId = $perId['pageId'];
    $pagePermission = $connect->query("SELECT DISTINCT briefId
                                            FROM editor_data
                                            WHERE id = '$pageId'");
    while ($perBriefName = $pagePermission->fetch()) {
        if (!in_array($perBriefName['briefId'], $briefIdArray)) {
            $briefIdArray[$briefI] = $perBriefName['briefId'];
            $briefI++;
        }
    }
}
if ($_SESSION['role'] == 'student') {
    $permissionFileId = $connect->query("SELECT * FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$u_id') AND permissionId != '$u_id'");
}
if ($_SESSION['role'] == 'instructor') {
    $permissionFileId = $connect->query("SELECT * FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$u_id' OR userId = 'All instructor') AND permissionId != '$u_id'");
}
if ($_SESSION['role'] == 'super admin') {
    $permissionFileId = $connect->query("SELECT * FROM filepermissions WHERE permissionId != '$u_id'");
}

while ($perId = $permissionFileId->fetch()) {
    $pageId = $perId['pageId'];
    $filePermission = $connect->query("SELECT DISTINCT briefId
                                            FROM user_files
                                            WHERE id = '$pageId'");
    while ($perBriefName = $filePermission->fetch()) {
        if (!in_array($perBriefName['briefId'], $briefIdArray)) {
            $briefIdArray[$briefI] = $perBriefName['briefId'];
            $briefI++;
        }
    }
}
$briefCount = 0;
while ($briefI > 0) {
    $perBriefId = $briefIdArray[$briefCount];
    $perBrief = $connect->query("SELECT * FROM user_briefcase WHERE briefcase_name like '%" . $searchText . "%' AND id = '$perBriefId' AND role != 'super admin' AND user_id != '$u_id'");
    while ($perBriefData = $perBrief->fetch()) {
        $id = $perBriefData['id'];
        $name = $perBriefData['briefcase_name'];
        $userId = $perBriefData['user_id'];
        echo '<li style="margin:5px; list-style-type:none;" value=' . $id . $userId . ' class="got_result nav-link">' . $name . '</li>';
    }
    $briefCount++;
    $briefI--;
}


$briefIdArray = array();
$briefI = 0;
if ($_SESSION['role'] == 'student') {
    $permissionPageId = $connect->query("SELECT * FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$u_id') AND permissionId != '$u_id'");
}
if ($_SESSION['role'] == 'instructor') {
    $permissionPageId = $connect->query("SELECT * FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$u_id' OR userId = 'All instructor') AND permissionId != '$u_id'");
}
if ($_SESSION['role'] == 'super admin') {
    $permissionPageId = $connect->query("SELECT * FROM pagepermissions WHERE permissionId != '$u_id'");
}
while ($perId = $permissionPageId->fetch()) {
    $pageId = $perId['pageId'];
    $pagePermission = $connect->query("SELECT DISTINCT briefId
                                            FROM editor_data
                                            WHERE id = '$pageId'");
    while ($perBriefName = $pagePermission->fetch()) {
        if (!in_array($perBriefName['briefId'], $briefIdArray)) {
            $briefIdArray[$briefI] = $perBriefName['briefId'];
            $briefI++;
        }
    }
}
if ($_SESSION['role'] == 'student') {
    $permissionFileId = $connect->query("SELECT * FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$u_id') AND permissionId != '$u_id'");
}
if ($_SESSION['role'] == 'instructor') {
    $permissionFileId = $connect->query("SELECT * FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$u_id' OR userId = 'All instructor') AND permissionId != '$u_id'");
}
if ($_SESSION['role'] == 'super admin') {
    $permissionFileId = $connect->query("SELECT * FROM filepermissions WHERE permissionId != '$u_id'");
}

while ($perId = $permissionFileId->fetch()) {
    $pageId = $perId['pageId'];
    $filePermission = $connect->query("SELECT DISTINCT briefId
                                            FROM user_files
                                            WHERE id = '$pageId'");
    while ($perBriefName = $filePermission->fetch()) {
        if (!in_array($perBriefName['briefId'], $briefIdArray)) {
            $briefIdArray[$briefI] = $perBriefName['briefId'];
            $briefI++;
        }
    }
}
$briefCount = 0;
while ($briefI > 0) {
    $perBriefId = $briefIdArray[$briefCount];
    $perBrief = $connect->query("SELECT * FROM user_briefcase WHERE id = '$perBriefId' AND role != 'super admin' AND user_id != '$u_id'");
    while ($perBriefData = $perBrief->fetch()) {
        $briefPerId = $perBriefData['id'];
        $file_fetch2 = "SELECT * FROM user_files WHERE filename like '%" . $searchText . "%' AND briefId='$briefPerId' and folderId='$fo_id'";
        $file_fetch_st2 = $connect->prepare($file_fetch2);
        $file_fetch_st2->execute();
        if ($file_fetch_st2->rowCount() > 0) {
            $result_file2 = $file_fetch_st2->fetchAll();
            foreach ($result_file2 as $row_file2) {
                $id1 = $row_file2['id'];
                $name1 = $row_file2['filename'];
                $userId = $row_file2['user_id'];
                echo '<li style="margin:5px; list-style-type:none;" value=' . $id1 . ' class="got_result_link nav-link" name="' . $briefPerId . $userId . '">' . $name1 . '</li>';
            }
        }

        $file_fetch12 = "SELECT * FROM editor_data WHERE pageName like '%" . $searchText . "%' AND briefId='$briefPerId' AND folderId='$fo_id'";
        $file_fetch_st12 = $connect->prepare($file_fetch12);
        $file_fetch_st12->execute();
        if ($file_fetch_st12->rowCount() > 0) {
            $result_file12 = $file_fetch_st12->fetchAll();
            foreach ($result_file12 as $row_file12) {
                $id3 = $row_file12['id'];
                $name3 = $row_file12['pageName'];
                $breifId = $row_file12['id'];
                $userId = $row_file12['userId'];
                if ($_SESSION['role'] == 'student' && $row_file12['userRole'] == "super admin") {
                    $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$u_id') AND pageId = '$breifId'");
                    $perFileData = $filePermission->fetchColumn();
                    if ($perFileData <= 0) {
                        continue;
                    }
                }
                if ($_SESSION['role'] == 'instructor' && $row_file12['userRole'] == "super admin") {
                    $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$u_id') AND pageId = '$breifId'");
                    $perFileData = $filePermission->fetchColumn();
                    if ($perFileData <= 0) {
                        continue;
                    }
                }
                echo '<li style="margin:5px; list-style-type:none; " value=' . $id3 . ' class="got_result_user_page nav-link" name="' . $userbriefId . $userId . '">' . $name3 . '</li>';
            }
        }
    }
    $briefCount++;
    $briefI--;
}


$allitem1_a1 = "SELECT * FROM user_files WHERE filename like '%" . $searchText . "%' AND briefId='0' AND folderId='$fo_id' AND filename like '%" . $searchText . "%' AND (user_id = '$u_id' OR role = 'super admin')";
$statement1_a1 = $connect->prepare($allitem1_a1);
$statement1_a1->execute();
if ($statement1_a1->rowCount() > 0) {
    $result1_a1 = $statement1_a1->fetchAll();

    foreach ($result1_a1 as $row11) {
        $us_id11 = $row11['user_id'];
        $user_names1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
        $user_names1->execute([$us_id11]);
        $name12301 = $user_names1->fetchColumn();
        $id3 = $row11['id'];
        $name3 = $row11['filename'];
        $userId = $row11['user_id'];
        if ($_SESSION['role'] == 'student' && $row_file2['role'] == "super admin") {
            $filePermission = $connect->query("SELECT count(*) FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$u_id') AND pageId = '$fileId'");
            $perFileData = $filePermission->fetchColumn();
            if ($perFileData <= 0) {
                continue;
            }
        }
        if ($_SESSION['role'] == 'instructor' && $row_file2['role'] == "super admin") {
            $filePermission = $connect->query("SELECT count(*) FROM filepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$u_id') AND pageId = '$fileId'");
            $perFileData = $filePermission->fetchColumn();
            if ($perFileData <= 0) {
                continue;
            }
        }

        echo '<li style="margin:5px; list-style-type:none;" value=' . $id3 . ' class="got_result_folderLink nav-link" name="' . $userId . '">' . $name3 . '</li>';
    }
}

$allitem1_a1 = "SELECT * FROM user_files WHERE filename like '%" . $searchText . "%' AND briefId='0' AND folderId='$fo_id' AND (user_id != '$u_id' OR role != 'super admin')";
$statement1_a1 = $connect->prepare($allitem1_a1);
$statement1_a1->execute();
if ($statement1_a1->rowCount() > 0) {
    $result1_a1 = $statement1_a1->fetchAll();

    foreach ($result1_a1 as $row11) {
        $us_id11 = $row11['user_id'];
        $user_names1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
        $user_names1->execute([$us_id11]);
        $name12301 = $user_names1->fetchColumn();
        $id3 = $row11['id'];
        $name3 = $row11['filename'];
        $userId = $row11['user_id'];
        if ($_SESSION['role'] == 'student' && $row_file2['role'] == "super admin") {
            $filePermission = $connect->query("SELECT count(*) FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$u_id') AND pageId = '$fileId'");
            $perFileData = $filePermission->fetchColumn();
            if ($perFileData <= 0) {
                continue;
            }
        }
        if ($_SESSION['role'] == 'instructor' && $row_file2['role'] == "super admin") {
            $filePermission = $connect->query("SELECT count(*) FROM filepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$u_id') AND pageId = '$fileId'");
            $perFileData = $filePermission->fetchColumn();
            if ($perFileData <= 0) {
                continue;
            }
        }

        echo '<li style="margin:5px; list-style-type:none;" value=' . $id3 . ' class="got_result_folderLink nav-link" name="' . $userId . '">' . $name3 . '</li>';
    }
}


$allitem11_a1 = "SELECT * FROM editor_data WHERE pageName like '%" . $searchText . "%' AND briefId='0' AND folderId='$fo_id' AND (userId = '$u_id' OR userRole = 'super admin')";
$statement11_a1 = $connect->prepare($allitem11_a1);
$statement11_a1->execute();
if ($statement11_a1->rowCount() > 0) {
    $result11_a1 = $statement11_a1->fetchAll();

    foreach ($result11_a1 as $row110) {
        $us_id110 = $row110['userId'];
        $id3 = $row110['id'];
        $name3 = $row110['pageName'];
        $user_names10 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
        $user_names10->execute([$us_id110]);
        $name123010 = $user_names10->fetchColumn();
        // $folderPageQuery = $connect->query("SELECT * FROM editor_data WHERE folderId = '$f_id' AND briefId = '0'");
        // while ($folData = $folderPageQuery->fetch()) {
        $circlecolor = '';
        $pageId = $row110['id'];

        if ($_SESSION['role'] == 'student' && $row_file12['userRole'] == "super admin") {
            $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$u_id') AND pageId = '$pageId'");
            $perFileData = $filePermission->fetchColumn();
            if ($perFileData <= 0) {
                continue;
            }
        }
        if ($_SESSION['role'] == 'instructor' && $row_file12['userRole'] == "super admin") {
            $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$u_id') AND pageId = '$pageId'");
            $perFileData = $filePermission->fetchColumn();
            if ($perFileData <= 0) {
                continue;
            }
        }

        echo '<li style="margin:5px; list-style-type:none;" value=' . $id3 . ' class="got_result_folder_page nav-link" name="' . $us_id110 . '">' . $name3 . '</li>';
    }
}

$allitem11_a1 = "SELECT * FROM editor_data WHERE pageName like '%" . $searchText . "%' AND briefId='0' AND folderId='$fo_id' AND (userId != '$u_id' OR userRole != 'super admin')";
$statement11_a1 = $connect->prepare($allitem11_a1);
$statement11_a1->execute();
if ($statement11_a1->rowCount() > 0) {
    $result11_a1 = $statement11_a1->fetchAll();

    foreach ($result11_a1 as $row110) {
        $us_id110 = $row110['userId'];
        $id3 = $row110['id'];
        $name3 = $row110['pageName'];
        $user_names10 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
        $user_names10->execute([$us_id110]);
        $name123010 = $user_names10->fetchColumn();
        // $folderPageQuery = $connect->query("SELECT * FROM editor_data WHERE folderId = '$f_id' AND briefId = '0'");
        // while ($folData = $folderPageQuery->fetch()) {
        $circlecolor = '';
        $pageId = $row110['id'];

        if ($_SESSION['role'] == 'student' && $row_file12['userRole'] == "super admin") {
            $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$u_id') AND pageId = '$pageId'");
            $perFileData = $filePermission->fetchColumn();
            if ($perFileData <= 0) {
                continue;
            }
        }
        if ($_SESSION['role'] == 'instructor' && $row_file12['userRole'] == "super admin") {
            $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$u_id') AND pageId = '$pageId'");
            $perFileData = $filePermission->fetchColumn();
            if ($perFileData <= 0) {
                continue;
            }
        }

        echo '<li style="margin:5px; list-style-type:none;" value=' . $id3 . ' class="got_result_folder_page nav-link" name="' . $us_id110 . '">' . $name3 . '</li>';
    }
}
