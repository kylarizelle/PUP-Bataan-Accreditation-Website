<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	include 'crud/pup.php';
	if (isset($_GET['surveyparaID']) && $_GET['surveyparaID']!="") {
		$surveyparaID = $_GET['surveyparaID'];
		$surveyparaID_query = "SELECT * FROM surveyparameter where surveyparaID = '$surveyparaID'";
		$surveyparaID_result =mysqli_query($con, $surveyparaID_query);
		$surveyparaID_data = mysqli_fetch_row($surveyparaID_result);
		$programID = $surveyparaID_data[1];
		$areaID = $surveyparaID_data[2];
		$parameterletter = $surveyparaID_data[3];
		$parametertitle = $surveyparaID_data[4];
		$sip_ = $surveyparaID_data[5];
		$implementation = $surveyparaID_data[6];
		$outcome = $surveyparaID_data[7];
		$surveyparaID = $surveyparaID_data[0];
	}
	else {
		$programID = "";
		$areaID = "";
		$parameterletter = "";
		$parametertitle = "";
		$sip_ = "";
		$implementation = "";
		$outcome = "";
		$surveyparaID = "";
	}

	if ($surveyparaID) {
		?>
		<link rel="shortcut icon"  href="photos/PUP LOGO.png">
		<center>
			<h1>Parameter <?php echo $parameterletter; ?></h1>
			<h1> <?php echo $parametertitle; ?></h1>
			<embed type="application/pdf" src="documents/<?php echo $outcome; ?>" width="700" height="900"></embed></center>
	<?php
	}
} else {
	header("location: index.php");
}
?>