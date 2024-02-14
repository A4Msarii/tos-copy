<?php
header("HTTP/1.0 404 Not Found");
include '../../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
// session_start();
// $_SESSION['page'] = 'grade sheet';
// $phase = "";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Results</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <?php include ROOT_PATH .'includes/Pages/gs_thumbnail.php'; ?>

</head>

<style type="text/css">
/**/
  .card-subtitle {
    font-size: 1.1rem !important;
  }

  .tooltip-text {
    visibility: hidden;
    position: absolute;
    top: -40px;
    left: 10px;
    z-index: 2;
    width: auto;
    color: white;
    font-size: 12px;
    background-color: #192733;
    border-radius: 10px;
    padding: 10px 15px 10px 15px;
  }

  .circleig1 {
    height: 20px;
    width: 100%;
    position: absolute;
    display: inline-block;
    left: 0px;
    bottom: -18px;
    border-radius: 2px;
    /*    font-weight: bolder;*/
    /*    font-size: larger;*/
    color: white;
    font-family: cursive;
    background: darkcyan;
  }

  .tooltip-text::before {
    content: "";
    position: absolute;
    transform: rotate(45deg);
    background-color: #192733;
    padding: 5px;
    z-index: 1;
    top: 29px;
    left: 35px;
  }

  .btnFlip:hover .tooltip-text {
    visibility: visible;
  }

  .tooltip-text1 {
    visibility: hidden;
    position: absolute;
    top: -42px;
    left: 0px;
    z-index: 2;
    width: auto;
    color: white;
    font-size: 12px;
    background-color: #192733;
    border-radius: 10px;
    padding: 10px 15px 10px 15px;
  }

  .tooltip-text1::before {
    content: "";
    position: absolute;
    transform: rotate(45deg);
    background-color: #192733;
    padding: 5px;
    z-index: 1;
    top: 31px;
    left: 28px;
  }

  .btn-flip11:hover .tooltip-text1 {
    visibility: visible;
  }

  .chart--container {
    height: 100%;
    width: 100%;
    min-height: 530px;
  }
  svg#SvgjsSvg2815
  {
    background-color: yellow !important;
  }
  .nav-link.aaaa.active {
    background-color: #67778833 !important; /* Set your desired background color */
  }
  .nav-link.aaaa
  {
    font-weight:bolder; 
    font-size:large;
    background: aliceblue;
  }
  /* Animation property */
#selectStudent {
  animation: wiggle 2s linear infinite;
}

/* Keyframes */
@keyframes wiggle {
  0%, 7% {
    transform: rotateZ(0);
  }
  15% {
    transform: rotateZ(-15deg);
  }
  20% {
    transform: rotateZ(10deg);
  }
  25% {
    transform: rotateZ(-10deg);
  }
  30% {
    transform: rotateZ(6deg);
  }
  35% {
    transform: rotateZ(-4deg);
  }
  40%, 100% {
    transform: rotateZ(0);
  }
}

#selectStudent {
  
  height: 4em;
  width: max-content;
  
  background: #444;
  background: linear-gradient(top, #555, #333);
  border: none;
  border-top: 3px solid orange;
  border-radius: 0 0 0.2em 0.2em;
  color: #fff;
  font-family: Helvetica, Arial, Sans-serif;
  font-size: 2em;
  transform-origin: 50% 5em;
}
.clsbutn:hover
{
  background-color: #cddfef !important;
}
.clsbutn span
{
  font-size: large;
  font-weight: bold;
}
</style>

<body>
<!-- <a href="export_to_excel.php" target="_blank">Export to Excel</a> -->

  <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
  <div id="loading-screen" style="display:none;">
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  </div>
  <!--Head Navbar-->
  <div id="header-hide">
    <?php
    include ROOT_PATH . 'includes/head_navbar.php';
    $_SESSION['page'] = 'grade sheet';
    $phase = "";
    ?>
  </div>

  <!--Main contect We need to insert data here-->
