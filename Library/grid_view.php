<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$green = "#28a745";
$red = "#dc3545";
$yellow = "#ffc107";
$blue = "#007bff";
$black = "#6c757d";
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
</head>
<style>
  .card-wrapper {
    display: block;
  }

  .card-wrapper.hide {
    display: none;
  }
</style>

<body>
  <?php include 'lb_loader.php';?>
<div id="header-hide">
  <?php include('./secondWindowHeader.php');
  if (isset($_REQUEST['bId'])) {
    $_SESSION['page_ID'] = $_REQUEST['bId'];
  }
  if (isset($_REQUEST['pId'])) {
    $_SESSION['page_ID'] = $_REQUEST['pId'];
  }
  $f_id = $_SESSION['folderId'];

  $id = $_SESSION['page_ID'];
  ?>
</div>
     
    <main id="content" role="main" class="main" style="width:97%;">
      

      <div class="content container-fluid" style="margin-left:-100px;">

        <center>
          <ul class="nav nav-pills justify-content-center mb-7 bg-light" role="tablist" style="width:50%;">
            <li class="nav-item">
              <a class="nav-link active" id="pageslist-tab" href="#pageslist" data-bs-toggle="pill" data-bs-target="#pageslist" role="tab" aria-controls="pageslist" aria-selected="true">
                <div class="d-flex align-items-center">
                  Pages
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="filelist-tab" href="#filelist" data-bs-toggle="pill" data-bs-target="#filelist" role="tab" aria-controls="filelist" aria-selected="false">
                <div class="d-flex align-items-center">
                  Files
                </div>
              </a>
            </li>
          </ul>
        </center>
        <!-- End Nav -->

        <!-- Tab Content -->
        <center>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="pageslist" role="tabpanel" aria-labelledby="pageslist-tab">
              <p>Pages tab content...</p>
              <div class="row justify-content-center" style="margin-left:65px;">
                <center>
                  <input type="text" id="searchBar" placeholder="Search..." style="width: 70%; margin-left:5px;" class="form-control">
                </center>
                <!-- <div style="margin-top: 5%;margin-left:1%;text-align:justify;margin-right:1%;"> -->
                <?php
                $allitem1_a = $connect->query("SELECT * FROM folders WHERE id='$f_id'");
                if ($allitem1_a->rowCount() > 0) {
                  $sn1111 = 'A';
                  while ($row1 = $allitem1_a->fetch()) {
                    $folder_id = $row1['id'];
                    $sel_val = "SELECT file_briefcase.brief_id FROM `file_briefcase`
                                    INNER JOIN file_briefcase_folder ON file_briefcase.file_id = file_briefcase_folder.file_id where file_briefcase_folder.folder_id='$folder_id' GROUP BY file_briefcase.brief_id";
                    $statement1_bb = $connect->prepare($sel_val);
                    $statement1_bb->execute();
                    if ($statement1_bb->rowCount() > 0) {
                      $result1_bb = $statement1_bb->fetchAll();
                      $sn1122 = 1;
                      foreach ($result1_bb as $row5) {
                        $breifcase_id = $row5['brief_id'];
                        // $select_breifcase = $connect->prepare("SELECT briefcase FROM briefcase WHERE id=?");
                        // $select_breifcase->execute([$breifcase_id]);
                        // $select_breifcase_id = $select_breifcase->fetchColumn();
                        $editBreifQ = $connect->query("SELECT * FROM editor_data WHERE briefId = '$breifcase_id'");
                        while ($editBData = $editBreifQ->fetch()) {
                          $pageId = $editBData['id'];
                          $createdAt = $editBData['createdAt'];
                          $updatedAt = $editBData['updatedAt'];
                          $createdBy = $editBData['createdBy'];
                          $updatedBy = $editBData['updatedBy'];
                          $editorData = $editBData['editorData'];
                          $editorDataShort = substr($editorData, 0, 20);
                          $editorDataLong = substr($editorData, 20);
                ?>
                          <div class="col-md-4" style="margin:5px;">
                            <div class="card card-hover-shadow h-100" style="padding:10px;">
                              <span style="display:none;"><?php echo $pageId; ?></span>
                              <div style="text-align: end;">
                                <a style="text-decoration:none; color:black; font-size: large;" href="edit-textEditor.php?id=<?php echo $pageId; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                  <i class="bi bi-pencil-square"></i>
                                </a>
                                <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteId=<?php echo $pageId; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                  <i class="bi bi-trash3-fill"></i>
                                </a>
                              </div>
                              <h1 style="float:left;"><?php echo $editBData['pageName']; ?></h1>
                              <div>
                                <?php echo $editorDataShort; ?>....
                                <?php if (strlen($editorData) > 20) { ?>

                                  <a style="color: black;" class="btn btn-soft-secondary" href="pageData.php?id=<?php echo $pageId; ?>">Learn More</a>

                                <?php } ?>
                              </div>
                            </div>
                          </div>
                    <?php
                        }
                      }
                    }
                  }
                }
                $userId = $_SESSION['login_id'];
                $query = $connect->query("SELECT * FROM user_briefcase WHERE user_id = '$userId' AND folderId = '$f_id'");
                while ($result = $query->fetch()) {
                  $userbriefId = $result['id'];
                  $briefPageQuery = $connect->query("SELECT * FROM editor_data WHERE briefId = '$userbriefId'");
                  while ($briefData = $briefPageQuery->fetch()) {
                    $pageId = $briefData['id'];
                    $createdAt = $briefData['createdAt'];
                    $updatedAt = $briefData['updatedAt'];
                    $createdBy = $briefData['createdBy'];
                    $updatedBy = $briefData['updatedBy'];
                    $editorData = $briefData['editorData'];
                    $editorDataShort = substr($editorData, 0, 20);
                    $editorDataLong = substr($editorData, 20);
                    ?>
                    <div class="col-md-4" style="margin:5px;">
                      <div class="card card-hover-shadow h-100" style="padding:10px;">
                        <span style="display:none;"><?php echo $pageId; ?></span>
                        <div style="text-align: end;">
                          <a style="text-decoration:none; color:black; font-size: large;" href="edit-textEditor.php?id=<?php echo $pageId; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                          </a>
                          <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteId=<?php echo $pageId; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                            <i class="bi bi-trash3-fill"></i>
                          </a>
                        </div>
                        <h1 style="float:left;"><?php echo $briefData['pageName']; ?></h1>
                        <div>
                          <?php echo $editorDataShort; ?>....
                          <?php if (strlen($editorData) > 20) { ?>

                            <a style="color: black;" class="btn btn-soft-secondary" href="pageData.php?id=<?php echo $pageId; ?>">Learn More</a>

                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                }
                $result = $connect->query("SELECT * FROM editor_data WHERE folderId='$f_id'");
                while ($data = $result->fetch()) {
                  $pageId = $data['id'];
                  $createdAt = $data['createdAt'];
                  $updatedAt = $data['updatedAt'];
                  $createdBy = $data['createdBy'];
                  $updatedBy = $data['updatedBy'];
                  $editorData = $data['editorData'];
                  $editorDataShort = substr($editorData, 0, 20);
                  $editorDataLong = substr($editorData, 20);
                  ?>
                  <div class="col-md-4" style="margin:5px;">
                    <div class="card card-hover-shadow h-100" style="padding:10px;">
                      <span style="display:none;"><?php echo $pageId; ?></span>
                      <div style="text-align: end;">
                        <a style="text-decoration:none; color:black; font-size: large;" href="edit-textEditor.php?id=<?php echo $pageId; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                        <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteId=<?php echo $pageId; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                          <i class="bi bi-trash3-fill"></i>
                        </a>
                      </div>
                      <h1 style="float:left;"><?php echo $data['pageName']; ?></h1>
                      <div>
                        <?php echo $editorDataShort; ?>....
                        <?php if (strlen($editorData) > 20) { ?>

                          <a style="color: black;" class="btn btn-soft-secondary" href="pageData.php?id=<?php echo $pageId; ?>">Learn More</a>

                        <?php } ?>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>

                <!-- </div> -->
              </div>
            </div>

            <div class="tab-pane fade" id="filelist" role="tabpanel" aria-labelledby="filelist-tab">
              <p>Files tab content...</p>
              <div class="content container-fluid" style="margin-left:-50px;">
                <div class="row justify-content-center" style="width:100%;">

                  <input type="text" id="searchBar" placeholder="Search..." style="width: 80%;" class="form-control">
                  <br>
                  <?php
                  $allitem1_a = $connect->query("SELECT * FROM folders WHERE id='$f_id'");
                  if ($allitem1_a->rowCount() > 0) {
                    $sn1111 = 'A';
                    while ($row1 = $allitem1_a->fetch()) {
                      $folder_id = $row1['id'];
                      $sel_val = "SELECT file_briefcase.brief_id FROM `file_briefcase`
                                    INNER JOIN file_briefcase_folder ON file_briefcase.file_id = file_briefcase_folder.file_id where file_briefcase_folder.folder_id='$folder_id' GROUP BY file_briefcase.brief_id";
                      $statement1_bb = $connect->prepare($sel_val);
                      $statement1_bb->execute();
                      if ($statement1_bb->rowCount() > 0) {
                        $result1_bb = $statement1_bb->fetchAll();
                        $sn1122 = 1;
                        foreach ($result1_bb as $row5) {
                          $breifcase_id = $row5['brief_id'];
                          $file_fetch = "SELECT * FROM file_briefcase WHERE brief_id = '$breifcase_id'";
                          $file_fetch_st = $connect->prepare($file_fetch);
                          $file_fetch_st->execute();
                          if ($file_fetch_st->rowCount() > 0) {
                            $result_file = $file_fetch_st->fetchAll();
                            $sn1 = 'a';
                            foreach ($result_file as $row_file) {
                              $name_file = $row_file['file_id'];
                              $file_data = $connect->prepare("SELECT * FROM `files` WHERE id=?");
                              $file_data->execute([$name_file]);
                              while ($file = $file_data->fetch()) {
                  ?>
                                <div class="col-md-4 card-wrapper" style="margin:5px;">
                                  <div class="card card-hover-shadow h-100" style="padding:10px;">
                                    <span style="display:none;"><?php echo $file_id; ?></span>
                                    <table id="file_table">

                                      <tr>
                                        <td>
                                          <div style="text-align: end;">
                                            <a style="text-decoration:none; color:black; font-size: large;" onclick="document.getElementById('file_id').value='<?php echo $name_file; ?>';
                                 document.getElementById('file').value='<?php echo $file['name']; ?>';" data-bs-toggle="modal" data-bs-target="#editfilelist" data-bs-placement="bottom" title="Edit">
                                              <i class="bi bi-pencil-square"></i></a>
                                            <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteIdgrid=<?php echo $name_file; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                              <i class="bi bi-trash3-fill"></i>
                                            </a>
                                          </div>
                                        </td>
                                      <tr>
                                    </table>

                                    <h1 style="float:left;"><?php echo $file['name']; ?></h1>

                                  </div>
                                </div>
                            <?php
                              }
                            }
                          }
                          $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$breifcase_id'");
                          while ($brefData = $fetchBrief->fetch()) {
                            $fileId = $brefData['id'];
                            $fileName = $brefData['filename'];
                            ?>
                            <div class="col-md-4 card-wrapper" style="margin:5px;">
                              <div class="card card-hover-shadow h-100" style="padding:10px;">
                                <span style="display:none;"><?php echo $fileId; ?></span>
                                <table id="file_table">

                                  <tr>
                                    <td>
                                      <div style="text-align: end;">
                                        <a style="text-decoration:none; color:black; font-size: large;" onclick="document.getElementById('file_id').value='<?php echo $fileId; ?>';
                                 document.getElementById('file').value='<?php echo $fileName; ?>';" data-bs-toggle="modal" data-bs-target="#editfilelist" data-bs-placement="bottom" title="Edit">
                                          <i class="bi bi-pencil-square"></i></a>
                                        <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteIdgrid=<?php echo $fileId; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                          <i class="bi bi-trash3-fill"></i>
                                        </a>
                                      </div>
                                    </td>
                                  <tr>
                                </table>

                                <h1 style="float:left;"><?php echo $fileName; ?></h1>

                              </div>
                            </div>
                          <?php
                          }
                        }
                      }
                      $userId = $_SESSION['login_id'];
                      $query = $connect->query("SELECT * FROM user_briefcase WHERE user_id = '$userId' AND folderId = '$f_id'");
                      while ($result = $query->fetch()) {
                        $userbriefId = $result['id'];
                        $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId'");
                        while ($brefData = $fetchBrief->fetch()) {
                          $fileID = $brefData['id'];
                          $fileName = $brefData['filename'];
                          ?>
                          <div class="col-md-4 card-wrapper" style="margin:5px;">
                            <div class="card card-hover-shadow h-100" style="padding:10px;">
                              <span style="display:none;"><?php echo $fileId; ?></span>
                              <table id="file_table">

                                <tr>
                                  <td>
                                    <div style="text-align: end;">
                                      <a style="text-decoration:none; color:black; font-size: large;" onclick="document.getElementById('file_id').value='<?php echo $fileId; ?>';
                                 document.getElementById('file').value='<?php echo $fileName; ?>';" data-bs-toggle="modal" data-bs-target="#editfilelist" data-bs-placement="bottom" title="Edit">
                                        <i class="bi bi-pencil-square"></i></a>
                                      <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteIdgrid=<?php echo $fileId; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                        <i class="bi bi-trash3-fill"></i>
                                      </a>
                                    </div>
                                  </td>
                                <tr>
                              </table>

                              <h1 style="float:left;"><?php echo $fileName; ?></h1>

                            </div>
                          </div>
                    <?php
                        }
                      }
                    }
                  }
                  $fetchBrief = $connect->query("SELECT * FROM user_files WHERE folderId = '$f_id'");
                  while ($brefData = $fetchBrief->fetch()) {
                    $fileId = $brefData['id'];
                    $fileName = $brefData['filename'];
                    $fileLastName = $brefData['lastName'];
                    ?>
                    <div class="col-md-4 card-wrapper" style="margin:5px;">
                      <div class="card card-hover-shadow h-100" style="padding:10px;">
                        <span style="display:none;"><?php echo $fileId; ?></span>
                        <table id="file_table">

                          <tr>
                            <td>
                              <div style="text-align: end;">
                                <a style="text-decoration:none; color:black; font-size: large;" onclick="document.getElementById('file_id').value='<?php echo $fileId; ?>';
                                 document.getElementById('file').value='<?php echo $fileName; ?>';" data-bs-toggle="modal" data-bs-target="#editfilelist" data-bs-placement="bottom" title="Edit">
                                  <i class="bi bi-pencil-square"></i></a>
                                <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteIdgrid=<?php echo $fileId; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                  <i class="bi bi-trash3-fill"></i>
                                </a>
                              </div>
                            </td>
                          <tr>
                        </table>

                        <h1 style="float:left;"><?php echo $fileName; ?></h1>

                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </center>


      </div>

    </main>
  

  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-black" style="right:0px !important;top:0px;left: inherit;border-left: 1px solid white;">
    <div class="navbar-vertical-container">
      <div class="navbar-vertical-footer-offset" style="height:auto;">

        <!-- Content -->
        <div class="navbar-vertical-content">
          <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

            <div id="navbarVerticalMenuPagesMenu">

              <div class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>Library/grid_view.php" role="button" aria-expanded="false">

                  <span style="color:white;" class="nav-link-title">Grid View</span>
                </a>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </aside>
  <script>
    document.getElementById("searchBar").addEventListener("input", function() {
      var input = this.value.toLowerCase();
      var cards = document.getElementsByClassName("card");

      Array.from(cards).forEach(function(card) {
        var fileData = card.getElementsByTagName("h1")[0].textContent.toLowerCase();
        if (fileData.includes(input)) {
          card.style.display = "block";
        } else {
          card.style.display = "none";
        }
      });
    });
  </script>

  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>

</html>