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
		<?php		
		include 'adminheader.php'; 
		?>
		</div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<center><b style="font-size:20px; color:blue;"><i>Your Answers</i></b></center>
			</div>
		  </div>
	</div>
</div>



<div class="col-md-9">
<?php 
		include '../database.php';
		$obj=new database();
		$res=$obj->disquebyid($id);
		while($row=mysql_fetch_assoc($res))
		{			
			$que_title=$row["que_title"];
		}
		
?>
<center>
<table>
<tr>
	<td><p style="font-size:20px;color:blue;"><?php echo $que_title; ?></p></td>
	
<?php
		
	
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
<form action="ansadd.php?id=<?php echo $id;?>" method="post">	
	
	<h2 style="color:blue;">
    Enter Your Opinion
  </h2>
  <textarea name="area1" cols="100" rows="10">
</textarea><br/>
  		<input type="submit" name="btninsert" value="Add Your Opinion" class="btn btn-info text-center">


</div>
</div>
 </form> 
</body>
</html>