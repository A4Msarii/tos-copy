<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

?>
<!DOCTYPE html>
<html>

<head>
  <title>Vehicle</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
 
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">Personal Checklist</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <div class="card-body">
              <form style="width: 50%; margin-top: -25px;">
                <table class="table" id="table-field-check">
                  <tr>
                    <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter CheckList" name="" id="" class="form-control perChecklistVal" value="" required /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>
                    <td style="width:20px;"><button type="button" name="add_checklist" id="add_checklist" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                  </tr>
                </table>
              </form>
              <hr>
            </div>
            <!-- End Body -->

            <div class="card-body">
              <div class="row">
                <?php
                // $user_id = $_SESSION['login_id'];
                // if (isset($_REQUEST['user_ID'])) {
                // $fetchuser_id = $_REQUEST['user_ID'];
                $query_personal = "SELECT * FROM per_checklist WHERE user_id = '$user_id'";
                $statement_personal = $connect->prepare($query_personal);
                $statement_personal->execute();
                $result_personal = $statement_personal->fetchAll();
                foreach ($result_personal as $key => $row) {
                  if ($row['color'] == "") {
                    $bgColor = "grey";
                  } else {
                    $bgColor = $row['color'];
                  }
                  $item_ided = $row['id'];

                  $allCheckList = $connect->query("SELECT count(*) FROM per_subchecklist WHERE main_checklist_id = '$item_ided'");
                  $allCheckListData = $allCheckList->fetchColumn();

                  $countSubCheckList = $connect->query("SELECT count(*) FROM check_sub_checklist WHERE checkListId = '$item_ided' AND studentId = '$fetchuser_id'");
                  $checkSubListData = $countSubCheckList->fetchColumn();

                  $countCheckFile = $connect->query("SELECT count(*) FROM subchecklistfiles WHERE checkId = '$item_ided'");
                  $countCheckFileData = $countCheckFile->fetchColumn();
                ?>

                  <?php
                  //select id
                  $personal = $row['id'];
                  ?>
                  <div class="col-12 mb-3 mb-lg-15">

                    <div class="card card-hover-shadow h-100">
                      <div id="checklist-content" class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;background-color:<?php echo $bgColor; ?>;">
                        <h1 style="color:white;"><?php echo $row['title'] ?></h1>
                        <div class="aayu">
                          <button style="padding: 5px;" type="button" name="add_goal_actual" data-id="<?php echo $key ?>" class="btn btn-soft-dark add_input_subchecklist"><i class="bi bi-plus-circle-fill"></i></button>
                          <i class="bi bi-three-dots-vertical" style="border-radius: 50px;padding: 5px; color:white; cursor:pointer; font-size: large;" id="selectLanguageDropdowncheck" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                          <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdowncheck">
                            <!-- Dropdown menu content -->
                            <label class="text-dark" style="font-weight:bold;">Checklist Name : <span style="font-size:larger; color:grey;"><?php echo $row['checklist']; ?></span></label><br>
                            <label class="text-dark" style="font-weight:bold;">Description : <span style="font-size:larger; color:grey;"><?php echo $row['description']; ?></span></label><br>
                            <label class="text-dark" style="font-weight:bold;">Status : <span style="font-size:larger; color:grey;"><?php echo $row['status']; ?></span></label><br>
                            <label class="text-dark" style="font-weight:bold;">Priority : <span style="font-size:larger; color:grey;"><?php echo $row['priority']; ?></span></label><br>
                            <label class="text-dark" style="font-weight:bold;">Category : <span style="font-size:larger; color:grey;"><?php echo $row['category']; ?></span></label><br>
                            <label class="text-dark" style="font-weight:bold;">Comment : <span style="font-size:larger; color:grey;"><?php echo $row['comment']; ?></span></label><br>
                            <label class="text-dark" style="font-weight:bold;">Date : <span style="font-size:larger; color:grey;"><?php echo $row['date']; ?></span></label><br>

                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <form action="" method="post">
                            <div class="row form_inputs<?php echo $key ?> mb-2"></div>
                            <button type="submit" class="btn btn-primary m-2" style="display:none" id="form_button<?php echo $key ?>">Submit</button>
                          </form>
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
                              <div class="col-6 border d-flex" style="border-radius: 20px;">
                                <input style="height: 25px;width: 25px;border-radius: 15px;" type="checkbox" class="form-check-input is-valid allcheckList_per" name="check" id="<?php echo $rowselect['id']; ?>" data-checklist="<?php echo $item_ided; ?>" value="<?php echo $rowselect['id']; ?>" <?php echo $checkData; ?>>

                                <h5 style="cursor: pointer; margin: 5px; float:left;">
                                  <?php
                                  if ($checkSubData > 0) {

                                  ?>
                                    <s><?php echo $rowselect['name']; ?></s>
                                  <?php
                                  } else {

                                  ?>
                                    <?php echo $rowselect['name']; ?>
                                  <?php
                                  }
                                  
                                  ?>


                                </h5>
                                <div style="float:right;">
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
                                </div>

                              </div>
                          <?php
                            }
                          }

                          ?>

                        </div>
                      </div>
                      <div class="card-body">

                      </div>
                    </div>
                  </div>


                <?php } ?>
              </div>
            </div>
          </div>
          <!-- End Card -->
        </div>
      </div>

    </div>

    <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>



