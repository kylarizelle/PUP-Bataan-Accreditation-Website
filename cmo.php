<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/cmo1.css">
	<link rel="stylesheet" type="text/css" href="footer1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>PUP BATAAN CHED MEMORANDUM ORDER</title>
</head>
<body>
	<section>
		<div class="header">

			<div class="text-box">
				<h1>CHED MEMORANDUM ORDER</h1>
				</p>
				<hr>
				
			</div>
			
		</div>
	</section>

<center>
	<?php
require 'db.php';
$cmo = "SELECT c.cmoID, p.program_id, p.programname, c.cmotitle_, c.cmo_img, c.cmodocument FROM cmo c JOIN program p on p.program_id = c.programID";
$run = mysqli_query($con, $cmo);
$cmoli = mysqli_num_rows($run);	
$count = 0;
$newrow = true;
if (!empty($cmoli)) {
	While($row = mysqli_fetch_assoc($run)) {

		if ($newrow) {
			echo "<div class= 'cards'>";
			$newrow = false;
		}
		
	?>
		<div class="card text-center">
		<a href="cmo_docu.php?program_id=<?php echo $row['program_id']; ?>" target="_blank"><img class="mx-auto" src="admin/photos/<?php echo $row['cmo_img']; ?>" width="100%"></a>
		<div class="card-body">
		<a href="cmo_docu.php?program_id=<?php echo $row['program_id']; ?>" target="_blank"><h5 class='card-content'><?php echo $row['programname'];?></h5></a>
		</div>
		</div>
<?php


		$count++;

		if ($count == 2) {
			echo "</div>";
			$newrow = true;
			$count = 0;
		}
 	}
} ?>

</center>

<br>
<br>
<br>
<br>
<br>
<br>
<!-- 	<div class="cards">
	<div class="card">
		<img src="photos/bsapub.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Accountancy</p>
			
		</div>
	</div>
	<div class="card">
		<img src="photos/bsitpub.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Information Technology</p>
		</div>
	</div>

			<div class="card">
		<img src="photos/bsbapub.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Business Administration- Major in Human REsource Management</p>
		</div>
	</div>

	<div class="card">
		<img src="photos/bseepub.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Elementary Education</p>
		</div>
	</div>
</div> -->




  <?php  include 'footer.php';?>
   <?php  include 'nav.php';?>
 
 <script src="pup.js"></script>

</body>
</html>