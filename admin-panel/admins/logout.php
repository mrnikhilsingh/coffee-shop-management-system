<?php

session_start();
session_unset();
session_destroy();

header("Location: http://localhost/workspace/ns-coffee/admin-panel/admins/login.php");
