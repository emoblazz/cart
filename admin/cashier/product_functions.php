<?php 
include '../dist/includes/dbcon.php';
$date = date("Y-m-d H:i:s");
if (isset($_POST['add']))
{
     $name = $_POST['name'];
     $desc = $_POST['desc'];
     $category = $_POST['category'];
     $price = $_POST['price'];
     $reorder = $_POST['reorder'];
 
    mysqli_query($con,"INSERT INTO product(prod_name,prod_desc,prod_price,reorder,cat_id,prod_pic,prod_qty) 
     VALUES('$name','$desc','$price','$reorder','$category','default.jpg','0')")or die(mysqli_error($con)); 

     //echo '<script>alert("Category Successfully Saved")</script>';
     echo  '<script>window.location = "product.php"</script>';
}
else if (isset($_POST['update']))
{
     $id = $_POST['id'];
     $name = $_POST['name'];
     $desc = $_POST['desc'];
     $category = $_POST['category'];
     $price = $_POST['price'];
     $reorder = $_POST['reorder'];
     
     mysqli_query($con,"UPDATE product SET prod_name='$name',prod_desc='$desc',prod_price='$price',reorder='$reorder' where prod_id='$id'")
	 or die(mysqli_error($con)); 

     //echo "<script type='text/javascript'>alert('Category data Successfully updated!');</script>";
	echo "<script>document.location='product.php'</script>";
	
}
elseif (isset($_POST['adddamage']))
{
     $name = $_POST['name'];
     $qty = $_POST['qty'];
     
    mysqli_query($con,"INSERT INTO damaged(prod_id,damage_qty,declared_date) 
     VALUES('$name','$qty','$date')")or die(mysqli_error($con)); 

     mysqli_query($con,"UPDATE product SET prod_qty = prod_qty - $qty where prod_id='$name'")
	 or die(mysqli_error($con)); 
     //echo '<script>alert("Category Successfully Saved")</script>';
     echo  '<script>window.location = "damaged.php"</script>';
}
?>
