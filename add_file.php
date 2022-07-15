
<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/addfile.css">
	<link rel="stylesheet" type="text/css" href="footer1.css">
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
if (isset($_GET['program_id']) && $_GET['program_id']!="") {
	$program_id = $_GET['program_id'];
	$program_id_query = "SELECT * FROM program WHERE program_id= '$program_id'";
	$program_id_result =mysqli_query($con, $program_id_query);
	$program_id_data = mysqli_fetch_row($program_id_result);
	$programname = $program_id_data[1];
	$prog_ac = $program_id_data[2];
	$description = $program_id_data[3];
	$prog_img = $program_id_data[4];
	$definition = $program_id_data[5];
	$program_id = $program_id_data[0];
}
else {
	$programname = "";
	$prog_ac = "";
	$description = "";
	$prog_img = "";
	$definition = "";
	$program_id = "";
}

?>
	<?php if ($program_id) {
	?>
	<section>
		<div class="header">
				<div class="text-box">
					<h1>ADDITONAL FILES</h1>
					<p><?php echo $prog_ac; ?></p>
					<hr>
				</div>
		</div>
	</section>
<?php } ?>

<?php
$add_file = "SELECT p.program_id, a.addfilename, a.addfile_docu FROM addfile a JOIN program p ON p.program_id=a.programID WHERE program_id = '$program_id'";
$add_file_query = mysqli_query($con, $add_file);
$add_file_result = mysqli_num_rows($add_file_query);

if (!empty($add_file_result)) {
	while ($row = mysqli_fetch_assoc($add_file_query)) {
				
?>

<div class="link">
	<ul>
		<a href="addfile_docu.php?program_id=<?php echo $row['program_id'];?>" target="_blank"><li><?php echo $row['addfilename'];?></li></a>
	</ul>
</div>
<?php
	}
}
?>


<?php
$area = "SELECT s.surveyareaID, p.program_id, p.programname,p.prog_ac, a.areaID, a.areaname, a.area_img, s.areades, s.areappp, s.areass, s.area_addfile FROM surveyarea s JOIN program p ON p.program_id = s.programID JOIN area a ON a.areaID = s.areaID WHERE program_id = '$program_id' order by areaID";
$area_query = mysqli_query($con, $area);
$area_result = mysqli_num_rows($area_query);

if (!empty($area_result)) {
	while ($row = mysqli_fetch_assoc($area_query)) {
				
?>
<section class="title">
		<br>
				<h1 class="admin"> AREA: <?php echo $row['areaname']; ?></h1>
	</section>
<div class="link">
	<ul>
		<a href="area_addfile.php?program_id=<?php echo $row['program_id'];?>&areaID=<?php echo $row['areaID'];?>" target="_blank">
		<li><?php echo $row['area_addfile'];?></li>
	</a>
	</ul>
</div>
<?php
	}
}
?>
<section class="title">
		<br>
				<center><h1 class="admin"> AREAS </h1> </center>
	</section>
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


  <?php  include 'footer.php';?>
  <?php  include 'nav.php';?>
 
 <script src="pup.js"></script>

</body>
</html>