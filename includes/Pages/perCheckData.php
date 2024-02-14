<style type="text/css">
  h1.perChekMain {
    font-size: 20px !important;
    margin: auto;
    padding: 5px;
    font-weight: 200;
    color: #ffffff;
    font-family: math;
    border-radius: 10px;
    text-transform: lowercase;
  }

  h1 .bi-check2-circle {
    font-size: 30px;
    margin-right: 10px;
    color: #0eb0b7;
  }

  .todo {
    font-weight: 200;
    position: relative;
    width: 100%;
    display: flex;
    margin: 5px;
  }

  .todo:hover:after {
    /*box-shadow*/
    -webkit-box-shadow: inset 0 0 0 2px #949494;
    -moz-box-shadow: inset 0 0 0 2px #949494;
    box-shadow: inset 0 0 0 2px #949494;
  }

  /*.todo .bi-check2-circle {
    position: absolute;
    z-index: 1;
    left: -31px;
    top: 0;
    font-size: 1px;
    line-height: 36px;
    width: 36px;
    height: 36px;
    text-align: center;
    color: transparent;
    text-shadow: 1px 1px 0 white, -1px -1px 0 white;
  }*/

  :checked+.todo {
    color: #717171;
  }

  :checked+.todo:before {
    width: 100%;
  }

  :checked+.todo:after {
    /*box-shadow*/
    -webkit-box-shadow: inset 0 0 0 2px #0eb0b7;
    -moz-box-shadow: inset 0 0 0 2px #0eb0b7;
    box-shadow: inset 0 0 0 2px #0eb0b7;
  }

  :checked+.todo .bi-check2-circle {
    font-size: 20px;
    line-height: 35px;
    color: #0eb0b7;
  }

  /* Delete Items */

  .delete-item {
    display: block;
    position: absolute;
    height: 36px;
    width: 36px;
    line-height: 36px;
    right: 0;
    top: 0;
    text-align: center;
    color: #d8d8d8;
    opacity: 0;
  }

  .todo-wrap:hover .delete-item {
    opacity: 1;
  }

  .delete-item:hover {
    color: #cd4400;
  }

  /* Add Items */

  #add-todo {
    padding: 25px 0 0 0;
    font-size: 14px;
    font-weight: 200;
    color: #d8d8d8;
    display: inline-block;
    cursor: pointer;
  }

  #add-todo:hover {
    color: blue;
    /*transition*/
    -webkit-transition: none;
    -moz-transition: none;
    -o-transition: none;
    transition: none;
  }

  #add-todo .bi-plus-lg {
    font-size: 14px;
    /*transition*/
    -webkit-transition: none;
    -moz-transition: none;
    -o-transition: none;
    transition: none;
  }

  .input-todo {
    border: none;
    outline: none;
    font-weight: 200;
    position: relative;
    top: -1px;
    margin: 0;
    padding: 0;
    width: 90%;
  }

  .editing {
    height: 0;
    overflow: hidden;
  }

  .editing.todo-wrap {
    box-shadow: 0 0 400px rgba(0, 0, 0, .8), inset 0 0px 0 2px #ebebeb;
  }

  .row.accordion-button::after {
    position: absolute;
    margin-left: -18px;
    width: 1rem;
    height: 1rem;
    background-size: 1rem;
    top: 0px;
  }

  .color-dropdown-todo {
    position: relative;
    display: inline-block;
    top: 10px;
  }

  .color-dropdown-content-todo {
    display: none;
    position: absolute;
    z-index: 1;
    width: 400px;
    border: 1px solid #E0E0E0;
    box-shadow: 1px 1px 9px 1px #BDBDBD;
    border-radius: 5px;
    right: -5px;
  }

  .color-option-todo {
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

  .color-option-todo:hover {
    width: 25px;
    height: 25px;
  }

  .checkmark-todo {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: none;
    font-size: x-large;
    font-weight: bold;
    color: white;
  }

  .color-option-todo.selected .checkmark-todo {
    display: block;
  }

  @keyframes blinkBorder {
    0% {
      border-color: transparent;
    }

    50% {
      border-color: grey;
    }

    100% {
      border-color: transparent;
    }
  }
</style>

<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
?>

<div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
  <div class="row">
    <div class="col-7 border">

      <div class="response"></div>

      <div class="calendar" id="full-calendar"></div>

    </div>
    <div class="col-5 border">
      <div class="row">
        <center>
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEventModal">Add Checklist</button>
          <form class="d-none">
            <table class="table" id="table-field-perstatus11">
              <tr style="display: flex;">
                <td style="text-align: center; display:flex;border: none !important;width: 40%;"><input type="text" placeholder="Enter CheckList" name="" id="" class="form-control perChecklistValCheck" value="" required /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>
                <td style="text-align: center; display:flex;border: none !important;width: 20%;">
                  <input type="date" name="date" class="form-control perCheckDate"><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>
                </td>
                <td style="text-align: center; display:flex;border: none !important;width: 30%;">
                  <select class="form-select" id="repeat-options">
                    <option value="does">Does Not Repeat</option>
                    <option value="every">Every Week Day(Mon-Fri)</option>
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                    <option value="custom">Custom</option>
                  </select>
                </td>
                <td style="width:10%;border: none !important;"><button type="button" name="add_checklist" id="add_checklist11" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
              </tr>
            </table>
          </form>
        </center>
        <center>
          <button style="margin:5px; margin-top:-15px;display: none;" class="btn btn-success" type="submit" id="saveCheckListValue" name="">Submit</button>
        </center>
      </div>
      <hr>
      <div class="row">
        <div style="float:left;display: flex;" class="col-6">
          <a href="<?php echo BASE_URL; ?>includes/Pages/per_check_calender.php" title="Checklist Calendar" style="font-size: large;font-weight: bold;" class="btn btn-soft-primary btn-sm">
            <img style="height: 20px;width: 20px;" src="<?php echo BASE_URL; ?>assets/svg/menuicon/calendar.png"><br>
          </a>
          <input type="text" class="form-control" id="searchInputmainchecklist" placeholder="Search For Checklist.." aria-label="Search for messages or users..." style="background: #6d747b21;width: auto;height: 30px;border-radius: 5px !important;margin: 10px;">
        </div>
        <div style="justify-content: end;display: flex;" class="col-6">
          <ul class="list-inline">
            <!-- <span style="font-size:large; text-decoration:underline;">Priority : </span> -->
            <li class="list-inline-item d-inline-flex align-items-center">
              <span class="bg-success m-1" style="width: 20px; height:20px;box-shadow: 0px 1px 3px 0px #677788;margin-left: 5px;border-radius: 3px;"></span><span style="font-size:large;">Low</span>
            </li>
            <li class="list-inline-item d-inline-flex align-items-center">
              <span class="bg-primary m-1" style="width: 20px; height:20px;box-shadow: 0px 1px 3px 0px #677788;margin-left: 5px;border-radius: 3px;"></span><span style="font-size:large;">Medium</span>
            </li>
            <li class="list-inline-item d-inline-flex align-items-center">
              <span class="bg-danger m-1" style="width: 20px; height:20px;box-shadow: 0px 1px 3px 0px #677788;margin-left: 5px;border-radius: 3px;"></span><span style="font-size:large;">High</span>
            </li>
          </ul>
        </div>
      </div><br>
      <?php

      $user_id = $_SESSION['login_id'];
      if (isset($_REQUEST['user_ID'])) {
        $fetchuser_id = $_REQUEST['user_ID'];
        $item_sel_em = "SELECT * FROM per_checklist 
  WHERE user_id='$user_id' 
  AND mainCheckId IS NULL 
  AND MONTH(date) = MONTH(CURDATE())
  AND YEAR(date) = YEAR(CURDATE())
  AND date >= CURDATE()
  ORDER BY date ASC";
        $item_selst_em = $connect->prepare($item_sel_em);
        $item_selst_em->execute();

        if ($item_selst_em->rowCount() > 0) {
          $students_em = $item_selst_em->fetchAll();
          foreach ($students_em as $key => $row) {
            if ($row['color'] == "") {
              $bgColor = "grey";
            } else {
              $bgColor = $row['color'];
            }
            $item_ided = $row['id'];
            $priority = $row['priority'];
            $priorityClasses = array(
              'low' => '#00c9a7', // Use Bootstrap warning class
              'medium' => '#377dff', // Use Bootstrap success class
              'high' => '#ed4c78' // Use Bootstrap info class
            );
            $priorityClasses = isset($priorityClasses[$priority]) ? $priorityClasses[$priority] : '';
            $date = $row['date'];

            // Convert the date to a Unix timestamp
            $timestamp = strtotime($date);

            // Format the date to include the day
            $formattedDate = date('l, d-M-y', $timestamp);

            $allCheckList = $connect->query("SELECT count(*) FROM per_subchecklist WHERE main_checklist_id = '$item_ided'");
            $allCheckListData = $allCheckList->fetchColumn();

            $countSubCheckList = $connect->query("SELECT count(*) FROM per_check_sub_checklist WHERE checkListId = '$item_ided' AND userId = '$user_id'");
            // print_r($countSubCheckList);
            $checkSubListData = $countSubCheckList->fetchColumn();

            $countCheckFile = $connect->query("SELECT count(*) FROM subchecklistfiles WHERE checkId = '$item_ided'");
            $countCheckFileData = $countCheckFile->fetchColumn();

      ?>

            <div class="container py-1" id="rowAddmain">
              <div class="row" style="width:100%;">
                <div class="card card-hover-shadow" style="border: 2px solid <?php echo (date('Y-m-d', strtotime($row['date'])) === date('Y-m-d')) ? "grey" : "transparent"; ?>;
    <?php echo (date('Y-m-d', strtotime($row['date'])) === date('Y-m-d')) ? "animation: blinkBorder 1s infinite;" : ""; ?>
    width: inherit; border: 0.001rem solid #dddddd;">
                  <div class="card-body">
                    <div class="row accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#todo-list<?php echo $row['id']; ?>" aria-expanded="false" aria-controls="todo-list<?php echo $row['id']; ?>" style="margin-left: -33px;width: -webkit-fill-available;background-color: #1e202200 !important;    margin-top: -20px;">
                      <div class="col-3" style="float: left;">
                        <div style="display: flex;">
                          <?php if ($checkSubListData != $allCheckListData || $allCheckListData == 0) { ?>
                            <img src="<?php echo BASE_URL; ?>assets/svg/icons/corss1.png" style="height: 25px; margin:auto; margin-right:10px;">
                          <?php } else {
                          ?>
                            <img src="<?php echo BASE_URL; ?>assets/svg/icons/check1.png" style="height: 25px; margin:auto; margin-right:10px;">
                          <?php
                          } ?>
                          <span class="line" style="background-color:<?php echo $priorityClasses; ?>;margin:auto; margin-right:10px;height: 20px;width: 20px;box-shadow: 0px 1px 3px 0px #677788;border-radius: 3px;"></span>
                          <h1 class="card-subtitle perChekMain" style="text-align: center; border-radius: 20px;width: 140px;background-color:<?php echo $bgColor; ?>;border-radius: 20px;" data-id="<?php echo $row['id']; ?>" onclick="toggleElement(this)" title="<?php echo $row['title']; ?>">
                            <?php echo substr($row['title'], 0, 12) ?>
                          </h1>
                        </div>
                        

                      </div>
                      <div class="col-9" class="aayu">
                        <div style="position: absolute;right: 0px;top: 0px;">
                        <span style="margin: 10px;font-size: 15px;font-weight: 100;margin-right: 0px;margin-left: 30px;" class="badge text-dark"><?php echo $formattedDate; ?></span>
                      </div><br>
                        <div style="display:flex;justify-content: end;">
                        <a style="margin-top: 5px;font-size: medium;" class="btn btn-xs deletePerCheck" data-deleteid="<?php echo $row['id']; ?>" data-bs-toggle="tooltip" title="Delete"><i class="bi bi-trash-fill"></i></a>

                        <div class="color-dropdown-todo" id="color-dropdown-todo">
                          <i class="bi bi-palette text-dark colorIcon<?php echo $row['id']; ?>" onclick="toggleColorDropdownMenutodo(event)" data-mainid="<?php echo $row['id']; ?>" title="Font Background Color" id="btnBack-todo" style="border-radius: 50px;padding: 5px;cursor:pointer;margin-top: 5px;"></i>
                          <div class="color-dropdown-content-todo bg-light m-1 colorDropdown<?php echo $row['id']; ?>" id="color-dropdown-content-todo">
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

                                  <input type="color" class="perColor<?php echo $row['id']; ?>" name="favcolor" required>
                                  <label style="width: fit-content;margin-right: -40px;margin: 0px;margin-top: 10px;"><i class="bi bi-palette m-1"></i>Color Picker</label>



                                </div>
                                <div class="col-12" style="justify-content: center;display: flex;">
                                  <input type="button" value="Add Color" class="addColorBtn btn btn-success" style="margin: 5px;" data-mainid="<?php echo $row['id']; ?>" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <i class="bi bi-plus-circle-fill add_input_subchecklist text-dark" style="padding: 7px;margin-top: 5px;" type="button" title="Add Description" id="descriptionadd" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i><br>
                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="descriptionadd">

                          <center>
                            <div class="row">
                              <div class="col-md-6 mb-2">
                                <div class="form-outline">
                                  <input class="form-control form-control-md description<?php echo $row['id']; ?>" type="text" name="description" required placeholder="Description" />

                                </div>
                              </div>

                              <div class="col-md-6 mb-2">
                                <div class="form-outline">
                                  <input class="form-control form-control-md date<?php echo $row['id']; ?>" type="date" name="date" required placeholder="Date" />

                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 mb-2">

                                <div class="form-outline">
                                  <input class="form-control form-control-md status<?php echo $row['id']; ?>" type="text" name="status" required placeholder="Status" />

                                </div>

                              </div>


                              <div class="col-md-6 mb-2">

                                <div class="form-outline">
                                  <select id="coursemanager" name="priority" class="form-control form-control-md priority<?php echo $row['id']; ?>" required>
                                    <option selected disabled value="">-Priority-</option>

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
                                  <input class="form-control category<?php echo $row['id']; ?>" type="text" name="category" value="" placeholder="Category" /><br>
                                </div>

                              </div>

                              <div class="col-md-6 mb-2">

                                <div class="form-outline">
                                  <textarea class="form-control comment<?php echo $row['id']; ?>" name="comment" placeholder="Comments"></textarea>
                                </div>

                              </div>
                            </div>
                            <button type="button" class="btn btn-success addPerDesc" data-id="<?php echo $row['id']; ?>">Submit</button>

                          </center>
                        </div>

                        <i class="bi bi-paperclip getCheckFileId text-dark" style="padding: 7px;margin-top: 5px;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#AttachamentModalChecklist" data-id="<?php echo $row['id']; ?>"></i>

                        <i class="bi bi-three-dots-vertical text-dark" style="border-radius: 50px;padding: 5px;cursor:pointer;margin-top: 5px;" id="selectLanguageDropdowncheck" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdowncheck">
                          <!-- Dropdown menu content -->
                          <label class="text-dark" style="font-weight:bold;">Checklist Name : <span style="font-size:larger; color:grey;"><?php echo $row['title']; ?></span></label><br>
                          <label class="text-dark" style="font-weight:bold;">Description : <span style="font-size:larger; color:grey;"><?php echo $row['description']; ?></span></label><br>
                          <label class="text-dark" style="font-weight:bold;">Status : <span style="font-size:larger; color:grey;"><?php echo $row['status']; ?></span></label><br>
                          <label class="text-dark" style="font-weight:bold;">Priority : <span style="font-size:larger; color:grey;"><?php echo $row['priority']; ?></span></label><br>
                          <label class="text-dark" style="font-weight:bold;">Category : <span style="font-size:larger; color:grey;"><?php echo $row['category']; ?></span></label><br>
                          <label class="text-dark" style="font-weight:bold;">Comment : <span style="font-size:larger; color:grey;"><?php echo $row['comment']; ?></span></label><br>
                          <label class="text-dark" style="font-weight:bold;">Date : <span style="font-size:larger; color:grey;"><?php echo $row['date']; ?></span></label><br>

                        </div>

                        <i class="bi bi-eye archana text-dark" style="border-radius: 50px;padding: 5px;cursor:pointer;margin-top: 5px;" id="viewChecklistFiles" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="viewChecklistFiles">
                          <!-- Dropdown menu content -->
                          <ul style="list-style-type: none;padding-left: 0px !important;">
                            <?php
                            $fetchMainCheckFile = $connect->query("SELECT * FROM personalchecklist_files WHERE mainCheckId = '$item_ided'");
                            while ($fetchMainCheckFileData = $fetchMainCheckFile->fetch()) {
                              $fId = $fetchMainCheckFileData['fileId'];
                              $fetchFileQ = $connect->query("SELECT * FROM user_files WHERE id = '$fId'");
                              while ($fetchFileData = $fetchFileQ->fetch()) {
                                if ($fetchFileData['lastName'] == "") {
                            ?>

                                  <li class="nav-item m-1" style="border: 1px solid #71869d4d;"><a style="font-weight: bold;" class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fetchFileData['filename'] ?>" target="_blank"><?php echo $fetchFileData['filename']; ?></a></li>
                                <?php
                                }
                                if ($fetchFileData['type'] == "online") {
                                ?>
                                  <li class="nav-item m-1" style="border: 1px solid #71869d4d;"><a style="font-weight: bold;" class="nav-link" href="http://<?php echo $fetchFileData['filename'] ?>" target="_blank"><?php echo $fetchFileData['lastName']; ?></a></li>
                                <?php
                                }
                                if ($fetchFileData['type'] == "offline") {
                                ?>
                                  <li class="nav-item m-1" style="border: 1px solid #71869d4d;"> <a style="font-weight: bold;" class="driveLinkPer nav-link" value="<?php echo $fetchFileData['filename'] ?>"><?php echo $fetchFileData['lastName']; ?></a></li>

                            <?php
                                }
                              }
                            }
                            ?>
                          </ul>
                        </div>
                        <i class="bi bi-share getCheckId text-dark" data-id="<?php echo $row['id']; ?>" style="padding: 5px;cursor: pointer;margin-top: 5px;" data-bs-toggle="modal" data-bs-target="#shareChecklistModal"></i>
                      </div>
                    </div>
                    </div>
                    <hr class="text-success" style="margin: 12px;">
                    <div id="todo-list<?php echo $row['id']; ?>" class="row accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <span class="editing todo-wrap1">
                        <label for="' + newId + '" class="todo1">
                          <input type="checkbox" id="' + newId + '" style="height: 25px;width: 25px;border-radius: 15px;margin:5px;margin-top:20px;" />
                          <input style="height: 25px;width: max-content;margin:5px;" type="text" class="input-todo1" class="subPer' + mId + '" id="input-todo1' + newId + '" />
                        </label>
                      </span>
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
                          <div class="todo-wrap">
                            <!-- <input type="checkbox" id="1"/> -->
                            <div style="float:left;">
                              <label class="todo">
                                <input style="height: 25px;width: 25px;border-radius: 15px;margin: 5px;border: 1px solid #97a4af;" type="checkbox" class="form-check-input is-valid allcheckList_per" name="check" id="<?php echo $rowselect['id']; ?>" data-checklist="<?php echo $item_ided; ?>" value="<?php echo $rowselect['id']; ?>" <?php echo $checkData; ?>>
                                <span data-id="<?php echo $rowselect['id']; ?>" class="perSubChekMain" onclick="toggleElementPer(this)" style="font-size: large;cursor: pointer;">
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

                                </span>
                              </label>
                            </div>
                            <div style="display: flex;position: absolute; right:20px; margin:5px;">
                              
                              <a class="btn btn-xs deletePerSubCheck" data-deleteid="<?php echo $rowselect['id']; ?>" data-bs-toggle="tooltip" title="Delete" style="margin: auto;font-size: medium;"><i class="bi bi-x-circle"></i></a>
                              <i class="bi bi-plus-circle-fill add_input_subchecklist" style="padding: 5px;margin: inherit;" type="button" title="Add Description" id="descriptionaddsub" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i><br>
                              <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="descriptionaddsub" style="width: max-content;">

                                <center>
                                  <!-- <div class="col-12 mb-2">
                               <div class="form-outline">
                                <label class="form-label text-dark" for="item_name" style="font-weight:bold;">CheckList Item Name<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                                <input class="form-control form-control-md" type="text" name="checklist_name" required/>

                              </div>

                            </div> -->
                                  <div class="row">
                                    <div class="col-md-6 mb-2">
                                      <div class="form-outline">
                                        <input class="form-control form-control-md descriptionSub<?php echo $subCheckId; ?>" type="text" name="description" required placeholder="Description" />

                                      </div>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                      <div class="form-outline">
                                        <input class="form-control form-control-md dateSub<?php echo $subCheckId; ?>" type="date" name="date" required placeholder="Date" />

                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6 mb-2">

                                      <div class="form-outline">
                                        <input class="form-control form-control-md statusSub<?php echo $subCheckId; ?>" type="text" name="status" required placeholder="Status" />

                                      </div>

                                    </div>


                                    <div class="col-md-6 mb-2">

                                      <div class="form-outline">
                                        <select id="coursemanager" name="priority" class="form-control form-control-md prioritySub<?php echo $subCheckId; ?>" required placeholder="Priority">
                                          <option selected disabled value="">-Priority-</option>

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
                                        <input class="form-control categorySub<?php echo $subCheckId; ?>" type="text" name="category" value="" placeholder="Category" /><br>
                                      </div>

                                    </div>

                                    <div class="col-md-6 mb-2">

                                      <div class="form-outline">
                                        <textarea class="form-control commentSub<?php echo $subCheckId; ?>" name="comment" placeholder="Comment"></textarea>
                                      </div>

                                    </div>
                                  </div>
                                  <button type="button" class="btn btn-success addSubDesc" data-id="<?php echo $subCheckId; ?>">Submit</button>
                                </center>
                              </div>
                              <i class="bi bi-paperclip getSubFileId" style="padding: 7px;font-size: large;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#AttachamentModalSubChecklist" data-id="<?php echo $rowselect['id']; ?>"></i>
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

                              <i class="bi bi-eye" style="border-radius: 50px;padding: 5px;cursor:pointer; font-size: large;" id="viewSubChecklistFiles" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                              <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="viewSubChecklistFiles" style="width:max-content;">
                                <!-- Dropdown menu content -->
                                <ul style="list-style-type: none;padding-left: 0px !important;">
                                  <?php
                                  $fetchMainCheckFile = $connect->query("SELECT * FROM personalsubchecklist_files WHERE subCheckId = '$subCheckId'");
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
                                        <li class="nav-item m-1" style="border: 1px solid #71869d4d;background: aliceblue;"><a style="font-weight: bold;" class="driveLinkPer nav-link" value="<?php echo $fetchFileData['filename'] ?>"><?php echo $fetchFileData['lastName']; ?></a></li>
                                  <?php
                                      }
                                    }
                                  }
                                  ?>

                              </div>

                            </div>
                          </div>
                      <?php
                        }
                      }

                      ?>
                      <div id="add-todo" class="addToDo" data-mainid="<?php echo $item_ided; ?>">
                        <i class="bi bi-plus-lg"></i>
                        Add an SubChecklist
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          <?php }
        }
        $item_sel_em = "SELECT * FROM per_checklist 
  WHERE user_id='$user_id' 
  AND mainCheckId IS NOT NULL
  AND MONTH(date) = MONTH(CURDATE())
  AND YEAR(date) = YEAR(CURDATE())
  AND date >= CURDATE()
  ORDER BY date ASC";
        $item_selst_em = $connect->prepare($item_sel_em);
        $item_selst_em->execute();

        if ($item_selst_em->rowCount() > 0) {
          $students_em = $item_selst_em->fetchAll();
          foreach ($students_em as $key => $row) {
            if ($row['color'] == "") {
              $bgColor = "grey";
            } else {
              $bgColor = $row['color'];
            }
            $item_ided = $row['id'];
            $mainCheckId = $row['mainCheckId'];
            $priority = $row['priority'];
            $priorityClasses = array(
              'low' => '#00c9a7', // Use Bootstrap warning class
              'medium' => '#377dff', // Use Bootstrap success class
              'high' => '#ed4c78' // Use Bootstrap info class
            );
            $priorityClasses = isset($priorityClasses[$priority]) ? $priorityClasses[$priority] : '';
            $date = $row['date'];

            // Convert the date to a Unix timestamp
            $timestamp = strtotime($date);

            // Format the date to include the day
            $formattedDate = date('l, d-M-y', $timestamp);

            $allCheckList = $connect->query("SELECT count(*) FROM per_subchecklist WHERE main_checklist_id = '$item_ided' OR main_checklist_id = '$mainCheckId'");
            $allCheckListData = $allCheckList->fetchColumn();

            $countSubCheckList = $connect->query("SELECT count(*) FROM per_check_sub_checklist WHERE checkListId = '$item_ided' OR checkListId = '$mainCheckId' AND userId = '$user_id'");
            // print_r($countSubCheckList);
            $checkSubListData = $countSubCheckList->fetchColumn();

            $countCheckFile = $connect->query("SELECT count(*) FROM subchecklistfiles WHERE checkId = '$item_ided'");
            $countCheckFileData = $countCheckFile->fetchColumn();

          ?>

            <div class="container py-1" id="rowAddmain">
              <div class="row" style="width:100%;">
                <div class="card card-hover-shadow" style="border: 2px solid <?php echo (date('Y-m-d', strtotime($row['date'])) === date('Y-m-d')) ? "grey" : "transparent"; ?>;
    <?php echo (date('Y-m-d', strtotime($row['date'])) === date('Y-m-d')) ? "animation: blinkBorder 1s infinite;" : ""; ?>
    width: inherit; border: 0.001rem solid #dddddd;">
                  <div class=" card-body">
                  <div class="row accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#todo-list<?php echo $row['id']; ?>" aria-expanded="false" aria-controls="todo-list<?php echo $row['id']; ?>" style="margin-left: -33px;width: -webkit-fill-available;background-color: #1e202200 !important;    margin-top: -20px;">
                    <div class="col-4" style="float: left;display: flex;">
                      <?php if ($checkSubListData != $allCheckListData || $allCheckListData == 0) { ?>
                        <img src="<?php echo BASE_URL; ?>assets/svg/icons/corss1.png" style="height: 25px; margin:auto; margin-right:10px;">
                      <?php } else {
                      ?>
                        <img src="<?php echo BASE_URL; ?>assets/svg/icons/check1.png" style="height: 25px; margin:auto; margin-right:10px;">
                      <?php
                      } ?>
                      <span class="line" style="background-color:<?php echo $priorityClasses; ?>;margin:auto; margin-right:10px;height: 20px;width: 20px;box-shadow: 0px 1px 3px 0px #677788;border-radius: 3px;"></span>

                      <h1 class="card-subtitle perChekMain" style="width: 140px;background-color:<?php echo $bgColor; ?>;text-align: center;border-radius: 20px;" data-id="<?php echo $row['id']; ?>" onclick="toggleElement(this)">
                        <?php echo substr($row['title'], 0, 12) ?>
                      </h1>

                    </div>
                    <div class="col-8 aayu">
                      <div style="position: absolute;right: 0px;top: 0px;">
                        <span style="margin: 10px;font-size: 15px;font-weight: 100;margin-right: 0px;margin-left: 30px;" class="badge text-dark"><?php echo $formattedDate; ?></span>
                      </div><br>
                    <div style="display:flex;justify-content: end;">
                      <a style="margin-top: 5px;" class="btn btn-xs deletePerCheck" data-deleteid="<?php echo $row['id']; ?>" data-bs-toggle="tooltip" title="Delete"><i class="bi bi-trash-fill text-dark" style="font-size: large;"></i></a>
                      <div class="color-dropdown-todo" id="color-dropdown-todo">
                        <i class="bi bi-palette text-dark colorIcon<?php echo $row['id']; ?>" onclick="toggleColorDropdownMenutodo(event)" data-mainid="<?php echo $row['id']; ?>" title="Font Background Color" id="btnBack-todo" style="border-radius: 50px;padding: 5px;cursor:pointer; font-size: large;margin-top: 5px;"></i>
                        <div class="color-dropdown-content-todo bg-light m-1 colorDropdown<?php echo $row['id']; ?>" id="color-dropdown-content-todo">
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

                                <input type="color" class="perColor<?php echo $row['id']; ?>" name="favcolor" required>
                                <label style="width: fit-content;margin-right: -40px;margin: 0px;font-size: medium;"><i class="bi bi-palette m-1"></i>Color Picker</label>



                              </div>
                              <div class="col-12" style="justify-content: center;display: flex;">
                                <input type="button" value="Add Color" class="addColorBtn btn btn-success" style="margin: 5px;" data-mainid="<?php echo $row['id']; ?>" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <i class="bi bi-plus-circle-fill text-dark add_input_subchecklist" style="padding: 7px;font-size: large;margin-top: 5px;" type="button" title="Add Description" id="descriptionadd" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i><br>
                      <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="descriptionadd">

                        <center>
                          <div class="row">
                            <div class="col-md-6 mb-2">
                              <div class="form-outline">
                                <input class="form-control form-control-md description<?php echo $row['id']; ?>" type="text" name="description" required placeholder="Description" />

                              </div>
                            </div>

                            <div class="col-md-6 mb-2">
                              <div class="form-outline">
                                <input class="form-control form-control-md date<?php echo $row['id']; ?>" type="date" name="date" required placeholder="Date" />

                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 mb-2">

                              <div class="form-outline">
                                <input class="form-control form-control-md status<?php echo $row['id']; ?>" type="text" name="status" required placeholder="Status" />

                              </div>

                            </div>


                            <div class="col-md-6 mb-2">

                              <div class="form-outline">
                                <select id="coursemanager" name="priority" class="form-control form-control-md priority<?php echo $row['id']; ?>" required>
                                  <option selected disabled value="">-Priority-</option>

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
                                <input class="form-control category<?php echo $row['id']; ?>" type="text" name="category" value="" placeholder="Category" /><br>
                              </div>

                            </div>

                            <div class="col-md-6 mb-2">

                              <div class="form-outline">
                                <textarea class="form-control comment<?php echo $row['id']; ?>" name="comment" placeholder="Comments"></textarea>
                              </div>

                            </div>
                          </div>
                          <button type="button" class="btn btn-success addPerDesc" data-id="<?php echo $row['id']; ?>">Submit</button>

                        </center>
                      </div>

                      <i class="bi bi-paperclip text-dark getCheckFileId" style="padding: 7px;font-size: large;margin-top: 5px;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#AttachamentModalChecklist" data-id="<?php echo $row['id']; ?>"></i>

                      <i class="bi bi-three-dots-vertical text-dark" style="border-radius: 50px;padding: 5px;cursor:pointer; font-size: large;margin-top: 5px;" id="selectLanguageDropdowncheck" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                      <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdowncheck">
                        <!-- Dropdown menu content -->
                        <label class="text-dark" style="font-weight:bold;">Checklist Name : <span style="font-size:larger; color:grey;"><?php echo $row['title']; ?></span></label><br>
                        <label class="text-dark" style="font-weight:bold;">Description : <span style="font-size:larger; color:grey;"><?php echo $row['description']; ?></span></label><br>
                        <label class="text-dark" style="font-weight:bold;">Status : <span style="font-size:larger; color:grey;"><?php echo $row['status']; ?></span></label><br>
                        <label class="text-dark" style="font-weight:bold;">Priority : <span style="font-size:larger; color:grey;"><?php echo $row['priority']; ?></span></label><br>
                        <label class="text-dark" style="font-weight:bold;">Category : <span style="font-size:larger; color:grey;"><?php echo $row['category']; ?></span></label><br>
                        <label class="text-dark" style="font-weight:bold;">Comment : <span style="font-size:larger; color:grey;"><?php echo $row['comment']; ?></span></label><br>
                        <label class="text-dark" style="font-weight:bold;">Date : <span style="font-size:larger; color:grey;"><?php echo $row['date']; ?></span></label><br>

                      </div>

                      <i class="bi bi-eye text-dark ayushi" style="border-radius: 50px;padding: 5px;cursor:pointer; font-size: large;margin-top: 5px;" id="viewChecklistFiles" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                      <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="viewChecklistFiles">
                        <!-- Dropdown menu content -->
                        
                        <ul style="list-style-type: none;padding-left: 0px !important;">
                          <?php
                          $fetchMainCheckFile = $connect->query("SELECT * FROM personalchecklist_files WHERE mainCheckId = '$item_ided' OR mainCheckId = '$mainCheckId'");
                          while ($fetchMainCheckFileData = $fetchMainCheckFile->fetch()) {
                            $fId = $fetchMainCheckFileData['fileId'];
                            $fetchFileQ = $connect->query("SELECT * FROM user_files WHERE id = '$fId'");
                            while ($fetchFileData = $fetchFileQ->fetch()) {
                              if ($fetchFileData['lastName'] == "") {
                          ?>

                                <li class="nav-item m-1" style="border: 1px solid #71869d4d;"><a style="font-weight: bold;" class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fetchFileData['filename'] ?>" target="_blank"><?php echo $fetchFileData['filename']; ?></a></li>
                              <?php
                              }
                              if ($fetchFileData['type'] == "online") {
                              ?>
                                <li class="nav-item m-1" style="border: 1px solid #71869d4d;"a style="font-weight: bold;" class="nav-link" href="http://<?php echo $fetchFileData['filename'] ?>" target="_blank"><?php echo $fetchFileData['lastName']; ?></a></li>
                              <?php
                              }
                              if ($fetchFileData['type'] == "offline") {
                              ?>
                                <li class="nav-item m-1" style="border: 1px solid #71869d4d;"><a style="font-weight: bold;" class="driveLinkPer nav-link" value="<?php echo $fetchFileData['filename'] ?>"><?php echo $fetchFileData['lastName']; ?></a></li>

                          <?php
                              }
                            }
                          }
                          ?>
                        </ul>
                      </div>

                      <!-- <i class="bi bi-share getCheckId" data-id="<?php echo $row['id']; ?>" style="padding: 5px;font-size: large;margin-top: 5px;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#shareChecklistModal"></i> -->
                    </div>
                  </div>
                  </div>
                  <hr class="text-success" style="margin: 12px;">
                  <div id="todo-list<?php echo $row['id']; ?>" class="row accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <span class="editing todo-wrap1">
                      <label for="' + newId + '" class="todo1">
                        <input type="checkbox" id="' + newId + '" style="height: 25px;width: 25px;border-radius: 15px;margin:5px;margin-top:20px;" />
                        <input style="height: 25px;width: max-content;margin:5px;" type="text" class="input-todo1" class="subPer' + mId + '" id="input-todo1' + newId + '" />
                      </label>
                    </span>
                    <?php
                    $select_checklist = "SELECT * FROM per_subchecklist where main_checklist_id='$item_ided' OR main_checklist_id = '$mainCheckId'";
                    $select_checklist_st = $connect->prepare($select_checklist);
                    $select_checklist_st->execute();

                    if ($select_checklist_st->rowCount() > 0) {
                      $select_checklist_re = $select_checklist_st->fetchAll();
                      foreach ($select_checklist_re as $rowselect) {
                        $subCheckId = $rowselect['id'];
                        $checkSubData = 0;
                        $checkSubCheckList = $connect->query("SELECT count(*) FROM per_check_sub_checklist WHERE checkListId = '$item_ided' AND subCheckListId = '$subCheckId' AND userId = '$user_id'");
                        $checkSubData = $checkSubCheckList->fetchColumn();
                        if ($checkSubData > 0) {
                          $checkData = "checked";
                        } else {
                          $checkData = "";
                        }
                    ?>
                        <div class="todo-wrap">
                          <!-- <input type="checkbox" id="1"/> -->
                          <div style="float:left;">
                            <label class="todo">
                              <input style="height: 25px;width: 25px;border-radius: 15px;margin: 5px;border: 1px solid #97a4af;" type="checkbox" class="form-check-input is-valid allcheckList_per" name="check" id="<?php echo $rowselect['id']; ?>" data-checklist="<?php echo $item_ided; ?>" value="<?php echo $rowselect['id']; ?>" <?php echo $checkData; ?>>
                              <span data-id="<?php echo $rowselect['id']; ?>" class="perSubChekMain" onclick="toggleElementPer(this)" style="font-size: large;cursor: pointer;">
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

                              </span>
                            </label>
                          </div>
                          <div style="display: flex;position: absolute; right:20px; margin:5px;">
                            <i class="bi bi-paperclip getSubFileId" style="padding: 7px;font-size: large;margin-top: 5px;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#AttachamentModalSubChecklist" data-id="<?php echo $rowselect['id']; ?>"></i>
                            <a class="btn btn-xs deletePerSubCheck" data-deleteid="<?php echo $rowselect['id']; ?>" data-bs-toggle="tooltip" title="Delete" style="margin: auto;"><i class="bi bi-x-circle"></i></a>
                            <i class="bi bi-plus-circle-fill add_input_subchecklist" style="padding: 5px;margin: inherit;" type="button" title="Add Description" id="descriptionaddsub" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i><br>
                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="descriptionaddsub" style="width: max-content;">

                              <center>
                                <!-- <div class="col-12 mb-2">
                                 <div class="form-outline">
                                  <label class="form-label text-dark" for="item_name" style="font-weight:bold;">CheckList Item Name<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                                  <input class="form-control form-control-md" type="text" name="checklist_name" required/>

                                </div>

                              </div> -->
                                <div class="row">
                                  <div class="col-md-6 mb-2">
                                    <div class="form-outline">
                                      <input class="form-control form-control-md descriptionSub<?php echo $subCheckId; ?>" type="text" name="description" required placeholder="Description" />

                                    </div>
                                  </div>

                                  <div class="col-md-6 mb-2">
                                    <div class="form-outline">
                                      <input class="form-control form-control-md dateSub<?php echo $subCheckId; ?>" type="date" name="date" required placeholder="Date" />

                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 mb-2">

                                    <div class="form-outline">
                                      <input class="form-control form-control-md statusSub<?php echo $subCheckId; ?>" type="text" name="status" required placeholder="Status" />

                                    </div>

                                  </div>


                                  <div class="col-md-6 mb-2">

                                    <div class="form-outline">
                                      <select id="coursemanager" name="priority" class="form-control form-control-md prioritySub<?php echo $subCheckId; ?>" required placeholder="Priority">
                                        <option selected disabled value="">-Priority-</option>

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
                                      <input class="form-control categorySub<?php echo $subCheckId; ?>" type="text" name="category" value="" placeholder="Category" /><br>
                                    </div>

                                  </div>

                                  <div class="col-md-6 mb-2">

                                    <div class="form-outline">
                                      <textarea class="form-control commentSub<?php echo $subCheckId; ?>" name="comment" placeholder="Comment"></textarea>
                                    </div>

                                  </div>
                                </div>
                                <button type="button" class="btn btn-success addSubDesc" data-id="<?php echo $subCheckId; ?>">Submit</button>
                              </center>
                            </div>
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
                            <i class="bi bi-eye varun" style="border-radius: 50px;padding: 5px;cursor:pointer; font-size: large;" id="viewSubChecklistFiles" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="viewSubChecklistFiles" style="width:max-content;">
                              <!-- Dropdown menu content -->
                              <ul style="list-style-type: none;padding-left: 0px !important;">
                                <?php
                                $fetchMainCheckFile = $connect->query("SELECT * FROM personalsubchecklist_files WHERE subCheckId = '$subCheckId'");
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
                                      <li class="nav-item m-1" style="border: 1px solid #71869d4d;background: aliceblue;"><a style="font-weight: bold;" class="driveLinkPer nav-link" value="<?php echo $fetchFileData['filename'] ?>"><?php echo $fetchFileData['lastName']; ?></a></li>
                                <?php
                                    }
                                  }
                                }
                                ?>

                            </div>
                          </div>
                        </div>
                    <?php
                      }
                    }

                    ?>
                    <?php
                    if ($row['perType'] == "readAndWrite") {
                    ?>
                      <div id="add-todo" class="addToDo" data-mainid="<?php echo $item_ided; ?>">
                        <i class="bi bi-plus-lg"></i>
                        Add an SubChecklist
                      </div>
                    
                  </div>

                </div>
              </div>
            </div>
    </div>

<?php 
}
}
        }
      }
