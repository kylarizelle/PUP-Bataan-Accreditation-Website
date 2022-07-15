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

.past {
	color: white;
	font-size: 50px;
}

.title {
	position: relative;
	width: 100%;
	height: 15vh;
	background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(photos/header.jpg);
	background-size: cover;
	margin-top: 40px;
}


@media(max-width:1200px) {
	.text-box h1 {
		font-size:65px;
	}
}


@media(max-width: 900px) {
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
	.text-box h1 {
		font-size:40px;
	}
}

@media(max-width: 400px) {
	.text-box h1 {
		font-size:30px;
	}

	.past {
		margin-top:-20px;
		font-size: 35px;
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
if (isset($_GET['program_id']) && isset($_GET['yearlevel']) && isset($_GET['semester']) && $_GET['program_id']!="" && $_GET['yearlevel']!="" && $_GET['semester']!="") {
	$program_id = $_GET['program_id'];
	$yearlevel = $_GET['yearlevel'];
	$semester = $_GET['semester'];
	$program_query = "SELECT m.materialID, p.program_id, p.programname, m.yearlevel, m.semester, m.materialtitle_, m.materialdocument from instructional m JOIN program p on p.program_id = m.programID where program_id = '$program_id' AND yearlevel = '$yearlevel' AND semester = '$semester'";
		$program_result =mysqli_query($con, $program_query);
		$program_data = mysqli_fetch_row($program_result);
		$program_id = $program_data[1];
		$programname = $program_data[2];
		$yearlevel = $program_data[3];
		$semester = $program_data[4];
		$materialtitle_ = $program_data[5];
		$materialdocument = $program_data[6];
		$materialID = $program_data[0];
	}
	else {
		$program_id = "";
		$programname = "";
		$yearlevel = "";
		$semester = "";
		$materialtitle_ = "";
		$materialdocument = "";
		$materialID = "";
}
?>
	<section>
		<div class="header">

			<div class="text-box">
				<h1><?php echo $programname; ?></h1>
				</p>
				<hr>
				
			</div>
			
		</div>
	</section>
	<section class="title">
	<br> 
	<center><h1 class="past" style="text-transform: uppercase;"><?php echo $yearlevel ?> YEAR <?php echo $semester?> Semester</h1>
</center>

	</section>
	<br> 

	<?php
if (isset($_GET['program_id']) && isset($_GET['yearlevel']) && isset($_GET['semester']) && $_GET['program_id']!="" && $_GET['yearlevel']!="" && $_GET['semester']!="") {
		$program_id = $_GET['program_id'];
		$yearlevel = $_GET['yearlevel'];
			$program = "SELECT m.materialID, p.program_id, p.programname, m.yearlevel, m.semester, m.materialtitle_, m.materialdocument from instructional m JOIN program p on p.program_id = m.programID where program_id = '$program_id' AND yearlevel = '$yearlevel' AND semester = '$semester'";
			$run = mysqli_query($con, $program);
			$programli = mysqli_num_rows($run);	
			$count = 0;
			$newrow = true;

	if (!empty($programli)) {
		While($row = mysqli_fetch_assoc($run)) {

			
		?>

<div class="card mb-3" style="max-width: 1200px; margin-left:100px">
  <div class="row g-0">
    <div class="col-md-4">
	<a href="instructionalsem_docuviewer.php?program_id=<?php echo $row['program_id']; ?>&yearlevel=<?php echo $row['yearlevel'];?>&semester=<?php echo $row['semester']; ?>&materialID=<?php echo $row['materialID']; ?>" target="_blank"><img src="photos/pdf.png" class="img-fluid rounded-start" alt="..." width="10%"></a>
	<?php echo $row['materialtitle_'];?>
    </div>
  </div>
</div>
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