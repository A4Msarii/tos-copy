<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$ctp = "";
if (isset($fixed_ctp_id)) {
  $_SESSION['type_ctp'] = $ctp = $fixed_ctp_id;
} else if (isset($_SESSION['type_ctp'])) {
  $ctp = $_SESSION['type_ctp'];
}
$sql = "DELETE FROM testcatfil";
$statement = $connect->prepare($sql);
$statement->execute();



$course_name_es = "";
$q61 = "SELECT * FROM newcourse group by CourseName,CourseCode";
$st61 = $connect->prepare($q61);
$st61->execute();

if ($st61->rowCount() > 0) {
  $re61 = $st61->fetchAll();
  foreach ($re61 as $row61) {
    $std_course10 = $row61['CourseName'];
    $get_course_name11 = $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
    $get_course_name11->execute([$std_course10]);
    $course_code1s = $get_course_name11->fetchColumn();
    $course_name_es .= '<option value="' . $row61['Courseid'] . '">' . $course_code1s . '- 0' . $row61['CourseCode'] . '</option>';
  }
}
$roles_values = "";
$query1 = "SELECT * FROM roles where roles!='super admin'";
$statement1 = $connect->prepare($query1);
$statement1->execute();

if ($statement1->rowCount() > 0) {
  $result1 = $statement1->fetchAll();
  $sn = 1;
  foreach ($result1 as $row1) {
    $roles_values .= "<option value=" . $row1['id'] . ">" . $row1['roles'] . "</option>";
  }
}


$dep_values = "";
$query_dep = "SELECT * FROM homepage";
$statement_dep = $connect->prepare($query_dep);
$statement_dep->execute();

if ($statement_dep->rowCount() > 0) {
  $result_dep = $statement_dep->fetchAll();
  foreach ($result_dep as $row_dep) {
    $dep_values .= "<option value=" . $row_dep['id'] . ">" . $row_dep['department_name'] . "</option>";
  }
}

$category_names11 = "";
$q6 = "SELECT * FROM test_course";
$st6 = $connect->prepare($q6);
$st6->execute();



