<?php
include('../../includes/config.php');
  include(ROOT_PATH.'includes/connect.php');
?>

<!DOCTYPE html>
  <html>
  <head>
    <title>Phase</title>
    <meta charset="utf-8" />
      <meta name="viewport" 
            content="width=device-width, 
                    initial-scale=1" />
                    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>
<style type="text/css">
  tr:hover {
          background-color: #accbec6b;
        }
</style>
<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
 
<div id="header-hide">
 <?php
  include(ROOT_PATH.'includes/head_navbar.php');
  $course="";
  $ctp="";
  ?></div>
<!--Input Phases-->
<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">Manage Phase On Sim Page</h1>
        </div>
        <!-- End Page Header -->
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
            <div class="card-header card-header-content-center">
               <?php
               $ctp=""; 
                if(isset($fixed_ctp_id)){
                    $_SESSION['ctp_value']=$ctp=$fixed_ctp_id;
                }else if(isset($_SESSION['ctp_value'])){
                    $ctp=$_SESSION['ctp_value'];
                }
                $ctp_id = "SELECT * FROM ctppage where CTPid='$ctp'";
                $statement = $connect->prepare($ctp_id);
                $statement->execute();
                  if($statement->rowCount() > 0)
                    {
                      $result = $statement->fetchAll();
                      $sn=1;
                      foreach($result as $row)
                        {
                          $course=$row['course'];
                        }
                    }
                if(isset($_SESSION['ctp_value'])){?>
                    <h3>Selected CTP: <span style="color:blue;"><?php echo $course?></span></h3>
                    <?php }else{?>
                      <h3>Selected CTP: <span style="color:red;">Select ctp</span></h3>	
                      <?php }  ?>
               
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
             
                <form action="selected_phase_sim.php" method="post" style="width:100%;" enctype="multipart/form-data">
                <?php if(isset($fixed_ctp_id)){?>
                <input type="hidden" value="<?php echo $ctp ?>" name="ctp">
                <?php } ?>
              <?php 
              
              $select_ctps= "SELECT * FROM phase where ctp='$ctp'";
              $select_ctps2 = $connect->prepare($select_ctps);
              $select_ctps2->execute();
             
              if($select_ctps2->rowCount() > 0)
                  {
                      $select_ctpsre2 = $select_ctps2->fetchAll();
                    foreach($select_ctpsre2 as $select_ctpsrow2)
                      {
                        $phase_id=$select_ctpsrow2['id'];
                        $sql = "SELECT count(*) FROM `sim_phase` WHERE phase = ?"; 
                        $result56 = $connect->prepare($sql); 
                        $result56->execute([$phase_id]); 
                         $number_of_rows = $result56->fetchColumn();
                         if($number_of_rows==0){
                        ?>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="<?php echo $select_ctpsrow2['id']?>" name="idess[]" type="checkbox">
                          <label class="custom-control-label"><?php echo $select_ctpsrow2['phasename']?></label>
                        </div>
                    <?php   
                    }
                      }
                  }
              ?>
               <div class="row">
                <center>
                <input class="btn btn-success" style="width:50%;" type="submit" value="Submit" name="submit" />
                <br><br>
            </center>
              </form>
<hr>
              <br><br>         <table class="table table-striped table-bordered">
                    <thead class="bg-dark">
                      <th class="text-light">Sr No</th>
                      <th class="text-light">Phases</th>
                      <th class="text-light" colspan="2">Action</th>
                    </thead>
                    <?php 
                    $query112 = "SELECT * FROM sim_phase where ctp_id='$ctp'";
                      $statement112 = $connect->prepare($query112);
                      $statement112->execute();
                      if($statement112->rowCount() > 0)
                        {
                          $result112 = $statement112->fetchAll();
                          $sn112=1;
                          foreach($result112 as $row112)
                          {
                            
                            $del_id_phase=$row112["id"];
                            $id_phase=$row112["phase"];
                            $sel_ctp_nam= $connect->prepare("SELECT phasename FROM phase WHERE id=?");
                                            $sel_ctp_nam->execute([$id_phase]);
                                            $sel_ctp_nam_data2 = $sel_ctp_nam->fetchColumn();
                            ?>
                      <tr>
                       <td><?php echo $sn112++;?></td>
                       <td><?php echo $sel_ctp_nam_data2;?></td>
                       <td>
                       <a href="sim_phase_del.php?id=<?php echo $del_id_phase?>"><i class="bi bi-trash-fill text-danger"></i></a>

                       </td>
                       
                      </tr>
                      <?php
                        }
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
    <!-- End Content -->

</main>

    

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>