?>
  </div>
</div>
</div>

<?php include ROOT_PATH . 'includes/Pages/per_checklist/todoCalendar.php'; ?>


<!-- edit checklist modal -->
<div class="modal fade" id="editchecklistper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background: #71869d8c;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit checklist</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="edit_checklist_per.php">
          <input class="form-control" type="hidden" name="id" value="" id="ch_id">
          <div class="row" id="get_course_foem_per">

          </div>


          <input class="btn btn-success" type="submit" value="Submit" name="checksubmit" style="float:right; font-weight:bold; font-size:large;" />

      </div>
      </form>

    </div>
  </div>
</div>
</div>

<div class="modal fade" id="subchecklistmange" tabindex="-1" role="dialog" aria-labelledby="checkname" aria-hidden="true" style="background: #71869d8c;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-success" id="checkname"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered">
          <thead class="bg-dark">
            <th class="text-white">Sr No</th>
            <th class="text-white">Name</th>
            <th class="text-white">Files</th>
            <th class="text-white">Action</th>
          </thead>
          <tbody id="subCheckListId">
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pageModal" tabindex="-1" role="dialog" aria-labelledby="checkname" aria-hidden="true" style="background: #71869d8c;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-success" id="checkname"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="pageDatas">

      </div>
    </div>
  </div>
