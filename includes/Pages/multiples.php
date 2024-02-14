<?php

$unique_id = 1;
$check_course_code = "SELECT max(`group_id`) as id_count FROM `warning_category_data`";
//var_dump($check_course_code);
$check_course_codest = $connect->prepare($check_course_code);
$check_course_codest->execute();
if ($check_course_codest->rowCount() > 0) {
  $re = $check_course_codest->fetchAll();
  foreach ($re as $get_all) {
    $unique_id = $get_all['id_count'];
    $unique_id += 1;
    $unique_id;
  }
} else {
  $unique_id;
}
?>
<label class="form-label" style="color:black; font-weight:bold;">Multiple Categories</label>
<form method="get" action="warning_insert_data_mul.php">
  <table class="table table-bordered" id="mu_table" style="width:100%;">

    <?php if (isset($_GET['warning_id']) || isset($_SESSION['warning_id_page'])) { ?>
      <input type="hidden" id="warning_value" name="warning" value="<?php echo $warning_id ?>">
    <?php } ?>
    <div class="input-field">
      <input type="hidden" name="group_id" value="<?php echo $unique_id ?>">
      <tr class="second_all_data">
        <td>
          <div id="firstdivselect_Cat">
            <select name="cat[]" class="select_Cat" style="border: 1px solid LightGray;border-radius:4px;padding:10px">
              <option value="" disabled selected>-select value-</option>
              <option value="phase">Phases</option>
            </select>
          </div>
        </td>
        <td>
          <div id="showdropphaseselect_Cat" style="display:none">
            <select name="phase_selested[]" required class="fetched_phase_dataselect_Cat" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">
              <option selected value="0">-select Type-</option>
              <option value="actual">Actual Only</option>
            </select>
          </div>
        </td>
        <td>
          <div id="showdropselect_Cat">
            <select name="cat_data[]" class="fetched_cat_dataselect_Cat" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">
              <option selected value="0" disabled>-select category-</option>
            </select>
          </div>
          <div id="showdrop1select_Cat" style="display:none;">
            <select name="cat_data1[]" class="fetched_cat_data1select_Cat" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">
              <option selected value="0" disabled>-select category-</option>
            </select>
          </div>
        </td>
        <td>
          <div id="grade_distselect_Cat">
            <input list="browsers" name="grades" placeholder="Grades" style="border: 1px solid LightGray;border-radius:4px;padding:10px; width: 100px;">
            <!-- <input list="browsers" name="browser" id="browser"> -->
            <datalist id="browsers">
              <option value="U">
              <option value="F">
              <option value="G">
              <option value="V">
              <option value="E">
              <option value="N">
            </datalist>
          </div>
          <div id="grade_dist1select_Cat" style="display:none;">
            <input type="number" name="test_marks[]" placeholder="Enter marks" style="border: 1px solid LightGray;border-radius:4px;padding:10px; width: 100px;">
          </div>
        </td>
        <td>
          <div id="count_disselect_Cat">
            <input list="count" name="count" placeholder="Count" style="border: 1px solid LightGray;border-radius:4px;padding:10px; width: 100px;">
            <!-- <input list="browsers" name="browser" id="browser"> -->
            <datalist id="count">
              <option value="1">
              <option value="2">
              <option value="3">
              <option value="4">
              <option value="5">
              <option value="6">
              <option value="7">
              <option value="8">
              <option value="9">
              <option value="10">
            </datalist>
          </div>

        </td>
        <td>
          <div id="thri_distselect_Cat">
            <input list="thrishould" name="thri" placeholder="Threshold" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">
            <!-- <input list="browsers" name="browser" id="browser"> -->
            <datalist id="thrishould">
              <option value="1">
              <option value="2">
              <option value="3">
              <option value="4">
              <option value="5">
              <option value="6">
              <option value="7">
              <option value="8">
              <option value="9">
              <option value="10">
            </datalist>
          </div>
          <!-- <div id="grade_dist2select_Cat" style="display: none;">
                              <select name="value_marks[]" style="border: 1px solid LightGray;border-radius:4px;padding:10px; width: 150px;">
                                <option value="0" disabled>Select Value</option>
                                <option value="1">Less than > </option>
                                <option value="2">Equal To = </option>
                                <option value="3">Greater than < </option>
                              </select>
                            </div> -->
        </td>
        <td id="lastbutton" style="display:none">
          <button type="button" class="btn btn-soft-primary addbutton"><i class="bi bi-plus-circle-fill"></i></button>

        </td>
      </tr>
      <br>

      <br>


  </table>
  </div>
  <br>
  <input type="submit" class="btn btn-success" id="submit_cat" name="submit_mul">
  <br>
