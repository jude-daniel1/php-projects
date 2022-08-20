<?php 
	include 'core/init.php';
	if (isset($_POST['login']) && !empty($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		if (!empty($email) or !empty($password)) {
			$email = $getFromU->cleanInput($email);
			$password = $getFromU->cleanInput($password);
			$password = md5($password);
			if($getFromU->loginSubcriber($email, $password) == false){
					$error = "email or password does not match";
				}

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
</head>
<body>

	<div class="col-md-8" style="height:800px; background-color: #222">
		<h2 style="color:white; font-weight: bold; font-family: monospace; margin-top: 200px; font-size: 35px;margin-left: 50px;">CALL CONGESTION MONITORING SYSTEM</h2>
	</div>

	<div class="col-md-4">
		<form action="index.php" method="POST">
			<div class="form-group">
				<h3 style="font-weight: bold; margin-top:100px;margin-bottom: 30px;color:#222">Sign In Subscriber</h3>
			</div>

			<div class="form-group" style="padding: 0px 10px;">
				<input type="text" name="email" class="form-control" id="name" placeholder="Email">
			</div>

			<div class="form-group" style="padding: 0px 10px;">
				<input type="password" name="password" class="form-control" id="password" placeholder="Password">
			</div>

			<div class="form-group" style="padding: 0px 10px;" >
				<input type="submit" name="login" value="Login" class="btn" style="background-color: #222; color:white;padding:6px 20px;" />
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
</body>
	
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>