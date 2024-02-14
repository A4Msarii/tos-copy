<?php
ob_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';


$stud_db_id = $_REQUEST['stud_db_id'];
$phases_id = $_REQUEST['phases_id'];
$course_id = $_REQUEST['course_id'];
$class_id = $_REQUEST['class_id'];
$class_name = $_REQUEST['class_name'];
$overall_grade = $_REQUEST['overall_grade'];
$overall_grade_per = $_REQUEST['overall_grade_per'];
$overall_data = $_REQUEST['overall_data'];
$comment = $_REQUEST['comment'];
$hashoff=$_REQUEST['hashoff'];
$hashoff_value=$_REQUEST['hashoff_value'];
 $instructor_id = $_REQUEST['instructor_ides'];

echo $instructor_id;
$ac_id= $_REQUEST['ac_id'];
 $add_clear   = $_REQUEST['add_clear'];
$itemd=$_REQUEST['item'];
$subitemd=$_REQUEST['subitem'];
$type_item="";
$item_types=$_REQUEST['item_types'];
$item_ids=$_REQUEST['item_ids'];
$grades1=$_REQUEST['grades1'];
$grad_id=$_REQUEST['grad_id'];
$add_list=$_REQUEST['add_list'];
 $add_list1=$_REQUEST['add_list1'];
