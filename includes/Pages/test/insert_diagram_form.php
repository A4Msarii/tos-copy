

<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

// Define the folder where you want to store uploaded images
$uploadDir = "diagram/"; // Change this to your desired folder path
SESSION_START();
if (isset($_POST["saveit"])) {
  
        // Process each submitted row of data
         $course = $_POST["course"];
        $questions = $_POST["question"];
        $fileNames = $_FILES["file"]["name"];

        $labels = $_POST["lables_number"];
        $difficulties = $_POST["difficulty"];
        $documents = $_POST["document"];
        $lables_value = $_POST["labels_value"];
  
                    // Create a new array with keys a, b, c
            $newArray = array();
            $keys = range('a', 'z');
            for ($i = 0; $i < count($lables_value); $i++) {
                $newArray[$keys[$i]] = $lables_value[$i];
            }
            
            $dataString = serialize($newArray);
            print_r($dataString);
        
        // Loop through the submitted data and insert it into the database
        for ($i = 0; $i < count($questions); $i++) {
            // Handle file uploads
            $fileTmpName = $_FILES["file"]["tmp_name"][$i];
            $uploadDir = "diagram/"; // Specify your upload directory
            $uploadPath = $uploadDir . $fileNames[$i];
            
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                $type='digrame';
                // File upload successful, insert data into the database digrame
                $sql = "INSERT INTO exam_question (category,type,question, file_name, correst_answer, difficulty, document) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $connect->prepare($sql);
                $stmt->execute([$course,$type, $questions[$i], $fileNames[$i], $dataString, $difficulties[$i], $documents[$i]]);
            } else {
                // Handle file upload failure
                echo "File upload failed for row $i.";
            }
        }
   
     $_SESSION['success'] = "Question Inserted Successfully";
		 header("Location:../create_test.php");
		}
?>

