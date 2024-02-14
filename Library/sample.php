<?php
include('../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shelf</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
                    <?php include 'lb_thumbnail.php';?>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/chart.js/dist/Chart.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/jsvectormap/dist/css/jsvectormap.min.css">

  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/snippets.min.css">


  <!-- CSS Front Template -->

  <link rel="preload" href="<?php echo BASE_URL;?>assets/css/theme.min.css" data-hs-appearance="default" as="style">
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <form class="d-flex mx-auto">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Menu Item 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Menu Item 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Menu Item 3</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>