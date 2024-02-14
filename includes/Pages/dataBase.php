<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_POST['runPython'])) {
    echo "Button clicked. Running Python script...";
    $output = exec("python D:\\xampp\\htdocs\\latest\\TOS\\includes\\Pages\\file.py 2>&1");
    echo $output;
}

?>
<!DOCTYPE html>
<html>
<title>Export Database</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
<link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>

<style type="text/css">
    #button {
        display: inline-block;
        position: relative;
        margin: 1em;
        /*    padding: 0.57em;*/
        border: 2px solid #FFF;
        overflow: hidden;
        text-decoration: none;
        /*    font-size: 2em;*/
        outline: none;
        color: #FFF;
        /*    background: black;*/
        font-family: 'raleway', sans-serif;
    }

    #button span {
        color: #FFF;
        -webkit-transition: 0.6s;
        -moz-transition: 0.6s;
        -o-transition: 0.6s;
        transition: 0.6s;
        -webkit-transition-delay: 0.2s;
        -moz-transition-delay: 0.2s;
        -o-transition-delay: 0.2s;
        transition-delay: 0.2s;
    }

    #button:before,
    #button:after {
        content: '';
        position: absolute;
        top: 0.67em;
        left: 0;
        width: 100%;
        text-align: center;
        opacity: 0;
        -webkit-transition: .4s, opacity .6s;
        -moz-transition: .4s, opacity .6s;
        -o-transition: .4s, opacity .6s;
        transition: .4s, opacity .6s;
    }

    /* :before */

    #button:before {
        content: attr(data-hover);
        -webkit-transform: translate(-150%, 0);
        -moz-transform: translate(-150%, 0);
        -ms-transform: translate(-150%, 0);
        -o-transform: translate(-150%, 0);
        transform: translate(-150%, 0);
    }

    /* :after */

    #button:after {
        content: attr(data-active);
        -webkit-transform: translate(150%, 0);
        -moz-transform: translate(150%, 0);
        -ms-transform: translate(150%, 0);
        -o-transform: translate(150%, 0);
        transform: translate(150%, 0);
    }

    /* Span on :hover and :active */

    #button:hover span,
    #button:active span {
        opacity: 0;
        -webkit-transform: scale(0.3);
        -moz-transform: scale(0.3);
        -ms-transform: scale(0.3);
        -o-transform: scale(0.3);
        transform: scale(0.3);
    }

    /*  
    We show :before pseudo-element on :hover 
    and :after pseudo-element on :active 
*/

    #button:hover:before,
    #button:active:after {
        opacity: 1;
        -webkit-transform: translate(0, 0);
        -moz-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        -o-transform: translate(0, 0);
        transform: translate(0, 0);
        -webkit-transition-delay: .0s;
        -moz-transition-delay: .0s;
        -o-transition-delay: .0s;
        transition-delay: .0s;
    }

    /* 
  We hide :before pseudo-element on :active
*/

    #button:active:before {
        -webkit-transform: translate(-150%, 0);
        -moz-transform: translate(-150%, 0);
        -ms-transform: translate(-150%, 0);
        -o-transform: translate(-150%, 0);
        transform: translate(-150%, 0);
        -webkit-transition-delay: 0s;
        -moz-transition-delay: 0s;
        -o-transition-delay: 0s;
        transition-delay: 0s;
    }
</style>

