<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Shops</title>
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
class="form-label text-dark"
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
              <h3>Shop</h3>
            </div>
            <div id="info-files">
              <?php
              if (isset($_REQUEST['error'])) {
                $error = $_REQUEST['error'];
                echo $error;
              }
              ?></div>
            <center>
              <form class="insert-file" id="file_form" method="post" action="insert_shops.php" enctype="multipart/form-data" style="width:700px;">
                <div class="input-field">
                  <table class="table table-bordered" id="table-field-shop">
                    <tr>

                      <td style="text-align: center;"><input type="file" placeholder="Enter Name" name="file[]" id="val" class="form-control" value="" /> </td>
                      <td style="text-align: center;"><input type="text" placeholder="Enter Shop" name="shop[]" class="form-control" value="" required /> </td>
                      <td style="width:20px;"><button type="button" name="add_shop" id="add_shop" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                    </tr>
                  </table>
                </div>
                <center>
                  <button style="margin:5px;" class="btn btn-success" type="submit" id="shop_submit" name="saveshop">Submit</button>
                </center>
              </form>
            </center>

            <!--Phase Table-->

            <table class="table table-striped table-bordered" id="shops">
              <input style="margin:5px;" class="form-control" type="text" id="shopsearch" onkeyup="shop()" placeholder="Search for Shops.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-light">Sr No</th>
                <th class="text-light">Image</th>
                <th class="text-light">Shop Names</th>
                <th class="text-light">Folders</th>
                <th class="text-light">Action</th>
              </thead>
              <?php
              // $output ="";
              $query1_ff = "SELECT * FROM shops";
              $statement1_ff = $connect->prepare($query1_ff);
              $statement1_ff->execute();
              if ($statement1_ff->rowCount() > 0) {
                $result1_ff = $statement1_ff->fetchAll();
                $sn = 1;
                foreach ($result1_ff as $row) {
                  $filename = "";
                  $shopesid = $row['id']; ?>
                  <tr>
                    <td style="width:50px;"><?php echo $sn++; ?></td>
                    <td><?php
                        $image_shop = $row['image'];
                        if ($image_shop != null) {
                          $pic111 = BASE_URL . 'includes/Pages/shops/' . $image_shop;
                        } else {
                          $pic111 = BASE_URL . 'includes/Pages/shops/avtar.png';
                        }
                        ?>
                      <div class="avatar avatar-sm avatar-circle">
                        <img class="avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">
                      </div>
                    </td>
                    <td><a style="color:black; text-decoration:underline;" onclick="document.getElementById('shid').value='<?php echo $row['id'] ?>';" type="button" data-bs-toggle="modal" data-bs-target="#selectfolder"><?php echo $row['shops'] ?></a></td>
                    <td>
                      <?php
                      $selectFol = $connect->query("SELECT * FROM shop_folder WHERE shop_id = '$shopesid'");
                      $folArray = array();
                      $breifArray = array();
                      $arr1 = 0;
                      $arr = 0;
                      while ($r = $selectFol->fetch()) {
                        $f_id = $r['folder_id'];
                        $folQ = $connect->query("SELECT * FROM file_briefcase_folder WHERE file_id = '$f_id'");
                        while ($r1 = $folQ->fetch()) {
                          if (!in_array($r1['folder_id'], $folArray)) {
                            $folArray[$arr] = $r1['folder_id'];
                            $f_id1 = $r1['folder_id'];
                            $arr++;

                            $ffQuery = $connect->query("SELECT * FROM folders WHERE id = '$f_id1'");
                            while ($r2 = $ffQuery->fetch()) {
                      ?>
                              <details>
                                <summary>
                                  <ul style="display:inline-block; text-decoration:none;">
                                    <li style="text-decoration:none; display:inline-block ;">
                                      <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/folder.png">
                                      <span style="font-size:large; font-weight:bolder; color:white; background-color:#7800c0; padding:5px;">

                                        <?php echo $r2['folder'];

                                        ?>

                                      </span>
                                      <a href=".php?id=<?php echo $f_id ?>"><i class="bi bi-x-circle text-danger" style="margin:5px;"></i></a>
                                    </li>
                                  </ul>
                                </summary>
                                <?php
                              }
                            }
                            $breifQ = $connect->query("SELECT * FROM file_briefcase WHERE file_id = '$f_id'");
                            while ($r3 = $breifQ->fetch()) {
                              if (!in_array($r3['brief_id'], $breifArray)) {
                                $breifArray[$arr1] = $r3['brief_id'];
                                $arr1++;
                                $b_id = $r3['brief_id'];
                                $bQuery = $connect->query("SELECT * FROM briefcase WHERE id = '$b_id'");
                                while ($r4 = $bQuery->fetch()) {
                                ?>
                                  <details style="margin-left:30px;">
                                    <summary>
                                      <ul style="display:inline-block; text-decoration:none;">

                                        <li style="text-decoration:none; display:inline-block ;">
                                          <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                                          <span style="font-size:15px; font-weight:bolder; color:#7800c0; padding:5px; text-decoration-line: underline;">
                                            <?php echo $r4['briefcase'];
                                            ?>
                                          </span>
                                          <a href=".php?id=<?php echo $b_id ?>"><i class="bi bi-x-circle text-danger" style="margin: 5px;"></i></a>
                                        </li>
                                      </ul>
                                    </summary>
                                  <?php
                                }
                              }
                              $fileQ = $connect->query("SELECT * FROM files WHERE id = '$f_id'");
                              while ($r5 = $fileQ->fetch()) {
                                  ?>
                                  <ul style="left-margin:150px">
                                    <li style="text-decoration:none; display:inline-block; margin-left: 50px;">
                                      <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                      <?php echo '<span style="color:#9540e4;">' . $r5['name'] . '</span>'; ?>
                                      <a href=".php?id=<?php echo $Id ?>"><i class="bi bi-x-circle text-danger" style="margin:5px"></i></a>
                                    </li>
                                  </ul>
                          <?php
                              }
                            }
                          }
                          ?>
                                  </details>
                          <?php
                        }
                          ?>
                              </details>  
                    </td>
                    <td><a href="" style="margin: 10px;" onclick="document.getElementById('shop_id').value='<?php echo $row['id'] ?>';
                                                             document.getElementById('shop1').value='<?php echo $row['shops'] ?>';
                                                             document.getElementById('image1').value='<?php echo $row['image'] ?>';" data-bs-toggle="modal" data-bs-target="#editshop"><i style="color:green;" class="bi bi-pen-fill"></i>
                      </a>
                      <a href="delete_shop.php?id=<?php echo $shopesid ?>"><i style="color:red;" class="bi bi-trash-fill"></i></a>

                    </td>
                  </tr>
                <?php
                }
              } else { ?>
                <tr>
                  <td colspan='3' style="text-align:center">
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


<!--Edit briefcase modal-->
<div class="modal fade" id="selectfolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Select Folders</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="add_folder_shop.php" method="post">
          <input type="hidden" id="shid" name="shop">
          <table class="table table-bordered src-table1" id="itemtablesearch">
            <input class="form-control" type="text" id="searchshop1" onkeyup="shop_Search()" placeholder="Search for Folder.." title="Type in a name"><br>

            <tbody>
              <?php
              //fetch item
              $allitem1_a = "SELECT * FROM folders";
              $statement1_a = $connect->prepare($allitem1_a);
              $statement1_a->execute();

              if ($statement1_a->rowCount() > 0) {
                $result1_a = $statement1_a->fetchAll();
                $sn1111 = 'A';
                foreach ($result1_a as $row1) {
                  $folder_id = $row1['id'];
                  $sql4 = "SELECT count(*) FROM `file_briefcase_folder` WHERE folder_id = ?";
                  $result4 = $connect->prepare($sql4);
                  $result4->execute([$folder_id]);
                  $number_of_rows11 = $result4->fetchColumn();

                  $sql = "SELECT COUNT(shop_folder.id) as count_id
                  FROM shop_folder
                  INNER JOIN file_briefcase_folder ON shop_folder.folder_id = file_briefcase_folder.file_id
                  WHERE file_briefcase_folder.folder_id = :id";

                  $stmt = $connect->prepare($sql);
                  $stmt->bindParam(':id', $folder_id, PDO::PARAM_INT);
                  $stmt->execute();
                  $result10 = $stmt->fetch(PDO::FETCH_ASSOC);
                  $count = $result10['count_id'];
                  if ($count != $number_of_rows11) {
              ?>
                    <details>
                      <summary>
                        <ul style="display:inline-block; text-decoration:none;">
                          <li style="text-decoration:none; display:inline-block ;"> <input type="checkbox" name="add_folder[]" value="<?php echo $row1['id'] ?>" class="folder_check" id="fol<?php echo $row1['id']; ?>" data-created="<?php echo $row1['id']; ?>"></li>
                          <!-- <td><?php echo $sn++ ?></td> -->
                          <li style="text-decoration:none; display:inline-block ;">
                            <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/folder.png">
                            <span style="font-size:large; font-weight:bolder; color:white; background-color:#7800c0; padding:5px;">

                              <?php echo $sn1111++ . '. ' . $item_id1_a = $row1['folder'];

                              ?>

                            </span>
                          </li>
                        </ul>
                      </summary>
                      <?php
                      $sel_val = "SELECT COUNT(file_briefcase_folder.id) as count_id2,file_briefcase_folder.file_id,file_briefcase.brief_id FROM `file_briefcase`
                                    INNER JOIN file_briefcase_folder ON file_briefcase.file_id = file_briefcase_folder.file_id where file_briefcase_folder.folder_id='$folder_id' GROUP BY file_briefcase.brief_id";
                      $statement1_bb = $connect->prepare($sel_val);
                      $statement1_bb->execute();
                      if ($statement1_bb->rowCount() > 0) {
                        $result1_bb = $statement1_bb->fetchAll();
                        $sn1122 = 1;
                        foreach ($result1_bb as $row5) {

                          $breifcase_id = $row5['brief_id'];
                          $select_breifcase = $connect->prepare("SELECT briefcase FROM briefcase WHERE id=?");
                          $select_breifcase->execute([$breifcase_id]);
                          $select_breifcase_id = $select_breifcase->fetchColumn();
                          $select_breifcase1 = $connect->prepare("SELECT id FROM briefcase WHERE id=?");
                          $select_breifcase1->execute([$breifcase_id]);
                          $select_breifcase_id1 = $select_breifcase1->fetchColumn();
                          $added_briefcase = $row5['count_id2'];
                          $table_of_three = "SELECT COUNT(shop_folder.id) as breif_count FROM shop_folder
INNER JOIN file_briefcase_folder ON shop_folder.folder_id = file_briefcase_folder.file_id
INNER JOIN file_briefcase ON file_briefcase_folder.file_id = file_briefcase.file_id where file_briefcase.brief_id='$breifcase_id' and file_briefcase_folder.folder_id=:id";
                          $stmt1 = $connect->prepare($table_of_three);
                          $stmt1->bindParam(':id', $folder_id, PDO::PARAM_INT);
                          $stmt1->execute();
                          $result11 = $stmt1->fetch(PDO::FETCH_ASSOC);
                          $count2 = $result11['breif_count'];
                          if ($count2 != $added_briefcase) {
                      ?>
                            <details style="margin-left:30px;">
                              <summary>
                                <ul style="display:inline-block; text-decoration:none;">

                                  <li style="text-decoration:none; display:inline-block ;">
                                    <input type="checkbox" data-created="<?php echo $breifcase_id ?>" class="breif_case<?php echo $row1['id']; ?> breifCase breif_case<?php echo $breifcase_id; ?>" data-folder="<?php echo $row1['id']; ?>" name="add_breif[]" value="<?php echo $select_breifcase_id1; ?>" />
                                    <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                                    <span style="font-size:15px; font-weight:bolder; color:#7800c0; padding:5px; text-decoration-line: underline;"><?php echo $select_breifcase_id

                                                                                                                                                    ?>

                                    </span>
                                  </li>
                                </ul>
                              </summary>
                              <?php

                              $file_fetch = "SELECT * FROM file_briefcase WHERE brief_id = '$breifcase_id'";
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
                                  $file_name1 = $connect->prepare("SELECT id FROM `files` WHERE id=?");
                                  $file_name1->execute([$name_file]);
                                  $filesnamees1 = $file_name1->fetchColumn();
                                  $sql2 = "SELECT count(*) FROM `file_briefcase_folder` WHERE file_id = ? and folder_id=?";
                                  $result2 = $connect->prepare($sql2);
                                  $result2->execute([$name_file, $folder_id]);
                                  $number_of_rows = $result2->fetchColumn();
                                  $sql23 = "SELECT count(*) FROM `shop_folder` WHERE folder_id=?";
                                  $result23 = $connect->prepare($sql23);
                                  $result23->execute([$name_file]);
                                  $number_of_rows1 = $result23->fetchColumn();
                                  if ($number_of_rows > 0 && $number_of_rows1 == 0) {

                              ?>
                                    <ul style="left-margin:150px">
                                      <li style="text-decoration:none; display:inline-block;">
                                        <input style="margin-left: 30px" type="checkbox" class="files<?php echo $row1['id']; ?> filesBreif<?php echo $breifcase_id; ?> getbreifId getfileclass<?php echo $breifcase_id ?>" id="<?php echo $breifcase_id ?>" data-folder="<?php echo $row1['id']; ?>" name="add_file[]" value="<?php echo $filesnamees1; ?>" />
                                        <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                        <?php echo '<span style="color:#9540e4;">' . $filesnamees . '</span>'; ?>
                                      </li>
                                    </ul>
                              <?php }
                                }
                              } ?>


                            </details>

                    <?php
                          }
                        }
                      }
                    }
                    ?>
                    </details>
                    <!-- fetch subitem -->
                <?php
                }
              }

                ?>






            </tbody>

          </table>
          <hr>
          <button style="float:right;" type="submit" class="btn btn-success" id="submit">Select</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!--Edit actual class modal-->
