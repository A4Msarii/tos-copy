<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$phase_id = "";
$actclass = "";
$simclass = "";
$academicclass = "";
$vehnum = "";
$vehtype = "";
$in = "";
$class = "";
 $classid = "";
$over_all_comment = "";
$comments = "";
$noti_id = "";
//fetch ins for form
$q2 = "SELECT * FROM users where role='instructor'";
$st2 = $connect->prepare($q2);
$st2->execute();

if ($st2->rowCount() > 0) {
  $re2 = $st2->fetchAll();
  foreach ($re2 as $row2) {
    $in .= '<option value="' . $row2['id'] . '">' . $row2['nickname'] . '</option>';
  }
}

//fetch percentage details
$per_table_data = "";
$per = "SELECT * FROM percentage";
$per5 = $connect->prepare($per);
$per5->execute();
if ($per5->rowCount() > 0) {
  $reper55 = $per5->fetchAll();
  $sn = 1;
  foreach ($reper55 as $rowper5) {
    $per_table_data .= '<tr>
         <td>' . $sn++ . '</td>
         <td>' . $rowper5['percentagetype'] . '</td>
             <td>' . $rowper5['percentage'] . '</td>
             <td>' . $rowper5['color'] . '</td>

         </tr>';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Grade Sheet</title>
</head>
<script src="loading.js"></script>
<div id="loading-screen" style="display:none;">
    <?php include 'gsloader.php';?>
  </div>
<div id="header-hide" style="display:none;">
  <?php
  include(ROOT_PATH . 'includes/head_navbar.php');

  ?></div>
<body>

                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-4">
                        <form method="post" action="submit_gradesheet.php">
                        <input type="hidden" value="<?php echo $added_ins ?>" name="instructor_ides">
          <input class="form-control" type="hidden" id="stud_db_id" name="stud_db_id" value="<?php echo $fetchuser_id ?>">
          <input class="form-control" type="hidden" name="class_name" id="class_name" value="<?php echo $class_name ?>">
          <input type="hidden" name="phases_id" value="<?php echo $phase_id ?>">
          
          <input type="hidden" name="course_id" value="<?php echo $std_course1 ?>">
          <input type="hidden" name="class_id" id="class_id" value="<?php echo $classid ?>">
                          <table class="table table-bordered">
                            <thead class="bg-secondary">
<tr>

                              <th class="text-light">Id</th>
                              <th class="text-light">Item</th>
                              
                                <th class="text-light"><input type="radio" class="main_radio main_u" name="main">U</th>
                                <th class="text-light"><input type="radio" class="main_radio main_f" name="main">F</th>
                                <th class="text-light"><input type="radio" class="main_radio main_g" name="main">G</th>
                                <th class="text-light"><input type="radio" class="main_radio main_v" name="main">V</th>
                                <th class="text-light"><input type="radio" class="main_radio main_e" name="main">E</th>
                                <th class="text-light"><input type="radio" class="main_radio main_n" name="main">N</th>
                                <th class="text-light"></th>
                            </tr>
                            </thead>
                            <tbody>
                             
                              <?php
                            //fetch item
                            $allitem = "SELECT * FROM item where course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' LIMIT 15";
                            $statement = $connect->prepare($allitem);
                            $statement->execute();

                            if ($statement->rowCount() > 0) {
                              $result = $statement->fetchAll();
                              $sn112 = 15;
                              foreach ($result as $row) {
                                $item_db_id = $row['id'];
                                $cts=$row['CTS'];
                                $fetch_grade = $connect->prepare("SELECT grade FROM `item_gradesheet` WHERE item_id=? AND user_id=?");
                                $fetch_grade->execute([$item_db_id, $fetchuser_id]);
                                $grade = $fetch_grade->fetchColumn();
                                $bac_ground = "";

                                if ($grade == "U") {
                                  $bac_ground = "background-color:#ed4c78;color:white";
                                }
                                if ($grade == "F") {
                                  $bac_ground = "background-color:#f5ca99;color:white";
                                }
                                if ($grade == "G") {
                                  $bac_ground = "background-color:#71869d;color:white";
                                }
                                if ($grade == "E") {
                                  $bac_ground = "background-color:#377dff;color:white";
                                }

                                if ($grade == "V") {
                                  $bac_ground = "background-color:#00c9a7;color:white";
                                }
                                if ($grade == "N") {
                                  $bac_ground = "background-color:#525d53;color:white";
                                }
                            ?>
                                <tr class="Myitem" style="<?php echo $bac_ground ?>" id="color_tr<?php echo $sn112 ?>">
                                  <td><?php echo $sn112 ?></td>
                                  <td style="font-weight:bold;"><?php $item_id = $row['item'];
                                                                //select name of item of item id
                                                                $q = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                                                                $q->execute([$item_id]);
                                                                $name = $q->fetchColumn();
                                                                ?>
                                                                <span id="selectitemDropdown<?php echo $item_id ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><?php echo $name ?></span>

                                                               
                                    <input type="hidden" name="items_id[]" value="<?php echo $item_db_id ?>">
                                    <input type="hidden" name="std_idies[]" value="<?php echo $item_id ?>">
                                    <input type="hidden" name="std_sub[]" value="item">

                                    
                                        

                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectitemDropdown<?php echo $item_id ?>">
                                            <span class="dropdown-header">
                                            <?php 
                                                              $allitem1 = "SELECT * FROM item where item='$item_id'";
                                                              $statement1 = $connect->prepare($allitem1);
                                                              $statement1->execute();
                                  
                                                              if ($statement1->rowCount() > 0) {
                                                                $result1 = $statement1->fetchAll();
                                                                foreach ($result1 as $row1) {
                                                                  $tem_ides=$row1['id'];
                                                                  $table_class=$row1['class'];
                                                                  $table_class_id=$row1['class_id'];
                                                                  $q10 = $connect->prepare("SELECT instructor FROM `gradesheet` WHERE class_id=? and class='$table_class' and user_id='$fetchuser_id'");
                                                                  $q10->execute([$table_class_id]);
                                                                   $instructor_ides = $q10->fetchColumn();
                                                                   $q11 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                                                   $q11->execute([$instructor_ides]);
                                                                    $instructor_names = $q11->fetchColumn();
                                                                  if ($table_class == "actual") {
                                                                    $q8 = $connect->prepare("SELECT symbol FROM $table_class WHERE id=?");
                                                                  } else if ($table_class == "sim") {
                                                                    $q8 = $connect->prepare("SELECT shortsim FROM $table_class WHERE id=?");
                                                                  }
                                                                  $q8->execute([$table_class_id]);
                                                                  $name_cl = $q8->fetchColumn();
                                                                  $q3 = $connect->prepare("SELECT grade FROM `item_gradesheet` WHERE item_id=? and grade!='' and user_id='$fetchuser_id'");
                                                                  $q3->execute([$tem_ides]);
                                                                  $gradee = $q3->fetchColumn();
                                                                  echo '<span style="font-size:large;padding:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="'.$name_cl.'/'.$instructor_names.'">'.$gradee.'</span>';
                                                                }
                                                              }
                                            ?>
                                            </span>
                                           

                                        </div>
                                  </td>
                                  <td>

                                    <input style="margin: 5px; padding: 5px;" gradeval="U<?php echo $sn112 ?>" data-value="U" value="U" number="<?php echo $sn112 ?>" type="radio" class="myRadio1 " <?php if ($grade == "U") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> name="grade[item<?php echo $item_id ?>]" />
                                    </td>
                                    <td>
                                    <input style="margin: 5px; padding: 5px;" gradeval="F<?php echo $sn112 ?>" value="F" data-value="F" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "F") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> name="grade[item<?php echo $item_id ?>]" />
                                    </td>
                                    <td>
                                    <input style="margin: 5px; padding: 5px;" gradeval="G<?php echo $sn112 ?>" data-value="G" value="G" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "G") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> name="grade[item<?php echo $item_id ?>]" />
                                   </td>
                                   <td>
                                    <input style="margin: 5px; padding: 5px;" gradeval="V<?php echo $sn112 ?>" data-value="V" value="V" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "V") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> name="grade[item<?php echo $item_id ?>]" />
                                   </td>
                                   <td>
                                    <input style="margin: 5px; padding: 5px;" gradeval="E<?php echo $sn112 ?>" data-value="E" value="E" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "E") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> name="grade[item<?php echo $item_id ?>]" />
                                    </td>
                                    <td>
                                    <input style="margin: 5px; padding: 5px;" gradeval="N<?php echo $sn112 ?>" value="N" data-value="N" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "N") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> name="grade[item<?php echo $item_id ?>]" />
                                      </td>
                                      <td>
                                        <div style="display: flex;">
                                        <?php 
                                       
                                        if($cts=='1'){
                                          ?>
                                           <img style="height: 20px;" src="<?php echo BASE_URL; ?>assets/cts.png">
                                          <?php
                                        }
                                        ?>
                                 
                                  <i class="bi bi-exclamation" id="selectinfoDropdown<?php echo $item_id; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                                        

                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdown<?php echo $item_id; ?>">
                                            <span class="dropdown-header">
                                            <?php $allitemdes = "SELECT * FROM itembank where id='$item_id'";
                                            $statementallitemdes = $connect->prepare($allitemdes);
                                            $statementallitemdes->execute();

                                            if ($statementallitemdes->rowCount() > 0) {
                                              $resultallitemdes = $statementallitemdes->fetchAll();
                                              foreach ($resultallitemdes as $rowallitemdes) {
                                                echo "U :".$rowallitemdes['U'].'<br>';
                                                echo "F :".$rowallitemdes['F'].'<br>';
                                                echo "G :".$rowallitemdes['G'].'<br>';
                                                echo "V :".$rowallitemdes['V'].'<br>';
                                                echo "E :".$rowallitemdes['E'].'<br>';
                                                echo "N :".$rowallitemdes['N'].'<br>';
                                              }
                                            }
                                ?>
                                            </span>
                                            

                                        </div>
                                  
                                  <i class="bi bi-arrow-right-square append_data" data-appenditemid="<?php echo $sn112.' - '; ?>" data-appenditemname="<?php echo $name ?>"></i>
                                </div>
                                </td>
                                </tr>
                                <!-- fetch subitem -->
                                <?php
                                $allsubitem = "SELECT * FROM subitem where course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' AND item='$item_id'";
                                $statement = $connect->prepare($allsubitem);
                                $statement->execute();

                                if ($statement->rowCount() > 0) {
                                  $result1 = $statement->fetchAll();
                                  $sn116 = 'a';
                                  foreach ($result1 as $row1) {
                                    $std_subi = $row1['subitem'];
                                    $cts1=$row1['CTS'];
                                    $stud_subi = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
                                    $stud_subi->execute([$std_subi]);
                                    $name_sub = $stud_subi->fetchColumn();
                                    $bac_ground1 = "";
                                    $subitem_db_id = $row1['id'];
                                    $fetch_subgrade = $connect->prepare("SELECT grade FROM `subitem_gradesheet` WHERE subitem_id=? AND user_id=?");
                                    $fetch_subgrade->execute([$subitem_db_id, $fetchuser_id]);
                                    $grade1 = $fetch_subgrade->fetchColumn();
                                    if ($grade1 == "U") {
                                      $bac_ground1 = "background-color:#ed4c78;color:white";
                                    }
                                    if ($grade1 == "F") {
                                      $bac_ground1 = "background-color:#f5ca99;color:white";
                                    }
                                    if ($grade1 == "G") {
                                      $bac_ground1 = "background-color:#71869d;color:white";
                                    }
                                    if ($grade1 == "E") {
                                      $bac_ground1 = "background-color:#377dff;color:white";
                                    }

                                    if ($grade1 == "V") {
                                      $bac_ground1 = "background-color:#00c9a7;color:white";
                                    }
                                    if ($grade == "N") {
                                      $bac_ground1 = "background-color:#525d53;color:white";
                                    }
                                ?>
                                    <tr id="color_tr1<?php echo $sn116 . $sn112 ?>" class="subitem_tr" style="<?php echo $bac_ground1; ?>">
                                      <td style="text-align:end;"><?php echo $sn116; ?></td>
                                      <td><span id="selectitemDropdown<?php echo $std_subi ?>" style="margin-left:15px;"data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><?php echo $sub_value = $name_sub;?> </span>
                                          <input type="hidden" name="items_id[]" value="<?php echo $subitem_db_id ?>">
                                          <input type="hidden" name="std_idies[]" value="<?php echo $item_id ?>">
                                          <input type="hidden" name="std_sub[]" value="<?php echo $sub_value ?>">
                                          <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectitemDropdown<?php echo $std_subi ?>">
                                            <span class="dropdown-header">
                                            <?php 
                                                              $allsubitem = "SELECT * FROM subitem where subitem='$std_subi'";
                                                              $statement_sub = $connect->prepare($allsubitem);
                                                              $statement_sub->execute();
                                  
                                                              if ($statement_sub->rowCount() > 0) {
                                                                $result_sub = $statement_sub->fetchAll();
                                                               foreach ($result_sub as $row_sub) {
                                                                  $tem_ides=$row_sub['id'];
                                                                  $table_class=$row_sub['class'];
                                                                  $table_class_id=$row_sub['class_id'];
                                                                  $q10 = $connect->prepare("SELECT instructor FROM `gradesheet` WHERE class_id=? and class='$table_class' and user_id='$fetchuser_id'");
                                                                  $q10->execute([$table_class_id]);
                                                                   $instructor_ides = $q10->fetchColumn();
                                                                   $q11 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                                                   $q11->execute([$instructor_ides]);
                                                                    $instructor_names = $q11->fetchColumn();
                                                                  if ($table_class == "actual") {
                                                                    $q8 = $connect->prepare("SELECT symbol FROM $table_class WHERE id=?");
                                                                  } else if ($table_class == "sim") {
                                                                    $q8 = $connect->prepare("SELECT shortsim FROM $table_class WHERE id=?");
                                                                  }
                                                                  $q8->execute([$table_class_id]);
                                                                  $name_cl = $q8->fetchColumn();
                                                                  $q3 = $connect->prepare("SELECT grade FROM `subitem_gradesheet` WHERE subitem_id=? and grade!='' and user_id='$fetchuser_id'");
                                                                  $q3->execute([$tem_ides]);
                                                                  $gradee = $q3->fetchColumn();
                                                                  echo '<span style="font-size:large;padding:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="'.$name_cl.'/'.$instructor_names.'">'.$gradee.'</span>';
                                                                }
                                                              }
                                            ?>
                                            </span>
                                           

                                        </div>
                                        </td>
                                      <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="U" value="U" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "U") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="F" value="F" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "F") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="G" value="G" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "G") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="V" value="V" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "V") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="E" value="E" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "E") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="N" value="N" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "N") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                                      </td>
                                      <td>
                                        <div class="d-flex">
                                        <?php 
                                        if($cts1=='1'){
                                          ?>
                                          <img style="height: 20px;" src="<?php echo BASE_URL; ?>assets/cts.png"> 
                                          <?php 
                                        }
                                        ?>
                                  <i class="bi bi-exclamation" id="selectinfoDropdown<?php echo $std_subi ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                                        

                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdown<?php echo $std_subi; ?>">
                                            <span class="dropdown-header">
                                            <?php $allsubitemdes = "SELECT * FROM sub_item where id='$std_subi'";
                                            $statementallsubitemdes = $connect->prepare($allsubitemdes);
                                            $statementallsubitemdes->execute();

                                            if ($statementallsubitemdes->rowCount() > 0) {
                                              $resultallsubitemdes = $statementallsubitemdes->fetchAll();
                                              foreach ($resultallsubitemdes as $rowallsubitemdes) {
                                                echo "U :".$rowallsubitemdes['U'].'<br>';
                                                echo "F :".$rowallsubitemdes['F'].'<br>';
                                                echo "G :".$rowallsubitemdes['G'].'<br>';
                                                echo "V :".$rowallsubitemdes['V'].'<br>';
                                                echo "E :".$rowallsubitemdes['E'].'<br>';
                                                echo "N :".$rowallsubitemdes['N'].'<br>';
                                              }
                                            }?>
                                            </span>
                                            

                                        </div>
                                       
                                  <i class="bi bi-arrow-right-square append_data" data-appenditemid="<?php echo $sn112.$std_subi.' - '; ?>" data-appenditemname="<?php echo $name_sub ?>"></i>
                                </div>
                                </td>
                                    </tr>
                            <?php
                                    $sn116++;
                                  }
                                }
                                $sn112++;
                              }
                            }
                            ?>
                              
                            </tbody>
                          </table>
                        </div>

                        <div class="col-4">
                        <table class="table table-bordered">
                            <thead class="bg-secondary">
