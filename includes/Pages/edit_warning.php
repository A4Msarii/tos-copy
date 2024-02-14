<!--Insert Phases-->
<?php
$warning_ids="";
$warning_ids=urldecode(base64_decode($_GET['id']));
$outputwarning="";
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$query = "SELECT * FROM warning_data where id='$warning_ids'";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $outputwarning .= $row['warning_name'];
                    }
                }
               

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Warning</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
				   <link rel="shortcut icon" href="./ico-copy.ico">

</head>
<body>

<script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
  <div id="loading-screen" style="display:none;">
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  </div>
<?php
include(ROOT_PATH.'includes/head_navbar.php');
?>
<!--Input Phases-->
<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 22rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
       <!--  <div class="page-header page-header-light">
          <h1 style="color:black;">Edit Type</h1>
        </div> -->
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <!-- Header -->
            <div class="card-header card-header-content-center">
               
               <h3 class="text-success">Edit Warning</h3>
              
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
            	<center>
              	<form class="insert-phases" id="integrity" method="post" action="edit_warning_name.php" style="width:700px;">
								<div class="input-field">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $warning_ids?>">
                                <input type="text" class="form-control" name="war_name" value="<?php echo $outputwarning?>">
								</div><br>
								<center>
									<input type="submit" name="save" value="Submit" class="btn btn-success">
								</center>
							</form>	
						</center>

			<!--Phase Table-->

						
							
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->

</main>

<!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>



</body>
</html>