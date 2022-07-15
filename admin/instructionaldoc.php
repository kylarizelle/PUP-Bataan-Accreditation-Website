<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	include 'crud/pup.php';
	if (isset($_GET['materialID']) && $_GET['materialID']!="") {
		$materialID = $_GET['materialID'];
		$materialID_query = "SELECT m.materialID, p.program_id, p.programname, m.yearlevel, m.semester, m.materialtitle_, m.materialdocument from instructional m JOIN program p on p.program_id = m.programID where materialID = '$materialID'";
		$materialID_result =mysqli_query($con, $materialID_query);
		$materialID_data = mysqli_fetch_row($materialID_result);
		$programID = $materialID_data[1];
		$programname = $materialID_data[2];
		$yearlevel = $materialID_data[3];
		$semester = $materialID_data[4];
		$materialtitle_ = $materialID_data[5];
		$materialdocument = $materialID_data[6];
		$materialID = $materialID_data[0];
	}
	else {
		$programID = "";
		$programname = "";
		$yearlevel = "";
		$semester = "";
		$materialtitle_ = "";
		$materialdocument = "";
		$materialID = "";
	}

	if ($materialID) {
		?>
		<link rel="shortcut icon"  href="photos/PUP LOGO.png">
		<center>
			<h1>Instructional Material</h1>
			<h3><?php echo $programname; ?></h3>
			<h3><?php echo $yearlevel; ?> Year &nbsp; <?php echo $semester; ?> Semester</h3>
			<h2><?php echo $materialtitle_; ?></h2>
			<embed type="application/pdf" src="documents/<?php echo $materialdocument; ?>" width="700" height="900"></embed></center>
	<?php
	}
} else {
	header("location: index.php");
}
?>