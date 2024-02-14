<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$id=$_REQUEST['id'];
$q2= "SELECT * FROM warning_category_data where id='$id'";
$st2 = $connect->prepare($q2);
$st2->execute();

    if($st2->rowCount() > 0)
     {
         $re2 = $st2->fetchAll();
       foreach($re2 as $row2)
         {
            $count=$row2['count'];
            $thres=$row2['threshold'];
            $grade=$row2['grade'];
        echo $got_value='
        <label>Grade :</label><br>
        <select name="grade" class="form-control text-dark" value="'.$grade.'">
                    <option value="U">U</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="V">V</option>
                    <option value="E">E</option>
                    <option value="N">N</option>
                    </select><br>
                    <label>Count :</label><br>
                    <div id="showtextselect_Cat">
                    <input type="number" list="count" name="count_ed" value="'.$count.'" class="form-control">
                     <datalist id="count">
                        <option value="1">
                        <option value="2">
                        <option value="3">
                        <option value="4">
                        <option value="5">
                        <option value="6">
                        <option value="7">
                        <option value="8">
                        <option value="9">
                        <option value="10">
                      </datalist></div><br>
                      <label>Threshold Count :</label><br>
                      <div id="showtextselect_Cat">
                      <input type="number" list="thrishould" value="'.$thres.'" class="form-control" name="thri_ed">
                      <datalist id="thrishould">
                          <option value="1">
                          <option value="2">
                          <option value="3">
                          <option value="4">
                          <option value="5">
                          <option value="6">
                          <option value="7">
                          <option value="8">
                          <option value="9">
                          <option value="10">
                        </datalist></div> 
        ';
         }
     
     }
?>