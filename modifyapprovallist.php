<?php
  include ('sessionadmin.php');
  include 'header.php';
  include ('dbconnect.php');

  $sql = "SELECT * FROM tb_chicken
          LEFT JOIN tb_project ON tb_chicken.c_id = tb_project.p_id
          LEFT JOIN tb_temporary ON tb_chicken.c_no = tb_temporary.t_no
          WHERE c_status='1'";
  $result = mysqli_query($con, $sql);

  $sql2 = "SELECT * FROM tb_temporary 
           LEFT JOIN tb_project ON tb_temporary.t_id = tb_project.p_id
           WHERE t_status='1'";
  $result2 = mysqli_query($con,$sql2);
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Farm Request</h1>
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
          <div class="col-sm-6">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Modification Request</h3>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive-md">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Farm ID</th>
                      <th>Project Name</th>
                      <th>Date Request</th>
                      <th>Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $count = 1;

                      while($row=mysqli_fetch_array($result))
                      {
                        $sql1 = "SELECT * FROM tb_farm WHERE f_no='".$row['p_no']."'";
                        $result1 = mysqli_query($con,$sql1);
                        $row1 = mysqli_fetch_array($result1);

                        echo "<tr>";
                        echo "<td>".$count."</td>";
                        echo "<td>".$row1['f_id']."</td>";
                        echo "<td>".$row['p_name']."</td>";
                        echo "<td>".$row['t_submitDate']."</td>";
                        echo "<td>";
                          echo "<a href='modifyapproval.php?no=".$row['c_no']."' class='btn btn-primary'>View</a>&nbsp";
                        echo "</td>";
                        echo "</tr>";

                        $count = $count + 1;
                      }
                    ?>
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">New Entry Request</h3>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive-md">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Farm ID</th>
                      <th>Project Name</th>
                      <th>Date Request</th>
                      <th>Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $count = 1;

                      while($row2=mysqli_fetch_array($result2))
                      {
                        $sql3 = "SELECT * FROM tb_farm WHERE f_no='".$row2['p_no']."'";
                        $result3 = mysqli_query($con,$sql3);
                        $row3 = mysqli_fetch_array($result3);
                        echo "<tr>";
                        echo "<td>".$count."</td>";
                        echo "<td>".$row3['f_id']."</td>";
                        echo "<td>".$row2['p_name']."</td>";
                        echo "<td>".$row2['t_submitDate']."</td>";
                        echo "<td>";
                          echo "<a href='modifyapprovalnew.php?fun=".$row2['t_fun']."' class='btn btn-primary'>View</a>&nbsp";
                        echo "</td>";
                        echo "</tr>";

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
      </div>
    </section>
  </div>

<?php include 'footer.php'; ?>