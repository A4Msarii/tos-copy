<?php
  include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
  
  <title>Steps</title>
  <link rel="stylesheet" href="../assets/vendor/quill/dist/quill.snow.css">
  <meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
                   <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>
<style type="text/css">
   #div-id-start0
   {
    width    : 100%;
    height   : 200px;
    position : relative;
    overflow : hidden;
}
  #iframe-start0
  {
    position : absolute;
    top      : -50px;
  }
  #iframe-vehiclecat
  {
    position : absolute;
    top      : -50px;
  }
  #div-vehiclecat, #div-id-ctp
  {
    width    : 100%;
    height   : 300px;
    position : relative;
    overflow : hidden;
  }
  #iframe-ctp
  {
    position : absolute;
    top      : -50px;
  }
  #iframe-phase
  {
    position : absolute;
    top      : -50px;
  }
  #div-id-phase
  {
    width    : 100%;
    height   : 300px;
    position : relative;
    overflow : hidden;
  }
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
                    <span class="step-title-description step-text">General info about Institute And School</span>
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
                    <span class="step-title-description step-text">Add Vehicle Category</span>
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
                    <span class="step-title-description step-text">Create Your Course Training Plan</span>
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
                    <span class="step-title-description step-text">Create Phases</span>
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
                    <span class="step-title-description step-text">Create Your New Course..</span>
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
            <div class="card-header bg-img-start" style="background-image: url(../assets/svg/components/card-1.svg);">
              <div class="flex-grow-1">
                <span class="d-lg-none">Step 1 of 5</span>
                <h3 class="card-header-title">Basics</h3>
              </div>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body" style="width:100%; height:600px;" id="div-id-start0">
              <iframe src="start0.php" style="width:100%; height:600px; margin-right: 50px;" scrolling="no" id="iframe-start0">Start From 0</iframe>
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
            <div class="card-body" id="div-vehiclecat" style="height:400px;">
              <div class="js-add-field"
                   data-hs-add-field-options='{
                      "template": "#addEducationFieldTemplate",
                      "container": "#addEducationFieldContainer",
                      "defaultCreated": 0
                    }'>
                <!-- Form -->
                <iframe src="vehiclecate.php" style="width:100%; height:500px;" scrolling="no" id="iframe-vehiclecat"></iframe>

              </div>
            </div>
            <!-- End Body -->
          </div>

          <div id="uploadResumeStepWork" class="card" style="display: none;">
            <!-- Header -->
            <div class="card-header bg-img-start" style="background-image: url(../assets/svg/components/card-1.svg);">
              <div class="flex-grow-1">
                <span class="d-lg-none">Step 3 of 5</span>
                <h3 class="card-header-title">CTP(Course Training Plan)</h3>
                <p class="card-text">Create Your Own Course Training Plan..</p>
              </div>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body" style="height:1100px;" id="div-id-ctp">
              <div class="js-add-field"
                   data-hs-add-field-options='{
                      "template": "#addWorkFieldTemplate",
                      "container": "#addWorkFieldContainer",
                      "defaultCreated": 0
                    }'>
               <iframe src="firstctp.php" style="width:100%; height: 1200px;" id="iframe-ctp"></iframe>

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
            <div class="card-body" style="height:500px;" id="div-id-phase">
              <!-- Form -->
              <iframe src="Next-home.php" style="width:100%; height:600px;" scrolling="no" id="iframe-phase"></iframe>
            </div>
            <!-- End Body -->
          </div>

          <div id="uploadResumeStepTypeOfJob" class="card" style="display: none;">
            <!-- Header -->
            <div class="card-header bg-img-start" style="background-image: url(../assets/svg/components/card-1.svg);">
              <div class="flex-grow-1">
                <span class="d-lg-none">Step 5 of 5</span>
                <h3 class="card-header-title">New Course</h3>
                <p class="card-text">Create Your New Course..</p>
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



<!-- JS Front -->

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


<footer id="content1" role="footer" class="footer">
 <?php
    include(ROOT_PATH.'includes/footer2.php');
 ?>
</footer>
</body>
</html>