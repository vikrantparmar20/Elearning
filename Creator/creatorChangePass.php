<?php
	if(!isset($_SESSION)) {
	session_start();
	}
    
	include('./creatorInclude/header.php');
		include('../dbConnection.php');

		if(isset($_SESSION['is_creator_login'])){
  			$creatorLogEmail = $_SESSION[ 'creatorLogEmail'];
		}else {
		echo "<script> location.href='../index.php'; </script>";
	}
	
if(isset($_REQUEST['stuPassUpdateBtn'])){
	if(($_REQUEST['stuNewPass']=="")){
		//msg displayed if required field missing
		$passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
	}else{
        $stupass=$_REQUEST["stuNewPass"];
		$sql="UPDATE creator SET creator_pass='$stupass' WHERE creator_email='$creatorLogEmail'";

				if($conn->query($sql) == TRUE){
					//below msg display on form submit success
					$passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Password Changed Successfully</div>';
				}else{
					//below msg display on form submit failed
					$passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
				}
	}
}
?>
<div class="col-sm-9 col-md-10">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5" method="POST">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $creatorLogEmail; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label>
                    <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password"
                        name="stuNewPass">
                </div>
                <button type="submit" class="btn btn-primary mr-4 mt-4" name="stuPassUpdateBtn">
                    Update
                </button>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button>
                <?php if(isset($passmsg)){
			echo $passmsg;
		} 
		?>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<!-- start including footer -->
<?php 
	include('./creatorInclude/footer.php');
	?>
<!-- end including footer-->