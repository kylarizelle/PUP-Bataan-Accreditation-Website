<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/area2.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>PROGRAM AREA PARAMETER SYSTEM, INPUT AND PROCESS</title>
</head>
<body>
<?php
include 'db.php';
if (isset($_GET['areaID']) && isset($_GET['program_id']) && isset($_GET['parameterletter']) && $_GET['areaID']!="" && $_GET['program_id']!="" && $_GET['parameterletter']) {
	$program_id = $_GET['program_id'];
	$areaID = $_GET['areaID'];
	$parameterletter = $_GET['parameterletter'];
	$surveyparameter_query = "SELECT s.surveyparaID, p.program_id, p.programname, a.areaID, a.areaname, s.parameterletter, s.parametertitle, s.sip_, s.implementation, s.outcome FROM `surveyparameter` s JOIN program p ON p.program_id = s.programID JOIN area a ON a.areaID = s.areaID WHERE s.areaID = '$areaID' AND program_id = '$program_id' AND parameterletter = '$parameterletter'";
	$surverparameter_result = mysqli_query($con, $surveyparameter_query);
	$surveyparameter_data = mysqli_fetch_row($surverparameter_result);

	$program_id = $surveyparameter_data[1];
	$programname = $surveyparameter_data[2];
	$areaID = $surveyparameter_data[3];
	$areaname = $surveyparameter_data[4];
	$parameterletter = $surveyparameter_data[5];
	$parametertitle = $surveyparameter_data[6];
	$sip_ = $surveyparameter_data[7];
	$implementation = $surveyparameter_data[8];
	$outcome = $surveyparameter_data[9];
	$surveyparaID = $surveyparameter_data[0];
} else {
	$program_id = "";
	$programname = "";
	$areaID = "";
	$areaname = "";
	$parameterletter = "";
	$parametertitle = "";
	$sip_ = "";
	$implementation = "";
	$outcome = "";
	$surveyparaID = "";
}
	?>

<?php
if ($areaID && $program_id && $parameterletter) {
?>
<center>
	<h1><?php echo $programname;?></h1>
	<h1><?php echo $areaname;?></h1>
	<h1>PARAMETER <?php echo $parameterletter; ?></h1>
		<embed type="application/pdf" src="admin/documents/<?php echo $outcome; ?>" width="700" height="900"></embed></center>
<?php
}?>
</body>
</html>