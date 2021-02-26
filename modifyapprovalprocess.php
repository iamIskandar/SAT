<?php

  include('db_session.php');



  if (!session_id())

  {

    session_start();

  }





include ('dbconnect.php');

// header('Location: modifyapproval.php');

if(isset($_GET['id']))

  {

    $pid = $_GET['id'];

  }

//Retrieve data from form and session

// $cno = $_SESSION['c_no'];

$pid = $_POST['pid'];

// $cdaterec = $_POST['cdaterec'];

$cfeedqty = $_POST['cfeedqty'];

$cdeathqty = $_POST['cdeathqty'];

$cdesc = $_POST['cdesc'];



//Update daily record into table

$sql = "UPDATE tb_chicken

        SET c_feedqty='$cfeedqty',c_deathqty='$cdeathqty',

        c_desc='$cdesc'

        WHERE c_status='2'AND c_id='$pid'";

//Check SQL output

 var_dump($sql);



//Execute SQL

$result= mysqli_query($con, $sql);



//Close connection

mysqli_close($con);



?>