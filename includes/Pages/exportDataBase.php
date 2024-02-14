<?php
// Database connection parameters
include('../config.php');
include(ROOT_PATH . 'includes/connect.php');

$servername = "localhost";
$username = "root";
$password = "";
$database = "grade sheet";

if (isset($_REQUEST['exportDataBase'])) {


    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get a list of tables in the database

    $adminPassword = $_REQUEST['adminPassword'];
    $password = md5($adminPassword);

    $exportOption = $_REQUEST['exportOption'];

    $adminQuery = $connect->query("SELECT COUNT(*) FROM users WHERE role = 'super admin' AND password = '$password'");
    $data = $adminQuery->fetchColumn();
    if ($data != 0) {
        if ($exportOption == "structureAndData") {
            $tables = array();
            $result = $conn->query("SHOW TABLES");
            while ($row = $result->fetch_array()) {
                $tables[] = $row[0];
            }

            // Iterate through each table and export its data
            $output = '';
            foreach ($tables as $table) {
                $output .= "DROP TABLE IF EXISTS $table;\n";
                $result = $conn->query("SHOW CREATE TABLE $table");
                $row = $result->fetch_row();
                $output .= $row[1] . ";\n\n";

                $result = $conn->query("SELECT * FROM $table");
                $columnCount = $result->field_count;

                while ($row = $result->fetch_assoc()) {
                    $output .= "INSERT INTO $table VALUES(";

                    for ($i = 0; $i < $columnCount; $i++) {
                        $value = $conn->real_escape_string($row[array_keys($row)[$i]]);

                        if (isset($value)) {
                            $output .= "'" . $value . "'";
                        } else {
                            $output .= "NULL";
                        }

                        if ($i < $columnCount - 1) {
                            $output .= ",";
                        }
                    }

                    $output .= ");\n";
                }

                $output .= "\n\n";
            }

            // Close the connection
            $conn->close();

            // Set the appropriate headers for file download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="database_export.sql"');

            // Output the file contents
            echo $output;
        }

        if ($exportOption == "dataOnly") {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "grade sheet";
            $tablesToExclude = array("grade_per", "percentage", "roles", "users"); // Add the table names to exclude here

            // Create a connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get a list of tables in the database
            $tables = array();
            $result = $conn->query("SHOW TABLES");
            while ($row = $result->fetch_array()) {
                $tables[] = $row[0];
            }

            // Export the data from each table (excluding the specified tables)
            $output = '';
            foreach ($tables as $table) {
                if (in_array($table, $tablesToExclude)) {
                    continue; // Skip the table if it's in the exclusion list
                }

                $result = $conn->query("SELECT * FROM $table");
                $columnCount = $result->field_count;

                while ($row = $result->fetch_assoc()) {
                    $output .= "INSERT INTO $table VALUES(";

                    for ($i = 0; $i < $columnCount; $i++) {
                        $value = $conn->real_escape_string($row[array_keys($row)[$i]]);

                        if (isset($value)) {
                            $output .= "'" . $value . "'";
                        } else {
                            $output .= "NULL";
                        }

                        if ($i < $columnCount - 1) {
                            $output .= ",";
                        }
                    }

                    $output .= ");\n";
                }
            }

            // Close the connection
            $conn->close();

            // Set the appropriate headers for file download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="database_data_export.sql"');

            // Output the file contents
            echo $output;
        }

        if ($exportOption == "structureOnly") {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "grade sheet";

            // Create a connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Export the structure of all tables in the database
            $output = '';
            $result = $conn->query("SHOW TABLES");
            while ($row = $result->fetch_array()) {
                $table = $row[0];
                $resultTable = $conn->query("SHOW CREATE TABLE $table");
                $rowTable = $resultTable->fetch_row();
                $output .= $rowTable[1] . ";\n\n";
            }

            // Close the connection
            $conn->close();

            // Set the appropriate headers for file download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="database_structure_export.sql"');

            // Output the file contents
            echo $output;
        }
    } else {
       $_SESSION['danger'] = "Please Enter Valid Password";
        header('Location:dataBase.php');
    }
}

?>

<script>
  // Wait for the file to download, then redirect the user back to the previous page
  setTimeout(function() {
    history.go(-1);
  }, 3000); // Redirect after 3 seconds
</script>
