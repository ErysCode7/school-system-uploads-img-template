<?php 
// require "../includes/admin-authentication.php";
session_start();
$page_title = "Student View Details";

?>

<?php $access = $_SESSION["access"];
if($access !== "Administrator") {
    $_SESSION["status"] = "Please Log in as Administrator";
    header("Location: records.php");
    exit();
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($page_title)) {
        echo $page_title;
    } else {
        echo "CRUD";
    } ?></title>
    <link rel="stylesheet" href="..\..\assets\Bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\..\assets\web-fonts-with-css\css\fontawesome-all.min.css">
    <link rel="stylesheet" href="..\..\assets\CSS\style.css">
    <link rel="shortcut icon" href="..\..\assets/Images/banner.jpg" type="image/x-icon">
 </head>
<body>

<?php 
    if(isset($_GET["ID"])) {
        require "../includes/config.php";
        $student_id = $_GET["ID"];
        $sql = "SELECT * FROM students WHERE student_id = '$student_id';";
        $result = $con->query($sql);

        $row = $result->fetch_assoc();
    }
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php
                if(isset($_SESSION["status"])) {
            ?>
            <div class="alert alert-warning">
                <h4><?= $_SESSION["status"]; ?></h4>
            </div>
            <?php unset($_SESSION["status"]); } ?>
            <?php 
                if(isset($_SESSION["status-success"])) {
            ?>
            <div class="alert alert-success">
                <h4><?= $_SESSION["status-success"]; ?></h4>
            </div>
            <?php unset($_SESSION["status-success"]); } ?>
            <div class="card">
                    <div class="card-header">
                         <h4>User Details</h4>
                     </div>
                     <div class="card-body">
                        <h4>Access When you are Logged in</h4>
                        <?php 
                            $sqlImage = "SELECT * FROM image_profiles WHERE users_id = '$student_id';";
                            $stmt = mysqli_stmt_init($con);
                            if(!mysqli_stmt_prepare($stmt, $sqlImage)) {
                                $_SESSION["status"] = "Something went wrong";
                                header("Location: students.php");
                                exit();
                            } else {
                                mysqli_stmt_execute($stmt);
                                $resultImage = mysqli_stmt_get_result($stmt);
                                $rowImage = $resultImage->fetch_assoc();
                            }
                        ?>
                        <div class="profile-image-box">
                        <?php if(!isset($rowImage["status"]) || $rowImage["status"] == 0) { ?>
                            <img src="uploads/placeholder.png" alt="Profile Image" class="placeholder-image">
                        <?php } else { ?>
                            <img src="<?= $rowImage["image_directory"]; ?>" alt="Profile Image" class="profile-image">
                        <?php } ?>
                        </div>
                        <form action="students.upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="student_id" id="student_id" value="<?= $row["student_id"]; ?>"> 
                            <div class="form-group mb-3">
                                <input type="file" name="image" id="image">
                            </div>
                            <div class="profile-buttons">
                                <div class="form-group mb-3">
                                    <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </form>
                        <form action="students.delete-profile.php" method="post">
                            <input type="hidden" name="users_id" id="users_id" value="<?= $rowImage["users_id"]; ?>">
                            <input type="hidden" name="image_directory" id="image_directory" value="<?= $rowImage["image_directory"]; ?>">
                            <div class="profile-buttons">
                                <div class="form-group mb-3">
                                    <button type="submit" name="delete" class="btn btn-danger">Delete Profile Image</button>
                                </div>
                                </div>
                            </div>
                        </form>
                        <p>ID: <?= $row["student_id"] ?></p>
                        <p>FIRST NAME: <?= $row["first_name"] ?></p>
                        <p>LAST NAME: <?= $row["last_name"] ?></p>
                        <p>EMAIL: <?= $row["email"] ?></p>
                        <p>BIRTH DATE: <?= $row["birth_date"] ?></p>
                        <p>SEX: <?= $row["sex"] ?></p>
                        <p><a href="department.result.php?department_id=<?= $row["department"]; ?>"> DEPARTMENT: <?= $row["department"] ?></a></p>
                        <p><a href="course.result.php?course_id=<?= $row["course"]; ?>">COURSE: <?= $row["course"] ?></a></p>
                        <p>CREATED AT: <?= $row["created_at"] ?></p>
                        <p>UPDATED AT: <?= $row["updated_at"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>