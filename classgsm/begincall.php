<?php include 'core/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="assets/css/font/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.css"/>
		<link rel="stylesheet" href="assets/css/style-complete.css"/>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>


	<script type="text/javascript">
		var timeVar = setInterval(countTimer, 1000);// counter function
		var totalSeconds = 0;

		function countTimer(){
			++totalSeconds;
			var hour = Math.floor(totalSeconds / 3600);
			var minute = Math.floor((totalSeconds - hour * 3600)/60); //count minute
			var seconds = totalSeconds - (hour * 3600 + minute * 60); //
			document.getElementById("timer2").innerHTML = hour+":"+minute+":"+seconds;
			document.getElementById("timer").innerHTML = totalSeconds; //put the result in a div calld timer
		}
	</script>


	</head>
<body>
	<nav class="navbar navbar-inverse">
  		<div class="container">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">GSM Management</a>
		    </div>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="active"><a href="#">Home</a></li>
		       <li><a href="a-index.php">Admin Login</a></li>
		       <li><a href="#">Contact us</a></li>
		       <li><a href="#">About us</a></li>
		    </ul>
	  </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="row">
				<div class="col-md-6 col-md-offset-3" style="padding-top:50px; border: 1px solid green;width:500px; height:350px;">

					<h2>Start Time : <span id ="ctime"><?php echo date("h:i:sa"); ?></span></h2>
					<h2 id="callerno" style = "display: none;"><?php echo $_SESSION['callerno']; ?></h2>
					<h2 id="calledno" style = "display: none;"><?php echo $_SESSION['calledno']; ?></h2>
					<h2 id="random" style = "display: none;"><?php echo $_SESSION['random']; ?></h2>
					<h2  id="email" style="display: none;"><?php echo $_SESSION['sub_email'] ?></h2>
					<div style="font-size:70px; color:red;font-weight:bold; text-align: center"><span id = "timer2"></span></div>
					<h3 id = "timer" style="font-size:70px; color:red;font-weight:bold; text-align: center; display: none;"></h3>

					<button class ="btn-block" id="stop_timer" onclick="myfunction();"><i class="fa fa-cut" style="font-size: 50px;margin-left: 100px;">End Call</i></button>
					
					<script type="text/javascript">
						function myfunction(){
							clearInterval(timeVar);
							var duration = document.getElementById("timer").innerHTML;
							var start = document.getElementById("ctime").innerHTML;
							var callerno = document.getElementById("callerno").innerHTML;
							var calledno = document.getElementById("calledno").innerHTML;
							var email = document.getElementById("email").innerHTML;
							var random = document.getElementById("random").innerHTML;


							$.post("savecall.php", {duration:duration,start:start,callerno:callerno,calledno:calledno,email:email,random:random}, function(result){
   								alert(result);
   								document.location.href = "subscriber.php";
  							});
						}

						
							
					</script>
			</div>
		</div>
	</div>
</body>
</body>

</html>