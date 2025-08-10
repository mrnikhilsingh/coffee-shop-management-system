<?php
session_start();
require_once __DIR__ . '/../../config/config.php'; // Include the configuration file

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ADMINURL; ?>/styles/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?php echo ADMINURL; ?>">N.S Coffee <small>Delicious Taste</small></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarText">
                    <?php if (isset($_SESSION['admin_name'])) { ?>
                        <ul class="navbar-nav side-nav">
                            <li class="nav-item">
                                <a class="nav-link" style="margin-left: 20px;" href="<?php echo ADMINURL; ?>/index.php">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ADMINURL; ?>/admins/admins.php" style="margin-left: 20px;">Admins</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ADMINURL; ?>/orders-admins/show-orders.php" style="margin-left: 20px;">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ADMINURL; ?>/products-admins/show-products.php" style="margin-left: 20px;">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ADMINURL; ?>/bookings-admins/show-bookings.php" style="margin-left: 20px;">Bookings</a>
                            </li>
                        </ul>
                    <?php  } ?>
                    <ul class="navbar-nav ml-md-auto d-md-flex">
                        <?php if (isset($_SESSION['admin_name'])) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['admin_name']; ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/logout.php">Logout</a>
                                </div>
                            </li>
                        <?php  } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo ADMINURL; ?>/admins/login.php">login
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>