<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Home page</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
	<link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

	<style type="text/css">
		label
		{
			color: blue;
    font-weight: bolder;
    font-size: large;
		}
	</style>
</head>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>


	<!--Head Navbar-->
	<div id="header-hide">
		<?php
		include(ROOT_PATH . 'includes/head_navbar.php');
		?>
	</div>
	<!--Main contect We need to insert data here-->
	<main id="content" role="main" class="main">
		<!-- Content -->
		<div>
			<div class="content container-fluid" style="height: 30rem;">
				<!-- Page Header -->
				<?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
				<div class="page-header" style="padding: 0px;">
					<h1 class="text-success">Let's Begin</h1>
				</div>
				<!-- End Page Header -->
			</div>
		</div>
		<!-- End Content -->

		<!-- Content -->
		<div class="content container-fluid" style="margin-top: -20rem;">

			<div class="row justify-content-center">

				<div class="col-lg-10">
          
							<?php
							$readonly="";$ma_name="";$department_name="";$description="";$location="";$contact_number="";$email="";$website="";$additional="";
									$q11 = "SELECT * FROM main_department where user_id=$user_id";
									$st11 = $connect->prepare($q11);
									$st11->execute();
		
									if ($st11->rowCount() > 0) {
										$result11 = $st11->fetchAll();
										foreach ($result11 as $row11) {
											$ma_id=$row11['id'];
											$ma_name=$row11['department_name'];
											$q1 = "SELECT * FROM homepage where school_name='$ma_id' LIMIT 1";
											$st1 = $connect->prepare($q1);
											$st1->execute();

											if ($st1->rowCount() > 0) {
												$result = $st1->fetchAll();
												foreach ($result as $row) {
													$readonly="readonly";
													$department_name=$row['department_name'];
													$description=$row['description'];
													$location=$row['location'];
													$contact_number=$row['contact_number'];
													$email=$row['email'];
													$website=$row['website'];
													$additional=$row['additional'];
												}
											}
						}
					}
							?>

					<div class="card card-hover-shadow" style="border:0.001rem solid #dddddd;"> 
						<div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">

              <h2 class="text-dark">Main Department</h2> 
            </div>
						<div class="card-body">
							 <form method="post" action="homedatabase.php" enctype="multipart/form-data">
									<input type="hidden" name="user_id" value="<?php echo $user_id ?>" class="form-control"><br>
									<label>Head Department/Institute Name<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
									<input type="text" name="school_name" class="form-control" <?php echo $readonly; ?> value="<?php if($ma_name!=""){ echo $ma_name;}else{ echo "";}?>" placeholder="Enter Head Department Name" required><br>
						</div>
					</div>
				</div>

			</div><br>
					<!-- Card -->
		  <div class="row justify-content-center">

				<div class="col-lg-10">
							<div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
								<div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">

		              <h2 class="text-dark">Department</h2>
		            </div>
		                      <!-- Body -->
										<div class="card-body">
											

													<label>Department Name<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
													<input type="text" name="department_name"  class="form-control" <?php echo $readonly; ?> placeholder="Enter Department Name" value="<?php if($department_name!=""){ echo $department_name;}else{ echo "";}?>" required><br>

													<label>Description<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
													<input type="text" name="description" class="form-control" <?php echo $readonly; ?> placeholder="Add Description" value="<?php if($description!=""){ echo $description;}else{ echo "";}?>" required><br>

													<label>Location<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
													<input type="text" name="location" class="form-control" <?php echo $readonly; ?> placeholder="Enter Location" value="<?php if($location!=""){ echo $location;}else{ echo "";}?>" required><br>

													<label>Contact Number<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
													<input type="number" name="contact_number" class="form-control" <?php echo $readonly; ?> value="<?php if($contact_number!=""){ echo $contact_number;}else{ echo "";}?>" placeholder="Enter Phone Number"><br>

													<label>Email ID<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
													<input type="text" name="email" class="form-control" <?php echo $readonly; ?> placeholder="Enter Email" value="<?php if($email!=""){ echo $email;}else{ echo "";}?>"><br>

													<label>Website</label>
													<input type="text" name="website" class="form-control" <?php echo $readonly; ?> placeholder="Enter Website" value="<?php if($website!=""){ echo $website;}else{ echo "";}?>"><br>

													<label>Additional Information</label>
													<input type="text" name="additional" class="form-control" <?php echo $readonly; ?> placeholder="Enter Additional Information" required value="<?php if($additional!=""){ echo $additional;}else{ echo "";}?>"><br>
												

													<?php if($readonly==""){ ?>
													<label>Profile Pic</label>
													<input class="form-control" type="file" name="file" accept="image/*" readonly /> <br>
													<button class="btn btn-success" type="submit" name="save">Save/Next</button>
													<?php }else{ ?>
													<a class="btn btn-success" href="devision.php" style="margin: 10px;">Save/Next</a>
													<?php } ?>
													
											
										</div>
								<!-- End Body -->
							</div>
						</form>
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
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>