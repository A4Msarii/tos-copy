<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    
    $fetchuser_id = $_REQUEST['userId']; 

              $query2 = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' ORDER BY id DESC LIMIT 3";
              $statement2 = $connect->prepare($query2);
              $statement2->execute();
              if ($statement2->rowCount() > 0) {
              ?>
                <td>

                  <?php $result2 = $statement2->fetchAll();
                  foreach ($result2 as $row2) {
                    $class_id_ac = $row2['data'];
                    $class_name_fect_sc = $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                    $class_name_fect_sc->execute([$class_id_ac]);
                    $class_name_fect_scs = $class_name_fect_sc->fetchColumn();
                    $ins_ides = $row2['user_id'];
                    $sel_ins_Ac = $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                    $sel_ins_Ac->execute([$ins_ides]);
                    $sel_ins_Ac_name = $sel_ins_Ac->fetchColumn();

                  ?>


                    <h4><span class="legend-indicator bg-secondary"></span><a style="font-weight:bold;"><?php echo $class_name_fect_scs ?></a></h4>


                  <?php
                  } ?>
                </td>
              <?php }
            }
              ?>