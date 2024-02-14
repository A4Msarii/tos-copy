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
    /*#shop_table,
    #folder_table {

      border-collapse: separate;
      border-spacing: 0 25px 0 15px;

    }

    .dropdown1:hover .dropdown-menu {
      display: block;
    }*/

    td {
      width: auto;
      text-align: center;
      border: 1px solid black;
      padding: 3px;
    }

    /*.shops,
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
      color: black;
      font-weight: bold;
      margin-right: 10px;
      border-radius: 5px;
    }

    .sel {
      border: 1px solid #8124ed !important;
      background-color: #8124ed;
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
    }*/

    .avatar-lg {
      width: 6.36875rem !important;
      height: 6.36875rem !important;
    }

    /* .avt-lib {
      position: relative;
      overflow: hidden;
      display: inline-block;
    }

    .avt-img {
      transition: transform 0.3s;
    }

    .avt-lib:hover {
      transform: scale(1.2);
    }*/
  </style>
</head>

<body>
  <?php include ROOT_PATH. 'Library/lb_loader.php'; ?>


  <div id="header-hide">
    <?php
    include '../includes/library_header1.php';
    ?>
  </div>
  <?php
  // $lib_id = 1;
  // if (isset($_GET['library'])) {
  //   $lib = "Main";
  //   $_SESSION['library_value'] = $lib = urldecode(base64_decode($_GET['library']));
  // } else if (isset($_SESSION['library_value'])) {
  //   $lib = $_SESSION['library_value'];
  // } else {
  //   $lib = "Main";
  // }
  // if (isset($_GET['lib_id'])) {
  //   $lib_id = "";
  //   $_SESSION['libraryid_value'] = $lib_id = urldecode(base64_decode($_GET['lib_id']));
  // } else if (isset($_SESSION['libraryid_value'])) {
  //   $lib_id = $_SESSION['libraryid_value'];
  // } else {
  //   if (isset($_SESSION['libraryid_value'])) {
  //     $lib_id = $_SESSION['libraryid_value'];
  //   }
  // }
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
            <?php include(ROOT_PATH ."Library/mainlib.php"); ?>
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


  <!-- <script>
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
  </script> -->



  <!--Footer-->

  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>

</html>