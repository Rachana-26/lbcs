<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<?PHP if(isset($_SESSION['eng_id']))
				{ ?>
					<!--<li><a href="dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>-->
<li><a href="dashboard.php"><i class="fa fa-file-o"></i>Dashboard</a></li>
<li><a href="my-profile.php"><i class="fa fa-file-o"></i>view Details</a></li>
<li><a href=" assignework.php"><i class="fa fa-file-o"></i> Assigned work</a></li>

<!--<li><a href="my-profile.php"><i class="fa fa-user"></i> My Profile</a></li>-->
<!--<li><a href="change-password.php"><i class="fa fa-files-o"></i>Change Password</a></li>-->
<!--<li><a href="access-log.php"><i class="fa fa-file-o"></i>Access log</a></li>-->
<?php } ?>
				
			</ul>
		</nav>