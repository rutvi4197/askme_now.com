<?php
	session_start();
	$id=$_REQUEST["id"];
	
?>

<!DOCTYPE html>
<html>
<head>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>
<link href="../css/bootstrap-wysihtml5.css" rel="stylesheet"/>

<script type="text/javascript" src="texteditor.js"></script>
	 <script type="text/javascript">

	 //<![CDATA[

        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>
<body >

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
<?php 
	$obj=new database();
	$res=$obj->getlike($id);
	
	while($row=mysql_fetch_assoc($res))
	{
		$cnt=$row["que_cnt"];
	}
	$cnt=$cnt+1;
	
	$obj=new database();
	$res=$obj->getcntupdate($id,$cnt);

	?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<center><b style="font-size:20px; color:blue;"><i>Your Answers</i></b></center>
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
		$email=$_SESSION["email"];
		
		$obj=new database();
		$res=$obj->disquebyid($id);
		while($row=mysql_fetch_assoc($res))
		{			
			$que_title=$row["que_title"];
		}
		
?>
<table class="table">
<tr>
	<td><p style="font-size:20px;color:blue;"><?php echo $que_title; ?></p></td>
	
<?php
		$email=$_SESSION["email"];
	
		$obj=new database();
		$res=$obj->disans($id);

		while($row=mysql_fetch_assoc($res))
		{			
					echo 	'<tr>
						<td><p style="margin-top:20px;font-size:20px;color:orange;">'.$row["ans_desc"].'</p></td>
					</tr>
			</table>';
			
		}
			
?>	
		
		<br><br></br>
<form action="user_ans.php?id=<?php echo $id;?>" method="post">	
	
	<h2 style="color:blue;">
    Enter Your Opinion
  </h2>
  <textarea name="area1" cols="100" rows="10">
</textarea><br/>
  
 
  		<input type="submit" name="btninsert" value="Add Your Opinion" class="btn btn-info text-center">

<?php
	 
	if(isset($_POST["btninsert"]))
	{
		$desc=$_POST["area1"];
		$date=date("d/m/y");
		$obj1=new database();
		$res1=$obj1->getanswerinsert($id,$desc,$email,$date);
		if($res1==1)
		{
			header('Location:user_view.php');
			
		}
		else
		{
			echo 'error';
		}
		
	}
?>		
</div>
</div>
 </form> 
</body>
</html>