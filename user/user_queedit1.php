<?php 

		$photo=$_REQUEST["photo"];
		$id=$_POST["txt_id"];
		$title=$_POST["txt_que_title"];
		$desc=$_POST["txt_que_des"];
		$cat=$_POST["txtcatname"];
		
			
		if($_FILES["txtphoto"]["name"]!="")
		{
			unlink($photo);
			$photo="../images/".$_FILES["txtphoto"]["name"];
			move_uploaded_file($_FILES["txtphoto"]["tmp_name"],$photo);
		}

	require '../database.php';
	$obj=new database();
	$res=$obj->queupdate($id,$title,$desc,$cat,$photo);
	if($res==1)
	{
		header('Location:userview_profile.php');
		
	}
	else
		echo"NOt updated";
	

	
?>