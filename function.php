<?php 

    function showDetails($standerd, $roll){
   	   include 'dbcon.php';
   	   $sql = "SELECT * FROM student WHERE standerd='$standerd' AND roll='$roll'";
   	   $run = mysqli_query($con,$sql);
   	   if(mysqli_num_rows($run) > 0){

   	   	   $data = mysqli_fetch_assoc($run);
   	   	   ?>
               
               <table align="center" style="width: 50%; margin-top: 20px; font-size: 25px;" border="1" >
               	   <tr>
               	   	  <th colspan="3">Student Details</th>
               	   </tr>
               	   <tr>
               	   	    <td rowspan="5"><img src="images/<?php echo $data['image']; ?>" style="max-height: 200px; max-width: 200px; padding-left: 40px"></td>
	               	   	<th>Roll No.</th>
	               	   	<td><?php echo $data['roll']; ?></td>
               	   </tr>
               	   <tr>
               	   	   <th>Student Name</th>
               	   	   <td><?php echo $data['name']; ?></td>
               	   </tr>
               	   <tr>
               	   	   <th>City</th>
               	   	   <td><?php echo $data['city']; ?></td>
               	   </tr>
               	   <tr>
               	   	   <th>Parents Conatct</th>
               	   	   <td><?php echo $data['pcont']; ?></td>
               	   </tr>
               	   <tr>
               	   	   <th>Standerd</th>
               	   	   <td><?php echo $data['standerd']; ?></td>
               	   </tr>
               </table>

   	   	   <?php

   	   } else{

   	   	   echo "<script>alert('No Student is Found!!')</script>";
   	   }
   }
   
  
?>