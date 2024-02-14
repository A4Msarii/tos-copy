<?php
$course="";
$ctp="";

  include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$in3="";
$q7= "SELECT * FROM users where role='Instructor'";
$st7 = $connect->prepare($q7);
$st7->execute();

 if($st7->rowCount() > 0)
     {
         $re7 = $st7->fetchAll();
       foreach($re7 as $row)
         {
          $in3.= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
         }
     
     }

$pm1="";
$q_p2= "SELECT * FROM users where role='Phase Manager'";
 $st_p2 = $connect->prepare($q_p2);
 $st_p2->execute();

 if($st_p2->rowCount() > 0)
     {
         $re_p2 = $st_p2->fetchAll();
       foreach($re_p2 as $row)
         {
          $pm1.= '<option value="'.$row['name'].'">'.$row['name'].'</option>';
         }
     
     }

$cm1="";
$q_c3= "SELECT * FROM users where role='course manager'";
$st_c3 = $connect->prepare($q_c3);
$st_c3->execute();

 if($st_c3->rowCount() > 0)
     {
         $re_c3 = $st_c3->fetchAll();
       foreach($re_c3 as $row)
         {
          $cm1.= '<option value="'.$row['name'].'">'.$row['name'].'</option>';
         }
     
     }
$std1="";
$q_s4= "SELECT * FROM users where role='student'";
$st_s4 = $connect->prepare($q_s4);
       $st_s4->execute();

 if($st_s4->rowCount() > 0)
     {
         $re_s4 = $st_s4->fetchAll();
       foreach($re_s4 as $row)
         {
          $std1.= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
         }
     
     }
$ctp1="";
$q_c5= "SELECT * FROM ctppage";
$st_c5 = $connect->prepare($q_c5);
$st_c5->execute();

 if($st_c5->rowCount() > 0)
     {
         $re_c5 = $st_c5->fetchAll();
       foreach($re_c5 as $row)
         {
          $ctp1.= '<option value="'.$row['CTPid'].'">'.$row['symbol'].'</option>';
         }
     
     }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Steps</title>
  <!-- <link rel="stylesheet" href="../assets/vendor/quill/dist/quill.snow.css"> -->
  <meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
                   <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>
<style type="text/css">
  #div-id-course
  {
    width    : 100%;
    height   : 300px;
    position : relative;
    overflow : hidden;
  }
  #iframe-course
  {
    position : absolute;
    top      : -50px;
  }
</style>
<body>
<?php
include(ROOT_PATH.'includes/head_navbar.php');
?>

<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 22rem;">

      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <!-- Body -->
            <div class="card-body">
              <!-- Content -->
