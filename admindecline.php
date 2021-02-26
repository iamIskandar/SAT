<?php

 include ('sessionadmin.php');


  include 'header.php';

  include ('dbconnect.php');



  //Get booking ID

  if(isset($_GET['no']))

  {

    $fno = $_GET['no'];

  }



  //Retreave booking and JOIN

  $sql = "SELECT * FROM tb_farm

           LEFT JOIN tb_status ON tb_farm.f_status = tb_status.s_id

           LEFT JOIN tb_user ON tb_farm.f_no = tb_user.u_no

           WHERE f_no='$fno'";

  $result = mysqli_query($con, $sql);

  $row = mysqli_fetch_array($result);



 ?>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Decline Farm</h1>

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

            <form action="admindeclineprocess.php" method="POST">

            <h4>Farm Details</h4>

            <table class="table table-hover">

              <tbody>

                <tr><td><b>Name: </b><?php echo $row['u_name'];?></td></tr>

                <tr><td><b>Tel No: </b><?php echo $row['u_telNo'];?></td></tr>

                <tr><td><b>Company: </b><?php echo $row['f_company'];?></td></tr>

                <tr><td><b>Address: </b><?php echo $row['f_address'];?></td></tr>

                <tr><td><b>Total Coop: </b><?php echo $row['f_totalCoop'];?></td></tr>

                <tr><td><b>Capacity: </b><?php echo $row['f_capacity'];?></td></tr>

              </tbody>

            </table>

            <h3 class="card-title"><b>Do you want to decline this farm?</b></h3><br><br>

            <input type="hidden" id="fno" name="fno" value="<?php echo $row['f_no'];?>">

            <button type="submit" class="btn btn-warning">Yes</button>

            <a href="adminapprove.php" class="btn btn-secondary">Cancel</a>

            </form>

            </div>

          </div>

        </div>

      </div>

    </section>



    <?php include 'footer.php'; ?>