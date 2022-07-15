
<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/program.css">
	<link rel="stylesheet" type="text/css" href="footer1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/css/bootstrap.css">
	<title>PUP BATAAN'S PROGRAMS</title>
</head>
<body>

	<style type="text/css">

	</style>
	<section>
		<div class="header">

			<div class="text-box">
				<h1>PROGRAMS UNDER SURVEY</h1>
				</p>
				<hr>
				
			</div>
			
		</div>
	</section>

<br>
<style type="text/css">
	.img {
		width: 700px;
		margin-top: 20px;
		margin-left: 40px;
		margin-right: 40px;
	}
.p {
	font-size: 20px;
}

</style>
<center>
	<?php
require 'db.php';
$program = "SELECT * FROM program";
$run = mysqli_query($con, $program);
$programli = mysqli_num_rows($run);	
$count = 0;
$newrow = true;
if (!empty($programli)) {
	While($row = mysqli_fetch_assoc($run)) {

		if ($newrow) {
			echo "<div class= 'cards'>";
			$newrow = false;
		}
		
		echo "<div class='card text-center'>";
		echo "<a href='course.php?program_id=".$row["program_id"]."'><img class='mx-auto' src='admin/photos/".$row['prog_img']."' width = '100%'></a>";
		Echo "<div class='card-body'>";
		echo "<a href='course.php?program_id=".$row["program_id"]."'><h5 class='card-content'>".$row['prog_ac']."</h5></a>";
		echo "<a href='course.php?program_id=".$row["program_id"]."'><p class='card-text'>".$row['programname']."</p></a>";
		echo "</div>";
		echo "</div>";


		$count++;

		if ($count == 2) {
			echo "</div>";
			$newrow = true;
			$count = 0;
		}
 	}
} ?>

</center>
<!-- <div class="cards"> -->

	
	<!-- <div class="card">
		<img src="photos/comp.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Information Technology</p>
			
		</div>
	</div>
	<div class="card">
		<img src="photos/jobfair.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Business Administration Major in Human Resource Management</p>
			
		</div>
	</div>
	<div class="card">
		<img src="photos/st.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Elementary Education</p>
			
		</div>
	</div>

	<div class="card">
		<img src="photos/scical.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Industrial Engineering</p>
			
		</div>
	</div> -->
<!-- </div> -->


  
  <?php  include 'nav.php';?>
  <?php  include 'footer.php';?>
 
 <script src="pup.js"></script>

</body>
</html>