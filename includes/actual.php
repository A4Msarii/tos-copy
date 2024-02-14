<div class="container">
                        <div class="row">
                          <center>
                            <form class="insert-phases" id="actual" method="post" action="actual_insert_data.php" style="width:fit-content;">
                              <h3>Class : <span style="font-size:larger; color:green;">Actual <?php echo $type_name_dep ?></span></h3>
                              <div class="input-field">
                                <table class="table table-bordered" id="table-field-actual">
                                  <tr>
                                    <input type="hidden" name="phase_id" class="form-control" value="<?php echo $phase_id ?>">
                                    <input type="hidden" name="phase" class="form-control" value="<?php echo $phase ?>">
                                    <input type="hidden" name="ctp" class="form-control" value="<?php echo $ctp ?>">
                                    <td><input type="text" name="actual[]" class="form-control" placeholder="Enter How many Actual Classes you want?" required></td>
                                    <td><input maxlength="10" type="text" name="actualsymbol[]" class="form-control" placeholder="Symbol" required></td>
                                    <td><input type="hidden" class="type" name="ptype[]" value="percentage" class="form-control" placeholder="% Type"></td>
                                    <td><input readonly style="background-color: #bfcfe09e;" class="type_value form-control" type="number" name="percentage[]" placeholder="100" required value="100"></td>
                                    <td><button type="button" name="add_actual" id="add_actual" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                                  </tr>
                                </table>
                                <button style="margin:10px;" class="btn btn-success" type="submit" name="submit_actual">Save</button>
                              </div>
                            </form>
                          </center>
                        </div>
                        <hr>
                        <div class="row">
                          <center>
                            <table class="table table-striped table-bordered table-hover" id="actualtable">
                              <input class="form-control" type="text" id="actualsearch" onkeyup="actual()" placeholder="Search for Actual Class.." title="Type in a name"><br>
                              <thead class="bg-dark">
                                <th class="text-light">Sr No</th>
                                <th class="text-light">Class Name</th>
                                <th class="text-light">Symbol</th>
                                <th class="text-light">Phase</th>
                                <th class="text-light">CTP</th>

                                <th class="text-light">Percentage</th>
                                <th class="text-light">item and subitem</th>
                                <th class="text-light">Action</th>
                              </thead>
                              <?php
                              // $output ="";
                              $query1 = "SELECT * FROM actual where ctp='$ctp' and phase='$phase_id'";
                              $statement1 = $connect->prepare($query1);
                              $statement1->execute();
                              if ($statement1->rowCount() > 0) {
                                $result1 = $statement1->fetchAll();
                                $sn = 1;
                                foreach ($result1 as $row) {
                                  $id = $row['id']; ?>
                                  <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $row['actual'] ?></td>
                                    <td><?php echo $row['symbol'] ?></td>
                                    <td><?php echo $phase ?></td>
                                    <td><?php echo $course ?></td>

                                    <td><?php echo $row['percentage'] ?></td>
                                    <td><a style="color:blue;" href="add_item_subitem.php?class_id=<?php echo $id ?>&class=actual">Add</a></td>
                                    <td><a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('actual_edit_id').value='<?php echo $id = $row['id'] ?>';
                                                             document.getElementById('actual1').value='<?php echo $row['actual'] ?>';
                                                             document.getElementById('symbol').value='<?php echo $row['symbol'] ?>';" data-bs-toggle="modal" data-bs-target="#editactual"><i class="bi bi-pen-fill"></i>
                                      </a>
                                      <a class="btn btn-soft-danger btn-xs" href="actual-delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill"></i></a>
                                      <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('actual_edit_id1').value='<?php echo $id = $row['id'] ?>';
                                                             " data-bs-toggle="modal" data-bs-target="#addgoalsactual"><i class="bi bi-diagram-3"></i>
                                      </a>
                                    </td>
                                  </tr>
                                <?php
                                }
                              } else { ?>
                                <tr>
                                  <td colspan='9' style="text-align:center">
                                    No data
                                  </td>
                                </tr>
                              <?php  }
                              ?>
                            </table>
                          </center>
                        </div>
                      </div>