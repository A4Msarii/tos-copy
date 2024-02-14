<div class="container-fluid">
  <div class="row-12">
    <h1>File</h1>
    <div class="button" style="float: right;">
      <!-- <a class="btn btn-soft-secondary previous-button" style="text-decoration:none;"><i class="bi bi-arrow-left"></i></a> -->
      <a class="btn btn-soft-secondary next-button" style="text-decoration:none;"><i class="bi bi-arrow-right"></i></a>
    </div>
    <br>
    <div id="uploadStatus"></div>
    <hr style="color:white;">
    <center>
      <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="fileOptFile">
        <option selected>Select File Method</option>
        <option value="addNewPage">New Page</option>
        <option value="addFile">Attachment</option>
        <option value="addFileLoca">Drive Link</option>
        <option value="addFileLink">Link</option>
      </select>
      <form method="post" enctype="multipart/form-data" style="width:60%;" id="multipleFile">
        <div class="input-field">
          <table class="table table-bordered">
            <tr>
              <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
              <td style="text-align: center;"><label class="form-label text-dark" for="exampleInputPassword1" style="font-weight:bold;">Choose Multiple Files</label>
                <input type="file" class="form-control" name="file[]" id="" multiple />
              </td>
              <td>
                <div role="progressbar" class="removecss" style="--value:0; font-size: 1rem;">
                  0%
                </div>
                <!-- <div class="progress mt-2">
                  <div class="progress-bar">0%</div>
                </div> -->
              </td>
          </table>
        </div><br>

        <center>
          <table class="table">
            <tr>
              <td>
                <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="Share Individual" />
              </td>
              <td>
                <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                  <option disabled>Select File Method</option>
                  <option value="All instructor">Instructor Only</option>
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
          <table class="table table-bordered tableData" style="display:none;">
            <thead class="bg-dark">
              <tr>
                <th class="text-white">#</th>
                <th class="text-white">Profile Image</th>
                <th class="text-white">Name</th>

              </tr>
            </thead>
            <tbody class="userDetail">

            </tbody>
          </table>
        </center>
        <br>
        <center>
          <input type="hidden" name="submitfiles">
          <input style="margin:5px;" type="submit" value="Submit" name="submitfiles" class="btn btn-success" />

        </center>
      </form>
      <br>

    </center>


    <center>
      <form class="insert-phases" id="phase_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/insert_locations.php" style="width:700px;" enctype="multipart/form-data">
        <div class="input-field">
          <label for="exampleInputPassword1" style="font-weight:bold;">Add Drive Link</label>
          <table class="table table-bordered" id="table-field-link11">
            <input type="hidden" name="file_type" value="location">
            <tr>
              <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
              <td style="text-align: center;"><input type="text" placeholder="Link" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
              <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName[]" id="phasename" class="form-control" value="" /> </td>
              <td style="width:20px;"><button type="button" name="add_phase" id="add_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
            </tr>
          </table>
        </div>
        <br>
        <center>
          <table class="table">
            <tr>
              <td>
                <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="Share Individual" />
              </td>
              <td>
                <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                  <option disabled>Select File Method</option>
                  <option value="All instructor">Instructor Only</option>
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
          <table class="table table-bordered tableData" style="display:none;">
            <thead class="bg-dark">
              <tr>
                <th class="text-white">#</th>
                <th class="text-white">Profile Image</th>
                <th class="text-white">Name</th>

              </tr>
            </thead>
            <tbody class="userDetail">

            </tbody>
          </table>
        </center>
        <br>
        <center>
          <button style="margin:5px;" class="btn btn-success" type="submit" id="phase_submit" name="savephase">Submit</button>
        </center>
      </form>
    </center>

    <center>
      <form class="insert-phases" id="filelink" method="post" action="<?php echo BASE_URL; ?>includes/Pages/insert_locations.php" style="width:700px;" enctype="multipart/form-data">
        <div class="input-field">
          <input type="hidden" name="file_type" value="link">
          <label for="exampleInputPassword1" style="font-weight:bold;">Add Online Link</label>
          <table class="table table-bordered" id="table-field-link">
            <tr>
              <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
              <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required /> </td>
              <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName[]" id="linkname" class="form-control" value="" /> </td>
              <td style="width:20px;"><button type="button" name="add_link" id="add_link" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
            </tr>
          </table>
        </div>
        <br>
        <center>

          <table class="table">
            <tr>
              <td>
                <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="Share Individual" />
              </td>
              <td>
                <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                  <option disabled>Select File Method</option>
                  <option value="All instructor">Instructor Only</option>
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
          <table class="table table-bordered tableData" style="display:none;">
            <thead class="bg-dark">
              <tr>
                <th class="text-white">#</th>
                <th class="text-white">Profile Image</th>
                <th class="text-white">Name</th>

              </tr>
            </thead>
            <tbody class="userDetail">

            </tbody>
          </table>
        </center>
        <br>
        <center>
          <button style="margin:5px;" class="btn btn-success" type="submit" id="link_submit" name="savelink">Submit</button>
        </center>
      </form>
    </center>
  </div>

  <center>
    <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="all_data-tab" href="#all_data" data-bs-toggle="pill" data-bs-target="#all_data" role="tab" aria-controls="all_data" aria-selected="false">
          <div class="d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="All Files">
            <img src="<?php echo BASE_URL; ?>assets/svg/file/3d_grey/All.png" style="height: 20px; width:20px;">
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="page-tab" href="#page" data-bs-toggle="pill" data-bs-target="#page" role="tab" aria-controls="page" aria-selected="true">
          <div class="d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pages">
            <img src="<?php echo BASE_URL; ?>assets/svg/file/3d_grey/Page.png" style="height: 20px; width:20px;">
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pdf-tab" href="#pdf" data-bs-toggle="pill" data-bs-target="#pdf" role="tab" aria-controls="pdf" aria-selected="true">
          <div class="d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="PDF Files">
            <img src="<?php echo BASE_URL; ?>assets/svg/file/3d_grey/Pdf.png" style="height: 25px; width:25px;">
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="docs-tab" href="#docs" data-bs-toggle="pill" data-bs-target="#docs" role="tab" aria-controls="docs" aria-selected="false">
          <div class="d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="DOCS Files">
            <img src="<?php echo BASE_URL; ?>assets/svg/file/3d_grey/Docs.png" style="height: 25px; width:25px;">
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="all-tab" href="#location_link" data-bs-toggle="pill" data-bs-target="#location_link" role="tab" aria-controls="location_link" aria-selected="false">
          <div class="d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Link">
            <img src="<?php echo BASE_URL; ?>assets/svg/file/3d_grey/Link.png" style="height: 25px; width:25px;">
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="image-tab" href="#image" data-bs-toggle="pill" data-bs-target="#image" role="tab" aria-controls="image" aria-selected="false">
          <div class="d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Images">
            <img src="<?php echo BASE_URL; ?>assets/svg/file/3d_grey/Image.png" style="height: 25px; width:25px;">
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="xls-tab" href="#xls" data-bs-toggle="pill" data-bs-target="#xls" role="tab" aria-controls="xls" aria-selected="false">
          <div class="d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="XLS Files">
            <img src="<?php echo BASE_URL; ?>assets/svg/file/3d_grey/xls.png" style="height: 25px; width:25px;">
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="other-tab" href="#other" data-bs-toggle="pill" data-bs-target="#other" role="tab" aria-controls="other" aria-selected="false">
          <div class="d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Other FIles">
            <img src="<?php echo BASE_URL; ?>assets/svg/file/3d_grey/other.png" style="height: 25px; width:25px;">
          </div>
        </a>
      </li>
    </ul>
  </center>

  <center>
    <!-- Tab Content -->
    <div class="tab-content">

      <div class="tab-pane fade" id="page" role="tabpanel" aria-labelledby="page-tab">
        <?php include ROOT_PATH . 'includes/Pages/pages.php'; ?>
      </div>

      <div class="tab-pane fade" id="pdf" role="tabpanel" aria-labelledby="pdf-tab">
        <?php include ROOT_PATH . 'includes/Pages/pdf.php'; ?>
      </div>

      <div class="tab-pane fade" id="docs" role="tabpanel" aria-labelledby="docs-tab">
        <?php include ROOT_PATH . 'includes/Pages/docs.php'; ?>
      </div>

      <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
        <?php include ROOT_PATH . 'includes/Pages/image.php'; ?>
      </div>

      <div class="tab-pane fade" id="location_link" role="tabpanel" aria-labelledby="location_link-tab">
        <?php include ROOT_PATH . 'includes/Pages/link.php'; ?>
      </div>

      <div class="tab-pane fade" id="xls" role="tabpanel" aria-labelledby="xls-tab">
        <?php include ROOT_PATH . 'includes/Pages/xls.php'; ?>
      </div>

      <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
        <p>Fifth tab content...</p>
      </div>

      <div class="tab-pane fade show active" id="all_data" role="tabpanel" aria-labelledby="all_data-tab">
        <?php include ROOT_PATH . 'includes/Pages/allfiles.php'; ?>
      </div>

    </div>
    <!-- End Tab Content -->
  </center>

