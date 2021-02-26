<?php

   include ('sessionadmin.php');



  include 'header.php';

  include ('dbconnect.php');



  //Get booking ID

  if(isset($_GET['id']))

  {

    $pid = $_GET['id'];

  }



  //Retreave booking and JOIN

  $sql = "SELECT * FROM tb_project

           LEFT JOIN tb_status ON tb_project.p_status = tb_status.s_id

           LEFT JOIN tb_user ON tb_project.p_no = tb_user.u_no

           LEFT JOIN tb_farm ON tb_project.p_no = tb_farm.f_no

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

            <h1>Delete Project</h1>

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

            <form action="newprojectdeclineprocess.php" method="POST">

            <h4>Project Details</h4>

            <table class="table table-hover">

              <tbody>

                <tr><td><b>Farm ID: </b><?php echo $row['f_id'];?></td></tr>

                <tr><td><b>Project Name: </b><?php echo $row['p_name'];?></td></tr>

                <tr><td><b>Date DOC (Exp.): </b><?php echo $row['p_dateDoc'];?></td></tr>

                <tr><td><b>Date Harvest (Exp.): </b><?php echo $row['p_dateHarvest'];?></td></tr>

                <tr><td><b>Quantity (Exp.): </b><?php echo $row['p_qtyDoc'];?></td></tr>

              </tbody>

            </table>

            <h3 class="card-title"><b>Do you want to delete this project?</b></h3><br><br>

            <input type="hidden" id="pid" name="pid" value="<?php echo $row['p_id'];?>">

            <button type="submit" class="btn btn-warning">Yes</button>

            <a href="newproject.php" class="btn btn-secondary">Cancel</a>

            </form>

            </div>

          </div>

        </div>

      </div>

    </section>
  </div>



<?php include 'footer.php'; ?>

