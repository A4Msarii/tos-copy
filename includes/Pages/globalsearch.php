<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

$user_id = $_GET['search_user_id'];
$search_data = $_GET['search_data'];

$user_role = "SELECT * FROM `users` WHERE id=$user_id";
$user_role_fech = $connect->prepare($user_role);
$user_role_fech->execute();
$role = $user_role_fech->fetch();

if ($role['role'] == 'super admin') {
    $all_data = "SELECT *
    FROM user_files
    WHERE user_files.filename LIKE '%" . $search_data . "%' 
    OR user_files.lastName LIKE '%" . $search_data . "%'";

    $file_fetch_st2 = $connect->prepare($all_data);
    $file_fetch_st2->execute();
    $data = $file_fetch_st2->fetchAll();

    // briefcase searching
    $briefcas = "SELECT *
    FROM user_briefcase
    WHERE user_briefcase.briefcase_name LIKE '%" . $search_data . "%'";
    $briefcas_data = $connect->prepare($briefcas);
    $briefcas_data->execute();
    $briefcas_data1 = $briefcas_data->fetchAll();

    // folder searching
    $folder = "SELECT *
    FROM folders
    WHERE folders.folder LIKE '%" . $search_data . "%'";
    $folder_data = $connect->prepare($folder);
    $folder_data->execute();
    $folder_data1 = $folder_data->fetchAll();

    // pages searching
    $pages = "SELECT *
    FROM editor_data
    WHERE editor_data.pageName LIKE '%" . $search_data . "%'";
    $pages_data = $connect->prepare($pages);
    $pages_data->execute();
    $pages_data1 = $pages_data->fetchAll();
} else {
    $all_data = "SELECT filepermissions.*,user_files.*
    FROM user_files 
    LEFT JOIN filepermissions on user_files.id=filepermissions.pageId
    WHERE user_files.user_id = $user_id OR filepermissions.userId='Everyone'
    AND user_files.filename LIKE '%" . $search_data . "%'
    OR user_files.lastName LIKE '%" . $search_data . "%'";

    $file_fetch_st2 = $connect->prepare($all_data);
    $file_fetch_st2->execute();
    $data = $file_fetch_st2->fetchAll();

    // briefcase searching
    $briefcas = "SELECT *
     FROM user_briefcase
     WHERE user_briefcase.user_id=$user_id AND user_briefcase.briefcase_name LIKE '%" . $search_data . "%'";
    $briefcas_data = $connect->prepare($briefcas);
    $briefcas_data->execute();
    $briefcas_data1 = $briefcas_data->fetchAll();

    // pages searching
    $pages = "SELECT pagepermissions.*,editor_data.*
    FROM editor_data 
    LEFT JOIN pagepermissions on editor_data.id=pagepermissions.pageId
    WHERE editor_data.userId = $user_id OR pagepermissions.userId='Everyone'
    AND editor_data.pageName LIKE '%" . $search_data . "%'";
    $pages_data = $connect->prepare($pages);
    $pages_data->execute();
    $pages_data1 = $pages_data->fetchAll();

    // folder search
    $folder = "SELECT user_files.*,folders.*
    FROM folders
    LEFT JOIN user_files on folders.id=user_files.folderId
    WHERE user_files.user_id=$user_id AND folders.folder LIKE '%" . $search_data . "%'";
    $folder_data = $connect->prepare($folder);
    $folder_data->execute();
    $folder_data1 = $folder_data->fetchAll();
}


