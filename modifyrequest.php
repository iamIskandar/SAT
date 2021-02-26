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
    $cno = $_GET['no'];
  }

  $sql = "SELECT * FROM tb_chicken
          LEFT JOIN tb_project ON tb_chicken.c_id = tb_project.p_id
          LEFT JOIN tb_status ON tb_chicken.c_status = tb_status.s_id
          WHERE c_no='$cno'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Modification Request</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php
                echo "<h3>Date: ".$row['c_dateRec']."</h3>";
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
              <form action="modifyrequestconfirm.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="text">Project Name:</label>&nbsp
                    <?php 
                      echo $row['p_name'];
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="cfeedqty">Feed Type</label><br>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio1">
                        <?php
                          if($row['c_feedType'] == 7)
                          {
                            echo '<input type="radio" class="form-check-input" id="feeds" name="cfeedtype" value="7" checked>Feed Starter';
                          }
                          else
                          {
                            echo '<input type="radio" class="form-check-input" id="feeds" name="cfeedtype" value="7">Feed Starter';
                          }
                        ?>
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio2">
                        <?php
                          if($row['c_feedType'] == 8)
                          {
                            echo '<input type="radio" class="form-check-input" id="feedc" name="cfeedtype" value="8" checked>Feed Crumble';
                          }
                          else
                          {
                            echo '<input type="radio" class="form-check-input" id="feedc" name="cfeedtype" value="8">Feed Crumble';
                          }
                        ?>
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <?php
                          if($row['c_feedType'] == 9)
                          {
                            echo '<input type="radio" class="form-check-input" id="feedg" name="cfeedtype" value="9" checked>Feed Grower';
                          }
                          else
                          {
                            echo '<input type="radio" class="form-check-input" id="feedg" name="cfeedtype" value="9">Feed Grower';
                          }
                        ?>
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="cfeedqty">Feed Quantity (no. of sack)</label>
                    <input name="cfeedqty" type="text" class="form-control" id="cfeedqty" placeholder="Enter feed quantity" value="<?php echo $row['c_feedQty']; ?>"></input>
                  </div>
                  <div class="form-group">
                    <label for="cdeathqty">Death Quantity</label>
                    <input type="text" class="form-control" name="cdeathqty" id="cdeathqty" placeholder="Enter death quantity" value="<?php echo $row['c_deathQty']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="ccullsqty">Culls Quantity</label>
                    <input type="text" class="form-control" name="ccullsqty" id="ccullsqty" placeholder="Enter culls quantity" value="<?php echo $row['c_cullsQty']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="cdesc">Remarks</label>
                    <textarea name="cdesc" type="text" class="form-control" id="cdesc" placeholder="Enter remarks"><?php echo $row['c_desc']; ?></textarea>
                  </div>
                  <?php
                    if($row['c_avgWeight'])
                    {
                      echo '<div class="form-group">
                              <label for="cavgweight">Average Weight (Kg)</label>
                              <input name="cavgweight" type="text" class="form-control" id="cavgweight" placeholder="Enter weight"  value="'.$row['c_avgWeight'].'"></input>
                            </div>';
                    }
                  ?>
                  <input type="hidden" name="cno" id="cno" value="<?php echo $row['c_no'] ?>">
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