<?php
	 
	if(isset($_POST["btninsert"]))
	{
		$desc=$_POST["area1"];
		$date=date("d/m/y");
		$obj1=new database();
		$res1=$obj1->getanswerinsert($id,$desc,$email,$date);
		if($res1==1)
		{
			header('Location:user_ans.php');
			
		}
		else
		{
			echo 'error';
		}
		
	}
?>		