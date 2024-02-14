<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['addLinesPerDay'])) {
    $startDate = $_REQUEST['startDate'];
    $endDate = $_REQUEST['endDate'];
    // $departMentId = $_REQUEST['departMentId'];
    $linePerDay = $_REQUEST['linePerDay'];

    $checkDate = $connect->query("SELECT count(*) FROM deconflicterdata WHERE startDate = '$startDate' AND endDate = '$endDate'");
    if ($checkDate->fetchColumn() <= 0) {

        $query = "INSERT INTO deconflicterdata (startDate,endDate,linePerDay) VALUES ('$startDate','$endDate','$linePerDay')";
        $stmt = $connect->prepare($query);
        $stmt->execute();

        $_SESSION['success'] = "Data Inserted Successfully";
        header("Location:./deconflicter/vehiclepage.php");
    }
    $_SESSION['success'] = "Dublicate Data Not Allowed";
    header("Location:./deconflicter/vehiclepage.php");
}

if (isset($_REQUEST['addYearlyDate'])) {
    $yearlyDate = $_REQUEST['yearlyDate'];
    $linePerDay = $_REQUEST['linePerDay'];

    // $checkDate = $connect->query("SELECT count(*) FROM deconflicterdata WHERE yearly = '$yearlyDate'");
    // if ($checkDate->fetchColumn() <= 0) {

        $query = "INSERT INTO deconflicterdata (linePerDay,yearly) VALUES ('$linePerDay','$yearlyDate')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "Data Inserted Successfully";
        header("Location:./deconflicter/vehiclepage.php");
    // }
    $_SESSION['success'] = "Dublicate Data Not Allowed";
    header("Location:./deconflicter/vehiclepage.php");
}

if (isset($_REQUEST['addPlanLeave'])) {
    $startDate = $_REQUEST['startDate'];
    $endDate = $_REQUEST['endDate'];
    // $departMentId = $_REQUEST['departMentId'];
    $leaveType = $_REQUEST['leaveType'];
    $holiday = $_REQUEST['holiday'];
    $name = 0;

    while ($name < count($startDate)) {
        $startDate1 = $startDate[$name];
        $endDate1 = $endDate[$name];
        $holiday1 = $holiday[$name];

        $query = "INSERT INTO holydays (startDate,endDate,holyDayName,leaveType) VALUES ('$startDate1','$endDate1','$holiday1','$leaveType')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $name++;
    }
    $_SESSION['success'] = "Data Inserted Successfully";
    header("Location:./deconflicter/plannedpage.php");
}

if (isset($_REQUEST['addUnplane'])) {
    $startDate = $_REQUEST['startDate'];
    $endDate = $_REQUEST['endDate'];
    // $departMentId = $_REQUEST['departMentId'];
    $leaveType = $_REQUEST['leaveType'];
    $holiday = $_REQUEST['holiday'];
    $name = 0;

    while ($name < count($startDate)) {
        $startDate1 = $startDate[$name];
        $endDate1 = $endDate[$name];
        $holiday1 = $holiday[$name];

        $query = "INSERT INTO holydays (startDate,endDate,holyDayName,leaveType) VALUES ('$startDate1','$endDate1','$holiday1','$leaveType')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $name++;
    }
    $_SESSION['success'] = "Data Inserted Successfully";
    header("Location:./deconflicter/unplannedpage.php");
}

if (isset($_REQUEST['addSpecificDay'])) {
    $mId = $_REQUEST['mId'];
    $dayName = $_REQUEST['dayName'];
    $dayLine = $_REQUEST['dayLine'];

    $query_ad = "UPDATE deconflicterdata SET day = '$dayName',lineDayPer = '$dayLine' WHERE id = '$mId'";
    $statement_ad = $connect->prepare($query_ad);
    $statement_ad->execute();
    $_SESSION['success'] = "Day Added Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if(isset($_REQUEST['selectedValue'])){
    $selectedValue = $_REQUEST['selectedValue'];
    $selectedDataId = $_REQUEST['selectedDataId'];

    $query_ad = "UPDATE deconflicterdata SET weekend = '$selectedValue' WHERE id = '$selectedDataId'";
    $statement_ad = $connect->prepare($query_ad);
    $statement_ad->execute();

}
