<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['phaseId'])) {
    $phaseId = $_REQUEST['phaseId'];
    $std_course1 = $_REQUEST['courseId'];
    $fetchuser_id = $_REQUEST['userId'];
    $itemCountFilter = $_REQUEST['itemCountFilter'];

    $fetchItm = $connect->query("SELECT item_id FROM item_gradesheet WHERE user_id = '$fetchuser_id' AND (grade = 'U' OR grade = 'F')");
    $countItemU1 = [];
    $itemArrU = [];
    while ($fetchItmData = $fetchItm->fetch()) {
        $itmId = $fetchItmData['item_id'];
        if ($phaseId == "all") {
            $fetchItmQ = $connect->query("SELECT item FROM item WHERE id = '$itmId' AND course_id = '$std_course1'");
        } else {
            $fetchItmQ = $connect->query("SELECT item FROM item WHERE id = '$itmId' AND course_id = '$std_course1' AND phase_id = '$phaseId'");
        }
        while ($fetchItemData = $fetchItmQ->fetch()) {
            // echo $fetchItemData['item'] . "<br>";
            $countItemU1[] = $fetchItemData['item'];
            if (!in_array($fetchItemData['item'], $itemArrU)) {
                // $varU++;
                $itemArrU[] = $fetchItemData['item'];
            }
        }
    }

    $fetchSubItm = $connect->query("SELECT subitem_id FROM subitem_gradesheet WHERE user_id = '$fetchuser_id' AND (grade = 'U' OR grade = 'F')");
    $countSubItemU1 = [];
    $SubItemArrU = [];
    while ($fetchSubItmData = $fetchSubItm->fetch()) {
        $subItmId = $fetchSubItmData['subitem_id'];
        if ($phaseId == 'all') {
            $fetchSubItmQ = $connect->query("SELECT subitem FROM subitem WHERE id = '$subItmId' AND course_id = '$std_course1'");
        } else {
            $fetchSubItmQ = $connect->query("SELECT subitem FROM subitem WHERE id = '$subItmId' AND course_id = '$std_course1' AND phase_id = '$phaseId'");
        }
        while ($fetchSubItemData = $fetchSubItmQ->fetch()) {
            // echo $fetchSubItemData['subitem'] . "<br>";
            $countSubItemU1[] = $fetchSubItemData['subitem'];
            if (!in_array($fetchSubItemData['subitem'], $SubItemArrU)) {
                // $varU++;
                $SubItemArrU[] = $fetchSubItemData['subitem'];
            }
        }
    }
?>
    <ul>
        <?php

        // $array = [1, 2, 1, 2, 1, 2, 1, 3, 2, 4, 2, 5, 2, 6, 2, 7];

        // Count the occurrences of each value in the array
        $countsU = array_count_values($countItemU1);

        // Define a custom comparison function for usort
        function customSort($a, $b, $countsU)
        {
            // First, compare based on the frequency (higher frequency comes first)
            $countComparison = $countsU[$b] - $countsU[$a];

            // If frequencies are equal, compare based on the values (smaller value comes first)
            return ($countComparison == 0) ? ($a - $b) : $countComparison;
        }

        // Use usort with the custom comparison function
        usort($countItemU1, function ($a, $b) use ($countsU) {
            return customSort($a, $b, $countsU);
        });

        // Remove duplicates from the array
        $uniqueArray = array_keys(array_flip($countItemU1));

        // Print the sorted and unique array
        // print_r($countItemU1);

        foreach ($uniqueArray as $itemNameDataU) {
            $itemNameU = $connect->query("SELECT item FROM itembank WHERE id = '$itemNameDataU'");
            $count = 0;
            foreach ($countItemU1 as $value) {
                if ($value == $itemNameDataU) {
                    $count++;
                }
            }
            if ($count == 0) {
                $count = "";
            }
            if ($itemCountFilter == "all") {
                echo '<span class="d-flex"><span style="font-size:large;" class="text-danger"><li>' . $itemNameU->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span></span>';
            }
            if ($count >= $itemCountFilter && $itemCountFilter != "all") {
                echo '<span class="d-flex"><span style="font-size:large;" class="text-danger"><li>' . $itemNameU->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span></span>';
            }
        }
        ?>
    </ul>
    <ul>
        <?php

        $countsU = array_count_values($countSubItemU1);

        // Define a custom comparison function for usort
        function customSort1($a, $b, $countsU)
        {
            // First, compare based on the frequency (higher frequency comes first)
            $countComparison = $countsU[$b] - $countsU[$a];

            // If frequencies are equal, compare based on the values (smaller value comes first)
            return ($countComparison == 0) ? ($a - $b) : $countComparison;
        }

        // Use usort with the custom comparison function
        usort($countSubItemU1, function ($a, $b) use ($countsU) {
            return customSort1($a, $b, $countsU);
        });

        // Remove duplicates from the array
        $uniqueArray = array_keys(array_flip($countSubItemU1));

        foreach ($uniqueArray as $subItemNameDataU) {
            $subItemNameU = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subItemNameDataU'");
            $count = 0;
            foreach ($countSubItemU1 as $value) {
                if ($value == $subItemNameDataU) {
                    $count++;
                }
            }
            if ($count == 0) {
                $count = "";
            }
            if ($itemCountFilter == "all") {
                echo '<span class="d-flex"><span style="font-size:large;" class="text-warning"><li>' . $subItemNameU->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span></span>';
            }
            if ($count >= $itemCountFilter && $itemCountFilter != "all") {
                echo '<span class="d-flex"><span style="font-size:large;" class="text-warning"><li>' . $subItemNameU->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span></span>';
            }
        }
        ?>
    </ul>
<?php

}

