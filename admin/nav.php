<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN'S REGISTRATION</title>
	<link rel="shortcut icon"  href="photos/PUP LOGO.png">
	<link rel="stylesheet" type="text/css" href="css/dashboard2.css">
	<link rel="stylesheet" type="text/css" href="css/navbar1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<section class="header" id="header">
	<img src="photos/PUP LOGO.png">
	<h1>PUP BATAAN</h1>



	<div class="sidebar">
	<div class="nav-links">
	<ul class="links">

		<li><i class="fa fa-lock fa-fw"></i><a href="admin.php">ADMIN</a></li> <!-- admin information-->
		<li><i class="fa fa-university fa-fw"></i><a href="faculty.php">PUP</a> <i class="fa fa-angle-down arrow pup-arrow"></i>
			<ul class="sub-menu pup">
				<li><i class="fa fa-user-md fa-fw"></i><a href="position.php">Position</a></li>
				<li><i class="fa fa-star fa-fw"></i><a href="accomplishment.php">Accomplishment</a></li>
				<li><i class="fa fa-cogs fa-fw"></i><a href="facility.php">Facility</a></li>
				<li><i class="fa fa-flask fa-fw"></i><a href="laboratory.php">Laboratory</a></li>
				<li><i class="fa fa-building fa-fw"></i><a href="office.php">Offices</a></li>
				<li><i class="fa fa-book fa-fw"></i><a href="library.php">Library</a></li>
				<li><i class="fa fa-building fa-fw"></i><a href="parameterlib.php">Parameter Library</a></li>

			</ul>
		</li>
		<li><i class="fa fa-graduation-cap fa-fw"></i><a href="program.php">PROGRAMS</a> <i class="fa fa-angle-down arrow program-arrow"></i>
			<ul class="sub-menu program">
				<li><i class="fa fa-bullseye fa-fw"></i><a href="survey-prog-obj.php">Objectives</a></li>
				<li><i class="fa fa-user fa-fw"></i><a href="alumni.php">Notable Alumni</a></li>
				<li><i class="fa fa-trophy fa-fw"></i><a href="achievement-prog.php">Achievements</a></li>
				<li><i class="fa fa-tasks fa-fw"></i><a href="prog-activity.php">Activities</a></li>
				<li><i class="fa fa-list fa-fw"></i><a href="area.php">Areas Under Survey</a></li>
				<li><i class="fa fa-check-square-o fa-fw"></i><a href="surveyarea.php">Survey Area</a></li>
				<li><i class="fa fa-building fa-fw"></i><a href="surveyparameter.php">Parameters</a></li>
				<li><i class="fa fa-file-pdf-o fa-fw"></i><a href="addfile.php">Additional Files</a></li>

			</ul>
		</li>
		<li><i class="fa fa-files-o fa-fw"></i><a href="cmo.php">CMO</a></li>
		<li><i class="fa fa-folder-open-o fa-fw"></i><a href="instructional.php">INSTRUCTIONAL MATERIAL</a></li>
		<li><i class="fa fa-file fa-fw"></i><a href="syllabi.php">OBE SYLLABI</a></li>
		<li><i class="fa fa-folder fa-fw"></i><a href="exhibit.php">EXHIBIT</a></li>
	</ul>
	</div>
</div>

<script type="text/javascript">
	let navLinks = document.querySelector(".nav-links");
	let pupArrow = document.querySelector(".pup-arrow");
	let programArrow = document.querySelector(".program-arrow");
	pupArrow.addEventListener("click", ()=> {
		navLinks.classList.toggle("show1");
		});

		programArrow.addEventListener("click", ()=> {
			navLinks.classList.toggle("show2");
		});
</script>

</section>

