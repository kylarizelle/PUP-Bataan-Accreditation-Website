<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	include 'crud/pup.php';
	if (isset($_GET['cmoID']) && $_GET['cmoID']!="") {
		$cmoID = $_GET['cmoID'];
		$cmoID_query = "SELECT c.cmoID, p.program_id, p.programname, c.cmotitle_, c.cmo_img, c.cmodocument FROM cmo c JOIN program p on p.program_id = c.programID where cmoID = '$cmoID'";
		$cmoID_result =mysqli_query($con, $cmoID_query);
		$cmoID_data = mysqli_fetch_row($cmoID_result);
		$programID = $cmoID_data[1];
		$programname = $cmoID_data[2];
		$cmotitle_ = $cmoID_data[3];
		$cmo_img = $cmoID_data[4];
		$cmodocument = $cmoID_data[5];
		$cmoID = $cmoID_data[0];
	}
	else {
		$programID = "";
		$programname = "";
		$cmotitle_ = "";
		$cmo_img = "";
		$cmodocument = "";
		$cmoID = "";
	}

	if ($cmoID) {
		?>
		<link rel="shortcut icon"  href="photos/PUP LOGO.png">
		<center>
			<h1>Ched Memorandum Order</h1>
			<h1><?php echo $programname; ?></h1>
			<h1> <?php echo $cmotitle_; ?></h1>
			<embed type="application/pdf" src="documents/<?php echo $cmodocument; ?>" width="700" height="900"></embed></center>
	<?php
	}
} else {
	header("location: index.php");
}
?>