<?php 

    session_start();

    if(isset($_SESSION['uid'])){
    	header('location:admin/admindash.php');
    }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
</head>
<body>

	<h1 align="center">Admin Login</h1>
	<form action="login.php" method="post">
		<table align="center">
			<tr>
				<td>Usernsme</td>
				<td><input type="text" name="username" required=""></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" required=""></td>
			</tr>
			<tr>
				<td align="center" colspan="2" style="padding: 10px;"><input type="submit" name="login" value="login"></td>
			</tr>
		</table>
	</form>

</body>
</html>

<?php 
 
 include 'dbcon.php';

 
 if(isset($_POST['login'])){
 	$username = $_POST['username'];
 	$password = $_POST['password'];

 	$sql = ("SELECT * FROM admin WHERE username='$username' AND password='$password'");
 	$run = mysqli_query($con,$sql);
 	$row = mysqli_num_rows($run);
 	if($row < 1){
 		?>
 		<script>
 			alert('Usernsme And Password not matched!!');
 			window.open('login.php','_self');
 		</script>
 		<?php 

 	} else{

 		$data = mysqli_fetch_assoc($run);

 		$id = $data['id'];
 		

 		
 		$_SESSION['uid'] = $id;
 		header('location:admin/admindash.php');

 	}
 }

?>