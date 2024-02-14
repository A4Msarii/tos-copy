<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<!--Head Navbar-->
	<?php
   include(ROOT_PATH.'includes/head_navbar.php');
	?>


  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 25rem;">
        <!-- Page Header -->
        <div class="page-header page-header-light">
          <h1 class="text-dark">Acedmic</h1>
        </div>
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
            <!-- <div class="card-header card-header-content-between">
               <h1>HI</h1>
            </div> -->
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
            <center>
              
        <table class="table table-bordered target-table">
          <thead>
            <tr>
                <th>sr no</th>
                <th>Permission</th>
                <th>Action</th>
            </tr>
          </thead>

          <?php 
          $fetched_per="";
$fetch_noti= "SELECT * FROM notifications where is_read='0' AND to_userid='$user_id' AND type='academic'";

$fetch_notist2 = $connect->prepare($fetch_noti);
$fetch_notist2->execute();

 if($fetch_notist2->rowCount() > 0)
     {
         $re2 = $fetch_notist2->fetchAll();
         $sn=1;
       foreach($re2 as $row2)
         {
            $for_course=$row2['data']; 
            $fetch_class_name= $connect->prepare("SELECT shortacademic FROM `academic` WHERE id=?");
            $fetch_class_name->execute([$for_course]);
            $class_name = $fetch_class_name->fetchColumn();
          $ask_userid=$row2['user_id'];
          $fetch_ins_name= $connect->prepare("SELECT name FROM `users` WHERE id=?");
          $fetch_ins_name->execute([$ask_userid]);
          $ins_name = $fetch_ins_name->fetchColumn();

         $for_userid=$row2['to_userid']; 
         $fetch_std_name= $connect->prepare("SELECT name FROM `users` WHERE id=?");
         $fetch_std_name->execute([$for_userid]);
         $std_name = $fetch_std_name->fetchColumn();
           $grade=$row2['data'];
           $id=$row2['id'];
          $fetched_per='
        
          <tr>
          <td>'.$sn++.'</td>
          <td>'.$ins_name.' Asking For '.$row2['type'].' To Give  '.$class_name.' Lesson</td>
          <td><a class="btn btn-success btn-sm" href="accept_class.php?id='.$id.'" ><i class="fas fa-thumbs-up"></i></a>
          <a class="btn btn-danger btn-sm" href="decline_class.php?id='.$id.'" ><i class="fas fa-times"></i></a>
          </td>
          </tr>';
          echo $fetched_per;
         }
     
     }     ?>        
							</table>
        </center>
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



<?php
include_once 'footer2.php';
?>
</body>
</html>