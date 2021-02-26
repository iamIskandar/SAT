<?php

session_start();
include ('dbconnect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SAT Sdn Bhd</title>
	<link rel="stylesheet" href="main40.css">
<style>
body {
  background-image: url("img/daun.jpeg");
}
</style>

</head>
<body>
	<form method="POST" class="login-form" action="changepasswordconfirmationprocess.php ">
		<h2 class="form-title">Reset password</h2>
		<!-- form validation messages -->
		<!-- <?php include('messages.php'); ?> -->
		<div class="form-group">
			<label>Enter Your ID</label>
			<input type="text" name="uid">
		</div>

        </div>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="password">New Password</label>
						<input type="password" name="upassword" id="upassword" class="input-text" >
					</div>

		
		<div class="form-group">
			<button type="submit" name="reset-password" class="login-btn">Submit</button>
		</div>


		<?php
	        if(isset($_SESSION["success"])){
	            $success = $_SESSION["success"];
	            echo "<span style='color: green;'>$success</span>";
	        }
	        else if(isset($_SESSION["error"])){
	            $error = $_SESSION["error"];
	            echo "<span style='color: red;'>$error</span>";
	        }
	        else
	        {
	           	echo"";
	    	}
	    ?>
	</form>
	<br>
	<br>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<a href="index.php">Home page</a>



</body>
</html>