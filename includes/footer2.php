

<!-- CSS Implementing Plugins -->
<!-- <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css"> -->
 <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/aos/dist/aos.css">
<script src="<?php echo BASE_URL; ?>assets/organization/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
  <link href="<?php echo BASE_URL; ?>assets/organization/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
<style type="text/css">
#Smallchat .Messages, #Smallchat .Messages_list {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
}
.chat_close_icon {
   cursor:pointer;
    color: #fff;
    font-size:16px;
    position: absolute;
    right: 12px;
    z-index: 9;
}
/*.chat_on {
    position: fixed;
    z-index: 10;
    right: 15px;
    bottom:20px;
    border-radius: 50%;
    text-align: center;
    padding: 9px;
    cursor: pointer;
    display: block;
}
.chat_on img
{
  height: 50px;
}
.chat_on_icon{
    color:#fff;
    font-size:25px;
    text-align:center;
}*/
/*
#Smallchat,#Smallchat * {
 box-sizing:border-box; 
 -webkit-font-smoothing:antialiased;
 -moz-osx-font-smoothing:grayscale;
 -webkit-tap-highlight-color:transparent
}
*/
#Smallchat .Layout { 
 pointer-events:auto;
 box-sizing:content-box!important;
 z-index:999999999;
 position:fixed;
 bottom:20px;
 min-width:50px;
 max-width:300px;
 max-height:30px;
 display:-webkit-box;
 display:-webkit-flex;
 display:-ms-flexbox;
 display:flex;
 -webkit-box-orient:vertical;
 -webkit-box-direction:normal;
 -webkit-flex-direction:column;
 -ms-flex-direction:column;
 flex-direction:column;
 -webkit-box-pack:end;
 -webkit-justify-content:flex-end;
 -ms-flex-pack:end;
 justify-content:flex-end;
 border-radius:50px;
 box-shadow:5px 0 20px 5px rgba(0,0,0,.1);
 -webkit-animation:appear .15s cubic-bezier(.25,.25,.5,1.1);
 animation:appear .15s cubic-bezier(.25,.25,.5,1.1);
 -webkit-animation-fill-mode:forwards;
 animation-fill-mode:forwards;
 opacity:0;
 -webkit-transition:right .1s cubic-bezier(.25,.25,.5,1),bottom .1s cubic-bezier(.25,.25,.5,1),min-width .2s cubic-bezier(.25,.25,.5,1),max-width .2s cubic-bezier(.25,.25,.5,1),min-height .2s cubic-bezier(.25,.25,.5,1),max-height .2s cubic-bezier(.25,.25,.5,1),border-radius 50ms cubic-bezier(.25,.25,.5,1) .15s,background-color 50ms cubic-bezier(.25,.25,.5,1) .15s,color 50ms cubic-bezier(.25,.25,.5,1) .15s;
 transition:right .1s cubic-bezier(.25,.25,.5,1),bottom .1s cubic-bezier(.25,.25,.5,1),min-width .2s cubic-bezier(.25,.25,.5,1),max-width .2s cubic-bezier(.25,.25,.5,1),min-height .2s cubic-bezier(.25,.25,.5,1),max-height .2s cubic-bezier(.25,.25,.5,1),border-radius 50ms cubic-bezier(.25,.25,.5,1) .15s,background-color 50ms cubic-bezier(.25,.25,.5,1) .15s,color 50ms cubic-bezier(.25,.25,.5,1) .15s
     
}

#Smallchat .Layout-right {
 right:20px
}

#Smallchat .Layout-open {
 overflow:hidden;
 min-width:300px;
 max-width:300px;
 height:500px;
 max-height:500px;
 border-radius:10px;
 color:#fff;
 -webkit-transition:right .1s cubic-bezier(.25,.25,.5,1),bottom .1s cubic-bezier(.25,.25,.5,1.1),min-width .2s cubic-bezier(.25,.25,.5,1.1),max-width .2s cubic-bezier(.25,.25,.5,1.1),max-height .2s cubic-bezier(.25,.25,.5,1.1),min-height .2s cubic-bezier(.25,.25,.5,1.1),border-radius 0ms cubic-bezier(.25,.25,.5,1.1),background-color 0ms cubic-bezier(.25,.25,.5,1.1),color 0ms cubic-bezier(.25,.25,.5,1.1);
 transition:right .1s cubic-bezier(.25,.25,.5,1),bottom .1s cubic-bezier(.25,.25,.5,1.1),min-width .2s cubic-bezier(.25,.25,.5,1.1),max-width .2s cubic-bezier(.25,.25,.5,1.1),max-height .2s cubic-bezier(.25,.25,.5,1.1),min-height .2s cubic-bezier(.25,.25,.5,1.1),border-radius 0ms cubic-bezier(.25,.25,.5,1.1),background-color 0ms cubic-bezier(.25,.25,.5,1.1),color 0ms cubic-bezier(.25,.25,.5,1.1);
}

