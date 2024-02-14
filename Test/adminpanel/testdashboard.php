<div class="row">
  <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="#">
      <div class="card-body">
        <h6 class="card-subtitle">Total Test</h6>

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-6">
            <?php
            $sql1211 = "SELECT count(`id`) FROM `examname`";
            $result1211 = $connect->prepare($sql1211);
            $result1211->execute();
            $student_count1211 = $result1211->fetchColumn();
            ?>
            <h2 class="card-title text-inherit"><?php echo $student_count1211; ?></h2>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->

      </div>
    </a>
    <!-- End Card -->
  </div>

  <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="#">
      <div class="card-body">
        <h6 class="card-subtitle">Total Users</h6>

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-6">
            <?php
            $sql12 = "SELECT count(`id`) FROM `users`";
            $result12 = $connect->prepare($sql12);
            $result12->execute();
            $student_count = $result12->fetchColumn();
            ?>
            <h2 class="card-title text-inherit"> <?php echo $student_count ?></h2>
          </div>
          <!-- End Col -->
        </div>
      </div>
    </a>
    <!-- End Card -->
  </div>
</div>

<div class="row justify-content-center">

  <div class="col-lg-12 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <div class="row">
          <div class="col-8">
            <input class="form-control" type="text" id="alltestsearch" onkeyup="testsearch()" placeholder="Search for Test name.." title="Type in a name">
          </div>
          <div class="col-4">
            <label for="monthFilterDashboard">Filter by Month:</label>
            <select id="monthFilterDashboard">
              <option value="all">All Months</option>
              <option value="01">January</option>
              <option value="02">February</option>
              <option value="03">March</option>
              <option value="04">April</option>
              <option value="05">May</option>
              <option value="06">June</option>
              <option value="07">July</option>
              <option value="08">August</option>
              <option value="09">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>

        </div>
        <div class="table-responsive">
          <table class="table table-borderless table-thead-bordered table-align-middle card-table table-hover" id="all-test-table">
            <thead class="thead-light">
              <tr>
                <th><span style="font-size:large; font-weight:bold;">Test name</span></th>
                <th><span style="font-size:large; font-weight:bold;">Examiners</span></th>
                <!-- <th>Spent</th>-->
                <th><span style="font-size:large; font-weight:bold;">Date</span></th>
                <th><span style="font-size:large; font-weight:bold;">Completion</span></th>
              </tr>
            </thead>

            <tbody>
              <?php
              $examNameData = '';
              $examNameData1 = '';
              $query7 = "SELECT * FROM examname order by id desc";
              $statement = $connect->prepare($query7);
              $statement->execute();

              if ($statement->rowCount() > 0) {
                $result = $statement->fetchAll();
                $sn = 1;
                foreach ($result as $row) {
                  $student_count = 0;
                  $exam_name = "";
                  $time24 = $row['start_hours'];
                  $time12 = convertTo12HourFormat($time24);
                  $inputDate = $row['dates'];
                  $exam_id = $row['id'];
                  $dep_id = $row['dep_id'];
                  $outputDate = convertDateFormat($inputDate);
                  if ($row['course_id'] == "") {
                    $exam_name = $row['examName'];
                  } else {
                    $exam_name1 = $row['examName'];
                    $fetch_exam_name = $connect->query("SELECT shorttest FROM test WHERE id = '$exam_name1'");
                    $exam_name = $fetch_exam_name->fetchColumn();
                  }
                  $examFor = $row['examFor'];

                  if ($examFor == "course") {
                    $className = "course";
                    $coursed_ided = $row['course_id'];
                    $sql = "SELECT CourseName, CourseCode FROM newcourse WHERE Courseid = :course_id";
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':course_id', $coursed_ided, PDO::PARAM_INT);
                    $stmt->execute();
                    $result1333 = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($result1333) {
                      $CourseNamess = $result1333['CourseName'];
                      $CourseCodess = $result1333['CourseCode'];
                    }
                    $student_count = $connect->query("SELECT count(`StudentNames`) from newcourse WHERE CourseName ='$CourseNamess' and CourseCode='$CourseCodess'")->fetchColumn();
                    $ctpnames1 = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '$CourseNamess'");
                    $ctpnames11 = $ctpnames1->fetchColumn();
                    $examNameData = $ctpnames11 . ' - ' . $CourseCodess;
                    $queryss = "SELECT StudentNames as student_name FROM `newcourse` WHERE CourseName ='$CourseNamess' and CourseCode='$CourseCodess'";
                  } else if ($examFor == "par") {
                    $className = "particular";
                    $student_count = $connect->query("SELECT count(`examSubject`) from studentexam WHERE examId='$exam_id'")->fetchColumn();
                    $queryss = "SELECT examSubject as student_name FROM `studentexam` WHERE examId ='$exam_id'";
                  } else if ($examFor == "dep") {
                    $className = "department";
                    $student_count = $connect->query("SELECT count(`userId`) from userdepartment WHERE departmentId='$dep_id'")->fetchColumn();
                    $examName = $connect->query("SELECT department_name FROM homepage WHERE id = '$dep_id'");
                    $examNameData = $examName->fetchColumn();
                    $queryss = "SELECT userId as student_name FROM `userdepartment` WHERE departmentId ='$dep_id'";
                  } else if ($examFor == "everyone") {
                    $className = "everyone";
                    $student_count = $connect->query("SELECT count(`id`) FROM `users` WHERE `role`!='super admin'")->fetchColumn();
                    $examNameData = "Everyone";
                    $queryss = "SELECT id as student_name FROM `users` WHERE `role`!='super admin'";
                  } else {
                    $className = "role";
                    $examName = $connect->query("SELECT roles FROM roles WHERE id = '$examFor'");
                    $examNameData = $examName->fetchColumn();
                    $student_count = $connect->query("SELECT count(`id`) FROM `users` WHERE `role`='$examNameData'")->fetchColumn();
                    $queryss = "SELECT id as student_name FROM `users` WHERE `role`='$examNameData'";
                  }
                  $resultss = $connect->query($queryss);
              ?>
                  <tr>
                    <td>
                      <a class="d-flex align-items-center" href="<?php echo BASE_URL; ?>Test/adminpanel/testdetails.php?ex_id=<?php echo $row['id']; ?>&type=<?php echo $row['exam_Types'] ?>">
                        <div class="flex-shrink-0">
                          <!-- <img class="avatar avatar-sm" src="./assets/svg/brands/spec-icon.svg" alt="Image Description"> -->
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <span class="d-block h5 text-inherit mb-0"><?php echo $exam_name; ?></span>
                        </div>
                      </a>
                    </td>
                    <td>
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <div class="avatar-group mb-1">
                          <?php
                          $countStu = 0;
                          while ($rowss = $resultss->fetch()) {
                            $countStu++;
                            if ($countStu > 2) {
                              continue;
                            }
                            $u_ides_da = $rowss['student_name'];
                            $fetchInsDetail = $connect->query("SELECT nickname,file_name FROM users WHERE id = '$u_ides_da'");
                            $instDData =    $fetchInsDetail->fetch();
                            $prof_pic11 = $instDData['file_name'];
                            // echo $instDData['nickname'];
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

                            <!-- Avatar Group -->
                            <!-- <div class="avatar-group avatar-group-lg mb-1">
                              <span class="avatar avatar-circle" title="<?php echo $instDData['nickname']; ?>">
                                <img class="avatar-img" src="<?php echo $img; ?>" alt="Image Description" /> </span>
                            </div> -->

                            
    <!-- Avatar Group -->
    <!-- <div class="avatar-group mb-1"> -->
      <span class="avatar avatar-circle" title="<?php echo $instDData['nickname']; ?>">
         <img class="avatar-img" src="<?php echo $img; ?>" alt="Image Description" />
      </span>
      <?php

                          }
                          // echo "</div>";
                          $countStu = $countStu - 2;
                          ?>
      <span class="avatar avatar-primary avatar-circle  <?php echo $className; ?>" data-coursecode="<?php echo $CourseNamess; ?>" data-coursename="<?php echo $CourseNamess; ?>" data-role="<?php echo $examNameData; ?>" data-examid="<?php echo $exam_id; ?>" data-depid="<?php echo $dep_id; ?>" data-bs-target="#phaseInstModal" data-bs-toggle="modal">
        <span class="avatar-initials">
                              <?php

                              echo $countStu;
                              ?>
                              +
                            </span>
      </span>
    <!-- </div> -->
    <!-- End Avatar Group -->
  
                          

                    </td>
                    <td>
                      <span><?php echo $outputDate . " , " . $time12; ?></span>
                    </td>
                    <td>
                      <?php
                      if ($row['exam_Types'] == "once") {
                        $sql121 = "SELECT count(`id`) FROM `test_updates` WHERE `exam_id`='$exam_id' and status_end='1'";
                      } else {
                        $sql121 = "SELECT count(`id`) FROM `test_updates` WHERE `exam_id`='$exam_id' and exam_status='pass' group by exam_id";
                      }
                      $result121 = $connect->prepare($sql121);
                      $result121->execute();
                      $student_count121 = $result121->fetchColumn();
                      if ($student_count != 0) {
                        $perctange_r = $student_count121 / $student_count * 100;
                        $perctange_round = round($perctange_r, 2);
                      } else {
                        $perctange_round = 0;
                      }
                      ?>
                      <div class="d-flex align-items-center">
                        <span class="mb-0 me-2"><?php echo $perctange_round; ?>%</span>
                        <div class="progress table-progress">
                          <div class="progress-bar" role="progressbar" style="width:<?php echo $perctange_round; ?>%" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <!-- End Card -->
  </div>
</div>

</div>

<div id="phaseInstModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Manage Users</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="examAllStu">

        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<?php
function convertTo12HourFormat($time24)
{
  // Create a DateTime object from the 24-hour format time
  $dateTime = DateTime::createFromFormat('H:i', $time24);

  // Format the DateTime object in 12-hour format with 'am' or 'pm'
  $time12 = $dateTime->format('h:i a');

  return $time12;
}
function convertDateFormat($inputDate)
{
  $date = new DateTime($inputDate);
  return $date->format('j F, Y');
}
?>


<script>
  function testsearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("alltestsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("all-test-table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
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

<!-- <script>
    $(document).on('ready', function () {
      // INITIALIZATION OF DATERANGEPICKER
      // =======================================================
      $('.js-daterangepicker').daterangepicker();

      $('.js-daterangepicker-times').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'M/DD hh:mm A'
        }
      });

      var start = moment();
      var end = moment();

      function cb(start, end) {
        $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
      }

      $('#js-daterangepicker-predefined').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);

      cb(start, end);
    });


    // INITIALIZATION OF DATATABLES
    // =======================================================
    HSCore.components.HSDatatables.init($('#datatable'), {
      select: {
        style: 'multi',
        selector: 'td:first-child input[type="checkbox"]',
        classMap: {
          checkAll: '#datatableCheckAll',
          counter: '#datatableCounter',
          counterInfo: '#datatableCounterInfo'
        }
      },
      language: {
        zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
      }
    });

    const datatable = HSCore.components.HSDatatables.getItem(0)

    document.querySelectorAll('.js-datatable-filter').forEach(function (item) {
      item.addEventListener('change',function(e) {
        const elVal = e.target.value,
    targetColumnIndex = e.target.getAttribute('data-target-column-index'),
    targetTable = e.target.getAttribute('data-target-table');

    HSCore.components.HSDatatables.getItem(targetTable).column(targetColumnIndex).search(elVal !== 'null' ? elVal : '').draw()
      })
    })
  </script> -->

