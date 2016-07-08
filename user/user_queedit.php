<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<script src="../Scripts/jquery-1.9.1.min.js"></script>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/bootstrap.min.js"></script>
<title>Question Insert</title>
</head>
<body>
<div class="row">
	<div class="col-md-12">
	<?php include 'header1.php'; ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
	<?php include 'headerme.php'; ?>
	</div>
</div>
<div class="container"> 
<div class="row">
<center>

<?php 
	
	$id=$_REQUEST["id"];
	$obj=new database();
	$res=$obj->getlike($id);
	while($row=mysql_fetch_assoc($res))
	{
		$title=$row["que_title"];
		$desc=$row["que_desc"];
		$photo=$row["que_img"];
		$sub=$row["fk_sub_id"];
		
	}


?>
<form action="user_queedit1.php?photo=<?php echo $photo; ?>" method="post" enctype="multipart/form-data">
<br>
<br>
<br>
<br>
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
	
			<div class="panel-heading">
			<h3 class="panel-title">Question Insert form</h3>
			</div>
			
			<div class="panel-body">
			
				
				<input type="hidden" class="form-control"  name="txt_id" aria-describedby="sizing-addon1"  value="<?php echo $id; ?>" required/>
			

				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Question Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type="text" class="form-control" placeholder="Question Title" name="txt_que_title" aria-describedby="sizing-addon1"  value="<?php echo $title; ?>" required/>
				</div></br>
				
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Question Description</span>
				<input type="text" class="form-control" placeholder="Question Description" name="txt_que_des" aria-describedby="sizing-addon1" value="<?php echo $desc; ?>" required/>
				</div></br>
				
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Question Image &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<img src="<?php echo $photo; ?>" height=30px width=30px>
				<input type="file"  name="txt_que_img" />
				</div></br>
				
				<div class="input-group" style="margin-top:10px;">
				<span class="input-group-addon" id="sizing-addon1">Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				
				<select class="form-control" style="height:30px;width:100px;" name="txtcatname">
				<?php 
						
						$obj=new database();
						$res=$obj->getsub();
						while($row=mysql_fetch_assoc($res))
					{
						$selected="";
						if($catid==$row["pk_sub_id"])
						{
							$selected="selected";
						}
						
					echo '<option '.$selected.'  value="'.$row["pk_sub_id"].'">'.$row["sub_name"].'</option>';
					}	
				?>
				</select>						
				</div>
				<br>				
						
<center>
    <div>
		<input type="submit" name="btnupdate" value="update" class="btn btn-success text-center">
    </div> 
</center>
			</div>
		</div>
	</div>
</div>
</div>

</form>
</center>
</body>
</html>