<style type="text/css">
   .color-palette {
            display: flex;
            margin-top: 10px;
        }

        /*.color-option {
            width: 20px;
            height: 20px;
            margin-right: 5px;
            cursor: pointer;
        }*/
        .color-dropdown {
            position: relative;
            display: inline-block;
        }

        .color-dropdown-content {
            display: none;
            position: absolute;
            z-index: 1;
            width: 400px;
            border: 1px solid #E0E0E0;
    box-shadow: 1px 1px 9px 1px #BDBDBD;
    border-radius: 5px;
        }

        .color-option {
            width: 20px;
            height: 20px;
            margin-right: 3px;
            cursor: pointer;
            display: inline-block;
            position: relative;
            box-shadow: 1px 1px 6px 0px #80808061;
    border: 1px solid #80808033;
    border-radius: 5px;

        }
        .color-option:hover
        {
            width: 25px;
            height: 25px;
        }
        .checkmark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            font-size: x-large;
            font-weight: bold;
            color: white;
        }

        .color-option.selected .checkmark {
            display: block;
        }
</style>
<?php 
include ROOT_PATH . 'includes/Pages/addmegadropdown.php';
?>
<!-- Modal -->
<div class="modal fade" id="gridModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">File List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" id="file_all">
          <input style="margin:5px;" class="form-control" type="text" id="search_all" onkeyup="file_all()" placeholder="Search for files.." title="Type in a name">
          <thead class="bg-dark">
            <th class="text-light">Sr No</th>

            <th class="text-light">Files</th>

          </thead>

          <?php
          $query1_fm7 = "SELECT * FROM user_files group by user_id";
          $statement1_fm7 = $connect->prepare($query1_fm7);
          $statement1_fm7->execute();
          if ($statement1_fm7->rowCount() > 0) {
            $result1_fm7 = $statement1_fm7->fetchAll();
            foreach ($result1_fm7 as $key => $row39) {
              $page_user_id7 = $row39['user_id'];

              $user_name_docx = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
              $user_name_docx->execute([$page_user_id7]);
              $name7 = $user_name_docx->fetchColumn();
          ?>
              <tr style="background-image: linear-gradient(to left, #553c9a, #b393d3);text-align:center; display: none;">
                <td colspan="6"><span class="btn btn-light" style="border-radius:20px; height:50px;"><span style="color:black; font-weight:bold; font-size:large; font-style:oblique;"><?php echo $name7 ?> Pages </span>
                    <a data-bs-toggle="tooltip" data-bs-placement="right" title="Delete <?php echo $name7 ?> all files" style="float: right; font-weight:bold; font-size:large;color: red;" href="<?php echo BASE_URL; ?>includes/Pages/delete_userallfile.php?deleteId=<?php echo $page_user_id7; ?>"><i class="bi bi-trash-fill"></i></a></span>
                </td>
                <!-- <td colspan="4"></td> -->
              </tr>

              <?php
              $query1_ff = "SELECT * FROM user_files where user_id='$page_user_id7'";
              $statement1_ff = $connect->prepare($query1_ff);
              $statement1_ff->execute();
              if ($statement1_ff->rowCount() > 0) {
                $result1_ff = $statement1_ff->fetchAll();
                // $sn = 1;
                foreach ($result1_ff as $row) {
                  $filename = "";
                  $id = $row['id']; ?>
                  <tr>
                    <td style="width:50px;"><input type="checkbox" name="delete_multiple_pages6[]" class="get_page_checks6" value="<?php echo $row['id'] ?>"></td>

                    <td><?php
                        if ($row['type'] == "offline" || $row['type'] == "online") { ?>
                        <a href="#" title="<?php echo $row['lastName'] ?>"> <?php echo $row['lastName'] ?></a>


                      <?php } else {
                      ?>

                        <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row['filename'] ?>" target="_blank"><?php echo $row['filename'] ?></a>


                      <?php
                        }
                      ?>
                    </td>

                    <td style="display: none;">
                      <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/delet_file.php?userid=<?php echo $id; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

                    </td>
                  </tr>

          <?php
                }
              }
            }
          }
          ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

