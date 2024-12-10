<?php
include_once('../dbconnection.php');
         $creator_email=$_GET['creator_email'];
         $sql1="SELECT * FROM creator WHERE creator_email='$creator_email'";
        $result1=$conn->query($sql1);
        $row1=$result1->fetch_assoc();

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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="./coursedetails.php">Smart Champs</a>
    </nav>
    <!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $row1['creator_img']; ?>" alt="creatorimage" class="img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./courseauthor.php">
                                <i class="fas fa-user"></i>
                                Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="creatorId">Creator ID</label>
            <input type="text" class="form-control" id="creatorId" name="creatorId"
                value="<?php  echo $row1['creator_id']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="creatorEmail">Creator Email</label>
            <input type="email" class="form-control" id="creatorEmail" name="creatorEmail" value="<?php  echo $row1['creator_email'];?>"
                readonly>
        </div>
        <div class="form-group">
            <label for="creatorName">Creator Name</label>
            <input type="text" class="form-control" id="creatorName" name="creatorName"
                value="<?php echo $row1['creator_name'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="creatorOcc">Creator Occupation</label>
            <input type="text" class="form-control" id="creatorOcc" name="creatorOcc"
                value="<?php echo $row1['creator_occ'];?>" readonly>
        </div>
        
        
    </form>
</div>
</div>
</div>

<!-- Jquery and Bootstrap Javasvript -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/popper.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- Font Awesome JS -->
<script type="text/javascript" src="../js/all.min.js"></script>
<!-- Testimonial Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="../js/javascript.js"></script>

</body>

</html>
