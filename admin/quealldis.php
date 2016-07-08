<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Question</title>


   <link href="../Content/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jquery.dataTables_themeroller.css" rel="stylesheet">
    <link href="../css/endless.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet"> 
    <script src="../js/jquery-1.10.2.min.js"></script>
	<script src="../Scripts/bootstrap.min.js"></script>
	<script src='../js/jquery.dataTables.min.js'></script>

    <script>
        $(function () {
            $('#dataTable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            });

            $('#chk-all').click(function () {
                if ($(this).is(':checked')) {
                    $('#responsiveTable').find('.chk-row').each(function () {
                        $(this).prop('checked', true);
                        $(this).parent().parent().parent().addClass('selected');
                    });
                }
                else {
                    $('#responsiveTable').find('.chk-row').each(function () {
                        $(this).prop('checked', false);
                        $(this).parent().parent().parent().removeClass('selected');
                    });
                }
            });
        });
    </script>
<style type="text/css">
th
{
	color:white;
}
</style>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
</head>
<body>
<?php 
	include 'adminheader.php';

?>
<div class="container">
<div class="row">
<center>
<center><p style="font-size:50px;color:orange; font-family:lucida handwriting;"><b>Question details</b></p></center>
<form action="prodis.php" method="post">

<table class="table table-striped" id="dataTable" >
<thead>

<tr style="background-color:blue;">
	<th style="text-align:center;">Question Title
	<th>Question Date
	<th>Question Email Id
	<th>Action
	</tr>
</thead>
<tbody>
<?php 
	
		require '../database.php';
		$obj=new database();
		$res=$obj->getallquedis();
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
			echo "<tr>";
			echo '<td><center><a href="showans.php?id='.$row["pk_que_id"].'">'.$row["que_title"].'</a>';
			echo "<td><center>".$row["que_date"];
			echo "<td><center>".$row["fk_email_id"];

			echo '<td><a href="quedel.php?id='.$row["pk_que_id"].'"><span style="margin-left:10px;" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>';		

			echo "</tr>";
		}
?>
 </tbody>

		

</div>
</div>
</table>
</form>
</center>
</body>
</html>