if (isset($_REQUEST['phaseId1'])) {
    $phaseId = $_REQUEST['phaseId1'];
    $std_course1 = $_REQUEST['courseId1'];
    // $fetchuser_id = $_REQUEST['userId'];
    $course = $_REQUEST['course'];
    $itemCountFilter = $_REQUEST['itemCountFilter'];
    $countSubItemU1 = [];
    $SubItemArrU = [];
    $countItemU1 = [];
    $itemArrU = [];
    $getCourse = $connect->query("SELECT * FROM newcourse WHERE Courseid = '$course'");
    while ($getCourseData = $getCourse->fetch()) {
        $course_Code = $getCourseData['CourseCode'];
        $course_Name = $getCourseData['CourseName'];
        $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$course_Code' AND CourseName = '$course_Name'");
        while ($selecAllUserData = $selecAllUser->fetch()) {
            $uID = $selecAllUserData['StudentNames'];
            $fetchItm = $connect->query("SELECT item_id FROM item_gradesheet WHERE (grade = 'U' OR grade = 'F') AND user_id = '$uID'");

            while ($fetchItmData = $fetchItm->fetch()) {
                $itmId = $fetchItmData['item_id'];
                if ($phaseId == "all") {
                    $fetchItmQ = $connect->query("SELECT item FROM item WHERE id = '$itmId' AND course_id = '$std_course1'");
                } else {
                    $fetchItmQ = $connect->query("SELECT item FROM item WHERE id = '$itmId' AND course_id = '$std_course1' AND phase_id = '$phaseId'");
                }
                while ($fetchItemData = $fetchItmQ->fetch()) {
                    // echo $fetchItemData['item'] . "<br>";
                    $countItemU1[] = $fetchItemData['item'];
                    if (!in_array($fetchItemData['item'], $itemArrU)) {
                        // $varU++;
                        $itemArrU[] = $fetchItemData['item'];
                    }
                }
            }

            $fetchSubItm = $connect->query("SELECT subitem_id FROM subitem_gradesheet WHERE (grade = 'U' OR grade = 'F') AND user_id = '$uID'");

            while ($fetchSubItmData = $fetchSubItm->fetch()) {
                $subItmId = $fetchSubItmData['subitem_id'];
                if ($phaseId == 'all') {
                    $fetchSubItmQ = $connect->query("SELECT subitem FROM subitem WHERE id = '$subItmId' AND course_id = '$std_course1'");
                } else {
                    $fetchSubItmQ = $connect->query("SELECT subitem FROM subitem WHERE id = '$subItmId' AND course_id = '$std_course1' AND phase_id = '$phaseId'");
                }
                while ($fetchSubItemData = $fetchSubItmQ->fetch()) {
                    // echo $fetchSubItemData['subitem'] . "<br>";
                    $countSubItemU1[] = $fetchSubItemData['subitem'];
                    if (!in_array($fetchSubItemData['subitem'], $SubItemArrU)) {
                        // $varU++;
                        $SubItemArrU[] = $fetchSubItemData['subitem'];
                    }
                }
            }
        }
    }
?>
    <ul>
        <?php

        $countsU = array_count_values($itemArrU);

        // Define a custom comparison function for usort
        function customSort($a, $b, $countsU)
        {
            // First, compare based on the frequency (higher frequency comes first)
            $countComparison = $countsU[$b] - $countsU[$a];

            // If frequencies are equal, compare based on the values (smaller value comes first)
            return ($countComparison == 0) ? ($a - $b) : $countComparison;
        }

        // Use usort with the custom comparison function
        usort($itemArrU, function ($a, $b) use ($countsU) {
            return customSort($a, $b, $countsU);
        });

        // Remove duplicates from the array
        $uniqueArray = array_keys(array_flip($itemArrU));

        foreach ($uniqueArray as $itemNameDataU) {
            $itemNameU = $connect->query("SELECT item FROM itembank WHERE id = '$itemNameDataU'");
            $count = 0;
            foreach ($countItemU1 as $value) {
                if ($value == $itemNameDataU) {
                    $count++;
                }
            }
            if ($count == 0) {
                $count = "";
            }
            if ($itemCountFilter == "all") {
                echo '<span class="d-flex"><span style="font-size:large;" class="text-danger"><li>' . $itemNameU->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span></span>';
            }
            if ($count >= $itemCountFilter && $itemCountFilter != "all") {
                echo '<span class="d-flex"><span style="font-size:large;" class="text-danger"><li>' . $itemNameU->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span></span>';
            }
        }
        ?>
    </ul>
    <ul>
        <?php

        $countsU = array_count_values($SubItemArrU);

        // Define a custom comparison function for usort
        function customSort1($a, $b, $countsU)
        {
            // First, compare based on the frequency (higher frequency comes first)
            $countComparison = $countsU[$b] - $countsU[$a];

            // If frequencies are equal, compare based on the values (smaller value comes first)
            return ($countComparison == 0) ? ($a - $b) : $countComparison;
        }

        // Use usort with the custom comparison function
        usort($SubItemArrU, function ($a, $b) use ($countsU) {
            return customSort1($a, $b, $countsU);
        });

        // Remove duplicates from the array
        $uniqueArray = array_keys(array_flip($SubItemArrU));

        foreach ($uniqueArray as $subItemNameDataU) {
            $subItemNameU = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subItemNameDataU'");
            $count = 0;
            foreach ($countSubItemU1 as $value) {
                if ($value == $subItemNameDataU) {
                    $count++;
                }
            }
            if ($count == 0) {
                $count = "";
            }
            if ($itemCountFilter == "all") {
                echo '<span class="d-flex"><span style="font-size:large;" class="text-warning"><li>' . $subItemNameU->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span></span>';
            }
            if ($count >= $itemCountFilter && $itemCountFilter != "all") {
                echo '<span class="d-flex"><span style="font-size:large;" class="text-warning"><li>' . $subItemNameU->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span></span>';
            }
        }
        ?>
    </ul>
<?php

}

