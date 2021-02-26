s<?php
  include ('db_session.php');
  if(!session_id())
  {
    session_start();
  }

include ('dbconnect.php');
  include ('sessionadmin.php');


$uid = $_SESSION['uid'];

$sql="SELECT * FROM tb_user 
      WHERE uid='$uid'";

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SAT | Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

  <style>
    .badge {
       position:relative;
    }
    .badge[data-badge]:after {
       content:attr(data-badge);
       position:absolute;
       top:-10px;
       right:-10px;
       font-size:.7em;
       background:green;
       color:white;
       width:18px;height:18px;
       text-align:center;
       line-height:18px;
       border-radius:50%;
       box-shadow:0 0 1px #333;
    }


   #mari:hover{
    background:lightgray;

  }

  </style>




</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="adminstatistic.php" class="brand-link">
      <img src="img/sat.jpeg"
           alt="Smart Agric Trading Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Smart Agric Trading</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a class="d-block"><h5>Admin SAT</h5></a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


             <li class="nav-item">
                <a href="adminstatistic.php" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>
                  Home
                </p>
                </a>
              </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fas fa-th"></i>
              <p>
                Farm
                <i class="fas fa-angle-left right"></i>
                
                  <?php
                    $sql1 = "SELECT * FROM tb_farm WHERE f_status='1'";
                    $result1 = mysqli_query($con,$sql1);
                    $count1 = 0;
                    while($row1 = mysqli_fetch_array($result1))
                    {
                      $count1 = $count1 + 1;
                    }
                    $sql2 = "SELECT * FROM tb_chicken WHERE c_status='1'";
                    $result2 = mysqli_query($con,$sql2);
                    $sql3 = "SELECT * FROM tb_temporary WHERE t_status='1'";
                    $result3 = mysqli_query($con,$sql3);
                    $count2 = 0;
                    while($row2 = mysqli_fetch_array($result2) || $row3 = mysqli_fetch_array($result3))
                    {
                      $count2 = $count2 + 1;
                    }
                    if(($count1 + $count2)==0)
                    {
                      echo"";
                    }
                    else
                    {
                      echo '<span class="badge badge-info right">';
                      echo ($count1 + $count2);
                    }
                    
                  ?>  
                  </span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="adminapprove.php" class="nav-link">
                  <i class="fas fa-location-arrow nav-icon"></i>
                  
                    <?php 
                    if($count1==0)
                    {
                      echo"";
                    }
                    else
                    {
                      echo '<span class="badge badge-info right">';
                      echo $count1;
                    }
                    ?>

        
                  </span>
                  <p>Farm Approval</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="modifyapprovallist.php" class="nav-link">
                  <i class="fas fa-location-arrow nav-icon"></i>
                  
                    <?php 
                    if($count2==0)
                    {
                      echo"";
                    }
                    else
                    {
                      echo '<span class="badge badge-info right">';
                      echo $count2;
                    }
                    ?>
                 

                  </span>
                  <p>Farm Request</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="farms.php" class="nav-link">
                  <i class="nav-icon fa fa-location-arrow"></i>
                  <p>Farm List</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fas fa-th"></i>
              <p>
                Project
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="general.php" class="nav-link">
                  <i class="fas fa-location-arrow nav-icon"></i>
                  <p>Register Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="newproject.php" class="nav-link">
                  <i class="fas fa-location-arrow nav-icon"></i>
                  <p>New Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="inprogressadmin.php" class="nav-link">
                  <i class="fas fa-location-arrow nav-icon"></i>
                  <p>In-Progress Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="closedadmin.php" class="nav-link">
                  <i class="fas fa-location-arrow nav-icon"></i>
                  <p>Closed Project</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="usermanualadmin.pdf" target="blank" class="nav-link">
               <i class="fas fa-book-reader"></i>
              <p>
                User Manual
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>