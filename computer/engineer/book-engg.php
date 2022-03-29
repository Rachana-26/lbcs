<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
include('../email/sendEmail.php');

check_login();
//code for add courses

if(isset($_POST['submit']))
{

	
	if($_SESSION['eng_id'])
	{
	 $name=$_POST['name'];
	$contactNo=$_POST['contactNo'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$pincode=$_POST['pincode'];
	$location=$_POST['location'];
	$profession=$_POST['profession'];

$query="insert into engdetails  (ref_engid,name,contactNo,email,address,pincode,location,profession) values(?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssssssss',$_SESSION['eng_id'],$name,$contactNo,$email,$address,$pincode,$location,$profession);
$stmt->execute();
send_email($name,$email,'booking','Your details are confired ');
echo"<script>alert('Details added successfully');</script>";
	}
	else
	{
		echo"<script>alert('Login once again');</script>";
		
	}
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
	<title>Engineer details</title>
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
	<div class="login-fullpage bk-img" style="background-image: url(img/3.jpg);">
	<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12"> 
					
						<h2 class="page-title text-bold text-Dark">Engineer service details </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary" style="width:80%;height:80%">
									<div class="panel-heading">Fill this details</div>
									<div class="panel-body" style="width:100%;height:50%">
										<form method="post" class="form-horizontal">
											<div style="display:none">
											<input type="number" name="en_id" id="en_id" value="<?php echo $_SESSION['id'];?>">
											</div>

										<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Name </label>
												<div class="col-sm-8">
													<input type="text" value="" name="name" id="name"  class="form-control"
													pattern="{a-z A-Z}" title="Enter character only" required>
												
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">contact-number</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="contactNo" id="contactNo" value="" 
												 pattern="^\d{}$" title="Enter 10 digits only" required>
						 
												</div>
											</div>
									<div class="form-group">
									<label class="col-sm-2 control-label">Email-id</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="email" value="" id="email"
									pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
									title="Must contain at least one number and one uppercase and lowercase letter, 
									and at least 8 or more characters" required>
												</div>
											</div>
										
											<div class="form-group">
									<label class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8">
									<textarea  cols="40" class="form-control" name="address" value="" id="address" maxlength="100"></textarea>
												</div>
											</div>


											<div class="form-group">
									<label class="col-sm-2 control-label">Location</label>
									<div class="col-sm-8">
									<script>
									function check_pincode(p)
									{
										if(p=="Davangere")
										{
										 v='<option value="">Select pincode</option><option value="577001">577001</option><option value="577002">577002</option><option value="577003">577003</option><option value="577004">577004</option><option value="577005">577005</option>';
										 document.getElementById("pincode").innerHTML=v;
										}
										else if(p=="Dharwad")
										{
										 v='<option value="">Select pincode<option value="580030">580030</option><option value="580024">580024</option><option value="580031">580031</option><option value="580020">580020</option><option value="580023">580023</option>';
										 document.getElementById("pincode").innerHTML=v;
										}
									}
									</script>
                                        <select name="location" id="location" onchange="check_pincode(this.value)" class="form-control" required>
											<option value="none">Choose Location</option>
										
											<option value="Davangere">Davangere</option>
											<option value="Dharwad">Dharwad</option>
										
										</select>
                              		</div>
									  </div> 
											<div class="form-group">
									<label class="col-sm-2 control-label">Area pindcode</label>
									<div class="col-sm-8">
									<select class="form-control" name="pincode" id="pincode">
									</select>
											</div>
											</div>


									  <div class="form-group">
									<label class="col-sm-2 control-label">Profession</label>
									<div class="col-sm-8">
									  <select class="form-control" name="profession" id="profession">
                    						<option value="none">Select profession  </option>
                    						<option value="Desktop Repair">Desktop Repair</option>
                    						<option value="Networking Service">Networking Service</option>
                    						<option value="AMC Services">AMC Services</option>
                    				</select>
                					</div>
									</div>




												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="submit">
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