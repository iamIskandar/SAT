<?php

  include ('sessionadmin.php');
  include 'header.php';
  include ('dbconnect.php');

  if(isset($_GET['no']))
  {
    $fno = $_GET['no'];
  }

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

            <h1>Register Farm</h1>

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

        <div class="col-md-6">

          <div class="card card-warning">

            <div class="card-header">

              <h3 class="card-title">Overview</h3>

            </div>

            <div class="card-body">

            <h4>Farm Details</h4>

            <table class="table table-hover">

              <tbody>

                <tr><td><b>Name: </b><?php echo $row['u_name'];?></td></tr>

                <tr><td><b>Name: </b><?php echo $row['u_email'];?></td></tr>

                <tr><td><b>Tel No: </b><?php echo $row['u_telNo'];?></td></tr>

                <tr><td><b>Company: </b><?php echo $row['f_company'];?></td></tr>

                <tr><td><b>Address: </b><?php echo $row['f_address'];?></td></tr>

                <tr><td><b>Total Coop: </b><?php echo $row['f_totalCoop'];?></td></tr>

                <tr><td><b>Capacity: </b><?php echo $row['f_capacity'];?></td></tr>

              </tbody>

            </table>

            </div>

            <!-- /.card-body -->

          </div>

          <!-- /.card -->

        </div>

        <div class="col-md-6">

          <div class="card card-warning">

            <div class="card-header">

              <h3 class="card-title">Create ID and Password</h3>

            </div>

            <div class="card-body">

              <form action="adminregisterprocess.php" method="POST">

                <label for="fid">Farm ID</label>

                <input type="text" id="fid" name="fid" class="form-control" placeholder="Enter Farm ID" required="required"><br>

                <?php
                  if(isset($_GET['pass']))
                  {
                    $pass=$_GET['pass'];
                    if($pass==2)
                    {
                      echo "<span style='color: red;'>Farm ID already exist.</span>";
                    }
                    else
                    {
                      echo "";
                    }
                  }
                  else
                  {
                    echo"";
                  }
                ?>

              

                <label for="uid">User ID</label>

                <input type="text" id="uid" name="uid" class="form-control" placeholder="Enter User ID" required="required"><br>

                <?php
                  if(isset($_GET['pass']))
                  {
                    $pass=$_GET['pass'];
                    if($pass==1)
                    {
                      echo "<span style='color: red;'>User ID already exist.</span>";
                    }
                    else
                    {
                      echo "";
                    }
                  }
                  else
                  {
                    echo"";
                  }
                ?>



                <label for="upassword">Password</label>



                  <i class="fa fa-eye" onclick="myFunction()"></i>

                  <input style="flex: 1;" type="password" id="upassword" name="upassword" class="form-control" placeholder="Enter Password" required="required"><br>



                 <script> 

                    function myFunction() {

                      var x = document.getElementById("upassword");

                      if (x.type === "password") {

                        x.type = "text";

                      } else {

                        x.type = "password";

                      }

                    }

                </script>





              <input type="hidden" id="fno" name="fno" value="<?php echo $row['f_no'];?>">

              <button type="submit" class="btn btn-primary">Register Farm</button>

              <a href="adminapprove.php" class="btn btn-secondary float-right">Cancel</a>

            </form>

            </div>

            <!-- /.card-body -->

          </div>

          <!-- /.card -->

        </div>

      </div>

    </section>



    <?php include 'footer.php'; ?>