</div>




<!--Edit folder modal-->


<!--Edit briefcase modal-->
<div class="modal fade" id="edit_location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Location/Link Name</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_location.php">
          <input type="hidden" class="form-control" name="editLocationId" value="" id="loc_edit_id" readonly>
          <input type="text" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
          <!-- <label style="font-weight:bold; margin:5px;">Briefcase :</label> -->
          <input type="text" class="form-control" name="editLocation" value="" id="location"><br>
          <input type="text" class="form-control" name="editLocationType" value="" id="type">
          <br>
          <input style="float:right;" class="btn btn-success" type="submit" name="locationEdit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editPdfFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_files.php" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="pdf_loc_edit_id" value="" id="pdf_loc_edit_id" readonly>
          <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
          <input type="hidden" class="form-control" name="fullname" value="" id="fullname" readonly>
          <input type="text" class="form-control" name="editname" value="" id="editname">
          <input style="float:right;" class="btn btn-success" type="submit" name="adminFileEdit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editlinkFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="get" action="<?php echo BASE_URL; ?>includes/Pages/edit_files.php" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="pdf_loc_edit_id" value="" id="pdf_link_edit_id">
          <input type="text" class="form-control" name="page_redirection" value="<?php ?>">
          <input type="text" class="form-control" value="" id="editlinkName" name="editFileName">
          <br>
          <input readonly class="form-control" type="text" id="editlastName" />
          <br>
          <input style="float:right;" class="btn btn-success" type="submit" name="adminFileEdit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="userEditPdfFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_files.php" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="pdf_loc_edit_id" value="" id="user_pdf_loc_edit_id" readonly>
          <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
          <input type="hidden" class="form-control" name="fullname" value="" id="user_fullname" readonly>
          <input type="text" class="form-control" name="editname" value="" id="user_editname">
          <input style="float:right;" class="btn btn-success" type="submit" name="adminFileEdit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>




