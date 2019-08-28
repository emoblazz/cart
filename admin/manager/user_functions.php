<?php 
include '../dist/includes/dbcon.php';

if (isset($_POST['add']))
{
     $name = $_POST['name'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $type = $_POST['type'];
 
    mysqli_query($con,"INSERT INTO user(user_name,username,user_pass,user_type) 
     VALUES('$name','$username','$password','$type')")or die(mysqli_error($con)); 

     //echo '<script>alert("Category Successfully Saved")</script>';
     echo  '<script>window.location = "user.php"</script>';
}
else if (isset($_POST['update']))
{
     $id = $_POST['id'];
     $name = $_POST['name'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $type = $_POST['type'];
     
	 mysqli_query($con,"UPDATE user SET user_name='$name',username='$username',user_pass='$password',user_type='$type' where user_id='$id'")
	 or die(mysqli_error($con)); 

     //echo "<script type='text/javascript'>alert('Category data Successfully updated!');</script>";
	echo "<script>document.location='user.php'</script>";
	
}
?>