</form>
<script type="text/javascript">
  $(document).on("change", "#cat_dropdown", function() {
    var val = $(this).val();
    document.cookie = "dropdown_val = " + val;
    window.location.reload();
  });

  $(document).ready(function() {
    var max1 = 80;
    var b = 1;
    $(".addbutton").click(function() {
      if (b <= max1) {
        var html = '<tr>\
                    <td>\
               <div id="firstdivselect_Cat' + b + '">\
                            <select name="cat[]" class="select_Cat' + b + '" style="border: 1px solid LightGray;border-radius:4px;padding:10px" required>\
                            <option value="" disabled selected>-select value-</option>\
                            <option value="phase">Phases</option>\
                            <option value="test">Test</option>\
                            <option value="actual">Actual</option>\
                            <option value="sim">Sim</option>\
                            </select>\
                            <div>\
                            </td>\
                            <td>\
                            <div id="showdropphaseselect_Cat' + b + '" style="display:none">\
                            <select name="phase_selested[]" required class="fetched_phase_dataselect_Cat' + b + '" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">\
                            <option selected value="0">-select Type-</option>\
                            <option value="all">Actual + sim</option>\
                            <option value="actual">ActualOnly</option>\
                            <option value="sim">Sim Only</option>\
                            </select></div>\
                            </td>\
                            <td>\
                            <div id="showdropselect_Cat' + b + '">\
                            <select name="cat_data[]" class="fetched_cat_dataselect_Cat' + b + '" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">\
                            <option selected value="0">-select category-</option>\
                            </select>\
                            </div>\
                            <div id="showdrop1select_Cat' + b + '" style="display:none;">\
                            <select name="cat_data1[]" class="fetched_cat_data1select_Cat' + b + '" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">\
                            <option selected value="0" disabled>-select category-</option>\
                            </select>\
                            </div>\
                            </td>\
                            <td colspan="3"></td>\
                            <td><button type="button" id="remove_cats' + b + '" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                    </tr>';
        $("#mu_table").append(html);
        b++;
        $("#mu_table").on('click', '#remove_cats' + b, function() {
          $(this).closest('tr').remove();
          b--;
        });
      }
    });
    $("#mu_table").on("change", "select", function() {
      var Class1;
      var Class1 = this.className;
      var cat_Sel = $(this).val();
      var dis_Ctp1 = $("#ctp_value").val();
      if (cat_Sel == "actual" || cat_Sel == "sim") {
        $("#showtext" + Class1).show();
        $("#grade_dist" + Class1).show();
        $("#count_dis" + Class1).show();
        $("#thri_dist" + Class1).show();
        $("#showtext" + Class1).show();
        $("#showdrop1" + Class1).hide();
        $("#showdrop" + Class1).show();
        $("#grade_dist1" + Class1).hide();
        $("#grade_dist2" + Class1).hide();
        $("#showdropphase" + Class1).hide();
        $(".addbutton" + Class1).hide();
        $("#grade_dist1" + Class1).removeAttr("required");
        $("#grade_dist2" + Class1).removeAttr("required");
        $('.ctp_val' + Class1).val(dis_Ctp1);
        $.ajax({
          type: 'POST',
          url: 'selec_ctp_dis.php',
          data: 'cat=' + cat_Sel + '&ctp=' + dis_Ctp1,
          success: function(response) {
            $('.fetched_cat_data' + Class1).empty();
            $('.fetched_cat_data' + Class1).append(response);

          }
        });
      } else if (cat_Sel == "test") {
        $("#showtext" + Class1).hide();
        $("#grade_dist" + Class1).hide();
        $("#thri_dist" + Class1).hide();
        $('.ctp_val' + Class1).val(dis_Ctp1);
        $("#grade_dist1" + Class1).show();
        $("#grade_dist2" + Class1).show();
        $("#showdrop1" + Class1).show();
        $("#showdrop" + Class1).hide();
        $(".addbutton" + Class1).hide();
        $("#showdropphase" + Class1).hide();
        $.ajax({
          type: 'POST',
          url: 'selec_ctp_dis.php',
          data: 'cat=' + cat_Sel + '&ctp=' + dis_Ctp1,
          success: function(response) {
            $('.fetched_cat_data1' + Class1).empty();
            $('.fetched_cat_data1' + Class1).append(response);
          }
        });

      } else if (cat_Sel == "phase") {
        $("#showtext" + Class1).show();
        $("#showtext" + Class1).show();
        $("#grade_dist" + Class1).show();
        $("#count_dis" + Class1).show();
        $("#thri_dist" + Class1).show();
        $("#grade_dist1" + Class1).hide();
        $("#grade_dist2" + Class1).hide();
        $("#showdrop1" + Class1).hide();
        $("#showdropphase" + Class1).show();
        $("#showdrop" + Class1).show();
        $.ajax({
          type: 'POST',
          url: 'selec_phase.php',
          data: 'ctp=' + dis_Ctp1,
          success: function(response) {
            allphase = [];
            allphase = response;
            // console.log(allphase);
            $('.fetched_cat_data' + Class1).empty();
            $('.fetched_cat_data' + Class1).append(response);
          }
        });
        $('.fetched_cat_data' + Class1).on('change', function() {
          var phase_val = $(this).val();
          if (phase_val != "all") {

            $("#showphase" + Class1).show();
            $.ajax({
              type: 'POST',
              url: 'selec_phase_val.php',
              data: 'phase=' + phase_val,
              success: function(response) {
                $('.fetched_phase_Class' + Class1).empty();
                $('.fetched_phase_Class' + Class1).append(response);
              }
            });
          }

        });
      }

      $('.fetched_phase_data' + Class1).on('change', function() {
        var value1 = $(this).val();
        if (value1 == "actual") {
          $("#lastbutton").show();
        } else {
          $("#lastbutton").hide();
        }
      });

    });

  });
