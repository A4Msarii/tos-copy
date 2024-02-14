<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['ctpId'])) {
    $ctpId = $_REQUEST['ctpId'];
    $userId = $_REQUEST['user_id'];
    $all_labels = [];
    $all_class_simbol = [];
    $all_grade_simbol = [];
    $all_grade = [];
    $allphase_id = [];
    $allinstructor = [];
    $phase_id = $_REQUEST['phase'];
    $month = $_REQUEST['month'];
    if ($_REQUEST['phase'] != "" && $_REQUEST['month'] == "") {
        $query = "SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
     FROM (
        SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, NULL as cloned_id
        FROM gradesheet WHERE course_id = '$ctpId'
                            AND user_id = '$userId'
                            AND class = 'actual'
                            AND phase_id = '$phase_id' 
                            AND over_all_grade IS NOT NULL 
                            AND over_all_grade_per != 0
        UNION
        SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
        FROM cloned_gradesheet WHERE course_id = '$ctpId'
                            AND user_id = '$userId'
                            AND class = 'actual'
                            AND user_id = '$userId'
                            AND phase_id = '$phase_id' 
                            AND over_all_grade IS NOT NULL 
                            AND over_all_grade_per != 0
        ) AS combined_data
        ORDER BY date ASC";

        $query1 = "SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
     FROM (
        SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, NULL as cloned_id
        FROM gradesheet WHERE course_id = '$ctpId'
                            AND class = 'sim'
                            AND user_id = '$userId'
                            AND phase_id = '$phase_id' 
                            AND over_all_grade IS NOT NULL 
                            AND over_all_grade_per != 0
        UNION
        SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
        FROM cloned_gradesheet WHERE course_id = '$ctpId'
                            AND user_id = '$userId'
                            AND class = 'sim'
                            AND user_id = '$userId'
                            AND phase_id = '$phase_id' 
                            AND over_all_grade IS NOT NULL 
                            AND over_all_grade_per != 0
        ) AS combined_data
        ORDER BY date ASC";
    } if ($_REQUEST['month'] != "" && $_REQUEST['phase'] == "") {
        $query = "SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
      FROM (
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, NULL as cloned_id
            FROM gradesheet WHERE course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND class = 'actual'
                                AND MONTH(date) = '$month' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
            UNION
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
            FROM cloned_gradesheet WHERE course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND class = 'actual'
                                AND MONTH(date) = '$month' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
        ) AS combined_data
          ORDER BY date ASC";
        $query1 = "SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
      FROM (
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, NULL as cloned_id
            FROM gradesheet WHERE course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND MONTH(date) = '$month' 
                                AND class = 'sim'
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
            UNION
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
            FROM cloned_gradesheet WHERE course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND user_id = '$userId'
                                AND MONTH(date) = '$month' 
                                AND class = 'sim'
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
        ) AS combined_data
          ORDER BY date ASC";
    } if ($_REQUEST['phase'] != "" && $_REQUEST['month'] != "") {
        $query = "SELECT date, over_all_grade, over_all_grade_per, class, class_id, instructor, phase_id, cloned_id
            FROM (
                SELECT date, over_all_grade, over_all_grade_per, class, class_id, instructor, phase_id, NULL as cloned_id
                FROM gradesheet WHERE course_id = '$ctpId'
                                    AND user_id = '$userId'
                                    AND phase_id = '$phase_id' 
                                    AND MONTH(date) = '$month'  -- Corrected this line
                                    AND over_all_grade IS NOT NULL 
                                    AND over_all_grade_per != 0
                UNION
                SELECT date, over_all_grade, over_all_grade_per, class, class_id, instructor, phase_id, cloned_id
                FROM cloned_gradesheet WHERE course_id = '$ctpId'
                                    AND user_id = '$userId'
                                    AND user_id = '$userId'
                                    AND phase_id = '$phase_id' 
                                    AND MONTH(date) = '$month'  -- Corrected this line
                                    AND over_all_grade IS NOT NULL 
                                    AND over_all_grade_per != 0
            ) AS combined_data
            ORDER BY date ASC";

        $query1 = "SELECT date, over_all_grade, over_all_grade_per, class, class_id, instructor, phase_id, cloned_id
            FROM (
                SELECT date, over_all_grade, over_all_grade_per, class, class_id, instructor, phase_id, NULL as cloned_id
                FROM gradesheet WHERE course_id = '$ctpId'
                                    AND user_id = '$userId'
                                    AND phase_id = '$phase_id' 
                                    AND MONTH(date) = '$month'  -- Corrected this line
                                    AND over_all_grade IS NOT NULL 
                                    AND over_all_grade_per != 0
                UNION
                SELECT date, over_all_grade, over_all_grade_per, class, class_id, instructor, phase_id, cloned_id
                FROM cloned_gradesheet WHERE course_id = '$ctpId'
                                    AND user_id = '$userId'
                                    AND user_id = '$userId'
                                    AND phase_id = '$phase_id' 
                                    AND MONTH(date) = '$month'  -- Corrected this line
                                    AND over_all_grade IS NOT NULL 
                                    AND over_all_grade_per != 0
            ) AS combined_data
            ORDER BY date ASC";
    }
    $statement = $connect->prepare($query);
    $statement->execute();

    // if ($_REQUEST['phase'] == "" || $_REQUEST['month'] == "") {
    $statement1 = $connect->prepare($query1);
    $statement1->execute();
    $data2 = $statement1->fetchAll();
    // }else{
    //     $data2 = [];
    // }
    $data1 = $statement->fetchAll();
    

    $combinedData = array_merge($data1, $data2);
    usort($combinedData, function ($a, $b) {
        return strtotime($a['date']) - strtotime($b['date']);
    });

    foreach ($combinedData as $dt) {
        if ($dt != '') {
            $all_class_id = $dt['class_id'];
            $classe_table = $dt['class'];

            if ($classe_table == 'actual') {

                $query1 = "SELECT symbol AS data FROM actual WHERE id='$all_class_id'";
                $statement = $connect->prepare($query1);
                $statement->execute();
                $all_class_simbol[] = $statement->fetch();

                // fetch instructor name from users
                $allclass_inst_id = $dt['instructor'];
                $allinstructorname = $connect->query("SELECT nickname FROM `users` WHERE id='$allclass_inst_id'");
                $allinstructor[] = $allinstructorname->fetch();

                $phase_id = $dt['phase_id'];
                $allphases = $connect->query("SELECT color,phasename FROM `phase` WHERE id='$phase_id'");
                $allphase_id[] = $allphases->fetch();
                $all_clone_id[] = $dt['cloned_id'];
                $all_grade_simbol[] = $dt['over_all_grade'];
                $all_grade[] = $dt['over_all_grade_per'];
            }
            if ($classe_table == 'sim') {
                $phase_id = $_REQUEST['phase'];
                $query1 = "SELECT shortsim AS data FROM sim where id='$all_class_id'";
                $statement = $connect->prepare($query1);
                $statement->execute();
                $all_class_simbol[] = $statement->fetch();

                // fetch instructor name from users
                $allclass_inst_id = $dt['instructor'];
                $allinstructorname = $connect->query("SELECT nickname FROM `users` WHERE id='$allclass_inst_id'");
                $allinstructor[] = $allinstructorname->fetch();

                $phase_id = $dt['phase_id'];
                $allphases = $connect->query("SELECT color,phasename FROM `phase` WHERE id='$phase_id'");
                $allphase_id[] = $allphases->fetch();
                $all_clone_id[] = $dt['cloned_id'];
                $all_grade_simbol[] = $dt['over_all_grade'];
                $all_grade[] = $dt['over_all_grade_per'];
            }
        }
    }


    $all_instructor_name = [];
    foreach ($allinstructor as $dt) {
        $all_instructor_name[] = $dt['nickname'];
    }
    $all_labels = [];
    foreach ($all_class_simbol as $key => $dt) {
        if (is_array($dt) && isset($dt['data'])) {
            if ($all_clone_id[$key] != "") {
                
                // $all_labels[] = $dt['data'] . '-' . "C" . $all_clone_id[$key];
                $all_labels[] = $dt['data'] . str_repeat("X", $all_clone_id[$key]);
            } else {
                $all_labels[] = $dt['data'];
            }
        }
    }

    $all_phase_name = [];
    $all_color = [];
    foreach ($allphase_id as $dt) {
        $all_phase_name[] = $dt['phasename'];
        $all_color[] = $dt['color'];
    }

    $response = [
        'labels' => $all_labels,
        'allGradesheetData' => $all_grade,
        'allphases' => $all_phase_name,
        'allphasescolor' => $all_color,
        'allinstructor' => $all_instructor_name,
        'allgradessimbol' => $all_grade_simbol,
    ];
    echo json_encode($response);
}

