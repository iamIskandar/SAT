<?php
  include ('db_session.php');
  include ('dbconnect.php');

  if(!session_id())
  {
    session_start();
  }

  header('location:modifyapprovallist.php');

  $cno= $_POST['cno'];

  $sql = "SELECT * FROM tb_temporary
          WHERE t_no = '$cno'";
  //var_dump($sql);
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  
  $tfeedtype = $row['t_feedType'];
  $tfeedqty = $row['t_feedQty'];
  $tdeathqty = $row['t_deathQty'];
  $tcullsqty = $row['t_cullsQty'];
  $tdesc = $row['t_desc'];

  $sql3 = "SELECT * FROM tb_chicken
           WHERE c_no = '$cno'";
  //var_dump($sql3);
  $result3 = mysqli_query($con,$sql3);
  $row3 = mysqli_fetch_array($result3);

  $cfeedtype = $row3['c_feedType'];
  $cfeedqty = $row3['c_feedQty'];
  $cdeathqty = $row3['c_deathQty'];
  $ccullsqty = $row3['c_cullsQty'];
  $cdesc = $row3['c_desc'];

  $sql4 = "SELECT * FROM tb_record WHERE r_id='".$row3['c_id']."'";
  //var_dump($sql4);
  $result4 = mysqli_query($con,$sql4);
  $row4 = mysqli_fetch_array($result4);
  
  $die = ($tdeathqty-$cdeathqty) + ($tcullsqty-$ccullsqty);
  $current = $row4['r_currentQty'] - $die;

  $livability = ($current / $row4['r_chickenQty']) * 100;
  $mortality = 100 - $livability;

  $sql5 = "UPDATE tb_record
           SET r_mortality='$mortality', r_livability='$livability', r_currentQty='$current'
           WHERE r_id='".$row3['c_id']."'";
  //var_dump($sql5);
  $result5 = mysqli_query($con,$sql5);

  $sql2 = "UPDATE tb_chicken
           SET c_feedType='$tfeedtype', c_feedQty='$tfeedqty', c_deathQty='$tdeathqty', c_desc='$tdesc', c_status = '2'
           WHERE c_no = '$cno'";
  //var_dump($sql2);
  $result2 = mysqli_query($con,$sql2);

  $sql1 = "DELETE FROM tb_temporary WHERE t_no='$cno'";
  //var_dump($sql1);
  $result1 = mysqli_query($con,$sql1);

  mysqli_close($con);
?>