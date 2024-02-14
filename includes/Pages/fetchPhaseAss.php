<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['fileId'])) {
    $fileId = $_REQUEST['fileId'];
    $phaseId = $_REQUEST['phaseId'];
    $coursename = $_REQUEST['coursename'];
    $coursecode = $_REQUEST['coursecode'];

    $q21 = "SELECT * FROM roles";
    $st21 = $connect->prepare($q21);
    $st21->execute();
    $re21 = $st21->fetchAll();

    foreach ($re21 as $row21) {
        $roled = unserialize($row21['permission']);

        // Check if 'assingeresource' permission is set to 1
         if (isset($roled['assingeresource']) && $roled['assingeresource'] == 1) {
            $role = $row21['roles'];
            $q2 = "SELECT * FROM users WHERE role = :role";
            $st2 = $connect->prepare($q2);
            $st2->bindParam(':role', $role);
            $st2->execute();

            if ($st2->rowCount() > 0) {
                $re2 = $st2->fetchAll();

                foreach ($re2 as $row2) {
                    $uId = $row2['id'];
                    // $in1 .= '<tr><td><input type="checkbox" value="' . $row2['id'] . '" name="userides[]"></td><td>' . $row2['nickname'] . '</td></tr>';
                    $checkUser = $connect->query("SELECT count(*) FROM phasefilepermission WHERE fileId = '$fileId' AND instId = '$uId' AND phaseId = '$phaseId' and coursecode='$coursecode' and courseName='$coursename'");
                    if ($checkUser->fetchColumn() <= 0) {
?>
                        <tr>
                            <td><input type="checkbox" value="<?php echo $uId ?>" name="userides[]"></td>
                            <td><?php echo $row2['nickname']; ?></td>
                        </tr>
<?php
                    }
                }
            }
        }
    }
}
