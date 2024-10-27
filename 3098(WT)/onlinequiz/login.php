<?php
	require('database.php');
	session_start();
	if(isset($_SESSION["email"]))
	{
		session_destroy();
	}
	
	$ref=@$_GET['q'];		
	if(isset($_POST['submit']))
	{	
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$email = stripslashes($email);
		$email = addslashes($email);
		$pass = stripslashes($pass); 
		$pass = addslashes($pass);
		$email = mysqli_real_escape_string($con,$email);
		$pass = mysqli_real_escape_string($con,$pass);					
		$str = "SELECT * FROM user WHERE email='$email' and password='$pass'";
		$result = mysqli_query($con,$str);
		if((mysqli_num_rows($result))!=1) 
		{
			echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
			header("refresh:0;url=login.php");
		}
		else
		{
			$_SESSION['logged']=$email;
			$row=mysqli_fetch_array($result);
			$_SESSION['name']=$row[0];
			$_SESSION['college']=$row[1];
			$_SESSION['email']=$row[2];
			$_SESSION['password']=$row[3];

			header('location: welcome.php?q=1'); 					
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Login | Online Quiz System</title>
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="css/animation.css">
        <style type="text/css">
            /* body{
                  width: 100%;
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                } */
          </style>
	</head>

	<body>
	<div class="backwrap gradient">
  <div class="back-shapes">
      <!-- All this img tags was autogenerated by custom written js tool -->
      <span class="floating circle" style="top:66.59856996935649%;left:13.020833333333334%;animation-delay:-0.9s;"></span>
      <span class="floating triangle" style="top:31.46067415730337%;left:33.59375%;animation-delay:-4.8s;"></span>
      <span class="floating cross" style="top:76.50663942798774%;left:38.020833333333336%;animation-delay:-4s;"></span>
      <span class="floating square" style="top:21.450459652706844%;left:14.0625%;animation-delay:-2.8s;"></span>
      <span class="floating square" style="top:58.12053115423902%;left:56.770833333333336%;animation-delay:-2.15s;"></span>
      <span class="floating square" style="top:8.682328907048008%;left:72.70833333333333%;animation-delay:-1.9s;"></span>
      <span class="floating cross" style="top:31.3585291113381%;left:58.541666666666664%;animation-delay:-0.65s;"></span>
      <span class="floating cross" style="top:69.96935648621042%;left:81.45833333333333%;animation-delay:-0.4s;"></span>
      <span class="floating circle" style="top:15.117466802860061%;left:32.34375%;animation-delay:-4.1s;"></span>
      <span class="floating circle" style="top:13.074565883554648%;left:45.989583333333336%;animation-delay:-3.65s;"></span>
      <span class="floating cross" style="top:55.87334014300306%;left:27.135416666666668%;animation-delay:-2.25s;"></span>
      <span class="floating cross" style="top:49.54034729315628%;left:53.75%;animation-delay:-2s;"></span>
      <span class="floating cross" style="top:34.62717058222676%;left:49.635416666666664%;animation-delay:-1.55s;"></span>
      <span class="floating cross" style="top:33.19713993871297%;left:86.14583333333333%;animation-delay:-0.95s;"></span>
      <span class="floating square" style="top:28.19203268641471%;left:25.208333333333332%;animation-delay:-4.45s;"></span>
      <span class="floating circle" style="top:39.7344228804903%;left:10.833333333333334%;animation-delay:-3.35s;"></span>
      <span class="floating triangle" style="top:77.83452502553627%;left:24.427083333333332%;animation-delay:-2.3s;"></span>
      <span class="floating triangle" style="top:2.860061287027579%;left:47.864583333333336%;animation-delay:-1.75s;"></span>
      <span class="floating triangle" style="top:71.3993871297242%;left:66.45833333333333%;animation-delay:-1.25s;"></span>
      <span class="floating triangle" style="top:31.256384065372828%;left:76.92708333333333%;animation-delay:-0.65s;"></span>
      <span class="floating triangle" style="top:46.47599591419816%;left:38.90625%;animation-delay:-0.35s;"></span>
      <span class="floating cross" style="top:3.4729315628192032%;left:19.635416666666668%;animation-delay:-4.3s;"></span>
      <span class="floating cross" style="top:3.575076608784474%;left:6.25%;animation-delay:-4.05s;"></span>
      <span class="floating cross" style="top:77.3237997957099%;left:4.583333333333333%;animation-delay:-3.75s;"></span>
      <span class="floating cross" style="top:0.9193054136874361%;left:71.14583333333333%;animation-delay:-3.3s;"></span>
      <span class="floating square" style="top:23.6976506639428%;left:63.28125%;animation-delay:-2.1s;"></span>
      <span class="floating square" style="top:81.30745658835546%;left:45.15625%;animation-delay:-1.75s;"></span>
      <span class="floating square" style="top:60.9805924412666%;left:42.239583333333336%;animation-delay:-1.45s;"></span>
      <span class="floating square" style="top:29.009193054136876%;left:93.90625%;animation-delay:-1.05s;"></span>
      <span class="floating square" style="top:52.093973442288046%;left:68.90625%;animation-delay:-0.7s;"></span>
      <span class="floating square" style="top:81.51174668028601%;left:83.59375%;animation-delay:-0.35s;"></span>
      <span class="floating square" style="top:11.542390194075587%;left:91.51041666666667%;animation-delay:-0.1s;"></span>
 
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
						<center> <h5 style="font-family: Noto Sans;">Login to </h5><h4 style="font-family: Noto Sans;">Online Quiz System</h4></center><br>
							<form method="post" action="login.php" enctype="multipart/form-data">
								<div class="form-group">
									<label>Enter Your Email Id:</label>
									<input type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label class="fw">Enter Your Password:
										<a href="javascript:void(0)" class="pull-right">Forgot Password?</a>
									</label>
									<input type="password" name="password" class="form-control">
								</div> 
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Login</button>
								</div>
								<div class="form-group text-center">
									<span >Don't have an account?</span> <a href="register.php">Register</a> Here..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		</div>
</div>

		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>