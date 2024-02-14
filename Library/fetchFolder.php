<?php
include('../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();

// if (isset($_REQUEST['id'])) {
//     $id = $_REQUEST['id'];

//     $folderIdSql = $connect->query("SELECT * FROM folder_shop_user WHERE shop_id = '$id'");
//     if ($folderIdSql->rowCount() > 0) {
//         $count = 1;
//         while ($result = $folderIdSql->fetch()) {

//             $folderId = $result['folder_id'];
//             $folderQuery = $connect->query("SELECT * FROM folders WHERE id = '$folderId'");
//             while ($result1 = $folderQuery->fetch()) {
//                 $folderName = $result1['folder'];
//                 echo "<span class='foldername'>$count.&nbsp;$folderName</span>";
//                 $count++;
//             }
//         }
//     } else {
//         echo "No Folder Inside This Shop..";
//     }
// }

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $libId = $_REQUEST['libId'];
    $shelf_ides = $_REQUEST['shelf_ides'];
    

    $folderIdSql = $connect->query("SELECT * FROM folder_shop_user WHERE shop_id = '$id' AND lib_id = '$libId' AND shelf_id = '$shelf_ides'");
    if ($folderIdSql->rowCount() > 0) {
        $count = 1;
        while ($result = $folderIdSql->fetch()) {

            $folderId = $result['folder_id'];
            $folderQuery = $connect->query("SELECT * FROM folders WHERE id = '$folderId'");
            while ($result1 = $folderQuery->fetch()) {
                $folderName = $result1['folder'];
                $fId = $result1['id'];
                $path = "assets/svg/phase2_grey/folder.png";
                ?>
                <div  style="display:inline-block;width:auto;background: #d7d4dbad;margin-right:20px; border-radius:10px;" id="folderId<?php echo $fId.$shelf_ides; ?>" class="folderCon">
                
                <a onclick="cvarun(this);" target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/fheader1.php?folder_ID=<?php echo $fId; ?>&shopId=<?php echo $id; ?>" class="foldername" style="color:black; margin:5px; cursor:pointer;" value="<?php echo $fId.$shelf_ides; ?>"><img style="height:20px; width:20px;" src="<?php echo BASE_URL.$path; ?>" class="foldername" value="<?php echo $fId ?>">&nbsp;<?php echo $folderName; ?></a>
                
                <?php
                if ($_SESSION['role'] == 'super admin') {
                    ?>
                    <?php
      $url = $_SERVER['PHP_SELF'];

      $filename2 = basename($url);
      $parts = explode('/Library/', $url);

      if (count($parts) > 1) {
        $path_after_test = $parts[1];

        $pos = strpos($url, "Library/" . $path_after_test);

        if ($pos !== false) {
          // Extract the desired part of the URL
          $desiredPart = substr($url, $pos);
      ?>
                    <a class="folderCross" href="<?php echo BASE_URL;?>Library/fetchFolder.php?fId=<?php echo $fId; ?>&libId=<?php echo $libId; ?>&shopId=<?php echo $id; ?>"><i style="position:relative;top:-9px; margin:5px; margin-top:-9px; margin-left:7px;" class="bi bi-x-circle text-danger" id="foldel"></i>
                </a>
<?php
        }
      } else {
        ?>
        
      <?php } ?>
                <?php
                } elseif ($_SESSION['role'] != 'super admin' && $libId != '1') {
                    ?>
                    <a class="folderCross" href="<?php echo BASE_URL;?>Library/fetchFolder.php?fId=<?php echo $fId; ?>&libId=<?php echo $libId; ?>&shopId<?php echo $id; ?>"><i style="position:relative;top:-9px; margin:5px; margin-top:-9px; margin-left:7px;" class="bi bi-x-circle text-danger" id="foldel"></i>
                </a>
               
                <?php
                }
                echo '</div>';
                $count++;
            }
        }
    } else {
        echo "No Folder Inside This Shop..";
    }
}

