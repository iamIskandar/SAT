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
    $pid = $_GET['id'];
  }

  $sql = "SELECT * FROM tb_fieldwork WHERE fw_id='$pid'";
  $result = mysqli_query($con, $sql);

 ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Field Work Record</h1>
          </div>
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <?php
              echo"<h3>Today: ".date("d-m-y")."</h3>";
              ?>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">New Field Work Record</h3>
            </div>
            <form action="fieldworkprocess.php" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="text">Project Name:</label>&nbsp
                  <?php 
                    $sql1 = "SELECT * FROM tb_project WHERE p_id='$pid'";
                    $result1 = mysqli_query($con,$sql1);
                    $row1 = mysqli_fetch_array($result1);
                    echo $row1['p_name'];
                  ?>
                </div>
                <div class="form-group">
                  <label for="fwdate">Field Work Date</label>
                  <input type="date" class="form-control" name="fwdate" id="fwdate" placeholder="Select Date" required="required" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>">
                  
                </div>
                <div class="form-group">
                  <label for="fwdesc">Description</label>
                  <textarea name="fwdesc" type="text" class="form-control" id="fwdesc" rows="10" cols="100" placeholder="Descriptions" required="required"></textarea>
                </div>
                <input type="hidden" id="pid" name="pid" value="<?php echo "$pid";?>">
                <button type="submit" class="btn btn-warning">Submit</button>&nbsp
                <a href="farmer.php" class="btn btn-secondary">Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
          
<?php include 'footer.php'; ?>