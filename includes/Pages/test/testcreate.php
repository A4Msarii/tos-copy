
<?php 
$roles_values="";
$query1 = "SELECT * FROM roles where roles!='super admin'";
$statement1 = $connect->prepare($query1);
$statement1->execute();

if($statement1->rowCount() > 0)
    {
        $result1 = $statement1->fetchAll();
        $sn=1;
        foreach($result1 as $row1)
        { 
            $roles_values.="<option value=".$row1['id'].">".$row1['roles']."</option>";
        }
    }
?>
<div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->

            <!-- Body -->
            <div class="card-body">
               <!-- Nav -->
                  <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="create_testadmin-tab" href="#create_testadmin" data-bs-toggle="pill" data-bs-target="#create_testadmin" role="tab" aria-controls="create_testadmin" aria-selected="true">
                        <div class="d-flex align-items-center">
                          Create
                        </div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="edit_testadmin-tab" href="#edit_testadmin" data-bs-toggle="pill" data-bs-target="#edit_testadmin" role="tab" aria-controls="edit_testadmin" aria-selected="false">
                        <div class="d-flex align-items-center">
                          Edit
                        </div>
                      </a>
                    </li>
                  </ul>
                  <!-- End Nav -->
                  <hr>
                  <div class="tab-content">
                  <div class="tab-pane fade show active" id="create_testadmin" role="tabpanel" aria-labelledby="create_testadmin-tab">
                  <table class="table">
                            <tr>
                              <td>
                                <div class="row">
                                  <div class="col-md-12 mb-2">

                                    <div class="form-outline">
                                     
                                  <label class="text-dark" style="font-weight:bold;">Exam For</label>
                                      <select class="form-control" id="cat_dropdown1">
                                        <option value="" disabled>Select Role/people</option>
                                        
                                        <?php echo $roles_values; ?>
                                        <option value="par">particular User</option>
                                        <option value="ctp">CTP</option>
                                    </select>
                                    </div>

                                  </div>
                                </div>
                            </td>
                          </tr>
                         </table><hr>
                         <?php
                  $d_value1 = "";
                  if (isset($_COOKIE['dropdown_val2'])) {
                    $d_value1 = $_COOKIE['dropdown_val2'];
                    if ($d_value1 == "par") {
                      include "par_user_exam.php";
                    } elseif ($d_value1 == "ctp") {
                       include "ctp_exam.php";
                    }else{
                      include "all_role_exam.php";
                    }
                   
                  }
 
                  ?>
                  </div>

                  <div class="tab-pane fade" id="edit_testadmin" role="tabpanel" aria-labelledby="edit_testadmin-tab">
                    <p>Edit Test</p>
                  </div>
                </div>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
    