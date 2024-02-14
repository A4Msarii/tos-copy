<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['ctpId'])) {

    // $pId = $_REQUEST['phase'];
    // $d = $_REQUEST['month'];
    // if($_REQUEST['phase'] != ""){
    //     echo $pId;
    // }else{
    //     echo "not";
    // }

    // echo $pId;
    // echo $d;
    // die();

    $ctpId = $_REQUEST['ctpId'];
    $all_labels = [];
    $all_class_simbol = [];
    $all_grade_simbol = [];
    $all_grade = [];
    $allphase_id = [];
    $allinstructor = [];
    $all_percentage = [];
    $student_count = [];
    $group_over_all_grades = [];
    $all_student_name = [];
    $images = [];
    $all_instructor = [];

    if ($_REQUEST['phase'] != "" && $_REQUEST['month'] == "") {
        $phase_id =  $_REQUEST['phase'];
        $query = "SELECT
        combined_data.date,
        combined_data.over_all_grade,
        combined_data.over_all_grade_per,
        combined_data.class,
        combined_data.class_id,
        combined_data.instructor,
        combined_data.phase_id,
        combined_data.cloned_id,
        GROUP_CONCAT(combined_data.over_all_grade SEPARATOR ', ') AS group_over_all_grades,
        ROUND(AVG(combined_data.over_all_grade_per), 1) AS all_percentage,
        COUNT(combined_data.user_id) AS student_count,
        GROUP_CONCAT(users.nickname SEPARATOR ', ') AS student_names,
        GROUP_CONCAT(users.file_name SEPARATOR ', ') AS images,
        GROUP_CONCAT(instructor_users.nickname SEPARATOR ', ') AS all_instructor_names
    FROM (
        SELECT
            date,
            over_all_grade,
            over_all_grade_per,
            class,
            class_id,
            instructor,
            phase_id,
            NULL AS cloned_id,
            user_id
        FROM gradesheet
        WHERE
            course_id = '$ctpId'
            AND class = 'actual'
            AND phase_id = '$phase_id' 
            AND over_all_grade IS NOT NULL
            AND over_all_grade_per != 0
        UNION ALL
        SELECT
            date,
            over_all_grade,
            over_all_grade_per,
            class,
            class_id,
            instructor,
            phase_id,
            cloned_id,
            user_id
        FROM cloned_gradesheet
        WHERE
            course_id = '$ctpId'
            AND phase_id = '$phase_id' 
            AND class = 'actual'
            AND over_all_grade IS NOT NULL
            AND over_all_grade_per != 0
    ) AS combined_data
    LEFT JOIN users ON combined_data.user_id = users.id
    LEFT JOIN users AS instructor_users ON combined_data.instructor = instructor_users.id
    GROUP BY combined_data.class_id
    ORDER BY combined_data.date ASC";
        $statement = $connect->prepare($query);
        $statement->execute();


        $query1 = "SELECT
        combined_data.date,
        combined_data.over_all_grade,
        combined_data.over_all_grade_per,
        combined_data.class,
        combined_data.class_id,
        combined_data.instructor,
        combined_data.phase_id,
        combined_data.cloned_id,
        GROUP_CONCAT(combined_data.over_all_grade SEPARATOR ', ') AS group_over_all_grades,
        ROUND(AVG(combined_data.over_all_grade_per), 1) AS all_percentage,
        COUNT(combined_data.user_id) AS student_count,
        GROUP_CONCAT(users.nickname SEPARATOR ', ') AS student_names,
        GROUP_CONCAT(users.file_name SEPARATOR ', ') AS images,
        GROUP_CONCAT(instructor_users.nickname SEPARATOR ', ') AS all_instructor_names
    FROM (
        SELECT
            date,
            over_all_grade,
            over_all_grade_per,
            class,
            class_id,
            instructor,
            phase_id,
            NULL AS cloned_id,
            user_id
        FROM gradesheet
        WHERE
            course_id = '$ctpId'
            AND phase_id = '$phase_id' 
            AND class = 'sim'
            AND over_all_grade IS NOT NULL
            AND over_all_grade_per != 0
        UNION ALL
        SELECT
            date,
            over_all_grade,
            over_all_grade_per,
            class,
            class_id,
            instructor,
            phase_id,
            cloned_id,
            user_id
        FROM cloned_gradesheet
        WHERE
            course_id = '$ctpId'
            AND phase_id = '$phase_id' 
            AND class = 'sim'
            AND over_all_grade IS NOT NULL
            AND over_all_grade_per != 0
    ) AS combined_data
    LEFT JOIN users ON combined_data.user_id = users.id
    LEFT JOIN users AS instructor_users ON combined_data.instructor = instructor_users.id
    GROUP BY combined_data.class_id
    ORDER BY combined_data.date ASC";
        // print_r($query1);
        // die();
        $statement1 = $connect->prepare($query1);
        $statement1->execute();
    }
    if ($_REQUEST['month'] != "" && $_REQUEST['phase'] == '') {
        $month = $_REQUEST['month'];
        $query = "SELECT
        combined_data.date,
        combined_data.over_all_grade,
        combined_data.over_all_grade_per,
        combined_data.class,
        combined_data.class_id,
        combined_data.instructor,
        combined_data.phase_id,
        combined_data.cloned_id,
        GROUP_CONCAT(combined_data.over_all_grade SEPARATOR ', ') AS group_over_all_grades,
        ROUND(AVG(combined_data.over_all_grade_per), 1) AS all_percentage,
        COUNT(combined_data.user_id) AS student_count,
        GROUP_CONCAT(users.nickname SEPARATOR ', ') AS student_names,
        GROUP_CONCAT(users.file_name SEPARATOR ', ') AS images,
        GROUP_CONCAT(instructor_users.nickname SEPARATOR ', ') AS all_instructor_names
    FROM (
        SELECT
            date,
            over_all_grade,
            over_all_grade_per,
            class,
            class_id,
            instructor,
            phase_id,
            NULL AS cloned_id,
            user_id
        FROM gradesheet
        WHERE
            course_id = '$ctpId'
            AND class = 'actual'
            AND MONTH(date) = '$month' 
            AND over_all_grade IS NOT NULL
            AND over_all_grade_per != 0
        UNION ALL
        SELECT
            date,
            over_all_grade,
            over_all_grade_per,
            class,
            class_id,
            instructor,
            phase_id,
            cloned_id,
            user_id
        FROM cloned_gradesheet
        WHERE
            course_id = '$ctpId'
            AND class = 'actual'
            AND MONTH(date) = '$month' 
            AND over_all_grade IS NOT NULL
            AND over_all_grade_per != 0
    ) AS combined_data
    LEFT JOIN users ON combined_data.user_id = users.id
    LEFT JOIN users AS instructor_users ON combined_data.instructor = instructor_users.id
    GROUP BY combined_data.class_id
    ORDER BY combined_data.date ASC";
        $statement = $connect->prepare($query);
        $statement->execute();

        $query1 = "SELECT
        combined_data.date,
        combined_data.over_all_grade,
        combined_data.over_all_grade_per,
        combined_data.class,
        combined_data.class_id,
        combined_data.instructor,
        combined_data.phase_id,
        combined_data.cloned_id,
        GROUP_CONCAT(combined_data.over_all_grade SEPARATOR ', ') AS group_over_all_grades,
        ROUND(AVG(combined_data.over_all_grade_per), 1) AS all_percentage,
        COUNT(combined_data.user_id) AS student_count,
        GROUP_CONCAT(users.nickname SEPARATOR ', ') AS student_names,
        GROUP_CONCAT(users.file_name SEPARATOR ', ') AS images,
        GROUP_CONCAT(instructor_users.nickname SEPARATOR ', ') AS all_instructor_names
    FROM (
        SELECT
            date,
            over_all_grade,
            over_all_grade_per,
            class,
            class_id,
            instructor,
            phase_id,
            NULL AS cloned_id,
            user_id
        FROM gradesheet
        WHERE
            course_id = '$ctpId'
            AND class = 'sim'
            AND MONTH(date) = '$month' 
            AND over_all_grade IS NOT NULL
            AND over_all_grade_per != 0
        UNION ALL
        SELECT
            date,
            over_all_grade,
            over_all_grade_per,
            class,
            class_id,
            instructor,
            phase_id,
            cloned_id,
            user_id
        FROM cloned_gradesheet
        WHERE
            course_id = '$ctpId'
            AND class = 'sim'
            AND MONTH(date) = '$month' 
            AND over_all_grade IS NOT NULL
            AND over_all_grade_per != 0
    ) AS combined_data
    LEFT JOIN users ON combined_data.user_id = users.id
    LEFT JOIN users AS instructor_users ON combined_data.instructor = instructor_users.id
    GROUP BY combined_data.class_id
    ORDER BY combined_data.date ASC";
        $statement1 = $connect->prepare($query1);
        $statement1->execute();
    }
    if ($_REQUEST['phase'] != "" && $_REQUEST['month'] != "") {
        $month = $_REQUEST['month'];
        $phase_id = $_REQUEST['phase'];
        $query = "SELECT
        combined_data.date,
        combined_data.over_all_grade,
        combined_data.over_all_grade_per,
        combined_data.class,
        combined_data.class_id,
        combined_data.instructor,
        combined_data.phase_id,
        combined_data.cloned_id,
        GROUP_CONCAT(combined_data.over_all_grade SEPARATOR ', ') AS group_over_all_grades,
        ROUND(AVG(combined_data.over_all_grade_per), 1) AS all_percentage,
        COUNT(combined_data.user_id) AS student_count,
        GROUP_CONCAT(users.nickname SEPARATOR ', ') AS student_names,
        GROUP_CONCAT(users.file_name SEPARATOR ', ') AS images,
        GROUP_CONCAT(instructor_users.nickname SEPARATOR ', ') AS all_instructor_names
    FROM (
        SELECT
            date,
            over_all_grade,
            over_all_grade_per,
            class,
            class_id,
            instructor,
            phase_id,
            NULL AS cloned_id,
            user_id
        FROM gradesheet
        WHERE
            course_id = '$ctpId'
            AND phase_id = '$phase_id' 
            AND class = 'actual'
            AND MONTH(date) = '$month' 
            AND over_all_grade IS NOT NULL
            AND over_all_grade_per != 0
        UNION ALL
        SELECT
            date,
            over_all_grade,
            over_all_grade_per,
            class,
            class_id,
            instructor,
            phase_id,
            cloned_id,
            user_id
        FROM cloned_gradesheet
        WHERE
            course_id = '$ctpId'
            AND phase_id = '$phase_id' 
            AND class = 'actual'
            AND MONTH(date) = '$month'
            AND over_all_grade IS NOT NULL
            AND over_all_grade_per != 0
    ) AS combined_data
    LEFT JOIN users ON combined_data.user_id = users.id
    LEFT JOIN users AS instructor_users ON combined_data.instructor = instructor_users.id
    GROUP BY combined_data.class_id
    ORDER BY combined_data.date ASC";

        $statement = $connect->prepare($query);
        $statement->execute();

        $query1 = "SELECT
        combined_data.date,
        combined_data.over_all_grade,
        combined_data.over_all_grade_per,
        combined_data.class,
        combined_data.class_id,
        combined_data.instructor,
        combined_data.phase_id,
        combined_data.cloned_id,
        GROUP_CONCAT(combined_data.over_all_grade SEPARATOR ', ') AS group_over_all_grades,
        ROUND(AVG(combined_data.over_all_grade_per), 1) AS all_percentage,
        COUNT(combined_data.user_id) AS student_count,
        GROUP_CONCAT(users.nickname SEPARATOR ', ') AS student_names,
        GROUP_CONCAT(users.file_name SEPARATOR ', ') AS images,
        GROUP_CONCAT(instructor_users.nickname SEPARATOR ', ') AS all_instructor_names
    FROM (
        SELECT
            date,
            over_all_grade,
            over_all_grade_per,
            class,
            class_id,
            instructor,
            phase_id,
            NULL AS cloned_id,
            user_id
        FROM gradesheet
        WHERE
            course_id = '$ctpId'
            AND class = 'sim'
            AND phase_id = '$phase_id' 
            AND MONTH(date) = '$month' 
            AND over_all_grade IS NOT NULL
            AND over_all_grade_per != 0
        UNION ALL
        SELECT
            date,
            over_all_grade,
            over_all_grade_per,
            class,
            class_id,
            instructor,
            phase_id,
            cloned_id,
            user_id
        FROM cloned_gradesheet
        WHERE
            course_id = '$ctpId'
            AND class = 'sim'
            AND phase_id = '$phase_id' 
            AND MONTH(date) = '$month'
            AND over_all_grade IS NOT NULL
            AND over_all_grade_per != 0
    ) AS combined_data
    LEFT JOIN users ON combined_data.user_id = users.id
    LEFT JOIN users AS instructor_users ON combined_data.instructor = instructor_users.id
    GROUP BY combined_data.class_id
    ORDER BY combined_data.date ASC";

        $statement = $connect->prepare($query);
        $statement->execute();
    }
    $data1 = $statement->fetchAll();
    if ($_REQUEST['phase'] == "" || $_REQUEST['month'] == "") {
        $data2 = $statement1->fetchAll();
    } else {
        $data2 = [];
    }

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

                $phase_id = $dt['phase_id'];
                $allphases = $connect->query("SELECT color,phasename FROM `phase` WHERE id='$phase_id'");
                $allphase_id[] = $allphases->fetch();
                $all_clone_id[] = $dt['cloned_id'];
                $all_grade_simbol[] = $dt['over_all_grade'];
                $all_grade[] = $dt['over_all_grade_per'];
                $all_percentage[] = $dt['all_percentage'];
                $student_count[] = $dt['student_count'];
                $group_over_all_grades[] = $dt['group_over_all_grades'];
                $all_student_name[] = $dt['student_names'];
                $images[] = $dt['images'];
                $all_instructor[] = $dt['all_instructor_names'];
            }
            if ($classe_table == 'sim') {
                $query1 = "SELECT shortsim AS data FROM sim where id='$all_class_id'";
                $statement = $connect->prepare($query1);
                $statement->execute();
                $all_class_simbol[] = $statement->fetch();

                $phase_id = $dt['phase_id'];
                $allphases = $connect->query("SELECT color,phasename FROM `phase` WHERE id='$phase_id'");
                $allphase_id[] = $allphases->fetch();

                $all_clone_id[] = $dt['cloned_id'];
                $all_grade_simbol[] = $dt['over_all_grade'];
                $all_grade[] = $dt['over_all_grade_per'];
                $all_percentage[] = $dt['all_percentage'];
                $student_count[] = $dt['student_count'];
                $group_over_all_grades[] = $dt['group_over_all_grades'];
                $all_student_name[] = $dt['student_names'];
                $images[] = $dt['images'];
                $all_instructor[] = $dt['all_instructor_names'];
            }
        }
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
        'allgradessimbol' => $all_grade_simbol,
        'all_percentage' => $all_percentage,
        'student_count' => $student_count,
        'group_over_all_grades' => $group_over_all_grades,
        'all_student_name' => $all_student_name,
        'images' => $images,
        'all_instructor' => $all_instructor,
    ];
    echo json_encode($response);
}

