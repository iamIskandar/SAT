<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

  include ('dbconnect.php');
 header('location:adminapprove.php');
  //Retrive data from form and session
  $fno = $_POST['fno'];

  //Update booking into table
        $sql = "UPDATE tb_farm
                SET f_status='3'
                WHERE f_no='$fno'";
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        //var_dump($sql);
        
  //Check SQL output  

  //Close connection
  mysqli_close($con);
?>
