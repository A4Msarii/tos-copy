<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php include 'lb_thumbnail.php';?>
  <title>Document</title>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script>
  <style>
    /* .tox-toolbar__group {
            background-color: white !important;
        } */
    .folbr {
      height: inherit;
      width: inherit;
      padding: 20px;
      text-align: initial;
    }

    #red_color {
      width: 30px;
      height: 30px;
      -webkit-border-radius: 25px;
      -moz-border-radius: 25px;
      border-radius: 25px;
      background: #dc3545 !important;
    }

    #green_color {
      width: 30px;
      height: 30px;
      -webkit-border-radius: 25px;
      -moz-border-radius: 25px;
      border-radius: 25px;
      background: #28a745 !important;
    }

    #yellow_color {
      width: 30px;
      height: 30px;
      -webkit-border-radius: 25px;
      -moz-border-radius: 25px;
      border-radius: 25px;
      background: #ffc107 !important;
    }

    #blue_color {
      width: 30px;
      height: 30px;
      -webkit-border-radius: 25px;
      -moz-border-radius: 25px;
      border-radius: 25px;
      background: #007bff !important;
    }

    #grey_color {
      width: 30px;
      height: 30px;
      -webkit-border-radius: 25px;
      -moz-border-radius: 25px;
      border-radius: 25px;
      background: #6c757d !important;
    }

    #all_color {
      width: 30px;
      height: 30px;
      -webkit-border-radius: 25px;
      -moz-border-radius: 25px;
      border-radius: 25px;
      background: linear-gradient(90deg, #FC466B 0%, #3F5EFB 100%);
    }
  </style>
</head>

