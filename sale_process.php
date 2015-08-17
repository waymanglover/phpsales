<?php
	include("connection.php");
	include("header.php");

	$productName = mysqli_real_escape_string($con, $_POST['productName']);
	$itemsSold = (int) mysqli_real_escape_string($con, $_POST['itemsSold']);
	$unitPrice = (float) mysqli_real_escape_string($con, $_POST['unitPrice']);
	$discountRate = (float) mysqli_real_escape_string($con, $_POST['discountRate']);
	$firstName = mysqli_real_escape_string($con, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($con, $_POST['lastName']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$city = mysqli_real_escape_string($con, $_POST['city']);
	$state = mysqli_real_escape_string($con, $_POST['state']);
	$zip = (int) mysqli_real_escape_string($con, $_POST['zip']);

	$orderTotal = $itemsSold * $unitPrice; 
	$netPayment = $orderTotal * (1 - $discountRate / 100);

	$sqlstring = "INSERT INTO sales (productname, numsold, unitprice, discountrate, firstname, lastname, email, city, state, zip)
		VALUES ('$productName', '$itemsSold', '$unitPrice', '$discountRate', '$firstName', '$lastName', '$email', '$city', '$state', '$zip')";
	$result = mysqli_query($con, $sqlstring);

	mysqli_close($con);

	echo "<br><h3>SALES PROCESSING</h3>";
	echo "<br><b>Name:</b> " . $firstName . " " . $lastName;
	echo "<br><br><b>Address:</b> " . $city . ", " . $state . " " . $zip;
	echo "<br><br><b>Product Name:</b> " . $productName;
	echo "<br><b>Number of Items Sold:</b> " . $itemsSold;
	echo "<br><b>Discount Rate:</b> " . $discountRate;
	echo "<br><b>Net Payment:</b> " . $netPayment;
	echo "Today is " . date("m/d/Y") . "<br>";

	include("footer.php");
?>