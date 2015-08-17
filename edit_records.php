<!doctype HTML>
<html>
<body>

<script>
	function 
</script>

<?php
	include("connection.php");
	include("header.php");

	if(isset($_POST['updateButton'])) {
    	$user_id = $_POST['id'];
		$productName = mysqli_real_escape_string($con, $_POST['productname']);
		$itemsSold = (int) mysqli_real_escape_string($con, $_POST['numsold']);
		$unitPrice = (float) mysqli_real_escape_string($con, $_POST['unitprice']);
		$discountRate = (float) mysqli_real_escape_string($con, $_POST['discountrate']);
		$firstName = mysqli_real_escape_string($con, $_POST['firstname']);
		$lastName = mysqli_real_escape_string($con, $_POST['lastname']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$city = mysqli_real_escape_string($con, $_POST['city']);
		$state = mysqli_real_escape_string($con, $_POST['state']);
		$zip = (int) mysqli_real_escape_string($con, $_POST['zip']);
		$sqlstring = "UPDATE sales SET productname = '$productName', numsold='$itemsSold', unitprice='$unitPrice', discountrate='$discountRate', firstname = '$firstName', lastname = '$lastName', email = '$email', city = '$city', state='$state', zip='$zip' WHERE id = $user_id";
		$result = mysqli_query($con, $sqlstring);
		if(!$result) {
			echo "Error updating record!<br>";
		}
		else {
			echo "Record successfully updated!";
		}
    }

    else if(isset($_POST['deleteButton'])) {
		$user_id = $_POST['id']; 
		$sqlstring = "DELETE FROM sales WHERE id = $user_id";   
		$result = mysqli_query($con, $sqlstring);
		if(!$result) {
			echo "Error deleting record!<br>";
		}
		else {
			echo "Record successfully deleted!";
		}	
    }

    else {

		$user_id = $_GET['id'];
		$sqlstring = "SELECT * FROM customers WHERE id = $user_id"; 
		$result = mysqli_query($con, $sqlstring);
		$row = mysqli_fetch_array($result);

		echo "<form action='edit_records.php' method='post'>";
		echo "<input type='hidden' name='id' value=" . $row['id'] . ">";
		echo "<input type='text' name='productname' value=" . $row['productname'] . ">" . "<br>";
		echo "<input type='text' name='numsold' value=" . $row['numsold'] . ">" . "<br>";
		echo "<input type='text' name='unitprice' value=" . $row['unitprice'] . ">" . "<br>";
		echo "<input type='text' name='discountrate' value=" . $row['discountrate'] . ">" . "<br>";
		echo "<input type='text' name='firstname' value=" . $row['firstname'] . ">" . "<br>";
		echo "<input type='text' name='lastname' value=" . $row['lastname'] . ">" . "<br>";
		echo "<input type='text' name='email' value=" . $row['email'] . ">" . "<br>";
		echo "<input type='text' name='city' value=" . $row['city'] . ">" . "<br>";
		echo "<input type='text' name='state' value=" . $row['state'] . ">" . "<br>";
		echo "<input type='text' name='zip' value=" . $row['zip'] . ">" . "<br>";
		echo "<input type='submit' name='updateButton' value='Update Record'>     <input type='submit' name='deleteButton' value='Delete Record'>";
		echo "</form>";

	}

	mysqli_close($con);

	include("footer.php");
?>

</body>
</html>