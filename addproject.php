  <?php

   include ('sessionadmin.php');

  

  include 'header.php';

  include ('dbconnect.php');



  if(isset($_GET['id']))

  {

    $fid = $_GET['id'];

  }



  //Retreave booking and JOIN

  $sql = "SELECT * FROM tb_farm

          LEFT JOIN tb_status ON tb_farm.f_status = tb_status.s_id

          LEFT JOIN tb_user ON tb_farm.f_no = tb_user.u_no

          WHERE f_status='2'AND f_id='$fid'";

  $result = mysqli_query($con, $sql);
  $add=1;

?>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Register Project</h1>

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

                <h3 class="card-title">Create a Project</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form role="form" action="registerconfirmation.php" method="POST">

                <div class="card-body">

                  <div class="form-group">

                    <label for="email">Choose Farm:</label>

                    <?php

                      //Retrive all farm

                      

                      echo '<select class="form-control" id="fid" name="fid">';



                      while($row=mysqli_fetch_array($result))

                      {

                        if($fid == $row['f_id'])

                        {

                          echo "<option selected='selected' value='".$fid."'>".$row['f_id']."</option>";

                        }

                        else

                        {

                          echo "<option>".$row['f_id']."</option>";

                        }

                      }

                      echo '</select>';

                    ?>

                  </div>

                  <div class="form-group">

                    <label for="pname">Project Name</label>

                    <input type="text" class="form-control" name="pname" id="pname" placeholder="Enter Project Name" required="required">

                  </div>

                  <div class="form-group">

                    <label for="pdateDoc">Date DOC (Exp.)</label>

                    <input type="date" class="form-control" name="pdateDoc" id="pdateDoc" placeholder="Select Date" required="required" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>">

                  </div>

                  <div class="form-group">

                    <label for="pdateHarvest">Date Harvest (Exp.)</label>

                    <input type="date" class="form-control" name="pdateHarvest" id="pdateHarvest" placeholder="Select Date" required="required" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>">

                  </div>

                  <div class="form-group">

                    <label for="pqtyDoc">Quantity (Exp.)</label>

                        <?php

                        $sql2="SELECT * FROM tb_farm WHERE f_id='$fid'";

                        $result2=mysqli_query($con,$sql2);

                        $row2=mysqli_fetch_array($result2);

                        echo ' <input type="number" class="form-control" name="pqtyDoc" id="pqtyDoc" placeholder="Enter Quantity" required="required" max="'.($row2['f_capacity']*$row2['f_totalCoop']).'">';


                        ?>
                   
                  </div>

                      <div class="input-group-append">

                          <input type="hidden" name="add" id="add" value="<?php echo $add;?>">

                        <button type="submit" class="btn btn-primary">Continue</button>&nbsp&nbsp&nbsp

                        <?php

                        $sql1="SELECT * FROM tb_farm WHERE f_id='$fid'";

                        $result1=mysqli_query($con,$sql1);

                        $row1=mysqli_fetch_array($result1);

                        echo '<a href="farmview.php?no='.$row1['f_no'].'" class="btn btn-secondary">Back</a>';

                        ?>

                        



                      </div>

                    </div>

                  </div>

                <!-- /.card-body -->



  <?php include 'footer.php'; ?>