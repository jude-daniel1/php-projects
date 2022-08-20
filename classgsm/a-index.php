<?php 
	include 'core/init.php';
	 if (isset($_SESSION['admin_email']) and !empty($_SESSION['admin_email'])) {
	 		header("Location:admin-home.php");
	 	}

	if (isset($_POST['login']) && !empty($_POST['login'])) {
		
		$email = $getFromU->cleanInput($_POST['email']);
		$password = $getFromU->cleanInput($_POST['password']);

		if (!empty($email) or !empty($password)) {
			$password = md5($password);
			if($getFromU->adminLogin($email, $password) == false){
					$error = "email or password does not match";
				}

			}else{
				$error = "Please Enter Your email or Password";
			}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
		<link rel="stylesheet" href="assets/css/bootstrap.css"/>
		<link rel="stylesheet" href="assets/css/style-complete.css"/>
</head>
<body>
	
</body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4" style="border:2px solid white; border-radius: 20px; margin-top:150px;">
				<form action="a-index.php" method="POST">
					<div class="form-group" style="padding: 0px 10px;">
						<label for="email" style="font-weight: bold;font-size: 20px; margin-top:10px;">Login Admin</label>
					</div>
					<div class="form-group" style="padding: 0px 10px;">
						<input type="email" name="email" class="form-control" id="email" placeholder="Admin Email">
					</div>
					<div class="form-group" style="padding: 0px 10px;">
						<input type="password" name="password" class="form-control" id="password" placeholder="Password" style="margin-top:30px;">
					</div>

					<div class="form-group" style="padding: 0px 10px;" >
						<input type="submit" name="login" value="Log in" class="btn btn-success" />
					</div>

					<div class="form-group" style="padding: 0px 10px;" >
						<span style="color:red;"><?php if (isset($error)): ?>
							  <?php echo $error ?>
							<?php endif; ?>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>