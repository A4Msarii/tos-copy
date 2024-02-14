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

    $sql_add = "INSERT INTO extra_item_subitem (item_id,user_id,class_id,class,data_type,grade_id) VALUES ('$itemId','$userId','$classId','$className','$itemType','$gradeId')";
    $statement_add = $connect->prepare($sql_add);
    $statement_add->execute();

    $fetchuser_id = $userId;
    $classid = $classId;
    $class_name = $className;

    $extra_item_subitem = "SELECT * FROM extra_item_subitem where user_id='$fetchuser_id' and class_id='$classid' AND class='$class_name'";
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
                $class_value = "subItemDetail";
                $fetch_values = "subItemDetailContainer";
                $tbale_vlaue = "subitem";
            } else {
                $tbale_fethc = "itembank";
                $tbale_vlaue = "item";
                $class_value = "extraItemDetail";
                $fetch_values = "extraItemDetailContainer";
            }
            $stud_subi1 = $connect->prepare("SELECT $tbale_vlaue FROM `$tbale_fethc` WHERE id=?");
            $stud_subi1->execute([$iddes]);
            $name_sub1 = $stud_subi1->fetchColumn();
            if ($exrow1['data_type'] == "subitem") {
                $grades = "subitem" . $iddes;
            } else {
                $grades = "item" . $iddes;
            }
            $fetch_itemsgrade = $connect->prepare("SELECT grade FROM `extra_item_subitem_grades` WHERE item_id=? AND user_id=? and type='$tbale_vlaue'");
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
            <tr style="<?php echo $bac_ground2; ?>" id="get_color<?php echo $grades; ?>" class="Myitem">
                <td><?php echo $snextra_item_subitem ?></td>
                <td style="width:50px;">
                    <span id="selectExtraItemDropdown<?php echo $iddes ?>" class="<?php echo $class_value; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation name="<?php echo $iddes; ?>" value="<?php echo $fetchuser_id; ?>" data-value="<?php echo $bac_ground2; ?>"><?php echo $name_sub1; ?>
                    </span>
                    <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectExtraItemDropdown<?php echo $iddes ?>">
                        <span class="dropdown-header <?php echo $fetch_values; ?>">
                        </span>
                    </div>
                </td>
                </td>
                <td class="extraItem" value="U" number="<?php echo $grades; ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" type="radio" <?php
                                                                            if ($grade2 == "U") {
                                                                                echo "checked";
                                                                            }
                                                                            ?> data-value="U" class="radio3" value="U" data-valuees="<?php echo $grades ?>" number="<?php echo $iddes; ?>" name="grades1[<?php echo $grades ?>]" />
                </td>
                <td class="extraItem" value="F" number="<?php echo $grades; ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" 
                    <?php if ($grade2 == "F") {
                        echo "checked";
                        } ?> class="radio3" type="radio" data-value="F" value="F" name="grades1[<?php echo $grades ?>]" />
                </td>
                <td class="extraItem" value="G" number="<?php echo $grades; ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" class="radio3" 
                    <?php 
                    if ($grade2 == "G") {
                        echo "checked";} ?> type="radio" data-value="G" value="G" name="grades1[<?php echo $grades ?>]" />
                </td>
                <td class="extraItem" value="V" number="<?php echo $grades; ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" 
                    <?php if ($grade2 == "V") {
                        echo "checked";} ?> class="radio3" type="radio" data-value="V" value="V" name="grades1[<?php echo $grades ?>]" />
                </td>
                <td class="extraItem" value="E" number="<?php echo $grades; ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" <?php if ($grade2 == "E") {echo "checked";
                                                                                                    } ?> type="radio" data-value="E" class="radio3" value="E" name="grades1[<?php echo $grades ?>]" />
                </td>
                <td class="extraItem" value="N" number="<?php echo $grades; ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" <?php if ($grade2 == "N") {
                                                                                                        echo "checked";
                                                                                                    } ?> type="radio" data-value="N" class="radio3" value="N" name="grades1[<?php echo $grades ?>]" />
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
                                echo "<span style='font-weight:bold; font-size:large;' class='text-danger'>F: {$rowallsubitemdes['F']}</span><br>";
                                echo "<span style='font-weight:bold; font-size:large;' class='text-danger'>G: {$rowallsubitemdes['G']}</span><br>";
                                echo "<span style='font-weight:bold; font-size:large;' class='text-danger'>V: {$rowallsubitemdes['V']}</span><br>";
                                echo "<span style='font-weight:bold; font-size:large;' class='text-danger'>E: {$rowallsubitemdes['E']}</span><br>";
                                echo "<span style='font-weight:bold; font-size:large;' class='text-danger'>N: {$rowallsubitemdes['N']}</span><br>";
                            }
                            ?>
                        </span>
                    </div>
                    <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i style="font-weight: bold;" class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $snextra_item_subitem . '. '; ?>" data-appenditemname="<?php echo $name_sub1 ?>"></i></button>
                    <button class="badge crossbtn" type="button"><a href="delete_extra_item.php?id=<?php echo $del_id_it ?>" id="anch"><i class="bi bi-x" style="font-weight: bold;"></i></a></button>
                </td>
            </tr>
<?php $snextra_item_subitem++;
        }
    }
}
