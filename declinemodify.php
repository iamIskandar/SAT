<?php
  include ('sessionadmin.php');
  include 'header.php';
  include ('dbconnect.php');

  if(isset($_GET['no']))
  {
    $cno = $_GET['no'];
  }

  $sql = "SELECT * FROM tb_chicken
           LEFT JOIN tb_temporary ON tb_chicken.c_no = tb_temporary.t_no
           LEFT JOIN tb_project ON tb_chicken.c_id=tb_project.p_id
           WHERE c_no='$cno'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Decline Modification Request</h1>
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
        <div class="col-md-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Overview</h3>
            </div>
            <div class="card-body">
            <form action="declinemodifyprocess.php" method="POST">
              <h4>Record Details</h4>
              <table class="table table-hover">
                <tbody>
                  <tr><td><b>Project Name: </b><?php echo $row['p_name'];?></td></tr>
                  <tr><td><b>Date: </b><?php echo $row['t_dateRec'];?></td></tr>
                  <?php
                    $sql2 = "SELECT * FROM tb_status WHERE s_id='".$row['t_feedType']."'";
                    $result2 = mysqli_query($con,$sql2);
                    $row2 = mysqli_fetch_array($result2);
                  ?>
                  <tr><td><b>Feed Type: </b><?php echo $row2['s_desc'];?></td></tr>
                  <tr><td><b>Feed Quantity: </b><?php echo $row['t_feedQty'];?></td></tr>
                  <tr><td><b>Death Quantity: </b><?php echo $row['t_deathQty'];?></td></tr>
                  <tr><td><b>Culls Quantity: </b><?php echo $row['t_cullsQty'];?></td></tr>
                  <tr><td><b>Remarks: </b>
                    <?php 
                      if(!$row['t_desc'])
                      {
                        echo "<strong>-</strong>";
                      }
                      else
                      {
                        echo $row['t_desc'];
                      }
                    ?>
                  </td></tr>
                  <?php
                    if($row['t_avgWeight'])
                    {
                      echo '<tr><td><b>Average Weight (Kg): </b>'.$row['t_avgWeight'].'</td></tr>';
                    }
                  ?>
                </tbody>
              </table>
              <h3 class="card-title"><b>Are you sure to decline this modification?</b></h3><br><br>
              <input type="hidden" id="cno" name="cno" value="<?php echo $row['c_no'];?>">
              <button type="submit" class="btn btn-warning">Yes</button>
              <a href="modifyapproval.php?no=<?php echo $row['c_no'];?>" class="btn btn-secondary">Cancel</a>
            </form>
            </div>
          </div>
        </div> 
      </div>
    </section>
  </div>

<?php include 'footer.php'; ?>