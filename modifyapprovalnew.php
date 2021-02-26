<?php
  include ('sessionadmin.php');
  include 'header.php';
  include ('dbconnect.php');

  if(isset($_GET['fun']))
  {
    $tfun = $_GET['fun'];
  }

  $sql = "SELECT * FROM tb_temporary
          LEFT JOIN tb_project ON tb_temporary.t_id = tb_project.p_id
          LEFT JOIN tb_status ON tb_temporary.t_status = tb_status.s_id
          WHERE t_fun='$tfun'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Entry Request Approval</h1>
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
              <br>
              <a href="approvemodifynew.php?fun=<?php echo $row['t_fun'];?>" class="btn btn-success">Approve</a>&nbsp&nbsp
              <a href="declinemodifynew.php?fun=<?php echo $row['t_fun'];?>" class="btn btn-danger">Decline</a>
              <a href="modifyapprovallist.php" class="btn btn-secondary float-right">Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'footer.php'; ?>