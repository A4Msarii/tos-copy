<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Class</title>
    <!-- <title>Phase</title> -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
    <style>
        @media print {
            body * {
                display: none;
            }

            #courseDetailTables {
                display: table;
            }
        }
    </style>
</head>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
    <div id="header-hide">
        <?php
        include(ROOT_PATH . 'includes/head_navbar.php');
        ?>
    </div>
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div>
            <div class="content container-fluid" style="height: 30rem;">
                <!-- Page Header -->
                <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
                <div class="page-header" style="padding: 0px;">
                    <h1 class="text-success">

                        Course Details
                        <?php
                        $fetchCode = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '$std_course1'");
                        echo $fetchCode->fetchColumn() . " - " . $CourseCode11;
                        $fetchStDate = $connect->query("SELECT CourseDate FROM newcourse WHERE CourseName = '$std_course1' AND CourseCode = '$CourseCode11' GROUP BY CourseName,CourseCode");
                        echo "/" . $fetchStDate->fetchColumn();
                        ?>
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
                    <div class="card card-hover-shadow" style="border:0.001rem solid #dddddd;" id="">
                        <div class="card-body">
                            <?php
                            $courseId = $c_id;

                            ?>
                            <?php if (isset($_SESSION['permission']) && $permission['export_course'] == "1") { ?>
                                <button id="exportButton" class="btn btn-outline-secondary" style="float:right;"><i class="bi bi-printer-fill"></i></button>
                                <form method="POST" action="<?php echo BASE_URL; ?>includes/Pages/addFileForUser.php" enctype="multipart/form-data" style="float: left;">
                                    <input type="hidden" name="courseId" value="<?php echo $courseId; ?>" />
                                    <input type="hidden" name="studentId" value="<?php echo $fetchuser_id; ?>" />
                                    <input type="file" name="uploadFile[]" class="from-control" multiple />
                                    <input type="submit" value="Upload" name="addFile" class="btn btn-success" />
                                </form>
                        </div>
                        <hr><?php } ?>
                    </div>
                    <div class="card-body">
                        <?php
                        $stuFile = $connect->query("SELECT * FROM userdocumnet WHERE studentId = '$courseId'");
                        while ($stuData = $stuFile->fetch()) {
                        ?>
                            <div style="display: inline-block;">
                                <button style="width: auto;margin-right:-5px;" onclick="window.open('<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $stuData['fileName']; ?>', '_blank');" class="btn iconBtn btn-outline-primary btn-sm" title="<?php echo $stuData['fileName']; ?>"><?php echo $stuData['fileName']; ?>
                                    <!-- <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/deleteWarningDoc.php?docId=<?php echo $row_data2['id']; ?>&notiId=<?php echo $no_id; ?>"><i class="bi bi-trash-fill"></i></a> -->

                                </button>
                                <a href="<?php echo BASE_URL; ?>includes/Pages/deleteWarningDoc.php?classId=<?php echo $courseId; ?>&fileId=<?php echo $stuData['id']; ?>"><i style="position:relative;top:-8px;right:15px;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
                <!-- Card -->
                <div class="card card-hover-shadow" style="border:0.001rem solid #dddddd;">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <?php
                        $checkPer = $connect->query("SELECT count(*) FROM coursepermission WHERE permissionUser = '$user_id' OR permissionUser = '$role' OR permissionUser = 'everyone'");
                        if ($checkPer->fetchColumn() > 0) {
                        ?>
                            <br>
                            <table class="table table-striped table-bordered" id="newcoursetable">

                                <?php
                                $fetchCourse = $connect->query("SELECT * FROM coursepermission WHERE permissionUser = '$user_id' OR permissionUser = '$role' OR permissionUser = 'everyone' GROUP BY courseId");
                                while ($fetchCourseData = $fetchCourse->fetch()) {
                                    $courseId = $fetchCourseData['courseId'];
                                    $query1_cs = "SELECT * FROM newcourse WHERE Courseid = '$courseId'";
                                    $statement1_cs = $connect->prepare($query1_cs);
                                    $statement1_cs->execute();
                                    if ($statement1_cs->rowCount() > 0) {
                                        $result1_cs = $statement1_cs->fetchAll();
                                        $sn1 = 1;
                                        foreach ($result1_cs as $row1) {
                                            $crs_name = $row1['CourseName'];
                                            $course_name = $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
                                            $course_name->execute([$crs_name]);
                                            $name2 = $course_name->fetchColumn();
                                            $crs_man = $row1['CourseManager'];
                                            $course_man = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                                            $course_man->execute([$crs_man]);
                                            $name2_man = $course_man->fetchColumn();
                                ?>
                                            <tr>

                                                <td>
                                                    <a title="<?php echo $name2 . "-" . $row1['CourseCode']; ?>" class="btn btn-soft-warning btn-xs get_course_phase" data-getvalue="<?php echo $row1['Courseid']; ?>" id="<?php echo $row1['Courseid']; ?>" data-bs-toggle="modal" data-bs-target="#editphasecourse" onclick="document.getElementById('Courseid_val').value='<?php echo $row1['Courseid'] ?>';"><i class="bi bi-list-check"></i></a>

                                                </td>

                                            </tr>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </table>
                        <?php
                        }
                        ?>

                        <?php
                        $sr = 0;
                        $courseId = $c_id;

                        $courseManager = $connect->query("SELECT CourseManager FROM newcourse WHERE Courseid = '$courseId'");
                        $courseManagerData = $courseManager->fetchColumn();
                        $mainIns1 = $connect->query("SELECT nickname FROM users WHERE id = '$courseManagerData'");
                        $mainData1 = $mainIns1->fetchColumn();
                        ?>
                        <?php  ?>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body" id="courseDetailTable">
                        <center>
                            <table class="table table-striped table-bordered" id="courseTable">
                                <input style="margin: 5px;" class="form-control" type="text" id="newcoursesearch" onkeyup="course()" placeholder="Search for Course name.." title="Type in a name">
                                <thead class="bg-dark">
                                    <th class="text-white">Sr No</th>
                                    <!-- <th class="text-light">Course Id</th> -->
                                    <th class="text-white">Phase Name</th>
                                    <th class="text-white">Instructor</th>
                                    <th class="text-white">Backup Instructor</th>
                                    <th class="text-white">Course Name</th>
                                    <th class="text-white">Course Manager</th>
                                    <th class="text-white">Phase Date</th>
                                    <?php if (isset($_SESSION['permission']) && $permission['Delete_course'] == "1") { ?>
                                        <th class="text-white actionBtn">Action</th>
                                    <?php } ?>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 0;
                                    $courseId = $c_id;
                                    $phaseQ = $connect->query("SELECT * FROM manage_role_course_phase WHERE courseName ='$std_course1' AND courseCode = '$CourseCode11' GROUP BY phase_id");
                                    while ($phaseData = $phaseQ->fetch()) {
                                        $sr++;
                                        $inst = $phaseData['intructor'];
                                        $bInst = $phaseData['b_up_manger'];
                                        $pId = $phaseData['phase_id'];
                                        $mainIns = $connect->query("SELECT nickname FROM users WHERE id = '$inst'");
                                        $mainData = $mainIns->fetchColumn();
                                        $mainInsImg = $connect->query("SELECT file_name FROM users WHERE id = '$inst'");
                                        $mainImgData = $mainInsImg->fetchColumn();

                                        if ($mainImgData != "") {
                                            $pic11 = BASE_URL . 'includes/Pages/upload/' . $mainImgData;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                                                $pic11 = BASE_URL . 'includes/Pages/upload/' . $mainImgData;
                                            } else {
                                                $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                        } else {
                                            $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }


                                        $backIns = $connect->query("SELECT nickname FROM users WHERE id = '$bInst'");
                                        $backData = $backIns->fetchColumn();
                                        $backInsImg = $connect->query("SELECT file_name FROM users WHERE id = '$bInst'");
                                        $backImgData = $backInsImg->fetchColumn();

                                        if ($backImgData != "") {
                                            $pic111 = BASE_URL . 'includes/Pages/upload/' . $backImgData;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                                                $pic111 = BASE_URL . 'includes/Pages/upload/' . $backImgData;
                                            } else {
                                                $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                        } else {
                                            $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }

                                        $phaseMana = $connect->query("SELECT phasename FROM phase WHERE id = '$pId'");
                                        $phaseManaData = $phaseMana->fetchColumn();
                                        $courseName = $connect->query("SELECT CourseName FROM newcourse WHERE Courseid = '$courseId'");
                                        $courseData = $courseName->fetchColumn();
                                        $courseName1 = $connect->query("SELECT course FROM ctppage WHERE CTPid = '$courseData'");
                                        $courseData1 = $courseName1->fetchColumn();

                                    ?>
                                        <tr>
                                            <td><?php echo $sr; ?></td>
                                            <td><?php echo $phaseManaData; ?></td>
                                            <td><img style="margin: 5px;" src="<?php echo $pic11; ?>" alt="MainIns" class="avatar avatar-img avatar-circle" /><?php echo $mainData; ?>



                                            </td>
                                            <td>
                                                <img style="margin: 5px;" src="<?php echo $pic111; ?>" alt="backIns" class="avatar avatar-img avatar-circle" />
                                                <?php
                                                if ($backData == "") {
                                                    echo "--";
                                                } else {
                                                    echo $backData;
                                                }
                                                ?>

                                            </td>
                                            <td><?php echo $courseData1; ?></td>
                                            <td><?php echo $mainData1; ?></td>
                                            <td>
                                                <?php
                                                if ($phaseData['phaseDate'] == "") {
                                                    echo "--";
                                                } else {
                                                    echo $phaseData['phaseDate'];
                                                }
                                                ?>
                                            </td>
                                            <?php if (isset($_SESSION['permission']) && $permission['Delete_course'] == "1") { ?>
                                                <td class="actionBtn">
                                                    <a class="btn btn-soft-danger btn-xs" href="coursedetail_delete.php?Courseid=<?php echo $phaseData['id'] ?>"><i class="bi bi-trash-fill">
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </center>
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
                <br><br>




            </div>
        </div>


        <!-- End Content -->
    </main>

    <div class="modal fade" id="editphasecourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h3 class="modal-title text-success" id="exampleModalLabel">Edit phase</h3> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="get_course_foem1" method="post" action="<?php echo BASE_URL ?>includes/Pages/updated_phsae_course.php">


                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editcoursedeatil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Edit Course Manager</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="edit_coursemanager.php" id="">
                        ediy
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php include ROOT_PATH . "includes/Pages/courseList.php"; ?>

    <script>
        function course() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("newcoursesearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("newcoursetable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <script>
        function userlist() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("usersearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("usertable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>


    <script>
        function printTable() {
            var tableContent = document.getElementById('courseDetailTable').innerHTML;
            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print Table</title></head><body>' + tableContent + '</body></html>');
            printWindow.document.close();
            printWindow.print();
            // printWindow.close();
            // window.close();
        }
    </script>

    <!-- Assuming you have an export button with the id 'exportButton' and a div with id 'courseDetailTable' containing both the table and images -->

    <!-- Add the following scripts to your HTML file -->
    <script src="<?php echo BASE_URL; ?>assets/exportWord/src/FileSaver.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/exportWord/src/html2canvas.min.js"></script>

    <script>
        // Function to extract content from a specific div (including images)
        async function extractDivContent(divId) {
            const div = document.getElementById(divId);

            const table = div.querySelector('table');
            table.style.border = '1px solid black';


            $(".actionBtn").css("display", "none");

            // To export images, we use html2canvas library to convert the div into an image
            const canvas = await html2canvas(div);
            const image = canvas.toDataURL('image/png');
            $("#courseTable").css("display", "none");

            return {
                tableContent: table.outerHTML,
                image
            };
        }

        // Function to export the content to a Word document
        function exportToWord() {
            const divId = 'courseDetailTable';
            extractDivContent(divId).then(({
                tableContent,
                image
            }) => {
                const content = `
                <div>
                    ${tableContent}
                    <img src="${image}" />
                </div>
            `;

                const blob = new Blob([content], {
                    type: 'application/msword'
                });
                const filename = 'courseDetail.doc';
                saveAs(blob, filename);
                location.reload();
            });
        }

        // Attach click event listener to the export button
        document.getElementById('exportButton').addEventListener('click', exportToWord);
    </script>

    <!--Footer-->
    <footer id="contenthome" role="footer" class="footer">
        <?php include ROOT_PATH . 'includes/footer2.php'; ?>
    </footer>

    <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
</body>

</html>