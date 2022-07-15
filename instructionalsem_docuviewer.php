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
if (isset($_GET['program_id']) && isset($_GET['yearlevel']) && isset($_GET['semester']) && isset($_GET['materialID']) &&  $_GET['program_id']!="" && $_GET['yearlevel']!="" && $_GET['semester']!="" && $_GET['materialID']!="") {
	$program_id = $_GET['program_id'];
	$yearlevel = $_GET['yearlevel'];
	$semester = $_GET['semester'];
	$materialID = $_GET['materialID'];
	$program_query = "SELECT m.materialID, p.program_id, p.programname, m.yearlevel, m.semester, m.materialtitle_, m.materialdocument from instructional m JOIN program p on p.program_id = m.programID where program_id = '$program_id' AND yearlevel = '$yearlevel' AND semester = '$semester' AND materialID = '$materialID'";
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
<?php if (isset($_GET['program_id']) && isset($_GET['yearlevel']) && isset($_GET['semester']) && isset($_GET['materialID']) &&  $_GET['program_id']!="" && $_GET['yearlevel']!="" && $_GET['semester']!="" && $_GET['materialID']!="") {
	?>
<center>
	<h1><?php echo $programname;?></h1>
	<h1>Year: <?php echo $yearlevel;?> Sem: <?php echo $semester; ?></h1>
		<h1>Title: <?php echo $materialtitle_; ?></h1>
		<embed type="application/pdf" src="admin/documents/<?php echo $materialdocument; ?>" width="700" height="900"></embed></center>
<?php } ?>
</body>
</html>