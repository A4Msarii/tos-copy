<?php
$std_course = "";
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Todo's Calendar</title>
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
  <?php include ROOT_PATH . 'includes/Pages/per_checklist/todoCalendar.php'; ?>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">
            <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Evaluation.png">
            Todo's Calendar
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
          <div class="card card-hover-shadow" id="" style="border:0.001rem solid #dddddd;">

            <!-- Body -->
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="response"></div>

                  <div class="calendar" id="full-calendar"></div>
                </div>
                <div class="col-3">
                  <?php
                  include ROOT_PATH . 'includes/Pages/per_checklist/event_list.php';
                  ?>
                </div>
              </div>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>

  <script>
    $(document).ready(function() {
      var calendar = null; // Initialize FullCalendar variable

      // Populate the year dropdown with years
      var currentYear = new Date().getFullYear();
      var yearDropdown = $('#year-dropdown');
      for (var i = currentYear - 5; i <= currentYear + 5; i++) {
        yearDropdown.append($('<option>', {
          value: i,
          text: i
        }));
      }

      // Event handler for year change
      yearDropdown.on('change', function() {
        var selectedYear = $(this).val();
        $('#calendar-title').text('Yearly Calendar for ' + selectedYear);

        // Update FullCalendar for the selected year
        if (calendar !== null) {
          calendar.gotoDate(selectedYear + '-01-01');
        } else {
          // Initialize a new FullCalendar for the selected year
          calendar = new FullCalendar.Calendar(document.getElementById('full-calendar'), {
            initialView: 'dayGridMonth',
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [ // You can provide events for the selected year here
              // Example: { title: 'Event 1', start: selectedYear + '-01-01' },
            ]
          });
        }

        // Render the updated calendar
        calendar.render();
      });

      // Initial FullCalendar setup
      calendar = new FullCalendar.Calendar(document.getElementById('full-calendar'), {
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [ // You can provide events for the initial year here
          // Example: { title: 'Event 1', start: currentYear + '-10-01' },
        ]
      });

      // Render the initial calendar
      calendar.render();
    });
  </script>


  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>