
<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');

$phase_id="";

$phase_name="";
$symbol="";
$ctp_name="";

 if(isset($_GET['class_id']) && isset($_GET['class'])){
                      $_SESSION['item_class_id']=$class_id=urldecode(base64_decode($_GET['class_id']));
                      $_SESSION['item_class']=$class=$_GET['class'];
                      $class_data = "SELECT * FROM $class where id='$class_id'";
                      $statement = $connect->prepare($class_data);
                      $statement->execute();
                      if($statement->rowCount() > 0)
                        {
                          $result = $statement->fetchAll();
                          $sn=1;
                          foreach($result as $row)
                          {
                            if($class=='actual'){
                            $symbol=$row['symbol'];
                          }else{
                            $symbol=$row['shortsim']; 
                          }
                          }
                        }
                    }else if(isset($_SESSION['item_class_id']) && isset($_SESSION['item_class'])){
                     $class_id=$_SESSION['item_class_id'];
                     $class=$_SESSION['item_class'];

                      $class_data = "SELECT * FROM $class where id='$class_id'";
                     $class_data;
                      $statement = $connect->prepare($class_data);
                      $statement->execute();
                      if($statement->rowCount() > 0)
                        {
                          $result = $statement->fetchAll();
                          $sn=1;
                          foreach($result as $row)
                          {
                            if($class=='actual'){
                            $symbol=$row['symbol'];
                          }else{
                            $symbol=$row['shortsim']; 
                          }
                          }
                        }
                    }else{
                      $class_id="class not selected";
                      $class="class name is not set";
                    }
                    if(isset($_GET['phase_id'])){
                      $_SESSION['item_phase_id']=$phase_id=urldecode(base64_decode($_GET['phase_id']));
                    
                      $phase= "SELECT * FROM phase where id='$phase_id'";
                      $statement = $connect->prepare($phase);
                      $statement->execute();
                       
                      if($statement->rowCount() > 0)
                        {
                          $result = $statement->fetchAll();
                          $sn=1;
                          foreach($result as $row)
                          {
                          $phase_name=$row['phasename'];
                          }
                        }
                    }else if(isset($_SESSION['item_phase_id'])){
                      $phase_id=$_SESSION['item_phase_id'];
                      $phase= "SELECT * FROM phase where id='$phase_id'";
                      $statement = $connect->prepare($phase);
                      $statement->execute();
                       
                      if($statement->rowCount() > 0)
                        {
                          $result = $statement->fetchAll();
                          $sn=1;
                          foreach($result as $row)
                          {
                          $phase_name=$row['phasename'];
                          }
                        }
                    }else{$phase_id="phase not selected";}
                    if(isset($_GET['ctp'])){
                      $_SESSION['item_ctp']=$ctp=urldecode(base64_decode($_GET['ctp']));
                      $ctp_value= "SELECT * FROM ctppage where CTPid='$ctp'";
                      $statement = $connect->prepare($ctp_value);
                      $statement->execute();
                       
                      if($statement->rowCount() > 0)
                        {
                          $result = $statement->fetchAll();
                          $sn=1;
                          foreach($result as $row)
                          {
                          $ctp_name=$row['course'];
                          }
                        }
                    }elseif($_SESSION['item_ctp']){
                      $ctp=$_SESSION['item_ctp'];
                      $ctp_value= "SELECT * FROM ctppage where CTPid='$ctp'";
                      $statement = $connect->prepare($ctp_value);
                      $statement->execute();
                       
                      if($statement->rowCount() > 0)
                        {
                          $result = $statement->fetchAll();
                          $sn=1;
                          foreach($result as $row)
                          {
                          $ctp_name=$row['course'];
                          }
                        }
                    }else{$ctp="ctp not selected";}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New One</title>

</head>
<body>
<?php
include 'head-navbar.php';
?>

