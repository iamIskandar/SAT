<?php

  include ('db_session.php');

  if(!session_id())

  {

    session_start();

  }



  include 'header.php';

  include ('dbconnect.php');



  //Get booking ID

  if(isset($_GET['id']))

  {

    $pid = $_GET['id'];

  }



  //Retreave booking and JOIN

  $sql = "SELECT * FROM tb_chicken
          LEFT JOIN tb_project ON tb_chicken.c_id=tb_project.p_id
          WHERE c_status='2' AND c_id='$pid'
          ORDER BY c_dateRec DESC";
  $result = mysqli_query($con, $sql);

  $sql2 = "SELECT * FROM tb_project
          LEFT JOIN tb_user ON tb_project.p_no = tb_user.u_no
          LEFT JOIN tb_batch ON tb_project.p_id=tb_batch.b_id
          WHERE p_id='$pid'";
  $result2 = mysqli_query($con,$sql2);
  $row2 = mysqli_fetch_array($result2);

  $sql3 = "SELECT * FROM tb_batch WHERE b_id='$pid'";
  $result3 = mysqli_query($con,$sql3);

  $_SESSION['uid']=$row2['u_id'];
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>In Progress Project </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
          <br><br>
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php
                echo"<h4>Today: ".date("d-m-y")."</h4>";
              ?>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Overview</h3>
            </div>
            <div class="card-body">
              <h4>Project Details</h4>
              <table class="table table-hover">
                <tbody>
                  <tr><td><b>Name: </b><?php echo $row2['p_name'];?></td></tr>
                  <tr><td><b>Date DOC (Exp.): </b><?php echo $row2['p_dateDoc'];?></td></tr>
                  <tr><td><b>Date Harvest (Exp.): </b><?php echo $row2['p_dateHarvest'];?></td></tr>
                  <tr><td><b>Quantity (Exp.): </b><?php echo $row2['p_qtyDoc'];?></td></tr>
                </tbody>
              </table><br>
              <a href="inprogress.php" class="btn btn-secondary">Back</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Batch Entry</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive-sm">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Quantity</th>
                      <th>Death Quantity</th>
                      <th>Average Weight (Kg)</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $count = 1;
                    while ($row3=mysqli_fetch_array($result3))
                    {
                      echo "<tr>";
                      echo "<td>".$count."</td>";
                      echo "<td>".$row3['b_date']."</td>";
                      echo "<td>".$row3['b_time']."</td>";
                      echo "<td>".$row3['b_qty']."</td>";
                      echo "<td>".$row3['b_deathQty']."</td>";
                      echo "<td>".$row3['b_avgWeight']."</td>";
                      
                      $count = $count + 1;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Daily Chicken Record</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Feed Quantity</th>
                  <th>Death Quantity</th>
                  <th>Average Weight (Kg)</th>
                  <th>Description</th>
                  <th>Operation</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $count = 1;
                while (($row=mysqli_fetch_array($result)) && ($count < 8))
                {
                  echo "<tr>";
                  echo "<td>".$row['c_dateRec']."</td>";
                  echo "<td>".$row['c_feedQty']."</td>";
                  echo "<td>".$row['c_deathQty']."</td>";
                  if($row['c_avgWeight'] == 0)
                  {
                    echo "<td><strong>-</strong></td>";
                  }
                  else
                  {
                    echo "<td>".$row['c_avgWeight']."</td>";
                  }
                  echo "<td>".$row['c_desc']."</td>";
                  echo "<td>";
                    echo "<a href='modifyrequest.php?no=".$row['c_no']."' class='btn btn-primary'>Edit</a>&nbsp</td></tr>";
                  $count = $count + 1;
                }
              ?>
              </tbody>
            </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php include 'footer.php' ?>