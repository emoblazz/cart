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

$query=mysqli_query($con,"select * from user where username='$user' and user_pass='$pass'")or die(mysqli_error($con));
	$row=mysqli_fetch_array($query);
	$id=$row['user_id'];   

        $counter=mysqli_num_rows($query);

	if ($counter > 0) 
	{	
        $_SESSION['id']=$id;	
		if ($row['user_type']=="stock manager")
		{
		  echo  '<script>window.location = "manager/home.php"</script>';
		}
		else
		{
		  echo  '<script>window.location = "cashier/home.php"</script>';
		}
	} 
	else
	{
		echo '<script>alert("Invalid username or password!")</script>';
		echo  '<script>window.location = "index.php"</script>';
	}
    
?>
