<?php
include('../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_POST["savelibrary"]))
	{
       if(empty($_POST["library"]))
			{
				$_SESSION['danger']="library Name required..";
				header("Location:index.php");
			}
				else
					{
						$userid=$_POST['userid'];
						$library = $_POST["library"];
						foreach ($library as $key => $value) 
						{
							$sym_library=$library[$key];
							$que_library = "SELECT library FROM library where library='$sym_library' and user_id='$userid'";
							$stat_library = $connect->prepare($que_library);
						    $stat_library->execute();
							
							if($stat_library->rowCount() == 0)
						    {
								$query_library ="INSERT INTO library (library, user_id) VALUES ('".$value."', '$userid')";
								$statement_library = $connect->prepare($query_library);
								$statement_library->execute();
								$_SESSION['success']="library Inserted successfully..";
								header("Location:index.php");
							}
							else
							{
								$_SESSION['info']="This Data Already Exist.. Please Enter New library";
								header("Location:index.php");
							}

					}

}			}
?>