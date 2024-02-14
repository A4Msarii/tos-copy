<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$id="";
$Courseid=$_GET['id'];
$output_newcourse="";


$query_new = "SELECT * FROM newcourse where Courseid='$id'";
            $statement_new = $connect->prepare($query_new);
            $statement_new->execute();

            if($statement_new->rowCount() > 0)
                {
                    $result_new = $statement_new->fetchAll();
                    foreach($result_new as $row)
                    {
                        $output_newcourse .='
                       
                        <form method="post" action="edit_course.php">
                        <input type="hidden" value="'.$Courseid.'" name="crs_dbid" class="form-control">
                        
                        <label class="form-label text-dark text-dark">Course Name :</label>
                        <input type="text" value="'.$row['Coursename'].'" name="name" class="form-control">
                        <label class="form-label text-dark">Nick Name :</label>
                        <input type="text" value="'.$row['nick_name'].'" name="nickname" class="form-control">
                        <label class="form-label text-dark">Course Date :</label>
                        <input type="text" value="'.$row['CourseDate'].'" name="coursedate" class="form-control">
                        <label class="form-label text-dark">Student Names :</label>
                        <input type="text" value="'.$row['StudentNames'].'" name="studname" class="form-control">
                        <label class="form-label text-dark">CourseManager :</label>
                        <select name="role" class="form-control">
                        <option value="'.$row['CourseManager'].' ?>" selected>'.$row['CourseManager'].'</option>
                        <option value="Admin">Admin</option>
                        </select>
                        <label class="form-label text-dark">Phase Manager :</label>
                        <select name="role" class="form-control">
                        <option value="'.$row['Phase_manager'].' ?>" selected>'.$row['phase_manager'].'</option>
                        <option value="Admin">Admin</option>
                        </select>
                        <label class="form-label text-dark">Instructor :</label>
                        <select name="role" class="form-control">
                        <option value="'.$row['Instructor'].' ?>" selected>'.$row['Instructor'].'</option>
                        <option value="Admin">Admin</option>
                        </select>
                        <br>
                        <input class="btn btn-success" type="submit" name="submit" value="Update">
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
        <!-- <div class="page-header page-header-light">
          <h1 class="text-dark">Gradesheet</h1>
        </div> -->
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h1>Edit User</h1>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <?php echo $output_newcourse; ?>
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

