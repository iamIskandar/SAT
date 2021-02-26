<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

  include 'headerfarmer.php';
  include ('dbconnect.php');

  
  $sql = "SELECT * FROM tb_project
          LEFT JOIN tb_status ON tb_project.p_status = tb_status.s_id
          LEFT JOIN tb_farm ON tb_project.p_no = tb_farm.f_no
          LEFT JOIN tb_user ON tb_project.p_no = tb_user.u_no
          LEFT JOIN tb_record ON tb_project.p_id=tb_record.r_id
          WHERE p_status='5' AND tb_user.u_id='$uid'";
  $result = mysqli_query($con, $sql);
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>In-Progress Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php echo"<h3>Today: ".date("d-m-y")."</h3>"; ?>
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
                  <br>
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Project Name</th>
                      <th>Harvest Date (Exp.)</th>
                      <th>Mortality (%)</th>
                      <th>Total Current/DOC</th>
                      <th>Total Harvest</th>
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
                      echo "<td>".$row['p_name']."</td>";
                      echo "<td>".$row['p_dateHarvest']."</td>";
                      echo "<td>".(round($row['r_mortality'],2))."</td>";
                      echo "<td>".$row['r_currentQty']."/".$row['r_chickenQty']."</td>";
                      echo "<td>".$row['r_harvestQty']."</td>";
                      echo "<td>".$numday."</td>";
                      echo "<td>";
                      echo "<div class='dropdown'>
                              <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action
                                <span class='caret'></span>
                              </button>
                              <u1 class='dropdown-menu'>
                              <li class='dropdown-header' id='mari'><a href='dailyrecordview.php?id=".$row['p_id']."' style='color:black;'>&nbspView</a></li>

                                  <li class='dropdown-divider'></li>
                                  <li class='dropdown-header' id='mari'><a href='addbatch.php?id=".$row['p_id']."' style='color:black;'>&nbspNew Batch</a></li>

                                  <li class='dropdown-divider'></li>";
                                  
                                  $sql3 = "SELECT * FROM tb_chicken WHERE c_id='".$row['p_id']."'";
                                  $result3=mysqli_query($con,$sql3);
                                  $row3=mysqli_fetch_array($result3);

                                  if($row3['c_dateRec']==date('Y-m-d'))
                                  {
                                    echo "<li class='dropdown-header' id='mari'>&nbspChicken Record</li>";
                                  }
                                  else
                                  {
                                    echo "<li class='dropdown-header' id='mari'><a href='dailyrecord.php?id=".$row['p_id']."' style='color:black;'>&nbspChicken Record</a></li>";
                                  }


                            echo "<li class='dropdown-divider'></li>
                                  <li class='dropdown-header' id='mari'><a href='afiqah.php?id=".$row['p_id']."' style='color:black;'>&nbspHarvest</a></li>

                                </ul>
                            <div></td>";

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

<?php include 'footer.php';?>