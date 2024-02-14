<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    
    $fetchuser_id = $_REQUEST['userId']; 


            if ($fetchuser_id != '0') {
              $query6_c = "SELECT * FROM notifications where to_userid='$fetchuser_id' and extra_data='reached_cout' ORDER BY id DESC LIMIT 3";
              $statement6_c = $connect->prepare($query6_c);
              $statement6_c->execute();
              $result6_c = $statement6_c->fetchAll();
              foreach ($result6_c as $row7) {


            ?>
                <tr>
                  <?php
                  $cap = $row7['data'];
                  $over_all_grade1 = $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
                  $over_all_grade1->execute([$cap]);
                  $data_value = $over_all_grade1->fetchColumn();

                  $over_all_grade11 = $connect->prepare("SELECT bgColor FROM `warning_data` WHERE id=?");
                  $over_all_grade11->execute([$cap]);
                  $data_value11 = $over_all_grade11->fetchColumn();
                  if ($data_value11 == "") {
                    $bgColor = "gray";
                  } else {
                    $bgColor = $data_value11;
                  }
                  ?>



                  <h4 class="text-dark" style="cursor:pointer;"><a style="color:<?php echo $bgColor; ?>" onclick="document.getElementById('capname').innerHTML='<?php echo $data_value ?>';
                                    document.getElementById('capmodalcolor').style.backgroundColor='<?php echo $bgColor ?>';
                                " data-bs-toggle="modal" data-bs-target="#CAPinfo" class="get_cap_noti" id="<?php echo $row7['id']; ?>"><span class="legend-indicator" style="background-color:<?php echo $bgColor; ?>"></span><?php echo $data_value ?></a></h4>


                </tr>

            <?php }
            }
            } ?>