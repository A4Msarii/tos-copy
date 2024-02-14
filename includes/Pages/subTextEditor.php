<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Create page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css" />

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/chart.js/dist/Chart.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/css/jsvectormap.min.css" />

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css" />

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/snippets.min.css" />


  <!-- CSS Front Template -->

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="default" as="style" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" data-hs-appearance="default" as="style" />
  <style>
    /* Style the editor container and toolbar */
    .editor-container {
      margin: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      height: 700px;
    }

    .editor-toolbar {
      margin-bottom: 5px;
      background-color: #f1f1f1;
      border-bottom: 1px solid #ccc;
      border-radius: 5px 5px 0 0;
      padding: 5px;
    }

    /* Style the editor content */
    .editor-content {
      padding: 10px;
      min-height: 700px;
    }

    #name {
      width: 80%;
      height: 50px;
      border-radius: 5px;
      border: 1px solid #808080b3;
      font-size: 30px;
      color: #8b8f8f9e;
    }

    #pagetitlecontainer {
      height: 30%;
    }

    :-ms-input-placeholder {
      color: red;
      font-size: 30px;
      opacity: 1;
      /* Firefox */
    }

    #savebtn {
      background-color: aliceblue;
      border: aliceblue;
      margin-top: 15px;

    }

    #cke_1_contents {
      height: 700px !important;
    }

    #cke_1_top {
      background: white;
    }

    #cke_1_bottom {
      display: none;
    }

    img,
    table {
      cursor: pointer;
    }
    a.cke_button
        {
            display: inline-block;
    height: 18px;
    padding: 5px 19px !important;
    outline: 0;
    cursor: default;
    float: left;
    border: 0;
    position: relative;
        }
        #cke_1_contents
        {
            background-color: #babac24f;
    text-align: center;
        }
        iframe.cke_wysiwyg_frame.cke_reset
        {
            width: 70% !important;
    height: 100%;
    margin-top: 30px;
        }
  </style>
  <style>
    .tox-statusbar {
      display: none !important;
    }

    .tox-promotion {
      display: none !important;
    }
  </style>
</head>

