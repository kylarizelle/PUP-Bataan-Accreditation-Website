<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	include 'crud/pup.php';
	if (isset($_GET['addfileID']) && $_GET['addfileID']!="") {
		$addfileID = $_GET['addfileID'];
		$addfileID_query = "SELECT a.addfileID, p.program_id, p.programname, a.addfilename, a.addfile_docu FROM addfile a JOIN program p ON p.program_id = a.programID WHERE addfileID = '$addfileID'";
		$addfileID_result =mysqli_query($con, $addfileID_query);
		$addfileID_data = mysqli_fetch_row($addfileID_result);
		$programID = $addfileID_data[1];
		$programname = $addfileID_data[2];
		$addfilename = $addfileID_data[3];
		$addfile_docu = $addfileID_data[4];
		$addfileID = $addfileID_data[0];
	}
	else {
		$programID = "";
		$programname = "";
		$addfilename = "";
		$addfile_docu = "";
		$addfileID = "";
	}

	if ($addfileID) {
		?>
		<link rel="shortcut icon"  href="photos/PUP LOGO.png">
		<center>
			<h1><?php echo $addfilename; ?></h1>
			<embed type="application/pdf" src="documents/<?php echo $addfile_docu; ?>" width="700" height="900"></embed></center>
	<?php
	}
} else {
	header("location: index.php");
}
?>