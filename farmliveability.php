<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

  include ('sessionadmin.php');
  include 'header.php';
  include ('dbconnect.php');

  $sqla = "SELECT * FROM tb_farm
          LEFT JOIN tb_status ON tb_farm.f_status=tb_status.s_id
          ";
  $resulta = mysqli_query($con,$sqla);
  //var_dump($sql);

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
                <h1>Liveability Farm List</h1>&nbsp&nbsp&nbsp&nbsp&nbsp
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
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
                <h3 class="card-title">Liveability List</h3>

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
                    while($rowa = mysqli_fetch_array($resulta))
                      {
                        echo "<tr>";
                        echo "<td>".$count."</td>";
                        echo "<td>".$rowa['f_id']."</td>";
                        echo "<td>".$rowa['f_company']."</td>";
                        echo "<td>";
                        echo "<a href='projectliveability.php?id=".$rowa['f_id']."' class='btn btn-primary'>View</a>";
                        echo "</td>";
                        
                      $count=$count+1;
                      }
                  
                    ?>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              </div>
            </div>
            </div>
          </div>
              
&nbsp&nbsp&nbsp<a href="adminstatistic.php" class="btn btn-secondary">Back</a>

    <?php include 'footer.php'; ?>