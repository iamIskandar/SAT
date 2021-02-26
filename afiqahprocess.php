<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

  include ('dbconnect.php');

  $pid = $_POST['pid'];
  $hsellingprice = $_POST['hsellingprice'];
  $havgweight = $_POST['havgweight'];
  $hqty = $_POST['hqty'];

  $sql3 = "SELECT * FROM tb_project WHERE p_id='$pid'";
  $result3 = mysqli_query($con,$sql3);
  $row3 = mysqli_fetch_array($result3);

  //header('location:inprogress.php');

  $sql = "INSERT INTO tb_harvest(h_date, h_sellingPrice, h_avgWeight, h_qty, h_id)
          VALUES ('".date("Y-m-d")."','$hsellingprice','$havgweight','$hqty','$pid')";
  //var_dump($sql);
  $result = mysqli_query($con,$sql);

    $sql4 = "SELECT * FROM tb_record WHERE r_id='$pid'";
    //var_dump($sql4);
    $result4 = mysqli_query($con,$sql4);
    $row4 = mysqli_fetch_array($result4);
    $tambah = $row4['r_harvestQty'] + $hqty;
   
    $sql5 = "UPDATE tb_record
            SET r_harvestQty='$tambah'
            WHERE r_id='$pid'";
    //var_dump($sql5);
    $result5 =mysqli_query($con,$sql5);

	$sql6 = "SELECT * FROM tb_record WHERE r_id='$pid'";
    //var_dump($sql6);
    $result6 = mysqli_query($con,$sql6);
    $row6 = mysqli_fetch_array($result6);

   


   if($row6['r_harvestQty']==$row6['r_currentQty'])
   {
   	header('Location:harvest.php?id='.$pid);
   }
   else
   {
   	header('Location:inprogress.php');
   }

     //var_dump($sql6);
  mysqli_close($con);
?>