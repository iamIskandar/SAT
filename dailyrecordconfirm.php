<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

  include 'headerfarmer.php';
  include ('dbconnect.php');

  $pid = $_POST['pid'];
  $cfeedtype = $_POST['cfeedtype'];
  $cfeedqty = $_POST['cfeedqty'];
  $cdeathqty = $_POST['cdeathqty'];
  $ccullsqty = $_POST['ccullsqty'];
  $cdesc = $_POST['cdesc'];
 ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daily Record</h1>
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
            <form action="dailyrecordprocess.php" method="POST">
              <h4>Record Details</h4>
              <table class="table table-hover">
                <tbody>
                  <tr><td><b>Project Name: </b><?php 
                    $sql2 = "SELECT * FROM tb_project WHERE p_id='$pid'";
                    $result2 = mysqli_query($con,$sql2);
                    $row2 = mysqli_fetch_array($result2);
                    echo $row2['p_name'];
                  ?></td></tr>
                  <?php
                    $sql3 = "SELECT * FROM tb_status WHERE s_id='$cfeedtype'";
                    $result3 = mysqli_query($con,$sql3);
                    $row3 = mysqli_fetch_array($result3);
                  ?>
                  <tr><td><b>Feed Type: </b><?php echo $row3['s_desc'];?></td></tr>
                  <tr><td><b>Feed Quantity (no. of sack): </b><?php echo $cfeedqty;?></td></tr>
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
                  <?php
                    $sql1 = "SELECT * FROM tb_record WHERE r_id='$pid'";
                    $result1 = mysqli_query($con,$sql1);
                    $row1 = mysqli_fetch_array($result1);
                    if(date("Y-m-d") == $row1['r_nextDate'])
                    {
                      $cavgweight = $_POST['cavgweight'];
                      echo "<tr><td><b>Average Weight (Kg): </b>".$cavgweight."</td></tr>";
                    }
                  ?>
                </tbody>
              </table>
              <h3 class="card-title"><b>Are you sure to submit this record?</b></h3><br><br>
              <input type="hidden" id="pid" name="pid" value="<?php echo $pid;?>">
              <input type="hidden" id="cfeedtype" name="cfeedtype" value="<?php echo $cfeedtype;?>">
              <input type="hidden" id="cfeedqty" name="cfeedqty" value="<?php echo $cfeedqty;?>">
              <input type="hidden" id="cdeathqty" name="cdeathqty" value="<?php echo $cdeathqty;?>">
              <input type="hidden" id="ccullsqty" name="ccullsqty" value="<?php echo $ccullsqty;?>">
              <input type="hidden" id="cdesc" name="cdesc" value="<?php echo $cdesc;?>">
              <input type="hidden" id="cavgweight" name="cavgweight" value="<?php echo $cavgweight;?>">
              <button type="submit" class="btn btn-warning">Yes</button>
              <a href="dailyrecord.php?id=<?php echo $pid; ?>" class="btn btn-secondary">Cancel</a>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'footer.php'; ?>