<?php
include('../config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['itemId'])) {
    $item_id = $_REQUEST['itemId'];
    $fetchuser_id = $_REQUEST['itemName'];
$bac_ground=$_REQUEST['bacColor'];

    $allitem1 = $connect->query("SELECT * FROM item where item = '$item_id'");

    if ($allitem1->rowCount() > 0) {
        $result1 = $allitem1->fetchAll();
        foreach ($result1 as $row1) {
            $tem_ides = $row1['id'];
            $table_class = $row1['class'];
            $table_class_id = $row1['class_id'];
            $q10 = $connect->query("SELECT instructor FROM gradesheet WHERE class_id = '$table_class_id' AND class = '$table_class' AND user_id = '$fetchuser_id'");
            $instructor_ides = $q10->fetchColumn();
            $q11 = $connect->query("SELECT nickname FROM users WHERE id = '$instructor_ides'");
            $instructor_names = $q11->fetchColumn();
            if ($table_class == "actual") {
                $q8 = $connect->query("SELECT symbol FROM $table_class WHERE id = '$table_class_id'");
            }
            if ($table_class == "sim") {
                $q8 = $connect->query("SELECT shortsim FROM $table_class WHERE id = '$table_class_id'");
            }
            $name_cl = $q8->fetchColumn();
            $q3 = $connect->query("SELECT grade FROM `item_gradesheet` WHERE item_id = '$tem_ides' AND grade != '' AND user_id = '$fetchuser_id'");
            $gradee = $q3->fetchColumn();
            $class1 = "";
                                
            if ($gradee == "U") {
                 $class1 = "background-color:#ed4c78;color:white";
               } elseif ($gradee == "F") {
                 $class1 = "background-color:#f5ca99;color:white";
               } elseif ($gradee == "G") {
                 $class1 = "background-color:#71869d;color:white";
               } elseif ($gradee == "V") {
                 $class1 = "background-color:#00c9a7;color:white";
               } elseif ($gradee == "E") {
                 $class1 = "background-color:#377dff;color:white";
               } elseif ($gradee == "N") {
                 $class1 = "background-color:#525d53;color:white";
               } 
            echo '<span style="font-size:large;padding:2px;' . $class1 . ';" data-bs-toggle="tooltip" data-bs-placement="bottom" title="' . $name_cl . '/' . $instructor_names . '">' . $gradee . '</span>';
            $q101 = $connect->query("SELECT instructor FROM cloned_gradesheet WHERE class_id = '$table_class_id' AND class = '$table_class' AND user_id = '$fetchuser_id'");
            $instructor_ides1 = $q101->fetchColumn();
            $q102 = $connect->query("SELECT cloned_id FROM cloned_gradesheet WHERE class_id = '$table_class_id' AND class = '$table_class' AND user_id = '$fetchuser_id'");
            $clone_id = $q102->fetchColumn();
            $q111 = $connect->query("SELECT nickname FROM users WHERE id = '$instructor_ides'");
            $instructor_names1 = $q111->fetchColumn();
            if ($table_class == "actual") {
                $q81 = $connect->query("SELECT symbol FROM $table_class WHERE id = '$table_class_id'");
            }
            if ($table_class == "sim") {
                $q81 = $connect->query("SELECT shortsim FROM $table_class WHERE id = '$table_class_id'");
            }
            $name_cl1 = $q81->fetchColumn();
            $q31 = $connect->query("SELECT grade FROM `item_clone_gradesheet` WHERE item_id = '$tem_ides' AND grade != '' AND user_id = '$fetchuser_id'");
            $gradee1 = $q31->fetchColumn();
            $class2 = "";
                                
            if ($gradee1 == "U") {
                 $class2 = "background-color:#ed4c78;color:white";
               } elseif ($gradee1 == "F") {
                 $class2 = "background-color:#f5ca99;color:white";
               } elseif ($gradee1 == "G") {
                 $class2 = "background-color:#71869d;color:white";
               } elseif ($gradee1 == "V") {
                 $class2 = "background-color:#00c9a7;color:white";
               } elseif ($gradee1 == "E") {
                 $class2 = "background-color:#377dff;color:white";
               } elseif ($gradee1 == "N") {
                 $class2 = "background-color:#525d53;color:white";
               } 
            echo '<span style="font-size:large;padding:2px;' . $class2 . ';" data-bs-toggle="tooltip" data-bs-placement="bottom" title="' . $name_cl1 .'-C'.$clone_id. '/' . $instructor_names1 . '">' . $gradee1 . '</span>';
        }
    }
}



