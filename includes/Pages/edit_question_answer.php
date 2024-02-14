<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$category_name_id = $_REQUEST['id'];
                $cate_name = $connect->prepare("SELECT course_name FROM test_course WHERE id=?");
                $cate_name->execute([$category_name_id]);
                $name2 = $cate_name->fetchColumn();
$document10 = "";
$query2 = "SELECT * FROM document_test ORDER BY id ASC";
$statement2 = $connect->prepare($query2);
$statement2->execute();

if ($statement2->rowCount() > 0) {
    $result2 = $statement2->fetchAll();
    $sn = 1;
    foreach ($result2 as $row2) {
        $document10 .= '<option name="document" value="' . $row2['file_name'] . '">' . $row2['title'] . '</option>';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Questions List</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>
<style type="text/css">
    /* Add a class for the colored circles */
  .circle {
    width: 10px;
    height: 10px;
    display: inline-block;
    border-radius: 50%;
    margin-right: 5px;
  }

  /* Define colors for each difficulty level */
  .easy-circle {
    background-color: yellow;
  }

  .medium-circle {
    background-color: green;
  }

  .hard-circle {
    background-color: blue;
  }

  .veryhard-circle {
    background-color: red;
  }
</style>
<body>
  <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
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
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="display: flex;">
          <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back" style="color:black; text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/mutliple_fetching.php"><i class="bi bi-arrow-left"></i></a>
          <h1 class="text-success" style="margin:5px;"><?php echo $name2; ?></h1>
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
              <div class="row">
                <div class="col-7">
                  <input style="margin:5px;" class="form-control" type="text" id="searchAllQuestion" onkeyup="searchAllQuestion()" placeholder="Search Questions">
                </div>
                <div class="col-5" style="display:flex;float: right;">
                  <select id="typeFilter" onchange="handleFilterChange()" style="margin:2px;border-radius: 10px;height: 40px;">
                    <option value="all">Filter By Difficulty</option>
                    <option value="easy"><span class="circle easy-circle"></span>Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                    <option value="veryhard">Very Hard</option>
                  </select>
                  <select id="categoryFilter" onchange="handleFilterChange()" style="margin:2px;border-radius: 10px;height: 40px;">
                    <option value="all">Filter By Type</option>
                    <option value="mcq">MCQ</option>
                    <option value="true_false">True and False</option>
                    <option value="diagram">Diagram</option>
                  </select>
                  <select id="documentFilter" onchange="handleFilterChange()" style="margin:2px;border-radius: 10px;height: 40px;" name="role">
                    <option value="all">Filter By Document</option>
                    <?php echo $document10; ?>
                  </select>
                  <br>
                </div>
              </div>
              <div style="float:left;">
                    <ul class="list-inline" style="margin-top: 10px;margin-bottom: -10px;">
                      <li class="list-inline-item d-inline-flex align-items-center">
                        <span class="legend-indicator" style="background-color:#00c9a7;width: 15px;height: 15px;"></span><span style="font-size:large;">MCQ</span>
                      </li>
                      <li class="list-inline-item d-inline-flex align-items-center">
                        <span class="legend-indicator" style="background-color:violet;width: 15px;height: 15px;"></span><span style="font-size:large;">True/False</span>
                      </li>
                      <li class="list-inline-item d-inline-flex align-items-center">
                        <span class="legend-indicator" style="background-color:orange;width: 15px;height: 15px;"></span><span style="font-size:large;">Diagram</span>
                      </li>
                    </ul>
                  </div>

              <!-- End Nav -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <div class="card-body">
              <!-- <div class="tab-content">
                <div class="tab-pane fade show active" id="mcqshow" role="tabpanel" aria-labelledby="mcqshow-tab"> -->
                  <?php include ROOT_PATH . 'includes/Pages/test/mcq.php'; ?>  
                </div> 
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>

          <!-- End Card -->
        </div>
      </div>
    </div>
    <!-- End Content -->

  </main>




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
function filterByAll() {
  var selectedType = document.getElementById("typeFilter").value;
  var selectedCategory = document.getElementById("categoryFilter").value;
  var selectedDocument = document.getElementById("documentFilter").value;

  var accordionItems = document.querySelectorAll(".question-accordian");

  for (var i = 0; i < accordionItems.length; i++) {
    var difficultyBadge = accordionItems[i].querySelector(".badge.difficulty:nth-child(2)").textContent.toLowerCase();
    var categoryBadge = accordionItems[i].querySelector(".badge.type:nth-child(1)").textContent.toLowerCase();
    var documentValue = accordionItems[i].getAttribute("data-document"); // Add a data-document attribute to your HTML with the document value.

    var difficultyMatch = selectedType === "all" || difficultyBadge.includes(selectedType);
    var categoryMatch = selectedCategory === "all" || categoryBadge.includes(selectedCategory);
    var documentMatch = selectedDocument === "all" || documentValue.includes(selectedDocument);

    if (difficultyMatch && categoryMatch && documentMatch) {
      accordionItems[i].style.display = "";
    } else {
      accordionItems[i].style.display = "none";
    }
  }
}

// Call this function when any of the filters change
function handleFilterChange() {
  filterByAll();
}

</script>



<script>
function searchAllQuestion() {
  // Get the search input value
  var input = document.getElementById("searchAllQuestion");
  var filter = input.value.toLowerCase();

  // Get all accordion items
  var accordionItems = document.querySelectorAll(".question-accordian");

  // Loop through each accordion item and check if it matches the search query
  for (var i = 0; i < accordionItems.length; i++) {
    var questionText = accordionItems[i].querySelector(".buttontype").textContent.toLowerCase();

    // Check if the question text contains the search query
    if (questionText.indexOf(filter) > -1) {
      accordionItems[i].style.display = "";
    } else {
      accordionItems[i].style.display = "none";
    }
  }
}
</script>


  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>


</body>

</html>