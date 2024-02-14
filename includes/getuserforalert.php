<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$userRole = $_SESSION['role'];

if(isset($_REQUEST['name'])){
    $serchData = $_REQUEST['name'];

    if($userRole == "super admin"){
        $query = $connect->query("SELECT * FROM users WHERE name LIKE '%". $serchData."%' OR nickname LIKE '%". $serchData."%' AND role != 'super admin' order by name asc");
    }elseif($userRole != "super admin"){
        $query = $connect->query("SELECT * FROM users WHERE name LIKE '%". $serchData."%' OR nickname LIKE '%". $serchData."%' AND role != 'super admin' order by name asc");
    }

    while($data = $query->fetch()){
        $id = $data['id'];
        $img = BASE_URL."includes/Pages/upload/".$data['file_name'];
        echo "<tr>";
        echo "<td><input type='checkbox' class='singleUserPer' name='userId[]' value='$id' /></td>";
        echo "<td> <img height='20px' width='20px' src='$img' /></td>";
        echo "<td>".$data['name']."</td>";
        echo "<td>".$data['nickname']."</td>";
        echo "</tr>";
    }

}

?>