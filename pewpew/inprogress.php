<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

  include 'headerfarmer.php';
  include ('dbconnect.php');

  $uid = $_SESSION['uid'];

  //Retrieve booking and JOIN
  $sql = "SELECT * FROM tb_project
          LEFT JOIN tb_status ON tb_project.p_status = tb_status.s_id
          LEFT JOIN tb_farm ON tb_project.p_no = tb_farm.f_no
          LEFT JOIN tb_user ON tb_project.p_no = tb_user.u_no
          LEFT JOIN tb_batch ON tb_project.p_id = tb_batch.b_id
          LEFT JOIN tb_record ON tb_project.p_id=tb_record.r_id
          WHERE p_status='5' AND tb_user.u_id='$uid'";

  $result = mysqli_query($con, $sql);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>In Progress Project</h1>
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
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
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
                  echo "<tr>";
                  echo "<td>".$count."</td>";
                  echo "<td>".$row['p_name']."</td>";
                  echo "<td>".$row['b_date']."</td>";
                  echo "<td>".$row['p_dateHarvest']."</td>";
                   echo "<td>".$row['r_day']."</td>";
                  echo "<td>";
                    echo "<a href='dailyrecord.php?id=".$row['p_id']."' class='btn btn-primary'>Chicken Record</a>&nbsp";
                    echo "<a href='dailyrecordview.php?id=".$row['p_id']."' class='btn btn-secondary'>View</a>&nbsp";
                    echo "<a href='end.php?id=".$row['p_id']."' class='btn btn-danger'>End</a>&nbsp</td></tr>";
                  $count = $count + 1;
                }
              ?>

              </tbody>
            </table>
            </div>
          </div>



                <!-- /.card-body -->

  <?php include 'footer.php' ?>