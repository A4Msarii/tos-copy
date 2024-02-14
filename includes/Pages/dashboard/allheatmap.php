<?php
$filter_phase = $connect->query("SELECT * FROM phase GROUP BY phasename");
$filter_phase_Data = $filter_phase->fetchAll();

?>
<style type="text/css">
  /* Initially hide the second div */
  .dropdown-menu {
    display: none;
    float: right;
    top: 15px;
    position: absolute;
  }

  /* When hovering over the first div, display the second div */
  #seeclassdetails:hover+.dropdown-menu {
    display: block;
  }
</style>
<div class="col-lg-12 mb-3 mb-lg-5">
  <!-- Card -->
  <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
    <div class="card-body">
      <h6 class="card-subtitle text-success">All</h6>
      <hr class="text-success">

      <div class="row align-items-center gx-2 mb-2">
        <div class="col-12">

          <div class="container" id="heatChart">
            <p>Loading....</p>
          </div>

          
          <hr>
          <div class="row" style="float:right;">
            Less<div class="col-11" style="background-color:#eeeeee;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="0%">
              <?php echo "" ?></div>
            <div class="col-11" style="background-color:#d6e685;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Gradsheet Filled">
              <?php echo "" ?></div>
            <div class="col-11" style="background-color:#92eb8d;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="25%">
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
          </div>
        </div>

        <!-- <div id="github_chart_1"></div>
            <div class="seperate"></div> -->
      </div>
    </div>
    <!-- End Col -->
  </div>

</div>

<script>
  $(document).ready(function() {
    <?php
    if (isset($std_course1)) {
    ?>
      $(document).ready(function() {
        const stdCour = <?php echo $std_course1; ?>;
        const courseCode11 = <?php echo $CourseCode11; ?>;
        $.ajax({
          type: 'POST',
          url: '<?php echo BASE_URL; ?>includes/Pages/fetchHeatMapData.php',
          data: {
            stdCour: stdCour,
            courseCode11: courseCode11,
          },
          success: function(response) {
            $("#heatChart").empty();
            $("#heatChart").html(response);
          }
        });
      });
    <?php
    }
    ?>
  });
</script>