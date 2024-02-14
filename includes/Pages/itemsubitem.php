<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

$phase_id = "";
$actclass = "";
$simclass = "";
$academicclass = "";
$vehnum = "";
$vehtype = "";

$class = "";
$classid = "";
$over_all_comment = "";
$comments = "";
$noti_id = "";


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
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>includes/Pages/gradesheetcss.css">

  <style type="text/css">
    .badge-container {

      position: relative;

      display: inline-block;

    }

    .addBadge {

      position: absolute;

      top: 5px;

      right: 5px;

      transform: translate(58%, -58%);

    }

    /*  css added - ayushi*/
    button.badge.additional {
      padding: 0px;
      margin: 3px;
      border: 2px solid #808080a8;
      color: black;
    }

    button.badge.additional:hover {
      background-color: #827c7c87;
      color: red;
      cursor: pointer;

    }

    /*td.checkRadio
  {
    width: 5% !important;
  }*/
  </style>
</head>

<body>



  <div id="header-hide" style="display:none;">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    include("php_value_gradesheet.php");

    ?></div>

  <div class="container-fluid" id="content">
    <div class="row">
      <div class="col-4">
        <form method="post" id="myFrm">
          <input type="hidden" value="<?php echo $grad_id ?>" name="grad_id">
          <input type="hidden" value="<?php echo $std_in ?>" name="instructor_ides">
          <input class="form-control" type="hidden" id="stud_db_id" name="stud_db_id" value="<?php echo $fetchuser_id ?>">
          <input class="form-control" type="hidden" name="class_name" id="class_name" value="<?php echo $class_name ?>">
          <input type="hidden" name="phases_id" value="<?php echo $phase_id ?>">

          <input type="hidden" name="course_id" value="<?php echo $std_course1 ?>">
          <input type="hidden" name="class_id" id="class_id" value="<?php echo $classid ?>">
          <table class="table table-bordered table-hover bg-white ayushi" id="itemtable1">
            <thead class="bg-secondary">
              <tr>

                <th class="text-white">Id</th>
                <th class="text-white">Item</th>

                <th class="text-white"><input type="radio" class="main_radio main_u" name="main">U</th>
                <th class="text-white"><input type="radio" class="main_radio main_f" name="main">F</th>
                <th class="text-white"><input type="radio" class="main_radio main_g" name="main">G</th>
                <th class="text-white"><input type="radio" class="main_radio main_v" name="main">V</th>
                <th class="text-white"><input type="radio" class="main_radio main_e" name="main">E</th>
                <th class="text-white"><input type="radio" class="main_radio main_n" name="main">N</th>
                <th class="text-white"></th>
              </tr>
            </thead>
            <tbody>

              <?php


              //fetch item
              $allitem = "SELECT * FROM item where course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' LIMIT 12";
              $statement = $connect->prepare($allitem);
              $statement->execute();

              if ($statement->rowCount() > 0) {
                $result = $statement->fetchAll();
                $sn112 = 1;
                foreach ($result as $row) {
                  $item_db_id = $row['id'];
                  $cts = $row['CTS'];
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
                  <tr class="Myitem" style="<?php echo $bac_ground ?>; cursor: pointer;" id="color_tr<?php echo $sn112 ?>">
                    <td><?php echo $sn112 ?></td>
                    <td style="font-weight:bold;"><?php $item_id = $row['item'];
                                                  //select name of item of item id
                                                  $q = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                                                  $q->execute([$item_id]);
                                                  $name = $q->fetchColumn();
                                                  ?>
                      <span id="selectitemDropdown<?php echo $item_id ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation class="itemDetail" name="<?php echo $item_id; ?>" value="<?php echo $fetchuser_id; ?>" data-value="<?php echo $bac_ground; ?>" title="<?php echo $name; ?>"><?php echo substr($name, 0, 20) ?></span>


                      <input type="hidden" name="items_id[]" value="<?php echo $item_db_id ?>">
                      <input type="hidden" name="std_idies[]" value="<?php echo $item_id ?>">
                      <input type="hidden" name="std_sub[]" value="item">




                      <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectitemDropdown<?php echo $item_id ?>">
                        <span class="dropdown-header itemDetalContainer">

                        </span>


                      </div>
                    </td>
                    <td class="checkRadio" value="U" number="<?php echo $sn112 ?>" style="text-align: center;">

                      <input style="margin: 5px; padding: 5px;" gradeval="U<?php echo $sn112 ?>" data-value="U" value="U" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "U") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                    </td>
                    <td class="checkRadio" value="F" number="<?php echo $sn112 ?>" style="text-align: center;">
                      <input style="margin: 5px; padding: 5px;" gradeval="F<?php echo $sn112 ?>" value="F" data-value="F" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "F") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                    </td>
                    <td class="checkRadio" value="G" number="<?php echo $sn112 ?>" style="text-align: center;">
                      <input style="margin: 5px; padding: 5px;" gradeval="G<?php echo $sn112 ?>" data-value="G" value="G" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "G") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                    </td>
                    <td class="checkRadio" value="V" number="<?php echo $sn112 ?>" style="text-align: center;">
                      <input style="margin: 5px; padding: 5px;" gradeval="V<?php echo $sn112 ?>" data-value="V" value="V" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "V") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                    </td>
                    <td class="checkRadio" value="E" number="<?php echo $sn112 ?>" style="text-align: center;">
                      <input style="margin: 5px; padding: 5px;" gradeval="E<?php echo $sn112 ?>" data-value="E" value="E" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "E") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                    </td>
                    <td class="checkRadio" value="N" number="<?php echo $sn112 ?>" style="text-align: center;">
                      <input style="margin: 5px; padding: 5px;" gradeval="N<?php echo $sn112 ?>" value="N" data-value="N" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "N") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                    </td>
                    <td>
                      <div style="display: flex;">

                        <button data-bs-placement="right" title="Grades Info" type="button" class="badge info heee" id="selectinfoDropdownitem<?php echo $item_id; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><i class="bi bi-exclamation" style="font-weight: bold;"></i></button>
                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdownitem<?php echo $item_id; ?>">
                          <span class="dropdown-header">
                            <?php
                            $allitemdes = "SELECT * FROM itembank where id='$item_id'";
                            $resultallitemdes = $connect->query($allitemdes);
                            foreach ($resultallitemdes as $rowallitemdes) {
                              echo "<span style='font-size:large; font-weight:bold;' class='text-danger'>U: {$rowallitemdes['U']}</span><br>";
                              echo "<span style='font-size:large; font-weight:bold;' class='text-warning'>F: {$rowallitemdes['F']}</span><br>";
                              echo "<span style='font-size:large; font-weight:bold;' class='text-secondary'>G: {$rowallitemdes['G']}</span><br>";
                              echo "<span style='font-size:large; font-weight:bold;' class='text-success'>V: {$rowallitemdes['V']}</span><br>";
                              echo "<span style='font-size:large; font-weight:bold;' class='text-primary'>E: {$rowallitemdes['E']}</span><br>";
                              echo "<span style='font-size:large; font-weight:bold;' class='text-dark'>N: {$rowallitemdes['N']}</span><br>";
                            }
                            ?>
                          </span>
                        </div>

                        <button data-bs-placement="right" title="Additional/Unaccomplished" type="button" class="badge additional" id="selectinfoDropdownitemAdd<?php echo $item_id; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><i class="bi bi-plus-lg" onclick="document.getElementById('item_subitem_value').value='item';document.getElementById('item_id_addacc').value='<?php echo $item_id; ?>';"></i></button>

                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdownitemAdd<?php echo $item_id; ?>">
                          <span class="dropdown-header">
                            <center>
                              <!-- <form action="add_accomplish_additional.php" method="post"> -->

                              <input type="button" class="btn btn-success addAddData" data-name="additional" value="Additional task" data-id>
                              <input type="button" class="btn btn-primary addAddData" value="Unaccomplished task" data-name="accomplish">
                              <!-- </form> -->
                            </center>
                          </span>
                        </div>


                        <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $sn112 . '. '; ?>" data-appenditemname="<?php echo $name ?>"></i></button>


                        <!-- </div> -->
                        <?php

                        if ($cts == '1') {
                        ?>

                          <!-- <div style="display: flex;"> -->

                          <button data-bs-placement="right" title="Grades Info" type="button" class="badge info heee" id="CTSDrop<?php echo $item_id; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><img style="height: 15px;width: 25px;" src="<?php echo BASE_URL; ?>assets/cts1.png"></button>


                          <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="CTSDrop<?php echo $item_id; ?>">
                            <span class="dropdown-header">
                              <span style='font-size:large; font-weight:bold;' class='text-success'>Condition</span>
                              <p>
                                <?php
                                $conCts = $connect->query("SELECT CTScondition FROM itembank WHERE id = '$item_id'");
                                echo $conCtsData = $conCts->fetchColumn();
                                ?>
                              </p>
                              <span style='font-size:large; font-weight:bold;' class='text-success'>Standrd</span>
                              <p>
                                <?php
                                $conCts = $connect->query("SELECT CTSstandards FROM itembank WHERE id = '$item_id'");
                                echo $conCtsData = $conCts->fetchColumn();
                                ?>
                              </p>
                            </span>
                          </div>


                          <!-- <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $sn112 . '. '; ?>" data-appenditemname="<?php echo $name ?>"></i></button> -->


                      </div>
                    <?php
                        }
                    ?>
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
                      $cts1 = $row1['CTS'];
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
                      if ($grade1 == "N") {
                        $bac_ground1 = "background-color:#525d53;color:white";
                      }
                  ?>
                      <tr id="color_tr1<?php echo $sn116 . $sn112 ?>" class="subitem_tr" style="<?php echo $bac_ground1; ?>">
                        <td style="text-align:end;"><?php echo $sn116; ?></td>
                        <td><span id="selectitemDropdown<?php echo $std_subi ?>" style="margin-left:15px;" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation class="subItemDetail" name="<?php echo $std_subi; ?>" value="<?php echo $fetchuser_id; ?>" data-value="<?php echo $bac_groundq; ?>" title="<?php echo $sub_value = $name_sub; ?>"><?php echo $sub_value = substr($name_sub, 0, 20); ?> </span>
                          <input type="hidden" name="items_id[]" value="<?php echo $subitem_db_id ?>">
                          <input type="hidden" name="std_idies[]" value="<?php echo $item_id ?>">
                          <input type="hidden" name="std_sub[]" value="<?php echo $sub_value ?>">
                          <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectitemDropdown<?php echo $std_subi ?>">
                            <span class="dropdown-header subItemDetailContainer">
                              <?php

                              ?>
                            </span>


                          </div>
                        </td>
                        <td class="checkSubRadio" value="U" number2="<?php echo $sn112 ?>" number="<?php echo $sn116 ?>" style="text-align: center;">
                          <input style="margin: 5px; padding: 5px;" type="radio" data-value="U" value="U" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "U") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                        </td>
                        <td class="checkSubRadio" value="F" number2="<?php echo $sn112 ?>" number="<?php echo $sn116 ?>" style="text-align: center;">
                          <input style="margin: 5px; padding: 5px;" type="radio" data-value="F" value="F" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "F") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                        </td>
                        <td class="checkSubRadio" value="G" number2="<?php echo $sn112 ?>" number="<?php echo $sn116 ?>" style="text-align: center;">
                          <input style="margin: 5px; padding: 5px;" type="radio" data-value="G" value="G" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "G") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                        </td>
                        <td class="checkSubRadio" value="V" number2="<?php echo $sn112 ?>" number="<?php echo $sn116 ?>" style="text-align: center;">
                          <input style="margin: 5px; padding: 5px;" type="radio" data-value="V" value="V" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "V") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                        </td>
                        <td class="checkSubRadio" value="E" number2="<?php echo $sn112 ?>" number="<?php echo $sn116 ?>" style="text-align: center;">
                          <input style="margin: 5px; padding: 5px;" type="radio" data-value="E" value="E" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "E") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                        </td>
                        <td class="checkSubRadio" value="N" number2="<?php echo $sn112 ?>" number="<?php echo $sn116 ?>" style="text-align: center;">
                          <input style="margin: 5px; padding: 5px;" type="radio" data-value="N" value="N" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "N") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                        </td>
                        <td>
                          <div class="d-flex">

                            <button data-bs-placement="right" title="Grades Info" type="button" class="badge info shee" id="selectinfoDropdown<?php echo $std_subi ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><i class="bi bi-exclamation" style="font-weight: bold;"></i></button>

                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdown<?php echo $std_subi; ?>">
                              <span class="dropdown-header">
                                <?php
                                $allsubitemdes = "SELECT * FROM sub_item where id='$std_subi'";
                                $statementallsubitemdes = $connect->prepare($allsubitemdes);
                                $statementallsubitemdes->execute();

                                if ($statementallsubitemdes->rowCount() > 0) {
                                  $resultallsubitemdes = $statementallsubitemdes->fetchAll();
                                  foreach ($resultallsubitemdes as $rowallsubitemdes) {
                                    echo "<span style='font-weight:bold; font-size:large;' class='text-danger'>U :" . $rowallsubitemdes['U'] . '</span><br>';
                                    echo "<span style='font-weight:bold; font-size:large;' class='text-warning'>F :" . $rowallsubitemdes['F'] . '</span><br>';
                                    echo "<span style='font-weight:bold; font-size:large;' class='text-secondary'>G :" . $rowallsubitemdes['G'] . '</span><br>';
                                    echo "<span style='font-weight:bold; font-size:large;' class='text-success'>V :" . $rowallsubitemdes['V'] . '</span><br>';
                                    echo "<span style='font-weight:bold; font-size:large;' class='text-primary'>E :" . $rowallsubitemdes['E'] . '</span><br>';
                                    echo "<span style='font-weight:bold; font-size:large;' class='text-dark'>N :" . $rowallsubitemdes['N'] . '</span><br>';
                                  }
                                }
                                ?>
                              </span>


                            </div>

                            <button data-bs-placement="right" title="Additional/Unaccomplished" type="button" class="badge additional" id="selectinfoDropdownAdd<?php echo $std_subi ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><i class="bi bi-plus-lg" onclick="document.getElementById('item_subitem_value').value='subitem';document.getElementById('item_id_addacc').value='<?php echo $std_subi; ?>';"></i></button>

                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdownAdd<?php echo $std_subi; ?>">
                              <span class="dropdown-header">
                                <center>
                                  <!-- <form action="add_accomplish_additional.php" method="post"> -->

                                  <input type="button" class="btn btn-success addAddData" data-name="additional" value="Additional task">
                                  <input type="button" class="btn btn-primary addAddData" value="Unaccomplished task" data-name="accomplish">
                                  <!-- </form> -->
                                </center>
                              </span>


                            </div>

                            <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $sn112 . $sn116 . '. '; ?>" data-appenditemname="<?php echo $name_sub ?>" style="font-weight: bold; cursor:pointer;"></i></button>


                            <?php

                            if ($cts1 == '1') {
                            ?>

                              <div style="display: flex;">

                                <button data-bs-placement="right" title="Grades Info" type="button" class="badge info heee" id="CTSSubDrop<?php echo $std_subi; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><img style="height: 15px;
                               width: 25px;" src="<?php echo BASE_URL; ?>assets/cts1.png"></button>


                                <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="CTSSubDrop<?php echo $std_subi; ?>">
                                  <span class="dropdown-header">
                                    <span style='font-size:large; font-weight:bold;' class='text-success'>Condition</span>
                                    <p>
                                      <?php
                                      $conCts = $connect->query("SELECT CTScondition FROM sub_item WHERE id = '$std_subi'");
                                      echo $conCtsData = $conCts->fetchColumn();
                                      ?>
                                    </p>
                                    <span style='font-size:large; font-weight:bold;' class='text-success'>Standrd</span>
                                    <p>
                                      <?php
                                      $conCts = $connect->query("SELECT CTSstandards FROM sub_item WHERE id = '$std_subi'");
                                      echo $conCtsData = $conCts->fetchColumn();
                                      ?>
                                    </p>
                                  </span>
                                </div>


                                <!-- <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $sn112 . '. '; ?>" data-appenditemname="<?php echo $name ?>"></i></button> -->


                              </div>
                            <?php
                            }
                            ?>
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
        <table class="table table-bordered table-hover bg-white varun" id="itemtable2">
          <thead class="bg-secondary" style="display:none">
            <tr>

              <th class="text-white">Id</th>
              <th class="text-white">Item</th>

              <th class="text-white"><input type="radio" class="main_radio main_u1" name="main">U</th>
              <th class="text-white"><input type="radio" class="main_radio main_f1" name="main">F</th>
              <th class="text-white"><input type="radio" class="main_radio main_g1" name="main">G</th>
              <th class="text-white"><input type="radio" class="main_radio main_v1" name="main">V</th>
              <th class="text-white"><input type="radio" class="main_radio main_e1" name="main">E</th>
              <th class="text-white"><input type="radio" class="main_radio main_n1" name="main">N</th>
              <th class="text-white"></th>
            </tr>
          </thead>
          <tbody>

            <?php
            //fetch item
            $allitem = "SELECT * FROM item where course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' LIMIT 2000 OFFSET 12";
            $statement = $connect->prepare($allitem);
            $statement->execute();

            if ($statement->rowCount() > 0) {
              $result = $statement->fetchAll();
              $sn112 = 13;
              foreach ($result as $row) {
                $item_db_id = $row['id'];
                $cts2 = $row['CTS'];
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
                <tr class="Myitem" style="<?php echo $bac_ground ?>; cursor:pointer;" id="color_tr<?php echo $sn112 ?>">
                  <td><?php echo $sn112 ?></td>
                  <td style="font-weight:bold;"><?php $item_id = $row['item'];
                                                //select name of item of item id
                                                $q = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                                                $q->execute([$item_id]);
                                                $name = $q->fetchColumn();
                                                ?>
                    <span id="selectitemDropdown<?php echo $item_id ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation class="itemDetail" name="<?php echo $item_id; ?>" value="<?php echo $fetchuser_id; ?>" data-value="<?php echo $bac_ground; ?>"><?php echo $name ?></span>


                    <input type="hidden" name="items_id[]" value="<?php echo $item_db_id ?>">
                    <input type="hidden" name="std_idies[]" value="<?php echo $item_id ?>">
                    <input type="hidden" name="std_sub[]" value="item">




                    <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectitemDropdown<?php echo $item_id ?>">
                      <span class="dropdown-header itemDetalContainer">

                      </span>


                    </div>
                  </td>
                  <td class="checkRadio" value="U" number="<?php echo $sn112 ?>" style="text-align: center;">

                    <input style="margin: 5px; padding: 5px;" gradeval="U<?php echo $sn112 ?>" data-value="U" value="U" number="<?php echo $sn112 ?>" type="radio" class="myRadio1 " <?php if ($grade == "U") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                  </td>
                  <td class="checkRadio" value="F" number="<?php echo $sn112 ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" gradeval="F<?php echo $sn112 ?>" value="F" data-value="F" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "F") {
                                                                                                                                                                                      echo "checked";
                                                                                                                                                                                    } ?> name="grade[item<?php echo $item_id ?>]" />
                  </td>
                  <td class="checkRadio" value="G" number="<?php echo $sn112 ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" gradeval="G<?php echo $sn112 ?>" data-value="G" value="G" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "G") {
                                                                                                                                                                                      echo "checked";
                                                                                                                                                                                    } ?> name="grade[item<?php echo $item_id ?>]" />
                  </td>
                  <td class="checkRadio" value="V" number="<?php echo $sn112 ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" gradeval="V<?php echo $sn112 ?>" data-value="V" value="V" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "V") {
                                                                                                                                                                                      echo "checked";
                                                                                                                                                                                    } ?> name="grade[item<?php echo $item_id ?>]" />
                  </td>
                  <td class="checkRadio" value="E" number="<?php echo $sn112 ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" gradeval="E<?php echo $sn112 ?>" data-value="E" value="E" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "E") {
                                                                                                                                                                                      echo "checked";
                                                                                                                                                                                    } ?> name="grade[item<?php echo $item_id ?>]" />
                  </td>
                  <td class="checkRadio" value="N" number="<?php echo $sn112 ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" gradeval="N<?php echo $sn112 ?>" value="N" data-value="N" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "N") {
                                                                                                                                                                                      echo "checked";
                                                                                                                                                                                    } ?> name="grade[item<?php echo $item_id ?>]" />
                  </td>
                  <td>
                    <div style="display: flex;">


                      <button data-bs-placement="right" title="Grades Info" type="button" class="badge info hello" id="selectinfoDropdown<?php echo $item_id; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><i class="bi bi-exclamation" style="font-weight: bold;"></i></button>
                      <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdown<?php echo $item_id; ?>">
                        <span class="dropdown-header">
                          <?php
                          $allitemdes = "SELECT * FROM itembank where id='$item_id'";
                          $resultallitemdes = $connect->query($allitemdes);
                          foreach ($resultallitemdes as $rowallitemdes) {
                            echo "<span style='font-weight:bold; font-size:large;' class='text-danger'>U: {$rowallitemdes['U']}</span><br>";
                            echo "<span style='font-weight:bold; font-size:large;' class='text-warning'>F: {$rowallitemdes['F']}</span><br>";
                            echo "<span style='font-weight:bold; font-size:large;' class='text-secondary'>G: {$rowallitemdes['G']}</span><br>";
                            echo "<span style='font-weight:bold; font-size:large;' class='text-success'>V: {$rowallitemdes['V']}</span><br>";
                            echo "<span style='font-weight:bold; font-size:large;' class='text-primary'>E: {$rowallitemdes['E']}</span><br>";
                            echo "<span style='font-weight:bold; font-size:large;' class='text-dark'>N: {$rowallitemdes['N']}</span><br>";
                          }
                          ?>
                        </span>
                      </div>


                      <button data-bs-placement="right" title="Additional/Unaccomplished" type="button" class="badge additional" id="selectinfoDropdownAdd<?php echo $item_id; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><i class="bi bi-plus-lg" onclick="document.getElementById('item_subitem_value').value='item';document.getElementById('item_id_addacc').value='<?php echo $item_id; ?>';"></i></button>


                      <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdownAdd<?php echo $item_id; ?>">
                        <span class="dropdown-header">
                          <center>
                            <!-- <form action="add_accomplish_additional.php" method="post"> -->

                            <input type="button" class="btn btn-success addAddData" data-name="additional" value="Additional task">
                            <input type="button" class="btn btn-primary addAddData" value="Unaccomplished task" data-name="accomplish">
                            <!-- </form> -->
                          </center>
                        </span>
                      </div>

                      <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i style="font-weight: bold;" class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $sn112 . '. '; ?>" data-appenditemname="<?php echo $name ?>"></i></button>

                      <!-- </div> -->
                      <?php

                      if ($cts2 == '1') {
                      ?>

                        <!-- <div style="display: flex;"> -->

                        <button data-bs-placement="right" title="Grades Info" type="button" class="badge info heee" id="CTSDrop<?php echo $item_id; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><img style="height: 15px;width: 25px;" src="<?php echo BASE_URL; ?>assets/cts1.png"></button>


                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="CTSDrop<?php echo $item_id; ?>">
                          <span class="dropdown-header">
                            <span style='font-size:large; font-weight:bold;' class='text-success'>Condition</span>
                            <p>
                              <?php
                              $conCts = $connect->query("SELECT CTScondition FROM itembank WHERE id = '$item_id'");
                              echo $conCtsData = $conCts->fetchColumn();
                              ?>
                            </p>
                            <span style='font-size:large; font-weight:bold;' class='text-success'>Standrd</span>
                            <p>
                              <?php
                              $conCts = $connect->query("SELECT CTSstandards FROM itembank WHERE id = '$item_id'");
                              echo $conCtsData = $conCts->fetchColumn();
                              ?>
                            </p>
                          </span>
                        </div>


                        <!-- <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $sn112 . '. '; ?>" data-appenditemname="<?php echo $name ?>"></i></button> -->


                    </div>
                  <?php
                      }
                  ?>
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
                    $cts3 = $row1['CTS'];
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
                    if ($grade1 == "N") {
                      $bac_ground1 = "background-color:#525d53;color:white";
                    }
                ?>
                    <tr id="color_tr1<?php echo $sn116 . $sn112 ?>" class="subitem_tr" style="<?php echo $bac_ground1; ?>">
                      <td style="text-align:end;"><?php echo $sn116; ?></td>
                      <td><span id="selectitemDropdown<?php echo $std_subi ?>" style="margin-left:15px;" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation class="subItemDetail" name="<?php echo $std_subi; ?>" value="<?php echo $fetchuser_id; ?>" data-value="<?php echo $bac_groundq; ?>"><?php echo $sub_value = $name_sub; ?> </span>
                        <input type="hidden" name="items_id[]" value="<?php echo $subitem_db_id ?>">
                        <input type="hidden" name="std_idies[]" value="<?php echo $item_id ?>">
                        <input type="hidden" name="std_sub[]" value="<?php echo $sub_value ?>">
                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectitemDropdown<?php echo $std_subi ?>">
                          <span class="dropdown-header subItemDetailContainer">

                          </span>


                        </div>
                      </td>
                      <td class="checkSubRadio" value="U" number2="<?php echo $sn112 ?>" number="<?php echo $sn116 ?>">
                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="U" value="U" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "U") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                      </td>
                      <td class="checkSubRadio" value="F" number2="<?php echo $sn112 ?>" number="<?php echo $sn116 ?>">
                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="F" value="F" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "F") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                      </td>
                      <td class="checkSubRadio" value="G" number2="<?php echo $sn112 ?>" number="<?php echo $sn116 ?>">
                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="G" value="G" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "G") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                      </td>
                      <td class="checkSubRadio" value="V" number2="<?php echo $sn112 ?>" number="<?php echo $sn116 ?>">
                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="V" value="V" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "V") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                      </td>
                      <td class="checkSubRadio" value="E" number2="<?php echo $sn112 ?>" number="<?php echo $sn116 ?>">
                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="E" value="E" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "E") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                      </td>
                      <td class="checkSubRadio" value="N" number2="<?php echo $sn112 ?>" number="<?php echo $sn116 ?>">
                        <input style="margin: 5px; padding: 5px;" type="radio" data-value="N" value="N" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "N") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[<?php echo $sub_value . $item_id ?>]" />
                      </td>
                      <td>
                        <div class="d-flex">

                          <button data-bs-placement="right" title="Grades Info" type="button" class="badge info hi" id="selectinfoDropdown<?php echo $std_subi ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><i class="bi bi-exclamation" style="font-weight: bold; cursor:pointer;"></i></button>
                          <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdown<?php echo $std_subi ?>">
                            <span class="dropdown-header">
                              <?php $allsubitemdes = "SELECT * FROM sub_item where id='$std_subi'";
                              $statementallsubitemdes = $connect->prepare($allsubitemdes);
                              $statementallsubitemdes->execute();

                              if ($statementallsubitemdes->rowCount() > 0) {
                                $resultallsubitemdes = $statementallsubitemdes->fetchAll();
                                foreach ($resultallsubitemdes as $rowallsubitemdes) {
                                  echo "<span style='font-weight:bold; font-size:large;' class='text-danger'>U :" . $rowallsubitemdes['U'] . '</span><br>';
                                  echo "<span style='font-weight:bold; font-size:large;' class='text-warning'>F :" . $rowallsubitemdes['F'] . '</span><br>';
                                  echo "<span style='font-weight:bold; font-size:large;' class='text-secondary'>G :" . $rowallsubitemdes['G'] . '</span><br>';
                                  echo "<span style='font-weight:bold; font-size:large;' class='text-success'>V :" . $rowallsubitemdes['V'] . '</span><br>';
                                  echo "<span style='font-weight:bold; font-size:large;' class='text-primary'>E :" . $rowallsubitemdes['E'] . '</span><br>';
                                  echo "<span style='font-weight:bold; font-size:large;' class='text-dark'>N :" . $rowallsubitemdes['N'] . '</span><br>';
                                }
                              } ?>
                            </span>
                          </div>
                          <button data-bs-placement="right" title="Additional/Unaccomplished" type="button" class="badge additional" id="selectinfoDropdownAdd<?php echo $std_subi ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><i class="bi bi-plus-lg" onclick="document.getElementById('item_subitem_value').value='subitem';document.getElementById('item_id_addacc').value='<?php echo $std_subi; ?>';"></i></button>
                          <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdownAdd<?php echo $std_subi ?>">
                            <span class="dropdown-header">
                              <center>
                                <!-- <form action="add_accomplish_additional.php" method="post"> -->

                                <input type="button" class="btn btn-success addAddData" data-name="additional" value="Additional task">
                                <input type="button" class="btn btn-primary addAddData" value="Unaccomplished task" data-name="accomplish">
                                <!-- </form> -->
                              </center>
                            </span>
                          </div>
                          <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i style="font-weight: bold;" class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $sn112 . $sn116 . '. '; ?>" data-appenditemname="<?php echo $name_sub ?>"></i></button>

                          <?php

                          if ($cts3 == '1') {
                          ?>

                            <div style="display: flex;">

                              <button data-bs-placement="right" title="Grades Info" type="button" class="badge info heee" id="CTSSubDrop<?php echo $std_subi; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><img style="height: 15px; width: 25px;" src="<?php echo BASE_URL; ?>assets/cts1.png"></button>


                              <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="CTSSubDrop<?php echo $std_subi; ?>">
                                <span class="dropdown-header">
                                  <span style='font-size:large; font-weight:bold;' class='text-success'>Condition</span>
                                  <p>
                                    <?php
                                    $conCts = $connect->query("SELECT CTScondition FROM sub_item WHERE id = '$std_subi'");
                                    echo $conCtsData = $conCts->fetchColumn();
                                    ?>
                                  </p>
                                  <span style='font-size:large; font-weight:bold;' class='text-success'>Standrd</span>
                                  <p>
                                    <?php
                                    $conCts = $connect->query("SELECT CTSstandards FROM sub_item WHERE id = '$std_subi'");
                                    echo $conCtsData = $conCts->fetchColumn();
                                    ?>
                                  </p>
                                </span>
                              </div>


                              <!-- <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $sn112 . '. '; ?>" data-appenditemname="<?php echo $name ?>"></i></button> -->


                            </div>
                          <?php
                          }
                          ?>
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
        <hr>
        <!-- <span>Extra item </span> -->
        <!-- <div><span style="color:black; font-weight:bold; padding:5px; float:left; margin-top:20px;">Click Here For Adding Extra Item</span><span style="font-size: xxx-large;color: mediumblue;">&#9758;</span></div> --><br>
        <div class="dropdown dropup m-1">

          <button type="button" style="margin-top:-23px;" class="btn btncolor btn-dark over_all_comment_add" title="Add Extra Items For This Gradesheet" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
            <i class="bi bi-plus-lg"></i> Add More
          </button>
          <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown" style="width:300px; height:600px; overflow-y:auto;">
            <span class="dropdown-header">Extra item
            </span>

            <!-- <form action="extra_item_subitem.php" method="post"> -->
            <table class="table table-bordered table-striped table-hover bg-white" id="itemsubitemextratable">
              <input class="form-control" type="text" id="searchextraitem" onkeyup="itemextra_Search()" placeholder="Search for Folder.." title="Type in a name"><br>
              <thead class="bg-dark">
                <th class="text-white"><input type="checkbox" id="select-extra-itemextra" name="uuu[]"></th>
                <th class="text-white">Item</th>
              </thead>
              <tbody>
                <?php

                $allnotitem = "SELECT * FROM itembank";
                $statementallnotitem = $connect->prepare($allnotitem);
                $statementallnotitem->execute();

                if ($statementallnotitem->rowCount() > 0) {
                  $resultallnotitem = $statementallnotitem->fetchAll();
                  foreach ($resultallnotitem as $rowallnotitem) {
                    $rowallnotitem1 = $rowallnotitem['id'];
                    $item_idesss = $rowallnotitem['item'];
                    $sql521 = "SELECT count(*) FROM `extra_item_subitem` WHERE item_id='$rowallnotitem1' AND data_type='item' and class_id='$classid' and class='$class_name'";
                    $result521 = $connect->prepare($sql521);
                    $result521->execute();
                    $number_of_rows121 = $result521->fetchColumn();
                    $sql51 = "SELECT count(*) FROM `item` WHERE course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' and item='$rowallnotitem1'";
                    $result51 = $connect->prepare($sql51);
                    $result51->execute();
                    $number_of_rows11 = $result51->fetchColumn();
                    if ($number_of_rows11 == 0 && $number_of_rows121 == 0) {
                ?>
                      <tr>
                        <td><input type="checkbox" name="" data-type="item" value="<?php echo $rowallnotitem1 ?>" class="checkallextraitem1 itemExtra" data-classid="<?php echo $classid; ?>" data-class="<?php echo $class_name; ?>" data-gradeid="<?php echo $grad_id; ?>" data-userid="<?php echo $fetchuser_id; ?>"></td>
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
                    $rowallnotsubitem1 = $rowallnotsubitem['id'];
                    $sql522 = "SELECT count(*) FROM `extra_item_subitem` WHERE item_id='$rowallnotsubitem1' AND data_type='subitem' and class_id='$classid' and class='$class_name'";
                    $result522 = $connect->prepare($sql522);
                    $result522->execute();
                    $number_of_rows121 = $result522->fetchColumn();
                    $sql52 = "SELECT count(*) FROM `subitem` WHERE course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' and subitem='$rowallnotsubitem1'";
                    $result52 = $connect->prepare($sql52);
                    $result52->execute();
                    $number_of_rows12 = $result52->fetchColumn();
                    if ($number_of_rows12 == 0 && $number_of_rows121 == 0) {
                    ?>
                      <tr>
                        <td><input type="checkbox" name="" data-type="subitem" value="<?php echo $rowallnotsubitem1 ?>" class="checkallextraitem1 itemExtra" data-classid="<?php echo $classid; ?>" data-class="<?php echo $class_name; ?>" data-gradeid="<?php echo $grad_id; ?>" data-userid="<?php echo $fetchuser_id; ?>"></td>
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
        <table class="table table-bordered table-hover bg-white" id="itemtable3">
          <thead class="bg-secondary" style="display:none">
            <tr>
              <th class="text-white">Id</th>
              <th class="text-white">Item</th>
              <th class="text-white"><input type="radio" class="main_radio main_u2" name="main">U</th>
              <th class="text-white"><input type="radio" class="main_radio main_f2" name="main">F</th>
              <th class="text-white"><input type="radio" class="main_radio main_g2" name="main">G</th>
              <th class="text-white"><input type="radio" class="main_radio main_v2" name="main">V</th>
              <th class="text-white"><input type="radio" class="main_radio main_e2" name="main">E</th>
              <th class="text-white"><input type="radio" class="main_radio main_n2" name="main">N</th>
              <th class="text-white"></th>

            </tr>
          </thead>
          <tbody id="extraItemTable">
            <?php

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
                    <span id="selectExtraItemDropdown<?php echo $iddes ?>" class="<?php echo $class_value; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation name="<?php echo $iddes; ?>" value="<?php echo $fetchuser_id; ?>" data-value="<?php echo $bac_ground2; ?>"><?php echo $name_sub1; ?> </span>
                    <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectExtraItemDropdown<?php echo $iddes ?>">
                      <span class="dropdown-header <?php echo $fetch_values; ?>">

                      </span>


                    </div>
                  </td>
                  </td>
                  <td class="extraItem" value="U" number="<?php echo $grades; ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" type="radio" <?php if ($grade2 == "U") {
                                                                              echo "checked";
                                                                            } ?> data-value="U" class="radio3" value="U" data-valuees="<?php echo $grades ?>" number="<?php echo $iddes; ?>" name="grades1[<?php echo $grades ?>]" />
                  </td>
                  <td class="extraItem" value="F" number="<?php echo $grades; ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" <?php if ($grade2 == "F") {
                                                                                                      echo "checked";
                                                                                                    } ?> class="radio3" type="radio" data-value="F" value="F" name="grades1[<?php echo $grades ?>]" />
                  </td>
                  <td class="extraItem" value="G" number="<?php echo $grades; ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" class="radio3" <?php if ($grade2 == "G") {
                                                                                                                    echo "checked";
                                                                                                                  } ?> type="radio" data-value="G" value="G" name="grades1[<?php echo $grades ?>]" />
                  </td>
                  <td class="extraItem" value="V" number="<?php echo $grades; ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" <?php if ($grade2 == "V") {
                                                                                                      echo "checked";
                                                                                                    } ?> class="radio3" type="radio" data-value="V" value="V" name="grades1[<?php echo $grades ?>]" />
                  </td>
                  <td class="extraItem" value="E" number="<?php echo $grades; ?>" style="text-align: center;">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" <?php if ($grade2 == "E") {
                                                                                                      echo "checked";
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
            ?>

          </tbody>
        </table>
      </div>
      <div class="col-4">

        <div class="col-12">
          <div class="text-container">
            <div class="options">
              <!-- Text Format -->
              <button type="button" id="bold" class="option-button button format">
                <i class="bi bi-type-bold"></i>
              </button>
              <button type="button" id="italic" class="option-button button format">
                <i class="bi bi-type-italic"></i>
              </button>
              <button type="button" id="underline" class="option-button button format">
                <i class="bi bi-type-underline"></i>
              </button>
              <button type="button" id="strikethrough" class="option-button button format">
                <i class="bi bi-type-strikethrough"></i>
              </button>
              <button type="button" id="superscript" class="option-button button script">
                <p>H<sup>2</sup></p>
              </button>
              <button type="button" id="subscript" class="option-button button script">
                <p>H<sub>2</sub></p>
              </button>

              <!-- List -->
              <button type="button" id="insertOrderedList" class="option-button button">
                <div class="bi bi-list-ol"></div>
              </button>
              <button type="button" id="insertUnorderedList" class="option-button button">
                <i class="bi bi-list"></i>
              </button>

              <!-- Undo/Redo -->
              <button type="button" id="undo" class="option-button button">
                <i class="bi bi-arrow-counterclockwise"></i>
              </button>
              <button type="button" id="redo" class="option-button button">
                <i class="bi bi-arrow-clockwise"></i>
              </button>

              <!-- Link -->
              <button type="button" id="createLink" class="option-button button">
                <i class="bi bi-link"></i>
              </button>
              <button type="button" id="show-option" class="option-button button">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <div class="togle d-none options">
                <!-- Font -->
                <select id="fontName" class="adv-option-button form-control select" style="width:auto;"></select>
                <select id="fontSize" class="adv-option-button form-control select" style="width:auto;"></select>

                <!-- Color -->
                <div class="input-wrapper">
                  <input type="color" id="foreColor" class="adv-option-button" />
                  <label for="foreColor">Font Color</label>
                </div>
                <div class="input-wrapper">
                  <input type="color" id="backColor" class="adv-option-button" />
                  <label for="backColor">Highlight Color</label>
                </div>
                <button type="button" id="unlink" class="option-button button">
                  <i class="bi bi-link-45deg"></i>
                </button>
                <!-- Alignment -->
                <button type="button" id="justifyLeft" class="option-button button align">
                  <i class="bi bi-justify-left"></i>
                </button>
                <button type="button" id="justifyCenter" class="option-button button align">
                  <i class="bi bi-text-center"></i>
                </button>
                <button type="button" id="justifyRight" class="option-button button align">
                  <i class="bi bi-justify-right"></i>
                </button>
                <button type="button" id="justifyFull" class="option-button button align">
                  <i class="bi bi-justify"></i>
                </button>
                <button type="button" id="indent" class="option-button button spacing">
                  <i class="bi bi-text-indent-right"></i>
                </button>
                <button type="button" id="outdent" class="option-button button spacing">
                  <i class="bi bi-text-indent-left"></i>
                </button>

                <!-- Headings -->
                <select id="formatBlock" class="adv-option-button form-control select" style="width:auto;">
                  <option value="H1">H1</option>
                  <option value="H2">H2</option>
                  <option value="H3">H3</option>
                  <option value="H4">H4</option>
                  <option value="H5">H5</option>
                  <option value="H6">H6</option>
                </select>
              </div>
            </div>

            <div id="contentt" class=" append_value" name="comment" contenteditable="true">
              <?php echo $comments; ?>
            </div>
            <textarea id="contenttextarea" name="comment" class="d-none"></textarea>
          </div>

        </div>

        <div class="card card-hover-shadow">
          <div class="card-body" style="margin-right: -25px; margin-left: -25px;">
            <div class="container">
              <div class="row">
                <?php
                $hash_valuees = "";
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
                    if ($hash_value != "") {
                      $hash_valuees = $hash_value;
                    } else {
                      $hash_valuees = 0;
                    }
                ?>

                    <div class="col-6 d-flex justify-content-center border">
                      <label><?php echo $hash_names ?>
                        <input type="hidden" value="<?php echo $row1['hashCheck']; ?>" name="hashoff[]">
                      </label>
                      <button class="btn btn-sm decrement" type="button" value="<?php echo $row1['id']; ?>" onclick="decrement(this.value)"><img src="<?php echo BASE_URL; ?>assets/svg/plus/minus.png" style="height: 20px;"></button>
                      <input type="text" readonly style="width:40px;border-radius:5px;text-align: center; padding:0px; margin:5px;" id="counting<?php echo $row1['id']; ?>" class="count" name="hashoff_value[]" value="<?php echo $hash_valuees; ?>">
                      <button class="btn btn-sm increment" type="button" value="<?php echo $row1['id']; ?>" onclick="increment(this.value)"><img src="<?php echo BASE_URL; ?>assets/svg/plus/plus.png" style="height: 20px;"></button>
                    </div>

                <?php }
                } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-hover-shadow">
          <div class="card-body justify-content-center">

            <div class="col" style="justify-content: center;display: grid;">

              <div style="display:flex;justify-content: center;">

                <div class="dropdown dropup m-1">

                  <button type="button" class="btn status myButton btncolor" id="selectLanguageDropdown1" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                    <?php if ($status_code1 != "") {
                      echo $status_code1;
                    } else {
                      echo "Status";
                    } ?>

                  </button>
                  <span style="position: relative;top:-11px;color:red;"><i class="bi bi-asterisk" style="font-size:xx-small;"></i></span>
                  <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown1">
                    <span class="dropdown-header">Status
                    </span>
                    <table class="table table-striped table-bordered table-hover" id="codetable">
                      <input style="margin:5px;" class="form-control" type="text" id="codesearch" onkeyup="code()" placeholder="Search for Codes.." title="Type in a name">
                      <thead class="bg-dark">
                        <th class="text-white">Sr No</th>
                        <th class="text-white">Code</th>
                        <th class="text-white">Description</th>
                        <th class="text-white">Explanation</th>
                        <th class="text-white">Progression</th>

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
                          $st_id = $row1["id"];

                      ?>
                          <tr>

                            <td><input type="radio" class="status" name="status" <?php if ($status_id == $st_id) {
                                                                                    echo "checked";
                                                                                  } ?> value="<?php echo $row1['id']; ?>"></td>
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

                  <button type="button" class="btn over_all_comment_add btncolor" id="selectLanguageDropdown2" data-bs-toggle="dropdown" title="Summary/Alibis" aria-expanded="false" data-bs-dropdown-animation style="padding:13px;">
                    <i class="bi bi-chat-left-text-fill"></i>

                  </button>
                  <span style="position: relative;top:-11px;color:red;"><i class="bi bi-asterisk" style="font-size:xx-small;"></i></span>
                  <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown2" style="width:600px; height:auto; overflow-y:auto;">
                    <span class="dropdown-header" style="font-weight:bold; color: black;">Summary
                      <?php
                      if ($over_all_comment != "") { ?>
                        <pre><textarea style="width:95%; margin: 10px; border-radius: 20px; padding:20px; font-size:x-large;" name="overall_data" placeholder="overall" rows="4" cols="50" id="overall_all_com"><?php echo $over_all_comment ?></textarea></pre><br>
                      <?php } else { ?>
                        <pre><textarea style="width:95%; margin: 10px; border-radius:20px; padding:20px; font-size:x-large;" name="overall_data" placeholder="overall" rows="4" cols="50" id="overall_all_com"> </textarea></pre><br>

                      <?php } ?>
                    </span>
                    <span class="dropdown-header" style="font-weight:bold; color: black;">
                      Alibis
                      <input type="text" name="alibas" class="form-control">
                    </span>

                  </div>
                </div>

                <div class="dropdown dropup m-1">

                  <button type="button" class="btn btncolor" id="selectattchment" title="Attachament" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation style="padding:13px;">
                    <i class="bi bi-paperclip"></i>
                  </button>

                  <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectattchment" style="width:350px; height:auto; overflow-y:auto;">
                    <span class="dropdown-header" style="font-weight:bold; color: black;">Attachamnent
                      <input type="file" name="" class="form-control">
                    </span>


                  </div>
                </div>

              </div>

              <div style="display: flex; justify-content: center;">


                <?php
                $countadditionaltask = 0;
                $countaccomplsihtask = 0;
                if ($grad_id != "") {
                  $countadditionaltask = $connect->query("select count(*) from additional_task where Stud_id='$fetchuser_id' AND assign_class IS NULL")->fetchColumn();
                  $countaccomplsihtask = $connect->query("select count(*) from accomplish_task where Stud_ac='$fetchuser_id' AND assign_class IS NULL")->fetchColumn();
                }
                ?>
                <div class="badge-container">
                  <span class="badge rounded-pill bg-danger addBadge" id="countAddTask"><?PHP echo $countadditionaltask; ?></span>
                  <button type="button" style="margin:5px;" data-bs-toggle="modal" data-bs-target="#additional-training" class="btn btncolor" title="Add/Clear Additional Task For Upcoming Events" id="additional_training">Additional Task
                  </button>
                </div>
                <div class="badge-container">
                  <span class="badge rounded-pill bg-danger addBadge" id="countunAcomTask"><?PHP echo $countaccomplsihtask; ?></span>
                  <button style="margin:5px;" type="button" data-bs-toggle="modal" data-bs-target="#unaccomplish-training" title="Select/Clear Unaccomplished Task For This Class" class="btn btncolor btn-sm" id="Unaccomplish_but">Unaccomplished Tasks</button>
                </div>
                <button type="button" class="btn btncolor m-2" data-bs-toggle="modal" data-bs-target="#clearncetask" title="Add Additional Task" id="clearancelogbtn">Clearance Log</button>
                <!-- <button type="button" class="btn btncolor btn-primary m-2" data-bs-toggle="modal" data-bs-target="#memotask" title="Memorandum For Record">Memorandum</button> -->





              </div>
              <div style="display: flex; justify-content: center;">
                <!-- <button type="button" class="btn btncolor btn-success m-2" data-bs-toggle="modal" data-bs-target="#clearncetask" title="Add Additional Task">Clearance Log</button> -->
                <button type="button" class="btn btncolor m-2" data-bs-toggle="modal" data-bs-target="#memotask" title="Memorandum For Record" id="memologbtn">Memorandum</button>
                <button type="button" class="btn btncolor m-2" data-bs-toggle="modal" data-bs-target="#desctask" title="Discipline Log" id="desclogbtn">Discipline</button>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-hover-shadow">
          <div class="card-body">
            <center>
              <table>
                <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#detailsper"><i class="bi bi-info-circle"></i></button>
                <?php
                $sql53 = "SELECT count(*) FROM `notifications` WHERE user_id='$fetchuser_id' AND `type`='$class_name' AND `data`='$classid' AND extra_data='requesting to grade'";
                $result53 = $connect->prepare($sql53);
                $result53->execute();
                $number_of_rows53 = $result53->fetchColumn();
                $sql54 = "SELECT count(*) FROM `grade_permission` WHERE grade_id='$grad_id' AND `grade`='E' AND `status`='1'";
                $result54 = $connect->prepare($sql54);
                $result54->execute();
                $number_of_rows54 = $result54->fetchColumn();

                if (isset($_SESSION['permission']) && $permission['give_per_gradsheet'] == "1" && $number_of_rows53 > 0 && $number_of_rows54 == 0) {

                ?>
                  <button style="margin-left:10px" class="btn btn-soft-primary" type="button" data-bs-toggle="modal" data-bs-target="#ask_mark_per_admin">
                    <img style="height: 28px;width: 200px; margin-right:10px;" src="<?php echo BASE_URL; ?>assets/svg/exe/excellent.png">
                  </button>
                <?php
                } else if (isset($_SESSION['permission']) && $permission['ask_per_gradsheet'] == "1") {
                ?>
                  <button style="margin-left:10px;" id="ask_mark_per1" class="btn btn-soft-primary" type="button" data-bs-toggle="modal" data-bs-target="#ask_mark_per">
                    <img style="height: 28px;width: 200px; margin-right:10px;" src="<?php echo BASE_URL; ?>assets/svg/exe/excellent.png">
                  </button>
                <?php
                }
                $lockQ = $connect->query("SELECT `status` FROM `gradesheet` WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class_id = '$classid' AND phase_id = '$phase_id' AND class = '$class_name'");
                $lockQData = $lockQ->fetchColumn();
                if ($lockQData == 1) {
                ?>
                  <button type="button" class="btn lockImg" style="float:right;"><img src="<?php echo BASE_URL; ?>assets/svg/lock/lock.png" style="height: 25px;"></button>
                <?php } else { ?>
                  <button type="button" class="btn lockImg" style="float:right;"><img src="<?php echo BASE_URL; ?>assets/svg/lock/unlock.png" style="height: 25px;"></button>
                <?php } ?>
                <button type="button" class="btn unlockImg" style="float:right;display:none;"><img src="<?php echo BASE_URL; ?>assets/svg/lock/lock.png" style="height: 25px;"></button>
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
                    <span style="position: relative;left:275px;top:-57px;font-size:30px;color:red;">*</span>
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

                <tr>
                  <hr>
                  <td>
                    <br>
                    <center>
                      <input type="submit" id="update_gradsheet_but" class="btn btn-outline-success" name="ins_sub" value="Update" style="font-weight:bold; font-size: large;" />
                      <input type="submit" id="submit_gradsheet_but" class="btn btn-outline-success submitBtn" name="ins_sub" value="submit" onclick="return confirm('Are you sure?Once submitted gradsheet will get lock..?')" style="font-size:large; font-weight:bold;" />
                    </center>

                  </td>
                </tr>

              </table>


            </center>
          </div>
        </div>

      </div>

    </div>

    <div class="row">

      <div class="col-sm">
        <div class="modal fade" id="additional-training" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Clear Additional Task</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Nav -->
                <!-- Tab Content -->
                <!-- code removed of tabs Ayushi -->

                <div class="container bg-white">
                  <table class="table table-bordered src-table1" id="addsearch1_re">
                    <input class="form-control" type="text" id="addsearchtable_re" onkeyup="add_task_re()" placeholder="Search for Item.." title="Type in a name"><br>
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white"><input type="checkbox" id="select-all-item2"></th>
                        <!-- <th class="text-white">Id</th> -->
                        <th class="text-white">Item</th>

                      </tr>
                    </thead>
                    <tbody id="additioanlTaskTable">
                      <?php
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
                          $name1 = $i_name->fetchColumn();
                      ?>
                          <tr>
                            <td><input type="checkbox" name="add_clear[]" value="<?php echo $rows['ad_id'] ?>" class="checkallclear1"></td>
                            <td><?php echo $name1; ?></td>
                          </tr>
                      <?php
                        }
                      } ?>

                    </tbody>

                  </table>
                  <!-- <button style="float:right; font-weight:bold; font-size:large; position:fixed; top:170px;" type="sumit" class="btn btn-success" id="clear_gradsheet">Select</button> -->
                  <!-- </form> -->
                </div>

                <!-- End Tab Content -->


                <!-- End Tab Content -->

              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="unaccomplish-training" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success">Clear Unaccomplished Task</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- code removed of tabs Ayushi -->
                <div class="container bg-white">
                  <table class="table table-bordered src-table2" id="unsearchtableclear">
                    <input class="form-control" type="text" id="unsearch1clear" onkeyup="unsearch_taskclear()" placeholder="Search for Items" title="Type in a name"><br>
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white"><input type="checkbox" id="select-all-unitem2"></th>
                        <!-- <th>ID</th> -->
                        <th class="text-white">Name</th>

                      </tr>
                    </thead>
                    <!-- <form action="insert_accomplish1.php" method="post">
                  <input type="hidden" value="<?php echo $class_name ?>" name="class_table"><input type="hidden" value="<?php echo $classid ?>" name="class_id"> -->
                    <tbody id="unAcomplishTaskTable">
                      <?php
                      $query_acc = "SELECT * FROM accomplish_task where assign_class_table IS null and Stud_ac='$fetchuser_id'";
                      $statement_acc = $connect->prepare($query_acc);
                      $statement_acc->execute();
                      if ($statement_acc->rowCount() > 0) {
                        $result_acc = $statement_acc->fetchAll();
                        $sn = 1;
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
                      ?>
                            <tr>
                              <td> <input type="checkbox" name="ac_id[]" value="<?php echo $row['ac_id'] ?>" class="checkallaccomplishclear"></td>
                              <td><?php echo  $fetchname;
                                  ?></td>
                            </tr>

                      <?php }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- </form> -->
              </div>
            </div>


          </div>
        </div>

        <div class="modal fade" id="clearncetask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-success" id="exampleModalLabel">Clearance Log</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <table class="table table-bordered src-table2" id="unsearchtableclear">
                  <input class="form-control" type="text" id="unsearch1clear" placeholder="Search for Items" title="Type in a name"><br>
                  <thead class="bg-dark">
                    <tr>
                      <th class="text-white"><input type="checkbox"></th>
                      <th class="text-white">Name</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $item_name1 = "";
                    $eme_get_subid = "";
                    $query_clearnace = "SELECT * FROM clearance_data where ctp_id='$std_course1'";
                    $statement_clearnace = $connect->prepare($query_clearnace);
                    $statement_clearnace->execute();
                    if ($statement_clearnace->rowCount() > 0) {
                      $result_clearnace = $statement_clearnace->fetchAll();
                      $sn = 1;
                      foreach ($result_clearnace as $row_clearnace) {
                        $eme_id = $row_clearnace['id'];
                        $sql90 = "SELECT count(*) FROM `clearance_student_id` WHERE clearance_id='$eme_id' AND stud_id='$fetchuser_id'";
                        $result90 = $connect->prepare($sql90);
                        $result90->execute();
                        $number_of_rows90 = $result90->fetchColumn();
                        if ($number_of_rows90 == 0) {
                          $eme_get_id = $row_clearnace['item'];
                          $eme_get_subid = $row_clearnace['subitem'];
                          if ($eme_get_id != 0) {
                            $q1 = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                            $q1->execute([$eme_get_id]);
                            $item_name1 = $q1->fetchColumn();
                          } else if ($eme_get_subid != 0) {
                            $q1 = $connect->prepare("SELECT subitem FROM `sub_item` WHERE id=?");
                            $q1->execute([$eme_get_subid]);
                            $item_name1 = $q1->fetchColumn();
                          }
                    ?>
                          <tr>
                            <td><input type="checkbox" value="<?php echo $eme_id; ?>" name="cl_data[]"></td>
                            <td><?php echo $item_name1; ?></td>
                          </tr>
                    <?php
                        }
                      }
                    }
                    ?>
                  </tbody>

                </table>


              </div>
            </div>
          </div>
        </div>

        <center>

        </center>
      </div>


      <div class="col-sm">

      </div>

      <div class="col-sm">

      </div>
    </div>
  </div>

  </form>

  <input type="hidden" id="item_id_addacc">
  <input type="hidden" id="addStudentId" value="<?php echo $fetchuser_id; ?>">
  <input type="hidden" id="addGradeId" value="<?php echo $grad_id; ?>">
  <input type="hidden" id="item_subitem_value" name="item_subitem_value">

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
            <?php include 'percentagetable.php'; ?>
          </center>
        </div>
      </div>
    </div>
  </div>
  <!--modal for additional task-->

  <!--modal for memo-->
  <div class="modal fade" id="memotask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Memo Log</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="insert-phases" id="memo" method="post" action="insert_memo_data.php" enctype="multipart/form-data">
            <input type="hidden" name="pageId" value="1" />
            <?php include ROOT_PATH . 'includes/Pages/memoform.php'; ?>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--descipline log-->
  <div class="modal fade" id="desctask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Discipline Log</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="insert-phases" id="discipline" method="post" action="insert_discipline_data.php" enctype="multipart/form-data">
            <input type="hidden" name="pageId" value="1" />
            <?php include ROOT_PATH . 'includes/Pages/desciplineform.php'; ?>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ask_mark_per" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ask Marks Permission</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>

            <button type="button" id="ask_permssion_marks" class="btn btn-success">Ask</button>

          </center>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="ask_mark_per_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Give Marks Permission</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form action="give_gradeper_admin.php" method="post">
              <input type="hidden" name="std" value="<?php echo $fetchuser_id; ?>">
              <input type="hidden" name="inst" value="<?php echo $std_in; ?>">
              <input type="hidden" name="class_name" value="<?php echo $class_name; ?>">
              <input type="hidden" name="class_id" value="<?php echo $classid; ?>">
              <input type="hidden" name="g_id" value="<?php echo $grad_id ?>">
              <button type="submit" class="btn btn-success">Give</button>
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal -->
  <div id="SelectAdditional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalCenterTitle">Add Additional/ Unaccomplish Item</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <!-- <form action="add_accomplish_additional.php" method="post"> -->
            <!-- <input type="hidden" id="item_id_addacc" name="item_id_addacc">
            <input type="hidden" id="addStudentId" value="<?php echo $fetchuser_id; ?>" name="student_ides_value">
            <input type="hidden" id="addGradeId" value="<?php echo $grad_id; ?>" name="grad_ides_value">
            <input type="hidden" id="item_subitem_value" name="item_subitem_value">
            <input type="button" class="btn btn-success addAddData" data-name="additional" value="Additional task">
            <input type="button" class="btn btn-primary addAddData" value="Unaccomplished task" data-name="accomplish"> -->
            <!-- </form> -->
          </center>
        </div>
      </div>
    </div>
  </div>


  <!-- End Modal -->

  <script src="<?php echo BASE_URL; ?>assets/tinymce/tinymce.min.js"></script>

  <!-- Include the Quill library -->
  <!-- <script src="<?php echo BASE_URL; ?>assets/vendor/quill/dist/quill.min.js"></script> -->

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
    $(".addAddData").on("click", function() {
      var btnType = $(this).data("name");
      var itemId = $("#item_id_addacc").val();
      var stuId = $("#addStudentId").val();
      var gradeId = $("#addGradeId").val();
      var subItemVal = $("#item_subitem_value").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/add_accomplish_additional.php',
        data: {
          item_id_addacc: itemId,
          student_ides_value: stuId,
          grad_ides_value: gradeId,
          item_subitem_value: subItemVal,
          btnType: btnType,
        },
        success: function(response) {
          if (btnType == "additional") {
            var data = JSON.parse(response);
            $("#additioanlTaskTable").empty();
            $("#additioanlTaskTable").html(data.rows);

            $("#countAddTask").empty();
            $("#countAddTask").html(data.count);
          }

          if (btnType == "accomplish") {
            var data = JSON.parse(response);
            $("#unAcomplishTaskTable").empty();
            $("#unAcomplishTaskTable").html(data.rows);

            $("#countunAcomTask").empty();
            $("#countunAcomTask").html(data.count);
          }
        }
      });
    })
  </script>

  <script type='text/javascript'>
    $('.myRadio1').on("click", function() {

      // var gradeval = $(this).attr('gradeval');
      var number = $(this).attr('number');
      var name = $(this).attr('name');

      selected_value = $("input[name='" + name + "']:checked").val();

      if (selected_value == "U") {

        $('#color_tr' + number).css("background-color", "#ed4c78");
        $('#color_tr' + number).css("color", "white");
      }
      if (selected_value == "F") {
        $('#color_tr' + number).css("background-color", "#f5ca99");
        $('#color_tr' + number).css("color", "white");
      }
      if (selected_value == "G") {
        $('#color_tr' + number).css("background-color", "#71869d");
        $('#color_tr' + number).css("color", "white");
      }
      if (selected_value == "V") {
        $('#color_tr' + number).css("background-color", "#00c9a7");
        $('#color_tr' + number).css("color", "white");
      }
      if (selected_value == "E") {
        $('#color_tr' + number).css("background-color", "#377dff");
        $('#color_tr' + number).css("color", "white");
      }

      if (selected_value == "N") {
        $('#color_tr' + number).css("background-color", "white");
        $('#color_tr' + number).css("color", "black");
      }

    });


    $(".checkRadio, .myRadio1").on("click", function(event) {
      var radio = $(this).find(".myRadio1");
      const na = $(this).attr("value");
      const num1 = $(this).attr("number");
      // if (radio.length > 0) {
      //   radio.prop("checked", true);
      // } else {
      //   radio = $(this).closest("td").find(".myRadio1");
      //   radio.prop("checked", true);
      // }

      if (radio.length > 0) {
        // Toggle the checked property
        radio.prop("checked", !radio.prop("checked"));
      } else {
        radio = $(this).closest("td").find(".myRadio1");
        // Toggle the checked property
        radio.prop("checked", !radio.prop("checked"));
      }

      if (na == "U") {

        $('#color_tr' + num1).css("background-color", "#ed4c78");
        $('#color_tr' + num1).css("color", "white");
      }
      if (na == "F") {
        $('#color_tr' + num1).css("background-color", "#f5ca99");
        $('#color_tr' + num1).css("color", "white");
      }
      if (na == "G") {
        $('#color_tr' + num1).css("background-color", "#71869d");
        $('#color_tr' + num1).css("color", "white");
      }
      if (na == "V") {
        $('#color_tr' + num1).css("background-color", "#00c9a7");
        $('#color_tr' + num1).css("color", "white");
      }
      if (na == "E") {
        $('#color_tr' + num1).css("background-color", "#377dff");
        $('#color_tr' + num1).css("color", "white");
      }

      if (na == "N") {
        $('#color_tr' + num1).css("background-color", "white");
        $('#color_tr' + num1).css("color", "black");
      }
    });

    $(".extraItem, .radio3").on("click", function(event) {
      var radio = $(this).find(".radio3");
      const na = $(this).attr("value");
      const num1 = $(this).attr("number");

      if (radio.length > 0) {
        // Toggle the checked property
        radio.prop("checked", !radio.prop("checked"));
      } else {
        radio = $(this).closest("td").find(".radio3");
        // Toggle the checked property
        radio.prop("checked", !radio.prop("checked"));
      }

      if (na == "U") {

        $('#get_color' + num1).css("background-color", "#ed4c78");
        $('#get_color' + num1).css("color", "white");
      }
      if (na == "F") {
        $('#get_color' + num1).css("background-color", "#f5ca99");
        $('#get_color' + num1).css("color", "white");
      }
      if (na == "G") {
        $('#get_color' + num1).css("background-color", "#71869d");
        $('#get_color' + num1).css("color", "white");
      }
      if (na == "V") {
        $('#get_color' + num1).css("background-color", "#00c9a7");
        $('#get_color' + num1).css("color", "white");
      }
      if (na == "E") {
        $('#get_color' + num1).css("background-color", "#377dff");
        $('#get_color' + num1).css("color", "white");
      }

      if (na == "N") {
        $('#get_color' + num1).css("background-color", "white");
        $('#get_color' + num1).css("color", "black");
      }
    });


    $(".checkSubRadio, .myRadio2").on("click", function(event) {
      var radio = $(this).find(".myRadio2");
      const na = $(this).attr("value");
      const num1 = $(this).attr("number2");
      const num2 = $(this).attr("number");
      // if (radio.length > 0) {
      //   radio.prop("checked", true);
      // } else {
      //   radio = $(this).closest("td").find(".myRadio2");
      //   radio.prop("checked", true);
      // }

      if (radio.length > 0) {
        // Toggle the checked property
        radio.prop("checked", !radio.prop("checked"));
      } else {
        radio = $(this).closest("td").find(".myRadio2");
        // Toggle the checked property
        radio.prop("checked", !radio.prop("checked"));
      }

      if (na == "U") {

        $('#color_tr1' + num2 + num1).css("background-color", "#ed4c78");
        $('#color_tr1' + num2 + num1).css("color", "white");
      }
      if (na == "F") {
        $('#color_tr1' + num2 + num1).css("background-color", "#f5ca99");
        $('#color_tr1' + num2 + num1).css("color", "white");
      }
      if (na == "G") {
        $('#color_tr1' + num2 + num1).css("background-color", "#71869d");
        $('#color_tr1' + num2 + num1).css("color", "white");
      }
      if (na == "V") {
        $('#color_tr1' + num2 + num1).css("background-color", "#00c9a7");
        $('#color_tr1' + num2 + num1).css("color", "white");
      }
      if (na == "E") {
        $('#color_tr1' + num2 + num1).css("background-color", "#377dff");
        $('#color_tr1' + num2 + num1).css("color", "white");
      }

      if (na == "N") {
        $('#color_tr1' + num2 + num1).css("background-color", "white");
        $('#color_tr1' + num2 + num1).css("color", "black");
      }
    });



    $('.myRadio2').change(function() {

      var number = $(this).attr('number');
      var number2 = $(this).attr('number2');
      var name = $(this).attr('name');

      selected_value = $("input[name='" + name + "']:checked").val();
      if (selected_value == "U") {
        $('#color_tr1' + number + number2).css("background-color", "#ed4c78");
        $('#color_tr1' + number + number2).css("color", "white");
      }
      if (selected_value == "F") {
        $('#color_tr1' + number + number2).css("background-color", "#f5ca99");
        $('#color_tr1' + number + number2).css("color", "white");
      }
      if (selected_value == "G") {
        $('#color_tr1' + number + number2).css("background-color", "#71869d");
        $('#color_tr1' + number + number2).css("color", "white");
      }
      if (selected_value == "V") {
        $('#color_tr1' + number + number2).css("background-color", "#00c9a7");
        $('#color_tr1' + number + number2).css("color", "white");
      }
      if (selected_value == "E") {
        $('#color_tr1' + number + number2).css("background-color", "#377dff");
        $('#color_tr1' + number + number2).css("color", "white");
      }
      if (selected_value == "N") {
        $('#color_tr1' + number + number2).css("background-color", "white");
        $('#color_tr1' + number + number2).css("color", "black");
      }

    });
    $('.radio3').change(function() {

      var name1 = $(this).data('valuees');
      var name = $(this).attr('name');

      selected_value = $("input[name='" + name + "']:checked").val();

      if (selected_value == "U") {
        $('#get_color' + name1).css("background-color", "#ed4c78");
        $('#get_color' + name1).css("color", "white");
      }
      if (selected_value == "F") {
        $('#get_color' + name1).css("background-color", "#f5ca99");
        $('#get_color' + name1).css("color", "white");
      }
      if (selected_value == "G") {
        $('#get_color' + name1).css("background-color", "#71869d");
        $('#get_color' + name1).css("color", "white");
      }
      if (selected_value == "V") {
        $('#get_color' + name1).css("background-color", "#00c9a7");
        $('#get_color' + name1).css("color", "white");
      }
      if (selected_value == "E") {
        $('#get_color' + name1).css("background-color", "#377dff");
        $('#get_color' + name1).css("color", "white");
      }
      if (selected_value == "N") {
        $('#get_color' + name1).css("background-color", "white");
        $('#get_color' + name1).css("color", "black");
      }

    });
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

  <script>
    function unsearch_taskclear() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("unsearch1clear");
      filter = input.value.toUpperCase();
      table = document.getElementById("unsearchtableclear");
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
    function unsearch_task_re() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("unsearchtable_re");
      filter = input.value.toUpperCase();
      table = document.getElementById("unsearch1_re");
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
    function add_task_re() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("addsearchtable_re");
      filter = input.value.toUpperCase();
      table = document.getElementById("addsearch1_re");
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
    function itemextra_Search() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchextraitem");
      filter = input.value.toUpperCase();
      table = document.getElementById("itemsubitemextratable");
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
    function add_task() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("addsearchtable");
      filter = input.value.toUpperCase();
      table = document.getElementById("addsearch1");
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
    document.getElementById('select-all-item1').onclick = function() {
      var checkboxes = document.querySelectorAll('.checkalllist1');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  <script>
    document.getElementById('select-all-item2').onclick = function() {
      var checkboxes = document.querySelectorAll('.checkallclear1');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  <script>
    document.getElementById('select-extra-itemextra').onclick = function() {
      var checkboxes = document.querySelectorAll('.checkallextraitem1');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  <script>
    document.getElementById('select-all-unitem1').onclick = function() {
      var checkboxes = document.querySelectorAll('.checkallaccomplish');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  <script>
    document.getElementById('select-all-unitem2').onclick = function() {
      var checkboxes = document.querySelectorAll('.checkallaccomplishclear');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    $('.status').change(function() {
      var val = $(this).val();

      var std = $("#stud_db_id").val();
      var class_name = $("#class_name").val();
      var class_id = $("#class_id").val();
      if (std) {
        $.ajax({
          type: 'POST',
          url: 'insert_status.php',
          data: 'status=' + val + '&std=' + std + '&class_name=' + class_name + '&class_id=' + class_id,
          success: function(response) {
            $(".myButton").text(response);
          }
        });
      }

    });
  </script>
</body>
<script>
  $("#submit_gradsheet_but").on("click", function() {
    var comment1Value = document.getElementById('gradesper').value;
    if (comment1Value.trim() === '') {
      alert('Please enter marks before submitting the form.');
      event.preventDefault(); // Prevent the form from submitting
      return;
    }

    var overall_all_com = document.getElementById('overall_all_com').value;
    if (overall_all_com.trim() === '') {
      alert('Please Fill in the summery before submitting the form.');
      event.preventDefault(); // Prevent the form from submitting
      return;
    }

    var radioInputs = document.getElementsByClassName('status');
    var isAnySelected = false;

    for (var i = 0; i < radioInputs.length; i++) {
      if (radioInputs[i].checked) {
        isAnySelected = true;
        break;
      }
    }

    if (!isAnySelected) {
      event.preventDefault();
      alert('Please select an Status before submitting the form.');
      return;
    }
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#show-option').on('click', function() {
      $('.togle').toggleClass('d-none');
    });
    $(document).on('click', '#update_gradsheet_but', function() {
      var htmldata = $('#contentt').html();
      $('#contenttextarea').html(htmldata);
    })
    $(document).on('click', '#submit_gradsheet_but', function() {
      var htmldata = $('#contentt').html();
      $('#contenttextarea').html(htmldata);
    })
  });
</script>

<script>
  $("#update_gradsheet_but").hover(function() {
    $("#myFrm").attr("action", "<?php echo BASE_URL ?>includes/Pages/updateGradeSheet.php");
  });
  $("#submit_gradsheet_but").hover(function() {
    $("#myFrm").attr("action", "<?php echo BASE_URL ?>includes/Pages/submit_gradesheet.php");
  });
</script>

<script>
  let optionsButtons = document.querySelectorAll(".option-button");
  let advancedOptionButton =
    document.querySelectorAll(".adv-option-button");
  let fontName = document.getElementById("fontName");
  let fontSizeRef = document.getElementById("fontSize");
  let writingArea = document.getElementById("text-input");
  let linkButton = document.getElementById("createLink");
  let alignButtons = document.querySelectorAll(".align");
  let spacingButtons = document.querySelectorAll(".spacing");
  let formatButtons = document.querySelectorAll(".format");
  let scriptButtons = document.querySelectorAll(".script");

  //List of fontlist
  let fontList = [
    "Arial",
    "Verdana",
    "Times New Roman",
    "Garamond",
    "Georgia",
    "Courier New",
    "cursive",
  ];

  //Initial Settings
  const initializer = () => {
    //function calls for highlighting buttons
    //No highlights for link, unlink,lists, undo,redo since they are one time operations
    highlighter(alignButtons, true);
    highlighter(spacingButtons, true);
    highlighter(formatButtons, false);
    highlighter(scriptButtons, true);

    //create options for font names
    fontList.map((value) => {
      let option = document.createElement("option");
      option.value = value;
      option.innerHTML = value;
      fontName.appendChild(option);
    });

    //fontSize allows only till 7
    for (let i = 1; i <= 7; i++) {
      let option = document.createElement("option");
      option.value = i;
      option.innerHTML = i;
      fontSizeRef.appendChild(option);
    }

    //default size
    fontSizeRef.value = 3;
  };

  //main logic
  const modifyText = (command, defaultUi, value) => {
    //execCommand executes command on selected text
    document.execCommand(command, defaultUi, value);
  };

  //For basic operations which don't need value parameter
  optionsButtons.forEach((button) => {
    button.addEventListener("click", () => {
      modifyText(button.id, false, null);
    });
  });

  //options that require value parameter (e.g colors, fonts)
  advancedOptionButton.forEach((button) => {
    button.addEventListener("change", () => {
      modifyText(button.id, false, button.value);
    });
  });

  //link
  linkButton.addEventListener("click", () => {
    let userLink = prompt("Enter a URL");
    //if link has http then pass directly else add https
    if (/http/i.test(userLink)) {
      modifyText(linkButton.id, false, userLink);
    } else {
      userLink = "http://" + userLink;
      modifyText(linkButton.id, false, userLink);
    }
  });

  //Highlight clicked button
  const highlighter = (className, needsRemoval) => {
    className.forEach((button) => {
      button.addEventListener("click", () => {
        //needsRemoval = true means only one button should be highlight and other would be normal
        if (needsRemoval) {
          let alreadyActive = false;

          //If currently clicked button is already active
          if (button.classList.contains("active")) {
            alreadyActive = true;
          }

          //Remove highlight from other buttons
          highlighterRemover(className);
          if (!alreadyActive) {
            //highlight clicked button
            button.classList.add("active");
          }
        } else {
          //if other buttons can be highlighted
          button.classList.toggle("active");
        }
      });
    });
  };

  const highlighterRemover = (className) => {
    className.forEach((button) => {
      button.classList.remove("active");
    });
  };

  window.onload = initializer();
</script>

<script>
  document.querySelectorAll(
    'input[type=radio]').forEach((elem) => {
    elem.addEventListener('click', allowUncheck);
    // only needed if elem can be pre-checked
    elem.previous = elem.checked;
  });

  function allowUncheck(e) {
    if (this.previous) {
      this.checked = false;
    }
    // need to update previous on all elements of this group
    // (either that or store the id of the checked element)
    document.querySelectorAll(
      `input[type=radio][type=${this.type}]`).forEach((elem) => {
      elem.previous = elem.checked;
    });
  }
</script>
<script>
  $(".itemDetail").on("click", function() {

    $(".itemDetalContainer").empty();
    var itemId = $(this).attr("name");
    var itemName = $(this).attr("value");
    var bacColor = $(this).data("value");

    $.ajax({
      type: 'POST',
      url: "fetchItemDetail.php",
      data: {
        itemId: itemId,
        itemName: itemName,
        bacColor: bacColor,
      },
      dataType: "html",

      success: function(resultData) {
        $(".itemDetalContainer").empty();
        $(".itemDetalContainer").html(resultData);
      }
    });
  });

  $(".extraItemDetail").on("click", function() {

    $(".extraItemDetailContainer").empty();
    var itemId = $(this).attr("name");
    var itemName = $(this).attr("value");
    var bacColor = $(this).data("value");

    $.ajax({
      type: 'POST',
      url: "fetchItemDetail.php",
      data: {
        extraItemId: itemId,
        itemName: itemName,
        bacColor: bacColor,
      },
      dataType: "html",

      success: function(resultData) {
        $(".extraItemDetailContainer").empty();
        $(".extraItemDetailContainer").html(resultData);
      }
    });
  });


  $(".subItemDetail").on("click", function() {
    $(".subItemDetailContainer").empty();
    var subItemId = $(this).attr("name");
    var subItemName = $(this).attr("value");
    var bacColor = $(this).data("value");

    $.ajax({
      type: 'POST',
      url: "fetchItemDetail.php",
      data: {
        subItemId: subItemId,
        subItemName: subItemName,
        bacColor: bacColor,
      },
      dataType: "html",

      success: function(resultData) {
        $(".subItemDetailContainer").empty();
        $(".subItemDetailContainer").html(resultData);
      }
    });
  });
</script>

<script>
  $("#table-field-memo").on('change', '.fetchMarkMemo', function() {
    const selVal = $(this).val();
    const selAttr = $(this).data("name");
    const otherInput = $(this).data("value");

    if (selVal == "other") {
      $("#" + otherInput).css("display", "block");
      $("#" + selAttr).attr('readonly', false);
      $("#" + otherInput).attr("name", "topic[]");
      $("#" + selAttr).val('');
      $(this).removeAttr("name");

    } else {
      $("#" + otherInput).css("display", "none");
      $("#" + otherInput).removeAttr("name");
      $(this).attr("name", "topic[]");
      $.ajax({
        type: 'POST',
        url: "insert_memo_data.php",
        data: {
          selVal: selVal,
        },
        dataType: "html",

        success: function(resultData) {
          $("#" + selAttr).val(resultData);
          $("#" + selAttr).attr('readonly', true);
        }
      });
    }
  });
</script>

<script>
  $("#table-field-discipline").on('change', '.fetchMarkDesci', function() {
    const selVal = $(this).val();
    const selAttr = $(this).data("name");
    const otherInput = $(this).data("value");

    if (selVal == "other") {
      $("#" + otherInput).css("display", "block");
      $("#" + selAttr).attr('readonly', false);
      $("#" + otherInput).attr("name", "topic[]");
      $("#" + selAttr).val('');
      $(this).removeAttr("name");

    } else {
      $("#" + otherInput).css("display", "none");
      $("#" + otherInput).removeAttr("name");
      $(this).attr("name", "topic[]");
      $.ajax({
        type: 'POST',
        url: "insert_discipline_data.php",
        data: {
          selVal: selVal,
        },
        dataType: "html",

        success: function(resultData) {
          $("#" + selAttr).val(resultData);
          $("#" + selAttr).attr('readonly', true);
        }
      });
    }
  });
</script>

<script>
  // $(".itemExtra").on("click", function() {
  $(document).on('click', '.itemExtra', function() {
    var itemId = $(this).val();
    var itemType = $(this).data("type");
    var gradeId = $(this).data("gradeid");
    var className = $(this).data("class");
    var classId = $(this).data("classid");
    var userId = $(this).data("userid");
    if ($(this).is(":checked")) {
      $(this).parent().parent().css("display", "none");
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/addExtraItemSub.php',
        data: {
          itemId: itemId,
          itemType: itemType,
          gradeId: gradeId,
          className: className,
          classId: classId,
          userId: userId,
        },
        success: function(response) {
          $("#extraItemTable").empty();
          $("#extraItemTable").html(response);
        }
      });
    }
  });
</script>


</html>