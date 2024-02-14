<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_COOKIE['libShopId'])) {
  $libShopId = $_COOKIE['libShopId'];
}

if (isset($_COOKIE['libLibId'])) {
  $libLibId = $_COOKIE['libLibId'];
}

if (isset($_COOKIE['libLVid'])) {
  $libLVid = $_COOKIE['libLVid'];
}

// if (isset($_COOKIE["f_id"])) {
//   $_SESSION['folderId'] = $_COOKIE["f_id"];
// }
$_SESSION['page'] = 'library';

?>
<!DOCTYPE html>
<html>

<head>
  <title>Shelf</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <?php include 'lb_thumbnail.php'; ?>
  <style>
    #shop_table,
    #folder_table {

      border-collapse: separate;
      border-spacing: 0 25px 0 15px;

    }

    .dropdown1:hover .dropdown-menu {
      display: block;
      /* remove the gap so it doesn't close */
    }

    td {
      width: auto;
      text-align: center;
      border: 1px solid black;
      padding: 3px;
    }

    .shops,
    .folders {
      display: inline-block;
      text-decoration: none;
    }

    .showCon {
      display: none;
    }

    .folderName,
    .newWindow {
      display: inline-block;
      margin-left: 10px;
    }

    .folderName,
    .newWindow span {
      padding-left: 10px;
    }

    .hideCon {
      margin-top: -20px;
      margin-bottom: 20px;
    }

    .foldername,
    .newWindow {
      display: inline-block;
      width: auto;
      height: 30px;
      padding-left: 3px;
      padding-top: 1px;
      /* background-color: #d7d4dbad; */
      color: black;
      font-weight: bold;
      margin-right: 10px;
      border-radius: 5px;
    }

    .sel {
      border: 1px solid #8124ed !important;
      background-color: #8124ed61;
      color: white !important;
      font-weight: bold;
      cursor: pointer;
    }


    .folCon {
      border: 0.5px solid #80808057;
      width: 90%;
      margin-left: 10px;
      border-radius: 9px;
      padding: 10px;
    }

    .chrColor span {
      color: white !important;
      ;
    }

    .delShop a i {
      color: white !important;
    }

    #folderId<?php echo $_SESSION['folderId']; ?> {
      border: 1px solid #100f0f00 !important;
      background: #8124ed !important;
      color: #f0f0f4 !important;
    }

    #folderId<?php echo $_SESSION['folderId']; ?>a {
      color: white !important;
    }

    #folderId<?php echo $_SESSION['folderId']; ?>a img {
      filter: brightness(100%);
    }

    #foldel<?php echo $_SESSION['folderId']; ?> {
      color: white !important;
    }

    .folderName1 {
      border: 1px solid #100f0f00 !important;
      /* background: #d7d4dbad !important; */
      color: #f0f0f4 !important;
      border-radius: 5px;
    }

    #buttonform,
    #listform,
    #gridform {
      display: none;
    }

    .addfile_data {
      width: 16rem;
      background: white;
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
      position: absolute;
      z-index: 1000;
      height: 300px;
      top: 80px;
      border-radius: 10px;
    }

    .ahstyle:hover {
      color: black;
      text-decoration: none;
    }

    .ahstyle:hover {
      background-color: rgba(55, 125, 255, .1);
      color: black;
    }

    .avt-lib {
      position: relative;
      overflow: hidden;
      display: inline-block;
    }

    .avt-img {
      transition: transform 0.3s;
    }

    .avt-lib:hover {
      transform: scale(1.2);
      /* Change the scale factor as needed for the desired zoom effect */
    }
  </style>
</head>

