<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

?>
<!DOCTYPE html>
<html>

<head>
  <title>Question Categories</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>
<style type="text/css">
  .category:hover
  {
    background-color: #91989e63;
  }
</style>
<body>
  
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
 
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
        <div class="page-header" style="display: flex;">
          <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back" style="color:black; text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/create_test.php"><i class="bi bi-arrow-left"></i></a>
          <h1 class="text-success" style="margin:5px;">Question Category</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -18rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            
              <div class="card-body">
                <input style="margin:5px;" class="form-control" type="text" id="searchexamcategory" onkeyup="searchall()" placeholder="Search Exam Category">
              <?php
              $q4 = "SELECT * FROM test_course";
              $st4 = $connect->prepare($q4);
              $st4->execute();

              if ($st4->rowCount() > 0) {
                $re4 = $st4->fetchAll();
                foreach ($re4 as $row4) {
                  $c_idesss=$row4['id'];
                  $nRows = $connect->query("select count(*) from exam_question where category='$c_idesss'")->fetchColumn();
              ?>
            <a href="<?php echo BASE_URL;?>includes/Pages/edit_question_answer.php?id=<?php echo $row4['id'] ?>" class="catehover">
              <div class="card mb-4 category" id="category<?php echo $row4['id'] ?>">
              <div class="card-body">
                 <h1><?php echo $row4['course_name']; ?></h1>
                 <div style="display:flex;">
                 <p style="margin:5px;font-size: large;" title="Description"><i class="bi bi-ticket-detailed m-1"></i><?php echo $row4['course_description']; ?></p>
                 <p style="margin:5px;font-size: large;"><i class="bi bi-list-ul m-1"></i><span class="badge bg-primary rounded-pill"><?php echo $nRows; ?></span> Questions</p>
                 <p style="margin:5px;font-size: large;" title="Created Date"><i class="bi bi-calendar m-1"></i><?php echo $row4['date']; ?></p>
               </div>
              </div>
            </div></a>
            <?php
              }
            }
            ?>
            </div>
            
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>

      <div class="row justify-content-center d-none">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <div class="card-body">
              <!-- Nav -->
              <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="mcqshow-tab" href="#mcqshow" data-bs-toggle="pill" data-bs-target="#mcqshow" role="tab" aria-controls="mcqshow" aria-selected="true">
                    <div class="d-flex align-items-center">
                      MCQ
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="truefalse-tab" href="#truefalse" data-bs-toggle="pill" data-bs-target="#truefalse" role="tab" aria-controls="truefalse" aria-selected="false">
                    <div class="d-flex align-items-center">
                      True/False
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="diagram-tab" href="#diagram" data-bs-toggle="pill" data-bs-target="#diagram" role="tab" aria-controls="diagram" aria-selected="false">
                    <div class="d-flex align-items-center">
                      Diagrams
                    </div>
                  </a>
                </li>
              </ul>
              <input style="margin:5px;" class="form-control" type="text" id="searchAll" onkeyup="searchall()" placeholder="Search Questions">
              <!-- End Nav -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>

      <div class="row justify-content-center d-none">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane fade show active" id="mcqshow" role="tabpanel" aria-labelledby="mcqshow-tab">
                  <?php include ROOT_PATH . 'includes/Pages/test/mcq.php'; ?> 
                </div>

                <div class="tab-pane fade" id="truefalse" role="tabpanel" aria-labelledby="truefalse-tab">
                  <?php include ROOT_PATH . 'includes/Pages/test/truefalseshow.php'; ?> 
                </div>

                <div class="tab-pane fade" id="diagram" role="tabpanel" aria-labelledby="diagram-tab">
                  diagram
                </div>
              </div>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
    </div>
    <!-- End Content -->

  </main>


  <div class="modal fade" id="editcou" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Category</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form method="post" action="edit_course_test.php">
              <table class="table">
                <tr>
                  <input class="form-control" type="hidden" name="id" value="" id="phid">
                  <td>
                    <label class="text-dark">Course Name</label>
                    <input class="form-control" type="text" name="course_name" value="" id="course_name">
                  </td>
                  <td>
                    <label class="text-dark">Course Description</label>
                    <input class="form-control" type="text" name="course_dec" value="" id="course_description">
                  </td>
                </tr>
              </table>
              <hr>
              <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="saveit" value="Submit">
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>


  <!-- <div class="modal fade" id="edittest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Phase</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form method="post" action="edit_phase.php" style="width:80%;">
            
            <input class="form-control" type="" name="id" value="" id="phid">
            
          </form>
        </center>
      </div>
    </div>
  </div>
</div> -->


  <script type="text/javascript">
    $(document).ready(function() {
      // Listen for changes in the search input field
      $('#searchAll').on('keyup', function() {
        var searchTerm = $(this).val().toLowerCase();

        // Send an AJAX request to the server to fetch filtered questions
        $.ajax({
          type: 'POST',
          url: '<?php echo BASE_URL; ?>includes/Pages/test/searchall.php', // Create a PHP file to handle the search
          data: {
            searchTerm: searchTerm
          },
          success: function(response) {
            // Replace the content of the accordion with the filtered questions
            $('#accordionExample').html(response);
          }
        });
      });
    });
  </script>

  <script>
  function searchall() {
    var input = document.getElementById("searchexamcategory");
    var filter = input.value.toUpperCase();
    var categories = document.getElementsByClassName("category");

    for (var i = 0; i < categories.length; i++) {
      var category = categories[i];
      var categoryText = category.textContent || category.innerText;

      if (categoryText.toUpperCase().indexOf(filter) > -1) {
        category.style.display = "";
      } else {
        category.style.display = "none";
      }
    }
  }
</script>


  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>