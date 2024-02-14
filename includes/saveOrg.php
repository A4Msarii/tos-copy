

<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_POST['data_to_save'])) {

    $sql = "TRUNCATE TABLE orgchart_data";
    $connect->exec($sql);

    $dataToSave = json_decode($_POST['data_to_save'], true);

    foreach ($dataToSave as $data) {
        $name = $data['name'];
        $parentId = $data['parentId'];

        $sql = "INSERT INTO orgchart_data (departmentName,parentId) VALUES ('$name','$parentId')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
    }
}
