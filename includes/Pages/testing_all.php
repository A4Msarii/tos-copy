<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>
<title>Testing Log</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
<link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>

<style type="text/css">
  #button {
    display: inline-block;
    position: relative;
    margin: 1em;
    /*    padding: 0.57em;*/
    border: 2px solid #FFF;
    overflow: hidden;
    text-decoration: none;
    /*    font-size: 2em;*/
    outline: none;
    color: #FFF;
    /*    background: black;*/
    font-family: 'raleway', sans-serif;
  }

  #button span {
    color: #FFF;
    -webkit-transition: 0.6s;
    -moz-transition: 0.6s;
    -o-transition: 0.6s;
    transition: 0.6s;
    -webkit-transition-delay: 0.2s;
    -moz-transition-delay: 0.2s;
    -o-transition-delay: 0.2s;
    transition-delay: 0.2s;
  }

  #button:before,
  #button:after {
    content: '';
    position: absolute;
    top: 0.67em;
    left: 0;
    width: 100%;
    text-align: center;
    opacity: 0;
    -webkit-transition: .4s, opacity .6s;
    -moz-transition: .4s, opacity .6s;
    -o-transition: .4s, opacity .6s;
    transition: .4s, opacity .6s;
  }

  /* :before */

  #button:before {
    content: attr(data-hover);
    -webkit-transform: translate(-150%, 0);
    -moz-transform: translate(-150%, 0);
    -ms-transform: translate(-150%, 0);
    -o-transform: translate(-150%, 0);
    transform: translate(-150%, 0);
  }

  /* :after */

  #button:after {
    content: attr(data-active);
    -webkit-transform: translate(150%, 0);
    -moz-transform: translate(150%, 0);
    -ms-transform: translate(150%, 0);
    -o-transform: translate(150%, 0);
    transform: translate(150%, 0);
  }

  /* Span on :hover and :active */

  #button:hover span,
  #button:active span {
    opacity: 0;
    -webkit-transform: scale(0.3);
    -moz-transform: scale(0.3);
    -ms-transform: scale(0.3);
    -o-transform: scale(0.3);
    transform: scale(0.3);
  }

  /*  
    We show :before pseudo-element on :hover 
    and :after pseudo-element on :active 
*/

  #button:hover:before,
  #button:active:after {
    opacity: 1;
    -webkit-transform: translate(0, 0);
    -moz-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    -webkit-transition-delay: .0s;
    -moz-transition-delay: .0s;
    -o-transition-delay: .0s;
    transition-delay: .0s;
  }

  /* 
  We hide :before pseudo-element on :active
*/

  #button:active:before {
    -webkit-transform: translate(-150%, 0);
    -moz-transform: translate(-150%, 0);
    -ms-transform: translate(-150%, 0);
    -o-transform: translate(-150%, 0);
    transform: translate(-150%, 0);
    -webkit-transition-delay: 0s;
    -moz-transition-delay: 0s;
    -o-transition-delay: 0s;
    transition-delay: 0s;
  }
