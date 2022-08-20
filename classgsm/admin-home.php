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
<body>
	
</body>
	<nav class="navbar navbar-inverse">
  		<div class="container">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#"></a>
		    </div>
		    <ul class="nav navbar-nav navbar-right">
		       <li><a href="admin-home.php">View All Calls</a></li>
		       <li><a href="add-base.php">Add Base Stations</a></li>
		        <li><a href="view-base.php">Add Base Stations</a></li>
		        <li><a href="logout.php">Logout</a></li>
		    </ul>
	  </div>
	</nav>
	<div class="container-fluid">
		<div class="row" id="mynav">
			</div><!--End col-sm-3-->
			<div class="col-md-12">
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