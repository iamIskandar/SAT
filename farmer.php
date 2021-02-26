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

          WHERE u_id='$uid' AND p_status='4'";



  $result = mysqli_query($con, $sql);

?>





  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">
           


            <h1>New Project</h1>

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

                  <th>Project Name</th>

                  <th>Date DOC (Exp.)</th>

                  <th>Harvest Date (Exp.)</th>

                  <th>Quantity (Exp.)</th>

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

                  echo "<td>".$row['p_dateDoc']."</td>";

                  echo "<td>".$row['p_dateHarvest']."</td>";

                  echo "<td>".$row['p_qtyDoc']."</td>";

                  echo "<td>";

                  echo "<div class='dropdown'>
                          <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action
                            <span class='caret'></span>
                          </button>
                          <ul class='dropdown-menu'>
                          <li class='dropdown-header' id='mari'><a href='fieldworklistview.php?id=".$row['p_id']."' style='color:black;'>&nbspView</a></li>

                            <li class='dropdown-divider'></li>
                            <li class='dropdown-header' id='mari'><a href='fieldworklist.php?id=".$row['p_id']."' style='color:black;'>&nbspField Work</a></li>
                            
                            <li class='dropdown-divider'></li>
                            <li class='dropdown-header' id='mari'><a href='batch.php?id=".$row['p_id']."' style='color:black;'>&nbspStart</a></li>
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