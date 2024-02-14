<?php
include('../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Schedulling</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
                    <?php include 'lb_thumbnail.php';?>
</head>
<body style="background-color:#002540;">
<?php include 'lb_loader.php';?>


<div id="header-hide">
<?php
include(ROOT_PATH.'includes/scheduling_header.php');
?>
</div>
<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main" style="background-color:#002540;">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 25rem;">
        <!-- Page Header -->
        <!-- <div class="page-header page-header-light">
          <img style="height: 50px;" class="img-fluid" src="./assets/svg/logos/sche.svg" alt="SVG Illustration">
        </div> -->
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="background-color:#002540; border: 1px solid black;">
          		<div class="page-header page-header-light m-5">
			          <h1 class="text-light">Library</h1>
			        </div>

            <!-- Body -->
            <div class="card-body" style="background-color:#002540;">
              
              <div class="container" style="background-color:#002540;">
							  
							  <div id="accordion">
							    <div class="card">
							      <div class="card-header bg-success">
							        <a class="btn btn-soft-dark" data-bs-toggle="collapse" href="#collapseOne">
							          Tab 1
							        </a>
							        <a class="collapsed btn btn-soft-dark" data-bs-toggle="collapse" href="#collapseTwo">
							        Tab 2
							      </a>
							      <a class="collapsed btn btn-soft-dark" data-bs-toggle="collapse" href="#collapseThree">
							          Tab 3
							        </a>

							        <a class="collapsed btn btn-soft-dark" data-bs-toggle="collapse" href="#collapseFour">
							          Tab 4
							        </a>

							        <a class="collapsed btn btn-soft-dark" data-bs-toggle="collapse" href="#collapseFive">
							          Tab 5
							        </a>
							      </div>
							      
							      <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
							        <div class="card-body">
							          <button class="btn btn-primary">Content 1</button>
							          <button class="btn btn-primary">Content 2</button>
							          <button class="btn btn-primary">Content 3</button>
							          <button class="btn btn-primary">Content 4</button>
							          <button class="btn btn-primary">Content 5</button>
							        </div>
							      </div>
							    </div>
							    <div class="card">
							      <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
							        <div class="card-body">
							          <button class="btn btn-secondary">Content 1</button>
							          <button class="btn btn-secondary">Content 2</button>
							          <button class="btn btn-secondary">Content 3</button>
							          <button class="btn btn-secondary">Content 4</button>
							          <button class="btn btn-secondary">Content 5</button>
							        </div>
							      </div>
							    </div>
							    <div class="card">
							      <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
							        <div class="card-body">
							          <button class="btn btn-danger">Content 1</button>
							          <button class="btn btn-danger">Content 2</button>
							          <button class="btn btn-danger">Content 3</button>
							          <button class="btn btn-danger">Content 4</button>
							          <button class="btn btn-danger">Content 5</button> 
							        </div>
							      </div>
							    </div>
							    <div class="card">
							      <div id="collapseFour" class="collapse" data-bs-parent="#accordion">
							        <div class="card-body">
							          <button class="btn btn-warning">Content 1</button>
							          <button class="btn btn-warning">Content 2</button>
							          <button class="btn btn-warning">Content 3</button>
							          <button class="btn btn-warning">Content 4</button>
							          <button class="btn btn-warning">Content 5</button> 
							        </div>
							      </div>
							    </div>
							    <div class="card">
							      <div id="collapseFive" class="collapse" data-bs-parent="#accordion">
							        <div class="card-body">
							          <button class="btn btn-success">Content 1</button>
							          <button class="btn btn-success">Content 2</button>
							          <button class="btn btn-success">Content 3</button>
							          <button class="btn btn-success">Content 4</button>
							          <button class="btn btn-success">Content 5</button> 
							        </div>
							      </div>
							    </div>
							  </div>
							</div>	
        
            </div>

         
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>

</main>

</body>
</html>