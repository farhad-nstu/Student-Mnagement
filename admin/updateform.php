<?php 

    session_start();

    if(isset($_SESSION['uid'])){
    	echo "";
    }
    else{
    	header('location: ../login.php');
    }

?>

<?php
        include 'header.php';
        include 'titlehead.php';
        include '../dbcon.php';

        $sid = $_GET['sid'];
        $sql = "SELECT * FROM student WHERE id='$sid'";
        $run = mysqli_query($con,$sql);
        $data = mysqli_fetch_assoc($run);
?>


<form action="updatedata.php" method="post" enctype="multipart/form-data">
	<table align="center" border="1" style="width: 70%; margin-top: 40px">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value="<?php echo $data['name'] ?>" required=""></td>
		</tr>
		<tr>
			<td>Roll</td>
			<td><input type="text" name="roll" value="<?php echo $data['roll'] ?>" required=""></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="city" value="<?php echo $data['city'] ?>" required=""></td>
		</tr>
		<tr>
			<td>Parents Contact</td>
			<td><input type="text" name="pcont" value="<?php echo $data['pcont'] ?>" required=""></td>
		</tr>
		<tr>
			<td>Standerd</td>
			<td><input type="number" name="standerd" value="<?php echo $data['standerd'] ?>" required=""></td>
		</tr>
		<tr>
			<td>Student Image</td>
			<td><input type="file" name="image"  ></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
                <input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
				<input type="submit" name="submit" value="submit">
			</td>
		</tr>

	</table>
</form>
</body>