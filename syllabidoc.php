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
if (isset($_GET['program_id']) && $_GET['program_id']!="") {
	$program_id = $_GET['program_id'];
	$syllabi_query = "SELECT s.syllabiID, p.program_id, p.programname, s.syllabititle_, s.syllabi_img, s.syllabidocument FROM syllabi s JOIN program p ON p.program_id = s.programID WHERE program_id = '$program_id'";
		$syllabi_result =mysqli_query($con, $syllabi_query);
		$syllabi_data = mysqli_fetch_row($syllabi_result);
		$program_id = $syllabi_data[1];
		$programname = $syllabi_data[2];
		$syllabititle_ = $syllabi_data[3];
		$syllabi_img = $syllabi_data[4];
		$syllabidocument = $syllabi_data[5];
		$syllabiID = $syllabi_data[0];
	}
	else {
		$program_id = "";
		$programname = "";
		$syllabititle_ = "";
		$syllabi_img = "";
		$syllabidocument = "";
		$syllabiID = "";
}

?>
<?php if ($program_id) {
	?>
<center>
	<h1><?php echo $programname;?></h1>
		<h1>OBE SYLLABI</h1>
		<embed type="application/pdf" src="admin/documents/<?php echo $syllabidocument; ?>" width="700" height="900"></embed></center>
<?php } ?>
</body>
</html>