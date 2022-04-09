<?php
session_start();

if(isset($_POST["submit"])) {
    require "config.php";
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $birth_date = $_POST["birth_date"];
    $sex = $_POST["sex"];

    if(empty($firstname) || empty($lastname) || empty($email) || empty($birth_date) || empty($sex)) {
        $_SESSION["status"] = "Fill Empty Fields";
        header("Location: ../add.students.php?error=emptyfields&firstname=".$firstname."&lastname=".$lastname."&email=".$email."&birth_date=".$birth_date."&sex=".$sex);
        exit();
    } else if(!preg_match("/^[a-zA-Z09]*$/", $firstname)) {
        $_SESSION["status"] = "Invalid First name";
        header("Location: ../add.students.php?error=invalidfirstname&lastname=".$lastname."&email=".$email."&birth_date=".$birth_date."&sex=".$sex);
        exit();
    } else if(!preg_match("/^[a-zA-Z09]*$/", $lastname)) {
        $_SESSION["status"] = "Invalid Last name";
        header("Location: ../add.students.php?error=invalidlastname&firstname=".$firstname."&email=".$email."&birth_date=".$birth_date."&sex=".$sex);
        exit();
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["status"] = "Invalid Email";
        header("Location: ../add.students.php?error=invalidemail&firstname=".$firstname."&lastname=".$lastname."&birth_date=".$birth_date."&sex=".$sex);
        exit();
    } else {
        $sql = "SELECT * FROM students WHERE email = ?;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION["status"] = "Something went wrong";
            header("Location: ../add.students.php");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowEmailCount = mysqli_stmt_num_rows($stmt);

            if($rowEmailCount > 0) {
                $_SESSION["status"] = "Email Already Taken";
                header("Location: ../add.students.php?error=emailtaken&firstname=".$firstname."&lastname=".$lastname."&birth_date=".$birth_date."&sex=".$sex);
                exit();
            } else {
               
                $sql = "INSERT INTO students (first_name, last_name, email, birth_date, sex) VALUES(?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    $_SESSION["status"] = "Something went wrong";
                    header("Location: ../add.students.php");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $birth_date, $sex);
                    mysqli_stmt_execute($stmt);
                    $_SESSION["status-success"] = "Add Success!";
                    header("Location: ../admin_pages/records.php");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../add.students.php");
    exit();
}