<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$ctp=$_GET['ctp'];
$id=$_GET["id"];
//phase delete
// $check_act = "SELECT * FROM actual where phase='$id'";
// $statement = $connect->prepare($check_act);
// $statement->execute();
//     if($statement->rowCount() > 0)
//         {
//          $result = $statement->fetchAll();
//          foreach($result as $row)
//         {
//             $class_id=$row['id'];
//             //prereuisites delete
//             $del_clo_cls = "DELETE FROM prereuisites WHERE prereuisite='$class_id' and class_name='actual'";
//             $statement_del_clo_cls1 = $connect->prepare($del_clo_cls);
//             $statement_del_clo_cls1->execute();

//              //prereuisite_data delete
//             $del_clo_cls1 = "DELETE FROM prereuisite_data WHERE prereuisite='$class_id' and class_name='actual'";
//             $statement_del_clo_cls11 = $connect->prepare($del_clo_cls1);
//              $statement_del_clo_cls11->execute();

//             //noti delete
//             $noti_del_actual = "DELETE FROM notifications WHERE `data`='$class_id' and `type`='actual'";
//             $statement_noti_del_actual1 = $connect->prepare($noti_del_actual);
//             $statement_noti_del_actual1->execute();

//             //gradsheet delete
//             $gra_act = "DELETE FROM gradesheet WHERE `class_id`='$class_id' and `class`='actual'";
//             $statement_gra_act1 = $connect->prepare($gra_act);
//             $statement_gra_act1->execute();

//             //clone_class delete
//             $clo_class = "DELETE FROM clone_class WHERE `class_id`='$class_id' and `class_name`='actual'";
//             $statement_clo_class1 = $connect->prepare($clo_class);
//             $statement_clo_class1->execute();

//             //clone_class gradsheet delete
//             $clo_class_grads = "DELETE FROM cloned_gradesheet WHERE `class_id`='$class_id' and `class`='actual'";
//             $statement_clo_class_grads1 = $connect->prepare($clo_class_grads);
//             $statement_clo_class_grads1->execute();

//             //warning type delete
//             $war_class_grads = "DELETE FROM warning_category_data WHERE `category_value`='$class_id' and `category`='actual'";
//             $statement_war_class_grads1 = $connect->prepare($war_class_grads);
//             $statement_war_class_grads1->execute();

//              // category type delete
//              $cat_type_actual = "DELETE FROM type_category_data WHERE `category_value`='$class_id' and `category`='actual'";
//              $statement_cat_type_actual1 = $connect->prepare($cat_type_actual);
//              $statement_cat_type_actual1->execute();
                
//                 $check_act_item = "SELECT * FROM item where class='actual' and class_id='$class_id'";
//                 $statement2 = $connect->prepare($check_act_item);
//                 $statement2->execute();
//                     if($statement2->rowCount() > 0)
//                         {
//                         $result2 = $statement2->fetchAll();
//                         foreach($result2 as $row2)
//                         {
//                             $item_id=$row2['id'];
//                             $item_id1=$row2['item'];
//                             //additional item delete
//                             // $del_item = "DELETE FROM additional_task WHERE Item='$item_id1' and `type`='item'";
//                             // $statement_del_item1 = $connect->prepare($del_item);
//                             // $statement_del_item1->execute(); 
//                             // //accomplish task
//                             // $del_item_acc = "DELETE FROM accomplish_task WHERE Item_ac='$item_id1' and `Type`='item'";
//                             // $statement_del_item_acc1 = $connect->prepare($del_item_acc);
//                             // $statement_del_item_acc1->execute(); 
//                             //emergency_data
//                             $del_item_eme = "DELETE FROM emergency_data WHERE item='$item_id1'";
//                             $statement_del_item_eme1 = $connect->prepare($del_item_eme);
//                             $statement_del_item_eme1->execute();
//                             //cloned item delete
//                             $del_items = "DELETE FROM item_clone_gradesheet WHERE item_id='$item_id'";
//                             $statement_del_items_eme1 = $connect->prepare($del_items);
//                             $statement_del_items_eme1->execute();
//                              //item delete
//                              $del_items1 = "DELETE FROM item_gradesheet WHERE item_id='$item_id'";
//                              $statement_del_items1_eme1 = $connect->prepare($del_items1);
//                              $statement_del_items1_eme1->execute();


//                              $check_act_subitem = "SELECT * FROM subitem where item='$item_id1'";
//                              $statement4 = $connect->prepare($check_act_subitem);
//                              $statement4->execute();
//                                  if($statement4->rowCount() > 0)
//                                      {
//                                      $result4 = $statement4->fetchAll();
//                                      foreach($result4 as $row4)
//                                      {
//                                         $subitem_id=$row4['id'];
//                                         $subitem_id1=$row4['subitem'];
//                                          //cloned subitem delete
//                                         $del_subitems = "DELETE FROM subitem_cloned_gradesheet WHERE subitem_id='$subitem_id'";
//                                         $statement_del_subitems_eme1 = $connect->prepare($del_subitems);
//                                         $statement_del_subitems_eme1->execute();
//                                         //subitem delete
//                                         $del_subitems2 = "DELETE FROM subitem_gradesheet WHERE subitem_id='$subitem_id'";
//                                         $statement_del_subitems2_eme1 = $connect->prepare($del_subitems2);
//                                         $statement_del_subitems2_eme1->execute();
//                                         //additional task
//                                         $del_subitem = "DELETE FROM additional_task WHERE Item='$subitem_id1' and `type`='subitem'";
//                                         $statement_del_subitem1 = $connect->prepare($del_subitem);
//                                         $statement_del_subitem1->execute(); 
//                                         //accomplish task
//                                         $del_subitem_acc = "DELETE FROM accomplish_task WHERE Item_ac='$subitem_id1' and `Type`='subitem'";
//                                         $statement_del_subitem_acc1 = $connect->prepare($del_subitem_acc);
//                                         $statement_del_subitem_acc1->execute(); 
                                      
//                                      }
//                                     }
//                               //item delete from table
//                               $del_items2 = "DELETE FROM item WHERE id='$item_id'";
//                               $statement_del_items2_eme2 = $connect->prepare($del_items2);
//                               $statement_del_items2_eme2->execute();
//                         }
//                     }

//             //actual delete
//             $sql1 = "DELETE FROM actual WHERE phase='$id'";
//             $statement1 = $connect->prepare($sql1);
//             $statement1->execute();

//             }
//     }
$sql = "DELETE FROM phase WHERE id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();

// //sim delete
// $sql2 = "DELETE FROM sim WHERE phase='$id'";
// $statement2 = $connect->prepare($sql2);
// $statement2->execute();
// //acedemic
// $sql3 = "DELETE FROM academic WHERE phase='$id'";
// $statement3 = $connect->prepare($sql3);
// $statement3->execute();
// //test delete
// $sql4 = "DELETE FROM test WHERE phase='$id'";
// $statement4 = $connect->prepare($sql4);
// $statement4->execute();

$_SESSION['danger'] = "Phase Deleted Successfully";
         header('Location:next-home.php');
?>
