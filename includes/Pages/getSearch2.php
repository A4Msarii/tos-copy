<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

$searchText = $_POST['search'];
$u_id = $_POST['u_id'];
$fo_id = $_POST['fo_id'];
$base_url = BASE_URL ;
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
        echo '<a href="'. $base_url ."Library/brief_file.php?brief_id=$id&userBriefName=$name".'"><li style="margin:5px; list-style-type:none;" value=' . $id . $userId . ' class="got_result nav-link">' . $name . '</li></a>';
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
        $brifcase_name = $briefCases['briefcase_name'];

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
                if($row_file2['type']=='pdf'){
                    echo '<a href="'. $base_url ."Library/openpdfpagegrid.php?pdfPageName=$name1&fileID=$id1&userBriefName=$brifcase_name".'"><li style="margin:5px; list-style-type:none;" value=' . $id1 . ' class="got_result_link nav-link" name="' . $userbriefId . $u_id . '">' . $name1 . '</li></a>';
                }elseif($row_file2['type']=='offline'){
                    echo '<a class="driveLink1" value="'.$name1.'" href="'. $base_url ."openPageIllu.php".'"><li style="margin:5px; list-style-type:none;" value=' . $id1 . ' class="got_result_link nav-link" name="' . $userbriefId . $u_id . '">' . $name1 . '</li></a>';
                }elseif($row_file2['type']=='online'){
                    echo '<a href="'.$name1.'" target="_blank"><li style="margin:5px; list-style-type:none;" value=' . $id1 . ' class="got_result_link nav-link" name="' . $userbriefId . $u_id . '">' . $name1 . '</li></a>';
                }elseif($row_file2['type']=='docx' || $row_file2['type']=='pptx' || $row_file2['type']=='xlsx'){
                    echo '<a class="docxLink" name="'.$name1.'" value="'.$row_file2['type'].'" href="'. $base_url ."Library/openpdfpagegrid.php?pdfPageName=$name1&fileID=$id1&briefName=$brifcase_name".'"><li style="margin:5px; list-style-type:none;" value=' . $id1 . ' class="got_result_link nav-link" name="' . $userbriefId . $u_id . '">' . $name1 . '</li></a>';
                }

            }
        }
    }
}












