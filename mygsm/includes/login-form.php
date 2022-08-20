<?php 
	if (isset($_POST['login']) && !empty($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		if (!empty($email) or !empty($password)) {
			$email = $getFromU->cleanInput($email);
			$password = $getFromU->cleanInput($password);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error = "Invalid Email";
			}else{
				$password = md5($password);
				if($getFromU->loginUser($email, $password) == false){
					$error = "email or password does not match";
				}
			}

		}else{
			$error = "Please Enter Your Username or Password";
		}
	}

 ?>

<div class="login-div">
<form method="post"> 
	<ul>
		<li>
		  <input type="text" name="email" placeholder="Please enter your Email here"/>
		</li>
		<li>
		  <input type="password" name="password" placeholder="password"/><input type="submit" name="login" value="Log in"/>
		</li>
		<li>
		  <input type="checkbox" Value="Remember me">Remember me
		</li>
	</ul>
	<?php if (isset($error)):?>
	 <li class="error-li" style="list-style-type: none;">
	  <div class="span-fp-error"><?php echo $error; ?></div>
	 </li> 
	<?php endif; ?>
	</form>
</div>