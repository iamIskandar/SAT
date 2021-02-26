<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }
  
  include ('dbconnect.php');

  $pid = $_POST['pid'];
  $cdaterec = $_POST['cdaterec'];
  $cfeedtype = $_POST['cfeedtype'];
  $cfeedqty = $_POST['cfeedqty'];
  $cdeathqty = $_POST['cdeathqty'];
  $ccullsqty = $_POST['ccullsqty'];
  $cdesc = $_POST['cdesc'];
  $cavgweight = $_POST['cavgweight'];

  $sql3 = "SELECT * FROM tb_project WHERE p_id='$pid'";
  //var_dump($sql3);
  $result3 = mysqli_query($con,$sql3);
  $row3 = mysqli_fetch_array($result3);

  header('Location:pending.php');

  $sql = "INSERT INTO tb_temporary(t_dateRec, t_feedType, t_feedQty, t_deathQty, t_cullsQty, t_desc, t_avgWeight, t_submitDate, t_status,t_id)
  		  VALUES ('$cdaterec', '$cfeedtype', '$cfeedqty', '$cdeathqty', '$ccullsqty', '$cdesc', '$cavgweight','".date("Y-m-d")."', '1', '$pid')";
  //var_dump($sql);
  $result = mysqli_query($con, $sql);

mysqli_close($con);
?>