<!-- modal for menu text -->
<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Add Menu</h3>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="save_menu_name.php">
        <div class="modal-body">
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Menu Name" name="menu_name">
            <input type="hidden" name="type" value="menu" /><br>
            <div class="color-dropdown">
        <button onclick="toggleColorDropdown(event)" type="button" title="Font Background Color" class="dropdown-toggle btnBack btn" style="font-weight:bold; font-size:large;border: 1px solid;padding: 0px;"><i style="font-size: x-large;margin: 5px;" class="bi bi-paint-bucket"></i>Fill Color</button>
        <div class="color-dropdown-content bg-light m-1 colorDropdown">
            <div class="container" style="margin-top:10px;">
                
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffd6d6;" onclick="setColor(this, '#ffd6d6')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #d6d6ff;" onclick="setColor(this, '#d6d6ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffffd6;" onclick="setColor(this, '#ffffd6')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #e5ffcc;" onclick="setColor(this, '#e5ffcc')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffe5cc;" onclick="setColor(this, '#ffe566')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #e5ccff;" onclick="setColor(this, '#e5ccff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffccff;" onclick="setColor(this, '#ffccff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #fff1d6;" onclick="setColor(this, '#fff1d6')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #eeeeee;" onclick="setColor(this, '#eeeeee')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffffff;;" onclick="setColor(this, '#ffffff;')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffadad;" onclick="setColor(this, '#ffadad')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #adadff;" onclick="setColor(this, '#adadff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffffad;" onclick="setColor(this, '#ffffad')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #b2ff66;" onclick="setColor(this, '#b2ff66')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffcc99;" onclick="setColor(this, '#ffcc99')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #cc99ff;" onclick="setColor(this, '#cc99ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ff99ff;" onclick="setColor(this, '#ff99ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffe2ad;" onclick="setColor(this, '#ffe2ad')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #e0e0e0;" onclick="setColor(this, '#e0e0e0')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #c0c0c0;;" onclick="setColor(this, '#c0c0c0;')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ff8585;" onclick="setColor(this, '#ff8585')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #8585ff;" onclick="setColor(this, '#8585ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffff85;" onclick="setColor(this, '#ffff85')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #99ff33;" onclick="setColor(this, '#99ff33')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffb266;" onclick="setColor(this, '#ffb266')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #b266f5;" onclick="setColor(this, '#b266f5')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ff66ff;" onclick="setColor(this, '#ff66ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffd485;" onclick="setColor(this, '#ffd485')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #bdbdbd;" onclick="setColor(this, '#bdbdbd')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #808080;;" onclick="setColor(this, '#808080;')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ff5c5c;" onclick="setColor(this, '#ff5c5c')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #5c5cff;" onclick="setColor(this, '#5c5cff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffff5c;" onclick="setColor(this, '#ffff5c')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #80ff00;" onclick="setColor(this, '#80ff00')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ff9933;" onclick="setColor(this, '#ff9933')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #9933ff;" onclick="setColor(this, '#9933ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ff33ff;" onclick="setColor(this, '#ff33ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffc65c;" onclick="setColor(this, '#ffc65c')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #9e9e9e;" onclick="setColor(this, '#9e9e9e')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #606060;;" onclick="setColor(this, '#606060;')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ff3333;" onclick="setColor(this, '#ff3333')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #3333ff;" onclick="setColor(this, '#3333ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffff33;" onclick="setColor(this, '#ffff33')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #66cc00;" onclick="setColor(this, '#66cc00')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ff8000;" onclick="setColor(this, '#ff8000')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #7f00ff;" onclick="setColor(this, '#7f00ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ff00ff;" onclick="setColor(this, '#ff00ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffb833;" onclick="setColor(this, '#ffb833')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #757575;" onclick="setColor(this, '#757575')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #404040;;" onclick="setColor(this, '#404040;')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ff0000;" onclick="setColor(this, '#ff0000')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #0a0aff;" onclick="setColor(this, '#0a0aff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffff0a;" onclick="setColor(this, '#ffff0a')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #469900;" onclick="setColor(this, '#469900')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #cc6600;" onclick="setColor(this, '#cc6600')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #6600cc;" onclick="setColor(this, '#6600cc')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #cc00cc;" onclick="setColor(this, '#cc00cc')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #ffa90a;" onclick="setColor(this, '#ffa90a')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #616161;" onclick="setColor(this, '#616161')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option" style="background-color: #000000;;" onclick="setColor(this, '#000000;')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                </div>
                <hr style="margin:1px;">
                <div class="row justify-content-center" style="width: 100%;margin-left: 0px;margin-right: 0px;">
                <!-- Add more color options as needed -->
                <div class="col-12" style="display: contents;">
                    <input style="margin:5px;margin-left: -30px;height: 30px;width: 30px;" type="color" id="color" name="color" value="#e0e0e0" required class="color_menu">
                    <label style="width: fit-content;margin-right: -40px;margin: 0px;margin-top: 10px;"><i class="bi bi-palette m-1"></i>Color Picker</label>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
            <!-- <center>
              <label for="color" style="font-size:large; font-weight:bold;">Select:</label><br>
              <input type="color" id="color" name="color" value="#e0e0e0" required><br>
            </center> -->
          </div>
          <hr>
          <button type="submit" class="btn btn-primary float-end mb-2" name="button" value="menu_button" style="background-color: #7901c1;color: white;border:1px solid #7901c1">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end modal for menu text -->

