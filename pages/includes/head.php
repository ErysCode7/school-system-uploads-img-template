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
    <link rel="stylesheet" href="..\assets\Bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\assets\web-fonts-with-css\css\fontawesome-all.min.css">
    <link rel="stylesheet" href="..\assets\CSS\style.css">
    <link rel="shortcut icon" href="..\assets\Images\banner.jpg" type="image/x-icon">
</head>
<body>