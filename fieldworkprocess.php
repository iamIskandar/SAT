<?php

  include ('db_session.php');

  if(!session_id())

  {

    session_start();

  }



  include ('dbconnect.php');

  

  //Retrive data from form and session

  $fwid = $_POST['pid'];

  $fwdate = $_POST['fwdate'];

  $fwdesc = $_POST['fwdesc'];

  header('Location:fieldworklistview.php?id='.$fwid);



  //Update booking into table

  $sql1 = "INSERT INTO tb_fieldwork(fw_date, fw_desc, fw_id)

          VALUES('$fwdate','$fwdesc','$fwid')";



  $result = mysqli_query($con,$sql1);

  //var_dump($sql1);



  $sql2 = "SELECT * FROM tb_project WHERE p_id = '$fwid'";

  $result2 = mysqli_query($con,$sql2);

  $row2 = mysqli_fetch_array($result2);

  //var_dump($sql2);



  mysqli_close($con);

?>