<body>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
  <div id="loading-screen" style="display:none;">
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  </div>

    <div id="header-hide">
        <?php
        include(ROOT_PATH . 'includes/head_navbar.php');

        ?>
    </div>

    <style>
        /* body {
            width: 100vw;
            height: 100vh;
            display: flex;
            position: relative;
            background: #1e1e24;
            align-items: center;
            justify-content: center;
        } */

        .btn-flip1 {
            padding: 0px !important;
            opacity: 1;
            outline: 0;
            /* color: #fff; */
            line-height: 43px;
            position: relative;
            text-align: center;
            letter-spacing: 1px;
            display: inline-block;
            text-decoration: none;
            text-transform: uppercase;
        }

        .btn-flip1:hover:after {
            opacity: 1;
            transform: translateY(0) rotateX(0);
        }

        .btn-flip1:hover:before {
            opacity: 0;
            transform: translateY(50%) rotateX(90deg);
        }

        .btn-flip1:after {
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            display: block;
            transition: 0.5s;
            position: absolute;
            content: attr(data-back);
            transform: translateY(-50%) rotateX(90deg);
        }

        .btn-flip1:before {
            top: 0;
            left: 0;
            opacity: 1;
            display: block;
            padding: 0 30px;
            line-height: 40px;
            transition: 0.5s;
            position: relative;
            content: attr(data-front);
            transform: translateY(0) rotateX(0);
        }
    </style>
    <!--Main contect We need to insert data here-->
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div>
            <div class="content container-fluid" style="height: 30rem;">
                <!-- Page Header -->
                <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
                <div class="page-header" style="padding: 0px;">
                    <h1 class="text-success">
                        DataBase
                    </h1>
                </div>
                <!-- End Page Header -->
            </div>
        </div>
        <!-- End Content -->

        <!-- Content -->
        <div class="content container-fluid" style="margin-top: -20rem;">

            <div class="row justify-content-center">

                <div class="col-lg-10 mb-3 mb-lg-5">
                    <!-- Card -->
                    <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
                        <!-- Header -->
                        <a href="<?php echo BASE_URL;?>includes/Pages/usersinfo.php" class="btn btn-soft-secondary" title="Back To DataPage" style="width: fit-content;margin: 5px;"><i class="bi bi-arrow-left"></i></a>
                       <!--  <form method="post">
                                    <input type="submit" name="runPython" value="Run Python App" class="btn btn-primary m-1"/>
                                </form> -->
                        <div class="card-body">
                            
                            <!-- Tab Content -->
                            <!-- End Header -->
                            <ul class="nav nav-pills justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-secondary" id="exportData" href="#export" data-bs-toggle="pill" data-bs-target="#export" role="tab" aria-controls="user" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            Export To SQL
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-secondary" id="cleardata" href="#clearData" data-bs-toggle="pill" data-bs-target="#clearData" role="tab" aria-controls="vehicle" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            Clear SQL Data
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <form method="post">
                                    <a class="nav-link text-secondary" type="submit" name="runPython" value="Run Python App">
                                        <div class="d-flex align-items-center">
                                            Move Files/Folder
                                        </div>
                                    </a>
                                </form>
                                </li>
                            </ul>
                        </div>
                        <!-- End Card -->

                        <div class="card-body">
                            <!-- Tab Content -->
                            <center>
                                <div class="tab-content">
                               
                                    <div class="tab-pane fade show active" id="export" role="tabpanel" aria-labelledby="setting-tab">
                                        <!-- <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exportModal">Export DataBase</button>  
                                        <form action="<?php echo BASE_URL; ?>includes/Pages/exDB.php" method="post">
                                        <button class="btn btn-secondary">Export DataBase</button>     </form> -->
                                        <!-- <h1>Schedule a Task</h1> -->
                                        <form id="export-form">
                                            <div class="row">
                                               <div class="col-md-3">
                                                  <label for="export_path" style="font-weight:bold;float: left;" class="text-dark">Export File Path:</label>
                                                    <input type="text" id="export_path" class="form-control" name="export_path" placeholder="D:\\path\\to\\export\\file.sql" required> 
                                               </div> 
                                               <div class="col-md-3">
                                                   <label for="schedule_frequency" style="font-weight:bold;float: left;" class="text-dark">Schedule Frequency:</label>
                                                    <select id="schedule_frequency" class="form-control" name="schedule_frequency">
                                                        <option value="daily">Daily</option>
                                                        <option value="weekly">Weekly</option>
                                                        <option value="monthly">Monthly</option>
                                                        <option value="every_min">Every Minute</option>
                                                    </select>
                                               </div>
                                                <div class="col-md-3">
                                                   <label for="scheduled_date" style="font-weight:bold;float: left;" class="text-dark">Scheduled Date :</label>
                                                    <input type="date" id="scheduled_date" class="form-control" name="scheduled_date" required>
                                               </div> 
                                               <div class="col-md-3">
                                                   <label for="scheduled_time" style="font-weight:bold;float: left;" class="text-dark">Scheduled Time (HH:MM):</label>
                                                   <input type="time" id="scheduled_time" name="scheduled_time" class="form-control" required>
                                               </div>
                                            </div>
                                            <hr>
                                            <input id="exportButton" type="button" value="Export" class="btn btn-success">

                                        </form>
                                        <hr>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th class="text-white">File Path</th>
                                                <th class="text-white">Scheduled Frequency</th>
                                                <th class="text-white">Scheduled Date</th>
                                                <th class="text-white">Scheduled Time</th>
                                                <th class="text-white">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tasksTableBody">
    <!-- Example row - In reality, rows will be added dynamically via JavaScript -->
    <tr>
        <td contenteditable="true">D:\\path\\to\\export\\file.sql</td>
        <td contenteditable="true">Daily</td>
        <td contenteditable="true">2023-01-01</td>
        <td contenteditable="true">12:00</td>
        <td>
            <!-- <button class="btn btn-soft-success btn-sm" onclick="saveTask(this)"><i class="bi bi-save"></i></button>
            <button class="btn btn-soft-danger btn-sm" onclick="deleteTask('C:\\path\\to\\export\\file.sql')"><i class="bi bi-trash"></i></button> -->
        </td>
    </tr>
