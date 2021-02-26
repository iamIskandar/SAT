<?php

  include ('db_session.php');

    if(!session_id())

    {

      session_start();

    }

    

  include 'headerfarmer.php';

  include ('dbconnect.php');



  if(isset($_GET['no']))

  {

      $fwno=$_GET['no'];

  }



  $sql = "SELECT * FROM tb_fieldwork

           LEFT JOIN tb_project ON tb_fieldwork.fw_id = tb_project.p_id

           WHERE fw_no='$fwno'";



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

            <h1>Field Work</h1>

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

                <h3 class="card-title">Field Work</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form action="fieldworkeditprocess.php" method="POST">

                <div class="card-body">

                  <div class="form-group">

                    <label for="text">Project Name:</label>

                    <?php 

                      echo $row['p_name'];

                    ?>

                  </div>

                  <div class="form-group">

                    <label for="fwdate">Field Work Date</label>

                    <input type="date" class="form-control" name="fwdate" id="fwdate" placeholder="Select Date" value="<?php echo $row['fw_date'];?>">

                  </div>

                  <div class="form-group">

                    <label for="fwdesc">Description</label>

                    <textarea name="fwdesc" type="text" class="form-control" id="fwdesc" rows="10" cols="100" placeholder="Descriptions"><?php echo $row['fw_desc'];?></textarea>

                  </div>

                    <input type="hidden" id="fwno" name="fwno" value="<?php echo $row['fw_no'];?>">

                    <input type="hidden" id="pid" name="pid" value="<?php echo $row['p_id'];?>">

                    <button type="submit" class="btn btn-warning">Save</button>&nbsp

                    <a href="fieldworklistview.php?id=<?php echo $row['p_id'] ?>" class="btn btn-secondary">Cancel</a>

                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

              

<?php include'footer.php'; ?>