<!-- modal for megamenu text -->
<div class="modal fade" id="megamenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header border">
        <h3 class="modal-title" id="exampleModalLabel">Add Megamenu</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="save_menu_name.php">
        <div class="modal-body">
          <div class="mb-3">

            <input type="text" class="form-control" placeholder="Megamenu Name" name="menu_name">
            <input type="hidden" name="type" value="megmenu" /><br>
            <div class="color-dropdown">
        <button onclick="toggleColorDropdown1(event)" type="button" title="Font Background Color" class="dropdown-toggle btnBack btn" style="font-weight:bold; font-size:large;border: 1px solid;padding: 0px;"><i style="font-size: x-large;margin: 5px;" class="bi bi-paint-bucket"></i>Fill Color</button>
        <div class="color-dropdown-content bg-light m-1" id="colorDropdown1">
            <div class="container" style="margin-top:10px;">
                
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffd6d6;" onclick="setColor(this, '#ffd6d6')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #d6d6ff;" onclick="setColor(this, '#d6d6ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffffd6;" onclick="setColor(this, '#ffffd6')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #e5ffcc;" onclick="setColor(this, '#e5ffcc')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffe5cc;" onclick="setColor(this, '#ffe566')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #e5ccff;" onclick="setColor(this, '#e5ccff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffccff;" onclick="setColor(this, '#ffccff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #fff1d6;" onclick="setColor(this, '#fff1d6')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #eeeeee;" onclick="setColor(this, '#eeeeee')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffffff;;" onclick="setColor(this, '#ffffff;')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffadad;" onclick="setColor(this, '#ffadad')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #adadff;" onclick="setColor(this, '#adadff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffffad;" onclick="setColor(this, '#ffffad')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #b2ff66;" onclick="setColor(this, '#b2ff66')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffcc99;" onclick="setColor(this, '#ffcc99')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #cc99ff;" onclick="setColor(this, '#cc99ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ff99ff;" onclick="setColor(this, '#ff99ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffe2ad;" onclick="setColor(this, '#ffe2ad')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #e0e0e0;" onclick="setColor(this, '#e0e0e0')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #c0c0c0;;" onclick="setColor(this, '#c0c0c0;')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ff8585;" onclick="setColor(this, '#ff8585')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #8585ff;" onclick="setColor(this, '#8585ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffff85;" onclick="setColor(this, '#ffff85')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #99ff33;" onclick="setColor(this, '#99ff33')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffb266;" onclick="setColor(this, '#ffb266')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #b266f5;" onclick="setColor(this, '#b266f5')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ff66ff;" onclick="setColor(this, '#ff66ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffd485;" onclick="setColor(this, '#ffd485')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #bdbdbd;" onclick="setColor(this, '#bdbdbd')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #808080;;" onclick="setColor(this, '#808080;')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ff5c5c;" onclick="setColor(this, '#ff5c5c')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #5c5cff;" onclick="setColor(this, '#5c5cff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffff5c;" onclick="setColor(this, '#ffff5c')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #80ff00;" onclick="setColor(this, '#80ff00')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ff9933;" onclick="setColor(this, '#ff9933')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #9933ff;" onclick="setColor(this, '#9933ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ff33ff;" onclick="setColor(this, '#ff33ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffc65c;" onclick="setColor(this, '#ffc65c')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #9e9e9e;" onclick="setColor(this, '#9e9e9e')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #606060;;" onclick="setColor(this, '#606060;')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ff3333;" onclick="setColor(this, '#ff3333')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #3333ff;" onclick="setColor(this, '#3333ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffff33;" onclick="setColor(this, '#ffff33')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #66cc00;" onclick="setColor(this, '#66cc00')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ff8000;" onclick="setColor(this, '#ff8000')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #7f00ff;" onclick="setColor(this, '#7f00ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ff00ff;" onclick="setColor(this, '#ff00ff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffb833;" onclick="setColor(this, '#ffb833')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #757575;" onclick="setColor(this, '#757575')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #404040;;" onclick="setColor(this, '#404040;')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center m-1">
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ff0000;" onclick="setColor(this, '#ff0000')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #0a0aff;" onclick="setColor(this, '#0a0aff')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffff0a;" onclick="setColor(this, '#ffff0a')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #469900;" onclick="setColor(this, '#469900')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #cc6600;" onclick="setColor(this, '#cc6600')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #6600cc;" onclick="setColor(this, '#6600cc')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #cc00cc;" onclick="setColor(this, '#cc00cc')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #ffa90a;" onclick="setColor(this, '#ffa90a')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #616161;" onclick="setColor(this, '#616161')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                    <div class="col-1" style="justify-content: center;display: grid;">
                        <div class="color-option1" style="background-color: #000000;;" onclick="setColor(this, '#000000;')">
                            <i class="bi bi-check2 checkmark"></i>
                        </div>
                    </div>
                </div>
                <hr style="margin:1px;">
                <div class="row justify-content-center" style="width: 100%;margin-left: 0px;margin-right: 0px;">
                <!-- Add more color options as needed -->
                <div class="col-12" style="display: contents;">
                    <input style="margin:5px;margin-left: -30px;height: 30px;width: 30px;" type="color" id="color" name="color" value="#e0e0e0" required id="color_menu1">
                    <label style="width: fit-content;margin-right: -40px;margin: 0px;margin-top: 10px;"><i class="bi bi-palette m-1"></i>Color Picker</label>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
            <!-- <center>
              <label for="color" style="font-size:large; font-weight:bold;">Select:</label><br>
              <input type="color" id="color" name="color" value="#e0e0e0" required><br>
            </center> -->
          </div>
          <button type="submit" class="btn btn-primary float-end mb-2" name="button" value="mega_button" style="background-color: #7901c1;color: white;border:1px solid #7901c1">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end modal for megamenu text -->
