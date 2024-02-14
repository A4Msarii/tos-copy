<div class="container">
  <center>
    <div class="row">

      <form action="insert_item.php" method="post">
        <table class="table" id="item_form_table1" style="width: 100%;">

          <tr>
            <td><input type="text" id="item_field" name="item[]" class="form-control" placeholder="Insert Item" /></td>
            <td><button type="button" name="item1" id="item1" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
          </tr>

        </table>
        <input class="btn btn-success btn-md" type="submit" value="Submit" name="Insert_item" />
      </form>

    </div>
  </center>
  <hr>

  <div class="row">
    <table class="table table-bordered table-striped table-hover" id="itemtable">
      <input style="margin:5px;" class="form-control" type="text" id="itemsearch" onkeyup="item()" placeholder="Search for Item name.." title="Type in a name">
      <thead class="bg-dark">
        <th class="text-white">Sr No</th>
        <th class="text-white">Item</th>
        <th class="text-white">Add Info</th>
        <th class="text-white">Condition</th>
        <th class="text-white">Standards</th>
        <th class="text-white">Action</th>
      </thead>
      <?php
      // $output ="";
      $itemq = "SELECT * FROM itembank  ORDER BY id ASC";
      $itemst1 = $connect->prepare($itemq);
      $itemst1->execute();
      if ($itemst1->rowCount() > 0) {
        $itemresul1 = $itemst1->fetchAll();
        $sn = 1;
        foreach ($itemresul1 as $row) {
          $itemId = $row['id'];
      ?>
          <tr>
            <td><?php echo $sn++;
                $id = $row['id'] ?></td>
            <td>
              <?php echo $row['item']; ?>
              <?php
              $checkCTS = $connect->query("SELECT count(*) FROM item WHERE item = '$itemId' and course_id='$ctp' and class_id='$class_id' and phase_id='$phase_id' and class='$class' AND CTS IS NOT NUll");
              $ctsData = $checkCTS->fetchColumn();
              if($ctsData > 0){
                echo '<span><i style="margin:5px; font-size:30px;" class="bi bi-check-circle text-success"></i></span>';
              }
              ?>
          </td>
            <td><button style="margin: 5px;display: inline-block;position: relative;" type="button" onclick="document.getElementById('itemId').value='<?php echo $row['id']; ?>';document.getElementById('U').value='<?php echo $row['U']; ?>';document.getElementById('F').value='<?php echo $row['F']; ?>';document.getElementById('G').value='<?php echo $row['G']; ?>';document.getElementById('V').value='<?php echo $row['V']; ?>';document.getElementById('E').value='<?php echo $row['E']; ?>';document.getElementById('N').value='<?php echo $row['N']; ?>';" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addGrade" id="">
                Add
              </button>
              <div style="display: inline-block;">
                <p>U-<?php echo $row['U']; ?></p>
                <p>F-<?php echo $row['F']; ?></p>
                <p>G-<?php echo $row['G']; ?></p>
                <p>V-<?php echo $row['V']; ?></p>
                <p>E-<?php echo $row['E']; ?></p>
                <p>N-<?php echo $row['N']; ?></p>
              </div>
            </td>
            <td><?php echo $row['CTScondition']; ?></td>
            <td><?php echo $row['CTSstandards']; ?></td>
            <td><a style="margin:10px;" href="" onclick="document.getElementById('item_id').value='<?php echo $id = $row['id'] ?>';
                                    document.getElementById('item_name').value='<?php echo $row['item']; ?>';
                                    " data-bs-toggle="modal" data-bs-target="#edititem"><i class="bi bi-pen-fill text-success"></i></a>
              </a>
              <a href="item_delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill text-danger"></i></a>
              <a style="margin:10px;" href="" onclick="document.getElementById('cts_id').value='<?php echo $id = $row['id'] ?>';document.getElementById('condition').value='<?php echo $id = $row['CTScondition'] ?>';document.getElementById('standards').value='<?php echo $id = $row['CTSstandards'] ?>';" data-bs-toggle="modal" data-bs-target="#itemCTS"><img style="height: 20px;" src="<?php echo BASE_URL; ?>assets/cts.png"></a>
            </td>
          </tr>
      <?php
        }
      }
      ?>
    </table>
  </div>
</div>


<div class="modal fade" id="addGrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel2">Add Grade</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body">

        <form action="<?php echo BASE_URL; ?>includes/Pages/addGrade.php" method="POST">
          <input type="hidden" name="itemId" id="itemId" />
          <table class="table table-bordered table-striped table-hover">
            <tbody>
              <tr>
                <td><b>U</b></td>
                <td><input type="text" name="U" id="U" class="form form-control" /></td>
              </tr>
              <tr>
                <td><b>F</b></td>
                <td><input type="text" name="F" id="F" class="form form-control" /></td>
              </tr>
              <tr>
                <td><b>G</b></td>
                <td><input type="text" name="G" id="G" class="form form-control" /></td>
              </tr>
              <tr>
                <td><b>V</b></td>
                <td><input type="text" name="V" id="V" class="form form-control" /></td>
              </tr>
              <tr>
                <td><b>E</b></td>
                <td><input type="text" name="E" id="E" class="form form-control" /></td>
              </tr>
              <tr>
                <td><b>N</b></td>
                <td><input type="text" name="N" id="N" class="form form-control" /></td>
              </tr>
            </tbody>

          </table><br>
          <input type="submit" value="Add" name="gradeBtn" class="btn btn-success" style="float:right; font-weight:bold; font-size:large;" />
        </form>

      </div>
    </div>
  </div>
</div>


<!--edit item modal-->
<div class="modal fade" id="edititem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Item</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="edit_item.php">
          <!-- <input type="hidden" name="id" value="" id="item_id">
                <input type="text" name="item" value="" id="item_name">
                <input class="btn btn-primary" type="submit" name="submit" value="Submit"> -->
        </form>
        <form method="post" action="edit_item.php">
          <input type="hidden" name="id" value="" id="item_id">
          <input class="form-control" type="text" name="item" value="" id="item_name"><br>
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="itemCTS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="edit_item.php">
        <input type="hidden" name="ctsId" value="" id="cts_id">
          <label for="" class="form-label" style="float:left; font-weight: bold; font-size:large;">Condition</label>
          <br>
          <textarea name="condition" id="condition" class="form-control"></textarea>
          <br>
          <label for="" class="form-label" style="float:left; font-weight: bold; font-size:large;">Standards</label>
          <br>
          <textarea name="standards" id="standards" class="form-control"></textarea><br>
          <input type="submit" class="btn btn-success" value="Add" style="float:right; font-weight:bold; font-size:large;" />
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {


    var html9 = '<tr>\
                        <td><input type="text" id="item_field" name="item[]" class="form-control form-control-md" placeholder="Insert Item" /></td>\
                        <td><button type="button" name="item" id="remove_item" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
    var max9 = 100;
    var a9 = 1;

    $("#item1").click(function() {
      if (a9 <= max9) {
        $("#item_form_table1").append(html9);
        a9++;
      }
    });
    $("#item_form_table1").on('click', '#remove_item', function() {
      $(this).closest('tr').remove();
      a9--;
    });
  });
</script>

<script>
  function item() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("itemsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("itemtable");
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