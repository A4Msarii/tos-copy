<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$stmt = $connect->prepare("SELECT * FROM temp_cat");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display data as HTML table rows
foreach ($result as $row) {
    $hashCheck=$row['cat_id'];
    $fetch_hash_name = $connect->prepare("SELECT course_name FROM `test_course` WHERE id=?");
    $fetch_hash_name->execute([$hashCheck]);
    $hash_names = $fetch_hash_name->fetchColumn();
    echo '<tr>';
    echo '<td><input type="text" value="'.$hash_names.'" class="form-control" readonly><input type="hidden" value="'.$row['cat_id'].'" class="form-control" name="examSub[]" readonly></td>';
    echo '<td><input type="text" name="examSubPer[]" class="form-control"></td>';
    echo '</tr>';
}

   
   ?>