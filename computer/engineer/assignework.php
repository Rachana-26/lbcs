<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Customer Details</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

</head>

<body>
	<?php include('includes/header.php');?>
	<div class="login-page bk-img" style="background-image:url(img/3.jpg);">
	<div class="ts-main-content">
			
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row" id="print">


					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">customer Details</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Details</div>
							<div class="panel-body">
			<table id="zctb" class="table table-bordered " cellspacing="0" width="100%" border="1">
									
							
									<tbody>
<?php	
 $aid=intval($_SESSION['eng_id']);
	$ret="select c.id,c.regnum,c.name,c.contactNo,c.email,c.address,c.pincode,c.location,c.service,c.time,c.date,c.payment,c.status from 
eng_assigne ea,engdetails ed ,enggineerregistration er,customers c
where c.status=1 and 
c.id=ea.custid and
 ea.engid=ed.id and er.id=ed.ref_engid and (er.id=?)";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('s',$aid);
$stmt->execute() ;
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>

<tr>
<td colspan="5" style="color:red"><h4>Customer-Information</h4></td>
</tr>

<tr>
<td><b>Reg.number :</b></td>
<td><?php echo $row->regnum;?></td>
<td><b>name :</b></td>
<td><?php echo $row->name;?></td>
<td><b>phone :</b></td>
<td><?php echo $row->contactNo;?></td>

</tr>


<tr>
<td><b>Email :</b></td>
<td><?php echo $row->email;?></td>
<td><b> address:</b></td>
<td><?php echo $row->address;?></td>
<td><b>Area pincode :</b></td>
<td><?php echo $row->pincode;?></td>
</tr>


<tr>
<td><b>location :</b></td>
<td><?php echo $row->location;?></td>
<td><b>service :</b></td>
<td><?php echo $row->service;?></td>
<td><b>time :</b></td>
<td><?php echo $row->time;?></td>
</tr>

<tr>
<td><b>date :</b></td>
<td><?php echo $row->date;?></td>
<td><b>payment:</b></td>
<td><?php echo $row->payment;?></td>
</tr>

<tr>
<td colspan="5"><a href="process_status.php?bkid=<?php echo $row->id;?>&status=2">completed</a></td>

</tr>

<tr>
<td colspan="5"><a href="process_status.php?bkid=<?php echo $row->id;?>&status=3">cancel</a></td>

</tr>

<?php
$cnt=$cnt+1;
} ?>
</tbody>
</table>
      

									
</div>
</div>
</div>
</div>
</div>
</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
 <script>
$(function () {
$("[data-toggle=tooltip]").tooltip();
    });
function CallPrint(strid) {
var prtContent = document.getElementById("print");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
</body>

</html>
