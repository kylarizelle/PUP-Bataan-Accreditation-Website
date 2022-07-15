
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['surveyID']) && $_GET['surveyID']!="") {
	$surveyID = $_GET['surveyID'];
	$surveyID_query = "SELECT * FROM surveyprogram WHERE surveyID= '$surveyID'";
	$surveyID_result =mysqli_query($con, $surveyID_query);
	$surveyID_data = mysqli_fetch_row($surveyID_result);
	$programID = $surveyID_data[1];
	$objective = $surveyID_data[2];
	$surveyID = $surveyID_data[0];
}
else {
	$programID = "";
	$objective = "";
	$surveyID = "";
}

if (isset($_POST['editsavesurveyprogram'])) {
	if (!empty($_POST['programID']) && !empty($_POST['objective'])) {
		
		$programID = $_POST['programID'];
		$objective = $_POST['objective'];
		$surveyID = $_POST['surveyID'];

		if (!empty($surveyID)) {

				$editquery = "UPDATE surveyprogram SET programID = '$programID', objective = '$objective' WHERE surveyID = '$surveyID' ";

				$updateresult = mysqli_query($con, $editquery);

				if ($updateresult) {
					header("location: survey-prog-obj.php?success= the data is successfully added");
				}
				else {
					?>
					<p class="errormsgp">
					<?php echo "Something went wrong! try again"; ?>
					</p>
			<?php	}
		}
		else {
			?>
			<p class="errormsgp">
			<?php echo "Cannot execute query, try again!"; ?>
			</p>
	<?php	}
	}
	else {
		?>
		<p class="errormsgp">
		<?php echo "all fields are required"; ?>
		</p>
<?php	}
}
?>

<link rel="stylesheet" type="text/css" href="css/edit1.css">
<link rel="shortcut icon"  href="photos/PUP LOGO.png">
<title>PROGRAM OBJECTIVE EDIT</title>

<style type="text/css">
	.errormsgp {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 335px;
		margin-left: 300px;
	}
	textarea {
	display: flex;
	margin-bottom: 20px;
	padding: 5px;
	border: 2px solid maroon;
	outline: none;
	width: 300px;
	margin-left: 120px;
	margin-top: -40px;
	border-top: none;
	border-left: none;
	border-right: none;
	}
</style>

<section class="edit_form">
	<h1>EDIT FORM</h1>

	<div class="edit" id="edit_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="edit_modal" role="document">
		<img src="photos/PUP LOGO.png">
			<h1>Program Objective</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label for="programID">Program:</label>
						<?php
						$sql = mysqli_query($con, "Select * from program");
				 		?>
						<select class="form-control area_list" name="programID" style="width:300px; margin-left:40px;">
							<option value="<?php echo $programID; ?>">Select Program</option>
							<?php
							While($rows = $sql->fetch_assoc()) {
								$programname = $rows['programname'];
								$program_id = $rows['program_id'];
						Echo "<option value='$program_id'>$programname</option>";
							}

					 		?>
						</select>
						<br>
						<br>
						<br>
						<label>Objectives:</label>
						<textarea name="objective"><?php echo $objective; ?></textarea>
				<input type="hidden" name="surveyID" value="<?php echo $surveyID; ?>">
				<button class="edit-save" name="editsavesurveyprogram">Save</button>
				<button class="edit-back"><a href="survey-prog-obj.php">Back</button></a>
		</form>
		</div>
	</div>
</div>

</section>

<?php  if ($_SESSION['positionname'] === "Faculty") {
					include 'navbar_faculty.php';
				}
				else if ($_SESSION['positionname'] === "Administration") {
					include 'nav.php';
				}
} else {
	header("location: index.php");
} ?>