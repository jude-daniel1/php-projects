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
	<nav class="navbar navbar-default">
  		<div class="container">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#" style="font-weight: bold;font-size:30px;">MYGSM</a>
		    </div>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="active"><a href="#">Home</a></li>
		       <li><a href="a-index.php">Admin</a></li>
		    </ul>
	  </div>
	</nav>
	<div class="container" style="margin-top:-20px;" id="image">
		
	</div>

	<div class="col-md-6 col-md-offset-3" style="padding-bottom: 50px;padding-top:30px;">
		<form action="index.php" method="POST" style="padding:10px 30px;">
			<div style="background-color: #435072;height: 35px; width:100%;margin-bottom: 30px;">
				<p style="font-weight: bold;color:white;font-family: monospace;margin-left: 20px;padding-top:5px; font-weight: 20px;">Login Subscriber</p>
			</div>

			<div class="form-group" style="padding: 0px 10px;">
				<input type="text" name="email" class="form-control" id="name" placeholder="Email">
			</div>

			<div class="form-group" style="padding: 0px 10px;">
				<input type="password" name="password" class="form-control" id="password" placeholder="Password">
			</div>

			<div class="form-group" style="padding: 0px 10px;" >
				<input type="submit" name="login" value="Login" class="btn" style="background-color: #435072; color:white;padding:6px 20px;" />
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