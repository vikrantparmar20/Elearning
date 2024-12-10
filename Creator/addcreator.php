<?php
if(!isset($_SESSION)){
	session_start();
}
	
include_once('../dbConnection.php');

//Checking Email ALready Registered
if(isset($_POST['checkemail']) && isset($_POST['creatoremail'])){
	$creatoremail=$_POST['creatoremail'];
	$sql= "SELECT creator_email FROM creator WHERE creator_email='".$creatoremail."'";
	$result=$conn->query($sql);
	$row=$result->num_rows;
	echo json_encode($row);
}

//INSERT creator

if(isset($_POST['creatorsignup']) && isset($_POST['creatorname']) && isset($_POST['creatoremail'])
	&& isset($_POST['creatorpass'])){
	$creatorname=$_POST['creatorname'];
	$creatoremail=$_POST['creatoremail'];
	$creatorpass=$_POST['creatorpass'];
	$sql="INSERT INTO creator(creator_name,creator_email,creator_pass) VALUES ('$creatorname','$creatoremail','$creatorpass')";
	if($conn->query($sql)==TRUE){
		echo json_encode("OK");
	}else{
		echo json_encode("Failed");
	}
}


//creator Loogin Verification
if(!isset($_SESSION['is_login'])){
if(isset($_POST['checkLogemail']) && isset($_POST['creatorLogEmail'])  && 
	isset($_POST['creatorLogPass']) )
{
	$creatorLogEmail=$_POST['creatorLogEmail'];
	$creatorLogPass=$_POST['creatorLogPass'];

	$sql="SELECT creator_email , creator_pass FROM creator WHERE creator_email='".$creatorLogEmail."' AND creator_pass='".$creatorLogPass."'";
	$result=$conn->query($sql);
	$row=$result->num_rows;
	if($row === 1){
		$_SESSION['is_creator_login']=true;
		$_SESSION['creatorLogEmail']=$creatorLogEmail;
		echo json_encode($row);
	}else if ($row === 0) {
		echo json_encode($row);
	}
}
}


?>