<!--Edit file modal-->
<div class="modal fade" id="editfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_file.php">
          <input type="hidden" class="form-control" name="id" value="" id="file_id" readonly>
          <input type="text" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
          <label style="font-weight:bold; margin:5px;">Name :</label>
          <input type="text" class="form-control" name="name" value="" id="name1" readonly>
          <label style="font-weight:bold; margin:5px;">File :</label>
          <input type="file" class="form-control" name="file" value="" id="file1">
          <br>
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    // File upload via Ajax
    $(document).on('submit', "#multipleFile", function(e) {
      e.preventDefault();
      $.ajax({
        xhr: function() {
          var xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener("progress", function(evt) {
            if (evt.lengthComputable) {
              var percentComplete = ((evt.loaded / evt.total) * 100).toFixed(1);
              $(".progress-bar").width(percentComplete + '%');
              $(".progress-bar").html(percentComplete + '%');
              $(".removecss").html(percentComplete + '%');
              $('.removecss').each(function() {
                this.style.setProperty('--value', percentComplete);
                $(this).css({
                  'font-size': '.8rem',
                });
              });

            }
          }, false);
          return xhr;
        },
        type: 'POST',
        url: "<?php BASE_URL ?>includes/Pages/addfiles.php",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $(".removecss").html('0%');
          $(".progress-bar").width('0%');
          $('#uploadStatus').html('<img src="<?php echo BASE_URL ?>assets/loading.gif" style="height:100px;width:100px;border-radius:100px;"/>');
        },
        error: function(resp) {
          $('#uploadStatus').html('<p style="color:#EA4335;"><div class="alert alert-danger">Duplicate File Not Allowed...</div></p>');
        },
        success: function(resp) {
          if (resp.status == '200') {
            $('#multipleFile')[0].reset();
            $('#uploadStatus').html('<p style="color:#28A74B;">' + resp.message + '</p>');
          } else {
            $('#uploadStatus').html('<p style="color:#28A74B;"><div class="alert alert-danger">' + resp + '</div></p>');
          }
        }
      });
    });

    // File type validation
    $("#fileInput").change(function() {
      var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
      var file = this.files[0];
      var fileType = file.type;
      if (!allowedTypes.includes(fileType)) {
        alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
        $("#fileInput").val('');
        return false;
      }
    });
  });
