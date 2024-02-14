<?php include('../inc/config.php');?>
<?php $Section ="hire";?>
<?php include(ROOT_PATH .'inc/header.php');?>
  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main">
    <!-- Hero -->
    <div class="bg-img-start" style="background-image: url(<?php echo BASE_URL;?>assets/svg/components/card-11.svg);">
      <div class="container position-relative content-space-t-3 content-space-t-md-4 content-space-t-lg-4">
      <div class="row justify-content-lg-between align-items-lg-center">
        <div class="col-md-10 col-lg-5">
          <!-- Heading -->
          
          <div class="mb-7">
            <h1 class="display-4 mb-3">
              Build your<br>

              <span class="text-primary text-highlight-warning">
                <span class="js-typedjs"
                      data-hs-typed-options='{
                        "strings": ["perfect", "future", "dream"],
                        "typeSpeed": 90,
                        "loop": true,
                        "backSpeed": 30,
                        "backDelay": 2500
                      }'></span>
              </span>startup
            </h1>
            <p class="lead">Whatever your goal - we will get your there.</p>
          </div>
          <!-- End Title & Description -->

          <div class="d-none d-lg-block w-75">
            <img class="img-fluid" src="<?php echo BASE_URL;?>assets/img/illustrations/hirring.png" alt="Image Description">
          </div>
        </div>
        <!-- End Col -->

        <div class="col-lg-6">
            <!-- Events -->

                <!-- Start of Meetings Embed Script -->
                  <!-- <div class="meetings-iframe-container" data-src="https://meetings.hubspot.com/saranya-varthini?embed=true"> -->
                    <button class="btn btn-primary"><a href="https://outlook.office365.com/book/TOSDemo@Msarii.com/" target="_blank" style="color:white;">Book TOS Demo</a></button>
          <button class="btn btn-primary"><a href="https://outlook.office365.com/book/GetHired@Msarii.com/" target="_blank" style="color:white;">Get Hired</a></button>
                  <!-- </div> -->
                  <!-- <script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script> -->
                <!-- End of Meetings Embed Script -->

             <!-- End Events -->
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Hero -->
      <!-- End Form -->
    </div>
    <!-- End Form -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== FOOTER ========== -->
 <?php include(ROOT_PATH .'inc/footer.php');?>