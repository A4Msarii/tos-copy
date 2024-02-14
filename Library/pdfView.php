<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_REQUEST['fileName'])) {
    $fileName = $_REQUEST['fileName'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include 'lb_thumbnail.php';?>
    <title>Pdf view</title>
</head>

<body>
<?php include 'lb_loader.php';?>
<div id="header-hide">
    <?php include('./secondWindowHeader.php'); ?>
</div>    
        <main id="content" role="main" class="main" style="width:85%;">
            <div class="content container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card card-hover-shadow h-100">
                            <?php if (isset($fileName)) { ?>
                                <h3 class="modal-title text-success" id="modalName"></h3>
                                <embed src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileName; ?>" id="pdf_view" type="application/pdf" frameborder="0" width="100%" height="700px">
                            <?php } else { ?>
                                <h1>File NOt Found...</h1>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>  
</body>

</html>