<body>
  <?php include 'lb_loader.php'; ?>


  <div id="header-hide">
    <?php
    include '../includes/library_header1.php';
    ?>
  </div>
  <?php
  $lib_id = 1;
  if (isset($_GET['library'])) {
    $lib = "Main";
    $_SESSION['library_value'] = $lib = urldecode(base64_decode($_GET['library']));
  } else if (isset($_SESSION['library_value'])) {
    $lib = $_SESSION['library_value'];
  } else {
    $lib = "Main";
  }
  if (isset($_GET['lib_id'])) {
    $lib_id = "";
    $_SESSION['libraryid_value'] = $lib_id = urldecode(base64_decode($_GET['lib_id']));
  } else if (isset($_SESSION['libraryid_value'])) {
    $lib_id = $_SESSION['libraryid_value'];
  } else {
    if (isset($_SESSION['libraryid_value'])) {
      $lib_id = $_SESSION['libraryid_value'];
    }
  }
  ?>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <!-- Page Header -->
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">

      <div class="row justify-content-center">
        <div class="alertlibrary" style="margin-top: -30px;margin-bottom: -30px;">
          <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
        <div class="col-lg-12">

          <!-- Card -->

          <div class="card card-hover-shadow h-100 p-2">
            <!-- Body -->
            <div class="card-body" style="margin-bottom:-20px;">
              <h1 style="float:left;color:#7901c1; font-size: xx-large;">
                <?php if ($lib == 'Main' || $lib == 'Main') { ?>
                  <img style="height:25px; width:35px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/purple/Library.png">
                <?php } ?>
                <?php
                echo $lib; ?>
              </h1>

              <div class="dropdown" id="btndrop">
                <?php if ($lib == "Main") { ?>
                  <a class="navbar-dropdown-account-wrapper" style="margin-left:5px;margin-top:-10px" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                    <i style="font-size:30px;color: #677788;" class="bi bi-plus-circle-fill"></i>
                  </a>
                  <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="#accountNavbarDropdown" style="width: 16rem;z-index: 999999">
                    <a class="dropdown-item" id="buttoncontainer" value="buttoncon" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#file_button">File</a>
                    <a class="dropdown-item" type="button" id="listcontainer" value="listcon" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#menu">Menu</a>
                    <a class="dropdown-item" id="gridcontainer" value="gridcon" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#megamenu">Mega Menu</a>

                  </div>
                <?php } ?>
              </div>

              <?php
              if ($_SESSION['role'] == 'super admin') {
              ?>
                <i style="float:right; font-size:30px; top:-60px;position:relative;" class="bi bi-plus-circle-fill btn" data-bs-toggle="modal" data-bs-target="#addshelf"></i>
              <?php
              } elseif ($_SESSION['role'] != 'super admin' && $lib_id != '1') {
              ?>
                <i style="float:right; font-size:30px; top:-60px; position:relative;" class="bi bi-plus-circle-fill btn" data-bs-toggle="modal" data-bs-target="#addshelf"></i><?php

                                                                                                                                                                              }
                                                                                                                                                                                ?>
            </div>

            <!--Tabs for list view grid view and button-->
            <div class="toogle">
              <?php include "file_dropdown.php" ?>
            </div>

            <div class="card" style="margin-top:-50px;">
              <?php if ($lib == "Main") {
                if ($role == "super admin") {
                  $remClass = "";
                } else {
                  $remClass = "display:none;";
                }
              ?>

                <div class="card-body varun">
                  <?php
                  $query71 = "SELECT * FROM user_files where menu_type='files'";
                  $statement71 = $connect->prepare($query71);
                  $statement71->execute();
                  $result71 = $statement71->fetchAll();
                  foreach ($result71 as $row71) {
                    $row71['type_id'];
                    $string = $row71['filename'];
                    $url = BASE_URL . 'includes/Pages/files/' . $string;
                    if ($row71['type'] == 'pdf') {
                      echo '<button style="width: auto; margin-right:5px;" onclick="window.open(\'' . $url . '\', \'_blank\');" class="btn iconBtn btn-soft-primary btn-sm" title="' . $row71['filename'] . '">' .  substr($string, 0, 8) . '</button><a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '" style="' . $remClass . '"><i style="position:relative;top:-10px;right:15px;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>';
                    } elseif ($row71['type'] == 'docx' || $row71['type'] == 'pptx' || $row71['type'] == 'xlsx') {
                      echo '<button style="width: auto;margin-right:5px;" class="docxLink_shel btn iconBtn btn-soft-primary btn-sm" name="' . $row71['filename'] . '" value="' . $row71['type'] . '" title="' . $row71['filename'] . '">' .  substr($string, 0, 8) . '</button><a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '"><i style="position:relative;top:-10px;right:15px;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>';
                    } elseif ($row71['type'] == 'png' || $row71['type'] == 'jpg' || $row71['type'] == 'gif' || $row71['type'] == 'jpeg' || $row71['type'] == 'svg' || $row71['type'] == 'bmp' || $row71['type'] == 'mp4') {
                      echo '<button style="width: auto;margin-right:5px;" onclick="window.open(\'' . $url . '\', \'_blank\');" class="btn iconBtn btn-soft-primary btn-sm" title="' . $row71['filename'] . '">' .  substr($string, 0, 8) . '</button><a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '"><i style="position:relative;top:-10px;right:15px;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>';
                    } elseif ($row71['type'] == 'online') {
                      $fName = $row71['filename'];
                      $lName = $row71['lastName'];
                      echo '<button style="width: auto;margin-right:5px;" class="btn iconBtn btn-soft-primary btn-sm openLink" title="' . $row71['filename'] . '">' .  substr($lName, 0, 8) . '</button><a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '"><i style="position:relative;top:-10px;right:15px;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>';
                    } elseif ($row71['type'] == 'offline') {
                      $fName = $row71['filename'];
                      $lName = $row71['lastName'];
                      echo '<button style="width: auto;margin-right:5px;" class="btn iconBtn btn-soft-primary btn-sm driveLink1" value="' . $row71['filename'] . '">' .  substr($lName, 0, 8) . '</button><a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row71['id'] . '"><i style="position:relative;top:-10px;right:15px;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>';
                    }
                  }
                  ?>

                  <?php
                  $query1_fm70 = "SELECT * FROM file_menu_name where type_menu='menu'";
                  $statement1_fm70 = $connect->prepare($query1_fm70);
                  $statement1_fm70->execute();
                  if ($statement1_fm70->rowCount() > 0) {
                    $result1_fm70 = $statement1_fm70->fetchAll();
                    foreach ($result1_fm70 as $row390) {
                      $m_id = $row390['id'];
                  ?>
                      <div class="dropdown dropdown1 addBreifFile" style="margin-right: -10px; margin-top:10px;display: inline-block;width:auto;" value="<?php echo $row390['id']; ?>" name="0" data-custom="NULL" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)" data-class="menu<?php echo $row390['id']; ?>" data-color="<?php if ($row390['color'] == "") {
                                                                                                                                                                                                                                                                                                                                                echo "gray";
                                                                                                                                                                                                                                                                                                                                              } else {
                                                                                                                                                                                                                                                                                                                                                echo $row390['color'];
                                                                                                                                                                                                                                                                                                                                              } ?>">
                        <button style="margin-right: 15px;" type="button" class="btn iconBtn btn-soft-primary btn-sm dropdown-toggle menu<?php echo $row390['id']; ?>" id="navbarNotificationsDropdown" data-bs-toggle="dropdown">
                          <?php echo $row390['menu_name'] ?>
                        </button>
                        <?php
                        if ($_SESSION['role'] == 'super admin') {
                        ?>
                          <a href="<?php echo BASE_URL; ?>Library/removeFiles.php?menuId=<?php echo $row390['id']; ?>"><i style="position:relative;top:-10px;right:15px;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>
                        <?php } ?>
                        <div class="dropdown-menu dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 20rem; position:absolute;top:30px;left:14.1px;z-index:1;">
                          <!-- Header -->
                          <?php
                          if ($_SESSION['role'] == "super admin") {
                          ?>
                            <div class="card-header card-header-content-between">
                              <i style="font-size:20px; margin-top:-25px;margin-left:-30px;" onclick="document.getElementById('me_id').value='<?php echo $row390['id'] ?>';document.getElementById('me_ty').value='<?php echo $row390['type_menu'] ?>';" class="bi bi-plus-circle-fill btn" data-bs-toggle="modal" data-bs-target="#selectfiles"></i>
                            </div>
                          <?php } ?>
                          <div class="card-body-height">
                            <?php
                            $query1_fm701 = "SELECT * FROM user_files where menu_type='menu' and type_id='$m_id'";
                            $statement1_fm701 = $connect->prepare($query1_fm701);
                            $statement1_fm701->execute();
                            if ($statement1_fm701->rowCount() > 0) {
                              $result1_fm701 = $statement1_fm701->fetchAll();
                              foreach ($result1_fm701 as $row3901) {
                                if ($row3901['type'] == 'pdf') {
                                  echo '
                                  <a href="' . BASE_URL . 'includes/Pages/files/' . $row3901['filename'] . '" class="nav-link ahstyle rounded-2" target="_blank">' . $row3901['filename'] . '</a></a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-40px;right:-270px;z-index:3000" class="bi bi-x-circle text-danger"></i></a>';
                                } elseif ($row3901['type'] == 'offline') {
                                  echo '<div class="offline driveLink1 row d-flex justify-content-center"></div>
                                <a href="#" class="offline nav-link ahstyle rounded-2"  value="' . $row3901['filename'] . '">' . $row3901['filename'] . '</a> </a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-40px;right:-270px;z-index:3000" class="bi bi-x-circle text-danger"></i></a>';
                                } elseif ($row3901['type'] == 'online') {
                                  echo '
                                <a attr="' . $row3901['filename'] . '" class="openLink nav-link ahstyle rounded-2">' . $row3901['lastName'] . '</a></a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-40px;right:-270px;z-index:3000" class="bi bi-x-circle text-danger"></i></a>';
                                } elseif ($row3901['type'] == 'docx' || $row3901['type'] == 'pptx' || $row3901['type'] == 'xlsx') {
                                  echo '<div class="docxLink_shel row d-flex justify-content-center" name="' . $row3901['filename'] . '" value="' . $row3901['type'] . '"><div class="col-11">
                                <a href="#" class="nav-link ahstyle rounded-2">' . $row3901['filename'] . '</a></a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-40px;right:-270px;z-index:3000" class="bi bi-x-circle text-danger"></i></a> </div></div>';
                                } elseif ($row3901['type'] == 'png' || $row3901['type'] == 'jpg' || $row3901['type'] == 'gif' || $row3901['type'] == 'jpeg' || $row3901['type'] == 'svg' || $row3901['type'] == 'bmp') {
                                  echo '<div class="row d-flex justify-content-center"><div class="col-11">
                                <a href="' . BASE_URL . 'includes/Pages/files/' . $row3901['filename'] . '" target="_blank" class="nav-link ahstyle rounded-2">' . $row3901['filename'] . '</a></a> <a style="' . $remClass . '" href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-40px;right:-270px;z-index:3000" class="bi bi-x-circle text-danger"></i></a> </div></div>';
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
                  $query1_fm702 = "SELECT * FROM file_menu_name where type_menu='megmenu'";
                  $statement1_fm702 = $connect->prepare($query1_fm702);
                  $statement1_fm702->execute();
                  if ($statement1_fm702->rowCount() > 0) {
                    $result1_fm702 = $statement1_fm702->fetchAll();
                    foreach ($result1_fm702 as $row3901) {
                      $m_id1 = $row3901['id'];
                  ?>
                      <div class="dropdown dropdown1" style="margin-right:-10px; margin-top:10px;display: inline-block;width:auto;" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)" data-class="mega<?php echo $row3901['id']; ?>" data-color="<?php if ($row3901['color'] == "") {
                                                                                                                                                                                                                                                                  echo "gray";
                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                  echo $row3901['color'];
                                                                                                                                                                                                                                                                } ?>">
                        <button type="button" style="width: auto; margin-right:15px;" class="nav-link btn btn-soft-primary dropdown-toggle mega<?php echo $row3901['id']; ?>" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="landingsMegaMenu1">
                          <?php echo $row3901['menu_name'] ?>
                        </button>
                        <?php
                        if ($_SESSION['role'] == 'super admin') {
                        ?>
                          <a href="<?php echo BASE_URL; ?>Library/removeFiles.php?menuId=<?php echo $row3901['id']; ?>"><i style="position:relative;top:-10px;right:15px;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>
                        <?php } ?>
                        <div class="hs-mega-menu dropdown-menu" aria-labelledby="landingsMegaMenu1" style="width:1000px; margin-top:0px;">
                          <div class="navbar-dropdown-menu-promo">
                            <!-- Promo Item -->
                            <?php
                            if ($_SESSION['role'] == "super admin") {
                            ?>
                              <div class="card-header card-header-content-between">
                                <i style="font-size:20px; margin-top:-25px;margin-left:-30px;" onclick="document.getElementById('me_id').value='<?php echo $row3901['id'] ?>';document.getElementById('me_ty').value='<?php echo $row3901['type_menu'] ?>';" class="bi bi-plus-circle-fill btn" data-bs-toggle="modal" data-bs-target="#selectfiles"></i>
                              </div>
                            <?php } ?>
                            <div class="container-fluid">
                              <div class="row">
                                <?php
                                $query1_fm701 = "SELECT * FROM user_files WHERE menu_type = 'megmenu' AND type_id = '$m_id1'";
                                $statement1_fm701 = $connect->prepare($query1_fm701);
                                $statement1_fm701->execute();
                                if ($statement1_fm701->rowCount() > 0) {
                                  $result1_fm701 = $statement1_fm701->fetchAll();
                                  foreach ($result1_fm701 as $row3901) {
                                    if ($row3901['type'] == 'pdf') {
                                      echo '<div class="col-4"><div class="row d-flex justify-content-center"><div class="col-11">
                                      <a href="' . BASE_URL . 'includes/Pages/files/' . $row3901['filename'] . '" class="nav-link ahstyle rounded-2" target="_blank">' . $row3901['filename'] . '</a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-35px;right:-250px" class="bi bi-x-circle text-danger"></i></a></div></div></div>';
                                    } elseif ($row3901['type'] == 'offline') {
                                      echo '<div class="col-4"><div class="row d-flex justify-content-center"><div class="col-11">
                                    <a class="driveLink1 offline nav-link ahstyle rounded-2"  value="' . $row3901['filename'] . '">' . $row3901['filename'] . '</a></a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-35px;right:-250px" class="bi bi-x-circle text-danger"></i></a> </div></div></div>';
                                    } elseif ($row3901['type'] == 'online') {
                                      echo '<div class="col-4"><div class="row d-flex justify-content-center"><div class="col-11">
                                    <a attr="' . $row3901['filename'] . '" class="openLink nav-link ahstyle rounded-2">' . $row3901['lastName'] . '</a> </a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-35px;right:-250px" class="bi bi-x-circle text-danger"></i></a></div></div></div>';
                                    } elseif ($row3901['type'] == 'docx' || $row3901['type'] == 'pptx' || $row3901['type'] == 'xlsx') {
                                      echo '<div class="col-4"><div class="docxLink_shel row d-flex justify-content-center" name="' . $row3901['filename'] . '" value="' . $row3901['type'] . '"><div class="col-11">
                                    <a href="#" class="nav-link ahstyle rounded-2">' . $row3901['filename'] . '</a> </a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-35px;right:-250px" class="bi bi-x-circle text-danger"></i></a></div></div></div>';
                                    } elseif ($row3901['type'] == 'png' || $row3901['type'] == 'jpg' || $row3901['type'] == 'gif' || $row3901['type'] == 'jpeg' || $row3901['type'] == 'svg' || $row3901['type'] == 'bmp') {
                                      echo '<div class="col-4"><div class="row d-flex justify-content-center"><div class="col-11">
                                    <a href="' . BASE_URL . 'includes/Pages/files/' . $row3901['filename'] . '" target="_blank" class="nav-link ahstyle rounded-2">' . $row3901['filename'] . '</a> </a> <a href="' . BASE_URL . 'Library/removeFiles.php?filesId=' . $row3901['id'] . '"><i style="position:relative;top:-35px;right:-250px" class="bi bi-x-circle text-danger"></i></a></div></div></div>';
                                    }
                                  }
                                }
                                ?>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                  <?php }
                  } ?>
                </div>
              <?php } ?>
            </div>



            <div class="card-body">

              <?php
              if (isset($lib_id)) {
                $query7 = "SELECT * FROM shelf where library_id='$lib_id'";
                $statement7 = $connect->prepare($query7);
                $statement7->execute();
                $result7 = $statement7->fetchAll();
                foreach ($result7 as $row7) {
              ?>

                  <tr>
                    <?php
                    //select id
                    $type = $row7['id'];

                    ?>
                    <br>
                    <div class="col-12" style="margin-bottom: 20px; border:0.001rem solid #c60fc624; border-radius: 7px;">
                      <div class="card card-hover-shadow h-100" id="id<?php echo $type; ?>" name="<?php echo $type; ?>">
                        <div class="card-body">

                          <?php
                          if ($_SESSION['role'] == 'super admin') {
                          ?>
                            <a href="sheff_delete.php?id=<?php echo $row7['id']; ?>&labID=<?php echo $lib_id; ?>&userId=<?php echo $user_id; ?>"><i style="float:right; margin-top:-15px;" class="bi bi-x-circle text-danger"></i></a>
                          <?php
                          } elseif ($_SESSION['role'] != 'super admin' && $lib_id != '1') {
                          ?>
                            <a href="sheff_delete.php?id=<?php echo $row7['id']; ?>&labID=<?php echo $lib_id; ?>&userId=<?php echo $user_id; ?>"><i style="float:right; margin-top:-15px;" class="bi bi-x-circle text-danger"></i></a>
                          <?php

                          }
                          ?>
                          <!-- print type name -->
                          <h2 class="text-dark" style="float:left;">
                            <img style="height:25px; width:35px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/shelve.png">
                            <?php echo $row7['shelf']; ?>
                          </h2>
                          <?php
                          if ($_SESSION['role'] == 'super admin') {
                          ?>
                            <i onclick="document.getElementById('shid').value='<?php echo $row7['id'] ?>';
                                        document.getElementById('shelf_name').value='<?php echo $row7['shelf']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#editshelf" style="margin: 5px; font-weight:bold; font-size:large; color:#7901c1;" class="bi bi-pencil-square">
                            </i>
                          <?php
                          } elseif ($_SESSION['role'] != 'super admin' && $lib_id != '1') {
                          ?>
                            <i onclick="document.getElementById('shid').value='<?php echo $row7['id'] ?>';
                                        document.getElementById('shelf_name').value='<?php echo $row7['shelf']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#editshelf" style="margin: 5px; font-weight:bold; font-size:large;" class="bi bi-pencil-square text-success">
                            </i>
                          <?php

                          }
                          ?>
                          <?php
                          if ($_SESSION['role'] == 'super admin') {
                          ?>
                            <i class="bi bi-plus-circle-fill btn getShelfId" onclick="document.getElementById('shides').value='<?php echo $row7['id']; ?>';document.getElementById('shelf_Id').value='<?php echo $row7['id']; ?>';" data-bs-toggle="modal" data-bs-target="#Add_shops" style="float: right; font-size:30px; margin-top:-20px;" value="<?php echo $row7['id']; ?>"></i>
                          <?php
                          } elseif ($_SESSION['role'] != 'super admin' && $lib_id != '1') {
                          ?>
                            <i class="bi bi-plus-circle-fill btn getShelfId" onclick="document.getElementById('shides').value='<?php echo $row7['id'] ?>';document.getElementById('shelf_Id').value='<?php echo $row7['id']; ?>';" data-bs-toggle="modal" data-bs-target="#Add_shops" style="float: right; font-size:30px; margin-top:-20px;" value="<?php echo $row7['id']; ?>"></i>
                          <?php

                          }
                          ?>
                          <br>
                          <hr>
                          <div class="row align-items-center gx-2 mb-1">
                            <div class="col-12">

                              <?php
                              if ($lib_id == 1) {
                                $query8 = "SELECT * FROM shelf_shop where shelf_id='$type'";
                              } else {
                                $query8 = "SELECT * FROM shelf_shop where shelf_id='$type' and user_id='$user_id'";
                              }
                              $statement8 = $connect->prepare($query8);
                              $statement8->execute();
                              $result8 = $statement8->fetchAll();
                              foreach ($result8 as $row8) {
                                $shop_idess = $row8['shop_id'];
                                $shop_names = $connect->prepare("SELECT `shops` FROM `shops` WHERE id=?");
                                $shop_names->execute([$shop_idess]);
                                $name_shop = $shop_names->fetchColumn();
                                $shop_image = $connect->prepare("SELECT `image` FROM `shops` WHERE id=?");
                                $shop_image->execute([$shop_idess]);
                                $image_shop = $shop_image->fetchColumn();
                                if ($image_shop != "") {


                                  $shoppic1 = BASE_URL . 'includes/Pages/shops/' . $image_shop;
                                  if (file_exists($_SERVER['DOCUMENT_ROOT'] . $shoppic1)) {
                                    $shoppic1 = BASE_URL . 'includes/Pages/shops/' . $image_shop;
                                  } else {
                                    $shoppic1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                  }
                                }
                              ?>
                                <div style="display:inline-block;position:relative;" class="refPage">
                                  <?php
                                  if ($_SESSION['role'] == 'super admin') {
                                  ?>
                                    <a href="sheff_delete.php?shopId=<?php echo $row8['shop_id']; ?>&labID=<?php echo $lib_id; ?>&userId=<?php echo $user_id; ?>&shelfId=<?php echo $type; ?>" style="position:absolute;top:15px;left:4px;"><i style="float:right; margin-top:-15px;" class="bi bi-x-circle text-danger"></i></a>
                                  <?php
                                  } elseif ($_SESSION['role'] != 'super admin' && $lib_id != '1') {
                                  ?>
                                    <a href="sheff_delete.php?shopId=<?php echo $row8['shop_id']; ?>&labID=<?php echo $lib_id; ?>&userId=<?php echo $user_id; ?>&shelfId=<?php echo $type; ?>" style="position:absolute;top:15px;left:4px;"><i style="float:right; margin-top:-15px;" class="bi bi-x-circle text-danger" id="shopdel"></i></a>
                                  <?php } ?>

                                  <a style="color:black;" onclick="document.getElementById('shop_ides').value='<?php echo $row8['shop_id'] ?>';document.getElementById('shop_ID').value='<?php echo $row8['shop_id'] ?>';document.getElementById('shelf_ides').value='<?php echo $row8['shelf_id'] ?>';" class="checkOn checkOn<?php echo $row8['shop_id']; ?> seilfId<?php echo $row8['shelf_id'] ?><?php echo $row8['shop_id'] ?>" value="<?php echo $row8['shop_id']; ?>" id="<?php echo $row8['shop_id']; ?>" name="<?php echo $row8['shelf_id'] ?>">

                                    <div style="border: 1px solid #ccccb375;border-radius: 5px;margin-left: 5px;text-align: center;cursor: pointer;" class="sl">
                                      <!-- center>
                                        <div class="avatar avatar-lg avt-lib"> -->
                                          <img class="avatar-img avt-img" style="height: 100px;width: 100px; margin: 5px;" src="<?php echo $shoppic1 ?>" alt="Image Description">
                                        <!-- </div>
                                      </center> -->
                                      <!-- <br> -->
                                      <span class="text-dark" style="font-weight: bold;display: block;background: #7901c1;font-size: xx-large;"><?php echo $name_shop; ?></span>
                                    </div>
                                  </a>
                                </div>
                              <?php }
                              ?>

                            </div>
                          </div>
                        </div>
                        <div class="showCon hideCon">
                          <p id="varun"></p>
                          <div class="row">
                            <div class="col-12 folCon" style="margin-left: 20px; margin-right: 20px; width:95%; margin-top:5px;">
                              <?php
                              if ($_SESSION['role'] == 'super admin') {
                              ?>
                                <i onclick="document.getElementById('shelfID').value='<?php echo $row8['shelf_id'] ?>';document.getElementById('shelf_ides').value='<?php echo $row8['shelf_id'] ?>';" class="bi bi-plus-circle-fill btn" data-bs-toggle="modal" data-bs-target="#Add_folder" style="font-size: 20px; margin-left: -10px; cursor:pointer;"></i>
                              <?php
                              } elseif ($_SESSION['role'] != 'super admin' && $lib_id != '1') {
                              ?>
                                <i onclick="document.getElementById('shelfID').value='<?php echo $row8['shelf_id'] ?>';document.getElementById('shelf_ides').value='<?php echo $row8['shelf_id'] ?>';" class="bi bi-plus-circle-fill btn" data-bs-toggle="modal" data-bs-target="#Add_folder" style="font-size: 20px; margin-left: -10px; cursor:pointer;"></i>
                              <?php } ?>

                              <div style="display:inline-block" class="folderName1">
                              </div>

                            </div>
                          </div>

                        </div>
                      </div>
                    </div>

                  </tr>


              <?php }
              } ?>
            </div>


            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>

  </main>

  <!-- Modal for add shelf -->
  <div class="modal fade" id="addshelf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-dark" id="exampleModalLabel">Add Shelf</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="insert-shelf" id="shelf_form" method="post" action="insert_shelf.php">
            <input type="hidden" name="lib_id" value="<?php echo $lib_id; ?>">
            <div class="input-field">
              <table class="table table-bordered" id="table-field-shelf">
                <tr>
                  <td style="text-align: center;"><input type="text" placeholder="Enter Shelf" name="shelf[]" id="shelfval" class="form-control" value="" required /> </td>
                  <td style="width:20px;"><button type="button" name="add_shelf" id="add_shelf" class="btn btn-soft-secondary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
            </div>
            <hr>
            <center>
              <button style="margin:5px; background-color: #7901c1; color:white; float: right;" class="btn" type="submit" id="shelf_submit" name="saveshelf">Submit</button>
            </center>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- End Modal -->

  <!-- Modal for fetch shops -->
  <div class="modal fade" id="Add_shops" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-dark" id="exampleModalLabel">Add Shops
            <button style="background-color: #7901c1; color:white; margin-left: 835px;" class="btn" type="button" data-bs-toggle="modal" data-bs-target="#selectshops">Select</button>
          </h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="insert-file1" id="file_form1" method="post" action="<?php echo BASE_URL; ?>includes/Pages/insert_shops.php" enctype="multipart/form-data">
            <div class="input-field">
              <input type="hidden" id="shelf_Id" name="shelf_Id" />
              <input type="hidden" value="<?php echo $lib_id; ?>" name="lab_Id" />
              <table class="table table-bordered" id="table-field-shop1">
                <tr>
                  <td style="text-align: center;"><input type="file" placeholder="Enter Name" name="file[]" accept="image/*" id="val" class="form-control" value="" /> </td>
                  <td style="text-align: center;"><input type="text" placeholder="Enter Shop" name="shop[]" class="form-control" value="" required /> </td>
                  <td style="width:20px;"><button type="button" name="add_shop1" id="add_shop1" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
            </div>
            <center>
              <button style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" id="shop_submit1" name="addShopLib">Submit</button>
            </center>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- End Modal -->

  <!-- Modal for fetch shops -->
  <div class="modal fade" id="selectshops" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-dark" id="exampleModalLabel">Select Shops
          </h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="shop_insert_user.php" method="post">
            <input type="hidden" name="user_ides" value="<?php echo $user_id ?>">
            <input type="hidden" name="lib_id" value="<?php echo $lib_id ?>">
            <input type="hidden" name="shelf_id" id="shides">
            <table class="table table-striped table-bordered" id="shop_table">
              <input class="form-control" type="text" id="shop_search" onkeyup="search_by_shop_modal()" placeholder="Search for Shop.." title="Type in a name"><br>

              <tbody id="shopTable">

              </tbody>

            </table>
            <hr>
            <button style="float:right; background-color: #7901c1; color:white;" type="submit" class="btn" id="submit">Select</button>
          </form>
          <!-- <button style="float:right;" type="button" class="btn btn-primary" id="submit">Select</button> -->
        </div>

      </div>
    </div>
  </div>

  <!-- edit shelf modal -->
  <div class="modal fade" id="editshelf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-dark" id="exampleModalLabel">Edit Shelf</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form method="post" action="edit_shelf.php" style="width:80%;">
              <input class="form-control" type="hidden" name="id" value="" id="shid">
              <label style="color:black; font-weight:bold; font-size:large;">Shelf Name</label>
              <input class="form-control" type="text" name="shelf_name" value="" id="shelf_name">
              <input style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" name="saveit" value="Submit">
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>

  <!-- select folder for shop -->
  <div class="modal fade" id="Add_folder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-dark" id="exampleModalLabel">Add Folders
            <!-- <button style="background-color: #7901c1; color:white; margin-left: 380px; margin-top: -60px;" class="btn" type="button" data-bs-toggle="modal" data-bs-target="#selectfolder">Select</button> -->
            <button style="background-color: #7901c1; color:white; margin-left: 380px; margin-top: -50px;" class="btn" type="button" data-bs-toggle="modal" data-bs-target="#selectfolder">Select</button>
          </h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form class="insert-folder" id="folder_form1" method="post" action="<?php echo BASE_URL; ?>includes/Pages/insert_folder.php">
            <input type="hidden" name="lab_ID" value="<?php echo $lib_id; ?>" />
            <input type="hidden" name="shelf_ID" id="shelfID" />
            <input type="hidden" name="shop_ID" id="shop_ID" />
            <div class="input-field">
              <table class="table table-bordered" id="table-field-folder1">
                <tr>
                  <td style="text-align: center;"><input type="text" placeholder="Enter Folder" name="folder[]" id="folderval" class="form-control" value="" required /> </td>
                  <td style="width:20px;"><button type="button" name="add_folder1" id="add_folder1" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
            </div>
            <center>
              <button style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" id="folder_submit1" name="addFolderLib">Submit</button>
            </center>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- select folder for shop -->
  <div class="modal fade" id="selectfolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-dark" id="exampleModalLabel">Add Folders
            <button style="background-color: #7901c1; color:white;">Select</button>
          </h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="folder_insert_user.php" method="post">
            <input type="hidden" name="shop_ides" id="shop_ides">
            <input type="hidden" name="shelf_ides" id="shelf_ides">
            <input type="hidden" name="lib_id" id="lib_id" value="<?php echo $lib_id ?>">
            <input type="hidden" name="userid" value="<?php echo $user_id ?>">

            <table class="table table-striped table-bordered" id="folder_table">
              <input class="form-control" type="text" id="folder_search" onkeyup="search_by_folder_name()" placeholder="Search for Folder.." title="Type in a name"><br>

              <tbody class="fetch_folder">

              </tbody>

            </table>
            <hr>
            <button style="float:right; background-color: #7901c1; color:white;" type="submit" class="btn" id="submit">Select</button>
          </form>

        </div>
      </div>
    </div>
  </div>



  <!-- <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const checkbox = document.getElementById('myCheckbox');
            
            // Open link in new tab if checkbox is checked
            const handleFolderClick = (event) => {
                if (checkbox.checked) {
                    event.preventDefault();
                    window.open(event.target.href, '_blank');
                }
            };
            
            // Attach click event listener to folder links
            const folderLinks = document.getElementsByClassName('foldername');
            Array.from(folderLinks).forEach(link => {
                link.addEventListener('click', handleFolderClick);
            });
        });
    </script> -->


  <script type="text/javascript">
    $(document).ready(function() {
      var html = '<tr>\
                          <td style="text-align: center;"><input type="text" placeholder="Enter Shelf" name="shelf[]" id="shelfval" class="form-control" value="" required/> </td>\
                          <td style="width:20px;"><button type="button" name="remove_shelf" id="remove_shelf" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                        </tr>'
      var max = 100;
      var a = 1;

      $("#add_shelf").click(function() {
        if (a <= max) {
          $("#table-field-shelf").append(html);
          a++;
        }
      });
      $("#table-field-shelf").on('click', '#remove_shelf', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script>

  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script>
    $(".foldername").on("click", function() {
      alert("hello");
    });

    $(document).ready(function() {
      var libLibId = <?php echo $libLibId; ?>;
      var libShopId = <?php echo $libShopId; ?>;
      var libLVid = <?php echo $libLVid; ?>;

      var shelf_ides = localStorage.getItem('shelf_ides', shelf_ides);
      var shopId = localStorage.getItem('shopId', shop_ides);
      $("#shop_ID").val(shopId);

      $("#shop_ides").val(shopId);
      $("#shelf_ides").val(shelf_ides);

      $.ajax({
        type: 'POST',
        url: "fetchFolder.php",
        data: {
          id: libShopId,
          libId: libLibId,
          shelf_ides: shelf_ides
        },
        dataType: "html",

        success: function(resultData2) {
          $(".seilfId" + shelf_ides + shopId + " .sl").addClass("sel");
          $(".hideCon").addClass("showCon");
          $("#id" + libLVid + " .hideCon").removeClass("showCon");
          $(".checkOn").parent().addClass("delShop");
          $(".folderName1").html(resultData2);
          // console.log(resultData2);
        }
      });

      $.ajax({
        type: 'POST',
        url: "fetchFolder.php",
        data: {
          shop_Id: libShopId,
          libId: libLibId,
          shelf_id: shelf_ides
        },
        dataType: "html",

        success: function(resultData1) {
          // $(".hideCon").addClass("showCon");
          // $("#" + vid + " .hideCon").removeClass("showCon");
          // $(".folderName").html(resultData);
          // console.log(resultData1);
          $(".fetch_folder").html(resultData1);
        }
      });

    });


    function cvarun(clickFolder) {
      $(".folderCon").css("background-color", "#d7d4dbad")
      $(".foldername").css("background-color", "#d7d4dbad")
      $(".foldername").css("color", "black")
      clickFolder.style.border = "1px solid #100f0f00";
      clickFolder.style.background = "#8124ed";
      clickFolder.style.color = "#f0f0f4";
      clickFolder.style.borderRadius = "5px";
      var parentDiv = clickFolder.parentNode;
      var folVal = clickFolder.getAttribute("value");
      // $("#folderId"+folVal).css("background-color", "#8124ed");
      parentDiv.style.backgroundColor = '#8124ed';
    }
  </script>
  <script>
    // $(document).one('ready', function() {
    //   location.reload();
    // });


    $(".checkOn").click(function() {

      var libId = $("#lib_id").val();
      var shop_Id = $(this).attr("value");
      var selid = $(this).attr("name");

      $(this + " .sl").removeClass("sel");
      $(".seilfId" + selid + shop_Id + " .sl").addClass("sel");
      $(".checkOn div span").removeClass("chrColor");
      $(".checkOn").parent().removeAttr("class");
      $(this + " .sl span").addClass("chrColor");
      $(this).parent().addClass("delShop");

      $.ajax({
        type: 'POST',
        url: "fetchFolder.php",
        data: {
          shop_Id: shop_Id,
          libId: libId,
          shelf_id: selid,
        },
        dataType: "html",

        success: function(resultData1) {
          // $(".hideCon").addClass("showCon");
          // $("#" + vid + " .hideCon").removeClass("showCon");
          // $(".folderName").html(resultData);
          // console.log(resultData1);
          $(".fetch_folder").html(resultData1);
        }
      });

      var vid = $(this).parent().parent().parent().parent().parent().attr('id');
      var libLvid = $(this).parent().parent().parent().parent().parent().attr('name');
      // $("#"+vid+" .hideCon").removeClass("showCon");

      if ($("#" + vid + " .hideCon").hasClass("showCon")) {
        $("#" + vid + " .hideCon").removeClass("showCon");
      } else {
        $("#" + vid + " .hideCon").addClass("showCon");
      }
      $("#" + vid + " .hideCon").addClass("crad-body");
      var shopId = $("#shop_ides").val();
      var shelf_ides = $("#shelf_ides").val();

      //   $(document).ready(function() {
      //     const storedValue = localStorage.getItem('brief_Id');
      //     $("#" + storedValue).addClass("show");
      // });
      localStorage.setItem('shelf_ides', shelf_ides);
      localStorage.setItem('shopId', shopId);

      // console.log("varun"+shopId);
      // console.log("varun"+libId);

      document.cookie = "libShopId=" + shopId;
      document.cookie = "libLibId=" + libId;
      document.cookie = "libLVid=" + libLvid;
      $.ajax({
        type: 'POST',
        url: "fetchFolder.php",
        data: {
          id: shopId,
          libId: libId,
          shelf_ides: shelf_ides
        },
        dataType: "html",

        success: function(resultData) {
          $(".hideCon").addClass("showCon");
          $("#" + vid + " .hideCon").removeClass("showCon");
          // location.reload();
          $(".folderName1").html(resultData);
        }
      });
    });
  </script>

  <!-- <script type="text/javascript">
  function shop_Search1() {
  // Declare variables
  var input, filter, ul, li, a, i;
  input = document.getElementById('shopsearch1');
  filter = input.value.toUpperCase();
  ul = document.getElementById("shops");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those that don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

</script> -->

  <script>
    function search_by_shop_modal() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("shop_search");
      filter = input.value.toUpperCase();
      table = document.getElementById("shop_table");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
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

  <script>
    function search_by_folder_name() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("folder_search");
      filter = input.value.toUpperCase();
      table = document.getElementById("folder_table");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
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

  <script type="text/javascript">
    $(document).ready(function() {


      var html = '<tr>\
          <td style="text-align: center;"><input type="file" placeholder="Enter Name" name="file[]" accept="image/*" id="val" class="form-control" value=""/> </td>\
                          <td style="text-align: center;"><input type="text" placeholder="Enter Shop" name="shop[]" class="form-control" value="" required/> </td>\
                          <td style="width:20px;"><button type="button" name="remove_shop1" id="remove_shop1" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                        </tr>'
      var max = 100;
      var a = 1;

      $("#add_shop1").click(function() {
        if (a <= max) {
          $("#table-field-shop1").append(html);
          a++;
        }
      });
      $("#table-field-shop1").on('click', '#remove_shop1', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      var html = '<tr>\
                          <td style="text-align: center;"><input type="text" placeholder="Enter Folder" name="folder[]" id="foldersval" class="form-control" value="" required/> </td>\
                          <td style="width:20px;"><button type="button" name="remove_folder1" id="remove_folder1" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                        </tr>'
      var max = 100;
      var a = 1;

      $("#add_folder1").click(function() {
        if (a <= max) {
          $("#table-field-folder1").append(html);
          a++;
        }
      });
      $("#table-field-folder1").on('click', '#remove_folder1', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script>


  <script type="text/javascript">
    function search_by_folder() {
      // Get input value and convert to lowercase
      var input = document.getElementById("folder_search");
      var filter = input.value.toLowerCase();

      // Get all lists (ul elements)
      var lists = document.getElementsByTagName("ul");

      // Loop through each list
      for (var i = 0; i < lists.length; i++) {
        var list = lists[i];

        // Get all list items (li elements) within the current list
        var items = list.getElementsByTagName("li");


        // Loop through each list item
        for (var j = 0; j < items.length; j++) {
          var item = items[j];

          // Get item text and convert to lowercase
          var text = item.textContent || item.innerText;
          text = text.toLowerCase();

          // If the item text contains the filter text, show it, otherwise hide it
          if (text.indexOf(filter) > -1) {
            item.style.display = "";
            // item.style.textDecoration = "none";
          } else {
            item.style.display = "none";

          }
        }
      }
    }
  </script>
  <script>
    $(".getShelfId").hover(function() {
      var selId = $(this).attr("value");
      $.ajax({
        type: 'POST',
        url: "fetchFolder.php",
        data: {
          selId: selId
        },
        dataType: "html",

        success: function(resultData) {
          // $(".hideCon").addClass("showCon");
          // $("#" + vid + " .hideCon").removeClass("showCon");
          // $(".folderName").html(resultData);
          // console.log(resultData);
          $("#shopTable").empty();
          $("#shopTable").html(resultData);
        }
      });
    });

    $(document).ready(function() {
      toogleVal = localStorage.getItem("toogle");
      if (toogleVal == "checked") {
        $("#switch").prop("checked", true);
      }
    });

    $("#switch").on("click", function() {
      window.location.href = '<?php echo BASE_URL; ?>includes/Pages/files.php';
      localStorage.setItem("toogle", "checked");
    });

    $(document).ready(function() {
      $(document).on("click", '.offline', function() {
        const page = $(this).attr("value");
        var $tempInput = $("<input>");

        // Set the value of the temporary input element to the text
        $tempInput.val(page);

        // Append the temporary input element to the body
        $("body").append($tempInput);

        // Select the text in the temporary input element
        $tempInput.select();

        // Copy the selected text to the clipboard
        document.execCommand("copy");

        // Remove the temporary input element from the body
        $tempInput.remove();
        window.open('<?php echo BASE_URL; ?>openPageIllu.php', '_blank');
      });

      $(document).on("click", ".docxLink_shel", function() {
        var fileName = $(this).attr("name");
        var fileType = $(this).attr('value');
        if (fileType == "docx" || fileType == "xlsx" || fileType == "pptx") {

          function downloadFile(url, fileName) {
            var link = document.createElement('a');
            link.href = url;
            link.download = fileName;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
          }

          // Download the DOCX file
          var docxUrl = "<?php echo BASE_URL; ?>includes/pages/files/" + fileName;
          var docxFileName = fileName;
          downloadFile(docxUrl, docxFileName);
        }
      });
    });

    function showDropdown(element) {
      $(element).addClass('show');
      $(element).find('.dropdown-menu').addClass('show');
      const classH = $(element).data("class");
      const classC = $(element).data("color");
      $("." + classH).css('background', classC);
    }

    function hideDropdown(element) {
      $(element).removeClass('show');
      $(element).find('.dropdown-menu').removeClass('show');
      const classH = $(element).data("class");
      const classC = $(element).data("color");
      $("." + classH).css('background', "#377dff1a");

    }
  </script>

  <script>
    $(".openLink").on("click", function() {
      const fileName = $(this).attr("title");
      // alert(fileName);
      window.open(fileName, '_blank');
    });

    $(document).on("click", ".driveLink1", function() {
      const page = $(this).attr("value");

      var $tempInput = $("<input>");

      // Set the value of the temporary input element to the text
      $tempInput.val(page);

      // Append the temporary input element to the body
      $("body").append($tempInput);

      // Select the text in the temporary input element
      $tempInput.select();

      // Copy the selected text to the clipboard
      document.execCommand("copy");

      // Remove the temporary input element from the body
      $tempInput.remove();
      window.open('<?php echo BASE_URL; ?>openPageIllu.php', '_blank');
    });
  </script>



  <!--Footer-->
</body>

</html>