<?php 
include '../dist/includes/dbcon.php';

if (isset($_POST['add']))
{
     $name = $_POST['name'];
     $contact = $_POST['contact'];
     $address = $_POST['address'];
 
    mysqli_query($con,"INSERT INTO supplier(supplier_name,supplier_contact,supplier_address) 
     VALUES('$name','$contact','$address')")or die(mysqli_error($con)); 

     //echo '<script>alert("Category Successfully Saved")</script>';
     echo  '<script>window.location = "supplier.php"</script>';
}
else if (isset($_POST['update']))
{
     $id = $_POST['id'];
     $name = $_POST['name'];
     $contact = $_POST['contact'];
     $address = $_POST['address'];
     
     mysqli_query($con,"UPDATE supplier SET supplier_name='$name',supplier_contact='$contact',supplier_address='$address' where supplier_id='$id'")
	 or die(mysqli_error($con)); 

     //echo "<script type='text/javascript'>alert('Category data Successfully updated!');</script>";
	echo "<script>document.location='supplier.php'</script>";
	
}
?>