<div class="modal fade" id="file_button" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php
        $unique_id = 1;
        $check_course_code = "SELECT max(`type_id`) as id_count FROM `user_files` WHERE `menu_type`='files'";
        $check_course_codest = $connect->prepare($check_course_code);
        $check_course_codest->execute();
        if ($check_course_codest->rowCount() > 0) {
          $re = $check_course_codest->fetchAll();
          foreach ($re as $get_all) {
            $unique_id = $get_all['id_count'];
            $unique_id += 1;
            $unique_id;
          }
        } else {
          $unique_id;
        }

        ?>
        <h5 class="modal-title" id="exampleModalLabel">Add Megamenu</h5>
        <button style="margin-left:5px" onclick="document.getElementById('me_id').value='<?php echo $unique_id ?>';document.getElementById('me_ty').value='<?php echo 'files' ?>';" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#selectfiles">Select</button>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <!-- <form method="post" action="<?php echo BASE_URL; ?>Library/button_files.php?returnUrl=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">
          <div class="mb-3">
            <input type="hidden" name="file_ides" value="<?php echo $unique_id ?>">
            <input type="hidden" name="u_ides" value="<?php echo $user_id ?>">
            <input type="hidden" name="role" value="<?php echo $_SESSION['role'] ?>">
            <label for="exampleInputEmail1" class="form-label">Select file</label>
            <input type="file" name="fileUpload" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary" name="addNewFile">Submit</button>
        </form> -->
        <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="fileOpt">
          <option selected>Select File Method</option>
          <!-- <option value="addNewPage">New Page</option> -->
          <option value="addFile">Attachment</option>
          <option value="addFileLoca">Drive Link</option>
          <option value="addFileLink">Link</option>
        </select>

        <br>
        <center>
          <form method="post" enctype="multipart/form-data" class="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>Library/button_files.php?returnUrl=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">
            <div class="input-field">
              <table class="table table-bordered">
                <input type="hidden" name="file_ides" value="<?php echo $unique_id ?>">
                <input type="hidden" name="u_ides" value="<?php echo $user_id ?>">
                <input type="hidden" name="role" value="<?php echo $_SESSION['role'] ?>">
                <tr>
                  <input type="hidden" name="phaseFileId" class="phaseLinkId" />
                  <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                    <input type="file" class="form-control" name="fileUpload" id="" />
                  </td>
              </table>
            </div><br>
            <hr>
            <center>
              <input style="margin:5px; float:right; font-weight:bold; font-size:large;" type="submit" value="Submit" name="addNewFile" class="btn btn-success" />

            </center>
          </form>
        </center>
        <center>
          <form class="insert-phases phase_form" method="post" action="<?php echo BASE_URL; ?>Library/button_files.php" style="width:80%;display:none;" enctype="multipart/form-data">
            <div class="input-field">
              <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
              <table class="table table-bordered" id="table-field">
              <input type="hidden" name="file_ides" value="<?php echo $unique_id ?>">
                <tr>
                  <td style="text-align: center;"><input type="text" placeholder="Link" name="phase" id="phaseval" class="form-control" value="" required /> </td>
                  <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName" id="phasename" class="form-control" value="" /> </td>
                </tr>
              </table>
            </div>
            <br>
            <hr>
            <center>
              <button style="margin:5px;float: right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="phase_submit" name="driveLink">Submit</button>
            </center>
          </form>
        </center>

        <center>
          <form class="insert-phases filelink" method="post" action="<?php echo BASE_URL; ?>Library/button_files.php" style="width:80%;display:none;" enctype="multipart/form-data">
            <div class="input-field">
            <input type="hidden" name="file_ides" value="<?php echo $unique_id ?>">
              <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
              <table class="table table-bordered" id="table-field-link">
                <tr>
                  <td style="text-align: center;"><input type="text" placeholder="Link" name="link" id="linkval" class="form-control" value="" required /> </td>
                  <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName" id="linkname" class="form-control" value="" /> </td>
                </tr>
              </table>
            </div>
            <br>
            <hr>
            <center>
              <button style="margin:5px; float:right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="link_submit" name="onlineLink">Submit</button>
            </center>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>