</script>



<script>
  // Get a reference to the select element
  var selectElement = document.getElementById("fileOpt");

  // Attach an event listener to the select element
  selectElement.addEventListener("change", function() {
    // Get the value of the selected option
    var selectedOption = selectElement.options[selectElement.selectedIndex].value;

    // Check if the selected option value matches the desired value
    if (selectedOption === "addNewPage") {
      // Redirect the user to the desired page
      window.location.href = "<?php echo BASE_URL; ?>includes/Pages/text-editor-full.php?page=<?php echo $page_type ?>";
    }
  });
</script>

<script>
  $(".get_url_val").on("click", "button", function() {
    var id = $(this).attr('id');
    var text = $('.url_value' + id).text();
    //  alert('.get_valueb'+id);
    var temp1 = $("<input>");
    $("body").append(temp1);
    temp1.val(text).select();
    document.execCommand("copy");
    temp1.remove();
    $('.get_url_val').find("#" + id).find(".bi").removeClass("bi-files").addClass("bi-check-circle");
    $('.get_url_val').find("#" + id).removeClass("btn-soft-primary").addClass("btn-soft-success");
    setTimeout(function() {
      $('.get_url_val').find("#" + id).find(".bi").removeClass("bi-check-circle").addClass("bi-files");
      $('.get_url_val').find("#" + id).removeClass("btn-soft-success").addClass("btn-soft-primary");
    }, 2000);
  });
</script>


<!--Script for add multiple phases-->

<script>
  function file() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filesearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("filetable");
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

<script>
  $("#fileOptFile").change(function() {
    if ($(this).val() == "addFile") {
      $("#multipleFile").css("display", "block");
      $("#phase_form").css("display", "none");
      $("#filelink").css("display", "none");
      $("#newpageform").css("display", "none");
      $("#file").css("display", "block");
    }

    if ($(this).val() == "addFileLoca") {
      $("#phase_form").css("display", "block");
      $("#multipleFile").css("display", "none");
      $("#filelink").css("display", "none");
      $("#newpageform").css("display", "none");
      $("#file").css("display", "block");
    }
    if ($(this).val() == "addFileLink") {
      $("#phase_form").css("display", "none");
      $("#multipleFile").css("display", "none");
      $("#newpageform").css("display", "none");
      $("#filelink").css("display", "block");
      $("#file").css("display", "block");
    }
  });
</script>

<script>
  function file() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("file");
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



<!--Script for add multiple phases-->

<script>
  function copyText(event) {
    var copyText = document.getElementById("copy-text");
    copyText.select();
    document.execCommand("copy");
    event.preventDefault();
  }

  document.addEventListener("contextmenu", copyText);
</script>



<script>
  function pdf() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_pdf");
    filter = input.value.toUpperCase();
    table = document.getElementById("file_pdf");
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