<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 22rem;">

      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">
    <!--1st row-->
      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h4>Class : <span style="color:blue; text-decoration: underline;"><?php echo $symbol?></span></h4>
               <h4>Phase : <span style="color:blue; text-decoration: underline;"><?php echo $phase_name?></span></h4>
               <h4>Course : <span style="color:blue; text-decoration: underline;"><?php echo $ctp_name?></span></h4>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <ul class="nav nav-pills justify-content-center" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link text-success" id="gradesheet-tab" href="#gradesheet" data-bs-toggle="pill" data-bs-target="#gradesheet" role="tab" aria-controls="gradesheet" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Create Gradesheet
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-success" id="item-tab" href="#item" data-bs-toggle="pill" data-bs-target="#item" role="tab" aria-controls="item" aria-selected="true">
                      <div class="d-flex align-items-center">
                        Item
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-success" id="subitem-tab" href="#subitem" data-bs-toggle="pill" data-bs-target="#subitem" role="tab" aria-controls="subitem" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Subitem
                      </div>
                    </a>
                  </li>
                </ul>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <!--2nd row-->
      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">

            <!-- Body -->
            <div class="card-body">
              <center>
              <div class="tab-content">

                  <div class="tab-pane fade show active" id="gradesheet" role="tabpanel" aria-labelledby="gradesheet-tab">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#item-bank" id="student_details" onclick="itembtn();">Select Item</button>
                    <button class="btn btn-success" type="button" onclick="subitembtn();">Select Subitem</button>
                    <button class="btn btn-success" onclick="listbtn();">List of All</button>
                  </div>

                  <!--Item Tabs-->
                  <div class="tab-pane fade" id="item" role="tabpanel" aria-labelledby="item-tab">
                    <!-- <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#add_item">Add New Item</button> -->
                    <div class="container">
                      <!--insert item form-->
                      <div class="row">
                        
                        <form action="insert_item.php" method="post">
                          <table class="table" id="item_form_table1">
                            <tr>
                              <td><input type="text" id="item_field" name="item[]" class="form-control" placeholder="Insert Item" /></td>
                              <td><button type="button" name="item1" id="item1" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                            </tr>
                          </table>
                          <input class="btn btn-success btn-md" type="submit" value="Submit" name="Insert_item" />
                        </form>
                      
                      </div><hr>
                      <!--Item Table-->
                      <div class="row">
                      <table class="table table-striped table-bordered" id="itemtable">
                        <input style="margin:5px;" class="form-control" type="text" id="itemsearch" onkeyup="item()" placeholder="Search for Item name.." title="Type in a name">
                        <thead class="bg-dark">
                          <th class="text-light">Sr No</th>
                          <th class="text-light">Item</th>
                          <th class="text-light">Action</th>
                        </thead>
                          <?php 
                            // $output ="";
                            $itemq = "SELECT * FROM itembank  ORDER BY id ASC";
                            $itemst1 = $connect->prepare($itemq);
                            $itemst1->execute();
                            if($itemst1->rowCount() > 0)
                              {
                                $itemresul1 = $itemst1->fetchAll();
                                $sn=1;
                                foreach($itemresul1 as $row)
                                {
                          ?>
                            <tr>
                              <td><?php echo $sn++;$id=$row['id'] ?></td>
                              <td><?php echo $row['item'] ?></td>
                              <td><a onclick="document.getElementById('item_id').value='<?php echo $id=$row['id'] ?>';
                                    document.getElementById('item_name').value='<?php echo $row['item']; ?>';
                                    " data-bs-toggle="modal" data-bs-target="#edititem"><i class="bi bi-pen-fill text-success"></i></a>
                                  </a>
                                  <a href="item_delete.php?id=<?php echo $id?>"><i class="bi bi-trash-fill text-danger"></i></a>
                              </td>
                            </tr>
                            <?php
                              }
                                                    
                              }        
                            ?>      
                        </table>
                    </div>
                  </div>
                    <!-- <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#item_table">Item List</button> -->
                  </div>

                  <div class="tab-pane fade" id="subitem" role="tabpanel" aria-labelledby="subitem-tab">
                    <!-- <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#add_subitem">Add New Subitem</button> -->
                    <!-- <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#subitem_table_list">Subitem List</button> -->
                    <div class="container">
                      <!--subitem insert form-->
                      <div class="row">
                        <center>
                        <form action="insert_subitem.php" method="post">
                          <table class="table" id="subitem_form_table1">
                            <tr>
                              <td><input type="text" id="subitem_feild" name="subitem[]" class="form-control" placeholder="Insert SubItem" /></td>
                              <td><button type="button" name="subitem1" id="subitem1" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                            </tr>
                          </table>
                          <input class="btn btn-success btn-md" type="submit" value="Submit" name="Insert_subitem" />
                        </form>
                      </center>
                      </div><hr>
                      <!--subitem table-->
                      <div class="row">
                        <table class="table table-striped table-bordered" id="subitemtable">
                          <input style="margin:5px;" class="form-control" type="text" id="subitemsearch" onkeyup="subitem()" placeholder="Search for Subitem name.." title="Type in a name">
                          <thead class="bg-dark">
                            <th class="text-light">Sr No</th>
                            <th class="text-light">SubItem</th>
                            <th class="text-light">Action</th>
                          </thead>
                            <?php 
                              // $output ="";
                              $subitemq = "SELECT * FROM sub_item  ORDER BY id ASC";
                              $subitemst1 = $connect->prepare($subitemq);
                              $subitemst1->execute();
                              if($subitemst1->rowCount() > 0)
                                {
                                  $subitemresul1 = $subitemst1->fetchAll();
                                  $sn=1;
                                  foreach($subitemresul1 as $row)
                                  {
                            ?>
                              <tr>
                                <td><?php echo $sn++;$id=$row['id'] ?></td>
                                <td><?php echo $row['subitem'] ?></td>
                                <td><a onclick="document.getElementById('subitem_id').value='<?php echo $id=$row['id'] ?>';
                                      document.getElementById('subitem_name').value='<?php echo $row['subitem']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#editsubitem"><i class="bi bi-pen-fill text-success"></i></a>
                                    </a>
                                    <a href="subitem_delete.php?id=<?php echo $id?>"><i class="bi bi-trash-fill text-danger"></i></a>
                                </td>
                              </tr>
                              <?php
                                }
                                                      
                                }        
                              ?>      
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
              </center>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- 2nd End Row -->

      <!--3rd row-->
      <div class="row justify-content-center" id="selecteditemrow">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">

            <!-- Body -->
            <div class="card-body">
              <form method="get" action="form_submit.php">
               <h4>Selected Items </h4>
                  <?php 
                if(isset($_REQUEST['itemcheck'])){
                  $sn=1;
                  $get_id_item=$_REQUEST['itemcheck'];
                    foreach($get_id_item as $key=>$get_id_items){
                      $item_db_id=$get_id_items;?>
                      <table class="table table-bordered table-striped" style="border-collapse: separate;border-spacing: 10px; width: max-content;" >
                    
                        <tr style="border: 1px solid black;">
                          <td>
                          <?php  
                          $item_name= $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                          $item_name->execute([$get_id_items]);
                          $get_name = $item_name->fetchColumn();
                          echo $sn++.") ".$item_id=$get_name;
                          ?>
                            <input type="hidden" name="items_id[]" value="<?php echo $item_id?>">
                                   <input type="hidden" name="std_idies[]" value="<?php echo $item_db_id?>">
                                   <input type="hidden" name="std_sub[]" value="item">
                          </td>
                        </tr>
                      
                     </table>
                      
                <?php     }
                  }
                    ?>
               
             <center>
            <input style="margin:10px;" type="submit" class="btn btn-success" name="save" onclick="submititem();"></center>
      <input type="hidden" value="<?php echo $class_id?>" name="class_id">
      <input type="hidden" value="<?php echo $phase_id?>" name="phase_id">
      <input type="hidden" value="<?php echo $ctp?>" name="ctp_id1">
      <input type="hidden" value="<?php echo $class?>" name="class">
        </form>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- 3rd End Row -->

      <!--4th row-->
      <center>
      <div class="row justify-content-center" id="selectsubitemrow" style="display:none;">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">

            <!-- Body -->
            <div class="card-body" style="text-align:left;">
              <form method="get" action="form_submit.php">
        
   <h4>Select Subitem According to the Item</h4>
        
        <?php     
          $q2="SELECT * FROM item where course_id='$ctp' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class'";
          $st2 = $connect->prepare($q2);
          $st2->execute();
          
           if($st2->rowCount() > 0)
               {
                   $re2 = $st2->fetchAll();
                   $sn1=1;
                 foreach($re2 as $row2)
                   {
                    $get_id_items=$row2['item'];
                    ?>
                    <table class="table table-bordered table-striped" style="border-collapse: separate;border-spacing: 10px; width: max-content;">
                    <tr>
                    <td class="<?php echo $get_id_items?>">
                    <?php  
                      $item_name= $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                      $item_name->execute([$get_id_items]);
                      $get_name = $item_name->fetchColumn();
                     echo  $sn1++.") ".$item_id=$get_name;
                      ?>
                    
                    <input type="hidden" name="items_id[]" value="<?php echo $item_id?>">
                                 <input type="hidden" name="std_idies[]" value="<?php echo $item_db_id?>">
                                 <input type="hidden" name="std_sub[]" value="item">
                <button type="button" onclick="document.getElementById('get_item_id').value='<?php echo $get_id_items ?>';" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#insert_subitem" id="subitem_but<?php echo $get_id_items?>">
                  subitem
               </button>
             </td>
                   </tr>
                 </table>
                  
                  <?php  }
               
               }

            ?>
       
     
    <input style="margin:10px;" type="submit" class="btn btn-success" name="save">