$html = '';
foreach ($data as $dt) {
    if ($dt["type"] == 'docx') {
        $html .= '<a href="#" class="docxLink astyle" name="';
        $html .= $dt["filename"];
        $html .= '"value="';
        $html .= $dt["type"];
        $html .= '"><li style="margin:5px; list-style-type:none;"  class="got_result_link nav-link" name="">';
        $html .= '<img src="';
        $html .= BASE_URL . 'assets/approved/docs.png';
        $html .= '" alt="" style="height:30px;width:30px">&nbsp;';
        $html .=  $dt["filename"];
        $html .= '</li></a>';
    } elseif ($dt["type"] == 'xlsx') {
        $html .= '<a href="#" class="docxLink astyle" name="';
        $html .= $dt["filename"];
        $html .= '"value="';
        $html .= $dt["type"];
        $html .= '"><li style="margin:5px; list-style-type:none;"  class="got_result_link nav-link" name="">';
        $html .= '<img src="';
        $html .= BASE_URL . 'assets/approved/xls.png';
        $html .= '" alt="" style="height:30px;width:30px">&nbsp;';
        $html .=  $dt["filename"];
        $html .= '</li></a>';
    } elseif ($dt["type"] == 'pptx') {
        $html .= '<a href="#" class="docxLink astyle" name="';
        $html .= $dt["filename"];
        $html .= '"value="';
        $html .= $dt["type"];
        $html .= '"><li style="margin:5px; list-style-type:none;"  class="got_result_link nav-link" name="">';
        $html .= '<img src="';
        $html .= BASE_URL . 'assets/approved/ppt.png';
        $html .= '" alt="" style="height:30px;width:30px">&nbsp;';
        $html .=  $dt["filename"];
        $html .= '</li></a>';
    } elseif ($dt["type"] == 'offline') {
        $html .= '<a href="#" class="offline astyle" value="';
        $html .= $dt["filename"];
        $html .= '" target="_blank"><li style="margin:5px; list-style-type:none;"  class="got_result_link nav-link" name="">';
        $html .= '<img src="';
        $html .= BASE_URL . 'assets/approved/link.png';
        $html .= '" alt="" style="height:30px;width:30px">&nbsp;';
        $html .=  $dt["lastName"];
        $html .= '</li></a>';
    } elseif ($dt["type"] == 'online') {
        $html .= '<a class="astyle" href="';
        $html .= $dt["filename"];
        $html .= '"target="_blank"><li style="margin:5px; list-style-type:none;"  class="got_result_link nav-link" name="">';
        $html .= '<img src="';
        $html .= BASE_URL . 'assets/approved/link.png';
        $html .= '" alt="" style="height:30px;width:30px">&nbsp;';
        $html .=  $dt["lastName"];
        $html .= '</li></a>';
    } elseif ($dt["type"] == 'pdf') {
        $html .= '<a class="astyle" href="';
        $html .=  BASE_URL;
        $html .= 'includes/Pages/files/';
        $html .= $dt['filename'];
        $html .= '" target="_blank"><li style="margin:5px; list-style-type:none;"  class="got_result_link nav-link" name="">';
        $html .= '<img src="';
        $html .= BASE_URL . 'assets/approved/pdf.png';
        $html .= '" alt="" style="height:30px;width:30px">&nbsp;';
        $html .=  $dt["filename"];
        $html .= '</li></a>';
    } elseif ($dt['type'] == 'png' || $dt['type'] == 'jpg' || $dt['type'] == 'gif' || $dt['type'] == 'jpeg' || $dt['type'] == 'svg' || $dt['type'] == 'bmp') {
        $html .= '<a class="astyle" href="';
        $html .=  BASE_URL;
        $html .= 'includes/Pages/files/';
        $html .= $dt['filename'];
        $html .= '" target="_blank"><li style="margin:5px; list-style-type:none;"  class="got_result_link nav-link" name="">';
        $html .= '<img src="';
        $html .= BASE_URL . 'assets/approved/image.png';
        $html .= '" alt="" style="height:30px;width:30px">&nbsp;';
        $html .=  $dt["filename"];
        $html .= '</li></a>';
    } else {
        $html .= '<a class="astyle" href="';
        $html .=  BASE_URL;
        $html .= 'includes/Pages/files/';
        $html .= $dt['filename'];
        $html .= '" target="_blank"><li style="margin:5px; list-style-type:none;"  class="got_result_link nav-link" name="">';
        $html .= '<img src="';
        $html .= BASE_URL . 'assets/approved/image.png';
        $html .= '" alt="" style="height:30px;width:30px">&nbsp;';
        $html .=  $dt["filename"];
        $html .= '</li></a>';
    }
}

foreach ($briefcas_data1 as $dt) {
    $folder = $dt['folderId'];
    $shop = $dt['shopid'];
    $html .= '<a class="astyle" href="';
    $html .=  BASE_URL;
    $html .= 'includes/Pages/fheader1.php?folder_ID=' . $folder . '&shopId=' . $shop . '';
    $html .= '" target="_blank"><li style="margin:5px; list-style-type:none;"  class="got_result_link nav-link" name="">';
    $html .= '<img src="';
    $html .= BASE_URL . 'assets/approved/briefcase.png';
    $html .= '" alt="" style="height:30px;width:30px">&nbsp;';
    $html .=  $dt["briefcase_name"];
    $html .= '</li></a>';
}
foreach ($pages_data1 as $dt) {
    $id = $dt['id'];
    $html .= '<a class="astyle" href="';
    $html .=  BASE_URL;
    $html .= 'Library/viewpage.php/?id=' . $id;
    $html .= '" target="_blank">';
    $html .= '<li style="margin:10px; list-style-type:none;"  class="got_result_link nav-link" name="">';
    $html .= '<img src="';
    $html .= BASE_URL . 'assets/svg/file/3d_grey/Page.png';
    $html .= '" alt="" style="height:30px;width:30px">&nbsp;';
    $html .=  $dt["pageName"];
    $html .= '</li></a>';
}
foreach ($folder_data1 as $dt) {
    $id = $dt['id'];
    $html .= '<a class="astyle" href="';
    $html .=  BASE_URL;
    $html .= 'includes/Pages/fheader1.php?folder_ID=' . $id;
    $html .= '" target="_blank">';
    $html .= '<li style="margin:10px; list-style-type:none;"  class="got_result_link nav-link" name="">';
    $html .= '<img src="';
    $html .= BASE_URL . 'assets/svg/phase2_grey/folder.png';
    $html .= '" alt="" style="height:25px;width:25px">&nbsp;';
    $html .=  $dt["folder"];
    $html .= '</li></a>';
}

echo $html;
