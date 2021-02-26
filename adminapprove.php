<?php
   include ('sessionadmin.php');
  include 'header.php';
 

  include ('dbconnect.php');

  $sql = "SELECT * FROM tb_farm
          LEFT JOIN tb_status ON tb_farm.f_status = tb_status.s_id
          LEFT JOIN tb_user ON tb_farm.f_no = tb_user.u_no
          WHERE f_status='1'";
  $result = mysqli_query($con, $sql);

?>

  <div class="content-wrapper">
   
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Farm Approval</h1>
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
                <h3 class="card-title">Request List</h3>
              </div>
              <div class="card-body p-0">
                  <div class="table-responsive-sm">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Farmer Name</th>
                      <th>Telephone Number</th>
                      <th>Company Name</th>
                      <th>Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $count = 1;
                      while($row=mysqli_fetch_array($result))
                      {
                        echo "<tr>";
                        echo "<td>".$count."</td>";
                        echo "<td>".$row['u_name']."</td>";
                        echo "<td>".$row['u_telNo']."</td>";

                        if(!$row['f_company'])
                        {
                          echo"<td><strong>-</strong></td>";
                        }
                        else
                        {
                            echo "<td>".$row['f_company']."</td>";
                        }
                      
                        echo "<td>";


                           echo "<div class='dropdown'>
                          <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action
                            <span class='caret'></span>
                          </button>


                           <ul class='dropdown-menu'>
                            <li class='dropdown-header'id='mari'><a href='adminregister.php?no=".$row['f_no']."' style='color:black;'>&nbspApprove</a></li>
                            <li class='dropdown-divider id='mari'></li>
                            <li class='dropdown-header' id='mari'><a href='admindecline.php?no=".$row['f_no']."' style='color:black;'>&nbspDecline</a></li>
                            
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
      </div>
    </section>
  </div>

<?php include 'footer.php'; ?>