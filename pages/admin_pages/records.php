<?php 
session_start();
$page_title = "Records";
?>

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

<header class="records-header">
    <a class="active" href="../index.php"><li><i class="fa fa-home"></i><span class="go-home">Go back to home page</span></li></a>
    <a href="../add.students.php">Add a record</a>
    <form action="../includes/logout.php"> 
        <button class="btn btn-danger">Log out</button>
    </form>
</header>

<div class="records-box-0">
    <h1>View <span class="color-records">Records</span></h1>
</div>

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

<div class="records-box-1">
    <div class="records-blocks">
        <a href="department.php"><div class="img">
            <img src="..\..\assets\Images\single_service_01.jpg" alt="">
        </div>
        <div class="text">
            <h2 class="name">Department</h2>
        </div></a>
    </div>
    <div class="records-blocks">
        <a href="course.php"><div class="img">
            <img src="..\..\assets\Images\single_service_03.jpg" alt="">
        </div>
        <div class="text">
            <h2 class="name">Course</h2>
        </div></a>
    </div>
    <div class="records-blocks">
        <a href="teachers.php"><div class="img">
            <img src="..\..\assets\Images\team_01.jpg" class="stud" alt="">
        </div>
        <div class="text">
            <h2 class="name">Teachers</h2>
        </div></a>
    </div>
    <div class="records-blocks">
        <a href="students.php"><div class="img">
            <img src="..\..\assets\Images\team_03.jpg" class="stud" alt="">
        </div>
        <div class="text">
            <h2 class="name">Students</h2>
        </div></a>
    </div>
</div>

<?php require "../includes/footer.php"; ?>





