<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['docId'])) {
    $docId = $_REQUEST['docId'];
    $fetchDoc = $connect->query("SELECT file_name FROM document_test WHERE id = '$docId'");
    $docData = $fetchDoc->fetchColumn();

    echo '<option value="' . $docId . '" selected>' . $docData . '</option>';
}

if (isset($_REQUEST['digramId'])) {
    $digramId = $_REQUEST['digramId'];
    $fetchQuestioQ = $connect->query("SELECT * FROM exam_question WHERE id = '$digramId'");
    while ($fetchQuestioData = $fetchQuestioQ->fetch()) {
        $decoded_data = unserialize($fetchQuestioData['correst_answer']);
?>
        <input class="form-control" type="hidden" name="diagramId" value="<?php echo $digramId; ?>" id="">
        <!-- Question -->
        <div class="col-12">
            <label class="form-label">Question</label>
            <input class="form-control" type="text" value="<?php echo $fetchQuestioData['question']; ?>" placeholder="Write a question" id="" name="questionNamediagram">
        </div>

        <?php
        foreach ($decoded_data as $key => $value) {
        ?>
            <div class="col-6">
                <label class="form-label"><?php echo $key; ?></label>
                <input class="form-control" type="text" value="<?php echo $value; ?>" placeholder="Write a option" id="" name="labels_value[]">
            </div>
        <?php
        }
        ?>

        <div class="col-6">
            <label class="form-label">Select Documnet</label>
            <select name="questionDocument" id="" class="form form-control examDocu">
                <option value="" selected>--Select Document--</option>
                <?php
                $fetchDoc = $connect->query("SELECT * FROM document_test");
                while ($fetchDocData = $fetchDoc->fetch()) {
                    if($fetchDocData['id'] == $fetchQuestioData['document']){
                        $sel = "selected";
                    }else{
                        $sel = "";
                    }
                ?>
                    <option <?php echo $sel; ?> value="<?php echo $fetchDocData['id']; ?>"><?php echo $fetchDocData['file_name']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="col-6">
            <label class="form-label">Select Diffculty</label>
            <select name="questionDiffculty" id="" class="form form-control examDiffcu">
                <option value="" selected>--Select Diffculty--</option>
                <option selected value="<?php echo $fetchQuestioData['difficulty']; ?>"><?php echo $fetchQuestioData['difficulty']; ?></option>
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
                <option value="veryhard">Very Hard</option>
            </select>
        </div>
        <!-- Answer options END -->

<?php
    }
}

?>