if (isset($_REQUEST['actual'])) {
    $ctpId = $_REQUEST['actual'];
    $userId = $_REQUEST['user_id'];
    $all_labels = [];
    $all_class_simbol = [];
    $all_grade_simbol = [];
    $all_grade = [];
    $allphase_id = [];
    $allinstructor = [];
    $phase_id = $_REQUEST['phase'];
    $month = $_REQUEST['month'];
    if ($_REQUEST['phase'] && $_REQUEST['month'] == '') {
        $query = "SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
        FROM (
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, NULL as cloned_id
            FROM gradesheet WHERE class = 'actual' 
                                AND course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND phase_id = '$phase_id' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
            UNION
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
            FROM cloned_gradesheet WHERE class = 'actual' 
                                AND course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND phase_id = '$phase_id' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
        ) AS combined_data
        ORDER BY date ASC";
    } elseif ($_REQUEST['month'] && $_REQUEST['phase'] == '') {
        $query = "SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
        FROM (
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, NULL as cloned_id
            FROM gradesheet WHERE class = 'actual' 
                                AND course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND MONTH(date) = '$month' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
            UNION
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
            FROM cloned_gradesheet WHERE class = 'actual' 
                                AND course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND MONTH(date) = '$month' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
        ) AS combined_data
        ORDER BY date ASC";
    } elseif ($_REQUEST['phase'] && $_REQUEST['month']) {
        $query = "SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
        FROM (
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, NULL as cloned_id
            FROM gradesheet WHERE class = 'actual' 
                                AND course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND phase_id = '$phase_id' 
                                AND MONTH(date) = '$month' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
            UNION
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
            FROM cloned_gradesheet WHERE class = 'actual' 
                                AND course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND phase_id = '$phase_id' 
                                AND MONTH(date) = '$month' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
        ) AS combined_data
        ORDER BY date ASC";
    }
    $statement = $connect->prepare($query);
    $statement->execute();
    foreach ($statement->fetchAll() as $dt) {
        if ($dt != '') {
            $all_class_id = $dt['class_id'];
            $classe_table = $dt['class'];
            $query1 = "SELECT symbol AS data FROM actual WHERE id='$all_class_id' AND phase='$phase_id'";
            $statement = $connect->prepare($query1);
            $statement->execute();
            $all_class_simbol[] = $statement->fetch();

            // fetch instructor name from users
            $allclass_inst_id = $dt['instructor'];
            $allinstructorname = $connect->query("SELECT nickname FROM `users` WHERE id='$allclass_inst_id'");
            $allinstructor[] = $allinstructorname->fetch();

            $phase_id = $dt['phase_id'];
            $allphases = $connect->query("SELECT color,phasename FROM `phase` WHERE id='$phase_id'");
            $allphase_id[] = $allphases->fetch();
            $all_clone_id[] = $dt['cloned_id'];
            $all_grade_simbol[] = $dt['over_all_grade'];
            $all_grade[] = $dt['over_all_grade_per'];
        }
    }

    $all_instructor_name = [];
    foreach ($allinstructor as $dt) {
        $all_instructor_name[] = $dt['nickname'];
    }
    $all_labels = [];
    foreach ($all_class_simbol as $key => $dt) {
        if (is_array($dt) && isset($dt['data'])) {
            if ($all_clone_id[$key] != "") {
                $all_labels[] = $dt['data'] . str_repeat("X", $all_clone_id[$key]);
            } else {
                $all_labels[] = $dt['data'];
            }
        }
    }

    $all_phase_name = [];
    $all_color = [];
    foreach ($allphase_id as $dt) {
        $all_phase_name[] = $dt['phasename'];
        $all_color[] = $dt['color'];
    }

    $response = [
        'labels' => $all_labels,
        'phases' => $all_phase_name,
        'phases_color' => $all_color,
        'instructor' => $all_instructor_name,
        'grades' => $all_grade_simbol,
        'allactualGradesheetData' => $all_grade,
    ];
    echo json_encode($response);
}

