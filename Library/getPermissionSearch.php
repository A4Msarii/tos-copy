<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$userRole = $_SESSION['role'];

if (isset($_REQUEST['search'])) {
    $serchData = $_REQUEST['search'];

    if ($userRole == "super admin") {
        $query = $connect->query("SELECT * FROM users WHERE name like '%" . $serchData . "%'  AND role != 'super admin' order by name asc");
    } elseif ($userRole == "instructor") {
        $query = $connect->query("SELECT * FROM users WHERE name LIKE '%" . $serchData . "%' AND role != 'super admin'  order by name asc");
    } elseif ($userRole == "student") {
        $query = $connect->query("SELECT * FROM users WHERE name LIKE '%" . $serchData . "%' AND role != 'super admin'  order by name asc");
    }

    while ($data = $query->fetch()) {
        $id = $data['id'];
        $prof_pic11 = $data['file_name'];
        if ($prof_pic11 != "") {
            $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $img)) {
                $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
            } else {
                $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
        }else {
            $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
        }
        echo "<tr>";
        echo "<td><input type='checkbox' name='userId[]' value='$id' /></td>";
        echo "<td> <img height='20px' width='20px' src='$img' /></td>";
        echo "<td>" . $data['name'] . "</td>";
        echo "</tr>";
    }
}

if (isset($_REQUEST['search1'])) {
    $serchData = $_REQUEST['search1'];
        $query = $connect->query("SELECT * FROM users WHERE name like '%" . $serchData . "%' order by name asc");

    while ($data = $query->fetch()) {
        $id = $data['id'];
        $prof_pic11 = $data['file_name'];
        if ($prof_pic11 != "") {
            $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $img)) {
                $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
            } else {
                $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
        }else {
            $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
        }
        echo "<tr>";
        echo "<td><input type='checkbox' name='userId[]' value='$id' /></td>";
        echo "<td> <img height='20px' width='20px' src='$img' /></td>";
        echo "<td>" . $data['name'] . "</td>";
        echo "</tr>";
    }
}
