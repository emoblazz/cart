<?php 
include '../dist/includes/dbcon.php';
include '../dist/includes/session.php';


     $name = $_POST['name'];
     $username = $_POST['username'];
     $password = $_POST['password'];
 
     if ($password<>"")
     {   
        mysqli_query($con,"UPDATE `user` SET username='$username',user_name='$name',user_pass='$password' where user_id='$session_id'")or die(mysqli_error($con)); 
    }
    else
     {
       mysqli_query($con,"UPDATE `user` SET username='$username',user_name='$name' where user_id='$session_id'")or die(mysqli_error($con)); 
     }   

	 		    	
 				
	echo "<script>document.location='account.php'</script>";
     //echo '<script>alert("Category Successfully Saved")</script>';
     //echo  '<script>window.location = "incoming.php"</script>';


?>
