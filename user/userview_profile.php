<?php 
session_start();

?>
<!doctype html>
<html>
<head>
<script src="../Scripts/jquery-1.9.1.min.js"></script>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/bootstrap.min.js"></script>
</head>
<body>

<?php  

include 'header1.php'; 
include 'headerme.php'; 
?>

<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="page-header">

 <center> <h2 style="font-family:lucida handwriting; color:orange; ">Your Questions ....</h2></center>
</div>
<form action="userview_profile.php" method="post">
<table class="table table-hover">
<tr>

<th style="font-family:lucida; color:blue; font-size:20px;">Date</th>
<th style="font-family:lucida; color:blue; font-size:20px; align:center; ">Title</th>
<th style="font-family:lucida; color:blue; font-size:20px;">Action</th>

</tr>
<?php
$cnt=1;
$email_id=$_SESSION["email"];
 $con=mysql_connect('localhost','root','');
  mysql_select_db('askme_now',$con);
  $res=mysql_query("select q.*,a.* from que_tbl as q,ans_tbl as a where q.pk_que_id=a.fk_que_id and q.fk_email_id='$email_id'",$con);
while($row=mysql_fetch_assoc($res))
{



echo '<tr>';
echo '<td><h3 style="font-family:lucida; color:blue; font-size:20px;">'.$row["que_date"].'</h3></td>';
echo '<td><a href="user_ans.php?id='.$row["pk_que_id"].'"><h3 style="font-family:lucida; color:orange;">'.$row["que_title"].'</h3></a></br>';
echo '
<td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="user_deletehistory.php?id='.$row["pk_que_id"].'"> <span class="glyphicon glyphicon-trash" ></span></a>
<br>
<br>
<a href="user_queedit.php?id='.$row["pk_que_id"].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-edit" ></span></a>
    
<td>
</tr>';
$cnt=$cnt+1;

}

?>
</table>
</div>

<div class="row">
<div class="col-md-12">
<?php  

include 'footer.php'; 
?>
</div>
</div>
</form>
</body>
</html>
