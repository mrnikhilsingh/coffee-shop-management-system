<?php

session_start();
session_unset();
session_destroy();

header("Location: https://nscoffee.free.nf");
