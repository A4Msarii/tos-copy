<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
 if(isset($_POST['instructor_id'])) {
    $instructorId = $_POST['instructor_id'];
    
    // Fetch classes taught by the instructor
    $query = $connect->prepare("SELECT * FROM gradesheet WHERE instructor = :instructor_id AND over_all_grade IS NULL ORDER BY id");
    $query->bindParam(':instructor_id', $instructorId);
    $query->execute();
    
    // Prepare HTML content for classes
    $classesHtml = '';
    $count = 0; // Counter for anchor tags
    while($classData = $query->fetch(PDO::FETCH_ASSOC)) {
        // if ($count < 3) { // Display only the first 3 anchor tags directly
            $table_name10 = $classData['class'];
            $symbol_id10 = $classData['class_id'];
            $user_Id = $classData['user_id'];
            if ($table_name10 == "actual") {
                $q10 = $connect->prepare("SELECT symbol FROM $table_name10 WHERE id=?");
                $q11 = $connect->query("SELECT actual FROM $table_name10 WHERE id = '$symbol_id10'");
            } else if ($table_name10 == "sim") {
                $q10 = $connect->prepare("SELECT shortsim FROM $table_name10 WHERE id=?");
                $q11 = $connect->query("SELECT sim FROM $table_name10 WHERE id = '$symbol_id10'");
            }
            $insQ = $connect->query("SELECT nickname FROM users WHERE id = '$user_Id'");
            $insD = $insQ->fetchColumn();

            $name111221 = $q11->fetchColumn();
            $q10->execute([$symbol_id10]);
            $name_class = $q10->fetchColumn();
            
            // Generating anchor tags
            $classesHtml .= '<a href="' . BASE_URL . 'includes/Pages/newgradesheet.php?id=' . urlencode(base64_encode($symbol_id10)) . '&class_name=' . urlencode(base64_encode($table_name10)) . '&std_id=' . $user_Id . '" style="margin-right: 10px; width:max-content; height: fit-content;margin-bottom:20px;" class="btn btn-danger position-relative">' . $name_class . '<span class="circleig1">' . $insD . '</span></a>';
            
        //     $count++;
        // }
    }
    
    // Return HTML content for classes
    echo $classesHtml;
}
?>