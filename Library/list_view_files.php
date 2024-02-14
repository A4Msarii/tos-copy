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
    .container 
    {
        border: 1px solid #13131354; 
        margin-top: 20px; 
        background-color:#cf1ecf4a;
        border-radius: 10px;
        box-shadow: 12px 11px 20px 5px grey;;
    }
</style>
<body>
<?php include 'lb_loader.php';?>
<div id="header-hide">
    <?php include('./grid_header.php');
    if (isset($_REQUEST['bId'])) {
        $_SESSION['page_ID'] = $_REQUEST['bId'];
    }
    if (isset($_REQUEST['pId'])) {
        $_SESSION['page_ID'] = $_REQUEST['pId'];
    }
    if (isset($_REQUEST['folderId'])) {
        $f_id = $_SESSION['folderId'];
    }
    if (isset($_REQUEST['briefId'])) {
        $b_id = $_SESSION['briefId'];
    }
    ?>
</div>
        <main id="content" role="main" class="main" style="display:none;">

            
               <center>
            <div class="container container-fluid" style="display:none;">
                
                <input type="text" id="searchBar" placeholder="Search..." style="width: 70%; margin-left:5px; margin-top:20px;" class="form-control">
                <div class="row justify-content-center">
                    
                            <div style="margin-top: 5%;margin-left:1%;text-align:justify;margin-right:1%; margin-top:-1px; margin-bottom:10px;">
                                <?php
                                $result = $connect->query("SELECT * FROM user_files WHERE folderId='$f_id'");
                                while ($data = $result->fetch()) {
                                    $fileId = $data['id'];
                                    $file = $data['filename'];

                                ?>
                                <div class="col-lg-12" style="margin:10px;">
                                  <div class="card card-hover-shadow h-100" style="padding:10px;">
                                    <span style="display:none;"><?php echo $fileId;?></span>
                                    <div style="text-align: end;">
                                        <a style="text-decoration:none; color:black; font-size: large;" onclick="document.getElementById('file_id').value='<?php echo $fileId; ?>';
                                                                           document.getElementById('file').value='<?php echo $data['filename']; ?>';" data-bs-toggle="modal" data-bs-target="#editfilelist" data-bs-placement="bottom" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteIdfiles=<?php echo $fileId; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                        <i class="bi bi-trash3-fill"></i>
                                        </a>
                                    </div>
                                    <h1 style="float:left;"><?php echo $data['filename']; ?></h1>
                                </div>
                            </div>
                                <?php
                                }
                                ?>
                            
                    </div>
                </div>
            
            </div>
        </center>

        </main>
    

    <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <!-- Page Header -->
        <!-- <div class="page-header page-header-light">
          <h1 style="color:black;">DashBoard</h1>
        </div> -->
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem; width:90%;" >

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd; background-color: var(--primary-background-color);">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
              <h1 class="text-light">Files/Pages Gallery</h1>
            </div>
            <center>
            <div class="card-header card-header-content-between justify-content-center" style="border-bottom: 2px solid lightgray;">
              <!-- Nav -->
                
                    <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="nav-one-eg2-tab" href="#nav-one-eg2" data-bs-toggle="pill" data-bs-target="#nav-one-eg2" role="tab" aria-controls="nav-one-eg2" aria-selected="true">
                          <div class="d-flex align-items-center text-light" style="font-size:large;">
                            Pages
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="nav-two-eg2-tab" href="#nav-two-eg2" data-bs-toggle="pill" data-bs-target="#nav-two-eg2" role="tab" aria-controls="nav-two-eg2" aria-selected="false">
                          <div class="d-flex align-items-center text-light" style="font-size:large;">
                            Files
                          </div>
                        </a>
                      </li>
                    </ul>
                
                    <!-- End Nav -->

            </div>
            </center>
        <div class="tab-content">
  <div class="tab-pane fade show active" id="nav-one-eg2" role="tabpanel" aria-labelledby="nav-one-eg2-tab">

            <div class="card-header card-header-content-between" style="border-bottom:none;">
              <h1 class="text-light">Page Gallery</h1>
              <!-- Nav -->
            <div class="text-center">
              <ul class="nav nav-segment nav-pills mb-7 bg-dark" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="listviewpage-tab" href="#listviewpage" data-bs-toggle="pill" data-bs-target="#listviewpage" role="tab" aria-controls="listviewpage" aria-selected="true"><i data-bs-toggle="tooltip" data-bs-placement="bottom" title="List View" class="bi bi-card-list"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="gridviewpage-tab" href="#gridviewpage" data-bs-toggle="pill" data-bs-target="#gridviewpage" role="tab" aria-controls="gridviewpage" aria-selected="false"><i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Grid View" class="bi bi-grid-3x3-gap-fill"></i></a>
                </li>
              </ul>
            </div>
