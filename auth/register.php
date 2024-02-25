<?php session_start() ?>
<?php
if (isset($_SESSION['username'])) {
  header("Location: http://localhost/workspace/ns-coffee/index.php");
}

include '../config/config.php';

if (isset($_POST['submit'])) {
  if (empty($_POST['username']) or empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('one or more inputs are empty !!')</script>";
  } else {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $password = password_hash($_POST['password'],PASSWORD_DEFAULT); 

    // sql query
    $sql = "INSERT INTO users (username, email, password) VALUES ('{$username}','{$email}','{$password}')";
    mysqli_query($conn, $sql) or die("Query Unsuccessful");
    // redirect to login page
    header("Location: login.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NS Coffee</title>
  <!-- Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <!-- Josefin Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <!-- great vibes -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css" />
  <link rel="stylesheet" href="../css/animate.css" />

  <link rel="stylesheet" href="../css/owl.carousel.min.css" />
  <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css" /> -->
  <!-- <link rel="stylesheet" href="css/magnific-popup.css" /> -->

  <!-- <link rel="stylesheet" href="css/aos.css" /> -->

  <!-- <link rel="stylesheet" href="css/ionicons.min.css" /> -->

  <!-- <link rel="stylesheet" href="css/bootstrap-datepicker.css" /> -->
  <!-- <link rel="stylesheet" href="css/jquery.timepicker.css" /> -->

  <!-- <link rel="stylesheet" href="css/flaticon.css" /> -->
  <link rel="stylesheet" href="../css/icomoon.css" />
  <!-- main style -->
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="../index.html">N.S &nbsp;&nbsp;Coffee<small>Delicious Taste</small></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a href="../index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="../menu.html" class="nav-link">Menu</a>
          </li>
          <li class="nav-item">
            <a href="../services.html" class="nav-link">Services</a>
          </li>
          <li class="nav-item">
            <a href="../about.html" class="nav-link">About</a>
          </li>

          <li class="nav-item">
            <a href="../contact.html" class="nav-link">Contact</a>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link">login</a>
          </li>
          <li class="nav-item">
            <a href="../auth/register.php" class="nav-link">register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(../images/bg_2.jpg)" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">
          <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Register</h1>
            <p class="breadcrumbs">
              <span class="mr-2"><a href="../index.php">Home</a></span>
              <span>Register</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <form action="register.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
            <h3 class="mb-4 billing-heading">Register</h3>
            <div class="row align-items-end">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="Username">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Username" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Email" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group mt-4">
                  <div class="radio">
                    <button class="btn btn-primary py-3 px-4" name="submit">
                      Register
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- END -->
        </div>
        <!-- .col-md-8 -->
      </div>
    </div>
  </section>
  <!-- .section -->

  <footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">About Us</h2>
            <p>
              Far far away, behind the word mountains, far from the countries
              Vokalia and Consonantia, there live the blind texts.
            </p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate">
                <a href="#"><span class="icon-twitter"></span></a>
              </li>
              <li class="ftco-animate">
                <a href="#"><span class="icon-facebook"></span></a>
              </li>
              <li class="ftco-animate">
                <a href="#"><span class="icon-instagram"></span></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Recent Blog</h2>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(../images/image_1.jpg)"></a>
              <div class="text">
                <h3 class="heading">
                  <a href="#">Even the all-powerful Pointing has no control about</a>
                </h3>
                <div class="meta">
                  <div>
                    <a href="#"><span class="icon-calendar"></span> Sept 15, 2023</a>
                  </div>
                  <div>
                    <a href="#"><span class="icon-person"></span> Admin</a>
                  </div>
                  <div>
                    <a href="#"><span class="icon-chat"></span> 19</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(../images/image_2.jpg)"></a>
              <div class="text">
                <h3 class="heading">
                  <a href="#">Even the all-powerful Pointing has no control about</a>
                </h3>
                <div class="meta">
                  <div>
                    <a href="#"><span class="icon-calendar"></span> Sept 15, 2023</a>
                  </div>
                  <div>
                    <a href="#"><span class="icon-person"></span> Admin</a>
                  </div>
                  <div>
                    <a href="#"><span class="icon-chat"></span> 19</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Services</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Cooked</a></li>
              <li><a href="#" class="py-2 d-block">Deliver</a></li>
              <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
              <li><a href="#" class="py-2 d-block">Mixed</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li>
                  <span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California,
                    USA</span>
                </li>
                <li>
                  <a href="#"><span class="icon icon-phone"></span><span class="text">+91 392 3929 210</span></a>
                </li>
                <li>
                  <a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p>
            Copyright &copy; 2024 All rights reserved | Made with
            <i class="icon-heart" aria-hidden="true"></i> by Nikhil Singh
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
  </div>

  <!-- jquery & js files -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <!-- <script src="js/popper.min.js"></script> -->
  <script src="../js/bootstrap.min.js"></script>
  <!-- <script src="js/jquery.easing.1.3.js"></script> -->
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <!-- <script src="js/jquery.magnific-popup.min.js"></script> -->
  <script src="../js/aos.js"></script>
  <!-- <script src="js/jquery.animateNumber.min.js"></script> -->
  <script src="../js/scrollax.min.js"></script>
  <script src="../js/main.js"></script>
</body>

</html>