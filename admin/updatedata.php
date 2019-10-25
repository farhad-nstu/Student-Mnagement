<?php

    include '../dbcon.php';

        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $city = $_POST['city'];
        $pcont = $_POST['pcont'];
        $standerd = $_POST['standerd'];
        $id = $_POST['sid'];

        $img = $_FILES['image']['name'];
        $temporary = $_FILES['image']['tmp_name'];
        move_uploaded_file($temporary, "../images/$img");
        
        $qry = "UPDATE `student` SET `name` = '$name', `roll` = '$roll', `city` = '$city', `pcont` = '$pcont', `standerd` = '$standerd', `image` = '$img' WHERE `student`.`id` = '$id'";

        $run = mysqli_query($con, $qry);

        if($run == true){
            ?>
            <script type="text/javascript">
                alert('Data Updated Successfully');
                window.open('updateform.php?si=<?php echo $id; ?>','_self');
            </script>
            <?php
        }


?>