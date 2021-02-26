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
  $fid = $_POST['fid'];
  $pname = $_POST['pname'];
  $pdateDoc = $_POST['pdateDoc'];
  $pdateHarvest = $_POST['pdateHarvest'];
  $pqtyDoc = $_POST['pqtyDoc'];

    $sql="SELECT * FROM tb_farm WHERE f_id='$fid'";
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
    $row=mysqli_fetch_array($result);

    if($result)
    {
      echo "your form was submitted.";
      //var_dump($sql);
      $sql1="UPDATE tb_project 
             SET p_name='$pname', p_dateDoc='$pdateDoc', p_dateHarvest='$pdateHarvest', p_qtyDoc='$pqtyDoc', p_no='".$row['f_no']."' 
             WHERE p_id='$pid'";
      $result1=mysqli_query($con,$sql1) or die(mysqli_error($con));

      if($result1)
      {
        echo "your form was submitted.";
        //var_dump($sql1);
      }
      else
      {
        echo "your form was not submitted.";
      }
    }
    else
    {
      echo "your form was not submitted.";
    }

  //Close connection
  mysqli_close($con);
?>
