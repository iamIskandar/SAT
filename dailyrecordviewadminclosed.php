<?php
     include ('sessionadmin.php');

  
  include 'header.php';
  include ('dbconnect.php');

  if(isset($_GET['id']) && isset($_GET['pass']))
{
    $pid=$_GET['id'];
    $pass=$_GET['pass'];
}

  //Retrieve booking and JOIN
  $sql = "SELECT * FROM tb_chicken
          LEFT JOIN tb_project ON tb_chicken.c_id=tb_project.p_id
          WHERE c_status='2' AND c_id='$pid'";

  $result = mysqli_query($con, $sql);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chicken Record</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <?php
              echo"<h3>Today: ".date("d-m-y")."</h3>";
              ?>
            </ol>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Overview</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Date</th>
                  <th>Feed Quantity</th>
                  <th>Death Quantity</th>
                  <th>Average Weight (Kg)</th>
                  <th>Description</th>

                </tr>
              </thead>

              <tbody>
              <?php
                $count = 1;
                while ($row=mysqli_fetch_array($result))
                {
                  echo "<tr>";
                  echo "<td>".$count."</td>";
                  echo "<td>".$row['c_dateRec']."</td>";
                  echo "<td>".$row['c_feedQty']."</td>";
                  echo "<td>".$row['c_deathQty']."</td>";
                  echo "<td>".$row['c_avgWeight']."</td>";
                  echo "<td>".$row['c_desc']."</td>";
                  
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
      <?php
      $sql2 = "SELECT * FROM tb_project WHERE p_id='$pid'";
      $result2 = mysqli_query($con,$sql2);
      $row2 = mysqli_fetch_array($result2);
        if(!$pass)
        {
          echo '<a href="farmview.php?no='.$row2['p_no'].'" class="btn btn-secondary">Back</a>';
        }
        else
        {
          echo '<a href="closedadmin.php?no='.$row2['p_no'].'" class="btn btn-secondary">Back</a>';
        }
      ?>
    </section>
  </div>
  <?php include 'footer.php' ?>