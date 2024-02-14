<?php

include('../../includes/config.php');
include('../../includes/connect.php');

$cId = $_REQUEST['id'];

$fetchList = $connect->query("SELECT * FROM per_checklist WHERE id = '$cId'");
$fetchListData = $fetchList->fetch();
?>
<div class="modal-header">

    <h3 class="modal-title text-success" id="editEventModalLabel">Edit Checklist</h3>

    <div class="col-8" class="aayu" style="display:flex;justify-content: end;">


        <div class="color-dropdown-todo" id="color-dropdown-todo">
            <i class="bi bi-palette colorIcon<?php echo $fetchListData['id']; ?>" onclick="toggleColorDropdownMenutodo(event)" data-mainid="<?php echo $fetchListData['id']; ?>" title="Font Background Color" id="btnBack-todo" style="border-radius: 50px;padding: 5px;cursor:pointer; font-size: large;margin-top: 5px;"></i>
            <div class="color-dropdown-content-todo bg-light m-1 colorDropdown<?php echo $fetchListData['id']; ?>" id="color-dropdown-content-todo">
                <div class="container" style="margin-top:10px;">

                    <div class="row justify-content-center m-1">
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffd6d6;" onclick="setColorMenu(this, '#ffd6d6')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #d6d6ff;" onclick="setColorMenu(this, '#d6d6ff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffffd6;" onclick="setColorMenu(this, '#ffffd6')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #e5ffcc;" onclick="setColorMenu(this, '#e5ffcc')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffe5cc;" onclick="setColorMenu(this, '#ffe566')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #e5ccff;" onclick="setColorMenu(this, '#e5ccff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffccff;" onclick="setColorMenu(this, '#ffccff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #fff1d6;" onclick="setColorMenu(this, '#fff1d6')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #eeeeee;" onclick="setColorMenu(this, '#eeeeee')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffffff;;" onclick="setColorMenu(this, '#ffffff;')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center m-1">
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffadad;" onclick="setColorMenu(this, '#ffadad')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #adadff;" onclick="setColorMenu(this, '#adadff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffffad;" onclick="setColorMenu(this, '#ffffad')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #b2ff66;" onclick="setColorMenu(this, '#b2ff66')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffcc99;" onclick="setColorMenu(this, '#ffcc99')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #cc99ff;" onclick="setColorMenu(this, '#cc99ff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ff99ff;" onclick="setColorMenu(this, '#ff99ff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffe2ad;" onclick="setColorMenu(this, '#ffe2ad')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #e0e0e0;" onclick="setColorMenu(this, '#e0e0e0')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #c0c0c0;;" onclick="setColorMenu(this, '#c0c0c0;')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center m-1">
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ff8585;" onclick="setColorMenu(this, '#ff8585')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #8585ff;" onclick="setColorMenu(this, '#8585ff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffff85;" onclick="setColorMenu(this, '#ffff85')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #99ff33;" onclick="setColorMenu(this, '#99ff33')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffb266;" onclick="setColorMenu(this, '#ffb266')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #b266f5;" onclick="setColorMenu(this, '#b266f5')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ff66ff;" onclick="setColorMenu(this, '#ff66ff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffd485;" onclick="setColorMenu(this, '#ffd485')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #bdbdbd;" onclick="setColorMenu(this, '#bdbdbd')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #808080;;" onclick="setColorMenu(this, '#808080;')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-center m-1">
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ff5c5c;" onclick="setColorMenu(this, '#ff5c5c')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #5c5cff;" onclick="setColorMenu(this, '#5c5cff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffff5c;" onclick="setColorMenu(this, '#ffff5c')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #80ff00;" onclick="setColorMenu(this, '#80ff00')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ff9933;" onclick="setColorMenu(this, '#ff9933')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #9933ff;" onclick="setColorMenu(this, '#9933ff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ff33ff;" onclick="setColorMenu(this, '#ff33ff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffc65c;" onclick="setColorMenu(this, '#ffc65c')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #9e9e9e;" onclick="setColorMenu(this, '#9e9e9e')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #606060;;" onclick="setColorMenu(this, '#606060;')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center m-1">
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ff3333;" onclick="setColorMenu(this, '#ff3333')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #3333ff;" onclick="setColorMenu(this, '#3333ff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffff33;" onclick="setColorMenu(this, '#ffff33')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #66cc00;" onclick="setColorMenu(this, '#66cc00')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ff8000;" onclick="setColorMenu(this, '#ff8000')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #7f00ff;" onclick="setColorMenu(this, '#7f00ff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ff00ff;" onclick="setColorMenu(this, '#ff00ff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffb833;" onclick="setColorMenu(this, '#ffb833')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #757575;" onclick="setColorMenu(this, '#757575')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #404040;;" onclick="setColorMenu(this, '#404040;')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center m-1">
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ff0000;" onclick="setColorMenu(this, '#ff0000')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #0a0aff;" onclick="setColorMenu(this, '#0a0aff')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffff0a;" onclick="setColorMenu(this, '#ffff0a')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #469900;" onclick="setColorMenu(this, '#469900')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #cc6600;" onclick="setColorMenu(this, '#cc6600')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #6600cc;" onclick="setColorMenu(this, '#6600cc')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #cc00cc;" onclick="setColorMenu(this, '#cc00cc')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #ffa90a;" onclick="setColorMenu(this, '#ffa90a')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #616161;" onclick="setColorMenu(this, '#616161')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                        <div class="col-1" style="justify-content: center;display: grid;">
                            <div class="color-option-todo" style="background-color: #000000;;" onclick="setColorMenu(this, '#000000;')">
                                <i class="bi bi-check2 checkmark-todo"></i>
                            </div>
                        </div>
                    </div>
                    <hr style="margin:1px;">
                    <div class="row justify-content-center" style="width: 100%;margin-left: 0px;margin-right: 0px;">
                        <!-- Add more color options as needed -->
                        <div class="col-12" style="display: contents;">
                            <input class="form-control" type="hidden" name="id" value="" id="ccc_id">

                            <input type="color" class="perColor<?php echo $fetchListData['id']; ?>" name="favcolor" value="<?php echo $fetchListData['color']; ?>" required>
                            <label style="width: fit-content;margin-right: -40px;margin: 0px;margin-top: 10px;"><i class="bi bi-palette m-1"></i>Color Picker</label>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <i class="bi bi-plus-circle-fill add_input_subchecklist" style="padding: 7px;font-size: large;margin-top: 5px;" type="button" title="Add Description" id="descriptionadd" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i><br>
        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="descriptionadd">

            <center>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="form-outline">
                            <input class="form-control form-control-md description<?php echo $fetchListData['id']; ?>" value="<?php echo $fetchListData['description']; ?>" type="text" name="description" required placeholder="Description" />

                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <div class="form-outline">
                            <input class="form-control form-control-md date<?php echo $fetchListData['id']; ?>" type="date" value="<?php echo $fetchListData['date']; ?>" name="date" required placeholder="Date" />

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">

                        <div class="form-outline">
                            <input class="form-control form-control-md status<?php echo $fetchListData['id']; ?>" type="text" value="<?php echo $fetchListData['status']; ?>" name="status" required placeholder="Status" />

                        </div>

                    </div>


                    <div class="col-md-6 mb-2">

                        <div class="form-outline">
                            <select id="coursemanager" name="priority" class="form-control form-control-md priority<?php echo $fetchListData['id']; ?>" required>
                                <option selected value="<?php echo $fetchListData['priority']; ?>"><?php echo $fetchListData['priority']; ?></option>
                                <option disabled value="">-Priority-</option>

                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">

                        <div class="form-outline">
                            <input class="form-control category<?php echo $fetchListData['id']; ?>" type="text" name="category" value="<?php echo $fetchListData['category'] ?>" placeholder="Category" /><br>
                        </div>

                    </div>

                    <div class="col-md-6 mb-2">

                        <div class="form-outline">
                            <textarea class="form-control comment<?php echo $fetchListData['id']; ?>" name="comment" placeholder="Comments"><?php echo $fetchListData['comment']; ?></textarea>
                        </div>

                    </div>
                </div>

            </center>
        </div>

        <!-- <i class="bi bi-paperclip getCheckFileId" style="padding: 7px;font-size: large;margin-top: 5px;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#AttachamentModalChecklist" data-id="<?php echo $row['id']; ?>"></i> -->

        <!-- <i class="bi bi-three-dots-vertical" style="border-radius: 50px;padding: 5px;cursor:pointer; font-size: large;margin-top: 5px;" id="selectLanguageDropdowncheck" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i> -->
        <!-- <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdowncheck">
    <label class="text-dark" style="font-weight:bold;">Checklist Name : <span style="font-size:larger; color:grey;"><?php echo $row['title']; ?></span></label><br>
    <label class="text-dark" style="font-weight:bold;">Description : <span style="font-size:larger; color:grey;"><?php echo $row['description']; ?></span></label><br>
    <label class="text-dark" style="font-weight:bold;">Status : <span style="font-size:larger; color:grey;"><?php echo $row['status']; ?></span></label><br>
    <label class="text-dark" style="font-weight:bold;">Priority : <span style="font-size:larger; color:grey;"><?php echo $row['priority']; ?></span></label><br>
    <label class="text-dark" style="font-weight:bold;">Category : <span style="font-size:larger; color:grey;"><?php echo $row['category']; ?></span></label><br>
    <label class="text-dark" style="font-weight:bold;">Comment : <span style="font-size:larger; color:grey;"><?php echo $row['comment']; ?></span></label><br>
    <label class="text-dark" style="font-weight:bold;">Date : <span style="font-size:larger; color:grey;"><?php echo $row['date']; ?></span></label><br>

  </div> -->

        <!-- <i class="bi bi-eye archana" style="border-radius: 50px;padding: 5px;cursor:pointer; font-size: large;margin-top: 5px;" id="viewChecklistFiles" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
  <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="viewChecklistFiles"> -->
        <!-- Dropdown menu content -->
        <!-- <ul style="list-style-type: none;padding-left: 0px !important;">
      <?php
        $fetchMainCheckFile = $connect->query("SELECT * FROM personalchecklist_files WHERE mainCheckId = '$item_ided'");
        while ($fetchMainCheckFileData = $fetchMainCheckFile->fetch()) {
            $fId = $fetchMainCheckFileData['fileId'];
            $fetchFileQ = $connect->query("SELECT * FROM user_files WHERE id = '$fId'");
            while ($fetchFileData = $fetchFileQ->fetch()) {
                if ($fetchFileData['lastName'] == "") {
        ?>

            <li class="nav-item m-1" style="border: 1px solid #71869d4d;background: aliceblue;"><a style="font-weight: bold;" class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fetchFileData['filename'] ?>" target="_blank"><?php echo $fetchFileData['filename']; ?></a></li>
          <?php
                }
                if ($fetchFileData['type'] == "online") {
            ?>
            <li class="nav-item m-1" style="border: 1px solid #71869d4d;background: aliceblue;"><a style="font-weight: bold;" class="nav-link" href="http://<?php echo $fetchFileData['filename'] ?>" target="_blank"><?php echo $fetchFileData['lastName']; ?></a></li>
          <?php
                }
                if ($fetchFileData['type'] == "offline") {
            ?>
            <li class="nav-item m-1" style="border: 1px solid #71869d4d;background: aliceblue;"> <a style="font-weight: bold;" class="driveLinkPer nav-link" value="<?php echo $fetchFileData['filename'] ?>"><?php echo $fetchFileData['lastName']; ?></a></li>

      <?php
                }
            }
        }
        ?>
    </ul> -->
        <!-- </div> -->
        <!-- <i class="bi bi-share getCheckId" data-id="<?php echo $row['id']; ?>" style="padding: 5px;cursor: pointer;font-size: large;margin-top: 5px;" data-bs-toggle="modal" data-bs-target="#shareChecklistModal"></i> -->
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <!-- <label class="form-label" style="font-weight: bold; font-size: large;">Checklist Name:</label> -->
    <input type="" id="editEventTitle" value="<?php echo $fetchListData['id']; ?>" class="form-control" placeholder="Event title"><br>
    <input type="text" id="editEventTitlename" class="form-control" value="<?php echo $fetchListData['title'] ?>" placeholder="Event title"><br>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success" id="saveEventedit">Save</button>
</div>