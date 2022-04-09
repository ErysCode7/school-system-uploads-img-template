<?php
session_start();
$access = $_SESSION["access"];

if(!isset($_SESSION["administrator"]) && $access !== "Administrator") {
    $_SESSION["status"] = "Please Log in to Access User Dashboard";
    header("Location: ../login.php");
    exit();
}

 