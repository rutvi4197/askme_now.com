<?php  

		$id=$_REQUEST["id"];
		
		require '../database.php';
		$obj=new database();
		$res=$obj->getquedel($id);
		
		if($res==1)
		{
			header('Location:quedis.php');
		}
		else
		{
			echo "Not Deleted";
		}
?>