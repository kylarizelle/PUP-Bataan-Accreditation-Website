<?php


	// $con=mysqli_connect("localhost", "root", "", "pup");
include 'pup.php';

if (isset($_POST['add_admin'])) {
	if (!empty($_POST['lastname_']) && !empty($_POST['firstname_']) && !empty($_POST['mi_']) && !empty($_POST['username']) && !empty($_POST['password_'])) {
		
		$lastname_ = $_POST['lastname_'];
		$firstname_ = $_POST['firstname_'];
		$mi_ = $_POST['mi_'];
		$username = $_POST['username'];
		$password_ = $_POST['password_'];

		$query = "INSERT INTO admin(lastname_, firstname_, mi_, username, password_) VALUES('$lastname_', '$firstname_', '$mi_', '$username', '$password_')";

		$run = mysqli_query($con,$query) or die(mysqli_error($con));

		if ($query) {
			echo "form submitted successfully";
		}
		else{
			echo "form not submitted";
		}

	} else {
		echo "all fields required";
	}
}

?>