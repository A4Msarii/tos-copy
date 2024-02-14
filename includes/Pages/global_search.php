<?php
include '../config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$user_id = $_SESSION['login_id'];
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search Engine</title>
	<link rel="shortcut icon" href="<?php echo BASE_URL; ?>includes/Pages/tos.svg">
	<style>
		.color1 {
			background: #FA9C23;
			color: white;
		}

		.color2 {
			background: #CBE8FF;
			color: black !important;
		}


		.nt {
			position: relative;
			z-index: 10;
		}

		.rounde {
			border-radius: 20px;
			width: 100px;
			color: #162241;

		}

		.circle1 {
			width: 128px;
			height: 128px;
			flex-shrink: 0;
			background: rgba(82, 166, 243, 0.24);
			position: absolute;
			z-index: 1000;
			border-radius: 100px;
		}

		.circle {
			width: 60px;
			height: 60px;
			flex-shrink: 0;
			background: rgba(250, 156, 35, 0.22);
			position: absolute;
			z-index: 1000;
			right: 0px;
			bottom: 0px;
			border-radius: 100px;
		}

		.search {
			width: 100%;
			border-radius: 50px;
			padding: 10px;
			background: white;
			border:2px solid;
			outline: none;
		}

		.responsedata {
			height: 300px;
			width: 100%;
			margin-top: -10px;
			border-bottom-left-radius: 10px;
			border-bottom-right-radius: 10px;
			box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
			padding-top: 2rem;
			overflow-y: scroll;
		}
		.astyle{
			color:black;
			text-decoration: none;
		}
		.astyle li{
			padding: 4px;
			
		}
		.astyle li:hover{
			background-color: #CBE8FF;

		}
	</style>
</head>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>



  <div id="header-hide">
    <?php
    include '../head_navbar1.php';
    ?>
  </div>
 
  <main id="content" role="main" class="main" style="margin-top:70px;">
  	<div>
  	<?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
  </div>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<img class="col-md-3 col-lg-3 col-sm-4 mt-5 pt-5" src="<?php echo BASE_URL;?>assets/svg/search/search.png" alt="" srcset="" style="width: 30rem;">
			<!-- <img class="zi-2" src="<?php echo BASE_URL; ?>tos.svg" alt="Image Description" style="width: 5rem;"> -->
		</div><br>
		<div class="row justify-content-center">
			<div class="col-md-6 position-lg-relative">
				<input type="search" placeholder="Search Files" data-userid="<?= $user_id ?>" class="search" id="myInput" autocomplete="off" style="border: 1px solid #8080808c;">
				<div class="responsedata">

				</div>
			</div>
		</div>
	</div>

</main>
	
	<script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
	<script>
		$(".navbar-vertical-footer-offset .nav-link").hide();
		$(".item_data").hide();
		$(document).ready(function() {
			$('.responsedata').hide();
			$(document).on('click','body',function(){
				$('.responsedata').hide();
			});
			$(document).on('keyup', "#myInput", function() {
				var search = $(this).val();
				if ($.trim(search).length) {
					$('.responsedata').show('slow');
				} else {
					$('.responsedata').hide('slow');
				}
				var search_user_id = $(this).data('userid');
				if (search != "") {
					$.ajax({
						type: 'GET',
						url: '<?php echo BASE_URL; ?>includes/Pages/globalsearch.php',
						data: {
							search_data: search,
							search_user_id: search_user_id
						},
						success: function(response) {
							$('.responsedata').html(response);
						}
					});
				} else {
					$('.responsedata').html('');
				}
			});
		});

		$(document).ready(function() {
			$(document).on("click", '.offline', function() {
				const page = $(this).attr("value");
				var $tempInput = $("<input>");

				// Set the value of the temporary input element to the text
				$tempInput.val(page);

				// Append the temporary input element to the body
				$("body").append($tempInput);

				// Select the text in the temporary input element
				$tempInput.select();

				// Copy the selected text to the clipboard
				document.execCommand("copy");

				// Remove the temporary input element from the body
				$tempInput.remove();
				window.open('<?php echo BASE_URL; ?>openPageIllu.php', '_blank');
			});

			$(document).on("click", ".docxLink", function() {
				var fileName = $(this).attr("name");
				var fileType = $(this).attr('value');
				if (fileType == "docx" || fileType == "xlsx" || fileType == "pptx") {
					
					function downloadFile(url, fileName) {
						var link = document.createElement('a');
						link.href = url;
						link.download = fileName;
						document.body.appendChild(link);
						link.click();
						document.body.removeChild(link);
					}
					
					// Download the DOCX file
					var docxUrl = "<?php echo BASE_URL; ?>includes/pages/files/" + fileName;
					var docxFileName = fileName;
					downloadFile(docxUrl, docxFileName);
				}
			});
		});
	</script>

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>