<main id="content" role="main" class="main">

    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
     <div class="content container-fluid" style="margin-top: -19rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="col-sm-auto" style="text-align: center; margin: 10px;">
             <div class="container justify-content-center" style="display:flex;">
              <ul class="nav nav-pills justify-content-start" role="tablist" style="margin:5px;display: none;"> <!-- Left-aligned -->
                <div style="background: #b5be0917;border-radius: 10px;">
                <?php
                  if ($_SESSION['role'] == 'instructor') {
                ?>
                <li class="nav-item" style="border-radius: 20px;">
                  <a class="nav-link aaaa active" href="<?php echo BASE_URL;?>includes/Pages/dashboard/mydashboard.php">
                    <div class="d-flex align-items-center">
                      <img style="height: 30px; width:30px;" src="<?php echo $pic ?>" alt="" class="avatar avatar-circle"> &nbsp;My Dashboard
                    </div>
                  </a>
                </li>
                <?php
                  }
                ?>
              </div>
              </ul>
              <?php 
                if($role!="student"){
                if (isset($_COOKIE['phpgetcourse']) && isset($_COOKIE['student']) && $_COOKIE['student']!='all' || isset($_COOKIE['student']) && isset($_COOKIE['course_ids']) && $_COOKIE['student']=='all') { 

              ?>
                <div class="row">
                <div class="col">
                <button onclick="window.open('<?php echo BASE_URL; ?>includes/Pages/Home.php');" type="button" class="btn clsbutn" style="background: aliceblue;">
                  <?php 
                        if($fetchuser_id != 0) {
                          include ROOT_PATH. 'includes/Pages/stud_info.php';
                        } else {
                          echo "<span class='text-primary'>All</span>";
                        }
                        ?>
                </button>
                <button type="button" class="btn clsbutn active" onclick="window.open('<?php echo BASE_URL; ?>includes/Pages/dashboard/Metric.php', '_blank');" style="background: aliceblue;">
                  <?php 
                        if($fetchuser_id != 0) {   
                          echo '<span class="text-danger">Metrics</span>';
                        } else {
                          echo "<span class='text-primary'>Metrics</span>";
                        }
                        ?>
                </button>
                <button type="button" class="btn clsbutn" style="background: #cddfef;">
                  <?php 
                        if($fetchuser_id != 0) {   
                          echo '<span class="text-danger">Result</span>';
                        } else {
                          echo "<span class='text-primary'>Result</span>";
                        }
                        ?>
                </button>
              </div>
              </div><br>
                <?php }else{   
                         if ($_SESSION['role'] != 'instructor') {
                  ?>
                 <br><br><div class="justify-content-center"><center> <img src="<?php echo BASE_URL; ?>assets/approved/student.gif" style="    height: 800px;width: 800px;position: unset;margin-top: -150px;margin-bottom: -150px;" alt=""></center>   </div>
               <?php }else{
                ?>
               <br><br><div class="justify-content-center"><center> <img src="<?php echo BASE_URL; ?>assets/approved/student.gif" style="    height:292px;width: 222px;position: unset;margin-top: -115px;margin-bottom: -150px;" alt=""></center>   </div>
                <?php
               }
               
              } }else{
                  ?>
                <div class="row">
                <div class="col">
                <button onclick="window.open('<?php echo BASE_URL; ?>includes/Pages/Home.php', '_blank');" type="button" class="btn clsbutn" style="background: aliceblue;">
                  <?php 
                        if($fetchuser_id != 0) {
                          include ROOT_PATH. 'includes/Pages/stud_info.php';
                        } else {
                          echo "<span class='text-primary'>All</span>";
                        }
                        ?>
                </button>
                <button type="button" class="btn clsbutn active" onclick="window.open('<?php echo BASE_URL; ?>includes/Pages/dashboard/Metric.php', '_blank');" style="background: aliceblue;">
                  <?php 
                        if($fetchuser_id != 0) {   
                          echo '<span class="text-danger">Metrics</span>';
                        } else {
                          echo "<span class='text-primary'>Metrics</span>";
                        }
                        ?>
                </button>
                <button type="button" class="btn clsbutn active" style="background: #cddfef;">
                  <?php 
                        if($fetchuser_id != 0) {   
                          echo '<span class="text-danger">Result</span>';
                        } else {
                          echo "<span class='text-primary'>Result</span>";
                        }
                        ?>
                </button>
              </div>
              </div><br>
                <?php }
                ?>
             </div>


              
            </div>

            <!-- End Header -->


            <!-- Body -->
            <div class="card-body">

              <div class="tab-content">
                <div class="tab-pane fade <?php if($_SESSION['role'] == "instructor"){ echo "show active"; }?> ayushishow" id="mydashboardinst" role="tabpanel" aria-labelledby="mydashboardinst-tab">
                  <?php include ROOT_PATH . 'includes/Pages/dashboard/coursemanagerdashboard.php'; ?>
                </div>

                <div class="tab-pane fade<?php
                  if($role != 'instructor'){ echo "show active"; }?>" id="result" role="tabpanel" aria-labelledby="result-tab">
                  <?php 
                  if($fetchuser_id!=0){
                  include ROOT_PATH . 'includes/Pages/dashboard/resultpage.php';
                  }else if($fetchuser_id==0){
                  include ROOT_PATH . 'includes/Pages/dashboard/all_resultpage.php'; 
                  }
                  ?>
                </div>
                
           
           </div>
              <!-- End Card -->
            </div>
          </div>
          </div>

          </div>
        </div>

