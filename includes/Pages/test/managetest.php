<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

?>
<!DOCTYPE html>
<html>

<head>
  <title>Manage Test</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

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
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">
            <img style="height:30px; width:30px;" src="<?php echo BASE_URL; ?>assets/svg/percentage/manage.png">
            Manage Test
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
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <div class="card-body">
              <!-- Nav -->
              <div class="text-center">

                <ul class="nav nav-pills justify-content-center" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="examtab-tab" href="#examtab" data-bs-toggle="pill" data-bs-target="#examtab" role="tab" aria-controls="examtab" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Exam
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="examlist-tab" href="#examlist" data-bs-toggle="pill" data-bs-target="#examlist" role="tab" aria-controls="examlist" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Exam List
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/create_exam.php">
                      <div class="d-flex align-items-center" title="">
                        Create Exam <img src="<?php echo BASE_URL; ?>assets/svg/exam_type_icon/percentage3d.png" alt="Image Description" style="width:20px;height:20px">
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/test/create_test_manual.php">
                      <div class="d-flex align-items-center">
                        Create Exam <img src="<?php echo BASE_URL; ?>assets/svg/exam_type_icon/manual3d.png" alt="Image Description" style="width:18px;height:20px">
                      </div>
                    </a>
                  </li>
                </ul>
                <!-- End Nav -->

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


        <div class="tab-pane fade show active" id="examtab" role="tabpanel" aria-labelledby="examtab-tab">
          <?php include ROOT_PATH . 'includes/Pages/test/examtab.php'; ?>
        </div>

        <div class="tab-pane fade" id="examlist" role="tabpanel" aria-labelledby="examlist-tab">
          <?php include ROOT_PATH . 'includes/Pages/test/examlist.php'; ?>
        </div>

      </div>
      <!-- End Tab Content -->

    </div>

    <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>


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
      } else if (get_val == "dep") {
        $("#dep_fetch").show();
        $("#course").hide();
        $("#not_Ctp_test").show();
        $("#user_idded").hide();
        $("#Ctp_test").hide();
      } else {
        $("#user_idded").hide();
        $("#course").hide();
        $("#not_Ctp_test").show();
        $("#Ctp_test").hide();
        $("#dep_fetch").hide();
      }
    });

    $(document).ready(function() {
      // Initialize an empty array to store selected user IDs
      let selectedUserIds = [];

      // $("#username-input").on("keyup", function() {
        $(document).on("keyup", "#username-input", function() {
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
                  `<div class="suggestion-item" style="font-size:x-large;"><input style="height: 15px;width: 15px;margin: 5px;" type="checkbox" name="student[]" value="${user.id}" ${isChecked}>${user.nickname}</div>`
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
  </script>




  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>

</html>