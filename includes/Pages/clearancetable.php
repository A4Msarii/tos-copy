
<?php
$course_ides_c = "";
$class_ides_c = "";
$phase_ides_c = "";
$classes_c = "";
$item_ides_c = "";
$get_ins_name_c = "";
$dates_c = "";
$get_class_name_c = "";
$actclass = "";
$simclass = "";
$clclass1 = "";    $clclass="";  
$get_ins_name1 = "";
$get_datess1 = "";
$q3 = "SELECT * FROM actual where ctp='$std_course1'";
$st3 = $connect->prepare($q3);
$st3->execute();
if ($st3->rowCount() > 0) {
    $re3 = $st3->fetchAll();
    foreach ($re3 as $row3) {
        $actclass .= '<option value="' . $row3['id'] . '" class="actual" id="">' . $row3['symbol'] . '</option>';
    }
}

$q4 = "SELECT * FROM sim where ctp='$std_course1'";
$st4 = $connect->prepare($q4);
$st4->execute();
if ($st4->rowCount() > 0) {
    $re4 = $st4->fetchAll();
    foreach ($re4 as $row4) {
        $simclass .= '<option value="' . $row4['id'] . '" class="sim" id="">' . $row4['shortsim'] . '</option>';
    }
}
$q9 = "SELECT * FROM clone_class where std_id='$fetchuser_id' and class_name='actual'";
$st9 = $connect->prepare($q9);
$st9->execute();
if ($st9->rowCount() > 0) {
    $re9 = $st9->fetchAll();
    foreach ($re9 as $row9) {
        $a_ides = $row9['class_id'];
        $clas_c_ac = $connect->prepare("SELECT symbol FROM `actual` WHERE id=?");
        $clas_c_ac->execute([$a_ides]);
        $get_c_a = $clas_c_ac->fetchColumn();

        $clclass .= '<option value="' . $row9['class_id'] . '" class="actual" id="' . $row9['cloned_id'] . '">' . $get_c_a . '-C' . $row9['cloned_id'] . '</option>';
    }
}

$q10 = "SELECT * FROM clone_class where std_id='$fetchuser_id' and class_name='sim'";
$st10 = $connect->prepare($q10);
$st10->execute();
if ($st10->rowCount() > 0) {
    $re10 = $st10->fetchAll();
    foreach ($re10 as $row10) {
        $a_ides = $row10['class_id'];
        $clas_c_si = $connect->prepare("SELECT shortsim FROM `sim` WHERE id=?");
        $clas_c_si->execute([$a_ides]);
        $get_c_s = $clas_c_si->fetchColumn();

        $clclass1 .= '<option value="' . $row10['class_id'] . '" class="sim" id="' . $row10['cloned_id'] . '">' . $get_c_s . '-C' . $row10['cloned_id'] . '</option>';
    }
}
?>
<input type="hidden" id="get_stu_idesss" value="<?php echo $fetchuser_id ?>">
<table class="table table-bordered target-table table-hover" id="cl_form">
     <input class="form-control" type="text" id="addsearchclearance" onkeyup="clearancelog()" placeholder="Search for Item.." title="Type in a name"><br>
                <thead class="thead-dark" style="background-color:black;">
                    <tr>
                    <th class="text-white">No.</th>
                        <th class="text-white">event</th>

                        <th class="text-white">Class</th>
                        <th class="text-white">Instructor</th>
                        <th class="text-white">Date</th>
                        <?php  if (isset($_SESSION['permission']) && $permission['delete_emergance'] == "1"){ ?>
                        <th class="text-white">Operation</th>
                        <?php }?>
                    </tr>
                </thead>
                <tbody>
              <?php
    
$eme_id = "SELECT * FROM clearance_data where ctp_id='$std_course1'";
$eme_idst = $connect->prepare($eme_id);
$eme_idst->execute();
$eme_idre = $eme_idst->fetchAll();
 $sns = 1;