</div>



<!-- add sub checklist modal -->
<div class="modal fade" id="per_subchecklist" tabindex="-1" role="dialog" aria-labelledby="checklistmain_name" aria-hidden="true" style="background: #71869d8c;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="checklistmain_name"></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form method="post" action="insert_subchecklist_per.php">
            <input class="form-control" type="hidden" name="id" value="" id="sp_id">
            <div class="input-field">
              <table class="table table-bordered" id="subchecklist_table_per">
                <tr>

                  <td style="border: 1px solid white;"><input type="text" name="subchecklist[]" class="form-control" placeholder="Enter Checklist" required></td>
                  <td style="border: 1px solid white;"><button type="button" name="add_goal_actual" id="add_subchecklist" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
              <hr>
              <button style="margin:10px; float: right; font-size:large; font-weight:bold;" class="btn btn-success" type="submit" name="submit_subchecklist">Save</button>
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="subchecklistEdit" tabindex="-1" role="dialog" aria-labelledby="checklistmainname" aria-hidden="true" style="background: #71869d8c;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="checklistmainname1"></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php">
            <input type="hidden" name="subCheckVal" id="subCheckVal" />
            <input class="form form-control" type="text" name="subCheckListInput" id="subCheckListInput" placeholder="Enter Sub checklist" />
            <input type="submit" value="Edit" name="editSub" class="btn btn-success" />
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- add color modal modal -->
<div class="modal fade" id="color_checklist_per" tabindex="-1" role="dialog" aria-labelledby="ccc_name" aria-hidden="true" style="background: #71869d8c;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="ccc_name"></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form action="<?php echo BASE_URL; ?>includes/Pages/insert_color.php">
            <input class="form-control" type="hidden" name="id" value="" id="ccc_id">
            <label for="color" style="font-size:large; font-weight:bold;">Select a color for Checklist:</label><br>
            <input type="color" id="color" name="favcolor" required><br>
            <hr>
            <input type="submit" class="btn btn-success" style="float:right;" name="checklist_color_per">
          </form>

        </center>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div id="shareChecklistModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="background-color: #71869d8f;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Share Checklist</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        $q_alert_roles = "SELECT * FROM `roles`";
        $alert_data_roles = $connect->prepare($q_alert_roles);
        $alert_data_roles->execute();
        $alert_data_roles = $alert_data_roles->fetchAll();

        ?>
        <center>
          <form action="<?php echo BASE_URL; ?>includes/Pages/shareChecklist.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="mainCheckId" id="mainCheckId" />
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionRole">
                    <option disabled selected>Select Group</option>
                    <?php
                    foreach ($alert_data_roles as $alrole) {
                      if ($alrole['roles'] == 'super admin') {
                        continue;
                      } else {
                        echo "<option value='" . $alrole['roles'] . "'>" . $alrole['roles'] . "</option>";
                      }
                    }
                    echo "<option selected value='everyone'>Everyone</option>";
                    ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                    <option disabled>Select Type</option>
                    <option selected value="readOnly">Read Only</option>
                    <option value="readAndWrite">Read And Write</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="getusernamealert" id="getuserforshare" aria-describedby="helpId" placeholder="send individual">
                </div>
              </div>
            </div>
            <br>

            <!-- <input type="hidden" value="" name="permissionPageID" id="permissionPageID" /> -->
            <div class="container">
              <div class="row">
                <div class="col-12" style="justify-content: center;display: grid;">
                  <table class="table table-bordered sharetableData" style="display:none;">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white">#</th>
                        <th class="text-white">Profile Image</th>
                        <th class="text-white">Name</th>
                        <th class="text-white">NickName</th>

                      </tr>
                    </thead>
                    <tbody class="alertuserDetail">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <hr>
            <div style="float: inline-end;">
              <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
              <input class="btn btn-success" type="submit" value="Share" name="shareCheck" />
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->