$add_list_acc=$_REQUEST['add_list_acc'];
$add_list_acc1=$_REQUEST['add_list_acc1'];

                                ##############################
                                //hashoff 
                                foreach($hashoff as $hashoffs=>$val){
                                        
                                    $hashoff_values=$hashoff_value[$hashoffs];
                                    echo $hashoff_values;
                                    $sql51 = "SELECT count(*) FROM `gradsheet_final_hashoff` WHERE user_id='$stud_db_id' AND class_id='$class_id' and class_name='$class_name' and hash_off='$val'";
                                    $result51 = $connect->prepare($sql51);
                                    $result51->execute();
                                    $number_of_rows11 = $result51->fetchColumn();
                                    if ($number_of_rows11 > 0) {
                                        $sql = "UPDATE `gradsheet_final_hashoff`
                                        SET hash_off_value='$hashoff_values'
                                        WHERE user_id='$stud_db_id' AND class_id='$class_id' and class_name='$class_name' and hash_off='$val'";
                                        $statement = $connect->prepare($sql);
                                        $statement->execute();
                                    }else{
                                        $sql_hash = "INSERT INTO  gradsheet_final_hashoff (user_id,class_id,class_name,hash_off,hash_off_value) VALUES ('$stud_db_id','$class_id','$class_name','$val','$hashoff_values')";
                                        $statement_hash = $connect->prepare($sql_hash);
                                    $statement_hash->execute();
                                    }
                                }                           
                         //####################################
                            //extra item gradess
                            foreach($item_types as $ie=>$index){
                            $item_get=$item_ids[$ie];
                            $grades=$index.$item_get;
                            $finals=$grades1[$grades];
                            
                            $sql15 = "SELECT count(*) FROM `extra_item_subitem_grades` WHERE user_id='$stud_db_id' AND item_id='$item_get' and type='$index'";
                            $result15 = $connect->prepare($sql15);
                            $result15->execute();
                            $number_of_rows11 = $result15->fetchColumn();
                            if ($number_of_rows11 > 0) {
                                $sql12 = "UPDATE `extra_item_subitem_grades`
                                            SET  `grade`='$finals'
                                            WHERE user_id='$stud_db_id' AND item_id='$item_get' and type='$index'";
                            
                                $statement12 = $connect->prepare($sql12);
                                $statement12->execute();
                            } else {
                                $sql_b1 = "INSERT INTO extra_item_subitem_grades (user_id,item_id,grade,date,type) VALUES ('$stud_db_id','$item_get','$finals',NOW(),'$index')";
                                $statement_b1 = $connect->prepare($sql_b1);
                                $statement_b1->execute();
                            }
                            }
                            if(isset($grad_id)){
                                foreach($itemd as $items){
                                    $sql522 = "SELECT count(*) FROM `extra_item_subitem` WHERE item_id='$items' AND data_type='item' and user_id='$stud_db_id' and grade_id='$grad_id'";
                                    $result522 = $connect->prepare($sql522);
                                    $result522->execute();
                                    $number_of_rows122 = $result522->fetchColumn();
                                    if($number_of_rows122==0){
                                    $sql_hash = "INSERT INTO  extra_item_subitem (item_id,user_id,class_id,class,data_type,grade_id) VALUES ('$items','$stud_db_id','$class_id','$class_name','item','$grad_id')";
                                    $statement_hash = $connect->prepare($sql_hash);
                                    $statement_hash->execute();
                                    }
                                }
                               
                                foreach($subitemd as $subitems){
                                    $sql521 = "SELECT count(*) FROM `extra_item_subitem` WHERE item_id='$subitems' AND data_type='subitem' and user_id='$stud_db_id' and grade_id='$grad_id'";
                                    $result521 = $connect->prepare($sql521);
                                    $result521->execute();
                                    $number_of_rows121 = $result521->fetchColumn();
                                    if($number_of_rows121==0){
                                    echo $sql_hash1 = "INSERT INTO  extra_item_subitem (item_id,user_id,class_id,class,data_type,grade_id) VALUES ('$subitems','$stud_db_id','$class_id','$class_name','subitem','$grad_id')";
                                    $statement_hash1 = $connect->prepare($sql_hash1);
                                    $statement_hash1->execute();
                                    }
                                }
                            }

                            //additional accomlish clear
                            foreach($add_clear as $ides){
                                $query_ad="UPDATE `additional_task`
                                SET `assign_class`='$class_id',`assign_class_table`='$class_name',`assign_class_table_cloneid`=NULL
                                WHERE `ad_id`='$ides'";
                                $statement_ad = $connect->prepare($query_ad);
                                $statement_ad->execute();
                                
                                }
                                foreach($ac_id as $ides1){
                                    $query_ac="UPDATE `accomplish_task`
                                    SET `assign_class`='$class_id',`assign_class_table`='$class_name',`assign_class_table_cloneid`=NULL
                                    WHERE `ac_id`='$ides1'";
                                    
                                    $statement_ac = $connect->prepare($query_ac);
                                    $statement_ac->execute();
                                    }
                                    //additional adding
                                    if(isset($grad_id)){
                                        
                                        if(isset($add_list)){
                                            foreach($add_list as $data_id){
                                            $sql_add = "INSERT INTO additional_task(Item,gradesheet_id,Stud_id,type) VALUES ('$data_id','$grad_id','$stud_db_id','item')";
                                            $statement_add = $connect->prepare($sql_add);
                                            $statement_add->execute();
                                    }
                                   }
                                     if(isset($add_list1)){
                                    foreach($add_list1 as $data_id1){
                                        $sql_add1 = "INSERT INTO additional_task(Item,gradesheet_id,Stud_id,type) VALUES ('$data_id1','$grad_id','$stud_db_id','subitem')";
                                        $statement_add1 = $connect->prepare($sql_add1);
                                        $statement_add1->execute();
                                        }
                                    }
                                        if(isset($add_list_acc)){
                                        foreach($add_list_acc as $data_id2){
                                        $sql_add2 = "INSERT INTO accomplish_task(Item_ac,gradsheet_id,Stud_ac,Type) VALUES ('$data_id2','$grad_id','$stud_db_id','item')";
                            
                                        $statement_add2 = $connect->prepare($sql_add2);
                                    
                                        $statement_add2->execute();
                                    }
                                }
                                        if(isset($add_list_acc1)){   
                                        foreach($add_list_acc1 as $data_id3){
                                                $sql_add3 = "INSERT INTO accomplish_task(Item_ac,gradsheet_id,Stud_ac,Type) VALUES ('$data_id3','$grad_id','$stud_db_id','subitem')";
                            
                                                $statement_add3 = $connect->prepare($sql_add3);
                                            
                                                $statement_add3->execute();
                                            }
                                        }
                                    }
// $add_clear   = $_REQUEST['add_clear'];

$q6 = "SELECT * FROM  warning_category_data where category='phase' and category_phase='actual' and group_id!='0' and grade='$overall_grade'group by group_id ";
$st6 = $connect->prepare($q6);
$st6->execute();

