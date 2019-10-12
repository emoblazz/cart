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

     $pic = $_FILES["image"]["name"];
               if ($pic=="")
               {
                    $pic="default.gif";
               }
               else
               {
                    $pic = $_FILES["image"]["name"];
                    $type = $_FILES["image"]["type"];
                    $size = $_FILES["image"]["size"];
                    $temp = $_FILES["image"]["tmp_name"];
                    $error = $_FILES["image"]["error"];
               
                    if ($error > 0){
                         die("Error uploading file! Code $error.");
                         }
                    else{
                         if($size > 100000000000) //conditions for the file
                              {
                              die("Format is not allowed or file size is too big!");
                              }
                    else
                          {
                         move_uploaded_file($temp, "../../dist/uploads/".$pic);
                          }
                         }
               }     
    mysqli_query($con,"INSERT INTO product(prod_name,prod_desc,prod_price,reorder,cat_id,prod_pic,prod_qty) 
     VALUES('$name','$desc','$price','$reorder','$category','$pic','0')")or die(mysqli_error($con)); 

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
     
     $image = $_FILES["image"]["name"];
           if ($image=="")
           {
               $pic=$_POST['image1']; 
           }
          else
          {
               $pic = $_FILES["image"]["name"];
               $type = $_FILES["image"]["type"];
               $size = $_FILES["image"]["size"];
               $temp = $_FILES["image"]["tmp_name"];
               $error = $_FILES["image"]["error"];
               
                    if ($error > 0){
                         die("Error uploading file! Code $error.");
                         }
                    else{
                         if($size > 100000000000) //conditions for the file
                         {
                         die("Format is not allowed or file size is too big!");
                         }
                    else
                           {
                         move_uploaded_file($temp, "../../dist/uploads/".$pic);
                           }
                         }
          }
     mysqli_query($con,"UPDATE product SET prod_name='$name',prod_desc='$desc',prod_price='$price',reorder='$reorder',prod_pic='$pic',cat_id='$category' where prod_id='$id'")
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
else if (isset($_POST['delete']))
{
     $id = $_POST['id'];
      mysqli_query($con,"delete from product where prod_id='$id'")
   or die(mysqli_error($con)); 

  echo "<script type='text/javascript'>alert('Product Successfully deleted!');</script>";
  echo "<script>document.location='product.php'</script>";
}
?>