if (isset($_REQUEST['subItemId'])) {
    $std_subi = $_REQUEST['subItemId'];
    $fetchuser_id = $_REQUEST['subItemName'];
    $bac_ground1=$_REQUEST['bacColor'];
    $allsubitem = $connect->query("SELECT * FROM subitem where subitem='$std_subi'");

    if ($allsubitem->rowCount() > 0) {
        $result_sub = $allsubitem->fetchAll();
        foreach ($result_sub as $row_sub) {
            $tem_ides = $row_sub['id'];
            $table_class = $row_sub['class'];
            $table_class_id = $row_sub['class_id'];
            $q10 = $connect->query("SELECT instructor FROM gradesheet WHERE class_id = '$table_class_id' AND class = '$table_class' AND user_id = '$fetchuser_id'");
            $instructor_ides = $q10->fetchColumn();
            $q11 = $connect->query("SELECT nickname FROM users WHERE id = '$instructor_ides'");
            $instructor_names = $q11->fetchColumn();
            if ($table_class == "actual") {
                $q8 = $connect->query("SELECT symbol FROM $table_class WHERE id = '$table_class_id'");
            }
            if ($table_class == "sim") {
                $q8 = $connect->query("SELECT shortsim FROM $table_class WHERE id = '$table_class_id'");
            }
            $name_cl = $q8->fetchColumn();
            $q3 = $connect->query("SELECT grade FROM subitem_gradesheet WHERE subitem_id = '$tem_ides' AND grade!='' AND user_id = '$fetchuser_id'");
            $gradee = $q3->fetchColumn();
            $class1 = "";
                                
            if ($gradee == "U") {
                 $class1 = "background-color:#ed4c78;color:white";
               } elseif ($gradee == "F") {
                 $class1 = "background-color:#f5ca99;color:white";
               } elseif ($gradee == "G") {
                 $class1 = "background-color:#71869d;color:white";
               } elseif ($gradee == "V") {
                 $class1 = "background-color:#377dff;color:white";
               } elseif ($gradee == "E") {
                 $class1 = "background-color:#00c9a7;color:white";
               } elseif ($gradee == "N") {
                 $class1 = "background-color:#525d53;color:white";
               } 
            echo '<span style="font-size:large;padding:2px;' . $class1 . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="' . $name_cl . '/' . $instructor_names . '">' . $gradee . '</span>';

            $q101 = $connect->query("SELECT instructor FROM cloned_gradesheet WHERE class_id = '$table_class_id' AND class = '$table_class' AND user_id = '$fetchuser_id'");
            $instructor_ides1 = $q101->fetchColumn();
            $q111 = $connect->query("SELECT nickname FROM users WHERE id = '$instructor_ides1'");
            $instructor_names1 = $q111->fetchColumn();
            $q102 = $connect->query("SELECT cloned_id FROM cloned_gradesheet WHERE class_id = '$table_class_id' AND class = '$table_class' AND user_id = '$fetchuser_id'");
            $get_clone_ides = $q102->fetchColumn();
            if ($table_class == "actual") {
                $q81 = $connect->query("SELECT symbol FROM $table_class WHERE id = '$table_class_id'");
            }
            if ($table_class == "sim") {
                $q81 = $connect->query("SELECT shortsim FROM $table_class WHERE id = '$table_class_id'");
            }
            $name_cl1 = $q81->fetchColumn();
            $q31 = $connect->query("SELECT grade FROM subitem_cloned_gradesheet WHERE subitem_id = '$tem_ides' AND grade!='' AND user_id = '$fetchuser_id'");
            $gradee1 = $q31->fetchColumn();
            $class2 = "";
                                
            if ($gradee1 == "U") {
                 $class2 = "background-color:#ed4c78;color:white";
               } elseif ($gradee1 == "F") {
                 $class2 = "background-color:#f5ca99;color:white";
               } elseif ($gradee1 == "G") {
                 $class2 = "background-color:#71869d;color:white";
               } elseif ($gradee1 == "V") {
                 $class2 = "background-color:#377dff;color:white";
               } elseif ($gradee1 == "E") {
                 $class2 = "background-color:#00c9a7;color:white";
               } elseif ($gradee1 == "N") {
                 $class2 = "background-color:#525d53;color:white";
               } 
            echo '<span style="font-size:large;padding:2px;' . $class2 . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="' . $name_cl1 ." -C".$get_clone_ides. '/' . $instructor_names1 . '">' . $gradee1 . '</span>';
        }
    }
}


