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
    <title>Document</title>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script>
    <style>
        /* .tox-toolbar__group {
            background-color: white !important;
        } */
        .folbr {
            height: inherit;
            width: inherit;
            padding: 20px;
            border: 1px solid #00000038;

        }

        /*tr:hover {
          background-color: #677788;
        }*/
    </style>
</head>

<body>
<?php include 'lb_loader.php';?>
    <div id="header-hide">
        <?php include('./secondWindowHeader.php');
        $userId = $_SESSION['login_id'];
        $role = $_SESSION['role'];
        ?>
    </div>


    <main id="content" role="main" class="main">


        <!-- Content -->
        <div class="content container-fluid" style="margin-left:45px;">
            <center>
                <div class="row justify-content-center">
                    <div class="alertlibrary" style="width: 92%;margin-top: -30px;margin-bottom: -30px;">
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
                    <div class="col-lg-11 mb-3 mb-lg-5">
                        <!-- Card -->
                        <div class="card card-hover-shadow h-100" style="border:1px solid black;">
                            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
                                <h1 style="margin:10px;">Permission Page</h1>
                            </div>
                            <!-- Body -->
                            <div class="card-body">

                                <div style="margin-left:5%;text-align:justify;margin-right:5%;" style="display:none;">

                                    <hr>
                                    <table class="table table-bordered">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th class="text-light">FileName</th>
                                                <th class="text-light">Permission's</th>
                                                <th class="text-light">Permission Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            if ($_SESSION['role'] == 'super admin') {
                                                $userFilePer = $connect->query("SELECT * FROM filepermissions WHERE permissionId != '$userId'");
                                            }
                                            if ($_SESSION['role'] == 'instructor') {
                                                $userFilePer = $connect->query("SELECT * FROM filepermissions WHERE permissionId != '$userId' AND (userId = 'All instructor' OR userId = 'Everyone' OR userId = '$userId')");
                                            }
                                            if ($_SESSION['role'] == 'student') {
                                                $userFilePer = $connect->query("SELECT * FROM filepermissions WHERE permissionId != '$userId' AND (userId = 'Everyone' OR userId = '$userId')");
                                            }
                                            while ($userPerData = $userFilePer->fetch()) {
                                                $filesId = $userPerData['pageId'];
                                                $files = $connect->query("SELECT * FROM user_files WHERE id = '$filesId' AND folderId = '$f_id'");
                                                while ($userFileData = $files->fetch()) {
                                                    echo "<tr>";
                                                    if ($userFileData['type'] == 'offline') {
                                            ?>
                                                        <td>
                                                            <?php echo $userFileData['lastName']; ?>
                                                        </td>
                                                    <?php
                                                    } elseif ($userFileData['type'] == 'online') {
                                                    ?>
                                                        <td>
                                                            <?php echo $userFileData['lastName']; ?>
                                                        </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td>
                                                            <?php echo $userFileData['filename']; ?>
                                                        </td>
                                                    <?php
                                                    }
                                                    ?>
                                                    <td>
                                                        <?php
                                                            if ($userPerData['userId'] == 'All instructor' || $userPerData['userId'] == 'Everyone') {
                                                                $perName = $userPerData['userId'];
                                                            } else {
                                                                $perId = $userPerData['userId'];
                                                                $userQuery = $connect->query("SELECT nickname FROM users WHERE id = '$perId'");
                                                                $perName = $userQuery->fetchColumn();
                                                            }
                                                        ?>
                                                            <p><b><?php echo $perName; ?></b>

                                                            </p>
                                                    </td>
                                                    <td><?php
                                                    if($userPerData['permissionType'] == "readOnly"){
                                                        echo "Read Only";
                                                    }elseif($userPerData['permissionType'] == "readAndWrite"){
                                                        echo "Read And Write";
                                                    }else{
                                                        echo $userPerData['permissionType'];
                                                    }
                                                    ?></td>
                                        <?php
                                                }
                                            }
                                            echo "</tr>";
                                        ?>
                                        <?php
                                        if ($_SESSION['role'] == 'super admin') {
                                            $userFilePer = $connect->query("SELECT * FROM pagepermissions WHERE permissionId != '$userId'");
                                        }
                                        if ($_SESSION['role'] == 'instructor') {
                                            $userFilePer = $connect->query("SELECT * FROM pagepermissions WHERE permissionId != '$userId' AND (userId = 'All instructor' OR userId = 'Everyone' OR userId = '$userId')");
                                        }
                                        if ($_SESSION['role'] == 'student') {
                                            $userFilePer = $connect->query("SELECT * FROM pagepermissions WHERE permissionId != '$userId' AND (userId = 'Everyone' OR userId = '$userId')");
                                        }
                                        while ($userPerData = $userFilePer->fetch()) {
                                            $filesId = $userPerData['pageId'];
                                            $files = $connect->query("SELECT * FROM editor_data WHERE id = '$filesId' AND folderId = '$f_id'");
                                            while ($userFileData = $files->fetch()) {
                                                echo "<tr>";
                                        ?>
                                                <td>
                                                    <?php echo $userFileData['pageName']; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if ($userPerData['userId'] == 'All instructor' || $userPerData['userId'] == 'Everyone') {
                                                            $perName = $userPerData['userId'];
                                                        } else {
                                                            $perId = $userPerData['userId'];
                                                            $userQuery = $connect->query("SELECT nickname FROM users WHERE id = '$perId'");
                                                            $perName = $userQuery->fetchColumn();
                                                        }
                                                    ?>
                                                        <p><b><?php echo $perName; ?></b>

                                                        </p>
                                                </td>
                                                <td><?php echo $userPerData['permissionType']; ?></td>

                                    <?php
                                            }
                                            echo "</tr>";
                                        }
                                    ?>
                                        </tbody>
                                    </table>

                                </div>


                                <!-- End Body -->


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



    <div class="content container-fluid" style="display: none;">
        <div class="row justify-content-center">
            <div class="col-lg-12" style="width:95%; margin-left:80px; margin-top:-40px;">


                <div class="card card-hover-shadow h-100">

                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="permissiontable">
                            <input class="form-control" type="text" id="filesearch" onkeyup="file_search()" placeholder="Search for Files" title="Type in a name"><br>
                            <thead class="bg-dark">
                                <th class="text-light">Sr No</th>
                                <th class="text-light">File Name</th>
                                <th class="text-light">User Name</th>
                                <th class="text-light">Permission</th>
                                <th class="text-light">Action</th>
                            </thead>
                            <?php
                            // $output ="";
                            $query1 = "SELECT * FROM pagepermissions";
                            $statement1 = $connect->prepare($query1);
                            $statement1->execute();
                            if ($statement1->rowCount() > 0) {
                                $result1 = $statement1->fetchAll();
                                $sn = 1;
                                foreach ($result1 as $row) {
                                    $id = $row['id']; ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $row['pageId'] ?></td>
                                        <td><?php echo $row['permissionId'] ?></td>
                                        <td><?php echo $row['userId'] ?></td>
                                        <td><a href="" style="margin: 10px;" onclick="document.getElementById('actual_edit_id').value='<?php echo $id = $row['id'] ?>';
                                                             document.getElementById('actual1').value='<?php echo $row['actual'] ?>';
                                                             document.getElementById('symbol').value='<?php echo $row['symbol'] ?>';" data-bs-toggle="modal" data-bs-target="#editactual"><i style="color:green;" class="bi bi-pen-fill"></i>
                                            </a>
                                            <a href="actual-delete.php?id=<?php echo $id ?>"><i style="color:red;" class="bi bi-trash-fill"></i></a>

                                        </td>
                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <tr>
                                    <td colspan='9' style="text-align:center">
                                        No data
                                    </td>
                                </tr>
                            <?php  }
                            ?>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>


    <!--Edit briefcase modal-->
    <div class="modal fade" id="edit_permission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Permission</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action=".php">
                        <input type="hidden" class="form-control" name="id" value="" id="per_id">
                        <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
                        <input type="text" class="form-control" name="brief" value="" id="filename" readonly><br>
                        <input type="text" class="form-control" name="brief" value="" id="pername" readonly><br>

                        <center>
                            <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                            <br>
                            <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                <option value="All instructor">Instructor Only</option>
                                <option value="Everyone" selected>Everyone</option>
                            </select>
                            <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                            <table class="table table-bordered tableData" style="display:none;">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="text-light">#</th>
                                        <th class="text-light">Profile Image</th>
                                        <th class="text-light">Name</th>

                                    </tr>
                                </thead>
                                <tbody class="userDetail">

                                </tbody>
                            </table>
                        </center>
                        <input style="float:right;" class="btn btn-soft-dark" type="submit" name="submit_briefcase" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Edit briefcase modal-->
    <div class="modal fade" id="edit_permission_page" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Permission</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action=".php">
                        <input type="hidden" class="form-control" name="id" value="" id="page_id">
                        <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
                        <input type="text" class="form-control" name="brief" value="" id="file_name" readonly><br>
                        <input type="text" class="form-control" name="brief" value="" id="per_name" readonly><br>

                        <center>
                            <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                            <br>
                            <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                <option value="All instructor">Instructor Only</option>
                                <option value="Everyone" selected>Everyone</option>
                            </select>
                            <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                            <table class="table table-bordered tableData" style="display:none;">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="text-light">#</th>
                                        <th class="text-light">Profile Image</th>
                                        <th class="text-light">Name</th>

                                    </tr>
                                </thead>
                                <tbody class="userDetail">

                                </tbody>
                            </table>
                        </center>
                        <input style="float:right;" class="btn btn-soft-dark" type="submit" name="submit_briefcase" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Edit briefcase modal-->
    <div class="modal fade" id="edit_permission_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Permission</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action=".php">
                        <input type="hidden" class="form-control" name="id" value="" id="file_id">
                        <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
                        <input type="text" class="form-control" name="brief" value="" id="file_name1" readonly><br>
                        <input type="text" class="form-control" name="brief" value="" id="per_name1" readonly><br>

                        <center>
                            <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                            <br>
                            <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                <option value="All instructor">Instructor Only</option>
                                <option value="Everyone" selected>Everyone</option>
                            </select>
                            <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                            <table class="table table-bordered tableData" style="display:none;">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="text-light">#</th>
                                        <th class="text-light">Profile Image</th>
                                        <th class="text-light">Name</th>

                                    </tr>
                                </thead>
                                <tbody class="userDetail">

                                </tbody>
                            </table>
                        </center>
                        <input style="float:right;" class="btn btn-soft-dark" type="submit" name="submit_briefcase" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Edit briefcase modal-->
    <div class="modal fade" id="edit_permission_link" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Permission</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action=".php">
                        <input type="hidden" class="form-control" name="id" value="" id="link_id">
                        <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
                        <input type="text" class="form-control" name="brief" value="" id="file_name2" readonly><br>
                        <input type="text" class="form-control" name="brief" value="" id="per_name2" readonly><br>

                        <center>
                            <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                            <br>
                            <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                <option value="All instructor">Instructor Only</option>
                                <option value="Everyone" selected>Everyone</option>
                            </select>
                            <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                            <table class="table table-bordered tableData" style="display:none;">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="text-light">#</th>
                                        <th class="text-light">Profile Image</th>
                                        <th class="text-light">Name</th>

                                    </tr>
                                </thead>
                                <tbody class="userDetail">

                                </tbody>
                            </table>
                        </center>
                        <input style="float:right;" class="btn btn-soft-dark" type="submit" name="submit_briefcase" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>

</html>