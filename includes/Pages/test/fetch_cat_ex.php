<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$id=$_REQUEST['id'];

$q3 = "SELECT * FROM examsubcategory where examId='$id' and subjectPercentage!='0'";
        $st3 = $connect->prepare($q3);
        $st3->execute();

     if($st3->rowCount() > 0)
     {
        $sn=1;
         $re3 = $st3->fetchAll();
        foreach($re3 as $row3)
         {
            $std_id=$row3['examSubject'];
            $std_name= $connect->prepare("SELECT course_name FROM `test_course` WHERE id=?");
            $std_name->execute([$std_id]);
            $get_ins_name= $std_name->fetchColumn();
           ?>
                <tr>
                <td>
                <?php echo $sn++?>
                </td>
                <td>
                    <?php echo $get_ins_name?>
                </td>
                <td>
                    <?php echo $row3['subjectPercentage']?>
                </td>
                <td>
                <a class="btn btn-soft-success btn-xs" onclick="document.getElementById('get_exam_ides').value='<?php echo $row3['id'] ?>';document.getElementById('get_exam_name_per').value='<?php echo $row3['subjectPercentage'] ?>';" data-bs-toggle="modal" data-bs-target="#editcategoryexam"><i class="bi bi-pen-fill"></i></a>
                <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL;?>includes/Pages/test/delete_category_exam.php?id=<?php echo $row3['id']?>"><i class="bi bi-trash-fill"></i></a>
                </td>
                </tr>

  <?php }
  }
?>