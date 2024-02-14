<div class="editor-container">
  <form action="editor_data.php" method="post" enctype="multipart/form-data">
    <div class="container" style="height:50px; background-color:black;">
      <div class="row" style="float: right;">
        <button style="float:right;" class="btn"><i class="bi bi-download" style="margin:5px;"></i>Save Changes</button>
      </div>
    </div>
  <div refs="page-editor@titleContainer" class="input" style="text-align:center;background-color:black;" id="pagetitlecontainer">
    <input type="text" id="name" name="name" placeholder="Page Title" value="New Page" style="background-color:black;" />
  </div>
  <textarea id="editor" class="editor-content" style="height: 650px;">
  </textarea>
  </form>
</div>


<script>
    // Initialize the TinyMCE editor without file, edit, and view menus
    // Initialize the TinyMCE editor without file, edit, and view menus
tinymce.init({
  selector: '#editor',
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen codesample',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | bold italic underline strikethrough | fontname fontsize | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | codesample | code | about fullscreen',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/content-standard.min.css'
  ],
  font_formats: 'Arial=arial,helvetica,sans-serif; Verdana=verdana,geneva; Helvetica=helvetica; Times New Roman=times new roman,times,serif',
  fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
  menubar: false,
  fullscreen_native: true,
  about_text: 'Your About Text Here',
  style_formats: [ // Add the style_formats option
    { title: 'Paragraph', format: 'p' } // Add the "p" element to the style_formats option
  ]
});




  </script>