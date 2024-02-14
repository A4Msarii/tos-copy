 <center>
                <input type="text" class="form-control form-control-lg" id="searchInputmainchecklist" placeholder="Search messages or users" aria-label="Search for messages or users..." style="width: 90%; padding: 10px;">
              </center>
              <input type="hidden" value="<?php echo $fetchuser_id ?>" id="user_ides1">
              <?php
              $item_sel_em = "SELECT * FROM per_checklist WHERE user_id = '$user_id'";
              $item_selst_em = $connect->prepare($item_sel_em);
              $item_selst_em->execute();

              if ($item_selst_em->rowCount() > 0) {
                $students_em = $item_selst_em->fetchAll();
                foreach ($students_em as $student_id) {
                  if ($student_id['color'] == "") {
                    $bgColor = "grey";
                  }
                  else
                  {
                    $bgColor = $student_id['color'];
                  }
                  $item_ided = $student_id['id'];

                  $allCheckList = $connect->query("SELECT count(*) FROM per_subchecklist WHERE main_checklist_id = '$item_ided'");
                  $allCheckListData = $allCheckList->fetchColumn();

                  $countSubCheckList = $connect->query("SELECT count(*) FROM check_sub_checklist WHERE checkListId = '$item_ided' AND studentId = '$fetchuser_id'");
                  $checkSubListData = $countSubCheckList->fetchColumn();

                  $countCheckFile = $connect->query("SELECT count(*) FROM subchecklistfiles WHERE checkId = '$item_ided'");
                  $countCheckFileData = $countCheckFile->fetchColumn();

              ?>
                  <div class="container rowAddmain" id="rowAddmain">

                    <div class="row" id="rowsearchmain">
                      <div class="col-1">


                        <?php if ($checkSubListData != $allCheckListData) { ?>
                          <img src="<?php echo BASE_URL; ?>assets/svg/icons/corss1.png" style="height: 45px; margin:10px;">
                        <?php } else {
                        ?>
                          <img src="<?php echo BASE_URL; ?>assets/svg/icons/check1.png" style="height: 45px; margin:10px;">
                        <?php
                        } ?>
                      </div>
                      <div class="col-11">
                        <div class="row">
                          <div class="col-10" style="margin-top:20px; border-radius:15px; background-color: <?php echo $bgColor;?>">
                            <h3 style="color:white;margin: 5px; cursor:pointer;float: left;"><?php echo $student_id['checklist']; ?>
                              <?php
                              if ($countCheckFileData != 0) {
                              ?>
                                <!-- <p>Total Files :- <?php echo $countCheckFileData; ?></p> -->
                              <?php
                              }
                              ?>
                            </h3>
                            <i class="bi bi-three-dots-vertical" style="float:right;border-radius: 50px;padding: 5px; color:white; cursor:pointer;" id="selectLanguageDropdowncheck" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdowncheck">
                              <!-- Dropdown menu content -->
                              <label class="text-dark" style="font-weight:bold;">Checklist Name : <span style="font-size:larger; color:grey;"><?php echo $student_id['checklist']; ?></span></label><br>
                              <label class="text-dark" style="font-weight:bold;">Description : <span style="font-size:larger; color:grey;"><?php echo $student_id['description']; ?></span></label><br>
                              <label class="text-dark" style="font-weight:bold;">Status : <span style="font-size:larger; color:grey;"><?php echo $student_id['status']; ?></span></label><br>
                              <label class="text-dark" style="font-weight:bold;">Priority : <span style="font-size:larger; color:grey;"><?php echo $student_id['priority']; ?></span></label><br>
                              <label class="text-dark" style="font-weight:bold;">Category : <span style="font-size:larger; color:grey;"><?php echo $student_id['category']; ?></span></label><br>
                              <label class="text-dark" style="font-weight:bold;">Comment : <span style="font-size:larger; color:grey;"><?php echo $student_id['comment']; ?></span></label><br>
                              <label class="text-dark" style="font-weight:bold;">Date : <span style="font-size:larger; color:grey;"><?php echo $student_id['date']; ?></span></label><br>

                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <?php
                          $select_checklist = "SELECT * FROM per_subchecklist where main_checklist_id='$item_ided'";
                          $select_checklist_st = $connect->prepare($select_checklist);
                          $select_checklist_st->execute();

                          if ($select_checklist_st->rowCount() > 0) {
                            $select_checklist_re = $select_checklist_st->fetchAll();
                            foreach ($select_checklist_re as $rowselect) {
                              $subCheckId = $rowselect['id'];
                              $checkSubCheckList = $connect->query("SELECT count(*) FROM per_check_sub_checklist WHERE checkListId = '$item_ided' AND subCheckListId = '$subCheckId' AND userId = '$user_id'");
                              $checkSubData = $checkSubCheckList->fetchColumn();
                              if ($checkSubData > 0) {
                                $checkData = "checked";
                              } else {
                                $checkData = "";
                              }
                          ?>
                              <div class="col-5 border d-flex" style="border-radius: 20px;">
                                <input style="height: 25px;width: 25px;border-radius: 15px;" type="checkbox" class="form-check-input is-valid allcheckList_per" name="check" id="<?php echo $rowselect['id']; ?>" data-checklist="<?php echo $item_ided; ?>" value="<?php echo $rowselect['id']; ?>" <?php echo $checkData; ?>>

                                <h5 style="cursor: pointer; margin: 5px; float:left;"><?php echo $rowselect['name']; ?></h5>
                                <i class="bi bi-three-dots-vertical" style="float:right;border-radius: 50px;padding: 5px; cursor:pointer;" id="selectLanguageDropdownsubcheck" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdownsubcheck">
                              <!-- Dropdown menu content -->
                              <label class="text-dark" style="font-weight:bold;">Checklist Name : <span style="font-size:larger; color:grey;"><?php echo $rowselect['name']; ?></span></label><br>
                              <label class="text-dark" style="font-weight:bold;">Description : <span style="font-size:larger; color:grey;"><?php echo $rowselect['description']; ?></span></label><br>
                              <label class="text-dark" style="font-weight:bold;">Status : <span style="font-size:larger; color:grey;"><?php echo $rowselect['status']; ?></span></label><br>
                              <label class="text-dark" style="font-weight:bold;">Priority : <span style="font-size:larger; color:grey;"><?php echo $rowselect['priority']; ?></span></label><br>
                              <label class="text-dark" style="font-weight:bold;">Category : <span style="font-size:larger; color:grey;"><?php echo $rowselect['category']; ?></span></label><br>
                              <label class="text-dark" style="font-weight:bold;">Comment : <span style="font-size:larger; color:grey;"><?php echo $rowselect['comment']; ?></span></label><br>

                            </div>
                                <?php
                                $countCheckFile = $connect->query("SELECT count(*) FROM per_subchecklistfile WHERE subCheckId = '$subCheckId'");
                                $countCheckFileData = $countCheckFile->fetchColumn();
                                if ($countCheckFileData > 0) {
                                ?>
                                  <i class="bi bi-paperclip" style="float:right;border-radius: 50px;padding: 5px; cursor:pointer; float: right;" id="selectLanguageDropdowncheck" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                                  <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdowncheck">
                                    <!-- Dropdown menu content -->
                                    <?php
                                    $allFiles = $connect->query("SELECT * FROM per_subchecklistfile WHERE subCheckId = '$subCheckId'");
                                    while ($fileData = $allFiles->fetch()) {
                                      if ($fileData['fileType'] != "offline") {
                                        if ($fileData['fileType'] == "online") {
                                    ?>
                                          <a href="<?php echo $fileData['fileName']; ?>" target="_blank"><?php echo $fileData['lastName']; ?></a>|
                                        <?php
                                        } else {
                                        ?>
                                          <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileData['fileName']; ?>" target="_blank"><?php echo substr($fileData['fileName'], 0, 10); ?> </a>|
                                        <?php
                                        }
                                      } else {
                                        ?>
                                        <a style="cursor: pointer;" class="driveLink1" value="<?php echo $fileData['fileName']; ?>" target="_blank"><?php echo $fileData['lastName']; ?> </a>|
                                      <?php
                                      }
                                      ?>

                                    <?php
                                    }
                                    ?>
                                  </div>
                                <?php
                                }
                                ?>
                              </div>
                          <?php
                            }
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  </div>
              <?php }
              } ?>
              <hr>
              <input type="button" value="Submit" class="btn btn-success" id="addAllCheckList_per" style="font-size: large;font-weight: bold;float: right;" />


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInputmainchecklist');
    const rowElements = document.querySelectorAll('.rowAddmain');

    searchInput.addEventListener('input', function() {
      const searchTerm = searchInput.value.toLowerCase();

      rowElements.forEach(rowElement => {
        const textContent = rowElement.textContent.toLowerCase();
        if (textContent.includes(searchTerm)) {
          rowElement.style.display = 'block';
        } else {
          rowElement.style.display = 'none';
        }
      });
    });
  });
</script>

<script>
  $("#addAllCheckList_per").on("click", function() {
    const userId = <?php echo $user_id ?>;
    let submittedCount = 0;
    $('.allcheckList_per:checked').each(function() {
      const dataItemValue = $(this).data('checklist');
      const subItemValue = $(this).val();

      const totalSubItems = $('.allcheckList_per:checked').length;

      sendDataToServer(dataItemValue, subItemValue, userId, totalSubItems, ++submittedCount);
    });
  });

  function sendDataToServer(dataItemValue, subItemValue, userId, totalSubItems, submittedCount) {
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList_per.php',
      data: {
        dataItem: dataItemValue,
        subItem: subItemValue,
        userId: userId,
      },
      success: function(response) {
        if (submittedCount == totalSubItems) {
          location.reload(); // Reload the page when all subitems are submitted
        }
      }
    });
  }
</script>