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

    

    <div class="dashboard">
    	<table width="50%" align="center">
    		<tr>
    			<td><b>1.</b></td>
    			<td><a href="addstudent.php">Insert Students Details</a></td>
    		</tr>
    		<tr>
    			<td><b>2.</b></td>
    			<td><a href="updatestudent.php">Update Students Details</a></td>
    		</tr>
    		<tr>
    			<td><b>3.</b></td>
    			<td><a href="deletestudent.php">Delete Students Details</a></td>
    		</tr>
    	</table>
    </div>
    
    </body>
    </html>

