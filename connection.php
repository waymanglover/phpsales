<?php

$con = mysqli_connect("localhost:3306","user1","pass1","salesdb");

// Check connection
if (mysqli_connect_errno())
  {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>