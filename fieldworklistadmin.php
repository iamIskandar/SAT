<?php
     include ('sessionadmin.php');


  include 'header.php';
  include ('dbconnect.php');

  //Get booking ID
  if(isset($_GET['id']) && isset($_GET['pass']))
{
    $pid=$_GET['id'];
    $pass=$_GET['pass'];
}
  
  //Retreave booking and JOIN
  $sql = "SELECT * FROM tb_fieldwork
           WHERE fw_id='$pid'";

  $result = mysqli_query($con, $sql);

 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Field Work</h1>
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
        
        </div>  
        <div class="col-md-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Field Work Record</h3>
            </div>
            <div class="card-body">
            <table class="table table-hover" style="width: 100%">
              <thead> 
                <tr>
                  <th style="width:20%">Date</th>
                  <th style="width:60%">Description</th>
                </tr>
              </thead>
              <tbody>
              <?php
                while ($row=mysqli_fetch_array($result))
                {
                  echo "<tr>";
                    echo "<td style='width:20%'>".$row['fw_date']."</td>";
                    echo "<td style='width:70%'>".$row['fw_desc']."</td>";
                    echo "<td style='width:10%'>";
                      
                  echo "</tr>";
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
      $sql2 = "SELECT * FROM tb_project WHERE p_id='$pid'";
      $result2 = mysqli_query($con,$sql2);
      $row2 = mysqli_fetch_array($result2);
        if(!$pass)
        {
          echo '<a href="farmview.php?no='.$row2['p_no'].'" class="btn btn-secondary">Back</a>';
        }
        else
        {
          echo '<a href="closedadmin.php?no='.$row2['p_no'].'" class="btn btn-secondary">Back</a>';
        }
      ?>
    </section>
  </div>
    <?php include 'footer.php'; ?>