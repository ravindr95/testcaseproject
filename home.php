<?php 
session_start();

if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
{
	?>
	<!DOCTYPE html>
<html>
<head>
	<title>admin panel</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script type="text/javascript" src="assests/js/jquery.js"></script>
	<script src="assets/js/bootstrap.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				
				<ul>
					<li style="float:right;list-style:none"><a href="logout.php"><h4>Logout</h4></li>
				</ul>
				
			</div>
		</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-3">
			<div class="jumbotron">
				<a href="home.php?page=vendor"><h3>Vendor</h3></a>

		
		
			</div>
			
		</div>
		<div class="col-md-9">
		<?php 
		if(isset($_GET['page']))
		{
			$page = $_GET['page'];

			switch($page)
			{
				case 'vendor': include('vendor.php');
				break;
				case 'addvendor': include('addvendor.php');
				break;
				default : echo 'Page not found';
			}
		}



		 ?>
		</div>
		</div>
	</div>
</body>
</html>

	<?php
}
else
{
	header('location:index.php');
}


 ?>