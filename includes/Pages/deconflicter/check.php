<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$startDate = new DateTime('2023-07-18');
$endDate = new DateTime('2023-09-30');
$departmentId = 1;
$checkWeekend = "exclude";
$interval = new DateInterval('P1D');
$datePeriod = new DatePeriod($startDate, $interval, $endDate->modify('+1 day'));
$leaveCount = 0;
foreach ($datePeriod as $date) {
    $normalDate = $date->format('Y-m-d');
    $weekend = $date->format('N');
    if (($weekend != 6 && $weekend != 7) || ($checkWeekend == "include")) {
        $planLeave = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$departmentId' AND (type = 'unPlanned' OR type = 'planedLeave')");
        $days2 = 0;

        while ($planLeaveData = $planLeave->fetch()) {
            $leaveId = $planLeaveData['mainId'];

            $countPlanLeave = $connect->query("SELECT * FROM holydays WHERE id = '$leaveId'");
            while ($countPlanLeaveData = $countPlanLeave->fetch()) {
                $leaveStartDate = new DateTime($countPlanLeaveData['startDate']);
                $leaveEndDate = new DateTime($countPlanLeaveData['endDate']);
                $classDate = new DateTime($normalDate);
                if ($classDate >= $leaveStartDate && $classDate <= $leaveEndDate) {
                    $leaveCount++;
                }
            }
        }
    }
    if ($checkWeekend == "exclude") {

        if ($weekend == 6 || $weekend == 7) {
            $leaveCount++;
        }
    }
}

echo $leaveCount . "Leave";
