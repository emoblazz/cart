<?php 
session_start();
include 'dist/includes/dbcon.php';

     $id = $_SESSION['id'];
     $password = $_POST['password'];
     
    mysqli_query($con,"UPDATE customer SET cust_password='$password' where cust_id='$id'")
	 or die(mysqli_error($con)); 

     echo "<script type='text/javascript'>alert('Successfully updated password!');</script>";
	echo "<script>document.location='change_password.php'</script>";
?>
