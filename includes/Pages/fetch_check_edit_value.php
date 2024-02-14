<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$ctid = $_REQUEST['ctid'];
$query = "SELECT * FROM checklist where id='$ctid'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $row1) {
    ?>
                    <div class="col-12 mb-2">
                     <div class="form-outline">
                      <label class="form-label text-dark" for="item_name" style="font-weight:bold;">CheckList Item Name<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control form-control-md" type="text" value="<?php echo $row1['checklist']; ?>" name="checklist_name" required/>

                    </div>

                  </div>
                  <div class="col-12 mb-2">
                    <div class="form-outline">
                      <label class="form-label text-dark" for="description" style="font-weight:bold;">Description<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control form-control-md" type="text" value="<?php echo $row1['description']; ?>"  name="description" required />

                    </div>
                  </div>

                  <div class="col-12 mb-2">
                    <div class="form-outline">
                      <label class="form-label text-dark" for="date" style="font-weight:bold;">Date<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control form-control-md" value="<?php echo $row1['date']; ?>" type="date" name="date" required />

                    </div>
                  </div>
                  <div class="col-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label text-dark" for="status" style="font-weight:bold;">Status<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control form-control-md" value="<?php echo $row1['status'] ?>" type="text" name="status" required />

                    </div>

                  </div>


                  <div class="col-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label text-dark" for="coursemanager" style="font-weight:bold;">Priority<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>

                      <select id="coursemanager" name="priority" class="form-control form-control-md" required>
                        <?php if($row1['priority']!=""){?>
                        <option value="<?php echo $row1['priority']; ?>" selected><?php echo $row1['priority']; ?></option>
                        <?php }else{?>
                            <option selected disabled value="">-Priority-</option>
                            <?php }?>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                      </select>
                      <br>
                    </div>
                  </div>

                  <div class="col-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label text-dark" style="color:black; font-weight:bold;">Category<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control" type="text" value="<?php echo $row1['category'] ?>" name="category" value="" /><br>
                    </div>

                  </div>

                  <div class="col-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label text-dark" for="coursemanager" style="font-weight:bold;">Comments<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <textarea class="form-control" name="comment"><?php echo $row1['comment'] ?></textarea>
                    </div>

                  </div>

<?php 

}

?>