<!-- Modal -->
<div id="AttachamentModalChecklist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="background-color: #71869d8f;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Add File</h3>
        <button style="margin-left:5px;position: absolute;right: 65px;" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#selectfilesChecklist">Select</button>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="fileOptChecklist">
          <option selected>Select File Method</option>
          <!-- <option value="addNewPage">New Page</option> -->
          <option value="addFile">Attachment</option>
          <option value="addFileLoca">Drive Link</option>
          <option value="addFileLink">Link</option>
        </select>
        <br>
        <center>
          <form method="post" enctype="multipart/form-data" class="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>includes/Pages/addCheckFiles.php">
            <div class="input-field">
              <table class="table table-bordered">
                <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
                <tr>
                  <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Files</label>
                    <input type="file" class="form-control" name="file" id="" />
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
          <form class="insert-phases phase_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addCheckFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
            <div class="input-field">
              <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
              <table class="table table-bordered" id="table-field">
                <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
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
          <form class="insert-phases filelink" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addCheckFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
            <div class="input-field">
              <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
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
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- End Modal -->


<div class="modal fade" id="selectfilesChecklist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #71869d8f;">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Select Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <input type="text" class="mainCheckFileId" name="mainCheckFileId" id="mainCheckFileId" />
        <table class="table table-bordered" id="files1">
          <input style="margin:5px;" class="form-control" type="text" id="file_search" onkeyup="file_by_file()" placeholder="Search for Files.." title="Type in a name">
          <thead class="bg-dark">
            <th class="text-light"><input type="checkbox" id="select-all"></th>
            <!-- <th class="text-light">File Names</th> -->
            <th class="text-light"> UPLOADED FILES</th>
            <th class="text-light">View</th>

          </thead>
          <?php

          $query11_fm10 = "SELECT * FROM user_files";
          $statement11_fm10 = $connect->prepare($query11_fm10);
          $statement11_fm10->execute();
          if ($statement11_fm10->rowCount() > 0) {
            $result11_fm10 = $statement11_fm10->fetchAll();

            foreach ($result11_fm10 as $row110) {
              $filesname = "";
              $f = $row110['id'];
              $countQ = $connect->query("SELECT count(*) FROM personalchecklist_files WHERE fileId = '$f'");
              if ($countQ->fetchColumn() <= 0) {

                if ($row110['type'] == "online" || $row110['type'] == "offline") {
                  $filesname = $row110['lastName'];
                } else {
                  $filesname = $row110['filename'];
                }

          ?>
                <tr>
                  <td><input class="mainCheckListFile" type="checkbox" name="fileId[]" value="<?php echo $row110['id'] ?>" /></td>
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
          }
          ?>

        </table>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
          <input style="float:right;" type="submit" class="btn btn-success addCheckListFile" value="Add" name="addSelectFile" />
        </div>
      </div>
    </div>
  </div>
</div>

<div id="AttachamentModalSubChecklist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="background-color: #71869d8f;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Add File</h3>
        <button style="margin-left:5px;position: absolute;right: 65px;" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#selectfilesSubChecklist">Select</button>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="fileOptChecklist">
          <option selected>Select File Method</option>
          <!-- <option value="addNewPage">New Page</option> -->
          <option value="addFile">Attachment</option>
          <option value="addFileLoca">Drive Link</option>
          <option value="addFileLink">Link</option>
        </select>
        <br>
        <center>
          <form method="post" enctype="multipart/form-data" class="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>includes/Pages/addSubCheckFiles.php">
            <div class="input-field">
              <table class="table table-bordered">
                <input type="hidden" name="subCheckFileId" class="subCheckFileId" />
                <tr>
                  <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                    <input type="file" class="form-control" name="file" id="" />
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
          <form class="insert-phases phase_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addSubCheckFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
            <div class="input-field">
              <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
              <table class="table table-bordered" id="table-field">
                <input type="hidden" name="subCheckFileId" class="subCheckFileId" />
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
          <form class="insert-phases filelink" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addSubCheckFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
            <div class="input-field">
              <input type="hidden" name="subCheckFileId" class="subCheckFileId" />
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
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- End Modal -->


<div class="modal fade" id="selectfilesSubChecklist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #71869d8f;">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Select Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/addSubCheckFiles.php" enctype="multipart/form-data">
          <input type="text" class="subCheckFileId" name="subCheckFileId" id="subCheckFileId">
          <table class="table table-bordered" id="files1">
            <input style="margin:5px;" class="form-control" type="text" id="file_search" onkeyup="file_by_file()" placeholder="Search for Files.." title="Type in a name">
            <thead class="bg-dark">
              <th class="text-light"><input type="checkbox" id="select-all"></th>
              <!-- <th class="text-light">File Names</th> -->
              <th class="text-light"> UPLOADED FILES</th>
              <th class="text-light">View</th>

            </thead>
            <?php

            $query11_fm10 = "SELECT * FROM user_files";
            $statement11_fm10 = $connect->prepare($query11_fm10);
            $statement11_fm10->execute();
            if ($statement11_fm10->rowCount() > 0) {
              $result11_fm10 = $statement11_fm10->fetchAll();

              foreach ($result11_fm10 as $row110) {
                $f = $row110['id'];
                $countQ = $connect->query("SELECT count(*) FROM personalsubchecklist_files WHERE fileId = '$f'");
                if ($countQ->fetchColumn() <= 0) {
                  $filesname = "";
                  if ($row110['type'] == "online" || $row110['type'] == "offline") {
                    $filesname = $row110['lastName'];
                  } else {
                    $filesname = $row110['filename'];
                  }

            ?>
                  <tr>
                    <td><input class="subCheckListFiles" type="checkbox" name="fileId[]" value="<?php echo $row110['id'] ?>" /></td>
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
            }
            ?>

          </table>
          <!-- <hr> -->

          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
            <input style="float:right;" type="submit" class="btn btn-success" value="Add" name="addSelectFile" id="addSubCheckListFiles" />
          </div>
          <!-- <input style="float:right;" type="submit" class="btn btn-success" value="Add" name="addFile" /> -->
        </form>
        <!-- </div> -->
      </div>
    </div>
  </div>
</div>


<div id="modal-every" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="background-color: #80808047;z-index: 1011111111 !important;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Set Recurrance</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-6">
              <label class="form-label">Start Date :</label>
              <input type="date" name="start" class="form-control">
            </div>
            <div class="col-6">
              <label class="form-label">End Date :</label>
              <input type="date" name="end" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-6">

              <label class="form-label">Repeat Every</label>

              <input type="number" name="number" class="form-control" value="1">
            </div>
            <div class="col-6">
              <label class="form-label"></label>
              <select class="form-select" style="margin-top: 10px;">
                <option>Daily</option>
                <option>Weekly</option>
                <option>Monthly</option>
                <option>Yearly</option>
              </select>

            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->




<script>
  $(document).ready(function() {
    $('#repeat-options').change(function() {
      var selectedValue = $(this).val();
      // Hide all modals
      $('.modal').modal('hide');
      // Show the modal corresponding to the selected value
      $('#modal-' + selectedValue).modal('show');
    });
  });
</script>

<script type="text/javascript">
  $(document).on('keyup', '#getuserforshare', function(e) {
    var name = $(this).val();
    var newurl = '<?php echo BASE_URL; ?>includes/getuserforalert.php';
    $.ajax({
      type: "get",
      url: newurl,
      data: {
        'name': name
      },
      success: function(response) {
        $('.alertuserDetail').html(response);
        $('.sharetableData').css('display', 'block');
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var html = '<tr>\
                  <td style="border: 1px solid white;"><input type="text" name="subchecklist[]" class="form-control" placeholder="Enter Checklist" required></td>\
                  <td style="border: 1px solid white;"><i class="bi bi-dash-circle-fill btn" type="button" name="remove_subchecklist" id="remove_subchecklist"></i></td>\
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
    var mainId = $(this).data("mid")
    var button_class = '#form_button' + form_key;
    var button = $(button_class);
    button.css('display', 'block');
    var classname = '.form_inputs' + form_key; // Include a dot before the class name
    var html = `<div class="d-flex form-group col-md-4 mt-1">
                  <input type="text" class="perSubCheck subCheck` + mainId + `" id="" placeholder="" style="height:30px;border-radius:5px;border:1px solid black;width: -webkit-fill-available;">
                  <i class="bi bi-dash-circle-fill col-1 btn" type="button" id="remove_input"></i>
              </div>`;
    $(classname).append(html);
  });
  $(document).on('click', '#remove_input', function() {
    $(this).parent('div').remove();
  });
</script>

<!-- <script>
  // Get the checklist content div by ID
  const checklistContent = document.getElementById('checklist-content');

  // Get the h1 tag within the checklist content
  const h1Tag = checklistContent.querySelector('h1');
  let dataId;

  // Add a click event listener to the h1 tag
  h1Tag.addEventListener('click', () => {
    // Replace the h1 content with an input field for editing
    h1Tag.innerHTML = `<input type="text" id="editChecklistInput" class="perChekMain" value="${h1Tag.innerText}">`;
    dataId = h1Tag.getAttribute("data-id");

    // Focus on the input field for editing
    const editInput = document.getElementById('editChecklistInput');
    editInput.focus();

    // Add an event listener to the input field to save changes on blur
    editInput.addEventListener('blur', () => {
      // Get the edited value
      const editedValue = editInput.value;
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/editPerCheckAjax.php',
        data: {
          editedValue: editedValue,
          dataId: dataId
        },
        success: function(response) {
          // alert(response);
          fetchCheckData();
        }
      });

      // Update the h1 tag with the edited value
      h1Tag.innerText = editedValue;

      // You can also send the edited value to your server for updating the database
    });
  });
</script> -->

<script>
  function toggleElement(element) {
    // Check if the element is currently an h1 or an input
    if (element.tagName === "H1") {
      // Get the current text content
      const currentText = element.textContent.trim();

      // Create an input element
      const inputElement = document.createElement("input");
      inputElement.value = currentText;

      // Replace the h1 element with the input element
      element.replaceWith(inputElement);

      // Focus on the input element
      inputElement.focus();
      let dataId;
      let h1Name;

      // Add an event listener to handle the input blur
      inputElement.addEventListener("blur", function() {
        // Replace the input element with a new h1 element
        const newH1 = document.createElement("h1");
        newH1.textContent = inputElement.value;
        newH1.setAttribute("data-id", element.getAttribute("data-id"));
        h1Name = inputElement.value;
        dataId = element.getAttribute("data-id");
        $.ajax({
          type: 'POST',
          url: '<?php echo BASE_URL; ?>includes/Pages/editPerCheckAjax.php',
          data: {
            editedValue: h1Name,
            dataId: dataId
          },
          success: function(response) {
            // alert(response);
            fetchCheckData();
          }
        });
        newH1.className = element.className;
        inputElement.replaceWith(newH1);

        // Remove the event listener from the new h1 element
        newH1.addEventListener("click", function() {
          toggleElement(this);
        });
      });
    }
  }
</script>

<script>
  function toggleElementPer(element) {
    // Check if the element is currently an h1 or an input
    if (element.tagName === "H5") {
      // Get the current text content
      const currentText = element.textContent.trim();

      // Create an input element
      const inputElement = document.createElement("input");
      inputElement.value = currentText;

      // Replace the h1 element with the input element
      element.replaceWith(inputElement);

      // Focus on the input element
      inputElement.focus();
      let dataId;
      let h5Name;


      // Add an event listener to handle the input blur
      inputElement.addEventListener("blur", function() {
        // Replace the input element with a new h1 element
        const newH1 = document.createElement("h5");
        newH1.textContent = inputElement.value;
        newH1.setAttribute("data-id", element.getAttribute("data-id"));
        h5Name = inputElement.value;
        dataId = element.getAttribute("data-id");
        $.ajax({
          type: 'POST',
          url: '<?php echo BASE_URL; ?>includes/Pages/editPerSubCheckAjax.php',
          data: {
            editedValue: h5Name,
            dataId: dataId
          },
          success: function(response) {
            // alert(response);
            fetchCheckData();
          }
        });
        newH5.className = element.className;
        inputElement.replaceWith(newH5);

        // Remove the event listener from the new h1 element
        newH5.addEventListener("click", function() {
          toggleElementPer(this);
        });
      });
    }
  }
</script>

<script>
  $(".form_button").on("click", function() {
    const mainCheckId = $(this).data("mainid");
    var inputValues = [];
    $('.subCheck' + mainCheckId).each(function() {
      inputValues.push($(this).val());
    });
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/editPerCheckAjax.php',
      data: {
        mainCheckId: mainCheckId,
        inputValues: inputValues
      },
      success: function(response) {
        // alert(response);
        fetchCheckData();
      }
    });
  })


  $(".allcheckList_per").change(function() {
    const mainCheck = $(this).data("checklist");
    const subCheck = $(this).attr("id");
    if ($(this).is(":checked")) {
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/editPerCheckAjax.php',
        data: {
          mainCheck: mainCheck,
          subCheck: subCheck
        },
        success: function(response) {
          // alert(response);
          fetchCheckData();
        }
      });
    } else {
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/editPerCheckAjax.php',
        data: {
          mainCheck1: mainCheck,
          subCheck1: subCheck
        },
        success: function(response) {
          // alert(response);
          fetchCheckData();
        }
      });
    }

  });

  $(".deletePerCheck").on("click", function() {
    const delId = $(this).data("deleteid");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/addPerDescription.php',
      data: {
        mainCheckIdDelete: delId,
      },
      success: function(response) {
        // alert(response);
        fetchCheckData();
      }
    });
  })
  $(".deletePerSubCheck").on("click", function() {

    const delId = $(this).data("deleteid");
    // alert(delId);
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/editPerSubCheckAjax.php',
      data: {
        delId: delId,
      },
      success: function(response) {
        // console.log(response);
        fetchCheckData();
      }
    });
  })
  $(".checklist_color_per").on("click", function() {
    // perColor

    const perId = $(this).data("perid");
    const perCol = $(".perColor" + perId).val();

    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/editPerCheckAjax.php',
      data: {
        perCol: perCol,
        perId: perId
      },
      success: function(response) {
        // alert(response);
        fetchCheckData();
      }
    });

  })


  $(".addPerDesc").on("click", function() {
    const perCheckId = $(this).data("id");
    const perComment = $(".comment" + perCheckId).val();
    const perCat = $(".category" + perCheckId).val();
    const perPri = $(".priority" + perCheckId).val();
    const perSta = $(".status" + perCheckId).val();
    const perDate = $(".date" + perCheckId).val();
    const perDesc = $(".description" + perCheckId).val();

    // console.log(perCheckId,perComment,perCat,perPri,perSta,perDate,perDesc);
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/addPerDescription.php',
      data: {
        perCheckId: perCheckId,
        perComment: perComment,
        perCat: perCat,
        perPri: perPri,
        perSta: perSta,
        perDate: perDate,
        perDesc: perDesc,
      },
      success: function(response) {
        // alert(response);
        fetchCheckData();
      }
    });
  })
