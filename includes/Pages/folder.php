<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Folders</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                    initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>
<style type="text/css">
  tr:hover {
    background-color: #accbec6b;
  }
</style>
<body>
 
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>

<div id="header-hide">
  <?php
  include ROOT_PATH . 'includes/head_navbar.php';
  $course = "";
  $ctp = "";
  ?></div>
<!--Input Phases-->
<!--Main contect We need to insert data here-->
<main id="content" role="main" class="main">

  <!-- Content -->
  <div class="content container-fluid" style="margin-top:70px;">

    <div class="row justify-content-center">

      <div class="col-lg-12 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
          <!-- Header -->

          <!-- End Header -->

          <!-- Body -->
          <div class="card-body">
            <div>
              <h3>Folder</h3>
            </div>
           
            <center>
              <form class="insert-folder" id="folder_form" method="post" action="insert_folder.php" style="width:700px;">
                <div class="input-field">
                  <table class="table table-bordered" id="table-field-folder">
                    <tr>
                      <td style="text-align: center;"><input type="text" placeholder="Enter Folder" name="folder[]" id="folderval" class="form-control" value="" required /> </td>
                      <td style="width:20px;"><button type="button" name="add_folder" id="add_folder" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                    </tr>
                  </table>
                </div>
                <center>
                  <button style="margin:5px;" class="btn btn-success" type="submit" id="folder_submit" name="savesfolder">Submit</button>
                </center>
              </form>
            </center>

            <!--Phase Table-->

            <table class="table table-striped table-bordered" id="foldertable">
              <input class="form-control" type="text" id="foldersearch" onkeyup="folder()" placeholder="Search for Folder.." title="Type in a name"><br>
              <thead class="bg-dark">
                <th class="text-light">Sr No</th>
                <th class="text-light">Folder</th>
                <th class="text-light">Files & Briefcase</th>
                <th class="text-light">Action</th>
              </thead>
              <?php
              // $output ="";
              $query1_bb = "SELECT * FROM folders";
              $statement1_bb = $connect->prepare($query1_bb);
              $statement1_bb->execute();
              if ($statement1_bb->rowCount() > 0) {
                $result1_bb = $statement1_bb->fetchAll();
                $sn = 1;
                foreach ($result1_bb as $row) {
                  $id = $row['id']; ?>
                  <tr>
                    <td style="width:50px;"><?php echo $sn++; ?></td>
                    <td><a style="color:black; text-decoration:underline;" onclick="document.getElementById('fol_id').value='<?php echo $row['id'] ?>';" type="button" data-bs-toggle="modal" data-bs-target="#selectbriefcase"><?php echo $row['folder'] ?></a></td>
                    <td>
                      <?php
                      $name = "SELECT * FROM file_briefcase_folder where folder_id='$id'";
                      $stname2 = $connect->prepare($name);
                      $stname2->execute();
                      $a = 0;
                      $ard = array();
                      $fileNameArray = array();
                      $file = 0;
                      $i = 0;

                      if ($stname2->rowCount() > 0) {
                        $rename2 = $stname2->fetchAll();
                        foreach ($rename2 as $rowname2) {
                          // echo $rowname2['file_id'];
                          $fileId = $rowname2['file_id'];
                          $fileNameArray[$file] = $rowname2['file_id'];
                          $file++;
                          // $briefcase = "SELECT * FROM file_briefcase where file_id='$fileId'";
                          $breifQuery = $connect->query("SELECT * FROM file_briefcase where file_id='$fileId'");
                          while ($breifResult = $breifQuery->fetch()) {
                            if (!in_array($breifResult['brief_id'], $ard)) {
                              $ard[$a] = $breifResult['brief_id'];
                              $a++;
                            }
                          }
                        }
                        $sn10 = 1;
                        for ($i = 0; $i < count($ard); $i++) {
                          $unFile = '';
                          $breifId = $ard[$i];
                          $showBreifQuery = $connect->query("SELECT * FROM briefcase where id='$breifId'");
                      ?>
                          <details>
                            <summary>
                              <ul style="display:inline-block; text-decoration:none;">
                                <li style="text-decoration:none; display:inline-block;">
                                  <?php

                                  while ($breifResult = $showBreifQuery->fetch()) {

                                  ?>
                                    <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                                    <span style="font-size:15px; font-weight:bold; color:white; background-color:#7800c0; padding:5px;"><?php echo $breifResult['briefcase'];
                                                                                                                                        $bid = $breifResult['id']; ?></span>
                                    <a href="remove_breifcase_folder.php?id=<?php echo $breifId ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                  <?php
                                  }
                                  ?>
                                </li>
                              </ul>
                            </summary>
                            <?php
                            $snnn = 'a';
                            for ($file = 0; $file < count($fileNameArray); $file++) {
                              $fId = $fileNameArray[$file];
                              $showFile = $connect->query("SELECT * FROM file_briefcase where file_id='$fId'");
                              if ($showFile->rowCount() > 0) {
                                while ($breifR = $showFile->fetch()) {
                                  if ($bid == $breifR['brief_id']) {
                                    $serchFileId = $breifR['file_id'];
                                    $serchFile = $connect->query("SELECT * FROM files where id='$serchFileId'");

                                    while ($fileR = $serchFile->fetch()) {
                            ?>
                                      <ul style="margin-left:40px">
                                        <li style="text-decoration:none; display:inline-block ;">
                                          <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                          <span style="color:#7800c0; text-decoration-line: underline; text-decoration-color:black;"><?php echo $fileR['name']; ?></span>
                                        </li>
                                        <a href="delete_files_brief_folder.php?id=<?php echo $serchFileId ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                      </ul>
                            <?php
                                    }
                                  }
                                }
                              } else {
                                $unFile = $fId;
                              }
                            }
                            ?>
                          </details>
                          <?php
                        }
                        if (isset($unFile)) {
                          $shoeUnFile = $connect->query("SELECT * FROM files where id='$unFile'");
                          while ($fileR = $shoeUnFile->fetch()) {
                          ?>
                            <ul style="margin-left:40px; text-decoration:none;">
                              <li style="text-decoration:none; display:inline-block ;">
                                <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                <span style="color:#c299ff"><?php echo $fileR['name']; ?></span>

                              </li>
                              <a href="delete_files_brief_folder.php?id=<?php echo $unFile ?>"><i class="bi bi-x-circle text-danger"></i></a>
                            </ul>
                      <?php
                          }
                        }
                      }
                      ?>

                    </td>
                    <td><a href="" style="margin: 10px;" onclick="document.getElementById('folder_id').value='<?php echo $id = $row['id'] ?>';
                                                             document.getElementById('folder').value='<?php echo $row['folder'] ?>';" data-bs-toggle="modal" data-bs-target="#editfolder"><i class="bi bi-pen-fill text-success"></i>
                      </a>
                      <a href="folder_delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill text-danger"></i></a>

                    </td>
                  </tr>
                <?php
                }
              } else { ?>
                <tr>
                  <td colspan='5' style="text-align:center">
                    No data
                  </td>
                </tr>
              <?php }
              ?>
            </table>

          </div>
          <!-- End Body -->
        </div>
        <!-- End Card -->
      </div>
    </div>
    <!-- End Row -->
  </div>
  <!-- End Content -->

