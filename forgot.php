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

  $sql = "SELECT * FROM tb_project
          LEFT JOIN tb_record ON tb_project.p_id = tb_record.r_id
          WHERE p_id='$pid'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Entry Request</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php
                echo "<h3>Date: ".date("d-m-y")."</h3>";
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
                <h3 class="card-title">Chicken Record</h3>
              </div>
               <form action="comfirmmissed.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="text">Project Name:</label>&nbsp
                    <?php 
                      echo $row['p_name'];
                    ?>
                  </div> 
                  <div class="form-group">
                    <label for="cdaterec">Choose Date </label>
                    <input type="date" class="form-control" name="cdaterec" id="cdaterec" placeholder="Choose Date" required="required">
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
                    <input type="number" class="form-control" name="cfeedqty" id="cfeedqty" placeholder="Enter feed quantity" required="required">
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
                  <div class="form-group">
                    <label for="cavgweight">Average Weight (Kg)</label>
                    <input type="text" class="form-control" name="cavgweight" id="cavgweight" placeholder="Enter average weight (Optional)">
                  </div>
                  <input type="hidden" name="pid" id="pid" value="<?php echo $row['p_id'] ?>">
                  <button type="submit" class="btn btn-primary">Continue</button>&nbsp
                  <a href="dailyrecordview.php?id=<?php echo $row['p_id']; ?>" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'footer.php' ?>