foreach ($eme_idre as $eme_idvalue) {
  $class_clearnce="";
  $class_table_clearnace="";
  $clone_cid_clearnace="";
  $get_ins_name1 = "";
  $get_datess1 = "";
    $eme_id = $eme_idvalue['id'];
    $eme_get_id = $eme_idvalue['item'];
    $eme_get_subid = $eme_idvalue['subitem'];
    if ($eme_get_id != 0) {
        $q1 = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
        $q1->execute([$eme_get_id]);
        $item_name1 = $q1->fetchColumn();
    } else if ($eme_get_subid != 0) {
        $q1 = $connect->prepare("SELECT subitem FROM `sub_item` WHERE id=?");
        $q1->execute([$eme_get_subid]);
        $item_name1 = $q1->fetchColumn();
    }
     $eme_id1= "SELECT * FROM clearance_student_id where clearance_id='$eme_id' and stud_id='$fetchuser_id'";
    $eme_id1st = $connect->prepare($eme_id1);
    $eme_id1st->execute();
    $eme_id1re = $eme_id1st->fetchAll();
    foreach ($eme_id1re as $eme_id1value) {
      $class_clearnce=$eme_id1value['class_id'];
      $class_table_clearnace=$eme_id1value['class_table'];
      $clone_cid_clearnace=$eme_id1value['clone_cid'];
    }
    if ($class_clearnce == null) {
      
      $iconed='<i class="bi bi-x-circle text-danger" style="float: right;font-size: x-large;"></i>';
    }else{
      $iconed='<i class="bi bi-check-circle text-success" style="float: right;font-size: x-large;"></i>';
    }

    if ($eme_get_id != 0) {
      $fetch_itemaddescount = $connect->query("SELECT COUNT(item_gradesheet.id)
    FROM item_gradesheet
    JOIN item ON item_gradesheet.item_id = item.id AND grade != 'N' AND grade IS NOT NULL AND grade != ''
    JOIN itembank ON item.item = itembank.id
    WHERE item_gradesheet.user_id = '$fetchuser_id'
    AND itembank.id = '$eme_get_id';");
      $fetch_itemaddescount1 = $fetch_itemaddescount->fetchColumn();
    }
    if ($eme_get_subid != 0) {
      $fetch_itemaddescount = $connect->query("SELECT COUNT(subitem_gradesheet.id)
    FROM subitem_gradesheet
    JOIN subitem ON subitem_gradesheet.subitem_id = subitem.id AND grade != 'N' AND grade IS NOT NULL AND grade != ''
    JOIN sub_item ON subitem.subitem = sub_item.id
    WHERE subitem_gradesheet.user_id = '$fetchuser_id'
    AND sub_item.id = '$eme_get_subid';");
      $fetch_itemaddescount1 = $fetch_itemaddescount->fetchColumn();
    }
    ?>
    <tr>
      <td><?php echo $fetch_itemaddescount1; ?></td>
      <td><span><?php echo $item_name1.$iconed; ?></span></td>
      <td>
      <?php if ($class_clearnce == null) {?>
      <select class="form-control" id="<?php echo $eme_id; ?>">
      <option selected disabled value="">-select class-</option>
       <?php echo $actclass;
        echo $simclass; echo $clclass;
        echo $clclass1;
        ?>
      </select>
    <?php } else {
        $assi_cls_table1 = $class_table_clearnace;
        $assi_cls1 = $class_clearnce;
        $assi_val = $clone_cid_clearnace;
        if ($assi_cls_table1 == "actual") {
            $added_cls_name12 = $connect->prepare("SELECT symbol FROM `actual` WHERE id=?");
        }
        if ($assi_cls_table1 == "sim") {
            $added_cls_name12 = $connect->prepare("SELECT shortsim FROM `sim` WHERE id=?");
        }
        $added_cls_name12->execute([$assi_cls1]);
        $get_cls_name12 = $added_cls_name12->fetchColumn();

        if ($assi_val == "") {
            $assi_val = "";
            $res_cll_name1 = $get_cls_name12;
        } else if ($assi_val != "") {
            $res_cll_name1 = $get_cls_name12 . '-C' . $assi_val;
        }
        ?>
                         <select class="form-control" id="<?php echo $eme_id; ?>">
                         <option selected disabled ><?php echo $res_cll_name1 ?></option>
                        <?php
echo $actclass;
        echo $simclass;
        echo $clclass;
        echo $clclass1;
        ?>
      </select>
      <?php }?>
    </td>
    <td>
      <?php
$class_tab1 = $class_table_clearnace;
    $class_idd1 = $class_clearnce;
    //if class is select but not clone class
    if ($class_table_clearnace != "" && $clone_cid_clearnace == "") {
        $sel_val = $connect->prepare("SELECT users.nickname FROM `users`
            INNER JOIN gradesheet ON gradesheet.instructor = users.id where gradesheet.class='$class_tab1' and gradesheet.class_id='$class_idd1' and gradesheet.user_id='$fetchuser_id'");
        $sel_val->execute();
        $get_ins_name1 = $sel_val->fetchColumn();
    }
    if ($class_table_clearnace != "" && $clone_cid_clearnace != "") {
        $cl_id = $clone_cid_clearnace;
        $sel_val = $connect->prepare("SELECT users.nickname FROM `users`
      INNER JOIN cloned_gradesheet ON cloned_gradesheet.instructor = users.id where cloned_gradesheet.class='$class_tab1' and cloned_gradesheet.class_id='$class_idd1' and cloned_gradesheet.user_id='$fetchuser_id' and cloned_gradesheet.cloned_id='$cl_id'");
     
        $sel_val->execute();
        $get_ins_name1 = $sel_val->fetchColumn();
    }
    ?>
    <input type="text" class="form-control" value="<?php echo $get_ins_name1 ?>" readonly></td>
      <td>
    <?php
if ($class_table_clearnace != "" && $clone_cid_clearnace == "") {
        $get_date = $connect->prepare("SELECT date FROM `gradesheet` WHERE class='$class_tab1' and class_id='$class_idd1' and user_id='$fetchuser_id'");
        $get_date->execute();
        $get_datess1 = $get_date->fetchColumn();
    }
    if ($class_table_clearnace != "" && $clone_cid_clearnace != "") {
        $get_date = $connect->prepare("SELECT date FROM `cloned_gradesheet` WHERE class='$class_tab1' and class_id='$class_idd1' and user_id='$fetchuser_id' and cloned_id='$cl_id'");
        $get_date->execute();
        $get_datess1 = $get_date->fetchColumn();
    }
    ?>
      <input type="date" class="form-control" value="<?php echo $get_datess1 ?>" readonly></td>
      <?php  if (isset($_SESSION['permission']) && $permission['delete_emergance'] == "1"){ ?>
                <td><a href="delete_cle.php?id=<?php echo $eme_id ?>" style="font-size:small; border:1px solid #ed4c78;"><i class="bi bi-trash-fill text-danger"></i> </td>
              <?php }?>
    </tr>
<?php }
?>

                </tbody>
            </table>



<script>
    function clearancelog() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("addsearchclearance");
      filter = input.value.toUpperCase();
      table = document.getElementById("cl_form");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
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
  <script>

$("#cl_form").on("change","select",function()
	{
    var t = $(this).attr('id');
    var class_table = $(this).children(":selected").attr("class");
    var class_cl = $(this).children(":selected").attr("value");
    var class_clid = $(this).children(":selected").attr("id");
    var stu=$("#get_stu_idesss").val();

    if(class_clid){
      $.ajax({
        type:'GET',
        url:'insert_clearance_class1.php',
        data:'id='+t+'&class_id='+class_clid+'&class_table='+class_table+'&class_cl='+class_cl+'&std='+stu,
       success:function(response){

            window.location.reload();

        }
      });
    }else{
      $.ajax({
        type:'GET',
        url:'insert_clearance_class.php',
        data:'id='+t+'&class_table='+class_table+'&class_cl='+class_cl+'&std='+stu,
        success:function(response){
            window.location.reload();
          }
      });

    }
  });
</script>