if (isset($_REQUEST['actual'])) {
    $ctpId = $_REQUEST['actual'];
    $all_labels = [];
    $all_class_simbol = [];
    $all_grade_simbol = [];
    $all_grade = [];
    $allphase_id = [];
    $all_student_name = [];
    $images = [];
    $all_instructor = [];
    $all_percentage = [];
    $student_count = [];
    $group_over_all_grades = [];

    if ($_REQUEST['phase'] && $_REQUEST['month'] == '') {
        $phase_id = $_REQUEST['phase'];
        $query = "SELECT
            combined_data.date,
            combined_data.over_all_grade,
            combined_data.over_all_grade_per,
            combined_data.class,
            combined_data.class_id,
            combined_data.instructor,
            combined_data.phase_id,
            combined_data.cloned_id,
            GROUP_CONCAT(combined_data.over_all_grade SEPARATOR ', ') AS group_over_all_grades,
            ROUND(AVG(combined_data.over_all_grade_per), 1) AS all_percentage,
            COUNT(combined_data.user_id) AS student_count,
            GROUP_CONCAT(users.nickname SEPARATOR ', ') AS student_names,
            GROUP_CONCAT(users.file_name SEPARATOR ', ') AS images,
            GROUP_CONCAT(instructor_users.nickname SEPARATOR ', ') AS all_instructor_names
            FROM (
                SELECT
                    date,
                    over_all_grade,
                    over_all_grade_per,
                    class,
                    class_id,
                    instructor,
                    phase_id,
                    NULL AS cloned_id,
                    user_id
                FROM gradesheet
                WHERE
                    class = 'actual'
                    AND course_id = '$ctpId'
                     AND phase_id = '$phase_id' 
                    AND over_all_grade IS NOT NULL
                    AND over_all_grade_per != 0
                UNION ALL
                SELECT
                    date,
                    over_all_grade,
                    over_all_grade_per,
                    class,
                    class_id,
                    instructor,
                    phase_id,
                    cloned_id,
                    user_id
                FROM cloned_gradesheet
                WHERE
                    class = 'actual'
                    AND course_id = '$ctpId'
                    AND phase_id = '$phase_id'                    
                    AND over_all_grade IS NOT NULL
                    AND over_all_grade_per != 0
            ) AS combined_data
            LEFT JOIN users ON combined_data.user_id = users.id
            LEFT JOIN users AS instructor_users ON combined_data.instructor = instructor_users.id
            GROUP BY combined_data.class_id
            ORDER BY combined_data.date ASC;
            ";
        $statement = $connect->prepare($query);
        $statement->execute();
    } elseif ($_REQUEST['month'] && $_REQUEST['phase'] == '') {
        $month = $_REQUEST['month'];
        $query = "SELECT
            combined_data.date,
            combined_data.over_all_grade,
            combined_data.over_all_grade_per,
            combined_data.class,
            combined_data.class_id,
            combined_data.instructor,
            combined_data.phase_id,
            combined_data.cloned_id,
            GROUP_CONCAT(combined_data.over_all_grade SEPARATOR ', ') AS group_over_all_grades,
            ROUND(AVG(combined_data.over_all_grade_per), 1) AS all_percentage,
            COUNT(combined_data.user_id) AS student_count,
            GROUP_CONCAT(users.nickname SEPARATOR ', ') AS student_names,
            GROUP_CONCAT(users.file_name SEPARATOR ', ') AS images,
            GROUP_CONCAT(instructor_users.nickname SEPARATOR ', ') AS all_instructor_names
            FROM (
                SELECT
                    date,
                    over_all_grade,
                    over_all_grade_per,
                    class,
                    class_id,
                    instructor,
                    phase_id,
                    NULL AS cloned_id,
                    user_id
                FROM gradesheet
                WHERE
                    class = 'actual'
                    AND course_id = '$ctpId'
                     AND MONTH(date) = '$month'
                    AND over_all_grade IS NOT NULL
                    AND over_all_grade_per != 0
                UNION ALL
                SELECT
                    date,
                    over_all_grade,
                    over_all_grade_per,
                    class,
                    class_id,
                    instructor,
                    phase_id,
                    cloned_id,
                    user_id
                FROM cloned_gradesheet
                WHERE
                    class = 'actual'
                    AND course_id = '$ctpId'
                     AND MONTH(date) = '$month'
                    AND over_all_grade IS NOT NULL
                    AND over_all_grade_per != 0
            ) AS combined_data
            LEFT JOIN users ON combined_data.user_id = users.id
            LEFT JOIN users AS instructor_users ON combined_data.instructor = instructor_users.id
            GROUP BY combined_data.class_id
            ORDER BY combined_data.date ASC;
            ";
        $statement = $connect->prepare($query);
        $statement->execute();
    } elseif ($_REQUEST['phase'] && $_REQUEST['month']) {
        $phase_id = $_REQUEST['phase'];
        $month = $_REQUEST['month'];
        $query = "SELECT
            combined_data.date,
            combined_data.over_all_grade,
            combined_data.over_all_grade_per,
            combined_data.class,
            combined_data.class_id,
            combined_data.instructor,
            combined_data.phase_id,
            combined_data.cloned_id,
            GROUP_CONCAT(combined_data.over_all_grade SEPARATOR ', ') AS group_over_all_grades,
            ROUND(AVG(combined_data.over_all_grade_per), 1) AS all_percentage,
            COUNT(combined_data.user_id) AS student_count,
            GROUP_CONCAT(users.nickname SEPARATOR ', ') AS student_names,
            GROUP_CONCAT(users.file_name SEPARATOR ', ') AS images,
            GROUP_CONCAT(instructor_users.nickname SEPARATOR ', ') AS all_instructor_names
            FROM (
                SELECT
                    date,
                    over_all_grade,
                    over_all_grade_per,
                    class,
                    class_id,
                    instructor,
                    phase_id,
                    NULL AS cloned_id,
                    user_id
                FROM gradesheet
                WHERE
                    class = 'actual'
                    AND course_id = '$ctpId'
                    AND phase_id = '$phase_id' 
                    AND MONTH(date) = '$month'
                    AND over_all_grade IS NOT NULL
                    AND over_all_grade_per != 0
                UNION ALL
                SELECT
                    date,
                    over_all_grade,
                    over_all_grade_per,
                    class,
                    class_id,
                    instructor,
                    phase_id,
                    cloned_id,
                    user_id
                FROM cloned_gradesheet
                WHERE
                    class = 'actual'
                    AND course_id = '$ctpId'
                    AND phase_id = '$phase_id' 
                    AND MONTH(date) = '$month'
                    AND over_all_grade IS NOT NULL
                    AND over_all_grade_per != 0
            ) AS combined_data
            LEFT JOIN users ON combined_data.user_id = users.id
            LEFT JOIN users AS instructor_users ON combined_data.instructor = instructor_users.id
            GROUP BY combined_data.class_id
            ORDER BY combined_data.date ASC;
            ";
        $statement = $connect->prepare($query);
        $statement->execute();
    }
    foreach ($statement->fetchAll() as $dt) {
        if ($dt != '') {
            $all_class_id = $dt['class_id'];
            $classe_table = $dt['class'];
            $query1 = "SELECT symbol AS data FROM actual where id='$all_class_id'";
            $statement = $connect->prepare($query1);
            $statement->execute();
            $all_class_simbol[] = $statement->fetch();


            $phase_id = $dt['phase_id'];
            $allphases = $connect->query("SELECT color,phasename FROM `phase` WHERE id='$phase_id'");
            $allphase_id[] = $allphases->fetch();
            $all_clone_id[] = $dt['cloned_id'];
            $all_grade_simbol[] = $dt['over_all_grade'];
            $all_grade[] = $dt['over_all_grade_per'];
            $all_percentage[] = $dt['all_percentage'];
            $student_count[] = $dt['student_count'];
            $group_over_all_grades[] = $dt['group_over_all_grades'];
            $all_student_name[] = $dt['student_names'];
            $images[] = $dt['images'];
            $all_instructor[] = $dt['all_instructor_names'];
        }
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
        'phases' => $all_phase_name,
        'phases_color' => $all_color,
        'grades' => $all_grade_simbol,
        'allactualGradesheetData' => $all_grade,
        'all_percentage' => $all_percentage,
        'student_count' => $student_count,
        'group_over_all_grades' => $group_over_all_grades,
        'all_student_name' => $all_student_name,
        'images' => $images,
        'all_instructor' => $all_instructor,

    ];
    echo json_encode($response);
}

