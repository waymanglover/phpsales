<?php
	include("connection.php");
	include("header.php");

	$lastName = mysqli_real_escape_string($con, $_POST['lastName']);
	$sqlstring = "SELECT * FROM sales WHERE lastname='$lastName'";
	$result = mysqli_query($con, $sqlstring);	
	if(!$result) {
		echo "Sorry, no matches found!<br>";
	}

	else {
		$row = mysqli_fetch_array($result);

		echo "<h3>Results</h3>";
		echo "" . $row["productname"];
		echo "<br>" . $row["numsold"] . " sold";
		echo "<br>$" . $row["unitprice"];
		echo "<br>" . $row["discountrate"] . " discount";		
		echo "<br><a href=edit_records.php?id=" . $row['id'] . ">" . $row["firstname"] . " " . $row["lastname"] . "</a>";
		echo "<br>" . $row["email"];
		echo "<br>" . $row["city"] . ", " . $row["state"] . " " . $row["zip"] . "<br><br>";

	}



	mysqli_close($con);

	include("footer.php");
?>