<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>
<body>

<div class="row">
		<div class="col-md-12">
		<?php		include 'header1.php'; ?>
		</div>
</div>

<div class="row">
		<div class="col-md-12">
   <?php		include 'headerme.php'; ?>
		</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<center><b style="font-size:20px; color:blue;"><i>Frequently Asked Questions</i></b></center>
			</div>
		  </div>
	</div>
</div>

<div class="row">
<div class="col-md-3">
	<div class="list-group">
  <a href="#" class="list-group-item active">Subject</a>
  <?php 
  
  $obj1=new database();
  $res1=$obj1->getsub();
$count=mysql_num_rows($res1);
  ?>
   <a href="user_view.php" class="list-group-item " style="color:blue;">All Subject<span class="badge" style="background-color:orange;" ><?php echo $count; ?></span> </a>
<?php 

$obj=new database();
$res=$obj->subadd();
while($row=mysql_fetch_assoc($res))
{
	echo '<a href="user_view1.php?id='.$row["pk_sub_id"].'"  class="list-group-item" style="color:blue;">'.$row["sub_name"].'<span class="badge" style="background-color:orange;" >'.$row["cnt"].'</span></a>';
}
?>  
  
</div>
</div>

<div class="col-md-9">
<?php
		$obj=new database();
		$res=$obj->disque1();
		$obj1=new database();
					
		
			while($row=mysql_fetch_assoc($res))
		{	
			$id=$row["pk_que_id"];
			$res1=$obj->cntans($id);
					$cnt=mysql_num_rows($res1);
					
		
		
		echo 	'<table class="table">
					<tr>';
					
		echo   '<td><a href="que_like.php?id='.$row["pk_que_id"].'"><button type="button" style="color:red;background-color:lightblue"><center><span class="glyphicon glyphicon-thumbs-up"></span></center></button></a>
								
						<p><lable style="color:blue;">'.$row["que_like"].'</lable></p></td>
						
						<td><button class="btn btn-primary" type="button" style="background-color:orange;height:35px; width:80px;">
						View <span class="badge">'.$row["que_cnt"].'</span>
						</button></td>
						
						<td><button class="btn btn-primary" type="button" style="background-color:orange;">
							Answer <span class="badge">'.$cnt.'</span>
							</button></td>
						
						<td><a href="user_ans.php?id='.$row["pk_que_id"].'" ><p style="font-size:20px;color:blue;text-align:justify;">'.$row["que_title"].'</p></a>
						<p style="margin-top:20px; margin-left:500px;color:orange;">'.$row["que_date"].'    '.$row["user_name"].'</p></td>
			
					</tr>
					
			</table>';	
		}
?>			
</div>
</div>
<div class="row">
<div class="col-md-12">
<?php include 'footer.php'; ?>
</div>
</div>

</body>
</html>