</main>




<!--Edit folder modal-->
<div class="modal fade" id="editfolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Folder</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="edit_folder.php">
          <input type="hidden" class="form-control" name="id" value="" id="folder_id" readonly>
          <label style="color:black; font-weight:bold; margin:5px;">Folder</label>
          <input type="text" class="form-control" name="folder" value="" id="folder">
          <br>
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<!--Edit briefcase modal-->
<div class="modal fade" id="selectbriefcase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Select Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="add_folder_brief.php" enctype="multipart/form-data">
          <input type="hidden" id="fol_id" name="fol_id">
          <table class="table table-bordered src-table1" id="itemtablesearch">
            <input class="form-control" type="text" id="searchfolder" onkeyup="folder_Search()" placeholder="Search for Item.." title="Type in a name"><br>

            <tbody>
              <?php
              $breifcase_fetch = "SELECT *,count(`id`) as breifcase_count FROM file_briefcase group by brief_id";
              $stbreifcase_fetch2 = $connect->prepare($breifcase_fetch);
              $stbreifcase_fetch2->execute();

              if ($stbreifcase_fetch2->rowCount() > 0) {
                $rebreifcase_fetch2 = $stbreifcase_fetch2->fetchAll();
                $snss = '1';
                foreach ($rebreifcase_fetch2 as $rowbreifcase_fetch2) {
                  $breif_count = $rowbreifcase_fetch2['breifcase_count'];
                  $name_brief1 = $rowbreifcase_fetch2['brief_id'];
                  $file_value = $rowbreifcase_fetch2['file_id'];
                  $breif_name = $connect->prepare("SELECT briefcase FROM `briefcase` WHERE id=?");
                  $breif_name->execute([$name_brief1]);
                  $breifcase_name = $breif_name->fetchColumn();
                  $sql = "SELECT COUNT(file_briefcase_folder.id) as count_id
                  FROM file_briefcase_folder
                  INNER JOIN file_briefcase ON file_briefcase_folder.file_id = file_briefcase.file_id
                  WHERE file_briefcase.brief_id = :id";
                  $stmt = $connect->prepare($sql);
                  $stmt->bindParam(':id', $name_brief1, PDO::PARAM_INT);
                  $stmt->execute();
                  $result10 = $stmt->fetch(PDO::FETCH_ASSOC);

                  $count = $result10['count_id'];
                  if ($count != $breif_count) {

              ?>
                    <details>
                      <summary>
                        <ul style="display:inline-block;list-style-type:circle;" id="ulsearchlist">
                          <li style="text-decoration:none; display:inline-block;">
                            <input type="checkbox" class="parent_checkbox" data-created="<?php echo $rowbreifcase_fetch2['brief_id'] ?>" value="<?php echo $rowbreifcase_fetch2['brief_id'] ?>" />
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                            <?php echo '<span style="font-size:large; font-weight:bolder; color:white; background-color:#7800c0; padding:5px;">' . $breifcase_name . '</span>'; ?>
                          </li>
                        </ul>
                      </summary>
                      <?php
                      $file_fetch = "SELECT * FROM file_briefcase WHERE brief_id = '$name_brief1'";
                      $file_fetch_st = $connect->prepare($file_fetch);
                      $file_fetch_st->execute();
                      if ($file_fetch_st->rowCount() > 0) {
                        $result_file = $file_fetch_st->fetchAll();
                        $sn1 = 'a';
                        foreach ($result_file as $row_file) {
                          $name_file = $row_file['file_id'];
                          $file_name = $connect->prepare("SELECT name FROM `files` WHERE id=?");
                          $file_name->execute([$name_file]);
                          $filesnamees = $file_name->fetchColumn();
                          $sql2 = "SELECT count(*) FROM `file_briefcase_folder` WHERE file_id = ?";
                          $result2 = $connect->prepare($sql2);
                          $result2->execute([$name_file]);
                          $number_of_rows = $result2->fetchColumn();
                          if ($number_of_rows == 0) {

                      ?>

                            <ul style="margin-left:40px">
                              <li style="text-decoration:none; display:inline-block;">

                                <input type="checkbox" class="checkbox<?php echo $rowbreifcase_fetch2['brief_id'] ?>" id="<?php echo $rowbreifcase_fetch2['brief_id'] ?>" onclick="javascript:testId(this.id)" name="foid[]" value="<?php echo $row_file['file_id'] ?>" />
                                <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                <?php echo '<span style="color:#9540e4; text-decoration-line:underline;" class="btn-soft"> ' . $filesnamees . '</span>'; ?>
                              </li>
                            </ul>

                      <?php }
                        }
                      } ?>
                    </details>
              <?php }
                }
              }
              ?>
              <?php
              $allitem1_a = "SELECT * FROM files";
              $statement1_a = $connect->prepare($allitem1_a);
              $statement1_a->execute();
              if ($statement1_a->rowCount() > 0) {
                $result1_a = $statement1_a->fetchAll();
                $sn = 1;
                foreach ($result1_a as $row1) {
                  $f_id = $row1['id'];
                  $sql1 = "SELECT count(*) FROM `file_briefcase_folder` WHERE file_id = ?";
                  $result1 = $connect->prepare($sql1);
                  $result1->execute([$f_id]);
                  $number_of_rows1 = $result1->fetchColumn();

                  $check_file = "SELECT * FROM file_briefcase where file_id='$f_id'";
                  $check_filest = $connect->prepare($check_file);
                  $check_filest->execute();
                  if ($check_filest->rowCount() <= 0 && $number_of_rows1 == 0) { ?>

                    <ul style="margin-left:40px">
                      <tr>
                        <td>
                          <li style="text-decoration:none; display:inline-block ;"><input type="checkbox" name="foid[]" value="<?php echo $row1['id'] ?>" />
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                            <span style="color:#c299ff;">
                              <?php echo $item_id1_a = $row1['name']; ?></span>
                          </li>
                        </td>
                      </tr>
                    </ul>
              <?php }
                }
              }
              ?>
            </tbody>

          </table>
          <hr>
          <input type="submit" class="btn btn-success" value="Add" style="float:right;">
      </div>
      </form>
    </div>
  </div>
