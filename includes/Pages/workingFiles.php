<div class="row justify-content-center">
         <button style="width:auto;" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#WorkingfilesModal">Add Files</button>
      </div><hr>
      <div class="row">
        <?php
                if ($role != "super admin") {
                    ?>
        <center><span style="font-size:large;font-weight: bold;" class="text-danger">Note : </span><span>Files Will Downloaded Into Your Local Downloads</span></center>
        <?php
      }
        ?>
        <br><br>
        <center>
          <table style="margin: 5px;" class="table table-striped table-bordered table-hover" id="assignacademictable">
            <input class="form-control" type="text" id="Assignsearch" onkeyup="AssignAcademic()" placeholder="Search for Files.." title="Type in a name"><br>
            <thead class="bg-dark">
              <th class="text-white">Sr No</th>
              <th class="text-white">File name</th>
              <th class="text-white">File Type</th>
              <th class="text-white">View</th>
              <?php
                if ($role == "super admin") {
                    ?>
               <th class="text-white">Action</th>
               <?php
             }
               ?>
            </thead>
            <tbody>
            <?php $query4 = "SELECT *
                FROM working_file
              JOIN user_files ON working_file.fileId = user_files.id;";
                  $statement2 = $connect->prepare($query4);
                  $statement2->execute();
                  if ($statement2->rowCount() > 0) {
                    $result2 = $statement2->fetchAll();
                    $sn4 = 1;
                    foreach ($result2 as $row2) { 
                      $idess1=$row2['fileId'];
                      $fetchfilesnames = $connect->query("SELECT `filename`,`type` FROM user_files WHERE id='$idess1'");
                      $fetchfilesnames1 = $fetchfilesnames->fetch();
                      ?>
                <tr>
                  <td><?php echo $sn4++; ?> </td>
                  <td><?php echo $fetchfilesnames1['filename']; ?></td>
                  <td style="text-align:center;"><?php echo $fetchfilesnames1['type']; ?></td>
                   <?php
                if ($role == "super admin") {
                    ?>
                  <td class="url_td">
                            <?php
                            if (is_numeric($idess1)) {
                              if ($row2['lastName'] == "") {
                            ?>
                                <a target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row2['filename']; ?>" >View</a>

                              <?php
                              }
                              if ($row2['type'] == "online") {
                              ?>
                                <a target="_blank" href="<?php echo $row2['filename']; ?>" title="<?php echo $row2['filename']; ?>">View</a>
                              <?php
                              }
                              if ($row2['type'] == "offline") {
                              ?>
                                <a class="driveLinkPer" value="<?php echo $row2['filename']; ?>" title="<?php echo $row2['filename']; ?>">View</a>
                            <?php
                              }
                            }
                            ?>
                      </td>
                     <?php
                   }
                if ($role != "super admin") {
                    ?>
                      <td class="url_td" style="text-align:center;">
                            <?php
                            if (is_numeric($idess1)) {
                              if ($row2['lastName'] == "") {
                            ?>
                                <a target="_blank" title="Download File" class="btn btn-success btn-sm" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row2['filename']; ?>" download="<?php echo $row2['filename']; ?>"><i class="bi bi-download"></i></a>

                              <?php
                              }
                              if ($row2['type'] == "online") {
                              ?>
                                <a target="_blank" href="<?php echo $row2['filename']; ?>" title="<?php echo $row2['filename']; ?>">View</a>
                              <?php
                              }
                              if ($row2['type'] == "offline") {
                              ?>
                                <a class="driveLinkPer" value="<?php echo $row2['filename']; ?>" title="<?php echo $row2['filename']; ?>">View</a>
                            <?php
                              }
                            }
                            ?>
                      </td>
                      <?php
                 }
                   ?>
                      <?php
                if ($role == "super admin") {
                    ?>
                   <td>
                   <a class="btn btn-soft-success btn-xs" data-bs-toggle="modal" data-bs-target="#EditWorkingFile"><i class="bi bi-pen-fill"></i></a>
                   <a class="btn btn-soft-danger btn-xs"><i class="bi bi-trash-fill"></i></a>
                   </td>
                   <?php
                 }
                   ?>
                </tr>
                <?php     }   
               }?>
            </tbody>
          </table>
        </center>
      </div>



      <!-- Modal -->
<div id="EditWorkingFile" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Edit File</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <input type="file" name="" class="form-control">
          <hr>
          <input style="float:right;" type="submit" name="" class="btn btn-success" value="Submit">
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- End Modal -->


<script>
  function AssignAcademic() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("Assignsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("assignacademictable");
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





