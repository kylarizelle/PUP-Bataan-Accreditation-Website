<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="PUP LOGO.png"/>
	<title>PUP BATAAN</title>
	<link rel="stylesheet" type="text/css" href="design.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"> </script>
</head>
<body>
	<!------ background---------->
	<section>
		<div class="header">
					<div class="text-box">
			<h1>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h1>
			<p>BATAAN BRANCH</p>
			<hr>
		</div>
		</div>	
	</section>
	<!------ header and navigation---------->
	<header id=header>
		<div class="navbar">
			<i class="fa fa-bars"></i>
		<a href="index.php">
			<img src="PUP LOGO.png"></a>
			<div class="h1">
				<h1>PUP-BATAAN BRANCH</h1>
			</div>
			<div class="nav-links">
					<i class="fa fa-times"></i>
				<ul class="links">
					<li><a href="">Home</a></li>
					<li><a href="">About PUP Bataan <i class="fa fa-angle-down arrow about-arrow"></i></a>
						<ul class="about sub-menu">
    					<li><a href="#">Vision and Mission</a></li>
                        <li><a href="#">History</a></li>
                        <li><a href="#">Administration</a></li>
                        <li><a href="#">Buildings and Facilities</a></li>
                        <li><a href="#">Laboratory Videos</a></li>
                        <li><a href="#">Office Videos</a></li>
                        <li><a href="#">Library</a></li>
    				</ul>
    			</li>
					<li><a href="">Certification of Authenticity</a></li>
					<li><a href="">Programs under Survey <i class="fa fa-angle-down arrow programs-arrow"></i></a>
						<ul class="programs sub-menu">
    					    					<li><a href="#">BSIT</a></li>
                            <li><a href="#">BSA</a></li>
                            <li><a href="#">BSMA-HRM</a></li>
                            <li><a href="#">BSEE</a></li>
                            <li><a href="#">BSIE</a></li>
    				</ul>
					</li>
					<li><a href="">Exhibit <i class="fa fa-angle-down arrow exhibit-arrow"></i></a>
						<ul class="exhibit sub-menu">
                            <li><a href="#">Citizen's Charter</a></li>
                            <li><a href="#">Student Handbook</a></li>
                            <li><a href="#">University Code</a></li>
                            <li><a href="#">Univeristy Policies and Guidelines </a></li>
                            <li><a href="#">Administrative Manual</a></li>
                            <li><a href="#">Faculty Manual</a></li>
                            <li><a href="#">2018 Curriculum OBE Syllabi</a></li>
                            <li><a href="#">Instructural Material</a></li>
                            <li><a href="#">CMO 2017</a></li>
            </ul>
					</li>
				</ul>
			</div>
			</div>
		</div>
	</header>
	<script type="text/javascript">
		let menuOpenBtn = document.querySelector(".navbar .fa-bars");
		let menuCloseBtn = document.querySelector(".nav-links .fa-times");
		let navLinks = document.querySelector(".nav-links");
		let aboutArrow = document.querySelector(".about-arrow");
		let about =document.querySelector(".about");
		

		menuOpenBtn.addEventListener("click",()=>{
			navLinks.style.left= "0";
		});

		menuCloseBtn.addEventListener("click",()=>{
			navLinks.style.left= "100%";
		});


	
			// aboutArrow.onclick = function() {}
// 				function hidden() {
// 	navLinks.classList.toggle('show1');
// }

// aboutArrow.addEventListener("click", hidden());
	
	</script>
</body>
</html>