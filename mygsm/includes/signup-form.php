<?php 

	if (isset($_POST['signup']) && !empty($_POST['signup'])) {
		$screenName = $_POST['screenName'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$error = '';
		if (empty($screenName) or empty($email) or empty($password)) {
			$error = "Please fill all fields";
		}else{
			$screenName = $getFromU->cleanInput($screenName);
			$email = $getFromU->cleanInput($email);
			$password = $getFromU->cleanInput($password);
			if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
				$error = "Invalid Format";
			}else if (strlen($screenName) > 25 or strlen($screenName) < 5) {
				$error = "screen name must be between 5 and 25 characters";
			}else if(strlen($password) < 5){
				$error = "password is too short";
			}else{
				if ($getFromU->checkEmail($email)) {
					$error = "Email already exist";
				}else{
					$getFromU->registerUser($email, $password, $screenName);
					header("Location:signup.php?step=1");
				}
			}
		}
	}

 ?>


<form method="post">
<div class="signup-div"> 
	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Password"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for Twitter">
		</li>
	</ul>
	<?php 
		if (isset($error)):?>
	 		<li class="error-li" style = 'list-style-type: none;'>
	 		 <div class="span-fp-error"><?php echo $error; ?></div>
		    </li> 
	<?php endif; ?>
</div>
</form>