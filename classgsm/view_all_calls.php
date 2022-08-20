<?php include 'core/init.php'; ?>
<?php 
	if (isset($_POST['call']) && !empty($_POST['call'])) {
		$callerno = $_POST['callerno'];
		$calledno = $_POST['calledno'];
		if (!empty($callerno) or !empty($calledno)) {
			$callerno = $getFromU->cleanInput($callerno);
			$calledno = $getFromU->cleanInput($calledno);
			$_SESSION['callerno'] = $callerno;
			$_SESSION['calledno'] = $calledno;
			header("Location:begincall.php");
		}else{
				$error = "Please Enter Your username or Password";
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
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</head>
<body>
	<nav class="navbar navbar-inverse">
  		<div class="container">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">GSM Management</a>
		    </div>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="active"><a href="#">Home</a></li>
		       <li><a href="view_all_call.php">View Call Log</a></li>
		    </ul>
	  </div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<img src="assets/images/airtime.png" alt="" width = "400" height="300" style="margin-top:20px;">
			</div>
			<div class="col-md-8">
				<h2 class="text-success" style="font-weight: bold;margin-bottom:20px;">Call Log</h2>
					<?php
								echo "<table class = 'table table-striped  table-hover table-bordered'><tr><th>Start Time</th><th>Duration</th><th>Date</th><th>Destination</th><th>Phone Number</th></tr>";

								$email = $_SESSION['email'];
								$stm = $pdo->prepare("SELECT * FROM calls WHERE email = :email");
								$stm->bindParam(":email", $email ,PDO::PARAM_STR);
								$stm->execute();
								if ($stm->rowCount() > 0) {
									while($rows = $stm->fetchObject()):?>
										<tr>
											<td style = 'color:red'><?php echo $rows->call_start_time ?></td>
											<td><?php echo $rows->duration ?></td>
											<td><?php echo $rows->date_of_call ?></td>
											<td style = 'color:blue'><?php echo $rows->call_destination ?></td>
											<td style = 'color:green'><?php echo $rows->phone_no ?></td>
										</tr>
									<?php endwhile; ?>

								<?php
								}
							 ?>
				</div>
		</div>
	</div>
</body>
	
	

</body>
</html>