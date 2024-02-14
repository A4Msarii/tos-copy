<?php
$indexpersontitle = "SELECT * FROM persontitle";
$indexstatement = $connect->prepare($indexpersontitle);
$indexstatement->execute();
$indexdata = $indexstatement->fetchAll();

// $indexevent = "SELECT * FROM user_event GROUP BY title";
// $indexstatementevent = $connect->prepare($indexevent);
// $indexstatementevent->execute();
// $indexeventdata = $indexstatementevent->fetchAll();
?>
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php
        foreach ($indexdata as $dt) {
            $indexuserid = $dt['user_id'];
            $indexuserquery = $connect->query("SELECT * FROM users WHERE id = '$indexuserid'");
            while ($indexuserdata = $indexuserquery->fetch()) {
        ?>
                <?php
                $prof_pic = $indexuserdata['file_name'];
                if ($prof_pic != null) {
                    $pic = BASE_URL . 'includes/Pages/upload/' . $prof_pic;
                } else {
                    $pic = BASE_URL . 'includes/Pages/avatar/avtar.png';
                }
                ?>
                <div class="swiper-slide">
                    <div class="d-flex pt-2 align-items-center justify-content-center">
                        <img src="<?php echo $pic ?>" alt="" style="height:200px;width:200px;border-radius:200px;" />
                    </div>
                    <h4 class="mt-5 text-center" style="color:#0D1282"><?php echo $indexuserdata['nickname']; ?></h4>
                    <p class="text-center text-black h5"><?php echo $dt['title'] ?></p>
                </div>
            <?php
            }
        }
        // foreach ($indexeventdata as $key => $dt) {
        //     $prof_pic = $dt['fileName'];
        //     if ($prof_pic != null) {
        //         $pic = BASE_URL . 'includes/Pages/events/' . $prof_pic;
        //     } else {
        //         $pic = BASE_URL . 'includes/Pages/avatar/avtar.png';
        //     }
            ?>
            <!-- <div class="swiper-slide">
                <a class="media-viewer" href="<?php echo $pic ?>" data-fslightbox="gallery<?php echo $key ?>">
                    <div class="d-flex pt-2 align-items-center justify-content-center">
                        <img src="<?php echo $pic ?>" alt="" style="height:200px;width:200px;border-radius:200px;" />
                    </div>
                    <p class="text-center text-black h5"><?php echo $dt['title'] ?></p>
                </a>
            </div> -->
            <?php
            // $title = $dt['title'];
            // $indexeventsub = "SELECT * FROM `user_event` WHERE title='$title'";
            // $indexstatementeventsub = $connect->prepare($indexeventsub);
            // $indexstatementeventsub->execute();
            // $indexeventdataesub = $indexstatementeventsub->fetchAll();
            // foreach ($indexeventdataesub as $subdt) {
            //     $prof_picsub = $subdt['fileName'];
            //     if ($prof_picsub != null) {
            //         $picsub = BASE_URL . 'includes/Pages/events/' . $prof_picsub;
            //     } else {
            //         $picsub = BASE_URL . 'includes/Pages/avatar/avtar.png';
            //     }
            ?>
                <!-- <a class="media-viewer" href="<?php echo $picsub ?>" data-fslightbox="gallery<?php echo $key ?>">
                </a> -->
        <?php
        //     }
        // }
        ?>
    </div>
</div>