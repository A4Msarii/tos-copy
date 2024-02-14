
                    
                        <div class="swiffy-slider slider-item-show3 slider-nav-sm slider-nav-page slider-item-snapstart slider-item-nogap slider-nav-round slider-nav-dark slider-indicators-sm slider-indicators-outside slider-indicators-round slider-indicators-dark slider-item-first-visible slider-nav-autoplay" data-slider-nav-autoplay-interval="5000">
                            <div class="slider-container">
                                <?php
                                // Query to retrieve the data with pagination
                                $persontitle = "SELECT * FROM persontitle";
                                $statement = $connect->prepare($persontitle);
                                $statement->execute();
                                $data = $statement->fetchAll();
                                foreach ($data as $dt) {
                                    $userid = $dt['user_id'];
                                    $userquery = $connect->query("SELECT * FROM users WHERE id = '$userid'");
                                    while ($userdata = $userquery->fetch()) {


                                ?>
                                        
                                           
                                                <div class="d-flex align-items-center">
                                                    <?php
                                                    $prof_pic = $userdata['file_name'];
                                                    if ($prof_pic != null) {
                                                        $pic = BASE_URL . 'includes/Pages/upload/' . $prof_pic;
                                                    } else {
                                                        $pic = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                    }
                                                    ?>
                                                    <div class="avatar avatar-sm avatar-circle">
                                                        <img style="" class="avatar" src="<?php echo $pic; ?>" alt="Logo">
                                                    </div>
                                                    <div class="flex-grow-1 ms-6">
                                                        <h2 class="mb-0 text-success"><?php echo $userdata['nickname']; ?></h2>
                                                        <h4 class="card-text text-body"><?php echo $dt['title'] ?></h4><br>
                                                    </div>

                                                </div>
                                            
                                      
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <!-- <button type="button" class="slider-nav" aria-label="Go left"></button>
                            <button type="button" class="slider-nav slider-nav-next" aria-label="Go left"></button> -->
                        </div>
                    
                

                <!-- End Body -->
