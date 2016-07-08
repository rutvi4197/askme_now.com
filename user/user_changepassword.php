<?php 
SESSION_START();
?>
<!doctype html>
 <head>
 <script src="../Scripts/jquery-1.9.1.min.js"></script>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/bootstrap.min.js"></script>

 </head>
 
<body>
<?php 
if(isset($_POST["btnsubmit"]))
{
	$email=$_SESSION["email"];
	$oldpwd=$_POST["txtold"];
	$new=$_POST["txtnew"];
	$cnfrm=$_POST["txtcon"];
	if($new=$cnfrm)
	{
	include '../database.php';
	$obj=new database();
		$res=$obj->checkpwd($email,$oldpwd);
	$cnt=mysql_num_rows($res);
		if($cnt==1)
		{
			$obj=new database();
		$res=$obj->changepwd($email,$new);
		if($res==1)
		{
			header('Location:user_view.php');
			
		}
			
		}
	

	}
}
?>
<div class="row">
<div class="col-md-12">
<?php include 'header1.php'; ?>
</div>
</div>
<form action="user_changepassword.php" method="post">
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="page-header">
  <h1 style="color:blue; font-size:30px;"><span class="glyphicon glyphicon-link" > Want to change password...??</span> <br><small></small></h1>
</div>
<form>
  <form>
  <div class="form-group">
    <label for="exampleInputPassword1">Old-Password:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="txtold" placeholder="old Password" required />
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New-Password:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="txtnew" placeholder="new Password"required />
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm-Password:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="txtcon" placeholder="confirm Password" required />
  </div>
  <center>
  <button type="submit" class="btn btn-warning" name="btnsubmit" style="height:40px;width:100px">Submit</button></center>
  </div>
</form>
</form>
</div>
</div>
</body>
</form>
 </html>