<body>
  <?php include 'lb_loader.php';?>
  <div id="header-hide">
    <?php include('./secondWindowHeader.php');
    $userId = $_SESSION['login_id'];
    ?>
  </div>


  <main id="content" role="main" class="main">

    <!-- Content -->
    <div class="content container-fluid" style="margin-left:45px;">
      <center>
        <div class="row justify-content-center">
          <div class="alertlibrary" style="width: 92%;margin-top: -30px;margin-bottom: -30px;">
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
          <div class="col-lg-11 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-hover-shadow h-100" style="border:1px solid black;">
              <!-- Body -->
              <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">

                <h1>My Favorites</h1>
              </div>
              <div class="card-body">

                <div class="col">
                  <!-- Nav -->
                  <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link redcolor" id="redcolor-tab" href="#redcolor" data-bs-toggle="pill" data-bs-target="#redcolor" role="tab" aria-controls="redcolor" aria-selected="true">
                        <div class="d-flex align-items-center text-danger">
                          <span style="color:white;" id="red_color"></span>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link greencolor" id="greencolor-tab" href="#greencolor" data-bs-toggle="pill" data-bs-target="#greencolor" role="tab" aria-controls="greencolor" aria-selected="false">
                        <div class="d-flex align-items-center text-success">
                          <span style="color:white;" id="green_color"></span>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link yellowcolor" id="yellowcolor-tab" href="#yellowcolor" data-bs-toggle="pill" data-bs-target="#yellowcolor" role="tab" aria-controls="yellowcolor" aria-selected="false">
                        <div class="d-flex align-items-center text-info">
                          <span style="color:white;" id="yellow_color"></span>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link bluecolor" id="bluecolor-tab" href="#bluecolor" data-bs-toggle="pill" data-bs-target="#bluecolor" role="tab" aria-controls="bluecolor" aria-selected="false">
                        <div class="d-flex align-items-center text-primary">
                          <span style="color:white;" id="blue_color"></span>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link greycolor" id="greycolor-tab" href="#greycolor" data-bs-toggle="pill" data-bs-target="#greycolor" role="tab" aria-controls="greycolor" aria-selected="false">
                        <div class="d-flex align-items-center text-secondary">
                          <span style="color:white;" id="grey_color"></span>
                        </div>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" id="all-fav-tab" href="#all-fav" data-bs-toggle="pill" data-bs-target="#all-fav" role="tab" aria-controls="all-fav" aria-selected="false">
                        <div class="d-flex align-items-center text-secondary">
                          <span style="color:white;" id="all_color"></span>
                        </div>
                      </a>
                    </li>
                  </ul>
                  <!-- End Nav -->

                  <!-- Header -->

                  <!-- Body -->
                  <div class="card-body">
                    <!-- Tab Content -->
                    <div class="tab-content">
                      <div class="tab-pane fade" id="redcolor" role="tabpanel" aria-labelledby="redcolor-tab">
                        <input type="text" id="redInput" placeholder="Search..." onkeyup="redsearch()" class="form-control"><br>
                        <?php
                        $sql = $connect->query("SELECT * FROM favouritepages WHERE favouriteColors = '#dc3545' AND userId = '$userId'");
                        while ($data = $sql->fetch()) {
                          $bgColor = $data['favouriteColors'];
                          $page_in = $data['pageId'];
                          $page_name = $connect->prepare("SELECT pageName FROM editor_data WHERE id=?");
                          $page_name->execute([$page_in]);
                          $name2 = $page_name->fetchColumn();
                        ?>
                          <!-- <div class="folbr" style="background-color:<?php echo $bgColor; ?>;color:black; border-radius:20px; box-shadow: #272729 10px 9px 15px; border:aliceblue;"> -->
                          <div class="folbr bg-soft-danger" style="border-left:5px solid <?php echo $bgColor; ?>;">
                            <h1 style="color:<?php echo $data['favouriteColors']; ?>"><a class="nav-link" href="<?php echo BASE_URL; ?>Library/pageData.php?pId=<?php echo $page_in; ?>" role="button"><?php echo $name2 ?></a>
                              <button class="btn btn-danger btn-sm" style="float:right; margin-top: -30px; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favPage=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                              <button style="float: right; margin-top: -30px;" class="btn btn-primary btn-sm" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId<?php echo $row_file12['id'] ?>');">
                                <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                              </button>
                            </h1>

                          </div>
                          <br>
                        <?php } ?>

                        <?php
                        $sql = $connect->query("SELECT * FROM favouritefiles WHERE favouriteColors = '#dc3545' AND userId = '$userId'");
                        while ($data = $sql->fetch()) {
                          $bgColor = $data['favouriteColors'];
                          $file_in = $data['fileId'];
                          $file_name = $connect->query("SELECT * FROM user_files WHERE id = '$file_in'");
                          while ($fileResult = $file_name->fetch()) {
                            if ($fileResult['type'] == "online") {
                        ?>
                              <div class="folbr bg-soft-danger" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a href="<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['lastName']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" title="Copy" id="<?php echo $fileResult['filename']; ?>">
                                    <a><i class="bi bi-files" style="color:white;"></i></a></button>
                                </h1>

                              </div>
                              <br>
                            <?php }
                            if ($fileResult['type'] == "offline") {
                            ?>
                              <div class="folbr bg-soft-danger" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 style="cursor:pointer;" class="offline text-dark" value="<?php echo $fileResult['filename']; ?>"><?php echo $fileResult['lastName']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" title="Copy" id="<?php echo $fileResult['filename']; ?>">
                                    <a><i class="bi bi-files" style="color:white;"></i></a></button>
                                </h1>

                              </div>
                              <br>
                            <?php }
                            if ($fileResult['type'] == "xlsx" || $fileResult['type'] == "docx" || $fileResult['type'] == "pptx") {
                            ?>
                              <div class="folbr bg-soft-danger" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 style="cursor:pointer;" class="docxLink1 text-dark" value="<?php echo $fileResult['type'] ?>" name="<?php echo $fileResult['filename']; ?>"><?php echo $fileResult['filename']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $fileResult['filename']; ?>');">
                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>


                            <?php }
                            if ($fileResult['type'] == "png" || $fileResult['type'] == "jpg" || $fileResult['type'] == "jpeg" || $fileResult['type'] == "webp" || $fileResult['type'] == "gif" || $fileResult['type'] == "jfif") {
                            ?>
                              <div class="folbr bg-soft-danger" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a class="text-dark" style="text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['filename']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#open_slider">
                                    <i class="bi bi-eye" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>


                            <?php }
                            if ($fileResult['type'] == "pdf") {
                            ?>
                              <div class="folbr bg-soft-danger" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a class="text-dark" style="text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['filename']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $fileResult['filename']; ?>');">
                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>
                            <?php } ?>
                        <?php
                          }
                        } ?>
                      </div>

                      <div class="tab-pane fade" id="greencolor" role="tabpanel" aria-labelledby="greencolor-tab">
                        <input type="text" id="greenInput" placeholder="Search..." onkeyup="greensearch()" class="form-control"><br>
                        <?php
                        $sql = $connect->query("SELECT * FROM favouritepages WHERE favouriteColors = '#28a745' AND userId = '$userId'");
                        while ($data = $sql->fetch()) {
                          $bgColor = $data['favouriteColors'];
                          $page_in = $data['pageId'];
                          $page_name = $connect->prepare("SELECT pageName FROM editor_data WHERE id=?");
                          $page_name->execute([$page_in]);
                          $name2 = $page_name->fetchColumn();
                        ?>
                          <div class="folbr bg-soft-success" style="border-left:5px solid <?php echo $bgColor; ?>;">
                            <h1 style="color:<?php echo $data['color']; ?>"><a class="nav-link" href="<?php echo BASE_URL; ?>Library/pageData.php?pId=<?php echo $page_in; ?>" role="button"><?php echo $name2; ?></a>
                              <button class="btn btn-danger btn-sm" style="float:right; margin-top: -30px; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favPage=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                              <button style="float: right; margin-top: -30px;" class="btn btn-primary btn-sm" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId<?php echo $row_file12['id'] ?>');">
                                <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                              </button>
                            </h1>

                          </div>
                          <br>
                        <?php } ?>

                        <?php
                        $sql = $connect->query("SELECT * FROM favouritefiles WHERE favouriteColors = '#28a745' AND userId = '$userId'");
                        while ($data = $sql->fetch()) {
                          $bgColor = $data['favouriteColors'];
                          $file_in = $data['fileId'];
                          $file_name = $connect->query("SELECT * FROM user_files WHERE id = '$file_in'");
                          while ($fileResult = $file_name->fetch()) {
                            if ($fileResult['type'] == "online") {
                        ?>
                              <div class="folbr bg-soft-success" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a href="<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['lastName']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" title="Copy" id="<?php echo $fileResult['filename']; ?>">
                                    <a><i class="bi bi-files" style="color:white;"></i></a></button>
                                </h1>

                              </div>
                              <br>
                            <?php }
                            if ($fileResult['type'] == "offline") {
                            ?>
                              <div class="folbr bg-soft-success" style="border-left:5px solid <?php echo $bgColor; ?>;">
                              <h1 style="cursor:pointer;" class="offline text-dark" value="<?php echo $fileResult['filename']; ?>"><?php echo $fileResult['lastName']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" title="Copy" id="<?php echo $fileResult['filename']; ?>">
                                    <a><i class="bi bi-files" style="color:white;"></i></a></button>
                                </h1>

                              </div>
                              <br>
                            <?php }
                            if ($fileResult['type'] == "xlsx" || $fileResult['type'] == "docx" || $fileResult['type'] == "pptx") {
                            ?>
                              <div class="folbr bg-soft-success" style="border-left:5px solid <?php echo $bgColor; ?>;">
                              <h1 style="cursor:pointer;" class="docxLink1 text-dark" value="<?php echo $fileResult['type'] ?>" name="<?php echo $fileResult['filename']; ?>"><?php echo $fileResult['filename']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $fileResult['filename']; ?>');">
                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>


                            <?php }
                            if ($fileResult['type'] == "png" || $fileResult['type'] == "jpg" || $fileResult['type'] == "jpeg" || $fileResult['type'] == "webp" || $fileResult['type'] == "gif" || $fileResult['type'] == "jfif") {
                            ?>
                              <div class="folbr bg-soft-success" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a class="text-dark" style="text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['filename']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#open_slider">
                                    <i class="bi bi-eye" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>


                            <?php }
                            if ($fileResult['type'] == "pdf") {
                            ?>
                              <div class="folbr bg-soft-success" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a class="text-dark" style="text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['filename']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $fileResult['filename']; ?>');">
                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>
                            <?php } ?>
                        <?php
                          }
                        } ?>
                      </div>

                      <div class="tab-pane fade" id="yellowcolor" role="tabpanel" aria-labelledby="yellowcolor-tab">
                        <input type="text" id="yellowInput" placeholder="Search..." onkeyup="yellowsearch()" class="form-control"><br>
                        <?php
                        $sql = $connect->query("SELECT * FROM favouritepages WHERE favouriteColors = '#ffc107' AND userId = '$userId'");
                        while ($data = $sql->fetch()) {
                          $bgColor = $data['favouriteColors'];
                          $page_in = $data['pageId'];
                          $page_name = $connect->prepare("SELECT pageName FROM editor_data WHERE id=?");
                          $page_name->execute([$page_in]);
                          $name2 = $page_name->fetchColumn();
                        ?>
                          <!-- <div class="folbr" style="background-color:<?php echo $bgColor; ?>;color:black; border-radius:20px; box-shadow: #272729 10px 9px 15px; border:aliceblue;"> -->
                          <div class="folbr bg-soft-warning" style="border-left:5px solid <?php echo $bgColor; ?>;">
                            <h1 style="color:<?php echo $data['color']; ?>"><a class="nav-link" href="<?php echo BASE_URL; ?>Library/pageData.php?pId=<?php echo $page_in; ?>" role="button"><?php echo $name2; ?></a>
                              <button class="btn btn-danger btn-sm" style="float:right; margin-top: -30px; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favPage=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                              <button style="float: right; margin-top: -30px;" class="btn btn-primary btn-sm" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId<?php echo $row_file12['id'] ?>');">
                                <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                              </button>
                            </h1>

                          </div>
                          <br>
                        <?php } ?>

                        <?php
                        $sql = $connect->query("SELECT * FROM favouritefiles WHERE favouriteColors = '#ffc107' AND userId = '$userId'");
                        while ($data = $sql->fetch()) {
                          $bgColor = $data['favouriteColors'];
                          $file_in = $data['fileId'];
                          $file_name = $connect->query("SELECT * FROM user_files WHERE id = '$file_in'");
                          while ($fileResult = $file_name->fetch()) {
                            if ($fileResult['type'] == "online") {
                        ?>
                              <div class="folbr bg-soft-warning" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a href="<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['lastName']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" title="Copy" id="<?php echo $fileResult['filename']; ?>">
                                    <a><i class="bi bi-files" style="color:white;"></i></a></button>
                                </h1>

                              </div>
                              <br>
                            <?php }
                            if ($fileResult['type'] == "offline") {
                            ?>
                              <div class="folbr bg-soft-warning" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 style="cursor:pointer;" class="offline text-dark" value="<?php echo $fileResult['filename']; ?>"><?php echo $fileResult['lastName']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" title="Copy" id="<?php echo $fileResult['filename']; ?>">
                                    <a><i class="bi bi-files" style="color:white;"></i></a></button>
                                </h1>

                              </div>
                              <br>
                            <?php }
                            if ($fileResult['type'] == "xlsx" || $fileResult['type'] == "docx" || $fileResult['type'] == "pptx") {
                            ?>
                              <div class="folbr bg-soft-warning" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 style="cursor:pointer;" class="docxLink1 text-dark" value="<?php echo $fileResult['type'] ?>" name="<?php echo $fileResult['filename']; ?>"><?php echo $fileResult['filename']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages//fheader1.php/<?php echo $fileResult['filename']; ?>');">
                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>


                            <?php }
                            if ($fileResult['type'] == "png" || $fileResult['type'] == "jpg" || $fileResult['type'] == "jpeg" || $fileResult['type'] == "webp" || $fileResult['type'] == "gif" || $fileResult['type'] == "jfif") {
                            ?>
                              <div class="folbr bg-soft-warning" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 style="text-decoration:none;" class="text-dark"><a class="text-dark" style="text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['filename']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#open_slider">
                                    <i class="bi bi-eye" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                  </button>
                                </h1>
                              </div>
                              <br>


                            <?php }
                            if ($fileResult['type'] == "pdf") {
                            ?>
                              <div class="folbr bg-soft-warning" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark">
                                <a class="text-dark" style="text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['filename']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $fileResult['filename']; ?>');">
                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>
                            <?php } ?>
                        <?php
                          }
                        } ?>
                      </div>

                      <div class="tab-pane fade" id="bluecolor" role="tabpanel" aria-labelledby="bluecolor-tab">
                        <input type="text" id="blueInput" placeholder="Search..." onkeyup="bluesearch()" class="form-control"><br>
                        <?php
                        $sql = $connect->query("SELECT * FROM favouritepages WHERE favouriteColors = '#007bff' AND userId = '$userId'");
                        while ($data = $sql->fetch()) {
                          $bgColor = $data['favouriteColors'];
                          $page_in = $data['pageId'];
                          $page_name = $connect->prepare("SELECT pageName FROM editor_data WHERE id=?");
                          $page_name->execute([$page_in]);
                          $name2 = $page_name->fetchColumn();
                        ?>
                          <div class="folbr bg-soft-primary" style="border-left:5px solid <?php echo $bgColor; ?>;">
                            <h1 style="color:<?php echo $data['color']; ?>"><a class="nav-link" href="<?php echo BASE_URL; ?>Library/pageData.php?pId=<?php echo $page_in; ?>" role="button"><?php echo $name2; ?></a>
                              <button class="btn btn-danger btn-sm" style="float:right; margin-top: -30px; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favPage=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                              <button style="float: right; margin-top: -30px;" class="btn btn-primary btn-sm" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId<?php echo $row_file12['id'] ?>');">
                                <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                              </button>
                            </h1>

                          </div>
                          <br>
                        <?php } ?>

                        <?php
                        $sql = $connect->query("SELECT * FROM favouritefiles WHERE favouriteColors = '#007bff' AND userId = '$userId'");
                        while ($data = $sql->fetch()) {
                          $bgColor = $data['favouriteColors'];
                          $file_in = $data['fileId'];
                          $file_name = $connect->query("SELECT * FROM user_files WHERE id = '$file_in'");
                          while ($fileResult = $file_name->fetch()) {
                            if ($fileResult['type'] == "online") {
                        ?>
                              <div class="folbr bg-soft-primary" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a href="<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['lastName']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" title="Copy" id="<?php echo $fileResult['filename']; ?>">
                                    <a><i class="bi bi-files" style="color:white;"></i></a></button>
                                </h1>

                              </div>
                              <br>
                            <?php }
                            if ($fileResult['type'] == "offline") {
                            ?>
                              <div class="folbr bg-soft-primary" style="border-left:5px solid <?php echo $bgColor; ?>;">
                              <h1 style="cursor:pointer;" class="offline text-dark" value="<?php echo $fileResult['filename']; ?>"><?php echo $fileResult['lastName']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" title="Copy" id="<?php echo $fileResult['filename']; ?>">
                                    <a><i class="bi bi-files" style="color:white;"></i></a></button>
                                </h1>

                              </div>
                              <br>
                            <?php }
                            if ($fileResult['type'] == "xlsx" || $fileResult['type'] == "docx" || $fileResult['type'] == "pptx") {
                            ?>
                              <div class="folbr bg-soft-primary" style="border-left:5px solid <?php echo $bgColor; ?>;">
                              <h1 style="cursor:pointer;" class="docxLink1 text-dark" value="<?php echo $fileResult['type'] ?>" name="<?php echo $fileResult['filename']; ?>"><?php echo $fileResult['filename']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $fileResult['filename']; ?>');">
                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>


                            <?php }
                            if ($fileResult['type'] == "png" || $fileResult['type'] == "jpg" || $fileResult['type'] == "jpeg" || $fileResult['type'] == "webp" || $fileResult['type'] == "gif" || $fileResult['type'] == "jfif") {
                            ?>
                              <div class="folbr bg-soft-primary" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a class="text-dark" style="text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['filename']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#open_slider">
                                    <i class="bi bi-eye" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>


                            <?php }
                            if ($fileResult['type'] == "pdf") {
                            ?>
                              <div class="folbr bg-soft-primary" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a class="text-dark" style="text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['filename']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $fileResult['filename']; ?>');">
                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>
                            <?php } ?>
                        <?php
                          }
                        } ?>
                      </div>

                      <div class="tab-pane fade" id="greycolor" role="tabpanel" aria-labelledby="greycolor-tab">
                        <input type="text" id="greyInput" placeholder="Search..." onkeyup="greysearch()" class="form-control"><br>
                        <?php
                        $sql = $connect->query("SELECT * FROM favouritepages WHERE favouriteColors = '#6c757d' AND userId = '$userId'");
                        while ($data = $sql->fetch()) {
                          $bgColor = $data['favouriteColors'];
                          $page_in = $data['pageId'];
                          $page_name = $connect->prepare("SELECT pageName FROM editor_data WHERE id=?");
                          $page_name->execute([$page_in]);
                          $name2 = $page_name->fetchColumn();
                        ?>
                          <div class="folbr bg-soft-secondary" style="border-left:5px solid <?php echo $bgColor; ?>;">
                            <h1 style="color:<?php echo $data['color']; ?>"><a class="nav-link" href="<?php echo BASE_URL; ?>Library/pageData.php?pId=<?php echo $page_in; ?>" role="button"><?php echo $name2; ?></a>
                              <button class="btn btn-danger btn-sm" style="float:right; margin-top: -30px; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favPage=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                              <button style="float: right; margin-top: -30px;" class="btn btn-primary btn-sm" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId<?php echo $row_file12['id'] ?>');">
                                <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                              </button>
                            </h1>

                          </div>
                          <br>
                        <?php } ?>

                        <?php
                        $sql = $connect->query("SELECT * FROM favouritefiles WHERE favouriteColors = '#6c757d' AND userId = '$userId'");
                        while ($data = $sql->fetch()) {
                          $bgColor = $data['favouriteColors'];
                          $file_in = $data['fileId'];
                          $file_name = $connect->query("SELECT * FROM user_files WHERE id = '$file_in'");
                          while ($fileResult = $file_name->fetch()) {
                            if ($fileResult['type'] == "online") {
                        ?>
                              <div class="folbr bg-soft-secondary" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a href="<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['lastName']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" title="Copy" id="<?php echo $fileResult['filename']; ?>">
                                    <a><i class="bi bi-files" style="color:white;"></i></a></button>
                                </h1>

                              </div>
                              <br>
                            <?php }
                            if ($fileResult['type'] == "offline") {
                            ?>
                              <div class="folbr bg-soft-secondary" style="border-left:5px solid <?php echo $bgColor; ?>;">
                              <h1 style="cursor:pointer;" class="offline text-dark" value="<?php echo $fileResult['filename']; ?>"><?php echo $fileResult['lastName']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" title="Copy" id="<?php echo $fileResult['filename']; ?>">
                                    <a><i class="bi bi-files" style="color:white;"></i></a></button>
                                </h1>

                              </div>
                              <br>
                            <?php }
                            if ($fileResult['type'] == "xlsx" || $fileResult['type'] == "docx" || $fileResult['type'] == "pptx") {
                            ?>
                              <div class="folbr bg-soft-secondary" style="border-left:5px solid <?php echo $bgColor; ?>;">
                              <h1 style="cursor:pointer;" class="docxLink1 text-dark" value="<?php echo $fileResult['type'] ?>" name="<?php echo $fileResult['filename']; ?>"><?php echo $fileResult['filename']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages//fheader1.php/<?php echo $fileResult['filename']; ?>');">
                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>


                            <?php }
                            if ($fileResult['type'] == "png" || $fileResult['type'] == "jpg" || $fileResult['type'] == "jpeg" || $fileResult['type'] == "webp" || $fileResult['type'] == "gif" || $fileResult['type'] == "jfif") {
                            ?>
                              <div class="folbr bg-soft-secondary" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a class="text-dark" style="text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['filename']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#open_slider">
                                    <i class="bi bi-eye" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>


                            <?php }
                            if ($fileResult['type'] == "pdf") {
                            ?>
                              <div class="folbr bg-soft-secondary" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><a class="text-dark" style="text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileResult['filename']; ?>" target="_blank"><?php echo $fileResult['filename']; ?></a>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $fileResult['filename']; ?>');">
                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>
                            <?php } ?>
                        <?php
                          }
                        } ?>
                      </div>

                      <div class="tab-pane fade" id="all-fav" role="tabpanel" aria-labelledby="all-fav-tab">
                        <input type="text" id="searchInput" placeholder="Search..." onkeyup="search()" class="form-control"><br>
                        <?php
                        $sql = $connect->query("SELECT * FROM favouritepages WHERE userId = '$userId'");
                        while ($favData = $sql->fetch()) {
                          $favPageId = $favData['pageId'];
                          $sql1 = $connect->query("SELECT pageName FROM editor_data WHERE id = '$favPageId'");
                          $favPageName = $sql1->fetchColumn();
                          $bgColor = $favData['favouriteColors'];
                        ?>
                          <div class="folbr" style="border-left:5px solid <?php echo $bgColor; ?>;">
                            <h1 class="text-dark"><a class="nav-link" href="<?php echo BASE_URL; ?>Library/pageData.php?pId=<?php echo $favPageId; ?>" role="button"><?php echo $favPageName; ?></a>
                              <button class="btn btn-danger btn-sm" style="float:right; margin-top: -30px; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favPage=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                              <button style="float: right; margin-top: -30px;" class="btn btn-primary btn-sm" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId<?php echo $row_file12['id'] ?>');">
                                <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                              </button>
                            </h1>

                          </div>
                          <br>
                        <?php  } ?>

                        <?php
                        $sql = $connect->query("SELECT * FROM favouritefiles WHERE userId = '$userId'");
                        while ($data = $sql->fetch()) {
                          $bgColor = $data['favouriteColors'];
                          $file_in = $data['fileId'];
                          $file_name = $connect->query("SELECT * FROM user_files WHERE id = '$file_in'");
                          while ($fileResult = $file_name->fetch()) {
                            if ($fileResult['type'] == "online") {
                        ?>
                              <div class="folbr" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><?php echo $fileResult['lastName']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" title="Copy" id="<?php echo $fileResult['filename']; ?>">
                                    <a><i class="bi bi-files" style="color:white;"></i></a></button>
                                </h1>

                              </div>
                              <br>
                            <?php }
                            if ($fileResult['type'] == "offline") {
                            ?>
                              <div class="folbr" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 class="text-dark"><?php echo $fileResult['lastName']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" title="Copy" id="<?php echo $fileResult['filename']; ?>">
                                    <a><i class="bi bi-files" style="color:white;"></i></a></button>
                                </h1>

                              </div>
                              <br>
                            <?php }
                            if ($fileResult['type'] == "xlsx" || $fileResult['type'] == "docx" || $fileResult['type'] == "pptx") {
                            ?>
                              <div class="folbr" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 style="color:black"><?php echo $fileResult['filename']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages//fheader1.php/<?php echo $fileResult['filename']; ?>');">
                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>


                            <?php }
                            if ($fileResult['type'] == "png" || $fileResult['type'] == "jpg" || $fileResult['type'] == "jpeg" || $fileResult['type'] == "webp" || $fileResult['type'] == "gif" || $fileResult['type'] == "jfif") {
                            ?>
                              <div class="folbr" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 style="color:black"><?php echo $fileResult['filename']; ?>
                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#open_slider">
                                    <i class="bi bi-eye" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>


                            <?php }
                            if ($fileResult['type'] == "pdf") {
                            ?>
                              <div class="folbr" style="border-left:5px solid <?php echo $bgColor; ?>;">
                                <h1 style="color:black"><?php echo $fileResult['filename']; ?>

                                  <button class="btn btn-danger btn-sm" style="float:right; margin-left: 10px;"><a href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $data['id']; ?>"><i style="color:white;" class="bi bi-trash-fill"></i></a></button>
                                  <button style="float: right;" class="btn btn-primary btn-sm" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $fileResult['filename']; ?>');">
                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                  </button>
                                </h1>

                              </div>
                              <br>
                            <?php } ?>
                        <?php
                          }
                        } ?>
                      </div>
                    </div>
                    <!-- End Tab Content -->


                    <div id="filterData">

                    </div>
                  </div>
                  <!-- End Body -->

                </div>
                <!-- End Body -->
              </div>
              <!-- End Card -->
            </div>
          </div>
          <!-- End Row -->

        </div>
      </center>
    </div>
  </main>


  <div class="modal fade" id="open_slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none;">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel"></h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php
              $query1 = "SELECT * FROM user_files WHERE folderId = '$f_id' AND shopid = '$shopId' AND type IN ('jpg', 'png', 'jpeg', 'gif', 'svg', 'webp')";
              $statement1 = $connect->prepare($query1);
              $statement1->execute();

              // $query2 = "SELECT * FROM user_files WHERE type IN ('jpg', 'png', 'jpeg', 'gif', 'svg', 'webp')";
              // $statement2 = $connect->prepare($query2);
              // $statement2->execute();

              $images = array();

              if ($statement1->rowCount() > 0) {
                $result1 = $statement1->fetchAll();
                foreach ($result1 as $row) {
                  $images[] = $row['filename'];
                }
              }

              // if ($statement2->rowCount() > 0) {
              //   $result2 = $statement2->fetchAll();
              //   foreach ($result2 as $row) {
              //     $images[] = $row['name'];
              //   }
              // }

              // Display the images in the carousel

              foreach ($images as $image) {
                echo '<div class="carousel-item">';
                echo '<img src="<?php echo BASE_URL; ?>includes/Pages/files/' . $image . '" class="d-block" alt="" style="width:500px; height:500px;">';
                echo '<img src="<?php echo BASE_URL; ?>includes/Pages/files/' . $image . '" class="d-block" alt="" style="width:500px; height:500px;">';
                echo '</div>';
              }

              ?>
            </div>
            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button> -->
          </div>

          <!-- End Body -->
          <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:600px;">
            <!-- Indicators -->
            <center>

              <!-- Slides -->
              <div class="carousel-inner">

                <?php foreach ($images as $index => $image) { ?>
                  <div class="carousel-item <?php if ($index === 0) {
                                              echo 'active';
                                            }
                                            ?>">
                    <div class="thumbnail-caption">
                      <h6 style="font-size: large; float:center;" class="text-success"><?php echo $image; ?></h6>
                    </div><br>
                    <img src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $image ?>" class="d-block" alt="<?php echo $image ?>" style="height: 500px; width: 1000px;">
                  </div>
                <?php } ?>
              </div>
              <br><br>
              <!-- Thumbnails -->
              <div class="carousel-thumbnails">
                <?php foreach ($images as $index => $image) { ?>
                  <a href="#myCarousel" data-slide-to="<?php echo $index ?>" class="<?php if ($index === 0) {
                                                                                      echo 'active';
                                                                                    }
                                                                                    ?>">
                    <img src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $image ?>" alt="<?php echo $image ?>" width="50">
                  </a>

                <?php } ?>
              </div>
            </center>
            <!-- Controls -->
            <a class="carousel-control-prev text-primary" href="#myCarousel" role="button" data-slide="prev" style="font-weight:bold;">
              <span class="carousel-control-prev-icon text-primary" aria-hidden="true"></span>
              <span class="sr-only text-primary">Previous</span>
            </a>
            <a class="carousel-control-next text-primary" href="#myCarousel" role="button" data-slide="next" style="font-weight: bold;">
              <span class="carousel-control-next-icon text-primary" aria-hidden="true"></span>
              <span class="sr-only text-primary">Next</span>
            </a>
          </div>
          <br>
          <br>
        </div>
      </div>
    </div>
  </div>

