<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

?>
<!DOCTYPE html>
<html>

<head>
  <title>drag and drop</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
  <style>
    .tox-promotion {
      display: none !important;
    }

    .tox-statusbar {
      display: none !important;
    }

    #cke_1_contents {
      height: 580px !important;
    }

    #cke_1_top {
      background: white;
    }

    #cke_1_bottom {
      display: none;
    }

    a.cke_button {
      display: inline-block;
      height: 18px;
      padding: 5px 13px !important;
      outline: 0;
      cursor: default;
      float: left;
      border: 0;
      position: relative;
    }

    #cke_1_contents {
      background-color: #babac24f;
      text-align: center;
    }

    iframe.cke_wysiwyg_frame.cke_reset {
      width: 70% !important;
      height: 100%;
      margin-top: 30px;
    }
  </style>
</head>

<body>

    <?php include ROOT_PATH. 'includes/Pages/gsloader.php'; ?>

  <!--Head Navbar-->
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>

  <!--Main Content-->
  <main id="content" role="main" class="main mt-5">
    <!-- Content -->
    <div class="content container-fluid" style="margin-left:40px; width:100%;">
      <center>
        <div class="row justify-content-center">

          <div class="col-lg-11 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-hover-shadow" style="border:1px solid black; height:900px;">
              <!-- Body -->
              <div class="card-body">


                <div class="editor-container">
                  <form action="<?php echo BASE_URL; ?>Library/save_editor_data.php" method="post" enctype="multipart/form-data">
                    <div class="container" style="height:50px;">
                      <div class="row" style="float: right;">
                        <button name="" type="button" style="float:right; color:black ;" class="btn btn-ghost-secondary" data-bs-toggle="modal" data-bs-target="#pageper"><i class="bi bi-download" style="margin:5px; color: black;"></i>Save Changes</button>
                      </div>

                      <div class="row" style="float: right;">
                        <div class="dropdown">
                          <div class="dropdown">
                            <button type="button" class="btn btn-ghost-secondary" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation style="color:black;">
                              <i class="bi bi-pen" style="margin:5px; color:black;"></i>Set ChangeLog
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
                              <i class="bi bi-qr-code-scan" style="color:black; font-size:large;"></i>
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
                                  <div id="qr-code"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="row" style="float: right;">
                                        <input type="text" placeholder="Set Change Log" name="initial" id="initial" value="initial" />
                                    </div> -->
                    </div>
                    <br>
                    <textarea id="editor" class="editor-content" style="height: 1000px;" name="editorData"></textarea>

                    <div class="modal fade" id="pageper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title text-dark" id="exampleModalLabel">Give Permission To Page</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div>
                              <input type="text" id="" name="to_user" class="form-control txt_search1" placeholder="share individual" />
                              <br>
                            </div>
                            <div>
                              <center>
                                <table class="table">
                                  <tr>
                                    <td>
                                      <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                                        <option value="All instructor">All Instructor</option>
                                        <option selected value="Everyone">Everyone</option>
                                        <option value="None">None</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionCategory">
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

                                <input type="submit" class="btn btn-soft-dark" value="Give Permission" name="pagesubmit" />
                              </center>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>

                <!-- End Body -->

              </div>
              <!-- End Body -->

              <!-- End Card -->
            </div>
          </div>
          <!-- End Row -->

        </div>
      </center>
    </div>
  </main>
  <!--End Main Content-->


  <script src="<?php echo BASE_URL; ?>assets/editor/ckeditor/ckeditor.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/qrjs.js" referrerpolicy="origin"></script>

  <script>
    CKEDITOR.replace('editorData');
  </script>

  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script>

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
            // alert(response);

          }
        });
      }


    });
  </script>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</html>