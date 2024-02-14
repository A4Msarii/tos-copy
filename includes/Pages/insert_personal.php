<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_POST["personalbtn"]))
	{
       if(empty($_POST["title"]))
			{
				$_SESSION['warning'] = "Title Is Required";
			}
				else
					{
						$id = $_POST['id'];
						// $user_name = $_POST['user_name'];
						$title= $_POST["title"];
						$message = $_POST['message'];
						$date = date("Y-m-d");
						    {
								$query1 ="INSERT INTO persontitle (user_id,title,message,date) VALUES ('$id','$title','$message','$date')";
								// echo $query1;
								// die();
								$statement1 = $connect->prepare($query1);
								$statement1->execute();
								$_SESSION['success'] = "Title Added Successfully";
								header("Location:personal.php");
							}
							
				    }
			}
		
?>