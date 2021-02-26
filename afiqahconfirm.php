<?php

  include ('db_session.php');

  if(!session_id())

  {

    session_start();

  }



  include ('dbconnect.php');

  include 'headerfarmer.php';



  //Retrive data from form and session

  

  $pid = $_POST['pid'];
  $hsellingprice = $_POST['hsellingprice'];
  $havgweight = $_POST['havgweight'];
  $hqty = $_POST['hqty'];

  $sql = "SELECT * FROM tb_project

          WHERE p_id='$pid'";

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
            
            <h1>Harvest Record</h1>

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

            <form action="afiqahprocess.php" method="POST">

              <h4>Harvest Details</h4>

              <table class="table table-hover">

                <tbody>

                  <tr><td><b>Project Name: </b><?php echo $row['p_name'];?></td></tr>

                  <tr><td><b>Date: </b><?php echo date("d-m-y");?></td></tr>

                  <tr><td><b>Selling Price (RM): </b><?php echo $hsellingprice;?></td></tr>

                  <tr><td><b>Average Weight (Kg): </b><?php echo $havgweight;?></td></tr>

                  <tr><td><b>Harvest Quantity: </b><?php echo $hqty;?></td></tr>


                </tbody>

              </table>

              <h3 class="card-title"><b>Are you sure to submit this record?</b></h3><br><br>
              

              <input type="hidden" id="pid" name="pid" value="<?php echo $pid;?>">

              <input type="hidden" id="hqty" name="hqty" value="<?php echo $hqty;?>">

              <input type="hidden" id="hsellingprice" name="hsellingprice" value="<?php echo $hsellingprice;?>">

              <input type="hidden" id="havgweight" name="havgweight" value="<?php echo $havgweight;?>">

              <button type="submit" class="btn btn-warning">Yes</button>&nbsp

              <a href="batch.php?id=<?php echo $row['p_id'];?>" class="btn btn-secondary">Cancel</a>

            </form>

            </div>

          </div>

        </div> 

      </div>

    </section>

  </div>

<?php include 'footer.php'; ?>