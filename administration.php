<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/administration.css">
	<link rel="stylesheet" type="text/css" href="footer1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>PUP BATAAN ADMINISTRATION</title>
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

.back-btn {
	width: 100%;
	display: block;
	padding: 5px;
	background: maroon;
	border: 1px solid black;
	border-radius: 5px;
	text-decoration: none;
	color: white;
}


@media(max-width: 900px) {
.cardx {
	margin: 0 auto;
	max-width: 1350px;
	display: grid;
	grid-template-columns: repeat(2,1fr);
	gap: 5px;
}
}

@media(max-width: 400px) {
	.cardx {
	margin: 0 auto;
	max-width: 1350px;
	display: grid;
	grid-template-columns: repeat(2,1fr);
	gap: 5px;
}}
</style>
<body>
	<section>
		<div class="header">

			<div class="text-box">
				<h1>ADMINISTRATION</h1>
				</p>
				<hr>
				
			</div>
			
		</div>
	</section>
<br>
<section class="area">
<center>
<?php
include 'db.php';
	$area = "SELECT a.adminID, a.fullname, a.professionalname, a.image_, p.positionID, p.positionname FROM administration a JOIN position p on p.positionID = a.positionID GROUP BY positionID";
	$run = mysqli_query($con, $area);
	$areali = mysqli_num_rows($run);	
	$count = 0;
	$newrow = true;

	if (!empty($areali)) {
		While($row = mysqli_fetch_assoc($run)) {
			if ($newrow) {
				echo "<div class= 'cardx'>";
				$newrow = false;
			}
					echo "<div class='card text-center'>";
					echo "<a href='admin_position.php?positionID=".$row['positionID']."'><button class='back-btn'>".$row['positionname']."</button></a>";
					echo "</div>";

					$count++;

					if ($count == 4) {
						echo "</div>";
						$newrow = true;
						$count = 0;
					}
 				}
			}
?>
</center>
</section>

<br>
<center>
<?php 

$administration = "SELECT a.adminID, a.fullname, a.professionalname, a.image_, p.positionID, p.positionname FROM administration a JOIN position p on p.positionID = a.positionID order by fullname";
$run = mysqli_query($con, $administration);
$administrationlist = mysqli_num_rows($run);
$count = 0;
$newrow = true;
	if (!empty($administrationlist)) {
		While ($row = mysqli_fetch_assoc($run)) {
			$positionname = $row['positionname'];

			if ($newrow) {
				echo "<div class= 'cardx'>";
				$newrow = false;
			}
			echo "<div class='card text-center'>";
			echo "<img class='mx-auto' src='admin/photos/".$row['image_']."' width = '100%'>";
			echo "<div class='card-body'>";
			echo "<h5 class='card-content'>".$row['professionalname']." ".$row['fullname']."</h5>";
			echo "<p class='card-text'>".$row['positionname']."</p>";
			echo "</div>";
			echo "</div>";
			$count++;	
				
			if ($count == 4) {
				echo "</div>";
				$newrow = true;
				$count = 0;
			}

		} 
	}
?>
</center>




<!-- <section class="title">
		<br>

	<center><h1 class="past">BRANCH OFFICIALS</h1></center>

	</section>

	<section class="title">
		<br>

	<center><h1 class="past">FULL TIME FACULTY</h1></center>

	</section>

	<section class="title">
		<br>

	<center><h1 class="past">PART TIME FACULTY</h1></center>

	</section>

	<section class="title">
		<br>

	<center><h1 class="admin">ACCREDIATTION TASK FORCE</h1></center>

	</section>

	<section class="title">
		<br>

	<center><h1 class="admin">ADMINISTRATIVE EMPLOYEES</h1></center>

	</section>

	<section class="title">
		<br>

	<center><h1 class="past">SECURITY GUARD</h1></center>

	</section>
 -->
<br>
<br>
<br>
<br>


  <?php  include 'footer.php';?>
  <?php  include 'nav.php';?>
 
 <script src="pup.js"></script>

</body>
</html>