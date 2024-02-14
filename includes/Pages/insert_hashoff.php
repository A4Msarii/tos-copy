<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_POST["insert_hashoff"]))
	{
       if(empty($_POST["hashoff"]))
			{
				
				$_SESSION['warning'] = "Item Name Required";
			}
				else
					{
						$hashoff = $_POST["hashoff"];
						foreach ($hashoff as $key => $value) 
						{
							$sym1=$hashoff[$key];
							$que1 = "SELECT hashoff FROM hashoff where hashoff='$sym1'";
							$stat1 = $connect->prepare($que1);
						    $stat1->execute();
							var_dump($stat1->rowCount() == 0);
							if($stat1->rowCount() == 0)
						    {
								$query1 ="INSERT INTO hashoff (hashoff) VALUES ('".$value."')";
								$statement1 = $connect->prepare($query1);
								$statement1->execute();
								$_SESSION['success'] = "Item Inserted Successfully";
								header("Location:add_item_subitem.php");
							}
							else
							{
							
								$_SESSION['info'] = "This Data Already Exist.. Please Enter New Item";
								header("Location:add_item_subitem.php");
							}
				    }
			}
		}
?>