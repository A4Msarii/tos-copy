<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$id = $_REQUEST['id'];

$q3 = "SELECT * FROM exam_question_ist where exam_id='$id'";
$st3 = $connect->prepare($q3);
$st3->execute();

if ($st3->rowCount() > 0) {
    $sn = 1;
    $re3 = $st3->fetchAll();
    foreach ($re3 as $row3) {
        $std_id = $row3['question_id'];
        $fetchQuestionData = $connect->query("SELECT * FROM exam_question WHERE id = '$std_id'");
        while ($questionData = $fetchQuestionData->fetch()) {
?>
            <tr>
                <td>
                    <?php echo $sn++; ?>
                </td>
                <td><?php echo $questionData['question']; ?></td>
                <td>
                    <?php
                    if ($questionData['type'] == "mcq") {
                    ?>
                        <ul>
                            <li><?php echo $questionData['option1']; ?></li>
                            <li><?php echo $questionData['option2']; ?></li>
                            <li><?php echo $questionData['option3']; ?></li>
                            <li><?php echo $questionData['option4']; ?></li>
                        </ul>
                    <?php
                    }
                    ?>
                    <?php
                    if ($questionData['type'] == "true_false") {
                    ?>
                        <ul>
                            <li><?php echo $questionData['correst_answer']; ?></li>
                        </ul>
                    <?php
                    }
                    ?>
                    <?php
                    if ($questionData['type'] == "diagram" || $questionData['type'] == "digrame") {
                        $decoded_data = unserialize($questionData['correst_answer']);
                        foreach ($decoded_data as $key => $value) {

                            echo "<p>$key: $value</p>";
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>

<?php

    }
}
?>