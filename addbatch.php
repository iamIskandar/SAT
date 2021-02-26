<?php

include ('db_session.php');

  if(!session_id())

  {

    session_start();

  }

  

include 'headerfarmer.php';

include ('dbconnect.php');

 

if(isset($_GET['id']))

{

    $pid=$_GET['id'];

}



?>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Add Batch</h1>

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

      <div class="container-fluid">

        <div class="row">

          <!-- left column -->

          <div class="col-sm-12">

            <!-- general form elements -->

            <div class="card card-warning">

              <div class="card-header">

                <h3 class="card-title">Batch Form</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form action="batchconfirm.php" method="POST">

                <div class="card-body">

                  <div class="form-group">

                    <label for="text">Project Name:</label>&nbsp

                      <?php 

                        $sql = "SELECT * FROM tb_project WHERE p_id='$pid'";

                        $result = mysqli_query($con,$sql);

                        $row = mysqli_fetch_array($result);

                        echo $row['p_name'];

                      ?>

                  </div>

                    

                  <div class="form-group">

                    <label for="text">Arrival Date: </label>
                    <?php echo date("d-m-y"); ?>

                  </div>

                  <div class="form-group">

                    <label for="btime">Arrival Time</label>

                    <input type="Time" class="form-control" name="btime" id="btime" placeholder="Select Time">

                  </div>

                 <div class="form-group">

                    <label for="bqty">Chickens Quantity</label>

                    <input name="bqty" type="number" class="form-control" id="bqty" placeholder="Enter chicken quantity"></input>

                  </div>

                  <div class="form-group">

                    <label for="bdeathqty">Death Quantity</label>

                    <input name="bdeathqty" type="number" class="form-control" id="bdeathqty" placeholder="Enter death quantity"></input>

                  </div>

                  <div class="form-group">

                    <label for="bavgweight">Average Weight of Chickens (Kg) </label>

                    <input name="bavgweight" type="number" class="form-control" id="bavgweight" placeholder="Enter average weight"></input>

                  </div>


                  <input type="hidden" id="pid" name="pid" value="<?php echo $row['p_id'] ?>">

                  <input type="hidden" id="add" name="add" value="<?php echo $add = 1; ?>">

                  <button type="submit" class="btn btn-primary">Continue</button>&nbsp

                  <a href="farmer.php" class="btn btn-secondary">Cancel</a>

                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      </section>
    </div>

  <?php include 'footer.php'; ?>