<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Test</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/test.png">

</head>

<body>
  <?php 
  include (ROOT_PATH. 'Test/ts_loader.php');
  ?>
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
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-secondary">Test Result</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
             <div class="card-body">
              <table class="table table-striped table-bordered" id="phasetable">

                  <thead class="bg-dark">
                    <tr>
                      <th class="text-light">Sr No</th>
                      <th class="text-light">Questions</th>
                      <th class="text-light">Your Answer</th>
                      <th class="text-light">Correct Answer</th>
                      <th class="text-light">Scrore</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $dQ = $connect->query("SELECT * FROM exam_question WHERE type = 'true_false'");
                    $sr = 0;
                    while ($row = $dQ->fetch()) {
                      $row1 = $row['id'];
                      $sr++;
                    ?>
                      <tr>
                        <td><?php echo $sr; ?></td>
                        <td><?php echo $row['question']; ?></td>
                        <td></td>
                        <td><?php echo $row['correst_answer']; ?></td>
                        <td>10</td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <hr>
                <label style="font-size:x-large; font-weight:bold;" class="text-primary">Total Selected Answer : <span class="text-dark">7</span></label><br>
                <label style="font-size:x-large; font-weight:bold;" class="text-primary">Total Scrore : <span class="text-dark">20</span></label><br>
                <label style="font-size:x-large; font-weight:bold;" class="text-primary">Approciation : <span class="text-dark">Congratulations! You Got a Perfect Score.</span></label>
            </div>
          </div>

        </div>
      </div>

    </div>

    <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>




 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>


</html>