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
			<div class="col-md-8 col-md-offset-2">
					<div style="margin-bottom:30px;"> <h3 class="text-success" style="font-weight: bold;">View Base Stations</h3></div>
					<table class="table table-primary">
						<thead>
							<th>base_id</th>
							<th>nsp</th>
							<th>city</th>
							<th>state</th>
							<th>no_of_channels</th>
							<th>no_of_connection</th>
						</thead>
						<tbody>
							<?php 
							$stm = $pdo->prepare("SELECT * FROM base_station");
							$stm->execute();
							if ($stm->rowCount() > 0) {
								while($rows = $stm->fetchObject()){
									echo "<tr>";
									echo "<td>$rows->base_id</td>";
									echo "<td>$rows->nsp</td>";
									echo "<td>$rows->city</td>";
									echo "<td>$rows->state</td>";
									echo "<td>$rows->no_of_channels</td>";
									echo "<td>$rows->no_of_connection</td>";
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