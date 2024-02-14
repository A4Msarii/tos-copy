<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>New Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                    initial-scale=1" />
 <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>
<script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script>
  <style>
    /* Style the editor container and toolbar */
    .editor-container {
      margin: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
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
      min-height: 200px;
    }
    #name
    {
      width: 80%;
      height: 50px;
      border-radius: 5px;
      border: 1px solid #808080b3;
      font-size: 30px;
      color: #8b8f8f9e;
    }
    #pagetitlecontainer
    {
      height: 30%;
    }
    :-ms-input-placeholder {
  color: red;
  font-size: 30px;
  opacity: 1; /* Firefox */
}
  </style>
<body>
<script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
  <div id="loading-screen" style="display:none;">
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  </div>
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
        <div class="card card-hover-shadow h-100 editor-container" style="border:0.001rem solid #dddddd;">
          <!-- Header -->

          <!-- End Header -->

          <!-- Body -->

            <center>
              
              
  <!-- <div class="editor-toolbar"> -->
  <!-- Add the toolbar buttons for formatting options -->
  <!-- <button class="toolbar-btn" data-format="bold"><b>Bold</b></button>
      <button class="toolbar-btn" data-format="italic"><i>Italic</i></button>
      <button class="toolbar-btn" data-format="underline"><u>Underline</u></button>
      <button class="toolbar-btn" data-format="strikethrough"><strike>Strikethrough</strike></button>
      <select class="toolbar-dropdown" data-format="fontname">
        <option value="Arial">Arial</option>
        <option value="Verdana">Verdana</option>
        <option value="Helvetica">Helvetica</option>
        <option value="Times New Roman">Times New Roman</option>
      </select>
      <select class="toolbar-dropdown" data-format="fontsize">
        <option value="8pt">8pt</option>
        <option value="10pt">10pt</option>
        <option value="12pt">12pt</option>
        <option value="14pt">14pt</option>
      </select>
      <button class="toolbar-btn" data-format="forecolor">Font Color</button>
      <button class="toolbar-btn" data-format="backcolor">Background Color</button>
    </div> -->
  <!-- Add the textarea for the editor content -->
  <form action="editor_data.php" method="post" enctype="multipart/form-data">
    <div class="container" style="height:50px; background-color:aliceblue;">
      <div class="row" style="float: right;">
        <button style="float:right;" class="btn"><i class="bi bi-download" style="margin:5px;"></i>Save Changes</button>
      </div>
    </div>
  <div refs="page-editor@titleContainer" class="input" style="text-align:center;" id="pagetitlecontainer">
    <input type="text" id="name" name="name" placeholder="Page Title" value="New Page">
  </div>
  <textarea id="editor" class="editor-content">
  </textarea>
  </form>

            </center>
            

            
          
          <!-- End Body -->
        </div>
        <!-- End Card -->
      </div>
    </div>
    <!-- End Row -->
  </div>
  <!-- End Content -->

</main>




<script>
    // Initialize the TinyMCE editor without file, edit, and view menus
    tinymce.init({
        selector: '#editor',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | bold italic underline strikethrough | fontname fontsize | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/content-standard.min.css'
        ],
        font_formats: 'Arial=arial,helvetica,sans-serif; Verdana=verdana,geneva; Helvetica=helvetica; Times New Roman=times new roman,times,serif',
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
        menubar: false
    });
</script>

<!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>


</body>
</html>