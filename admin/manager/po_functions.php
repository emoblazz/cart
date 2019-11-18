<?php 
include '../dist/includes/dbcon.php';

if (isset($_POST['create']))
{
     $supplier = $_POST['supplier'];
     date_default_timezone_set("Asia/Manila"); 
     $date=date('Y-m-d H:i:s');

    mysqli_query($con,"INSERT INTO po(supplier_id,po_date) 
     VALUES('$supplier','$date')")or die(mysqli_error($con)); 

       $po_id=mysqli_insert_id($con);
     //echo '<script>alert("Category Successfully Saved")</script>';
     echo  "<script>window.location = 'po_details.php?poid=$poid&supplier=$supplier'</script>";
}
else if (isset($_POST['add_po']))
{
     $poid = $_POST['poid'];
     $supplier = $_POST['supplier'];
     $product = $_POST['product'];
     $qty = $_POST['qty'];
     
     $query1=mysqli_query($con,"SELECT * FROM prod_sup where supplier_id='$supplier' and prod_id='$product'")or die(mysqli_error($con));
            $row1=mysqli_fetch_array($query1);
            $price=$row1['supplier_price'];
            $subtotal=$price*$qty;

     mysqli_query($con,"INSERT INTO po_details(po_id,prod_id,po_price,po_qty,po_subtotal) 
     VALUES('$poid','$product','$price','$qty','$subtotal')")or die(mysqli_error($con));
	 
     mysqli_query($con,"UPDATE po SET po_total= po_total + '$subtotal' where po_id='$poid'")
	 or die(mysqli_error($con)); 

    
	echo  "<script>window.location = 'po_details.php?poid=$poid&supplier=$supplier'</script>";
	
}
if (isset($_POST['delete']))
{
    $id = $_POST['id'];
    $poid = $_POST['poid'];
    $supplier = $_POST['supplier'];
    $subtotal = $_POST['subtotal'];
    mysqli_query($con,"delete from po_details where po_details_id='$id'")or die(mysqli_error($con)); 
    mysqli_query($con,"UPDATE po SET po_total= po_total - '$subtotal' where po_id='$poid'")
     or die(mysqli_error($con)); 

     echo  "<script>window.location = 'po_details.php?poid=$poid&supplier=$supplier'</script>";
}
?>
