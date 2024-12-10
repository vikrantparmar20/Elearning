<!-- start including header -->
<?php 
	if(!isset($_SESSION)){
		session_start();
	}
		include('./admininclude/header.php');
		include('../dbConnection.php');

		if(isset($_SESSION['is_admin_login'])){
			$adminEmail=$_SESSION['adminLogEmail'];
            $course_id=$_REQUEST['course_id'];
		}else{
			echo "<script>location.href='../index.php';</script>";
		}
	?>
<!-- end including header -->

<div class="col-sm-9 mt-5">
    <div class="container mt-5 ml-4">
        <div class="jumbotron">
            <h4 class="text-center">Course Details</h4>
            <?php
                    $sql="SELECT * FROM course WHERE course_id='$course_id'";
                    $result=$conn->query($sql);
                    if($result !== false && $result->num_rows > 0){
                        while($row=$result->fetch_assoc()){
                            ?>
            <div class="bg-light mb-3">
                <h5 class="card-header">
                    <?php echo $row['course_name']; ?>
                </h5>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?php echo $row['course_img']; ?>" class="card-img-top mt-4" alt="pic">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card-body">
                            <p class="card-title">
                                <?php echo $row['course_desc']; ?>
                            </p>
                            <small class="card-text">Duration:<?php echo $row['course_duration']; ?></small><br>
                            <p class="card-text d-inline">Price:
                                <small><del>&#8377 <?php echo $row['course_original_price']; ?></del></small>
                                <span class="font-weight-bolder">&#8377 <?php echo $row['course_price']; ?></span>
                            </p>
                            <a href="./watchcourse.php?course_id=<?php echo $row['course_id'] ?>"
                                class="btn btn-primary mt-5 float-left">Watch Course</a>
                                <a  href="./watchcourse.php?course_id=<?php echo $row['course_id'] ?>"
                                class="btn btn-primary mt-5 float-right">Assignments</a>
                               
                        </div>
                    </div>
                </div>
            </div>
            <?php
                        }
                    }
                
            ?>
            <hr>
        </div>
    </div>
</div>


<!-- start including footer -->
<?php 
	include('./admininclude/footer.php');
	?>
<!-- end including footer-->