<script>
  function docs() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_docs");
    filter = input.value.toUpperCase();
    table = document.getElementById("file_docs");
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

<script>
  function image() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_image");
    filter = input.value.toUpperCase();
    table = document.getElementById("file_image");
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

<script>
  function location_link() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_location");
    filter = input.value.toUpperCase();
    table = document.getElementById("file_location_link");
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

<script>
  function xls() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_xls");
    filter = input.value.toUpperCase();
    table = document.getElementById("file_xls");
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

<script>
  function file_all() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_all");
    filter = input.value.toUpperCase();
    table = document.getElementById("file_all");
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

<script>
  function page() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_page");
    filter = input.value.toUpperCase();
    table = document.getElementById("file_page");
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


<script>
  $(".editLoca").on("click", function() {
    var linkID = $(this).attr("id");
    var linkName = $(this).attr("name");
    var linkType = $(this).attr("value");
    $("#loc_edit_id").val(linkID);
    $("#location").val(linkName);
    $("#type").val(linkType);
  });



  $(".editFile").on("click", function() {
    var linkID = $(this).attr("id");
    var linkName = $(this).attr("value");
    $("#pdf_loc_edit_id").val(linkID);
    $("#editFileName").val(linkName);
  });

  $(".editFilelink").on("click", function() {
    var linkID = $(this).attr("id");
    var linkName = $(this).attr("value");
    var lastName = $(this).attr("name");
    $("#pdf_link_edit_id").val(linkID);
    $("#editlinkName").val(linkName);
    $("#editlastName").val(lastName);
  });

  $(".userEditFile").on("click", function() {
    var linkID = $(this).attr("id");
    var linkName = $(this).attr("value");
    $("#user_pdf_loc_edit_id").val(linkID);
    $("#userEditFileName").val(linkName);
  });

  $(".permissionModal").on("click", function() {
    var pageId = $(this).attr("value");
    $("#permissionPageID").val(pageId);
  });

  $(".permissionModalAdmin").on("click", function() {
    var pageId = $(this).attr("value");
    $("#permissionPageIDAdmin").val(pageId);
  });

  $(".txt_search").keyup(function() {
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
          $("#tableData").show();
          $('#userDetail').empty();
          $('#userDetail').append(response);
          // console.log(response);

        }
      });
    } else {
      $('.searchResult').empty();
      $("#tableData").hide();
    }
  });

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
          $("#tableData1").show();
          $('#adminDetail').empty();
          $('#adminDetail').append(response);
          // console.log(response);

        }
      });
    } else {
      $('.searchResult').empty();
      $("#tableData1").hide();
    }
  });
</script>

<script>
  $(".txt_search").keyup(function() {
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
          $(".tableData").show();
          $('.userDetail').empty();
          $('.userDetail').append(response);
          // console.log(response);

        }
      });
    } else {
      $('.searchResult').empty();
      $(".tableData").hide();
    }


  });
</script>

<script>
  $(".pageData").on("click", function() {
    var pageId = $(this).attr("name");
    var pageName = $(this).attr("value");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/getPageData.php',
      data: {
        pageId: pageId,
      },
      success: function(response) {
        $("#pageName").empty();
        $('#pageModal').empty();
        $('#pageName').append(pageName);
        $('#pageModal').append(response);
        // alert(response);

      }
    });
  });
</script>


