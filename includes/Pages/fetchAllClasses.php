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
    $query = "SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
        FROM (
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, NULL as cloned_id
            FROM gradesheet WHERE course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND class = 'actual'
                                AND over_all_grade IS NOT NULL
                                AND over_all_grade_per != 0
            UNION
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
            FROM cloned_gradesheet WHERE course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND class = 'actual'
                                AND over_all_grade IS NOT NULL
                                AND over_all_grade_per != 0
        ) AS combined_data
        ORDER BY date ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $query1 = "SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
        FROM (
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, NULL as cloned_id
            FROM gradesheet WHERE course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND class = 'sim'
                                AND over_all_grade IS NOT NULL
                                AND over_all_grade_per != 0
            UNION
            SELECT date, over_all_grade, over_all_grade_per,class, class_id, instructor,phase_id, cloned_id
            FROM cloned_gradesheet WHERE course_id = '$ctpId'
                                AND user_id = '$userId'
                                AND class = 'sim'
                                AND over_all_grade IS NOT NULL
                                AND over_all_grade_per != 0
        ) AS combined_data
        ORDER BY date ASC";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();

    $data1 = $statement->fetchAll();
    $data2 = $statement1->fetchAll();

    $combinedData = array_merge($data1, $data2);
    usort($combinedData, function ($a, $b) {
        return strtotime($a['date']) - strtotime($b['date']);
    });

    foreach ($combinedData as $dt) {
        if ($dt != '') {
            $all_class_id = $dt['class_id'];
            $classe_table = $dt['class'];

            if ($classe_table == 'actual') {
                $query1 = "SELECT symbol AS data FROM actual where id='$all_class_id'";
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
        if ($all_clone_id[$key] != "") {
            $all_labels[] = $dt['data'] . str_repeat("x", $all_clone_id[$key]);
        } else {
            $all_labels[] = $dt['data'];
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

    $query = "SELECT
                gs.date,
                gs.over_all_grade,
                gs.over_all_grade_per,
                gs.class,
                gs.class_id,
                gs.instructor,
                gs.phase_id,
                gs.cloned_id,
                a.symbol AS class_symbol,
                u.nickname AS instructor_name,
                p.color AS phase_color,
                p.phasename AS phase_name
              FROM (
                  SELECT date, over_all_grade, over_all_grade_per, class, class_id, instructor, phase_id, NULL as cloned_id
                  FROM gradesheet
                  WHERE class = 'actual' AND course_id = '$ctpId' AND user_id = '$userId' AND over_all_grade IS NOT NULL AND over_all_grade_per != 0
                  UNION
                  SELECT date, over_all_grade, over_all_grade_per, class, class_id, instructor, phase_id, cloned_id
                  FROM cloned_gradesheet
                  WHERE class = 'actual' AND course_id = '$ctpId' AND user_id = '$userId' AND over_all_grade IS NOT NULL AND over_all_grade_per != 0
              ) AS gs
              LEFT JOIN actual a ON gs.class_id = a.id
              LEFT JOIN users u ON gs.instructor = u.id
              LEFT JOIN phase p ON gs.phase_id = p.id
              ORDER BY gs.date ASC";

    $statement = $connect->prepare($query);
    $statement->execute();

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    $all_labels = array_map(function ($dt) {
        $class_symbol = $dt['class_symbol'];
        if ($dt['cloned_id'] !== null) {
            $class_symbol .= str_repeat('x', $dt['cloned_id']);
        }
        return $class_symbol;
    }, $data);

    $all_phase_name = array_column($data, 'phase_name');
    $all_color = array_column($data, 'phase_color');
    $all_instructor_name = array_column($data, 'instructor_name');
    $all_grade_simbol = array_column($data, 'over_all_grade');
    $all_grade = array_column($data, 'over_all_grade_per');

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

    $query = "SELECT
                gs.date,
                gs.over_all_grade,
                gs.over_all_grade_per,
                gs.class,
                gs.class_id,
                gs.instructor,
                gs.phase_id,
                gs.cloned_id,
                s.shortsim AS class_symbol,
                u.nickname AS instructor_name,
                p.color AS phase_color,
                p.phasename AS phase_name
              FROM (
                  SELECT date, over_all_grade, over_all_grade_per, class, class_id, instructor, phase_id, NULL as cloned_id
                  FROM gradesheet
                  WHERE class = 'sim' AND course_id = '$ctpId' AND user_id = '$userId' AND over_all_grade IS NOT NULL AND over_all_grade_per != 0
                  UNION
                  SELECT date, over_all_grade, over_all_grade_per, class, class_id, instructor, phase_id, cloned_id
                  FROM cloned_gradesheet
                  WHERE class = 'sim' AND course_id = '$ctpId' AND user_id = '$userId' AND over_all_grade IS NOT NULL AND over_all_grade_per != 0
              ) AS gs
              LEFT JOIN sim s ON gs.class_id = s.id
              LEFT JOIN users u ON gs.instructor = u.id
              LEFT JOIN phase p ON gs.phase_id = p.id
              ORDER BY gs.date ASC";

    $statement = $connect->prepare($query);
    $statement->execute();

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    $response = [
        'simlabels' => array_map(function ($dt) {
            return $dt['class_symbol'] . ($dt['cloned_id'] !== null ? str_repeat('x', $dt['cloned_id']) : '');
        }, $data),
        'allsimGradesheetData' => array_column($data, 'over_all_grade_per'),
        'phases' => array_column($data, 'phase_name'),
        'phases_color' => array_column($data, 'phase_color'),
        'instructor' => array_column($data, 'instructor_name'),
        'grades' => array_column($data, 'over_all_grade'),
    ];

    echo json_encode($response);
}

if (isset($_REQUEST['test'])) {
    $ctpId = $_REQUEST['test'];
    $userId = $_REQUEST['user_id'];
    $testlabels = [];
    $test_grade = [];
    $sTest = [];

    $testClassesQuery = $connect->prepare("SELECT test,shorttest, id FROM test WHERE ctp = :ctpId");
    $testClassesQuery->bindParam(':ctpId', $ctpId, PDO::PARAM_INT);
    $testClassesQuery->execute();
    $testClassData = $testClassesQuery->fetchAll(PDO::FETCH_ASSOC);

    $test_class_ids = array_column($testClassData, 'id');

    $testGradesQuery = $connect->prepare("SELECT marks AS data FROM (
        SELECT marks, test_id, NULL AS clone_id FROM test_data WHERE test_id = :testId AND course_id = :ctpId AND student_id = :userId
        UNION
        SELECT marks, test_id, clone_id FROM test_cloned_data WHERE test_id = :testId AND course_id = :ctpId AND student_id = :userId
    ) AS combine_data");

    foreach ($test_class_ids as $test_id) {
        $testGradesQuery->execute([
            ':testId' => $test_id,
            ':ctpId' => $ctpId,
            ':userId' => $userId,
        ]);
        $testGradesData = $testGradesQuery->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($testGradesData)) {
            $testlabels[] = $testClassData[array_search($test_id, $test_class_ids)]['test'] . ' - ' . $testClassData[array_search($test_id, $test_class_ids)]['shorttest'];
            $sTest[] = $testClassData[array_search($test_id, $test_class_ids)]['shorttest'];
            $test_grade[] = $testGradesData[0]['data'];
        }
    }

    $response = [
        'testlabels' => $testlabels,
        'sTest' => $sTest,
        'alltestGradesheetData' => $test_grade,
    ];

    echo json_encode($response);
}
