<?php include 'core/init.php';  ?>

<?php
	if (isset($_POST['add']) && !empty($_POST['add'])) {
			$lastname = $getFromU->cleanInput($_POST['lastname']);
			$firstname = $getFromU->cleanInput($_POST['firstname']);
			$sub_email = $getFromU->cleanInput($_POST['sub_email']);
			$dob = $getFromU->cleanInput($_POST['dob']);
			$sex = $getFromU->cleanInput($_POST['sex']);
			$password = $getFromU->cleanInput($_POST['password']);
			

		if (empty($lastname) or empty($firstname) or empty($sub_email) or empty($dob) or empty($sex) or empty($password)) {
			$error = "Please fill all fields";
		}else{

			if (!(filter_var($sub_email, FILTER_VALIDATE_EMAIL))) {
				$error = "Invalid Format";
			}
			else if(strlen($password) < 5){
				$error = "password is too short";
			}else{
				if ($getFromU->checkSubEmail($sub_email)) {
					$error = "Email already exist";
				}else{
					
					$getFromU->registerSubscriber($lastname,$firstname,$sub_email,$dob,$sex,$password);
					echo "<script>";
					echo "alert('Subscriber added Successfully')";
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
					<a href="add-subscriber.php" style="color:white;background-color:
#5cb85c;padding:10px 25px;"><i class="fa fa-user-times"></i>&nbsp;Add Subscriber</a>
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
			</div>
			<div class="col-md-9">
				<div class="col-sm-10 col-md-offset-1" style="background-color:white;">
					<form action="add-subscriber.php" method="POST">
					<div class="form-group" style="padding: 0px 10px;margin-bottom: 30px;">
						<h3 class="text-success" style="font-weight: bold;">Add Subscribers</h3>
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="text" name="lastname" class="form-control" id="Lastname" placeholder="Subscriber Lastname">
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="text" name="firstname" class="form-control" id="firstname" placeholder="Subscriber firstname">
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="email" name="sub_email" class="form-control" id="admin_email" placeholder="Admin Email">
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth">
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<select name="sex" id="sex" class="form-control">
							<option value="0">Choose your sex</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>

					<div class="form-group" style="padding: 0px 10px;">
						<input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" style="margin-top:30px;">
					</div>

					<div class="form-group" style="padding: 0px 10px;" >
						<input type="submit" name="add" value="Add Subscriber" class="btn btn-success" />
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