<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$course_names11 = "";
$q6 = "SELECT * FROM roles";
$st6 = $connect->prepare($q6);
$st6->execute();

if ($st6->rowCount() > 0) {
  $re6 = $st6->fetchAll();
  foreach ($re6 as $row6) {
    $course_name_value=$row6['roles'];
   $course_names11 .= '<option value="' . $row6['id'] . '">' .$course_name_value .'</option>';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Create template</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/dragDrop.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
 
</head>

<style>
    #resizable { width: 150px; height: 150px; padding: 0.5em; position: relative; }
    #resizable h3 { text-align: center; margin: 0; }
    #draggable-container { width: 1300px; height: 800px;margin-right:30px;border: 1px solid #ccc;background-color:black }
  </style>
<body>
 
    <?php include ROOT_PATH. 'includes/Pages/gsloader.php'; ?>

  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>
   <main id="content" role="main" class="main">
  
    <div>
      <div class="content container-fluid" style="height: 25rem;">
       </div>
    </div>
    
    <div class="content container-fluid" style="margin-top: -22rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
              <h3 class="text-success">Create Template</span></h3>
            </div>
            <div class="card-body">
                        <form action="create_certificate.php">
                        <label>certificate name</label>
                         <input type="text" name="certificate_name" style="width: 20%;" placeholder="Enter Name" class="form-control" required>
                        <label>Select Style of frame</label>
                        <select class="form-control select_type" required style="width: 20%;" name="type">
                      
                        <option value="landscape">Landscape</option>
                        <option value="portrait">Portrait</option>
                        </select>
                        <br>
                        <input type="submit" class="btn btn-success">
                        </form> 
                        <hr>
              
                        <table class="table table-striped table-bordered">
                            <!-- <input style="margin:5px;" class="form-control" type="text" id="devisionsearch" onkeyup="devision()" placeholder="Search for devision.." title="Type in a name"> -->
                            <thead class="bg-dark">
                              <th class="text-light">Sr No</th>
                              <th class="text-light">Name</th>
                              <th class="text-light">Type</th>
                             
                             <th class="text-light" colspan="2">Action</th>
                            </thead>
                            <tbody>
                              <?php 
                              $q6 = "SELECT * FROM certificate_data";
                              $st6 = $connect->prepare($q6);
                              $st6->execute();
                              
                              if ($st6->rowCount() > 0) {
                                $no=1;
                                $re6 = $st6->fetchAll();
                                foreach ($re6 as $row6) {
                                  ?>
                                  <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row6['name']; ?></td>
                                    <td><?php echo $row6['type']; ?></td>
                                   
                                    <td>
                                    <a class="btn btn-soft-success btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/dynamicTemplate/editTemplate.php?id=<?php echo $row6['id']; ?>" title="Edit"><i class="bi bi-pen-fill"></i></a>
                                      <a class="btn btn-soft-secondary btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/dynamicTemplate/generateCertificate.php?id=<?php echo $row6['id']; ?>" title="Generate"><i class="bi bi-printer-fill"></i></a>
                                      <a href="delete_cert.php?id=<?php echo $row6['id']?>" class="btn btn-soft-danger btn-xs" title="Delete"><i class="bi bi-trash-fill"></i></a>
                                    </td>
                                  </tr>
                                  <?php 
                                }

                              }
                              ?>
                              
                            </tbody>

                          </table>



                       
                </div>
          </div>
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>

    <script>
    $(function() {
      $("#resizable").resizable();
      $("#resizable").draggable({
        containment: "#draggable-container" // Set the containment to the specific area.
      });
    });
  </script>
<script>
  $('#select_type').on('change', function() {
    var get_val = $(this).val(); 
    if(get_val=="img"){
      $(".img_select").show();
    }
  });

  $(document).ready(function() {
 

  // Change container size based on selected option
  $('.select_type').on('change', function() {
    var selectedOption = $(this).val();
    if (selectedOption === 'horizontal') {
      $('#draggable-container').css({
        'width': '800px',
        'height': '1300px'
      });
    } else if (selectedOption === 'vertical') {
      $('#draggable-container').css({
        'width': '1300px',
        'height': '800px'
      });
    }
  });
});
  </script>


  <footer id="content1" role="footer" class="footer">
    <?php
    include(ROOT_PATH . 'includes/footer2.php');
    ?>
  </footer>




   <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>


</body>

</html>