if (isset($_REQUEST['actualPhaseId'])) {
    $actualPhaseId = $_REQUEST['actualPhaseId'];
    $actualCourseId = $_REQUEST['actualCourseId'];
    $actualUserId = $_REQUEST['actualUserId'];
    $totalHours = 0;
    $totalMinutes = 0;
    if ($actualPhaseId == "all") {
        $fetchDuration = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$actualUserId' AND course_id = '$actualCourseId' AND class = 'actual'");
    } else {
        $fetchDuration = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$actualUserId' AND course_id = '$actualCourseId' AND phase_id = '$actualPhaseId' AND class = 'actual'");
    }
    $hour = 0;
    $min = 0;
    while ($durationData = $fetchDuration->fetch()) {
        $hour = $hour + $durationData['duration_hours'];
        $min = $min + $durationData['duration_min'];
    }

    $extraHours = floor($min / 60);
    $remainingMinutes = $min % 60;

    $totalHours = $hour + $extraHours;

    $totalMinutes = $remainingMinutes;
?>
    <h1 class="card-subtitle text-success" style="text-align: center;"><a class="text-danger"><span style="font-size:40px"><?php echo $totalHours . ":" . $totalMinutes; ?></span></a></h1>
<?php
}

if (isset($_REQUEST['simPhaseId'])) {
    $actualPhaseId = $_REQUEST['simPhaseId'];
    $actualCourseId = $_REQUEST['simCourseId'];
    $actualUserId = $_REQUEST['simUserId'];
    $totalHours = 0;
    $totalMinutes = 0;
    if ($actualPhaseId == "all") {
        $fetchDuration = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$actualUserId' AND course_id = '$actualCourseId' AND class = 'sim'");
    } else {
        $fetchDuration = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$actualUserId' AND course_id = '$actualCourseId' AND phase_id = '$actualPhaseId' AND class = 'sim'");
    }
    $hour = 0;
    $min = 0;
    while ($durationData = $fetchDuration->fetch()) {
        $hour = $hour + $durationData['duration_hours'];
        $min = $min + $durationData['duration_min'];
    }

    $extraHours = floor($min / 60);
    $remainingMinutes = $min % 60;

    $totalHours = $hour + $extraHours;

    $totalMinutes = $remainingMinutes;
?>
    <h1 class="card-subtitle text-success" style="text-align: center;"><a class="text-danger"><span style="font-size:40px"><?php echo $totalHours . ":" . $totalMinutes; ?></span></a></h1>
<?php
}