<script>
  $(document).ready(function() {
    const storedValue = localStorage.getItem('colorName');
    $("." + storedValue).addClass("active");
    $("#" + storedValue).addClass("active");
    $("#" + storedValue).addClass("show");
  });

  $(".colorFilter").on("click", function() {
    var colorValue = $(this).attr('value');
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>Library/getColorSearch.php',
      data: {
        colorValue: colorValue,
      },
      success: function(response) {
        $('#filterData').empty();
        $('#filterData').append(response);
        // console.log(response);

      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#myCarousel').carousel();
  });
</script>

<script>
  function redirectToPage(url) {
    window.location.href = url;
  }
</script>

<script>
  function openInSamePage(url) {
    window.location.href = url;
  }
</script>

<script>
  function openInNewWindow(url) {
    window.open(url, '_blank');
  }
</script>

<script type="text/javascript">
  function search() {
    // Get the user's input from the search bar
    const userInput = document.getElementById('searchInput').value;

    // Retrieve all the elements with the "folbr" class
    const elements = document.getElementsByClassName('folbr');

    // Loop through each element and hide it if it doesn't match the user's input
    for (let i = 0; i < elements.length; i++) {
      const pageTitle = elements[i].getElementsByTagName('h1')[0].innerHTML;
      if (pageTitle.toLowerCase().includes(userInput.toLowerCase())) {
        elements[i].style.display = 'block';
      } else {
        elements[i].style.display = 'none';
      }
    }
  }

  function redsearch() {
    // Get the user's input from the search bar
    const userInput = document.getElementById('redInput').value;

    // Retrieve all the elements with the "folbr" class
    const elements = document.getElementsByClassName('folbr');

    // Loop through each element and hide it if it doesn't match the user's input
    for (let i = 0; i < elements.length; i++) {
      const pageTitle = elements[i].getElementsByTagName('h1')[0].innerHTML;
      if (pageTitle.toLowerCase().includes(userInput.toLowerCase())) {
        elements[i].style.display = 'block';
      } else {
        elements[i].style.display = 'none';
      }
    }
  }

  function greensearch() {
    // Get the user's input from the search bar
    const userInput = document.getElementById('greenInput').value;

    // Retrieve all the elements with the "folbr" class
    const elements = document.getElementsByClassName('folbr');

    // Loop through each element and hide it if it doesn't match the user's input
    for (let i = 0; i < elements.length; i++) {
      const pageTitle = elements[i].getElementsByTagName('h1')[0].innerHTML;
      if (pageTitle.toLowerCase().includes(userInput.toLowerCase())) {
        elements[i].style.display = 'block';
      } else {
        elements[i].style.display = 'none';
      }
    }
  }

  function yellowsearch() {
    // Get the user's input from the search bar
    const userInput = document.getElementById('yellowInput').value;

    // Retrieve all the elements with the "folbr" class
    const elements = document.getElementsByClassName('folbr');

    // Loop through each element and hide it if it doesn't match the user's input
    for (let i = 0; i < elements.length; i++) {
      const pageTitle = elements[i].getElementsByTagName('h1')[0].innerHTML;
      if (pageTitle.toLowerCase().includes(userInput.toLowerCase())) {
        elements[i].style.display = 'block';
      } else {
        elements[i].style.display = 'none';
      }
    }
  }
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

			$(document).on("click", ".docxLink1", function() {
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
  function bluesearch() {
    // Get the user's input from the search bar
    const userInput = document.getElementById('blueInput').value;

    // Retrieve all the elements with the "folbr" class
    const elements = document.getElementsByClassName('folbr');

    // Loop through each element and hide it if it doesn't match the user's input
    for (let i = 0; i < elements.length; i++) {
      const pageTitle = elements[i].getElementsByTagName('h1')[0].innerHTML;
      if (pageTitle.toLowerCase().includes(userInput.toLowerCase())) {
        elements[i].style.display = 'block';
      } else {
        elements[i].style.display = 'none';
      }
    }
  }

  function greysearch() {
    // Get the user's input from the search bar
    const userInput = document.getElementById('greyInput').value;

    // Retrieve all the elements with the "folbr" class
    const elements = document.getElementsByClassName('folbr');

    // Loop through each element and hide it if it doesn't match the user's input
    for (let i = 0; i < elements.length; i++) {
      const pageTitle = elements[i].getElementsByTagName('h1')[0].innerHTML;
      if (pageTitle.toLowerCase().includes(userInput.toLowerCase())) {
        elements[i].style.display = 'block';
      } else {
        elements[i].style.display = 'none';
      }
    }
  }
</script>
<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>
</html>