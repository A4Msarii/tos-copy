<div class="row">
  <h1>All student result</h1>
  <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;" id="resultPageAjax">
  <h1 class="loadingProgressResult">Loading....</h1>
    
  </div>

  <div class="row justify-content-center">
    <div style="height:50px; text-align: center; background-color:#ededb9; width: fit-content;
    border-radius: 10px;
    margin: 10px;
    padding: 10px;">
      <i class="bi bi-info-square" style="    color: #111110;
    font-size: larger;
    font-weight: bold;
    margin-right: 5px;
    padding: 5px;"></i><span style="color: black;">"Please note that the results displayed on this page are preliminary, as the course is still ongoing. Final grades have not yet been determined or finalized."</span>
    </div>
  </div>
</div>

</div>

<script>
  $(document).ready(function() {
    // ProgressBarFetching
    var ctpId = <?php echo $std_course1; ?>;
    var courseCode = <?php echo $course_Code; ?>;
    var courseName = <?php echo $course_Name; ?>;
    var courseId = <?php echo $c_id; ?>;
    var totalType = <?php echo $Total_type_maarks; ?>;
    $.ajax({
      type: "POST", // You can also use GET if needed
      url: "<?php echo BASE_URL; ?>includes/Pages/fetchAllResultPage.php",
      data: {
        courseCode: courseCode,
        courseName: courseName,
        ctpId: ctpId,
        courseId: courseId,
        totalType: totalType,
      },
      success: function(response) {
        // console.log(response);
        $("#resultPageAjax").empty();
        $(".loadingProgressResult").css("display","none");
        $("#resultPageAjax").html(response)
      }
    });
  })
</script>