if (isset($_REQUEST['allActualPhaseId'])) {
    $actualPhaseId = $_REQUEST['allActualPhaseId'];
    $actualCourseId = $_REQUEST['allActualCourseId'];
    $allCourse = $_REQUEST['allCourse'];
    $totalHours = 0;
    $totalMinutes = 0;
    $hour = 0;
    $min = 0;
    $getCourse = $connect->query("SELECT * FROM newcourse WHERE Courseid = '$allCourse'");
    while ($getCourseData = $getCourse->fetch()) {
        $course_Code = $getCourseData['CourseCode'];
        $course_Name = $getCourseData['CourseName'];
        $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$course_Code' AND CourseName = '$course_Name'");
        while ($selecAllUserData = $selecAllUser->fetch()) {
            $uID = $selecAllUserData['StudentNames'];
            if ($actualPhaseId == "all") {
                $fetchDuration = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$uID' AND course_id = '$actualCourseId' AND class = 'actual'");
            } else {
                $fetchDuration = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$uID' AND course_id = '$actualCourseId' AND phase_id = '$actualPhaseId' AND class = 'actual'");
            }

            while ($durationData = $fetchDuration->fetch()) {
                $hour = $hour + $durationData['duration_hours'];
                $min = $min + $durationData['duration_min'];
            }

            // $extraHours = floor($min / 60);
            // $remainingMinutes = $min % 60;

            // $totalHours = $hour + $extraHours;

            // $totalMinutes = $remainingMinutes;
            // while ($durationData = $fetchDuration->fetch()) {
            //     if ($durationData['time'] != "" && $durationData['time'] > 0) {
            //         list($hours, $minutes) = explode(":", $durationData['time']);
            //         $totalHours += $hours;
            //         $totalMinutes += $minutes;
            //     }
            // }
        }
    }
    // if ($min > 0) {
    $extraHours = floor($min / 60);
    $remainingMinutes = $min % 60;
    // } else {
    //     $remainingMinutes = $min;
    // }

    $totalHours = $hour + $extraHours;
    $totalMinutes = $remainingMinutes;
?>
    <h1 class="card-subtitle text-success" style="text-align: center;"> <a class="text-danger"><span style="font-size:40px"><?php echo $totalHours . ":" . $totalMinutes; ?></span></a></h1>
<?php
}

if (isset($_REQUEST['allSimPhaseId'])) {
    $actualPhaseId = $_REQUEST['allSimPhaseId'];
    $actualCourseId = $_REQUEST['allSimCourseId'];
    $allCourse = $_REQUEST['allCourse'];
    $totalHours = 0;
    $totalMinutes = 0;
    $hour = 0;
    $min = 0;
    $getCourse = $connect->query("SELECT * FROM newcourse WHERE Courseid = '$allCourse'");
    while ($getCourseData = $getCourse->fetch()) {
        $course_Code = $getCourseData['CourseCode'];
        $course_Name = $getCourseData['CourseName'];
        $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$course_Code' AND CourseName = '$course_Name'");
        while ($selecAllUserData = $selecAllUser->fetch()) {
            $uID = $selecAllUserData['StudentNames'];
            if ($actualPhaseId == "all") {
                $fetchDuration = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$uID' AND course_id = '$actualCourseId' AND class = 'sim'");
            } else {
                $fetchDuration = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$uID' AND course_id = '$actualCourseId' AND phase_id = '$actualPhaseId' AND class = 'sim'");
            }
            while ($durationData = $fetchDuration->fetch()) {
                $hour = $hour + $durationData['duration_hours'];
                $min = $min + $durationData['duration_min'];
            }

            // $extraHours = floor($min / 60);
            // $remainingMinutes = $min % 60;

            // $totalHours = $hour + $extraHours;
        }
    }
    $extraHours = floor($min / 60);
    $remainingMinutes = $min % 60;

    $totalHours = $hour + $extraHours;
    $totalMinutes = $remainingMinutes;
?>
    <h1 class="card-subtitle text-success" style="text-align:center;"><a class="text-danger"><span style="font-size:40px"><?php echo $totalHours . ":" . $totalMinutes; ?></span></a></h1>
<?php
}

?>