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
	$addfile = "SELECT p.program_id, a.addfilename, a.addfile_docu FROM addfile a JOIN program p ON p.program_id=a.programID WHERE program_id = '$program_id'";
		$addfile_result =mysqli_query($con, $addfile);
		$addfile_data = mysqli_fetch_row($addfile_result);
		$addfilename = $addfile_data[1];
		$addfile_docu = $addfile_data[2];
		$program_id = $addfile_data[0];
	}
	else {
		$program_id = "";
		$addfilename = "";
		$addfile_docu = "";
}

?>
<?php if ($program_id) {
	?>
<center>
		<h1><?php echo $addfilename; ?></h1>
		<embed type="application/pdf" src="admin/documents/<?php echo $addfile_docu; ?>" width="700" height="900"></embed></center>
<?php } ?>
</body>
</html>