<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 $id=$_REQUEST['id'];
$q2= "SELECT * FROM notifications where id='$id'";
$st2 = $connect->prepare($q2);
$st2->execute();

    if($st2->rowCount() > 0)
     {
         $re2 = $st2->fetchAll();
       foreach($re2 as $row2)
         {
         $data=$row2["data"];
         $selected_id=$row2["user_id"];
         }
     
     }


      $q3 = "SELECT ctp FROM academic where id='$data'";
        $st3 = $connect->prepare($q3);
        $st3->execute();

     if($st3->rowCount() > 0)
     {
         $re3 = $st3->fetchAll();
        foreach($re3 as $row3)
         {
           $ctp=$row3["ctp"];
          $q4 = "SELECT StudentNames FROM newcourse where CourseName='$ctp'";
         $st4 = $connect->prepare($q4);
         $st4->execute();

     if($st4->rowCount() > 0)
     {
        $sn=1;
         $re4 = $st4->fetchAll();
        foreach($re4 as $row4)
         {
             $std_id=$row4['StudentNames'];

             $checkitem_std = "SELECT * FROM acedemic_stu where std_id='$std_id' AND acedemic_id='$data' and permission='1'";
             $checkitem_stdst = $connect->prepare($checkitem_std);
             $checkitem_stdst->execute();
             if($checkitem_stdst->rowCount() <= 0)
               {
            $profile= $connect->prepare("SELECT file_name FROM `users` WHERE id=?");
            $profile->execute([$std_id]);
            $prof_pic = $profile->fetchColumn();
            if($prof_pic!=null){
              $pic= 'upload/'.$prof_pic;
            }else{
              $pic= 'upload/avtar.png';
            }
            $val="";
            $val1="";
            if($selected_id==$std_id){
              $val="checked";
              $val1='onclick="return false"';
            }
            $std_name= $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
            $std_name->execute([$std_id]);
            $get_ins_name= $std_name->fetchColumn();
            echo '<tr>
            <td>'.$sn++.'</td>
            <td>
            <input type="checkbox" '.$val1.' readonly  name="student_sel[]"'.$val.' value="'.$std_id.'"/></td>
            <td>
            <div class="avatar avatar-sm avatar-circle">
                  <img class="avatar-img" src="'.$pic.'" alt="Image Description">
                  <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                </div>
                '.$get_ins_name.'
            </td>
            </tr>';

         }
        }

         }
     
     }
     }
?>