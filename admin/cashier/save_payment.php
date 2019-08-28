<?php 
include '../dist/includes/dbcon.php';

if (isset($_POST['pay']))
{
     $id = $_POST['id'];
     $change = $_POST['change'];
     $tendered = $_POST['tendered'];
     $date = date("Y-m-d H:i:s");
     
     mysqli_query($con,"UPDATE `order` SET payment_status='paid',cash_tendered='$tendered',`change`='$change',order_status='claimed' where order_id='$id'")
	 or die(mysqli_error($con)); 

 //   mysqli_query($con,"INSERT INTO payment(payment_date,order_id,cash_tendered,cash_change) 
   //  VALUES('$date','$id','$tendered','$change')")or die(mysqli_error($con)); 

     //echo '<script>alert("Category Successfully Saved")</script>';
     echo  "<script>window.location = 'receipt.php?order_id=$id'</script>";
}

?>