</tbody>

                                    </table>

                                 


                                    </div>
                                    <!-- Edit Task Modal -->
<!-- Edit Task Modal -->
<!-- <div id="editTaskModal" class="modal">
  <div class="modal-content">
    <span class="close-button" onclick="closeEditModal()">&times;</span>
    <form id="edit-task-form">
      <label for="editExportPath">Export File Path:</label>
      <input type="text" id="editExportPath" class="form-control" required>

      <label for="editScheduleFrequency">Schedule Frequency:</label>
      <select id="editScheduleFrequency" class="form-control">
        <option value="daily">Daily</option>
        <option value="weekly">Weekly</option>
        <option value="monthly">Monthly</option>
        <option value="every_min">Every Minute</option>
      </select>

      <label for="editScheduledDate">Scheduled Date (YYYY-MM-DD):</label>
      <input type="date" id="editScheduledDate" class="form-control" required>

      <label for="editScheduledTime">Scheduled Time (HH:MM):</label>
      <input type="time" id="editScheduledTime" class="form-control" required>

      <button type="button" class="btn btn-success" onclick="submitEditTask()">Save Changes</button>
    </form>
  </div>
</div> -->

                                  
                                    <div class="tab-pane fade" id="clearData" role="tabpanel" aria-labelledby="setting-tab">
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#truncateModal">Turncate</button>
                                    </div>
                    </div>
                </div>

            </div>
        </div>
    </main>


    <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Password</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <form action="<?php echo BASE_URL; ?>includes/Pages/exportDataBase.php" method="post">

                            <select class="form-select fileOpt" aria-label="Default select example" style="width:100%;margin: auto;margin-bottom:25px;" id="" name="exportOption" required>
                                <option selected disabled>Select Export Method</option>
                                <option value="structureAndData">Structure And Data</option>
                                <option value="structureOnly">Structure Only</option>
                                <option value="dataOnly">Data Only</option>
                            </select>

                            <input type="password" placeholder="Enter Admin Password" name="adminPassword" id="adminPassword" class="form-control" value="" required="">
                            <br>
                            <button class="btn btn-secondary" type="submit" name="exportDataBase">Export</button>
                        </form>
                        
                        
                    </center>
                    
                    
                </div>
            </div>
        </div>
    </div>
   

    

    <!-- truncate modal -->

    <div class="modal fade" id="truncateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Password</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <form action="<?php echo BASE_URL; ?>includes/Pages/truncateDataBase.php" method="post">
                            <input type="password" placeholder="Enter Admin Password" name="adminPassword" id="adminPassword" class="form-control" value="" required="">
                            <br>
                            <p>Please make a backup first before truncate the table
                                <a style="cursor:pointer;text-decoration:underline;color:blue;" data-bs-toggle="modal" data-bs-target="#exportModal">clickhere to export</a>
                            </p>
                            <button class="btn btn-secondary" type="submit" name="truncateData">Truncate DataBase</button>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- truncate modal end -->

    <!--Footer-->


    <script>
