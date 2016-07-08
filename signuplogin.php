<?php session_start(); ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='http://fonts.googleapis.com/css1?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css1/normalize.css">

    
        <link rel="stylesheet" href="css1/style.css">
<style type="text/css">
.input{

      font-size: 25px;
}
</style>
  </head >
  <?php 
include 'headerme.php';
  ?>
   <?php 
if(isset($_POST["btnlogin"]))
{
    $email=$_POST["txteid"];
    $pwd=$_POST["txtpwd"];
      include 'database.php';
	  $obj=new database();
	  $res=$obj->login($email,$pwd);
	  $cnt=mysql_num_rows($res);
        if($cnt==1)
      {
        while($row=mysql_fetch_array($res,MYSQL_ASSOC))
        {
          $type=$row["type"];
        }
        if($type=="User")
        {
          $_SESSION["email"]=$email;
        
        Header('Location:user/user_view.php');
        }
        else if($type=="Admin")
        {
          Header('Location:admin/quedis.php');
        }
        else
        {
        echo  "something went wrong";
        }
      }
      else
      {
        echo"wrong";
      }

  }
  else if(isset($_POST["btnsignup"]))
	{
	$email=$_POST["txteid"];
	$name=$_POST["txtuname"];
	$pwd=$_POST["txtpass"];
	$repwd=$_POST["txtconpas"];
	$mobile=$_POST["txtmob"];
	$gender=$_POST["txtgender"];
	$photo="null";
	$type="User";
	if($_SESSION["captcha_code"]==$_POST["captcha_code"])
	{
		if($pwd==$repwd)
		{
			
		include 'database.php';
		$obj=new database();
		$res=$obj->signup($email,$name,$mobile,$gender,$pwd,$type,$photo);
		if($res==1)
		{
			$_SESSION["email"]=$email;
			header('Location:user/user_view.php');
		}
		else
		{
			echo"something went wrong";
		}
		}
		else
		{
			
			echo"your password is wrong";
		}
	}
	else
	{
		echo "capcha is wrong";
	}
	
	
	}
	
  
?>


  <body>
 

    <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
      </ul>
      
      <div class="tab-content">
       <div id="login">   
          <h1 style="font-family:lucida handwriting; color:orange;">Welcome Back!</h1>
          
          <form action="signuplogin.php" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req"></span>
            </label>
            <input type="email" name="txteid" required autocomplete="off"class="input"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req"></span>
            </label>
            <input type="password" name="txtpwd" required autocomplete="off" class="input"/>
          </div>
          
          <p class="forgot"><a href="user/pass1.php">Forgot Password?</a></p>
          
          <button type="submit" class="button button-block" name="btnlogin" />Log In</button>
          
          </form>

        </div>
        
      
        <div id="signup">   
          <h1  style="font-family:lucida handwriting; color:orange;">Sign Up..</h1>
          <br>
          <form action="signuplogin.php" method="post">
          
            <div class="field-wrap">
              <label>
                Name<span class="req"></span>
              </label>
              <input type="text" name="txtuname" required autocomplete="off" class="input" />
            </div>
        
            

          <div class="field-wrap">
            <label>
              Email Address<span class="req"></span>
            </label>
            <input type="email" name="txteid" required autocomplete="off" class="input"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req"></span>
            </label>
            <input type="password" name="txtpass"required autocomplete="off" class="input"/>
          </div>

          <div class="field-wrap">
            <label>
              Confirm Password<span class="req"></span>
            </label>
            <input type="password" name="txtconpas" required autocomplete="off" class="input"/>
          </div>
        
		<div class="field-wrap">            
            <label>
              Contact no.<span class="req"></span>
            </label>
            <input type="text" name="txtmob" required autocomplete="off" class="input"/>
          </div>
            
			                        
             
  
          <br>
          <br>
<img src="captcha.php" style="font-size:px" >
<br>
<br>
		<div class="field-wrap">	
    <label>
              Captcha code<span class="req"></span>
            </label>
		<input type="text" name="captcha_code" required class="input"/>

		</div>
		<br>
<br>
<br><button type="submit" name="btnsignup" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
       </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    </form>
  </body>
</html>
