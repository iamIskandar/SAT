<?php

  include ('db_session.php');

  if(!session_id())

  {

    session_start();

  }



  include ('dbconnect.php');

  

  //Retrive data from form and session

  $fwno = $_POST['fwno'];

  $pid = $_POST['pid'];

  $fwdate = $_POST['fwdate'];

  $fwdesc = $_POST['fwdesc'];

  header('Location:fieldworklistview.php?id='.$pid);



  //Update booking into table

  $sql1 = "UPDATE tb_fieldwork

           SET fw_date='$fwdate', fw_desc='$fwdesc'

           WHERE fw_no='$fwno'";



  $result = mysqli_query($con,$sql1);

  //var_dump($sql);

?>