<input type="hidden" value="<?php echo $class_id?>" name="class_id">
<input type="hidden" value="<?php echo $phase_id?>" name="phase_id">
<input type="hidden" value="<?php echo $ctp?>" name="ctp_id1">
<input type="hidden" value="<?php echo $class?>" name="class">
</form>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
    </center>
      <!--4th End Row -->

      <!--5th row-->
      <center>
      <div class="row justify-content-center" style="display:none;" id="list-all">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">

            <!-- Body -->
            <div class="card-body">
              <h4>All list</h4>
        
        <?php     
          $q2="SELECT * FROM item where course_id='$ctp' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class'";
          $st2 = $connect->prepare($q2);
          $st2->execute();
          
           if($st2->rowCount() > 0)
               {
                   $re2 = $st2->fetchAll();
                   $sn1=1;
                 foreach($re2 as $row2)
                   {
                    $get_id_items=$row2['item'];
                    ?>
                    <table class="table table-bordered table-striped" style="border-collapse: separate;border-spacing: 10px; width: max-content;">
                    <tr>
                    <td>
                    <?php  
                      $item_name= $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                      $item_name->execute([$get_id_items]);
                      $get_name = $item_name->fetchColumn();
                      echo  $sn1++.") ".$item_id=$get_name;
                     $sel_sub="SELECT * FROM subitem where item='$get_id_items' AND course_id='$ctp' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class'";
                     $sel_subst2 = $connect->prepare($sel_sub);
                     $sel_subst2->execute();
                    
                      if($sel_subst2->rowCount() > 0)
                          {
                              $re3 = $sel_subst2->fetchAll();
                              $sn2='a';
                            foreach($re3 as $row3)
                              {
                               echo '<dd style="margin-left:40px"><br>'.$sn2++.') '.$row3['subitem'].'</dd>';
                              }
                            }
                      ?>
                    </td>
                   
                   </tr>
                 </table>
                  
                  <?php  }
               
               }

            ?>
       
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
    </center>
      <!--5th End Row -->

      <!--6th row-->
      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">

            <!-- Body -->
            <div class="card-body">
              
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!--6th End Row -->
    </div>
    <!-- End Content -->
