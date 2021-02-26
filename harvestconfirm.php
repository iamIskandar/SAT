<?php
  include ('db_session.php');
  include ('dbconnect.php');
  include 'headerfarmer.php';

  if(!session_id())
  {
    session_start();
  }

  $bid = $_POST['bid'];
  $ocstarterprice = $_POST['ocstarterprice'];
  $occrumbleprice = $_POST['occrumbleprice'];
  $ocgrowerprice = $_POST['ocgrowerprice'];
  $ocmedicprice = $_POST['ocmedicprice'];
  $ocwages = $_POST['ocwages'];
  $ocrental = $_POST['ocrental'];
  $ocfmaintainence = $_POST['ocfmaintainence'];
  $ocutility = $_POST['ocutility'];
  $ocsawdust = $_POST['ocsawdust'];
  $ocfuel = $_POST['ocfuel'];
  $ocmachinery = $_POST['ocmachinery'];
  $ocmmaintainence = $_POST['ocmmaintainence'];
  $ocoffmanagement = $_POST['ocoffmanagement'];
  $ocgas = $_POST['ocgas'];
  $ocother = $_POST['ocother'];

$sql = "SELECT * FROM tb_batch 
        LEFT JOIN tb_project ON tb_batch.b_id = tb_project.p_id
        WHERE b_id='$bid'";
$result = mysqli_query($con,$sql);
$row= mysqli_fetch_array($result);

?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Harvest Record</h1>
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
            <form action="harvestprocess.php" method="POST">
              <h4>Operational Cost Details</h4>
              <table class="table table-hover">
                <tbody>
                  <tr><td><b>Starter Price (RM): </b><?php echo $ocstarterprice;?></td></tr>
                  <tr><td><b>Crumble Price (RM): </b><?php echo $occrumbleprice;?></td></tr>
                  <tr><td><b>Grower Price (RM): </b><?php echo $ocgrowerprice;?></td></tr>
                  <tr><td><b>Medical Price (RM): </b><?php echo $ocmedicprice;?></td></tr>
                  <tr><td><b>Wages (RM): </b><?php echo $ocwages;?></td></tr>
                  <tr><td><b>Rental (RM): </b><?php echo $ocrental;?></td></tr>
                  <tr><td><b>Farm Maintenance (RM): </b><?php echo $ocfmaintainence;?></td></tr>
                  <tr><td><b>Utility (RM): </b><?php echo $ocutility;?></td></tr>
                  <tr><td><b>Saw Dust (RM): </b><?php echo $ocsawdust;?></td></tr>
                  <tr><td><b>Fuel (RM): </b><?php echo $ocfuel;?></td></tr>
                  <tr><td><b>Machinery (RM): </b><?php echo $ocmachinery;?></td></tr>
                  <tr><td><b>Machine Maintainence (RM): </b><?php echo $ocmmaintainence;?></td></tr>
                  <tr><td><b>Office Management (RM): </b><?php echo $ocoffmanagement;?></td></tr>
                  <tr><td><b>Gas (RM): </b><?php echo $ocgas;?></td></tr>
                  <tr><td><b>Others (RM): </b><?php echo $ocother;?></td></tr>
                </tbody>
              </table>
              <h3 class="card-title"><b>Are you sure to end this project?</b></h3><br><br>
              <input type="hidden" id="bid" name="bid" value="<?php echo $bid;?>">
              
              <input type="hidden" id="ocstarterprice" name="ocstarterprice" value="<?php echo $ocstarterprice;?>">
              <input type="hidden" id="occrumbleprice" name="occrumbleprice" value="<?php echo $occrumbleprice;?>">
              <input type="hidden" id="ocgrowerprice" name="ocgrowerprice" value="<?php echo $ocgrowerprice;?>">
              <input type="hidden" id="ocmedicprice" name="ocmedicprice" value="<?php echo $ocmedicprice;?>">
              
              <input type="hidden" id="ocwages" name="ocwages" value="<?php echo $ocwages;?>">
              <input type="hidden" id="ocrental" name="ocrental" value="<?php echo $ocrental;?>">
              <input type="hidden" id="ocfmaintainence" name="ocfmaintainence" value="<?php echo $ocfmaintainence;?>">
              <input type="hidden" id="ocutility" name="ocutility" value="<?php echo $ocutility;?>">
              <input type="hidden" id="ocsawdust" name="ocsawdust" value="<?php echo $ocsawdust;?>">
              <input type="hidden" id="ocfuel" name="ocfuel" value="<?php echo $ocfuel;?>">
              <input type="hidden" id="ocmachinery" name="ocmachinery" value="<?php echo $ocmachinery;?>">
              <input type="hidden" id="ocmmaintainence" name="ocmmaintainence" value="<?php echo $ocmmaintainence;?>">
              <input type="hidden" id="ocoffmanagement" name="ocoffmanagement" value="<?php echo $ocoffmanagement;?>">
              <input type="hidden" id="ocgas" name="ocgas" value="<?php echo $ocgas;?>">
              <input type="hidden" id="ocother" name="ocother" value="<?php echo $ocother;?>">

              <button type="submit" class="btn btn-warning">Yes</button>
              <a href="harvest.php?id=<?php echo $row['p_id'];?>" class="btn btn-secondary">Cancel</a>
            </form>
            </div>
          </div>
        </div> 
      </div>
    </section>
  </div>

<?php include 'footer.php'; ?>