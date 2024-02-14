 <div class="row justify-content-center">

   <div class="col-lg-12 mb-3 mb-lg-5">
     <!-- Card -->
     <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
       <!-- Header -->
       <div class="card-header card-header-content-between">
         <h3 class="text-success">Album/Gallery</h3>
       </div>
       <!-- End Header -->

       <!-- Body -->
       <div class="card-body">

         <?php
          $title = "SELECT DISTINCT title FROM user_event";
          $title_data = $connect->prepare($title);
          $title_data->execute();
          $titledata = $title_data->fetchAll();
          ?>
         <div class="row mb-2">
           <?php foreach ($titledata as $keys => $dt) { ?>
             <?php
              $title = $dt['title'];
              $userevent = "SELECT * FROM user_event WHERE title = '$title'";
              $userevent_data = $connect->prepare($userevent);
              $userevent_data->execute();
              $uedata = $userevent_data->fetchAll();
              ?>
             <div class="swiffy-slider slider-item-show2 slider-nav-outside slider-nav-dark slider-nav-sm slider-nav-visible slider-nav-page slider-item-snapstart slider-nav-autoplay slider-nav-autopause slider-item-ratio slider-item-ratio-contain slider-item-ratio-100x50 bg-white shadow-lg py-3 py-lg-4" data-slider-nav-autoplay-interval="3000" style="height:200px;">
               <div class="slider-container">
                 <?php foreach ($uedata as $key => $dt) { ?>
                   <!-- Media Viewer -->
                   <a class="media-viewer<?php echo $keys ?>" href="<?php echo BASE_URL ?>includes/Pages/events/<?php echo $dt['fileName'] ?>" data-fslightbox="gallery<?php echo $keys ?>">
                     <div class="avatar avatar-circle">
                       <img class="avatar-img" src="<?php echo BASE_URL ?>includes/Pages/events/<?php echo $dt['fileName'] ?>" alt="...">
                     </div>
                   </a>
                   <!-- End Media Viewer -->
                 <?php }; ?>
               </div>
             </div>
             <h3 class="bg-danger text-white text-center"><?php echo $title ?></h3>
           <?php }; ?>
           <!-- End Col -->
           <br>
         </div>
         <br>
         <!-- End Row -->

       </div>

       <!-- End Body -->
     </div>
     <!-- End Card -->
   </div>
 </div>



 <!-- Modal -->
 <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl" role="document">
     <div class="modal-content">

       <div class="modal-header">
         <h5 class="modal-title h4" id="myExtraLargeModalLabel">Extra large modal</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
           <div class="carousel-indicators">
             <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
             <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
             <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
           </div>
           <div class="carousel-inner">

           </div>
           <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           </button>
           <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
             <span class="carousel-control-next-icon" aria-hidden="true"></span>
           </button>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- End Modal -->