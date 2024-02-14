<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/github_contribution.js"></script>
<link href="css/github_contribution_graph.css" media="all" rel="stylesheet" />
<style>
  text#SvgjsText3087 {
    display: none;
  }

  .seperate {
    height: 20px;
  }
</style>
<!--All graph-->
<div class="row">

  <div class="col-lg-12 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle text-success">Main</h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-2">
          <div class="col-12">
            <div id="chart" style="height: 300px; width: 100%;"></div>
          </div>
        </div>
        <!-- End Col -->
      </div>

    </div>
  </div>
  <!-- End Card -->
</div>

<div class="row">

  <div class="col-lg-12 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle text-success">HeatMap</h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-2">
          <div class="col-12">
            <div class="container">

              <?php

              $query_heatmap = "SELECT * FROM phase where ctp='$std_course1'";
              $statement_heatmap = $connect->prepare($query_heatmap);
              $statement_heatmap->execute();
              $result_heatmap = $statement_heatmap->fetchAll();
              foreach ($result_heatmap as $row_heatmap) {
                $ph_id = $row_heatmap['id'];
                $ph_co = $row_heatmap['color'];
                $var10 = $connect->query("SELECT
                    (SELECT COUNT(*) FROM actual 
                     WHERE phase='$ph_id') +
                    (SELECT COUNT(*) FROM sim 
                     WHERE phase='$ph_id') AS total_count");
                $var_data10 = $var10->fetchColumn();
                if ($var_data10 > 0) {
              ?>
                  <div class="row mb-2" style="margin: 0px !important; padding:0px !important;">
                    <div class="col-1 m-1">
                      <?php echo '<span style="font-weight: bold;color:' . $ph_co . '">' . $row_heatmap['phasename'] . '</span>'; ?>
                    </div>
                    <?php

                    $query_heatmap_cl = "SELECT id,symbol as clas_sym,'actual' as table_name FROM actual WHERE ctp = '$std_course1' and phase='$ph_id'
                          UNION
                          SELECT id,shortsim as clas_sym,'sim' as table_name FROM sim WHERE ctp = '$std_course1' and phase='$ph_id'";
                    $statement_heatmap_cl = $connect->prepare($query_heatmap_cl);
                    $statement_heatmap_cl->execute();
                    $result_heatmap_cl = $statement_heatmap_cl->fetchAll();


                    foreach ($result_heatmap_cl as $row_heatmap_cl) {
                      $cl_ides = $row_heatmap_cl['id'];
                      $cl_names = $row_heatmap_cl['table_name'];
                      $itemArrU = array();
                      $itemIndexU = 0;
                      $itemArrF = array();
                      $itemIndexF = 0;
                      $allnotitem = "SELECT * FROM item WHERE course_id='$std_course1' AND class_id='$cl_ides' AND phase_id='$ph_id' AND class='$cl_names'";

                      $statementallnotitem = $connect->prepare($allnotitem);
                      $statementallnotitem->execute();
                      $var1 = $connect->query("SELECT COUNT(*) FROM item 
                           WHERE course_id='$std_course1' 
                             AND class_id='$cl_ides' 
                             AND phase_id='$ph_id' 
                             AND class='$cl_names'");
                      $var_data = $var1->fetchColumn();
                      $var = 0;
                      $var3 = 0;
                      $var4 = 0;
                      $number_of_rows111 = "";
                      $number_of_rows112 = "";
                      if ($statementallnotitem->rowCount() > 0) {
                        $resultallnotitem = $statementallnotitem->fetchAll();
                        foreach ($resultallnotitem as $rowallnotitem) {
                          $grade = "";
                          $item_id_s = $rowallnotitem['id'];
                          $sql51 = "SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$fetchuser_id' AND (grade='U' OR grade='F')";
                          $result51 = $connect->prepare($sql51);
                          $result51->execute();
                          $number_of_rows11 = $result51->fetchColumn();
                          $var = $var + $number_of_rows11;
                          $sql511 = "SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$fetchuser_id' and grade='U'";
                          $result511 = $connect->prepare($sql511);
                          $result511->execute();
                          $number_of_rows111 = $result511->fetchColumn();
                          if ($number_of_rows111 > 0) {
                            $subIdQU = $connect->query("SELECT item FROM item WHERE id = '$item_id_s'");
                            $subIdDataU = $subIdQU->fetchColumn();
                            $subNameQU = $connect->query("SELECT item FROM itembank WHERE id = '$subIdDataU'");
                            $subNameDataU = $subNameQU->fetchColumn();
                            if (!in_array($subNameDataU, $itemArrU)) {
                              $itemArrU[$itemIndexU] = $subNameDataU;
                              $itemIndexU++;
                            }
                          }
                          $var3 = $var3 + $number_of_rows111;
                          $sql512 = "SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$fetchuser_id' AND grade='F'";
                          $result512 = $connect->prepare($sql512);
                          $result512->execute();
                          $number_of_rows112 = $result512->fetchColumn();
                          if ($number_of_rows112 > 0) {
                            $subIdQF = $connect->query("SELECT item FROM item WHERE id = '$item_id_s'");
                            $subIdDataF = $subIdQF->fetchColumn();
                            $subNameQF = $connect->query("SELECT item FROM itembank WHERE id = '$subIdDataF'");
                            $subNameDataF = $subNameQF->fetchColumn();
                            if (!in_array($subNameDataF, $itemArrF)) {
                              $itemArrF[$itemIndexF] = $subNameDataF;
                              $itemIndexF++;
                            }
                          }
                          $var4 = $var4 + $number_of_rows112;
                        }
                      }
                      $subItemArrU = array();
                      $subItemIndexU = 0;
                      $subItemArrF = array();
                      $subItemIndexF = 0;
                      $allnotitem = "SELECT * FROM subitem WHERE course_id = '$std_course1' AND class_id = '$cl_ides' AND phase_id = '$ph_id' AND class = '$cl_names'";
                      $statementallnotitem = $connect->prepare($allnotitem);
                      $statementallnotitem->execute();
                      $var1 = $connect->query("SELECT COUNT(*) FROM subitem WHERE course_id = '$std_course1' AND class_id = '$cl_ides' AND phase_id = '$ph_id' AND class = '$cl_names'");
                      $var_data = $var1->fetchColumn();
                      $number_of_rows111 = "";
                      $number_of_rows112 = "";
                      if ($statementallnotitem->rowCount() > 0) {
                        $resultallnotitem = $statementallnotitem->fetchAll();
                        foreach ($resultallnotitem as $rowallnotitem) {
                          $grade = "";
                          $item_id_s = $rowallnotitem['id'];
                          $sql51 = "SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$item_id_s' AND user_id='$fetchuser_id' AND (grade='U' OR grade='F')";
                          $result51 = $connect->prepare($sql51);
                          $result51->execute();
                          $number_of_rows11 = $result51->fetchColumn();
                          $var = $var + $number_of_rows11;
                          $sql511 = "SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$item_id_s' AND user_id='$fetchuser_id' AND grade='U'";
                          $result511 = $connect->prepare($sql511);
                          $result511->execute();
                          $number_of_rows111 = $result511->fetchColumn();
                          if ($number_of_rows111 > 0) {
                            $subIdQU = $connect->query("SELECT subitem FROM subitem WHERE id = '$item_id_s'");
                            $subIdDataU = $subIdQU->fetchColumn();
                            $subNameQU = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subIdDataU'");
                            $subNameDataU = $subNameQU->fetchColumn();
                            if (!in_array($subNameDataU, $subItemArrU)) {
                              $subItemArrU[$subItemIndexU] = $subNameDataU;
                              $subItemIndexU++;
                            }
                          }
                          $var3 = $var3 + $number_of_rows111;
                          $sql512 = "SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$item_id_s' AND user_id='$fetchuser_id' AND grade='F'";
                          $result512 = $connect->prepare($sql512);
                          $result512->execute();
                          $number_of_rows112 = $result512->fetchColumn();

                          if ($number_of_rows112 > 0) {
                            $subIdQF = $connect->query("SELECT subitem FROM subitem WHERE id = '$item_id_s'");
                            $subIdDataF = $subIdQF->fetchColumn();
                            $subNameQF = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subIdDataF'");
                            $subNameDataF = $subNameQF->fetchColumn();
                            if (!in_array($subNameDataF, $subItemArrF)) {
                              $subItemArrF[$subItemIndexF] = $subNameDataF;
                              $subItemIndexF++;
                            }
                          }
                          $var4 = $var4 + $number_of_rows112;
                        }
                      }

                      $fetch_grade = $connect->prepare("SELECT over_all_grade FROM `gradesheet` WHERE course_id='$std_course1' AND class_id='$cl_ides' AND phase_id='$ph_id' AND class='$cl_names' and user_id='$fetchuser_id'");

                      $fetch_grade->execute();
                      $grade = $fetch_grade->fetchColumn();
                      $Percentage = 0;
                      $css = "background-color:#eeeeee;";
                      if ($var4 <= 2 && $var4 != 0) {
                        $css = "background-color:#d6e685;";
                      }
                      if ($var3 == 1 || $var4 >= 3 && $var4 <= 4) {
                        $css = "background-color:#8cc665;";
                      }
                      if ($var3 == 2 || $var4 >= 5 && $var4 <= 7) {
                        $css = "background-color:#44a340;";
                      }
                      if ($var3 == 3 || $var4 >= 7 && $var4 <= 9) {
                        $css = "background-color:#276b37;";
                      }
                      if ($var3 >= 4 || $var4 >= 9) {
                        $css = "background-color:#0a3608;";
                      }
                      if ($grade == 'U') {
                        $css = "background-color:#ff0000;";
                      }
                      if ($grade == 'F') {
                        $css = "background-color:#ffdb1b;";
                      }

                    ?>
                      <div class="col-11" style="<?php echo $css; ?> padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="class:<?php echo $row_heatmap_cl['clas_sym']; ?>,U:<?php echo $var3 ?>

                      <?php $name = 0; while($name < count($itemArrU)){
                        echo $itemArrU[$name];
                        $name++;
                      } ?>
                      <?php $name = 0; while($name < count($itemArrF)){
                        echo $itemArrF[$name];
                        $name++;
                      } ?>
                      ,F:<?php echo $var4 ?>
                      <?php $name = 0; while($name < count($subItemArrU)){
                        echo $subItemArrU[$name];
                        $name++;
                      } ?>
                      <?php $name = 0; while($name < count($subItemArrF)){
                        echo $subItemArrF[$name];
                        $name++;
                      } ?>
                      ,Total items:<?php echo $var ?>">
                        <?php echo "" ?>
                      </div>


                    <?php
                    }
                    ?>
                  </div>
              <?php
                }
              }
              ?>
            </div>
          </div>
          Less<div class="col-11" style="background-color:#eeeeee;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="0%">
            <?php echo "" ?></div>
          <div class="col-11" style="background-color:#d6e685;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="25%">
            <?php echo "" ?></div>
          <div class="col-11" style="background-color:#8cc665;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="50%">
            <?php echo "" ?></div>
          <div class="col-11" style="background-color:#44a340;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="75%">
            <?php echo "" ?></div>
          <div class="col-11" style="background-color:#276b37;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="100%">
            <?php echo "" ?></div>
          <div class="col-11" style="background-color:#0a3608;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="more than 100%">
            <?php echo "" ?></div>
          <div class="col-11" style="background-color:#ff0000;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="U overall">
            <?php echo "" ?></div>
          <div class="col-11" style="background-color:#ffdb1b;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="F overall">
            <?php echo "" ?></div>More
          <!-- <div id="github_chart_1"></div>
            <div class="seperate"></div> -->
        </div>
        <!-- End Col -->
      </div>

    </div>
  </div>
  <!-- End Card -->
</div>

<!--first row end-->

<!--sepearte graph-->
<div class="row">
  <div class="col-sm-6 mb-3">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle text-success"><a class="text-success" href="">Actual</a></h1>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col-12">
            <div id="Actual" style="height: 200px; width: 100%;"></div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>

  <div class="col-sm-6 mb-3">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle"><a href="" class="text-success">Sim</a></h1>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <div class="col">
            <div id="Sim" style="height: 200px; width: 100%;"></div>
          </div>
          <!-- End Col -->

        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>

</div>
<!-- End Stats -->


<!--sepearte graph 2-->
<div class="row">
  <div class="col-sm-6 mb-3">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle text-success"><a class="text-success" href="">Academic</a></h1>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col">
            <div id="Academic" style="height: 200px; width: 100%;"></div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>

  <div class="col-sm-6 mb-3">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle"><a href="" class="text-success">Test</a></h1>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <div class="col">
            <div id="Test" style="height: 200px; width: 100%;"></div>
          </div>
          <!-- End Col -->

        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>

</div>
<!-- End Stats -->


<!-- scripts for graph  -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/dist/apexcharts.min.js"></script>
<script>
  $(document).ready(function() {
    let classData, actualgraph, simgraph, academicgraph, testgraph;
    const ctpId = <?php echo $std_course1 ?>;
    const user_id = <?php echo $fetchuser_id ?>;
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
      data: {
        actual: ctpId,
        user_id: user_id,
      },
      success: function(response) {
        var parsedResponse = JSON.parse(response); // Parse the JSON
        var labels = parsedResponse.labels; // Access the labels array
        var allactualGradesheetData = parsedResponse.allactualGradesheetData; // Access the otherData

        // Define a color for the line
        var dotColor = 'red';
        var defaultDotSize = 6;
        var hoverDotSize = 8;

        var options = {
          series: [{
            name: "Percentage",
            data: allactualGradesheetData
          }],
          chart: {
            height: 350,
            type: 'line',
            zoom: {
              enabled: false
            }
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth',
            dotColor: dotColor // Specify the line color here
          },
          markers: {
            size: defaultDotSize, // Specify the default dot size
            hover: {
              size: hoverDotSize // Specify the hover dot size
            },
            colors: [dotColor] // Specify the line color for the data points as well
          },
          title: {
            text: '',
            align: 'left'
          },
          grid: {
            row: {
              colors: ['#f3f3f3', 'transparent'],
              opacity: 0.5
            },
          },
          yaxis: {
            categories: allactualGradesheetData,
          },
          xaxis: {
            categories: labels,
          }
        };

        var chart = new ApexCharts(document.querySelector("#Actual"), options);
        chart.render();
      }
    });


    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
      data: {
        sim: ctpId,
        user_id: user_id,
      },
      success: function(response) {
        var parsedResponse = JSON.parse(response); // Parse the JSON
        var labels = parsedResponse.simlabels; // Access the labels array
        var allsimGradesheetData = parsedResponse.allsimGradesheetData; // Access the otherData

        var options = {
          series: [{
            name: "Percentage",
            data: allsimGradesheetData // Use the 'allsim' array as data points
          }],
          chart: {
            height: 350,
            type: 'line',
            zoom: {
              enabled: false
            }
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth'
          },
          title: {
            text: '',
            align: 'left'
          },
          grid: {
            row: {
              colors: ['#f3f3f3', 'transparent'],
              opacity: 0.5
            },
          },
          yaxis: {
            categories: allsimGradesheetData,
          },
          xaxis: {
            categories: labels,
          }
        };

        var chart = new ApexCharts(document.querySelector("#Sim"), options);
        chart.render();
      }
    });


    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
      data: {
        academic: ctpId,
      },
      success: function(response) {
        academic = JSON.parse(response);
        var options = {
          series: [{
            name: "Desktops",
            data: academic
          }],
          chart: {
            height: 350,
            type: 'line',
            zoom: {
              enabled: false
            }
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth'
          },
          title: {
            text: '',
            align: 'left'
          },
          grid: {
            row: {
              colors: ['#f3f3f3', 'transparent'],
              opacity: 0.5
            },
          },
          yaxis: {
            min: 0, // Minimum value on the y-axis
            max: 100, // Maximum value on the y-axis
            tickAmount: 5, // Number of ticks or gridlines on the y-axis
            labels: {
              formatter: function(value) {
                return value.toFixed(2);
              },
            },
          },
          xaxis: {
            categories: academic,
          }
        };

        var chart = new ApexCharts(document.querySelector("#Academic"), options);
        chart.render();
      }
    });



    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
      data: {
        test: ctpId,
      },
      success: function(response) {
        test = JSON.parse(response);
        var options = {
          series: [{
            name: "Desktops",
            data: test // Use the 'test' array as data points
          }],
          chart: {
            height: 350,
            type: 'line',
            zoom: {
              enabled: false
            }
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth'
          },
          title: {
            text: '',
            align: 'left'
          },
          grid: {
            row: {
              colors: ['#f3f3f3', 'transparent'],
              opacity: 0.5
            },
          },
          yaxis: {
            min: 50,
            max: 100,
            tickAmount: 5,
            labels: {
              formatter: function(value) {
                return value.toFixed(2);
              },
            },
          },
          xaxis: {
            categories: test,
          }
        };

        var chart = new ApexCharts(document.querySelector("#Test"), options);
        chart.render();
      }
    });

    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
      data: {
        ctpId: ctpId,
        user_id: user_id,
      },
      success: function(response) {
        var parsedResponse = JSON.parse(response); // Parse the JSON
        var labels = parsedResponse.labels; // Access the labels array
        var allsimGradesheetData = parsedResponse.allGradesheetData; // Access the otherData

        var options = {
          series: [{
            name: "Percentage",
            data: allsimGradesheetData // Use the 'otherData' array as data points
          }],
          chart: {
            height: 350,
            type: 'line',
            zoom: {
              enabled: true,
              type: 'xy'
            }
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth'
          },
          title: {
            text: '',
            align: 'left'
          },
          grid: {
            row: {
              colors: ['#f3f3f3', 'transparent'],
              opacity: 0.5
            },
          },
          yaxis: {
            categories: allsimGradesheetData,
          },
          xaxis: {
            categories: labels,
          }
        };


        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

      }
    });
  });


  var options = {
    series: [{
      name: "Desktops",
      data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
    }],
    chart: {
      height: 350,
      type: 'line',
      zoom: {
        enabled: false
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth'
    },
    title: {
      text: '',
      align: 'left'
    },
    grid: {
      row: {
        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.5
      },
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
    }
  };

  var chart = new ApexCharts(document.querySelector("#Descipline"), options);
  chart.render();
  var options = {
    series: [{
      name: "Desktops",
      data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
    }],
    chart: {
      height: 350,
      type: 'line',
      zoom: {
        enabled: false
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth'
    },
    title: {
      text: '',
      align: 'left'
    },
    grid: {
      row: {
        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.5
      },
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
    }
  };

  var chart = new ApexCharts(document.querySelector("#Memo"), options);
  chart.render();
</script>
<script type="text/javascript">
  //Generate random number between min and max
  function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
  }

  function getRandomTimeStamps(min, max, fromDate, isObject) {
    var return_list = [];

    var entries = randomInt(min, max);
    for (var i = 0; i < entries; i++) {
      var day = fromDate ? new Date(fromDate.getTime()) : new Date();

      //Genrate random
      var previous_date = randomInt(0, 365);
      if (!fromDate) {
        previous_date = -previous_date;
      }
      day.setDate(day.getDate() + previous_date);

      if (isObject) {
        var count = randomInt(1, 20);
        return_list.push({
          timestamp: day.getTime(),
          count: count
        });
      } else {
        return_list.push(day.getTime());
      }


    }

    return return_list;

  }
  $(document).ready(function() {


    $('#github_chart_1').github_graph({
      //Generate random entries from 50-> 200 entries
      data: getRandomTimeStamps(50, 500, null, false),
      texts: ['completed task', 'completed tasks']
    });


    $('#github_chart_2').github_graph({
      //Generate random entries from 10-> 100 entries
      data: getRandomTimeStamps(10, 100, null, false),
      texts: ['comment', 'comments'],
      //override colours
      colors: ['rgba(0,0,0,0.3)', '#d6e685', '#8cc665', '#44a340', '#44a340'],
    });
    // start from 1 Jan 2022
    var start_from_2022 = new Date(2022, 0, 0, 0, 0, 0);

    $('#github_chart_3').github_graph({
      start_date: start_from_2022,
      //Generate random entries from 10-> 100 entries
      data: getRandomTimeStamps(5, 100, start_from_2022, true),
      texts: ['category', 'categories'],
      border: {
        radius: 5,
        hover_color: "red"
      },
      //Override month names
      month_names: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
      h_days: ['2', '4', '6'],
      //override colours with custom count
      colors: [{
          count: 0,
          color: 'gray'
        },
        {
          count: 5,
          color: 'purple'
        },
        {
          count: 10,
          color: 'yellow'
        },
        {
          count: 15,
          color: 'green'
        },
        {
          count: 20,
          color: 'red'
        }
      ],
      // callback when click on selected date
      click: function(date, count) {
        alert('You clicked on: ' + date + ' with count is ' + count);
      },
    });

  });
</script>