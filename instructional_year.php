<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/instructional1.css">
	<link rel="stylesheet" type="text/css" href="footer1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>PUP BATAAN INSTRUCTIONAL MATERIAL</title>
</head>
<style type="text/css">
.cardx {
	margin: 0 auto;
	max-width: 1350px;
	display: grid;
	grid-template-columns: repeat(4,1fr);
	gap: 5px;
}

.card {
	margin-top: 10px;
	margin-left: 20px;
	margin-right: 20px;
	text-decoration: none;
}

.title {
	position: relative;
	width: 100%;
	height: 25vh;
	background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(photos/header.jpg);
	background-size: cover;
	margin-top: 40px;
}

.past {
	color: white;
	font-size: 50px;
}
@media (max-width:1200px) {
	.text-box h1 {
		font-size:65px;
	}
}

@media (max-width:1200px) {
	.past {
	color: white;
	font-size: 40px;
	}
}
@media(max-width: 900px) {
	.past {
	color: white;
	font-size: 35px;
	}

	.text-box h1 {
		font-size:50px;
	}

.cardx {
	margin: 0 auto;
	max-width: 1350px;
	display: grid;
	grid-template-columns: repeat(2,1fr);
	gap: 5px;
}
}

@media (max-width:500px) {
	.past {
	color: white;
	font-size: 30px;
	}

	.text-box h1 {
		font-size:40px;
	}
}

@media(max-width: 400px) {
	.past {
	margin-top:-20px;
	color: white;
	font-size: 28px;
	}
	.text-box h1 {
		font-size:30px;
	}
	.cardx {
	margin: 0 auto;
	max-width: 1350px;
	display: grid;
	grid-template-columns: repeat(2,1fr);
	gap: 5px;
}}
</style>
<body>
<?php
include 'db.php';
if (isset($_GET['program_id']) && $_GET['program_id']!="") {
	$program_id = $_GET['program_id'];
$program = "SELECT * FROM program where program_id = '$program_id'";
$run = mysqli_query($con, $program);
$programli = mysqli_num_rows($run);	
$count = 0;
$newrow = true;
		if (!empty($programli)) {
			While($row = mysqli_fetch_assoc($run)) {?>

	<section>
		<div class="header">

			<div class="text-box">
				<h1><?php echo $row['programname']; ?></h1>
				</p>
				<hr>
				
			</div>
			
		</div>

	<?php



		$program = "SELECT m.materialID, p.program_id, p.programname, m.yearlevel, m.semester, m.materialtitle_, m.materialdocument from instructional m JOIN program p on p.program_id = m.programID where program_id = '$program_id' group by yearlevel";
		$run = mysqli_query($con, $program);
		$programli = mysqli_num_rows($run);	
		$count = 0;
		$newrow = true;

if (!empty($programli)) {
	While($row = mysqli_fetch_assoc($run)) {
?>


	<?php


		
	?>

<div class="card mb-3" style="max-width: 1200px; margin-left:100px">
  <div class="row g-0">
    <div class="col-md-4">
	<a href="instructional_sem.php?program_id=<?php echo $row['program_id']; ?>&yearlevel=<?php echo $row['yearlevel'];?>"><img src="photos/folder.png" class="img-fluid rounded-start" alt="..." width="10%"></a>
	<?php echo $row['yearlevel'];?> Year
    </div>
  </div>
</div>

<?php


 	}
} 		else {
	?>
	<br>
	<br>
	<br>
	<center>No data available!</center>
	<br>
	<br>
	<?php
}

	?>

<?php
			}
		}

	
} ?>



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
</div>

	<div class="cardz">
	<div class="card">
		<img src="photos/bsiepub.jpg" class="card_img">
		<div class="card_content">
			<p>UPG-Office of the Vice President for Branches and Satellite Campuses</p>
		</div>
	</div>
	</div> -->


  <?php  include 'footer.php';?>
   <?php  include 'nav.php';?>
 
 <script src="pup.js"></script>

</body>
</html>