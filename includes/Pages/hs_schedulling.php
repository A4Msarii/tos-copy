<li class="hs-has-mega-menu nav-item">
              <a id="landingsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></a>

              <!-- Mega Menu -->
              <div class="hs-mega-menu dropdown-menu bg-light" aria-labelledby="landingsMegaMenu" style="width:1000px; margin-left:-160px;">
                <div class="navbar-dropdown-menu-promo">
                  <!-- Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['actual'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/actual.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/filled/Actual class.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Schedulling Tools</span>
                            
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                
                  <!-- End Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['sim'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/sim.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/simulation.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Calendar</span>

                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  

                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Academic'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/academic.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/Academic.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;"></span>
                             
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                </div>

                <div class="navbar-dropdown-menu-promo">
                  <!-- Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Task'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/tasklog.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/task.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;"></span>
                            
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                  <!-- End Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['evaluation'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/evaluation.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/filled/Evaluation.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark"></span>

                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  

                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Student'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/stdactlog.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/priya/Student Activity.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark"></span>
                             
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                </div>

                 <div class="navbar-dropdown-menu-promo">
                  <!-- Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Testing'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/testing.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/test.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark"></span>
                            
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                  <!-- End Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Emergency'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/emergency.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/filled/Emergancy Log.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark"></span>

                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  

                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Qual'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/qual.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/priya/Qual.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark"></span>
                             
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                </div>

                 <div class="navbar-dropdown-menu-promo">
                  <!-- Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Clearance'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/clearance.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                           <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/clearence.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark"></span>
                            
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                  <!-- End Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['CAP'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/CAP.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/CAP.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark"></span>

                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  

                 
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                     <?php if(!isset($_SESSION['permission']) || $permission['Memo'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/memo.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/priya/Memorandum Icon.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark"></span>
                             
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  

                </div>

                <div class="navbar-dropdown-menu-promo">
                  <!-- Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Report'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/classreport.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/report.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark"></span>
                            
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                
                  <!-- End Promo Item -->
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Discipline'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/discipline.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/3d icons/discipline.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark"></span>

                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  
                  
                  
                  <div class="navbar-dropdown-menu-promo-item">
                    <!-- Promo Link -->
                    <?php if(!isset($_SESSION['permission']) || $permission['Quiz'] == "1"){?>
                    <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL;?>includes/Pages/quiz.php">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL;?>assets/svg/2d icons PNG/priya/Quiz.png">
                          </span>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <span class="navbar-dropdown-menu-media-title text-dark"></span>
                             
                        </div>
                      </div>
                    </a>
                    <?php }?>
                    <!-- End Promo Link -->
                  </div>
                  

                </div>

                  
                  <!-- End Promo Item -->
                </div>
                <!-- End Promo -->
            </li>