<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$id="";
$id=$_GET['id'];
$output11="";


$query11 = "SELECT * FROM users where id='$id'";
            $statement11 = $connect->prepare($query11);
            $statement11->execute();

            if($statement11->rowCount() > 0)
                {
                    $result11 = $statement11->fetchAll();
                    foreach($result11 as $row)
                    {
                        $output11 .='
                       
                        <form method="post" action="update_user_navbar.php" style="width:100%;">
                        <input type="hidden" value="'.$id.'" name="user_dbid" class="form-control">
                        <table style="width:100%;">
                          <tr>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">Name :</label>
                              <input type="text" value="'.$row['name'].'" name="name" class="form-control">
                            </td>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">NickName :</label>
                              <input type="text" value="'.$row['nickname'].'" name="nickname" class="form-control">
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">Role :</label>
                              <select name="role" class="form-control">
                              <option value="'.$row['role'].' ?>" selected>'.$row['role'].'</option>
                              <option value="Admin">Admin</option>
                              <option value="course manager">Course Manager</option>
                              <option value="phase manager">Phase Manager</option>
                              <option value="instructor">Instructor</option>
                              <option value="student">Student</option>
                              </select>
                            </td>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">Std Id :</label>
                              <input type="text" value="'.$row['studid'].'" name="studid" class="form-control">
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">Phone Number :</label>
                              <input type="text" value="'.$row['phone'].'" name="phone" class="form-control">
                            </td>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">Email id :</label>
                              <input type="text" value="'.$row['email'].'" name="email" class="form-control">
                            </td>
                          </tr>
                        </table>
                        <br>
                        
                        <div class="row">
                        <center>
                        <input style="width:50%;" class="btn btn-success" type="submit" name="submit" value="Update">
                        </center>
                        </div>
                        
                        </form>
    ';
                    }
                }
               
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>

</head>
<body>
<?php
include(ROOT_PATH.'includes/head_navbar.php');
?>

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
    <div class="content container-fluid" style="margin-top: -20rem;">

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
              <?php echo $output11 ?>
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


 <footer id="content1" role="footer" class="footer">

              <?php
              include 'footer2.php';
              ?>


</footer>
</body>
</html>

