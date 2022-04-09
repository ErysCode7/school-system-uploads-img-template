<?php
session_start();



if(isset($_POST["submit"])) {
    require "../includes/config.php";
    $student_id = $_POST["student_id"];

    $sql = "DELETE FROM students WHERE student_id = ?;";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION["status"] = "Something Went Wrong";
        header("Location: students.php");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $student_id);
        mysqli_stmt_execute($stmt);
        $_SESSION["delete-success"] = "Delete Sucess!";
        header("Location: students.php");
        exit();
    }
    
} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: students.php");
    exit();
}

