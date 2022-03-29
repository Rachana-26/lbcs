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
	<title>View Details</title>
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
<?php include('includes/headercust.php');?>
<div class="login-page bk-img" style="background-image:url(img/g.jpg);">
	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row" id="print"> 

					
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:3%"> Details</h2>
						
						<div class="panel panel-default"style="width:40%;height:40%">
							
							<div class="panel-body" style="width:90%;height:70%">
			<table id="zctb" class="table table-bordered " cellspacing="0" width="100%" >
									
						 <!--<span style="float:left" ><i class="fa fa-print fa-2x" aria-hidden="true" 
						 OnClick="CallPrint(this.value)" style="cursor:pointer" title="Print the Report"></i></span>-->			
									<tbody>

									
<?php	

 $aid=$_SESSION['custid'];
   $ret="select * from customers where ref_cust=?";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('s',$aid);
$stmt->execute() ;
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>


<tr>
<td><b>Name:</b></td>
<td><?php echo $row->name;?></td>
</tr>

<tr>
<td><b>ContactNo :</b></td>
<td><?php echo $row->contactNo;?></td>
</tr>
<tr>
<td><b>Email-id :</b></td>
<td><?php echo $row->email;?></td>
</tr>
<tr>
<td><b>Address:</b></td>
<td><?php echo $row->address;?></td>
</tr>
<tr>
<td><b>Pincode:</b></td>
<td><?php echo $row->pincode;?></td>
</tr>
<tr>
<td><b>Location:</b></td>
<td><?php echo $row->location;?></td>
</tr>
<tr>
<td><b>Service:</b></td>
<td><?php echo $row->service;?></td>
</tr>
<tr>
<td><b>Time:</b></td>
<td><?php echo $row->time;?></td>
</tr>
<tr>
<td><b>Date :</b></td>
<td><?php echo $row->date;?></td>
</tr>
<tr>
<td><b>Payment :</b></td>
<td><?php echo $row->payment;?></td>
</tr>


<?php
if($row->status==0)
echo '<tr>
<td><b>status :</b></td>
<td>pending</td>
</tr>
';
if($row->status==1)
echo '<tr>
<td><b>status :</b></td>
<td>assigned</td>
</tr>
'; 
if($row->status==2)
echo '<tr>
<td><b>status :</b></td>
<td>completed</td>
</tr>
';
if($row->status==3)
echo '<tr>
<td><b>status :</b></td>
<td>cancelled</td>
</tr>
';
?>

<div> <th> <td> </td> </th> </div>


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
