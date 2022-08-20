<?php include 'core/init.php';  ?>
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
					<a href = "admin-home.php" style="color:white;font-size:20px; font-weight: bolder;background-color:
#5cb85c;padding:10px 25px;"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a>
				</div>
				<div class="col-sm-12 drop">
					<a href="add-subscriber.php" style="color:white;"><i class="fa fa-user-times"></i>&nbsp;Add Subscriber</a>
				</div>

				<div class="col-sm-12 drop">
					<a href="view-subscriber.php" style="color:white;"><i class="fa fa-yelp"></i>&nbsp;View Subscriber</a>
				</div>
				<div class="col-sm-12 drop">
					<a href="add-base.php" style="color:white;"><i class="fa fa-user-times"></i>&nbsp;Add Base Station</a>
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
			</div><!--End col-sm-3-->
			<div class="col-md-9">
				<div class="col-sm-10 col-sm-offset-1" style="background-color:white;">
					<h3 class="text-success" style="font-weight: bold;margin-bottom:20px;">All Calls</h3>
					<table class="table table-striped table-hover">
						<thead>
							<th>call_id</th>
							<th>call_start_time</th>
							<th>duration</th>
							<th>date_of_call</th>
							<th>call_destination</th>
							<th>phone_no</th>
							<th>email</th>
							<th>base_id</th>
						</thead>
						<tbody>
							<?php 
							$stm = $pdo->prepare("SELECT * FROM calls");
							$stm->execute();
							if ($stm->rowCount() > 0) {
								while($rows = $stm->fetchObject()){
									echo "<tr>";
									echo "<td>$rows->call_id</td>";
									echo "<td>$rows->call_start_time</td>";
									echo "<td>$rows->duration</td>";
									echo "<td>$rows->date_of_call</td>";
									echo "<td>$rows->call_destination</td>";
									echo "<td>$rows->phone_no</td>";
									echo "<td>$rows->email</td>";
									echo "<td>$rows->base_id</td>";
									echo "</tr>";
								}
							}
								
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>