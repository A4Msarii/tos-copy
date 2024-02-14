<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['itemId'])) {
    $itemId = $_REQUEST['itemId'];
    $itemType = $_REQUEST['itemType'];
    $gradeId = $_REQUEST['gradeId'];
    $className = $_REQUEST['className'];
    $classId = $_REQUEST['classId'];
    $userId = $_REQUEST['userId'];
    $cloneId = $_REQUEST['cloneId'];

    $sql_add = "INSERT INTO extra_item_subitem_cl (item_id,user_id,class_id,class,data_type,cloneid,grade_id) VALUES ('$itemId','$userId','$classId','$className','$itemType','$cloneId','$gradeId')";
    $statement_add = $connect->prepare($sql_add);
    $statement_add->execute();

    $fetchuser_id = $userId;
    $classid = $classId;
    $class_name = $className;
    $get_clone_ides = $cloneId;

    $extra_item_subitem = "SELECT * FROM extra_item_subitem_cl where user_id='$fetchuser_id' and class_id='$classid' AND class='$class_name' and cloneid='$get_clone_ides'";
    $extra_item_subitemstatement = $connect->prepare($extra_item_subitem);
    $extra_item_subitemstatement->execute();

    if ($extra_item_subitemstatement->rowCount() > 0) {

        $extra_item_subitemresult = $extra_item_subitemstatement->fetchAll();
        $snextra_item_subitem = 'A';
        foreach ($extra_item_subitemresult as $exrow1) {
            $bac_ground2 = "";
            $del_id_it = $exrow1['id'];
            $iddes = $exrow1['item_id'];
            if ($exrow1['data_type'] == "subitem") {
                $tbale_fethc = "sub_item";
                $tbale_vlaue = "subitem";
            } else {
                $tbale_fethc = "itembank";
                $tbale_vlaue = "item";
            }
            $stud_subi1 = $connect->prepare("SELECT $tbale_vlaue FROM `$tbale_fethc` WHERE id=?");
            $stud_subi1->execute([$iddes]);
            $name_sub1 = $stud_subi1->fetchColumn();
            if ($exrow1['data_type'] == "subitem") {
                $grades = "subitem" . $iddes;
            } else {
                $grades = "item" . $iddes;
            }
            $fetch_itemsgrade = $connect->prepare("SELECT grade FROM `extra_item_subitem_grades_cl` WHERE item_id=? AND user_id=? and type='$tbale_vlaue' and cloneid='$get_clone_ides'");
            $fetch_itemsgrade->execute([$iddes, $fetchuser_id]);
            $grade2 = $fetch_itemsgrade->fetchColumn();
            if ($grade2 == "U") {
                $bac_ground2 = "background-color:#ed4c78;color:white";
            }
            if ($grade2 == "F") {
                $bac_ground2 = "background-color:#f5ca99;color:white";
            }
            if ($grade2 == "G") {
                $bac_ground2 = "background-color:#71869d;color:white";
            }
            if ($grade2 == "E") {
                $bac_ground2 = "background-color:#377dff;color:white";
            }

            if ($grade2 == "V") {
                $bac_ground2 = "background-color:#00c9a7;color:white";
            }
            if ($grade2 == "N") {
                $bac_ground2 = "background-color:#525d53;color:white";
            }
?>
            <input type="hidden" name="item_ids[]" value="<?php echo $iddes; ?>">
            <input type="hidden" name="item_types[]" value="<?php echo $tbale_vlaue; ?>">
            <tr id="get_color<?php echo $grades; ?>" class="Myitem" style="<?php echo $bac_ground2 ?>">
                <td><?php echo $snextra_item_subitem++ ?></td>
                <td><span id="selectExtraItemDropdown<?php echo $iddes ?>" class="extraItemDetail" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation name="<?php echo $iddes; ?>" value="<?php echo $fetchuser_id; ?>" data-value="<?php echo $bac_ground2; ?>"><?php echo $name_sub1; ?> </span>
                    <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectExtraItemDropdown<?php echo $iddes ?>">
                        <span class="dropdown-header extraItemDetailContainer">

                        </span>


                    </div>
                </td>
                </td>
                <td class="extraItem" value="U" number="<?php echo $grades; ?>">
                    <input style="margin: 5px; padding: 5px;" type="radio" data-value="U" class="radio3" value="U" data-valuees="<?php echo $grades ?>" number="<?php echo $iddes; ?>" <?php if ($grade2 == "U") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        } ?> value="U" name="grades[<?php echo $grades ?>]" />
                </td>
                <td class="extraItem" value="F" number="<?php echo $grades; ?>">
                    <input style="margin: 5px; padding: 5px;" type="radio" data-value="F" class="radio3" value="F" data-valuees="<?php echo $grades ?>" number="<?php echo $iddes; ?>" <?php if ($grade2 == "F") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        } ?> value="F" name="grades[<?php echo $grades ?>]" />
                </td>
                <td class="extraItem" value="G" number="<?php echo $grades; ?>">
                    <input style="margin: 5px; padding: 5px;" type="radio" data-value="G" class="radio3" value="G" data-valuees="<?php echo $grades ?>" number="<?php echo $iddes; ?>" <?php if ($grade2 == "G") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        } ?> value="G" name="grades[<?php echo $grades ?>]" />
                </td>
                <td class="extraItem" value="V" number="<?php echo $grades; ?>">
                    <input style="margin: 5px; padding: 5px;" type="radio" data-value="V" class="radio3" value="V" data-valuees="<?php echo $grades ?>" number="<?php echo $iddes; ?>" <?php if ($grade2 == "V") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        } ?> value="V" name="grades[<?php echo $grades ?>]" />
                </td>
                <td class="extraItem" value="E" number="<?php echo $grades; ?>">
                    <input style="margin: 5px; padding: 5px;" type="radio" data-value="E" class="radio3" value="E" data-valuees="<?php echo $grades ?>" number="<?php echo $iddes; ?>" <?php if ($grade2 == "E") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        } ?> value="E" name="grades[<?php echo $grades ?>]" />
                </td>
                <td class="extraItem" value="N" number="<?php echo $grades; ?>">
                    <input style="margin: 5px; padding: 5px;" type="radio" data-value="N" class="radio3" value="N" data-valuees="<?php echo $grades ?>" number="<?php echo $iddes; ?>" <?php if ($grade2 == "N") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        } ?> value="N" name="grades[<?php echo $grades ?>]" />
                </td>
                <td>
                    <button data-bs-placement="right" title="Grades Info" type="button" class="badge info" id="selectinfoDropdown<?php echo $iddes; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><i class="bi bi-exclamation" style="font-weight: bold;"></i></button>


                    <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdown<?php echo $iddes; ?>">
                        <span class="dropdown-header">
                            <?php
                            $allitemdes = "SELECT * FROM $tbale_fethc where id='$std_subi'";
                            $resultallsubitemdes = $connect->query($allitemdes);
                            foreach ($resultallsubitemdes as $rowallsubitemdes) {
                                echo "<span style='font-weight:bold; font-size:large;' class='text-danger'>U: {$rowallsubitemdes['U']}</span><br>";
                                echo "<span style='font-weight:bold; font-size:large;' class='text-warning'>F: {$rowallsubitemdes['F']}</span><br>";
                                echo "<span style='font-weight:bold; font-size:large;' class='text-secondary'>G: {$rowallsubitemdes['G']}</span><br>";
                                echo "<span style='font-weight:bold; font-size:large;' class='text-success'>V: {$rowallsubitemdes['V']}</span><br>";
                                echo "<span style='font-weight:bold; font-size:large;' class='text-primary'>E: {$rowallsubitemdes['E']}</span><br>";
                                echo "<span style='font-weight:bold; font-size:large;' class='text-dark'>N: {$rowallsubitemdes['N']}</span><br>";
                            }
                            ?>
                        </span>
                    </div>

                    <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i style="font-weight: bold;" class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $snextra_item_subitem . '. '; ?>" data-appenditemname="<?php echo $name_sub1 ?>"></i></button>

                    <button class="badge crossbtn" type="button"><a href="delete_extra_item1.php?id=<?php echo $del_id_it ?>" id="anch"><i class="bi bi-x" style="font-weight: bold;"></i></a></button>
                </td>
            </tr>
<?php }
    }
}
