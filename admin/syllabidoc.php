<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	include 'crud/pup.php';
	if (isset($_GET['syllabiID']) && $_GET['syllabiID']!="") {
		$syllabiID = $_GET['syllabiID'];
		$syllabiID_query = "SELECT c.syllabiID, p.program_id, p.programname, c.syllabititle_, c.syllabi_img, c.syllabidocument FROM syllabi c JOIN program p on p.program_id = c.programID where syllabiID = '$syllabiID'";
		$syllabiID_result =mysqli_query($con, $syllabiID_query);
		$syllabiID_data = mysqli_fetch_row($syllabiID_result);
		$programID = $syllabiID_data[1];
		$programname = $syllabiID_data[2];
		$syllabititle_ = $syllabiID_data[3];
		$syllabi_img = $syllabiID_data[4];
		$syllabidocument = $syllabiID_data[5];
		$syllabiID = $syllabiID_data[0];
	}
	else {
		$programID = "";
		$programname = "";
		$syllabititle_ = "";
		$syllabi_img = "";
		$syllabidocument = "";
		$syllabiID = "";
	}

	if ($syllabiID) {
		?>
		<link rel="shortcut icon"  href="photos/PUP LOGO.png">
		<center>
			<h1>Ched Memorandum Order</h1>
			<h1><?php echo $programname; ?></h1>
			<h1> <?php echo $syllabititle_; ?></h1>
			<embed type="application/pdf" src="documents/<?php echo $syllabidocument; ?>" width="700" height="900"></embed></center>
	<?php
	}
} else {
	header("location: index.php");
}
?>