if ($st6->rowCount() > 0) {
    $re6 = $st6->fetchAll();
    foreach ($re6 as $row6) {
        $cat_id1=$row6['id'];
         $group_ides = $row6['group_id'];
        $warning_value1 = $row6['warning'];
        $sql114 = "SELECT count(`id`) as check_exist FROM notifications WHERE user_id='$stud_db_id' and data='$warning_value1' and extra_data='threshold'";
        $res114 = $connect->query($sql114);
        $get_count114 = $res114->fetchColumn();
        $sql115 = "SELECT count(`id`) as check_exist_count FROM notifications WHERE user_id='$stud_db_id' and data='$warning_value1' and extra_data='reached_cout'";
        $res115 = $connect->query($sql115);
        $get_count115 = $res115->fetchColumn();
       
        $q7 = "SELECT * FROM warning_category_data where group_id='$group_ides' group by id";
        $st7 = $connect->prepare($q7);
        $st7->execute();
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count7 = 0;
        $count5 = 0;
        $count4 = 0;
        $count6 = 0;
        $count8 = 0;
        $count9 = 0;
        if ($st7->rowCount() > 0) {
            $re7 = $st7->fetchAll();
            foreach ($re7 as $row3) {
                $row3['id'];
                $set_id1 = $row3['warning'];
                $countss1 = $row3['count'];
                $tr_countss1 = $row3['threshold'];
                 $table_value1 = $row3['category_value'];
                $only_for_phase1 = $row3['category_phase'];
                $table1 = $row3['category'];
                if ($table1 == "actual") {
                    if ($table_value1 == "all") {
                        $sql31 = "SELECT count(`over_all_grade`) as id_count2 FROM gradesheet WHERE user_id='$stud_db_id' and course_id='$course_id' and class='actual' and over_all_grade='$overall_grade'";
                        $res31 = $connect->query($sql31);
                        $get_counts = $res31->fetchColumn();
                        $sql32 = "SELECT count(`over_all_grade`) as id_count4 FROM cloned_gradesheet WHERE user_id='$stud_db_id' and course_id='$course_id' and class='actual' and over_all_grade='$overall_grade'";
                        $res132 = $connect->query($sql32);
                        $get_counts1 = $res132->fetchColumn();
                        $count1 = $count1 + $get_counts + $get_counts1;
                    }
                    if ($table_value1 != "all") {
                        $sql33 = "SELECT count(`over_all_grade`) as id_count3 FROM gradesheet WHERE user_id='$stud_db_id' and class='actual' and over_all_grade='$overall_grade' and class_id='$table_value1'";
                        $res33 = $connect->query($sql33);
                        $get_counts2 = $res33->fetchColumn();
                        $sql34 = "SELECT count(`over_all_grade`) FROM cloned_gradesheet WHERE user_id='$stud_db_id' and class='actual' and over_all_grade='$overall_grade' and class_id='$table_value1'";
                        $res34 = $connect->query($sql34);
                        $get_counts3 = $res34->fetchColumn();
                        $count2 = $count2 + $get_counts2 + $get_counts3;
                    }
                }
                if ($table1 == "sim") {
                    if ($table_value1 == "all") {
                        $sql35 = "SELECT count(`over_all_grade`) as id_count2 FROM gradesheet WHERE user_id='$stud_db_id' and course_id='$course_id' and class='sim' and over_all_grade='$overall_grade'";
                        $res35 = $connect->query($sql35);
                        $get_counts4 = $res35->fetchColumn();
                        $sql36 = "SELECT count(`over_all_grade`) FROM cloned_gradesheet WHERE user_id='$stud_db_id' and course_id='$course_id' and class='sim' and over_all_grade='$overall_grade'";
                        $res36 = $connect->query($sql36);
                        $get_counts5 = $res36->fetchColumn();
                        $count3 = $count3 + $get_counts4 + $get_counts5;
                    }
                    if ($table_value1 != "all") {
                        $sql37 = "SELECT count(`over_all_grade`) as id_count3 FROM gradesheet WHERE user_id='$stud_db_id' and class='sim' and over_all_grade='$overall_grade' and class_id='$table_value1'";
                        $res37 = $connect->query($sql37);
                        $get_counts6 = $res37->fetchColumn();
                        $sql38 = "SELECT count(`over_all_grade`) FROM cloned_gradesheet WHERE user_id='$stud_db_id' and class='sim' and over_all_grade='$overall_grade' and class_id='$table_value1'";
                        $res38 = $connect->query($sql38);
                        $get_counts7 = $res38->fetchColumn();
                        $count4 = $count4 + $get_counts6 + $get_counts7;
                    }
                }
                if ($table1 == "phase") {
                    if ($table_value1 == "all" && $only_for_phase1 == "all") {
                        $sql39 = "SELECT count(`over_all_grade`) as id_count2 FROM gradesheet WHERE user_id='$stud_db_id' and course_id='$course_id' and over_all_grade='$overall_grade'";
                        $res39 = $connect->query($sql39);
                        $get_counts8 = $res39->fetchColumn();
                        $sql40 = "SELECT count(`over_all_grade`) FROM cloned_gradesheet WHERE user_id='$stud_db_id' and course_id='$course_id' and over_all_grade='$overall_grade'";
                        $res40 = $connect->query($sql40);
                        $get_counts9 = $res40->fetchColumn();
                        $count5 = $count5 + $get_counts8 + $get_counts9;
                    }
                    if ($table_value1 == "all" && $only_for_phase1 == "actual") {
                        $sql41 = "SELECT count(`over_all_grade`) as id_count3 FROM gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='actual' and course_id='$course_id'";
                        $res41 = $connect->query($sql41);
                        $get_counts10 = $res41->fetchColumn();
                        $sql42 = "SELECT count(`over_all_grade`) as id_count3 FROM cloned_gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='actual' and course_id='$course_id'";
                        $res42 = $connect->query($sql42);
                        $get_counts11 = $res42->fetchColumn();
                        $count6 = $count6 + $get_counts10 + $get_counts11;
                    }
                    if ($table_value1 == "all" && $only_for_phase1 == "sim") {
                        $sql43 = "SELECT count(`over_all_grade`) as id_count3 FROM gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='sim' and course_id='$course_id'";
                        $res43 = $connect->query($sql43);
                        $get_counts12 = $res43->fetchColumn();
                        $sql44 = "SELECT count(`over_all_grade`) as id_count3 FROM cloned_gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='sim' and course_id='$course_id'";
                        $res44 = $connect->query($sql44);
                        $get_counts13 = $res44->fetchColumn();
                        $count7 = $count7 + $get_counts12 + $get_counts13;
                    }
                    if ($table_value1 != "all" && $only_for_phase1 == "actual") {
                         $sql45 = "SELECT count(`over_all_grade`) as id_count3 FROM gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='actual' and phase_id='$table_value1'";
                        $res45 = $connect->query($sql45);
                          $get_counts14 = $res45->fetchColumn();
                        $sql46 = "SELECT count(`over_all_grade`) as id_count3 FROM cloned_gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='actual' and phase_id='$table_value1'";
                        $res46 = $connect->query($sql46);
                        $get_counts15 = $res46->fetchColumn();
                        $count8 =$count8+ $get_counts14 + $get_counts15;
                    }
                    if ($table_value1 != "all" && $only_for_phase1 == "sim") {
                        $sql47 = "SELECT count(`over_all_grade`) as id_count3 FROM gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='sim' and phase_id='$table_value1'";
                        $res47 = $connect->query($sql47);
                        $get_counts16 = $res47->fetchColumn();
                        $sql48 = "SELECT count(`over_all_grade`) as id_count3 FROM cloned_gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='sim' and phase_id='$table_value1'";
                        $res48 = $connect->query($sql48);
                        $get_counts17 = $res48->fetchColumn();
                        $count9 = $count9+ $get_counts16 + $get_counts17;
                    }
                }

            }

        }
          $final_count = $count1 + $count2 + $count3 + $count7 + $count5 + $count4 + $count6 + $count8 + $count9+1;
      
        if ($final_count >= $tr_countss1 && $tr_countss1 != 0) {
            if ($get_count114 == 0) {
                $msg = "threshold";
                send_noti($stud_db_id, $set_id1, $instructor_id, $msg, $cat_id1);
            }
        }
        if ($final_count >= $countss1 && $countss1 != 0) {
            if ($get_count115 == 0) {
                $msg = "reached_cout";
                send_noti($stud_db_id, $set_id1, $instructor_id, $msg, $cat_id1);
            }
        }
    }

}

