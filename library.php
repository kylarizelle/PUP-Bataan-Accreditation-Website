<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/library1.css">
	<link rel="stylesheet" type="text/css" href="footer1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>PUP BATAAN'S LIBRARY</title>
</head>
<style type="text/css">
.cardx {
	margin: 0 auto;
	max-width: 1200px;
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

.text {
	text-decoration:none;
	color: black;
}

@media(max-width: 900px) {
.cardx {
	margin: 0 auto;
	max-width: 1000px;
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
				<h1>LIBRARY</h1>
				</p>
				<hr>
				
			</div>
			
		</div>
	</section>


<div class="card mb-3" style="max-width: 1200px; margin-left:100px">
  <div class="row g-0">
    <div class="col-md-4">
	<a href="libraryppp.php"><img src="photos/folder.png" class="img-fluid rounded-start" alt="..." width="10%"></a>
	Program Performance Profile
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 1200px; margin-left:100px">
  <div class="row g-0">
    <div class="col-md-4">
	<a href="libraryss.php"><img src="photos/folder.png" class="img-fluid rounded-start" alt="..." width="10%"></a>
	Self Survey
    </div>
  </div>
</div>
<div class="card mb-3" style="max-width: 1200px; margin-left:100px">
  <div class="row g-0">
    <div class="col-md-4">
	<a href="libraryparameter.php"><img src="photos/folder.png" class="img-fluid rounded-start" alt="..." width="10%"></a>
	Parameters
    </div>
  </div>
</div>
<br>		
				<!-- <div class= "cardx">
					<div class="card text-center">
						
						<img class="mx-auto" src="photos/folder.png" width="100%" >
					</a>
						<div class='card-body'>
							
							<h5 class='card-content text'>PROGRAM PERFORMANCE PROFILE</h5>
						</div>
					</div> -->
					
					<!-- <div class="card text-center">
						<a href="libraryss.php">
						<img class="mx-auto" src="photos/folder.png" width="100%" ></a>
						<div class='card-body'> -->
<!-- 							
							<h5 class='card-content text'>SELF-SURVEY</h5>
						</div>
					</div>
					<div class="card text-center">
						<a href="libraryparameter.php">
						<img class="mx-auto" src="photos/folder.png" width="100%"></a>
						<div class='card-body'>
							
							<h5 class='card-content text'>PARAMETERS</h5>
						</div>
					</div>
				</div> -->

	<?php
// 						require 'db.php';
// 		$program = "SELECT * FROM program";
// 		$run = mysqli_query($con, $program);
// 		$programli = mysqli_num_rows($run);	
// 		$count = 0;
// 		$newrow = true;
// 							if (!empty($programli)) {
// 							 	While($row = mysqli_fetch_assoc($run)) {
		
// 		if ($newrow) {
// 			echo "<div class= 'cards'>";
// 			$newrow = false;
// 		}

// 		echo "<div class='card text-center'>";
// 		echo "<img class='mx-auto' src='photos/library.jpg' width = '100%'>";
// 		Echo "<div class='card-body'>";
// 		echo "<h5 class='card-content'>".$row['prog_ac']."</h5>";
// 		echo "<p class='card-text'>".$row['programname']."</p>";
// 		echo "</div>";
// 		echo "</div>";

// $count++;

// if ($count == 2) {
// 	echo "</div>";
// 	$newrow = true;
// 	$count = 0;
// }
//  	}
// 							 } ?>

<!-- </center> -->
<!-- <div class="cards">
	<div class="card">
		<img src="photos/library.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Accounting</p>
			
		</div>
	</div>
	<div class="card">
		<img src="photos/library.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Information Technology</p>
			
		</div>
	</div>
	<div class="card">
		<img src="photos/library.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Business Administration Major in Human Resource Management</p>
			
		</div>
	</div>
	<div class="card">
		<img src="photos/library.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Elementary Education</p>
			
		</div>
	</div>
	<div class="card">
		<img src="photos/library.jpg" class="card_img">
		<div class="card_content">
			<p>Bachelor of Science in Industrial Engineering</p>
			
		</div>
	</div>

</div> -->

  <?php  include 'footer.php';?>
  <?php  include 'nav.php';?>
 
 <script src="pup.js"></script>

</body>
</html>