if ($st6->rowCount() > 0) {
  $re6 = $st6->fetchAll();
  foreach ($re6 as $row6) {
    $course_name_value = $row6['course_name'];
    $category_names11 .= '<option value="' . $row6['id'] . '">' . $course_name_value . '</option>';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Vehicle</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
    #suggestions {
      width: 300px;
      margin: 10px auto;
      padding: 5px;
      background-color: #f0f0f0;
      border: 1px solid #ccc;
      display: none;
    }

    .suggestion-item {
      padding: 5px;
      cursor: pointer;
    }

    .suggestion-item:hover {
      background-color: #e0e0e0;
    }
  </style>
</head>

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
        <div class="page-header" style="padding: 0px; display:flex;">
          <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To Manage Test" style="color:black; text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/test/managetest.php" style="margin-bottom:5px;"><i class="bi bi-arrow-left"></i></a>
          <h1 class="text-success" style="margin:5px;">Create Exam</h1>
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
              <div class="text-center">
                <ul class="nav nav-segment nav-pills mb-7" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="form1tab-tab" href="#form1tab" data-bs-toggle="pill" data-bs-target="#form1tab" role="tab" aria-controls="form1tab" aria-selected="true">Step 1</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="form2tab-tab" href="#form2tab" data-bs-toggle="pill" data-bs-target="#form2tab" role="tab" aria-controls="form2tab" aria-selected="false">Step 2</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="form3tab-tab" href="#form3tab" data-bs-toggle="pill" data-bs-target="#form3tab" role="tab" aria-controls="form3tab" aria-selected="false">Step 3</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="form4tab-tab" href="#form4tab" data-bs-toggle="pill" data-bs-target="#form4tab" role="tab" aria-controls="form4tab" aria-selected="false">Step 4</a>
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


      <!-- Tab Content -->
      <div class="tab-content">

        <div class="tab-pane fade show active" id="form1tab" role="tabpanel" aria-labelledby="form1tab-tab">
           <?php include ROOT_PATH . 'includes/Pages/test/examform1.php'; ?>
        </div>

        <div class="tab-pane fade" id="form2tab" role="tabpanel" aria-labelledby="form2tab-tab">
          <?php include ROOT_PATH . 'includes/Pages/test/examform2.php'; ?>
        </div>

        <div class="tab-pane fade" id="form3tab" role="tabpanel" aria-labelledby="form3tab-tab">
          <?php include ROOT_PATH . 'includes/Pages/test/examform3.php'; ?>
        </div>

        <div class="tab-pane fade" id="form4tab" role="tabpanel" aria-labelledby="form4tab-tab">
          <?php include ROOT_PATH . 'includes/Pages/test/examform4.php'; ?>
        </div>

      </div>
      <!-- End Tab Content -->

      <div class="row justify-content-center d-none">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <div class="card-body">

            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>



    </div>

    <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".next-button").click(function() {
        // Get the current tab
        var currentTab = $(this).closest(".tab-pane");

        // Get the ID of the next tab
        var nextTabId = currentTab.next(".tab-pane").attr("id");

        // Switch to the next tab
        $('a[href="#' + nextTabId + '"]').tab('show');
      });

      $(".previous-button").click(function() {
        // Get the current tab
        var currentTab = $(this).closest(".tab-pane");

        // Get the ID of the previous tab
        var prevTabId = currentTab.prev(".tab-pane").attr("id");

        // Switch to the previous tab
        $('a[href="#' + prevTabId + '"]').tab('show');
      });
    });
  </script>

  <script>
    $(document).on("change", ".select_roles_test", function() {
      var get_val = $(this).val();
      if (get_val == "par") {
        $("#user_idded").show();
        $("#not_Ctp_test").show();
        $("#Ctp_test").hide();
        $("#course").hide();
        $("#dep_fetch").hide();
      } else if (get_val == "course") {
        $("#course").show();
        $("#not_Ctp_test").hide();
        $("#user_idded").hide();
        $("#Ctp_test").show();
        $("#dep_fetch").hide();
      }else if(get_val == "dep"){
        $("#dep_fetch").show();
        $("#course").hide();
        $("#not_Ctp_test").show();
        $("#user_idded").hide();
        $("#Ctp_test").hide();
      } else{
        $("#user_idded").hide();
        $("#course").hide();
        $("#not_Ctp_test").show();
        $("#Ctp_test").hide();
        $("#dep_fetch").hide();
      }
    });
    $(document).on("change", "#select_course_test", function() {
      var get_val1 = $(this).val();
      $.ajax({
        type: 'POST',
        url: 'fetch_course_Ctps.php',
        data: 'id=' + get_val1,
        success: function(html) {
          $('#fetch_tets_class').html(html);
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Initialize an empty array to store selected user IDs
      let selectedUserIds = [];

      $("#username-input").on("keyup", function() {
        let keyword = $(this).val();

        // Make an AJAX request to fetch username suggestions
        $.ajax({
          url: "fetch_user_info.php",
          method: "POST",
          data: {
            keyword: keyword
          },
          success: function(data) {
            // Parse the JSON response
            let suggestions = JSON.parse(data);

            // Clear and populate the suggestions box
            let suggestionsBox = $("#suggestions");
            suggestionsBox.empty();

            if (suggestions.length > 0) {
              suggestions.forEach(function(user) {
                let isChecked = selectedUserIds.includes(user.id) ? "checked" : "";
                suggestionsBox.append(
                  `<div class="suggestion-item"><input type="checkbox" name="student[]" value="${user.id}" ${isChecked}>${user.nickname}</div>`
                );
              });

              suggestionsBox.show();
            } else {
              suggestionsBox.hide();
            }
          },
        });
      });

      // Handle checkbox clicks
      $("#suggestions").on("click", ".suggestion-item input[type='checkbox']", function() {
        let selectedUserId = $(this).val();
        if ($(this).prop("checked")) {
          // Add the selected user ID to the array if it's checked
          selectedUserIds.push(selectedUserId);
        } else {
          // Remove the selected user ID from the array if it's unchecked
          selectedUserIds = selectedUserIds.filter(id => id !== selectedUserId);
        }
        console.log("Selected User IDs: " + selectedUserIds.join(", "));
      });
    });

    $("#select_marks_types").on("change", function() {
      var nu = $(this).val();
      if (nu == "manual") {
        $('.show_marks_div').show();
      } else {
        $('.show_marks_div').hide();
      }
    });
  </script>

<script>
  // $(".catSelect").on("click",function() {
  $("#table-field-multiplecate").on('mousedown', '.catSelect', function() {
    // console.log("clicked function");
    // filData();
    // alert("hello");
    const addUnCat = $(this).data("class");
    var option = $('<option>', {
      text: '--Select Category--',
      value: '',
      selected: true, // Add the 'selected' attribute
      // You can add more attributes here if needed
    });
    // alert(addUnCat);
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/test/fetchFilter.php',
      data: {
        chatId: 1,
      },
      success: function(response) {
        //  alert(response);
        $("." + addUnCat).empty();
        $("." + addUnCat).append(option);
        $("." + addUnCat).append(response);
      }
    });
  });

  // function filData() {
  //   
  // }

  // $(".catSelect").change(function() {
  $("#table-field-multiplecate").on('change', '.catSelect', function() {
    const catId = $(this).val();
    // console.log("change function")
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/test/fetchFilter.php',
      data: {
        catId: catId,
      },
      success: function(response) {
        // filData();
      }
    });
  })
