
<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/area1.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>PUP BATAAN PROGRAMS</title>
</head>
<body>


<?php

include 'db.php';
if (isset($_GET['areaID']) && isset($_GET['program_id']) && $_GET['areaID']!="" && $_GET['program_id']!="") {
	$program_id = $_GET['program_id'];
	$areaID = $_GET['areaID'];
		$surveyareaID_query = "SELECT s.surveyareaID, p.program_id, p.programname,p.prog_ac, a.areaID, a.areaname, a.area_img, s.areades, s.areappp, s.areass, s.area_addfile FROM surveyarea s JOIN program p ON p.program_id = s.programID JOIN area a ON a.areaID = s.areaID WHERE s.areaID = '$areaID' AND program_id = '$program_id'";
		$surveyareaID_result =mysqli_query($con, $surveyareaID_query);
		$surveyaareaID_data = mysqli_num_rows($surveyareaID_result);

		if (!empty($surveyaareaID_data)) {
			while ($row = mysqli_fetch_assoc($surveyareaID_result)) {
				?>
	<section>
		<div class="header">
			<img src="admin/photos/<?php echo $row['area_img']; ?>">
				<div class="text-box">
					<h1><?php echo $row['areaID']; ?></h1>
					<p><?php echo $row['areaname']; ?></p>
					<p><?php echo $row['programname']; ?></p>

					<hr>
				</div>
		</div>
	</section>
	
	<section class="bsa">
		<section class="bsa-content">
			<h1>CONTENT</h1>
			<a href="#PPP">
			<p>Program Performance Profile</p></a>
			<a href="#SS">
			<p>Self Survey</p></a>
			
		</section>

		<section class="bsa-des">
			<h1>AREA DESCRIPTION</h1>

			<p><?php echo $row['areades']; ?></p>
			
		</section>
	</section>


	<section class="title" id="PPP">
		<br>

			<center><h1 class="admin">PROGRAM PERFORMANCE PROFILE</h1></center>

	</section>
	<br>
<center>
<a href="ppp.php?areaID=<?php echo $row['areaID'];?>&program_id=<?php echo $row['program_id'];?>" target="_blank"><img src="photos/pdf.png" class="img-fluid" alt="..." width="20%"></a>
<p style="font-style: italic; color:gray;">CLick to view the Document</p>
</center>

	<section class="title" id="SS">
		<br>

			<center><h1 class="admin">SELF SURVEY</h1></center>

	</section>
	<br>
<center>
<a href="ss.php?areaID=<?php echo $row['areaID'];?>&program_id=<?php echo $row['program_id'];?>" target="_blank"><img src="photos/pdf.png" class="img-fluid" alt="..." width="20%"></a>
<p style="font-style: italic; color:gray;">CLick to view the Document</p>
</center>
<?php
			}
		}
		else { ?>
			<section>
		<div class="header">
			<img src="photos/PUP3.jpg ?>">
					<hr>
				</div>
		</div>
	</section>
			<?php
		}
	}
?>
<section class="area">
<center>
<?php
if ($program_id) {

	$area = "SELECT * FROM area";
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
					echo "<a href='area.php?areaID=".$row["areaID"]."&program_id=".$program_id."'><button class='back-btn'>Area ".$row['areaID']."</button></a>";
					
					echo "</div>";

					$count++;

					if ($count == 4) {
						echo "</div>";
						$newrow = true;
						$count = 0;
					}
 				}
			}
}
?>
</center>
</section>

<?php
if ($program_id) {
	$program = "SELECT * FROM program WHERE program_id = '$program_id'";
	$program_query = mysqli_query($con, $program);
	$program_result = mysqli_fetch_row($program_query);
	$programname = $program_result[1];
	$prog_ac = $program_result[2];
	$description = $program_result[3];
	$prog_img = $program_result[4];
	$definition = $program_result[5];
	$program_id = $program_result[0];
} else {
	$programname = "";
	$prog_ac = "";
	$description = "";
	$prog_img = "";
	$definition = "";
	$program_id = "";
} ?>

<br>
<section class="program">
	<br>
	<center>
	<div class="cardz">
  <a href="add_file.php?program_id=<?php echo $program_id;?>">
  	<div class="card-a">
  		<button class="add"><?php echo $programname;?> ADDITIONAL FILES</button>
  	</div>
  </a>
</div>
</center>
</section>

<br>
<div class="cards">
	<div class="card">
		<a href="course.php?program_id=<?php echo $program_id;?>"><button class="back-btn">BACK TO <?php echo $prog_ac; ?></button></a>
	</div>
	<div class="card"><a href="index.php"><button class="back-btn">BACK TO HOME</button></a>
	</div>
</div>
  <?php  include 'footer.php';?>
  <?php include 'nav.php';?>
 
 <script src="pup.js"></script>

</body>
</html>