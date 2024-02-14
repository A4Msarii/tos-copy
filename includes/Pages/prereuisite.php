<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$class="";


?>
<!DOCTYPE html>
<html>
<head>
  <title>Prerequisites</title>
 <meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />

                   <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>
<style type="text/css">
  tr:hover {
          background-color: #accbec6b;
        }
</style>
<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>



<div id="header-hide">
<?php
include(ROOT_PATH.'includes/head_navbar.php');
?>
</div>
<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">Prerequisites</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <!-- Body -->
            <div class="card-body">
              
              <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#prere">Prereuisite</button> -->
              <table class="table table-bordered table-striped" id="myTable">
                <thead class="bg-dark">
                  <tr>
                    <th class="text-white">Symbol</th>
                    <th class="text-white">Days</th>
                    <th class="text-white">Prerequisites</th>
                    <th class="text-white">All Prerequisites</th>
                  </tr>
                </thead>
                <?php
             
                if(isset($fixed_ctp_id)){
                  $get_ctp="";
                   $_SESSION['pre_ctp']=$get_ctp=$fixed_ctp_id;
                }else if(isset($_SESSION['pre_ctp'])){
                  $get_ctp=$_SESSION['pre_ctp'];
                }
                $fet = "SELECT id,symbol,days,'actual' AS table_name FROM actual where ctp='$get_ctp' UNION ALL SELECT id,shortsim,days,'sim' AS table_name FROM sim where ctp='$get_ctp' UNION ALL SELECT id,shortacademic,days,'academic' AS table_name FROM academic where ctp='$get_ctp' UNION ALL SELECT id,shorttest,days,'test' AS table_name FROM  test where ctp='$get_ctp'ORDER BY CASE WHEN days THEN days ELSE symbol END";
                $st = $connect->prepare($fet);
                $st->execute();
                if($st->rowCount() > 0)
                 {
                   $re = $st->fetchAll();
                   $sn1=1;
                   foreach($re as $row)
                   {
                   
                    $symbol_id=$row["id"];
                    $table_name=$row["table_name"];
                
                ?>   
                           
                  <tr>
                    <td><?php echo $class=$row["symbol"];?></td>
                     <td>
                    <?php 
                  
                    $select_date= $connect->prepare("SELECT `days` FROM $table_name WHERE id=?");
                    $select_date->execute([$symbol_id]);
                     $dates= $select_date->fetchColumn();
                    if($dates!=""){
                      echo $dates;?>

                   <?php }else{
                      echo "--"; 
                    }

                    ?>
                    <a href="" style="margin: 5px;" onclick="document.getElementById('pre_id1').value='<?php echo $symbol_id ?>';document.getElementById('class_id1').value='<?php echo $table_name?>';" type="button" data-bs-toggle="modal" data-bs-target="#prere_day" style="color:blue;"><i class="bi bi-pen-fill text-success"></i></a>

                     </td>
                     <td>
                      <a onclick="document.getElementById('pre_id').value='<?php echo $symbol_id ?>';document.getElementById('class_id').value='<?php echo $table_name?>';" type="button" data-bs-toggle="modal" data-bs-target="#prere" style="color:blue;"><?php echo $row["symbol"];?></a>
                        
                      </td>
                      <td>
                        <?php
                        
                        $fet="SELECT * FROM prereuisite_data WHERE class_id='$symbol_id' AND class_table='$table_name' group by class_id,class_table,id";
                        
                        $statement = $connect->prepare($fet);
                            $statement->execute();  
                            $result = $statement->fetchAll();
                            foreach($result as $row1)
                            {
                              $pre_id=$row1["id"]; 
                              $name111="";
                              $symbol_id1=$row1["prereui_id"];
                               $table_name1=$row1["prereui_table"];
                               if($symbol_id1!="" && $table_name1!=""){
                               if($table_name1=="actual"){
                               $qu_ery_1 = $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                               }else if($table_name1=="sim"){
                               $qu_ery_1 = $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                                  }else if($table_name1=="academic"){
                                    $qu_ery_1 = $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                                       }else if($table_name1=="test"){
                                        $qu_ery_1 = $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                                           }
                                                $qu_ery_1->execute([$symbol_id1]);
                                                $name111 = $qu_ery_1->fetchColumn();
                                          }?>
                                                <ul style=" list-style-type: none; display: block;">
                                                  <li style="text-decoration: none;"><?php echo $name111 ; ?>
                                                    <a href="delete_prereuisite.php?id=<?php echo $pre_id?>"><i class="bi bi-x-circle"></i></a>
                                                  </li>

                                                  </ul>
                       <?php      }
                            ?>
                      </td>
                   
                  </tr>
                
                <?php
              }
            }
                
                ?>
              </table> 

           
             
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->
</main>