<tr>

                              <th class="text-light">Id</th>
                              <th class="text-light">Item</th>
                              
                                <th class="text-light"><input type="radio" class="main_radio main_u" name="main">U</th>
                                <th class="text-light"><input type="radio" class="main_radio main_f" name="main">F</th>
                                <th class="text-light"><input type="radio" class="main_radio main_g" name="main">G</th>
                                <th class="text-light"><input type="radio" class="main_radio main_v" name="main">V</th>
                                <th class="text-light"><input type="radio" class="main_radio main_e" name="main">E</th>
                                <th class="text-light"><input type="radio" class="main_radio main_n" name="main">N</th>
                                <th class="text-light"></th>
                            </tr>
                            </thead>
                            <tbody>
                             
                              <?php
                            //fetch item
                            $allitem = "SELECT * FROM item where course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' LIMIT 15 OFFSET 15";
                            $statement = $connect->prepare($allitem);
                            $statement->execute();

                            if ($statement->rowCount() > 0) {
                              $result = $statement->fetchAll();
                              $sn112 = 1;
                              foreach ($result as $row) {
                                $item_db_id = $row['id'];
                                $cts=$row['CTS'];
                                $fetch_grade = $connect->prepare("SELECT grade FROM `item_gradesheet` WHERE item_id=? AND user_id=?");
                                $fetch_grade->execute([$item_db_id, $fetchuser_id]);
                                $grade = $fetch_grade->fetchColumn();
                                $bac_ground = "";

                                if ($grade == "U") {
                                  $bac_ground = "background-color:#ed4c78;color:white";
                                }
                                if ($grade == "F") {
                                  $bac_ground = "background-color:#f5ca99;color:white";
                                }
                                if ($grade == "G") {
                                  $bac_ground = "background-color:#71869d;color:white";
                                }
                                if ($grade == "E") {
                                  $bac_ground = "background-color:#377dff;color:white";
                                }

                                if ($grade == "V") {
                                  $bac_ground = "background-color:#00c9a7;color:white";
                                }
                                if ($grade == "N") {
                                  $bac_ground = "background-color:#525d53;color:white";
                                }
                            ?>
                                <tr class="Myitem" style="<?php echo $bac_ground ?>" id="color_tr<?php echo $sn112 ?>">
                                  <td><?php echo $sn112 ?></td>
                                  <td style="font-weight:bold;"><?php $item_id = $row['item'];
                                                                //select name of item of item id
                                                                $q = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                                                                $q->execute([$item_id]);
                                                                $name = $q->fetchColumn();
                                                                ?>
                                                                <span id="selectitemDropdown<?php echo $item_id ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><?php echo $name ?></span>

                                                               
                                    <input type="hidden" name="items_id[]" value="<?php echo $item_db_id ?>">
                                    <input type="hidden" name="std_idies[]" value="<?php echo $item_id ?>">
                                    <input type="hidden" name="std_sub[]" value="item">

                                    
                                        

                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectitemDropdown<?php echo $item_id ?>">
                                            <span class="dropdown-header">
                                            <?php 
                                                              $allitem1 = "SELECT * FROM item where item='$item_id'";
                                                              $statement1 = $connect->prepare($allitem1);
                                                              $statement1->execute();
                                  
                                                              if ($statement1->rowCount() > 0) {
                                                                $result1 = $statement1->fetchAll();
                                                                foreach ($result1 as $row1) {
                                                                  $tem_ides=$row1['id'];
                                                                  $table_class=$row1['class'];
                                                                  $table_class_id=$row1['class_id'];
                                                                  $q10 = $connect->prepare("SELECT instructor FROM `gradesheet` WHERE class_id=? and class='$table_class' and user_id='$fetchuser_id'");
                                                                  $q10->execute([$table_class_id]);
                                                                   $instructor_ides = $q10->fetchColumn();
                                                                   $q11 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                                                   $q11->execute([$instructor_ides]);
                                                                    $instructor_names = $q11->fetchColumn();
                                                                  if ($table_class == "actual") {
                                                                    $q8 = $connect->prepare("SELECT symbol FROM $table_class WHERE id=?");
                                                                  } else if ($table_class == "sim") {
                                                                    $q8 = $connect->prepare("SELECT shortsim FROM $table_class WHERE id=?");
                                                                  }
                                                                  $q8->execute([$table_class_id]);
                                                                  $name_cl = $q8->fetchColumn();
                                                                  $q3 = $connect->prepare("SELECT grade FROM `item_gradesheet` WHERE item_id=? and grade!='' and user_id='$fetchuser_id'");
                                                                  $q3->execute([$tem_ides]);
                                                                  $gradee = $q3->fetchColumn();
                                                                  echo '<span style="font-size:large;padding:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="'.$name_cl.'/'.$instructor_names.'">'.$gradee.'</span>';
                                                                }
                                                              }
                                            ?>
                                            </span>
                                           

                                        </div>
                                  </td>
                                  <td>

                                    <input style="margin: 5px; padding: 5px;" gradeval="U<?php echo $sn112 ?>" data-value="U" value="U" number="<?php echo $sn112 ?>" type="radio" class="myRadio1 " <?php if ($grade == "U") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> name="grade[item<?php echo $item_id ?>]" />
                                    </td>
                                    <td>
                                    <input style="margin: 5px; padding: 5px;" gradeval="F<?php echo $sn112 ?>" value="F" data-value="F" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "F") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> name="grade[item<?php echo $item_id ?>]" />
                                    </td>
                                    <td>
                                    <input style="margin: 5px; padding: 5px;" gradeval="G<?php echo $sn112 ?>" data-value="G" value="G" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "G") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> name="grade[item<?php echo $item_id ?>]" />
                                   </td>
                                   <td>
                                    <input style="margin: 5px; padding: 5px;" gradeval="V<?php echo $sn112 ?>" data-value="V" value="V" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "V") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> name="grade[item<?php echo $item_id ?>]" />
                                   </td>
                                   <td>
                                    <input style="margin: 5px; padding: 5px;" gradeval="E<?php echo $sn112 ?>" data-value="E" value="E" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "E") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> name="grade[item<?php echo $item_id ?>]" />
                                    </td>
                                    <td>
                                    <input style="margin: 5px; padding: 5px;" gradeval="N<?php echo $sn112 ?>" value="N" data-value="N" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "N") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> name="grade[item<?php echo $item_id ?>]" />
                                      </td>
                                      <td>
                                        <div style="display: flex;">
                                        <?php 
                                       
                                        if($cts=='1'){
                                          ?>
                                           <img style="height: 20px;" src="<?php echo BASE_URL; ?>assets/cts.png">
                                          <?php
                                        }
                                        ?>
                                 
                                  <i class="bi bi-exclamation" id="selectinfoDropdown<?php echo $item_id; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                                        

                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdown<?php echo $item_id; ?>">
                                            <span class="dropdown-header">
                                            <?php $allitemdes = "SELECT * FROM itembank where id='$item_id'";
                                            $statementallitemdes = $connect->prepare($allitemdes);
                                            $statementallitemdes->execute();

                                            if ($statementallitemdes->rowCount() > 0) {
                                              $resultallitemdes = $statementallitemdes->fetchAll();
                                              foreach ($resultallitemdes as $rowallitemdes) {
                                                echo "U :".$rowallitemdes['U'].'<br>';
                                                echo "F :".$rowallitemdes['F'].'<br>';
                                                echo "G :".$rowallitemdes['G'].'<br>';
                                                echo "V :".$rowallitemdes['V'].'<br>';
                                                echo "E :".$rowallitemdes['E'].'<br>';
                                                echo "N :".$rowallitemdes['N'].'<br>';
                                              }
                                            }
                                ?>
                                            </span>
                                            

                                        </div>
                                  
                                  <i class="bi bi-arrow-right-square"></i>
                                </div>
                                </td>
                                </tr>
                                <!-- fetch subitem -->
                                <?php
                                $allsubitem = "SELECT * FROM subitem where course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' AND item='$item_id'";
                                $statement = $connect->prepare($allsubitem);
                                $statement->execute();

                                if ($statement->rowCount() > 0) {
                                  $result1 = $statement->fetchAll();
                                  $sn116 = 'a';
                                  foreach ($result1 as $row1) {
                                    $std_subi = $row1['subitem'];
                                    $cts1=$row1['CTS'];
                                    $stud_subi = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
                                    $stud_subi->execute([$std_subi]);
                                    $name_sub = $stud_subi->fetchColumn();
                                    $bac_ground1 = "";
                                    $subitem_db_id = $row1['id'];
                                    $fetch_subgrade = $connect->prepare("SELECT grade FROM `subitem_gradesheet` WHERE subitem_id=? AND user_id=?");
                                    $fetch_subgrade->execute([$subitem_db_id, $fetchuser_id]);
                                    $grade1 = $fetch_subgrade->fetchColumn();
                                    if ($grade1 == "U") {
                                      $bac_ground1 = "background-color:#ed4c78;color:white";
                                    }
                                    if ($grade1 == "F") {
                                      $bac_ground1 = "background-color:#f5ca99;color:white";
                                    }
                                    if ($grade1 == "G") {
                                      $bac_ground1 = "background-color:#71869d;color:white";
                                    }
                                    if ($grade1 == "E") {
                                      $bac_ground1 = "background-color:#377dff;color:white";
                                    }

                                    if ($grade1 == "V") {
                                      $bac_ground1 = "background-color:#00c9a7;color:white";
                                    }
                                    if ($grade == "N") {
                                      $bac_ground1 = "background-color:#525d53;color:white";
                                    }
                                ?>
                                    <tr id="color_tr1<?php echo $sn116 . $sn112 ?>" class="subitem_tr" style="<?php echo $bac_ground1; ?>">
                                      <td style="text-align:end;"><?php echo $sn116; ?></td>
                                      <td><span id="selectitemDropdown<?php echo $std_subi ?>" style="margin-left:15px;"data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><?php echo $sub_value = $name_sub;?> </span>
                                          <input type="hidden" name="items_id[]" value="<?php echo $subitem_db_id ?>">
                                          <input type="hidden" name="std_idies[]" value="<?php echo $item_id ?>">
                                          <input type="hidden" name="std_sub[]" value="<?php echo $sub_value ?>">
                                          <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectitemDropdown<?php echo $std_subi ?>">
                                            <span class="dropdown-header">
                                            <?php 
                                                              $allsubitem = "SELECT * FROM subitem where subitem='$std_subi'";
                                                              $statement_sub = $connect->prepare($allsubitem);
                                                              $statement_sub->execute();
                                  
                                                              if ($statement_sub->rowCount() > 0) {
                                                                $result_sub = $statement_sub->fetchAll();
                                                               foreach ($result_sub as $row_sub) {
                                                                  $tem_ides=$row_sub['id'];
                                                                  $table_class=$row_sub['class'];
                                                                  $table_class_id=$row_sub['class_id'];
                                                                  $q10 = $connect->prepare("SELECT instructor FROM `gradesheet` WHERE class_id=? and class='$table_class' and user_id='$fetchuser_id'");
                                                                  $q10->execute([$table_class_id]);
                                                                   $instructor_ides = $q10->fetchColumn();
                                                                   $q11 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                                                   $q11->execute([$instructor_ides]);
                                                                    $instructor_names = $q11->fetchColumn();
                                                                  if ($table_class == "actual") {
                                                                    $q8 = $connect->prepare("SELECT symbol FROM $table_class WHERE id=?");
                                                                  } else if ($table_class == "sim") {
                                                                    $q8 = $connect->prepare("SELECT shortsim FROM $table_class WHERE id=?");
                                                                  }
                                                                  $q8->execute([$table_class_id]);
                                                                  $name_cl = $q8->fetchColumn();
                                                                  $q3 = $connect->prepare("SELECT grade FROM `subitem_gradesheet` WHERE subitem_id=? and grade!='' and user_id='$fetchuser_id'");
                                                                  $q3->execute([$tem_ides]);
                                                                  $gradee = $q3->fetchColumn();
                                                                  echo '<span style="font-size:large;padding:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="'.$name_cl.'/'.$instructor_names.'">'.$gradee.'</span>';
                                                                }
                                                              }
                                            ?>
                                            </span>
                                           

                                        </div>
                                        </td>
                                      <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="U" value="U" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "U") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="F" value="F" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "F") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="G" value="G" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "G") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="V" value="V" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "V") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="E" value="E" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "E") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="N" value="N" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "N") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                                      </td>
                                      <td>
                                        <div class="d-flex">
                                        <?php 
                                        if($cts1=='1'){
                                          ?>
                                          <img style="height: 20px;" src="<?php echo BASE_URL; ?>assets/cts.png"> 
                                          <?php 
                                        }
                                        ?>
                                  <i class="bi bi-exclamation" id="selectinfoDropdown<?php echo $std_subi ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                                        

                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdown<?php echo $std_subi; ?>">
                                            <span class="dropdown-header">
                                            <?php $allsubitemdes = "SELECT * FROM sub_item where id='$std_subi'";
                                            $statementallsubitemdes = $connect->prepare($allsubitemdes);
                                            $statementallsubitemdes->execute();

                                            if ($statementallsubitemdes->rowCount() > 0) {
                                              $resultallsubitemdes = $statementallsubitemdes->fetchAll();
                                              foreach ($resultallsubitemdes as $rowallsubitemdes) {
                                                echo "U :".$rowallsubitemdes['U'].'<br>';
                                                echo "F :".$rowallsubitemdes['F'].'<br>';
                                                echo "G :".$rowallsubitemdes['G'].'<br>';
                                                echo "V :".$rowallsubitemdes['V'].'<br>';
                                                echo "E :".$rowallsubitemdes['E'].'<br>';
                                                echo "N :".$rowallsubitemdes['N'].'<br>';
                                              }
                                            }?>
                                            </span>
                                            

                                        </div>
                                       
                                  <i class="bi bi-arrow-right-square"></i>
                                </div>
                                </td>
                                    </tr>
                            <?php
                                    $sn116++;
                                  }
                                }
                                $sn112++;
                              }
                            }
                            ?>
                              
                            </tbody>
                          </table>
                          Extra item subitem
                          <table class="table table-bordered table-striped">
                            <thead class="bg-secondary">
                              <tr>
                              <th class="text-light">Id</th>
                              <th class="text-light">Item</th>
                              <th class="text-light"><input type="radio" class="main_radio main_u" name="main">U</th>
                                <th class="text-light"><input type="radio" class="main_radio main_f" name="main">F</th>
                                <th class="text-light"><input type="radio" class="main_radio main_g" name="main">G</th>
                                <th class="text-light"><input type="radio" class="main_radio main_v" name="main">V</th>
                                <th class="text-light"><input type="radio" class="main_radio main_e" name="main">E</th>
                                <th class="text-light"><input type="radio" class="main_radio main_n" name="main">N</th>
                                <th class="text-light"></th>
                               
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                               $extra_item_subitem = "SELECT * FROM extra_item_subitem where user_id='$fetchuser_id' and class_id='$classid' AND class='$class_name'";
                              $extra_item_subitemstatement = $connect->prepare($extra_item_subitem);
                              $extra_item_subitemstatement->execute();
  
                              if ($extra_item_subitemstatement->rowCount() > 0) {
                                $extra_item_subitemresult = $extra_item_subitemstatement->fetchAll();
                                $snextra_item_subitem = 1;
                                foreach ($extra_item_subitemresult as $exrow1) {
                                  $iddes=$exrow1['id'];
                                  if($exrow1['data_type']=="subitem"){
                                    $tbale_fethc="sub_item";
                                    $tbale_vlaue="subitem";
                                  }else{
                                    $tbale_fethc="itembank";
                                    $tbale_vlaue="item";
                                  }
                                    $stud_subi1 = $connect->prepare("SELECT $tbale_vlaue FROM `$tbale_fethc` WHERE id=?");
                                    $stud_subi1->execute([$iddes]);
                                    $name_sub1 = $stud_subi1->fetchColumn();
                                  
                                  ?>
                                <tr>
                                  <td><?php echo $snextra_item_subitem++ ?></td>
                                  <td><?php echo $name_sub1 ?></td>
                                </td>
                                      <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="U" value="U" name="grades[]"/></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="F" value="F" name="grades[]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="G" value="G" name="grades[]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="V" value="V" name="grades[]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="E" value="E" name="grades[]" /></td>
                                                                                                                                                                                        <td>
                                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="N" value="N" name="grades[]" />
                                      </td>
                                      <td>
                                      <i class="bi bi-exclamation"></i><i class="bi bi-arrow-right-square"></i>
                                      </td>
                                </tr>
                                <?php }
                              }
                              ?>
                            
                            </tbody>
                          </table>
                        </div>
                        <div class="col-4">
                         

                        <div>

                          <?php if ($comments != "") { ?>
                            <textarea style="height: 500px; width:auto;" name="comment" class="append_value" placeholder="comments" rows="4" id="comment1"><?php echo $comments ?></textarea>
                          <?php } else { ?>
                            <textarea style="height: 500px; width:auto;" name="comment" class="append_value" placeholder="comments" rows="4" id="comment1"></textarea>
                          <?php } ?>
                          </div>

                          <div class="card card-hover-shadow">
                          <div class="card-body">
                            <table>
                            <?php
                            $hash_valuees="";
                            //fetch item
                            $allhash = "SELECT * FROM hashoff_gradesheet where ctpId='$std_course1' and classId='$classid' AND phaseId='$phase_id' AND className='$class_name'";
                            $hashstatement = $connect->prepare($allhash);
                            $hashstatement->execute();

                            if ($hashstatement->rowCount() > 0) {
                              $hashresult = $hashstatement->fetchAll();
                              $snhash = 1;
                              foreach ($hashresult as $row1) { 
                                $hashCheck = $row1['hashCheck'];
                                $fetch_hash_name = $connect->prepare("SELECT hashoff FROM `hashoff` WHERE id=?");
                                $fetch_hash_name->execute([$hashCheck]);
                                $hash_names = $fetch_hash_name->fetchColumn();
                                $fetch_hash_value = $connect->prepare("SELECT hash_off_value FROM `gradsheet_final_hashoff` WHERE hash_off=? and user_id='$fetchuser_id' and class_id='$classid' and class_name='$class_name'");
                                $fetch_hash_value->execute([$hashCheck]);
                                 $hash_value = $fetch_hash_value->fetchColumn();
                                if($hash_value!=""){
                                  $hash_valuees=$hash_value;
                                }else{
                                  $hash_valuees=0;
                                }
                                ?>
                              <tr>
                                <td>
                                  <div style="display: flex;">
                                  <label><?php echo $hash_names ?>
                                <input type="hidden" value="<?php echo $row1['hashCheck']; ?>" name="hashoff[]">
                                </label>
                                <button class="btn btn-sm decrement" type="button" value="<?php echo $row1['id']; ?>" onclick="decrement(this.value)"><i class="bi bi-dash-circle"></i></button>
                                  <input type="text" readonly style="width:40px;border-radius:5px" id="counting<?php echo $row1['id']; ?>" class="count" name="hashoff_value[]" value="<?php echo $hash_valuees; ?>">
                                  <button class="btn btn-sm increment" type="button" value="<?php echo $row1['id']; ?>" onclick="increment(this.value)"><i class="bi bi-plus-circle"></i></button>
                                 </div>
                                </td>
                               
                          </tr>
                               <?php }
                              } ?>
                            </table>
                          </div>
                        </div>

                        <div class="card card-hover-shadow">
                          <div class="card-body">
                            <center>
                            <!-- <button class="btn btn-primary">Add</button> -->
                          <div style="display:flex; align-items: center;">  
                            <div class="dropdown dropup m-1">
                              
                                         <button type="button" class="btn btn-secondary status_button" id="selectLanguageDropdown1" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                        <?php if($status_name1!=""){
                                          echo "$status_name1";
                                        }   else{
                                          echo "Status";
                                        } ?>
                                        
                                        </button>

                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown1">
                                            <span class="dropdown-header">Status
                                            </span>
                                            <table class="table table-striped table-bordered" id="codetable">
              <input style="margin:5px;" class="form-control" type="text" id="codesearch" onkeyup="code()" placeholder="Search for Codes.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-light">Sr No</th>
                <th class="text-light">Code</th>
                <th class="text-light">Description</th>
                <th class="text-light">Explanation</th>
                <th class="text-light">Progression</th>
                
              </thead>
              <?php

              $output1 = "";
              $query1 = "SELECT * FROM `status`";
              $statement1 = $connect->prepare($query1);
              $statement1->execute();
              if ($statement1->rowCount() > 0) {
                $result1 = $statement1->fetchAll();
                $sn1 = 1;
                foreach ($result1 as $row1) {
                  $id = $row1["id"];
              ?>
                  <tr>

                    <td><input type="radio" class="status" name="status" value="<?php echo $row1['id']; ?>"></td>
                    <td><?php echo $row1['code']; ?></td>
                    <td><?php echo $row1['description']; ?></td>
                    <td><?php echo $row1['explanation']; ?></td>
                    <td><?php echo $row1['progression']; ?></td>
                    
                  </tr>
              <?php
                }
              }
              ?>
            </table>
                                        </div>
                                    </div>
                            <button class="btn btn-outline-success m-1" style="display:none;"><i class="bi bi-badge-ad"></i></button>
                              <button class="btn btn-outline-danger m-1" style="display:none;"><i class="bi bi-card-text"></i></button>
                              <button class="btn btn-outline-secondary m-1" style="display:none;"><i class="bi bi-book"></i></button>
                              <button class="btn btn-outline-info m-1" style="display:none;"><i class="bi bi-ui-checks"></i></button>
                              <!-- <button class="btn btn-success"><i class="bi bi-house-add"></i></button> -->
                              <button class="btn btn-outline-warning m-1" style="display:none;"><i class="bi bi-list-check"></i></button>
                              <button class="btn btn-success m-1" style="display:none;"><i class="bi bi-paperclip"></i></button>
                              
                            <div class="dropdown dropup m-1">
                              
                                        <button type="button" class="btn btn-primary" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                            Add
                                        </button>

                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown" style="width:300px; height:600px; overflow-y:auto;">
                                            <span class="dropdown-header">Extra item
                                            </span>

                                            <!-- <form action="extra_item_subitem.php" method="post"> -->
                                            <table class="table table-bordered table-striped" id="itemsubitem">
                                              <input class="form-control" type="text" id="searchitem" onkeyup="item_Search()" placeholder="Search for Folder.." title="Type in a name"><br>
                            <thead class="bg-dark">
                              <th class="text-light"><input type="checkbox" name="uuu[]"></th>
                              <th class="text-light">Item</th>
                            </thead>
                            <tbody>
                              <?php 

                              $allnotitem = "SELECT * FROM itembank";
                              $statementallnotitem = $connect->prepare($allnotitem);
                              $statementallnotitem->execute();
  
                              if ($statementallnotitem->rowCount() > 0) {
                                $resultallnotitem = $statementallnotitem->fetchAll();
                                foreach ($resultallnotitem as $rowallnotitem) {
                                  $rowallnotitem1=$rowallnotitem['id'];
                                  $item_idesss=$rowallnotitem['item'];
                                      $sql521 = "SELECT count(*) FROM `extra_item_subitem` WHERE item_id='$rowallnotitem1' AND data_type='item'";
                                      $result521 = $connect->prepare($sql521);
                                      $result521->execute();
                                      $number_of_rows121 = $result521->fetchColumn();
                                  $sql51 = "SELECT count(*) FROM `item` WHERE course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' and item='$rowallnotitem1'";
                                  $result51 = $connect->prepare($sql51);
                                  $result51->execute();
                                  $number_of_rows11 = $result51->fetchColumn();
                                  if ($number_of_rows11 == 0 && $number_of_rows121==0) {
                                    ?>
                                    <tr>
                                      <td><input type="checkbox" name="item[]" value="<?php echo $rowallnotitem1?>"></td>
                                      <td><?php echo $rowallnotitem['item']; ?></td>
                                  </tr>
                                    <?php 
                                  }
                                  

                                }
                              }
                              $allnotsubitem = "SELECT * FROM sub_item";
                                  $statementallnotsubitem = $connect->prepare($allnotsubitem);
                                  $statementallnotsubitem->execute();
      
                                  if ($statementallnotsubitem->rowCount() > 0) {
                                    $resultallnotsubitem = $statementallnotsubitem->fetchAll();
                                    foreach ($resultallnotsubitem as $rowallnotsubitem) {
                                      $rowallnotsubitem1=$rowallnotsubitem['id'];
                                      $sql522 = "SELECT count(*) FROM `extra_item_subitem` WHERE item_id='$rowallnotsubitem1' AND data_type='subitem'";
                                      $result522 = $connect->prepare($sql522);
                                      $result522->execute();
                                      $number_of_rows121 = $result522->fetchColumn();
                                  $sql52 = "SELECT count(*) FROM `subitem` WHERE course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' and subitem='$rowallnotsubitem1'";
                                  $result52 = $connect->prepare($sql52);
                                  $result52->execute();
                                  $number_of_rows12 = $result52->fetchColumn();
                                  if ($number_of_rows12 == 0 && $number_of_rows121==0) {
                                    ?>
                                    <tr>
                                      <td><input type="checkbox" name="subitem[]" value="<?php echo $rowallnotsubitem1?>"></td>
                                      <td><?php echo $rowallnotsubitem['subitem']; ?></td>
                                  </tr>
                                    <?php 
                                  }

                                    }
                                  }
                              ?>
                         </tbody>
                          </table>
                          <!-- <button type="submit" class="btn btn-success">Add</button> -->
                                <!-- </form> -->
                                        </div>
                                    </div>
                                    <div class="dropdown dropup m-1">
                              
                                        <button type="button" class="btn btn-warning" id="selectLanguageDropdown2" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                        <i class="bi bi-chat-left-text-fill"></i>
                                        </button>
                                       
                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown2" style="width:600px; height:200px; overflow-y:auto;">
                                            <span class="dropdown-header">over all comments
                                            <?php
                          if ($over_all_comment != "") { ?>
                            <pre><textarea style="width:95%; margin: 10px; border-radius: 20px;" name="overall_data" placeholder="overall" rows="4" cols="50" id="overall_all_com"><?php echo $over_all_comment ?></textarea></pre><br>
                          <?php } else { ?>
                            <pre><textarea style="width:95%; margin: 10px; border-radius:20px;" name="overall_data" placeholder="overall" rows="4" cols="50" id="overall_all_com"> </textarea></pre><br>

                          <?php } ?>
                                            </span>
                                   

                                        </div>
                                    </div>
                                    
                        
                        
                      </div>
                    </center>
                          </div>
                        </div>

                        <div class="card card-hover-shadow">
                          <div class="card-body">
                            <center>
                           <table>
                           <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#detailsper"><i class="bi bi-info-circle"></i></button>
                            
                            <center>
                              <tr>
                                <?php

                                //fetch overall garde
                                $overall_grade = $connect->prepare("SELECT over_all_grade, over_all_grade_per FROM `gradesheet` WHERE user_id=? and course_id=? AND class_id=? AND phase_id=? AND class=?");
                                $overall_grade->execute([$fetchuser_id, $std_course1, $classid, $phase_id, $class_name]);
                                $fetch_overall_grade = $overall_grade->fetchColumn();

                                ?>

                                <td style="display: flex; text-align: center; font-size:large;">
                                  <?php $grade_per = "";
                                  $que = "SELECT * FROM grade_per";
                                  $stat = $connect->prepare($que);
                                  $stat->execute();
                                  if ($stat->rowCount() > 0) {
                                    $result6 = $stat->fetchAll();
                                    $sn7 = 1;
                                    foreach ($result6 as $row6) {
                                      $grade = $row6['grade'];
                                      if ($row6['permission'] == '1') { ?>
                                        <input style="margin:10px;" type="radio" onclick="return false" class="myRadio" value="<?php echo $grade ?>" <?php if ($fetch_overall_grade == $grade) {
                                                                                                                                                        echo "checked";
                                                                                                                                                      } ?> id="<?php echo $grade ?>" name="overall_grade"><span style="font-weight:bold;" id="<?php echo $grade . '1'; ?>"><?php echo $grade ?></span>
                                      <?PHP } else {
                                      ?>
                                        <input style="margin:10px;" onclick="return false" type="radio" class="myRadio" value="<?php echo $grade ?>" <?php if ($fetch_overall_grade == $grade) {
                                                                                                                                                        echo "checked";
                                                                                                                                                      } ?> id="<?php echo $grade ?>" name="overall_grade"><span style="font-weight:bold;" id="<?php echo $grade . '1'; ?>"><?php echo $grade ?></span>
                                  <?php
                                      }
                                    }
                                  } ?>
                                </td>


                              </tr>
                            </center>

                            <tr>
                              <td>
                                <span id="slider_value" style="color:red; font-size:20px; font-weight:bolder; display:none;"></span>
                                <?php
                                $bac_ground2 = "";
                                if ($fetch_overall_grade == "U") {
                                  $bac_ground2 = "background-color:#ed4c78;color:white;";
                                }
                                if ($fetch_overall_grade == "F") {
                                  $bac_ground2 = "background-color:#f2c99b;color:white;";
                                }
                                if ($fetch_overall_grade == "G") {
                                  $bac_ground2 = "background-color:#71869d;color:white;";
                                }
                                if ($fetch_overall_grade == "E") {
                                  $bac_ground2 = "background-color:#377dff;color:white;";
                                }
                                if ($fetch_overall_grade == "N") {
                                  $bac_ground2 = "background-color:#525d53;color:white;";
                                }
                                if ($fetch_overall_grade == "V") {
                                  $bac_ground2 = "background-color:#00c9a7;color:white;";
                                }
                                if ($fetch_overall_grade != "") { ?>
                                  <input type="hidden" required name="overall_grade_per" id="silder_get_value">
                                  <input type="number" name="overall_grade_per" style="color:white; text-align: center; font-weight:bold; font-size: large;<?php echo $bac_ground2 ?>" value="<?php echo $over_all_grade_per; ?>" class="form-control check_over_all_per" id="gradesper" onkeyup="displayRadioValue(this.value);" />
                                <?php } else { ?>
                                  <input type="number" name="overall_grade_per" style="color:black; text-align: center; font-weight:bold; font-size: large;" class="form-control check_over_all_per" id="gradesper" onkeyup="displayRadioValue(this.value);">
                                <?php } ?>

                              </td>
                            </tr>

                            <tr>
                              <td>
                                <center>
                                  <?php
                                  $percentage;
                                  ?></center>
                              </td>
                            </tr>
                            <?php if($role=="instructor"){?>
                            <tr>
                              <td>
                                <center>
                                <input type="submit" id="update_gradsheet_but" class="btn btn-success" name="ins_sub" value="Update"/>  
                                <input type="submit" id="submit_gradsheet_but" class="btn btn-success" name="ins_sub" value="submit" onclick="return confirm('Are you sure?Once submitted gradsheet will get lock..?')" /></center>
                              </td>
                            </tr>
                            <?php } ?>
                          </table>

                           
                        </center>
                          </div>
                        </div>

                          <!-- <div class="row">
                          <button class="btn btn-primary">Add</button>
                          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add1_modal">Add</button>
                        </div>
                        <center>
                        <div class="row">
                          <button class="btn btn-outline-success">Update</button>
                          <button class="btn btn-outline-success">Submit</button>
                        </div>
                      </center> -->
                        </div>
                        
                      </div>

                      <div class="row">
                        
                        <div class="col-sm">
                    
                          </form>
                          <center>
                            
                          <button class="btn btn-outline-success">Additional Task</button>
                          <button class="btn btn-outline-success">Unaccomplish Task</button>
                        </center>
                        </div>
                      

                        <div class="col-sm">
                         
                        </div>

                        <div class="col-sm">
                          
                        </div>
                      </div>
                    </div>
                


    <!--modal for percentage info-->
  <div class="modal fade" id="detailsper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Percentage</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <table class="table table-striped table-bordered">
                        <input style="width:50%; display: none;" class="form-control" type="text" onkeyup="score()" placeholder="Search for name.." title="Type in a name">
                        <thead class="bg-dark">
                            <th class="text-light">Sr No</th>
                            <th class="text-light">Type</th>
                            <th class="text-light">Percentage</th>
                            
                            <th class="text-light">Description</th>
                            
                        </thead>
                        <?php
                        $output6 = "";
                        $query6 = "SELECT * FROM percentage  ORDER BY id ASC";
                        $statement6 = $connect->prepare($query6);
                        $statement6->execute();
                        if ($statement6->rowCount() > 0) {
                            $result6 = $statement6->fetchAll();
                            $sn6 = 1;
                            foreach ($result6 as $key=>$row6) {
                        ?>
                                <tr>
                                    <?php
                                    if ($key==5) {
                                      echo "<td>-</td>";
                                    }
                                    else
                                    {
                                      echo "<td> $key </td>";
                                    }
                                    ?>
                                  
                                    <td><h6 style="color:<?php echo $row6['color']; ?>"><?php echo $row6['percentagetype']; ?></h6></td>
                                    <td><?php echo $row6['percentage']; ?></td>
                                    
                                    <td><?php echo $row6['description']; ?></td>
                                    
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
          </center>
        </div>
      </div>
    </div>
  </div>


    <div class="modal fade" id="itemdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Phase</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <div id="get_item_data">

          </div>
        </center>
      </div>
    </div>
  </div>
</div>


  <div class="modal fade" id="add1_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success" id="exampleModalLabel">Add</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         ..............
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<script src="<?php echo BASE_URL; ?>assets/tinymce/tinymce.min.js"></script>

  <!-- Include the Quill library -->
    <!-- <script src="<?php echo BASE_URL;?>assets/vendor/quill/dist/quill.min.js"></script> -->

    <script>
    tinymce.init({
      selector: '#comment',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | formatselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | emoticons charmap',
      menubar: false,
      textcolor_map: [
        "000000", "Black",
        "FF0000", "Red",
        "00FF00", "Green",
        "0000FF", "Blue"
      ],
      color_picker_callback: function(callback, value, meta) {
        if (meta === 'forecolor') {
          tinymce.activeEditor.windowManager.openUrl({
            title: 'Select Text Color',
            url: 'color_picker.html', // Replace with your custom color picker URL
            onMessage: function(instance, message) {
              callback(message.color);
            }
          });
        } else if (meta === 'backcolor') {
          tinymce.activeEditor.windowManager.openUrl({
            title: 'Select Background Color',
            url: 'color_picker.html', // Replace with your custom color picker URL
            onMessage: function(instance, message) {
              callback(message.color);
            }
          });
        }
      }
    });
  </script>
<script>
  // Initialize an object to store values for each item
  const itemValues = {};

  // Creation of increment function
  function increment(value) {
    if (!itemValues[value]) {
      itemValues[value] = 0; // Initialize the value to 0 for new items
    }
    itemValues[value]++; // Increment the value for the specific item
    // document.getElementById("counting" + value).innerText = itemValues[value];
    document.getElementById("counting" + value).setAttribute('value', itemValues[value]);
  }

  // Creation of decrement function
  function decrement(value) {
    if (!itemValues[value]) {
      itemValues[value] = 0; // Initialize the value to 0 for new items
    }
    if (itemValues[value] > 0) {
      itemValues[value]--; // Decrement the value for the specific item if it's greater than 0
      // document.getElementById("counting" + value).innerText = itemValues[value];
      document.getElementById("counting" + value).setAttribute('value', itemValues[value]);
    }
  }
</script>

  <script>
  function code() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("codesearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("codetable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>

  <script>
  function item_Search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchitem");
    filter = input.value.toUpperCase();
    table = document.getElementById("itemsubitem");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>
</body>
</html>