<style type="text/css">
  .btn-soft-light:hover
  {
    background-color: #80808059;
  }
  .btn-soft-light:
  {
    background-color: #8080801a;
  }
  .btn-soft-primary:hover
  {
    background-color: #bbdefb !important;
  }
</style>

<div class="container">

  <!-- Nav -->
  <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="simtable3-tab" href="#simtable3" data-bs-toggle="pill" data-bs-target="#simtable3" role="tab" aria-controls="simtable3" aria-selected="true">
        <div class="d-flex align-items-center text-success">
          Add Sim
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="simgoals-tab" href="#simgoals" data-bs-toggle="pill" data-bs-target="#simgoals" role="tab" aria-controls="simgoals" aria-selected="false">
        <div class="d-flex align-items-center text-success">
          Goal Table
        </div>
      </a>
    </li>

  </ul>
  <!-- End Nav -->

  <!-- Tab Content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="simtable3" role="tabpanel" aria-labelledby="simtable3-tab">
      <div class="row">
        <center>
          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/sim_insert_data.php" style="width:fit-content;">
            <h3>Class : <span style="font-size:larger; color:green;">Simulation <?php echo $type_name_dep ?></span></h3>
            <div class="input-field">
              <table class="table table-bordered" id="table-field-sim">
                <tr>
                  <input type="hidden" name="phase_id" class="form-control" value="<?php echo $phase_id ?>">
                  <input type="hidden" name="phase" class="form-control" value="<?php echo $phase ?>">
                  <input type="hidden" name="ctp" class="form-control" value="<?php echo $ctp ?>">
                  <td class="short"><input type="text" name="sim[]" id="txt4" class="form-control" placeholder="Enter Simulation Class.." required></td>
                  <td class="short"><input maxlength="10" type="text" id="txt5" name="shortsim[]" class="form-control" placeholder="Symbol" required></td>
                  <td class="short"><input maxlength="10" type="hidden" class="type" name="ptype[]" class="form-control" placeholder="% Type" required></td>
                  <td class="short"><input maxlength="10" readonly style="background-color: #bfcfe09e;" class="type_value form-control" id="txt6" type="number" name="percentage[]" placeholder="100" required value="100"></td>
                  <td><button type="button" name="add_sim" id="add_sim" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
              <button style="margin:10px;" class="btn btn-success" type="submit" name="submit_sim">Save</button>
            </div>
          </form>
        </center>
      </div>
      <hr>

      <div class="row">
        <center>
          <table style="margin: 5px;" class="table table-striped table-bordered table-hover" id="simtable">
            <input class="form-control" type="text" id="simsearch" onkeyup="sim()" placeholder="Search for Simulation Class.." title="Type in a name"><br>
            <thead class="bg-dark">
              <th class="text-white">Sr No</th>
              <th class="text-white">Class Name</th>
              <th class="text-white">Symbol</th>
              <th class="text-white">Phase</th>
              <th class="text-white">CTp</th>
              <th style="display: none;" class="text-white">% Type</th>
              <th class="text-white">Percentage</th>
              <th class="text-white">item and subitem</th>
              <th class="text-white">Action</th>
            </thead>
            <?php
            // $output ="";
            $query2 = "SELECT * FROM sim where ctp='$ctp' and phase='$phase_id'";
            $statement2 = $connect->prepare($query2);
            $statement2->execute();
            if ($statement2->rowCount() > 0) {
              $result2 = $statement2->fetchAll();
              $sn = 1;
              foreach ($result2 as $row) {
                $sim_id = $row['id'];
                $ctps_name = $row['ctp'];
                $ctp1s_name = $connect->prepare("SELECT course FROM ctppage WHERE CTPid=?");
                $ctp1s_name->execute([$ctps_name]);
                $ctpname1s = $ctp1s_name->fetchColumn();
            ?>

                <tr>
                  <td><?php echo $sn++; ?></td>
                  <td>
                    <span title="<?php echo $row['sim']; ?>"><?php
                          $simValue = $row['sim'];
                          echo strlen($simValue) > 20 ? substr($simValue, 0, 20) . '...' : $simValue;
                      ?></span>
                  </td>
                  <td><?php echo $row['shortsim'] ?></td>
                  <td><?php echo $phase ?></td>
                  <td><?php echo $ctpname1s; ?></td>
                  <td style="display: none;"><?php echo $row['ptype'] ?></td>
                  <td><?php echo $row['percentage'] ?></td>
                  <td><a href="add_item_subitem.php?class_id=<?php echo $sim_id ?>&class=sim">Add</a></td>
                  <td><a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('id1').value='<?php echo $sim_id = $row['id'] ?>';
                                                         document.getElementById('sim1').value='<?php echo $row['sim'] ?>';
                                                         document.getElementById('shortsim1').value='<?php echo $row['shortsim'] ?>';" data-bs-toggle="modal" data-bs-target="#editsim"><i class="bi bi-pen-fill"></i></a>
                    <a class="btn btn-soft-danger btn-xs" href="sim_delete.php?id=<?php echo $sim_id ?>"><i class="bi bi-trash-fill"></i></a>
                    <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('idsim').value='<?php echo $sim_id = $row['id'] ?>';
                                                             " data-bs-toggle="modal" data-bs-target="#addgoalssim" title="Add Goals">
                     <img style="height: 15px;width: 15px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/goal.png">
                    </a>
                    <!-- <a class="btn btn-soft-secondary btn-xs" href="" onclick="document.getElementById('addSimDays').value='<?php echo $row['id'] ?>';document.getElementById('simLinesRequired').value='<?php echo $row['linesRequired'] ?>';document.getElementById('simStudentPerClass').value='<?php echo $row['studentPerClass'] ?>';" data-bs-toggle="modal" data-bs-target="#addDataSim" data-bs-title="Add"><i class="bi bi-stopwatch"></i> 

                    </a> -->

                    <a style="padding: 3px;border: 1px solid #0000001f;text-align: center;" class="btn btn-soft-light btn-xs" href="" onclick="document.getElementById('addSimDays').value='<?php echo $row['id'] ?>';document.getElementById('simLinesRequired').value='<?php echo $row['linesRequired'] ?>';document.getElementById('simStudentPerClass').value='<?php echo $row['studentPerClass'] ?>';" data-bs-toggle="modal" data-bs-target="#addDataSim" title="Add Lines Required">
                      <img style="height: 18px;width: 26px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/Vehicle.png">
                    </a>
                    <?php
                    $fetchShopId = $connect->query("SELECT id FROM shops WHERE ctpId = '$ctp'");
                    $shopId = $fetchShopId->fetchColumn();
                    $fetchFolderId = $connect->query("SELECT id FROM folders WHERE phaseId = '$phase_id'");
                    $folderId = $fetchFolderId->fetchColumn();
                    $checkClass = $connect->query("SELECT count(*) FROM user_briefcase WHERE classId = '$sim_id'");
                    if($checkClass->fetchColumn() <= 0){
                    ?>
                    <a class="btn btn-soft-secondary btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/addCtpShop.php?shopId=<?php echo $shopId; ?>&folderId=<?php echo $folderId; ?>&classId=<?php echo $sim_id; ?>&className=<?php echo $row['sim'] ?>&classTable=sim" data-bs-title="Add Briefcase">
                      <i class="bi bi-briefcase"></i>
                    </a>
                    <?php } ?>
                  </td>
                </tr>
              <?php
              }
            } else { ?>
              <tr>
                <td colspan='9' style="text-align:center">
                  No data
                </td>
              </tr>
            <?php  }
            ?>
          </table>
        </center>
      </div>
    </div>

    <div class="tab-pane fade" id="simgoals" role="tabpanel" aria-labelledby="simgoals-tab">
      <div class="row">
        <center>
          <table style="margin: 5px;" class="table table-striped table-bordered table-hover" id="simGoaltable">
            <input class="form-control" type="text" id="simGoalsearch" onkeyup="simGoal()" placeholder="Search for Simulation Class.." title="Type in a name"><br>
            <thead class="bg-dark">
              <th class="text-white">Sr No</th>
              <th class="text-white">Class Name</th>
              <th class="text-white">Symbol</th>
              <th class="text-white">Goals</th>
            </thead>
            <tbody>
              <?php
              $sr = 0;
              $className = $connect->query("SELECT *
                FROM sim
                WHERE id IN (SELECT goalClassId FROM table_golas WHERE goalTable = 'sim')");
              while ($classData = $className->fetch()) {
                $sr++;
                $classID = $classData['id'];
              ?>
                <tr>
                  <td><?php echo $sr; ?></td>
                  <td><?php echo $classData['sim']; ?></td>
                  <td><?php echo $classData['shortsim']; ?></td>
                  <td>
                    <?php
                    $goqlQuery = $connect->query("SELECT * FROM table_golas WHERE goalTable = 'sim' AND goalClassId = '$classID'");
                    while ($goalData = $goqlQuery->fetch()) {
                    ?>
                      <p>
                        <?php echo $goalData['goalName']; ?>
                        <a class="btn btn-soft-success btn-xs" id="edit_sim_goals_modal" data-id="<?php echo $goalData['id'] ?>" data-name="<?php echo $goalData['goalName']; ?>" data-bs-toggle="modal" data-bs-target="#editgoalssim"><i class="bi bi-pen-fill"></i>
                        </a>
                        <a class="btn btn-soft-danger btn-xs" href="goals_delete.php?id=<?php echo $goalData['id'] ?>"><i class="bi bi-trash-fill"></i></a>
                      </p>
                    <?php } ?>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </center>
      </div>
    </div>

  </div>
  <!-- End Tab Content -->




</div>




<!--Edit Sim class modal-->
<div class="modal fade" id="editsim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Sim Class</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL;?>includes/Pages/edit_sim_class.php">
          <input class="form-control" type="hidden" name="id" value="" id="id1" readonly>
          <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Class :</label>
          <input class="form-control" type="text" name="sim" value="" id="sim1">
          <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Symbol :</label>
          <input class="form-control" type="text" name="shortsim" value="" id="shortsim1"><br>
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<!--Edit actual class modal-->
<div class="modal fade" id="addDataSim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Sim Data</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL;?>includes/Pages/edit_sim_class.php">
          <table class="table">
            <input type="hidden" class="form-control" name="addSimDays" value="" id="addSimDays" readonly>
            <tr>
              <td>
                <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Lines Required :</label>
                <input type="number" class="form-control" name="linesRequired" value="" id="simLinesRequired">
              </td>
              <td>
                <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Student Per Class :</label>
                <input type="number" class="form-control" name="studentPerClass" value="" id="simStudentPerClass">
              </td>
            </tr>
          </table>
          <hr>
          <input class="btn btn-success" type="submit" name="addDays" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<!--Add goals to sim modal-->
<div class="modal fade" id="addgoalssim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Goals</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form class="insert-goals" id="goal" method="post" action="<?php echo BASE_URL;?>includes/Pages/goal_insert_data_actual.php">

            <div class="input-field">
              <table class="table table-bordered" id="table-field-goal-sim">
                <tr>
                  <input type="hidden" class="form-control" name="classId" value="" id="idsim" readonly>
                  <td><input type="text" name="goalsim[]" class="form-control" placeholder="Enter Goals" required></td>
                  <td><button type="button" name="add_goal_sim" id="add_goal_sim" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
              <button style="margin:10px;" class="btn btn-success" type="submit" name="submit_goal_sim">Save</button>
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- edit goals -->
<div class="modal fade" id="editgoalssim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Goals</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form class="insert-goals" id="goal" method="post" action="<?php echo BASE_URL;?>includes/Pages/goal_insert_data_actual.php">
            <div class="input-field">
              <input type="hidden" class="form-control sim_edit_id" name="id" value="" id="actual_edit_id1" readonly>
              <input type="text" name="goalactual" class="sim_edit_name form-control" value="" placeholder="Enter Goals" required>
              <button style="margin:10px;" class="btn btn-success" type="submit" name="edit_goal_actual">Save</button>
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<!--Script for adding multiple sim classes-->

<script type="text/javascript">
  $(document).ready(function() {
    var html1 = '<tr>\
                <td style="text-align: center;"><input type="text" name="sim[]" class="form-control" placeholder="Enter How many Sim Classes you want?" required></td>\
                <td class="short"><input maxlength="10" type="text" name="shortsim[]" class="form-control" placeholder="Symbol" required></td>\
                <td class="short"><input maxlength="10" type="hidden" class="type" name="ptype[]" class="form-control" placeholder="% Type" required></td>\
                <td class="short"><input maxlength="10" readonly style="background-color: #bfcfe09e;" class="type_value form-control" type="number" name="percentage[]" placeholder="Percentage" required value="100"></td>\
                <td><button type="button" name="remove_sim" id="remove_sim" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
              </tr>'
    var max1 = 100;
    var b = 1;

    $("#add_sim").click(function() {
      if (b <= max1) {
        $("#table-field-sim").append(html1);
        b++;
      }
    });
    $("#table-field-sim").on('click', '#remove_sim', function() {
      $(this).closest('tr').remove();
      b--;
    });
  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    var html = '<tr>\
                  <td style="text-align: center;"><input type="text" name="goalsim[]" class="form-control" placeholder="Enter Goals" required></td>\
                  <td><button type="button" name="remove_goal_sim" id="remove_goal_sim" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
    var max = 100;
    var a = 1;

    $("#add_goal_sim").click(function() {
      if (a <= max) {
        $("#table-field-goal-sim").append(html);
        a++;
      }
    });
    $("#table-field-goal-sim").on('click', '#remove_goal_sim', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>


<!--Search for sim class-->
<script>
  function sim() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("simsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("simtable");
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

  $(document).ready(function() {
    $(document).on('click', '#edit_sim_goals_modal', function() {
      var name = $(this).data('name');
      var id = $(this).data('id');
      $(".sim_edit_id").val(id);
      $(".sim_edit_name").val(name);
    });
  });

  function simGoal() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("simGoalsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("simGoaltable");
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