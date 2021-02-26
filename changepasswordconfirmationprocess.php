<?php 

	session_start();
	include ('dbconnect.php');

	header('Location: changepasswordconfirmation.php');
   
    $uid=$_POST['uid'];
	$upassword =$_POST['upassword'];
	$success = "Your password have changed! You are now ready to login.";
    $error = "User ID not found! Please try again.";
	
	$sql1="SELECT * FROM tb_user 
			LEFT JOIN tb_farm ON tb_user.u_no=tb_farm.f_no
			WHERE f_status='2'";
	//var_dump($sql1);
	$result1=mysqli_query($con,$sql1) or die(error());

	$pass=0;
		
	while($row1=mysqli_fetch_array($result1))
	{
		if($row1['u_id']==$uid)
		{
			$sql="UPDATE tb_user
				  SET u_password='$upassword'
				  WHERE u_id = '$uid'";
			//var_dump($sql);
			$result= mysqli_query($con,$sql);
			$pass=1;
			$_SESSION["success"] = $success;
		}
	}
	if(!$pass)
	{
		$_SESSION["error"] = $error;
	}
	
 ?>