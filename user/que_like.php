<?php 

	$id=$_REQUEST["id"];
	require '../database.php';
	$obj=new database();
	$res=$obj->getlike($id);
	
	while($row=mysql_fetch_assoc($res))
	{
		$cnt=$row["que_like"];
	}
	$cnt=$cnt+1;
	
	$obj=new database();
	$res=$obj->getlikeupdate($id,$cnt);
	if($res==1)
	{
		header('Location:user_view.php');
		
	}
	else
	{
		echo 'error';
		
	}

?>