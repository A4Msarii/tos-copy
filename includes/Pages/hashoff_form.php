<div class="container">
	<center>
	<div class="row">
                        
                          <form action="insert_hashoff.php" method="post">
                            <table class="table" id="hashoff_form_table1">
                              <tr>
                                <td><input type="text" id="hashoff_feild" name="hashoff[]" class="form-control" placeholder="Insert #off" /></td>
                                <td><button type="button" name="hashoff" id="hash_add" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                              </tr>
                            </table>
                            <input class="btn btn-success btn-md" type="submit" value="Submit" name="insert_hashoff" />
                          </form>
                        
                      </div>
                  </center>
                      <hr>

                      <!--subitem table-->
                      <div class="row">
                        <table class="table table-bordered table-hover" id="hashofftable">
                          <input style="margin:5px;" class="form-control" type="text" id="hashoffsearch" onkeyup="hashoff()" placeholder="Search for Hashoff name.." title="Type in a name">
                          <thead class="bg-dark">
                            <th class="text-light">Sr No</th>
                            <th class="text-light"># 0f</th>
                            <th class="text-light">Action</th>
                          </thead>
                          <?php
                          // $output ="";
                          $subitemq = "SELECT * FROM hashoff ORDER BY id ASC";
                          $subitemst1 = $connect->prepare($subitemq);
                          $subitemst1->execute();
                          if ($subitemst1->rowCount() > 0) {
                            $subitemresul1 = $subitemst1->fetchAll();
                            $sn = 1;
                            foreach ($subitemresul1 as $row) {
                          ?>
                              <tr>
                                <td><?php echo $sn++;
                                    $id = $row['id'] ?></td>
                                <td><?php echo $row['hashoff'] ?></td>
                                <td><a style="margin:10px;" href="" onclick="document.getElementById('hashoff_id').value='<?php echo $id = $row['id'] ?>';
                                      document.getElementById('hashoff_name').value='<?php echo $row['hashoff']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#edithashoff"><i class="bi bi-pen-fill text-success"></i></a>
                                  </a>
                                  <a href="hashoff_delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                                </td>
                              </tr>
                          <?php
                            }
                          }
                          ?>
                        </table>
                      </div>
</div>


 <script type="text/javascript">
    $(document).ready(function() {


      var html9 = '<tr>\
                        <td><input type="text" id="hashoff_field" name="hashoff[]" class="form-control form-control-md" placeholder="Insert Item" /></td>\
                        <td><button type="button" name="hash" id="remove_hash" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
      var max9 = 100;
      var a9 = 1;

      $("#hash_add").click(function() {
        if (a9 <= max9) {
          $("#hashoff_form_table1").append(html9);
          a9++;
        }
      });
      $("#hashoff_form_table1").on('click', '#remove_hash', function() {
        $(this).closest('tr').remove();
        a9--;
      });
    });
  </script>

  <script>
    function hashoff() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("hashoffsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("hashofftable");
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


    <!--edit item modal-->
  <div class="modal fade" id="edithashoff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit # Of</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          <form method="post" action="edit_hashoff.php">
            <input type="hidden" name="id" value="" id="hashoff_id">
            <input class="form-control" type="text" name="hashoff" value="" id="hashoff_name"><br>
            <input class="btn btn-success" type="submit" name="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>