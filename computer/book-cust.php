<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
include('computer/email/sendEmail.php');
check_login();
//code for add courses
if(isset($_POST['submit']))
{
	if($_SESSION['custid'])
	{
	$regnum=mt_rand(100000000, 999999999);
	$name=$_POST['name'];
	$contactNo=$_POST['contactNo'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$pincode=$_POST['pincode'];
	$location=$_POST['location'];
	$service=$_POST['service'];
	$time=$_POST['time'];
	$date=$_POST['date'];
	$payment=$_POST['payment'];

	$time=$_POST['time'];
	$query="insert into  customers (ref_cust,regnum,name,contactNo,email,address,pincode,location,service,time,date,payment) values(?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssssssssssss',$_SESSION['custid'],$regnum,$name,$contactNo,$email,$address,$pincode,$location,$service,$time,$date,$payment);
$stmt->execute();
send_email($name,$email,'booking','<p><b>Your booking is confirmed </b></p> ');
echo"<script>alert('Booked successfully');</script>";
}
else
{
echo"<script>alert('try to login ');</script>";
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
	<meta name="theme-color" content="#87CEFA">
	<title>Book your service</title>
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
	<?php include('includes/headercust.php');?>
	<div class="login-fullpage bk-img" style="background-image:url(img/g.jpg);">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Book your service </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary" style="width:80%;height:80%">
									
									<div class="panel-body" style="width:100%;height:50%">
										<form method="post" class="form-horizontal">
											
											<div class="hr-dashed"></div>

											<div class="form-group">
										
 													<label class="col-sm-2 control-label">Name </label>
												<div class="col-sm-8">
													<input type="text"  name="name" id="name"  class="form-control"
													pattern="{a-z A-Z}" title="Enter character only" value="" > </div>
											</div>
										
											<div class="form-group">
												<label class="col-sm-2 control-label">Contact-number</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="contactNo" id="contactNo" value=""
													pattern="^\d{10}$" title="Enter 10 digits only"  >
						 
												</div>
											</div>
									<div class="form-group">
									<label class="col-sm-2 control-label">Email-id</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="email" value="" id="email"
									pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
									title="Must contain at least one number and one uppercase and lowercase letter, 
									and at least 8 or more characters"  >
												</div>
											</div>
											
											<div class="form-group">
									<label class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8">
									<textarea  cols="40" class="form-control" name="address" value="" maxlength="100" id="address"></textarea>
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
									<label class="col-sm-2 control-label">Service</label>
									<div class="col-sm-8">
									  <select class="form-control" name="service" id="service">
                    						<option value="none">Select service  </option>
                    						<option value="Desktop Repair">Desktop Repair</option>
                    						<option value="Networking Service">Networking Service</option>
                    						<option value="AMC Services">AMC Services</option>
                    				</select>
                					</div>
									</div>

									<div class="form-group">
									<label class="col-sm-2 control-label">Time Slot</label>
									<div class="col-sm-8">
									<select name="time" id="time" class="form-control" required>
									<option value="">Choose Time Slot</option>
									<option value="9 AM - 12 PM">9 AM - 12 PM</option>
									<option value="12 AM - 3 PM">12 AM - 3 PM</option>
									<option value="3 PM - 6 PM">3 PM - 6 PM</option>
									<option value="6 PM - 9 PM">6 PM - 9 PM</option>
								</select>
                              </div>
							  </div>


									<div class="form-group">
									<label class="col-sm-2 control-label">Date</label>
									<div class="col-sm-8">
								
									<input type="date" class="form-control" name="date" id="date" placeholder="dd-mm-yyyy" 
									value="" min="2021-06-21" max="2030-12-31">
												</div>
											</div>
											
											
									<div class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-8">
									<h4><p>Scan the QR code to pay <b>100</b> rupees as the service charges USE "GOOGLE PAY" </p></h4>
									<h6><p style="color:red">*Amount will not be refunded*</p><h6>

									<img src="img/qrcode_r.jpg" style="width:300px;max-height:500px">
												</div>
											</div>		

											<div class="form-group">
									<label class="col-sm-2 control-label">Enter payment transction number</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="payment" id="payment" required>
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