#Smallchat .Layout-expand {
 height:500px;
 min-height:500px;
      display:none;
}
#Smallchat .Layout-mobile {
 bottom:10px
}
#Smallchat .Layout-mobile.Layout-open {
 width:calc(100% - 20px);
 min-width:calc(100% - 20px)
}
#Smallchat .Layout-mobile.Layout-expand {
 bottom:0;
 height:100%;
 min-height:100%;
 width:100%;
 min-width:100%;
 border-radius:0!important
}
@-webkit-keyframes appear {
 0% {
  opacity:0;
  -webkit-transform:scale(0);
  transform:scale(0)
 }
 to {
  opacity:1;
  -webkit-transform:scale(1);
  transform:scale(1)
 }
}
@keyframes appear {
 0% {
  opacity:0;
  -webkit-transform:scale(0);
  transform:scale(0)
 }
 to {
  opacity:1;
  -webkit-transform:scale(1);
  transform:scale(1)
 }
}
#Smallchat .Messenger_messenger {
 position:relative;
 height:100%;
 width:100%;
 min-width:300px;
 -webkit-box-orient:vertical;
 -webkit-box-direction:normal;
 -webkit-flex-direction:column;
 -ms-flex-direction:column;
 flex-direction:column
}
#Smallchat .Messenger_header,#Smallchat .Messenger_messenger {
 display:-webkit-box;
 display:-webkit-flex;
 display:-ms-flexbox;
 display:flex
}
#Smallchat .Messenger_header {
 -webkit-box-align:center;
 -webkit-align-items:center;
 -ms-flex-align:center;
 align-items:center;
 padding-left:10px;
 padding-right:40px;
 height:40px;
 -webkit-flex-shrink:0;
 -ms-flex-negative:0;
 flex-shrink:0
}


#Smallchat .Messenger_header h4 {
 opacity:0;
 font-size:16px;
 -webkit-animation:slidein .15s .3s;
 animation:slidein .15s .3s;
 -webkit-animation-fill-mode:forwards;
 animation-fill-mode:forwards
}

#Smallchat .Messenger_prompt {
 margin:0;
 font-size:16px;
 line-height:18px;
 font-weight:400;
 overflow:hidden;
 white-space:nowrap;
 text-overflow:ellipsis
}

@-webkit-keyframes slidein {
 0% {
  opacity:0;
  -webkit-transform:translateX(10px);
  transform:translateX(10px)
 }
 to {
  opacity:1;
  -webkit-transform:translateX(0);
  transform:translateX(0)
 }
}
@keyframes slidein {
 0% {
  opacity:0;
  -webkit-transform:translateX(10px);
  transform:translateX(10px)
 }
 to {
  opacity:1;
  -webkit-transform:translateX(0);
  transform:translateX(0)
 }
}
#Smallchat .Messenger_content {
    height: 450px;
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    background-color: #fff;
}
#Smallchat .Messages {
    position: relative;
    -webkit-flex-shrink: 1;
    -ms-flex-negative: 1;
    flex-shrink: 1;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    overflow-x: hidden;
    overflow-y: auto;
    padding: 10px;
    background-color: #fff;
    -webkit-overflow-scrolling: touch;
}





