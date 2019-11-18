<?php 
session_start(); 
include "../dist/includes/dbcon.php";
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
<script>
window.location = "../index.php";
</script>
<?php 
}
$session_id=$_SESSION['id'];

$user_query = mysqli_query($con,"select * from user where user_id = '$session_id'")or die(mysql_error($con));
$user_row = mysqli_fetch_array($user_query);
$session_name = $user_row['user_name'];
$session_type = $user_row['user_type'];
$name = $user_row['username'];
?>
