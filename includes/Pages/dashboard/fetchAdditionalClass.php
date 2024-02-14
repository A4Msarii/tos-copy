<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    
    $fetchuser_id = $_REQUEST['userId']; 

              
            if ($fetchuser_id != '0') {
              $query_add = "SELECT * FROM additional_task where assign_class_table IS NULL and Stud_id='$fetchuser_id'";
              $statement_Add = $connect->prepare($query_add);
              $statement_Add->execute();
              if ($statement_Add->rowCount() > 0) {
                $result_add = $statement_Add->fetchAll();
                $sn = 1;
                foreach ($result_add as $rows) {
                  $item_name = $rows['Item'];
                  $type = $rows['type'];
                  if ($type == 'item') {
                    $i_name = $connect->prepare("SELECT item FROM itembank WHERE id=?");
                  } else if ($type == 'subitem') {
                    $i_name = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
                  }
                  $i_name->execute([$item_name]);
                  $addname1 = $i_name->fetchColumn();
            ?>

                  <a class="badge bg-soft-secondary rounded-pill m-2 text-dark" style="font-size:medium;cursor:pointer;"><?php echo $addname1; ?></a>
            <?php
                }
              }
            }
            } ?>