</script>

<?php
$warning_id = $_SESSION['warning_id_page'];
$all_value_table = "";
$warning_data = "SELECT * FROM warning_category_data where warning='$warning_id' AND group_id != '0' GROUP BY group_id";
$statement = $connect->prepare($warning_data);
$statement->execute();

if ($statement->rowCount() > 0) {
  $result = $statement->fetchAll();
  $sn = 1;
  foreach ($result as $row) {
    $fetch_id_value = $row['category_value'];
    $table = $row['category'];
    $only_for_phase = $row['category_phase'];
    $name = "-";
    $table_value_fetch = "-";
    $thre_val = $row['threshold'];
    $group_ides = $row['group_id'];
    // if($fetch_id_value=="all"){
    //   $name="All";
    // }
    if ($table == "phase") {
      if ($fetch_id_value != "all" && $fetch_id_value != "0" && $only_for_phase == "all") {
        $cat_name_value = $connect->prepare("SELECT phasename FROM $table WHERE id=?");
        $cat_name_value->execute([$fetch_id_value]);
        $name = $cat_name_value->fetchColumn();
        $table_value_fetch = "all";
      } else if ($fetch_id_value == "all" && $fetch_id_value != "0" && $only_for_phase == "all") {
        $name = "all";
        $table_value_fetch = "Actual + sim";
      } else if ($fetch_id_value == "all" && $fetch_id_value != "0" && $only_for_phase == "actual") {
        $name = "all";
        $table_value_fetch = "actual";
      } else if ($fetch_id_value == "all" && $fetch_id_value != "0" && $only_for_phase == "sim") {
        $name = "all";
        $table_value_fetch = "sim";
      } else if ($fetch_id_value != "all" && $fetch_id_value != "0" && $only_for_phase == "actual") {
        $cat_name_value = $connect->prepare("SELECT phasename FROM $table WHERE id=?");
        $cat_name_value->execute([$fetch_id_value]);
        $name = $cat_name_value->fetchColumn();
        $table_value_fetch = "actual";
      } else if ($fetch_id_value != "all" && $fetch_id_value != "0" && $only_for_phase == "sim") {
        $cat_name_value = $connect->prepare("SELECT phasename FROM $table WHERE id=?");
        $cat_name_value->execute([$fetch_id_value]);
        $name = $cat_name_value->fetchColumn();
        $table_value_fetch = "sim";
      }
    } else if ($table == "actual") {
      if ($fetch_id_value != "all" && $fetch_id_value != "0") {
        $cat_name_value = $connect->prepare("SELECT symbol FROM $table WHERE id=?");
        $cat_name_value->execute([$fetch_id_value]);
        $name = $cat_name_value->fetchColumn();
      } else if ($fetch_id_value == "all") {
        $name = "all";
      }
    } else if ($table == "sim") {
      if ($fetch_id_value != "all" && $fetch_id_value != "0") {
        $cat_name_value = $connect->prepare("SELECT shortsim FROM $table WHERE id=?");
        $cat_name_value->execute([$fetch_id_value]);
        $name = $cat_name_value->fetchColumn();
      } else if ($fetch_id_value == "all") {
        $name = "all";
      }
    } else if ($table == "test") {
      if ($fetch_id_value != "all" && $fetch_id_value != "0") {
        $cat_name_value = $connect->prepare("SELECT shorttest FROM $table WHERE id=?");
        $cat_name_value->execute([$fetch_id_value]);
        $name = $cat_name_value->fetchColumn();
      } else if ($fetch_id_value == "all") {
        $name = "all";
      }
      $ran_the = $row['threshold'];
      if ($ran_the == "1") {
        $thre_val = "Less Than >";
      }
      if ($ran_the == "2") {
        $thre_val = "Equal Than =";
      }
      if ($ran_the == "3") {
        $thre_val = "Greater Thn <";
      }
    }
    $id = $row['id'];
    $gId = $row['group_id'];
    $modal = 'data-bs-toggle="modal" data-bs-target="#editcat"';
    $all_value_table .= '
            <tr>
           <td>' . $sn++ . '</td>
           <td><a href="" data-bs-toggle="modal" data-bs-target="#showCapData" value="' . $row['group_id'] . '" class="getGropuId">' . $row['category'] . '</a></td>
           <td>' . $table_value_fetch . '</td>
           <td>' . $name . '</td>
           <td>' . $row['grade'] . '</td>
           <td>' . $row['count'] . '</td>
            <td>' . $thre_val . '</td>
           <td style="text-align:center;">
             
               <a href="" style="text-align:center; margin:10px;" ' . $modal . ' id="' . $id . '" class="edit_cat_war"><i class="bi bi-pen-fill text-success" style="font-size:15px;"></i></a>
               <a href="warning_category_delete.php?gId=' . $gId . '" style="text-align:center;"><i class="bi bi-trash-fill text-danger" style="font-size:15px;"></i></a>
               </td>
            </tr>
            ';
  }
}
?>