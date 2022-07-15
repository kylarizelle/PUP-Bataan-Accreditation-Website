
<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/course.css">
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
			<img src="admin/photos/<?php echo $prog_img; ?>">
				<div class="text-box">
					<h1><?php echo $prog_ac; ?></h1>
					<p><?php echo $programname; ?></p>
					<hr>
				</div>
		</div>
	</section>
	
	<section class="bsa">
		<section class="bsa-content">
			<h1>CONTENT</h1>
			<a href="#Objective">
			<p> Objective of the Program</p></a>
			<a href="#Areas">
			<p> Areas Under Survey</p></a>
			
		</section>

		<section class="bsa-des">
			<h1>PROGRAM DESCRIPTION</h1>

			<p><?php echo $description; ?></p>
			<p><?php echo $definition; ?></p>
			
		</section>
		
	</section>


	<section class="title">
		<br>

	<center><h1 id="Objective" class="admin">OBJECTIVES OF THE PROGRAM</h1></center>

	</section>

	<section class="bsa-obj">
		<p>The <?php echo $programname;?> (<?php echo $prog_ac; ?>) aims to provide training and practice that will enable students: 
<?php }?>
		<ul>

			<?php

if (isset($_GET['program_id']) && $_GET['program_id']!="") {
	$program_id = $_GET['program_id'];
	$surveyID_query = "SELECT s.surveyID, p.program_id, p.programname, p.prog_ac, s.objective FROM surveyprogram s JOIN program p ON p.program_id = s.programID WHERE program_id = '$program_id'";
	$surveyID_result =mysqli_query($con, $surveyID_query);
	$surveyID_data = mysqli_num_rows($surveyID_result);

		if (!empty($surveyID_data)) {
			While ($row = mysqli_fetch_assoc($surveyID_result)) {
			?>

			<li><?php echo $row['objective']; ?></li>
<?php
			}
		}
}
?>
	</ul>
	</p> 
	</section>

		<section class="title">
<?php 
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
		<br>
<?php if ($program_id) {
	?>

	<center><h1 class="admin"><?php echo $prog_ac; ?> ALUMNI</h1></center>
<?php } ?>
	</section>
<center>
 <?php