<body>



  <div class="editor-container-fluid">
   
    <form action="<?php echo BASE_URL; ?>includes/Pages/addCheckFile.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="subCheckId" value="<?php echo $_REQUEST['subCheck']; ?>">
    <input type="hidden" name="checkId" value="<?php echo $_REQUEST['check']; ?>">
    <input type="hidden" name="ctpId" value="<?php echo $_REQUEST['ctpId']; ?>">

      <div class="container-fluid" style="height:50px;">
        <a style="position: fixed;margin-left:30px;" class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" style="color:black; text-decoration:none;" href="file_management.php"><i class="bi bi-arrow-left"></i></a>
        <div class="row" style="float: right;">
          <button name="pagesubmit" type="submit" style="float:right; color:black;" class="btn nav-item"><i class="bi bi-download" style="color:black;"></i>Save Changes</button>
        </div>

        <div class="row" style="float: right;">
          <div class="dropdown">
            <div class="dropdown">
              <button type="button" class="btn btn-ghost-secondary" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation style="color:black;">
                <i class="bi bi-pen" style="color:black;"></i>Set ChangeLog
              </button>

              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                <div class="dropdown-item-text">
                  <div class="align-items-center">
                    <p>Enter a brief description of the changes you've made</p>
                    <input class="form-control" type="text" placeholder="Enter ChangeLog" name="initial" id="initial" value="Initial publish" />

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row" style="float: right;">
          <div class="dropdown">
            <div class="dropdown">
              <button type="button" class="btn btn-ghost-secondary" id="navbarscannerDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                <i style="color: black; font-size:large;" class="bi bi-qr-code-scan"></i>
              </button>

              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 18rem;">
                <div class="dropdown-item-text">
                  <div class="align-items-center">
                    <!-- <form action="/" id="qr-generation-form"> -->
                    <input class="form-control" type="text" name="qr-code-content" id="qr-content" value="" placeholder="Enter QR content" autocomplete="off" />
                    <input onclick="generateQRCode()" class="btn btn-soft-secondary" style="float:right;margin-top: 15px;margin-bottom: 13px;" type="button" value="Generate QR Code" id="qrCodeBtn" />
                    <input onclick="copyQRCode()" type="button" name="copybutton" class="btn btn-soft-primary" value="Copy" style="float:left;margin-top: 15px;margin-bottom: 13px;">
                    <!-- </form> -->
                    <br />
                    <div id="qr-code">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div refs="page-editor@titleContainer" class="input" style="text-align:center;" id="pagetitlecontainer">
            <input type="text" id="name" name="name" placeholder="Page Title" value="New Page">
        </div> -->
      <div refs="page-editor@titleContainer" class="input" style="text-align:center; height: auto;" id="pagetitlecontainer">
        
        <input type="text" id="name" name="pagename" placeholder="Page Title" style="color:#000000a6;" required /><br><br>
        
      </div>
      <textarea id="editor" class="editor-content" style="height: 650px;" name="editorData"></textarea>
      <button id="maximizeButton" class="arrow-button" type="button"><i class="bi bi-arrow-up"></i></button>
      <button id="minimizeButton" class="arrow-button" type="button"><i class="bi bi-arrow-down"></i></button>
      <!-- <div class="modal fade" id="pageper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title text-dark" id="exampleModalLabel">Give Permission To Page</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div>
                <input type="text" id="" name="to_user" class="form-control txt_search1" placeholder="To" style="border-radius: 20px; border:1px solid #0000004d;" />
                <br>
              </div>
              <div>
                
                  <center>
                    <table class="table">
                      <tr>
                        <td>
                          <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType" style="border-radius: 20px; border:1px solid #0000004d;">
                          <option value="None">None</option>
                            <option value="All instructor">All Instructor</option>
                            <option selected value="Everyone">Everyone</option>
                          </select>
                        </td>
                        <td>
                          <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionCategory" style="border-radius: 20px; border:1px solid #0000004d;">
                      <option selected value="readOnly">ReadOnly</option>
                      <option value="readAndWrite">Read And Write</option>
                      <option value="None">None</option>
                    </select>
                        </td>
                      </tr>
                    </table>
                    
                   <br>
                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                    <table class="table table-bordered" id="msarii" style="display:none;">
                      <thead class="bg-dark">
                        <tr>
                          <th class="text-light">#</th>
                          <th class="text-light">Profile Image</th>
                          <th class="text-light">Name</th>

                        </tr>
                      </thead>
                      <tbody id="varuntest">

                      </tbody>
                    </table>
                    <input type="submit" class="btn btn-success" value="Give Permission" name="pagesubmit" />
                  </center>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </form>
  </div>



  <script src="<?php echo BASE_URL; ?>assets/editor/ckeditor/ckeditor.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/qrjs.js" referrerpolicy="origin"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="<?php echo BASE_URL; ?>assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

  <script src="<?php echo BASE_URL; ?>assets/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/js/jsvectormap.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/maps/world.js"></script>

  <!-- JS Front -->
  <script src="<?php echo BASE_URL; ?>assets/js/theme.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/hs.theme-appearance-charts.js"></script>

  <script src="<?php echo BASE_URL; ?>assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/prism/prism.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/hs-show-animation/dist/hs-show-animation.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>

  <script>
    CKEDITOR.replace('editorData', {
      extraAllowedContent: 'img[*]{*}[data-maximized]'
    });
  </script>

  <script type="text/javascript">
    var editor = CKEDITOR.instances.editor;
    var selectedImage = null;
    var currentImageWidth = null;
    var currentImageHeight = null;

    document.getElementById('maximizeButton').addEventListener('click', function() {
      if (selectedImage) {
        selectedImage.style.width = currentImageWidth;
        selectedImage.style.height = currentImageHeight;
      }
    });

    document.getElementById('minimizeButton').addEventListener('click', function() {
      if (selectedImage) {
        selectedImage.style.width = '200px';
        selectedImage.style.height = '200px';
      }
    });

    // Event listener for selecting an image in CKEditor
    editor.on('selectionChange', function(event) {
      var element = event.data.path.lastElement && event.data.path.lastElement.getAscendant('img', true);

      if (element) {
        selectedImage = element.$;
        currentImageWidth = selectedImage.style.width;
        currentImageHeight = selectedImage.style.height;
      }
    });
  </script>



  <script>
    function generateQRCode() {
      var link = document.getElementById('qr-content').value;
      var qrcode = new QRCode(document.getElementById("qr-code"), {
        text: link,
        width: 128,
        height: 128,
      });
    }

    function copyQRCode() {
      var qrcodeDiv = document.getElementById("qr-code");
      var range = document.createRange();
      range.selectNode(qrcodeDiv);
      window.getSelection().removeAllRanges();
      window.getSelection().addRange(range);
      document.execCommand("copy");
      window.getSelection().removeAllRanges();
      alert("QR Code copied to clipboard!");
    }
  </script>

  <script>
    $(".txt_search1").keyup(function() {
      var search = $(this).val();
      // alert(search);
      if (search != "") {

        $.ajax({
          type: 'POST',
          url: '<?php echo BASE_URL; ?>Library/getPermissionSearch.php',
          data: {
            search: search,
          },
          success: function(response) {

            $("#msarii").css("display", "");
            // $('#msarii').empty();  
            $('#msarii tbody').empty();

            $("#msarii tbody").append(response);

            // $("#tableData").css("display","block");
            // $('#varuntest').empty();
            // $('#varuntest').append(response);
            // console.log(response);

          }
        });
      } else {
        $("#msarii").css("display", "none");
      }


    });
  </script>
</body>

</html>