
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
	<title>Engineer Details</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">


</script>

</head>
<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Search</strong>
                        </div>
                        <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="search">
                                    <p style="font-size:16px; color:red" align="center"> 
                                    <!--<?php if($msg){
                                            echo $msg;
                                                  }  ?>--></p>
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Search By loaction</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="searchdata" name="searchdata" class="form-control"  required="required" autofocus="autofocus" ></div>
                                    </div>
                                 
                                    
                                    
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="search" >Search</button></p>
                                </form>

                        <?php
                        if(isset($_POST['search']))
                        { 

                        $sdata=$_POST['searchdata'];
                         ?>
                            <h4 align ="center">Result against "<?php echo $sdata;?>" keyword </h4> 
                             <table class="table">
                            <thead>
                                <tr>
                                 <tr>
                                           <th>Sno.</th>
											<th>Engineer Name</th>
											<th>Phone number</th>
											<th>Email-id</th>
											<th>Address</th>
											<th>Location</th>
										
					
											<th>Action</th>
                                  </tr>
                                 </tr>
                            </thead>
               <?php
                  //$aid=intval($_GET['id']);
              $ret="select * from customers where location like '$sdata%'";
              $stmt= $mysqli->prepare($ret) ;
             // $stmt->bind_param('s',$aid);
              $stmt->execute() ;
              $res=$stmt->get_result();
              $cnt=1;
              while($row=$res->fetch_object())
                    {



               // $=mysqli_query("select *from  customers  where regnum like '$sdata%'");
                //$num=mysqli_num_rows($ret);
                //if($num>0){
                //$cnt=1;
                //while ($row=mysqli_fetch_array($ret)) {

                ?>
              
                <tr>
                  <td><?php echo $cnt;?></td>

                  <td><?php  echo $row['name'];?></td>
                  <td><?php  echo $row['phone'];?></td>
                  <td><?php  echo $row['email'];?></td>
                  <td><?php  echo $row['address'];?></td>
                  <td><?php  echo $row['location'];?></td>
                  
                  
                  <td><a href="view-incomingvehicle-detail.php?viewid=<?php echo $row['ID'];?>">View</a></td>
                </tr> 
                          <?php
                             $cnt=$cnt+1;
							} ?>
											
								</table>
                                <?php  }?>
								
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

</body>

</html>