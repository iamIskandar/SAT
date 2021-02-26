<?php
  include ('sessionadmin.php');
  include 'header.php';
  include ('dbconnect.php');

  if(isset($_GET['id']) && isset($_GET['pass']))
{
    $pid=$_GET['id'];
    $pass=$_GET['pass'];
}

  //Retrieve booking and JOIN
  $sql = "SELECT * FROM tb_chicken
          LEFT JOIN tb_project ON tb_chicken.c_id=tb_project.p_id
          WHERE c_status='2' AND c_id='$pid'";

  $result = mysqli_query($con, $sql);

  $sql2 = "SELECT * FROM tb_project
           LEFT JOIN tb_user ON tb_project.p_no = tb_user.u_no
           LEFT JOIN tb_farm ON tb_project.p_no = tb_farm.f_no
           WHERE p_id='$pid'";
  $result2 = mysqli_query($con,$sql2);
  $row2 = mysqli_fetch_array($result2);

  $sql3 = "SELECT * FROM tb_batch WHERE b_id='$pid'";
  $result3 = mysqli_query($con,$sql3);
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Farm Name : <?php echo $row2['f_id'];?></h3> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php
                echo"<h4>Today: ".date("d-m-y")."</h4>";
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
              <h3 class="card-title">Project Details</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive-sm">
              <table class="table table-hover">
                <thead>
                  <th>Project Name</th>
                  <th>Date DOC (Exp.)</th>
                  <th>Date Harvest (Exp.)</th>
                  <th>Chicken Quantity (Exp.)</th>
                  <th></th>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $row2['p_name'];?></td>
                    <td><?php echo $row2['p_dateDoc'];?></td>
                    <td><?php echo $row2['p_dateHarvest'];?></td>
                    <td><?php echo $row2['p_qtyDoc'];?></td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Batch Entry</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive-sm">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Quantity</th>
                      <th>Death Quantity</th>
                      <th>Average Weight (Kg)</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $count = 1;
                    while ($row3=mysqli_fetch_array($result3))
                    {
                      echo "<tr>";
                      echo "<td>".$count."</td>";
                      echo "<td>".$row3['b_date']."</td>";
                      echo "<td>".$row3['b_time']."</td>";
                      echo "<td>".$row3['b_qty']."</td>";
                      echo "<td>".$row3['b_deathQty']."</td>";
                      echo "<td>".$row3['b_avgWeight']."</td></tr>";
                      
                      $count = $count + 1;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Harvest Record</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive-sm">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Date</th>
                      <th>Selling Price</th>
                      <th>Quantity</th>
                      <th>Average Weight (Kg)</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $count = 1;

                    $sql4 = "SELECT * FROM tb_harvest WHERE h_id='$pid'";
                    $result4 = mysqli_query($con,$sql4);

                    while ($row4=mysqli_fetch_array($result4))
                    {
                      echo "<tr>";
                      echo "<td>".$count."</td>";
                      echo "<td>".$row4['h_date']."</td>";
                      echo "<td>RM ".$row4['h_sellingPrice']."</td>";
                      echo "<td>".$row4['h_qty']."</td>";
                      echo "<td>".$row4['b_avgWeight']."</td></tr>";
                      
                      $count = $count + 1;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Daily Chicken Record</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Feed Type</th>
                  <th>Feed Quantity</th>
                  <th>Death Quantity</th>
                  <th>Culls Quantity</th>
                  <th>Description</th>
                  <th>Average Weight (Kg)</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $count = 1;

                while (($row=mysqli_fetch_array($result)) && ($count < 8))
                {
                  $sql4 = "SELECT * FROM tb_status WHERE s_id='".$row['c_feedType']."'";
                  $result4 = mysqli_query($con,$sql4);
                  $row4 = mysqli_fetch_array($result4);
                  
                  echo "<tr>";
                  echo "<td>".$row['c_dateRec']."</td>";
                  echo "<td>".$row4['s_desc']."</td>";
                  echo "<td>".$row['c_feedQty']."</td>";
                  echo "<td>".$row['c_deathQty']."</td>";
                  echo "<td>".$row['c_cullsQty']."</td>";
                  
                  if($row['c_desc'] == 0)
                  {
                    echo "<td><strong>-</strong></td>";
                  }
                  else
                  {
                    echo "<td>".$row['c_desc']."</td>";
                  }
                  if($row['c_avgWeight'] == 0)
                  {
                    echo "<td><strong>-</strong></td>";
                  }
                  else
                  {
                    echo "<td>".$row['c_avgWeight']."</td>";
                  }
                  echo "<td></tr>";
                  $count = $count + 1;
                }
              ?>
              </tbody>
            </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        if(!$pass)
        {
          echo '<a href="farmview.php?no='.$row2['u_no'].'" class="btn btn-secondary">Back</a>';
        }
        else
        {
          echo '<a href="inprogressadmin.php?no='.$row2['u_no'].'" class="btn btn-secondary">Back</a>';
        }
      ?>
      <br><br>
    </section>
  </div>

<?php include 'footer.php' ;?>