<script type="text/javascript">
  // check and uncheck checkbox of page
  $(document).on("click", ".page_checks", function() {

    var checkboxes = document.getElementsByClassName('get_page_checks');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;

    }

  });

  // check and uncheck checkbox of folder
  $(document).on("click", ".folder_checks", function() {

    var checkboxes = document.getElementsByClassName('get_folder_checks');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;

    }

  });

  // check and uncheck checkbox of shop
  $(document).on("click", ".shop_checks", function() {

var checkboxes = document.getElementsByClassName('get_shop_checks');
for (var checkbox of checkboxes) {
  checkbox.checked = this.checked;

}

});

  //check for admin brief
  $(document).on("click", ".brief_checks", function() {

    var checkboxes = document.getElementsByClassName('get_brief_checks');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;

    }

  });

  //check for user brief
  $(document).on("click", ".user_brief_checks", function() {

    var checkboxes = document.getElementsByClassName('get_user_brief_checks');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;

    }

  });
  // check and uncheck checkbox of pdf
  $(document).on("click", ".page_checks1", function() {

    var checkboxes = document.getElementsByClassName('get_page_checks1');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;

    }

  });
  // check and uncheck checkbox of docxs
  $(document).on("click", ".page_checks2", function() {

    var checkboxes = document.getElementsByClassName('get_page_checks2');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;

    }

  });
  // check and uncheck checkbox of locations
  $(document).on("click", ".page_checks3", function() {

    var checkboxes = document.getElementsByClassName('get_page_checks3');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;

    }

  });
  //delete image
  $(document).on("click", ".page_checks4", function() {

    var checkboxes = document.getElementsByClassName('get_page_checks4');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;

    }

  });
  //select and unselect xls
  $(document).on("click", ".page_checks5", function() {

    var checkboxes = document.getElementsByClassName('get_page_checks5');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;

    }

  });
  //delete all files
  $(document).on("click", ".page_checks6", function() {

    var checkboxes = document.getElementsByClassName('get_page_checks6');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;

    }

  });

  //delete pages
  $(document).on("click", ".delte_pages", function() {
    var values = $('input[name="delete_multiple_pages[]"]').val();
    var arr = [];
    $('input[name="delete_multiple_pages[]"]:checked').each(function() {
      arr.push({
        name: this.value,
        ides: this.id
      });
    });
    if (arr) {
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "<?php echo BASE_URL; ?>includes/Pages/delete_multiple_pages.php",
          method: "POST",
          data: 'values=' + names + '&id=' + id,
          success: function(data) {

            $('input[name="delete_multiple_pages[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    }
  });

  //delete folder
  $(document).on("click", ".delte_folder", function() {
    var values = $('input[name="delete_multiple_folder[]"]').val();
    var arr = [];
    $('input[name="delete_multiple_folder[]"]:checked').each(function() {
      arr.push({
        name: this.value,
        ides: this.id
      });
    });
    if (arr) {
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "<?php echo BASE_URL; ?>includes/Pages/delete_multiple_pages.php",
          method: "POST",
          data: 'folderId=' + names + '&id=' + id,
          success: function(data) {

            $('input[name="delete_multiple_folder[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    }
  });

  //delete shop
  $(document).on("click", ".delte_shop", function() {
    var values = $('input[name="delete_multiple_shop[]"]').val();
    var arr = [];
    $('input[name="delete_multiple_shop[]"]:checked').each(function() {
      arr.push({
        name: this.value,
        ides: this.id
      });
    });
    if (arr) {
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "<?php echo BASE_URL; ?>includes/Pages/delete_multiple_pages.php",
          method: "POST",
          data: 'shopId=' + names + '&id=' + id,
          success: function(data) {

            $('input[name="delete_multiple_shop[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    }
  });

  //delete brief

  $(document).on("click", ".delte_brief", function() {
    var values = $('input[name="delete_multiple_brief[]"]').val();
    var arr = [];
    $('input[name="delete_multiple_brief[]"]:checked').each(function() {
      arr.push({
        name: this.value,
        ides: this.id
      });
    });
    if (arr) {
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "<?php echo BASE_URL; ?>includes/Pages/delete_multiple_pages.php",
          method: "POST",
          data: 'values=' + names + '&briefId=' + id,
          success: function(data) {
            // alert(data);
            $('input[name="delete_multiple_brief[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    }
  });

  //delete user brief

  $(document).on("click", ".delte_user_brief", function() {
    var values = $('input[name="delete_multiple_user_brief[]"]').val();
    var arr = [];
    $('input[name="delete_multiple_user_brief[]"]:checked').each(function() {
      arr.push({
        name: this.value,
        ides: this.id
      });
    });
    if (arr) {
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "<?php echo BASE_URL; ?>includes/Pages/delete_multiple_pages.php",
          method: "POST",
          data: 'values=' + names + '&briefId=' + id,
          success: function(data) {
            // alert(data);
            $('input[name="delete_multiple_user_brief[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    }
  });

  //delete pdf
  $(document).on("click", ".delte_pages1", function() {
    var values = $('input[name="delete_multiple_pages1[]"]').val();
    var arr = [];
    $('input[name="delete_multiple_pages1[]"]:checked').each(function() {
      arr.push({
        name: this.value,
        ides: this.id
      });
    });
    if (arr) {
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "<?php echo BASE_URL; ?>includes/Pages/delete_multiple_files.php",
          method: "POST",
          data: 'values=' + names + '&id=' + id,
          success: function(data) {

            $('input[name="delete_multiple_pages1[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    }
  });
  //delete docx
  $(document).on("click", ".delte_pages2", function() {
    var values = $('input[name="delete_multiple_pages2[]"]').val();
    var arr = [];
    $('input[name="delete_multiple_pages2[]"]:checked').each(function() {
      arr.push({
        name: this.value,
        ides: this.id
      });
    });
    if (arr) {
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "<?php echo BASE_URL; ?>includes/Pages/delete_multiple_files.php",
          method: "POST",
          data: 'values=' + names + '&id=' + id,
          success: function(data) {
            $('input[name="delete_multiple_pages2[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    }
  });
  //delete location
  $(document).on("click", ".delte_pages3", function() {
    var values = $('input[name="delete_multiple_pages3[]"]').val();
    var arr = [];
    $('input[name="delete_multiple_pages3[]"]:checked').each(function() {
      arr.push({
        name: this.value,
        ides: this.id
      });
    });
    if (arr) {
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "<?php echo BASE_URL; ?>includes/Pages/delete_multiple_files.php",
          method: "POST",
          data: 'values=' + names + '&id=' + id,
          success: function(data) {

            $('input[name="delete_multiple_pages3[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    }
  });
  //delete images
  $(document).on("click", ".delte_pages4", function() {
    var values = $('input[name="delete_multiple_pages4[]"]').val();
    var arr = [];
    $('input[name="delete_multiple_pages4[]"]:checked').each(function() {
      arr.push({
        name: this.value,
        ides: this.id
      });
    });
    if (arr) {
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "<?php echo BASE_URL; ?>includes/Pages/delete_multiple_files.php",
          method: "POST",
          data: 'values=' + names + '&id=' + id,
          success: function(data) {

            $('input[name="delete_multiple_pages4[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    }
  });
  //delete xlsx
  $(document).on("click", ".delte_pages5", function() {
    var values = $('input[name="delete_multiple_pages5[]"]').val();
    var arr = [];
    $('input[name="delete_multiple_pages5[]"]:checked').each(function() {
      arr.push({
        name: this.value,
        ides: this.id
      });
    });
    if (arr) {
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "<?php echo BASE_URL; ?>includes/Pages/delete_multiple_files.php",
          method: "POST",
          data: 'values=' + names + '&id=' + id,
          success: function(data) {

            $('input[name="delete_multiple_pages5[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    }
  });
  //delete all files
  $(document).on("click", ".delte_pages6", function() {
    var values = $('input[name="delete_multiple_pages6[]"]').val();
    var arr = [];
    $('input[name="delete_multiple_pages6[]"]:checked').each(function() {
      arr.push({
        name: this.value,
        ides: this.id
      });
    });
    if (arr) {
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "<?php echo BASE_URL; ?>includes/Pages/delete_multiple_files.php",
          method: "POST",
          data: 'values=' + names + '&id=' + id,
          success: function(data) {

            $('input[name="delete_multiple_pages6[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    }
  });

  function testId(id) {

    // Select the checkbox with the custom attribute "data-custom-attribute" set to "my-custom-attribute"
    $('input[type="checkbox"][data-created="' + id + '"]').prop('checked', true);

  }
</script>


<script>
  function file_by_file() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("file_search");
    filter = input.value.toUpperCase();
    table = document.getElementById("files1");
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