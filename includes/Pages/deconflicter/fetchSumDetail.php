<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$extraDays = 0;
$userId = $_SESSION['login_id'];
$fetchRole = $connect->query("SELECT role FROM users WHERE id = '$userId'");
$role = $fetchRole->fetchColumn();
// $get_ctp = $_REQUEST['ctpId'];
$departmentId = $_REQUEST['departmentId'];
// $get_ctp = 1;
// $departmentId = 1;

$weekend = "exclude";



$countValue = 0;
$myDate = '1994-07-15';
$msg = "";
$depName = "";
$fetchCourse = $connect->query("SELECT * FROM course_cal GROUP BY ctpId,courseId");
while ($courseData = $fetchCourse->fetch()) {
    $sn1 = 1;
    $courseLastDate = '1994-07-15';
    // $sDate = $courseData['startDate'];
    $cName = $courseData['courseName'];
    $ctpId = $courseData['ctpId'];
    $courseId = $courseData['courseId'];

    $fetchCourseStDate = $connect->query("SELECT CourseDate FROM newcourse WHERE CourseName = '$ctpId' AND CourseCode = '$courseId' GROUP BY CourseName,CourseCode");
    $sDate = $fetchCourseStDate->fetchColumn();

    $query = "UPDATE course_cal SET startDate = '$sDate' WHERE ctpId = '$ctpId' AND courseId = '$courseId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $year = date('Y', strtotime($sDate));

    $linePerQ = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$departmentId' AND type = 'linePerDay'");
    while ($linePerData = $linePerQ->fetch()) {

        $mainId = $linePerData['mainId'];
        $dconQ = $connect->query("SELECT * FROM deconflicterdata WHERE id = '$mainId'");
        while ($dConData = $dconQ->fetch()) {
            if ($dConData['yearly'] != "" && $dConData['yearly'] == $year) {
                $weekend = $dConData['weekend'];
            }
        }
    }

    $dconQData = 0;
    $linePerQ = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$departmentId' AND type = 'linePerDay'");
    while ($linePerData = $linePerQ->fetch()) {
        $mainId = $linePerData['mainId'];
        $dconQ = $connect->query("SELECT * FROM deconflicterdata WHERE id = '$mainId'");
        while ($dConData = $dconQ->fetch()) {
            $startTimestamp = strtotime($dConData['startDate']);
            $endTimestamp = strtotime($dConData['endDate']);

            $currentTimestamp = time();
            if ($year == $dConData['yearly']) {
                if ($dConData['yearly'] != "") {
                    $weekend = $dConData['weekend'];
                }
                $dconQData = $dConData['linePerDay'];
            }
            if ($currentTimestamp >= $startTimestamp && $currentTimestamp <= $endTimestamp) {
                $dconQData =  $dConData['linePerDay'];
            }
        }
    }

    if ($dconQData == 0) {
        $fetchDepName = $connect->query("SELECT department_name FROM homepage WHERE id = '$departmentId'");
        // echo "<p>";
        $msg = "Please Add Vehicle For ";
        $depName = "<span class='badge bg-success'>" . $fetchDepName->fetchColumn() . "</span> And <span class='badge bg-success'>" . $cName . "</span> Course In <span class='badge bg-success'>" . $year . "</span>";
        continue;
        // echo "</p>";
    }





    $hideClass = $connect->query("SELECT count(*) FROM hideclass WHERE courseCode = '$courseId' AND ctpId = '$ctpId'");
    $hideClassData = $hideClass->fetchColumn();

    $counStuQ = $connect->query("SELECT count(*) FROM newcourse WHERE CourseName='$ctpId' AND CourseCode='$courseId'");
    $counStuQData = $counStuQ->fetchColumn();


    $fetchCourse1 = $connect->query("SELECT color FROM course_color WHERE courseCode = '$courseId' AND ctpId = '$ctpId' AND userId = '$userId' GROUP BY courseCode,ctpId");
    $courseColor = $fetchCourse1->fetchColumn();
    if ($courseColor == "") {
        $courseColor = "#bdbdbd";
    }
    $prevDate = "1994-07-18";
    $nexDayClass = 0;


    $timestamp = strtotime($courseData['startDate']);
    $oneDayInSeconds = 24 * 60 * 60;
    $previousDateTimestamp = $timestamp - $oneDayInSeconds;
    $startDate = date('Y-m-d', $previousDateTimestamp);
    // echo $startDate;
    // $startDate = '2023-07-17';
    $extraDays = 0;
    $fet = "SELECT id,symbol,days,'actual' AS table_name FROM actual where ctp='$ctpId' AND days IS NOT NULL UNION ALL SELECT id,shortsim,days,'sim' AS table_name FROM sim where ctp='$ctpId' AND days IS NOT NULL UNION ALL SELECT id,shortacademic,days,'academic' AS table_name FROM academic where ctp='$ctpId' AND days IS NOT NULL UNION ALL SELECT id,shorttest,days,'test' AS table_name FROM  test where ctp='$ctpId' AND days IS NOT NULL ORDER BY days";
    $st = $connect->prepare($fet);
    $st->execute();

    while (true) {
        $planLeave = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$departmentId' AND (type = 'unPlanned' OR type = 'planedLeave')");
        $days2 = 0;
        while ($planLeaveData = $planLeave->fetch()) {
            $leaveId = $planLeaveData['mainId'];

            $countPlanLeave = $connect->query("SELECT * FROM holydays WHERE id = '$leaveId'");
            while ($countPlanLeaveData = $countPlanLeave->fetch()) {
                $leaveStartDate = new DateTime($countPlanLeaveData['startDate']);
                $leaveEndDate = new DateTime($countPlanLeaveData['endDate']);
                $classDate = new DateTime($sDate);
                if ($classDate >= $leaveStartDate && $classDate <= $leaveEndDate) {
                    $interval = $leaveStartDate->diff($leaveEndDate);
                    $days2 = $days2 + $interval->days + 1;
                    $extraDays = $extraDays + $days2;
                }
            }
        }
        $sDate = date('Y-m-d', strtotime($sDate . ' + ' . $days2 . ' days'));
        $classWeek = $sDate;

        $dayOfWeek = date('w', strtotime($classWeek));
        $sn1 = 0;
        if ($weekend == "exclude") {
            if ($dayOfWeek == 6 || $dayOfWeek == 0) {
                $sn1 = 1;
                $extraDays = $extraDays + $sn1;
                $sDate = date('Y-m-d', strtotime($sDate . ' + ' . $sn1 . ' days'));
            }
        }
        if ($days2 == 0 && $sn1 == 0) {
            break;
        }
    }

    if ($st->rowCount() > 0) {
        $re = $st->fetchAll();
        $futureDate = 0;
        $myDate = 0;
        $incDays = 0;
        $classStartDate = $sDate;
        $extraDays = 0;
        $myC = 0;
        $firstStDate = $sDate;
        $perClassStartDate = $firstStDate;
        $daysSta = 0;
        $remD = 1;
        foreach ($re as $row) {
            // $myC = 0;
            $startDate = date('Y-m-d', $previousDateTimestamp);
            $symbol_id = $row["id"];
            $table_name = $row["table_name"];

            if ($table_name == "actual" || $table_name == "sim") {
                $fetchLinesReq = $connect->query("SELECT * FROM $table_name WHERE id = '$symbol_id'");
                // $fetchLinesReqData = $fetchLinesReq->fetch();
                while ($fetchLinesReqData = $fetchLinesReq->fetch()) {
                    $linesRequired1 = $fetchLinesReqData['linesRequired'];
                    $studentPerClass1 = $fetchLinesReqData['studentPerClass'];
                    if ($fetchLinesReqData['linesRequired'] == "" || $fetchLinesReqData['linesRequired'] == 0) {
                        $linesRequired1 = 1;
                    }
                    if ($fetchLinesReqData['studentPerClass'] == "" || $fetchLinesReqData['studentPerClass'] == 0) {
                        $studentPerClass1 = 1;
                    }
                    $classEndDays = ($counStuQData * $linesRequired1 / $studentPerClass1) / $dconQData;
                    $classEndDays = ceil($classEndDays);
                }
            } else {
                $classEndDays = 1;
            }
            $select_date = $connect->prepare("SELECT `days` FROM $table_name WHERE id=?");
            $select_date->execute([$symbol_id]);
            $dates = $select_date->fetchColumn();

            if ($classEndDays == 1) {
                $classClass = "oneDayClass";
            } else {
                $classClass = "longDayClass";
            }


            if ($dates != "") {
                $daysSta = $dates - $remD;
                $remD = $dates;

                if ($daysSta <= 0) {
                    $perClassStartDate = $perClassStartDate;
                } else {
                    $perClassStartDate = $firstStDate;
                }
                // echo $firstStDate . $row["symbol"] . "-start<br>";
                while ($daysSta >= 1) {
                    $addD = 1;
                    $classStartDate = date('Y-m-d', strtotime($firstStDate . ' + ' . $addD . ' days'));
                    $perClassStartDate = $classStartDate;
                    while (true) {
                        $planLeave = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$departmentId' AND (type = 'unPlanned' OR type = 'planedLeave')");
                        $days2 = 0;
                        while ($planLeaveData = $planLeave->fetch()) {
                            $leaveId = $planLeaveData['mainId'];

                            $countPlanLeave = $connect->query("SELECT * FROM holydays WHERE id = '$leaveId'");
                            while ($countPlanLeaveData = $countPlanLeave->fetch()) {
                                $leaveStartDate = new DateTime($countPlanLeaveData['startDate']);
                                $leaveEndDate = new DateTime($countPlanLeaveData['endDate']);
                                $classDate = new DateTime($perClassStartDate);
                                if ($classDate >= $leaveStartDate && $classDate <= $leaveEndDate) {
                                    $interval = $leaveStartDate->diff($leaveEndDate);
                                    $days2 = $days2 + $interval->days + 1;
                                    $extraDays = $extraDays + $days2;
                                }
                            }
                        }
                        $perClassStartDate = date('Y-m-d', strtotime($perClassStartDate . ' + ' . $days2 . ' days'));

                        $classWeek = $perClassStartDate;
                        $dayOfWeek = date('w', strtotime($classWeek));
                        $sn1 = 0;
                        if ($weekend == "exclude") {
                            if ($dayOfWeek == 6 || $dayOfWeek == 0) {
                                $sn1 = 1;
                                $extraDays = $extraDays + $sn1;
                                $perClassStartDate = date('Y-m-d', strtotime($perClassStartDate . ' + ' . $sn1 . ' days'));
                            }
                        }
                        if ($days2 == 0 && $sn1 == 0) {
                            break;
                        }
                    }
                    $firstStDate = $perClassStartDate;
                    $daysSta--;
                    if ($daysSta == 1 || $daysSta == 0) {
                        break;
                    }
                }
                $classStartDate = $perClassStartDate;
                // echo $perClassStartDate . $row["symbol"] . "-start<br>";
                while ($classEndDays > 1) {
                    if ($table_name == "actual" || $table_name == "sim") {
                        $addDay = 1;
                        $classStartDate = date('Y-m-d', strtotime($classStartDate . ' + ' . $addDay . ' days'));
                    }
                    while (true) {
                        $planLeave = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$departmentId' AND (type = 'unPlanned' OR type = 'planedLeave')");
                        $days2 = 0;
                        while ($planLeaveData = $planLeave->fetch()) {
                            $leaveId = $planLeaveData['mainId'];

                            $countPlanLeave = $connect->query("SELECT * FROM holydays WHERE id = '$leaveId'");
                            while ($countPlanLeaveData = $countPlanLeave->fetch()) {
                                $leaveStartDate = new DateTime($countPlanLeaveData['startDate']);
                                $leaveEndDate = new DateTime($countPlanLeaveData['endDate']);
                                $classDate = new DateTime($classStartDate);
                                if ($classDate >= $leaveStartDate && $classDate <= $leaveEndDate) {
                                    $interval = $leaveStartDate->diff($leaveEndDate);
                                    $days2 = $days2 + $interval->days + 1;
                                    $extraDays = $extraDays + $days2;
                                }
                            }
                        }
                        $classStartDate = date('Y-m-d', strtotime($classStartDate . ' + ' . $days2 . ' days'));

                        $classWeek = $classStartDate;
                        $dayOfWeek = date('w', strtotime($classWeek));
                        $sn1 = 0;
                        if ($weekend == "exclude") {
                            if ($dayOfWeek == 6 || $dayOfWeek == 0) {
                                $sn1 = 1;
                                $extraDays = $extraDays + $sn1;
                                $classStartDate = date('Y-m-d', strtotime($classStartDate . ' + ' . $sn1 . ' days'));
                            }
                        }
                        if ($days2 == 0 && $sn1 == 0) {
                            break;
                        }
                    }

                    $classEndDays--;
                    if ($classEndDays == 1 || $classEndDays == 0) {
                        break;
                    }
                }
            }
            if ($classStartDate != $perClassStartDate) {
                $firstStDate = $classStartDate;
            }
            // echo $classStartDate . $row["symbol"] . "-end<br>";

            $classEnd12 = 1;
            // if ($table_name == "actual" || $table_name == "sim") {
            $classStartDate = date('Y-m-d', strtotime($classStartDate . ' + ' . $classEnd12 . ' days'));
            // }
            // echo $classStartDate . "va<br>";
            // echo $classStartDate . $row["symbol"] . "-end<br>";
            if ($hideClassData > 0 && !isset($_REQUEST['type'])) {
                $events[] = [
                    'title' => $row["symbol"],
                    'start' => $perClassStartDate,
                    'end'   => $classStartDate,
                    // 'backgroundColor' => 'aliceblue',
                    'className' => ['classes', $classClass],
                    'textColor' => $courseColor,
                    'borderColor' => $courseColor, // Add this line for the border color
                    'borderWidth' => '4', // You can adjust the border width if needed
                    'borderStyle' => 'solid',
                    'fontSize' => 'large',
                ];
            }
        }
    } else {
        $classStartDate = $sDate;
    }
    
    $events[] = [
        'title' => $courseData['courseName'],
        'start' => $sDate,
        'end'   => $classStartDate,
        'backgroundColor' => $courseColor,
        'className' => 'courses',
    ];

    $query = "UPDATE course_cal SET endDate = '$classStartDate' WHERE ctpId = '$ctpId' AND courseId = '$courseId'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
// echo "<pre>";
// print_r($events);

// die();




$addExtra = 1;
$fetchDep = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$departmentId' AND type = 'unPlanned'");
while ($depData = $fetchDep->fetch()) {
    $mainId = $depData['mainId'];
    $fetchLeave = $connect->query("SELECT * FROM holydays WHERE id = '$mainId'");
    while ($leaveData = $fetchLeave->fetch()) {
        $levD = 1;
        $leDate = date('Y-m-d', strtotime($leaveData['endDate'] . ' + ' . $addExtra . ' days'));
        $events[] = [
            'title' => $leaveData['holyDayName'] . "-" . $leaveData['leaveType'],
            'start' => $leaveData['startDate'],
            'end'   => $leDate,
            'display' => 'background',
            'color' => '#ffc4bc7a',
            'className' => 'leave',
        ];
    }
}


$fetchDep = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$departmentId' AND type = 'planedLeave'");
while ($depData = $fetchDep->fetch()) {
    $mainId = $depData['mainId'];
    $fetchLeave = $connect->query("SELECT * FROM holydays WHERE id = '$mainId'");
    while ($leaveData = $fetchLeave->fetch()) {
        $levD = 1;
        $leDate = date('Y-m-d', strtotime($leaveData['endDate'] . ' + ' . $addExtra . ' days'));
        $events[] = [
            'title' => $leaveData['holyDayName'] . "-" . $leaveData['leaveType'],
            'start' => $leaveData['startDate'],
            'end'   => $leDate,
            'display' => 'background',
            'color' => '#bbf5b559',
            'textColor' => 'red',
            'className' => 'leave',
        ];
    }
}

if ($weekend == "exclude") {
    $years = ['2022', '2023', '2024'];

    foreach ($years as $year) {
        // Create a DateTime object for the first day of the year
        $date = new DateTime($year . '-01-01');

        // Loop through each day of the year
        while ($date->format('Y') == $year) {
            // Check if the current day is a Saturday or Sunday
            if ($date->format('N') == 6 || $date->format('N') == 7) {
                $currentDate = $date->format('Y-m-d'); // Print the date and day
                $events[] = [
                    'start' => $currentDate,
                    'display' => 'background',
                    'color' => 'white',
                    'className' => 'weekend',
                    'backgroundColor' => '#f5f5f5'
                ];
            }

            // Move to the next day
            $date->modify('+1 day');
        }
    }
}



$jsonData = json_encode(['events' => $events, 'msg' => $msg, 'depName' => $depName, 'role' => $role], JSON_PRETTY_PRINT);

echo $jsonData;
