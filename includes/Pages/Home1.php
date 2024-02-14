<?php

include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$course="select course";
$std_course = "";
if(isset($_REQUEST['noti_id'])){
  $noti_id=urldecode(base64_decode($_REQUEST['noti_id']));
  $update_read="UPDATE `notifications`
  SET `is_read` = 1 WHERE `id`='$noti_id'";
  $update_statement = $connect->prepare($update_read);
  $update_statement->execute();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Quiz Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
 <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>

<body>

<script src="loading.js"></script>
<div id="loading-screen" style="display:none;">
    <?php include 'gsloader.php';?>
  </div>
<!--Head Navbar-->
<div id="header-hide">
<?php
include(ROOT_PATH.'includes/head_navbar.php');
$classcolor= "SELECT * FROM gradesheet where user_id='$fetchuser_id'";
$classcolorst= $connect->prepare($classcolor);
$classcolorst->execute();

if($classcolorst->rowCount() > 0)
  {
    $class="";  
  }
else
  {
    $class=""; 
  }
?>
</div>
<!--Main Content-->



<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <div class="page-header" style="margin-top:50px;">
          <h1 class="text-success">DashBoard</h1>
        </div>
        <!-- End Page Header -->
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">

              <?php include 'courcecode.php';?>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
             <!-- Nav -->
              <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" href="#home" data-bs-toggle="pill" data-bs-target="#home" role="tab" aria-controls="home" aria-selected="true">
                    <div class="d-flex align-items-center">
                      DashBoard
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Home.php" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                      Result
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="overall-tab" href="#overall" data-bs-toggle="pill" data-bs-target="#overall" role="tab" aria-controls="overall" aria-selected="false">
                    <div class="d-flex align-items-center">
                      OverAll
                    </div>
                  </a>
                </li>
              </ul>
              <!-- End Nav -->

              <!-- Tab Content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <p>First tab content...</p>
                </div>

                

                <div class="tab-pane fade" id="overall" role="tabpanel" aria-labelledby="overall-tab">
                  <p>Third tab content...</p>
                </div>
              </div>
<!-- End Tab Content -->      
           </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
  </div>
    <!-- End Content -->

</main>


<!--footer-->
<footer id="content1" role="footer" class="footer">
  <?php
    include(ROOT_PATH.'includes/footer2.php');
             
  ?>
</footer>            


<script>
  $(document).ready(function () {
    // Function to handle tab switching
    function switchTab(tabId) {
      // Hide all tab content
      $('.tab-pane').removeClass('show active');

      // Show the selected tab content
      $(tabId).addClass('show active');
    }

    // Handle tab click event
    $('#myTab a.nav-link').click(function (e) {
      e.preventDefault();
      var tabId = $(this).attr('data-bs-target');
      
      // Check if the clicked tab is the second tab
      if ($(this).attr('id') === 'result-tab') {
        // Redirect to result.php if it's the second tab
        window.location.href = 'Home.php';
      } else {
        // Switch tabs for other tabs
        switchTab(tabId);
      }
    });

    // Show the first tab by default
    switchTab('#result');
  });
</script>






</body>
</html>