</main>

<!--select item to the table-->
<div class="modal fade" id="item-bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Item Bank</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="get">
        <table class="table table-bordered src-table1">
              <thead>
                <tr>
                  <th><input type="checkbox" id="select-all-item"></th>
                  <th>Id</th>
                  <th>Item</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php 

                $item_sel = "SELECT * FROM itembank";
                $item_selst = $connect->prepare($item_sel);
                $item_selst->execute();
                
                if($item_selst->rowCount() > 0)
                  {  
                  $students = $item_selst->fetchAll();
                   
                  $i = 0;
                  $sn=1;
                  foreach($students as $student)
                  {
                    $check_id=$student['id'];
                    $checkitem_sel = "SELECT * FROM item where item='$check_id' AND course_id='$ctp' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class'";
                    $checkitem_selst = $connect->prepare($checkitem_sel);
                    $checkitem_selst->execute();

                   
                    if($checkitem_selst->rowCount() <= 0)
                      {
                    
                      ?> 
                    <tr>
                    <td><input type="checkbox" class="get_value" name="itemcheck[]" value="<?php echo $student['id']?>"/></td>
                    <td><?php echo $sn++;?></td>
                      <td><?php echo $student['item'];?></td>
                     </tr>
                    <?php
                    $i++;
                  }
                }
              }
                ?>
                      
              </tbody>
            </table>
          
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success" id="submit">Select</button>
            </form>
      </div>
    </div>
  </div>
