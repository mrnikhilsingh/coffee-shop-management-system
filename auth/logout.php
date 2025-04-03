<?php

session_start();
session_unset();
session_destroy();

require_once __DIR__ . '/../config/config.php'; // Include the configuration file

header("Location: " . url . "/index.php"); // Redirect to the home page
exit();
