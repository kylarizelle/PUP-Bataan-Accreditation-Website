<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/building.css">
	<link rel="stylesheet" type="text/css" href="footer1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>PUP BATAAN'S BUILDINGS AND FACILITIES</title>
</head>
<body>
	<section>
		<div class="header">

			<div class="text-box">
				<h1>BUILDINGS AND FACILITIES</h1>
				</p>
				<hr>
				
			</div>
			
		</div>
	</section>

	
<section class="title">
		<br>

	<center><h1 class="past">BUILDINGS</h1></center>

	</section>

	<section class="img">

		<h1>PUP BATAAN BUILDING</h1>

		<div class="f-img">

			<img src="photos/pupbataan.jpg">
		</div>
		<div class="s-img">

			<img src="photos/PUP3.jpg">
		</div>
		<div class="t-img">

			<img src="photos/PUP.jpg">
		</div>
		
	</section>

	<section class="title">
		<br>

	<center><h1 class="past">FACILITIES</h1></center>

	</section>
<center>
	<br>
 <?php
    require 'db.php';
    $facility = "SELECT * FROM facility";
   	$run = mysqli_query($con, $facility);
    $facilityli = mysqli_num_rows($run);
    if (!empty($facilityli)) {
  	While($row = mysqli_fetch_assoc($run)) {
    ?>
<div class="card mb-3" style="max-width: 1200px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="admin/photos/<?php echo $row['picture']; ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h1 class="card-title"><?php echo $row['name']; ?></h1>
        <p class="card-text"><?php echo $row['description']; ?></p>
      </div>
    </div>
  </div>
</div>
	<?php }
	} ?>
</center>
<!-- 	<section class="facility">

		<img src="photos/room3.jpg">

		<h1>SPEECH LABORATORY</h1>
		<p>A place where students can practice and develop oral communication skills, listening and other activities under public speaking. Through various trainings and activities students will improve their skills in public speaking.</p>
		
	</section>

	<section class="facility">

		<img src="photos/court.jpg">

		<h1>GYMNASIUM</h1>
		<p>A hall where games and physical training are held. Most of the activities in PUP Bataan are held in the PUP Taguig gymnasium.</p>
		
	</section>

	<section class="facility">

		<img src="photos/library.jpg">

		<h1>LIBRARY</h1>
		<p>In order to have a more efficient way of giving library services, PUP Bataan using a computerized library system that features all the services a library has. It includes: locating library resources for study and research purposes, lend books and other reading materials, and facilitates acquisition of books.</p>
		
	</section>

	<section class="facility">

		<img src="photos/do.jpg">

		<h1>CONFERENCE ROOM</h1>
		<p>This room can be set up for seminars, thesis defense, film showing and larger scale meetings.</p>
		
	</section> -->

  <?php  include 'footer.php';?>
  <?php  include 'nav.php';?>
 
 <script src="pup.js"></script>

</body>
</html>