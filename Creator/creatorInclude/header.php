<?php
include_once('../dbconnection.php');
if(!isset($_SESSION)) {
  session_start();
}
if(isset($_SESSION['is_creator_login'])){
  $creatorLogEmail = $_SESSION[ 'creatorLogEmail'];
}
else {
echo "<script> location.href='../index.php'; </script>";
}
if(isset($creatorLogEmail)){
  $sql = "SELECT creator_img FROM creator WHERE creator_email =
  '$creatorLogEmail'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $creator_img = $row['creator_img'];
}
?>

<!DOCTYPE html>
<html Lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
   initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="../css/stustyle.css">

</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0
   shadow" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="creatorProfile.php">Smart Champs</a>
    </nav>
    <!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $creator_img; ?>" alt="creatorimage" class="img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./creatorProfile.php">
                                <i class="fas fa-user"></i>
                                Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses.php">
                                <i class="fa fa-book"></i>
                                My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lessons.php">
                                <i class="fas fa-comments"></i>
                                Lessons
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="creatorChangePass.php">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>