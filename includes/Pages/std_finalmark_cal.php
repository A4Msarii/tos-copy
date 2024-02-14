<?php
  include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$course="";
$dis = "SELECT * FROM mark_distribution";
$stt = $connect->prepare($dis);
$stt->execute();

if($stt->rowCount() > 0)
	{
        
		$result = $stt->fetchAll();
		$sn=1;
		foreach($result as $row)
		{
            $table=$row['categories'];
            $ctp=$row['ctp'];
            $id=$row['categories_data'];
            $symbol= $connect->prepare("SELECT symbol FROM actual WHERE ctp=? and id=?");
            $symbol->execute([$ctp,$id]);
            $symbol_value = $symbol->fetchColumn();
            $cat=$row["categories"];
            $mark=$row["marks"];
          $equation=(78*$mark)/100;

			$course.='<label>Type</label>
            <input type="text" readonly class="form-control" value="'.$row["type"].'">
            <label>Total marks</label>
            <input type="text" readonly class="form-control" value="'.$row["total_marks"].'">
            <label>marks</label>
            <input type="text" readonly class="form-control" value="'.$row["marks"].'">
            <label>std marks</label>
            <input type="text" readonly class="form-control" value="78">
            <label>scored mark</label>
            <input type="text" readonly class="form-control" value="'.$equation.'">
            <label>categories</label>
            <input type="text" readonly class="form-control" value="'.$row["categories"].'">
            <label>Symbol</label>
            <input type="text" readonly class="form-control" value="'.$symbol_value.'">
            ';
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Distribution</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width,
          initial-scale=1" />
          <link rel="shortcut icon" href="./ico-copy.ico">
        </head>
<body>

<div id="loading-screen" style="display:none;">
  <div id="loading-spinner" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <div class="spinner-border" style="height:300px; width:300px;">
      <!-- <img class="spinner-border" style="height:500px; width:500px;" src="tos.svg"> -->
    </div>
  </div>
</div>
<div>

<div>
<?php

include(ROOT_PATH.'includes/head_navbar.php');

?>
</div>

<div class="container content-space-1">
  <div class="row">
    <div class="col-md-2 mb-3 mb-md-0">
        <?php
        // include 'sidebar.php';
        ?>
    </div>

    <div class="col-md-10">
      <!-- List -->
        
          <!-- Media -->
          <div class="d-lg-flex">
            <div class="flex-lg-shrink-0" style="width:80%;">
        <?php echo $course;
        //  echo $symbol_value;
        ?>
            </div>
          </div>
        </li>
      </ul>
     </div>
  </div>
</div>



<footer id="content1" role="footer" class="footer">
 <?php
    include(ROOT_PATH.'includes/footer2.php');
 ?>
</footer>


</body>

</html>