</main>
  <!-- ========== END MAIN CONTENT ========== -->
  <?php
  function getcall($mark_total, $cat_convert_val, $count_of_value)
  {


    $get_sum = $mark_total * $cat_convert_val;
    $get_all_count = $count_of_value * 100;
    $final_cal = $get_sum / $get_all_count;
    return $final_cal;
   }
  ?>
  <!-- ========== SECONDARY CONTENTS ========== -->







  <div class="modal fade" id="memoinfo" tabindex="-1" role="dialog" aria-labelledby="memoinfoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title text-success" id="topic" style="font-size: x-large;"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input class="form-control" type="hidden" id="memo" name="memo" value="">
          <label class="form-label text-dark" style="font-weight:bold;font-size: large;">Date : </label>
          <span type="date" name="date" id="date" style="font-weight:bold;font-size: large;"></span><br>
          <label class="form-label" style="font-weight:bold;font-size: large;">Instructor : </label>
          <span type="text" name="comment" id="inst" style="font-weight:bold;font-size: large;"></span><br>
          <label class="form-label" style="font-weight:bold;font-size: large;">Comment : </label>
          <span type="text" name="comment" id="comment" style="font-weight:bold;font-size: large;"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="CAPinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" id="capmodalcolor">
          <h3 class="modal-title text-light" id="capname" style="margin-bottom:20px;"></h3>
          <button style="margin-top: -40px;color: black;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="fetch_value_caps"></div>

        </div>
      </div>
    </div>
  </div>

  <!-- fetch file -->

  <div id="testAttachModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="">Attachement's</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="testFile">

          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="quizAttachModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="">Attachement's</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="quizFile">

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="disciplineinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title text-success" id="topic_desc" style="font-size:x-large;">discipline</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input class="form-control" type="hidden" id="desci" name="desci" value="">
          <label class="form-label text-dark" style="font-weight:bold;font-size: large;">Date : </label>
          <span type="date" name="date" id="date_desc" style="font-weight:bold;font-size: large;"></span><br>
          <label class="form-label" style="font-weight:bold;font-size: large;">Instructor : </label>
          <span type="text" name="comment" id="inst_desc" style="font-weight:bold;font-size: large;"></span><br>
          <label class="form-label" style="font-weight:bold;font-size: large;">Comment : </label>
          <span type="text" name="comment" id="comment_desc" style="font-weight:bold;font-size: large;"></span>
        </div>
      </div>
    </div>
  </div>

    <!-- Modal -->
    <!-- <div class="modal fade" id="featuresupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            hi
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->
 

  <script>
    $(document).ready(function() {

      setTimeout(function() {
        showGraph();

        // Set an interval of 3 seconds to load the function again
        setInterval(function() {
          showGraph();
        }, 100000);
      }, 1000);
    });

    function showGraph() {
      var sideId = $("#state").val();
      $.post("<?php echo BASE_URL; ?>includes/line_chart/get_Data.php/?sideId=" + sideId, function(data) {
        // console.log('varun', data);
        var name = [];
        var marks = [];

        for (var i in data) {
          name.push(data[i].symbol);
          marks.push(data[i].over_all_grade_per);
        }

        var chartdata = {
          labels: name,
          datasets: [{
            label: 'Student Marks',
            backgroundColor: '#00c9a74f',
            borderColor: '#00c9a7',
            hoverBackgroundColor: '#CCCCCC',
            hoverBorderColor: 'green',
            data: marks
          }]
        };

        var graphTarget = $("#graphCanvas");
        var barGraph = new Chart(graphTarget, {
          type: 'line',
          data: chartdata
        });
      });
    }
  </script>


