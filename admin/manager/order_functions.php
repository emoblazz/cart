<?php 
include '../dist/includes/dbcon.php';

if (isset($_REQUEST['status'])=="done")
{
     $order_id = $_REQUEST['order_id'];
 
    mysqli_query($con,"UPDATE `order` SET order_status='for pickup' where order_id='$order_id'")
	 or die(mysqli_error($con)); 

     //echo '<script>alert("Category Successfully Saved")</script>';
     echo  '<script>window.location = "incoming.php"</script>';
}

?>