#Smallchat .Input {
    position: relative;
    width: 100%;
    -webkit-box-flex: 0;
    -webkit-flex-grow: 0;
    -ms-flex-positive: 0;
    flex-grow: 0;
    -webkit-flex-shrink: 0;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    padding-top: 17px;
    padding-bottom: 15px;
    color: #96aab4;
    background-color: #fff;
    border-top: 1px solid #e6ebea;
}
#Smallchat .Input-blank .Input_field {
    max-height: 20px;
}
#Smallchat .Input_field {
    width: 100%;
    resize: none;
    border: none;
    outline: none;
    padding: 0;
        padding-right: 0px;
        padding-left: 0px;
    padding-left: 20px;
    padding-right: 75px;
    background-color: transparent;
    font-size: 16px;
    line-height: 20px;
    min-height: 20px !important;
}
#Smallchat .Input_button-emoji {
    right: 45px;
}
#Smallchat .Input_button {
    position: absolute;
    bottom: 15px;
    width: 25px;
    height: 25px;
    padding: 0;
    border: none;
    outline: none;
    background-color: transparent;
    cursor: pointer;
}
#Smallchat .Input_button-send {
    right: 15px;
}
#Smallchat .Input-emoji .Input_button-emoji .Icon, #Smallchat .Input_button:hover .Icon {
    -webkit-transform: scale(1.1);
    -ms-transform: scale(1.1);
    transform: scale(1.1);
    -webkit-transition: all .1s ease-in-out;
    transition: all .1s ease-in-out;
}
#Smallchat .Input-emoji .Input_button-emoji .Icon path, #Smallchat .Input_button:hover .Icon path {
    fill: #2c2c46;
}
</style>
<footer>
  <div class="container pb-1 pb-lg-7">
    <div class="row d-none">
      <div class="col-12 col-lg-3 mb-7 mb-lg-0">
        <!-- Logo -->
        <?php
                                            $url = $_SERVER['PHP_SELF'];

                                            $filename2 = basename($url);
                                            $parts = explode('/Test/', $url);

                                            if (count($parts) > 1) {
                                                $path_after_test = $parts[1];
                                            
                                            $pos = strpos($url, "Test/" . $path_after_test);

                                            if ($pos !== false) {
                                                // Extract the desired part of the URL
                                                $desiredPart = substr($url, $pos);
                                            ?>
        <div class="mb-5">
          <a class="navbar-brand" href="" aria-label="Space">
            <div style="display: flex;">
              <img class="zi-2" src="<?php echo BASE_URL;?>assets/svg/thumbnail/test.png" alt="Image Description" style="height:50px; width: 50px;">
              <h1 style="margin: 5px;font-size: xx-large;" class="text-dark">TEST</h1>
            </div>
            <p class="text-muted small" style="text-align: right; margin-right:50px;">V1.0.0</p>
          </a>
        </div> 
        <!-- End Logo -->
        <?php
                                            }} else {
                                            ?>
        <div class="mb-5">
          <a class="navbar-brand" href="" aria-label="Space">
            <div style="display: flex;">
              <img class="zi-2" src="<?php echo BASE_URL;?>assets/svg/thumbnail/GS.png" alt="Image Description" style="height:50px; width: 50px;">
              <h1 style="margin: 5px;font-size: xx-large;" class="text-dark">GRADE SHEET</h1>
            </div>
            <p class="text-muted small" style="text-align: right; margin-right:50px;">V1.0.0</p>
          </a>
        </div> 

        <?php } ?>

        <!-- List -->
        <ul class="list-unstyled list-py-1">
          <li><a class="link-sm link-secondary" href="#"><i class="bi-geo-alt-fill me-1"></i> Alkarama, Abu Dhabi, UAE</a></li>
          <li><a class="link-sm link-secondary" href="tel:1-062-109-9222"><i class="bi-telephone-inbound-fill me-1"></i> +1 505 886 1117</a></li>
          
        </ul>
        <!-- End List -->

      </div>
      <!-- End Col -->

      <div class="col-6 col-sm mb-7 mb-sm-0">
        <h5 class="mb-3">Company</h5>

        <!-- List -->
        <ul class="list-unstyled list-py-1 mb-0">
          <li><a class="link-sm link-secondary" href="#">About</a></li>
          <li><a class="link-sm link-secondary" href="#">Help</a>
          <li><a class="link-sm link-secondary" href="#">Contact</a></li>
          <li><a class="link-sm link-secondary" href="#">Tutorial</a></li>
          <li><a class="link-sm link-secondary" href="login.php">Login Page</a></li>
         
        </ul>
        <!-- End List -->
      </div>
      <!-- End Col -->


      <div class="col-6 col-sm">
        <h5 class="mb-3">Documentation</h5>

        <!-- List -->
        <ul class="list-unstyled list-py-1 mb-0">
          <li><a class="link-sm link-secondary" href="#">Support</a></li>
          <li><a class="link-sm link-secondary" href="#">Docs</a></li>
          <li><a class="link-sm link-secondary" href="#">Tech Requirements</a></li>
        </ul>
        <!-- End List -->
      </div>
      <!-- End Col -->

      <div class="col-6 col-sm">
        <h5 class="mb-3">Resources</h5>

        <!-- List -->
        <ul class="list-unstyled list-py-1 mb-5">
          <li><a class="link-sm link-secondary" href="#"><i class="bi-question-circle-fill me-1"></i> Help</a></li>
          <li><a class="link-sm link-secondary" href="#"><i class="bi-person-circle me-1"></i> Your Account</a></li>
          <li><a class="link-sm link-secondary" href="#"><i class="bi-person-circle me-1"></i> Knowledge Base</a></li>
        </ul>
        <!-- End List -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->

    <div class="border-top my-7 d-none"></div>

    <div class="row mb-7 d-none">
      <div class="col-sm mb-3 mb-sm-0">
        <!-- Socials -->
        <ul class="list-inline list-separator mb-0">
          <li class="list-inline-item">
            <a class="text-body" href="#">Privacy & Policy</a>
          </li>
          <li class="list-inline-item">
            <a class="text-body" href="#">Terms</a>
          </li>
          <li class="list-inline-item">
            <a class="text-body" href="#">Site Map</a>
          </li>
        </ul>
        <!-- End Socials -->
      </div>

      <div class="col-sm-auto">
        <!-- Socials -->
        <ul class="list-inline mb-0">
          <li class="list-inline-item">
            <a class="btn btn-soft-info btn-xs btn-icon overlay" href="#" style="width: 30px; height: 30px;">
              

              <img style="height: 20px; width: 20px;" src="<?php echo BASE_URL;?>assets/svg/new/GS black logo.svg">
            </a>
          </li>

          <li class="list-inline-item">
            <a class="btn btn-soft-info btn-xs btn-icon" href="#" style="width: 30px; height: 30px;">
            
              <img class="avatar avatar-xss" style="height: 20px; width: 20px;" src="<?php echo BASE_URL;?>assets/svg/new/L black logo.svg">
            </a>
          </li>

          <li class="list-inline-item">
            <a class="btn btn-soft-info btn-xs btn-icon" href="#" style="width: 30px; height: 30px;">
              
              <img style="height: 20px; width: 20px;" src="<?php echo BASE_URL;?>assets/svg/icons/S black logo.svg">
            </a>
          </li>

          <li class="list-inline-item">
            <a class="btn btn-soft-info btn-xs btn-icon" href="apps-bri.php" style="width: 30px; height: 30px;">
              
              <img style="height: 20px; width: 20px;" src="<?php echo BASE_URL;?>assets/svg/icons/B black logo.svg">
            </a>
          </li>

          <li class="list-inline-item">
            <!-- Button Group -->
            <div class="btn-group">
              <button type="button" class="btn btn-soft-secondary btn-xs dropdown-toggle" id="footerLightSelectLanguage" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                <span class="d-flex align-items-center">
                  <img class="avatar avatar-xss avatar-circle me-2" src="<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description" width="16"/>
                  <span>English (US)</span>
                </span>
              </button>

              <div class="dropdown-menu" aria-labelledby="footerLightSelectLanguage">
                <a class="dropdown-item d-flex align-items-center active" href="#">
                  <img class="avatar avatar-xss avatar-circle me-2" src="<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description" width="16"/>
                  <span>English (US)</span>
                </a>
              </div>
            </div>
            <!-- End Button Group -->
          </li>

          <li class="list-inline-item">
            <!-- Button Group -->
            <div class="btn-group">
              <button type="button" class="btn btn-soft-secondary btn-xs dropdown-toggle" id="footerLightSelectLanguage" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                <span class="d-flex align-items-center">
                  <i class="bi-brightness-high me-2"></i>
                  <span>Default</span>
                </span>
              </button>

              <div class="dropdown-menu" aria-labelledby="footerLightSelectLanguage">
                <a class="dropdown-item d-flex align-items-center active" href="#">
                  <img class="avatar avatar-xss avatar-circle me-2" src="<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description" width="16"/>
                  <span>Default Mode</span>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <img class="avatar avatar-xss avatar-circle me-2" src="<?php echo BASE_URL;?>assets/vendor/flag-icon-css/flags/1x1/de.svg" alt="Image description" width="16"/>
                  <span>Dark Mode</span>
                </a>
                
              </div>
            </div>
            <!-- End Button Group -->
          </li>
        </ul>
        <!-- End Socials -->
      </div>
    </div>
    <!-- Copyright -->
    <div class="w-md-85 text-lg-center mx-lg-auto d-none">
      <p class="text-muted small">© Msarii.<script>document.write(new Date().getFullYear())</script>. All rights reserved.</p>
      <p class="text-muted small">Version - 1.1.2</p>
      <p class="text-muted small">When you visit or interact with our sites, services or tools, we or our authorised service providers may use cookies for storing information to help provide you with a better, faster and safer experience and for marketing purposes.</p>
    </div>

    
    <!-- End Copyright -->
  

    </div>

    <br>

    <br>

    <br>
   

   <div class="container-fluid bg-white" style="position:fixed; bottom:0px;width: 87%;margin-left: -31px;">
       <div class="row" style="margin-top: 10px;margin-bottom: -25px;justify-content: center;margin-left: 15px;">
          <div class="col-11">
           <?php include ROOT_PATH . 'includes/Pages/persional1.php'; ?>
         </div>
         <div class="col-1" style="margin-bottom: 90px;">
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

