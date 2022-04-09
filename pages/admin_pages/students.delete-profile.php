<?php
session_start();

if(isset($_POST["delete"])) {
    require "../includes/config.php";
    $users_id = $_POST["users_id"];
    $image_directory = $_POST["image_directory"];
    
    // $sql = "SELECT * FROM image_profiles WHERE users_id = '$users_id';";
    // $result = $con->query($sql);
    // $row = $result->fetch_assoc();
    // $fileDirectory = $row["image_directory"];
    // $fileExt = explode(".", $fileDirectory);
    // $fileExtension = $fileExt[1];
    // $file = "uploads/".$row['name'].".".$fileExtension;
    $file = $image_directory;
    
    if(!unlink($file)) {
        $_SESSION["status"] = "Failed to delete";
        header("Location: students.view-result.php?ID=$users_id");
        exit();
    } else {
        $sql = "DELETE FROM image_profiles WHERE users_id = '$users_id'";
        $con->query($sql);
        $_SESSION["status-success"] = "Profile Deleted";
        header("Location: students.view-result.php?ID=$users_id");
        exit();

    }

} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: students.view-result.php?ID=$users_id");
    exit();
}



