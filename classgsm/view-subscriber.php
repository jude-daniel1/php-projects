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
					<a href = "admin-home.php" style="color:white;font-size:20px; font-weight: bolder;"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a>
				</div>
				<div class="col-sm-12 drop">
					<a href="add-subscriber.php" style="color:white;"><i class="fa fa-user-times"></i>&nbsp;Add Subscriber</a>
				</div>

				<div class="col-sm-12 drop">
					<a href="view-subscriber.php" style="color:white;background-color:
#5cb85c;padding:10px 25px;"><i class="fa fa-yelp"></i>&nbsp;View Subscriber</a>
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
			</div>
			<div class="col-md-9">
				<div class="col-sm-10 col-sm-offset-1" style="background-color:white;">
					<div style="margin-bottom: 30px;">
						<h3 class="text-success" style="font-weight: bold;">View Subscribers</h3>
					</div>
					<table class="table table-primary">
						<thead>
							<th>lastname</th>
							<th>firstname</th>
							<th>sub_email</th>
							<th>dob</th>
							<th>sex</th>
							<th>password</th>
						</thead>
						<tbody>
							<?php 
							$stm = $pdo->prepare("SELECT * FROM subscriber");
							$stm->execute();
							if ($stm->rowCount() > 0) {
								while($rows = $stm->fetchObject()){
									echo "<tr>";
									echo "<td>$rows->lastname</td>";
									echo "<td>$rows->firstname</td>";
									echo "<td>$rows->sub_email</td>";
									echo "<td>$rows->dob</td>";
									echo "<td>$rows->sex</td>";
									echo "<td>$rows->password</td>";
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