</script>

<script>
  $(".addSubDesc").on("click", function() {
    var perSubCheckId = $(this).data("id");
    var perComment1 = $(".commentSub" + perSubCheckId).val();
    var perCat1 = $(".categorySub" + perSubCheckId).val();
    var perPri1 = $(".prioritySub" + perSubCheckId).val();
    var perSta1 = $(".statusSub" + perSubCheckId).val();
    var perDate1 = $(".dateSub" + perSubCheckId).val();
    var perDesc1 = $(".descriptionSub" + perSubCheckId).val();

    // console.log(perSubCheckId,perComment1,perCat1,perPri1,perSta1,perDate1,perDesc1);
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/addPerDescription.php',
      data: {
        perSubCheckId: perSubCheckId,
        perComment: perComment1,
        perCat: perCat1,
        perPri: perPri1,
        perSta: perSta1,
        perDate: perDate1,
        perDesc: perDesc1,
      },
      success: function(response) {
        // alert(response);
        fetchCheckData();
      }
    });
  })
</script>

<script>
  $(".perSubCheck").blur(function() {
    const mainCheckId = $(this).data("mainid");
    const subCheckVal = $(this).val();

    if (subCheckVal >= 0) {

    } else {
      // alert(subCheckVal);
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/addPerDescription.php',
        data: {
          mainCheckId: mainCheckId,
          subCheckVal: subCheckVal
        },
        success: function(response) {
          // console.log(response);
          fetchCheckData();
        }
      });
    }
  })
