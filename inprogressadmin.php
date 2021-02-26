<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }
  
  include 'header.php';
  include ('dbconnect.php');

  $uid = $_SESSION['uid'];

  $sql = "SELECT * FROM tb_project
          LEFT JOIN tb_status ON tb_project.p_status = tb_status.s_id
          LEFT JOIN tb_farm ON tb_project.p_no = tb_farm.f_no
          LEFT JOIN tb_user ON tb_project.p_no = tb_user.u_no
          LEFT JOIN tb_record ON tb_project.p_id=tb_record.r_id
          WHERE p_status='5'";
  $result = mysqli_query($con, $sql);
  $pass = 1;
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>In-Progress Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <?php
              echo"<h3>Today: ".date("d-m-y")."</h3>";
              ?>
            </ol>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Project Details</h3>
            </div>
            <div class="card-body">
               <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Farm ID</th>
                  <th>Project Name</th>
                  <th>Date DOC</th>
                  <th>Harvest Date (Exp.)</th>
                  <th>Day</th>
                  <th>Operation</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $count = 1;
                while ($row=mysqli_fetch_array($result))
                {
                  $sql2 = "SELECT * FROM tb_batch WHERE b_id='".$row['p_id']."'";
                  $result2 = mysqli_query($con,$sql2);
                  $row2 = mysqli_fetch_array($result2);

                  $start=date('Y-m-d',strtotime($row2['b_date']));
                  $current=date('Y-m-d',strtotime(date('Y-m-d')));

                  $daydiff=abs(strtotime($current)-strtotime($start));
                  $numday=$daydiff/(60*60*24);

                  echo "<tr>";
                  echo "<td>".$count."</td>";
                  echo "<td>".$row['f_id']."</td>";
                  echo "<td>".$row['p_name']."</td>";
                  echo "<td>".$row2['b_date']."</td>";
                  echo "<td>".$row['p_dateHarvest']."</td>";
                  echo "<td>".$numday."</td>";
                  echo "<td>";
                    echo "<a href='dailyrecordviewadmin.php?id=".$row['p_id']."&pass=".$pass."' class='btn btn-primary'>View</a>&nbsp"; 
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
</section>
</div>

<?php include 'footer.php' ?>