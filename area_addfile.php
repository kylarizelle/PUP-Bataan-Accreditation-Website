<!DOCTYPE html>
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
	<title>PROGRAM PERFORMANCE PROFILE</title>
</head>
<body>
<?php

include 'db.php';
if (isset($_GET['areaID']) && isset($_GET['program_id']) && $_GET['areaID']!="" && $_GET['program_id']!="") {
	$program_id = $_GET['program_id'];
	$areaID = $_GET['areaID'];
	$addfile = "SELECT s.surveyareaID, p.program_id, p.programname,p.prog_ac, a.areaID, a.areaname, a.area_img, s.areades, s.areappp, s.areass, s.area_addfile FROM surveyarea s JOIN program p ON p.program_id = s.programID JOIN area a ON a.areaID = s.areaID WHERE program_id = '$program_id' and s.areaID = '$areaID'";
		$addfile_result =mysqli_query($con, $addfile);
		$addfile_data = mysqli_fetch_row($addfile_result);
		$program_id = $addfile_data[1];
		$programname = $addfile_data[2];
		$prog_ac = $addfile_data[3];
		$areaID = $addfile_data[4];
		$areaname = $addfile_data[5];
		$area_img = $addfile_data[6];
		$areades = $addfile_data[7];
		$areappp = $addfile_data[8];
		$areass = $addfile_data[9];
		$area_addfile = $addfile_data[10];
		$surveyareaID = $addfile_data[0];
	}
	else {
		$program_id = "";
		$programname = "";
		$prog_ac = "";
		$areaID = "";
		$areaname = "";
		$area_img = "";
		$areades = "";
		$areappp = "";
		$areass = "";
		$area_addfile = "";
		$surveyareaID = "";
}

?>
<?php if ($program_id) {
	?>
<center>
		<h1><?php echo $area_addfile; ?></h1>
		<embed type="application/pdf" src="admin/documents/<?php echo $area_addfile; ?>" width="700" height="900"></embed></center>
<?php } ?>
</body>
</html>