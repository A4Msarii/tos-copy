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
      <a class="nav-link active" id="actualtable3-tab" href="#actualtable3" data-bs-toggle="pill" data-bs-target="#actualtable3" role="tab" aria-controls="actualtable3" aria-selected="true">
        <div class="d-flex align-items-center text-success">
          Add Actual
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="actualgoals-tab" href="#actualgoals" data-bs-toggle="pill" data-bs-target="#actualgoals" role="tab" aria-controls="actualgoals" aria-selected="false">
        <div class="d-flex align-items-center text-success">
          Goal Table
        </div>
      </a>
    </li>

  </ul>
  <!-- End Nav -->

  <!-- Tab Content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="actualtable3" role="tabpanel" aria-labelledby="actualtable3-tab">
      <div class="row">
        <center>
          <form method="post" action="<?php echo BASE_URL;?>includes/Pages/actual_insert_data.php" style="width:fit-content;">
            <h3>Class : <span style="font-size:larger; color:green;">Actual <?php echo $type_name_dep ?></span></h3>
            <div class="input-field">
              <table class="table table-bordered" id="table-field-actual">
                <tr>
                  <input type="hidden" name="phase_id" class="form-control" value="<?php echo $phase_id ?>">
                  <input type="hidden" name="phase" class="form-control" value="<?php echo $phase ?>">
                  <input type="hidden" name="ctp" class="form-control" value="<?php echo $ctp ?>">
                  <td><input type="text" name="actual[]" class="form-control" placeholder="Enter Actual Class.." required></td>
                  <td><input maxlength="10" type="text" name="actualsymbol[]" class="form-control" placeholder="Symbol" required></td>
                  <td><input type="hidden" class="type" name="ptype[]" value="percentage" class="form-control" placeholder="% Type"></td>
                  <td><input readonly style="background-color: #bfcfe09e;" class="type_value form-control" type="number" name="percentage[]" placeholder="100" required value="100"></td>
                  <td><button type="button" name="add_actual" id="add_actual" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
              <input style="margin:10px;" class="btn btn-success" type="submit" name="submit_actual" value="Save">
            </div>
          </form>
        </center>
      </div>
      <hr>

      <div class="row">
        <center>
          <table class="table table-striped table-bordered table-hover" id="actualtable">
            <input class="form-control" type="text" id="actualsearch" onkeyup="actual()" placeholder="Search for Symbol.." title="Type in a name"><br>
            <thead class="bg-dark">
              <th class="text-white">Sr No</th>
              <th class="text-white">Class Name</th>
              <th class="text-white">Symbol</th>
              <th class="text-white">Phase</th>
              <th class="text-white">CTP</th>

              <th class="text-white">Percentage</th>
              <th class="text-white">item and subitem</th>
              <th class="text-white">Action</th>
            </thead>
            <?php
            // $output ="";
            $query1 = "SELECT * FROM actual where ctp='$ctp' and phase='$phase_id'";
            $statement1 = $connect->prepare($query1);
            $statement1->execute();
            if ($statement1->rowCount() > 0) {
              $result1 = $statement1->fetchAll();
              $sn = 1;
              foreach ($result1 as $row) {
                $id = $row['id']; ?>
                <tr>
                  <td><?php echo $sn++; ?></td>
                  <td>
                    <span title="<?php echo $row['actual']; ?>"><?php
                          $actualValue = $row['actual'];
                          echo strlen($actualValue) > 20 ? substr($actualValue, 0, 20) . '...' : $actualValue;
                      ?></span>
                      
                  </td>
                  <td><?php echo $row['symbol'] ?></td>
                  <td><?php echo $phase ?></td>
                  <td><?php echo $course ?></td>

                  <td><?php echo $row['percentage'] ?></td>
                  <td><a style="color:blue;" href="add_item_subitem.php?class_id=<?php echo $id ?>&class=actual">Add</a></td>
                  <td><a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('actual_edit_id').value='<?php echo $id = $row['id'] ?>';
                                                             document.getElementById('actual1').value='<?php echo $row['actual'] ?>';
                                                             document.getElementById('symbol').value='<?php echo $row['symbol'] ?>';" data-bs-toggle="modal" data-bs-target="#editactual" title="Edit Class"><i class="bi bi-pen-fill"></i>
                    </a>
                    <a class="btn btn-soft-danger btn-xs" title="Delete Class" href="<?php echo BASE_URL;?>includes/Pages/actual-delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill"></i></a>
                    <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('actual_edit_id1').value='<?php echo $id = $row['id'] ?>';" data-bs-toggle="modal" data-bs-target="#addgoalsactual" title="Add Goals"><img style="height: 15px;width: 15px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/goal.png">
                    </a>
                    <a style="padding: 3px;border: 1px solid #0000001f;text-align: center;" class="btn btn-soft-light btn-xs" href="" onclick="document.getElementById('addAcutalDays').value='<?php echo $row['id'] ?>';document.getElementById('actualLinesRequired').value='<?php echo $row['linesRequired'] ?>';document.getElementById('actualStudentPerClass').value='<?php echo $row['studentPerClass'] ?>';" data-bs-toggle="modal" data-bs-target="#addDataActual" title="Add Line Required">
                      <img style="height: 18px;width: 26px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/new/Vehicle.png">
                    </a>
                    <?php
                    $fetchShopId = $connect->query("SELECT id FROM shops WHERE ctpId = '$ctp'");
                    $shopId = $fetchShopId->fetchColumn();
                    $fetchFolderId = $connect->query("SELECT id FROM folders WHERE phaseId = '$phase_id'");
                    $folderId = $fetchFolderId->fetchColumn();
                    $checkClass = $connect->query("SELECT count(*) FROM user_briefcase WHERE classId = '$id'");
                    if($checkClass->fetchColumn() <= 0){
                    ?>
                    <a class="btn btn-soft-secondary btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/addCtpShop.php?shopId=<?php echo $shopId; ?>&folderId=<?php echo $folderId; ?>&classId=<?php echo $id; ?>&className=<?php echo $row['actual'] ?>&classTable=actual" title="Add Briefcase">
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

    <div class="tab-pane fade" id="actualgoals" role="tabpanel" aria-labelledby="actualgoals-tab">

      <div class="row">
        <table class="table table-striped table-bordered table-hover" id="actualGoaltable">
          <input class="form-control" type="text" id="actualGoalsearch" onkeyup="actualGoal()" placeholder="Search for Class.." title="Type in a name"><br>
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
              FROM actual
              WHERE id IN (SELECT goalClassId FROM table_golas WHERE goalTable = 'actual')");


            while ($classData = $className->fetch()) {
              $classID = $classData['id'];
              $sr++;
            ?>
              <tr>
                <td><?php echo $sr; ?></td>
                <td><?php echo $classData['actual']; ?></td>
                <td><?php echo $classData['symbol']; ?></td>
                <td>
                  <?php
                  $goqlQuery = $connect->query("SELECT * FROM table_golas WHERE goalTable = 'actual' AND goalClassId = '$classID'");
                  while ($goalData = $goqlQuery->fetch()) {
                  ?>
                    <p>
                      <?php echo $goalData['goalName']; ?>
                      <a class="btn btn-soft-success btn-xs" id="edit_goals_modal" data-id="<?php echo $goalData['id'] ?>" data-name="<?php echo $goalData['goalName']; ?>" data-bs-toggle="modal" data-bs-target="#editgoalsactual" title="Edit Goal"><i class="bi bi-pen-fill"></i>
                      </a>
                      <a class="btn btn-soft-danger btn-xs" title="Delete Goal" href="<?php echo BASE_URL;?>includes/Pages/goals_delete.php?id=<?php echo $goalData['id'] ?>"><i class="bi bi-trash-fill"></i></a>
                    </p>
                  <?php } ?>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>

        </table>
      </div>
    </div>


  </div>
  <!-- End Tab Content -->




</div>



<!--Edit actual class modal-->
<div class="modal fade" id="editactual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Actual Class</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL;?>includes/Pages/edit_actual_class.php">
          <input type="hidden" class="form-control" name="id" value="" id="actual_edit_id" readonly>
          <label style="color:black; font-weight:bold; margin:5px;float: left;">Class :</label>
          <input type="text" class="form-control" name="actual" value="" id="actual1">
          <label style="color:black; font-weight:bold; margin:5px;float: left;">Symbol :</label>
          <input type="text" class="form-control" name="symbol" value="" id="symbol">
          <hr>
          <input class="btn btn-success" type="submit" name="submit" value="Submit" style="float: right;">
        </form>
      </div>
    </div>
  </div>
</div>

<!--Edit actual class modal-->
<div class="modal fade" id="addDataActual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Actual Data</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL;?>includes/Pages/edit_actual_class.php">
          <table class="table">
            <tr>
              <input type="hidden" class="form-control" name="addAcutalDays" value="" id="addAcutalDays" readonly>
              <td>
                <label style="color:black; font-weight:bold; margin:5px;">Lines Required :</label>
                <input type="number" class="form-control" name="linesRequired" value="" id="actualLinesRequired">
              </td>
              <td>
                <label style="color:black; font-weight:bold; margin:5px;">Student Per Class :</label>
                <input type="number" class="form-control" name="studentPerClass" value="" id="actualStudentPerClass">
              </td>
            </tr>
          </table>
          <hr>
          <input class="btn btn-success" type="submit" name="addDays" value="Submit" style="float: right;">
        </form>
      </div>
    </div>
  </div>
</div>

<!--Add goals to actual modal-->
<div class="modal fade" id="addgoalsactual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <table class="table table-bordered" id="table-field-goal-actual">
                <tr>
                  <input type="hidden" class="form-control" name="classId" value="" id="actual_edit_id1" readonly>
                  <td><input type="text" name="goalactual[]" class="form-control" placeholder="Enter Goals" required></td>
                  <td><button type="button" name="add_goal_actual" id="add_goal_actual" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
              <hr>
              <button style="margin:10px;float: right;" class="btn btn-success" type="submit" name="submit_goal_actual">Save</button>
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- edit goals -->
<div class="modal fade" id="editgoalsactual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Goals</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form class="insert-goals" id="goal" method="post" action="goal_insert_data_actual.php">
            <div class="input-field">
              <input type="hidden" class="form-control edit_id" name="id" value="" id="actual_edit_id1" readonly>
              <input type="text" name="goalactual" class="edit_name form-control" value="" placeholder="Enter Goals" required>
              <button style="margin:10px;" class="btn btn-success" type="submit" name="edit_goal_actual">Save</button>
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>


<!--Script for adding multiple actual classes-->

<script type="text/javascript">
  $(document).ready(function() {
    var html = '<tr>\
                  <td style="text-align: center;"><input type="text" name="actual[]" class="form-control" placeholder="Enter Actual Class.." required></td>\
                  <td class="short"><input maxlength="10" type="text" name="actualsymbol[]" class="form-control" placeholder="Symbol" required></td>\
                  <td class="short"><input maxlength="10" type="hidden" value="percentage" class="type" name="ptype[]" class="form-control" placeholder="% Type" required></td>\
                  <td class="short"><input maxlength="10" readonly style="background-color: #bfcfe09e;" class="type_value form-control" type="number" name="percentage[]" placeholder="Percentage" required value="100"></td>\
                  <td><button type="button" name="remove_actual" id="remove_actual" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
    var max = 100;
    var a = 1;

    $("#add_actual").click(function() {
      if (a <= max) {
        $("#table-field-actual").append(html);
        a++;
      }
    });
    $("#table-field-actual").on('click', '#remove_actual', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

<script>
  function actual() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("actualsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("actualtable");
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
  function actualGoal() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("actualGoalsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("actualGoaltable");
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

<script type="text/javascript">
  $(document).ready(function() {
    var html = '<tr>\
                  <td style="text-align: center;"><input type="text" name="goalactual[]" class="form-control" placeholder="Enter Goals" required></td>\
                  <td><button type="button" name="remove_goal_actual" id="remove_goal_actual" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
    var max = 100;
    var a = 1;

    $("#add_goal_actual").click(function() {
      if (a <= max) {
        $("#table-field-goal-actual").append(html);
        a++;
      }
    });
    $("#table-field-goal-actual").on('click', '#remove_goal_actual', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });

  $(document).ready(function() {
    $(document).on('click', '#edit_goals_modal', function() {
      var name = $(this).data('name');
      var id = $(this).data('id');
      $(".edit_id").val(id);
      $(".edit_name").val(name);
    });
  });
</script>