<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

  include 'headerfarmer.php';
  include ('dbconnect.php');

  $pid = $_POST['pid'];
  $cdaterec = $_POST['cdaterec'];
  $cfeedtype = $_POST['cfeedtype'];
  $cfeedqty = $_POST['cfeedqty'];
  $cdeathqty = $_POST['cdeathqty'];
  $ccullsqty = $_POST['ccullsqty'];
  $cdesc = $_POST['cdesc'];
  $cavgweight = $_POST['cavgweight'];

  $sql = "SELECT * FROM tb_chicken
           LEFT JOIN tb_status ON tb_chicken.c_status = tb_status.s_id
           LEFT JOIN tb_project ON tb_chicken.c_id = tb_project.p_id
           WHERE c_id='$pid'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
 ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Entry Request</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Overview</h3>
            </div>
            <div class="card-body">
            <form action="forgotprocess.php" method="POST">
              <h4>Record Details</h4>
              <table class="table table-hover">
                <tbody>
                  <tr><td><b>Project Name: </b><?php echo $row['p_name'];?></td></tr>
                  <tr><td><b>Date Missed: </b><?php echo $cdaterec;?></td></tr>
                  <?php
                    $sql3 = "SELECT * FROM tb_status WHERE s_id='$cfeedtype'";
                    $result3 = mysqli_query($con,$sql3);
                    $row3 = mysqli_fetch_array($result3);
                  ?>
                  <tr><td><b>Feed Type: </b><?php echo $row3['s_desc'];?></td></tr>
                  <tr><td><b>No. of Feed (per sack): </b><?php echo $cfeedqty;?></td></tr>
                  <tr><td><b>Death Quantity: </b><?php echo $cdeathqty;?></td></tr>
                  <tr><td><b>Culls Quantity: </b><?php echo $ccullsqty;?></td></tr>
                  <tr><td><b>Remarks: </b>
                    <?php
                        if($cdesc)
                        {
                          echo $cdesc;
                        }
                        else
                        {
                          echo"<b>-</b>";
                        }
                      ?>
                  </td></tr>
                  <tr><td><b>Average Weight (Kg): </b>
                    <?php
                      if($cavgweight)
                      {
                        echo $cavgweight; 
                      }
                      else
                      {
                        echo"<b>-</b>";
                      }
                    ?>
                  </td></tr>
                </tbody>
              </table>
              <h3 class="card-title"><b>Are you sure to submit this record?</b></h3><br><br>
              <input type="hidden" id="pid" name="pid" value="<?php echo $row['p_id'];?>">
              <input type="hidden" id="cdaterec" name="cdaterec" value="<?php echo $cdaterec;?>">
              <input type="hidden" id="cfeedtype" name="cfeedtype" value="<?php echo $cfeedtype;?>">
              <input type="hidden" id="cfeedqty" name="cfeedqty" value="<?php echo $cfeedqty;?>">
              <input type="hidden" id="cdeathqty" name="cdeathqty" value="<?php echo $cdeathqty;?>">
              <input type="hidden" id="ccullsqty" name="ccullsqty" value="<?php echo $ccullsqty;?>">
              <input type="hidden" id="cdesc" name="cdesc" value="<?php echo $cdesc;?>">
              <input type="hidden" id="cavgweight" name="cavgweight" value="<?php echo $cavgweight;?>">
              <button type="submit" class="btn btn-warning">Yes</button>
              <a href="forgot.php?id=<?php echo $row['p_id']; ?>" class="btn btn-secondary">Cancel</a>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'footer.php'; ?>

