<!DOCTYPE html>
<html>
<head>
<title>Category Display</title>
	
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
	color:blue;
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
<div class="container"
<div class="row" >
<div class="col-md-10 col-md-offset-1">
<table class="table" id="dataTable">



<thead>
<center>
<center><p style="font-size:50px;color:Orange; font-family:Lucida handwriting;">Category Name</p></center>
<tr style="background-color:blue; ">
	<th style="color:white; ">Category Name
	<th style="text-align:center; color:white;">Action
</tr>

</thead>
<tbody>

<?php 
		require '../database.php';
		$obj=new database();
		$res=$obj->getsub();
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
			echo "<tr>";
			echo "<td>".$row["sub_name"];				
			
?>	

<td><center><a href="catedit.php?id='.$row["pk_sub_id"].'">

			<a href="catdel.php?id=<?php echo $row["pk_sub_id"] ?>" onclick="return checkDelete()">
			<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></center>		
			
		<?php					
			echo "</tr>";
		}

		?>
		</tbody>

</table>
</div>
</div>

</div>
</body>
</html>