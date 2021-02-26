<?php
  include ('db_session.php');
  include ('dbconnect.php');
  
  if(!session_id())
  {
    session_start();
  }

  $pid = $_POST['pid'];
  $cfeedtype = $_POST['cfeedtype'];
  $cfeedqty = $_POST['cfeedqty'];
  $cdeathqty = $_POST['cdeathqty'];
  $ccullsqty = $_POST['ccullsqty'];
  $cdesc = $_POST['cdesc'];

  header('location:dailyrecordview.php?id='.$pid);

  $sql = "INSERT INTO tb_chicken(c_dateRec,c_feedType,c_feedQty,c_deathQty,c_cullsQty,c_desc,c_status,c_id)
          VALUES ('".date("Y-m-d")."','$cfeedtype','$cfeedqty','$cdeathqty','$ccullsqty','$cdesc','2','$pid')";
  //var_dump($sql);
  $result = mysqli_query($con,$sql);

  $sql2 = "SELECT * FROM tb_record WHERE r_id='$pid'";
  //var_dump($sql2);
  $result2 = mysqli_query($con,$sql2);
  $row2 = mysqli_fetch_array($result2);
  
  $die = $cdeathqty + $ccullsqty;
  $current = $row2['r_currentQty'] - $die;

  $livability = ($current / $row2['r_chickenQty']) * 100;
  $mortality = 100 - $livability;

  $sql3 = "UPDATE tb_record
           SET r_currentQty='$current', r_livability='$livability', r_mortality='$mortality'
           WHERE r_id='$pid'";
  //var_dump($sql3);
  $result3 = mysqli_query($con,$sql3);
  
  if(date("Y-m-d") == $row2['r_nextDate'])
  {
    $cavgweight = $_POST['cavgweight'];

    $sql4 = "UPDATE tb_chicken
             SET c_avgWeight='$cavgweight'
             WHERE c_id='$pid'";
    //var_dump($sql4);
    $result4 = mysqli_query($con,$sql4);
    
    $rdate = date("Y-m-d");
    $nextdate = strtotime("+7 day",strtotime($rdate));
    $sql1 = "UPDATE tb_record
             SET r_date='$rdate', r_nextDate='".date("Y-m-d",$nextdate)."'
             WHERE r_id='$pid'";
    //var_dump($sql1);
    $result1 = mysqli_query($con,$sql1);
  }

  mysqli_close($con);
?>