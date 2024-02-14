<?php
$std_course = "";
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Calendar</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">


    <style>
        .fc .fc-bg-event {
            opacity: 1 !important;
        }

        .varun {
            /* font-size: large;
            font-weight: bold;
            margin: 5px; */
            text-align: center;
        }

        /* .fc-daygrid-day-number {
            font-weight: bold;
        } */
        .fc-event {
            border: 1px solid #607d8b6e !important;
        }

        .fc-daygrid-bg-harness {
            z-index: 99999999;
        }

        .fc .fc-multimonth-title {
            color: white !important;
/*            background-image: linear-gradient(117deg, rgba(123, 216, 96, 1) 39.2%, rgba(255, 255, 255, 1) 156.2%);*/
background-color: #607D8B;
            font-size: x-large;
            padding: 0px;
            font-family: cursive;
        }

        .getColorValue:hover {
            background-color: #bdbdbd;
        }

        .event-row:hover {
            background-color: #eeeeee;
        }

        @keyframes blink {

            0%,
            50%,
            100% {
                opacity: 1;
            }

            25%,
            75% {
                opacity: 0;
            }
        }

        .modal-title .blink-animation {
            animation: blink 2s infinite;
            /* Adjust the animation duration as needed */
        }

        .color-dropdown-c {
            position: relative;
            display: inline-block;
        }

        .color-dropdown-content-c {
            display: none;
            position: absolute;
            z-index: 1;
            width: 400px;
            border: 1px solid #E0E0E0;
            box-shadow: 1px 1px 9px 1px #BDBDBD;
            border-radius: 5px;
        }

        .color-option-c {
            width: 20px;
            height: 20px;
            margin-right: 3px;
            cursor: pointer;
            display: inline-block;
            position: relative;
            box-shadow: 1px 1px 6px 0px #80808061;
            border: 1px solid #80808033;
            border-radius: 5px;

        }

        .color-option-c:hover {
            width: 25px;
            height: 25px;
        }

        .checkmark1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            font-size: x-large;
            font-weight: bold;
            color: white;
        }

        .color-option-c.selected .checkmark1 {
            display: block;
        }

    </style>

</head>

