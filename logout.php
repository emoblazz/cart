<?php 
include 'dist/includes/dbcon.php';
session_start();
  //mysqli_query($con,"INSERT INTO history_log(user_id,action,date) 
    // VALUES('$id','has logged out the system','$date')")or die(mysqli_error($con)); 

session_destroy();
?>
<script>
window.location = 'index.php';
</script>
