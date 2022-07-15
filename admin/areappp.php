<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	include 'crud/pup.php';
	if (isset($_GET['surveyareaID']) && $_GET['surveyareaID']!="") {
		$surveyareaID = $_GET['surveyareaID'];
		$surveyareaID_query = "SELECT * FROM surveyarea where surveyareaID = '$surveyareaID'";
		$surveyareaID_result =mysqli_query($con, $surveyareaID_query);
		$surveyareaID_data = mysqli_fetch_row($surveyareaID_result);
		$programID = $surveyareaID_data[1];
		$areaID = $surveyareaID_data[2];
		$areades = $surveyareaID_data[3];
		$areappp = $surveyareaID_data[4];
		$areass = $surveyareaID_data[5];
		$area_addfile = $surveyareaID_data[6];
		$surveyareaID = $surveyareaID_data[0];
	}
	else {
		$programID = "";
		$areaID = "";
		$areades ="";
		$areappp = "";
		$areass = "";
		$area_addfile = "";
		$surveyareaID = "";
	}

		if ($surveyareaID) {
			?>
			<link rel="shortcut icon"  href="photos/PUP LOGO.png">
			<center>
				<h1>Program Performance Profile</h1>
				<embed type="application/pdf" src="documents/<?php echo $areappp; ?>" width="700" height="900"></embed></center>
		<?php
	}
} else {
	header("location: index.php");
}
?>