</script>


<script type="text/javascript">
  // add items
  $('.addToDo').click(function() {
    var mId = $(this).data("mainid");
    var lastSibling = $('#todo-list > .todo-wrap:last-of-type > input').attr('id');
    var newId = Number(lastSibling) + 1;

    $(this).before('<span class="todo-wrap">\
            <label for="' + newId + '" class="todo">\
            <input style="height: 25px;margin: 5px;border: 1px solid black;width: -webkit-fill-available;" type="text" class="input-todo" class="subPer' + mId + '" id="input-todo' + newId + '"/>\
            </label></span>');
    $('#input-todo' + newId + '').parent().parent().animate({
      height: "36px"
    }, 200)
    $('#input-todo' + newId + '').focus();

    $('#input-todo' + newId + '').enterKey(function() {
      $(this).trigger('enterEvent');
    })

    $('#input-todo' + newId + '').on('blur enterEvent', function() {
      // var tValue = $(".subPer" + mId).val();
      // alert(tValue);
      var todoTitle = $('#input-todo' + newId + '').val();
      var todoTitleLength = todoTitle.length;
      if (todoTitleLength > 0) {

        $.ajax({
          type: 'POST',
          url: '<?php echo BASE_URL; ?>includes/Pages/addPerDescription.php',
          data: {
            mainCheckId: mId,
            subCheckVal: todoTitle
          },
          success: function(response) {
            // console.log(response);
            fetchCheckData();
          }
        });

        $(this).before(todoTitle);
        $(this).parent().parent().removeClass('editing');
        $(this).parent().after('<span class="delete-item" title="remove"><i class="bi bi-x-circle"></i></span>');
        $(this).remove();
        $('.delete-item').click(function() {
          var parentItem = $(this).parent();
          parentItem.animate({
            left: "-30%",
            height: 0,
            opacity: 0
          }, 200);
          setTimeout(function() {
            $(parentItem).remove();
          }, 1000);
        });
      } else {
        $('.editing').animate({
          height: '0px'
        }, 200);
        setTimeout(function() {
          $('.editing').remove()
        }, 400)
      }
    })

  });

  // remove items 

  $('.delete-item').click(function() {
    var mId = $(this).data("mainid");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/addPerDescription.php',
      data: {
        mainCheckIdDelete: mId,
      },
      success: function(response) {
        // console.log(response);
        fetchCheckData();
      }
    });
  });

  // Enter Key detect

  $.fn.enterKey = function(fnc) {
    return this.each(function() {
      $(this).keypress(function(ev) {
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
          fnc.call(this, ev);
        }
      })
    })
  }

  $(".getCheckId").on("click", function() {
    const mId = $(this).data("id");
    $("#mainCheckId").val(mId);
  });
  $(".getCheckFileId").on("click", function() {
    const mFId = $(this).data("id");
    $(".mainCheckFileId").val(mFId);
  });

  $(".getSubFileId").on("click", function() {
    const sFId = $(this).data("id");
    $(".subCheckFileId").val(sFId);
  });
