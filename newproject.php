<?php
     include ('sessionadmin.php');

  include 'header.php';
  include ('dbconnect.php');

  $sql = "SELECT * FROM tb_project
          LEFT JOIN tb_status ON tb_project.p_status = tb_status.s_id
          LEFT JOIN tb_farm ON tb_project.p_no = tb_farm.f_no
          LEFT JOIN tb_user ON tb_project.p_no = tb_user.u_no
          WHERE p_status='4'";
  $result = mysqli_query($con, $sql);
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <form class="form-inline ml-3" method="POST" action="searchprocess.php">
              <div class="input-group input-group-sm">
                <h1>New Project</h1>&nbsp&nbsp&nbsp&nbsp&nbsp
                
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    
                  </button>
                </div>
              </div>
            </form>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Project List</h3>
              </div>
              <div class="card-body">
                  <div class="table-responsive-sm">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Farm ID</th>
                        <th>Company Name</th>
                        <th>Project Name</th>
                        <th>Date DOC</th>
                        <th>Date Harvest</th>
                        <th>Quantity</th>
                        <th>Operation</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count = 1;
                        $pass = 1;

                        while($row=mysqli_fetch_array($result))
                        {
                          echo "<tr>";
                          echo "<td>".$count."</td>";
                          echo "<td>".$row['f_id']."</td>";
                          echo "<td>".$row['f_company']."</td>";
                          echo "<td>".$row['p_name']."</td>";
                          echo "<td>".$row['p_dateDoc']."</td>";
                          echo "<td>".$row['p_dateHarvest']."</td>";
                          echo "<td>".$row['p_qtyDoc']."</td>";
                          echo "<td>";
                            echo "<div class='dropdown'>
                                    <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action
                                      <span class='caret'></span>
                                    </button>

                                    <ul class='dropdown-menu'>

                                      <li class='dropdown-header' id='mari'><a href='farmviewnew.php?id=".$row['p_id']."&pass=".$pass."' style='color:black;'>&nbspView</a></li>
                                      <li class='dropdown-divider'></li>
                                      <li class='dropdown-header' id='mari'><a href='newprojectedit.php?id=".$row['p_id']."' style='color:black;'>&nbspEdit</a></li>
                                      <li class='dropdown-divider'></li>
                                      <li class='dropdown-header' id='mari'><a href='newprojectdecline.php?id=".$row['p_id']."' style='color:black;'>&nbspDelete</a></li>
                                      
                                    </ul>
                                  </div></td></tr>";

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