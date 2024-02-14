<?php
// ini_set('display_errors', 1);
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$phase_id = "";
$phase_name = "";
$symbol = "";
$ctp_name = "";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Add Item Subitem</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<!-- <style type="text/css">
  tr:hover {
    background-color: #accbec6b;
  }
</style> -->

<body>

  <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h3 class="text-success">Add Item And Subitem</h3>
          <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To the Class Page" style="color:black; text-decoration:none;" href="phase-view.php"><i class="bi bi-arrow-left"></i></a>

        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <!--1st Row-->

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Body -->
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-4">
                    <?php

                    if (isset($_GET['class_id']) && isset($_GET['class'])) {
                      $_SESSION['item_class_id'] = $class_id = $_GET['class_id'];
                      $_SESSION['item_class'] = $class = $_GET['class'];
                      $class_data = "SELECT * FROM $class where id='$class_id'";
                      $statement = $connect->prepare($class_data);
                      $statement->execute();
                      // var_dump($statement->rowCount() > 0);
                      if ($statement->rowCount() > 0) {
                        $result = $statement->fetchAll();
                        $sn = 1;
                        foreach ($result as $row) {
                          if ($class == 'actual') {
                            $symbol = $row['symbol'];
                          } else {
                            $symbol = $row['shortsim'];
                          }
                          $phase_id = $row['phase'];
                          $ctp = $row['ctp'];
                          $fetch_phase_name = $connect->prepare("SELECT phasename FROM `phase` WHERE id=?");
                          $fetch_phase_name->execute([$phase_id]);
                          $phase_name = $fetch_phase_name->fetchColumn();
                          $fetch_ctp_name = $connect->prepare("SELECT course FROM `ctppage` WHERE CTPid=?");
                          $fetch_ctp_name->execute([$ctp]);
                          $ctp_name = $fetch_ctp_name->fetchColumn();
                        }
                      }
                    } else if (isset($_SESSION['item_class_id']) && isset($_SESSION['item_class'])) {
                      $class_id = $_SESSION['item_class_id'];
                      $class = $_SESSION['item_class'];

                      $class_data = "SELECT * FROM $class where id='$class_id'";
                      $class_data;
                      $statement = $connect->prepare($class_data);
                      $statement->execute();

                      if ($statement->rowCount() > 0) {
                        $result = $statement->fetchAll();
                        $sn = 1;
                        foreach ($result as $row) {
                          if ($class == 'actual') {
                            $symbol = $row['symbol'];
                          } else {
                            $symbol = $row['shortsim'];
                          }
                          $phase_id = $row['phase'];
                          $ctp = $row['ctp'];
                          $fetch_phase_name = $connect->prepare("SELECT phasename FROM `phase` WHERE id=?");
                          $fetch_phase_name->execute([$phase_id]);
                          $phase_name = $fetch_phase_name->fetchColumn();
                          $fetch_ctp_name = $connect->prepare("SELECT course FROM `ctppage` WHERE CTPid=?");
                          $fetch_ctp_name->execute([$ctp]);
                          $ctp_name = $fetch_ctp_name->fetchColumn();
                        }
                      }
                    } else {
                      $class_id = "class not selected";
                      $class = "class name is not set";
                    }


                    ?>
                    <h4>Class : <span style="color:blue;"><?php echo $symbol ?></span></h4>
                    <h4>Phase : <span style="color:blue;"><?php echo $phase_name ?></span></h4>
                    <h4>Course : <span style="color:blue;"><?php echo $ctp_name ?></span></h4>
                  </div>


                </div>
              </div>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->


      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <!-- Body -->
            <div class="card-body">


              <!-- Nav -->
              <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="gradesheet-tab" href="#gradesheet" data-bs-toggle="pill" data-bs-target="#gradesheet" role="tab" aria-controls="gradesheet" aria-selected="true">
                    <div class="d-flex align-items-center text-success">
                      Create Gradesheet
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="item-tab" href="#item" data-bs-toggle="pill" data-bs-target="#item" role="tab" aria-controls="item" aria-selected="false">
                    <div class="d-flex align-items-center text-success">
                      Item
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="subitem-tab" href="#subitem" data-bs-toggle="pill" data-bs-target="#subitem" role="tab" aria-controls="subitem" aria-selected="false">
                    <div class="d-flex align-items-center text-success">
                      Subitem
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="hashoff-tab" href="#hashoff" data-bs-toggle="pill" data-bs-target="#hashoff" role="tab" aria-controls="hashoff" aria-selected="false">
                    <div class="d-flex align-items-center text-success">
                      # Of
                    </div>
                  </a>
                </li>
              </ul>
              <!-- End Nav -->



              <!-- Tab Content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="gradesheet" role="tabpanel" aria-labelledby="gradesheet-tab">

                  <center>
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#item-bank" id="student_details" onclick="itembtn();">Select Item</button>
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#hashoff-btn">Select #off</button>
                  </center>
                </div>

                <div class="tab-pane fade" id="item" role="tabpanel" aria-labelledby="item-tab">

                  <center>
                    <?php include "item_form.php"; ?>
                  </center>
                </div>

                <div class="tab-pane fade" id="subitem" role="tabpanel" aria-labelledby="subitem-tab">
                  <center>
                    <?php include "subitem_form.php"; ?>
                  </center>
                </div>

                <div class="tab-pane fade" id="hashoff" role="tabpanel" aria-labelledby="hashoff-tab">
                  <center>
                    <?php include "hashoff_form.php"; ?>
                  </center>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="container">

      </div>
      <!-- End Row -->
      <center>

        <!--3rd row-->
        <div class="row justify-content-center" id="select-item">

          <div class="col-lg-10 mb-3 mb-lg-4">
            <!-- Card -->
            <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

              <!-- Body -->
              <div class="card-body" style="text-align:left;">
                <form method="get" action="form_submit.php">

                  <h2 class="text-primary">Select Subitem According to the Item</h2>
                  <p>
                    <!-- <label for="check" title="All Check" class="btn btn-soft-success btn-xs"><i class="bi bi-check2-square"></i></label> --> 
                  <input type="checkbox" class="allItem" id="check" title="select all"/>
                  <button title="Save CTS" type="button" id="saveItem" class="btn btn-soft-success btn-xs"><i class="bi bi-plus-circle"></i></button>
                  <button title="Remove CTS" type="button" id="removeItem" class="btn btn-soft-danger btn-xs"><i class="bi bi-x-circle"></i></button>
                </p>

                  <?php
                  $q2 = "SELECT * FROM item where course_id='$ctp' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class' ORDER BY id ASC";
                  $st2 = $connect->prepare($q2);
                  $st2->execute();

                  if ($st2->rowCount() > 0) {
                    $re2 = $st2->fetchAll();
                    $sn1 = 1;
                    foreach ($re2 as $row2) {
                      $id_item = $row2['id'];
                      $get_id_items = $row2['item'];
                  ?>
                      <table class="table table-bordered table-striped" style="border-collapse: separate;border-spacing: 10px; width: max-content;">
                        <tr>
                          <td class="<?php echo $get_id_items ?>">
                            <?php
                            $item_name = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                            $item_name->execute([$get_id_items]);
                            $get_name = $item_name->fetchColumn();
                            echo  $sn1++ . ") " . $item_id = $get_name;
                            
                            if($row2['CTS']=='1'){
                              ?>
                              <i class="bi bi-check2-circle text-success"></i>
                              <?php 
                            }
                          
                            ?>

                            <input type="hidden" name="items_id[]" value="<?php echo $item_id ?>">
                            <input type="hidden" name="std_idies[]" value="<?php echo $item_db_id ?>">
                            <input type="hidden" name="std_sub[]" value="item">

                            <button style="margin: 5px;" type="button" onclick="document.getElementById('get_item_id').value='<?php echo $get_id_items ?>';" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#insert_subitem" id="subitem_but<?php echo $get_id_items ?>">
                              subitem
                            </button>

                          </td>
                          <td><a href="delete_created_item.php?id=<?php echo $id_item ?>&item_id=<?php echo $get_id_items ?>&class_id=<?php echo $class_id ?>&phase_id=<?php echo $phase_id ?>&ctp=<?php echo $ctp ?>&class=<?php echo $class ?>" style="font-size:small; border:1px solid #ed4c78;"><i class="bi bi-trash-fill text-danger"></i></a></td>
                          <td>
                            <input type="checkbox" class="ctsItem" id="<?php echo $id_item ?>">
                            
                          </td>
                          

                        </tr>


                      </table>
                      <?php
                      $select_subs = "SELECT * FROM subitem where item='$get_id_items' and course_id='$ctp' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class' ORDER BY id ASC";
                      $select_subsst = $connect->prepare($select_subs);
                      $select_subsst->execute();

                      if ($select_subsst->rowCount() > 0) {
                        $sub_re = $select_subsst->fetchAll();
                        $sn6 = 'a';
                        foreach ($sub_re as $row3) {
                          $sub_id = $row3['id'];
                          $subs_id = $row3['subitem'];
                          $subitem_name = $connect->prepare("SELECT subitem FROM `sub_item` WHERE id=?");
                          $subitem_name->execute([$subs_id]);
                          $get_name_sub = $subitem_name->fetchColumn();
                          ?>
                        
                          
                            <span style="margin-left: 50px;"><?php echo  $sn6++ . " ) " . $get_name_sub ;
                            if($row3['CTS']=='1'){
                              ?>
                              <i class="bi bi-check2-circle text-success"></i>
                              <?php 
                            }
                            ?> </span><a class="btn-close" href="delete_subitem_created.php?id=<?php echo $sub_id ?>" aria-label="Close" style="margin:7px;"></a>
                     
                          <input type="checkbox" class="ctsSubItem" id="<?php echo $sub_id ?>" /><br>
                      <?php
                        }
                      } ?>

                  <?php  }
                  }

                  ?>


                  <input type="hidden" value="<?php echo $class_id ?>" name="class_id">
                  <input type="hidden" value="<?php echo $phase_id ?>" name="phase_id">
                  <input type="hidden" value="<?php echo $ctp ?>" name="ctp_id1">
                  <input type="hidden" value="<?php echo $class ?>" name="class">

                </form>

                <table class="table table-bordered table-striped" style="border-collapse: separate;border-spacing: 10px; width: max-content;">
                  <?php
                  $hashOff = $connect->query("SELECT * FROM hashoff_gradesheet WHERE ctpId = '$ctp' AND classId = '$class_id' AND phaseId = '$phase_id' AND className='$class' ORDER BY id ASC");

                  while ($hashData = $hashOff->fetch()) {
                    $hashId = $hashData['hashCheck'];
                    $hasName = $connect->query("SELECT hashoff FROM hashoff WHERE id = '$hashId'");
                    $hashName = $hasName->fetchColumn();
                  ?>
                    <tr>
                      <td><?php echo $hashName; ?></td>
                      <td><a href="delete_created_item.php?hashOffId=<?php echo $hashId; ?>&phaseId=<?php echo $phase_id; ?>&classId=<?php echo $class_id; ?>&ctpId=<?php echo $ctp; ?>&className=<?php echo $class; ?>" style="font-size:small; border:1px solid #ed4c78;"><i class="bi bi-trash-fill text-danger"></i></a></td>
                    </tr>
                  <?php
                  }
                  ?>

                </table>
                
              </div>
              <!-- End Body -->
            </div>
            <!-- End Card -->
          </div>
        </div>
        <!-- 3rd End Row -->


        <!--5th row-->
        <center>
          <div class="row justify-content-center" style="display:none;" id="list-all">

            <div class="col-lg-10 mb-3 mb-lg-5">
              <!-- Card -->
              <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

                <!-- Body -->
                <div class="card-body" style="text-align:left;">
                  <h2 class="text-primary">All list</h2>

                  <?php
                  $q2 = "SELECT * FROM item where course_id='$ctp' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class' ORDER BY id ASC";
                  $st2 = $connect->prepare($q2);
                  $st2->execute();

                  if ($st2->rowCount() > 0) {
                    $re2 = $st2->fetchAll();
                    $sn1 = 1;
                    foreach ($re2 as $row2) {
                      $get_id_items = $row2['item'];
                      $id_item = $row2['id'];
                  ?>
                      <table class="table" style="border-collapse: separate;border-spacing: 10px; width: max-content;" id="listtable">
                        <tr>

                          <td class="text-success" style="font-size:large; font-weight: bold;">

                            <?php
                            $item_name = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");

                            $item_name->execute([$get_id_items]);
                            $get_name = $item_name->fetchColumn();
                            echo  $sn1++ . ") " . $item_id = $get_name;
                            $sel_sub = "SELECT * FROM subitem where item='$get_id_items' AND course_id='$ctp' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class'";
                            $sel_subst2 = $connect->prepare($sel_sub);
                            $sel_subst2->execute();

                            if ($sel_subst2->rowCount() > 0) {
                              $re3 = $sel_subst2->fetchAll();
                              $sn2 = 'a';
                              foreach ($re3 as $row3) {
                                $sub = $row3['subitem'];
                                $sub_id = $row3['id'];
                                $subitem_name = $connect->prepare("SELECT subitem FROM `sub_item` WHERE id=?");
                                $subitem_name->execute([$sub]);
                                $get_name_subitem = $subitem_name->fetchColumn();
                                echo '<dd style="margin-left:40px"><br>' . $sn2++ . ') ' . $get_name_subitem . '</dd>';
                              }
                            } ?>

                            <?php  ?>


                          </td>

                          <!-- <td><button type="button" class="btn-close" aria-label="Close"></button></td> -->

                        </tr>
                      </table>

                  <?php  }
                  }

                  ?>

                </div>
                <!-- End Body -->

              </div>
              <!-- End Card -->
            </div>
          </div>
        </center>
        <!--5th End Row -->
        <!-- End Content -->
  </main>

  <!--select item to the table-->
  <div class="modal fade" id="item-bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalScrollableTitle">Item Bank</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <form action="form_submit.php" method="get">
            <table class="table table-bordered src-table1 table-hover" id="selectitemtable">
              <input style="margin:5px;" class="form-control" type="text" id="selectitemsearch" onkeyup="selectitem()" placeholder="Search for Subitem name.." title="Type in a name">
              <thead class="bg-dark">
                <tr>
                  <th class="text-light"><input type="checkbox" id="select-all-item"></th>
                  <th class="text-light">Id</th>
                  <th class="text-light">Item</th>

                </tr>
              </thead>
              <tbody>
                <?php

                $item_sel = "SELECT * FROM itembank";
                $item_selst = $connect->prepare($item_sel);
                $item_selst->execute();

                if ($item_selst->rowCount() > 0) {
                  $students = $item_selst->fetchAll();

                  $i = 0;
                  $sn = 1;
                  foreach ($students as $student) {
                    $check_id = $student['id'];
                    $checkitem_sel = "SELECT * FROM item where item='$check_id' AND course_id='$ctp' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class'";
                    $checkitem_selst = $connect->prepare($checkitem_sel);
                    $checkitem_selst->execute();


                    if ($checkitem_selst->rowCount() <= 0) {

                ?>
                      <tr>
                        <td><input type="checkbox" class="get_value" name="itemcheck[]" value="<?php echo $student['id'] ?>" /></td>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $student['item']; ?></td>
                      </tr>
                <?php
                      $i++;
                    }
                  }
                }
                ?>
                <input type="hidden" value="<?php echo $class_id ?>" name="class_id">
                <input type="hidden" value="<?php echo $phase_id ?>" name="phase_id">
                <input type="hidden" value="<?php echo $ctp ?>" name="ctp_id1">
                <input type="hidden" value="<?php echo $class ?>" name="class">
              </tbody>
            </table>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="submit">Select</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Subitem modal-->
  <div class="modal fade" id="insert_subitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel2">Subitem Bank</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>
        <div class="modal-body">
          <form action="submit_subitem.php" method="post">
            <input type="hidden" value="" id="get_item_id" name="get_item_id_value">
            <table class="table table-bordered src-table2 table-hover" id="selectsubitemtable">
              <input style="margin:5px;" class="form-control" type="text" id="selectsubitemsearch" onkeyup="selectsubitem()" placeholder="Search for Subitem name.." title="Type in a name">
              <thead class="bg-dark">
                <tr>
                  <th class="text-light"><input type="checkbox" id="select-all-subitem"></th>
                  <th class="text-light">ID</th>
                  <th class="text-light">Name</th>

                </tr>
              </thead>
              <tbody>
                <?php

                $subitem_sel = "SELECT * FROM sub_item";
                $subitem_selst = $connect->prepare($subitem_sel);
                $subitem_selst->execute();

                if ($subitem_selst->rowCount() > 0) {
                  $jobs = $subitem_selst->fetchAll();
                  $j = 1;
                  $totalJobs = count($jobs);
                  foreach ($jobs as $job) {
                    $check_subitem_id = $job['id'];
                    $checksubitem_sel = "SELECT * FROM subitem where subitem='$check_subitem_id' AND course_id='$ctp' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class'";
                    $checksubitem_selst = $connect->prepare($checksubitem_sel);
                    $checksubitem_selst->execute();


                    if ($checksubitem_selst->rowCount() <= 0) {
                ?>
                      <tr>
                        <td><input class="selSubItem" type="checkbox" name="subcheck[]" id="<?php echo $job['id'] ?>" value="<?php echo $job['id']; ?>" /></td>
                        <td><?php echo $job['id']; ?></td>
                        <td><?php echo $job['subitem']; ?></td>
                      </tr>
                <?php
                      $j++;
                    }
                  }
                }
                ?>
                <input type="hidden" value="<?php echo $class_id ?>" name="class_id">
                <input type="hidden" value="<?php echo $phase_id ?>" name="phase_id">
                <input type="hidden" value="<?php echo $ctp ?>" name="ctp_id1">
                <input type="hidden" value="<?php echo $class ?>" name="class">
              </tbody>
            </table>
            <div class="modal-footer">
              <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" id="get_subitem">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="hashoff-btn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Add #off</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="addHashOff.php" method="POST">
            <table class="table table-bordered table-hover" id="hashtable">
              <input style="margin:5px;" class="form-control" type="text" id="hashsearch" onkeyup="hash()" placeholder="Search for name.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-light"><input type="checkbox" id="select-all-hash"></th>
                <th class="text-light">#off</th>

              </thead>
              <?php
              // $output ="";
              $subitemq = "SELECT * FROM hashoff  ORDER BY id ASC";
              $subitemst1 = $connect->prepare($subitemq);
              $subitemst1->execute();
              if ($subitemst1->rowCount() > 0) {
                $subitemresul1 = $subitemst1->fetchAll();
                $sn = 1;
                foreach ($subitemresul1 as $row) {
                  $hID = $row['id'];

                  $hashOff_sel = "SELECT * FROM hashoff_gradesheet WHERE hashCheck = '$hID' AND ctpId='$ctp' AND classId = '$class_id' AND phaseId = '$phase_id' AND className = '$class'";
                  $hashOff_selst = $connect->prepare($hashOff_sel);
                  $hashOff_selst->execute();


                  if ($hashOff_selst->rowCount() <= 0) {
              ?>
                    <tr>
                      <td><input class="hashCheck" type="checkbox" name="hash_check[]" value="<?php echo $row['id'] ?>"></td>
                      <td><?php echo $row['hashoff'] ?></td>

                    </tr>
              <?php
                  }
                }
              }
              ?>
              <input type="hidden" value="<?php echo $class_id ?>" name="class_id">
              <input type="hidden" value="<?php echo $phase_id ?>" name="phase_id">
              <input type="hidden" value="<?php echo $ctp ?>" name="ctp_id1">
              <input type="hidden" value="<?php echo $class ?>" name="class">
            </table>
            <input type="submit" name="addHashOff" value="Add" class="btn btn-success" />
          </form>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function() {

      var c = "";
      $("#listtable").on('click', '#remove', function() {
        $(this).closest('td').remove();
        c--;
      });
    });
  </script>


  <script>
    document.getElementById('select-all').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  <script>
    // document.getElementById('select-all-item').onclick = function() {
    //   var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    //   for (var checkbox of checkboxes) {
    //     checkbox.checked = this.checked;
    //   }
    // }

    $("#select-all-item").click(function() {
      // When "Check All" button is clicked, toggle the checked state of all checkboxes with class "get_value"
      $(".get_value").prop("checked", !$(".get_value").prop("checked"));
    });

    // Click event for individual checkboxes
    $(".get_value").click(function() {
      // Check if all checkboxes with class "get_value" are checked
      var allChecked = $(".get_value").length === $(".get_value:checked").length;
      // Set the "Check All" button state accordingly
      $("#select-all-item").prop("checked", allChecked);
    });
  </script>

  <script>
    $("#select-all-subitem").click(function() {
      // When "Check All" button is clicked, toggle the checked state of all checkboxes with class "get_value"
      $(".selSubItem").prop("checked", !$(".selSubItem").prop("checked"));
    });

    // Click event for individual checkboxes
    $(".selSubItem").click(function() {
      // Check if all checkboxes with class "get_value" are checked
      var allChecked = $(".selSubItem").length === $(".selSubItem:checked").length;
      // Set the "Check All" button state accordingly
      $("#select-all-subitem").prop("checked", allChecked);
    });
  </script>

  <script>
    $("#select-all-hash").click(function() {
      // When "Check All" button is clicked, toggle the checked state of all checkboxes with class "get_value"
      $(".hashCheck").prop("checked", !$(".hashCheck").prop("checked"));
    });

    // Click event for individual checkboxes
    $(".hashCheck").click(function() {
      // Check if all checkboxes with class "get_value" are checked
      var allChecked = $(".hashCheck").length === $(".hashCheck:checked").length;
      // Set the "Check All" button state accordingly
      $("#select-all-hash").prop("checked", allChecked);
    });
  </script>


  <script>
    function selectitem() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("selectitemsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("selectitemtable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
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
    function hash() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("hashsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("hashtable");
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
    function selectsubitem() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("selectsubitemsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("selectsubitemtable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
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
    function remove() {
      var elem = document.getElementById('dummy');
      elem.parentNode.removeChild(elem);
      return false;
    }
  </script>

<script>
  $(document).ready(function() {
    // When the parent checkbox is clicked
    $(".allItem").on("click", function() {
      // Get its checked status
      var isChecked = $(this).prop("checked");

      // Set all child checkboxes to the same checked status as the parent checkbox
      $(".ctsItem").prop("checked", isChecked);
      $(".ctsSubItem").prop("checked", isChecked);
    });

    // When any of the child checkboxes are clicked
    $(".ctsItem").on("click", function() {
      // Check if all child checkboxes are checked
      var allChecked = $(".ctsItem").length === $(".ctsItem:checked").length;

      // Set the parent checkbox to checked only if all child checkboxes are checked
      $(".allItem").prop("checked", allChecked);
    });

    $(".ctsSubItem").on("click", function() {
      // Check if all child checkboxes are checked
      var allChecked = $(".ctsSubItem").length === $(".ctsSubItem:checked").length;

      // Set the parent checkbox to checked only if all child checkboxes are checked
      $(".allItem").prop("checked", allChecked);
    });
  });
</script>

<script>
  $("#saveItem").on("click", function() {
    // Create an array to store the checked child checkbox IDs
    var checkedBoxes = [];
    var subCheckedBoxes = [];

    // Loop through all the child checkboxes and add the IDs of the checked ones to the array
    $(".ctsItem:checked").each(function() {
      checkedBoxes.push($(this).attr("id"));
    });
    $(".ctsSubItem:checked").each(function() {
      subCheckedBoxes.push($(this).attr("id"));
    });

    // Send the data to the PHP script using AJAX
    $.ajax({
      type: "POST",
      url: "<?php echo BASE_URL; ?>includes/Pages/addItemCTS.php", // Replace with the path to your PHP script
      data: {
        checkboxes: checkedBoxes,
        subCheckedBoxes: subCheckedBoxes
      },
      success: function(response) {
        location.reload();
      }
    });
  });
  $("#removeItem").on("click", function() {
    // Create an array to store the checked child checkbox IDs
    var checkedBoxes = [];
    var subCheckedBoxes = [];

    // Loop through all the child checkboxes and add the IDs of the checked ones to the array
    $(".ctsItem:checked").each(function() {
      checkedBoxes.push($(this).attr("id"));
    });
    $(".ctsSubItem:checked").each(function() {
      subCheckedBoxes.push($(this).attr("id"));
    });

    // Send the data to the PHP script using AJAX
    $.ajax({
      type: "POST",
      url: "<?php echo BASE_URL; ?>includes/Pages/reItemCTS.php", // Replace with the path to your PHP script
      data: {
        checkboxes: checkedBoxes,
        subCheckedBoxes: subCheckedBoxes
      },
      success: function(response) {
        location.reload();
      }
    });
  });
</script>
 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
<script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>