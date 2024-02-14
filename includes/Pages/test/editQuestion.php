<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['editMcqQuestion'])) {
    $examId = $_REQUEST['mcqExamId'];
    $questionName = $_REQUEST['questionName'];
    $option1 = $_REQUEST['option1'];
    $option2 = $_REQUEST['option2'];
    $option3 = $_REQUEST['option3'];
    $option4 = $_REQUEST['option4'];
    $refrenceQue = $_REQUEST['refrenceQue'];
    $questionDocument = $_REQUEST['questionDocument'];
    $questionDiffculty = $_REQUEST['questionDiffculty'];

    $updateQuery = "UPDATE exam_question SET question = '$questionName',option1 = '$option1',option2 = '$option2', option3 = '$option3', option4 = '$option4',difficulty = '$questionDiffculty', document = '$questionDocument',questionRef = '$refrenceQue' WHERE id = '$examId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
    $_SESSION['success'] = "Question Updated Successfully";
    header("Location:../mutliple_fetching.php");
}

if (isset($_REQUEST['editTrueFalseQuestion'])) {
    $trueFalseId = $_REQUEST['trueFalseId'];
    $questionNameTrueFalse = $_REQUEST['questionNameTrueFalse'];
    $trueFalseOption1 = $_REQUEST['trueFalseOption1'];
    $trueFalseOption2 = $_REQUEST['trueFalseOption2'];
    $questionDocument = $_REQUEST['questionDocument'];
    $questionDiffculty = $_REQUEST['questionDiffculty'];

    $updateQuery = "UPDATE exam_question SET question = '$questionNameTrueFalse',option1 = '$trueFalseOption1',option2 = '$trueFalseOption2',difficulty = '$questionDiffculty', document = '$questionDocument' WHERE id = '$trueFalseId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
    $_SESSION['success'] = "Question Updated Successfully";
    header("Location:../mutliple_fetching.php");
}


if (isset($_REQUEST['editDigramQuestion'])) {
    $diagramId = $_REQUEST['diagramId'];
    $questionNamediagram = $_REQUEST['questionNamediagram'];
    $lables_value = $_REQUEST['labels_value'];
    $questionDocument = $_REQUEST['questionDocument'];
    $questionDiffculty = $_REQUEST['questionDiffculty'];

    $newArray = array();
    $keys = range('a', 'z');
    for ($i = 0; $i < count($lables_value); $i++) {
        $newArray[$keys[$i]] = $lables_value[$i];
    }

    $dataString = serialize($newArray);

    $updateQuery = "UPDATE exam_question SET question = '$questionNamediagram',correst_answer = '$dataString',difficulty = '$questionDiffculty', document = '$questionDocument' WHERE id = '$diagramId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "Question Updated Successfully";
    header("Location:../mutliple_fetching.php");
}
