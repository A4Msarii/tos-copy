<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    
    $fetchuser_id = $_REQUEST['userId']; 

 if ($fetchuser_id != '0') {
              $query5 = "SELECT * FROM memo where course_id='$std_course1' and student_id='$fetchuser_id' AND categoryId != 'absent' ORDER BY id DESC LIMIT 3";
              $statement5 = $connect->prepare($query5);
              $statement5->execute();
              $result5 = $statement5->fetchAll();
              foreach ($result5 as $row5) {
                $memo = $row5['id'];
                if ($row5['topic'] == "") {
                  $tId = $row5['categoryId'];
                  if (is_numeric($row5['categoryId'])) {
                    $tQ = $connect->query("SELECT category FROM memocate WHERE id = '$tId'");
                    $tData = $tQ->fetchColumn();
                  } else {
                    $tData = $row5['categoryId'];
                  }
                } else {
                  $tData = $row5['topic'];
                }

                $std_in = $row5['inst_id'];
                $instr_name = $connect->prepare("SELECT name FROM users WHERE id=?");
                $instr_name->execute([$std_in]);
                $name2 = $instr_name->fetchColumn();
                if ($tData != "absent") {

            ?>
                  <tr>

                    <h4 class="text-dark" style="cursor:pointer;"><a onclick="document.getElementById('memo').value='<?php echo $memo ?>';
                                                document.getElementById('date').innerHTML='<?php echo $row5['date'] ?>';
                                                document.getElementById('inst').innerHTML='<?php echo $name2; ?>';
                                                document.getElementById('topic').innerHTML='<?php echo $tData ?>';
                                                document.getElementById('comment').innerHTML='<?php echo $row5['comment'] ?>';
                                " data-bs-toggle="modal" data-bs-target="#memoinfo" id="cl_sy"><span class="legend-indicator bg-primary"></span><?php echo $tData; ?></a></h4><br>


                  </tr>

            <?php
                }
              }
            }
          }
            ?>