<!-- End Nav -->

            </div>

            <!-- Body -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="listviewpage" role="tabpanel" aria-labelledby="listviewpage-tab">
            <div class="card-body">
                  <!-- Stats -->
                  <div class="row">
                       <center>
                        <input type="text" id="searchBar" placeholder="Search..." style="width: 80%; margin-top:-40px; background-color:black;" class="form-control"></center><br>
                    <div class="col-lg-12">
                      <!-- Card -->
                      <div class="card card-hover-shadow h-100" href="actual.php" style="background-color: var(--primary-background-color); border: none;">
                        <div class="card-body">
                          <h1 class="card-subtitle text-light" style="font-size:large; font-weight: bold;">List View</h1>
                          <hr class="text-light">

                          <div class="row align-items-center gx-2 mb-1">

                                 List view
              
                          </div>
                          <!-- End Row -->
                        </div>
                      </div>
                      <!-- End Card -->
                    </div>
                  </div>
              </div>
                  <!-- End Stats -->
                </div>
            <!--grid view tab for pages-->
                <div class="tab-pane fade" id="gridviewpage" role="tabpanel" aria-labelledby="gridviewpage-tab">
                    <div class="card-body">
                  <!-- Stats -->
                  <div class="row">
                    <center>
                    <input type="text" id="searchBar" placeholder="Search..." style="width: 80%; margin-top:-40px; background-color:black;" class="form-control"></center><br>
                    <div class="col-lg-12">
                      <!-- Card -->
                      <div class="card card-hover-shadow h-100" href="actual.php" style="border:none;background-color: var(--primary-background-color);">
                        <div class="card-body">
                          <h1 class="card-subtitle text-light" style="font-size:large; font-weight: bold;">Grid View</h1>
                          <hr class="text-light">

                          <div class="row align-items-center gx-2 mb-1">
                           
                           Grid view
                            
                          </div>
                          <!-- End Row -->
                        </div>
                      </div>
                      <!-- End Card -->
                    </div>
                  </div>
              </div>
                  <!-- End Stats -->
                </div>
            </div>
              <!-- End Card -->
        </div>



        <!--File tab-->
        <div class="tab-pane fade" id="nav-two-eg2" role="tabpanel" aria-labelledby="nav-two-eg2-tab">
            
             <div class="card-header card-header-content-between" style="border-bottom:none;">
              <h1 class="text-light">File Gallery</h1>
              <!-- Nav -->
            <div class="text-center">
              <ul class="nav nav-segment nav-pills mb-7 bg-dark" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="listviewfile-tab" href="#listviewpage" data-bs-toggle="pill" data-bs-target="#listviewfile" role="tab" aria-controls="listviewfile" aria-selected="true"><i class="bi bi-grid-3x3-gap-fill"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="gridviewfile-tab" href="#gridviewfile" data-bs-toggle="pill" data-bs-target="#gridviewfile" role="tab" aria-controls="gridviewfile" aria-selected="false"><i class="bi bi-card-list"></i></a>
                </li>
              </ul>
            </div>
        </div>