</style>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
 

  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');

    ?>
  </div>

  <style>
    /* body {
            width: 100vw;
            height: 100vh;
            display: flex;
            position: relative;
            background: #1e1e24;
            align-items: center;
            justify-content: center;
        } */

    .btn-flip1 {
      padding: 0px !important;
      opacity: 1;
      outline: 0;
      /* color: #fff; */
      line-height: 43px;
      position: relative;
      text-align: center;
      letter-spacing: 1px;
      display: inline-block;
      text-decoration: none;
      text-transform: uppercase;
    }

    .btn-flip1:hover:after {
      opacity: 1;
      transform: translateY(0) rotateX(0);
    }

    .btn-flip1:hover:before {
      opacity: 0;
      transform: translateY(50%) rotateX(90deg);
    }

    .btn-flip1:after {
      top: 10px;
      left: 0;
      opacity: 0;
      width: 100%;
      display: block;
      transition: 0.5s;
      position: absolute;
      content: attr(data-back);
      transform: translateY(-50%) rotateX(90deg);
    }

    .btn-flip1:before {
      top: 0;
      left: 0;
      opacity: 1;
      display: block;
      padding: 0 30px;
      line-height: 40px;
      transition: 0.5s;
      position: relative;
      content: attr(data-front);
      transform: translateY(0) rotateX(0);
    }

    .tooltip1 {
      position: absolute;
      background-color: #333;
      color: #fff;
      padding: 5px;
      border-radius: 4px;
      font-size: 12px;
      z-index: 999999;
      top: -34px;
      display: none;
    }

    .tooltip-text {
      visibility: hidden;
      position: absolute;
      top: -46px;
      left: 10px;
      z-index: 2;
      width: auto;
      color: white;
      font-size: 12px;
      background-color: #192733;
      border-radius: 10px;
      padding: 10px 15px 10px 15px;
    }

    .tooltip-text::before {
      content: "";
      position: absolute;
      transform: rotate(45deg);
      background-color: #192733;
      padding: 5px;
      z-index: 1;
      top: 32px;
      left: 35px;
    }

    .btn-flip1:hover .tooltip-text {
      visibility: visible;
    }
  </style>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">
            <img style="height:25px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Test_class.png">
            Testing Log All
          </h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
             <!-- Tab Content -->
              <div class="col">
              <?php
        
                $getCourse = $connect->query("SELECT * FROM newcourse WHERE Courseid = '$c_id'");
                while ($getCourseData = $getCourse->fetch()) {
                  $stuIDArr = array();
                $stuIDArrP = 0;
                  $course_Code = $getCourseData['CourseCode'];
                  $course_Name = $getCourseData['CourseName'];
                  $get_course_name3 = $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
              $get_course_name3->execute([$course_Name]);
              $course_code3 = $get_course_name3->fetchColumn();
                ?>
                <h1>Marks:<div id="get_marks"></div></h1>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-2">
                  <div class="col-12">

                    <table class="table table-bordered">
                      <thead class="bg-dark">
                        <tr>
                          <th class="text-white">item</th>
                          <?php
                          // AND StudentNames = '29'
                            $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$course_Code' AND CourseName = '$course_Name'");
                            while ($selecAllUserData = $selecAllUser->fetch()) {
                              $uID = $selecAllUserData['StudentNames'];
                              $usersQ = $connect->query("SELECT * FROM users WHERE id = '$uID'");
                              while ($usersQData = $usersQ->fetch()) {
                                if (!in_array($usersQData['id'], $stuIDArr)) {
                                  $stuIDArr[$stuIDArrP] = $usersQData['id'];
                                  $stuIDArrP++;
                                }
                          ?>
                                <th class="text-white text-center"><?php echo $usersQData['nickname']; ?></th>
                          <?php
                              }
                            }
                          ?>

                        </tr>
                      <tbody>
                        <tr>
                          <td>
                            <img class=" avatar avatar-img avatar-circle" src="<?php echo BASE_URL; ?>assets/img/Class-Student.png" height='20px' width='20px' alt="">
                          </td>
                          <?php
                          $stuName = 0;
                          while ($stuName < count($stuIDArr)) {
                            $stuId = $stuIDArr[$stuName];
                            $query = $connect->query("SELECT file_name FROM users WHERE id = '$stuId'");
                            $prof_pic11 = $query->fetchColumn();
                            if ($prof_pic11 != "") {
                              $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                              if (file_exists($_SERVER['DOCUMENT_ROOT'] . $img)) {
                                $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                              } else {
                                $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
                              }
                            } else {
                              $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
                            }
                          ?>
                            <td class="text-center">
                            <img class=" avatar avatar-img avatar-circle" src="<?php echo $img; ?>" height='20px' width='20px' alt="">
                            </td>
                          <?php $stuName++;
                          } ?>
                        </tr>
                        <?php
                        $eme_id = "SELECT * FROM test where ctp='$std_course1'";
                        $eme_idst = $connect->prepare($eme_id);
                        $eme_idst->execute();
                        $eme_idre = $eme_idst->fetchAll();
                        $sns = 1;
                        foreach ($eme_idre as $eme_idvalue) {
                            $eme_id=$eme_idvalue['id'];
                          
                        ?>

                           <tr>
                            <td>
                              <?php echo $eme_idvalue['test']; ?>
                            </td>
                            <?php
                            $stuName = 0;
                            while ($stuName < count($stuIDArr)) {
                              $stuId = $stuIDArr[$stuName];
                              $q = $connect->prepare("SELECT marks FROM test_data WHERE test_id=? and student_id=?");
                              $q->execute([$eme_id,$stuId]);
                              $name = $q->fetchColumn();
                              $eme_id1 = $connect->query("SELECT count(*) FROM test_data WHERE test_id='$eme_id' AND student_id = '$stuId'");
                              if ($eme_id1->fetchColumn() > 0) {
                                $bgColor1 = "#00C9A7";
                              } else {
                                $bgColor1 = "#ED4C78";
                              }
                            ?>
                              <td style="background-color:<?php echo $bgColor1; ?> !important;" onclick="document.getElementById('get_marks').innerText='<?php echo $name ?>';"></td>
                            <?php
                              $stuName++;
                            }
                            ?>
                          </tr>
                        <?php

                        }
                        ?>

              </tbody>

              </thead>

            </table>
            <hr>

          </div>
          <!-- End Col -->
        </div>
        <?php } ?>

              </div>
              <!-- End Header -->
            </div>
            <!-- End Card -->
          </div>
        </div>
        <!-- End Row -->



      </div>
    </div>
      <!-- End Row -->


      
    <!-- End Content -->

  </main>
<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>


</html>