</div>

<!--Subitem modal-->
<div class="modal fade" id="insert_subitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Subitem Bank</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
          </div>
          <div class="modal-body">
            <input type="text" value="" id="get_item_id" hidden>
            <table class="table table-bordered src-table2">
              <thead>
                <tr>
                  <th><input type="checkbox" id="select-all-subitem"></th>
                  <th>ID</th>
                  <th>Name</th>
      
                </tr>
              </thead>
              <tbody>
                <?php 
                 $subitem_sel = "SELECT * FROM sub_item";
                 $subitem_selst = $connect->prepare($subitem_sel);
                 $subitem_selst->execute();
                 
                 if($subitem_selst->rowCount() > 0)
                   {
                  $jobs = $subitem_selst->fetchAll();
                  $j = 1;
                  $totalJobs = count($jobs);
                  foreach($jobs as $job)
                  {
                    
                    ?>
                    <tr>
                      <td><input type="checkbox" name="subcheck[]" id="<?php echo $job['id'] ?>" value="<?php echo $job['subitem'];?>"/></td>
                      <td><?php echo $job['id'];?></td>
                      <td><?php echo $job['subitem'];?></td>
                    </tr>
                    <?php
                    $j++;
                  }
                }
              
                ?>      
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" id="get_subitem">Select</button>
          </div>
        </div>
      </div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function subitembtn() {
  var z = document.getElementById("selectsubitemrow");
  if (z.style.display === "none") {
    z.style.display = "block";
  } else {
    z.style.display = "none";
  
  }
}

</script>

<script>
function listbtn() {
  var a = document.getElementById("list-all");
  if (a.style.display === "none") {
    a.style.display = "block";
  } else {
    a.style.display = "none";
  
  }
}

</script>

<script type="text/javascript">
    $(document).ready(function()
      {

     
          var html9 = '<tr>\
                        <td><input type="text" id="item_field" name="item[]" class="form-control form-control-md" placeholder="Insert Item" /></td>\
                        <td><button type="button" name="item" id="remove_item" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
          var max9 = 100;
          var a9 = 1;

          $("#item1").click(function()
          {
              if(a9 <= max9)
              {
                  $("#item_form_table1").append(html9);
                  a9++;
              }
          });
          $("#item_form_table1").on('click','#remove_item',function()
          {
              $(this).closest('tr').remove();
              a9--;
          });
    });
 </script>

  <!--subitem increament-->
<script type="text/javascript">
    $(document).ready(function()
      {

     
          var htmls = '<tr>\
                        <td><input type="text" id="subitem_field" name="subitem[]" class="form-control form-control-md" placeholder="Insert SubItem" /></td>\
                        <td><button type="button" name="subitem" id="remove_subitem" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
          var maxs = 100;
          var as = 1;

          $("#subitem1").click(function()
          {
              if(as <= maxs)
              {
                  $("#subitem_form_table1").append(htmls);
                  as++;
              }
          });
          $("#subitem_form_table1").on('click','#remove_subitem',function()
          {
              $(this).closest('tr').remove();
              as--;
          });
    });
 </script>

  <script>
 $(document).on("click","#get_subitem",function()
  {
  // alert("hello");
  var rows = "";
   var class_name=$("#get_item_id").val();
  // alert(class_name);
   var values = $('input[name="subcheck[]"]').val();
   var arr = [];
   $('input[name="subcheck[]"]:checked').each(function() {
       arr.push({name:this.value,ides:this.id});
    });
  //  console.log(arr);
   var alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
  for (i = 0; i < arr.length; ++i)
    {
      
  
      rows+='<input type="hidden" name="std_idies[]" value="'+class_name+'">\
      <input type="hidden" name="std_sub[]" value="'+arr[i]['name']+'"> <dd style="margin-left:40px">'+alphabet[i]+') '+arr[i]['name']+'</dd>';
    
    }
    $("."+class_name).append(rows);
    $('input[name="subcheck[]"]').removeAttr('checked');
    // $("dt .+"class_name).on('click','#remove_test',function()
    //    {
    //      $(this).closest('tr').remove();
    //      i--;
    //    });
  });

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

<script src="loading.js"></script>

 <footer id="content1" role="footer" class="footer">

              <?php
              include 'footer2.php';
              ?>


</footer>
</body>
</html>