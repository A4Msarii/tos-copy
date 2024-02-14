<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Test</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

  <style type="text/css">
.main-wrapper{
    font-family:Georgia, 'Times New Roman', Times, serif;
    /*width: 100%;
    height: 90vh;
    display: inline-flex;*/
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
/*.quiz-container{
    background-color: rgb(231, 221, 221);
    box-shadow: gray 2px 2px 2px;
}*/
.quiz-container > div{
    margin: 20px;
}
.each-answer{
    margin: 10px 0%;
}
.prev-next, .jumper-button{
    padding: 5px 10px;
    margin: 2px 0%;
    background-color: blue;
    color: white;
    border: white 1px solid;
    cursor: pointer;
}
.active{
    background-color: white;
    color : blue;
    border: blue solid 1px;
}
.action-btns button:hover{
    background-color: white;
    color : blue;
    border: blue solid 1px;
}
.result-wrapper{
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.result-details{
    display: inline-flex;
    justify-content: center;
}
.result-details > div{
    margin: 20px;
}

  </style>

</head>

<body>
  <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
  <div id="loading-screen" style="display:none;">
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  </div>
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <div class="page-header" style="margin-top:50px;">
          <h1 class="text-success">Test</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <?php 
                 $q4 = "SELECT * FROM exam_question where type='mcq'";
                 $st4 = $connect->prepare($q4);
                 $st4->execute();

                 if ($st4->rowCount() > 0) {
                   $re4 = $st4->fetchAll();
                   foreach ($re4 as $row4) {
                ?>
            <h1 class="card-subtitle" style="padding: 15px;
    font-size: x-large;
    color: black; margin-bottom:-30px;"><?php echo $row4['question'];?></h1><hr>
            <div class="card-body">
              <ul>
                      <li class="nav-link mb-2" style="border: 1px solid #1033db;width: 50%;border-radius: 10px;text-align: center;">A. <?php echo $row4['option1'];?></li>
                      <li class="nav-link mb-2" style="border: 1px solid #1033db;width: 50%;border-radius: 10px;text-align: center;">B. <?php echo $row4['option2'];?></li>
                      <li class="nav-link mb-2" style="border: 1px solid #1033db;width: 50%;border-radius: 10px;text-align: center;">C. <?php echo $row4['option3'];?></li>
                      <li class="nav-link mb-2" style="border: 1px solid #1033db;width: 50%;border-radius: 10px;text-align: center;">D. <?php echo $row4['option4'];?></li>
                    </ul>
            </div>
            <div class="card-footer">
              <button class="btn btn-soft-primary" style="font-size:large; font-weight:bold; float:right;">Next</button>
            </div>
            <!-- End Body -->
            <?php
                   }
                  }
              ?>
          </div>

          <div class="main-wrapper">
        <div class="quiz-container" id="quiz-container">

        </div>
    </div>
          
          <!-- End Card -->
        </div>
      </div>

    </div>

    <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>

  <script src="<?php echo BASE_URL;?>includes/Pages/Student_test/questions.js"></script>
    <script src="<?php echo BASE_URL;?>includes/Pages/Student_test/src.js"></script>



  <footer id="content1" role="footer" class="footer">
    <?php
    include(ROOT_PATH . './includes/footer2.php');
    ?>
  </footer>
</body>


</html>