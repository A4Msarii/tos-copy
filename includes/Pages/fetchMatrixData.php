<?php
include('../config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['userId'])) {
    $fetchuser_id = $_REQUEST['userId'];
    $std_course1 = $_REQUEST['courseId'];
    $cl_ides = $_REQUEST['classId'];
    $ph_id = $_REQUEST['phaseId'];
    $cl_names = $_REQUEST['className'];
    $itemArrU = array();
    $itemIndexU = 0;
    $itemArrF = array();
    $itemIndexF = 0;
    $allnotitem = "SELECT * FROM item WHERE course_id='$std_course1' AND class_id='$cl_ides' AND phase_id='$ph_id' AND class='$cl_names'";

    $statementallnotitem = $connect->prepare($allnotitem);
    $statementallnotitem->execute();
    $var1 = $connect->query("SELECT COUNT(*) FROM item 
                           WHERE course_id='$std_course1' 
                             AND class_id='$cl_ides' 
                             AND phase_id='$ph_id' 
                             AND class='$cl_names'");
    $var_data = $var1->fetchColumn();
    $var = 0;
    $var3 = 0;
    $var4 = 0;
    $number_of_rows111 = "";
    $number_of_rows112 = "";
    if ($statementallnotitem->rowCount() > 0) {
        $resultallnotitem = $statementallnotitem->fetchAll();
        foreach ($resultallnotitem as $rowallnotitem) {
            $grade = "";
            $item_id_s = $rowallnotitem['id'];
            $sql51 = "SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$fetchuser_id' AND (grade='U' OR grade='F')";
            $result51 = $connect->prepare($sql51);
            $result51->execute();
            $number_of_rows11 = $result51->fetchColumn();
            $var = $var + $number_of_rows11;
            $sql511 = "SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$fetchuser_id' and grade='U'";
            $result511 = $connect->prepare($sql511);
            $result511->execute();
            $number_of_rows111 = $result511->fetchColumn();
            if ($number_of_rows111 > 0) {
                $subIdQU = $connect->query("SELECT item FROM item WHERE id = '$item_id_s'");
                $subIdDataU = $subIdQU->fetchColumn();
                $subNameQU = $connect->query("SELECT item FROM itembank WHERE id = '$subIdDataU'");
                $subNameDataU = $subNameQU->fetchColumn();
                if (!in_array($subNameDataU, $itemArrU)) {
                    $itemArrU[$itemIndexU] = $subNameDataU;
                    $itemIndexU++;
                }
            }
            $var3 = $var3 + $number_of_rows111;
            $sql512 = "SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$fetchuser_id' AND grade='F'";
            $result512 = $connect->prepare($sql512);
            $result512->execute();
            $number_of_rows112 = $result512->fetchColumn();
            if ($number_of_rows112 > 0) {
                $subIdQF = $connect->query("SELECT item FROM item WHERE id = '$item_id_s'");
                $subIdDataF = $subIdQF->fetchColumn();
                $subNameQF = $connect->query("SELECT item FROM itembank WHERE id = '$subIdDataF'");
                $subNameDataF = $subNameQF->fetchColumn();
                if (!in_array($subNameDataF, $itemArrF)) {
                    $itemArrF[$itemIndexF] = $subNameDataF;
                    $itemIndexF++;
                }
            }
            $var4 = $var4 + $number_of_rows112;
        }
    }
    $subItemArrU = array();
    $subItemIndexU = 0;
    $subItemArrF = array();
    $subItemIndexF = 0;
    $allnotitem = "SELECT * FROM subitem WHERE course_id = '$std_course1' AND class_id = '$cl_ides' AND phase_id = '$ph_id' AND class = '$cl_names'";
    $statementallnotitem = $connect->prepare($allnotitem);
    $statementallnotitem->execute();
    $var1 = $connect->query("SELECT COUNT(*) FROM subitem WHERE course_id = '$std_course1' AND class_id = '$cl_ides' AND phase_id = '$ph_id' AND class = '$cl_names'");
    $var_data = $var1->fetchColumn();
    $number_of_rows111 = "";
    $number_of_rows112 = "";
    if ($statementallnotitem->rowCount() > 0) {
        $resultallnotitem = $statementallnotitem->fetchAll();
        foreach ($resultallnotitem as $rowallnotitem) {
            $grade = "";
            $item_id_s = $rowallnotitem['id'];
            $sql51 = "SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$item_id_s' AND user_id='$fetchuser_id' AND (grade='U' OR grade='F')";
            $result51 = $connect->prepare($sql51);
            $result51->execute();
            $number_of_rows11 = $result51->fetchColumn();
            $var = $var + $number_of_rows11;
            $sql511 = "SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$item_id_s' AND user_id='$fetchuser_id' AND grade='U'";
            $result511 = $connect->prepare($sql511);
            $result511->execute();
            $number_of_rows111 = $result511->fetchColumn();
            if ($number_of_rows111 > 0) {
                $subIdQU = $connect->query("SELECT subitem FROM subitem WHERE id = '$item_id_s'");
                $subIdDataU = $subIdQU->fetchColumn();
                $subNameQU = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subIdDataU'");
                $subNameDataU = $subNameQU->fetchColumn();
                if (!in_array($subNameDataU, $subItemArrU)) {
                    $subItemArrU[$subItemIndexU] = $subNameDataU;
                    $subItemIndexU++;
                }
            }
            $var3 = $var3 + $number_of_rows111;
            $sql512 = "SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$item_id_s' AND user_id='$fetchuser_id' AND grade='F'";
            $result512 = $connect->prepare($sql512);
            $result512->execute();
            $number_of_rows112 = $result512->fetchColumn();

            if ($number_of_rows112 > 0) {
                $subIdQF = $connect->query("SELECT subitem FROM subitem WHERE id = '$item_id_s'");
                $subIdDataF = $subIdQF->fetchColumn();
                $subNameQF = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subIdDataF'");
                $subNameDataF = $subNameQF->fetchColumn();
                if (!in_array($subNameDataF, $subItemArrF)) {
                    $subItemArrF[$subItemIndexF] = $subNameDataF;
                    $subItemIndexF++;
                }
            }
            $var4 = $var4 + $number_of_rows112;
        }
    }
}
?>
<span style="font-size:large;"><?php $name = 0;
    while ($name < count($itemArrU)) {
        echo '- ' . $itemArrU[$name] . '<br>';
        $name++;
    } ?></span>
<span style="font-size:large;"><?php $name = 0;
    while ($name < count($itemArrF)) {
        echo '- ' . $itemArrF[$name] . '<br>';
        $name++;
    } ?></span>
<li><span style="font-size: large; font-weight:bold;" class="text-warning">F : <?php echo $var4 ?></span></li>
<span style="font-size:large;"><?php $name = 0;
    while ($name < count($subItemArrU)) {
        echo '- ' . $subItemArrU[$name] . '<br>';
        $name++;
    } ?></span>
<span style="font-size:large;"><?php $name = 0;
    while ($name < count($subItemArrF)) {
        echo '- ' . $subItemArrF[$name] . '<br>';
        $name++;
    } ?></span>
<li><span style="font-size: x-large; font-weight:bold;">Total : <?php echo $var ?>
        <?php echo "" ?></span></li>