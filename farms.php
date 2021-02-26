<?php

   include ('sessionadmin.php');




  include 'header.php';

  include ('dbconnect.php');



  //Retreave booking and join()

  $sql = "SELECT * FROM tb_farm

          LEFT JOIN tb_status ON tb_farm.f_status = tb_status.s_id

          LEFT JOIN tb_user ON tb_farm.f_no = tb_user.u_no

          WHERE f_status='2'";

  $result = mysqli_query($con, $sql);

?>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <form class="form-inline ml-3" method="POST" action="searchprocess.php">

              <div class="input-group input-group-sm">

                <h1>Farm List</h1>&nbsp&nbsp&nbsp&nbsp&nbsp

                
                <div class="input-group-append">

                  <button class="btn btn-navbar" type="submit">

                  

                  </button>

                </div>

              </div>

            </form>



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

      <div class="container-fluid">

        <div class="row">

          <!-- left column -->

          <div class="col-sm-12">

            <!-- general form elements -->

            <div class="card card-warning">

              <div class="card-header">

                <h3 class="card-title">Registered Farm</h3>



              </div>

              <!-- /.card-header -->

              <div class="card-body p-0">

                <table class="table">

                  <thead>

                    <tr>

                      <th>No.</th>

                      <th>Farm ID</th>

                      <th>Company Name</th>

                      <th>Operation</th>

                    </tr>

                  </thead>

                  <tbody>

                    <?php

                    $count=1;

                      while($row=mysqli_fetch_array($result))

                      {

                        echo "<tr>";

                        echo "<td>".$count."</td>";

                        echo "<td>".$row['f_id']."</td>";

                        echo "<td>".$row['f_company']."</td>";

                        echo "<td>";

                          echo "<a href='farmview.php?no=".$row['f_no']."' class='btn btn-primary'>View</a>";

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
    </section>
  </div>

              <!-- /.card-body -->



    <?php include 'footer.php'; ?>