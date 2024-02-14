<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
// echo $user_id1=$_REQUEST["user_id"];
echo $id=$_REQUEST["id"];
$cCourse = $_REQUEST['cCourse'];
$q3 = "SELECT ctp FROM academic where id='$id'";
        $st3 = $connect->prepare($q3);
        $st3->execute();

     if($st3->rowCount() > 0)
     {
         $re3 = $st3->fetchAll();
        foreach($re3 as $row3)
         {
           $ctp=$row3["ctp"];
          $q4 = "SELECT StudentNames FROM newcourse where CourseName='$ctp' AND CourseCode = '$cCourse'";
         $st4 = $connect->prepare($q4);
         $st4->execute();

     if($st4->rowCount() > 0)
     {
        $sn=1;
         $re4 = $st4->fetchAll();
        foreach($re4 as $row4)
         {
             $std_id=$row4['StudentNames'];

             $checkitem_std = "SELECT * FROM acedemic_stu where std_id='$std_id' AND acedemic_id='$id' and permission='1'";
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
          
            $std_name= $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
            $std_name->execute([$std_id]);
            $get_ins_name= $std_name->fetchColumn();
            echo '<tr>
            
            <td>
            <input type="checkbox" readonly  name="student_sel[]" value="'.$std_id.'"/></td>
            <td>
            <div class="avatar avatar-sm avatar-circle">
                  <img class="avatar-img" src="'.$pic.'" alt="Image Description">
                  <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                </div>
                '.$get_ins_name.'
            </td>
            </tr>';

         }else{
            $profile= $connect->prepare("SELECT file_name FROM `users` WHERE id=?");
            $profile->execute([$std_id]);
            $prof_pic = $profile->fetchColumn();
            if($prof_pic!=null){
              $pic= 'upload/'.$prof_pic;
            }else{
              $pic= 'upload/avtar.png';
            }
            
            $std_name= $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
            $std_name->execute([$std_id]);
            $get_ins_name= $std_name->fetchColumn();
            echo '<tr>
            <td>
            <input type="checkbox" checked readonly onclick="return false" value="'.$std_id.'"/></td>
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