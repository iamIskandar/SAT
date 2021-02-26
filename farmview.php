<?php
    include ('sessionadmin.php');


  include 'header.php';
  include ('dbconnect.php');

  if(isset($_GET['no']))
  {
    $fno = $_GET['no'];
  }

  $sql = "SELECT * FROM tb_farm WHERE f_no='$fno'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);

  $pass = 0;
 ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <form class="form-inline ml-3" method="POST" action="searchprocess.php">
              <div class="input-group input-group-sm">
                <h1>Farm: <?php echo $row['f_id']?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp
                
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                   
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">&nbsp&nbsp&nbsp&nbsp
               <?php echo"<h3>Today: ".date("d-m-y")."&nbsp&nbsp&nbsp</h3>"; ?>&nbsp&nbsp
              <a href='farms.php' class='btn btn-secondary'>Back</a>&nbsp&nbsp
              <a href='addproject.php?id=<?php echo $row['f_id']?>' class='btn btn-warning'>Add Project</a>&nbsp&nbsp
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
              <h3 class="card-title">New Project</h3>
            </div>
            <div class="card-body">
               <div class="table-responsive">
          <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Project Name</th>
                      <th>Date DOC (Exp.)</th>
                      <th>Date Harvest (Exp.)</th>
                      <th>Quantity (Exp.)</th>
                      <th>Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql1 = "SELECT * FROM tb_project
                               LEFT JOIN tb_status ON tb_project.p_status=tb_status.s_id
                               WHERE p_no='$fno' AND p_status='4'";
                      $result1 = mysqli_query($con, $sql1);
                      $count=1;
                      while($row1=mysqli_fetch_array($result1))
                      {
                        echo "<tr>";
                        echo"<td>".$count."</td>";
                        echo "<td>".$row1['p_name']."</td>";
                        echo "<td>".$row1['p_dateDoc']."</td>";
                        echo "<td>".$row1['p_dateHarvest']."</td>";
                        echo "<td>".$row1['p_qtyDoc']."</td>";
                        echo "<td>";
                          echo "<a href='farmviewnew.php?id=".$row1['p_id']."&pass=".$pass."' class='btn btn-primary'>View</a></td></tr>";
                         $count=$count+1;
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
              <h3 class="card-title">In-Progress Project</h3>
            </div>
            <div class="card-body">
               <div class="table-responsive">
              <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Project Name</th>
                      <th>Mortality (%)</th>
                      <th>Total Current/DOC</th>
                      <th>Day</th>
                      <th>Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql2 = "SELECT * FROM tb_project
                              LEFT JOIN tb_status ON tb_project.p_status=tb_status.s_id
                              LEFT JOIN tb_record ON tb_project.p_id=tb_record.r_id
                              WHERE p_no='$fno' AND p_status='5'";
                      $result2 = mysqli_query($con, $sql2);
                      $count=1;
                      while($row2=mysqli_fetch_array($result2))
                      {
                          $sql3 = "SELECT * FROM tb_batch WHERE b_id='".$row2['p_id']."'";
                          $result3 = mysqli_query($con,$sql3);
                          $row3 = mysqli_fetch_array($result3);

                          $start=date('Y-m-d',strtotime($row3['b_date']));
                          $current=date('Y-m-d',strtotime(date('Y-m-d')));

                          $daydiff=abs(strtotime($current)-strtotime($start));
                          $numday=$daydiff/(60*60*24);

                        echo "<tr>";
                        echo"<td>".$count."</td>";
                        echo "<td>".$row2['p_name']."</td>";
                        echo "<td>".$row2['r_mortality']."</td>";
                        echo "<td>".$row2['r_currentQty']."/".$row2['r_chickenQty']."</td>";
                        echo "<td>".$numday."</td>";
                        echo "<td>";
                        echo "<a href='dailyrecordviewadmin.php?id=".$row2['p_id']."&pass=".$pass."' class='btn btn-primary'>View</a>";
                        echo "</td>";
                           $count=$count+1;
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
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Closed Project</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Project Name</th>
                      <th>Mortality (%)</th>
                      <th>Total Harvest</th>
                      <th>Total Days</th>
                      <th>Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql4 = "SELECT * FROM tb_project
                             LEFT JOIN tb_status ON tb_project.p_status=tb_status.s_id
                             LEFT JOIN tb_record ON tb_project.p_id=tb_record.r_id
                             WHERE p_no='$fno' AND p_status='6'";
                    $result4 = mysqli_query($con, $sql4);
                    $count=1;
                      while($row4=mysqli_fetch_array($result4))
                      {
                        echo "<tr>";
                        echo"<td>".$count."</td>";
                        echo "<td>".$row4['p_name']."</td>";
                        echo "<td>".$row4['r_mortality']."</td>";
                        echo "<td>".$row4['r_harvestQty']."</td>";
                        
                        $sql5 = "SELECT * FROM tb_batch 
                          LEFT JOIN tb_harvest ON tb_batch.b_id=tb_harvest.h_id
                          WHERE b_id='".$row4['p_id']."'";
                  $result5 = mysqli_query($con,$sql5);
                  $row5 = mysqli_fetch_array($result5);

                  $batch=date('Y-m-d',strtotime($row5['b_date']));
                  $harvest=date('Y-m-d',strtotime($row5['h_date']));

                  $daydiff=abs(strtotime($harvest)-strtotime($batch));
                  $numday=$daydiff/(60*60*24);

                  echo "<td>".$numday."</td>";
                  
                  echo "<td>";
                  echo "<div class='dropdown'>
                          <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action
                            <span class='caret'></span>
                          </button>
                          <ul class='dropdown-menu'>
                            <li class='dropdown-header' id='mari'><a href='viewreportadmin.php?id=".$row4['p_id']."&pass=".$pass."' style='color:black;'>&nbspReport</a></li>
                            <li class='dropdown-divider'></li>
                            <li class='dropdown-header' id='mari'><a href='fieldworklistadmin.php?id=".$row4['p_id']."&pass=".$pass."' style='color:black;'>&nbspField Work</a></li>
                            <li class='dropdown-divider'></li>
                            <li class='dropdown-header' id='mari'><a href='dailyrecordviewadminclosed.php?id=".$row4['p_id']."&pass=".$pass."' style='color:black;'>&nbspChicken Record</a></li>
                          </ul>
                        </div></td>";
                          $count=$count+1;
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
            
<?php include 'footer.php'; ?>