<?php 
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
         $id=$_REQUEST['id'];
         
         $code=$_REQUEST['code'];
         $connect->prepare("DELETE FROM exam_question_ist WHERE exam_id=?")->execute([$id]);
         $difficultyLevels=[];
         $query_heatmap = "SELECT * FROM examname where id='$id'";
         $statement_heatmap = $connect->prepare($query_heatmap);
         $statement_heatmap->execute();
        
         $result_heatmap = $statement_heatmap->fetchAll();
         foreach ($result_heatmap as $row_heatmap) {
              $percentageEasy=$row_heatmap['percentageEasy'];  
                $percentageMedium=$row_heatmap['percentageMedium'];                
                $percentageHard=$row_heatmap['percentageHard'];         
                $percentageveryhard=$row_heatmap['percentageveryhard']; 
                $totalQuestions=$row_heatmap['questionNumber'];  
                
              $easy_count=(int)($totalQuestions * $percentageEasy/100);
              $medium_count=(int)($totalQuestions * $percentageMedium/100);
              $hard_count=(int)($totalQuestions * $percentageHard/100);
              $veryhard_count=(int)($totalQuestions * $percentageveryhard/100);
         }
         $difficultyLevels=array('easy'=>$easy_count,'medium'=>$medium_count,'hard'=>$hard_count,'veryhard'=>$veryhard_count);
       
         $subjectDistribution = [];
            $query_category = "SELECT * FROM examsubcategory where examId='$id' and subjectPercentage!='0'";
            $statement_category = $connect->prepare($query_category);
            $statement_category->execute();
             $result_category = $statement_category->fetchAll();
            foreach ($result_category as $row_category) {
                $examSubject = $row_category['examSubject'];  
                 $subjectPercentage = $row_category['subjectPercentage']; 
                $cal1 = $subjectPercentage / 100;
               $cal = (int)($totalQuestions * $cal1);
                $subjectDistribution[$examSubject] = $cal; // Use [] to assign the value to the array
            }
            
            $questionTypes=[];
            $query_type = "SELECT * FROM examtype where examId='$id' and examTypePercentage!='0'";
            $statement_type = $connect->prepare($query_type);
            $statement_type->execute();
            $result_type = $statement_type->fetchAll();
            foreach ($result_type as $row_type) {
                $examType = $row_type['examType'];  
                $examTypePercentage = $row_type['examTypePercentage']; 
                $cal2 = $examTypePercentage / 100;
                $cal3 = (int)($totalQuestions * $cal2);
                $questionTypes[$examType] = $cal3; // Use [] to assign the value to the array
            }

    
    // // Generate and execute the SQL query based on the criteria
    $questions = [];
    foreach ($subjectDistribution as $subject => $count) {
        foreach ($questionTypes as $questionType => $typeCount) {
            foreach ($difficultyLevels as $difficulty => $difficultyCount) {
            //   echo $subject;
                 $query = "SELECT * FROM exam_question WHERE category = '$subject' 
                AND `type` = '$questionType' 
                AND difficulty = '$difficulty' 
                ORDER BY RAND() 
                LIMIT $difficultyCount;";       
                $stmt = $connect->query($query);
                
                $questions = array_merge($questions, $stmt->fetchAll());
            }
        }
    }
 
    // Randomly select 25 questions from the generated list
    shuffle($questions);
   
    $selectedQuestions = array_slice($questions, 0, $totalQuestions);
         $countSelectedQuestions = count($selectedQuestions);
   
    if($countSelectedQuestions==$totalQuestions){
    foreach ($selectedQuestions as $question) {
        // Assuming you have columns like 'id', 'question_text', 'category', 'type', 'difficulty', etc.
        $questionid = $question['id'];
       // Create an INSERT query
       
        $insertQuery = "INSERT INTO exam_question_ist (question_id,exam_id,code) 
                        VALUES ('$questionid','$id','$code')";
         $connect->query($insertQuery);
        
    }
   
    echo "Successfully Exam Created";
        $_SESSION['success'] = "Successfully Exam Created";
         header("Location:managetest.php");
    }else{
        echo "question count is less";
         $_SESSION['danger'] = "question count is less";
       header("Location:managetest.php");
    }
  

?>
