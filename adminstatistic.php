<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

  include ('sessionadmin.php');
  include 'header.php';
  include ('dbconnect.php');


$sql = "SELECT * FROM tb_avg";
$result = mysqli_query($con,$sql);
    
?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Analytics</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $sqlavgliv = "SELECT * FROM tb_record";
                  //var_dump($sqlpro);
                  $resultavgliv = mysqli_query($con,$sqlavgliv);

                  $count = 0;
                  $livability = 0;
                  while($rowavgliv = mysqli_fetch_array($resultavgliv))
                  {
                    $livability = $livability+$rowavgliv['r_livability'];
                    $count = $count+1;
                  }
                  $avglivability = $livability/$count;
               ?>
                <h2 style="text-align: center;"><br>Liveability</h2><br>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="farmliveability.php" class="small-box-footer">View&nbsp<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php 
                  $sqlavgmor = "SELECT * FROM tb_record";
                  //var_dump($sqlpro);
                  $resultavgmor = mysqli_query($con,$sqlavgmor);

                  $count = 0;
                  $mortality = 0;
                  while($rowavgmor = mysqli_fetch_array($resultavgmor))
                  {
                    $mortality = $mortality+$rowavgmor['r_mortality'];
                    $count = $count+1;
                  }
                  $avgmortality = $mortality/$count;
                ?>
                <h2 style="text-align: center;"><br>Mortality</h2><br>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="farmmortality.php" class="small-box-footer">View&nbsp<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php 
                  $sqlavgfcr = "SELECT * FROM tb_report";
                  //var_dump($sqlpro);
                  $resultavgfcr = mysqli_query($con,$sqlavgfcr);

                  $count = 0;
                  $fcr = 0;
                  while($rowavgfcr = mysqli_fetch_array($resultavgfcr))
                  {
                  $fcr = $fcr+$rowavgfcr['fcr'];
                  $count = $count+1;
                  }

                  $avgfcr = $fcr/$count;
                ?>
                <h2 style="text-align: center;"><br>FCR</h2><br>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="farmfcr.php" class="small-box-footer">View&nbsp<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $sqlavgpi = "SELECT * FROM tb_report";
                  //var_dump($sqlpro);
                  $resultavgpi = mysqli_query($con,$sqlavgpi);

                  $count = 0;
                  $pi = 0;
                  while($rowavgpi = mysqli_fetch_array($resultavgpi))
                  {
                    $pi = $pi+$rowavgpi['pi'];
                    $count = $count+1;
                  }
                  
                  $avgpi = $pi/$count;
                ?>
                <h2 style="text-align: center; font-size: 30px;"><br>Performance Index</h2><br>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="farmpi.php" class="small-box-footer">View&nbsp<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-pink">
              <div class="inner">
                <?php 
                  $sqlavggross = "SELECT * FROM tb_report";
                  //var_dump($sqlpro);
                  $resultavggross = mysqli_query($con,$sqlavggross);

                  $count = 0;
                  $gross = 0;
                  while($rowavggross = mysqli_fetch_array($resultavggross))
                  {
                    $gross = $gross+$rowavggross['gross'];
                    $count = $count+1;
                  }
                  $avggross = $gross/$count;
                ?>
                <h2 style="text-align: center;"><br>Gross</h2><br>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="farmgross.php" class="small-box-footer">View&nbsp<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-4 col-6">
            <div class="small-box bg-purple">
              <div class="inner">
                <?php 
                   $sqlavgnet = "SELECT * FROM tb_report";
                  //var_dump($sqlpro);
                  $resultavgnet = mysqli_query($con,$sqlavgnet);

                  $count = 0;
                  $net = 0;
                  while($rowavgnet = mysqli_fetch_array($resultavgnet))
                  {
                    $net = $net+$rowavgnet['fcr'];
                    $count = $count+1;
                  }
                  $avgnet = floatval($net/$count);
                ?>
                <h2 style="text-align: center;"><br>Nett</h2><br>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="farmnett.php" class="small-box-footer">View&nbsp<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
      

<?php include 'footer.php';?>

