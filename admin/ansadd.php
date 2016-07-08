<?php
	 
		session_start();
		$email=$_SESSION["email"];
		$desc=$_POST["area1"];
		$id=$_REQUEST["id"];
		include '../database.php';
		$date=date("d/m/y");
		$obj1=new database();
		$res1=$obj1->getanswerinsert($id,$desc,$email,$date);
		if($res1==1)
		{
			header('Location:quealldis.php');		
		}
		else
		{
			echo 'error';
		}		
	
?>		