<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

  include ('dbconnect.php');
 header('location:closed.php');


 if(isset($_GET['id']))
  {
    $bid= $_GET['id'];
  }

  //Update booking into table
        $sql = "UPDATE tb_project
                SET p_status='6'
                WHERE p_id='$bid'";
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
//        var_dump($sql);
        
  //Check SQL output  

  //Close connection
  mysqli_close($con);
?>
