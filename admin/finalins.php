<?php 
	
	
	
		session_start();
		$que_title=$_POST["txt_que_title"];
		$que_des=$_POST["txt_que_des"];
		$que_img=$_POST["txt_que_img"];
		$que_date=date('d/m/y');
		$email_id=$_SESSION["email"];
		$sub_id=$_POST["txtcatname"];
		$que_cnt=0;
		$que_flag=0;
		$que_like=0;
		
		if($_FILES["txt_que_img"]["name"]!="")
		{
		$que_img="../images/".$_FILES["txt_que_img"]["name"];
			move_uploaded_file($_FILES["txt_que_img"]["tmp_name"],$que_img);
		}else
			$que_img="";
			
				include '../database.php';

				$obj=new database();
				$res=$obj->addque($que_title,$que_des,$que_img,$que_date,$email_id,$sub_id,$que_cnt,$que_flag,$que_like);
				
				if($res==1)
				{
					header('Location:quedis.php');
				}
				else
					echo"not inserted";
			
			
			
		
			
?>