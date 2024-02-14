<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 $no_id=$_REQUEST['id'];
 $query_warning_data = "SELECT * FROM notifications where id='$no_id'";
 $statement_warning_data = $connect->prepare($query_warning_data);
 $statement_warning_data->execute();
 if ($statement_warning_data->rowCount() > 0) {
   $result_warning_Data = $statement_warning_data->fetchAll();

   foreach ($result_warning_Data as $row_data) {
      $no_id=$row_data['id'];
      $type=$row_data['type'];
      $warning=$row_data['data'];
      $fetchuser_id=$row_data['user_id'];
    }
}
 
$feth_details_class = "SELECT * FROM new_warnning where notificationId='$no_id'";
                                  $feth_details_classst = $connect->prepare($feth_details_class);
                                  $feth_details_classst->execute();
                                  if ($feth_details_classst->rowCount() > 0) {
                                    $sns1='1';
                                    $result_warning_Datast = $feth_details_classst->fetchAll();
                                    echo '<span class="text-dark" style="font-weight:bold;list-style-type: circle; font-size:large;">&#8226; Class/Test : </span>';
                                    foreach ($result_warning_Datast as $row_data1) {
                                      $table_name1=$row_data1['type'];
                                      $symbol_id1=$row_data1['classId'];
                                      if ($table_name1 == "actual") {
                                        $q = $connect->prepare("SELECT symbol FROM $table_name1 WHERE id=?");
                                      } else if ($table_name1 == "sim") {
                                        $q = $connect->prepare("SELECT shortsim FROM $table_name1 WHERE id=?");
                                      } else if ($table_name1 == "test") {
                                        $q = $connect->prepare("SELECT shorttest FROM $table_name1 WHERE id=?");
                                      }
                                      $q->execute([$symbol_id1]);
                                      $name = $q->fetchColumn();
                                      
                                      echo '<span style="color:red;">';
                                      echo $sns1++.')'.$name.' </span>';
                                      
                                    }
                                  }
                                  if($type!=""){
                                    $query_cat_warning = "SELECT * FROM warning_category_data where id='$type'";
                                    $statement_cat_warning = $connect->prepare($query_cat_warning);
                                    $statement_cat_warning->execute();
                                    $result_cat_warning = $statement_cat_warning->fetchAll();
                                    foreach ($result_cat_warning as $row_cat) {
                                     ?>
                                      <span class="text-dark" style="font-weight:bold;">&#8226; Grades : </span><span style="color:red;"><?php echo $row_cat['grade']?></span><br>
                                      <span class="text-dark" style="font-weight:bold;">&#8226; Warning Count : </span><span style="color:red;"><?php echo $row_cat['count'] ?></span>
                                   <?php  }
                                  }
                                  $initial="";
                                    $q1 = $connect->prepare("SELECT permission FROM warning_permission WHERE std_id=? and	warning_id='$warning'");
                                    $q1->execute([$fetchuser_id]);
                                    $name1 = $q1->fetchColumn();
                                    $select_ini = $connect->prepare("SELECT initial FROM users WHERE id=?");
                                    $select_ini->execute([$fetchuser_id]);
                                    $select_ini_id = $select_ini->fetchColumn();
                                    if($select_ini_id!=""){
                                      $initial=$select_ini_id;
                                    }else{
                                      $initial="not added yet";
                                    }
                                    if($name1=="accept"){
                                      echo '<br><span class="text-dark" style="font-weight:bold;">&#8226; Notification Status :</span><span style="color:red;">Accepted</span>';
                                    echo '<br><span class="text-dark" style="font-weight:bold;">&#8226; Initial : </span>';
                                    echo '<span style="color:red;">'
                                    .$initial;
                                    echo '</span>';
                                    }
                                    if($name1=="not accept"){
                                      echo '<br><span class="text-dark" style="font-weight:bold;">&#8226; Notification Status :</span><span style="color:red;">Decline</span>';
                                    }
                                    if($name1==""){
                                      echo '<br><span class="text-dark" style="font-weight:bold;">&#8226; Notification Status :</span><span style="color:red;">Not Accepted</span>';
                                    }
                                    echo '<br><span class="text-dark" style="font-weight:bold;">&#8226; Attachment : </span>';
                                    $feth_doc_class = "SELECT * FROM assing_warning_doc where noti_id='$no_id'";
                                   $feth_doc_classst = $connect->prepare($feth_doc_class);
                                   $feth_doc_classst->execute();
                                   $snatt='1';
                                   if ($feth_doc_classst->rowCount() > 0) {
                                     $result_warning_Datast = $feth_doc_classst->fetchAll();
                                    foreach ($result_warning_Datast as $row_data2) {?>
                                       
                                     <table> 
                                     <tr> 
                                       <td style="margin-left:20px;"> - <a href="uploads/<?php echo $row_data2['files']; ?>" target="_blank"><?php echo $row_data2['files']; ?></a></td>
                                     
                                     </tr>
                                     </table>
                                      
                                    <?php }
                                   }
?>