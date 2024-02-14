<div class="modal fade" id="selectfiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Select Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>Library/button_files.php?returnUrl=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">

          <input type="hidden" id="me_id" name="me_id">
          <input type="hidden" id="me_ty" name="me_ty">
          <!-- <input type="text" id="fo_ides" name="fo_ides"> -->
          <table class="table table-bordered" id="files1">
            <input style="margin:5px;" class="form-control" type="text" id="file_search" onkeyup="file_by_file()" placeholder="Search for Files.." title="Type in a name">
            <thead class="bg-dark">
              <th class="text-light"><input type="checkbox" id="select-all"></th>
              <!-- <th class="text-light">File Names</th> -->
              <th class="text-light"> UPLOADED FILES</th>
              <th class="text-light">View</th>

            </thead>
            <?php

            $query11_fm10 = "SELECT *
            FROM user_files
            WHERE type_id = '0'";
            $statement11_fm10 = $connect->prepare($query11_fm10);
            $statement11_fm10->execute();
            if ($statement11_fm10->rowCount() > 0) {
              $result11_fm10 = $statement11_fm10->fetchAll();

              foreach ($result11_fm10 as $row110) {
                $filesname = "";
                if ($row110['type'] == "online" || $row110['type'] == "offline") {
                  $filesname = $row110['lastName'];
                } else {
                  $filesname = $row110['filename'];
                }

            ?>
                <tr>
                  <td><input type="checkbox" name="fsid2[]" value="<?php echo $row110['id'] ?>" /></td>
                  <td style="text-align: left;">
                    <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                    <span style="color:#9540e4; text-align: left;" title="<?php echo $row110['filename'] ?>"><?php echo $filesname; ?></span>
                  </td>
                  <td>
                    <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row110['filename']; ?>" target="_blank">View</a>
                  </td>
                </tr>
            <?php }
            }
            ?>

          </table>
          <!-- <hr> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <input style="float:right;" type="submit" class="btn btn-success" value="Add" name="addFile" />
      </div>
      <!-- <input style="float:right;" type="submit" class="btn btn-success" value="Add" name="addFile" /> -->
      </form>
      <!-- </div> -->
    </div>
  </div>
</div>