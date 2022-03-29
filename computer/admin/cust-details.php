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
	<div class="login-page bk-img" style="background-image: url(img/r.jpg);">
	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row" id="print">


					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">Assigne work</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Details</div>
							<div class="panel-body">
			<table id="zctb" class="table table-bordered " cellspacing="0" width="100%" border="1">
									
							
									<tbody>
<?php	
$aid=intval($_GET['id']);
	$ret="select * from customers where (id	=?)";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('s',$aid);
$stmt->execute() ;
$res=$stmt->get_result();
$cnt=1;
$cust_pincode=0;
$cust_service="";
										$status=0;
while($row=$res->fetch_object())
	  {
	$status=$row->status;
	  	?>

<tr>
<td colspan="5" style="color:red"><h4>Customer-Information</h4></td>
</tr>

<tr>
<td><b>Reg.number :</b></td>
<td><?php echo $row->regnum;?></td>
<td><b>Name :</b></td>
<td><?php echo $row->name;?></td>
<td><b>ContactNo :</b></td>
<td><?php echo $row->contactNo;?></td>
</tr>


<tr>
<td><b>Email :</b></td>
<td><?php echo $row->email;?></td>
<td><b> Address:</b></td>
<td><?php echo $row->address;?></td>
<td><b>Area pincode :</b></td>
<td><?php echo $row->pincode;
	
	$cust_pincode=$row->pincode;
	?></td>
</tr>


<tr>
<td><b>Location :</b></td>
<td><?php echo $row->location;?></td>
<td><b>Service :</b></td>
<td><?php echo $row->service;
	
	$cust_service=$row->service;
	?></td>
<td><b>Time :</b></td>
<td><?php echo $row->time;?></td>
</tr>

<tr>
<td colspan="1"><b>Date :</b></td>
<td colspan="2"><?php echo $row->date;?></td>

<td ><b>Payment:</b></td>
<td  colspan="2"><?php echo $row->payment;?></td>

</tr>


<?php
$cnt=$cnt+1;
} ?>
</tbody>
</table>
								
				<script>
					var custid1=0;
					var enginid1=0;
				function assign_eng(custid,enginid)
					{
						
					 custid1=custid;
					 enginid1=enginid;
						
						
						document.getElementById("assign_btn").innerHTML="<a href='allcode.php?custid="+custid1+"&engid="+enginid1+"&type=assign'>Assign Now</a>";
					
					}
					function assign_now()
					{
						
					}
				</script>
      

									<!--<div class="text-dark">
							        <a href="assigne.php" class="bg-primary text-white"> .assigne engineer.</a>

<a href="manage-eng.php?id=<?php //echo $row->id;?>" title="View Full Details"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;-->
								<?php
								
								
								if($status==0)
								{
								$conn=open_conn();
$sql = 'SELECT id,name from engdetails Where profession="'.$cust_service.'" and pincode="'.$cust_pincode.'"';
$retval = mysqli_query($conn,$sql);
if(! $retval )
{
//die('Could not enter data: ' .mysqli_error($conn));
echo seller_log('PAGE_NAME',$sql,$function_name." ".mysqli_error($conn),$conn);
}
								
									
									
								echo '
								
								
								<table style="width:100%" border=1><tr><th>Select service person</th><th><select id="engid" onchange="assign_eng('.$aid.',this.value)"><option value="">--Select--</option>';
								$found_status=0;
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
{
	$found_status=1;

echo '<option value="'.$row['id'].'""> '.$row['name'].'</option>';
}
								echo '</select></th></tr></table>
								<div id="assign_btn"></div> 
								';
								if($found_status==0)
								{
									echo '<h4 style="color:red">No service person found</h4>';
								}
					close_conn($conn);	
								}
								else
								{
									echo '<h4 style="color:red">Work Already assigned</h4>';
								}
								?>
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