if (isset($_REQUEST['extraItemId'])) {
  $item_id = $_REQUEST['extraItemId'];
  $fetchuser_id = $_REQUEST['itemName'];
$bac_ground=$_REQUEST['bacColor'];

  $allitem1 = $connect->query("SELECT * FROM extra_item_subitem WHERE item_id = '$item_id'");

  if ($allitem1->rowCount() > 0) {
      $result1 = $allitem1->fetchAll();
      foreach ($result1 as $row1) {
          $tem_ides = $row1['item_id'];
          $table_class = $row1['class'];
          $table_class_id = $row1['class_id'];
          $q10 = $connect->query("SELECT instructor FROM gradesheet WHERE class_id = '$table_class_id' AND class = '$table_class' AND user_id = '$fetchuser_id'");
          $instructor_ides = $q10->fetchColumn();
          $q11 = $connect->query("SELECT nickname FROM users WHERE id = '$instructor_ides'");
          $instructor_names = $q11->fetchColumn();
          if ($table_class == "actual") {
              $q8 = $connect->query("SELECT symbol FROM $table_class WHERE id = '$table_class_id'");
          }
          if ($table_class == "sim") {
              $q8 = $connect->query("SELECT shortsim FROM $table_class WHERE id = '$table_class_id'");
          }
          $name_cl = $q8->fetchColumn();
          $q3 = $connect->query("SELECT grade FROM `extra_item_subitem_grades` WHERE item_id = '$tem_ides ' AND grade != '' AND user_id = '$fetchuser_id'");
          $gradee = $q3->fetchColumn();
          $class1 = "";

                              
          if ($gradee == "U") {
               $class1 = "background-color:#ed4c78;color:white";
             } elseif ($gradee == "F") {
               $class1 = "background-color:#f5ca99;color:white";
             } elseif ($gradee == "G") {
               $class1 = "background-color:#71869d;color:white";
             } elseif ($gradee == "V") {
               $class1 = "background-color:#377dff;color:white";
             } elseif ($gradee == "E") {
               $class1 = "background-color:#00c9a7;color:white";
             } elseif ($gradee == "N") {
               $class1 = "background-color:#525d53;color:white";
             } 
          echo '<span style="font-size:large;padding:2px;' . $class1 . ';" data-bs-toggle="tooltip" data-bs-placement="bottom" title="' . $name_cl . '/' . $instructor_names . '">' . $gradee . '</span>';
          $q101 = $connect->query("SELECT instructor FROM gradesheet WHERE class_id = '$table_class_id' AND class = '$table_class' AND user_id = '$fetchuser_id'");
          $instructor_ides1 = $q101->fetchColumn();
          $q111 = $connect->query("SELECT nickname FROM users WHERE id = '$instructor_ides'");
          $instructor_names1 = $q111->fetchColumn();
          if ($table_class == "actual") {
              $q81 = $connect->query("SELECT symbol FROM $table_class WHERE id = '$table_class_id'");
          }
          if ($table_class == "sim") {
              $q81 = $connect->query("SELECT shortsim FROM $table_class WHERE id = '$table_class_id'");
          }
          $name_cl1 = $q81->fetchColumn();
          $q31 = $connect->query("SELECT grade FROM `extra_item_subitem_grades_cl` WHERE item_id = '$tem_ides' AND grade != '' AND user_id = '$fetchuser_id'");
          $gradee1 = $q31->fetchColumn();
          $class2 = "";
                              
          if ($gradee1 == "U") {
               $class2 = "background-color:#ed4c78;color:white";
             } elseif ($gradee1 == "F") {
               $class2 = "background-color:#f5ca99;color:white";
             } elseif ($gradee1 == "G") {
               $class2 = "background-color:#71869d;color:white";
             } elseif ($gradee1 == "V") {
               $class2 = "background-color:#377dff;color:white";
             } elseif ($gradee1 == "E") {
               $class2 = "background-color:#00c9a7;color:white";
             } elseif ($gradee1 == "N") {
               $class2 = "background-color:#525d53;color:white";
             } 
          echo '<span style="font-size:large;padding:2px;' . $class2 . ';" data-bs-toggle="tooltip" data-bs-placement="bottom" title="' . $name_cl1  . $instructor_names1 . '">' . $gradee1 . '</span>';
      }
  }
}