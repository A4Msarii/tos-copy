<style type="text/css">
  #itemtable1 tr td {
    padding: 0 !important;
    margin: 0 !important;

  }

  #itemtable2 tr td {
    padding: 0 !important;
    margin: 0 !important;

  }

  #itemtable3 tr td {
    padding: 0 !important;
    margin: 0 !important;

  }

  button.badge.append_data1 {
    padding: 0px;
    margin: 3px;
    border: 2px solid #808080a8;
  }

  button.badge.append_data1:hover {
    background-color: #827c7c87;
    color: black;
    cursor: pointer;
  }

  button.badge.info {
    padding: 0px;
    margin: 3px;
    border: 2px solid #808080a8;
  }

  button.badge.info:hover {
    background-color: #827c7c87;
    color: black;
    cursor: pointer;

  }

  button.badge.send {
    padding: 0px;
    margin: 3px;
    border: 2px solid #808080a8;
  }

  button.badge.send:hover {
    background-color: #827c7c87;
    color: black;
    cursor: pointer;

  }

  i.bi-exclamation {
    color: black;
  }

  i.bi-exclamation:hover {
    color: red;
  }

  i.bi-arrow-right-short {
    color: black;
  }

  i.bi-arrow-right-short:hover {
    color: blue;
  }

  .tooldata {
    display: none !important;
    position: absolute;
    left: 50px;
    top: -25px;
    background-color: black;
    color: white;
    width: auto;
    font-size: 15px !important;
    font-weight: normal;
    z-index: 99px !important;
  }

  .tooldata::before {
    content: '';
    height: 10px;
    width: 10px;
    background: black;
    position: absolute;
    bottom: -4px;

    transform: rotate(45deg);
  }

  .custom-popover:hover .tooldata {
    display: block !important;
  }

  .text-container {
    background-color: #ffffff;
  }

  .options {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 15px;
  }

  .button {
    height: 30px;
    width: 30px;
    display: grid;
    place-items: center;
    border-radius: 3px;
    border: none;
    background-color: white;
    outline: none;
    color: black;
  }

  .select {
    padding: 7px;
    border: 1px solid #020929;
    border-radius: 3px;
  }

  .options label,
  .options .select {
    font-family: "Poppins", sans-serif;
  }

  .input-wrapper {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  input[type="color"] {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: transparent;
    width: 30px;
    height: 28px;
    border: none;
    cursor: pointer;
  }

  input[type="color"]::-webkit-color-swatch {
    border-radius: 15px;
    box-shadow: 0 0 0 2px #ffffff, 0 0 0 3px #020929;
  }

  input[type="color"]::-moz-color-swatch {
    border-radius: 15px;
    box-shadow: 0 0 0 2px #ffffff, 0 0 0 3px #020929;
  }

  #contentt {
    margin-top: 10px;
    border: 1px solid #dddddd;
    padding: 20px;
    height: 50vh;
    overflow-y: scroll;
  }

  .active {
    background-color: #e0e9ff;
  }

  .modal-xl {
    max-width: 1700px !important;
  }

  button.btncolor {
    background-color: #9ba9bacf;
    font-weight: bold;
    font-family: 'Inter';
    border: aliceblue;
    color: black;
  }
</style>
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
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>

