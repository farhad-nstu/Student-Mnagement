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

<table align="center">
	<form action="deletestudent.php" method="post">
		<tr>
			<th>Enter Standerd</th>
			<td><input type="number" name="standerd" placeholder="Standerd" required=""></td>

			<th>Enter Student Name</th>
			<td><input type="text" name="name" placeholder="Name" required=""></td>

			<td colspan="2"><input type="submit" name="submit" value="Search"></td>
		</tr>
	</form>
</table>



<table align="center" border="1" style="margin-top: 10px;" width="80%">
	<tr style="background-color: #000; color: #fff">
		<th>No.</th>
		<th>Image</th>
		<th>Name</th>
		<th>Roll No.</th>
		<th>Edit</th>
	</tr>


    
    <?php 

   if(isset($_POST['submit'])){
   	   include '../dbcon.php';

   	   $std = $_POST['standerd'];
   	   $name = $_POST['name'];

   	   $sql = "SELECT * FROM `student` WHERE `standerd`='$std' AND `name` LIKE '%$name%'";
   	   $run = mysqli_query($con,$sql);

   	   if(mysqli_num_rows($run) < 1){

   	   	   echo "<tr><td colspan='2'>No records found!!</td></tr>";

   	   } else{
            
            $count = 0;
   	   	   while ($data = mysqli_fetch_assoc($run)) {
   	   	   	    $count++;

   	   	   	   ?>
          <tr align="center">
						<td><?php echo $count ?></td>
						<td><img src="../images/<?php echo $data['image']?>" style="max-width: 100px;" /></td>
						<td><?php echo $data['name']?></td>
						<td><?php echo $data['roll']?></td>
						<td><a href="deleteform.php?sid=<?php echo $data['id'] ?>">Delete</a></td>
					</tr>

                   

   	   	   	   <?php
   	   	   }
   	   }
   }

    ?>


</table>
