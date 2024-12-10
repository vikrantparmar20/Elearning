<!-- start including header -->
<?php 
	if(!isset($_SESSION)){
		session_start();
	}
		include('./admininclude/header.php');
		include('../dbConnection.php');

		if(isset($_SESSION['is_admin_login'])){
			$adminEmail=$_SESSION['adminLogEmail'];
		}else{
			echo "<script>location.href='../index.php';</script>";
		}
	?>
<!-- end including header -->

<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-2">List of all courses</p>
    <?php 
		$sql="SELECT * FROM course";
		$result=$conn->query($sql);
		if($result->num_rows > 0){
	?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Course Id</th>
                <th scope="col">Course Name</th>
                <th scope="col">Course Author</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=$result->fetch_assoc()){ ?>
            <tr>
                <th scope="row"><?php echo $row['course_id']; ?></th>
                <td><a href="./coursedetails.php?course_id=<?php echo $row['course_id']; ?>"><?php echo $row['course_name']; ?></a>
                </td>
                <td><?php 
                $creator_email=$row['creator_email'];
        $sql2="SELECT * FROM creator WHERE creator_email='$creator_email'";
        $result1=$conn->query($sql2);
        $row1=$result1->fetch_assoc();
        ?>
        <a href="./courseauthor.php?creator_email=<?php echo $creator_email; ?>"><?php  echo $row1['creator_name']; ?></a> 
        </td>
                <td>
                    <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row['course_id']; ?>">
                        <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i
                                class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php }else{
					echo "0 Result";
						}
						if(isset($_REQUEST['delete'])){
						$sql="DELETE FROM course WHERE course_id={$_REQUEST['id']}";
						if($conn->query($sql)==TRUE){
							echo '<meta http-equiv="refresh" content="0;"/>';
						}else{
							echo "Unable to Delete data";
					}
					}
					?>
    <!-- div row close from header -->
    
</div>


<!-- start including footer -->
<?php 
	include('./admininclude/footer.php');
	?>
<!-- end including footer-->