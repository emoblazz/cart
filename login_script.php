<?php 
session_start();
include('dist/includes/dbcon.php');

$user=$_POST['username'];
$pass=$_POST['password'];

//$user = mysqli_real_escape_string($con,$user_unsafe);
//$pass = mysqli_real_escape_string($con,$pass_unsafe);
//$pass=md5($pass1);
//$salt="a1Bz20ydqelm8m1wql";
//$pass=$salt.$pass;

$query=mysqli_query($con,"select * from customer where cust_username='$user' and cust_password='$pass'")or die(mysqli_error($con));
	$row=mysqli_fetch_array($query);
	$id=$row['cust_id'];   

        $counter=mysqli_num_rows($query);

	if ($counter > 0) 
	{	
        $_SESSION['id']=$id;	
		echo  '<script>window.location = "index.php"</script>';
	} 
	else
	{
		echo '<script>alert("Invalid username or password!")</script>';
		echo  '<script>window.location = "login.php"</script>';
	}
    
?>
