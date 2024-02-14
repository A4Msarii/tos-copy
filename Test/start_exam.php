<?php
// Start a new PHP session
session_start();

// Set the exam duration (in seconds)
$examDuration = 4; // 1 hour (adjust as needed)

// Store the start time in the session
if (!isset($_SESSION['exam_start_time'])) {
     $_SESSION['exam_start_time'] = time();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exam In Progress</title>
</head>
<body>
    <h1>Exam In Progress</h1>
    <p>You have <span id="timer"><?php echo $examDuration; ?></span> seconds to complete the exam.</p>

    <script>
        // Timer countdown
        var examDuration = <?php echo $examDuration; ?>;
        var timerElement = document.getElementById('timer');

        function updateTimer() {
            var minutes = Math.floor(examDuration / 60);
            var seconds = examDuration % 60;
            
            timerElement.textContent = minutes + "m " + seconds + "s";
        }

        var timer = setInterval(function() {
            examDuration--;

            if (examDuration <= 0) {
                clearInterval(timer); // Stop the timer
                alert("Time's up! Your session will be ended.");
                window.location.href = "end_exam.php"; // Redirect to end exam page
            }

            updateTimer();
        }, 1000); // Update every 1 second

        // Initial timer display
        updateTimer();
    </script>
</body>
</html>
