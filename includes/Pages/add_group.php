<?php
include('../../includes/config.php');
  include(ROOT_PATH.'includes/connect.php');
?>

<!DOCTYPE html>
  <html>
  <head>
    <title>Add Group</title>
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
  $course="";
  $ctp="";
  ?></div>
<!--Input Phases-->
<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-primary">Add Group</h1>
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
            <!-- Header -->
            <div class="card-header card-header-content-center" >


                          <?php
                          $ctp_in="";$code="";
                         $course_id="";
                              if(isset($_REQUEST['course_fet'])){
                                 $_SESSION['course_id']=$course_id=$_REQUEST['course_fet'];
                              }else if(isset($_SESSION['course_id'])){
                                  $course_id=$ctp=$_SESSION['course_id'];
                              }
                                $query_cl = "SELECT * FROM newcourse where Courseid='$course_id'";
                                $statement_cl = $connect->prepare($query_cl);
                                    $statement_cl->execute();
                                    if($statement_cl->rowCount() > 0)
                                    {
                                      $result_cl = $statement_cl->fetchAll();
                                         foreach($result_cl as $row)
                                            {
                                              $ctp_in=$row['CourseName'];
                                              $ctp_name= $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
                                              $ctp_name->execute([$ctp_in]);
                                              $name2 = $ctp_name->fetchColumn();
                                                        $code = $row['CourseCode'];
                                                        echo "<h3>Course name : <span>".$name2 ."- 0".$code."</span> </h3>";
                                                    }
                                               
                                            }else {
                                              // Handle case where ID is invalid
                                              echo "Invalid course";
                                          }
                                          
                              
                             
                          ?>
               
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
             
                  <center>
                    <form class="insert-phases" id="phase_form" method="post" action="insert_group.php" style="width:700px;">
                    <div class="input-field">
                      <table class="table table-bordered" id="table-field-group">
                        <tr>
                       <?php  if(isset($course_id)){?>
                        <input type="hidden" value="<?php echo $course_id ?>" name="ctp">
                        <?php }?>
                          <td style="text-align: center;"><input type="text" placeholder="Enter Group Name" name="group[]" id="group" class="form-control" value="" required/> </td>
                          <td style="width:20px;"><button type="button" name="add_group" id="add_group" class="btn btn-soft-success"><i class="bi bi-plus-circle-fill"></i></button></td>
                        </tr>
                      </table>
                    </div>
                    <center>
                      <button style="margin:5px;" class="btn btn-primary" type="submit" id="group_submit" name="savegroup">Submit</button>
                    </center>
                  </form>	
                </center>

			<!--Phase Table-->



                  <table class="table table-striped table-bordered" id="grouptable">
                    <input style="margin:5px;" class="form-control" type="text" id="groupsearch" onkeyup="group()" placeholder="Search for Groups.." title="Type in a name">
                    <thead class="bg-dark">
                      <th class="text-light">Sr No</th>
                      <th class="text-light">Group Name</th>
                      <th class="text-light">Students</th>
                      <th class="text-light" colspan="2">Action</th>
                    </thead>
                    <?php 
                    
                      $output1 ="";
                      $query1 = "SELECT * FROM groups where course_id='$course_id'";
                      $statement1 = $connect->prepare($query1);
                      $statement1->execute();
                      if($statement1->rowCount() > 0)
                        {
                          $result1 = $statement1->fetchAll();
                          $sn1=1;
                          foreach($result1 as $row1)
                          {
                            $id=$row1["id"];
                            ?>
                      <tr>
                    
                        <td><?php echo $sn1++;?></td>
                        <td><a style="color:black; text-decoration:underline;" onclick="document.getElementById('coid').value='<?php echo $row1['id'] ?>';" type="button" data-bs-toggle="modal" data-bs-target="#addgroup"><?php echo $row1['groupname']; ?></a></td>
                       <td>
                            <?php 
                             $name= "SELECT * FROM group_student_scheduling where group_id='$id'";
                             $stname2 = $connect->prepare($name);
                             $stname2->execute();
                           
                             if($stname2->rowCount() > 0)
                                 {
                                     $rename2 = $stname2->fetchAll();
                                     foreach($rename2 as $rowname2)
                                     {
                                     $stu_ides=$rowname2['std_id'];
                                     $ides1=$rowname2['id'];
                                      $st_name_id= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                                      $st_name_id->execute([$stu_ides]);
                                       $studentsname = $st_name_id->fetchColumn();
                                       $studentsname.'<br>';?>
                                       <ul style=" list-style-type: none; display: block;">
                                       <li style="text-decoration: none;"><?php echo $studentsname ; ?>
                                       <a href="delete_student_roup.php?id=<?php echo $ides1?>"><i class="bi bi-x-circle"></i></a>
                                         </li>
                                     </ul>
                             <?php        }
                                    }
                            ?>

                       </td>
                       <td style="text-align:center;"><a href="" onclick="document.getElementById('ghid').value='<?php echo $row1['id'] ?>';
                                        document.getElementById('group_name').value='<?php echo $row1['groupname']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#editgroup"><i class="bi bi-pen-fill text-success"></i></a></td>
                                      <td>
                                       <a href="group-delete.php?id=<?php echo $id?>"><i class="bi bi-trash-fill text-danger"></i></a>
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


<!-- Modal for adding group -->
<div class="modal fade" id="addgroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student In the groups</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"> 
        <center>
              <form method="post" action="create_group.php" enctype="multipart/form-data">
                <input type="hidden" id="coid" name="coid">
              <table class="table table-bordered">
              <thead class="bg-dark">
                <tr>
                  <th class="text-light">#</th>
                  <th class="text-light">Id</th>
                  <th class="text-light">Name</th>
      
                </tr>
              </thead>
              <?php 
                $item_sel = "SELECT * FROM newcourse where CourseName='$ctp_in' and CourseCode='$code'";
                $item_selst = $connect->prepare($item_sel);
                $item_selst->execute();
                if($item_selst->rowCount() > 0)
                  {  
                    $sn11=1;
                  $re1 = $item_selst->fetchAll();
                  foreach($re1 as $st)
                  {
                    $stdes=$st['StudentNames'];
                    $checkitem_sel = "SELECT * FROM group_student_scheduling where std_id='$stdes'";
                    $checkitem_selst = $connect->prepare($checkitem_sel);
                    $checkitem_selst->execute();

                   
                    if($checkitem_selst->rowCount() <= 0)
                      {
                    $select_st= $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                    $select_st->execute([$stdes]);
                    $studentname = $select_st->fetchColumn();
                    ?>
                       <tr>
                      <td><input type="checkbox" name="stid[]" value="<?php echo $st['StudentNames']?>"/></td>
                      <td><?php echo $sn11++;?></td>
                      <td><?php echo $studentname;?></td>
                     </tr>

             <?php     }
                }
              }
    ?>   
  </table>  
  <input type="submit" class="btn btn-success" value="Add">
  </form>
           </center>
      </div>
      
    </div>
  </div>
</div>
<!-- End Modal -->

    <!-- edit phase modal -->
    <div class="modal fade" id="editgroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title text-primary" id="exampleModalLabel">Edit Group</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <center>
                    <form method="post" action="edit_group.php" style="width:80%;">
                  <?php if(isset($_SESSION['ctp_value'])){?>
                      <input class="form-control" type="hidden" name="ctp" value="<?php echo $ctp ?>">
                      <?php }?>
                      <input class="form-control" type="hidden" name="id" value="" id="ghid">
                      <label style="color:black; font-weight:bold;">Group Name</label>
                      <input class="form-control" type="text" name="group_name" value="" id="group_name">
                      <input style="margin:5px;" class="btn btn-primary" type="submit" name="saveit" value="Submit">
                    </form>
                  </center>
                </div>
              </div>
            </div>
          </div>




<!--Script for add multiple phases-->

<script type="text/javascript">
    $(document).ready(function()
	    {

     
	        var html = '<tr>\
	                        <td style="text-align: center;"><input type="text" placeholder="Enter Group Name" name="group[]" id="group" class="form-control" value="" required/> </td>\
	                        <td><button type="button" name="remove_group" id="remove_group" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
	                    </tr>'
	        var max = 100;
	        var a = 1;

	        $("#add_group").click(function()
	        {
	            if(a <= max)
	            {
	                $("#table-field-group").append(html);
	                a++;
	            }
	        });
	        $("#table-field-group").on('click','#remove_group',function()
	        {
	            $(this).closest('tr').remove();
	            a--;
	        });
    });
 </script>

<script>
function group() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("groupsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("grouptable");
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

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
<script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>