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

  $btime = $_POST['btime'];

  $bqty = $_POST['bqty'];

  $bdeathqty = $_POST['bdeathqty'];

  $bavgweight = $_POST['bavgweight'];

  $add = $_POST['add'];



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

            <?php
            if($add)
            {
              echo "<h1>Add Batch</h1>";
            }
            else
            {
              echo "<h1>Register Batch</h1>";
            }
            ?>

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

            <form action="batchprocess.php" method="POST">

              <h4>Batch Details</h4>

              <table class="table table-hover">

                <tbody>

                  <tr><td><b>Project Name: </b><?php echo $row['p_name'];?></td></tr>

                  <tr><td><b>Date DOC: </b><?php echo date("d-m-y");?></td></tr>

                  <tr><td><b>Arrival Time: </b><?php echo $btime;?></td></tr>

                  <tr><td><b>Quantity: </b><?php echo $bqty;?></td></tr>

                  <tr><td><b>Death Before DOC: </b><?php echo $bdeathqty;?></td></tr>

                  <tr><td><b>DOC Average Weight: </b><?php echo $bavgweight;?></td></tr>

                </tbody>

              </table>

              <?php
              if($add)
              {
                echo '<h3 class="card-title"><b>Are you sure to add this batch?</b></h3><br><br>';
              }
              else
              {
                echo '<h3 class="card-title"><b>Are you sure to register this batch?</b></h3><br><br>';
              }
              ?>

              <input type="hidden" id="pid" name="pid" value="<?php echo $pid;?>">

              <input type="hidden" id="btime" name="btime" value="<?php echo $btime;?>">

              <input type="hidden" id="bqty" name="bqty" value="<?php echo $bqty;?>">

              <input type="hidden" id="bdeathqty" name="bdeathqty" value="<?php echo $bdeathqty;?>">

              <input type="hidden" id="bavgweight" name="bavgweight" value="<?php echo $bavgweight;?>">

              <input type="hidden" id="add" name="add" value="<?php echo $add;?>">

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