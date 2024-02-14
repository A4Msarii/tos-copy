<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$green = "#28a745";
$red = "#dc3545";
$yellow = "#ffc107";
$blue = "#007bff";
$black = "#6c757d";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include 'lb_thumbnail.php';?>
    <title>Document</title>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script>
</head>

<style>
    .card-wrapper {
        display: block;
    }

    .card-wrapper.hide {
        display: none;
    }
</style>


<body>
<?php include 'lb_loader.php';?>
<div id="header-hide">
    <?php include('./grid_header.php');
    if (isset($_REQUEST['bId'])) {
        $_SESSION['page_ID'] = $_REQUEST['bId'];
    }
    if (isset($_REQUEST['pId'])) {
        $_SESSION['page_ID'] = $_REQUEST['pId'];
    }
    $f_id = $_SESSION['folderId'];
    
    ?>
</div>
    <?php
        include '../includes/message.php';
        displayMSG();
    ?>
    
        <main id="content" role="main" class="main" style="width:97%;">


            <div class="content container-fluid" style="margin-left:-50px;">
    <div class="row justify-content-center" style="width:100%;">
        
        <input type="text" id="searchBar" placeholder="Search..." style="width: 80%;" class="form-control">
<br>
        <?php
        $result = $connect->query("SELECT * FROM user_files WHERE folderId='$f_id'");
        while ($data = $result->fetch()) {
            $file_id = $data['id'];
            $fileData = $data['filename'];
            $fileDataShort = substr($fileData, 0, 20);
            $fileDataLong = substr($fileData, 20);
        ?>
        
            <div class="col-md-4 card-wrapper" style="margin:5px;">
                <div class="card card-hover-shadow h-100" style="padding:10px;">
                    <span style="display:none;"><?php echo $file_id;?></span>
                    <table id="file_table">

                        <tr>
                            <td>
                        <div style="text-align: end;">
                            <a style="text-decoration:none; color:black; font-size: large;" onclick="document.getElementById('file_id').value='<?php echo $file_id; ?>';
                                                                           document.getElementById('file').value='<?php echo $data['filename']; ?>';" data-bs-toggle="modal" data-bs-target="#editfilelist" data-bs-placement="bottom" title="Edit">
                                        <i class="bi bi-pencil-square"></i></a>
                            <a style="text-decoration: none; color:black; font-size: large;" href="update_editor_data.php?deleteIdgrid=<?php echo $file_id; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                            <i class="bi bi-trash3-fill"></i>
                            </a>
                        </div>
                    </td>
                        <tr>
                    </table>

                        <h1 style="float:left;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $fileData;?>"><?php echo $fileDataShort; ?></h1>

                </div>
            </div>
        
        <?php
        }
        ?>
    </div>
</div>

        </main>
    


 <!--Edit file modal-->
  <div class="modal fade" id="editfilelist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">Edit File</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo BASE_URL; ?>Library/editUserFiles.php" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="fileId" value="" id="file_id" readonly>
            <label style="color:black; font-weight:bold; margin:5px;">File Name</label>
            <input type="text" class="form-control" name="fileName1" value="" id="file"><br>
            <input type="file" class="form-control" name="fileName" value="" id="file">
            <br>
            <input style="float:right;" class="btn btn-soft-dark" type="submit" name="submitfile" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
        $(document).ready(function() {
            $("#hideButton").click(function() {
                $("#hidedive").hide('slow');
            });
            setTimeout(function() {
                $("#hidedive").hide('slow');
            }, 5000);
        });
    </script>

 <script>
    document.getElementById("searchBar").addEventListener("input", function() {
        var input = this.value.toLowerCase();
        var cards = document.getElementsByClassName("card");

        Array.from(cards).forEach(function(card) {
            var fileData = card.getElementsByTagName("h1")[0].textContent.toLowerCase();
            if (fileData.includes(input)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    });
</script>


<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>

</html>