<div class="modal fade" id="editshop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Shop</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="edit_file.php" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="id" value="" id="shop_id" readonly>
          <label style="color:black; font-weight:bold; margin:5px;">Shop :</label>
          <input type="text" class="form-control" name="shop" value="" id="shop1">
          <label style="color:black; font-weight:bold; margin:5px;">image :</label>
          <input type="file" class="form-control" name="newImage" id="">
          <input type="hidden" class="form-control" name="oldFile" value="" id="image1" readonly />
          <br>
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function shop_Search() {
    // Get input value and convert to lowercase
    var input = document.getElementById("searchshop1");
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


<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
          <td style="text-align: center;"><input type="file" placeholder="Enter Name" name="file[]" id="val" class="form-control" value=""/> </td>\
                          <td style="text-align: center;"><input type="text" placeholder="Enter Shop" name="shop[]" class="form-control" value="" required/> </td>\
                          <td style="width:20px;"><button type="button" name="remove_shop" id="remove_shop" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                        </tr>'
    var max = 100;
    var a = 1;

    $("#add_shop").click(function() {
      if (a <= max) {
        $("#table-field-shop").append(html);
        a++;
      }
    });
    $("#table-field-shop").on('click', '#remove_shop', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

<script>
  function shop() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("shopsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("shops");
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


<script>
  $(document).on("click", ".folder_check", function() {
    var class1 = $(this).data("created");
    var checkboxes = document.getElementsByClassName('breif_case' + class1);
    var class2 = $(".files" + class1).attr("class");
    // $("." + class2).prop('checked', true);
    if ($(".files" + class1).prop('checked') == true) {
      $(".files" + class1).prop('checked', false);
    } else {
      $(".files" + class1).prop('checked', true);
    }
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;
    }

  });

  $(".breifCase").on("click", function() {
    var class1 = $(this).data("created");
    var class2 = $(".filesBreif" + class1).attr("class");
    // $("." + class2).prop('checked', true);
    if ($(".filesBreif" + class1).prop('checked') == true) {
      $(".filesBreif" + class1).prop('checked', false);
      $(this).prop('checked', false);
    } else {
      $(".filesBreif" + class1).prop('checked', true);
      $(this).prop('checked', true);
    }

    fId = $(this).data("folder");

    $("#fol" + fId).prop('checked', true);

    if ($(".breifCase").prop('checked') == true) {
      $(".folder_check").prop('checked', true);
    } else {
      $(".folder_check").prop('checked', false);
    }
  });

  $(".getbreifId").on("click", function() {
    bId = $(this).attr('id');
    $('input[type="checkbox"][data-created="' + bId + '"]').prop('checked', true);
    fId = $(this).data("folder");
    $("#fol" + fId).prop('checked', true);

    var checkboxes1 = document.getElementsByClassName('getfileclass' + bId);
    var count = 0;

    for (var checkbox1 of checkboxes1) {
      // console.log(checkbox1.checked);
      if (checkbox1.checked == true) {
        count++;
      }
    }

    if (count == 0) {
      $("#fol" + fId).prop('checked', false);
      $(".breif_case" + bId).prop('checked', false);
    }

  });

  function testId(id) {

    // Select the checkbox with the custom attribute "data-custom-attribute" set to "my-custom-attribute"
    $('input[type="checkbox"][data-created="' + id + '"]').prop('checked', true);
    var v = $(this).attr('class');
    // console.log(v);

  }
</script>

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>