<?php
require "../includes/admin-authentication.php";
$page_title = "Update student records";

$access = $_SESSION["access"];
if($access !== "Administrator") {
    $_SESSION["status"] = "Please Log in as Administrator";
    header("Location: records.php");
    exit();
}

if(isset($_POST["submit"])) {
    $student_id = $_POST["student_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $birth_date = $_POST["birth_date"];
    $sex = $_POST["sex"];
    $department = $_POST["department"];
    $course = $_POST["course"];
}
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
<div class="bg">

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                <div class="card shadow">
                    <div class="card-header">
                        <h1>UPDATE USER DETAILS</h1>
                    </div>
                    <div class="card-body">
                        <form action="update-student.inc.php" method="post">
                            <div class="form-group mb-3">
                                <label for="firstname">First name</label>
                                <input type="text" name="first_name" id="first_name" placeholder="First name" value="<?= $first_name ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="lastname">Last name</label>
                                <input type="text" name="last_name" id="last_name" placeholder="Last name" value="<?= $last_name ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" value="<?= $email ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" name="birth_date" id="birth_date" placeholder="YEAR-MONTH-DAY" value="<?= $birth_date ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="sex">Gender</label>
                                <input type="text" name="sex" id="sex" placeholder="Gender" value="<?= $sex ?>">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="department">Department</label>
                                    <input type="text" name="department" id="department" placeholder="Department" value="<?= $department ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="course">Course</label>
                                <input type="text" name="course" id="course" placeholder="Course" value="<?= $course ?>">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary" name="UPDATE">UPDATE</button>
                            </div>
                            <input type="hidden" name="student_id" value="  <?= $student_id ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</div>
<?php require "../includes/footer.php"; ?>
