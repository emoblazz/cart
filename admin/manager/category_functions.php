<?php 
include '../dist/includes/dbcon.php';

if (isset($_POST['add']))
{
     $cat_name = $_POST['cat_name'];
 
    mysqli_query($con,"INSERT INTO category(cat_name,cat_status) 
     VALUES('$cat_name','0')")or die(mysqli_error($con)); 

     //echo '<script>alert("Category Successfully Saved")</script>';
     echo  '<script>window.location = "category.php"</script>';
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
if (isset($_POST['delete']))
{
     $id = $_POST['id'];
 
    mysqli_query($con,"delete from category where cat_id='$id'")or die(mysqli_error($con)); 

     echo '<script>alert("Category Successfully Deleted")</script>';
     echo  '<script>window.location = "category.php"</script>';
}
?>
