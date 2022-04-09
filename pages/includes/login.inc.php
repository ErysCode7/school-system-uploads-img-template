<?php
session_start();
if(isset($_POST["submit"])) {
    require "config.php";
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(empty($username) || empty($password)) {
        $_SESSION["status"] = "Fill in Empty Fields";
        header("Location: ../login.php?error=emptyfields&username=".$username);
        exit();
    } else {
        $sql = "SELECT * FROM administrators WHERE username = ?;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION["status"] = "Something went wrong";
            header("Location: ../login.php");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = $result->fetch_assoc()) {
               
                $password = password_verify($password, $row["password"]);

                if($password == false) {
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: ../login.php");
                    exit();
                } else if($password == true) {
                    $_SESSION["administrator"] = TRUE;
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["access"] = $row["access"];
                    $_SESSION["success-status"] = "Login Success!";
                    header("Location: ../admin_pages/records.php");
                    exit();
                } else {
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: ../login.php");
                    exit();
                }
            
            } else {
                $_SESSION["status"] = "No existing Account. Please Sign up";
                header("Location: ../login.php");
                exit();
            }
        }
    }
} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../login.php");
    exit();
}