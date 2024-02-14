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
    <style>
        /* .tox-toolbar__group {
            background-color: white !important;
        } */
    </style>
    <style>
        #red {
            width: 30px;
            height: 30px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background: #dc3545 !important;
        }

        #green {
            width: 30px;
            height: 30px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background: #28a745 !important;
        }

        #yellow {
            width: 30px;
            height: 30px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background: #ffc107 !important;
        }

        #blue {
            width: 30px;
            height: 30px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background: #007bff !important;
        }

        #grey {
            width: 30px;
            height: 30px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background: #6c757d !important;
        }

        ul.breadcrumb {
            padding: 10px 16px;
            list-style: none;
            /*  background-color: #eee;*/
            width: 50%;
            margin-left: 140px;
        }

        ul.breadcrumb li {
            display: inline;
            font-size: 18px;
        }

        ul.breadcrumb li+li:before {
            padding: 8px;
            color: grey;
            content: ">";
        }

        ul.breadcrumb li a {
            color: snow;
            text-decoration: none;
        }

        ul.breadcrumb li a:hover {
            color: #01447e;
            text-decoration: underline;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {

            border-color: inherit;
            border-style: solid;
            border-width: 1px !important;
        }

        table {
            display: table;
            border-collapse: separate;
            box-sizing: border-box;
            text-indent: initial;
            border-spacing: 2px;
            border-color: gray;
        }
    </style>
</head>

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

        if (isset($_REQUEST['brief_ID'])) {
            $breId = $_REQUEST['brief_ID'];
            $breSql = $connect->query("SELECT briefcase FROM briefcase WHERE id = '$breId'");
            $breRes = $breSql->fetchColumn();
        }

        if (isset($_REQUEST['userBrief_ID'])) {
            $breId = $_REQUEST['userBrief_ID'];
            $breSql = $connect->query("SELECT briefcase_name FROM user_briefcase WHERE id = '$breId'");
            $breRes = $breSql->fetchColumn();
        }

        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
        } else {
            $id = $_SESSION['page_ID'];
        }

        $userId = $_SESSION['login_id'];


        $pSql = $connect->query("SELECT pageName FROM editor_data WHERE id = '$id'");
        $pRes = $pSql->fetchColumn();

        $greenUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($green);
        $redUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($red);
        $yellowUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($yellow);
        $blueUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($blue);
        $blackUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($black);
        ?>
    </div>


    <main id="content" role="main" class="main">

           <div class="page-header" style="margin-top:60px; border-bottom:none;">
                <ul class="breadcrumb" >
                                        <li>
                                            <a href="<?php echo BASE_URL; ?>Library/grid_view_brief.php">
                                                <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                    <img style="height:20px; width:20px; margin:5px;" src="<?php echo BASE_URL ?>assets/svg/phase2white/folder.png">
                                                </div>
                                                <?php echo $item_id1_a; ?>
                                            </a>
                                        </li>
                                        <?php if (isset($breRes)) { ?>
                                            <li>
                                                <a href="<?php echo BASE_URL; ?>Library/grid_view_brief.php">
                                                    <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                        <img src="<?php echo BASE_URL ?>assets/svg/phase2white/briefcase.png" style="height:20px; width:20px; margin:5px;">
                                                    </div>
                                                    <?php echo $breRes; ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <li>
                                            <a href="<?php echo BASE_URL; ?>Library/pageData.php">
                                                <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                    <img src="<?php echo BASE_URL ?>assets/svg/phase2white/briefcase.png" style="height:20px; width:20px; margin:5px;">
                                                </div>
                                                <?php echo $pRes; ?>
                                            </a>
                                        </li>
                                    </ul>

            </div>
        <!-- Content -->
        <div class="content container-fluid" style="margin-left:0px; margin-top:-100px;">
            <center>
                <div class="row justify-content-center">

                    <div class="col-lg-11 mb-3 mb-lg-5">
                        <!-- Card -->
                        <div class="card card-hover-shadow h-100" style="border:1px solid black;">
                            <!-- Body -->
                            <div class="card-body" style="background-color: black;">


                                    

                                    <!-- Header -->

                                    <!-- Body -->
                                    <div class="card-body" style="background-color: white; text-align:left; border-radius:20px;">
                                        <?php
                                        $result = $connect->query("SELECT * FROM editor_data WHERE id = '$id'");
                                        while ($data = $result->fetch()) {
                                            $pageUserId = $data['userId'];
                                            $pageId = $data['id'];
                                            $createdAt = $data['createdAt'];
                                            $updatedAt = $data['updatedAt'];
                                            $createdBy = $data['createdBy'];
                                            $updatedBy = $data['updatedBy'];
                                        ?>
                                            <h1><?php echo $data['pageName']; ?></h1>
                                            <div>
                                                <?php echo $data['editorData']; ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
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
        <!-- End Content -->

    </main>



    <div class="modal fade" id="pageper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Permission Detail</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <center>
                            <center>
                                <table class="table table-bordered" id="msarii">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th class="text-light">#</th>
                                            <th class="text-light">Permission Name</th>
                                            <th class="text-light">Permission Type</th>
                                            <th class="text-light">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody id="varuntest">
                                        <?php
                                        $permissionQuery = $connect->query("SELECT * FROM pagepermissions WHERE pageId = '$pageId'");
                                        $sn = 1;
                                        while ($perData = $permissionQuery->fetch()) {
                                            if ($perData['userId'] == "All instructor" || $perData['userId'] == "Everyone") {
                                                $perName = $perData['userId'];
                                            } else {
                                                $perId = $perData['userId'];
                                                $perUserQuery = $connect->query("SELECT nickname FROM users WHERE id = '$perId'");
                                                $perName = $perUserQuery->fetchColumn();
                                            }
                                        ?>
                                            <tr>
                                                <td><?php echo $sn; ?></td>
                                                <td><?php echo $perName; ?></td>
                                                <td><?php
                                                    if($perData['permissionType'] == "readOnly"){
                                                        echo "Read Only";
                                                    }elseif($perData['permissionType'] == "readAndWrite"){
                                                        echo "Read And Write";
                                                    }else{
                                                        echo $perData['permissionType'];
                                                    }
                                                    ?></td>
                                                <td>
                                                    <a style="float:right;" href="<?php echo BASE_URL; ?>includes/Pages/delete_permission.php?PermissionDeleteId=<?php echo $perData['id']; ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                                                    <a style="float:right;" href="<?php echo BASE_URL; ?>Library/givePermission.php?permissionId=<?php echo $perData['pageId']; ?>"><i class="bi bi-pen-fill text-success"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $sn++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </center>
                    </div>
                </div>
            </div>
        </div>
    </div>


<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>

</html>