<!-- End Nav -->

             <!-- Body -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="listviewfile" role="tabpanel" aria-labelledby="listviewfile-tab">
            <div class="card-body">
                  <!-- Stats -->
                  <div class="row">
                    <center>
                        <input type="text" id="searchBar" placeholder="Search..." style="width: 80%; margin-top:-40px; background-color: black; color:white;" class="form-control">
                    </center><br>
                    <div class="col-lg-12">
                      <!-- Card -->
                      <div class="card card-hover-shadow h-100" href="actual.php" style="border:none;background-color: var(--primary-background-color);">
                        <div class="card-body">
                          <h1 class="card-subtitle text-light" style="font-size:large; font-weight: bold;">List View</h1>
                          <hr class="text-light">

                          <div class="row align-items-center gx-2 mb-1">

                            
              

                <div>
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
                              <div class="row justify-content-center">

                                <div style="margin-top: 5%;margin-left:1%;text-align:justify;margin-right:1%; margin-top:-1px; margin-bottom:10px;">

                                  <div class="col-lg-12" style="margin:10px;">
                                    <div class="card card-hover-shadow h-100" style="padding:10px; background-color: var(--primary-background-color);">
                                      <span style="display:none;"><?php echo $fileId; ?></span>
                                      <div style="text-align: end;">
                                        <a style="text-decoration:none; color:black; font-size: large;" onclick="document.getElementById('file_id').value='<?php echo $name_file; ?>';
                                                         document.getElementById('file').value='<?php echo $data['name']; ?>';" data-bs-toggle="modal" data-bs-target="#editfilelist" data-bs-placement="bottom" title="Edit">
                                          <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteIdfiles=<?php echo $name_file; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                          <i class="bi bi-trash3-fill"></i>
                                        </a>
                                      </div>
                                      <h1 style="float:left;" class="text-light"><?php echo $file['name']; ?></h1>
                                    </div>
                                  </div>


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
                          <div class="row justify-content-center">

                            <div style="margin-top: 5%;margin-left:1%;text-align:justify;margin-right:1%; margin-top:-1px; margin-bottom:10px;">

                              <div class="col-lg-12" style="margin:10px;">
                                <div class="card card-hover-shadow h-100" style="padding:10px; background-color: var(--primary-background-color);">
                                  <span style="display:none;"><?php echo $fileId; ?></span>
                                  <div style="text-align: end;">
                                    <a style="text-decoration:none; color:black; font-size: large;" onclick="document.getElementById('file_id').value='<?php echo $fileId; ?>';
                         document.getElementById('file').value='<?php echo $data['filename']; ?>';" data-bs-toggle="modal" data-bs-target="#editfilelist" data-bs-placement="bottom" title="Edit">
                                      <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteIdfiles=<?php echo $fileId; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                      <i class="bi bi-trash3-fill"></i>
                                    </a>
                                  </div>
                                  <h1 style="float:left;" class="text-light"><?php echo $fileName; ?></h1>
                                </div>
                              </div>


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
                        <div class="row justify-content-center">

                          <div style="margin-top: 5%;margin-left:1%;text-align:justify;margin-right:1%; margin-top:-1px; margin-bottom:10px;">

                            <div class="col-lg-12" style="margin:10px;">
                              <div class="card card-hover-shadow h-100" style="padding:10px; background-color: var(--primary-background-color);">
                                <span style="display:none;"><?php echo $fileID; ?></span>
                                <div style="text-align: end;">
                                  <a style="text-decoration:none; color:black; font-size: large;" onclick="document.getElementById('file_id').value='<?php echo $fileID; ?>';
                         document.getElementById('file').value='<?php echo $data['filename']; ?>';" data-bs-toggle="modal" data-bs-target="#editfilelist" data-bs-placement="bottom" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                  </a>
                                  <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteIdfiles=<?php echo $fileID; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                    <i class="bi bi-trash3-fill"></i>
                                  </a>
                                </div>
                                <h1 style="float:left;" class="text-light"><?php echo $fileName; ?></h1>
                              </div>
                            </div>


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
                  <div class="row justify-content-center" style="margin-left:50px;">

                    <div style="margin-top: 5%;margin-left:1%;text-align:justify;margin-right:1%; margin-top:-1px; margin-bottom:10px;">

                      <div class="col-lg-12" style="margin:10px;">
                        <div class="card card-hover-shadow h-100" style="padding:10px; background-color: var(--primary-background-color);">
                          <span style="display:none;"><?php echo $fileId; ?></span>
                          <div style="text-align: end;">
                            <a style="text-decoration:none; color:black; font-size: large;" onclick="document.getElementById('file_id').value='<?php echo $fileId; ?>';
                         document.getElementById('file').value='<?php echo $data['filename']; ?>';" data-bs-toggle="modal" data-bs-target="#editfilelist" data-bs-placement="bottom" title="Edit">
                              <i class="bi bi-pencil-square"></i>
                            </a>
                            <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteIdfiles=<?php echo $fileId; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                              <i class="bi bi-trash3-fill"></i>
                            </a>
                          </div>
                          <h1 style="float:left;" class="text-light"><?php echo $fileName; ?></h1>
                        </div>
                      </div>


                    </div>
                  </div>
                <?php
                }
                ?>

                </div>
              
                          </div>
                          <!-- End Row -->
                        </div>
                      </div>
                      <!-- End Card -->
                    </div>
                  </div>
              </div>
                  <!-- End Stats -->
                </div>
            <!--grid view tab for pages-->
                <div class="tab-pane fade" id="gridviewfile" role="tabpanel" aria-labelledby="gridviewfile-tab">
                    <div class="card-body">
                  <!-- Stats -->
                  <div class="row">
                    <center>
                        <input type="text" id="searchBar" placeholder="Search..." style="width: 80%; margin-top:-40px; background-color: black; color:white;" class="form-control">
                    </center><br>
                    <div class="col-lg-12">
                      <!-- Card -->
                      <div class="card card-hover-shadow h-100" href="actual.php" style="border:none;background-color: var(--primary-background-color);">
                        <div class="card-body">
                          <h1 class="card-subtitle text-light" style="font-size:large; font-weight: bold;">Grid View</h1>
                          <hr class="text-light">

                          <div class="row align-items-center">
                           <div class="row">
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
                                <div class="col-md-3" style="margin:5px;">
                                  <div class="card card-hover-shadow h-100" style="padding:10px; background-color: var(--primary-background-color);">
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

                                    <h1 style="float:left;" class="text-light"><?php echo $file['name']; ?></h1>

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
                            <div class="col-md-3" style="margin:5px;">
                              <div class="card card-hover-shadow h-100" style="padding:10px; background-color: var(--primary-background-color);">
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

                                <h1 style="float:left;" class="text-light"><?php echo $fileName; ?></h1>

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
                          <div class="col-md-3" style="margin:5px;">
                            <div class="card card-hover-shadow h-100" style="padding:10px; background-color: var(--primary-background-color);">
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

                              <h1 style="float:left;" class="text-light"><?php echo $fileName; ?></h1>

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
                    <div class="col-md-4" style="margin:5px;">
                      <div class="card card-hover-shadow h-100" style="padding:10px; background-color:var(--primary-background-color);">
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

                        <h1 style="float:left;" class="text-light"><?php echo $fileName; ?></h1>

                      </div>
                    </div>
                  <?php
                  }
                  ?>
                           </div>
                            
                          </div>
                          <!-- End Row -->
                        </div>
                      </div>
                      <!-- End Card -->
                    </div>
                  </div>
              </div>
                  <!-- End Stats -->
                </div>
            </div>

            </div>
        </div>
    </div>
            </div>
            <!-- End Content -->

  </main>


 <!--Edit file modal-->
  <div class="modal fade" id="editfilelist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">Edit File</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo BASE_URL; ?>Library/editUserFiles.php" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="fileId" value="" id="file_id" readonly>
            <label style="color:black; font-weight:bold; margin:5px;">File Name</label>
            <input type="text" class="form-control" name="fileName1" value="" id="file"><br>
            <input type="file" class="form-control" name="fileName" value="" id="file">
            <br>
            <input style="float:right;" class="btn btn-soft-dark" type="submit" name="submitfileadmin" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

<script>
  setTimeout(function(){
    document.getElementById('info-message27').style.display = 'none';
    /* or
    var item = document.getElementById('info-message')
    item.parentNode.removeChild(item); 
    */
  }, 4000);
</script>

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