<script>
  $(".get_cap_noti").on("click", function() {
    var getid = $(this).attr("id");
    $.ajax({
      type: 'POST',
      url: 'fetch_cap_data.php',
      data: 'id=' + getid,
      success: function(response) {
        $("#fetch_value_caps").empty();

        $("#fetch_value_caps").append(response);
      }
    });
  });
  $(".testFiles").on("click", function() {
    var testFileId = $(this).attr("id");
    var className = $(this).attr("name");
    $.ajax({
      type: 'POST',
      url: "addStuDoc.php",
      data: {
        testFileId: testFileId,
        className: className,
      },
      dataType: "html",

      success: function(resultData1) {
        $("#testFile").empty();
        $("#testFile").html(resultData1);
      }
    });
  });

  $(".quizFiles").on("click", function() {
    var testFileId = $(this).attr("id");
    var className = $(this).attr("name");
    $.ajax({
      type: 'POST',
      url: "addStuDoc.php",
      data: {
        testFileId: testFileId,
        className: className,
      },
      dataType: "html",

      success: function(resultData1) {
        $("#quizFile").empty();
        $("#quizFile").html(resultData1);
      }
    });
  });
</script>

<!-- <script>
  $(document).ready(function() {
    $('#mydashboardinst-tab').click(function() {
      $('#mydashboardinst').tab('show'); // Activate the tab
      $('#mydashboardinst').addClass('show active'); // Add classes to show the content
    });
  });
</script> -->



<!-- <script>
  $(".fetchSubCheckList").on("click", function() {
    const checkListId = $(this).data("id");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php',
      data: {
        checkListId: checkListId,
      },
      success: function(response) {
        $("#subCheckListId1").empty();
        $("#subCheckListId1").html(response);
      }
    });
  });
</script> -->

<script>
  $(".fetchSubCheckList").on("click",function(){
    const checkId = $(this).data("id");
    $("#checknamesub").text($(this).data("name"));
    const userId = <?php echo $fetchuser_id ?>;
    const ctpId = <?php echo $std_course1 ?>;
    $("#checkID").val(checkId);
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php',
      data: {
        checkId1: checkId,
        ctpId: ctpId,
        userId: userId
      },
      success: function(response) {
        $("#subCheckListId1").empty();
        $("#subCheckListId1").html(response);
      }
    });
  });
</script>

<script>
  $("#addAllCheckList").on("click",function(){
    const studentId = <?php echo $fetchuser_id ?>;
    const ctpId = <?php echo $std_course1 ?>;
    const totalSubItems = $('.allcheckList:checked').length;
    $('.allcheckList:checked').each(function() {
      const dataItemValue = $(this).data('checklist');
      const subItemValue = $(this).val();
      sendDataToServer(dataItemValue, subItemValue, studentId, ctpId, totalSubItems, ++submittedCount);
    });
  })

  function sendDataToServer(dataItemValue, subItemValue, studentId, ctpId, totalSubItems, submittedCount) {
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php',
      data: {
        dataItem: dataItemValue,
        subItem: subItemValue,
        studentId: studentId,
        ctpId: ctpId,
      },
      success: function(response) {
        if (submittedCount == totalSubItems) {
          location.reload(); // Reload the page when all subitems are submitted
        }
      }
    });
  }
</script>

<script>
  $(document).ready(function() {
    // Handle tab clicks and content display
    $('.nav-link').click(function() {
      // Remove the 'active' class from all tabs
      $('.nav-link').removeClass('active');
      // Add the 'active' class to the clicked tab
      $(this).addClass('active');
      
      // Get the target tab content ID from the data-bs-target attribute
      var targetTab = $(this).data('bs-target');
      
      // Show the corresponding tab content
      $(targetTab).tab('show');
    });
  });
</script>

<!-- <script type="text/javascript">
      // Check if the 'showModal' parameter is present in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const showModalParam = urlParams.get('showModal');
        // alert(showModalParam);

        // Function to open the modal
        function openModal() {
            $('#featuresupdate').css('display','block');
        }

        // Function to close the modal and remove the query parameter
        function closeModal() {
            $('#featuresupdate').modal('hide');
            // Remove the query parameter and reload the page
            history.replaceState({}, document.title, window.location.pathname);
        }

        // If the 'showModal' parameter is 'true', open the modal when the page loads
        if (showModalParam == 'true') {
          // alert('hello');
            openModal();
        }
    </script> -->

  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>

</html>