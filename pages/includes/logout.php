<?php

session_start();
unset($_SESSION["administrator"]);
unset($_SESSION["username"]);
unset($_SESSION["access"]);
session_destroy();
header("Location: ../login.php");