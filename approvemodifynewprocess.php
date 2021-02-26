<?php
  include ('db_session.php');
  include ('dbconnect.php');

  if(!session_id())
  {
    session_start();
  }
  header('location:modifyapprovallist.php');
  
  $pid= $_POST['pid'];
  $tfun= $_POST['tfun'];

  $sql = "SELECT * FROM tb_temporary
          WHERE t_fun = '$tfun'";
  //var_dump($sql);
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);

  $daterec = $row['t_dateRec'];
  $feedtype = $row['t_feedType'];
  $feedqty = $row['t_feedQty'];
  $deathqty = $row['t_deathQty'];
  $cullsqty = $row['t_cullsQty'];
  $avgweight = $row['t_avgWeight'];
  $desc = $row['t_desc'];

  $sql2 = "INSERT tb_chicken(c_dateRec,c_feedType,c_feedQty,c_deathQty,c_cullsQty,c_avgWeight,c_desc,c_status,c_id)
          VALUES ('$daterec','$feedtype','$feedqty','$deathqty','$cullsqty','$avgweight','$desc','2','$pid')";
  //var_dump($sql2);
  $result2 = mysqli_query($con,$sql2);

  $sql2 = "SELECT * FROM tb_record WHERE r_id='$pid'";
  //var_dump($sql2);
  $result2 = mysqli_query($con,$sql2);
  $row2 = mysqli_fetch_array($result2);
  
  $die = $deathqty + $cullsqty;
  $current = $row2['r_currentQty'] - $die;

  $livability = ($current / $row2['r_chickenQty']) * 100;
  $mortality = 100 - $livability;

  $sql3 = "UPDATE tb_record
           SET r_currentQty='$current', r_livability='$livability', r_mortality='$mortality'
           WHERE r_id='$pid'";
  //var_dump($sql3);
  $result3 = mysqli_query($con,$sql3);

  $sql1 = "DELETE FROM tb_temporary WHERE t_fun='$tfun'";
  //var_dump($sql2);
  $result1 = mysqli_query($con,$sql1);

  mysqli_close($con);
?>