<!-- <script>
    (function() {
      window.onload = function () {
        

        // INITIALIZATION OF NAVBAR VERTICAL ASIDE
        // =======================================================
        new HSSideNav('.js-navbar-vertical-aside').init()


        // INITIALIZATION OF FORM SEARCH
        // =======================================================
        const HSFormSearchInstance = new HSFormSearch('.js-form-search')

        if (HSFormSearchInstance.collection.length) {
          HSFormSearchInstance.getItem(1).on('close', function (el) {
            el.classList.remove('top-0')
          })

          document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
            let dataOptions = JSON.parse(e.currentTarget.getAttribute('data-hs-form-search-options')),
              $menu = document.querySelector(dataOptions.dropMenuElement)

            $menu.classList.add('top-0')
            $menu.style.left = 0
          })
        }


        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()


        // INITIALIZATION OF CHARTJS
        // =======================================================
        Chart.plugins.unregister(ChartDataLabels);
        HSCore.components.HSChartJS.init('.js-chart')


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('#updatingBarChart')
        const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart')

        // Call when tab is clicked
        document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
          item.addEventListener('click', e => {
            let keyDataset = e.currentTarget.getAttribute('data-datasets')

            const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart', HSThemeAppearance.getAppearance())

            if (keyDataset === 'lastWeek') {
              updatingBarChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25", "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"];
              updatingBarChart.data.datasets = [
                {
                  "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                  "backgroundColor": styles.data.datasets[0].backgroundColor,
                  "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                  "borderColor": styles.data.datasets[0].borderColor
                },
                {
                  "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
                  "backgroundColor": styles.data.datasets[1].backgroundColor,
                  "borderColor": styles.data.datasets[1].borderColor
                }
              ];
              updatingBarChart.update();
            } else {
              updatingBarChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"];
              updatingBarChart.data.datasets = [
                {
                  "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                  "backgroundColor": styles.data.datasets[0].backgroundColor,
                  "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                  "borderColor": styles.data.datasets[0].borderColor
                },
                {
                  "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                  "backgroundColor": styles.data.datasets[1].backgroundColor,
                  "borderColor": styles.data.datasets[1].borderColor
                }
              ]
              updatingBarChart.update();
            }
          })
        })


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('.js-chart-datalabels', {
          plugins: [ChartDataLabels],
          options: {
            plugins: {
              datalabels: {
                anchor: function (context) {
                  var value = context.dataset.data[context.dataIndex];
                  return value.r < 20 ? 'end' : 'center';
                },
                align: function (context) {
                  var value = context.dataset.data[context.dataIndex];
                  return value.r < 20 ? 'end' : 'center';
                },
                color: function (context) {
                  var value = context.dataset.data[context.dataIndex];
                  return value.r < 20 ? context.dataset.backgroundColor : context.dataset.color;
                },
                font: function (context) {
                  var value = context.dataset.data[context.dataIndex],
                    fontSize = 25;

                  if (value.r > 50) {
                    fontSize = 35;
                  }

                  if (value.r > 70) {
                    fontSize = 55;
                  }

                  return {
                    weight: 'lighter',
                    size: fontSize
                  };
                },
                offset: 2,
                padding: 0
              }
            }
          }
        })

        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select')


        // INITIALIZATION OF CLIPBOARD
        // =======================================================
        HSCore.components.HSClipboard.init('.js-clipboard')
      }
    })()
  </script> -->

