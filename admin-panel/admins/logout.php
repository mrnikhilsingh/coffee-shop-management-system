<?php

session_start();
session_unset();
session_destroy();

require_once __DIR__ . '/../../config/config.php'; // Include the configuration file

header("Location:" . url . "/admin-panel/admins/login.php"); // Redirect to Admin login page
exit();
