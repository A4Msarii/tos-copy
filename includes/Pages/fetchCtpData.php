<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
if (isset($_REQUEST['groupId'])) {
    $warning_id = $_SESSION['warning_id_page'];
    $groupId = $_REQUEST['groupId'];
    $all_value_table = "";
    $warning_data = "SELECT * FROM warning_category_data where group_id = '$groupId'";
    $statement = $connect->prepare($warning_data);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        $count = 0;
        foreach ($result as $row) {
            if($count == 0){
                $count++;
                continue;
            }
            $count++;
            $fetch_id_value = $row['category_value'];
            $table = $row['category'];
            $only_for_phase = $row['category_phase'];
            $name = "-";
            $table_value_fetch = "-";
            $thre_val = $row['threshold'];
            $group_ides = $row['group_id'];
            // if($fetch_id_value=="all"){
            //   $name="All";
            // }
            if ($table == "phase") {
                if ($fetch_id_value != "all" && $fetch_id_value != "0" && $only_for_phase == "all") {
                    $cat_name_value = $connect->prepare("SELECT phasename FROM $table WHERE id=?");
                    $cat_name_value->execute([$fetch_id_value]);
                    $name = $cat_name_value->fetchColumn();
                    $table_value_fetch = "all";
                } else if ($fetch_id_value == "all" && $fetch_id_value != "0" && $only_for_phase == "all") {
                    $name = "all";
                    $table_value_fetch = "Actual + sim";
                } else if ($fetch_id_value == "all" && $fetch_id_value != "0" && $only_for_phase == "actual") {
                    $name = "all";
                    $table_value_fetch = "actual";
                } else if ($fetch_id_value == "all" && $fetch_id_value != "0" && $only_for_phase == "sim") {
                    $name = "all";
                    $table_value_fetch = "sim";
                } else if ($fetch_id_value != "all" && $fetch_id_value != "0" && $only_for_phase == "actual") {
                    $cat_name_value = $connect->prepare("SELECT phasename FROM $table WHERE id=?");
                    $cat_name_value->execute([$fetch_id_value]);
                    $name = $cat_name_value->fetchColumn();
                    $table_value_fetch = "actual";
                } else if ($fetch_id_value != "all" && $fetch_id_value != "0" && $only_for_phase == "sim") {
                    $cat_name_value = $connect->prepare("SELECT phasename FROM $table WHERE id=?");
                    $cat_name_value->execute([$fetch_id_value]);
                    $name = $cat_name_value->fetchColumn();
                    $table_value_fetch = "sim";
                }
            } else if ($table == "actual") {
                if ($fetch_id_value != "all" && $fetch_id_value != "0") {
                    $cat_name_value = $connect->prepare("SELECT symbol FROM $table WHERE id=?");
                    $cat_name_value->execute([$fetch_id_value]);
                    $name = $cat_name_value->fetchColumn();
                } else if ($fetch_id_value == "all") {
                    $name = "all";
                }
            } else if ($table == "sim") {
                if ($fetch_id_value != "all" && $fetch_id_value != "0") {
                    $cat_name_value = $connect->prepare("SELECT shortsim FROM $table WHERE id=?");
                    $cat_name_value->execute([$fetch_id_value]);
                    $name = $cat_name_value->fetchColumn();
                } else if ($fetch_id_value == "all") {
                    $name = "all";
                }
            } else if ($table == "test") {
                if ($fetch_id_value != "all" && $fetch_id_value != "0") {
                    $cat_name_value = $connect->prepare("SELECT shorttest FROM $table WHERE id=?");
                    $cat_name_value->execute([$fetch_id_value]);
                    $name = $cat_name_value->fetchColumn();
                } else if ($fetch_id_value == "all") {
                    $name = "all";
                }
                $ran_the = $row['threshold'];
                if ($ran_the == "1") {
                    $thre_val = "Less Than >";
                }
                if ($ran_the == "2") {
                    $thre_val = "Equal Than =";
                }
                if ($ran_the == "3") {
                    $thre_val = "Greater Thn <";
                }
            }
            $id = $row['id'];
            $modal = 'data-bs-toggle="modal" data-bs-target="#editcat"';
            $all_value_table .= '
            <tr>
           <td>' . $sn++ . '</td>
           <td>' . $row['category'] . '</td>
           <td>' . $table_value_fetch . '</td>
           <td>' . $name . '</td>
           <td style="text-align:center;">
             <a class="btn btn-soft-danger btn-xs" href="warning_category_delete.php?id=' . $id . '" style="text-align:center;"><i class="bi bi-trash-fill" style="font-size:15px;"></i></a>
             </td>
            </tr>
            ';
        }
        echo $all_value_table;
    }
}
