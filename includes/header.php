<?php session_start() ?>
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

  <!-- icon -->
  <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css" />
  <link rel="stylesheet" href="../css/animate.css" />

  <link rel="stylesheet" href="../css/owl.carousel.min.css" />
  <link rel="stylesheet" href="../css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="../css/magnific-popup.css" />

  <link rel="stylesheet" href="../css/aos.css" />

  <!-- icon -->
  <link rel="stylesheet" href="../css/ionicons.min.css" />

  <link rel="stylesheet" href="../css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="../css/jquery.timepicker.css" />

  <!-- icon -->
  <link rel="stylesheet" href="../css/flaticon.css" />
  <link rel="stylesheet" href="../css/icomoon.css" />
  <!-- main style -->
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">N.S &nbsp;&nbsp;Coffee<small>Delicious Taste</small></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="menu.html" class="nav-link">Menu</a>
          </li>
          <li class="nav-item">
            <a href="services.html" class="nav-link">Services</a>
          </li>
          <li class="nav-item">
            <a href="about.html" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="contact.html" class="nav-link">Contact</a>
          </li>
          <?php if (isset($_SESSION['username'])) {
          ?>
            <!-- show logout button if session is started -->
            <li class="nav-item cart">
              <a href="cart.html" class="nav-link"><span class="icon icon-shopping_cart"></span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['username'] ?>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="auth/logout.php">Log Out</a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a href="auth/login.php" class="nav-link">login</a>
            </li>
            <li class="nav-item">
              <a href="auth/register.php" class="nav-link">register</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->