<div class="container">
  <!-- Step Form -->
  <form class="js-step-form"
        data-hs-step-form-options='{
          "progressSelector": "#uploadResumeStepFormProgress",
          "stepsSelector": "#uploadResumeStepFormContent",
          "endSelector": "#uploadResumeFinishBtn",
          "isValidate": false
        }'>
    <div class="row">
      <div class="col-lg-4">
        <!-- Sticky Block -->
        <div id="stickyBlockStartPoint">
          <div class="js-sticky-block"
               data-hs-sticky-block-options='{
                 "parentSelector": "#stickyBlockStartPoint",
                 "breakpoint": "lg",
                 "startPoint": "#stickyBlockStartPoint",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 20,
                 "stickyOffsetBottom": 0
               }'>
            <!-- Step -->
            <ul id="uploadResumeStepFormProgress" class="js-step-progress step step-icon-xs step-border-last-0 mt-5">
              <li class="step-item">
                <a class="step-content-wrapper" href="javascript:;"
                   data-hs-step-form-next-options='{
                    "targetSelector": "#uploadResumeStepBasics"
                  }'>
                  <span class="step-icon step-icon-soft-dark">1</span>
                  <div class="step-content">
                    <span class="step-title">STEP 1</span>
                    <span class="step-title-description step-text">General info about institute and school</span>
                  </div>
                </a>
              </li>

              <li class="step-item">
                <a class="step-content-wrapper" href="javascript:;"
                   data-hs-step-form-next-options='{
                    "targetSelector": "#uploadResumeStepEducation"
                  }'>
                  <span class="step-icon step-icon-soft-dark">2</span>
                  <div class="step-content">
                    <span class="step-title">STEP 2</span>
                    <span class="step-title-description step-text">Add vehicle category</span>
                  </div>
                </a>
              </li>

              <li class="step-item">
                <a class="step-content-wrapper" href="javascript:;"
                   data-hs-step-form-next-options='{
                    "targetSelector": "#uploadResumeStepWork"
                  }'>
                  <span class="step-icon step-icon-soft-dark">3</span>
                  <div class="step-content">
                    <span class="step-title">STEP 3</span>
                    <span class="step-title-description step-text">Add CTP</span>
                  </div>
                </a>
              </li>

              <li class="step-item">
                <a class="step-content-wrapper" href="javascript:;"
                   data-hs-step-form-next-options='{
                    "targetSelector": "#uploadResumeStepJobSkills"
                  }'>
                  <span class="step-icon step-icon-soft-dark">4</span>
                  <div class="step-content">
                    <span class="step-title">STEP 4</span>
                    <span class="step-title-description step-text">Add phases</span>
                  </div>
                </a>
              </li>

              <li class="step-item">
                <a class="step-content-wrapper" href="javascript:;"
                   data-hs-step-form-next-options='{
                    "targetSelector": "#uploadResumeStepTypeOfJob"
                  }'>
                  <span class="step-icon step-icon-soft-dark">5</span>
                  <div class="step-content">
                    <span class="step-title">STEP 5</span>
                    <span class="step-title-description step-text">Add New Course</span>
                  </div>
                </a>
              </li>
            </ul>
            <!-- End Step -->
          </div>
        </div>
        <!-- End Sticky Block -->
      </div>
      <!-- End Col -->

      <div id="formContainer" class="col-lg-8">
        <!-- Content Step Form -->
        <div id="uploadResumeStepFormContent">
          <!-- Card -->
          <div id="uploadResumeStepBasics" class="card active">
            <!-- Header -->
            <div class="card-header bg-img-start" style="background-image: url(<?php echo BASE_URL;?>assets/svg/components/card-1.svg);">
              <div class="flex-grow-1">
                <span class="d-lg-none">Step 1 of 5</span>
                <h3 class="card-header-title">Institute/School</h3>
              </div>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <!-- Form -->
              <form class="bg-success">
                
              </form>
              
                   <?php 
                              if(isset($_REQUEST['error']))
                              {
                              $error=$_REQUEST['error'];
                              echo $error;
                              }?>
                      <br><br>
                    <!--storing and fetching school name, department name, and type-->
                    <?php 
                    $q1 = "SELECT * FROM homepage where user_id=$user_id";
                          $st1 = $connect->prepare($q1);
                          $st1->execute();
                  
                    if($st1->rowCount() > 0){
                      $result = $st1->fetchAll();
                      foreach($result as $row)
                                  { ?>
                          <label style="font-weight:bolder; font-size:15px;" class="text-primary text-center">School/Institute/Group Name</label>
                          <input style="background-color: #bfcfe09e;" type="text" name="school_name" readonly value="<?php echo $row['school_name']?>" class="form-control"><br>
                  
                          <label style="font-weight:bolder; font-size:15px;" class="text-primary">Department/Team Name</label>
                          <input style="background-color: #bfcfe09e;" type="text" name="department_name" readonly value="<?php echo $row['department_name']?>" class="form-control"><br>
                  
                          <label style="font-weight:bolder; font-size:15px;" class="text-primary">Type : Driving, Parking</label>
                          <input style="background-color: #bfcfe09e;" type="text" name="type" readonly value="<?php echo $row['type']?>" class="form-control"><br>  
                          <a class="btn btn-success" href="vehiclecate.php" style="margin: 10px;">Save/Next</a><br>
                      
                      <?php   }
                    }else{
                    
                    ?>  
                    <form method="post" action="homedatabase.php">
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>" class="form-control"><br>
                      <label>School/Institute/Group Name</label>
                      <input type="text" name="school_name" class="form-control" required><br>

                      <label>Department/Team Name</label>
                      <input type="text" name="department_name" class="form-control" required><br>

                      <label>Type : Driving, Parking</label>
                      <input type="text" name="type" class="form-control" required><br>
                               
                      <input data-hs-step-form-next-options='{
                                "targetSelector": "#uploadResumeStepEducation"
                              }' class="btn btn-success" type="submit" name="save" value="Save/Next"><br>
                      <!-- <button class="btn btn-primary" type="submit"><a href="Next-home.php">Next</a></button> -->
                    </form>
                    <?php } ?>
                    

            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->

          <div id="uploadResumeStepEducation" class="card" style="display: none;">
            <!-- Header -->
            <div class="card-header bg-img-start" style="background-image: url(../assets/svg/components/card-1.svg);">
              <div class="flex-grow-1">
                <span class="d-lg-none">Step 2 of 5</span>
                <h3 class="card-header-title">Vehicle Category</h3>
              </div>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              
              <div class="js-add-field"
                   data-hs-add-field-options='{
                      "template": "#addEducationFieldTemplate",
                      "container": "#addEducationFieldContainer",
                      "defaultCreated": 0
                    }'>
                <!-- Form -->

                <!-- Form -->
                <form method="post" action="insert_vehicletype.php" style="width:80%;">
                  <label class="text-success">Vehicle Category</label>
                  <input class="form-control" type="text" name="vehicletype1" value="">
                  <center>
                  <input style="margin:5px;" class="btn btn-success" type="submit" name="Submit" value="Submit">
                  </center>
                </form>
              
              </div>
            
            </div>
            <!-- End Body -->
          </div>

          <div id="uploadResumeStepWork" class="card" style="display: none;">
            <!-- Header -->
            <div class="card-header bg-img-start" style="background-image: url(../assets/svg/components/card-1.svg);">
              <div class="flex-grow-1">
                <span class="d-lg-none">Step 3 of 5</span>
                <h3 class="card-header-title">CTP</h3>
                <p class="card-text">Create Your Own Course Training Plan</p>
              </div>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <div class="js-add-field"
                   data-hs-add-field-options='{
                      "template": "#addWorkFieldTemplate",
                      "container": "#addWorkFieldContainer",
                      "defaultCreated": 0
                    }'>
                <!-- Form -->
                <form action="ctpdata.php" method="post">
                <div class="mb-4">
                  <label class="form-label" for="course" style="color: black; font-weight:bold;">Name</label>
                  <input type="text" id="course" name="course" class="form-control form-control-md" required />
                </div>
                <!-- End Form -->

                <!-- Form -->
                <div class="mb-4">
                  <label class="form-label" for="symbol" style="color: black; font-weight:bold;">Course Code</label>
                  <input type="text" id="symbol" name="symbol" class="form-control form-control-md" required />
                </div>
                <!-- End Form -->

                <!-- Form -->
                <div class="mb-4">
                  <label style="text-align:left; color: black; font-weight:bold;" class="form-label" for="type">Type</label>
                  <input type="text" id="type" name="Type" class="form-control form-control-md" required />
                </div>
                <!-- End Form -->

                <div class="mb-4">
                  <label class="form-label" for="sponcors" style="color: black; font-weight:bold;">Sponcors</label>
                  <input type="text" id="sponcors" name="Sponcors" class="form-control form-control-md" required />
                </div>

                <div class="mb-4">
                  <label class="form-label" for="location" style="color: black; font-weight:bold;">Location</label>
                  <input type="text" id="location" name="Location" class="form-control form-control-md" required />
                </div>

                <div class="mb-4">
                  <label class="form-label" for="courseaim" style="color: black; font-weight:bold;">Course Aim</label>
                  <input type="text" id="courseaim" name="CourseAim" class="form-control form-control-md" required />
                </div>

                <div class="mb-4">
                  <label style="color: black; font-weight:bold;" class="form-label" for="addmanual">Add Manual</label>
                  <input type="file" id="addmanual" name="manual" class="form-control form-control-md" required />
                </div>

                <div class="mb-4">
                  <label class="form-label" for="coursesize" style="color: black; font-weight:bold;">Class Size</label>
                  <input type="text" id="classsize" name="ClassSize" class="form-control form-control-md" required />
                </div>

                <div class="mb-4">
                  <label style="text-align:left; color: black; font-weight:bold;" class="form-label" for="vehicletype">Vehicle Category</label>
                    <!-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addtype">Add Category</button> -->
                    <select type="text" id="vehicletype" class="form-control form-control-md" name="VehicleType" required>
                        <option selected disabled value="">-Select Vehicle Category-</option>
                        <?php echo $vehcate; ?>
                    </select>
                </div>

                <!-- Footer -->
            <div class="card-footer">
              <div class="d-flex align-items-center">
                <button type="button" class="btn btn-ghost-secondary"
                   data-hs-step-form-prev-options='{
                     "targetSelector": "#uploadResumeStepEducation"
                   }'>
                  <i class="bi-chevron-left small ms-1"></i> Previous step
                </button>

                <div class="ms-auto">
                  <input class="btn btn-success" data-hs-step-form-next-options='{
                            "targetSelector": "#uploadResumeStepJobSkills"
                          }' value="Save And Continue" type="submit" value="Submit" name="submit" />
                </div>
              </div>
            </div>
          </form>
            <!-- End Footer -->
              </div>
            </div>
            <!-- End Body -->            
          </div>

          <div id="uploadResumeStepJobSkills" class="card" style="display: none;">
            <!-- Header -->
            <div class="card-header bg-img-start" style="background-image: url(../assets/svg/components/card-1.svg);">
              <div class="flex-grow-1">
                <span class="d-lg-none">Step 4 of 5</span>
                <h3 class="card-header-title">Phases</h3>
              </div>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <!-- Form -->
              <div class="mb-4">
                <?php
              
                if(isset($_REQUEST['ctp']))
                {
                    $_SESSION['ctp_value']=$ctp=$_REQUEST['ctp'];
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
                  }else if(isset($_SESSION['ctp_value'])){
                            // $ctp=$_SESSION['ctp_value'];
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
                    }
                    if($_SESSION['ctp_value'])
                      {?>
                      <h3>Selected CTP: <span style="color:blue;"><?php echo $course?></span></h3>
                  <?php }else{?>
                    <h3>Selected CTP: <span style="color:red;">Select ctp</span></h3> 
                  <?php }
                        
          ?>
              </div>
              <!-- End Form -->

              <!-- Form -->
              <div class="mb-4">
               <form class="insert-phases" id="phase_form" method="post" action="insert_phase.php" style="width:700px;">
                <div class="input-field">
                  <table class="table table-bordered" id="table-field">
                    <tr>
                    <?php if($_SESSION['ctp_value']){?>
                      <input type="hidden" name="ctp" value="<?php echo $ctp ?>">
                      <?php } ?>
                      <td style="text-align: center;"><input type="text" placeholder="Enter Phase" name="phase[]" id="phaseval" class="form-control" value="" required/> </td>
                      <td><button type="button" name="add_phase" id="add_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                    </tr>
                  </table>
                </div>
                <center>
                  <button style="margin:5px;" class="btn btn-success" type="submit" id="phase_submit" name="savephase">Submit</button>
                </center>
              </form> 

                  <table class="table table-striped table-bordered" id="newcoursetable">
                <thead class="bg-dark">
                  <th class="text-light">Sr No</th>
                  <th class="text-light">Phase</th>
                  <th class="text-light" colspan="2">Action</th>
                </thead>
                <?php 
                
                  $output1 ="";
                  $query1 = "SELECT * FROM phase where ctp='$ctp'";
                  $statement1 = $connect->prepare($query1);
                  $statement1->execute();
                  if($statement1->rowCount() > 0)
                    {
                      $result1 = $statement1->fetchAll();
                      $sn1=1;
                      foreach($result1 as $row1)
                      {
                        $id=$row1["id"];
                        ?>
                  <tr>
                
                    <td><?php echo $sn1++;?></td>
                    <td><a style="color:black; text-decoration:underline;" href="phase-view.php?phase_id=<?php echo urlencode(base64_encode($row1['id']))?>&phase=<?php echo urlencode(base64_encode($row1['phasename']))?>&ctp=<?php echo urlencode(base64_encode($ctp))?>"><?php echo $row1['phasename']; ?></a></td>
                    <td style="text-align:center;"><a onclick="document.getElementById('phid').value='<?php echo $row1['id'] ?>';
                                    document.getElementById('phase_name').value='<?php echo $row1['phasename']; ?>';
                                  " data-bs-toggle="modal" data-bs-target="#editphase"><i class="bi bi-pen-fill text-success"></i></a></td>
                     <td style="text-align:center;"><a href="phase-delete.php?id=<?php echo $id?>&ctp=<?php echo $ctp?>"><i class="bi bi-trash-fill text-danger"></i></a>
                    </td>
                  </tr>
                  <?php
                    }
                    }        
                 ?>      
             </table>
              </div>
              <!-- End Form -->

              <!-- Footer -->
            <div class="card-footer">
              <div class="d-flex align-items-center">
                <button type="button" class="btn btn-ghost-secondary"
                   data-hs-step-form-prev-options='{
                     "targetSelector": "#uploadResumeStepWork"
                   }'>
                  <i class="bi-chevron-left small ms-1"></i> Previous step
                </button>

                <div class="ms-auto">
                  <button style="margin:5px;" class="btn btn-success" data-hs-step-form-next-options='{
                            "targetSelector": "#uploadResumeStepTypeOfJob"
                          }' type="submit" id="phase_submit" name="savephase">Save And Continue</button>
                </div>
              </div>
            </div>
            <!-- End Footer -->

            </div>
            <!-- End Body -->
          </div>

          <div id="uploadResumeStepTypeOfJob" class="card" style="display: none;">
            <!-- Header -->
            <div class="card-header bg-img-start" style="background-image: url(../assets/svg/components/card-1.svg);">
              <div class="flex-grow-1">
                <span class="d-lg-none">Step 5 of 5</span>
                <h3 class="card-header-title">New Course</h3>
                <p class="card-text">Create Your Own Course</p>
              </div>
            </div>
            <!-- End Header -->

            <!-- Body -->
           <div class="card-body" style="height:1100px;" id="div-id-course">
              <iframe src="newcourse.php" style="width:100%; height:1100px;" id="iframe-course" scrolling="no"></iframe>
            </div>
            <!-- End Body -->
          </div>
        </div>

        <!-- Message Body -->
        <div id="successMessageContent" style="display: none;">
          <div class="text-center">
            <img class="img-fluid mb-3" src="../assets/svg/illustrations/medal.svg" alt="Image Description" style="max-width: 15rem;">

            <div class="mb-4">
              <h2>Successful!</h2>
              <p>Your resume job has been successfully created.</p>
            </div>

            <div class="d-flex justify-content-center">
              <a class="btn btn-primary" href="../demo-jobs/employee.html">
                Go to profile <i class="bi-chevron-right small ms-1"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- End Message Body -->

        <!-- Sticky Block End Point -->
        <div id="stickyBlockEndPoint"></div>
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->
  </form>
  <!-- End Step Form -->
