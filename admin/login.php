<?php

if (isset($_SESSION["adminID"])) {
	header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN'S REGISTRATION</title>
	<link rel="shortcut icon"  href="photos/PUP LOGO.png">
	<link rel="stylesheet" type="text/css" href="css/login1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
	<!-- captcha -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<style>
	.registration {
		margin-top: -30px;
	}
</style>
	<section class="background">
	<header>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<img src="photos/PUP LOGO.png">
	<h1>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h1>
	<p>THE COUNTRY'S FIRST POLYTECHNIC U</p>
</header>

		<div class="register">
		<?php 
				include "credential_login.php";
				include "crud/pup.php";

				if(isset($_SESSION['error'])){
?>
				<p style="color:red; "><?php echo $_SESSION['error']; ?></p>
<?php				
				}
				unset($_SESSION['error']);
			?>
			<form id="signup_form" method="post">

				<div class="mb-3">
  					<label for="formGroupExampleInput2" class="form-label">Username:</label>
  					<input type="text" class="form-control" id="username" placeholder="Email Address"  name="username" required>
				</div>

				<label for="formGroupExampleInput2" class="form-label">Position:</label>
				<select class="form-select" aria-label="Default select example" id="positionname"  name="positionname" required>
						<option>Select Position</option>
  						<option value="Faculty">Faculty</option>
  						<option value="Administration">Administration</option>
 						<option value="Accreditation Task Force">Accreditation Task Force</option>
				</select>

				<div class="mb-3">
  					<label for="formGroupExampleInput2" class="form-label">Password</label>
  					<input type="password" class="form-control" id="password_" placeholder="Password"  name="password_" required>
				</div>

			<?php 
			include_once 'credential_login.php';
               if(isset($_SESSION["loginAtt"]) && $_SESSION["loginAtt"] > 2){
                    $_SESSION["locked"] = time();
                    echo '
                         <p style="color: red">Please wait for 10 seconds.</p><br>
                    ';
               }else{
                    echo'
                         <div class="form-group">
                              <div class="g-recaptcha" data-sitekey="6Lf2KnwdAAAAAJYyI_61V-2hA8bd_6x5WHfcFqGO"></div><br>
							  <button type="submit" name="submit" class="btn btn-light" style="margin-left: 350px;">Login</button>
                         
                    ';
               }
          ?>
				<!-- <button type="submit" class="btn btn-light" style="margin-left:355px;" >Log-in</button> -->
				<a href="registration.php"><p class="registration">Don't have any account?Register </p></a>
			</form>
		</div>
	</section>


</body>
</html>