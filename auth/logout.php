<?php

session_start();
session_unset();
session_destroy();

header("Location: http://localhost/workspace/ns_coffee/index.php");
