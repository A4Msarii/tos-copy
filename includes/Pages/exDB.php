<?php

include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');


// Assuming $connect is a PDO object


// $tables = array();
// $result = $connect->query("SHOW TABLES");
// while ($row = $result->fetch(PDO::FETCH_NUM)) {
//     $tables[] = $row[0];
// }

// // Iterate through each table and export its data
// $output = '';
// foreach ($tables as $table) {
//     $output .= "DROP TABLE IF EXISTS $table;\n";
//     $result = $connect->query("SHOW CREATE TABLE $table");
//     $row = $result->fetch(PDO::FETCH_NUM);
//     $output .= $row[1] . ";\n\n";

//     $result = $connect->query("SELECT * FROM $table");
//     $columnCount = $result->columnCount();

//     while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//         $output .= "INSERT INTO $table VALUES(";

//         for ($i = 0; $i < $columnCount; $i++) {
//             $value = $connect->quote($row[array_keys($row)[$i]]);

//             if (isset($value)) {
//                 $output .= $value;
//             } else {
//                 $output .= "NULL";
//             }

//             if ($i < $columnCount - 1) {
//                 $output .= ",";
//             }
//         }

//         $output .= ");\n";
//     }

//     $output .= "\n\n";
// }

// // Set the appropriate headers for file download
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment; filename="databaseWithDataAndStructure.sql"');

// // Output the file contents
// echo $output;


// if ($exportOption == "dataOnly") {
// $tablesToExclude = array("grade_per", "percentage", "roles", "users"); // Add the table names to exclude here

try {
    // Create a PDO connection
    // $connect = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get a list of tables in the database
    $tables = array();
    $result = $connect->query("SHOW TABLES");
    while ($row = $result->fetch(PDO::FETCH_NUM)) {
        $tables[] = $row[0];
    }

    // Export the data from each table (excluding the specified tables)
    $output = '';
    foreach ($tables as $table) {
        // if (in_array($table, $tablesToExclude)) {
        //     continue; // Skip the table if it's in the exclusion list
        // }

        $stmt = $connect->query("SELECT * FROM $table");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $output .= "INSERT INTO $table VALUES(";

            foreach ($row as $value) {
                $value = $connect->quote($value);

                if (isset($value)) {
                    $output .= $value;
                } else {
                    $output .= "NULL";
                }

                $output .= ",";
            }

            $output = rtrim($output, ","); // Remove the trailing comma
            $output .= ");\n";
        }
    }

    // Set the appropriate headers for file download

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



try {
    // Connect to the database
    // $co = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    
    // Set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the list of tables in the database
    $stmt = $connect->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Drop existing tables
    foreach ($tables as $table) {
        $connect->exec("DROP TABLE IF EXISTS $table");
    }
    // $dataBsePath = BASE_URL."Database/Database/grade_sheet.sql";
    // include("");
    // Import blank database structure
    $importQuery = file_get_contents(ROOT_PATH.'Database\Full blank database\grade_sheet.sql');
    $connect->exec($importQuery);

    // echo "All tables dropped and blank database imported successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}



header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="grade sheet.sql"');

// Output the file contents
echo $output;


// header("Location: Home.php");
// }
?>

