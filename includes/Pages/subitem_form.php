<div class="container">
  <center>
    <div class="row">

      <form action="insert_subitem.php" method="post">
        <table class="table" id="subitem_form_table1">
          <tr>
            <td><input type="text" id="subitem_feild" name="subitem[]" class="form-control" placeholder="Insert SubItem" /></td>
            <td><button type="button" name="subitem1" id="subitem1" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
          </tr>
        </table>
        <input class="btn btn-success btn-md" type="submit" value="Submit" name="Insert_subitem" />
      </form>

    </div>
  </center>
  <hr>

  <!--subitem table-->
  <div class="row">
    <table class="table table-bordered table-hover" id="subitemtable">
      <input style="margin:5px;" class="form-control" type="text" id="subitemsearch" onkeyup="subitem()" placeholder="Search for Subitem name.." title="Type in a name">
      <thead class="bg-dark">
        <th class="text-white">Sr No</th>
        <th class="text-white">SubItem</th>
        <th class="text-white">Add Info</th>
        <th class="text-white">Condition</th>
        <th class="text-white">Standards</th>
        <th class="text-white">Action</th>
      </thead>
      <?php
      // $output ="";
      $subitemq = "SELECT * FROM sub_item  ORDER BY id ASC";
      $subitemst1 = $connect->prepare($subitemq);
      $subitemst1->execute();
      if ($subitemst1->rowCount() > 0) {
        $subitemresul1 = $subitemst1->fetchAll();
        $sn = 1;
        foreach ($subitemresul1 as $row) {
          $itemId = $row['id'];
      ?>
          <tr>
            <td><?php echo $sn++;
                $id = $row['id'] ?></td>
            <td>
              <?php echo $row['subitem'] ?>
              <?php
              $checkCTS = $connect->query("SELECT count(*) FROM subitem WHERE subitem = '$itemId' and course_id='$ctp' and class_id='$class_id' and phase_id='$phase_id' and class='$class' AND CTS IS NOT NUll");
              $ctsData = $checkCTS->fetchColumn();
              if($ctsData > 0){
                echo '<span><i style="margin:5px; font-size:30px;" class="bi bi-check-circle text-success"></i></span>';
              }
              ?>
          </td>
            <td><button style="margin: 5px;display: inline-block;position: relative;" type="button" onclick="document.getElementById('subItemId').value='<?php echo $row['id']; ?>';document.getElementById('subU').value='<?php echo $row['U']; ?>';document.getElementById('subF').value='<?php echo $row['F']; ?>';document.getElementById('subG').value='<?php echo $row['G']; ?>';document.getElementById('subV').value='<?php echo $row['V']; ?>';document.getElementById('subE').value='<?php echo $row['E']; ?>';document.getElementById('subN').value='<?php echo $row['N']; ?>';" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addSubGrade" id="">
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
            <td><a style="margin:10px;" href="" onclick="document.getElementById('subitem_id').value='<?php echo $id = $row['id'] ?>';
                                      document.getElementById('subitem_name').value='<?php echo $row['subitem']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#editsubitem"><i class="bi bi-pen-fill text-success"></i></a>
              </a>
              <a href="subitem_delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill text-danger"></i></a>
              <a style="margin:10px;" href="" onclick="document.getElementById('cts_id1').value='<?php echo $id = $row['id'] ?>';document.getElementById('condition1').value='<?php echo $id = $row['CTScondition'] ?>';document.getElementById('standards1').value='<?php echo $id = $row['CTSstandards'] ?>';" data-bs-toggle="modal" data-bs-target="#subItemCTS"><img style="height: 20px;" src="<?php echo BASE_URL; ?>assets/cts.png"></a>
            </td>
          </tr>
      <?php
        }
      }
      ?>
    </table>
  </div>
</div>

<!-- subitem grade modal -->

<div class="modal fade" id="addSubGrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel2">Add Grade</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body">

        <form action="<?php echo BASE_URL; ?>includes/Pages/addGrade.php" method="POST">
          <input type="hidden" name="subItemId" id="subItemId" />
          <table class="table table-bordered table-striped table-hover">
            <tbody>
              <tr>
                <td><b>U</b></td>
                <td><input type="text" name="U" id="subU" class="form form-control" /></td>
              </tr>
              <tr>
                <td><b>F</b></td>
                <td><input type="text" name="F" id="subF" class="form form-control" /></td>
              </tr>
              <tr>
                <td><b>G</b></td>
                <td><input type="text" name="G" id="subG" class="form form-control" /></td>
              </tr>
              <tr>
                <td><b>V</b></td>
                <td><input type="text" name="V" id="subV" class="form form-control" /></td>
              </tr>
              <tr>
                <td><b>E</b></td>
                <td><input type="text" name="E" id="subE" class="form form-control" /></td>
              </tr>
              <tr>
                <td><b>N</b></td>
                <td><input type="text" name="N" id="subN" class="form form-control" /></td>
              </tr>
            </tbody>

          </table><br>
          <input type="submit" value="Add" name="subGradeBtn" class="btn btn-success" style="float:right; font-weight:bold; font-size:large;" />
        </form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="subItemCTS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="edit_item.php">
        <input type="hidden" name="ctsId1" value="" id="cts_id1">
          <label for="" class="form-label text-dark" style="font-weight:bold; font-size:large; float:left;">Condition</label>
          <br>
          <textarea name="condition1" id="condition1" class="form-control"></textarea>
          <br>
          <label for="" class="form-label text-dark" style="font-weight:bold; font-size:large; float:left;">Standards</label>
          <br>
          <textarea name="standards1" id="standards1" class="form-control"></textarea><br>
          <input type="submit" class="btn btn-success" value="Add" style="float:right; font-weight:bold; font-size:large;" />
        </form>
      </div>
    </div>
  </div>
</div>

<!--edit subitem modal-->
<div class="modal fade" id="editsubitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Subitem</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="edit_subitem.php">
          <input type="hidden" name="id" value="" id="subitem_id">
          <input class="form-control" type="text" name="subitem" value="" id="subitem_name"><br>
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>


<!--subitem increament-->
<script type="text/javascript">
  $(document).ready(function() {


    var htmls = '<tr>\
                        <td><input type="text" id="subitem_field" name="subitem[]" class="form-control form-control-md" placeholder="Insert SubItem" /></td>\
                        <td><button type="button" name="subitem" id="remove_subitem" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
    var maxs = 100;
    var as = 1;

    $("#subitem1").click(function() {
      if (as <= maxs) {
        $("#subitem_form_table1").append(htmls);
        as++;
      }
    });
    $("#subitem_form_table1").on('click', '#remove_subitem', function() {
      $(this).closest('tr').remove();
      as--;
    });
  });
</script>


<script>
  function subitem() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("subitemsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("subitemtable");
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