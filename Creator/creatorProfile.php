<?php
	if(!isset($_SESSION)) {
	session_start();
	}
	include('./creatorInclude/header.php');
	include_once('../dbconnection.php');
	if(isset($_SESSION['is_creator_login'])){
		$creatorEmail = $_SESSION['creatorLogEmail'];
	} else {
		echo "<script> location.href='../index.php'; </script>";
	}
	$sql = "SELECT * FROM creator WHERE creator_email='".$creatorEmail."'";
	$result = $conn->query($sql);
	if($result->num_rows == 1){
	$row = $result->fetch_assoc();
	$creatorId = $row["creator_id"];
	$creatorName = $row["creator_name"];
	$creatorOcc = $row["creator_occ"];
	$creatorImg = $row["creator_img"];
}

if(isset($_REQUEST['updatecreatorNameBtn'])){
	if(($_REQUEST['creatorName']=="")){
		//msg displayed if required field missing
		$passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
	}else{
		$creatorName=$_REQUEST["creatorName"];
		$creatorOcc=$_REQUEST["creatorOcc"];
		$creator_image=$_FILES['creatorImg']['name'];
		$creator_image_temp=$_FILES['creatorImg']['tmp_name'];
		$img_folder='../image/creator/'.$creator_image;
		move_uploaded_file($creator_image_temp,$img_folder);
		$sql="UPDATE creator SET creator_name='$creatorName',creator_occ='$creatorOcc',creator_img='$img_folder' WHERE creator_email='$creatorEmail' ";
				if($conn->query($sql) == TRUE){
					//below msg display on form submit success
					$passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2"> Updated Successfully</div>';
				}else{
					//below msg display on form submit failed
					$passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
				}
	}
}
?>
<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="creatorId">Creator ID</label>
            <input type="text" class="form-control" id="creatorId" name="creatorId"
                value="<?php  if(isset($creatorId)){echo $creatorId;} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="creatorEmail">Creator Email</label>
            <input type="email" class="form-control" id="creatorEmail" name="creatorEmail" value="<?php  echo $creatorEmail;?>"
                readonly>
        </div>
        <div class="form-group">
            <label for="creatorName">Creator Name</label>
            <input type="text" class="form-control" id="creatorName" name="creatorName"
                value="<?php  if(isset($creatorName)){echo $creatorName;}?>">
        </div>
        <div class="form-group">
            <label for="creatorOcc">Creator Occupation</label>
            <input type="text" class="form-control" id="creatorOcc" name="creatorOcc"
                value="<?php  if(isset($creatorOcc)){echo $creatorOcc;}?>">
        </div>
        <div class="form-group">
            <label for="creatorImg">Upload Profile Image</label>
            <input type="file" class="form-control-file" id="creatorImg" name="creatorImg">
        </div>
        <button type="submit" class="btn btn-primary" name="updatecreatorNameBtn">
            Update
        </button>
        <?php if(isset($passmsg)){
			echo $passmsg;
		} 
		?>
    </form>
</div>
</div>
</div><!-- Close row div from header file -->
<!-- start including footer -->
<?php 
	include('./creatorInclude/footer.php');
	?>
<!-- end including footer-->