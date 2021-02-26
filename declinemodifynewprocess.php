<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

  include ('dbconnect.php');
  header('location:modifyapprovallist.php');

  $tfun= $_POST['tfun'];

  $sql1 = "DELETE FROM tb_temporary WHERE t_fun='$tfun'";
  $result1 = mysqli_query($con,$sql1);
  //var_dump($sql2);

  mysqli_close($con);

?>