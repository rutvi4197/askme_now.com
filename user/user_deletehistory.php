<?php
session_start();
$id=$_REQUEST["id"];
$email_id=$_SESSION["email"];
 
	
		require '../database.php';
	$obj=new database();
	$res=$obj->getquedel($id);
		if($res==1)
		{
		header('location:userview_profile.php');
		}
		else
		{
			echo 'problem in query';
		}
	
?>