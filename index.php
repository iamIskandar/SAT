<?php
session_start();

  include ('dbconnect.php');

    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Smart Agric Trading</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php">
        <img src="img/satcrop.jpeg" alt="logo" style="width:50px;height:50px;">&nbspSmart Agric Trading
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"aria-expanded="false" aria-label="Toggle navigation" style="color:black;">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="loginpage.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="registerpage.php">Register Farm</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
     
        <div class="intro-heading text-uppercase"><br>Manage Your Farm Here</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="registerpage.php" style="color:black">Start Now</a>
      </div>
    </div>
    <br><br><br>
  </header>

  <!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Join Us Now As We</h2><br>
         
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-handshake-o fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Create Business</h4>
          <p class="text-muted">We create business oportunities for breeders and established breeding company as we assigns projects to respective farms </p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Monitor Your Farms</h4>
          <p class="text-muted">We keep track your chicken's Record data for every projects</p>
        </div>
          <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-pencil-square-o fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Provide Consultation</h4>
          <p class="text-muted">We provide consultation at the end of every projects to improve yourr performance in the future</p>
        </div>

     
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php
 include('footer.php');
 ?>
</body>

</html>
