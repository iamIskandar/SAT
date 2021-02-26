<?php
  include ('db_session.php');
  include ('dbconnect.php');

  if(!session_id())
  {
    session_start();
  }

  $bid = $_POST['bid'];
  $ocstarterprice = $_POST['ocstarterprice'];
  $occrumbleprice = $_POST['occrumbleprice'];
  $ocgrowerprice = $_POST['ocgrowerprice'];
  $ocmedicprice = $_POST['ocmedicprice'];
  $ocwages = $_POST['ocwages'];
  $ocrental = $_POST['ocrental'];
  $ocfmaintainence = $_POST['ocfmaintainence'];
  $ocutility = $_POST['ocutility'];
  $ocsawdust = $_POST['ocsawdust'];
  $ocfuel = $_POST['ocfuel'];
  $ocmachinery = $_POST['ocmachinery'];
  $ocmmaintainence = $_POST['ocmmaintainence'];
  $ocoffmanagement = $_POST['ocoffmanagement'];
  $ocgas = $_POST['ocgas'];
  $ocother = $_POST['ocother'];

  header('location:viewreport.php?id='.$bid);

  $sqlpro = "SELECT * FROM tb_harvest WHERE h_id='$bid'";
  //var_dump($sqlpro);
  $resultpro = mysqli_query($con,$sqlpro);

  $count = 0;
  $weight = 0;
  while($rowpro = mysqli_fetch_array($resultpro))
  {
    $weight = $weight+$rowpro['h_avgWeight'];
    $count = $count+1;
  }
  $avgweight = $weight/$count;
  echo"avg weight=".$avgweight;

  $sqlhar = "SELECT * FROM tb_record WHERE r_id='$bid'";
  //var_dump($sqlhar);
  $resulthar= mysqli_query($con,$sqlhar);
  $rowhar=mysqli_fetch_array($resulthar);
 
  //Calculate weight production
  $production = $avgweight * floatval($rowhar['r_harvestQty']);
  echo"<br><br>production=".$production;

  //Get total weight of feed
  $sqlfeed = "SELECT * FROM tb_chicken WHERE c_id='$bid'";
  //var_dump($sqlfeed);
  $resultfeed = mysqli_query($con,$sqlfeed);

  $feed = 0;
  while($rowfeed = mysqli_fetch_array($resultfeed))
  {
    $feed = $feed + $rowfeed['c_feedQty'];
  }

  $totalfeed = $feed * 50;
  echo"<br><br>totalfeed=".$totalfeed;
  

  //Calculate fcr
  $fcr = $totalfeed / $production;
  echo"<br><br>fcr=".$fcr;
 

  $sqlliv = "SELECT * FROM tb_record WHERE r_id='$bid'";
  //var_dump($sqlliv);
  $resultliv = mysqli_query($con,$sqlliv);
  $rowliv  =mysqli_fetch_array($resultliv);

  $sqldep = "SELECT * FROM tb_batch WHERE b_id='$bid'";
  //var_dump($sqldep);
  $resultdep = mysqli_query($con,$sqldep);
  $rowdep = mysqli_fetch_array($resultdep);

  $sqldep2 = "SELECT * FROM tb_harvest WHERE h_id='$bid'";
  //var_dump($sqldep2);
  $resultdep2 = mysqli_query($con,$sqldep2);
  $rowdep2 = mysqli_fetch_array($resultdep2);

  $daydep = date('Y-m-d',strtotime($rowdep['b_date']));
  $daydep2 = date('Y-m-d',strtotime($rowdep2['h_date']));

  $depletion = abs(strtotime($daydep2)-strtotime($daydep));
  echo"<br><br>depletion=".$depletion;

  //Calculate Performance Index of Production
  $pi = (($avgweight*floatval($rowliv['r_livability']))/($depletion*$fcr))*100;
  echo"<br><br>pi=".$pi;

  $sqlsell = "SELECT * FROM tb_harvest WHERE h_id='$bid'";
  $resultsell= mysqli_query($con,$sqlsell);
  //var_dump($sqldep2);
  $productionsell=0;
  while($rowsell= mysqli_fetch_array($resultsell))
  {
    $productionsell=$productionsell+($rowsell['h_qty']*$rowsell['h_sellingPrice']);
  }
  echo"<br><br>selling price=".$productionsell;
  
  $sqlfeedprice = "SELECT * FROM tb_chicken WHERE c_id='$bid'";
  //var_dump($sqlfeedprice);
  $resultfeedprice= mysqli_query($con,$sqlfeedprice);
  
  $starterqty=0;
  $crumbleqty=0;
  $growerqty=0;
  while($rowfeedprice= mysqli_fetch_array($resultfeedprice))
  {
    if($rowfeedprice['c_feedType']==7)
    {
      $starterqty=$starterqty+$rowfeedprice['c_feedQty'];
    }
    else if ($rowfeedprice['c_feedType']==8)
    {
      $crumbleqty=$crumbleqty+$rowfeedprice['c_feedQty'];
    }
    else 
    {
      $growerqty=$growerqty+$rowfeedprice['c_feedQty'];
    }
  }

  $hfeedprice=($starterqty*$ocstarterprice)+($crumbleqty*$occrumbleprice)+($growerqty*$ocgrowerprice);
  echo"<br><br>feed price=".$hfeedprice;

  //Calculate Profit and Loss
  $gross = ($productionsell)-(1000 + $hfeedprice + $ocmedicprice);
  echo"<br><br>gross=".$gross;

  $grossPerBird = $gross/floatval($rowliv['r_livability']);
  echo"<br><br>gross per bird=".$grossPerBird;

  $operationCost = $ocwages + $ocrental + $ocfmaintainence + $ocutility + $ocsawdust + $ocfuel + $ocmachinery + 
  $ocmmaintainence + $ocoffmanagement + $ocother;
  echo"<br><br>operation cost=".$operationCost;

  $net= $gross - $operationCost;
  echo"<br><br>net=".$net;

  $netPerBird = $net / floatval($rowliv['r_livability']);
  echo"<br><br>net per bird=".$netPerBird;

  $sql2 = "INSERT INTO tb_operationCost(oc_starterPrice, oc_crumblePrice, oc_growerPrice, oc_medicPrice, oc_wages, oc_rental, oc_fMaintainence, oc_utility, oc_sawDust, oc_fuel, oc_machinery, oc_mMaintainence, oc_offManagement, oc_gas, oc_other, oc_id)
           VALUES ('$ocstarterprice','$occrumbleprice','$ocgrowerprice','oc_medicprice','$ocwages','$ocrental','$ocfmaintainence','$ocutility','$ocsawdust','$ocfuel','$ocmachinery',
      '$ocmmaintainence','$ocoffmanagement','$ocgas','$ocother', '$bid')";
  //var_dump($sql2);
  $result2=mysqli_query($con,$sql2);

  $sql4="INSERT INTO tb_report (fcr, pi, gross, totalfeed, production, grossPerBird, operationcost, net, netPerBird,rp_id)
          VALUES ('$fcr','$pi','$gross','$totalfeed','$production','$grossPerBird','$operationCost','$netPerBird','$net','$bid')";
  //var_dump($sql4);
  $result4=mysqli_query($con,$sql4);

  $sql5 = "UPDATE tb_project
          SET p_status='6'
          WHERE p_id='$bid'";
  $result5 = mysqli_fetch_array($con,$sql5);  

  mysqli_close($con);
  
?>
