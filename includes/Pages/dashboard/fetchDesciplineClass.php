<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    
    $fetchuser_id = $_REQUEST['userId']; 


            if ($fetchuser_id != '0') {
              $query6 = "SELECT * FROM discipline where course_id='$std_course1' and student_id='$fetchuser_id' AND categoryId != 'absent' ORDER BY id DESC LIMIT 3";
              $statement6 = $connect->prepare($query6);
              $statement6->execute();
              $result6 = $statement6->fetchAll();
              foreach ($result6 as $row6) {
                $desci = $row6['id'];
                if ($row6['topic'] == "") {
                  $tId = $row6['categoryId'];
                  if (is_numeric($row6['categoryId'])) {
                    $tQ = $connect->query("SELECT category FROM desccate WHERE id = '$tId'");
                    $tData = $tQ->fetchColumn();
                  } else {
                    $tData = $row6['categoryId'];
                  }
                } else {
                  $tData = $row6['topic'];
                }

                $std_in_d = $row6['inst_id'];
                $instr_name_d = $connect->prepare("SELECT name FROM users WHERE id=?");
                $instr_name_d->execute([$std_in_d]);
                $name2_d = $instr_name_d->fetchColumn();
                if ($tData != "absent") {
            ?>
                  <tr>

                    <h4 class="text-dark" style="cursor:pointer;"><a onclick="document.getElementById('desci').value='<?php echo $desci ?>';
                                                document.getElementById('date_desc').innerHTML='<?php echo $row6['date'] ?>';
                                                document.getElementById('inst_desc').innerHTML='<?php echo $name2_d ?>';
                                                document.getElementById('topic_desc').innerHTML='<?php echo $tData ?>';
                                                document.getElementById('comment_desc').innerHTML='<?php echo $row6['comment'] ?>';
                                " data-bs-toggle="modal" data-bs-target="#disciplineinfo" id="cl_sy1"><span class="legend-indicator bg-primary"></span><?php echo $tData; ?></a></h4><br>
                  </tr>

            <?php }
              }
            }
            } ?>