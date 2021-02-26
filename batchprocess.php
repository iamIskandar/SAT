<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

  include ('dbconnect.php');

  $pid = $_POST['pid'];
  $btime = $_POST['btime'];
  $bqty = $_POST['bqty'];
  $bdeathqty = $_POST['bdeathqty'];
  $bavgweight = $_POST['bavgweight'];
  $add = $_POST['add'];

  $sql3 = "SELECT * FROM tb_project WHERE p_id='$pid'";
  $result3 = mysqli_query($con,$sql3);
  $row3 = mysqli_fetch_array($result3);

  $sql = "INSERT INTO tb_batch(b_date, b_time, b_qty, b_deathQty, b_avgWeight, b_id)
          VALUES ('".date("Y-m-d")."','$btime','$bqty','$bdeathqty','$bavgweight','$pid')";
  //var_dump($sql);
  $result = mysqli_query($con,$sql);

  if(!$add)
  {
    header('location:inprogress.php');
    $nextdate = strtotime("+7 day",strtotime(date("d-m-y")));
    $sql2 = "INSERT INTO tb_record(r_date, r_nextDate, r_id, r_chickenQty, r_currentQty)
            VALUES ('".date("Y-m-d")."', '".date('Y-m-d',$nextdate)."', '$pid', '$bqty', '$bqty')";
    //var_dump($sql2);
    $result2 = mysqli_query($con,$sql2);

    $sql1 = "UPDATE tb_project
             SET p_status='5'
             WHERE p_id='$pid'";
    //var_dump($sql1);
    $result1 = mysqli_query($con,$sql1);
  }
  else
  {
    header('location:dailyrecordview.php?id=$pid');
    $sql4 = "SELECT * FROM tb_record WHERE r_id='$pid'";
    //var_dump($sql4);
    $result4 = mysqli_query($con,$sql4);
    $row4 = mysqli_fetch_array($result4);
    $tambah = $row4['r_chickenQty'] + $bqty;
    $tambah2 = $row4['r_currentQty'] + $bqty;

    $sql5 = "UPDATE tb_record
            SET r_chickenQty='$tambah', r_currentQty='$tambah2'
            WHERE r_id='$pid'";
    //var_dump($sql5);
    $result5 =mysqli_query($con,$sql5);
  }

  mysqli_close($con);
?>