<?php

  include ('db_session.php');

  if(!session_id())

  {

    session_start();

  }



  include ('dbconnect.php');

  header('location:newproject.php');

  //Retrive data from form and session

  $pid = $_POST['pid'];



  //Update booking into table

        $sql = "UPDATE tb_project

                SET p_status='3'

                WHERE p_id='$pid'";

        $result = mysqli_query($con,$sql);

        //var_dump($sql);


        $sql1= "DELETE FROM tb_project WHERE p_id='$pid'";

        $result1 = mysqli_query($con,$sql1) ;
        //var_dump($sql1);

  //Check SQL output  



  //Close connection

  mysqli_close($con);

?>

