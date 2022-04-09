<?php
session_start();

echo $_POST["student_id"];
if(isset($_POST["upload"])) {
    require "../includes/config.php";
    $student_id = $_POST["student_id"];
    $status = 1;
    $file = $_FILES["image"];
    $fileName = $_FILES["image"]["name"];
    $fileTmpName = $_FILES["image"]["tmp_name"];
    $fileSize = $_FILES["image"]["size"];
    $fileError = $_FILES["image"]["error"];

    $fileExt = explode(".", $fileName);
    $nameOfImage = $fileExt[0];
    $nameOfImage = preg_replace("!-!", "", $nameOfImage);
    $nameOfImage = ucwords($nameOfImage);
    $fileExtension = strtolower(end($fileExt));
    $fileAllowed = array("jpg", "jpeg", "png");
       

    if(in_array($fileExtension, $fileAllowed)) {
        if($fileError === 0) {
            if($fileSize < 8000000) {
                $fileNewName = $fileName;
                $fileDestination = "uploads/".$fileNewName;
                if(move_uploaded_file($fileTmpName, $fileDestination)) {
                    $sql = "INSERT INTO image_profiles(name, image_directory, users_id, status) VALUES(?, ?, ?, ?);";
                    $stmt = mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        $_SESSION["status"] = "Statement Failed";
                        header("Location: students.view-result.php?ID=$student_id");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "ssss", $nameOfImage, $fileDestination, $student_id, $status);
                        mysqli_stmt_execute($stmt);
                        $_SESSION["status-success"] = "Image Uploaded";
                        header("Location: students.view-result.php?ID=$student_id");
                        exit();  
                    }
                } else {
                    $_SESSION["status"] = "Problem has occur, Failed to Upload Image";
                    header("Location: students.view-result.php?ID=$student_id");
                    exit();     
                }
            } else {
                $_SESSION["status"] = "Sorry, your file is too big";
                header("Location: students.view-result.php?ID=$student_id");
                exit();     
            }
        } else {
            $_SESSION["status"] = "Sorry, there was an error uploading the file";
            header("Location: students.view-result.upload.php?ID=$student_id");
            exit();     
        }
    } else {
        $_SESSION["status"] = "Sorry, your file is not accepted";
        header("Location: students.view-result.php?ID=$student_id");
        exit();       
    }
} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: students.view-result.php?ID=$student_id");
    exit();
}