if (isset($_REQUEST['sim'])) {
    $ctpId = $_REQUEST['sim'];
    $userId = $_REQUEST['user_id'];
    $all_labels = [];
    $all_class_simbol = [];
    $all_grade_simbol = [];
    $all_grade = [];
    $allphase_id = [];
    $allinstructor = [];
    $phase_id = $_REQUEST['phase'];
    $month = $_REQUEST['month'];
    if ($_REQUEST['phase'] && $_REQUEST['month'] == '') {
        $query = "SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
        FROM (
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, NULL as cloned_id
            FROM gradesheet WHERE class = 'sim' 
                                AND course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND phase_id = '$phase_id' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
            UNION
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
            FROM cloned_gradesheet WHERE class = 'sim' 
                                AND course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND phase_id = '$phase_id' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
        ) AS combined_data
        ORDER BY date ASC";
    } elseif ($_REQUEST['month'] && $_REQUEST['phase'] == '') {
        $query = "SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
        FROM (
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, NULL as cloned_id
            FROM gradesheet WHERE class = 'sim' 
                                AND course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND MONTH(date) = '$month' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
            UNION
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
            FROM cloned_gradesheet WHERE class = 'sim' 
                                AND course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND MONTH(date) = '$month' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
        ) AS combined_data
        ORDER BY date ASC";
    } elseif ($_REQUEST['phase'] && $_REQUEST['month']) {
        $query = "SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
        FROM (
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, NULL as cloned_id
            FROM gradesheet WHERE class = 'sim' 
                                AND course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND phase_id = '$phase_id' 
                                AND MONTH(date) = '$month' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
            UNION
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
            FROM cloned_gradesheet WHERE class = 'sim' 
                                AND course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND phase_id = '$phase_id' 
                                AND MONTH(date) = '$month' 
                                AND over_all_grade IS NOT NULL 
                                AND over_all_grade_per != 0
        ) AS combined_data
        ORDER BY date ASC";
    }
    $statement = $connect->prepare($query);
    $statement->execute();
    foreach ($statement->fetchAll() as $dt) {
        if ($dt != '') {
            $all_class_id = $dt['class_id'];
            $classe_table = $dt['class'];
            $phase_id = $_REQUEST['phase'];
            $query1 = "SELECT shortsim AS data FROM sim where id='$all_class_id' AND phase='$phase_id'";
            $statement = $connect->prepare($query1);
            $statement->execute();
            $all_class_simbol[] = $statement->fetch();

            // fetch instructor name from users
            $allclass_inst_id = $dt['instructor'];
            $allinstructorname = $connect->query("SELECT nickname FROM `users` WHERE id='$allclass_inst_id'");
            $allinstructor[] = $allinstructorname->fetch();

            $phase_id = $dt['phase_id'];
            $allphases = $connect->query("SELECT color,phasename FROM `phase` WHERE id='$phase_id'");
            $allphase_id[] = $allphases->fetch();
            $all_clone_id[] = $dt['cloned_id'];
            $all_grade_simbol[] = $dt['over_all_grade'];
            $all_grade[] = $dt['over_all_grade_per'];
        }
    }

    $all_instructor_name = [];
    foreach ($allinstructor as $dt) {
        $all_instructor_name[] = $dt['nickname'];
    }
    $all_labels = [];
    foreach ($all_class_simbol as $key => $dt) {
        if (is_array($dt) && isset($dt['data'])) {
            if ($all_clone_id[$key] != "") {
                $all_labels[] = $dt['data'] . str_repeat("X", $all_clone_id[$key]);
            } else {
                $all_labels[] = $dt['data'];
            }
        }
    }

    $all_phase_name = [];
    $all_color = [];
    foreach ($allphase_id as $dt) {
        $all_phase_name[] = $dt['phasename'];
        $all_color[] = $dt['color'];
    }

    $response = [
        'simlabels' => $all_labels,
        'allsimGradesheetData' => $all_grade,
        'phases' => $all_phase_name,
        'phases_color' => $all_color,
        'instructor' => $all_instructor_name,
        'grades' => $all_grade_simbol,
    ];

    echo json_encode($response);
}

