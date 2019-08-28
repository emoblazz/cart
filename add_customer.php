<?php
	 include 'dist/includes/session.php';      
     include 'dist/includes/dbcon.php';     
		$name=$_POST['name'];
		$contact=$_POST['contact'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$date=date('Y-m-d H:i:s');

		$queryc=mysqli_query($con,"SELECT * FROM customer where cust_username='$username'")or die(mysqli_error($con));
			$rowc=mysqli_num_rows($queryc);
			$row1=mysqli_fetch_array($queryc);
			if ($rowc<1)
			{
				mysqli_query($con,"INSERT INTO customer(cust_name,cust_contact,cust_password,cust_username,date_registered,cust_pic) VALUES('$name','$contact','$password','$username','$date','avatar.png')")or die(mysqli_error($con));       	
					echo "<script type='text/javascript'>alert('Successfully registered!');</script>";
					echo  '<script>window.location = "login.php"</script>';
			}
			else {
			    echo "<script type='text/javascript'>alert('Username already taken!');</script>";
				echo "<script>window.history.back();</script>";
			}
		
     
?>