if (isset($_REQUEST['shop_Id'])) {
    $sId = $_REQUEST['shop_Id'];
    $libId = $_REQUEST['libId'];
    $shelf_id = $_REQUEST['shelf_id'];
    // echo $sId;
    // die();

    // echo $sId."<br>";
    // echo $libId."<br>";
    // echo $shelf_id;
    // die();

    $folderIdSql = $connect->query("SELECT * FROM shelf_shop WHERE shop_id = '$sId' AND shelf_id = '$shelf_id' AND lib_id = '$libId'");
    if ($folderIdSql->rowCount() > 0) {
        while ($shopRes = $folderIdSql->fetch()) {
            $shopVal = $shopRes['shop_id'];
            $query = $connect->query("SELECT DISTINCT folderId FROM (
                SELECT folderId FROM user_files WHERE shopid = '$shopVal'
                UNION ALL
                SELECT folderId FROM editor_data WHERE shopid = '$shopVal'
                UNION ALL
                SELECT folderId FROM user_briefcase WHERE shopid = '$shopVal'
            ) AS unique_folderIds;");

            while ($folderData = $query->fetch()) {

                $folValue = $folderData['folderId'];

                $checkFol = $connect->query("SELECT count(*) FROM folder_shop_user WHERE folder_id = '$folValue' AND shelf_id = '$shelf_id' AND shop_id = '$sId'");
                $checkFolRes = $checkFol->fetchColumn();
                if ($checkFolRes == 0) {

                    $folderQuery = $connect->query("SELECT * FROM folders WHERE id = '$folValue'");
                    while ($result1 = $folderQuery->fetch()) {
                        echo "<tr class='folders'>";
                        $folderName = $result1['folder'];
                        $folder_Id = $result1['id'];
                        // echo "<li style='text-decoration:none; display:inline-block; margin:5px;'><input type='checkbox' name='add_folder[]' value='$folderId' /></li>";

                        echo "<td><h4><input style='margin:5px;' type='checkbox' name='add_folder[]' value='$folder_Id' />$folderName</h4></td>";
                        echo "</tr>";
                    }
                }
            }
        }
    }
}


if (isset($_REQUEST['fId'])) {

    $folId = $_REQUEST['fId'];
    $labId = $_REQUEST['libId'];
    $shopId = $_REQUEST['shopId'];

    $folDel = "DELETE FROM folder_shop_user WHERE lib_id='$labId' AND folder_id='$folId' AND shop_id = '$shopId'";
    $statement = $connect->prepare($folDel);
    $statement->execute();
    $_SESSION['danger'] = "Folder Deleted successfully..";
    header('Location:index.php');
}


if (isset($_REQUEST['selId'])) {
    $selId = $_REQUEST['selId'];
    $allitem1_a = "SELECT * FROM shops";
    $statement1_a = $connect->prepare($allitem1_a);
    $statement1_a->execute();

    if ($statement1_a->rowCount() > 0) {
        $result1_a = $statement1_a->fetchAll();
        $sn = 1;
        foreach ($result1_a as $row1) {
            $shop_ides = $row1['id'];
            $sql = $connect->query("SELECT * FROM shelf_shop WHERE shop_id = '$shop_ides' AND shelf_id = '$selId'");
            $result1 = $sql->rowCount();
            $image_shop = $row1['image'];
            if ($image_shop != "") {


                                            $shoppic = BASE_URL . 'includes/Pages/shops/' . $image_shop;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $shoppic)) {
                                                $shoppic = BASE_URL . 'includes/Pages/shops/' . $image_shop;
                                            } else {
                                                $shoppic = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                        }
            if ($result1 == 0) {

                echo "<tr class='shops'>";
                echo $sn++;
                echo "<td>";
                echo "<div style='display:inline-block;border:1px solid #ccccb3;padding:15px 15px 15px 15px;border-radius:5px;magin:10px 20px' class='sl1'>";

                echo "<div class='avatar avatar-sm avatar-circle'>";
                echo "<img class='avatar-img' src='$shoppic' alt='Image Description'>";
                echo "</div>";
                echo "<br>";
                echo "<span>" . $row1['shops'] . "</span>";
                echo "</div>";

                // echo "<td style='display:inline-block ;'>";
                // echo "<h4><input style='margin:5px;' type='checkbox' name='add_list[]' value='$shop_ides'>" .$row1['shops']."</h4>";
                echo "<div style='display:inline-block;margin-top:5px;'>";
                echo "<input style='margin-left:-7px; margin-bottom:-30px;' type='checkbox' name='add_list[]' value='$shop_ides'>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
        }
    }
}