if (isset($_REQUEST['test'])) {
    $ctpId = $_REQUEST['test'];
    $userId = $_REQUEST['user_id'];
    $testlabels = [];
    $test_grade = [];
    $test_class_id = [];
    $month = $_REQUEST['month'];
    $phase = $_REQUEST['phase'];

    $testClasses  = $connect->query("SELECT shorttest,id FROM test WHERE ctp = '$ctpId' AND phase='$phase'");
    $testClassData = $testClasses->fetchAll();

    foreach ($testClassData as $adt) {
        $test_class_id[] = $adt['id'];
    }
    $agcdata = [];
    foreach ($test_class_id as $key => $a_id) {
        $class_name = 'test';
        $testgradesheet  = $connect->query("SELECT marks AS data,test_id,clone_id FROM(
            SELECT marks,test_id,NULL AS clone_id FROM test_data WHERE test_id = '$a_id' AND course_id = '$ctpId' AND student_id='$userId'
            UNION 
            SELECT marks,test_id,clone_id FROM test_cloned_data WHERE test_id = '$a_id' AND course_id = '$ctpId' AND student_id='$userId'
             )AS combine_data");
        $testGradesheetData = $testgradesheet->fetch();
        $agcdata[] = $testGradesheetData;
        if ($testGradesheetData != '') {
            $qu_ery_1 = $connect->prepare("SELECT shorttest FROM test WHERE id=?");
            $qu_ery_1->execute([$a_id]);
            $testlabels[] = $qu_ery_1->fetchColumn();
        }
    }

    foreach ($agcdata as $dt) {
        if (is_array($dt) && isset($dt['data'])) {
            $test_grade[] = $dt['data'];
        }
    }
    $response = [
        'testlabels' => $testlabels,
        'alltestGradesheetData' => $test_grade
    ];

    echo json_encode($response);
}
