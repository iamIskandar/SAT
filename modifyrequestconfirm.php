<?php
  include('db_session.php');
  if (!session_id())
  {
    session_start();
  }
  
  include 'headerfarmer.php';
  include ('dbconnect.php');

  $cno = $_POST['cno'];
  $cfeedtype = $_POST['cfeedtype'];
  $cfeedqty = $_POST['cfeedqty'];
  $cdeathqty = $_POST['cdeathqty'];
  $ccullsqty = $_POST['ccullsqty'];
  $cdesc = $_POST['cdesc'];

  $sql = "SELECT * FROM tb_chicken
          LEFT JOIN tb_status ON tb_chicken.c_status = tb_status.s_id
          WHERE c_no='$cno'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Modification Request</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
      	<div class="col-md-6">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Overview</h3>
            </div>
            <div class="card-body">
            <form action="dailyrecordprocess.php" method="POST">
              <h4>Current Record Details</h4>
              <table class="table table-hover">
                <tbody>
                  <tr><td>
                    <b>Project Name: </b>
                    <?php 
                      $sql2 = "SELECT * FROM tb_project WHERE p_id='".$row['c_id']."'";
                      $result2 = mysqli_query($con,$sql2);
                      $row2 = mysqli_fetch_array($result2);

                      echo $row2['p_name'];
                    ?>
                  </td></tr>
                  <tr><td>
                    <b>Feed Type: </b>
                    <?php
                      $sql3 = "SELECT * FROM tb_status WHERE s_id='".$row['c_feedType']."'";
                      $result3 = mysqli_query($con,$sql3);
                      $row3 = mysqli_fetch_array($result3);

                      echo $row3['s_desc'];
                    ?>
                  </td></tr>
                  <tr><td><b>Feed Quantity (No. of sack): </b><?php echo $row['c_feedQty'];?></td></tr>
                  <tr><td><b>Death Quantity: </b><?php echo $row['c_deathQty'];?></td></tr>
                  <tr><td><b>Culls Quantity: </b><?php echo $row['c_cullsQty'];?></td></tr>
                  <tr><td><b>Remarks: </b>
                    <?php
                      if($row['c_desc'])
                      {
                        echo $row['c_desc'];
                      }
                      else
                      {
                        echo"<b>-</b>";
                      }
                    ?></td></tr>
                  <?php
                    $sql1 = "SELECT * FROM tb_record WHERE r_id='".$row['c_id']."'";
                    $result1 = mysqli_query($con,$sql1);
                    $row1 = mysqli_fetch_array($result1);

                    if(date("Y-m-d") == $row1['r_nextDate'])
                    {
                      $cavgweight = $_POST['cavgweight'];

                      echo "<tr><td><b>Average Weight (Kg): </b>".$row['c_avgWeight']."</td></tr>";
                    }
                  ?>
                </tbody>
              </table>
            </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Overview</h3>
            </div>
            <div class="card-body">
            <form action="modifyrequestprocess.php" method="POST">
              <h4>New Record Details</h4>
              <table class="table table-hover">
                <tbody>
                  <tr><td><b>Project Name: </b><?php echo $row2['p_name'];?></td></tr>
                  <tr><td>
                    <b>Feed Type: </b>
                    <?php 
                      $sql4 = "SELECT * FROM tb_status WHERE s_id='$cfeedtype'";
                      $result4 = mysqli_query($con,$sql4);
                      $row4 = mysqli_fetch_array($result4);

                      echo $row4['s_desc'];
                    ?>
                  </td></tr>
                  <tr><td><b>Feed Quantity (No. of sack): </b><?php echo $cfeedqty;?></td></tr>
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
                    ?></td></tr>
                  <?php
                    if(date("Y-m-d") == $row1['r_nextDate'])
                    {
                      $cavgweight = $_POST['cavgweight'];

                      echo "<tr><td><b>Average Weight (Kg): </b>".$cavgweight."</td></tr>";
                    }
                  ?>
                </tbody>
              </table>
              <h3 class="card-title"><b>Are you sure to modify existing record?</b></h3><br><br>
              <input type="hidden" id="cno" name="cno" value="<?php echo $cno;?>">
              <input type="hidden" id="cfeedtype" name="cfeedtype" value="<?php echo $cfeedtype;?>">
              <input type="hidden" id="cfeedqty" name="cfeedqty" value="<?php echo $cfeedqty;?>">
              <input type="hidden" id="cdeathqty" name="cdeathqty" value="<?php echo $cdeathqty;?>">
              <input type="hidden" id="ccullsqty" name="ccullsqty" value="<?php echo $ccullsqty;?>">
              <input type="hidden" id="cdesc" name="cdesc" value="<?php echo $cdesc;?>">
              <input type="hidden" id="cavgweight" name="cavgweight" value="<?php echo $cavgweight;?>">
              <button type="submit" class="btn btn-warning">Yes</button>
              <a href="modifyrequest.php?no=<?php echo $cno; ?>" class="btn btn-secondary">Cancel</a>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'footer.php'; ?>