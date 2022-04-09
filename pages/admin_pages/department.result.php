<?php 
require "../includes/admin-authentication.php";
$page_title = "Department Results";

?>

<?php $access = $_SESSION["access"];
if($access !== "Administrator") {
    $_SESSION["status"] = "Please Log in as Administrator";
    header("Location: records.php");
    exit();
} ?>


<?php 
    if(isset($_GET["department_id"])) {
        require "../includes/config.php";
        $department_id = mysqli_real_escape_string($con, $_GET["department_id"]);
        $sql = "SELECT * FROM departments WHERE department_id = '$department_id';";
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
            <th>DEPARTMENT ID</th>
            <th>DEPARTMENT NAME</th>
            <th>DEPARTMENT HEAD</th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <td><a href="ViewDetails.php?ID=<?= $row["department_id"]; ?>">View Details</a></td>
            <td><?php echo $row["department_id"]; ?></td>
            <td><?php echo $row["department_name"]; ?></td>
            <td><a href="teachers.result.php?teachers_id=<?= $row["department_id"]; ?>"><?php echo $row["department_head"]; ?></a></td>
        </tr>
    </tbody>
  
</table>