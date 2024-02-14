<?php

?>
<script>
  $("#newcoursetable").on("click", ".edit_course_data", function() {
    var ctid = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "<?php echo BASE_URL; ?>includes/Pages/fetch_cou_edit_value.php",
      data: "ctid=" + ctid,
      success: function(response) {
        $("#get_course_foem").empty();
        $("#get_course_foem").html(response);
      },
    });
  });
  $("#newcoursetable").on("click", ".get_course_phase", function() {
    var ctid1 = $(this).attr("id");

    $.ajax({
      type: "POST",
      url: "<?php echo BASE_URL; ?>includes/Pages/fetch_cou_edit_phase.php",
      data: "ctid=" + ctid1,
      success: function(response) {
        $("#get_course_foem1").empty();
        $("#get_course_foem1").html(response);
      },
    });
  });

  // $(".addPhaseDate").on("change", function() {
  $(document).on("change", ".addPhaseDate", function() {
    var coursename = $(this).data("coursename");
    var coursecode = $(this).data("coursecode");
    var phaseId = $(this).data("phaseid");
    var date = $(this).val();
    var courseId = $(this).data("courseid");
    $.ajax({
      type: "POST",
      url: "<?php echo BASE_URL ?>includes/Pages/addCoursePhaseDate.php",
      data: {
        coursecode: coursecode,
        coursename: coursename,
        phaseId: phaseId,
        date: date,
        courseId: courseId,
      },
      success: function(response) {},
    });
  });

  $(document).on("change", "#phasedropdown", function() {
    var phase = $(this).data("phase");
    var courseCode = $(this).data("coursecode");
    var courseName = $(this).data("coursename");
    var phaseId = $(this).data("phaseid");
    var manageroleid = $(this).data("manageroleid");
    var selectedOptionValue = $(this).val();
    var courseIdValue = $("#Courseid_val").val();
    var checkMana = $(this).data("class");
    $.ajax({
      type: "POST",
      url: "<?php echo BASE_URL; ?>includes/Pages/updatecoursephasemanage.php",
      data: {
        phase: phase,
        courseCode: courseCode,
        courseName: courseName,
        phaseId: phaseId,
        selectedOptionValue: selectedOptionValue,
        courseIdValue: courseIdValue,
        manageroleid: manageroleid,
      },
      success: function(response) {
        if (checkMana == "mainMana") {
          $(".manePhase" + phaseId).append(response);
          $(".manePhaseSelec" + phaseId).css("display", "none");
        }

        if (checkMana == "bacaMana") {
          $(".backPhase" + phaseId).append(response);
          $(".bacaPhaseSelec" + phaseId).css("display", "none");
        }
      },
      error: function(xhr, status, error) {
        // Handle errors if any
        console.error(xhr.responseText);
      },
    });
  });

  $(document).on("click", ".remPhaseMana", function() {
    var insId = $(this).data("insid");
    var coursecode = $(this).data("coursecode");
    var coursename = $(this).data("coursename");
    var phaseid = $(this).data("phaseid");
    var phaseutype = $(this).data("phaseutype");
    var checkMana = $(this).data("class");
    $.ajax({
      type: "POST",
      url: "<?php echo BASE_URL; ?>includes/Pages/deleteassingresoure.php",
      data: {
        insId: insId,
        coursecode: coursecode,
        coursename: coursename,
        phaseid: phaseid,
        phaseutype: phaseutype,
      },
      success: function(response) {
        if (checkMana == "mainManaRem") {
          $(".manePhase" + phaseid).append(response);
          $(".remMainPhaseMana" + phaseid).css("display", "none");
        }

        if (checkMana == "bacaManaRem") {
          $(".backPhase" + phaseid).append(response);
          $(".remBacaPhaseMana" + phaseid).css("display", "none");
        }
      },
      error: function(xhr, status, error) {
        // Handle errors if any
        console.error(xhr.responseText);
      },
    });
  });
</script>