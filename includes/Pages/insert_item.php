<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_POST["Insert_item"]))
	{
       if(empty($_POST["item"]))
			{
				$_SESSION['warning']="Item Name required..";
			}
				else
					{
						$item = $_POST["item"];
						foreach ($item as $key => $value) 
						{
							$sym1=$item[$key];
							$que1 = "SELECT item FROM itembank where item='$sym1'";
							$stat1 = $connect->prepare($que1);
						    $stat1->execute();
							var_dump($stat1->rowCount() == 0);
							if($stat1->rowCount() == 0)
						    {
								$query1 ="INSERT INTO itembank (item) VALUES ('".$value."')";
								$statement1 = $connect->prepare($query1);
								$statement1->execute();
								
								$_SESSION['success']="Item inserted successfully..";
								header("Location:add_item_subitem.php");
							}
							else
							{
								$_SESSION['info']="This Data Already Exist.. Please Enter New Item";
								header("Location:add_item_subitem.php");
							}
				    }
			}
		}
?>