</div>



<!--Script for add multiple phases-->

<!-- <script type="text/javascript">
  function folder_Search() {
  var input, filter, ul, li, i, txtValue;
  input = document.getElementById("searchfolder");
  filter = input.value.toUpperCase();
  ul = document.getElementById("ulsearchlist");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    txtValue = li[i].textContent || li[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

</script> -->

<script type="text/javascript">
  function folder_Search() {
    // Get input value and convert to lowercase
    var input = document.getElementById("searchfolder");
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
        } else {
          item.style.display = "none";
        }
      }
    }
  }
</script>

<script>
  function folder() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("foldersearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("foldertable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
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
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.display === "block") {
        content.style.display = "none";
      } else {
        content.style.display = "block";
      }
    });
  }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var html = '<tr>\
                          <td style="text-align: center;"><input type="text" placeholder="Enter Folder" name="folder[]" id="foldersval" class="form-control" value="" required/> </td>\
                          <td style="width:20px;"><button type="button" name="remove_folder" id="remove_folder" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                        </tr>'
    var max = 100;
    var a = 1;

    $("#add_folder").click(function() {
      if (a <= max) {
        $("#table-field-folder").append(html);
        a++;
      }
    });
    $("#table-field-folder").on('click', '#remove_folder', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
  $(document).on("click", ".parent_checkbox", function() {
    var class1 = $(this).data("created");
    var checkboxes = document.getElementsByClassName('checkbox' + class1);
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;
      // $("."+class1).prop("checked", true);
    }

  });
  // $(document).on("click","checkbox",function()
  // {
  //   alert("hello");
  // });

  function testId(id) {

    // Select the checkbox with the custom attribute "data-custom-attribute" set to "my-custom-attribute"
    $('input[type="checkbox"][data-created="' + id + '"]').prop('checked', true);

  }
</script>

<script>
  function file() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("file");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
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

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>