<?php 
require "../includes/admin-authentication.php";
$page_title = "Teachers Results";

?>

<?php $access = $_SESSION["access"];
if($access !== "Administrator") {
    $_SESSION["status"] = "Please Log in as Administrator";
    header("Location: records.php");
    exit();
} ?>


<?php 
    if(isset($_GET["teachers_id"])) {
        require "../includes/config.php";
        $teachers_id = mysqli_real_escape_string($con, $_GET["teachers_id"]);
        $sql = "SELECT * FROM teachers WHERE teachers_id = '$teachers_id';";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
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

<a href="records.php" class="btn btn-primary">Go back records page</a>

<table class="users-data">
    <thead>
        <tr>
            <th>Details</th>
            <th>TEACHERS ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>EMAIL</th>
            <th>BIRTHDATE</th>
            <th>SEX</th>
            <th>DEPARTMENT</th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <td><a href="ViewDetails.php?ID=<?= $row["teachers_id"]; ?>">View Details</a></td>
            <td><?php echo $row["teachers_id"]; ?></td>
            <td><?php echo $row["first_name"]; ?></td>
            <td><?php echo $row["last_name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["birth_date"]; ?></td>
            <td><?php echo $row["sex"]; ?></td>
            <td><a href="department.result.php?department_id=<?= $row["department"]; ?>"><?php echo $row["department"]; ?></a></td>
        </tr>
    </tbody>

</table>