</script>

<script type="text/javascript">
  $(document).on("change", ".fileOptChecklist", function() {

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

<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
                          <td style="text-align: center; display:flex;border: none !important;"><input type="text" placeholder="Enter checklist" name="" id="" class="form-control perChecklistValCheck" value="" required/><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>\
                          <td style="border: none !important;"><button type="button" name="remove_actual" id="remove_checklist11" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
    var max = 100;
    var a = 1;

    $("#add_checklist11").click(function() {
      // alert("hello");
      if (a <= max) {
        $("#table-field-perstatus11").append(html);
        a++;
      }
    });
    $("#table-field-perstatus11").on('click', '#remove_checklist11', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

<script>
  $(document).ready(function() {
    $("#searchInputmainchecklist").on("keyup", function() {
      var searchText = $(this).val().toLowerCase();
      $(".perChekMain").each(function() {
        var checklistTitle = $(this).text().toLowerCase();
        if (checklistTitle.includes(searchText)) {
          $(this).closest(".container").show();
        } else {
          $(this).closest(".container").hide();
        }
      });
    });
  });
</script>

<script>
  $("#saveCheckListValue").on("click", function() {
    var inputValues = [];
    var inuptDates = [];

    $('.perChecklistValCheck').each(function() {
      inputValues.push($(this).val());
    });
    $('.perCheckDate').each(function() {
      inuptDates.push($(this).val());
    });
    // alert(inuptDates);

    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/insert_checklist_per.php', // Replace with the path to your PHP script
      data: {
        values: inputValues,
        checkDates: inuptDates
      }, // Send the input values as data
      success: function(response) {
        $(".perChecklistValCheck").val("");
        // Handle the response from the PHP script
        fetchCheckData();
      }
    });
  });
</script>

<script>
  var courseDel;

  function toggleColorDropdownMenutodo(event) {
    event.stopPropagation(); // Stop the event from reaching the document level
    courseDel = event.currentTarget.getAttribute('data-mainid');
    const dropdown = document.querySelector('.colorDropdown' + courseDel);
    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
  }

  function setColorMenu(element, color) {
    // alert("hello");
    const colorMenu = document.querySelector('.perColor' + courseDel);
    colorMenu.value = color;
    console.log(color);

    // Remove 'selected' class from all color options
    document.querySelectorAll('.color-option-todo').forEach(option => option.classList.remove('selected'));

    // Add 'selected' class to the clicked color option
    const selectedOption = document.querySelector('.color-option-todo[style*="background-color: ' + color + '"]');
    if (selectedOption) {
      selectedOption.classList.add('selected');
    }

    // Set the background color of the button
    const btnBack = document.querySelector('.colorIcon' + courseDel);
    btnBack.style.backgroundColor = color;
  }

  // Add an event listener to the document to close the dropdown when clicking outside of it
  document.addEventListener('click', function(event) {
    const dropdown = document.querySelector('#color-dropdown-content-todo');
    if (dropdown.style.display === 'block' && !event.target.closest('#color-dropdown-todo')) {
      dropdown.style.display = 'none';
    }
  });
</script>

<script>
  $(".addColorBtn").on("click", function() {
    const mainId = $(this).data("mainid");
    const colorVal = $(".perColor" + mainId).val();
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/addToDoColor.php',
      data: {
        colorVal: colorVal,
        mainId: mainId
      },
      success: function(response) {
        fetchCheckData();
      }
    });
  });
