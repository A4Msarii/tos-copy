<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Roles</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
                   <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
 

<div id="header-hide">
<?php
$output0="";
$output1="";
$query1 = "SELECT * FROM roles where permission!='' ORDER BY id ASC";
$statement1 = $connect->prepare($query1);
$statement1->execute();

if($statement1->rowCount() > 0)
    {
        $result1 = $statement1->fetchAll();
        $sn=1;
        foreach($result1 as $row1)
        { 
            $output0.="<option value=".$row1['id'].">".$row1['roles']."</option>";
        }
    }
$query2 = "SELECT * FROM roles where permission!='' ORDER BY id ASC";
$statement2 = $connect->prepare($query2);
$statement2->execute();

if($statement2->rowCount() > 0)
    {
        $result2 = $statement2->fetchAll();
        $sn=1;
        foreach($result2 as $row2)
        { 
            $output1.='<option name="role" value="'.$row2['roles'].'">'.$row2['roles'].'</option>';
        }
    }
include(ROOT_PATH.'includes/head_navbar.php');

   
?>
</div>
<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 13rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h3 class="text-success">Manage Roles</h3>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -02rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <!-- Body -->
            <div class="card-body">
            
              <form action="<?php echo BASE_URL;?>includes/Pages/create_roles.php" method="post">
              <label class="form-label text-dark" style="font-weight:bold;">Create a Role:</label>
                <input type="text" class="form-control" name="role" placeholder="Create new role.."><br>
                <button type="submit" class="btn btn-success">Submit</button>
              </form>
              
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <!--Second Row-->
      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <!-- Body -->
            <div class="card-body">
                <table class="table table-striped table-bordered">
                        <thead class="bg-dark">
                            <th class="text-light">Id</th>
                            <th class="text-light">Role</th>
                            <th colspan="2" class="text-light">Action</th>
                        </thead>
                            <?php
                            $query = "SELECT * FROM roles ORDER BY id ASC";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            
                            if($statement->rowCount() > 0)
                                {
                                    $result = $statement->fetchAll();
                                    $sn=1;
                                    foreach($result as $row)
                                    { ?>
                                       <tr>
                                        <td><?php echo $sn++ ?></td>
                                            <td style="color:<?php echo $row['color'] ?>"><?php echo $row['roles'] ?></td>
                                            <td><a href="role-update.php?id=<?php echo $row["id"] ?>&name=<?php echo $row["roles"] ?>"><i class="bi bi-pen-fill text-success"></i></a>
                                            <?php if($row['roles']=="student" || $row['roles']=="instructor" || $row['roles']=="super admin"){?>
                                        
                                            <?php }else{ ?>
                                              <a href="role-delete.php?id=<?php echo $row["id"] ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                                              <?php }?>
                                            <!-- <a onclick="document.getElementById('role_id').value='<?php echo $row['id'] ?>'" data-bs-toggle="modal" data-bs-target="#copy_role"><i class="bi bi-files text-warning"></i></a> -->
                                            <a href="" onclick="document.getElementById('role_id1').value='<?php echo $row['id']; ?>';"
                                            data-bs-toggle="modal" data-bs-target="#color_phase" data-bs-title="Add Color"><i class="bi bi-palette"></i>
                                             </a> 
                                          </td>  
                                        </tr>
                                    <?php }
                                }
                            ?>                
                    </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <div class="modal fade" id="color_phase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Color</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form action="<?php echo BASE_URL; ?>includes/Pages/insert_color_role.php">
            <input class="form-control" type="hidden" name="id" value="" id="role_id1">
            <label for="color" style="font-size:large; font-weight:bold;">Select a color for Role:</label><br>
            <input type="color" id="color" name="favcolor" required><br>
            <hr>
            <input type="submit" class="btn btn-success" style="float:right;" name="phase_color">
          </form>
 
        </center>
      </div>
    </div>
  </div>
</div>
    <!-- End Content -->
    <div class="modal fade" id="copy_role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Copy Permission</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="copy_rol.php" method="post">
            <input type="hidden" name="copyto_id" id="role_id">
            <select class="form-control" name="copied_id">
              <?php echo $output0; ?>
            </select><hr>
            <input style="margin:5px;float: right;" class="btn btn-success" type="submit" name="Submit" value="Submit">
          </form>
        </div>

      </div>
    </div>
  </div>
</main>
<!--footer-->
 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>