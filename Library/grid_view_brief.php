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

<style type="text/css">
  ul.breadcrumb {
    padding: 10px 16px;
    list-style: none;
    /*  background-color: #eee;*/
    width: 50%;
    margin-left: 140px;
  }

  ul.breadcrumb li {
    display: inline;
    font-size: 18px;
  }

  ul.breadcrumb li+li:before {
    padding: 8px;
    color: grey;
    content: ">";
  }

  ul.breadcrumb li a {
    color: snow;
    text-decoration: none;
  }

  ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
  }

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
    <?php include('./grid_header.php');
    if (isset($_REQUEST['bId'])) {
      $_SESSION['page_ID'] = $_REQUEST['bId'];
    }
    if (isset($_REQUEST['pId'])) {
      $_SESSION['page_ID'] = $_REQUEST['pId'];
    }
    $f_id = $_SESSION['folderId'];


    // admin , instructoe and student  sql querys

    $userId = $_SESSION['login_id'];

    if ($_SESSION['role'] == 'super admin') {
      $query = $connect->query("SELECT * FROM user_briefcase WHERE folderId = '$f_id'");
    }

    if ($_SESSION['role'] == 'instructor') {
      $query = $connect->query("SELECT * FROM user_briefcase WHERE (user_id = '$userId' AND folderId = '$f_id') OR (role = 'student' AND folderId = '$f_id')");
    }

    if ($_SESSION['role'] == 'student') {
      $query = $connect->query("SELECT * FROM user_briefcase WHERE user_id = '$userId' AND folderId = '$f_id'");
    }



    //  admin , instructoe and student  sql query ends

    ?>
  </div>



  <main id="content" role="main" class="main">
    <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header" style="margin-top:40px; border-bottom:none;">
        <ul class="breadcrumb" style="background-color:black;">
          <li>
            <a href="<?php echo BASE_URL; ?>Library/grid_view_brief.php">
              <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                <img style="height:20px; width:20px; margin:5px;" src="<?php echo BASE_URL ?>assets/svg/phase2white/folder.png">
              </div>
              <?php echo $item_id1_a; ?>
            </a>
          </li>
        </ul>
      </div>
      <!-- End Page Header -->
    </div>
    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -120px;">
      <center>
        <div class="row justify-content-center">

          <div class="col-lg-11 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-hover-shadow h-100" style="border:1px solid black; background-color: black;">
              <!-- Body -->
              <div class="card-body">


                <div class="row justify-content-center">
                  <input type="text" id="searchBar" data-useridgrid="<?php echo $_SESSION['login_id'] ?>" placeholder="Search..." style="width: 80%;" class="form-control find_data_search">
                  <div id="openfolderdiv_search" class="col-9 dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="position:absolute;top:60px; margin-left: 20px;">
                    <!-- Header -->
                    <div class="card-body-height">
                      <ul class="searchDropdownMenu_grid" style="margin-left:-35px;">

                      </ul>
                    </div>
                  </div>
                  <?php
                  $userId = $_SESSION['login_id'];
                  $shopId = $_SESSION['shopId'];

                  $briefCaseId = $connect->query("SELECT briefId FROM (
                    SELECT briefId FROM user_files
                    WHERE (folderId = '$f_id' AND user_id = '$userId' AND shopid = '$shopId') OR (role = 'super admin' AND folderId = '$f_id' AND shopid = '$shopId')
                    UNION
                    SELECT briefId FROM editor_data
                    WHERE (folderId = '$f_id' AND userId = '$userId' AND shopid = '$shopId') OR (userRole = 'super admin' AND folderId = '$f_id' AND shopid = '$shopId')
                ) AS uniqueBriefIds");

                  while ($briefIdData = $briefCaseId->fetch()) {
                    $briefCasId = $briefIdData['briefId'];
                    $briefCaseName = $connect->query("SELECT * FROM user_briefcase WHERE id = '$briefCasId'");
                    while ($briefCases = $briefCaseName->fetch()) {
                      $userbriefId = $briefCases['id'];
                      $permissionPage = 1;
                      $permissionFile = 1;
                      if ($briefCases['user_id'] != $userId) {
                        $briefFile = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id' AND shopid = '$shopId'");
                        while ($fileData = $briefFile->fetch()) {
                          $perFileId = $fileData['id'];
                          if ($_SESSION['role'] == 'student') {
                            $perFileQuery = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$perFileId' AND (userId = 'Everyone' OR userId = '$userId')");
                          }

                          if ($_SESSION['role'] == 'instructor') {
                            $perFileQuery = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$perFileId' AND (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId')");
                          }

                          if ($_SESSION['role'] == 'super admin') {
                            $perFileQuery = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$perFileId'");
                          }

                          $perFiledata = $perFileQuery->fetchColumn();
                          if ($perFiledata != 0) {
                            $permissionFile = 1;
                            break;
                          } else {
                            $permissionFile = 0;
                          }
                        }

                        $permissionPage = 0;

                        if ($permissionFile == 1) {
                          $briefPage = $connect->query("SELECT * FROM editor_data WHERE briefId = '$userbriefId' AND folderId = '$f_id' AND shopid = '$shopId'");
                          while ($pageData = $briefPage->fetch()) {
                            $perPageId = $pageData['id'];
                            if ($_SESSION['role'] == 'student') {
                              $perPageQuery = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$perPageId' AND userId = 'Everyone' OR userId = '$userId'");
                            }

                            if ($_SESSION['role'] == 'instructor') {
                              $perPageQuery = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$perPageId' AND userId = 'Everyone' OR userId = 'instructor' OR userId = '$userId'");
                            }

                            if ($_SESSION['role'] == 'super admin') {
                              $perPageQuery = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$perPageId'");
                            }

                            $perPagedata = $perPageQuery->fetchColumn();
                            if ($perPagedata != 0) {
                              $permissionPage = 1;
                              break;
                            } else {
                              $permissionPage = 0;
                            }
                          }
                        } else {
                          $permissionPage = 0;
                        }
                      }

                      if ($permissionPage == 0 && $permissionFile == 0) {
                        continue;
                      } else {
                  ?>
                        <div class="col-md-3" style="margin:5px;">
                          <div class="card card-hover-shadow h-100 search-card" style="padding:10px;" data-id="<?php echo $briefCases['id']; ?>">
                            <span style="display:none;"><?php echo $pageId; ?></span>
                            <div style="text-align: end;">
                              <?php
                              if ($userId == $briefCases['user_id']) {
                              ?>
                                <a style="text-decoration:none; color:black; font-size: large;" href="" style="margin: 10px;" onclick="document.getElementById('briefcase_edit_id1').value='<?php echo $briefCases['id']; ?>';
                                                             document.getElementById('briefcase_2').value='<?php echo $briefCases['briefcase_name']; ?>';" data-bs-toggle="modal" data-bs-target="#edit_briefcase_2">
                                  <i class="bi bi-pencil-square"></i>
                                </a>
                                <a style="text-decoration: none; color:black; font-size: large;" href="<?php echo BASE_URL ?>Library/deleteBrief.php?deleteUserId=<?php echo $briefCases['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                  <i class="bi bi-trash3-fill"></i>
                                </a>
                              <?php } ?>
                            </div>
                            <ul class="main_ul">
                              <li class="nav-link ">
                                <a class="heading" href="<?php echo BASE_URL; ?>Library/brief_file.php?brief_id=<?php echo $briefCases['id']; ?>&userBriefName=<?php echo $briefCases['briefcase_name']; ?>">
                                  <h1 style="float:left;"><?php echo $briefCases['briefcase_name']; ?></h1>
                                </a>
                              </li>
                              <?php
                              $briefid = $briefCases['id'];
                              $folder_files = $connect->query("SELECT * FROM user_files WHERE briefId = '$briefid' AND folderId = '$f_id'")->fetchAll();
                              ?>
                              <?php foreach ($folder_files as $dt) : ?>
                                <li class="d-none nav-link">
                                  <a href=""><?php echo $dt["filename"] ?></a>
                                </li>
                              <?php endforeach ?>
                            </ul>
                          </div>
                        </div>
                    <?php
                      }
                    }
                  }
                  $emptyBriefCase = $connect->query("SELECT * FROM user_briefcase
                                    WHERE ((folderId = '$f_id' AND user_id = '$userId') OR (role = 'super admin' AND folderId = '$f_id'))
                                    AND id NOT IN (
                                    SELECT briefId
                                    FROM user_files
                                    UNION
                                    SELECT briefId
                                    FROM editor_data
                                  )");
                  while ($emptyData = $emptyBriefCase->fetch()) {
                    $breif_id1 = $emptyData['id'];
                    ?>
                    <div class="col-md-3" style="margin:5px;">
                      <div class="card card-hover-shadow h-100" style="padding:10px;">
                        <span style="display:none;"><?php echo $pageId; ?></span>
                        <div style="text-align: end;">
                          <a style="text-decoration:none; color:black; font-size: large;" href="" style="margin: 10px;" onclick="document.getElementById('briefcase_edit_id1').value='<?php echo $emptyData['id']; ?>';
                                                             document.getElementById('briefcase_2').value='<?php echo $emptyData['briefcase_name']; ?>';" data-bs-toggle="modal" data-bs-target="#edit_briefcase_2">
                            <i class="bi bi-pencil-square"></i>
                          </a>
                          <a style="text-decoration: none; color:black; font-size: large;" href="<?php echo BASE_URL ?>Library/deleteBrief.php?deleteUserId=<?php echo $emptyData['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                            <i class="bi bi-trash3-fill"></i>
                          </a>
                        </div>
                        <a href="<?php echo BASE_URL; ?>Library/brief_file.php?brief_id=<?php echo $emptyData['id']; ?>&userBriefName=<?php echo $emptyData['briefcase_name']; ?>">
                          <h1 style="float:left;"><?php echo $emptyData['briefcase_name']; ?></h1>
                        </a>
                      </div>
                    </div>
                  <?php
                  }
                  $briefIdArray = array();
                  $briefI = 0;
                  if ($_SESSION['role'] == 'student') {
                    $permissionPageId = $connect->query("SELECT * FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$userId') AND permissionId != '$userId'");
                  }
                  if ($_SESSION['role'] == 'instructor') {
                    $permissionPageId = $connect->query("SELECT * FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$userId' OR userId = 'All instructor') AND permissionId != '$userId'");
                  }
                  if ($_SESSION['role'] == 'super admin') {
                    $permissionPageId = $connect->query("SELECT * FROM pagepermissions WHERE permissionId != '$userId'");
                  }
                  while ($perId = $permissionPageId->fetch()) {
                    $pageId = $perId['pageId'];
                    $pagePermission = $connect->query("SELECT DISTINCT briefId
                                            FROM editor_data
                                            WHERE id = '$pageId'");
                    while ($perBriefName = $pagePermission->fetch()) {
                      if (!in_array($perBriefName['briefId'], $briefIdArray)) {
                        $briefIdArray[$briefI] = $perBriefName['briefId'];
                        $briefI++;
                      }
                    }
                  }
                  if ($_SESSION['role'] == 'student') {
                    $permissionFileId = $connect->query("SELECT * FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$userId') AND permissionId != '$userId'");
                  }
                  if ($_SESSION['role'] == 'instructor') {
                    $permissionFileId = $connect->query("SELECT * FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$userId' OR userId = 'All instructor') AND permissionId != '$userId'");
                  }
                  if ($_SESSION['role'] == 'super admin') {
                    $permissionFileId = $connect->query("SELECT * FROM filepermissions WHERE permissionId != '$userId'");
                  }

                  while ($perId = $permissionFileId->fetch()) {
                    $pageId = $perId['pageId'];
                    $filePermission = $connect->query("SELECT DISTINCT briefId
                                            FROM user_files
                                            WHERE id = '$pageId'");
                    while ($perBriefName = $filePermission->fetch()) {
                      if (!in_array($perBriefName['briefId'], $briefIdArray)) {
                        $briefIdArray[$briefI] = $perBriefName['briefId'];
                        $briefI++;
                      }
                    }
                  }
                  ?>

                  <?php
                  $briefCount = 0;
                  while ($briefI > 0) {
                    $perBriefId = $briefIdArray[$briefCount];
                    $perBrief = $connect->query("SELECT * FROM user_briefcase WHERE id = '$perBriefId' AND role != 'super admin' AND user_id != '$userId'");
                    while ($perBriefData = $perBrief->fetch()) {
                      $briefPerId = $perBriefData['id'];
                  ?>
                      <div class="col-md-3" style="margin:5px;">
                        <div class="card card-hover-shadow h-100" style="padding:10px;">
                          <span style="display:none;"><?php echo $pageId; ?></span>
                          <a href="<?php echo BASE_URL; ?>Library/brief_file.php?brief_id=<?php echo $perBriefData['id']; ?>&userBriefName=<?php echo $perBriefData['briefcase_name']; ?>">
                            <h1 style="float:left;"><?php echo $perBriefData['briefcase_name']; ?></h1>
                          </a>
                        </div>
                      </div>
                  <?php
                    }
                    $briefCount++;
                    $briefI--;
                  }
                  ?>
                </div>
              </div>
              <!-- End Body -->

            </div>
            <!-- End Body -->

          </div>
          <!-- End Row -->

        </div>
      </center>
    </div>
  </main>


  <!--Edit briefcase modal-->
  <div class="modal fade" id="edit_brief" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Briefcase</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="edit_brief_lib.php">
            <input type="hidden" class="form-control" name="id" value="" id="brief_edit_id" readonly>
            <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
            <input type="text" class="form-control" name="brief" value="" id="brief1">
            <br>
            <input style="float:right;" class="btn btn-soft-dark" type="submit" name="submit_briefcase" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Edit briefcase modal-->
  <div class="modal fade" id="edit_briefcase_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Briefcase</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="edit_brief_lib.php">
            <input type="hidden" class="form-control" name="id" value="" id="briefcase_edit_id1" readonly>
            <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
            <input type="text" class="form-control" name="brief" value="" id="briefcase_2">
            <br>
            <input style="float:right;" class="btn btn-soft-dark" type="submit" name="submit_user_briefcase" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    // document.getElementById("searchBar").addEventListener("input", function() {
    //   var input = this.value.toLowerCase();
    //   var cards = document.getElementsByClassName("card");

    //   Array.from(cards).forEach(function(card) {
    //     var fileData = card.getElementsByTagName("h1")[0].textContent.toLowerCase();
    //     if (fileData.includes(input)) {
    //       card.style.display = "block";
    //     } else {
    //       card.style.display = "none";
    //     }
    //   });
    // });
    $(document).on('keyup', '.find_data_search', function() {
      $("#openfolderdiv_search").css("display", "block");
      $("#openfolderdiv_search").addClass("show");
      $('body').click(function() {
        $('#openfolderdiv_search').hide();
      });
    });
    $(document).on('keyup', '#searchBar', function() {
      var search_grid = $(this).val();
      var search_user_id = $(this).data('useridgrid');
      var fo_id = <?php echo $_SESSION['folderId']; ?>;
      if (search_grid != "") {
        $.ajax({
          type: 'POST',
          url: '<?php echo BASE_URL; ?>includes/Pages/getSearch2.php',
          data: 'search=' + search_grid + '&u_id=' + search_user_id + '&fo_id=' + fo_id,
          success: function(response) {
            // $('.searchResult1').empty();
            $('.searchDropdownMenu_grid').html(response);
          }
        });
      } else {
        $('.searchDropdownMenu_grid').html('');
      }
    });
    $(document).ready(function() {
      // Get the value of the input field on keyup event
      $('#searchBar').keyup(function() {
        var filterValue = $(this).val().toLowerCase();
        var parent = [];
        if (filterValue == '') {
          $('.card').show();
        }
        $('.main_ul li a').each(function() {
          var listItemText = $(this).text().toLowerCase();

          if (listItemText.indexOf(filterValue) > -1) {
            $(this).css('display', 'block');
            parent.push($(this).closest('.card').data('id'));
          } else {
            if ($(this).hasClass('heading')) {} else {
              $(this).css('display', 'none');
            }
          }

        });
        $('.search-card').each(function() {
          if (parent.includes($(this).data('id'))) {} else {
            $(this).hide();
          }
        });
      });
    });
  </script>


<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>

</html>