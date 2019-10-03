<?php if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
<?php }?>
<?php 
 if (isset($_REQUEST['id']))
 {
    $id=$_REQUEST['id'];
    if (isset($_REQUEST['action']))
    {  
       if ($_REQUEST['action']=="add")
       {
       mysqli_query($con,"UPDATE cart SET qty = qty + 1 where cart_id='$id'")or die(mysqli_error($con)); 
       echo "<script>document.location='cart.php?id=$id'</script>";
     }
      elseif ($_REQUEST['action']=="remove")
      {
        $query1=mysqli_query($con,"SELECT * FROM `cart` where cart_id='$id'")or die(mysqli_error($con));
              $row1=mysqli_fetch_array($query1);
              $qty=$row1['qty'];
              if ($qty<=1)
                   {
                    mysqli_query($con,"DELETE from cart where cart_id='$id'")or die(mysqli_error($con)); 
                   }       
              else{
                  mysqli_query($con,"UPDATE cart SET qty = qty - 1 where cart_id='$id'")or die(mysqli_error($con)); 
                }
       echo "<script>document.location='cart.php?id=$id'</script>";
     }
    }
}
?>
