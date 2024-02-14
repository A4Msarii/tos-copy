<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['AddDivision'])) {
    $divisionId = $_REQUEST['divisionId'];

    $department_check = $_REQUEST['department_check'];
    $name = 0;

    while ($name < count($department_check)) {
        $department_check1 = $department_check[$name];

        $query = "INSERT INTO division_department (divisionId,departmentId) VALUES ('$divisionId','$department_check1')";
        // echo $query;
        

        $stmt = $connect->prepare($query);
        $stmt->execute();
        $name++;
    }
    // die();
    $_SESSION['success'] = "Department Inserted Successfully";
        header("Location:division.php");
}

if(isset($_REQUEST['departId'])){
    $departId = $_REQUEST['departId'];

    $dQuery = $connect->query("SELECT * FROM homepage WHERE id NOT IN (
        SELECT departmentId FROM division_department WHERE divisionId = '$departId'
    )");

    while($dData = $dQuery->fetch()){
        $depId = $dData['id'];
        $depName = $dData['department_name'];

        // echo $depId;
        // echo $depName;
        echo "<tr>";
        echo "<td>";
        echo "<input type='checkbox' name='department_check[]' value='$depId' />";
        echo "</td>";
        echo "<td>";
        echo $depName; 
        echo "</td>";
        echo "</tr>";
    }

}
