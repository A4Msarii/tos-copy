<?php
  include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Class</title>
<!-- <title>Phase</title> -->
  <meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
                  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
                   <!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript library -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>

<div id="header-hide">
   <?php
  include(ROOT_PATH.'includes/head_navbar.php');
   ?> 
</div>
    <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 25rem;">
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Body -->             
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <?php  
                      $query7 = "SELECT * FROM files where type='jpg'";
                      $statement = $connect->prepare($query7);
                      $statement->execute();

                      if($statement->rowCount() > 0) {
                        $result = $statement->fetchAll();
                        $sn=1;
                        $images = array();
                        foreach($result as $row) {
                          $images[] = $row['name'];
                        }
                        foreach ($images as $image) {
                          echo '<div class="carousel-item">';
                          echo '<img src="files/' . $image . '" class="d-block w-100" alt="">';
                          echo '</div>';
                        }
                      }       
                    ?>  
                  </div>
                  <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button> -->
                </div>
           
            <!-- End Body -->
           <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:500px;">
  <!-- Indicators -->
 <center>
  
  <!-- Slides -->
  <div class="carousel-inner">
    <?php foreach ($images as $index => $image) { ?>
      <div class="carousel-item <?php if ($index === 0) echo 'active'; ?>">
        <img src="files/<?php echo $image ?>" class="d-block w-100" alt="<?php echo $image ?>">
      </div>
    <?php } ?>
  </div>
  
  <!-- Thumbnails -->
  <div class="carousel-thumbnails">
    <?php foreach ($images as $index => $image) { ?>
      <a href="#myCarousel" data-slide-to="<?php echo $index ?>" class="<?php if ($index === 0) echo 'active'; ?>">
        <img src="files/<?php echo $image ?>" alt="<?php echo $image ?>" width="50">
      </a>
    <?php } ?>
  </div>
  </center>
  <!-- Controls -->
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->
</main>

<br>


<script>
  $(document).ready(function() {
    $('#myCarousel').carousel();
  });
</script>

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>