<script>
  $("#buttoncontainer").on("click", function() {
    $("#buttonform").css("display", "inline-block");
    $("#listform").css("display", "none");
    $("#listformCon").css("display", "none");
    $("#gridform").css("display", "none");
  });
  $("#listcontainer").on("click", function() {
    $("#listform").css("display", "inline-block");
    $("#listformCon").css("display", "block");
    $("#buttonform").css("display", "none");
    $("#gridform").css("display", "none");
  });
  $("#gridcontainer").on("click", function() {
    $("#gridform").css("display", "inline-block");
    $("#listform").css("display", "none");
    $("#listformCon").css("display", "none");
    $("#buttonform").css("display", "none");
  });
  $(document).ready(function() {
    $(document).on('click', '#addfile', function() {
      $('.addfile_data').toggle();
    });
    // $('body').click(function() {
    //   $('.addfile_data').hide();
    // });
  });

  $(document).on("change", ".fileOpt", function() {
    
    if ($(this).val() == "addFile") {
      $(".multipleFile").css("display", "block");
      $(".phase_form").css("display", "none");
      $(".filelink").css("display", "none");
      $(".newpageform").css("display", "none");
      $(".file").css("display", "block");
    }

    if ($(this).val() == "addFileLoca") {
      $(".phase_form").css("display", "block");
      $(".multipleFile").css("display", "none");
      $(".filelink").css("display", "none");
      $(".newpageform").css("display", "none");
      $(".file").css("display", "block");
    }
    if ($(this).val() == "addFileLink") {
      $(".phase_form").css("display", "none");
      $(".multipleFile").css("display", "none");
      $(".newpageform").css("display", "none");
      $(".filelink").css("display", "block");
      $(".file").css("display", "block");
    }
  });
