<style type="text/css">
  @keyframes blink {

        0%,
        50%,
        100% {
            opacity: 1;
        }

        25%,
        75% {
            opacity: 0;
        }
    }

    .blink-animation4 {
        animation: blink 2s infinite;
        /* Adjust the animation duration as needed */
    }
</style>
<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start(); 
if (isset($_REQUEST['altertId'])) {
    $alert_id = $_REQUEST['altertId'];
    $title = $connect->query("SELECT * FROM alerttable WHERE id=$alert_id");
    $titledat = $title->fetch();
    $html = '';
    $html .= '<div class="modal-header" style="background:'.$titledat['color'].'">
                <img src="'.BASE_URL.'assets/svg/alert/'.$titledat['alert_icon'].'" id="alert_Cate_image" class="mb-2 blink-animation4" style="height:50px; margin-top:-20px; padding:5px;">&nbsp;<h1 class="heading"  style="margin-bottom:25px; font-size:xx-large; color:'.$titledat['textcolor'].'">'.$titledat['alert_type'].'</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-bottom:6px;"></button>
            </div>

            <!--Body-->
            <div class="modal-body">

                <input type="hidden" name="id" value="'.$titledat['id'].'">


                <span style="float:left; font-size: x-large;overflow-wrap: break-word;">'.$titledat['message'].'</span>


            </div>
            <div class="modal-footer">';
            if($titledat['alert_file']!=1){
                $html.='<a class="btn btn-outline-primary" style="font-size: x-large;font-weight: bold; color:black;" href="'. BASE_URL.'includes/Pages/alert/'.$titledat['alert_file'] .'" target="_blank">View File</a>';
            }
                $html.='<button class="btn btn-outline-danger" style="font-weight:bold; font-size:x-large;" data-bs-dismiss="modal">Cancel</button>
            </div>';
}
echo $html;
