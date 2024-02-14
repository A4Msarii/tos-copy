

<!-- CSS Implementing Plugins -->
<!-- <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css"> -->
 <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/aos/dist/aos.css">
<script src="<?php echo BASE_URL; ?>assets/organization/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
  <link href="<?php echo BASE_URL; ?>assets/organization/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">

<footer>
   <div class="container-fluid bg-white" style="position:fixed; bottom:0px;width: 87%;margin-left: -31px; z-index: 11;">
       <div class="row" style="margin-top: 10px;margin-bottom: -25px;justify-content: center;margin-left: 15px;">
          <div class="col-11">
           <?php include ROOT_PATH . 'includes/Pages/persional1.php'; ?>
         </div>
         <div class="col-1">
           <?php include ROOT_PATH . 'includes/Pages/message_tab.php'; ?>
         </div>
       </div>
   </div>

</footer>

<!-- <script type="text/javascript">
  $(document).ready(function(){
    $(".chat_on").click(function(){
        $(".Layout").toggle();
        $(".chat_on").hide(300);
    });
    
       $(".chat_close_icon").click(function(){
        $(".Layout").hide();
           $(".chat_on").show(300);
    });
    
});
</script> -->

<script>
  (function() {
    // INITIALIZATION OF BOOTSTRAP DROPDOWN
    // =======================================================
    HSBsDropdown.init()
  })()
</script>