$q5 = "SELECT * FROM warning_data where ctp='$course_id'";
$st5 = $connect->prepare($q5);
$st5->execute();

if ($st5->rowCount() > 0) {
    $re5 = $st5->fetchAll();
    foreach ($re5 as $row5) {
        $warning_value = $row5['id'];
        $sql4 = "SELECT count(`id`) as check_exist FROM notifications WHERE user_id='$stud_db_id' and data='$warning_value' and extra_data='threshold'";
        $res4 = $connect->query($sql4);
        $get_count4 = $res4->fetchColumn();
        $sql5 = "SELECT count(`id`) as check_exist_count FROM notifications WHERE user_id='$stud_db_id' and data='$warning_value' and extra_data='reached_cout'";
        $res5 = $connect->query($sql5);
        $get_count5 = $res5->fetchColumn();
        $q2 = "SELECT * FROM warning_category_data where grade='$overall_grade' and warning='$warning_value' and group_id='0'";
        $st2 = $connect->prepare($q2);
        $st2->execute();

        if ($st2->rowCount() > 0) {
            $re2 = $st2->fetchAll();
            foreach ($re2 as $row2) {
                $cat_id = $row2['id'];
                $set_id = $row2['warning'];
                $countss = $row2['count'];
                $tr_countss = $row2['threshold'];
                $table_value = $row2['category_value'];
                $only_for_phase = $row2['category_phase'];
                $table = $row2['category'];
                if ($table == "actual" && $class_name == "actual") {
                    if ($table_value == "all") {

                        $sql = "SELECT count(`over_all_grade`) as id_count2 FROM gradesheet WHERE user_id='$stud_db_id' and course_id='$course_id' and class='actual' and over_all_grade='$overall_grade'";
                        $res = $connect->query($sql);
                        $get_count = $res->fetchColumn();
                        $sql1 = "SELECT count(`over_all_grade`) as id_count4 FROM cloned_gradesheet WHERE user_id='$stud_db_id' and course_id='$course_id' and class='actual' and over_all_grade='$overall_grade'";
                        $res1 = $connect->query($sql1);
                        $get_count1 = $res1->fetchColumn();
                        $get_count = $get_count + 1 + $get_count1;
                        if ($get_count >= $tr_countss && $tr_countss != 0) {
                            if ($get_count4 == 0) {
                                $msg = "threshold";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                        if ($get_count >= $countss && $countss != 0) {
                            if ($get_count5 == 0) {
                                $msg = "reached_cout";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                    }
                    if ($table_value != "all") {

                        $sql10 = "SELECT count(`over_all_grade`) as id_count3 FROM gradesheet WHERE user_id='$stud_db_id' and class='actual' and over_all_grade='$overall_grade' and class_id='$table_value'";
                        $res10 = $connect->query($sql10);
                        $get_count10 = $res10->fetchColumn();
                        $sql1 = "SELECT count(`over_all_grade`) FROM cloned_gradesheet WHERE user_id='$stud_db_id' and class='actual' and over_all_grade='$overall_grade' and class_id='$table_value'";
                        $res1 = $connect->query($sql1);
                        $get_count2 = $res1->fetchColumn();
                        $get_count10 = $get_count2 + 1 + $get_count10;
                        if ($get_count10 >= $tr_countss && $tr_countss != 0) {
                            if ($get_count4 == 0) {
                                $msg = "threshold";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                         if ($get_count10 >= $countss && $countss != 0) {
                            if ($get_count5 == 0) {
                                $msg = "reached_cout";
                                 var_dump($cat_id);
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                    }
                }

                if ($table == "sim" && $class_name == "sim") {
                    if ($table_value == "all") {

                        $sql11 = "SELECT count(`over_all_grade`) as id_count2 FROM gradesheet WHERE user_id='$stud_db_id' and course_id='$course_id' and class='sim' and over_all_grade='$overall_grade'";
                        $res11 = $connect->query($sql11);
                        $get_count11 = $res11->fetchColumn();
                        $sql21 = "SELECT count(`over_all_grade`) FROM cloned_gradesheet WHERE user_id='$stud_db_id' and course_id='$course_id' and class='sim' and over_all_grade='$overall_grade'";
                        $res21 = $connect->query($sql21);
                        $get_count21 = $res21->fetchColumn();
                        $get_count11 = $get_count11 + 1 + $get_count21;
                        if ($get_count11 >= $tr_countss) {
                            if ($get_count4 == 0 && $tr_countss != 0) {
                                $msg = "threshold";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        } 
                         if ($get_count11 >= $countss && $countss != 0) {
                            if ($get_count5 == 0) {
                                $msg = "reached_cout";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                    }
                    if ($table_value != "all") {

                        $sql12 = "SELECT count(`over_all_grade`) as id_count3 FROM gradesheet WHERE user_id='$stud_db_id' and class='sim' and over_all_grade='$overall_grade' and class_id='$table_value'";
                        $res12 = $connect->query($sql12);
                        $get_count12 = $res12->fetchColumn();
                        $sql22 = "SELECT count(`over_all_grade`) FROM cloned_gradesheet WHERE user_id='$stud_db_id' and class='sim' and over_all_grade='$overall_grade' and class_id='$table_value'";
                        $res22 = $connect->query($sql22);
                        $get_count22 = $res22->fetchColumn();
                        $get_count12 = $get_count12 + 1 + $get_count22;
                        if ($get_count12 >= $tr_countss && $tr_countss != 0) {
                            if ($get_count4 == 0) {
                                $msg = "threshold";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                        if ($get_count12 >= $countss && $countss != 0) {
                            if ($get_count5 == 0) {
                                $msg = "reached_cout";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                    }
                }
                if ($table == "phase") {
                    if ($table_value == "all" && $only_for_phase == "all") {

                        $sql13 = "SELECT count(`over_all_grade`) as id_count2 FROM gradesheet WHERE user_id='$stud_db_id' and course_id='$course_id' and over_all_grade='$overall_grade'";
                        $res13 = $connect->query($sql13);
                        $get_count13 = $res13->fetchColumn();
                        $sql23 = "SELECT count(`over_all_grade`) FROM cloned_gradesheet WHERE user_id='$stud_db_id' and course_id='$course_id' and over_all_grade='$overall_grade'";
                        $res23 = $connect->query($sql23);
                        $get_count23 = $res23->fetchColumn();
                        $get_count13 = $get_count13 + 1 + $get_count23;
                        if ($get_count13 >= $tr_countss && $tr_countss != 0) {
                            if ($get_count4 == 0) {
                                $msg = "threshold";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                        if ($get_count13 >= $countss && $countss != 0) {
                            if ($get_count5 == 0) {
                                $msg = "reached_cout";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                    }

                    if ($table_value == "all" && $only_for_phase == "actual" && $class_name == "actual") {

                        $sql14 = "SELECT count(`over_all_grade`) as id_count3 FROM gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='actual' and course_id='$course_id'";

                        $res14 = $connect->query($sql14);
                        $get_count14 = $res14->fetchColumn();
                        $sql24 = "SELECT count(`over_all_grade`) as id_count3 FROM cloned_gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='actual' and course_id='$course_id'";
                        $res24 = $connect->query($sql24);
                        $get_count24 = $res24->fetchColumn();
                        $get_count14 = $get_count14 + 1 + $get_count24;
                        if ($get_count14 >= $tr_countss && $tr_countss != 0) {
                            if ($get_count4 == 0) {
                                $msg = "threshold";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                        if ($get_count14 >= $countss && $countss != 0) {
                            if ($get_count5 == 0) {
                                $msg = "reached_cout";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                    }

                    if ($table_value == "all" && $only_for_phase == "sim" && $class_name == "sim") {

                        $sql15 = "SELECT count(`over_all_grade`) as id_count3 FROM gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='sim' and course_id='$course_id'";

                        $res15 = $connect->query($sql15);
                        $get_count15 = $res15->fetchColumn();
                        $sql25 = "SELECT count(`over_all_grade`) as id_count3 FROM cloned_gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='sim' and course_id='$course_id'";
                        $res25 = $connect->query($sql25);
                        $get_count25 = $res25->fetchColumn();
                        $get_count15 = $get_count15 + 1 + $get_count25;
                        if ($get_count15 >= $tr_countss && $tr_countss != 0) {
                            if ($get_count4 == 0) {
                                $msg = "threshold";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                        if ($get_count15 >= $countss && $countss != 0) {
                            if ($get_count5 == 0) {
                                $msg = "reached_cout";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                    }

                    if ($table_value != "all" && $only_for_phase == "actual" && $class_name == "actual") {

                        $sql16 = "SELECT count(`over_all_grade`) as id_count3 FROM gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='actual' and phase_id='$table_value'";
                        $res16 = $connect->query($sql16);
                        $get_count16 = $res16->fetchColumn();
                        $sql26 = "SELECT count(`over_all_grade`) as id_count3 FROM cloned_gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='actual' and phase_id='$table_value'";
                        $res26 = $connect->query($sql26);
                         $get_count26 = $res26->fetchColumn();
                        $get_count16 = $get_count16 + 1 + $get_count26;
                        if ($get_count16 >= $tr_countss && $tr_countss != 0) {
                            if ($get_count4 == 0) {
                                $msg = "threshold";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                        if ($get_count16 >= $countss && $countss != 0) {
                            if ($get_count5 == 0) {
                                $msg = "reached_cout";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                    }

                    if ($table_value != "all" && $only_for_phase == "sim" && $class_name == "sim") {

                        $sql17 = "SELECT count(`over_all_grade`) as id_count3 FROM gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='sim' and phase_id='$table_value'";

                        $res17 = $connect->query($sql17);
                        $get_count17 = $res17->fetchColumn();
                        $sql27 = "SELECT count(`over_all_grade`) as id_count3 FROM cloned_gradesheet WHERE user_id='$stud_db_id' and over_all_grade='$overall_grade' and class='sim' and phase_id='$table_value'";
                        $res27 = $connect->query($sql27);
                        $get_count27 = $res27->fetchColumn();
                        $get_count17 = $get_count17 + 1 + $get_count27;
                        if ($get_count17 >= $tr_countss && $tr_countss != 0) {
                            if ($get_count4 == 0) {
                                $msg = "threshold";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                        if ($get_count17 >= $countss && $countss != 0) {
                            if ($get_count5 == 0) {
                                $msg = "reached_cout";
                                send_noti($stud_db_id, $set_id, $instructor_id, $msg, $cat_id);
                            }
                        }
                    }
                }

            }
        }

    }
}

function send_noti($stud_db_id, $get_id, $instructor_id, $getmsg, $cat_id)
{
    global $class_id;
    global $class_name;
   include ROOT_PATH . 'includes/connect.php';
  $notification2 = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,class_id,class_name,date)
     VALUES ('$stud_db_id','$stud_db_id','$cat_id','$get_id','$getmsg','$class_id','$class_name',CURRENT_TIMESTAMP)";
    $statement2 = $connect->prepare($notification2);
    $statement2->execute();
    $notification3 = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,class_id,class_name,date)
     VALUES ('$stud_db_id','$instructor_id','$cat_id','$get_id','$getmsg','$class_id','$class_name',CURRENT_TIMESTAMP)";
    $statement3 = $connect->prepare($notification3);
    $statement3->execute();
   
}


$update_read = "UPDATE `notifications` SET `is_read` = 1 WHERE `user_id`='$stud_db_id' and `type`='$class_name' and `data`='$class_id' and extra_data='is selected to fill gradsheet of'";
$update_statement = $connect->prepare($update_read);
$update_statement->execute();

$itemd=$_REQUEST['item'];
$subitemd=$_REQUEST['subitem'];



echo $get_data = "SELECT * FROM gradesheet where user_id='$stud_db_id' AND phase_id='$phases_id' AND course_id='$course_id' AND class_id='$class_id' AND class='$class_name'";
$get_datast = $connect->prepare($get_data);
$get_datast->execute();

if ($get_datast->rowCount() > 0) {
    
    $notification = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,date) VALUES ('$instructor_id','$stud_db_id','$class_name','$class_id','filled your gradsheet for',CURRENT_TIMESTAMP)";
    $statement = $connect->prepare($notification);
    $statement->execute();
    

        $status='1';
    
        $query = "UPDATE `gradesheet`
        SET `over_all_grade` = :overall_grade,
            `over_all_grade_per` = :overall_grade_per,
            `over_all_comment` = :overall_data,
            `comments` = :comment,
            `status` = :status1,
            `instructor` = :inst
        WHERE user_id = :stud_db_id
          AND phase_id = :phases_id
          AND course_id = :course_id
          AND class_id = :class_id
          AND class = :class_name;";
                

 

    // Prepare the SQL statement
    $statement = $connect->prepare($query);

 

    // Bind the parameters
    $statement->bindParam(':overall_grade', $overall_grade);
    $statement->bindParam(':overall_grade_per', $overall_grade_per);
    $statement->bindParam(':overall_data', $overall_data);
    $statement->bindParam(':comment', $comment);
    $statement->bindParam(':status1',$status);
    $statement->bindParam(':stud_db_id', $stud_db_id);
    $statement->bindParam(':phases_id', $phases_id);
    $statement->bindParam(':course_id', $course_id);
    $statement->bindParam(':class_id', $class_id);
    $statement->bindParam(':class_name', $class_name);
    $statement->bindParam(':inst', $instructor_id);
 

    // Execute the prepared statement
    $statement->execute();
    $value = array();
    $value1 = array();
    $value2 = array();
    $std_idie = $_REQUEST['std_idies']; //ite id from item table
    
    $std_sub = $_REQUEST['std_sub']; //item or subitem

    $items_id = $_REQUEST['items_id'];

    $grade = $_REQUEST['grade'];
    
    
    
    foreach ($std_idie as $index => $values) {
        $values;
        $item_ids = $items_id[$index];
        $subjects = $std_sub[$index];
        $grade_c = $subjects . $values;
        $final_grade = $grade[$grade_c];
    if ($subjects == "item") {

            $sql2 = "SELECT count(*) FROM `item_gradesheet` WHERE user_id='$stud_db_id' AND item_id='$item_ids'";
            $result3 = $connect->prepare($sql2);
            $result3->execute();
            $number_of_rows = $result3->fetchColumn();
            if ($number_of_rows > 0) {
                $sql = "UPDATE `item_gradesheet`
                             SET  `grade`='$final_grade'
                             WHERE user_id='$stud_db_id' AND item_id='$item_ids'";
                // echo $sql;
                $statement = $connect->prepare($sql);
                $statement->execute();
            } else {
                $sql_a = "INSERT INTO  item_gradesheet (user_id,item_id,grade,date) VALUES ('$stud_db_id','$item_ids','$final_grade',NOW())";
                // echo $sql_a;
                $statement_a = $connect->prepare($sql_a);
                $statement_a->execute();
            }
        } else {
            $sql5 = "SELECT count(*) FROM `subitem_gradesheet` WHERE user_id='$stud_db_id' AND subitem_id='$item_ids'";
            $result5 = $connect->prepare($sql5);
            $result5->execute();
            $number_of_rows1 = $result5->fetchColumn();
            if ($number_of_rows1 > 0) {
                $sql1 = "UPDATE `subitem_gradesheet`
                               SET  `grade`='$final_grade'
                               WHERE user_id='$stud_db_id' AND subitem_id='$item_ids'";
                // echo $sql1;
                $statement1 = $connect->prepare($sql1);
                $statement1->execute();
            } else {
                $sql_b = "INSERT INTO subitem_gradesheet (user_id,subitem_id,grade,date) VALUES ('$stud_db_id','$item_ids','$final_grade',NOW())";
                //  echo $sql_b;
                $statement_b = $connect->prepare($sql_b);
                $statement_b->execute();
            }
        }
    }
    echo "<script>window.close();</script>";

    
} else {
    // $error = "<div class='alert alert-warning'>Please select above details first..</div>";
    $_SESSION['info'] = "Please Select Above Details First..";
    header("location: itemsubitem.php");
    exit;

}

    ?> 