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

  <style type="text/css">
    .main-wrapper {
      font-family: Georgia, 'Times New Roman', Times, serif;
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
    .quiz-container>div {
      margin: 20px;
    }

    .each-answer {
      margin: 10px 0%;
    }

    .prev-next,
    .jumper-button {
      padding: 5px 10px;
      margin: 2px 0%;
      background-color: blue;
      color: white;
      border: white 1px solid;
      cursor: pointer;
    }

    .active {
      background-color: white;
      color: blue;
      border: blue solid 1px;
    }

    .action-btns button:hover {
      background-color: white;
      color: blue;
      border: blue solid 1px;
    }

    .result-wrapper {
      display: inline-flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .result-details {
      display: inline-flex;
      justify-content: center;
    }

    .result-details>div {
      margin: 20px;
    }
  </style>

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
          <h1 class="text-secondary">True And False</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->
    <?php
    $q = "SELECT * FROM `exam_question` WHERE type='true_false'";
    $statement = $connect->prepare($q);
    $statement->execute();
    ?>
    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="m-3" style="text-align:end;">
              <h1 class="text-danger">Time : <i class="bi bi-stopwatch"></i> 3:40 Min Left</h1>
            </div>
            <div id="question-container">
              <h1 id="question" class="card-subtitle" style="padding: 15px; font-size: x-large; color: black;"></h1>
              <hr>
              <div class="card-body">
                <div id="pagination-container">

                </div>
              </div>
              <div class="card-footer mb-5">
                <button id="previous-button" class="btn btn-soft-primary" style="font-size: large; font-weight: bold;display:none;">Previous</button>
                <button id="next-button" class="btn btn-soft-primary" style="font-size: large; font-weight: bold; float: right;display:none;">Next</button>
                <button id="result-button" class="btn btn-soft-primary" style="font-size: large; font-weight: bold; float: right;display:none;"><a href="<?php echo BASE_URL;?>Test/studentpanel/truefalseresult.php" style="color: white;">Result</a></button>
              </div>
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

  <script>
    $(document).ready(function() {
      var totalPages;
      var currentPage = 1;
      // Function to load paginated data
      function loadPaginatedData(page) {
        $.ajax({
          url: '<?php echo BASE_URL; ?>Test/studentpanel/fetch_truefalse.php',
          type: 'GET',
          data: {
            page: page
          },
          dataType: 'json',
          success: function(response) {
            // console.log(response);
            var data = response.data;
            totalPages = response.totalPages;
            var html = '';

            // Iterate through the data and build the HTML
            $.each(data, function(index, item) {
              html += '<h1>Q.' + (index + 1) + ' ' + item.question + '</h1>';
              html += '<li class="nav-link mb-2" style="border: 1px solid #1033db;width: 50%;border-radius: 10px;text-align: center;">A.' + item.option1 + '</li>';
              html += '<li class="nav-link mb-2" style="border: 1px solid #1033db;width: 50%;border-radius: 10px;text-align: center;">B.' + item.option2 + '</li>';
            });

            // Append the HTML to the container
            $('#pagination-container').html(html);

            // Update the current page
            currentPage = page;

            // Show/hide "Previous" and "Next" buttons
            if (currentPage > 1) {
              $('#previous-button').show();
            } else {
              $('#previous-button').hide();
            }

            if (currentPage < totalPages) {
              $('#next-button').show();
              $('#result-button').hide(); // Hide "Result" button
            } else {
              $('#next-button').hide();
              $('#result-button').show(); // Show "Result" button
            }
          },
          error: function() {
            console.log('Error loading data');
          }
        });
      }

      // Initial load
      loadPaginatedData(currentPage);

      // "Next" button click event
      $('#next-button').click(function() {
        if (currentPage < totalPages) {
          loadPaginatedData(currentPage + 1);
        }
      });

      // "Previous" button click event
      $('#previous-button').click(function() {
        if (currentPage > 1) {
          loadPaginatedData(currentPage - 1);
        }
      });
    });
  </script>


  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>


</html>