<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['subId'])) {
    $subId = $_REQUEST['subId'];

    $fetchSubData = $connect->query("SELECT * FROM per_subchecklist WHERE id = '$subId'");
    while ($subData = $fetchSubData->fetch()) {
?>

        <input type="hidden" name="subCheckId" value="<?php echo $subData['id'] ?>" />
        <div class="col-12 mb-2">
            <div class="form-outline">
                <label class="form-label text-dark" for="item_name" style="font-weight:bold;">Sub Checklust Name<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                <input class="form-control form-control-md" type="text" value="<?php echo $subData['name'] ?>" name="subChecklist_name" required="">

            </div>

        </div>
        <div class="col-12 mb-2">
            <div class="form-outline">
                <label class="form-label text-dark" for="description" style="font-weight:bold;">Description<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                <input class="form-control form-control-md" type="text" value="<?php echo $subData['description'] ?>" name="description" required="">

            </div>
        </div>

        <!-- <div class="col-12 mb-2">
            <div class="form-outline">
                <label class="form-label text-dark" for="date" style="font-weight:bold;">Date<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                <input class="form-control form-control-md" value="2023-08-28 16:24:31" type="date" name="date" required="">

            </div>
        </div> -->
        <div class="col-12 mb-2">

            <div class="form-outline">
                <label class="form-label text-dark" for="status" style="font-weight:bold;">Status<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                <input class="form-control form-control-md" value="<?php echo $subData['status'] ?>" type="text" name="status" required="">

            </div>

        </div>


        <div class="col-12 mb-2">

            <div class="form-outline">
                <label class="form-label text-dark" for="coursemanager" style="font-weight:bold;">Priority<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>

                <select id="coursemanager" name="priority" class="form-control form-control-md" required="">
                    <option selected disabled value="<?php echo $subData['priority'] ?>"><?php echo $subData['priority'] ?></option>
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
                <input class="form-control" type="text" value="<?php echo $subData['category'] ?>" name="category"><br>
            </div>

        </div>

        <div class="col-12 mb-2">

            <div class="form-outline">
                <label class="form-label text-dark" for="coursemanager" style="font-weight:bold;">Comments<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                <textarea class="form-control" name="comment"><?php echo $subData['comment']; ?></textarea>
            </div>

        </div>
<?php
    }
}

if (isset($_REQUEST['editSub'])) {
    $subCheckId = $_REQUEST['subCheckId'];
    $mainCheck = $_REQUEST['mainCheck'];
    $subChecklist_name = $_REQUEST['subChecklist_name'];
    $description = $_REQUEST['description'];
    $status = $_REQUEST['status'];
    $priority = $_REQUEST['priority'];
    $category = $_REQUEST['category'];
    $comment = $_REQUEST['comment'];

    $updateQuery = "UPDATE per_subchecklist SET name = '$subChecklist_name', description = '$description', status = '$status', priority = '$priority', category = '$category', comment = '$comment' WHERE id = '$subCheckId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "Subcheck List Updated Successfully";
    header("Location:subCheckList_per.php?checkListId=" . $mainCheck);
}

if ($_REQUEST['deleteId']) {
    $deleteId = $_REQUEST['deleteId'];
    $mainCheck = $_REQUEST['mainCheck'];

    $sql = "DELETE FROM per_subchecklist WHERE id = '$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "Sub Checklist Deleted Successfully";
    header("Location:subCheckList_per.php?checkListId=" . $mainCheck);
}

?>