</script>

<script>
    function toggleColorDropdown(event) {
        event.stopPropagation(); // Stop the event from reaching the document level
        const dropdown = document.querySelector('.color-dropdown-content');
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    }

    function setColor(element, color) {
        const colorMenu = document.querySelector('.color_menu');
        colorMenu.value = color;

        // Remove 'selected' class from all color options
        document.querySelectorAll('.color-option').forEach(option => option.classList.remove('selected'));

        // Add 'selected' class to the clicked color option
        const selectedOption = document.querySelector('.color-option[style*="background-color: ' + color + '"]');
        if (selectedOption) {
            selectedOption.classList.add('selected');
        }

        // Set the background color of the button
        const btnBack = document.querySelector('.btnBack');
        btnBack.style.backgroundColor = color;
    }

    // Add an event listener to the document to close the dropdown when clicking outside of it
    document.addEventListener('click', function (event) {
        const dropdown = document.querySelector('.color-dropdown-content');
        if (dropdown.style.display === 'block' && !event.target.closest('.color-dropdown')) {
            dropdown.style.display = 'none';
        }
    });
</script>

<script>
    function toggleColorDropdown1(event) {
        event.stopPropagation(); // Stop the event from reaching the document level
        const dropdown = document.getElementById('colorDropdown1');
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    }

    function setColor(element, color) {
        const colorMenu = document.getElementById('color_menu1');
        colorMenu.value = color;

        // Remove 'selected' class from all color options
        document.querySelectorAll('.color-option1').forEach(option => option.classList.remove('selected'));

        // Add 'selected' class to the clicked color option
        const selectedOption = document.querySelector('.color-option1[style*="background-color: ' + color + '"]');
        if (selectedOption) {
            selectedOption.classList.add('selected');
        }

        // Set the background color of the button
        const btnBack = document.querySelector('.btnBack');
        btnBack.style.backgroundColor = color;
    }

    // Add an event listener to the document to close the dropdown when clicking outside of it
    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('colorDropdown1');
        if (dropdown.style.display === 'block' && !event.target.closest('.color-dropdown')) {
            dropdown.style.display = 'none';
        }
    });
</script>