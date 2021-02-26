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

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Harvest Record</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php
                echo "<h3>Today: ".date("d-m-y")."</h3>";
              ?>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Harvest Form</h3>
              </div>
              <form action="afiqahconfirm.php" method="POST">
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
                    <label for="hsellingprice">Selling Price (RM)</label>
                    <input name="hsellingprice" type="text" class="form-control" id="hsellingprice" placeholder="Enter selling price" required="required"></input>
                  </div>
                  <div class="form-group">
                    <label for="havgweight">Average Weight (Kg)</label>
                    <input type="text" class="form-control" name="havgweight" id="havgweight" placeholder="Enter average weight" required="required">
                  </div>
                  <div class="form-group">
                    <label for="hqty">Harvest Quantity</label>
                    <?php
                      $sql1 = "SELECT * FROM tb_record WHERE r_id='$pid'";
                      $result1 = mysqli_query($con,$sql1);
                      $row1 = mysqli_fetch_array($result1);

                      echo '<input type="number" class="form-control" name="hqty" id="hqty" placeholder="Enter harvest quantity" required="required" max="'.($row1['r_currentQty']-$row1['r_harvestQty']).'">';
                    ?>
                  </div>
                  
                  
                  <input type="hidden" name="pid" id="pid" value="<?php echo $row['p_id'] ?>">
                  <button type="submit" class="btn btn-primary">Continue</button>&nbsp
                  <a href="inprogress.php" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'footer.php'; ?>