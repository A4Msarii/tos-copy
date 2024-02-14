<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$ctp = "";
if (isset($fixed_ctp_id)) {
  $_SESSION['type_ctp'] = $ctp = $fixed_ctp_id;
} else if (isset($_SESSION['type_ctp'])) {
  $ctp = $_SESSION['type_ctp'];
}
$course_names11 = "";
$q6 = "SELECT * FROM test_course";
$st6 = $connect->prepare($q6);
$st6->execute();

if ($st6->rowCount() > 0) {
  $re6 = $st6->fetchAll();
  foreach ($re6 as $row6) {
    $course_name_value = $row6['course_name'];
    $course_names11 .= '<option value="' . $row6['id'] . '">' . $course_name_value . '</option>';
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Question Bank</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>

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
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">
            <img style="height:30px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/percentage/question.png">
            Question Bank
          </h1>
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
              <!-- Nav -->
              <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="create_course-tab" href="#create_course" data-bs-toggle="pill" data-bs-target="#create_course" role="tab" aria-controls="create_course" aria-selected="true">
                    <div class="d-flex align-items-center">
                      Category
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="questions-tab" href="#questions" data-bs-toggle="pill" data-bs-target="#questions" role="tab" aria-controls="questions" aria-selected="false">
                    <div class="d-flex align-items-center">
                      Questions
                    </div>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" id="Document-tab" href="#Document" data-bs-toggle="pill" data-bs-target="#Document" role="tab" aria-controls="Document" aria-selected="false">
                    <div class="d-flex align-items-center">
                      Document
                    </div>
                  </a>
                </li>

                <!-- <li class="nav-item">
                  <a class="nav-link" id="Exam-tab" href="#Exam" data-bs-toggle="pill" data-bs-target="#Exam" role="tab" aria-controls="Exam" aria-selected="false">
                    <div class="d-flex align-items-center">
                      Exam
                    </div>
                  </a>
                </li> -->
              </ul>
              <!-- End Nav -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>

      <div class="tab-content">
        <div class="tab-pane fade show active" id="create_course" role="tabpanel" aria-labelledby="create_course-tab">
          <?php include ROOT_PATH . 'includes/Pages/test/test_category.php'; ?>
        </div>

        <div class="tab-pane fade" id="questions" role="tabpanel" aria-labelledby="questions-tab">
          <?php include ROOT_PATH . 'includes/Pages/test/question.php'; ?>
        </div>

      </div>

      <div class="tab-pane fade" id="Document" role="tabpanel" aria-labelledby="Document-tab">
        <?php include ROOT_PATH . 'includes/Pages/test/Document.php'; ?>
      </div>

    </div>

    <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>


  <!-- <div class="modal fade" id="editcou" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <input class="form-control" type="text" name="course_dec" value="" id="description">
            </td>
            </tr>
          </table><hr>
          <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="saveit" value="Submit">
          </form>
        </center>
      </div>
    </div>
  </div>
</div> -->

  <div class="modal fade" id="examDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Exam Detail</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form method="post" action="edit_course_test.php">
              <div id="examDEtail">

              </div>
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>



  <script>
    function course_search() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("coursesearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("coursetable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>

  <script>
    // Function to keep track of the last clicked tab and store it in sessionStorage
    function storeLastClickedTab() {
      // Retrieve the last clicked tab ID from sessionStorage
      var storedTab = sessionStorage.getItem('lastClickedTab');

      // If there is a stored tab, activate it on page load
      if (storedTab !== null) {
        $('a#' + storedTab).tab('show');
      }

      // When a tab is clicked, set the last clicked tab to its ID and store it in sessionStorage
      $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
        var lastClickedTab = e.target.id;
        sessionStorage.setItem('lastClickedTab', lastClickedTab);
      });
    }

    // Function to stay on the last clicked tab after form submission
    function stayOnLastClickedTab() {
      // Retrieve the last clicked tab ID from sessionStorage
      var storedTab = sessionStorage.getItem('lastClickedTab');

      // When the form is submitted, stay on the last clicked tab
      $('form').submit(function() {
        // Perform form submission
        // ...
        console.log("lastClickedTab: " + lastClickedTab);
        // Activate the last clicked tab
        $('a#' + storedTab).tab('show');

        // Return false to prevent the form from submitting normally
        return false;
      });
    }

    // Call the functions on window load
    window.onload = function() {
      storeLastClickedTab();
      stayOnLastClickedTab();
    };
  </script>


  <script>
    $(document).on("change", "#cat_dropdown", function() {
      var val = $(this).val();

      document.cookie = "dropdown_val1 = " + val;
      window.location.reload();
    });
  </script>
  <script>
    $(document).on("change", "#cat_dropdown1", function() {
      var val = $(this).val();
      document.cookie = "dropdown_val2 = " + val;
      window.location.reload();
    });
  </script>
  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>