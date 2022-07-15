<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	include 'crud/pup.php';
	if (isset($_GET['sslibraryID']) && $_GET['sslibraryID']!="") {
		$sslibraryID = $_GET['sslibraryID'];
		$sslibraryID_query = "SELECT * FROM sslibrary where sslibraryID = '$sslibraryID'";
		$sslibraryID_result =mysqli_query($con, $sslibraryID_query);
		$sslibraryID_data = mysqli_fetch_row($sslibraryID_result);
		$ss = $sslibraryID_data[1];
		$ppp = $sslibraryID_data[2];
		$sslibraryID = $sslibraryID_data[0];
	}
	else {
		$ss = "";
		$ppp = "";
		$sslibraryID = "";
	}

	if ($sslibraryID) {
		?>
		<link rel="shortcut icon"  href="photos/PUP LOGO.png">
		<center>
			<h1><?php echo $ss; ?></h1>
			<embed type="application/pdf" src="documents/<?php echo $ss; ?>" width="700" height="900"></embed></center>
	<?php
	}
} else {
	header("location: index.php");
}
?>