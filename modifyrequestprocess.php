<?php
  include('db_session.php');
  if (!session_id())
  {
    session_start();
  }

include ('dbconnect.php');

$cno = $_POST['cno'];
$cfeedtype = $_POST['cfeedtype'];
$cfeedqty = $_POST['cfeedqty'];
$cdeathqty = $_POST['cdeathqty'];
$ccullsqty = $_POST['ccullsqty'];
$cdesc = $_POST['cdesc'];

$sql3 = "SELECT * FROM tb_chicken WHERE c_no='$cno'";
//var_dump($sql3);
$result3 = mysqli_query($con,$sql3);
$row3 = mysqli_fetch_array($result3);

header('Location:pending.php');

$sql = "INSERT INTO tb_temporary(t_submitDate, t_dateRec,t_feedType,t_feedQty,t_deathQty,t_cullsQty,t_desc,t_no)
        VALUES ('".date("Y-m-d")."','".$row3['c_dateRec']."','$cfeedtype','$cfeedqty','$cdeathqty','$ccullsqty','$cdesc','$cno')";
//var_dump($sql);
$result= mysqli_query($con, $sql);

$sql1 = "UPDATE tb_chicken
        SET c_status='1'
        WHERE c_no='$cno'";
//var_dump($sql1);
$result1 = mysqli_query($con,$sql1);

if($row3['c_avgWeight'])
{
  $cavgweight = $_POST['cavgweight'];
  $sql2 = "UPDATE tb_temporary
        SET t_avgWeight='$cavgweight'
        WHERE t_no='$cno'";
  //var_dump($sql2);
  $result2 = mysqli_query($con,$sql2);
}

mysqli_close($con);
?>