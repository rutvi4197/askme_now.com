<?php
session_start();
$email_id=$_SESSION["email"];
$photo=$_REQUEST["id"];
$photo1=$photo;
$name=$_POST["txtname"];
$mobile=$_POST["txtmobile"];
if($_FILES["txtphoto"]["name"]!="")
{
	

			$photo="../profilephoto/".$_FILES["txtphoto"]["name"];
		move_uploaded_file($_FILES["txtphoto"]["tmp_name"],$photo);
			unlink($photo1);
		
}	
			include '../database.php';
			$obj=new database();
		$res=$obj->changeprofedit($photo,$name,$mobile,$email_id);
			
	  if($res==1)
		{
			
				HEADER("Location:user_changeprofile.php");
		}
			else
		{
					echo "Something Went Wrong";
		}

?>