if (isset($_GET['program_id']) && $_GET['program_id']!="") {
	$program_id = $_GET['program_id'];
	$program_id_query = "SELECT a.alumniID, p.program_id, p.programname, a.alumniyear, a.alumniname_, a.alumniposition, a.alumni_img FROM alumni a JOIN program p on p.program_id = a.programID WHERE program_id= '$program_id'";
	$program_id_result =mysqli_query($con, $program_id_query);
	$program_id_data = mysqli_num_rows($program_id_result);
	$count = 0;
	$newrow = true;

	if (!empty($program_id_data)) {
		While ($row = mysqli_fetch_assoc($program_id_result)) {

			if ($newrow) {
				echo "<div class= 'cards'>";
				$newrow = false;
			}

			echo "<div class='card text-center'>";
			echo "<img class='mx-auto' src='admin/photos/".$row['alumni_img']."' width = '100%'>";
			Echo "<div class='card-body'>";
			echo "<h5 class='card-content'>".$row['alumniname_']."</h5>";
			echo "<h5 class='card-content'>".$row['alumniposition']."</h5>";
			echo "<h5 class='card-content'>".$row['alumniyear']."</h5>";
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
	}
    ?>
</center>

	<section class="title">
		<br>

	<center><h1 class="admin">ACHIEVEMENTS</h1></center>

	</section>
<center>
	<br>
<div class="container">
<table class="table">
  <thead class="table-dark">
  <th>   </th>
  <th>YEAR</th>
  <th>ACHIVEMENT NAME</th>
  <th>ACHIEVEMENT DESCRIPTION</th>
  </thead>
  <tbody>
 <?php
if (isset($_GET['program_id']) && $_GET['program_id']!="") {
	$program_id = $_GET['program_id'];
	$program_id_query = "SELECT a.achieveID, p.program_id, a.achieveyear, a.name, a.achievement FROM `achievement` a JOIN program p ON p.program_id = a.programID WHERE program_id= '$program_id'";
	$program_id_result =mysqli_query($con, $program_id_query);
	$program_id_data = mysqli_num_rows($program_id_result);

}
	if (!empty($program_id_data)) {
		While ($row = mysqli_fetch_assoc($program_id_result)) {
?>

    <tr>
    	<td>   </td>
    	<td><?php echo $row['achieveyear'];?></td>
    	<td><?php echo $row['name'];?></td>
    	<td><?php echo $row['achievement'];?></td>
    </tr>	
    <?php
		}
	}
	else {
		echo "<tr>
    				<td colspan='4'><center>No data in table</center></td>
  				</tr>";
	}
	
    ?>

  </tbody>
</table>
</div>
</center>

	<section class="title">
		<br>

	<center><h1 class="admin">ACTIVITIES</h1></center>

	</section>
<center>
 <?php
if (isset($_GET['program_id']) && $_GET['program_id']!="") {
	$program_id = $_GET['program_id'];
	$program_id_query = "SELECT a.actprogID, p.program_id, a.activity_prog, a.act_img FROM `actprogram` a JOIN program p ON p.program_id = a.programID WHERE program_id= '$program_id'";
	$program_id_result =mysqli_query($con, $program_id_query);
	$program_id_data = mysqli_num_rows($program_id_result);
	$count = 0;
	$newrow = true;

	if (!empty($program_id_data)) {
		While ($row = mysqli_fetch_assoc($program_id_result)) {

			if ($newrow) {
				echo "<div class= 'cards'>";
				$newrow = false;
			}

			echo "<div class='card text-center'>";
			echo "<img class='mx-auto' src='admin/photos/".$row['act_img']."' width = '100%'>";
			Echo "<div class='card-body'>";
			echo "<h5 class='card-content'>".$row['activity_prog']."</h5>";
			echo "</div>";
			echo "</div>";

					$count++;

				if ($count == 4) {
					echo "</div>";
					$newrow = true;
					$count = 0;
				}
			}
		} else {
			?>
			<br>
			<h3>NO DATA AVAILABLE</h3>
			<?php
		}
	}
    ?>
</center>
	<section id="Areas" class="title">
		<br>

	<center><h1 class="admin">AREAS UNDER SURVEY</h1></center>

	</section>
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
				echo "<div class= 'cards'>";
				$newrow = false;
			}


		
					echo "<div class='card text-center'>";
					echo "<a href='area.php?areaID=".$row["areaID"]."&program_id=".$program_id."'><img class='mx-auto' src='admin/photos/".$row['area_img']."' width = '100%'></a>";
					Echo "<div class='card-body'>";
					echo "<p class='card-text'>".$row['areaname']."</p>";
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
}
?>
</center>
<?php
if (isset($_GET['program_id']) && $_GET['program_id']!="") {
	$program_id = $_GET['program_id'];
	$addfile = "SELECT a.addfileID, p.program_id, p.programname, a.addfilename, a.addfile_docu FROM addfile a JOIN program p ON p.program_id=a.programID
	WHERE program_id = '$program_id'";
	$addfile_result =mysqli_query($con, $addfile);
	$addfile_data = mysqli_num_rows($addfile_result);

		if (!empty($addfile_data)) {
			While ($row = mysqli_fetch_assoc($addfile_result)) {
			?>

<div class="add-docu">
	<a href="addfile_docu.php?program_id=<?php echo $row['program_id']; ?>" target="_blank">
	<img src="photos/Extra File.png">
	<p><?php echo $prog_ac; ?> Additional Files</p>
</div>
<?php
			}
		} 
		
}
?>




  <?php  include 'footer.php';?>
  <?php  include 'nav.php';?>
 
 <script src="pup.js"></script>

</body>
</html>