</script>
<script>
  
 $(document).ready(function() {
            $('#categorySelect').change(function() {
              var selectedCategory = $('#categorySelect').val();
                if (selectedCategory !== "") {
                    // Check if the category is already present in the textbox
                    if ($('.categoryInput[value="' + selectedCategory + '"]').length === 0) {
                      $.ajax({
                          type: 'POST',
                          url: 'temp_cat.php',
                          data: 'id=' + selectedCategory,
                          success: function(response) {
                            // fetchValues();
                            window.location.reload();
                          }
                      });
                    //   function fetchValues() {
                    //       $.ajax({
                    //           type: "GET",
                    //           url: "fetch_temp.php", // PHP script for fetching data from the database
                    //           success: function(response) {
                    //               $("#multiplecate1").html(response);
                    //           }
                    //       });
                    //   }
                    //     // Initial data load
                    //     fetchValues();
                     }
                }
            });
        });
    </script>

    <script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
              <td style="width: 50%;">\
              <label style="font-weight:bold;" class="text-dark">Type</label>\
              <div class="form-outline mb-2">\
                        <select class="form-control text-dark" id="cat_dropdown1" name="examType[]" required>\
                          <option value="" disabled>select category</option>\
                          <?php echo  $category_names11; ?>
                        </select>\
                      </div>\
            </td>\
            <td style="width: 50%;">\
              <label style="font-weight:bold;" class="text-dark">Percenatage</label>\
              <div class="form-outline mb-2">\
                        <input type="number" name="examTypePer[]" placeholder="Percentage" class="form-control form-control-md marks-input typePer" min="0" max="100" value="0" oninput="checkInput(this)" required>\
                        <p class="error-message" style="color: red;"></p>\
                      </div>\
            </td>\
                <td>\
                  <button style="margin:30px;" type="button" name="remove_cate" id="remove_cate" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button>\
                </td>\
                      </tr>'
    var max = 100;
    var a = 1;

    $("#add_cate").click(function() {
      if (a <= max) {
        $("#table-field-multiplecate").append(html);
        a++;
      }
    });
    $("#table-field-multiplecate").on('click', '#remove_cate', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>

</html>