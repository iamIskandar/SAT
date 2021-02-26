<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

  include ('sessionadmin.php');
  include 'header.php';
  include ('dbconnect.php');


  $sql = "SELECT * FROM tb_farm
          LEFT JOIN tb_status ON tb_farm.f_status=tb_status.s_id
          WHERE f_status = '2'";
  $result = mysqli_query($con,$sql);
  //var_dump($sql);

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

              <div class="input-group input-group-sm">
                <h1>Nett Farm List</h1>
                </div>
              </div>
            </form>
          </div>
        </div>
     
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
                <h3 class="card-title">Nett List</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <div class="table-responsive-sm">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Farm ID</th>
                      <th>Company Name</th>
                      <th>Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $count=1;
                      while($row = mysqli_fetch_array($result))
                        
                        {
                          echo "<tr>";
                          echo "<td>".$count."</td>";
                          echo "<td>".$row['f_id']."</td>";
                          echo "<td>".$row['f_company']."</td>";
                          echo "<td>";
                            echo "<a href='projectnett.php?id=".$row['f_id']."' class='btn btn-primary'>View</a>";
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
 </div>
 <a href="adminstatistic.php" class="btn btn-secondary">Back</a>

</section>
</div>
              <!-- /.card-body -->
              

    <?php include 'footer.php'; ?>