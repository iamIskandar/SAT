<?php
  include ('sessionadmin.php');
  include 'header.php';
  include ('dbconnect.php');

  //Retrieve booking and JOIN
  $sql = "SELECT * FROM tb_project
          LEFT JOIN tb_status ON tb_project.p_status = tb_status.s_id
          LEFT JOIN tb_farm ON tb_project.p_no = tb_farm.f_no
          LEFT JOIN tb_user ON tb_project.p_no = tb_user.u_no
          LEFT JOIN tb_record ON tb_project.p_id=tb_record.r_id
          WHERE p_status='6'";

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
            <h1>Closed Project</h1>
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
               <div class="table-responsive-sm">
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
                  echo "<tr>";
                  echo "<td>".$count."</td>";
                  echo "<td>".$row['f_id']."</td>";
                  echo "<td>".$row['p_name']."</td>";
                  
                  $sql5 = "SELECT * FROM tb_batch 
                          LEFT JOIN tb_harvest ON tb_batch.b_id=tb_harvest.h_id
                          WHERE b_id='".$row['p_id']."'";
                  $result5 = mysqli_query($con,$sql5);
                  $row5 = mysqli_fetch_array($result5);

                  $batch=date('Y-m-d',strtotime($row5['b_date']));
                  $harvest=date('Y-m-d',strtotime($row5['h_date']));

                  $daydiff=abs(strtotime($harvest)-strtotime($batch));
                  $numday=$daydiff/(60*60*24);

                  echo "<td>".$row5['b_date']."</td>";
                  echo "<td>".$row5['h_date']."</td>";
                  echo "<td>".$numday."</td>";
                  echo "<td>";

                  echo "<div class='dropdown'>
                          <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action
                            <span class='caret'></span>
                          </button>
                          <ul class='dropdown-menu'>
                            <li class='dropdown-header' id='mari'><a href='viewreportadmin.php?id=".$row['p_id']."&pass=".$pass."' style='color:black;'>&nbspReport</a></li>
                            <li class='dropdown-divider'></li>
                            <li class='dropdown-header' id='mari'><a href='fieldworklistadmin.php?id=".$row['p_id']."&pass=".$pass."' style='color:black;'>&nbspField Work</a></li>
                            <li class='dropdown-divider'></li>
                            <li class='dropdown-header' id='mari'><a href='dailyrecordviewadminclosed.php?id=".$row['p_id']."&pass=".$pass."' style='color:black;'>&nbspChicken Record</a></li>
                          </ul>
                        </div></td>";

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