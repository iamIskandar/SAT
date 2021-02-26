<?php

	session_start();

	include ('dbconnect.php');


?>

<!DOCTYPE html>

<html lang="en">

<head>

	<title>Smart Agric Trading</title>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="mobile.css">

<!--===============================================================================================-->	

	<link rel="icon" type="image/png" href="images1/icons/favicon.ico"/>

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="vendor1/bootstrap/css/bootstrap.min.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="fonts1/font-awesome-4.7.0/css/font-awesome.min.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="fonts1/Linearicons-Free-v1.0.0/icon-font.min.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="vendor1/animate/animate.css">

<!--===============================================================================================-->	

	<link rel="stylesheet" type="text/css" href="vendor1/css-hamburgers/hamburgers.min.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="vendor1/animsition/css/animsition.min.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="vendor1/select2/select2.min.css">

<!--===============================================================================================-->	

	<link rel="stylesheet" type="text/css" href="vendor1/daterangepicker/daterangepicker.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="css1/util.css">

	<link rel="stylesheet" type="text/css" href="css1/main.css">

<!--===============================================================================================-->

</head>

<body style="background-image: url('img/daun.jpeg'); background-repeat: no-repeat;background-position:center center; background-attachment: fixed; background-size: cover; background-size: 100% 100%;">

	

	<div class="limiter">

		<div class="container-login100">

			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">

				<form class="login100-form validate-form flex-sb flex-w" action="loginprocess.php" method="POST">

					<span class="login100-form-title p-b-32">

						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLOGIN

					</span>



					<span class="txt1 p-b-11">

						User ID

					</span>

					<div class="wrap-input100 validate-input m-b-32" data-validate = "User ID is required">

						<input class="input100" type="text" name="uid" id="uid" placeholder="Enter User ID" required="required">

						<span class="focus-input100"></span>

					</div>

					

					<span class="txt1 p-b-11">

						Password

					</span>

					<div class="wrap-input100 validate-input m-b-32" data-validate = "Password is required">

						<span class="btn-show-pass" >

							<i class="fa fa-eye" onclick="myFunction()"></i>

						</span>

						<input class="input100" type="password" name="upassword" id="upassword" placeholder="Enter Password" required="required">

						<span class="focus-input100"></span>

					</div>



					<script>

					function myFunction() {

					  var x = document.getElementById("upassword");

					  if (x.type === "password") {

					    x.type = "text";

					  } else {

					    x.type = "password";

					  }

					}

					</script>

					<?php

	                    if(isset($_SESSION["error"])){

	                        $error = $_SESSION["error"];

	                        echo "<span style='color: red;'>$error</span>";

	                    }

	                    else

	                    {

	                    	echo"";

	                    }

	                ?> <br><br>


					<div class="container-login100-form-btn">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<br>
						<br>

						<button class="login100-form-btn">

							Login

						</button>



								<br><br>
							

						

					</div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<a href="changepassword.php"><strong><u>Forgot password?</u></strong></a>
					<a href="index.php"><strong><u>Home page</u></strong></a>

					

				</form>

			</div>

		</div>

	</div>

	



	<div id="dropDownSelect1"></div>

	

<!--===============================================================================================-->

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<!--===============================================================================================-->

	<script src="vendor/animsition/js/animsition.min.js"></script>

<!--===============================================================================================-->

	<script src="vendor/bootstrap/js/popper.js"></script>

	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!--===============================================================================================-->

	<script src="vendor/select2/select2.min.js"></script>

<!--===============================================================================================-->

	<script src="vendor/daterangepicker/moment.min.js"></script>

	<script src="vendor/daterangepicker/daterangepicker.js"></script>

<!--===============================================================================================-->

	<script src="vendor/countdowntime/countdowntime.js"></script>

<!--===============================================================================================-->

	<script src="js/main.js"></script>



</body>

</html>