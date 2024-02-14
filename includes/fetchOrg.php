<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

$sql = "SELECT * FROM orgchart_data";
$result = $connect->query($sql);

$data = array();


while ($row = $result->fetch()) {
    if ($row['type'] == "department") {
        $depId = $row['departmentName'];
        $depName = $connect->query("SELECT department_name FROM homepage WHERE id = '$depId'");
        $depData = $depName->fetchColumn();
        $depImg = $connect->query("SELECT file_name FROM homepage WHERE id = '$depId'");
        $prof_pic11 = $depImg->fetchColumn();
        if ($prof_pic11 != "") {
            $pic11 = BASE_URL . 'includes/Pages/department/' . $prof_pic11;
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                $pic11 = BASE_URL . 'includes/Pages/department/' . $prof_pic11;
            } else {
                $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
        } else {
            $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
        }
    }
    if($row['type'] == "user"){
        $depId = $row['departmentName'];
        $depName = $connect->query("SELECT name FROM users WHERE id = '$depId'");
        $depData = $depName->fetchColumn();
        $depImg = $connect->query("SELECT file_name FROM users WHERE id = '$depId'");
        $prof_pic11 = $depImg->fetchColumn();
        if ($prof_pic11 != "") {
            $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
            } else {
                $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
        } else {
            $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
        }
    }
    // echo $depData."<br>";
    $data[] = array(
        'id' => $row['id'],
        'name' => $depData,
        'parent' => $row['parentId'],
        'type'  => $row['type'],
        'mainId' => $depId,
        'img' => $pic11
    );
}
header('Content-Type: application/json');
echo json_encode($data);
