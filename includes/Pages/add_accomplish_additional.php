<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

$type = $_REQUEST['item_subitem_value'];
$data_id = $_REQUEST['item_id_addacc'];
$std_id = $_REQUEST['student_ides_value'];
$gr_id = $_REQUEST['grad_ides_value'];
$btnType = $_REQUEST['btnType'];

if ($btnType == "accomplish") {
    $sql_add = "INSERT INTO accomplish_task (Item_ac, gradsheet_id, Stud_ac, Type) VALUES ('$data_id', '$gr_id', '$std_id', '$type')";
}

if ($btnType == "additional") {
    $sql_add = "INSERT INTO additional_task (Item, gradesheet_id, Stud_id, type) VALUES ('$data_id', '$gr_id', '$std_id', '$type')";
}

$statement_add = $connect->prepare($sql_add);
$statement_add->execute();

if ($btnType == "additional") {
    $query_add = "SELECT * FROM additional_task where assign_class_table IS NULL and Stud_id='$std_id'";
    $statement_Add = $connect->prepare($query_add);
    $statement_Add->execute();
    $count_add = $statement_Add->rowCount();
    if ($count_add > 0) {
        $result_add = $statement_Add->fetchAll();
        $sn = 1;
        $html_rows = '';
        foreach ($result_add as $rows) {
            $item_name = $rows['Item'];
            $type = $rows['type'];
            if ($type == 'item') {
                $i_name = $connect->prepare("SELECT item FROM itembank WHERE id=?");
            } else if ($type == 'subitem') {
                $i_name = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
            }
            $i_name->execute([$item_name]);
            $name1 = $i_name->fetchColumn();
            $html_rows .= '<tr>
            <td><input type="checkbox" name="add_clear[]" value="' . $rows['ad_id'] . '" class="checkallclear1"></td>
            <td>' . $name1 . '</td></tr>';
        }
    }

    echo json_encode(array('rows' => $html_rows, 'count' => $count_add));
}

if ($btnType == "accomplish") {
    $query_acc = "SELECT * FROM accomplish_task where assign_class_table IS null and Stud_ac='$std_id'";
    $statement_acc = $connect->prepare($query_acc);
    $statement_acc->execute();
    $count_add = $statement_acc->rowCount();
    if ($count_add > 0) {
        $result_acc = $statement_acc->fetchAll();
        $sn = 1;
        $html_rows = '';
        foreach ($result_acc as $row) {
            $item_acc = $row['Item_ac'];
            $type1 = $row['Type'];
            if ($type1 == 'item') {
                $it_name = $connect->prepare("SELECT item FROM itembank WHERE id=?");
            } else if ($type1 == 'subitem') {
                $it_name = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
            }
            $it_name->execute([$item_acc]);
            $fetchname = $it_name->fetchColumn(); {
                $html_rows .= '<tr>
            <td><input type="checkbox" name="ac_id[]" value="' . $row['ac_id'] . '" class="checkallaccomplishclear"></td>
            <td>' . $fetchname . '</td></tr>';
            }
        }
    }

    echo json_encode(array('rows' => $html_rows, 'count' => $count_add));

}
