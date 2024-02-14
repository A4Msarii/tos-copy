<?php
include('../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_POST["saveshelf"]))
	{
       if(empty($_POST["shelf"]))
			{
				$_SESSION['danger']="Shelf Name required..";
				header("Location:index.php");
			}
				else
					{
						$library_id=$_POST['lib_id'];
						$shelf = $_POST["shelf"];
						foreach ($shelf as $key => $value) 
						{
							$sym_shelf=$shelf[$key];
							$que_shelf = "SELECT shelfname FROM shelf where shelf='$sym_shelf'";
							$stat_shelf = $connect->prepare($que_shelf);
						    $stat_shelf->execute();
							
							if($stat_shelf->rowCount() == 0)
						    {
								$query_shelf ="INSERT INTO shelf (shelf,library_id) VALUES ('".$value."','$library_id')";
								$statement_shelf = $connect->prepare($query_shelf);
								$statement_shelf->execute();
								$_SESSION['success']="shelf Inserted successfully..";
								header("Location:index.php");
							}
							else
							{
								$_SESSION['info']="This Data Already Exist.. Please Enter New shelf";
								header("Location:index.php");
							}

					}

}			}
?>