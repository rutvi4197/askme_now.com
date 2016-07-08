<?php 
$id=$_REQUEST["id"];
include '../database.php';
$obj=new database();
$res=$obj->aprove($id);
if($res==1)
{
	header('Location:quedis.php');
}
else
{
	echo 'not updated';
}


?>