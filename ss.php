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
	<title>SELF-SURVEY</title>
</head>
<body>
<?php

include 'db.php';
if (isset($_GET['areaID']) && isset($_GET['program_id']) && $_GET['areaID']!="" && $_GET['program_id']!="") {
	$program_id = $_GET['program_id'];
	$areaID = $_GET['areaID'];
		$surveyareaID_query = "SELECT s.surveyareaID, p.program_id, p.programname, a.areaID, a.areaname, s.areades, s.areappp, s.areass, s.area_addfile FROM surveyarea s JOIN program p ON p.program_id = s.programID JOIN area a ON a.areaID = s.areaID WHERE s.areaID = '$areaID' AND program_id = '$program_id'";
		$surveyareaID_result =mysqli_query($con, $surveyareaID_query);
		$surveyareaID_data = mysqli_fetch_row($surveyareaID_result);
		$program_id = $surveyareaID_data[1];
		$programname = $surveyareaID_data[2];
		$areaID = $surveyareaID_data[3];
		$areaname = $surveyareaID_data[4];
		$areades = $surveyareaID_data[5];
		$areappp = $surveyareaID_data[6];
		$areass = $surveyareaID_data[7];
		$area_addfile = $surveyareaID_data[8];
		$surveyareaID = $surveyareaID_data[0];
	}
	else {
		$program_id = "";
		$programname = "";
		$areaID = "";
		$areaname = "";
		$areades = "";
		$areappp = "";
		$areass = "";
		$area_addfile = "";
		$surveyareaID = "";
}

?>
<?php if ($areaID && $program_id) {
	?>
<center>
	<h1><?php echo $programname;?></h1>
	<h1><?php echo $areaname;?></h1>
		<h1>Self Survey</h1>
		<embed type="application/pdf" src="admin/documents/<?php echo $areass; ?>" width="700" height="900"></embed></center>
<?php } ?>
</body>
</html>