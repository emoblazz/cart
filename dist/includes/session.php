<?php 
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { 
echo "<script>
window.location = 'index.php';
</script>";
}
include "dist/includes/dbcon.php";
if (isset($_SESSION['id']))
{
	$session_id=$_SESSION['id'];

	$user_query = mysqli_query($con,"select * from customer where cust_id = '$session_id'")or die(mysql_error($con));
	$user_row = mysqli_fetch_array($user_query);
	$session_name = $user_row['cust_name'];
}
?>