<!-- Modal -->
<div class="modal fade" id="prere" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Select Prerequisites</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="pre_id" name="pre_id" > 
              <input type="hidden" name="class" id="class_id">
              <br>
        <table class="table table-bordered table-striped" id="preretable">
          <input style="margin:5px;" class="form-control" type="text" id="presearch" onkeyup="prereui()" placeholder="Search for Preruisites" title="Type in a name">
                <thead class="bg-dark">
                  <tr>
                    <th class="text-white">Sr. NO</th>
                    <th class="text-white"><input type="checkbox" id="select-all-pre"></th>
                    <th class="text-white">Prerequisites</th>
                  </tr>
                </thead> 
                <?php
                $fet ="SELECT id,symbol,'actual' AS table_name FROM actual where ctp='$get_ctp' UNION ALL SELECT id,shortsim,'sim' AS table_name FROM sim where ctp='$get_ctp' UNION ALL SELECT id,shortacademic,'academic' AS table_name FROM academic where ctp='$get_ctp' UNION ALL SELECT id,shorttest,'test' AS table_name FROM  test where ctp='$get_ctp'";
                $st = $connect->prepare($fet);
                $st->execute();
                if($st->rowCount() > 0)
                 {
                   $re = $st->fetchAll();
                   $sn1=1;
                    foreach($re as $row)
                   {
                 ?>              
                  <tr>
                    <td><?php echo $sn1++?></td>
                    <td>
                      <?php
                      $ides=$row["id"];
                      $table1=$row["table_name"];
                      ?>
                
                    <input type="checkbox" name="prereui[]" class="get_value" id="<?php echo $ides ?>" value="<?php echo $table1?>"></td>
                    <td><?php echo $row["symbol"];?></td>
                  </tr>
                
                <?php
              } 
            }
        //  }
                ?>
              </table> 
              <input type="button" name="sub" value="submit" id="pre_submit" class="btn btn-success">
    </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<div class="modal fade" id="prere_day" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Prerequisites</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="edit_days_pre.php" method="post">
        <input type="text" name="days1" class="form-control" id="days1" placeholder="Enter Days" required>
          <input type="hidden" id="pre_id1" name="pre_id1" > 
              <input type="hidden" name="class1" id="class_id1">
              <br>
         <input type="submit" name="sub" value="submit" class="btn btn-success">
          </form>
    </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>


<script>
function prereui() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("presearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("preretable");
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
function myFunction(element, event)
{
  var result = document.getElementById('JSResult');
  while(result.firstChild) result.removeChild(result.firstChild);
  var values = [];
  for (var i = 0; i < element.options.length; i++) {
    if (element.options[i].selected) {
      var li = document.createElement('li');
      li.appendChild(document.createTextNode(element.options[i].value));
      result.appendChild(li);
    }
  }
}
function myFunctionBlur(element, event)
{
  var result = document.getElementById('JSResultBlur');
  while(result.firstChild) result.removeChild(result.firstChild);
  var values = [];
  for (var i = 0; i < element.options.length; i++) {
    if (element.options[i].selected) {
      var li = document.createElement('li');
      li.appendChild(document.createTextNode(element.options[i].value));
      result.appendChild(li);
    }
  }
}
</script>
<script> 
  $(document).on("click","#pre_submit",function(){
    
    // var days=$("#days").val();
    // if(days == ""){
    //   alert("please fill date");
    // }
    
    var pre_id=$("#pre_id").val();
    
    var class_id=$("#class_id").val();
  
    var rows = "";
    var names="";
    var id="";
         var values = $('input[name="prereui[]"]').val();
          var arr = [];
   $('input[name="prereui[]"]:checked').each(function(){
			 arr.push({name:this.value,ides:this.id});
		});
   
     for (i = 0; i < arr.length; ++i)
		{
      names=arr[i]['name'];
      id=arr[i]['ides'];
      $.ajax({  
                url:"check_pre.php",  
                method:"POST",  
                data:'values='+names+'&id='+id+'&pre_id='+pre_id+'&class_id='+class_id,  
                success:function(data){  
              
                  window.location.reload();
                }  
           });  
    }
   
     
           });  
 
 </script>  

 <script>
$(document).ready(function(){
      
      

         $("#myTable").on("change","select",function(){
                var Class1;
                var Class1 = this.className;
                var cat_Sel = $(this).val();
                // var dis_Ctp1= $("#ctp_value").val();
                
                //alert(cat_Sel);
                     
            
        });
      });
  
</script>

<script>
  document.getElementById('select-all-pre').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}
</script>


 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>