<?php
  include ('db_session.php');
  include ('dbconnect.php');

  if(!session_id())
  {
    session_start();
  }

  header('location:modifyapprovallist.php');

  $cno= $_POST['cno'];

  $sql2 = "UPDATE tb_chicken
           SET c_status = '2'
           WHERE c_no = '$cno'";
  //var_dump($sql2);
  $result2 = mysqli_query($con,$sql2);

  $sql1 = "DELETE FROM tb_temporary WHERE t_no='$cno'";
  //var_dump($sql2);
  $result1 = mysqli_query($con,$sql1);

  mysqli_close($con);
?>