<?php
header("HTTP/1.0 404 Not Found");
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
// session_start();
// $_SESSION['page'] = 'grade sheet';
// $phase = "";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Home page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <?php include 'gs_thumbnail.php'; ?>

</head>
<body>

<table class="table table-bordered table-striped" id="dataTable">
        <thead>
            <tr>
                <th>Row</th>
                <th>Checklist</th>
                <th>Decsription</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Assigned To</th>
                <th>Priority</th>
                <th>Category</th>
                <th>Comments</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Rows will be dynamically added here -->
        </tbody>
    </table>
    <button id="addRowButton">Add Row</button>


  <script>
        // JavaScript code to handle adding rows and data

        document.getElementById('addRowButton').addEventListener('click', function () {
            addRow();
        });

        function addRow() {
            const table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
            const row = table.insertRow(-1); // Insert a row at the end of the table

            // Insert empty cells for each column
            for (let i = 0; i < 10; i++) {
                row.insertCell(i);
            }

            // You can customize the content and input fields for each cell as needed
            row.cells[0].innerHTML = table.rows.length - 1; // Row number
            row.cells[1].innerHTML = '<input type="text" placeholder="checklist">';
            row.cells[2].innerHTML = '<input type="text" placeholder="Description">';
            row.cells[3].innerHTML = '<input type="date" placeholder="Due date">';
            row.cells[4].innerHTML = '<input type="text" placeholder="Status">';
            row.cells[5].innerHTML = '<input type="text" placeholder="Assigened To">';
            row.cells[6].innerHTML = '<input type="text" placeholder="Priority">';
            row.cells[7].innerHTML = '<input type="text" placeholder="Category">';
            row.cells[8].innerHTML = '<input type="text" placeholder="Comments">';
            
            const saveButton = document.createElement('button');
            saveButton.innerHTML = 'Save';
            saveButton.addEventListener('click', function () {
                saveData(row);
            });
            row.cells[9].appendChild(saveButton);
        }

        function saveData(row) {
            // Extract and send the data to your server-side script for storage
            const rowData = {
                checklist: row.cells[1].textContent,
                description: row.cells[2].textContent,
                dueDate: row.cells[3].textContent,
                status: row.cells[4].textContent,
                assignedTo: row.cells[5].textContent,
                priority: row.cells[6].textContent,
                category: row.cells[7].textContent,
                comments: row.cells[8].getElementsByTagName('input')[0].value
            };

            // Send rowData to your server-side script for database storage
            // You'll need to implement the AJAX request or form submission for this
        }
    </script>

</body>
</html>