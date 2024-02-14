<!--Insert Phases-->
<?php
$type_ids="";
$type_ids=urldecode(base64_decode($_GET['id']));
$outputtype="";

include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$query = "SELECT * FROM type_data where id='$type_ids'";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $outputtype .= $row['type_name'];
                    }
                }
               

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Type</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
				   <link rel="shortcut icon" href="./ico-copy.ico">

</head>
<body>
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
               
               <h3 class="text-success">Edit Type</h3>
                
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
            	<center>
              	<form class="insert-phases" id="integrity" method="post" action="Edit_type_name.php" style="width:700px;">
								<div class="input-field">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $type_ids?>">
                                <input type="text" class="form-control" name="upt_name" value="<?php echo $outputtype?>">
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

<!--footer-->

 <footer id="content1" role="footer" class="footer">
    <!-- Content -->
     <div class="bg-success">
     
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="container-fluid">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3">
          <!-- Card -->
          <div class="card h-100">

            <!-- Body -->
            <div class="card-body">
              <?php
              include 'footer2.php';
              ?>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->

</footer>

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!--Script for add multiple phases-->


</body>
</html>