</div>
<!-- End Content -->
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

<!-- JS Implementing Plugins -->
<script src="../assets/vendor/hs-step-form/dist/hs-step-form.min.js"></script>
<script src="../assets/vendor/hs-sticky-block/dist/hs-sticky-block.min.js"></script>
<script src="../assets/vendor/hs-add-field/dist/hs-add-field.min.js"></script>
<script src="../assets/vendor/imask/dist/imask.min.js"></script>
<script src="../assets/vendor/quill/dist/quill.min.js"></script>

<!-- JS Front -->
<script>
$("#course_form").on("click","#select_course",function()
  {
    var select_course=$(this).val();
    //  alert(select_course);
    if(select_course){
      $.ajax({
        type:'POST',
        url:'check_count_ctp_symbol.php',
        data:'id='+select_course,
        success:function(response){
          //alert(response);
          $('#CourseCode').empty();
           $('#CourseCode').val(response);
        }
      });
   }
  });
  </script>

<!-- JS Plugins Init. -->
<script>
  (function() {
    // INITIALIZATION OF STICKY BLOCKS
    // =======================================================
    new HSStickyBlock('.js-sticky-block', {
      targetSelector: document.getElementById('header').classList.contains('navbar-fixed') ? '#header' : null
    })


    // INITIALIZATION OF STEP FORM
    // =======================================================
    new HSStepForm('.js-step-form', {
        finish: () => {
          document.getElementById("uploadResumeStepFormProgress").style.display = 'none'
          document.getElementById("uploadResumeStepFormContent").style.display = 'none'
          document.getElementById("successMessageContent").style.display = 'block'
          scrollToTop('#header');
          const formContainerEg1 = document.getElementById('formContainerEg1')
          formContainerEg1.classList.remove('col-lg-8')
          formContainerEg1.classList.add('col-lg-12')
        },
        onNextStep: function () {
          scrollToTop()
        },
        onPrevStep: function () {
          scrollToTop()
        }
      })

    function scrollToTop(el = '.js-step-form') {
      el = document.querySelector(el)
      window.scrollTo({
        top: (el.getBoundingClientRect().top + window.scrollY) - 30,
        left: 0,
        behavior: 'smooth'
      })
    }


    // INITIALIZATION OF ADD FIELD
    // =======================================================
    new HSAddField('.js-add-field', {
      addedField: field => {
        HSCore.components.HSQuill.init(field.querySelector('.js-quill-dynamic'))
      }
    })


    // INITIALIZATION OF QUILLJS EDITOR
    // =======================================================
    HSCore.components.HSQuill.init('.js-quill')


    // INITIALIZATION OF INPUT MASK
    // =======================================================
    HSCore.components.HSMask.init('.js-input-mask')
  })()
</script>


<footer role="footer" class="footer">
    <?php
      include 'footer2.php';
    ?>
</footer>
</body>
</html>