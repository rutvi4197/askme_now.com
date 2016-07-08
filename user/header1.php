<?php 
 $email=$_SESSION["email"];
            include '../database.php';
                $obj=new database();
                $res=$obj->getuser($email);
				while($row=mysql_fetch_assoc($res))
				{
					$name=$row["user_name"];
					$pic=$row["user_photo"];
					
				}


 ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  
	  <div>
	
</div>
   
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	  <li><a href="user_view.php" style="font-size:20px;color:blue;" >
  <span class="glyphicon glyphicon-home" aria-hidden="true">AskMeNow.com</span></a></li>
        <li ><a style="font-size:20px; margin-left:30px; margin-top:5px; color:blue;" href="userview_profile.php">View Your Questions <span class="sr-only">(current)</span></a></li>

        
          </ul>
       
      
      
      <ul class="nav navbar-nav navbar-right">
	  <li><a href="user_askque.php"><input type="button" class="btn btn-info" name="askque" value="ASK A QUESTION" style="margin-right:40px; "></a></li>
	  
        <li><img style="margin-top; margin-top:15px" src="<?php echo $pic; ?>" class="img-circle" height=35px width=35px></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:blue; font-size:20px;"><?php echo $name; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a style="color:blue;" href="user_changeprofile.php">Change Profile</a></li>
            <li><a style="color:blue;" href="user_changepassword.php">Change Password</a></li>
           
            <li><a style="color:blue;" href="../signuplogin.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>