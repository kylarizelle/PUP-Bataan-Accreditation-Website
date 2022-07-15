<header id="header">

		<div class="navbar">

			<i class="fa fa-bars"></i>

			<a href="index.php"><img src="PUP LOGO.png">
			<h1>PUP Bataan Branch</h1> </a> 
			
			<div class="nav-links">
				
				<i class="fa fa-times"></i>

				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About PUP Bataan </a><i class="fa fa-angle-down arrow about-arrow"></i>
						<ul class="about sub-menu">
    							<li><a href="vision1.php">Vision and Mission</a></li>
                        		<li><a href="history.php">History</a></li>
                        		<li><a href="administration.php">Administration</a></li>
                        		<li><a href="building.php">Buildings and Facilities</a></li>
                        		<li><a href="laboratory.php">Laboratory Videos</a></li>
                        		<li><a href="offices.php">Office Videos</a></li>
                        		<li><a href="library.php">Library</a></li>
    					</ul>
    				</li>
					<li><a href="certificate.php">Certification of Authenticity</a></li>
					<li><a href="program.php">Programs under Survey </a><i class="fa fa-angle-down arrow programs-arrow"></i>
						<ul class="programs sub-menu">
							<?php
							require 'db.php';
							$program = "SELECT * FROM program";
							$run = mysqli_query($con, $program);
							$programli = mysqli_num_rows($run);
							if (!empty($programli)) {
							 	While($row = mysqli_fetch_assoc($run)) {
							 		?>
							 		<li><a href="#"><?php echo $row['prog_ac']; ?></a></li>
							 <?php	}
							 } ?>
<!--     					    <li><a href="bsa.php">BSA</a></li>
                            	<li><a href="bsit.php">BSIT</a></li>
                            	<li><a href="bsba.php">BSBA-HRM</a></li>
                            	<li><a href="bsee.php">BSEE</a></li>
                            	<li><a href="bsie.php">BSIE</a></li> -->
    					</ul>
					</li>
					<li><a href="exhibit.php">Exhibit </a> <i class="fa fa-angle-down arrow exhibit-arrow"></i>
						<ul class="exhibit sub-menu">
                            	<li><a href="charter.php">Citizen's Charter</a></li>
                            	<li><a href="handbook.php">Student Handbook</a></li>
                            	<li><a href="ucode.php">University Code</a></li>
                            	<li><a href="policies.php">Univeristy Policies and Guidelines </a></li>
                            	<li><a href="administrative.php">Administrative Manual</a></li>
                            	<li><a href="faculty.php">Faculty Manual</a></li>
                            	<li><a href="obe.php">Curriculum OBE Syllabi</a></li>
                            	<li><a href="instructional.php">Instructural Material</a></li>
                            	<li><a href="cmo.php">CMO</a></li>
            			</ul>
					</li>
				</ul>

			</div>

		</div>

		<i class="fa fa-search"></i>

		<div class="container">

			<div class="searchbox">
				<input type="text" placeholder="Search...">
				<i class="fa fa-search"></i>
				<i class="fa fa-arrow-left"></i>
			</div>
			
		</div>

	</header>


	<!-- <script type="text/javascript">
		let menuOpenbtn = document.querySelector(".navbar .fa-bars");
		let menuClosebtn = document.querySelector(".nav-links .fa-times");
		let navLinks = document.querySelector(".nav-links");
		let aboutArrow = document.querySelector(".about-arrow");
		let about = document.querySelector(".about");
		let search_btn = document.querySelector(".fa-search");
		let container = document.querySelector(".container");
		let arrow_left = document.querySelector(".container .fa-arrow-left")

		menuOpenbtn.addEventListener("click", ()=>{
			navLinks.style.left = "0";
		});

		menuClosebtn.addEventListener("click",()=>{
			navLinks.style.left = "100%";
		});

			window.onscroll = function() {
			myFunction()
		}
		var header =document.getElementById("header");
		var sticky=header.offsetTop;

		function myFunction() {
			if (window.pageYOffset > sticky) {
				header.classList.add("sticky");
			} else {
				header.classList.remove("sticky");
			}
		}

		search_btn.addEventListener("click", ()=> {
			container.style.right = "-1360px";
			container.style.left = "0px";
		});

		arrow_left.addEventListener("click", ()=> {
			container.style.left = "1360px";
			container.style.right="0px";
		});

		
	</script> -->