document.addEventListener('DOMContentLoaded', fetchTasks);

var exportButton = document.getElementById("exportButton");

exportButton.addEventListener("click", function() {
    var exportPath = document.getElementById("export_path").value;
    var scheduleFrequency = document.getElementById("schedule_frequency").value;
    var scheduledDate = document.getElementById("scheduled_date").value;
    var scheduledTime = document.getElementById("scheduled_time").value;

    var scheduledDateTime;
    if (scheduleFrequency === "daily") {
        scheduledDateTime = scheduledTime;
    } else {
        scheduledDateTime = scheduledDate + ' ' + scheduledTime;
    }

    var taskData = {
        export_path: exportPath,
        schedule_frequency: scheduleFrequency,
        scheduled_datetime: scheduledDateTime
    };

    fetch('https://192.168.1.33:8000/receive_task', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(taskData)
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        fetchTasks(); // Refresh the tasks list after adding a new task
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

function fetchTasks() {
    fetch('https://192.168.1.33:8000/view_tasks')
        .then(response => response.json())
        .then(tasks => {
            console.log('Tasks received:', tasks);
            let tableBody = document.getElementById('tasksTableBody');
            tableBody.innerHTML = '';

            tasks.forEach(task => {
                console.log('Export Path:', task.export_path); // Should log the file path
                console.log('Schedule Frequency:', task.schedule_frequency); 
                let row = tableBody.insertRow();
                addEditableCell(row, 0, task.export_path);
                addEditableCell(row, 1, task.schedule_frequency);

                let datetimeParts = task.scheduled_datetime.split(' ');
                addEditableCell(row, 2, datetimeParts[0] || 'Not set');
                addEditableCell(row, 3, datetimeParts[1] || 'Not set');

                // Add action buttons
                let actionCell = row.insertCell(4);

                // Save button
                let saveButton = document.createElement('button');
                saveButton.className = 'btn btn-soft-success btn-sm';
                saveButton.innerHTML = '<i class="bi bi-save"></i>';
                saveButton.type = 'button';
                saveButton.onclick = function() { saveTask(this, task.export_path); };
                actionCell.appendChild(saveButton);

                // Delete button
                let deleteButton = document.createElement('button');
                deleteButton.className = 'btn btn-soft-danger btn-sm';
                deleteButton.innerHTML = '<i class="bi bi-trash"></i>';
                deleteButton.type = 'button';
                deleteButton.onclick = function() { deleteTask(task.export_path); };
                actionCell.appendChild(deleteButton);
            });
        })
        .catch(error => console.error('Error:', error));
}


function addEditableCell(row, index, text) {
    let cell = row.insertCell(index);
    cell.setAttribute('contenteditable', 'true');
    cell.innerText = text;
}

// function openEditModal(task) {
//     // Store the original export path in a data attribute for later use
//     var editForm = document.getElementById('edit-task-form');
//     editForm.dataset.originalExportPath = task.export_path;

//     // Show the modal
//     var modal = document.getElementById('editTaskModal');
//     modal.style.display = 'block';
// }

function saveTask(button, originalExportPath) {
    const row = button.closest('tr');
    const newExportPath = row.cells[0].innerText;
    const newScheduleFrequency = row.cells[1].innerText;
    const newScheduledDate = row.cells[2].innerText;
    const newScheduledTime = row.cells[3].innerText;

    const taskData = {
        original_export_path: originalExportPath,
        new_export_path: newExportPath,
        new_schedule_frequency: newScheduleFrequency,
        new_scheduled_datetime: `${newScheduledDate} ${newScheduledTime}`
    };

    // Send updated data to the server
    fetch('https://192.168.1.33:8000/edit_task', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(taskData)
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        fetchTasks(); // Refresh the tasks list
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error saving task.');
    });
}




// function editTask(exportPath) {
//     fetch(`https://192.168.29.160:8000/get_task?export_path=${encodeURIComponent(exportPath)}`)
//     .then(response => {
//         if (!response.ok) {
//             throw new Error(`HTTP error! Status: ${response.status}`);
//         }
//         return response.json();
//     })
//     .then(task => {
//         // Assuming the server responds with task details in JSON format
//         document.getElementById('editExportPath').value = task.export_path || '';
//         document.getElementById('editScheduleFrequency').value = task.schedule_frequency || '';
//         document.getElementById('editScheduledDate').value = task.scheduled_date || ''; // Format: YYYY-MM-DD
//         document.getElementById('editScheduledTime').value = task.scheduled_time || ''; // Format: HH:MM

//         // Show the modal after successfully fetching and setting the task details
//         document.getElementById('editTaskModal').style.display = 'block';
//     })
//     .catch(error => {
//         console.error('Error fetching task details:', error);
//         alert('Failed to load task details for editing.');

//     });
// }


// function closeEditModal() {
//     document.getElementById('editTaskModal').style.display = 'none';
// }


// function submitEditTask() {
//     var editForm = document.getElementById('edit-task-form');
//     var originalExportPath = editForm.dataset.originalExportPath;

//     // Fetch new data from the form
//     var newExportPath = document.getElementById('editExportPath').value;
//     var newScheduleFrequency = document.getElementById('editScheduleFrequency').value;
//     var newScheduledDate = document.getElementById('editScheduledDate').value;
//     var newScheduledTime = document.getElementById('editScheduledTime').value;

//     var newScheduledDatetime = `${newScheduledDate} ${newScheduledTime}`;

//     var taskData = {
//         original_export_path: originalExportPath,
//         new_export_path: newExportPath,
//         new_schedule_frequency: newScheduleFrequency,
//         new_scheduled_datetime: newScheduledDatetime
//     };

//     fetch('https://192.168.29.160:8000/edit_task', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json'
//         },
//         body: JSON.stringify(taskData)
//     })
//     .then(response => response.json())
//     .then(data => {
//         alert(data.message);
//         fetchTasks(); // Refresh the tasks list
//     })
//     .catch(error => {
//         console.error('Error:', error);
//         alert('Error editing task.');
//     });

//     // Close the modal
//     var modal = document.getElementById('editTaskModal');
//     modal.style.display = 'none';
// }

function deleteTask(exportPath) {
    if (!confirm("Are you sure you want to delete this task?")) {
        return;
    }

    fetch('https://192.168.1.33:8000/delete_task', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ export_path: exportPath })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        fetchTasks(); // Refresh the tasks list
    })
    .catch(error => console.error('Error:', error));
}
</script>

<?php
 if (isset($_POST['runPython'])) {
    echo "Button clicked. Running Python script...";
    $output = exec("python D:\\xampp\\htdocs\\latest\\TOS\\includes\\Pages\\file.py 2>&1");
    echo $output;
}
?>


<form method="post">
    <input type="submit" name="runPython" value="Run Python App"/>
</form>

<!-- Include your HTML content below -->



 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>



</body>



</html>