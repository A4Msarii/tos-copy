<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();

if (isset($_REQUEST['addWeekend'])) {
    $weekend = $_REQUEST['weekend'];
    $ctpId = $_REQUEST['ctpId'];
    $courseCode = $_REQUEST['courseCode'];

    $checkCount = $connect->query("SELECT count(*) FROM progress_weekend WHERE ctpId = '$ctpId' AND courseCode = '$courseCode'");

    if ($checkCount->fetchColumn() > 0) {

        $updateQuery = "UPDATE progress_weekend SET weekend = '$weekend' WHERE ctpId = '$ctpId' AND courseCode = '$courseCode'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
        $_SESSION['success'] = "Data Added Successfully";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        $sql = "INSERT INTO progress_weekend (weekend,ctpId,courseCode) VALUES ('$weekend','$ctpId','$courseCode')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $_SESSION['success'] = "Data Added Successfully";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}

if (isset($_REQUEST['checkWeekend'])) {
    $ctpId = $_REQUEST['ctpId'];
    $courseCode = $_REQUEST['courseCode'];

    $checkCount = $connect->query("SELECT weekend FROM progress_weekend WHERE ctpId = '$ctpId' AND courseCode = '$courseCode'");
    $weekData = $checkCount->fetchColumn();
?>
    <form action="<?php echo BASE_URL; ?>includes/Pages/deconflicter/progressWeekend.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="ctpId" value="<?php echo $ctpId; ?>" />
        <input type="hidden" name="courseCode" value="<?php echo $courseCode; ?>" />
        <div>
            <input type="radio" name="weekend" value="include" class="form-check-input is-valid" style="margin: 15px;height: 20px;width: 20px;border: 1px solid #80808069;border-radius: 10px;" <?php if ($weekData == "include") { echo "checked"; } ?>>
            <label class="text-dark" style="font-size: x-large; font-weight:bold;">Include</label>
        </div>
        <div>
            <input type="radio" name="weekend" value="exclude" class="form-check-input is-valid" style="margin: 15px;height: 20px;width: 20px;border: 1px solid #80808069;border-radius: 10px;" <?php if ($weekData == "exclude") { echo "checked"; } ?>>
            <label class="text-dark" style="font-size: x-large; font-weight:bold;">Exclude</label>
        </div>
        <br>
        <hr>
        <input type="submit" name="addWeekend" class="btn btn-success" value="Submit" style="float:right;" />
    </form>
<?php
}
