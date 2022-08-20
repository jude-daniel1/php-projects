<?php include 'core/init.php';  ?>
<?php
	if (isset($_POST['add']) && !empty($_POST['add'])) {
			$nsp = $getFromU->cleanInput($_POST['nsp']);
			$city = $getFromU->cleanInput($_POST['city']);
			$state = $getFromU->cleanInput($_POST['state']);
			$no_of_channels = $getFromU->cleanInput($_POST['no_of_channels']);
			$no_of_connection = $getFromU->cleanInput($_POST['no_of_connection']);

		if (empty($nsp) or empty($city) or empty($state) or empty($no_of_channels) or empty($no_of_connection)) {
			$error = "Please fill all fields";
		}else{
			$getFromU->registerBaseStations($nsp,$city,$state,$no_of_channels,$no_of_connection);
			echo "<script>";
			echo "alert('Base Station addeded successfully')";
			echo "</script>";
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="assets/css/font/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.css"/>
		<link rel="stylesheet" href="assets/css/style-complete.css"/>
</head>
<body style="background:#222;">
	
</body>
	<nav class="navbar navbar-inverse"></nav>
	<div class="container-fluid">
		<div class="row" id="mynav">
			<div class="col-md-3">
				<div class="col-sm-12 drop">
					<a style="color:white;font-size:20px; font-weight: bolder;"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a>
				</div>
				<div class="col-sm-12 drop">
					<a href="add-subscriber.php" style="color:white;"><i class="fa fa-user-times"></i>&nbsp;Add Subscriber</a>
				</div>

				<div class="col-sm-12 drop">
					<a href="view-subscriber.php" style="color:white;"><i class="fa fa-yelp"></i>&nbsp;View Subscriber</a>
				</div>
				<div class="col-sm-12 drop">
					<a href="add-base.php" style="color:white;background-color:
#5cb85c;padding:10px 25px;"><i class="fa fa-user-times"></i>&nbsp;Add Base Station</a>
				</div>
				<div class="col-sm-12 drop">
					<a href="view-base.php" style="color:white;"><i class="fa fa-random"></i>&nbsp;View Base Station</a>
				</div>
				<div class="col-sm-12 drop">
					<a href="add-admin.php" style="color:white;"><i class="fa fa-users"></i>&nbsp;Add Admin</a>
				</div>
				<div class="col-sm-12 drop">
					<a href="view-admin.php" style="color:white;"><i class="fa fa-university"></i>&nbsp;View Admin</a>
				</div>


				<div class="col-sm-12 drop">
					<a href="logout.php" style="color:white;"><i class="fa fa-undo"></i>&nbsp;Logout</a>
				</div>
				
			</div>
			<div class="col-md-8">
				<div class="col-sm-10 col-sm-offset-1" style="background-color:white;">
					<form action="add-base.php" method="POST">
					<div class="form-group" style="padding: 0px 10px;margin-bottom: 30px;">
						<h3 class="text-success" style="font-weight: bold">Add Base Station</h3>
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="text" name="nsp" class="form-control" id="nsp" placeholder="Add Network Service Provider">
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="city" name="city" class="form-control" id="city" placeholder="Enter City">
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="text" name="state" class="form-control" id="state" placeholder="Enter State">
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="text" name="no_of_channels" class="form-control" id="no_of_channels" placeholder="Number of Channels" style="margin-top:30px;">
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="text" name="no_of_connection" class="form-control" id="no_of_connection" placeholder="Number of Connection" style="margin-top:30px;">
					</div>

					<div class="form-group" style="padding: 0px 10px;" >
						<input type="submit" name="Add Base Station" value="Add" class="btn btn-success" />
					</div>

					<div class="form-group" style="padding: 0px 10px;" >
						<span style="color:red;">
							<?php if (isset($error)): ?>
							  <?php echo $error ?>
							<?php endif; ?>
						</span>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>