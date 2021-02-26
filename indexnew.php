<!DOCTYPE html>
<?php
include ('css/loginstyle.css');
include ('dbconnect.php');
?>
<html lang="en">

<head>

  <title>SAT Sdn Bhd</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php">
        <img src="img/sat.jpeg" alt="logo" style="width:50px;height:50px;"> Smart Agric Trading</a>

      <button class="navbar-toggler navbar" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" >
        Menu
        <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">

          <li class="nav-item">

            <!-- <form class="modal-content animate" action="login.php" method="post"></form> -->
            <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;"type="submit" class="btn btn-warning">Log In</button>&nbsp
            <div id="id01" class="modal">
              <div class="container">

              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              <form class="modal-content animate" action="loginprocess.php" method="post">
              <div class="container">
              <label>
                <h3 type="text"><b>LOGIN</b> </h3>
              </label>

              <br><br>

              <label for="uid"><b>ID</b></label>
              <input type="text" placeholder="Enter ID" id="uid" name="uid" required>

              <label for="upassword"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" id= "upassword" name="upassword" required>
        
              <button type="submit">Login</button>
              <br><br>
            <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
              </div>
            </form>
          </div>
        </div>

          <script>
          // Get the modal
          var modal = document.getElementById('id01');

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
          if (event.target == modal) {
           modal.style.display = "none";
            }
          }
          </script>
            
          </li>

          <li class="nav-item">
            <button onclick="document.getElementById('id02').style.display='block'" style="width: auto;"type="submit" class="btn btn-warning">Register</button>
            <div id="id02" class="modal">
            <div class="container">
              <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
              <form class="modal-content animate" action="registerprocess.php" method="POST">
              <div class="container">
                <label>
                <h3 type="text"><b>REGISTER</b> </h3>
                </label>
                <br>

               <label for="email"><b>Name</b></label>
               <input type="text" placeholder="Enter Your Name" id="uname" name="uname" required>
 
               <label for="email"><b>Company (optional)</b></label>
               <input type="text" placeholder="Enter Company Name" id="fcompany" name="fcompany" required>

               <label for="comment"><b>Address</b></label>
               <input type="text" placeholder="Enter Full Address" id="faddress" name="faddress" required>

               <label for="email"><b>Contact Number</b></label>
               <input type="text" placeholder="Enter Contact Number" id="utelNo" name="utelNo" required>
 
               <label for="email"><b>Total Coop</b></label>
               <input type="text" placeholder="Enter Total Coop" id="ftotalCoop" name="ftotalCoop" required>

               <label for="email"><b>Farm Capacity</b></label>
               <input type="text" placeholder="Enter Farm Capacity" id="fcapacity" name="fcapacity" required>
        
               <button type="submit">Register</button>
               <br><br>

               <button type="submit" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
             </div>
           </form>
        </div>
      </div>

              <script>
              // Get the modal
              var modal = document.getElementById('id02');

              // When the user clicks anywhere outside of the modal, close it
              window.onclick = function(event) {
                if (event.target == modal) {
                     modal.style.display = "none";
                     }
                  }
              </script>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        
        <div class="intro-heading text-uppercase">Manage Your Farm Here</div>
        <button onclick="document.getElementById('id02').style.display='block'" style="width: auto;"type="submit" class="btn btn-primary btn-xl text-uppercase js-scroll-trigger">Get Started</button>
      </div>
    </div>
  </header>

  <!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Services</h2>
          <h3 class="section-subheading text-muted">We are expertise in managing farms.</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">E-Commerce</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Responsive Design</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Web Security</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; SAT Sdn Bhd</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="http://wa.me/60108287483">
                <i class="fab fa-whatsapp" ></i>
              </a>
            </li>
            
          </ul>
        </div>
       
      </div>
    </div>
  </footer>
  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>

</html>