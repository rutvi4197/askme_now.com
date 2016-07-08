<?php 
	session_start();
?>

<!DOCTYPE html>

<html>
<head>

<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>

<title>Change Profile</title>
</head>


<body>
	<div class="row">
	<div class="col-md-12">
	<?php include 'header1.php'; ?>
	</div>
	</div>
	
	<?php 
	
		$email_id=$_SESSION["email"];
		$obj=new database();
		$res=$obj->changeprof($email_id);
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
			{
				$name=$row["user_name"];
				$photo=$row["user_photo"];
				$mobile=$row["user_mobile"];
				
			}
		

?>
<form action="profile1.php?id=<?php echo $photo; ?>" method="post" enctype="multipart/form-data">

<div class="container"> 
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">

		<div class="panel-heading">
		<h2 class="panel-title"><center>Update Form</center></h2>
		</div>
		
		<div class="panel-body">
			<input type="hidden" class="form-control" name="txtemail" readonly value=" " aria-describedby="sizing-addon1" required/>

			<img src="<?php echo $photo; ?>" height=220px width=220px>
			<input type="file" name="txtphoto" value="change profile photo">
			</br>
			
			<div class="input-group">
			<span class="input-group-addon" id="sizing-addon1">User Name : </span>
			<input type="text" class="form-control" name="txtname" value="<?php echo $name; ?> " aria-describedby="sizing-addon1" required/>
			</div></br>

			<div class="input-group">
			<span class="input-group-addon" id="sizing-addon1">Mobile No : </span>
			<input type="text" class="form-control" name="txtmobile" value="<?php echo $mobile; ?> " aria-describedby="sizing-addon1" required/>
			</div>
			
			<div class="input-group" style="margin-top:10px;">
 			<input type="radio" name="txtgender" value="Male" checked><b>Male</b>
 			<input type="radio" name="txtgender" value="Female"><b>Female</b>			 
			</div></br>

			<center>
			<div>
			<input type="submit" name="btnupdate" value="Update" class="btn btn-success text-center">
			<input type="submit" name="btnback" value="Back" class="btn btn-default text-center">
			</div> 
			</center>
			
		</div>
		</div>
	</div>
</div>
</div>
</form>
</body>
</html>