<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');



try {


    // Set PDO to throw exceptions on error
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the list of tables
    $tables = $connect->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

    // Initialize output
    $output = '';

    foreach ($tables as $table) {
        // Drop table if exists
        $output .= "DROP TABLE IF EXISTS $table;\n";

        // Get create table statement
        $result = $connect->query("SHOW CREATE TABLE $table");
        $createTable = $result->fetch(PDO::FETCH_ASSOC)['Create Table'];
        $output .= $createTable . ";\n\n";

        // Get data from the table
        $result = $connect->query("SELECT * FROM $table");
        $data = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $row) {
            $output .= "INSERT INTO $table VALUES(";

            // Process each column
            foreach ($row as $value) {
                $value = $connect->quote($value);
                $output .= "$value,";
            }

            // Remove the trailing comma
            $output = rtrim($output, ',');

            $output .= ");\n";
        }

        $output .= "\n\n";
    }

    // Close the PDO connection


    // Set the appropriate headers for file download
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="database_export.sql"');
    echo $output;
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // // Get the list of tables
    $stmt = $connect->query("SHOW TABLES");
    $tables1 = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Drop each table
    foreach ($tables1 as $table1) {
        $connect->exec("DROP TABLE IF EXISTS $table1");
    }
 
    // Your SQL dump content

     $sqlDump = file_get_contents(ROOT_PATH.'Database\Full blank database\grade_sheet.sql');

     // Split the SQL dump into individual queries
     $queries = explode(';', $sqlDump);
 
     foreach ($queries as $query) {
         // Execute each query
         $connect->exec($query);
     }
      
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
