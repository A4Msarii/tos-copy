<?php 

include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$id="";

$output11="";
$output1="";
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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
   <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<body>
<script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
  <div id="loading-screen" style="display:none;">
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  </div>
<div id="header-hide">
<?php
include(ROOT_PATH.'includes/head_navbar.php');
?>
</div>
<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 22rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <!-- <div class="page-header page-header-light">
          <h1 class="text-dark">Gradesheet</h1>
        </div> -->
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -16rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h3 class="text-success">Edit User</h3>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <?php 
              $id=$_GET['id'];
            $query11 = "SELECT * FROM users where id='$id'";
            $statement11 = $connect->prepare($query11);
            $statement11->execute();

            if($statement11->rowCount() > 0)
                {
                    $result11 = $statement11->fetchAll();
                    foreach($result11 as $row)
                    { ?>
                       
                       
                        <form method="post" action="update_user.php" style="width:100%;" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $id?>" name="user_dbid" class="form-control">
                        <table style="width:100%;">
                          <tr>
                            <td style="margin:5px; width: 50%;">
                              <label class="form-label text-dark" style="font-weight:bold;">Name :</label>
                              <input type="text" value="<?php echo $row['name']?>" name="name" class="form-control">
                            </td>
                            <td style="margin:5px; width: 50%;">
                              <label class="form-label text-dark" style="font-weight:bold;">Change password :</label>
                              <input type="text" name="user_pass" value="" class="form-control">
                              <input type="hidden" name="user_pass1" value="<?php echo $row['password']?>" class="form-control">
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">NickName :</label>
                              <input type="text" value="<?php echo $row['nickname']?>" name="nickname" class="form-control">
                            </td>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">Role :</label>
                              <select name="role" class="form-control">
                              <option value="<?Php echo $row['role']?>" readonly selected><?php echo $row['role']?> </option>
                              <?php echo $output1 ?>
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">Std Id :</label>
                              <input type="text" value="<?php echo $row['studid']?>" name="studid" class="form-control">
                            </td>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">Phone Number :</label>
                              <input type="number" value="<?php echo $row['phone']; ?>" name="phone" class="form-control" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">Email id :</label>
                              <input type="text" value="<?php echo $row['email']?>" name="email" class="form-control">
                            </td>
                          
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">Profile Image:</label>
                               <input class="form-control" type="file" name="file" accept="image/*" />
                            </td>
                          </tr>
                        </table>

                        <br>
                        <div class="row">
                        <center>
                        <input style="width:50%;" class="btn btn-success" type="submit" name="submit" value="Update"></center>
                        </div>
                        </form>
    
                <?php     }
                }?>
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

