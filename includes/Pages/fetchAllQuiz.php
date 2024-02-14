<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    $course_Code = $_REQUEST['courseCode'];
    $course_Name = $_REQUEST['courseName'];
    $c_id = $_REQUEST['courseId'];
    $fetchuser_id = $_REQUEST['userId']; 

$percentageCLass = "SELECT * FROM `percentage` WHERE percentage > 0 ORDER BY CAST(percentage AS SIGNED) ASC";
$percentagestatement = $connect->prepare($percentageCLass);
$percentagestatement->execute();
$allpercentage = $percentagestatement->fetchAll();
$color = [];
foreach ($allpercentage as $cdt) {
  $color[] = $cdt['color'];
}
$colors = $color;

$data = [];
$qclass = "SELECT * FROM `quiz`  WHERE ctp='$std_course1'";
$classstatement = $connect->prepare($qclass);
$classstatement->execute();
foreach ($classstatement->fetchAll() as $class) {
  $test_id = $class['id'];
  // dynamic percentage
  $qpercentage = "SELECT * FROM `percentage` where percentage > 0 ORDER BY CAST(percentage AS SIGNED) ASC";
  $qperstatement = $connect->prepare($qpercentage);
  $qperstatement->execute();
  $total = 0;
  $percentagelist = $qperstatement->fetchAll();
  $arr = [];
  foreach ($percentagelist as $k => $qper) {
    if ($k > 0) {
      $from = $percentagelist[$k - 1]['percentage'] + 1;
    } else {
      $from = 0;
    }
    $to = $qper['percentage'];
    // data for A grade students
    $qmark = "SELECT td.*, u.nickname, u.file_name
          FROM `quiz_marks` AS td
          LEFT JOIN `users` AS u ON td.student_id = u.id
          LEFT JOIN `newcourse` AS nc ON u.id = nc.StudentNames
          WHERE td.marks BETWEEN " . $from . " AND " . $to . " 
          AND td.quiz_id = :quiz_id
          AND nc.CourseCode = '$course_Code'
          AND nc.CourseName = '$std_course1'";
    $markstatement = $connect->prepare($qmark);
    $markstatement->bindParam(':quiz_id', $test_id, PDO::PARAM_INT);
    $markstatement->execute();
    $letters = explode('-', $qper['percentagetype']);
    $firstletter = trim($letters[0]);
    $arr[] = $firstletter;
    $data[$class['quiz']][$firstletter]['students_list'] = $markstatement->fetchAll();
    $data[$class['quiz']][$firstletter]['total_marks'] = array_sum(array_column($data[$class['quiz']][$firstletter]['students_list'], 'marks'));
    $data[$class['quiz']][$firstletter]['students'] = $markstatement->rowCount();
    $total += $data[$class['quiz']][$firstletter]['students'];
  }


  //  percentage calculation
  $data[$class['quiz']]['total_student'] = $total;
  if ($data[$class['quiz']]['total_student'] != 0) {
    foreach ($arr as $a) {
      $data[$class['quiz']][$a]['students_percentage'] = ($data[$class['quiz']][$a]['students'] / $data[$class['quiz']]['total_student']) * 100;
    }
  } else {
    foreach ($arr as $a) {
      $data[$class['quiz']][$a]['students_percentage'] = 0;
    }
  }

  foreach ($arr as $a) {
    $data[$class['quiz']]['all_grade_percentage'][$a] = $data[$class['quiz']][$a]['students_percentage'];
  }
}
?>

<script>
  var chartWidth = 300;
  // Function to generate a pie chart for a class
  function generatePieChart(className, grade_marks, grades, classData, colors) {
    // console.log(classData);
    var chartOptions = {
      series: grade_marks, // Use the grade_marks data for the pie chart
      chart: {
        width: chartWidth,
        type: 'pie',
      },
      labels: grades, // Use student names for chart segments
      title: {
        text: className,
        align: 'center',
        style: {
          color: 'grey', // You can replace 'red' with the color you want
        },
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200,
          },
          legend: {
            position: 'bottom',
          },
        },
      }],
      tooltip: {
        enabled: true,
        custom: function({
          series,
          seriesIndex,
          dataPointIndex,
          w
        }) {
          var label = w.globals.labels[seriesIndex];
          var students = classData[label]['students_list']; // Get the student name
          console.warn(students);
          var tooltipHTML = `<div class="custom-tooltip row bg-white d-flex p-2">`;
          for (var l = 0; l < students.length; l++) {
            tooltipHTML += `<div class="col-auto">
                                <span class="text-dark"><img src="upload/${students[l]['file_name']}" alt="Student Image" width="30" height="30" style="border-radius:60px;"></span><br>
                                 <span class="text-dark m-1">${students[l]['nickname']}</span><br>
                                <span class="text-dark m-1">${students[l]['marks']}</span><br>
                            </div>`;
          }
          tooltipHTML += `</div>`;
          return tooltipHTML;
        },
      },
      colors: colors,
    };

    var chartContainer = document.createElement('div');
    chartContainer.classList.add('col-3');
    document.getElementById('quizChartContainer').appendChild(chartContainer);

    var chart = new ApexCharts(chartContainer, chartOptions);
    chart.render();
  }

  // Generate pie charts for each class in the data array
  <?php
  foreach ($data as $k => $dchart) {
    if (array_sum(array_values($dchart['all_grade_percentage'])) != 0) {
  ?>
      generatePieChart('<?php echo $k; ?>', <?php echo json_encode(array_values($dchart['all_grade_percentage'])); ?>, <?php echo json_encode(array_keys($dchart['all_grade_percentage'])); ?>, <?php echo json_encode($data[$k]); ?>, <?php echo json_encode($colors) ?>);
  <?php
    }
  }
}
  ?>
</script>