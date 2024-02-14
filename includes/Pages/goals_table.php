<div class="container">
  <div class="row">
    <center>
      <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/goal_insert_data.php" style="width:fit-content;">
        <h3><span style="font-size:larger; color:green;">Goals <?php echo $type_name_dep ?></span></h3>
        <div class="input-field">
          <table class="table table-bordered" id="table-field-goal">
            <tr>
              <input type="hidden" name="phase_id" class="form-control" value="<?php echo $phase_id ?>">
              <input type="hidden" name="phase" class="form-control" value="<?php echo $phase ?>">
              <input type="hidden" name="ctp" class="form-control" value="<?php echo $ctp ?>">
              <td><input type="text" name="goal[]" class="form-control" placeholder="Enter Goals" required></td>
              <td><button type="button" name="add_goal" id="add_goal" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
            </tr>
          </table>
          <button style="margin:10px;" class="btn btn-success" type="submit" name="submit_goal">Save</button>
        </div>
      </form>
    </center>
  </div>
  <hr>
  <div class="row">
    <center>
      <table class="table table-striped table-bordered table-hover" id="goaltable">
        <input class="form-control" type="text" id="goalsearch" onkeyup="goal()" placeholder="Search for Goals" title="Type in a name"><br>
        <thead class="bg-dark">
          <th class="text-white">Sr No</th>
          <th class="text-white">Goals</th>
          <th class="text-white">Phase</th>
          <th class="text-white">CTP</th>
          <th class="text-white">Action</th>
        </thead>
        <?php
        // $output ="";
        $query1 = "SELECT * FROM goals where ctp='$ctp' and phase='$phase_id'";
        $statement1 = $connect->prepare($query1);
        $statement1->execute();
        if ($statement1->rowCount() > 0) {
          $result1 = $statement1->fetchAll();
          $sn = 1;
          foreach ($result1 as $row) {
            $id = $row['id']; ?>
            <tr>
              <td><?php echo $sn++; ?></td>
              <td><?php echo $row['goal'] ?></td>
              <td><?php echo $phase ?></td>
              <td><?php echo $course ?></td>
              <td>
                <a class="btn btn-soft-success btn-xs" id="edit_goals_goals_modal" data-id="<?php echo $id ?>" data-name="<?php echo $row['goal']; ?>" data-bs-toggle="modal" data-bs-target="#editgoalsgoals"><i class="bi bi-pen-fill"></i>
                </a>
                <a class="btn btn-soft-danger btn-xs" href="goals_delete.php?goals_id=<?php echo $row['id'] ?>"><i class="bi bi-trash-fill"></i></a>
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

<!-- edit goals -->
<div class="modal fade" id="editgoalsgoals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Goals</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form class="insert-goals" id="goal" method="post" action="goal_insert_data.php">
            <div class="input-field">
              <input type="hidden" class="form-control goals_edit_id" name="id" value="" id="actual_edit_id1" readonly>
              <input type="text" name="goal_name" class="goals_edit_name form-control" value="" placeholder="Enter Goals" required>
              <button style="margin:10px;" class="btn btn-success" type="submit" name="edit_goal_goal">Save</button>
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var html = '<tr>\
                  <td style="text-align: center;"><input type="text" name="goal[]" class="form-control" placeholder="Enter Goals" required></td>\
                  <td><button type="button" name="remove_goal" id="remove_goal" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
    var max = 100;
    var a = 1;

    $("#add_goal").click(function() {
      if (a <= max) {
        $("#table-field-goal").append(html);
        a++;
      }
    });
    $("#table-field-goal").on('click', '#remove_goal', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });

  $(document).ready(function() {
    $(document).on('click', '#edit_goals_goals_modal', function() {
      var name = $(this).data('name');
      var id = $(this).data('id');
      $(".goals_edit_id").val(id);
      $(".goals_edit_name").val(name);
    });
  });
</script>