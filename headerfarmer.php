<?php

  include ('db_session.php');

  if(!session_id())

  {

    session_start();

  }



include ('dbconnect.php');



$uid = $_SESSION['uid'];



$sql="SELECT * FROM tb_user

      LEFT JOIN tb_farm ON tb_user.u_no=tb_farm.f_no

      WHERE u_id='$uid'";

$result=mysqli_query($con,$sql);

$row=mysqli_fetch_array($result);

?>


<!DOCTYPE html>

<html>

<head>

  <style>

   #mari:hover{
    background:lightgray;

  }

</style>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>SAT | Farmer</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">



  <!-- Font Awesome -->

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini">

  

<div class="wrapper">

  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->

    <ul class="navbar-nav">

      <li class="nav-item">

        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>

      </li>

      

    </ul>



  </nav>

  <!-- /.navbar -->



  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <a href="inprogress.php" class="brand-link">

      <img src="img/sat.jpeg"

           alt="Smart Agric Trading Logo"

           class="brand-image img-circle elevation-3"

           style="opacity: .8">

      <span class="brand-text font-weight-light">Smart Agric Trading</span>

    </a>

    <!-- Sidebar -->

    <div class="sidebar">

      <!-- Sidebar user (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">

          <a class="d-block"><h5>Farm: <?php echo $row['f_id']; ?></h5></a>

        </div>

      </div>



      <!-- Sidebar Menu -->

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview">

            <a href="farmer.php" class="nav-link">

              <i class="nav-icon fa fas fa-th"></i>

              <p>

                New Project

                
                <?php
                  $sql1 = "SELECT * FROM tb_project WHERE p_status='4' AND p_no='".$row['u_no']."'";
                  $result1 = mysqli_query($con,$sql1);
                  $count1 = 0;
                  while($row1 = mysqli_fetch_array($result1))
                    {
                      $count1 = $count1 + 1;
                    }
                    if($count1==0)
                    {
                      echo "";
                    }
                    else
                    {
                      echo '<span class="badge badge-info right">';
                      echo $count1;
                    }
                  
                  ?>  
                </span>

              </p>

            </a>

          </li>

           <li class="nav-item has-treeview">

            <a href="inprogress.php" class="nav-link">

               <i class="nav-icon fas fas fa-th"></i>
               

              <p>

                In-Progress Project

                

              </p>

            </a>

          </li>

          <li class="nav-item has-treeview">

            <a href="closed.php" class="nav-link">

               <i class="nav-icon fa fas fa-th"></i>

              <p>

               Closed Project

              </p>

            </a>

          </li>

          <li class="nav-item has-treeview">

            <a href="pending.php" class="nav-link">

               <i class="nav-icon fa fas fa-th"></i>

              <p>

               Pending Request

               
                <?php
                  $sql2 = "SELECT * FROM tb_chicken
                          LEFT JOIN tb_project ON tb_chicken.c_id = tb_project.p_id
                          WHERE c_status='1' AND p_no='".$row['u_no']."'";
                  $result2 = mysqli_query($con,$sql2);

                  $sql3 = "SELECT * FROM tb_temporary 
                          LEFT JOIN tb_project ON tb_temporary.t_id = tb_project.p_id
                          WHERE t_status='1' AND p_no='".$row['u_no']."'";
                  $result3 = mysqli_query($con,$sql3);
                  $count1 = 0;
                  while($row2 = mysqli_fetch_array($result2) || $row3 = mysqli_fetch_array($result3))
                    {
                      $count1 = $count1 + 1;
                    }
                    if($count1==0)
                    {
                      echo "";
                    }
                    else
                    {
                      echo '<span class="badge badge-info right">';
                      echo $count1;    
                    }
                  
                  ?>  
                </span>

              </p>

            </a>

          </li>

          <li class="nav-item has-treeview">

            <a href="usermanualfarmer.pdf" targt="_blank" class="nav-link">

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

          </li>

        </ul>

      </nav>

      <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

  </aside>