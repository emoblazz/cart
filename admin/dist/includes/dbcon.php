<?php
//include('session.php');
$con = mysqli_connect("localhost","root","","grocery");
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
  }
?>
