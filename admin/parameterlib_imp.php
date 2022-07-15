<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	include 'crud/pup.php';
	if (isset($_GET['paralib_ID']) && $_GET['paralib_ID']!="") {
		$paralib_ID = $_GET['paralib_ID'];
		$paralib_ID_query = "SELECT * FROM parameterlibrary where paralib_ID = '$paralib_ID'";
		$paralib_ID_result =mysqli_query($con, $paralib_ID_query);
		$paralib_ID_data = mysqli_fetch_row($paralib_ID_result);
		$libpara_let = $paralib_ID_data[1];
		$libSIP = $paralib_ID_data[2];
		$lib_imp = $paralib_ID_data[3];
		$lib_outcome = $paralib_ID_data[4];
		$paralib_ID = $paralib_ID_data[0];
	}
	else {
		$libpara_let = "";
		$libSIP = "";
		$lib_imp = "";
		$lib_outcome = "";
		$paralib_ID = "";
	}

	if ($paralib_ID) {
		?>
		<link rel="shortcut icon"  href="photos/PUP LOGO.png">
		<center>
			<h1>Parameter <?php echo $libpara_let; ?></h1>
			<embed type="application/pdf" src="documents/<?php echo $lib_imp; ?>" width="700" height="900"></embed></center>
	<?php
	}
} else {
	header("location: index.php");
}
?>