<body>
  <script src="loading.js"></script>
  <div id="loading-screen" style="display:none;">
    <?php include 'gsloader.php'; ?>
  </div>
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
          <input type="hidden" value="<?php echo $user_id ?>" name="instructor_ides">
          <input class="form-control" type="hidden" id="stud_db_id" name="stud_db_id" value="<?php echo $fetchuser_id ?>">
          <input class="form-control" type="hidden" name="class_name" id="class_name" value="<?php echo $class_name ?>">
          <input type="hidden" name="phases_id" value="<?php echo $phase_id ?>">

          <input type="hidden" name="course_id" value="<?php echo $std_course1 ?>">
          <input type="hidden" name="class_id" id="class_id" value="<?php echo $classid ?>">
          <table class="table table-bordered table-hover" id="itemtable1">
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
                      <span id="selectitemDropdown<?php echo $item_id ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation class="itemDetail" name="<?php echo $item_id; ?>" value="<?php echo $fetchuser_id; ?>" data-value="<?php echo $bac_ground; ?>"><?php echo $name ?></span>


                      <input type="hidden" name="items_id[]" value="<?php echo $item_db_id ?>">
                      <input type="hidden" name="std_idies[]" value="<?php echo $item_id ?>">
                      <input type="hidden" name="std_sub[]" value="item">




                      <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectitemDropdown<?php echo $item_id ?>">
                        <span class="dropdown-header itemDetalContainer">

                        </span>


                      </div>
                    </td>
                    <td class="checkRadio" value="U" number="<?php echo $sn112 ?>">

                      <input style="margin: 5px; padding: 5px;" gradeval="U<?php echo $sn112 ?>" data-value="U" value="U" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "U") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                    </td>
                    <td class="checkRadio" value="F" number="<?php echo $sn112 ?>">
                      <input style="margin: 5px; padding: 5px;" gradeval="F<?php echo $sn112 ?>" value="F" data-value="F" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "F") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                    </td>
                    <td class="checkRadio" value="G" number="<?php echo $sn112 ?>">
                      <input style="margin: 5px; padding: 5px;" gradeval="G<?php echo $sn112 ?>" data-value="G" value="G" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "G") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                    </td>
                    <td class="checkRadio" value="V" number="<?php echo $sn112 ?>">
                      <input style="margin: 5px; padding: 5px;" gradeval="V<?php echo $sn112 ?>" data-value="V" value="V" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "V") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                    </td>
                    <td class="checkRadio" value="E" number="<?php echo $sn112 ?>">
                      <input style="margin: 5px; padding: 5px;" gradeval="E<?php echo $sn112 ?>" data-value="E" value="E" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "E") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                    </td>
                    <td class="checkRadio" value="N" number="<?php echo $sn112 ?>">
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


                        <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $sn112 . '. '; ?>" data-appenditemname="<?php echo $name ?>"></i></button>


                      </div>
                      <?php

                      if ($cts == '1') {
                      ?>

                        <div style="display: flex;">

                          <button data-bs-placement="right" title="Grades Info" type="button" class="badge info heee" id="CTSDrop<?php echo $item_id; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><img style="height: 20px;" src="<?php echo BASE_URL; ?>assets/cts1.png"></button>


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
                        <td><span id="selectitemDropdown<?php echo $std_subi ?>" style="margin-left:15px;" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation class="subItemDetail" name="<?php echo $std_subi; ?>" value="<?php echo $fetchuser_id; ?>" data-value="<?php echo $bac_groundq; ?>"><?php echo $sub_value = $name_sub; ?> </span>
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

                            <button data-bs-placement="right" title="Grades Info" type="button" class="badge info shee" id="selectinfoDropdown<?php echo $std_subi ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><i class="bi bi-exclamation" style="font-weight: bold;"></i></button>


                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdown<?php echo $std_subi; ?>">
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

                            <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $sn112 . $sn116 . '. '; ?>" data-appenditemname="<?php echo $name_sub ?>" style="font-weight: bold; cursor:pointer;"></i></button>

                          </div>
                          <?php

                          if ($cts == '1') {
                          ?>

                            <div style="display: flex;">

                              <button data-bs-placement="right" title="Grades Info" type="button" class="badge info heee" id="CTSSubDrop<?php echo $std_subi; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><img style="height: 20px;" src="<?php echo BASE_URL; ?>assets/cts1.png"></button>


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
        <table class="table table-bordered table-hover" id="itemtable2">
          <thead class="bg-secondary" style="display:none">
            <tr>

              <th class="text-light">Id</th>
              <th class="text-light">Item</th>

              <th class="text-light"><input type="radio" class="main_radio main_u1" name="main">U</th>
              <th class="text-light"><input type="radio" class="main_radio main_f1" name="main">F</th>
              <th class="text-light"><input type="radio" class="main_radio main_g1" name="main">G</th>
              <th class="text-light"><input type="radio" class="main_radio main_v1" name="main">V</th>
              <th class="text-light"><input type="radio" class="main_radio main_e1" name="main">E</th>
              <th class="text-light"><input type="radio" class="main_radio main_n1" name="main">N</th>
              <th class="text-light"></th>
            </tr>
          </thead>
          <tbody>

            <?php
            //fetch item
            $allitem = "SELECT * FROM item where course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' LIMIT 12 OFFSET 12";
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
                  <td class="checkRadio" value="U" number="<?php echo $sn112 ?>">

                    <input style="margin: 5px; padding: 5px;" gradeval="U<?php echo $sn112 ?>" data-value="U" value="U" number="<?php echo $sn112 ?>" type="radio" class="myRadio1 " <?php if ($grade == "U") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> name="grade[item<?php echo $item_id ?>]" />
                  </td>
                  <td class="checkRadio" value="F" number="<?php echo $sn112 ?>">
                    <input style="margin: 5px; padding: 5px;" gradeval="F<?php echo $sn112 ?>" value="F" data-value="F" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "F") {
                                                                                                                                                                                      echo "checked";
                                                                                                                                                                                    } ?> name="grade[item<?php echo $item_id ?>]" />
                  </td>
                  <td class="checkRadio" value="G" number="<?php echo $sn112 ?>">
                    <input style="margin: 5px; padding: 5px;" gradeval="G<?php echo $sn112 ?>" data-value="G" value="G" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "G") {
                                                                                                                                                                                      echo "checked";
                                                                                                                                                                                    } ?> name="grade[item<?php echo $item_id ?>]" />
                  </td>
                  <td class="checkRadio" value="V" number="<?php echo $sn112 ?>">
                    <input style="margin: 5px; padding: 5px;" gradeval="V<?php echo $sn112 ?>" data-value="V" value="V" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "V") {
                                                                                                                                                                                      echo "checked";
                                                                                                                                                                                    } ?> name="grade[item<?php echo $item_id ?>]" />
                  </td>
                  <td class="checkRadio" value="E" number="<?php echo $sn112 ?>">
                    <input style="margin: 5px; padding: 5px;" gradeval="E<?php echo $sn112 ?>" data-value="E" value="E" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "E") {
                                                                                                                                                                                      echo "checked";
                                                                                                                                                                                    } ?> name="grade[item<?php echo $item_id ?>]" />
                  </td>
                  <td class="checkRadio" value="N" number="<?php echo $sn112 ?>">
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

                      <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i style="font-weight: bold;" class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $sn112 . '. '; ?>" data-appenditemname="<?php echo $name ?>"></i></button>

                    </div>
                    <?php

                    if ($cts2 == '1') {
                    ?>

                      <div style="display: flex;">

                        <button data-bs-placement="right" title="Grades Info" type="button" class="badge info heee" id="CTSDrop<?php echo $item_id; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><img style="height: 20px;" src="<?php echo BASE_URL; ?>assets/cts1.png"></button>


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
                          <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectinfoDropdown<?php echo $std_subi; ?>">
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
                          <button data-bs-toggle="tooltip" data-bs-placement="right" title="Send" type="button" class="badge append_data1"><i style="font-weight: bold;" class="bi bi-arrow-right-short append_data" data-appenditemid="<?php echo $sn112 . $sn116 . '. '; ?>" data-appenditemname="<?php echo $name_sub ?>"></i></button>
                        </div>
                        <?php

                        if ($cts3 == '1') {
                        ?>

                          <div style="display: flex;">

                            <button data-bs-placement="right" title="Grades Info" type="button" class="badge info heee" id="CTSSubDrop<?php echo $std_subi; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation><img style="height: 20px;" src="<?php echo BASE_URL; ?>assets/cts1.png"></button>


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
        <h4>Extra item </h4>
        <table class="table table-bordered table-hover" id="itemtable3">
          <thead class="bg-secondary" style="display:none">
            <tr>
              <th class="text-light">Id</th>
              <th class="text-light">Item</th>
              <th class="text-light"><input type="radio" class="main_radio main_u2" name="main">U</th>
              <th class="text-light"><input type="radio" class="main_radio main_f2" name="main">F</th>
              <th class="text-light"><input type="radio" class="main_radio main_g2" name="main">G</th>
              <th class="text-light"><input type="radio" class="main_radio main_v2" name="main">V</th>
              <th class="text-light"><input type="radio" class="main_radio main_e2" name="main">E</th>
              <th class="text-light"><input type="radio" class="main_radio main_n2" name="main">N</th>
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
                  $class_value = "itemDetail";
                  $fetch_values = "itemDetalContainer";
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
                  <td><?php echo $name_sub1 ?>
                    <!-- <span id="selectitemDropdown<?php echo $iddes ?>" <?php echo $class_value; ?> data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation  name="<?php echo $iddes; ?>" value="<?php echo $fetchuser_id; ?>" data-value="<?php echo $bac_ground2; ?>"><?php echo $name_sub1; ?> </span>
                 <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectitemDropdown<?php echo $iddes ?>">
                          <span class="dropdown-header <?php echo $fetch_values; ?>">

                          </span>


                        </div> -->
                  </td>
                  </td>
                  <td class="extraItem" value="U" number="<?php echo $grades; ?>">
                    <input style="margin: 5px; padding: 5px;" type="radio" <?php if ($grade2 == "U") {
                                                                              echo "checked";
                                                                            } ?> data-value="U" class="radio3" value="U" data-valuees="<?php echo $grades ?>" number="<?php echo $iddes; ?>" name="grades1[<?php echo $grades ?>]" />
                  </td>
                  <td class="extraItem" value="F" number="<?php echo $grades; ?>">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" <?php if ($grade2 == "F") {
                                                                                                      echo "checked";
                                                                                                    } ?> class="radio3" type="radio" data-value="F" value="F" name="grades1[<?php echo $grades ?>]" />
                  </td>
                  <td class="extraItem" value="G" number="<?php echo $grades; ?>">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" class="radio3" <?php if ($grade2 == "G") {
                                                                                                                    echo "checked";
                                                                                                                  } ?> type="radio" data-value="G" value="G" name="grades1[<?php echo $grades ?>]" />
                  </td>
                  <td class="extraItem" value="V" number="<?php echo $grades; ?>">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" <?php if ($grade2 == "V") {
                                                                                                      echo "checked";
                                                                                                    } ?> class="radio3" type="radio" data-value="V" value="V" name="grades1[<?php echo $grades ?>]" />
                  </td>
                  <td class="extraItem" value="E" number="<?php echo $grades; ?>">
                    <input style="margin: 5px; padding: 5px;" data-valuees="<?php echo $grades ?>" <?php if ($grade2 == "E") {
                                                                                                      echo "checked";
                                                                                                    } ?> type="radio" data-value="E" class="radio3" value="E" name="grades1[<?php echo $grades ?>]" />
                  </td>
                  <td class="extraItem" value="N" number="<?php echo $grades; ?>">
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
                    <a href="delete_extra_item.php?id=<?php echo $del_id_it ?>"><i class="bi bi-x-circle-fill text-dark"></i></a>
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
          <div class="card-body">
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

                    <div class="col-5 d-flex mt-2 justify-content-center border" style="margin-left: 5px;">
                      <label><?php echo $hash_names ?>
                        <input type="hidden" value="<?php echo $row1['hashCheck']; ?>" name="hashoff[]">
                      </label>
                      <button class="btn btn-sm decrement" type="button" value="<?php echo $row1['id']; ?>" onclick="decrement(this.value)"><i class="bi bi-dash-circle"></i></button>
                      <input type="text" readonly style="width:40px;border-radius:5px;text-align: center;" id="counting<?php echo $row1['id']; ?>" class="count" name="hashoff_value[]" value="<?php echo $hash_valuees; ?>">
                      <button class="btn btn-sm increment" type="button" value="<?php echo $row1['id']; ?>" onclick="increment(this.value)"><i class="bi bi-plus-circle"></i></button>
                    </div>

                <?php }
                } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-hover-shadow">
          <div class="card-body">
            <div class="row" style="margin: 0px;padding:0px">
              <div class="row justify-content-center" style="margin: 0px;padding:5px">
                <button class="btn btn-outline-success m-1" style="display:none;"><i class="bi bi-badge-ad"></i></button>
                <button class="btn btn-outline-danger m-1" style="display:none;"><i class="bi bi-card-text"></i></button>
                <button class="btn btn-outline-secondary m-1" style="display:none;"><i class="bi bi-book"></i></button>
                <button class="btn btn-outline-info m-1" style="display:none;"><i class="bi bi-ui-checks"></i></button>
                <!-- <button class="btn btn-success"><i class="bi bi-house-add"></i></button> -->
                <button class="btn btn-outline-warning m-1" style="display:none;"><i class="bi bi-list-check"></i></button>
                <button class="btn btn-success m-1" style="display:none;"><i class="bi bi-paperclip"></i></button>
                <div class="dropdown dropup col-2" style="margin:0px;padding:5px">

                  <button type="button" class="btn btn-success btn-sm over_all_comment_add btncolor" id="selectLanguageDropdown2" data-bs-toggle="dropdown" title="Summary/Alibis" aria-expanded="false" data-bs-dropdown-animation style="padding:13px;">
                    <i class="bi bi-chat-left-text-fill"></i>

                  </button>
                  <span style="position: relative;top:-11px;color:red;">*</span>
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

                <div class="dropdown dropup col-2" style="margin:0px;padding:5px">

                  <button type="button" class="btn btn-success btn-sm btncolor" id="selectattchment" title="Attachament" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation style="padding:13px;">
                    <i class="bi bi-paperclip"></i>
                  </button>

                  <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectattchment" style="width:350px; height:auto; overflow-y:auto;">
                    <span class="dropdown-header" style="font-weight:bold; color: black;">Attachamnent
                      <input type="file" name="" class="form-control">
                    </span>


                  </div>
                </div>

              </div>

              <div class="row justify-content-center mt-1" style="margin: 0px;padding:5px">
                <div class="dropdown dropup col-auto" style="margin:0px;padding:5px">

                  <button type="button" class="btn btn-success btn-sm status myButton btncolor" id="selectLanguageDropdown1" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                    <?php if ($status_code1 != "") {
                      echo $status_code1;
                    } else {
                      echo "Status";
                    } ?>
                    <span style="position: relative;top:-11px;color:red;">*</span>
                  </button>

                  <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown1">
                    <span class="dropdown-header">Status
                    </span>
                    <table class="table table-striped table-bordered table-hover" id="codetable">
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
                <div class="dropdown dropup col-auto" style="margin:0px;padding:5px">

                  <button type="button" class="btn btncolor btn-success btn-sm over_all_comment_add " title="Add Extra Items For This Gradesheet" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                    Extra Items

                  </button>

                  <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown" style="width:300px; height:600px; overflow-y:auto;">
                    <span class="dropdown-header">Extra item
                    </span>

                    <!-- <form action="extra_item_subitem.php" method="post"> -->
                    <table class="table table-bordered table-striped table-hover" id="itemsubitemextratable">
                      <input class="form-control" type="text" id="searchextraitem" onkeyup="itemextra_Search()" placeholder="Search for Folder.." title="Type in a name"><br>
                      <thead class="bg-dark">
                        <th class="text-light"><input type="checkbox" id="select-extra-itemextra" name="uuu[]"></th>
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
                                <td><input type="checkbox" name="item[]" value="<?php echo $rowallnotitem1 ?>" class="checkallextraitem1"></td>
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
                                <td><input type="checkbox" name="subitem[]" value="<?php echo $rowallnotsubitem1 ?>" class="checkallextraitem1"></td>
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
                <div class="col-auto" style="margin:0px;padding:5px">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#additional-training" class="btn btn-success btncolor btn-sm " title="Add/Clear Additional Task For Upcoming Events" id="additional_training">Additional Task</button>
                </div>
                <div class="col-auto" style="margin:0px;padding:5px">
                  <button type="button" class="btn btncolor btn-success  btn-sm" data-bs-toggle="modal" data-bs-target="#desctask" title="Discipline Log">Discipline</button>
                </div>
                <div class="col-auto" style="margin:0px;padding:5px">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#unaccomplish-training" title="Select/Clear Unaccomplished Task For This Class" class="btn btn-success btncolor btn-sm " id="Unaccomplish_but">Unaccomplished Tasks </button>
                </div>
                <div class="col-auto" style="margin:0px;padding:5px">
                  <button type="button" class="btn btncolor btn-success  btn-sm" data-bs-toggle="modal" data-bs-target="#clearncetask" title="Add Additional Task">Clearance Log</button>
                </div>
                <div class="col-auto" style="margin:0px;padding:5px">
                  <button type="button" class="btn btncolor btn-success  btn-sm" data-bs-toggle="modal" data-bs-target="#memotask" title="Memorandum For Record">Memorandum</button>
                </div>

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

                if ($role == "super admin" && $number_of_rows53 > 0 && $number_of_rows54 == 0) { ?>
                  <button style="left-margin:10px" class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#ask_mark_per_admin"><i class="bi bi-bookmark-plus-fill"></i></button>
                <?php  } ?>
                <button style="left-margin:10px;display:none" id="ask_mark_per1" class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#ask_mark_per"><i class="bi bi-bookmark-plus-fill"></i></button>
                <?php
                $lockQ = $connect->query("SELECT `status` FROM `gradesheet` WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class_id = '$classid' AND phase_id = '$phase_id' AND class = '$class_name'");
                $lockQData = $lockQ->fetchColumn();
                if ($lockQData == 1) {
                ?>
                  <button type="button" class="btn" style="float:right;"><img src="<?php echo BASE_URL; ?>assets/svg/lock/lock.png" style="height: 25px;"></button>
                <?php } else { ?>
                  <button type="button" class="btn" style="float:right;"><img src="<?php echo BASE_URL; ?>assets/svg/lock/unlock.png" style="height: 25px;"></button>
                <?php } ?>
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
                <h3 class="modal-title text-success" id="exampleModalLabel">Additional Item</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Nav -->
                <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="add_additional-tab" href="#add_additional" data-bs-toggle="pill" data-bs-target="#add_additional" role="tab" aria-controls="add_additional" aria-selected="true">
                      <div class="d-flex align-items-center text-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add">
                        <i class="bi bi-plus-lg"></i>
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="create_Additional-tab" href="#create_Additional" data-bs-toggle="pill" data-bs-target="#create_Additional" role="tab" aria-controls="create_Additional" aria-selected="false">
                      <div class="d-flex align-items-center text-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Clear">
                        <i class="bi bi-dash"></i>
                      </div>
                    </a>
                  </li>
                </ul>
                <!-- End Nav -->

                <!-- Tab Content -->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="add_additional" role="tabpanel" aria-labelledby="add_additional-tab">
                    <div class="container bg-white">

                      <table class="table table-bordered src-table1" id="addsearch1" style="height:50%;">
                        <input class="form-control" type="text" id="addsearchtable" onkeyup="add_task()" placeholder="Search for Item.." title="Type in a name"><br>
                        <thead class="bg-dark">
                          <tr>
                            <th class="text-light"><input type="checkbox" id="select-all-item1"></th>
                            <!-- <th class="text-light">Id</th> -->
                            <th class="text-light">Item</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          //fetch item
                          $allitem1_a = "SELECT * FROM itembank";
                          $statement1_a = $connect->prepare($allitem1_a);
                          $statement1_a->execute();

                          if ($statement1_a->rowCount() > 0) {
                            $result1_a = $statement1_a->fetchAll();
                            $sn = 1;
                            foreach ($result1_a as $row1) { ?>
                              <tr style="margin:2px; padding: 2px;">
                                <td> <input type="checkbox" name="add_list[]" value="<?php echo $row1['id'] ?>" class="checkalllist1"></td>
                                <!-- <td><?php echo $sn++ ?></td> -->
                                <td><?php echo $item_id1_a = $row1['item'];

                                    ?>

                                </td>
                              </tr>
                              <!-- fetch subitem -->
                          <?php
                            }
                          }
                          ?>
                          <?php
                          $allsubitem1_a = "SELECT * FROM sub_item";
                          $statement2_a = $connect->prepare($allsubitem1_a);
                          $statement2_a->execute();

                          if ($statement2_a->rowCount() > 0) {
                            $result2_a = $statement2_a->fetchAll();
                            $sn1 = 'a';
                            foreach ($result2_a as $row2) {
                              $std_subi1_a = $row2['id'];
                              $name_sub1_a = $row2['subitem'];
                          ?>
                              <tr>
                                <td> <input type="checkbox" name="add_list1[]" value="<?php echo $row2['id'] ?>" class="checkalllist1"></td>

                                <td><?php echo '<span>' . $name_sub1_a . '</span>';

                                    ?>
                                </td>

                              </tr>
                          <?php
                            }
                          } ?>



                        </tbody>

                      </table>
                      <!-- <button style="float:right; font-weight: bold; font-size:large; position:fixed; top: 170px;" type="button" class="btn btn-success" id="submitadditional">Select</button> -->
                    </div>
                  </div>

                  <div class="tab-pane fade" id="create_Additional" role="tabpanel" aria-labelledby="create_Additional-tab">
                    <div class="container bg-white">
                      <table class="table table-bordered src-table1" id="addsearch1_re">
                        <input class="form-control" type="text" id="addsearchtable_re" onkeyup="add_task_re()" placeholder="Search for Item.." title="Type in a name"><br>
                        <thead class="bg-dark">
                          <tr>
                            <th class="text-light"><input type="checkbox" id="select-all-item2"></th>
                            <!-- <th class="text-light">Id</th> -->
                            <th class="text-light">Item</th>

                          </tr>
                        </thead>
                        <tbody>
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
                  </div>
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
                <h3 class="modal-title text-success">Unaccomplished Task</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Nav -->
                <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="unaccomplish_add-tab" href="#unaccomplish_add" data-bs-toggle="pill" data-bs-target="#unaccomplish_add" role="tab" aria-controls="unaccomplish_add" aria-selected="true">
                      <div class="d-flex align-items-center text-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add">
                        <i class="bi bi-plus-lg"></i>
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="unaccomplish_create-tab" href="#unaccomplish_create" data-bs-toggle="pill" data-bs-target="#unaccomplish_create" role="tab" aria-controls="unaccomplish_create" aria-selected="false">
                      <div class="d-flex align-items-center text-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Clear">
                        <i class="bi bi-dash"></i>
                      </div>
                    </a>
                  </li>

                </ul>
                <!-- End Nav -->

                <!-- Tab Content -->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="unaccomplish_add" role="tabpanel" aria-labelledby="unaccomplish_add-tab">
                    <!-- <button type="button" class="btn btn-success" id="submitaccomplish" style="float:right; font-weight:bold; font-size:large; position:fixed;top: 170px;">Select</button> -->
                    <div class="container bg-white">
                      <table class="table table-bordered src-table2" id="unsearch1_re">
                        <input class="form-control" type="text" id="unsearchtable_re" onkeyup="unsearch_task_re()" placeholder="Search for Items" title="Type in a name"><br>
                        <thead class="bg-dark">
                          <tr>
                            <th class="text-light"><input type="checkbox" id="select-all-unitem1"></th>
                            <!-- <th>ID</th> -->
                            <th class="text-light">Name</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $fetch_items = "SELECT item.item
                    FROM item
                    INNER JOIN item_gradesheet ON item_gradesheet.item_id = item.id
                    WHERE (
                      item.course_id = '$std_course1' 
                      AND item.class_id = '$classid' 
                      AND item.phase_id = '$phase_id' 
                      AND item.class = '$class_name' 
                      AND (
                        item_gradesheet.user_id = '$fetchuser_id' 
                        AND (item_gradesheet.grade = '' OR item_gradesheet.grade = 'N')
                      )
                    )";
                          $fetch_itemsst = $connect->prepare($fetch_items);
                          $fetch_itemsst->execute();
                          if ($fetch_itemsst->rowCount() > 0) {
                            $sn_item = 1;
                            $re1 = $fetch_itemsst->fetchAll();
                            foreach ($re1 as $value1) {
                              $item_ides = $value1['item'];
                              $select_itemname = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                              $select_itemname->execute([$item_ides]);
                              $itemname = $select_itemname->fetchColumn();

                          ?>
                              <tr>
                                <td> <input type="checkbox" name="add_list_acc[]" id="<?php echo 'item' ?>" value="<?php echo $value1['item'] ?>" class="checkallaccomplish"></td>
                                <!-- <td style="text-align:end;"><?php echo $sn_item++; ?></td> -->
                                <td><?php echo '<span>' . $itemname . '</span>';

                                    ?>
                                </td>

                              </tr>
                          <?php }
                          }
                          ?>
                          <?php
                          $fetch_subitems = "SELECT subitem.subitem
                  FROM subitem
                  INNER JOIN subitem_gradesheet ON subitem_gradesheet.subitem_id = subitem.id
                  WHERE (
                    subitem.course_id = '$std_course1'
                    AND subitem.class_id = '$classid'
                    AND subitem.phase_id = '$phase_id'
                    AND subitem.class = '$class_name'
                    AND subitem_gradesheet.user_id = '$fetchuser_id'
                    AND (subitem_gradesheet.grade = '' OR subitem_gradesheet.grade = 'N')
                  )";
                          $fetch_subitemsst = $connect->prepare($fetch_subitems);
                          $fetch_subitemsst->execute();
                          if ($fetch_subitemsst->rowCount() > 0) {
                            $sn_subitem = 'a';
                            $re2 = $fetch_subitemsst->fetchAll();
                            foreach ($re2 as $value2) {
                              $std_subi2 = $value2['subitem'];
                              $stud_subi2 = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
                              $stud_subi2->execute([$std_subi2]);
                              $name_sub2 = $stud_subi2->fetchColumn();
                          ?>
                              <tr>
                                <td> <input type="checkbox" name="add_list_acc1[]" id="<?php echo 'subitem' ?>" value="<?php echo $value2['subitem'] ?>" class="checkallaccomplish"></td>
                                <!-- <td style="text-align:end;"><?php echo $sn_subitem++; ?></td> -->
                                <td><?php echo '<span>' . $name_sub2 . '</span>';

                                    ?>
                                </td>

                              </tr>

                          <?php }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="unaccomplish_create" role="tabpanel" aria-labelledby="unaccomplish_create-tab">
                    <!-- <button type="submit" class="btn btn-success" style="float:right; font-weight:bold; font-size:large; position:fixed; top:170px;">Select</button> -->
                    <div class="container bg-white">
                      <table class="table table-bordered src-table2" id="unsearchtableclear">
                        <input class="form-control" type="text" id="unsearch1clear" onkeyup="unsearch_taskclear()" placeholder="Search for Items" title="Type in a name"><br>
                        <thead class="bg-dark">
                          <tr>
                            <th class="text-light"><input type="checkbox" id="select-all-unitem2"></th>
                            <!-- <th>ID</th> -->
                            <th class="text-light">Name</th>

                          </tr>
                        </thead>
                        <!-- <form action="insert_accomplish1.php" method="post">
                  <input type="hidden" value="<?php echo $class_name ?>" name="class_table"><input type="hidden" value="<?php echo $classid ?>" name="class_id"> -->
                        <tbody>
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
          </div>
        </div>
        </form>
        <center>

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
            <?php include 'percentagetable.php'; ?>
          </center>
        </div>
      </div>
    </div>
  </div>
  <!--modal for additional task-->
  <div class="modal fade" id="clearncetask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Additional Task</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php include ROOT_PATH . 'includes/Pages/clearancetable.php'; ?>
        </div>
      </div>
    </div>
  </div>
  <!--modal for memo-->
  <div class="modal fade" id="memotask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Memo Log</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
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
          <form action="" method="post">
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
              <input type="text" name="inst" value="<?php echo $std_in; ?>">
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
  <script type='text/javascript'>
    $('.myRadio1').change(function() {

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

    document.addEventListener("DOMContentLoaded", function() {
      const toggleRadioCells = document.querySelectorAll(".checkRadio");

      toggleRadioCells.forEach(td => {
        td.addEventListener("click", function() {
          const radio = td.querySelector("input[type='radio']");
          const na = td.getAttribute("value");
          const num1 = td.getAttribute("number");
          radio.checked = !radio.checked;

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
      });
    });

    document.addEventListener("DOMContentLoaded", function() {
      const toggleRadioCells = document.querySelectorAll(".extraItem");

      toggleRadioCells.forEach(td => {
        td.addEventListener("click", function() {
          const radio = td.querySelector("input[type='radio']");
          const na = td.getAttribute("value");
          const num1 = td.getAttribute("number");
          radio.checked = !radio.checked;

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
      });
    });


    document.addEventListener("DOMContentLoaded", function() {
      const toggleRadioCells = document.querySelectorAll(".checkSubRadio");

      toggleRadioCells.forEach(td => {
        td.addEventListener("click", function() {
          const radio = td.querySelector("input[type='radio']");
          const na = td.getAttribute("value");
          const num1 = td.getAttribute("number2");
          const num2 = td.getAttribute("number");
          radio.checked = !radio.checked;

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
      });
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
    }
    overall_all_com

    var overall_all_com = document.getElementById('overall_all_com').value;
    if (overall_all_com.trim() === '') {
      alert('Please Fill in the summery before submitting the form.');
      event.preventDefault(); // Prevent the form from submitting
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
    alert("h");
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

</html>