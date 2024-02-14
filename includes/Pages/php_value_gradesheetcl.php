<?php
$fetch_overall_grade="";
    // if class id is set
    if (isset($_GET['class_name'])) {
      $_SESSION['class_name_Sess'] = $class_name = urldecode(base64_decode($_GET['class_name']));
    } else if (isset($_SESSION['class_name_Sess'])) {
      $class_name = $_SESSION['class_name_Sess'];
    }
    if (isset($_GET['id'])) {
      $_SESSION['classid_Sess'] = $classid = urldecode(base64_decode($_GET['id']));
      $class_data = "SELECT * FROM $class_name where id='$classid'";

      $class_datast = $connect->prepare($class_data);
      $class_datast->execute();

      if ($class_datast->rowCount() > 0) {
        $result_data = $class_datast->fetchAll();
        foreach ($result_data as $rs) {
          if ($class_name == "actual") {
            $class = $rs['symbol'];
          } else if ($class_name == "sim") {
            $class = $rs['shortsim'];
          }
          $percentage = $rs['percentage'];
          $phase_id = $rs['phase'];
        }
      }
    } else if (isset($_SESSION['classid_Sess'])) {
      $classid = $_SESSION['classid_Sess'];
      $class_data = "SELECT * FROM $class_name where id='$classid'";
      $class_datast = $connect->prepare($class_data);
      $class_datast->execute();

      if ($class_datast->rowCount() > 0) {
        $result_data = $class_datast->fetchAll();
        foreach ($result_data as $rs) {
          if ($class_name == "actual") {
            $class = $rs['symbol'];
          } else if ($class_name == "sim") {
            $class = $rs['shortsim'];
          }
          $percentage = $rs['percentage'];
          $phase_id = $rs['phase'];
        }
      }
    }
    if(isset($_REQUEST['clone_ides'])){
        $_SESSION['clone_ides']=$get_clone_ides=urldecode(base64_decode($_REQUEST['clone_ides']));
        }else if(isset($_SESSION['clone_ides'])){ 
      $get_clone_ides=$_SESSION['clone_ides'];
      }
    ?>
      <?php
                    $std_in = "";
                    $vec_id = "";
                    $over_all_grade_per = "";
                    $st_date="";
                    $name2="";
                    $st_duration_hr = "";
                        $st_duration_min = "";
                        $status_id="";
                        $status_name1 ="";$status_code1="";$grad_id="";
                    //fetch selected student details
                    $stu_grade = "SELECT * FROM cloned_gradesheet where user_id='$fetchuser_id' and course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' and cloned_id='$get_clone_ides'";
                    $st = $connect->prepare($stu_grade);
                    $st->execute();
                    if ($st->rowCount() > 0) {
                      $re = $st->fetchAll();
                      foreach ($re as $value) {
                        $over_all_comment = $value['over_all_comment'];
                        $over_all_grade_per = $value['over_all_grade_per'];
                        $comments = $value['comments'];
                        $grad_id=$value['id'];
                        $fetch_overall_grade=$value['over_all_grade'];
                        //fetch instructor of selected std if set
                        $std_in = $value['instructor'];
                        $instr_name = $connect->prepare("SELECT name FROM `users` WHERE id=?");
                        $instr_name->execute([$std_in]);
                        $name1 = $instr_name->fetchColumn();
                        //fetch vechile
                        $vec_id = $value['vehicle'];
                        $vec_name = $connect->prepare("SELECT VehicleNumber FROM `vehicle` WHERE id=?");
                        $vec_name->execute([$vec_id]);
                        $name2 = $vec_name->fetchColumn();
                        $vec_type = $connect->prepare("SELECT VehicleSpot FROM `vehicle` WHERE id=?");
                        $vec_type->execute([$vec_id]);
                        $name3 = $vec_type->fetchColumn();
                        $st_time = $value['time'];
                        $st_date = $value['date'];
                        $status_id=$value['gradsheet_status'];
                        $status_name = $connect->prepare("SELECT `description` FROM `status` WHERE id=?");
                        $status_name->execute([$status_id]);
                        $status_name1 = $status_name->fetchColumn();
                        $status_code = $connect->prepare("SELECT `code` FROM `status` WHERE id=?");
                        $status_code->execute([$status_id]);
                        $status_code1 = $status_code->fetchColumn();
                        $st_date = strtotime($st_date);
                        $st_duration_hr = $value['duration_hours'];
                         $st_duration_min = $value['duration_min'];
                      }
                    }
                    $added_ins = "";
                    
                    ?>
                     <input type="hidden" value="<?php echo $get_clone_ides ?>" id="get_clone_ides_val" name="get_clone_ides">
                    <input type="hidden" value="<?php echo $grad_id?>" id="gradsheet_get_id"><?php
                     $get_ins1 = "SELECT * FROM cloned_gradesheet where user_id='$fetchuser_id' and course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' and instructor='$user_id' and cloned_id='$get_clone_ides'";
                  $get_insst1 = $connect->prepare($get_ins1);
                  $get_insst1->execute();
                  if ($get_insst1->rowCount() == 0) {
                    if($role!="super admin" && isset($_SESSION['permission']) && $permission['fill_gradsheet'] == "1"){
                    ?>
                    <script>
                      $(document).ready(function() {
                        $(".lockImg").css("display","none");
                        $(".unlockImg").css("display","");
                        $(".myRadio").attr('disabled', true);
                        $(".myRadio1").attr('disabled', true);
                        $(".myRadio2").attr('disabled', true);
                        $("#gradesper").attr('disabled', true);
                        $("#additional_training").attr('disabled', true);
                        $("#Unaccomplish_but").attr('disabled', true);
                        $("#submit_gradsheet_but").attr('disabled', true);
                        $("#f_form").attr('disabled', true);
            $(".decrement").attr('disabled', true);
            $(".increment").attr('disabled', true);
            $(".status_button").attr('disabled', true);
            $(".main_radio").attr('disabled', true);
            $(".append_value").attr('disabled', true);
            $(".over_all_comment_add").attr('disabled', true);
            $("#update_gradsheet_but").attr('disabled', true);
            $("#submit_gradsheet_but").attr('disabled', true);
            $(".status").attr('disabled', true); $(".append_data1").hide();
            $(".append_data1").attr('disabled', true); $(".radio3").attr('disabled', true);
            $("#clearancelogbtn").attr('disabled', true); $("#memologbtn").attr('disabled', true);$("#desclogbtn").attr('disabled', true);
                      });
                    </script>
             <?php     
                  }
                }?>
                  
                

  <script>
    function formatNumber(input) {
      // Format the number with dots
      input.value = input.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }
  </script>
  <?php
  $lock1 = "SELECT * FROM cloned_gradesheet where user_id='$fetchuser_id' and course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' and cloned_id='$get_clone_ides'";
  $lock1st = $connect->prepare($lock1);
  $lock1st->execute();
  if ($lock1st->rowCount() > 0) {
    $re1 = $lock1st->fetchAll();
    foreach ($re1 as $row1) {
      if ($row1['status'] == '1') { ?>
        <script>
          $(document).ready(function() {
            $(".myRadio").attr('disabled', true);
            $(".myRadio1").attr('disabled', true);
            $("#itemtable1 tbody tr").removeAttr("id");
            $(".myRadio2").attr('disabled', true);
            $("#gradesper").attr('disabled', true);
            $("#instructor").attr('disabled', true);
            $("#vechile_dropdown").attr('disabled', true);
            $("#time_filled").attr('disabled', true);
            $("#date_filled").attr('disabled', true);
            $("#submit_gradsheet_but").attr('disabled', true);
            $("#update_gradsheet_but").attr('disabled', true);
            $("#gradesper1").attr('disabled', true);
            $("#gradesper").attr('disabled', true);
            $("#overall_all_com").attr('disabled', true);
            $("#overall_all_com1").attr('disabled', true);
            $("#comment").attr('disabled', true);
            $("#duration-hours").attr('disabled', true);
            $("#duration-minutes").attr('disabled', true);
            $("#f_form").attr('disabled', true);
            $(".decrement").attr('disabled', true);
            $(".increment").attr('disabled', true);
            $(".status_button").attr('disabled', true);
            $(".main_radio").attr('disabled', true);
             $(".append_value").attr('disabled', true);
             $(".append_data1").hide();
            $(".over_all_comment_add").attr('disabled', true);
            $(".radio3").attr('disabled', true);
            $("#clearancelogbtn").attr('disabled', true); $("#memologbtn").attr('disabled', true);$("#desclogbtn").attr('disabled', true);
          });
        </script>
    <?php }
    }
  } else { ?>
    <script>
      $("#additional_training").attr('disabled', true);
      $("#Unaccomplish_but").attr('disabled', true);
    </script>
  <?php }
  ?>


  <script>
    function genCharArray(charA, charZ) {
      var a = [],
        i = charA.charCodeAt(0),
        j = charZ.charCodeAt(0);
      for (; i <= j; ++i) {
        a.push(String.fromCharCode(i));
      }
      return a;
    }
    $(document).on("click","#unlock_gradsheet",function()
	{
    var gradesheetid=$("#gradesheetid").val();
    check_admin_username=$("#check_admin_username").val();
    check_admin_password=$("#check_admin_password").val();
    var get_clone_ides_val=$("#get_clone_ides_val").val();
    var check_admin_reason=$("#check_admin_reason").val();
    const useridlogin=<?php echo $user_id; ?>;
    if(check_admin_username == ""){
      alert("enter admin username");
    }
    if(check_admin_password == ""){
      alert("enter admin password");
    }
    if(check_admin_reason == ""){
      alert("enter admin reason");
    }

      $.ajax({
        type:'POST',
        url:'unlock_admin_gradsheet1.php',
        data:'gradesheetid='+gradesheetid+'&check_admin_username='+check_admin_username+'&check_admin_password='+check_admin_password+'&clone_id='+get_clone_ides_val+'&check_admin_reason='+check_admin_reason+ '&useridlogin=' + useridlogin,
        success:function(response){
          alert(response);
          window.location.reload();
        }
      });

  });	

    $(document).on("click", ".append_data", function() {
      var value = $(this).data("appenditemid");
      var value1 = $(this).data("appenditemname");
      $(".append_value").append(value+value1+"  : <br>");
    });
    
  
    $(document).on("click","#Ask_to_unlock",function()
	{
    const ins = <?php echo $user_id ?>;
      const std = <?php echo $fetchuser_id ?>;
    var class_name=$("#class_name").val();
    var class_id=$("#class_id").val();
    var get_clone_ides_val=$("#get_clone_ides_val").val();
    if(ins){
      $.ajax({
        type:'POST',
        url:'insert_unlock_noti1.php',
        data:'ins='+ins+'&std='+std+'&class_name='+class_name+'&class_id='+class_id+'&clone_id='+get_clone_ides_val,
        success:function(response){
          alert(response);
          window.location.reload();
       
        }
      });
   }
  });


  $(document).on("click","#submitadditional",function()
	{
// alert("hello");
var gradesper=$("#gradsheet_get_id").val();
var std_id=$("#stud_db_id").val();
var get_clone_ides_val=$("#get_clone_ides_val").val();

    var rows = "";
    var names="";
    var id="";
         var values = $('input[name="add_list[]"]').val();
         var arr = [];
   $('input[name="add_list[]"]:checked').each(function(){
	 arr.push({name:this.value,ides:this.id});
	 	});
  //  console.log(arr);
     for (i = 0; i < arr.length; ++i)
		{
      names=arr[i]['name'];
      id=arr[i]['ides'];
      $.ajax({  
                url:"add_additional_task1.php",  
                method:"POST",  
                data:'values='+names+'&id='+id+'&grad_id='+gradesper+'&std_id='+std_id+'&get_clone_ides_val='+get_clone_ides_val,  
                success:function(data){  
                 
                  $('input[name="add_list[]"]').prop('checked', false); 
                    // window.location.reload();
                }  
           });  
    }
  });
	
  $(document).on("click","#submitaccomplish",function()
	{

var gradesper=$("#gradsheet_get_id").val();
var std_id=$("#stud_db_id").val();
var get_clone_ides_val=$("#get_clone_ides_val").val();
    var rows = "";
    var names="";
    var id="";
         var values = $('input[name="add_list_acc[]"]').val();
         var arr = [];
   $('input[name="add_list_acc[]"]:checked').each(function(){
	 arr.push({name:this.value,ides:this.id});
	 	});
  //  console.log(arr);
     for (i = 0; i < arr.length; ++i)
		{
      names=arr[i]['name'];
      id=arr[i]['ides'];
      $.ajax({  
                url:"add_accomplish_task1.php",  
                method:"POST",  
                data:'values='+names+'&id='+id+'&grad_id='+gradesper+'&std_id='+std_id+'&get_clone_ides_val='+get_clone_ides_val,  
                success:function(data){  
                  $('input[name="add_list_acc[]"]').prop('checked', false); 
                    // window.location.reload();
                }  
           });  
    }
  });
  </script>
 
  <script>
    $(document).ready(function() {
      
      $('.main_u').change(function() {
       
        if ($(this).is(':checked')) {
          $('.Myitem').css("background-color", "#ed4c78");
          $('.Myitem').css("color", "white");
          $('.subitem_tr').css("background-color", "#ed4c78");
          $('.subitem_tr').css("color", "white");
      // Find the radio button with the data-value attribute and add the data-checked attribute to it
      $('input[type="radio"][data-value="U"]').prop('checked', true);
    } else {
      // If radioButton1 is not selected, remove the data-checked attribute from the radio button with the data-value attribute
      $('input[type="radio"][data-value="U"]').prop('checked', false);
    }
      });
      $('.main_f').change(function() {
       
        if ($(this).is(':checked')) {
          $('.Myitem').css("background-color", "#f5ca99");
          $('.Myitem').css("color", "white");
          $('.subitem_tr').css("background-color", "#f5ca99");
          $('.subitem_tr').css("color", "white");
      // Find the radio button with the data-value attribute and add the data-checked attribute to it
      $('input[type="radio"][data-value="F"]').prop('checked', true);
    } else {
      // If radioButton1 is not selected, remove the data-checked attribute from the radio button with the data-value attribute
      $('input[type="radio"][data-value="F"]').prop('checked', false);
    }
      });
      $('.main_g').change(function() {
       
       if ($(this).is(':checked')) {
        $('.Myitem').css("background-color", "#71869d");
          $('.Myitem').css("color", "white");
          $('.subitem_tr').css("background-color", "#71869d");
          $('.subitem_tr').css("color", "white");
     // Find the radio button with the data-value attribute and add the data-checked attribute to it
     $('input[type="radio"][data-value="G"]').prop('checked', true);
   } else {
     // If radioButton1 is not selected, remove the data-checked attribute from the radio button with the data-value attribute
     $('input[type="radio"][data-value="G"]').prop('checked', false);
   }
     });
     $('.main_v').change(function() {
       
       if ($(this).is(':checked')) {
        $('.Myitem').css("background-color", "#00c9a7");
          $('.Myitem').css("color", "white");
          $('.subitem_tr').css("background-color", "#00c9a7");
          $('.subitem_tr').css("color", "white");
     // Find the radio button with the data-value attribute and add the data-checked attribute to it
     $('input[type="radio"][data-value="V"]').prop('checked', true);
   } else {
     // If radioButton1 is not selected, remove the data-checked attribute from the radio button with the data-value attribute
     $('input[type="radio"][data-value="V"]').prop('checked', false);
   }
     });
     $('.main_e').change(function() {
       
       if ($(this).is(':checked')) {
        $('.Myitem').css("background-color", "#377dff");
          $('.Myitem').css("color", "white");
          $('.subitem_tr').css("background-color", "#377dff");
          $('.subitem_tr').css("color", "white");
     // Find the radio button with the data-value attribute and add the data-checked attribute to it
     $('input[type="radio"][data-value="E"]').prop('checked', true);
   } else {
     // If radioButton1 is not selected, remove the data-checked attribute from the radio button with the data-value attribute
     $('input[type="radio"][data-value="E"]').prop('checked', false);
   }
     });
     $('.main_n').change(function() {
       
       if ($(this).is(':checked')) {
        $('.Myitem').css("background-color", "white");
          $('.Myitem').css("color", "black");
          $('.subitem_tr').css("background-color", "white");
          $('.subitem_tr').css("color", "black");
     // Find the radio button with the data-value attribute and add the data-checked attribute to it
     $('input[type="radio"][data-value="N"]').prop('checked', true);
   } else {
     // If radioButton1 is not selected, remove the data-checked attribute from the radio button with the data-value attribute
     $('input[type="radio"][data-value="N"]').prop('checked', false);
   }
     });
      $('#U').change(function() {
        $('#dummyModal').modal('show');
      });
      $('#gradesper').on('change', function() {
        var inst_id = $(this).val();
        // console.log(inst_id);
        if (inst_id) {
          $('#silder_get_value').val(inst_id);
        }
      });
      $("#radio").on('click', '#rembtn', function() {
        $(this).closest('tr').remove();
      });

      $("#radio").on('click', '#rembtn1', function() {
        $(this).closest('tr').remove();
      });

      $("#radio").on('click', '#rembtn2', function() {
        $(this).closest('tr').remove();
      });

    });
  </script>

  <!--Search for additional training-->
  <script>
    function item() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("itemsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("itemtablesearch");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
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
    function accomplish_task() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("accomplishsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("selectsubitemtable");
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
    function additional_task() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("additionalsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("itemtablesearch");
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
    document.getElementById('select-all').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  <script>
    document.getElementById('select-all-item').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  <script>
    document.getElementById('select-all-subitem').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  <!--check uncheck code for item grades-->
  <script>
    document.querySelectorAll(
      'input[type=radio]').forEach((elem) => {
      elem.addEventListener('click', allowUncheck);
      // only needed if elem can be pre-checked
      elem.previous = elem.checked;
    });

    function allowUncheck(e) {
      if (this.previous) {
        this.checked = false;
      }
      // need to update previous on all elements of this group
      // (either that or store the id of the checked element)
      document.querySelectorAll(
        `input[type=radio][type=${this.type}]`).forEach((elem) => {
        elem.previous = elem.checked;
      });
    }
  </script>


  <script>
  
    $(document).on("keyup", "#gradesper", function() {
      var val = $(this).val();
      var gradesper = $("#gradsheet_get_id").val();
      var get_clone_ides_val=$("#get_clone_ides_val").val();

      if (val >= 101) {
        alert("enter marks under 100..");
        $("#submit_gradsheet_but").attr('disabled', true);
      } else {
        $("#submit_gradsheet_but").attr('disabled', false);
      }
      if (val) {
        $.ajax({
          type: 'POST',
          url: '../fetch_mark_color.php',
          data: 'val=' + val,
          success: function(response) {
            
            if (response == "U") {
              $("#update_gradsheet_but").attr('disabled', false);
                 $("#submit_gradsheet_but").attr('disabled', false);
              document.querySelector('#U').checked = true;
              document.querySelector('#F').readOnly = true;
              document.querySelector('#G').readOnly = true;
              document.querySelector('#V').readOnly = true;
              document.querySelector('#E').readOnly = true;
              document.querySelector('#N').readOnly = true;
              document.querySelector('#U1').style.color = '#ed4c78';
              document.querySelector('#U1').style.fontSize = 'larger';
              document.querySelector("#gradesper").style.backgroundColor = '#ed4c78';
              document.querySelector("#gradesper").style.fontSize = 'larger';
              document.querySelector("#gradesper").style.fontWeight = 'bolder';
            }
            if (response == "F") {
              $("#update_gradsheet_but").attr('disabled', false);
                 $("#submit_gradsheet_but").attr('disabled', false);
              document.querySelector('#F').checked = true;
              document.querySelector('#U').readOnly = true;
              document.querySelector('#G').readOnly = true;
              document.querySelector('#V').readOnly = true;
              document.querySelector('#E').readOnly = true;
              document.querySelector('#N').readOnly = true;
              document.querySelector('#F1').style.color = '#f5ca99';
              document.querySelector('#F1').style.fontSize = 'larger';
              document.querySelector("#gradesper").style.backgroundColor = '#f5ca99';
              document.querySelector("#gradesper").style.fontSize = 'larger';
              document.querySelector("#gradesper").style.fontWeight = 'bolder';
            }
            if (response == "G") {
              $("#update_gradsheet_but").attr('disabled', false);
                 $("#submit_gradsheet_but").attr('disabled', false);
              document.querySelector('#G').checked = true;
              document.querySelector('#U').readOnly = true;
              document.querySelector('#F').readOnly = true;
              document.querySelector('#V').readOnly = true;
              document.querySelector('#E').readOnly = true;
              document.querySelector('#N').readOnly = true;
              document.querySelector('#G1').style.color = '#71869d';
              document.querySelector('#G1').style.fontSize = 'larger';
              document.querySelector("#gradesper").style.backgroundColor = '#71869d';
              document.querySelector("#gradesper").style.fontSize = 'larger';
              document.querySelector("#gradesper").style.fontWeight = 'bolder';
            }
            if (response == "V") {
              $("#update_gradsheet_but").attr('disabled', false);
                 $("#submit_gradsheet_but").attr('disabled', false);
              document.querySelector('#V').checked = true;
              document.querySelector('#U').readOnly = true;
              document.querySelector('#G').readOnly = true;
              document.querySelector('#F').readOnly = true;
              document.querySelector('#E').readOnly = true;
              document.querySelector('#N').readOnly = true;
              document.querySelector('#V1').style.color = '#00c9a7';
              document.querySelector('#V1').style.fontSize = 'larger';
              document.querySelector("#gradesper").style.backgroundColor = '#00c9a7';
              document.querySelector("#gradesper").style.fontSize = 'larger';
              document.querySelector("#gradesper").style.fontWeight = 'bolder';
            }
            if (response == "E") {
              // alert(response);
              $.ajax({
              type: 'POST',
              url: 'check_permission1.php',
              data:{
                val1:gradesper,
                clone_id:get_clone_ides_val,
              },
              success: function(html) {
         
               if(html==0){
                  // $("#ask_mark_per1").show();
                 $("#update_gradsheet_but").attr('disabled', true);
                 $("#submit_gradsheet_but").attr('disabled', true);
               }
              }
            });
              document.querySelector('#E').checked = true;
              document.querySelector('#U').readOnly = true;
              document.querySelector('#G').readOnly = true;
              document.querySelector('#V').readOnly = true;
              document.querySelector('#F').readOnly = true;
              document.querySelector('#N').readOnly = true;
              document.querySelector('#E1').style.color = '#377dff';
              document.querySelector('#E1').style.fontSize = 'larger';
              document.querySelector("#gradesper").style.backgroundColor = '#377dff';
              document.querySelector("#gradesper").style.fontSize = 'larger';
              document.querySelector("#gradesper").style.fontWeight = 'bolder';
            }
            if (response == "N") {
              $("#update_gradsheet_but").attr('disabled', false);
                 $("#submit_gradsheet_but").attr('disabled', false);
              document.querySelector('#N').checked = true;
              document.querySelector('#U').readOnly = true;
              document.querySelector('#G').readOnly = true;
              document.querySelector('#V').readOnly = true;
              document.querySelector('#F').readOnly = true;
              document.querySelector('#E').readOnly = true;
              document.querySelector('#N1').style.color = 'black';
              document.querySelector('#N1').style.fontSize = 'larger';
              document.querySelector("#gradesper").style.backgroundColor = 'black';
              document.querySelector("#gradesper").style.fontSize = 'larger';
              document.querySelector("#gradesper").style.fontWeight = 'bolder';
            }
          }
        });
      }
    });
    $(document).on("click", "#ask_permssion_marks", function() {
      const user_ID = <?php echo $user_id ?>;
      const std = <?php echo $fetchuser_id ?>;
  var class_name = $("#class_name").val();
  var class_id = $("#class_id").val();
 var get_clone_ides_val=$("#get_clone_ides_val").val();
  $.ajax({
          type: 'POST',
          url: 'ask_perm_grade1.php',
          data: 'std=' + std+'&inst='+user_ID+'&class_name='+class_name+'&class_id='+class_id+'&cl_id='+get_clone_ides_val,
          success: function(response) {
           alert(response);
            //  $("#ask_mark_per1").show();
            //  $("#update_gradsheet_but").attr('disabled', true);
            //  $("#submit_gradsheet_but").attr('disabled', true);
          
          }
        });
});
  </script>
 <script>
    setTimeout(function() {
      document.getElementById('info-gradesheet').style.display = 'none';
      /* or
      var item = document.getElementById('info-message')
      item.parentNode.removeChild(item);
      */
    }, 4000);
  </script>
  