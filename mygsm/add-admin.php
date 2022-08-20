<?php include 'core/init.php';  ?>

<?php
	if (isset($_POST['add']) && !empty($_POST['add'])) {
			$lastname = $getFromU->cleanInput($_POST['lastname']);
			$firstname = $getFromU->cleanInput($_POST['firstname']);
			$admin_email = $getFromU->cleanInput($_POST['admin_email']);
			$password = $getFromU->cleanInput($_POST['password']);
			$base_id = $getFromU->cleanInput($_POST['base_id']);

		if (empty($lastname) or empty($firstname) or empty($admin_email) or empty($password) or empty($base_id)) {
			$error = "Please fill all fields";
		}else{

			if (!(filter_var($admin_email, FILTER_VALIDATE_EMAIL))) {
				$error = "Invalid Format";
			}
			else if(strlen($password) < 5){
				$error = "password is too short";
			}else{
				if ($getFromU->checkAdminEmail($admin_email)) {
					$error = "Email already exist";
				}else{
					
					$getFromU->registerAdmin($lastname,$firstname, $admin_email,$password,$base_id);
					echo "<script>";
					echo "alert('Admin addeded successfully')";
					echo "</script>";
				}
			}
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
					<a href = "admin-home.php" style="color:white;font-size:20px; font-weight: bolder;"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a>
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
					<a href="add-admin.php" style="color:white;background-color:
#5cb85c;padding:10px 25px;"><i class="fa fa-users"></i>&nbsp;Add Admin</a>
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
					<form action="add-admin.php" method="POST">
					<div class="form-group" style="padding: 0px 10px;margin-bottom: 30px;">
						<h3 class="text-success" style="font-weight: bold;">Add Administrator</h3>
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="text" name="lastname" class="form-control" id="Lastname" placeholder="Admin Lastname">
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="text" name="firstname" class="form-control" id="firstname" placeholder="Admin firstname">
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="email" name="admin_email" class="form-control" id="admin_email" placeholder="Admin Email">
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" style="margin-top:30px;">
					</div>

					<div class="form-group" style="padding: 0px 10px;">

							<select name="base_id" id="base_id" class="form-control">
								<option value="num1">Choose Base Station</option>
								<?php 
								$stm = $pdo->prepare("SELECT base_id FROM base_station");
								$stm->execute();
								if ($stm->rowCount() > 0) {
									while($rows = $stm->fetchObject()):?>
										<option value = "<?php echo $rows->base_id ?>"><?php echo $rows->base_id ?></option>";
									<?php endwhile; ?>

								<?php
								}
							 ?>
								
							</select>
						</div>

					<div class="form-group" style="padding: 0px 10px;" >
						<input type="submit" name="add" value="Add Admin" class="btn btn-success" />
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