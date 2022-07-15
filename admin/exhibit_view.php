<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	 include 'crud/pup.php';

	if (isset($_GET['exhibitID']) && $_GET['exhibitID']!="") {
		$exhibitID = $_GET['exhibitID'];
		$exhibitID_query = "SELECT * FROM exhibit WHERE exhibitID= '$exhibitID'";
		$exhibitID_result =mysqli_query($con, $exhibitID_query);
		$exhibitID_data = mysqli_fetch_row($exhibitID_result);
		$exhibitname = $exhibitID_data[1];
		$documents = $exhibitID_data[2];
		$exhibitID = $exhibitID_data[0];
	}
	else {
		$exhibitname = "";
		$documents = "";
		$exhibitID = "";
	}

	if ($exhibitID) {
		?>
		<link rel="shortcut icon"  href="photos/PUP LOGO.png">
		<center>
			<h1> <?php echo $exhibitname; ?></h1>
			<embed type="application/pdf" src="documents/<?php echo $documents; ?>" width="700" height="900"></embed></center>
	<?php
	}
} else {
	header("location: index.php");
}
	?>

