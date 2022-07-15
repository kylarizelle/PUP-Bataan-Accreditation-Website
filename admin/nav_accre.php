<?php

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	Require 'crud/pup.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN'S REGISTRATION</title>
	<link rel="shortcut icon"  href="photos/PUP LOGO.png">
	<link rel="stylesheet" type="text/css" href="css/dashboard2.css">
	<link rel="stylesheet" type="text/css" href="css/navbar2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
	<style>
	
	</style>
<section class="header" id="header">
	<img src="photos/PUP LOGO.png">
	<h1>PUP BATAAN</h1>
<div class="profile"><a href="settings.php"><i class="fa fa-user">&nbsp;<?php echo $_SESSION['username']; ?></i></a></div>
<div class="sign-out"><a href="logout.php"><i class="fa fa-sign-out sign" aria-hidden="true">&nbsp;Log-out</i></a></div>


	<div class="sidebar">
	<div class="nav-links">
	<ul class="links">


				<li><i class="fa fa-book fa-fw"></i><a href="library.php">Library</a></li>
				<li><i class="fa fa-building fa-fw"></i><a href="parameterlib.php">Parameter Library</a></li>

				<li><i class="fa fa-list fa-fw"></i><a href="area.php">Areas Under Survey</a></li>
				<li><i class="fa fa-check-square-o fa-fw"></i><a href="surveyarea.php">Survey Area</a></li>
				<li><i class="fa fa-building fa-fw"></i><a href="surveyparameter.php">Parameters</a></li>
				<li><i class="fa fa-file-pdf-o fa-fw"></i><a href="addfile.php">Additional Files</a></li>
	</ul>
	</div>
</div>

<script type="text/javascript">
	let navLinks = document.querySelector(".nav-links");
	let pupArrow = document.querySelector(".pup-arrow");
	let programArrow = document.querySelector(".program-arrow");
	pupArrow.addEventListener("click", ()=> {
		navLinks.classList.toggle("show1");
		});

		programArrow.addEventListener("click", ()=> {
			navLinks.classList.toggle("show2");
		});
</script>

</section>
<?php } else {
	header("location: index.php");
}
