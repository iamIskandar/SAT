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
    $bid= $_GET['id'];
  }
  //Retreave booking and JOIN
  $sql = "SELECT * FROM tb_report WHERE rp_id='$bid'";
  $result = mysqli_query($con,$sql) or die(mysqli_error($con));
  $row = mysqli_fetch_array($result);
 ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4> Project Name : 
            <?php 
                    $sql5 = "SELECT * FROM tb_project WHERE p_id='$bid'";
                    $result5 = mysqli_query($con,$sql5);
                    $row5 = mysqli_fetch_array($result5);
                        echo $row5['p_name'];
            ?></h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Feed Conversion Ratio</h3>
            </div>
            <div class="card-body">
            <table class="table table-hover">
              <tbody>
                <tr><td><b>FCR: </b><?php echo $row['fcr'];?></td></tr>
              </tbody>
            </table>
                  <tbody>
                    
                   
                  </tbody>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Performance Index of Production</h3>
            </div>
            <div class="card-body">
            <table class="table table-hover">
              <tbody>
                <tr><td><b>PI: </b><?php echo $row['pi'];?></td></tr>
              </tbody>
            </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Profit & Loss</h3>
            </div>
            <div class="card-body">
            <h5> Gross</h5>
            <table class="table table-hover">
              <tbody>
                <tr><td><b>Gross P&L: </b><?php echo $row['gross'];?></td></tr>
                <tr><td><b>Gross P&L per bird: </b><?php echo $row['grossPerBird'];?></td></tr>
            </tbody>
            </table>

                    <br><br>
                   <h5> Nett</h5>
            <table class="table table-hover">
              <tbody>
                <tr><td><b>Nett P&L: </b><?php echo $row['net'];?></td></tr>
                <tr><td><b>Nett P&L per bird: </b><?php echo $row['netPerBird'];?></td></tr>
            </tbody>
            </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
    </section>
    &nbsp&nbsp&nbsp<a href="closeprocess.php?id=<?php echo $bid;?>" class="btn btn-secondary">Back</a>
    <?php include 'footer.php'; ?>