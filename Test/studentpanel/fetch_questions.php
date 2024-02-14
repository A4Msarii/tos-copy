<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

$itemsPerPage = 1;
$id = $_GET['id'];
$user_id=$_GET['user_id'];
$uni_id=$_GET['uni_id'];

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = intval($_GET['page']);
} else {
    $currentPage = 1;
}

$offset = ($currentPage - 1) * $itemsPerPage;

$paginatedData = [];

try {
    // Prepare the SQL query to fetch the question IDs for the given exam
    $sql = "SELECT * FROM `exam_question_ist` WHERE exam_id = :id";
    $stmt1 = $connect->prepare($sql);
    $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt1->execute();
    $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results1 as $results2) {
        $question_id = $results2['question_id'];
        $q_id=$results2['id'];
        // Prepare the SQL query for fetching paginated questions
        $fetchQuestionId = $connect->query("SELECT id FROM exam_question_ist WHERE question_id = '$question_id' AND exam_id = '$id'");
        $questionPrimaryId = $fetchQuestionId->fetchColumn();
        $query = "SELECT * FROM `exam_question` WHERE id = :question_id";
        $stmt2 = $connect->prepare($query);
        $stmt2->bindParam(':question_id', $question_id, PDO::PARAM_INT);
        $stmt2->execute();
        $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $key => $row) {
            $count="";
            $doc = $row['document'];
            if($row['type']=="digrame"){
                $anw_cr=$row['correst_answer'];
                $values = unserialize($anw_cr);
                $count = count($values);
            }
            $imageName = $row['fileName'];
            $questionRef = $row['questionRef'];
       
            $file_name1="";$file_name="";
            // Assuming $item_db_id and $fetchuser_id are defined somewhere else
            $fetch_grade = $connect->prepare("SELECT file_name FROM `document_test` WHERE id = :doc");
            $fetch_grade->bindParam(':doc', $doc, PDO::PARAM_INT);
            $fetch_grade->execute();
            $file_name = $fetch_grade->fetchColumn();

            $fetch_docRef = $connect->prepare("SELECT refrence FROM `document_test` WHERE id = :doc");
            $fetch_docRef->bindParam(':doc', $doc, PDO::PARAM_INT);
            $fetch_docRef->execute();
            $fetch_docRefData = $fetch_docRef->fetchColumn();

            $fetch_exam_doc_type = $connect->prepare("SELECT exam_type FROM `examname` WHERE id = :exam_id");
            $fetch_exam_doc_type->bindParam(':exam_id', $id, PDO::PARAM_INT);
            $fetch_exam_doc_type->execute();
            $fetch_exam_doc_type_name = $fetch_exam_doc_type->fetchColumn();
            $fetch_grade1 = $connect->prepare("SELECT title FROM `document_test` WHERE id = :doc");
            $fetch_grade1->bindParam(':doc', $doc, PDO::PARAM_INT);
            $fetch_grade1->execute();
            $file_name1 = $fetch_grade1->fetchColumn();
            $fetch_grade2 = $connect->prepare("SELECT file_type FROM `document_test` WHERE id = :doc");
            $fetch_grade2->bindParam(':doc', $doc, PDO::PARAM_INT);
            $fetch_grade2->execute();
            $file_name2 = $fetch_grade2->fetchColumn();
            $fetch_exam_doc_type1 = $connect->prepare("SELECT attempts FROM `examname` WHERE id = :exam_id");
            $fetch_exam_doc_type1->bindParam(':exam_id', $id, PDO::PARAM_INT);
            $fetch_exam_doc_type1->execute();
            $fetch_exam_doc_type_name1 = $fetch_exam_doc_type1->fetchColumn();

            $fetch_exam_doc_type12 = $connect->prepare("SELECT exam_Types FROM `examname` WHERE id = :exam_id");
            $fetch_exam_doc_type12->bindParam(':exam_id', $id, PDO::PARAM_INT);
            $fetch_exam_doc_type12->execute();
            $fetch_examType = $fetch_exam_doc_type12->fetchColumn();

            if($fetch_examType == "once"){
                $fetchAttem = $connect->query("SELECT countAttempts FROM exam_answers_once_test WHERE question = '$questionPrimaryId' and exam_id='$id' and user_id='$user_id'");
            }else{
                $fetchAttem = $connect->query("SELECT countAttempts FROM exam_answers_repeat_test WHERE question = '$questionPrimaryId' and exam_id='$id' and user_id='$user_id' and repeat_id='$uni_id'");
            }

            $fetchAttemData = $fetchAttem->fetchColumn();

            if ($uni_id == 0) {
                $fetch_grade_checked_answer = $connect->prepare("SELECT answer FROM `exam_answers_once_test` WHERE exam_id = :id and user_id=:user_id and question=:question_ides");
                $fetch_grade_checked_answer->bindParam(':id', $id, PDO::PARAM_INT);
                $fetch_grade_checked_answer->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $fetch_grade_checked_answer->bindParam(':question_ides', $q_id, PDO::PARAM_INT);
                $fetch_grade_checked_answer->execute();
                $file_name_check = $fetch_grade_checked_answer->fetchColumn();
            } else {
                $fetch_grade_checked_answer = $connect->prepare("SELECT answer FROM `exam_answers_repeat_test` WHERE exam_id = :id and user_id=:user_id and question=:question_ides and repeat_id=:repa_id");
                $fetch_grade_checked_answer->bindParam(':id', $id, PDO::PARAM_INT);
                $fetch_grade_checked_answer->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $fetch_grade_checked_answer->bindParam(':question_ides', $q_id, PDO::PARAM_INT); // Changed $q_id to $question_id
                $fetch_grade_checked_answer->bindParam(':repa_id', $uni_id, PDO::PARAM_INT);
                $fetch_grade_checked_answer->execute();
                $file_name_check = $fetch_grade_checked_answer->fetchColumn();
                 // Moved the echo statement outside of the assignment
            }
            $option1 = htmlspecialchars($row['option1'], ENT_QUOTES, 'UTF-8');

            $option2 = htmlspecialchars($row['option2'], ENT_QUOTES, 'UTF-8');

            $option3 = htmlspecialchars($row['option3'], ENT_QUOTES, 'UTF-8');

            $option4 = htmlspecialchars($row['option4'], ENT_QUOTES, 'UTF-8');
            if ($row['type'] === 'mcq') {
                $paginatedData[] = [
                    'type' => $row['type'],
                    'id' => $results2['id'],
                    'question' => $row['question'],
                    'option1' => $option1,
                    'option2' => $option2,
                    'option3' => $option3,
                    'option4' => $option4,
                    'document' => $file_name,
                    'document_name' => $file_name1,
                    'correct_anw'=>$file_name_check,
                    'file_type'=>$file_name2,
                    'doc_type'=>$fetch_exam_doc_type_name,
                    'docId' => $doc,
                    'docRefData' => $fetch_docRefData,
                    'imageName' => $imageName,
                    'attempts'=>$fetch_exam_doc_type_name1,
                    'fetchAttemData' => $fetchAttemData,
                    'questionRef' => $questionRef,
                ];
            } elseif ($row['type'] === 'true_false') {
                $paginatedData[] = [
                    'type' => $row['type'],
                    'id' => $results2['id'],
                    'question' => $row['question'],
                    'option1' => 'true',
                    'option2' => 'false',
                    'document' => $file_name,
                    'document_name' => $file_name1,
                    'correct_anw'=>$file_name_check,
                    'file_type'=>$file_name2,
                    'doc_type'=>$fetch_exam_doc_type_name,
                    'docId' => $doc,
                    'docRefData' => $fetch_docRefData,
                    'imageName' => $imageName,
                ];
            } elseif ($row['type'] === 'digrame') {
                shuffle($values);
                $paginatedData[] = [
                    'type' => $row['type'],
                    'id' => $results2['id'],
                    'question' => $row['question'],
                    'fig' =>$row['file_name'],
                    'document' => $file_name,
                    'document_name' => $file_name1,
                    'options'=>$count,
                    'labels'=>$values,
                    'file_type'=>$file_name2,
                    'doc_type'=>$fetch_exam_doc_type_name,
                    'docId' => $doc,
                    'docRefData' => $fetch_docRefData,
                 ];
             }

        }
    }

    // Calculate the total number of items
    $totalItemsQuery = "SELECT COUNT(*) as total FROM `exam_question_ist` WHERE exam_id = :id";
    $totalItemsStatement = $connect->prepare($totalItemsQuery);
    $totalItemsStatement->bindParam(':id', $id, PDO::PARAM_INT);
    $totalItemsStatement->execute();
    $totalItemsResult = $totalItemsStatement->fetch(PDO::FETCH_ASSOC);
    $totalItems = $totalItemsResult['total'];

    // Calculate the total number of pages
    $totalPages = ceil($totalItems / $itemsPerPage);

    // Encode data as JSON
    echo json_encode([
        'data' => $paginatedData,
        'totalPages' => $totalPages,
    ]);
} catch (PDOException $e) {
    // Handle any database errors here
    echo json_encode([
        'error' => 'Database error: ' . $e->getMessage(),
    ]);
}
?>