<script>
  function filterTableByMonth() {
    var selectedMonth = document.getElementById("monthFilterDashboard").value;
    var table = document.getElementById("all-test-table");
    var rows = table.getElementsByTagName("tr");

    for (var i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
      var row = rows[i];
      var dateCell = row.cells[2]; // Adjust the index to match the column where the date is displayed

      if (dateCell) {
        var date = dateCell.textContent.trim();
        var rowMonth = date.match(/(\d{2})\s(\w+)/)[2]; // Extract the month from the date

        if (selectedMonth === "all" || rowMonth === selectedMonth) {
          row.style.display = "table-row";
        } else {
          row.style.display = "none";
        }
      }
    }
  }

  document.getElementById("monthFilterDashboard").addEventListener("change", filterTableByMonth);
</script>

<script>
  $(".role").on("click", function() {
    var role = $(this).data("role");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>test/adminpanel/fetchExamStuDetail.php',
      data: {
        roleVal: role,
        role:"role"
      },
      success: function(response) {
        $("#examAllStu").empty();
        $("#examAllStu").html(response);
      }
    });
  });

  $(".department").on("click", function() {
    var depId = $(this).data("depid");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>test/adminpanel/fetchExamStuDetail.php',
      data: {
        depId: depId,
        department:"department"
      },
      success: function(response) {
        $("#examAllStu").empty();
        $("#examAllStu").html(response);
      }
    });
  });

  $(".particular").on("click", function() {
    var examId = $(this).data("examid");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>test/adminpanel/fetchExamStuDetail.php',
      data: {
        examId: examId,
        particular:"particular"
      },
      success: function(response) {
        $("#examAllStu").empty();
        $("#examAllStu").html(response);
      }
    });
  });

  $(".course").on("click", function() {
    var coursecode = $(this).data("coursecode");
    var coursename = $(this).data("coursename");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>test/adminpanel/fetchExamStuDetail.php',
      data: {
        coursecode: coursecode,
        coursename: coursename,
        course:"course"
      },
      success: function(response) {
        $("#examAllStu").empty();
        $("#examAllStu").html(response);
      }
    });
  });
  

  $(".everyone").on("click", function() {
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>test/adminpanel/fetchExamStuDetail.php',
      data: {
        everyone:"everyone"
      },
      success: function(response) {
        $("#examAllStu").empty();
        $("#examAllStu").html(response);
      }
    });
  });
</script>