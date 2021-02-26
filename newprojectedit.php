<?php
  include ('sessionadmin.php');
  include 'header.php';
  include ('dbconnect.php');

  if(isset($_GET['id']))
  {
    $pid = $_GET['id'];
  }

  $sql = "SELECT * FROM tb_project
           LEFT JOIN tb_status ON tb_project.p_status = tb_status.s_id
           LEFT JOIN tb_user ON tb_project.p_no = tb_user.u_no
           LEFT JOIN tb_farm ON tb_project.p_no = tb_farm.f_no
           WHERE p_id='$pid'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Project</h1>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Create a Project</h3>
              </div>
              <form role="form" action="newprojecteditprocess.php" method="POST">
                <div class="card-body">
                    <div class="form-group">
                      <label for="email">Choose Farm:</label>
                      <?php
                        $sql1 = "SELECT * FROM tb_farm WHERE f_status='2'";
                        $result1 = mysqli_query($con,$sql1);

                        echo '<select class="form-control" id="fid" name="fid">';

                        while($row1=mysqli_fetch_array($result1))
                        {
                          if($row1['f_id'] == $row['f_id'])
                          {
                            echo "<option selected='selected' value='".$row1['f_id']."'>".$row['f_id']."</option>";
                          }
                          else
                          {
                            echo "<option>".$row1['f_id']."</option>";
                          }
                        }

                        echo '</select>';
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="pname">Project Name</label>
                      <input type="text" class="form-control" name="pname" id="pname" placeholder="Enter Project Name" value="<?php echo $row['p_name'];?>">
                    </div>
                    <div class="form-group">
                      <label for="pdateDoc">Date DOC (Exp.)</label>
                      <input type="date" class="form-control" name="pdateDoc" id="pdateDoc" placeholder="Select Date" value="<?php echo $row['p_dateDoc'];?>" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                      <label for="pdateHarvest">Date Harvest (Exp.)</label>
                      <input type="date" class="form-control" name="pdateHarvest" id="pdateHarvest" placeholder="Select Date" value="<?php echo $row['p_dateHarvest'];?>" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>"> 
                    </div>
                      <div class="form-group">
                        <label for="pqtyDoc">Quantity (Exp.)</label>
                        <input type="number" class="form-control" name="pqtyDoc" id="pqtyDoc" placeholder="Enter Quantity" value="<?php echo $row['p_qtyDoc'];?>">
                      </div>
                      <div class="input-group-append">
                        <input type="hidden" id="pid" name="pid" value="<?php echo $row['p_id'];?>">
                        <button type="submit" class="btn btn-primary">Save Changes</button>&nbsp
                        <a href="newproject.php" class="btn btn-secondary float-right">Cancel</a>&nbsp
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<?php include 'footer.php'; ?>