<!--   <script type="text/javascript">
    $(document).ready(function() {
      var html = '<tr>\
                  <td style="border: 1px solid white;"><input type="text" name="subchecklist[]" class="form-control" placeholder="Enter Checklist" required></td>\
                  <td style="border: 1px solid white;"><button type="button" name="remove_subchecklist" id="remove_subchecklist" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
      var max = 100;
      var a = 1;

      $("#add_checklist").click(function() {
        if (a <= max) {
          $("#subchecklist_table_per").append(html);
          a++;
        }
      });
      $(document).on('click', '#remove_subchecklist', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
    $("#newchecktableper").on("click", ".edit_course_data_per", function() {

      var ctid = $(this).attr('id');

      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/fetch_check_edit_value_per.php',
        data: 'ctid=' + ctid,
        success: function(response) {

          $('#get_course_foem_per').empty();
          $('#get_course_foem_per').html(response);
        }
      });

    });

    $(document).on('click', '.add_input_subchecklist', function() {
      var form_key = $(this).data('id');
      var button_class = '#form_button' + form_key;
      var button = $(button_class);
      button.css('display', 'block');
      var classname = '.form_inputs' + form_key; // Include a dot before the class name
      var html = `<div class="d-flex form-group col-6 mt-1">
                  <input type="text" name="" id="" placeholder="" class="form-control">
                  <button type="button" id="remove_input" class="col-1 btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button>
              </div>`;
      $(classname).append(html);
    });
    $(document).on('click', '#remove_input', function() {
      $(this).parent('div').remove();
    });
  </script> -->

<script>
    // Get the checklist content div by ID
    const checklistContent = document.getElementById('checklist-content');
    
    // Get the h1 tag within the checklist content
    const h1Tag = checklistContent.querySelector('h1');

    // Add a click event listener to the h1 tag
    h1Tag.addEventListener('click', () => {
        // Replace the h1 content with an input field for editing
        h1Tag.innerHTML = `<input type="text" id="editChecklistInput" value="${h1Tag.innerText}">`;
        
        // Focus on the input field for editing
        const editInput = document.getElementById('editChecklistInput');
        editInput.focus();
        
        // Add an event listener to the input field to save changes on blur
        editInput.addEventListener('blur', () => {
            // Get the edited value
            const editedValue = editInput.value;
            
            // Update the h1 tag with the edited value
            h1Tag.innerText = editedValue;
            
            // You can also send the edited value to your server for updating the database
        });
    });
</script>



 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>