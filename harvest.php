<?php
include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }
  
include 'headerfarmer.php';
include ('dbconnect.php');
 

if(isset($_GET['id']))
{
    $bid=$_GET['id'];
}

$sql = "SELECT * FROM tb_batch WHERE b_id='$bid'";
$result = mysqli_query($con,$sql);
$row= mysqli_fetch_array($result);

?>

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Final Record</h1>
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
              <h3 class="card-title">Operational Cost</h3>
            </div>
            <div class="card-body">
              <div class="container-fluid">
                <form action="harvestconfirm.php" method="POST" >
                  <div class="row">
                      <div class="col-sm-6">
                         <div class="form-group">
                            <label for="ocstarterprice">Starter Price (RM)</label>
                            <input type="text" class="form-control" name="ocstarterprice" id="ocstarterprice" placeholder="Enter Starter Price" required="required">
                         </div>
                      </div>

                      <div class="col-sm-6">
                         <div class="form-group">
                            <label for="occrumbleprice">Crumble Price (RM)</label>
                            <input type="text" class="form-control" name="occrumbleprice" id="occrumbleprice" placeholder="Enter Crumble Price" required="required">
                         </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                            <label for="ocgrowerprice">Grower Price (RM)</label>
                            <input type="text" class="form-control" name="ocgrowerprice" id="ocgrowerprice" placeholder="Enter Grower Price" required="required">
                         </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                            <label for="ocmedicprice">Medical Price (RM)</label>
                            <input type="text" class="form-control" name="ocmedicprice" id="ocmedicprice" placeholder="Enter Medic Price" required="required">
                         </div>
                      </div>

                      <div class="col-sm-6">
                         <div class="form-group">
                            <label for="ocwages">Wages (RM)</label>
                            <input type="text" class="form-control" name="ocwages" id="ocwages" placeholder="Wages" value="0">
                         </div>
                      </div>
                   
                   <div class="col-sm-6">
                         <div class="form-group">
                            <label for="ocrental">Rental (RM)</label>
                            <input type="text" class="form-control" name="ocrental" id="ocrental" placeholder="Rental" value="0">
                         </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                          <label for="ocfmaintainence">Farm Maintenance (RM)</label>
                          <input name="ocfmaintainence" type="text" class="form-control" id="ocfmaintainence" placeholder="Farm Maintainence" value="0"></input>
                         </div>
                      </div>
                   
                   
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label for="ocutility">Utility (RM)</label>
                            <input name="ocutility" type="text" class="form-control" id="ocutility" placeholder="Utility" value="0"></input>
                          </div>
                      </div>
                   
                   
                      <div class="col-sm-6">
                         <div class="form-group">
                             <label for="ocsawdust">Saw Dust (RM)</label>
                             <input name="ocsawdust" type="text" class="form-control" id="ocsawdust" placeholder="Saw Dust" value="0"></input>
                         </div>
                      </div>
                   
                      <div class="col-sm-6">
                         <div class="form-group">
                            <label for="ocfuel">Fuel (RM)</label>
                            <input name="ocfuel" type="text" class="form-control" id="ocfuel" placeholder="Fuel" value="0"></input>
                         </div>
                      </div>
                   
                      <div class="col-sm-6">
                         <div class="form-group">
                            <label for="ocmachinery">Machinery (RM)</label>
                            <input name="ocmachinery" type="text" class="form-control" id="ocmachinery" placeholder="Machinery" value="0"></input>
                        </div>
                      </div>
                   
                      <div class="col-sm-6">
                         <div class="form-group">
                           <label for="ocmmaintainence">Machine Maintainence (RM)</label>
                           <input name="ocmmaintainence" type="text" class="form-control" id="ocmmaintainence" placeholder="Machine Maintainence" value="0"></input>
                        </div>
                      </div>

                   <div class="col-sm-6">
                       <div class="form-group">
                          <label for="">Off Management (RM)</label>
                          <input name="ocoffmanagement" type="text" class="form-control" id="ocoffmanagement" placeholder="Off Management" value="0"></input>
                       </div>
                   </div>

                  <div class="col-sm-6">
                   <div class="form-group">
                      <label for="ocgas">Gas (RM)</label>
                      <input name="ocgas" type="text" class="form-control" id="ocgas" placeholder="Gas" value="0"></input>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="ocother">Others (RM)</label>
                    <input name="ocother" type="text" class="form-control" id="ocother" placeholder="Others" value="0"></input>
                  </div>
                </div>
                   
                    
              </div>
               
          <input type="hidden" name="bid" id="bid" value="<?php echo $row['b_id']; ?>">
          &nbsp&nbsp<button type="submit" class="btn btn-warning">Generate Report</button>&nbsp
          <button type="reset" class="btn btn-secondary">Reset</button>
          
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>
          
<?php include 'footer.php'; ?>