<?php 
include '../dist/includes/dbcon.php';

if (isset($_POST['updateexpiry']))
{
     $id = $_REQUEST['id'];
     $status = $_REQUEST['status'];
     $expired = $_REQUEST['expired'];
 
    mysqli_query($con,"UPDATE `stockin` SET expiry_status='$status' where stockin_id='$id'")
	 or die(mysqli_error($con)); 
      
      mysqli_query($con,"INSERT INTO expired(stockin_id,expire_qty) 
     VALUES('$id','$expired')")or die(mysqli_error($con)); 

     //echo '<script>alert("Category Successfully Saved")</script>';
     echo  '<script>window.location = "near.php"</script>';
}

?>
