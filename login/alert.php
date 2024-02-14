<style>
  .slider-container {
    display: flex;
    flex-direction: column;
    overflow: hidden;
    height: 300px; /* Adjust the height as needed */
  }

  .slide {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: #f0f0f0; /* Change the background color as needed */
    height: 100%;
    animation: slide-up 4s linear infinite; /* Adjust animation duration as needed */
  }

  @keyframes slide-up {
    0% {
      transform: translateY(0);
    }
    25% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-100%);
    }
    75% {
      transform: translateY(-100%);
    }
    100% {
      transform: translateY(0);
    }
  }
</style>

<?php
$indexalert = "SELECT * FROM `alerttable` WHERE permission='everyone'";
$indexstatementalert = $connect->prepare($indexalert);
$indexstatementalert->execute();
$indexdataalert = $indexstatementalert->fetchAll();
?>
<div class="swiffy-slider slider-item-show1 slider-nav-autoplay slider-indicators-outside" data-slider-nav-autoplay-interval="4000" style="margin-top: 40px;">
  <div class="slider-container">
    <?php
    foreach ($indexdataalert as $dt) {
    ?>
      <div class="slide rounded d-flex justify-content-center align-items-center" style="background-color: <?php echo $dt['color']; ?>; cursor: pointer;">
        <div id="slide1" class="col-12 rounded justify-content-center align-items-center">
          <div class="row" data-bs-toggle="modal" data-bs-target="#displayalertslider" data-offcanvasalertid="<?php echo $dt['id'] ?>" style="padding: 5px; padding-bottom: 0px; margin-top: 5px;">
            <div class="col-10 d-flex">
              <img src="<?php echo BASE_URL . 'assets/svg/alert/' . $dt['alert_icon'] ?>" class="" alt="" srcset="" style="height: 20px; width: 20px;">
              <h3 class="text-white" style="text-align: left;"><?php echo $dt['alert_type'] ?></h3> -
              <p class="text-white">
                <?php
                $message = $dt['message'];
                if (strlen($message) > 120) {
                  echo substr($message, 0, 120) . '<span id="readMore" style="display:none;">' . substr($message, 20) . '</span> <a href="javascript:void(0);" onclick="toggleReadMore()" style="color:black;">..Read More</a>';
                } else {
                  echo $message;
                }
                ?>

              </p> -
              <p class="text-white"><?php echo $dt['alert_file'] ?></p>
            </div>
            <div class="col-2">
              <p class="text-white" style="width: 100%; text-align: right;"><?php echo time_elapsed_string($dt['date']); ?></p>
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>


<!-- alert display modal -->
<!-- Modal -->


<div class="modal fade" id="displayalertslider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.3);">
    <div class="modal-dialog modal-notify modal-danger modal-lg" role="document" style="margin-top:250px;">
        
        <div class="modal-content text-center offcanvasmodelforealert">
         
        </div>
        
    </div>
</div>


<script>
  // Function to open the modal and load content via AJAX
  function openModalWithAjax(alertId) {
    $.ajax({
      type: "GET",
      url: "<?php echo BASE_URL;?>includes/Pages/displayalert.php", // Replace with the actual path to your PHP script
      data: { altertId: alertId }, // Pass the alert ID to the PHP script
      success: function(data) {
        // Insert the fetched HTML into the modal content
        $(".offcanvasmodelforealert").html(data);
        $('#displayalertslider').modal('show'); // Show the modal
      },
      error: function() {
        alert("An error occurred while loading the modal content.");
      }
    });
  }

  // Attach click event handlers to each slide
  var slides = document.querySelectorAll('[data-offcanvasalertid]');
  slides.forEach(function(slide) {
    slide.addEventListener('click', function() {
      var alertId = this.getAttribute('data-offcanvasalertid');
      openModalWithAjax(alertId);
    });
  });
</script>