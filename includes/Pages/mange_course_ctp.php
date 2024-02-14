<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$in1="";
     $q6= "SELECT * FROM users where role='instructor'";
 $st6 = $connect->prepare($q6);
 $st6->execute();

 if($st6->rowCount() > 0)
     {
         $re6 = $st6->fetchAll();
       foreach($re6 as $row6)
         {
          $in1.= '<option value="'.$row6['id'].'">'.$row6['name'].'</option>';
         }
     
     }

    

    
     
     
     $ctp="";
     $q5= "SELECT * FROM ctppage";
      $st5 = $connect->prepare($q5);
       $st5->execute();

 if($st5->rowCount() > 0)
     {
         $re5 = $st5->fetchAll();
       foreach($re5 as $row5)
         {
          $ctp.= '<option value="'.$row5['CTPid'].'">'.$row5['symbol'].'</option>';
         }
     
     }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Course</title>
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
include(ROOT_PATH.'includes/head_navbar.php');
?>
</div>
<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 25rem;">
<?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h3 class="text-success">Manage course On sidebar</h3>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
           

              <div class="row m-5">
                
                <h4>Course on sidebar</h4>
                <br>
                <form action="selected_ctp.php" method="post" style="width:100%;" enctype="multipart/form-data">
              <?php
              
              $select_ctps= "SELECT * FROM ctppage";
              $select_ctps2 = $connect->prepare($select_ctps);
              $select_ctps2->execute();
             
              if($select_ctps2->rowCount() > 0)
                  {
                      $select_ctpsre2 = $select_ctps2->fetchAll();
                    foreach($select_ctpsre2 as $select_ctpsrow2)
                      {
                        $ctp_idesss=$select_ctpsrow2['CTPid'];
                        $sql = "SELECT count(*) FROM `sidebar_ctp` WHERE ctp_id = ?"; 
                        $result56 = $connect->prepare($sql); 
                        $result56->execute([$ctp_idesss]); 
                         $number_of_rows = $result56->fetchColumn();
                         if($number_of_rows==0){
                        ?>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="<?php echo $select_ctpsrow2['CTPid']?>" name="idess[]" type="checkbox">
                          <label class="custom-control-label"><?php echo $select_ctpsrow2['course']?></label>
                        </div>
                    <?php   }
                      }
                  }
              ?>
               <div class="row">
                <center>
                <input class="btn btn-success" style="width:50%;" type="submit" value="Submit" name="submit" />
              </center>
              </form>
              </div>
<br><br>

<br><br>         <table class="table table-striped table-bordered">
                    <thead class="bg-dark">
                      <th class="text-white">Sr No</th>
                      <th class="text-white">Ctp</th>
                      <th class="text-white" colspan="2">Action</th>
                    </thead>
                    <?php 
                    $query112 = "SELECT * FROM sidebar_ctp";
                      $statement112 = $connect->prepare($query112);
                      $statement112->execute();
                      if($statement112->rowCount() > 0)
                        {
                          $result112 = $statement112->fetchAll();
                          $sn112=1;
                          foreach($result112 as $row112)
                          {
                            $ctid=$row112["ctp_id"];
                            $del_id_ctp=$row112["id"];
                            $sel_ctp_nam= $connect->prepare("SELECT course FROM ctppage WHERE CTPid=?");
                                            $sel_ctp_nam->execute([$ctid]);
                                            $sel_ctp_nam_data2 = $sel_ctp_nam->fetchColumn();
                            ?>
                      <tr>
                       <td><?php echo $sn112++;?></td>
                       <td><?php echo $sel_ctp_nam_data2;?></td>
                       <td>
                       <a href="ctpdelete.php?id=<?php echo $del_id_ctp?>"><i class="bi bi-trash-fill text-danger"></i></a>

                       </td>
                       
                      </tr>
                      <?php
                        }
                        }        
                    ?>      
                </table>
              </div>

          
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
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>