<style type="text/css">
  .circleig1 {
      height: 20px;
    width: 100%;
    background: #e2e4e6;
    position: absolute;
    left: 0px;
    bottom: -20px;
    color: darkgoldenrod;
    font-weight: bold;
    font-family: cursive;
    }
</style>

<div class="col-lg-10 mb-3 mb-lg-5">
        <!-- Card -->
         <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

          <!-- Body -->
          <div class="card-body"> 
            <div class="row">
              <div class="col-6">
            <label class="text-dark" style="float: left; font-size: xx-large; font-weight:bold;">Summary : </label>
          </div>
          <div class="col-6">
            <center>
            <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#detailsper"><i class="bi bi-info-circle"></i></button>
          </center>
          </div>
          </div>
          <hr>
            <a class="row" href="<?php echo BASE_URL;?>includes/Pages/itemsubitemcl.php" target="_blank">

            <?php
            if ($over_all_comment == "") {
            ?>  
            <div class="col-lg-12 text">
              <center>
                  <span>Click Here</span>
              </center> 
            </div> 
            <?php
              }
              ?> 
               
              <div class="col-lg-6">
                
                 <?php
                          //  var_dump($over_all_comment != "");
                          if ($over_all_comment != "") { ?>
                            
                            <span class="text-secondary" style="margin: 10px; padding:10px; font-weight: bold; font-size:x-large; font-family: cursive;" name="overall_data" placeholder="overall" readonly rows="4" cols="50" id="overall_all_com"><?php echo $over_all_comment ?></span><br>
                          <?php } else { ?>
                            
                            <span class="text-secondary" style="margin: 10px;padding:10px; font-weight: bold; font-size:x-large; font-family: cursive;" name="overall_data" placeholder="overall" rows="4" cols="50" readonly id="overall_all_com"> </span><br>

                          <?php } ?>
                  
              </div>

              <div class="col-lg-6">
                 <center>
                  
                <table>
                              <tr>
                               

                                


                              </tr>
                             
                           <br>
                            <tr>
                              <td>
                                <span id="slider_value" style="color:red; font-size:20px; font-weight:bolder; display:none;"></span>
                                <?php
                                $class1 = "";
                                
                                 if ($fetch_overall_grade == "U") {
                                      $class1 = "btn btn-danger";
                                    } elseif ($fetch_overall_grade == "F") {
                                      $class1 = "btn btn-warning";
                                    } elseif ($fetch_overall_grade == "G") {
                                      $class1 = "btn btn-secondary";
                                    } elseif ($fetch_overall_grade == "V") {
                                      $class1 = "btn btn-success";
                                    } elseif ($fetch_overall_grade == "E") {
                                      $class1 = "btn btn-primary";
                                    } elseif ($fetch_overall_grade == "N") {
                                      $class1 = "btn btn-dark";
                                    } else {
                                      $class1 = "btn btn-dark";
                                    }
                               // echo  '<span style="background-color:'.$class1.'" class="badge">$fetch_overall_grade</span>';
                               // echo  $over_all_grade_per;
                                  ?>
                              
                              </td>
                              <?php
                              if ($over_all_grade_per != "") {
                                 
                                
                              ?>
                              <span style="font-weight:bold; font-size:x-large;text-align:center; padding:10px;" class="badge<?php echo $class1 ?>"><?php echo $fetch_overall_grade; ?></span> -
                                        <span style="font-weight:bolder; font-size:x-large;" class="badge <?php echo $class1; ?>">
                                          <i class="bi-graph-up"></i> <?php echo $over_all_grade_per; ?>%
                                        </span> - 

                                        <span style="font-weight:bolder; font-size:x-large; color: darkgoldenrod; font-family: cursive; background: #e2e4e6;" class="badge">
                                          <?php echo $status_name1 ?>
                                        </span>
                               <?php
                                }else{

                                  ?>
                                
                                  <?php 
                                }
                               ?>         
                            </tr>

                            <tr>
                              <td>
                                <center>
                                  <?php
                                
                                  ?></center>
                              </td>
                            </tr>
                            <?php if($role=="instructor"){?>
                            <tr>
                              <!-- <td>
                                <center><input type="submit" id="submit_gradsheet_but" class="btn btn-success" name="ins_sub" onclick="return confirm('Are you sure?Once submitted gradsheet will get lock..?')" /></center>
                              </td> -->
                            </tr>
                            <?php } ?>
                          </table>
                        </center>
              </div>
             
              <center>
               </a>
              
            </div>
          </div>
          <!-- End Body -->
        </div>
        <!-- End Card -->
      </div>


      <div class="modal fade" id="detailsper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Percentage</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <table class="table table-striped table-bordered table-hover">
              <input style="width:50%; display: none;" class="form-control" type="text" onkeyup="score()" placeholder="Search for name.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-white">Sr No</th>
                <th class="text-white">Type</th>
                <th class="text-white">Percentage</th>

                <th class="text-white">Description</th>

              </thead>
              <?php
              $output6 = "";
              $query6 = "SELECT * FROM percentage  ORDER BY id ASC";
              $statement6 = $connect->prepare($query6);
              $statement6->execute();
              if ($statement6->rowCount() > 0) {
                $result6 = $statement6->fetchAll();
                $sn6 = 1;
                foreach ($result6 as $key => $row6) {
              ?>
                  <tr>
                    <?php

                    if ($key == 5) {

                      echo "<td>-</td>";
                    } elseif ($key == 1) {

                      echo "<td>1/2</td>";
                    } elseif ($key == 0) {

                      echo "<td>0</td>";
                    } else {

                      $next_key = $key + 1;

                      echo "<td> $next_key </td>";
                    }



                    ?>

                    <td>
                      <h6 style="color:<?php echo $row6['color']; ?>"><?php echo $row6['percentagetype']; ?></h6>
                    </td>
                    <td><?php echo $row6['percentage']; ?></td>

                    <td><?php echo $row6['description']; ?></td>

                  </tr>
              <?php
                }
              }
              ?>
            </table>
          </center>
        </div>
      </div>
    </div>
  </div>