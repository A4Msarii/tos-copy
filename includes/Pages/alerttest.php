<style type="text/css">
  #slideset1 > * {
    position: absolute;
    top: 100%;
    left: 0;
    animation: 12s autoplay2 infinite ease-in-out;
  }
  #slideset1 {
    height: 4em;
    position: relative;
    overflow: hidden;
  }
  @keyframes autoplay2 {
    0% {
      top: 100%;
    }
    4% {
      top: 0%;
    }
    33.33% {
      top: 0%;
    }
    37.33% {
      top: -100%;
    }
    100% {
      top: -100%;
    }
  }
</style>

<?php
$indexalert = "SELECT * FROM `alerttable` WHERE permission='everyone'";
$indexstatementalert = $connect->prepare($indexalert);
$indexstatementalert->execute();
$indexdataalert = $indexstatementalert->fetchAll();
?>
<div id="slideset1" style="margin-top: 30px;">
  <?php
  foreach ($indexdataalert as $index => $dt) {
    $animationDelay = ($index * 4) . 's'; // Calculate animation delay based on index
  ?>
    <div style="animation-delay: <?php echo $animationDelay; ?>;background-color:<?php echo $dt['color']; ?>;width: 100%;margin-top: 5px;padding: 5px;border-radius: 10px;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#displayalertslider" data-offcanvasalertid="<?php echo $dt['id'] ?>">
      <div class="col-10" style="display:flex; float: left;margin-top: 5px;">
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
      <div style="float:right;" class="col-2">
              <p class="text-white" style="width: 100%; text-align: right;"><?php echo time_elapsed_string($dt['date']); ?></p>
            </div>
    </div>
  <?php
  }
  ?>
</div>


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