<body>


    
    <div id="header-hide">
        <?php
        include(ROOT_PATH . 'includes/head_navbar.php');
        ?>
    </div>

    <!--Main contect We need to insert data here-->
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div>
            <div class="content container-fluid" style="height: 30rem;">
                <!-- Page Header -->
                <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
                <div class="page-header" style="padding: 0px;">
                    <h1 class="text-success">
                        <img style="height:30px; width:30px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/calendar.png">
                        Calendar
                    </h1>
                </div>
                <!-- End Page Header -->
            </div>
        </div>
        <!-- End Content -->

        <!-- Content -->
        <div class="content container-fluid" style="margin-top: -20rem;">

            <div class="row justify-content-center">

                <div class="col-lg-12 mb-3 mb-lg-5">
                    <!-- Card -->
                    <div class="card card-hover-shadow" id="" style="border:0.001rem solid #dddddd;">

                        <!-- Body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <div id='calendar'></div>
                                </div>
                                <div class="col-2">
                                    <div class="event-list">
                                        <div>
                                            <h3 style="float:left;">Cource List</h3>
                                            <input style="float:right;height: 30px;border-radius: 5px !important; " class="form-control" type="text" id="classessearch" onkeyup="ClassSearch()" placeholder="Search for Course.." title="Type in a name">
                                        </div><br>
                                        <table class="table text-nowrap text-lg-wrap table-hover table-centered" id="eventTable" style="margin-top: 25px;border-collapse: separate;border-spacing: 0 10px;">

                                            <tbody>
                                                <?php
                                                $fetchCourseFromDepart = $connect->query("SELECT * FROM course_in_department WHERE departmentId = '$department_Id'");
                                                while ($fetchCourseFromDepartData = $fetchCourseFromDepart->fetch()) {
                                                    $fetchAllCourse = $connect->query("SELECT * FROM newcourse
                                                  WHERE CourseName = '" . $fetchCourseFromDepartData['courseName'] . "'
                                                  AND CourseCode = '" . $fetchCourseFromDepartData['courseCode'] . "'
                                                  GROUP BY CourseCode, CourseName");
                                                    while ($allCourseData = $fetchAllCourse->fetch()) {
                                                        $stDate = 0;
                                                        $endDate = 0;
                                                        $ctpID = $allCourseData['CourseName'];
                                                        $fetchCtpName = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '$ctpID'");
                                                        $cName = $fetchCtpName->fetchColumn();
                                                        $cName1 = $cName . "-" . $allCourseData['CourseCode'];
                                                        $checkC = $connect->query("SELECT count(*) FROM course_cal WHERE courseName = '$cName1' AND userId = '$user_id'");
                                                        if ($checkC->fetchColumn() > 0) {
                                                            $checked = "checked";
                                                            $stDate = $allCourseData['CourseDate'];
                                                            $checkEndDate = $connect->query("SELECT endDate FROM course_cal WHERE ctpId = '$ctpID' AND  courseId = '" . $allCourseData['CourseCode'] . "'AND userId = '$user_id'");
                                                            $endDate = $checkEndDate->fetchColumn();
                                                        } else {
                                                            $checked = "";
                                                        }
                                                ?>
                                                        <tr class="event-row" style="cursor:pointer;margin: 5px;">
                                                            <td class="event-date" style="box-shadow: 1px 0px 3px 0px #00000075;border-radius: 10px;">
                                                                <div>
                                                                    <a style="font-size: large; font-weight:bold;float: left;">
                                                                        <input <?php echo $checked; ?> class="addClassName form-check-input is-valid" type="checkbox" data-course="<?php echo $cName . "-" . $allCourseData['CourseCode']; ?>" data-startdate="<?php echo $allCourseData['CourseDate']; ?>" data-ctpid="<?php echo $allCourseData['CourseName']; ?>" data-coursecode="<?php echo $allCourseData['CourseCode']; ?>" id="" style="margin: 7px;border: 1px solid #bdbdbdd1;width: 20px;height: 20px;border-radius: 10px;">
                                                                        <?php
                                                                        $fetchC = $connect->query("SELECT color FROM course_color WHERE ctpId = '$ctpID' AND userId = '$user_id' AND courseCode = '" . $allCourseData['CourseCode'] . "'");
                                                                        $color = $fetchC->fetchColumn();
                                                                        ?>
                                                                        <label class="text-dark">
                                                                            <?php echo $cName . "-" . $allCourseData['CourseCode']; ?></label>
                                                                        <br>


                                                                    </a>
                                                                    <span class="d-none" style="margin-left: 25px;">
                                                                        <?php
                                                                        $hideClass = $connect->query("SELECT count(*) FROM hideclass WHERE courseCode = '" . $allCourseData['CourseCode'] . "' AND ctpId = '$ctpID' AND userId = '$user_id'");
                                                                        if ($hideClass->fetchColumn() > 0) {
                                                                            $hideClassData = "checked";
                                                                        } else {
                                                                            $hideClassData = "";
                                                                        }
                                                                        ?>
                                                                        <input class="hideClass form-check-input is-valid" <?php echo $hideClassData; ?> type="checkbox" data-ctpid="<?php echo $allCourseData['CourseName']; ?>" data-coursecode="<?php echo $allCourseData['CourseCode']; ?>" id="" style="margin: 7px;border: 1px solid #bdbdbdd1;border-radius: 10px;">
                                                                        <label for="">Show Class</label>
                                                                    </span>
                                                                    <div class="color-dropdown-c" style="float: inline-end;">
                                                                        <button style="background-color: <?php echo $color; ?>;border: 1px solid #80808070;padding: 5px;padding-top: 5px;padding-bottom: 5px;" type="button" data-coursecode="<?php echo $allCourseData['CourseCode']; ?>" data-ctpid="<?php echo $allCourseData['CourseName']; ?>" class="btn btn-sm getColorValue dropdown-toggle btnBackC<?php echo $allCourseData['CourseCode'] . $allCourseData['CourseName']; ?>" onclick="toggleColorDropdown(event)" data-couresval="<?php echo $allCourseData['CourseCode'] . $allCourseData['CourseName']; ?>" title="Add Color"><i class="bi bi-palette text-dark" style="font-size:large;"></i></button>
                                                                        <div class="color-dropdown-content-c bg-light m-1 colorDropdown<?php echo $allCourseData['CourseCode'] . $allCourseData['CourseName']; ?>" style="position: absolute;right: -5px;top: 38px;">
                                                                            <div class="container" style="margin-top:10px;">

                                                                                <div class="row justify-content-center m-1">
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffd6d6;" onclick="setColor(this, '#ffd6d6')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #d6d6ff;" onclick="setColor(this, '#d6d6ff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffffd6;" onclick="setColor(this, '#ffffd6')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #e5ffcc;" onclick="setColor(this, '#e5ffcc')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffe5cc;" onclick="setColor(this, '#ffe566')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #e5ccff;" onclick="setColor(this, '#e5ccff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffccff;" onclick="setColor(this, '#ffccff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #fff1d6;" onclick="setColor(this, '#fff1d6')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #eeeeee;" onclick="setColor(this, '#eeeeee')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffffff;;" onclick="setColor(this, '#ffffff;')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row justify-content-center m-1">
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffadad;" onclick="setColor(this, '#ffadad')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #adadff;" onclick="setColor(this, '#adadff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffffad;" onclick="setColor(this, '#ffffad')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #b2ff66;" onclick="setColor(this, '#b2ff66')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffcc99;" onclick="setColor(this, '#ffcc99')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #cc99ff;" onclick="setColor(this, '#cc99ff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ff99ff;" onclick="setColor(this, '#ff99ff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffe2ad;" onclick="setColor(this, '#ffe2ad')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #e0e0e0;" onclick="setColor(this, '#e0e0e0')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #c0c0c0;;" onclick="setColor(this, '#c0c0c0;')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row justify-content-center m-1">
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ff8585;" onclick="setColor(this, '#ff8585')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #8585ff;" onclick="setColor(this, '#8585ff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffff85;" onclick="setColor(this, '#ffff85')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #99ff33;" onclick="setColor(this, '#99ff33')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffb266;" onclick="setColor(this, '#ffb266')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #b266f5;" onclick="setColor(this, '#b266f5')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ff66ff;" onclick="setColor(this, '#ff66ff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffd485;" onclick="setColor(this, '#ffd485')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #bdbdbd;" onclick="setColor(this, '#bdbdbd')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #808080;;" onclick="setColor(this, '#808080;')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="row justify-content-center m-1">
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ff5c5c;" onclick="setColor(this, '#ff5c5c')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #5c5cff;" onclick="setColor(this, '#5c5cff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffff5c;" onclick="setColor(this, '#ffff5c')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #80ff00;" onclick="setColor(this, '#80ff00')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ff9933;" onclick="setColor(this, '#ff9933')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #9933ff;" onclick="setColor(this, '#9933ff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ff33ff;" onclick="setColor(this, '#ff33ff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffc65c;" onclick="setColor(this, '#ffc65c')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #9e9e9e;" onclick="setColor(this, '#9e9e9e')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #606060;;" onclick="setColor(this, '#606060;')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row justify-content-center m-1">
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ff3333;" onclick="setColor(this, '#ff3333')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #3333ff;" onclick="setColor(this, '#3333ff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffff33;" onclick="setColor(this, '#ffff33')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #66cc00;" onclick="setColor(this, '#66cc00')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ff8000;" onclick="setColor(this, '#ff8000')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #7f00ff;" onclick="setColor(this, '#7f00ff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ff00ff;" onclick="setColor(this, '#ff00ff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffb833;" onclick="setColor(this, '#ffb833')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #757575;" onclick="setColor(this, '#757575')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #404040;;" onclick="setColor(this, '#404040;')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row justify-content-center m-1">
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ff0000;" onclick="setColor(this, '#ff0000')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #0a0aff;" onclick="setColor(this, '#0a0aff')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffff0a;" onclick="setColor(this, '#ffff0a')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #469900;" onclick="setColor(this, '#469900')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #cc6600;" onclick="setColor(this, '#cc6600')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #6600cc;" onclick="setColor(this, '#6600cc')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #cc00cc;" onclick="setColor(this, '#cc00cc')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #ffa90a;" onclick="setColor(this, '#ffa90a')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #616161;" onclick="setColor(this, '#616161')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-1" style="justify-content: center;display: grid;">
                                                                                        <div class="color-option-c" style="background-color: #000000;;" onclick="setColor(this, '#000000;')">
                                                                                            <i class="bi bi-check2 checkmark1"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <hr style="margin:1px;">
                                                                                <div class="row justify-content-center" style="width: 100%;margin-left: 0px;margin-right: 0px;">
                                                                                    <!-- Add more color options as needed -->
                                                                                    <div class="col-12" style="display: contents;">
                                                                                        <input data-coursecode="<?php echo $allCourseData['CourseCode']; ?>" data-ctpid="<?php echo $allCourseData['CourseName']; ?>" style="margin:5px;margin-left: -30px;height: 30px;width: 30px;" value="" type="color" class="addColor getColorValue<?php echo $allCourseData['CourseCode'] . $allCourseData['CourseName']; ?>" name="calColor">
                                                                                        <label style="width: fit-content;margin-right: -40px;margin: 0px;margin-top: 10px;"><i class="bi bi-palette m-1"></i>Color Picker</label>
                                                                                        <input type="button" value="Add Color" class="addColorBtn btn btn-success" data-coursed="<?php echo $allCourseData['CourseCode'] . $allCourseData['CourseName']; ?>" />

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div><br><br>
                                                                <center>
                                                                    <small><?php
                                                                            if ($stDate > 0 && $endDate > 0) {
                                                                                $timestamp = strtotime($stDate);
                                                                                echo '<span style="font-size: small" class="card-title badge rounded-pill bg-success m-1" title="Start Date"><i class="bi bi-calendar-check m-1"></i>' . date('d-M-y', $timestamp) . '</span>';

                                                                                // echo date('d-F-y', $timestamp);
                                                                                echo "-";
                                                                                $previousDay = date("Y-m-d", strtotime($endDate . " -1 day"));
                                                                                $timestamp = strtotime($previousDay);
                                                                                echo '<span style="font-size: small" class="card-title badge rounded-pill bg-danger m-1" title="Start Date"><i class="bi bi-calendar-check m-1"></i>' . date('d-M-y', $timestamp) . '</span>';
                                                                            }
                                                                            ?></small>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Content -->

    </main>

    <div id="AddColorCource" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalCenterTitle">Add Color</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <form action="<?php echo BASE_URL; ?>includes/Pages/deconflicter/addCalDate.php" method="POST">
                            <input type="hidden" name="colorCtp" id="colorCtp" />
                            <input type="hidden" name="colorCode" id="colorCode" />

                            <!-- <input value="" type="color" class="addColor" name="calColor" /> -->
                            <input style="float:right;" type="submit" value="Submit" class="btn btn-success" name="addCalColor" />
                        </form>
                    </center>

                </div>
                <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
            </div>
        </div>
    </div>

    <div id="calendarMsgModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;background-color: #bdbdbd6e;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border: 1px solid #8080806b;">
                <div class="modal-header">
                    <h2 class="modal-title text-danger" id="exampleModalCenterTitle">Alert <i class="bi bi-exclamation-triangle text-danger blink-animation" style="font-size:xx-large;"></i></h2>
                    <button type="button" class="btn-close closeCalModal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <h4 id="calAltMsg"></h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success addVehCal" data-bs-dismiss="modal">Do It Now</button>
                    <button type="button" class="btn btn-danger closeCalModal">Do It Later</button>
                </div>
            </div>
        </div>
    </div>



    <script src='<?php echo BASE_URL; ?>Dcalendar/dist/index.global.js'></script>

    <script>
        $(".closeCalModal").on("click", function() {
            $("#calendarMsgModal").css("display", "none");
        });

        $(".addVehCal").on("click", function() {
            window.location.href = "<?php echo BASE_URL ?>includes/Pages/deconflicter/vehiclepage.php";
        });
        var events;
        var calendar;
        $(document).ready(function() {
            const ctpId = <?php echo $std_course1; ?>;
            const departmentId = <?php echo $department_Id; ?>;
            $.ajax({
                url: '<?php echo BASE_URL; ?>includes/Pages/deconflicter/fetchSumDetail.php',
                type: 'GET',
                dataType: 'json',
                data: {
                    ctpId: ctpId,
                    departmentId: departmentId,
                    type: 'yearly',
                },
                success: function(data) {
                    events = data.events;
                    if (data.msg == "Please Add Vehicle For ") {
                        if (data.msg == "Please Add Vehicle For ") {
                            // alert(data.msg + data.depName);
                            $("#calendarMsgModal").css("display", "block");
                            $("#calAltMsg").append(data.msg + data.depName);
                        }
                    }
                    var currentDate = new Date();
                    var currentYear = currentDate.getFullYear();
                    var formattedCurrentDate = currentDate.toISOString().split('T')[0];

                    var calendarEl = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridYear,dayGridMonth,timeGridWeek'
                        },
                        // initialView: 'dayGridYear',
                        initialView: 'multiMonthYear',
                        multiMonthMaxColumns: 1,
                        initialDate: formattedCurrentDate,
                        editable: true,
                        selectable: true,
                        dayMaxEvents: false, // allow "more" link when too many events
                        // businessHours: true,
                        // weekends: false,
                        events: events,
                        eventContent: function(info) {
                            // Create a new element to wrap the event content
                            var wrapper = document.createElement('div');
                            // Add your custom class to the wrapper
                            wrapper.classList.add('varun');
                            // Add the original event content to the wrapper
                            wrapper.innerHTML = info.event.title;

                            // Return the wrapper as the new event content
                            return {
                                domNodes: [wrapper]
                            };
                        },
                    });

                    calendar.render();
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    </script>

    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     var calendarEl = document.getElementById('calendar');

        //     var calendar = new FullCalendar.Calendar(calendarEl, {
        //         headerToolbar: {
        //             left: 'prev,next today',
        //             center: 'title',
        //             right: 'dayGridYear,dayGridMonth,timeGridWeek'
        //         },
        //         initialView: 'dayGridYear',
        //         initialDate: '2023-01-12',
        //         editable: true,
        //         selectable: true,
        //         dayMaxEvents: false, // allow "more" link when too many events
        //         // businessHours: true,
        //         // weekends: false,
        //         events: events,
        //     });

        //     calendar.render();
        // });
    </script>

    <script>
        $(".addClassName").on("click", function() {
            const course = $(this).data("course");
            const startDate = $(this).data("startdate");
            const ctpID = $(this).data("ctpid");
            const courseCode = $(this).data("coursecode");

            if ($(this).is(":checked")) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo BASE_URL; ?>includes/Pages/deconflicter/addCalDate.php',
                    data: {
                        course: course,
                        startDate: startDate,
                        ctpID: ctpID,
                        courseCode: courseCode
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo BASE_URL; ?>includes/Pages/deconflicter/addCalDate.php',
                    data: {
                        course1: course,
                        startDate1: startDate
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }

        });
    </script>

    <script>
        // $(".fc-multiMonthYear-button").on("click",function(){
        $(document).on('click', '.fc-dayGridMonth-button', function() {
            window.location.href = "<?php echo BASE_URL ?>includes/Pages/deconflicter/calendar.php";
        })
    </script>

    <script>
        // $(".getColorValue").on('click',function(){
        $(document).on('click', '.getColorValue', function() {
            const courseId = $(this).data("ctpid");
            const courseCode = $(this).data("coursecode");
            $("#colorCtp").val(courseId);
            $("#colorCode").val(courseCode);
        });
    </script>

    <script>
        $(document).ready(function() {
            // Select the color input and attach a change event handler
            // $('.addColor').on('input', function() {
            //     // Get the selected color value
            //     var selectedColor = $(this).val();
            //     const cName = $(this).data("course");
            //     $.ajax({
            //         type: 'POST',
            //         url: '<?php echo BASE_URL; ?>includes/Pages/deconflicter/addCalDate.php',
            //         data: {
            //             selectedColor: selectedColor,
            //             cName: cName
            //         },
            //         success: function(response) {
            //             // alert(response);
            //             window.location.reload();
            //         }
            //     });
            // });
            $(".hideClass").on("click", function() {
                const ctpID = $(this).data("ctpid");
                const courseCode = $(this).data("coursecode");
                if ($(this).is(":checked")) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo BASE_URL; ?>includes/Pages/deconflicter/hideCalClass.php',
                        data: {
                            ctpID: ctpID,
                            courseCode: courseCode
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo BASE_URL; ?>includes/Pages/deconflicter/hideCalClass.php',
                        data: {
                            ctpID: ctpID,
                            courseCode1: courseCode
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>

    <script>
        function ClassSearch() {
            // Get input value and convert to lowercase for case-insensitive search
            var input = document.getElementById("classessearch").value.toLowerCase();

            // Get the table body
            var tableBody = document.getElementById("eventTable").getElementsByTagName("tbody")[0];

            // Get all rows in the table
            var rows = tableBody.getElementsByTagName("tr");

            // Loop through all rows and hide those that don't match the search query
            for (var i = 0; i < rows.length; i++) {
                var courseName = rows[i].getElementsByClassName("addClassName")[0].getAttribute("data-course").toLowerCase();

                if (courseName.indexOf(input) > -1) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    </script>

    <script>
        var courseDel;
        function toggleColorDropdown(event) {
            event.stopPropagation(); // Stop the event from reaching the document level
            // alert("courseDel");
            courseDel = event.currentTarget.getAttribute('data-couresval');
            const dropdown = document.querySelector('.colorDropdown' + courseDel);
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        }

        function setColor(element, color) {
            const colorMenu = document.querySelector('.getColorValue' + courseDel);
            colorMenu.value = color;

            // Remove 'selected' class from all color options
            document.querySelectorAll('.color-option-c').forEach(option => option.classList.remove('selected'));

            // Add 'selected' class to the clicked color option
            const selectedOption = document.querySelector('.color-option-c[style*="background-color: ' + color + '"]');
            if (selectedOption) {
                selectedOption.classList.add('selected');
            }

            // Set the background color of the button
            const btnBack = document.querySelector('.btnBackC' + courseDel);
            btnBack.style.backgroundColor = color;
        }

        // Add an event listener to the document to close the dropdown when clicking outside of it
        document.addEventListener('click', function(event) {
            const dropdown = document.querySelector('.color-dropdown-content-c');
            if (dropdown.style.display === 'block' && !event.target.closest('.color-dropdown-c')) {
                dropdown.style.display = 'none';
            }
        });
    </script>

    

<script>
    $(".addColorBtn").on("click", function() {
        const courseData = $(this).data("coursed");
        const colorVal = $(".getColorValue" + courseData).val();
        const courseCode = $(".getColorValue" + courseData).data("coursecode");
        const courseName = $(".getColorValue" + courseData).data("ctpid");
        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/deconflicter/addCalDate.php',
            data: {
                colorVal: colorVal,
                courseCode: courseCode,
                courseName: courseName
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });
</script>


<!-- <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script> -->
<footer id="contenthome" role="footer" class="footer">
        <?php include ROOT_PATH . 'includes/footer2.php'; ?>
    </footer>
</body>
</html>