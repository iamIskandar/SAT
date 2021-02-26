<?php
    session_start(); // Start session

    include ("dbconnect.php");

    $uid = $_POST['uid'];
    $upassword = $_POST['upassword'];
    $error = "Incorrect ID or Password.Try again";

    $sql = "SELECT * FROM tb_user WHERE u_id= '$uid' AND u_password='$upassword'";
    $result = mysqli_query($con,$sql); 
    $row=mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);

    if($count == 1)
    {

        $_SESSION['u_id'] = session_id();
        $_SESSION['uid'] = $uid; //to store user id

        if($row['u_id']=='adminsat')
        {
            header ('Location: adminstatistic.php?id='.$uid);
        }
        else
        {
            header ('Location: inprogress.php');
        }
    }
    else 
    {
        $_SESSION["error"] = $error;

        header('Location:loginpage.php');
    }

    mysqli_close($con);

?>