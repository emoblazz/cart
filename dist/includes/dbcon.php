<?php

$con = mysqli_connect("localhost","root","l3@d1ng2020!","grocery");
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
  }
?>
