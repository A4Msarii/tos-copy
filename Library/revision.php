<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include 'lb_thumbnail.php';?>
    <title>Permission</title>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script>
    <style>
        /* .tox-toolbar__group {
            background-color: white !important;
        } */
        .allContainer {
            width: 50%;
            margin-left: 12%;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        .folbr {
            height: inherit;
            width: inherit;
            padding: 20px;
            border: 1px solid black;
        }

        .brfol {
            border: 1px solid red;
        }
    </style>
</head>

<body>
<?php include 'lb_loader.php';?>
  <div id="header-hide">
    <?php include('./secondWindowHeader.php'); 
    
$folderId = $_SESSION['folderId'];
$userId = $_SESSION['login_id'];
$pageId = $_REQUEST['revisionId'];
    ?></div>


<main id="content" role="main" class="main">


    <!-- Content -->
    <div class="content container-fluid" style="margin-left:40px;">
      <center>
      <div class="row justify-content-center">
        <div class="alertlibrary" style="width: 92%;margin-top: -30px;margin-bottom: -30px;">
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
        <div class="col-lg-11 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:1px solid black;">
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
                <h1 style="margin:10px;">Revision Page</h1>
            </div>
            <!-- Body -->
            <div class="card-body">
             
              <div class="col">

                                    <table class="table table-bordered table-striped" id="tableData">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th class="text-light">#</th>
                                                <th class="text-light">Page Name</th>
                                                <th class="text-light">Created By</th>
                                                <th class="text-light">Changelog</th>
                                                <th class="text-light">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="userDetail">
                                            <?php
                                            $sql = $connect->query("SELECT * FROM editor_data WHERE id = '$pageId'");
                                            $sn = 1;
                                            while ($data = $sql->fetch()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $sn; ?></td>
                                                    <td><?php echo $data['pageName']; ?></td>
                                                    <td><?php echo $data['createdBy']; ?></td>
                                                    <td><?php echo $data['changeLog']; ?></td>
                                                    <!-- <td><a class="btn btn-danger">Delete</a></td> -->
                                                </tr>
                                            <?php
                                            $sn++;
                                            }
                                            $sql = $connect->query("SELECT * FROM newpagechangelogdata WHERE pageId = '$pageId'");
                                            while ($data = $sql->fetch()) {
                                                $changeLogId = $data['id'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $sn; ?></td>
                                                    <td><?php echo $data['pageName']; ?></td>
                                                    <td><?php echo $data['createdBy']; ?></td>
                                                    <td><?php echo $data['changeLog']; ?></td>
                                                    <td><a href="<?php echo BASE_URL; ?>Library/deleteChnageLog.php?changeLogId=<?php echo $changeLogId; ?>&pageId=<?php echo $pageId; ?>" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                
                                                        
                            <!-- End Body -->
                     
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

    </div>
</center>
</div>
</main>



    <div id="header-hide">
        <main id="content" role="main" class="main">
            <div class="content container-fluid" style="width:80%;">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card card-hover-shadow h-100" style="background-color: black; border: none;">
                            
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


<script>
    $("#txt_search").keyup(function() {
        var search = $(this).val();
        // alert(search);
        if (search != "") {

            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>Library/getPermissionSearch.php',
                data: {
                    search: search,
                },
                success: function(response) {
                    $("#tableData").show();
                    $('#userDetail').empty();
                    $('#userDetail').append(response);
                    // console.log(response);

                }
            });
        } else {
            $('.searchResult').empty();
            $("#tableData").hide();
        }


    });
</script>

<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>
</html>