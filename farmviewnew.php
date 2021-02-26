<?php
     include ('sessionadmin.php');


  include 'header.php';
  include ('dbconnect.php');

  if(isset($_GET['id']) && isset($_GET['pass']))
  {
    $pid = $_GET['id'];
    $pass = $_GET['pass'];
  }

  $sql = "SELECT * FROM tb_project WHERE p_id='$pid'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);

  $sql1 = "SELECT * FROM tb_fieldwork WHERE fw_id='$pid'";
  $result1 = mysqli_query($con, $sql1);

?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Project</h1>
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
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Overview</h3>
            </div>
            <div class="card-body">
              <h4>Project Details</h4>
              <table class="table table-hover">
                <tbody>
                  <tr><td><b>Name: </b><?php echo $row['p_name'];?></td></tr>
                  <tr><td><b>Expected Date DOC: </b><?php echo $row['p_dateDoc'];?></td></tr>
                  <tr><td><b>Expected Date Harvest: </b><?php echo $row['p_dateHarvest'];?></td></tr>
                  <tr><td><b>Quantity: </b><?php echo $row['p_qtyDoc'];?></td></tr>
                </tbody>
              </table><br>
              <?php
              if(!$pass)
              {
                echo '<a href="farmview.php?no='.$row['p_no'].'" class="btn btn-secondary">Back</a>';
              }
              else
              {
                echo '<a href="newproject.php" class="btn btn-secondary">Back</a>';
              }
              ?>
              
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Field Work Record</h3>
            </div>
            <div class="card-body">
           <table class="table table-hover" style="width: 100%">
              <thead> 
                <tr>
                  <th style="width:20%">Date</th>
                  <th style="width:80%">Description</th>            
                </tr>
              </thead>
              <tbody>
              <?php
                while($row1=mysqli_fetch_array($result1))
                {
                  echo "<tr>";
                    echo "<td style='width:20%'>".$row1['fw_date']."</td>";
                    echo "<td style='width:70%'>".$row1['fw_desc']."</td>";
                  echo "</tr>";
                }
              ?>
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'footer.php'; ?>