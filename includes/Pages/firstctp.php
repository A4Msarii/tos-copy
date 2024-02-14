<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$vehtype="";
// $class=$_REQUEST['class'];
$vehcate = "";
 $cate = "SELECT * FROM vehicletype ORDER BY vehid ASC";
 $state = $connect->prepare($cate);
 $state->execute();
 if($state->rowCount()>0)
 {
  $ans = $state->fetchAll();
  foreach($ans as $r)
  {
    $vehcate .= '<option value="'.$r['vehid'].'">'.$r['vehicletype'].'</option>';
  }
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>CTP Page</title>
  <meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
                   <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>
<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>

<div id="info-ctp">
<?php 
if(isset($_REQUEST['error']))
  {
    $error=$_REQUEST['error'];
    echo $error;
  }
?></div>
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
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <!-- <div class="page-header page-header-light">
          <h1 class="text-dark">CTP Page</h1>
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
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h3 class="text-success">Course Training Plan<span style="color:black;">(CTP)</span></h3>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
                <form action="ctpdata.php" method="post" id="ctp_form">

              <div class="row">
              
                <center>
                <span class="get_val_responce" style="color:red"></span></center>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label text-dark" for="course" style="font-weight:bold;">Name</label>
                    <input type="text" id="course_name_id" name="course" class="form-control form-control-md" required />
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label text-dark" for="symbol" style="font-weight:bold;">Course Code</label>
                    <input type="text" id="course_symbol" name="symbol" class="form-control form-control-md" required />
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                  <label style="text-align:left; font-weight:bold;" class="form-label text-dark" for="type">Type</label>
                  <input type="text" id="type" name="Type" class="form-control form-control-md" required />
                </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label text-dark" for="sponcors" style="font-weight:bold;">Sponsors</label>
                    <input type="text" id="sponcors" name="Sponcors" class="form-control form-control-md" required />
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label text-dark" for="location" style="font-weight:bold;">Location</label>
                    <input type="text" id="location" name="Location" class="form-control form-control-md" required />
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label text-dark" for="courseaim" style="font-weight:bold;">Course Aim</label>
                    <input type="text" id="courseaim" name="CourseAim" class="form-control form-control-md" required />
                  </div>

                </div>
              </div>
              

              <div class="row">
                <div class="col-md-6 mb-4">

                <div class="form-outline">
                  <label style="font-weight:bold;" class="form-label text-dark" for="addmanual">Add Manual</label>
                  <input type="file" id="addmanual" name="manual" class="form-control form-control-md" required />
                  <!-- <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#add_manual"><i class="fas fa-plus-square"></i></button> -->
                </div>
                </div>

                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label text-dark" for="coursesize" style="font-weight:bold;">Class Size</label>
                    <input type="text" id="classsize" name="ClassSize" class="form-control form-control-md" required />
                  </div>
                </div>

               </div>

               <div class="row">
                <center>
                 <div class="col-md-6 mb-4">
                   <div class="form-outline">
                    <label style="text-align:left; font-weight:bold;" class="form-label text-dark" for="vehicletype">Vehicle Category</label>
                    <!-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addtype">Add Category</button> -->
                    <select type="text" id="vehicletype" class="form-control form-control-md" name="VehicleType" required>
                        <option selected disabled value="">-Select Vehicle Category-</option>
                        <?php echo $vehcate; ?>
                    </select>
                  </div>
                 </div>
               </center>
               </div>


              <div class="row">
                <center>
                <input class="btn btn-success" style="width:50%;" type="submit" value="Submit" name="submit" />
              </center>
              </div>

            </form>
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


 <script type="text/javascript">
  $("#ctp_form").on("change","#course_name_id",function()
  {
   
     var value=$(this).val();
 
    if(value){
      $.ajax({
        type:'POST',
        url:'check_course_name.php',
        data:'value='+value,
        success:function(response){
          $('.get_val_responce').empty();
                $(".get_val_responce").append(response);
         
        }
      });
   }
  }); 
  $("#ctp_form").on("change","#course_symbol",function()
  {
   
     var value=$(this).val();
 
    if(value){
      $.ajax({
        type:'POST',
        url:'check_course_sym.php',
        data:'value='+value,
        success:function(response){
          $('.get_val_responce').empty();
                $(".get_val_responce").append(response);
         
        }
      });
   }
  });

    $(document).ready(function()
    {
        var html = '<tr>\
                <input type="hidden" name="manual" class="form-control">\
                          <td style="text-align: center;"><input type="text" name="manual[]" class="form-control" placeholder="Enter Manual"></td>\
                          <td><button type="button" name="remove_manual" id="remove_manual" class="btn btn-danger"><i class="fas fa-times"></i></button></td>\
              </tr>'
          var max = 3;
        var b = 1;

        $("#add_manual").click(function()
        {
          if(b <= max)
          {
            $("#table-field-manual").append(html);
            b++;
          }
        });
        $("#table-field-manual").on('click','#remove_manual',function()
        {
          $(this).closest('tr').remove();
          b--;
        });
    });
 </script>



 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>