<div class="container">

  <!-- Nav -->
  <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="testtable3-tab" href="#testtable3" data-bs-toggle="pill" data-bs-target="#testtable3" role="tab" aria-controls="testtable3" aria-selected="true">
        <div class="d-flex align-items-center text-success">
          Add Test
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="testgoals-tab" href="#testgoals" data-bs-toggle="pill" data-bs-target="#testgoals" role="tab" aria-controls="testgoals" aria-selected="false">
        <div class="d-flex align-items-center text-success">
          Goals table
        </div>
      </a>
    </li>
  </ul>
  <!-- End Nav -->

  <!-- Tab Content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="testtable3" role="tabpanel" aria-labelledby="testtable3-tab">
      <div class="row">
        <center>
          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/test_insert_data.php" style="width:fit-content;">
            <h3>Class : <span style="font-size:larger; color:green;">Test</span></h3>
            <div class="input-field">
              <table class="table table-bordered table-striped table-hover" id="table-field-test">
                <tr>
                  <input type="hidden" name="phase_id" class="form-control" value="<?php echo $phase_id ?>">
                  <input type="hidden" name="phase" class="form-control" value="<?php echo $phase ?>">
                  <input type="hidden" name="ctp" class="form-control" value="<?php echo $ctp ?>">
                  <td class="short"><input type="text" name="test[]" id="txt10" class="form-control" placeholder="Enter Test Class.." required></td>
                  <td class="short"><input maxlength="10" type="text" id="txt11" name="shorttest[]" class="form-control" placeholder="Symbol" required></td>
                  <td class="short"><input maxlength="10" type="hidden" class="type" name="ptype[]" class="form-control" placeholder="% Type" required></td>
                  <td class="short"><input maxlength="10" readonly style="background-color: #bfcfe09e;" id="txt12" class="type_value form-control" type="number" name="percentage[]" placeholder="100" required value="100"></td>
                  <td><button type="button" name="add_test" id="add_test" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
              <button class="btn btn-success" type="submit" name="submit_test" style="margin: 5px;">Save</button>
            </div>
          </form>
        </center>
      </div>
      <hr>
      <div class="row">
        <center>
          <table class="table table-striped table-bordered table-hover" id="testtable"> 
            <input class="form-control" type="text" id="testsearch" onkeyup="test()" placeholder="Search for Test Class.." title="Type in a name"><br>
            <thead class="bg-dark">
              <th class="text-white">Sr No</th>
              <th class="text-white">Class Name</th>
              <th class="text-white">Symbol</th>
              <th class="text-white">Phase</th>
              <th class="text-white">CTP</th>
              <th class="text-white">Percentage</th>
              <th class="text-white">Action</th>

            </thead>
            <?php
            $output = "";
            $query4 = "SELECT * FROM test where ctp='$ctp' and phase='$phase_id'";
            $statement4 = $connect->prepare($query4);
            $statement4->execute();
            if ($statement4->rowCount() > 0) {
              $result4 = $statement4->fetchAll();
              $sn = 1;
              foreach ($result4 as $row) {
                $ctpt_name = $row['ctp'];
                $ctp1t_name = $connect->prepare("SELECT course FROM ctppage WHERE CTPid=?");
                $ctp1t_name->execute([$ctpt_name]);
                $ctpname1t = $ctp1t_name->fetchColumn();
            ?>

                <tr>
                  <td><?php echo $sn++;
                      $id = $row['id'] ?></td>
                  <td>
                    <span title="<?php echo $row['test']; ?>"><?php
                          $testValue = $row['test'];
                          echo strlen($testValue) > 20 ? substr($testValue, 0, 20) . '...' : $testValue;
                      ?></span> 
                  </td>
                  <td><?php echo $row['shorttest'] ?></td>
                  <td><?php echo $phase ?></td>
                  <td><?php echo $ctpname1t; ?></td>

                  <td><?php echo $row['percentage'] ?></td>
                  <td><a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('testid').value='<?php echo $id = $row['id'] ?>';
                                               document.getElementById('testname').value='<?php echo $row['test'] ?>';
                                               document.getElementById('shorttestname').value='<?php echo $row['shorttest'] ?>';
                                            " data-bs-toggle="modal" data-bs-target="#edittest"><i class="bi bi-pen-fill"></i></a>
                    </a>
                    <a class="btn btn-soft-danger btn-xs" href="test-delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill"></i></a>
                    <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('test_id').value='<?php echo $id = $row['id'] ?>';
                                                             " data-bs-toggle="modal" data-bs-target="#addgoalstest"><i class="bi bi-diagram-3"></i>
                    </a>
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

    <div class="tab-pane fade" id="testgoals" role="tabpanel" aria-labelledby="testgoals-tab">
      <div class="row">
        <center>
          <table style="margin: 5px;" class="table table-striped table-bordered table-hover" id="simtable">
            <input class="form-control" type="text" id="simsearch" onkeyup="sim()" placeholder="Search for Simulation Class.." title="Type in a name"><br>
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
                FROM test
                WHERE id IN (SELECT goalClassId FROM table_golas WHERE goalTable = 'test')");
              while ($classData = $className->fetch()) {
                $sr++;
                $classID = $classData['id'];
              ?>
                <tr>
                  <td><?php echo $sr; ?></td>
                  <td><?php echo $classData['test']; ?></td>
                  <td><?php echo $classData['shorttest']; ?></td>
                  <td>
                    <?php
                    $goqlQuery = $connect->query("SELECT * FROM table_golas WHERE goalTable = 'test' AND goalClassId = '$classID'");
                    while ($goalData = $goqlQuery->fetch()) {
                    ?>
                      <p>
                        <?php echo $goalData['goalName']; ?>
                        <a class="btn btn-soft-success btn-xs" id="edit_test_goals_modal" data-id="<?php echo $goalData['id'] ?>" data-name="<?php echo $goalData['goalName']; ?>" data-bs-toggle="modal" data-bs-target="#editgoalsactest"><i class="bi bi-pen-fill"></i>
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



<!--Edit test class modal-->
<div class="modal fade" id="edittest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Test Class</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="edit_test_class.php">
          <input class="form-control" type="hidden" name="id" value="" id="testid" readonly>
          <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Class :</label>
          <input class="form-control" type="text" name="test" value="" id="testname">
          <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Symbol :</label>
          <input class="form-control" type="text" name="shorttest" value="" id="shorttestname"><br>
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div> <br><br>


<!--Add goals to sim modal-->
<div class="modal fade" id="addgoalstest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Goals</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form class="insert-goals" id="goal" method="post" action="goal_insert_data_actual.php">

            <div class="input-field">
              <table class="table table-bordered" id="table-field-goal-test">
                <tr>
                  <input type="hidden" class="form-control" name="classId" value="" id="test_id" readonly>
                  <td><input type="text" name="goaltest[]" class="form-control" placeholder="Enter Goals" required></td>
                  <td style="border: 1px solid white;"><button type="button" name="add_goal_test" id="add_goal_test" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
              <button style="margin:10px;" class="btn btn-success" type="submit" name="submit_goal_test">Save</button>
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- edit goals -->
<div class="modal fade" id="editgoalsactest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <input type="hidden" class="form-control test_edit_id" name="id" value="" id="actual_edit_id1" readonly>
              <input type="text" name="goalactual" class="test_edit_name form-control" value="" placeholder="Enter Goals" required>
              <button style="margin:10px;" class="btn btn-success" type="submit" name="edit_goal_actual">Save</button>
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<!--Script for addinf test-->
<script type="text/javascript">
  $(document).ready(function() {
    var html2 = '<tr>\
                <td style="text-align: center;"><input type="text" name="test[]" class="form-control" placeholder="Enter How many academic Classes you want?" required></td>\
                <td class="short"><input maxlength="10" type="text" name="shorttest[]" class="form-control" placeholder="Symbol" required></td>\
                <td class="short"><input maxlength="10" type="hidden" class="type" name="ptype[]" class="form-control" placeholder="% Type" required></td>\
                <td class="short"><input maxlength="10" readonly style="background-color: #bfcfe09e;" class="type_value form-control" type="number" name="percentage[]" placeholder="Percentage" required value="100"></td>\
                <td><button type="button" name="remove_test" id="remove_test" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
              </tr>'
    var max2 = 100;
    var c = 1;

    $("#add_test").click(function() {
      if (c <= max2) {
        $("#table-field-test").append(html2);
        c++;
      }
    });
    $("#table-field-test").on('click', '#remove_test', function() {
      $(this).closest('tr').remove();
      c--;
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var html = '<tr>\
                  <td style="text-align: center;"><input type="text" name="goaltest[]" class="form-control" placeholder="Enter Goals" required></td>\
                  <td style="border: 1px solid white;"><button type="button" name="remove_goal_test" id="remove_goal_test" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
    var max = 100;
    var a = 1;

    $("#add_goal_test").click(function() {
      if (a <= max) {
        $("#table-field-goal-test").append(html);
        a++;
      }
    });
    $("#table-field-goal-test").on('click', '#remove_goal_test', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>


<!--search for test class-->
<script>
  function test() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("testsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("testtable");
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

  $(document).ready(function() {
    $(document).on('click', '#edit_test_goals_modal', function() {
      var name = $(this).data('name');
      var id = $(this).data('id');
      $(".test_edit_id").val(id);
      $(".test_edit_name").val(name);
    });
  });
</script>