</script>

<script>
  $(".addCheckListFile").on("click", function() {
    var mainCheckId = $("#mainCheckFileId").val();
    var checkboxes = document.querySelectorAll('.mainCheckListFile');
    var checkedValues = [];
    checkboxes.forEach(function(checkbox) {
      if (checkbox.checked) {
        checkedValues.push(checkbox.value);
      }
    });
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/addCheckFiles.php', // Replace with the path to your PHP script
      data: {
        checkedValues: checkedValues,
        mainCheckId: mainCheckId,
        addSelectFile: "addCheckFile"
      }, // Send the input values as data
      success: function(response) {
        // alert(response);
        fetchCheckData();
      }
    });
  })
</script>
<script>
  $("#saveEvent").on("click", function() {
    var title = $('#eventTitle').val();
    var color = $('#eventColor').val();
    var endDate = $('#eventEndDate').val();
    var description = $('#eventDesc').val();
    var status = $('#eventStatus').val();
    var priority = $('#eventPriority').val();
    var category = $('#eventCategory').val();
    var comment = $('#eventComment').val();
    var start = $('#eventStartDate').val();
    var permissionType = $("#permissionType").val();
    var permissionRole = $("#permissionRole").val();
    
    var checkboxes = document.querySelectorAll('.singleUserPer');
    var checkedValues = [];
    checkboxes.forEach(function(checkbox) {
      if (checkbox.checked) {
        checkedValues.push(checkbox.value);
      }
    });
    var eventData = {
      title: title,
      start: start,
      color: color,
      description: description,
      status: status,
      priority: priority,
      category: category,
      comment: comment,
      permissionType: permissionType,
      permissionRole: permissionRole,
      checkedValues: checkedValues,
      end: endDate,
    };
    $.ajax({
      url: '<?php echo BASE_URL; ?>includes/Pages/per_checklist/add-checklist-event.php?user_id=<?php echo $user_id ?>',
      data: eventData,
      type: "POST",
      success: function(data) {
        alert(data)
        displayMessage("Added Successfully");
        calendar.fullCalendar('renderEvent', eventData, true);
        $('#addEventModal').modal('hide');
        $('#eventTitle').val('');
        $('#eventColor').val('');
        $('#eventStartDate').val('');
        $('#eventEndDate').val('');
        $('#eventDesc').val('');
        $('#eventStatus').val('');
        $('#eventPriority').val('');
        $('#eventCategory').val('');
        $('#eventComment').val('');
        calendar.fullCalendar('unselect');
      }
    });
  });
</script>