<?php
$linesReq = 0;
$studentPerClass = 0;
$attrDate = 1;
$weekend = "exclude";
$extraDays = 0;


$counStuQ = $connect->query("SELECT count(*) FROM newcourse WHERE CourseName='$std_course1' AND CourseCode='$CourseCode11'");
$counStuQData = $counStuQ->fetchColumn();
$dconQData = 1;

$weekend = "exclude";

$linePerQ = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$department_Id' AND type = 'linePerDay'");
while ($linePerData = $linePerQ->fetch()) {

    $mainId = $linePerData['mainId'];
    $dconQ = $connect->query("SELECT * FROM deconflicterdata WHERE id = '$mainId'");
    while ($dConData = $dconQ->fetch()) {
        if ($dConData['yearly'] != "") {
            $weekend = $dConData['weekend'];
        }
    }
}

$dconQData = 0;
$linePerQ = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$department_Id' AND type = 'linePerDay'");
while ($linePerData = $linePerQ->fetch()) {
    $mainId = $linePerData['mainId'];
    $dconQ = $connect->query("SELECT * FROM deconflicterdata WHERE id = '$mainId'");
    while ($dConData = $dconQ->fetch()) {
        $startTimestamp = strtotime($dConData['startDate']);
        $endTimestamp = strtotime($dConData['endDate']);

        $currentTimestamp = time();
        if (date('Y') == $dConData['yearly']) {
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

if ($dconQData != 0) {

    $sDate = $dateString;

    $fet = "SELECT id,symbol,days,'actual' AS table_name FROM actual where ctp='$std_course1' AND days IS NOT NULL UNION ALL SELECT id,shortsim,days,'sim' AS table_name FROM sim where ctp='$std_course1' AND days IS NOT NULL UNION ALL SELECT id,shortacademic,days,'academic' AS table_name FROM academic where ctp='$std_course1' AND days IS NOT NULL UNION ALL SELECT id,shorttest,days,'test' AS table_name FROM  test where ctp='$std_course1' AND days IS NOT NULL ORDER BY days";
    $st = $connect->prepare($fet);
    $st->execute();

    while (true) {
        $planLeave = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$department_Id' AND (type = 'unPlanned' OR type = 'planedLeave')");
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


            if ($dates != "") {
                $daysSta = $dates - $remD;
                $remD = $dates;
                // $perClassStartDate = $classStartDate;
                if ($daysSta <= 0) {
                    $perClassStartDate = $perClassStartDate;
                } else {
                    $perClassStartDate = $firstStDate;
                }

                while ($daysSta >= 1) {
                    $addD = 1;
                    $classStartDate = date('Y-m-d', strtotime($firstStDate . ' + ' . $addD . ' days'));
                    $perClassStartDate = $classStartDate;
                    while (true) {
                        $planLeave = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$department_Id' AND (type = 'unPlanned' OR type = 'planedLeave')");
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
                // echo $classStartDate . $row["symbol"] . "-start<br>";
                while ($classEndDays >= 1) {
                    if ($table_name == "actual" || $table_name == "sim") {
                        $addDay = 1;
                        $classStartDate = date('Y-m-d', strtotime($classStartDate . ' + ' . $addDay . ' days'));
                    }
                    while (true) {
                        $planLeave = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$department_Id' AND (type = 'unPlanned' OR type = 'planedLeave')");
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
            $firstStDate = $classStartDate;
            // echo $classStartDate . $row["symbol"] . "-end<br>";

            $classEnd12 = 1;
            $classStartDate = date('Y-m-d', strtotime($classStartDate . ' + ' . $classEnd12 . ' days'));
        }
    }
    if (isset($classStartDate)) {

        // $previousDay = date("Y-m-d", strtotime($classStartDate . " -1 day"));

        $timestamp = strtotime($classStartDate);
        echo date('d-F-y', $timestamp);
    } else {
        echo "TBD";
    }
}else{
    echo "TBD";
}



//old end Date
