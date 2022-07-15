<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="footer1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>PUP BATAAN</title>
</head>
<body>

	<section>
		<div class="header">

			<div class="text-box">
				<h1>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h1>
				<p>BATAAN BRANCH
				</p>
				<hr>
				
			</div>
			
		</div>
	</section>

		<section class="aaccup">
		
		<br>
		<center>
		<img src="photos/aacup.png" class="img-fluid" alt="..." width="90%">
		</center>

	</section>
<br>
<section class="director">
		
		<br>

		<img src="ljgenerales.jpg">
		<h1>MESSAGE FROM THE DIRECTOR</h1>

			<div class="a-message">
				<p>Although our Branch has undergone several changes for over 30 years now, the drive to continuously provide a globally competitive standard of education to the youth of Bataan has always been our utmost priority. We ensure that professors and instructors who teach in the different courses are not only experts in their fields of specialization, but also have the hearts to share their knowledge and experiences to deserving students.  Our goal is to make graduates excel in their chosen careers through providing venues for knowledge building, skills enhancement, and critical thinking.  With the holistic approach to education, our Branch looks forward to seeing alumni and alumnae who rise from the ranks, hold wider authority and responsibility, lead a company, and uphold the values of PUPians in forming better societies in the country.

Progressive Education. Unprecedented State Scholars. Path for Excellence. This is what PUP Bataan is all about.</p>
			</div>

			<!-- <div class="b-message">
				<p>&nbspWe are honored and privileged because we are given a chance to be visited by the seasoned accreditors, educational leaders and most especially the guardians of quality and lovers of accreditation who will help us in ensuring that our institution provides the best educational experience to the generations to come.</p>
<br>
				<p>Together, with all of the students, faculty members and employees of this Branch, and on behalf of the officials of PUP with the stewardship of Dr. Manuel M. Muhi, our University President and Prof. Pascualito B. Gatan, the Vice President for Branches and Satellite Campuses, I would like to extend my heartfelt gratitude to you, our dear accreditors, for sharing with us your valuable time and expertise and for joining us in creating meaningful history to PUP Taguig.</p>
			</div> -->

			<div class="signature">
				<h1>Leonila Generales, MBA</h1>
				<p>PUP Bataan Branch Director</p>
			</div>

	</section>

	<section class="title">
		<br>

	<center><h1 class="survey">PROGRAMS UNDER SURVEY</h1></center>

	</section>
	<?php
						require 'db.php';
		$program = "SELECT * FROM program";
		$run = mysqli_query($con, $program);
		$programli = mysqli_num_rows($run);	
							if (!empty($programli)) {
							 	While($row = mysqli_fetch_assoc($run)) {
							 		?>
<section class="acco">
<br>
		<img src="admin/photos/<?php echo $row['prog_img']; ?>">
		<p class="bsa"> <?php echo $row['programname']; ?></p>

			<div class="bsa-def">
				<p><?php echo $row['description'];?></p>
			</div>

				<a href="course.php?program_id=<?php echo $row['program_id']; ?>"><button class="btn">Read more</button></a>

	</section>
	<br>
	<br>

 <?php	}
							 } ?>

		
<!-- 	<section class="acco">

		<img src="photos/calcu.jpg">
		<p class="bsa"> BACHELOR OF SCIENCE IN ACCOUNTANCY</p>

			<div class="bsa-def">
				<p>The Bachelor of Science in Accountancy program provides general accounting education to students wanting to pursue a professional career in Accountancy in general and in Public Accounting in particular.</p>
			</div>

				<a id="color" href="bsa.php"><button class="btn">Read more</button></a>

	</section>

	

<br>
<br>
<br>
	<section class="acco">

		<img src="photos/comp.jpg">
		<p class="bsa"> BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY</p>

			<div class="bsa-def">
				<p>The Bachelor of Science in Information Technology is focused on subject such as software, databases and networking.</p>
			</div>

				<a id="color" href="bsit.php"><button class="btn">Read more</button></a>
	</section>

	
		<br><br>
		<section class="acco">

		<img src="photos/jobfair.jpg">
		<p class="bsa"> BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION, MAJOR IN HUMAN RESOURCE MANAGEMENT</p>

			<div class="bsa-def">
				<p>The Bachelor of Science in Management Accounting is a degree that involves partnering in management decision-making, devising planning and performance management systems, and providing expertise in financial accounting and control to assist management in the formulation and implementation of an organization's strategy.</p>
			</div>

				<a id="color" href="bsba.php"><button class="btn">Read more</button></a>
	</section>


		<br>
	<section class="acco">

		<img src="photos/st.jpg">
		<p class="bsa"> BACHELOR OF SCIENCE IN ELEMENTARY EDUCATION</p>

			<div class="bsa-def">
				<p>The Bachelor of Science in Elementary Education is a four-year degree program provides academic and appropiate training for future primary school teacher.</p>
			</div>

				<a id="color" href="bsee.php"><button class="btn">Read more</button></a>
	</section>

	
	<br>
<br>
<br>

	<section class="acco">

		<img src="photos/scical.jpg">
		<p class="bsa"> BACHELOR OF SCIENCE IN INDUSTRIAL ENGINEERING</p>

			<div class="bsa-def">
				<p>The Bachelor of Science in Industrial Engineering provide knowledge and skills needed for designing, installing, managing, nad maintaining production, and manufacturing systems.</p>
			</div>

				<a id="color" href="bsie.php"><button class="btn">Read more</button></a>
	</section> -->
	

	<?php  include 'footer.php';?>
	<?php  include 'nav.php';?>



</body>
</html>