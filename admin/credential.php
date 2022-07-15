<?php
session_start();
include "crud/pup.php";
if (isset($_POST["firstname_"])) {

	$firstname_ = $_POST["firstname_"];
	$lastname_ = $_POST["lastname_"];
	$mi_ = $_POST['mi_'];
	$username = $_POST['username'];
	$password_ = $_POST['password_'];
	$cpassword = $_POST['cpassword'];
	$positionname = $_POST['positionname'];
	// $email_ = $_POST['email_'];
	$name = "/^[a-zA-Z ]+$/";
	// $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	// // $number = "/^[0-9]+$/";

if(empty($firstname_) || empty($lastname_) || empty($positionname) ||
	empty($username) || empty($password_) || empty($cpassword)) {
		
		$_SESSION['error'] = "All fields are required";
		header("location: registration.php");
		exit();
		

	} else {
		if(!preg_match($name,$firstname_)){
		$_SESSION['error'] = "First name is not valid";
		header("location: registration.php");
		exit();

	}
	if(!preg_match($name,$lastname_)){
		$_SESSION['error'] = "Last name is not valid";
		header("location: registration.php");
		exit();
	}
	if(!preg_match($name,$mi_)){
		$_SESSION['error'] = "Middle Initial is not valid";
		header("location: registration.php");
		exit();
	}
	if(!preg_match($name,$username)){
		$_SESSION['error'] = "username is not valid";
		header("location: registration.php");
		exit();
	}
	// if(!preg_match($emailValidation,$email_)){
	// 	$_SESSION['error'] = "Username are not valid";
	// 	header("location: registration.php");
	// 	exit();
	// }
	if(strlen($password_) < 9 ){
		$_SESSION['error'] = "Password is weak";
		header("location: registration.php");
		exit();
	}
	if(strlen($cpassword) < 9 ){
		$_SESSION['error'] = "Password is weak";
		header("location: registration.php");
		exit();
	}
	if($password_ != $cpassword){
		$_SESSION['error'] = "Password is not same";
		header("location: registration.php");
		exit();
	}
	
	//existing email address in our database
	$sql = "SELECT adminID FROM accounts WHERE username = '$username' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		$_SESSION['error'] = "username is already exist, please try again";
		header("location: registration.php");
		exit();
	} else {
		$password_ = md5($password_);
		$sql = "INSERT INTO `accounts` 
		(`adminID`, `firstname_`, `lastname_`, `mi_`, 
		`positionname`, `username`, `password_`) 
		VALUES (NULL, '$firstname_', '$lastname_', '$mi_', 
		'$positionname', '$username', '$password_')";
		$run_query = mysqli_query($con,$sql);

		$_SESSION["uid"] = mysqli_insert_id($con);
		$_SESSION["name"] = $username;
		header("location: index.php");
		
	}
	}
	
}

?>
