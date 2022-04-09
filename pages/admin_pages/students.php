<?php 
require "../includes/admin-authentication.php";
$page_title = "Student records";

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
    require "../includes/config.php";
    $sql = "SELECT * FROM students";
    $result = $con->query($sql);
?>

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


<a href="records.php" class="btn btn-primary">Go back records page</a>
<form action="student.search.result.php" method="get">
    <input type="text" name="search" id="search" placeholder="Search">
    <button type="submit" class="btn btn-primary">Search</button>
</form>

<table class="users-data">
    <thead>
        <tr>
            <th>Details</th>
            <th>STUDENT ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>EMAIL</th>
            <th>BIRTHDATE</th>
            <th>SEX</th>
            <th>DEPARTMENT</th>
            <th>COURSE</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tbody>
        <tr>
            <td><a href="students.view-result.php?ID=<?= $row["student_id"]; ?>">View Details</a></td>
            <td><?php echo $row["student_id"]; ?></td>
            <td><?php echo $row["first_name"]; ?></td>
            <td><?php echo $row["last_name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["birth_date"]; ?></td>
            <td><?php echo $row["sex"]; ?></td>
            <td><a href="department.result.php?department_id=<?= $row["department"]; ?>"><?php echo $row["department"]; ?></a></td>
            <td><a href="course.result.php?course_id=<?= $row["course"]; ?>"><?php echo $row["course"]; ?></a></td>
            <td class="action">
            <form action="update-student.php" method="post">
                <input type="hidden" name="student_id" value="<?php echo $row["student_id"]; ?>">
                <input type="hidden" name="first_name" value="<?php echo $row["first_name"]; ?>">
                <input type="hidden" name="last_name" value="<?php echo $row["last_name"]; ?>">
                <input type="hidden" name="email" value="<?php echo $row["email"]; ?>">
                <input type="hidden" name="birth_date" value="<?php echo $row["birth_date"]; ?>">
                <input type="hidden" name="sex" value="<?php echo $row["sex"]; ?>">
                <input type="hidden" name="department" value="<?php echo $row["department"]; ?>">
                <input type="hidden" name="course" value="<?php echo $row["course"]; ?>">
                <button class="btn btn-primary" name="submit">UPDATE</button>
            </form>
            <form action="delete-student.php" method="post">
                <input type="hidden" name="student_id" value="<?php echo $row["student_id"] ?>">
                <button class="btn btn-danger" name="submit">DELETE</button>
            </form>
        </td>
        </tr>
    </tbody>
    <?php } ?>
</table>


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
                        <h1>ADD USER</h1>
                    </div>
                    <div class="card-body">
                        <form action="add.students.inc.php" method="post">
                        <?php if(isset($_GET["firstname"])) { $firstname = $_GET["firstname"]; ?>
                            <div class="form-group mb-3">
                                <label for="firstname">First name</label>
                                <input type="text" name="firstname" id="firstname" placeholder="First name" value="<?= $firstname ?>">
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-3">
                                <label for="firstname">First name</label>
                                <input type="text" name="firstname" id="firstname" placeholder="First name">
                            </div>
                        <?php } ?>
                        <?php if(isset($_GET["lastname"])) { $lastname = $_GET["lastname"]; ?>
                            <div class="form-group mb-3">
                                <label for="lastname">Last name</label>
                                <input type="text" name="lastname" id="lastname" placeholder="Last name" value="<?= $lastname ?>">
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-3">
                                <label for="lastname">Last name</label>
                                <input type="text" name="lastname" id="lastname" placeholder="Last name">
                            </div>
                        <?php } ?>
                        <?php if(isset($_GET["email"])) { $email = $_GET["email"]; ?>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" value="<?= $email ?>">
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" placeholder="Email">
                            </div>
                        <?php } ?>
                        <?php if(isset($_GET["birth_date"])) { $birth_date = $_GET["birth_date"]; ?>
                            <div class="form-group mb-3">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" name="birth_date" id="birth_date" placeholder="YEAR-MONTH-DAY" value="<?= $birth_date ?>">
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-3">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" name="birth_date" id="birth_date" placeholder="YEAR-MONTH-DAY">
                            </div>
                        <?php } ?>
                        <div class="form-group mb-3">
                        <select name="sex" id="sex">
                            <option value="SEX">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        </div>
                

                        <!-- <?php if(isset($_GET["sex"])) { $sex = $_GET["sex"]; ?>
                            <div class="form-group mb-3">
                                <label for="sex">Gender</label>
                                <input type="text" name="sex" id="sex" placeholder="Gender" value="<?= $sex ?>">
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-3">
                                <label for="sex">Gender</label>
                                <input type="text" name="sex" id="sex" placeholder="Gender">
                            </div>
                        <?php } ?> -->
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary" name="submit">ADD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php 
        require "../includes/config.php";
        $sql = "SELECT * FROM articles";
        $results = $con->query($sql);

       
    ?>
    <?php while($row = $results->fetch_assoc()) { ?>
    <div class="articles">
        <p><?= $row["title"]; ?></p>
        <p><?= $row["content"]; ?></p>
        <p><?= $row["author"]; ?></p>
        <p><?= $row["created_at"]; ?></p>
        <p><?= $row["updated_at"]; ?></p>
    </div>
    <?php } ?>
</div>

<?php require "../includes/footer.php"; ?>