<?php
session_start();
if(isset($_POST["UPDATE"])) {
    require "../includes/config.php";
    $student_id = $_POST["student_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $birth_date = $_POST["birth_date"];
    $sex = $_POST["sex"];
    $department = $_POST["department"];
    $course = $_POST["course"];

    $sql = "UPDATE students SET first_name = ?, last_name = ?, email = ?, birth_date = ?,
    sex = ?, department = ?, course = ? WHERE student_id = ?;";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION["status"] = "Something went wrong";
        header("Location: update-student.php?stmt=failed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ssssssss", $first_name, $last_name, $email, $birth_date, $sex, $department, $course, $student_id);
        mysqli_stmt_execute($stmt);
        $_SESSION["status-success"] = "Updated Successfully!";
        header("Location: students.php?update=success");
        exit();
    }
} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: students.php");
    exit();
}