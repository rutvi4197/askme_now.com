
<!DOCTYPE html>
<html>
<head>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>
<title>Question Insert</title>
</head>
<body>
<div class="row">	
<div class="col-md-12">
	<?php include 'adminheader.php'; ?>
</div>
</div>
<div class="container"> 
<div class="row">
<center>
<form action="finalins.php" method="post" enctype="multipart/form-data">
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

				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Question Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type="text" class="form-control" placeholder="Question Title" name="txt_que_title" aria-describedby="sizing-addon1" required/>
				</div></br>
				
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Question Description</span>
				<input type="text" class="form-control" placeholder="Question Description" name="txt_que_des" aria-describedby="sizing-addon1" required/>
				</div></br>
				
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Question Image &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type="file"  name="txt_que_img" />
				</div></br>
				
				<div class="input-group" style="margin-top:10px;">
				<span class="input-group-addon" id="sizing-addon1">Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				
				<select class="form-control" style="height:30px;width:100px;" name="txtcatname">
				<?php 
						include '../database.php';
						$obj=new database();
						$res=$obj->getsub();
						while($row=mysql_fetch_assoc($res))
						{
							echo $row["sub_name"];
							echo '<option value="'.$row["pk_sub_id"].'">'.$row["sub_name"].'</option>';
						}
				?>
				</select>						
				</div>
				<br>				
						
<center>
    <div>
		<input type="submit" name="btninsert" value="Insert" class="btn btn-success text-center">
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