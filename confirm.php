<?php
	 include 'dist/includes/session.php';      
     include 'dist/includes/dbcon.php';     

     $date=date('Y-m-d H:i:s');

		mysqli_query($con,"INSERT INTO `order`(cust_id,order_date) 
	     VALUES('$session_id','$date')")or die(mysqli_error($con));       	

		$order_id=mysqli_insert_id($con);	

	 $query=mysqli_query($con,"SELECT * FROM cart natural join product where cust_id='$session_id'")or die(mysqli_error($con));
	 		$grand=0;
			while($row=mysqli_fetch_array($query)){
				$prod_id=$row['prod_id'];
				$price=$row['prod_price'];
				$qty=$row['qty'];
				$total=$qty*$price;
				$grand=$grand+$total;

				mysqli_query($con,"INSERT INTO order_details(order_id,prod_id,qty,price,total) 
	     VALUES('$order_id','$prod_id','$qty','$price','$total')")or die(mysqli_error($con));       	
			}
				mysqli_query($con,"UPDATE `order` SET order_total='$grand',order_status='pending' where order_id='$order_id'")or die(mysqli_error($con)); 

				$result=mysqli_query($con,"DELETE FROM cart WHERE cust_id ='$session_id'")
	or die(mysqli_error());
     echo  '<script>window.location = "checkout.php"</script>';
?>