if (isset($_REQUEST['sim'])) {
    $ctpId = $_REQUEST['sim'];
    $all_labels = [];
    $all_class_simbol = [];
    $all_grade_simbol = [];
    $all_grade = [];
    $allphase_id = [];
    $all_student_name = [];
    $images = [];
    $all_percentage = [];
    $all_instructor = [];
    $student_count = [];
    $group_over_all_grades = [];

    if ($_REQUEST['phase'] && $_REQUEST['month'] == '') {
        $phase_id = $_REQUEST['phase'];
        $query = "SELECT 
            combined_data.date, 
            combined_data.over_all_grade, 
            combined_data.over_all_grade_per, 
            combined_data.class, 
            combined_data.class_id, 
            combined_data.instructor, 
            combined_data.phase_id, 
            combined_data.cloned_id, 
            GROUP_CONCAT(combined_data.over_all_grade SEPARATOR ', ') AS group_over_all_grades, 
            ROUND(AVG(combined_data.over_all_grade_per), 1) AS all_percentage, 
            COUNT(combined_data.user_id) AS student_count, 
            GROUP_CONCAT(users.nickname SEPARATOR ', ') AS student_names, 
            GROUP_CONCAT(users.file_name SEPARATOR ', ') AS images, 
            GROUP_CONCAT(instructor_users.nickname SEPARATOR ', ') AS all_instructor_names
                FROM (
                    SELECT 
                        date, 
                        over_all_grade, 
                        over_all_grade_per, 
                        class, 
                        class_id, 
                        instructor, 
                        phase_id, 
                        NULL AS cloned_id, 
                        user_id 
                    FROM gradesheet 
                    WHERE 
                        class = 'sim' 
                        AND course_id = '$ctpId' 
                        AND phase_id = '$phase_id' 
                        AND over_all_grade IS NOT NULL 
                        AND over_all_grade_per != 0 
                    UNION
                    SELECT 
                        date, 
                        over_all_grade, 
                        over_all_grade_per, 
                        class, 
                        class_id, 
                        instructor, 
                        phase_id, 
                        cloned_id, 
                        user_id 
                    FROM cloned_gradesheet 
                    WHERE 
                        class = 'sim' 
                        AND course_id = '$ctpId' 
                        AND phase_id = '$phase_id' 
                        AND over_all_grade IS NOT NULL 
                        AND over_all_grade_per != 0 
                ) AS combined_data 
                LEFT JOIN users ON combined_data.user_id = users.id 
                LEFT JOIN users AS instructor_users ON combined_data.instructor = instructor_users.id
                GROUP BY combined_data.class_id 
                ORDER BY combined_data.date ASC;
                ";
        $statement = $connect->prepare($query);
        $statement->execute();
    } elseif ($_REQUEST['month'] && $_REQUEST['phase'] == '') {
        $month = $_REQUEST['month'];
        $query = "SELECT 
            combined_data.date, 
            combined_data.over_all_grade, 
            combined_data.over_all_grade_per, 
            combined_data.class, 
            combined_data.class_id, 
            combined_data.instructor, 
            combined_data.phase_id, 
            combined_data.cloned_id, 
            GROUP_CONCAT(combined_data.over_all_grade SEPARATOR ', ') AS group_over_all_grades, 
            ROUND(AVG(combined_data.over_all_grade_per), 1) AS all_percentage, 
            COUNT(combined_data.user_id) AS student_count, 
            GROUP_CONCAT(users.nickname SEPARATOR ', ') AS student_names, 
            GROUP_CONCAT(users.file_name SEPARATOR ', ') AS images,
            GROUP_CONCAT(instructor_users.nickname SEPARATOR ', ') AS all_instructor_names 
                FROM (
                    SELECT 
                        date, 
                        over_all_grade, 
                        over_all_grade_per, 
                        class, 
                        class_id, 
                        instructor, 
                        phase_id, 
                        NULL AS cloned_id, 
                        user_id 
                    FROM gradesheet 
                    WHERE 
                        class = 'sim' 
                        AND course_id = '$ctpId' 
                         AND MONTH(date) = '$month'
                        AND over_all_grade IS NOT NULL 
                        AND over_all_grade_per != 0 
                    UNION
                    SELECT 
                        date, 
                        over_all_grade, 
                        over_all_grade_per, 
                        class, 
                        class_id, 
                        instructor, 
                        phase_id, 
                        cloned_id, 
                        user_id 
                    FROM cloned_gradesheet 
                    WHERE 
                        class = 'sim' 
                        AND course_id = '$ctpId' 
                         AND MONTH(date) = '$month'
                        AND over_all_grade IS NOT NULL 
                        AND over_all_grade_per != 0 
                ) AS combined_data 
                LEFT JOIN users ON combined_data.user_id = users.id 
                LEFT JOIN users AS instructor_users ON combined_data.instructor = instructor_users.id
                GROUP BY combined_data.class_id 
                ORDER BY combined_data.date ASC;
                ";
        $statement = $connect->prepare($query);
        $statement->execute();
    } elseif ($_REQUEST['phase'] && $_REQUEST['month']) {
        $phase_id = $_REQUEST['phase'];
        $month = $_REQUEST['month'];
        $query = "SELECT 
            combined_data.date, 
            combined_data.over_all_grade, 
            combined_data.over_all_grade_per, 
            combined_data.class, 
            combined_data.class_id, 
            combined_data.instructor, 
            combined_data.phase_id, 
            combined_data.cloned_id, 
            GROUP_CONCAT(combined_data.over_all_grade SEPARATOR ', ') AS group_over_all_grades, 
            ROUND(AVG(combined_data.over_all_grade_per), 1) AS all_percentage, 
            COUNT(combined_data.user_id) AS student_count, 
            GROUP_CONCAT(users.nickname SEPARATOR ', ') AS student_names, 
            GROUP_CONCAT(users.file_name SEPARATOR ', ') AS images,
            GROUP_CONCAT(instructor_users.nickname SEPARATOR ', ') AS all_instructor_names 
                FROM (
                    SELECT 
                        date, 
                        over_all_grade, 
                        over_all_grade_per, 
                        class, 
                        class_id, 
                        instructor, 
                        phase_id, 
                        NULL AS cloned_id, 
                        user_id 
                    FROM gradesheet 
                    WHERE 
                        class = 'sim' 
                        AND course_id = '$ctpId' 
                        AND phase_id = '$phase_id' 
                        AND MONTH(date) = '$month'
                        AND over_all_grade IS NOT NULL 
                        AND over_all_grade_per != 0 
                    UNION
                    SELECT 
                        date, 
                        over_all_grade, 
                        over_all_grade_per, 
                        class, 
                        class_id, 
                        instructor, 
                        phase_id, 
                        cloned_id, 
                        user_id 
                    FROM cloned_gradesheet 
                    WHERE 
                        class = 'sim' 
                        AND course_id = '$ctpId' 
                        AND phase_id = '$phase_id' 
                        AND MONTH(date) = '$month'
                        AND over_all_grade IS NOT NULL 
                        AND over_all_grade_per != 0 
                ) AS combined_data 
                LEFT JOIN users ON combined_data.user_id = users.id 
                LEFT JOIN users AS instructor_users ON combined_data.instructor = instructor_users.id
                GROUP BY combined_data.class_id 
                ORDER BY combined_data.date ASC;
                ";
        $statement = $connect->prepare($query);
        $statement->execute();
    }
    foreach ($statement->fetchAll() as $dt) {
        if ($dt != '') {
            $all_class_id = $dt['class_id'];
            $classe_table = $dt['class'];
            $query1 = "SELECT shortsim AS data FROM sim where id='$all_class_id'";
            $statement = $connect->prepare($query1);
            $statement->execute();
            $all_class_simbol[] = $statement->fetch();

            $phase_id = $dt['phase_id'];
            $allphases = $connect->query("SELECT color,phasename FROM `phase` WHERE id='$phase_id'");
            $allphase_id[] = $allphases->fetch();
            $all_clone_id[] = $dt['cloned_id'];
            $all_grade_simbol[] = $dt['over_all_grade'];
            $all_grade[] = $dt['over_all_grade_per'];
            $all_percentage[] = $dt['all_percentage'];
            $student_count[] = $dt['student_count'];
            $group_over_all_grades[] = $dt['group_over_all_grades'];
            $all_student_name[] = $dt['student_names'];
            $images[] = $dt['images'];
            $all_instructor[] = $dt['all_instructor_names'];
        }
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
        'simlabels' => $all_labels,
        'allsimGradesheetData' => $all_grade,
        'phases' => $all_phase_name,
        'phases_color' => $all_color,
        'all_instructor' => $all_instructor,
        'grades' => $all_grade_simbol,
        'all_percentage' => $all_percentage,
        'student_count' => $student_count,
        'group_over_all_grades' => $group_over_all_grades,
        'all_student_name' => $all_student_name,
        'images' => $images,
    ];

    echo json_encode($response);
}

if (isset($_REQUEST['test'])) {
    $ctpId = $_REQUEST['test'];
    $testlabels = [];
    $test_grade = [];
    $test_class_id = [];
    $testClasses  = $connect->query("SELECT shorttest,id FROM test WHERE ctp = '$ctpId'");
    $testClassData = $testClasses->fetchAll();

    foreach ($testClassData as $adt) {
        $test_class_id[] = $adt['id'];
    }
    $agcdata = [];
    foreach ($test_class_id as $key => $a_id) {
        $class_name = 'test';
        $testgradesheet  = $connect->query(
            "SELECT marks AS data, test_id, clone_id, AVG(marks) AS total_marks
            FROM (
                SELECT marks, test_id, NULL AS clone_id FROM test_data WHERE test_id = '$a_id' AND course_id = '$ctpId'
                UNION 
                SELECT marks, test_id, clone_id FROM test_cloned_data WHERE test_id = '$a_id' AND course_id = '$ctpId'
            ) AS combine_data
            GROUP BY test_id"
        );
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
