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
?>

<form action="addstudent.php" method="post" enctype="multipart/form-data">
	<table align="center" border="1" style="width: 70%; margin-top: 40px">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" placeholder="Enter Your Full Name" required=""></td>
		</tr>
		<tr>
			<td>Roll</td>
			<td><input type="text" name="roll" placeholder="Enter Your Roll No." required=""></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="city" placeholder="Enter Your City" required=""></td>
		</tr>
		<tr>
			<td>Parents Contact</td>
			<td><input type="text" name="pcont" placeholder="Enter Your Parents Contact No." required=""></td>
		</tr>
		<tr>
			<td>Standerd</td>
			<td><input type="number" name="standerd" placeholder="Enter Your Standerd" required=""></td>
		</tr>
		<tr>
			<td>Student Image</td>
			<td><input type="file" name="image" placeholder="Enter Your Valid Image" ></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
		</tr>

	</table>
</form>
</body>
</html>

<?php


    if(isset($_POST['submit'])){
    	include '../dbcon.php';

    	$name = $_POST['name'];
    	$roll = $_POST['roll'];
    	$city = $_POST['city'];
    	$pcont = $_POST['pcont'];
    	$standerd = $_POST['standerd'];

    	$img = $_FILES['image']['name'];
    	$temporary = $_FILES['image']['tmp_name'];
    	move_uploaded_file($temporary, "../images/$img");
    	
    	$qry = "INSERT INTO `student`(`name`, `roll`, `city`, `pcont`, `standerd`, `image`) VALUES ('$name', '$roll', '$city', '$pcont', '$standerd', '$img')";

    	$run = mysqli_query($con, $qry);

    	if($run == true){
    		?>
    		<script type="text/javascript">
    			alert('Data Inserted Successfully');
    		</script>
    		<?php
    	}

    }

?>