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
            <h1>Daily Record</h1>
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
                <h3 class="card-title">Record Form</h3>
              </div>
              <form action="dailyrecordconfirm.php" method="POST">
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
                    <label for="cfeedqty">Feed Type</label><br>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio1">
                        <input type="radio" class="form-check-input" id="feeds" name="cfeedtype" value="7" checked>Feed Starter
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio2">
                        <input type="radio" class="form-check-input" id="feedc" name="cfeedtype" value="8">Feed Crumble
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio3">
                        <input type="radio" class="form-check-input" id="feedg" name="cfeedtype" value="9">Feed Grower
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="cfeedqty">Feed Quantity (no. of sack)</label>
                    <input name="cfeedqty" type="number" class="form-control" id="cfeedqty" placeholder="Enter feed quantity" required="required"></input>
                  </div>
                  <div class="form-group">
                    <label for="cdeathqty">Death Quantity</label>
                    <input type="number" class="form-control" name="cdeathqty" id="cdeathqty" placeholder="Enter death quantity" required="required">
                  </div>
                  <div class="form-group">
                    <label for="ccullsqty">Culls Quantity</label>
                    <input type="number" class="form-control" name="ccullsqty" id="ccullsqty" placeholder="Enter culls quantity" required="required">
                  </div>
                  <div class="form-group">
                    <label for="cdesc">Remarks</label>
                    <textarea name="cdesc" type="text" class="form-control" id="cdesc" placeholder="Enter remarks"></textarea>
                  </div>
                  <?php
                    $sql1 = "SELECT * FROM tb_record WHERE r_id='$pid'";
                    $result1 = mysqli_query($con,$sql1);
                    $row1 = mysqli_fetch_array($result1);

                    if(date("Y-m-d") == $row1['r_nextDate'])
                    {
                      echo '<div class="form-group">
                              <label for="cavgweight">Average Weight (Kg)</label>
                              <input name="cavgweight" type="text" class="form-control" id="cavgweight" placeholder="Enter weight" required="required"></input>
                            </div>';
                    }
                  ?>
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