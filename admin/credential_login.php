<?php 
session_start(); 
include "crud/pup.php";

// captcha
if(isset($_POST['submit']) && $_POST['g-recaptcha-response'] == ""){
	$_SESSION["error"] = "Please fill reCAPTCHA";
}else{
	$secret = "6Lf2KnwdAAAAAHDAeibAF_2b7rILgjTqYFbk1XMp";
	$verRes = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' .$secret. '&response' .isset($_POST['g-recaptcha-response'])); 
	$resData = json_decode($verRes);

	if(!$resData->success){
		if(isset($_SESSION["locked"])){
			$diff = time() - $_SESSION["locked"];
			if($diff > 30){
				unset($_SESSION["locked"]);
				unset($_SESSION["loginAtt"]);
			}
		}

		if (isset($_POST['username']) && isset($_POST['password_']) && isset($_POST['positionname'])) {

			function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
			}

			$username = validate($_POST['username']);
			$pass = validate($_POST['password_']);
			$posname = validate($_POST['positionname']);

			if (empty($username)) {
				$_SESSION["loginAtt"] += 1;
				$_SESSION['error'] = "Username is empty";
				header("location: index.php");
				exit();
			}else if(empty($pass)){
				$_SESSION["loginAtt"] += 1;
				$_SESSION['error'] = "Password is empty";
				header("location: index.php");
				exit();
			}else{
				// hashing the password_
				$pass = md5($pass);

				
				$sql = "SELECT * FROM account WHERE username='$username'";

				$result = mysqli_query($con, $sql);

				if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);

					if ($row['username'] === $username && $row['password_'] === $pass && $row['positionname'] === $posname) {
						$_SESSION['username'] = $row['username'];
						$_SESSION['positionname'] = $row['positionname'];
						$_SESSION['id'] = $row['adminID'];
						$_SESSION['lastname_'] = $row['lastname_'];
						$_SESSION['firstname_'] = $row['firstname_'];
						$_SESSION['mi_'] = $row['mi_'];
						if($row['positionname'] === 'Administration') {
							header("location: admin.php");
						}
						elseif ($row['positionname'] === 'Faculty') {
							header("location: faculty.php");
						}
						elseif ($row['positionname'] === 'Accreditation Task Force') {
							header("location: area.php");
						}
						
						
					}

					else{
						$_SESSION["loginAtt"] += 1;
					$_SESSION['error'] = "Username, Position,or Password do not match";
					header("location: index.php");
					exit();
					}
				}else{
					$_SESSION["loginAtt"] += 1;
					$_SESSION["error"] = "Username does not exist.";
					header("location: index.php");
					exit();
				}
			}
			
		}
	}
}