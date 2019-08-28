<?php 
include '../dist/includes/dbcon.php';
$date = date("Y-m-d H:i:s");
if (isset($_POST['add']))
{
     $product = $_POST['product'];
     $supplier = $_POST['supplier'];
     $qty = $_POST['qty'];
     $expiry = $_POST['expiry'];
 
    mysqli_query($con,"INSERT INTO stockin(prod_id,stockin_qty,expiry,stockin_date,expiry_status) 
     VALUES('$product','$qty','$expiry','$date','')")or die(mysqli_error($con)); 

     //echo '<script>alert("Category Successfully Saved")</script>';
     echo  '<script>window.location = "stockin.php"</script>';
}
else if (isset($_POST['update']))
{
     $id = $_POST['id'];
     $cat_name = $_POST['cat_name'];
     
     if(isset($_POST['archive']))
          $status=1;
     else
          $status=0;
     
	 mysqli_query($con,"UPDATE category SET cat_name='$cat_name',cat_status='$status' where cat_id='$id'")
	 or die(mysqli_error($con)); 

     //echo "<script type='text/javascript'>alert('Category data Successfully updated!');</script>";
	echo "<script>document.location='category.php'</script>";
	
}
?>
