<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');

check_login();
//code for add courses
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['contactNo'];
$stmt=$mysqli->prepare("SELECT name,email,contactNo FROM eng-assigne WHERE (name=?|| email=?) ");
				$stmt->bind_param('ss',$name,$email);
				$stmt->execute();
				$stmt -> bind_result($name,$email,$phone);
				echo "<script> alert('email send successfully');</script>";

} 

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
	<title>Assigne Engineer</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
</head>
<body>

	<div class="ts-main-content">
	<?php include('includes/header.php');?>
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Assigne Engineer</h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Assigne Engineer</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">


								<div class="hr-dashed"></div>
								<div class="form-group">
							<label class="col-sm-2 control-label">Customer-regnum</label>
							<div class="col-sm-8">
									<input type="text" class="form-control" name="regnum" id="regnum" value="" required="required">
						 </div>
						 </div>
								
						<div class="form-group">
						<label class="col-sm-2 control-label">Engineer name </label>
							<div class="col-sm-8">
								<input type="text"  name="name" value="" id="name"  class="form-control"> </div>
						</div>

						 <div class="form-group">
							<label class="col-sm-2 control-label">Email-id</label>
							<div class="col-sm-8">
									<input type="text" class="form-control" name="email" id="email" value="" required="required">
						 </div>
						</div>
									<div class="form-group">
									<label class="col-sm-2 control-label">Phone number</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="contactNo" id="contactNo" value="" >
												</div>
											</div>


							<div class="col-sm-8 col-sm-offset-2">				
							<input class="btn btn-primary" type="submit" name="submit" value="send email">
												</div>
											</div>

										</form>

									</div>
								</div>
									
							
							</div>
						
									
							

							</div>
						</div>

					</div>
				</div> 	
				

			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</script>
</body>

</html>