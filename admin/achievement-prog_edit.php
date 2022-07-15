
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['achieveID']) && $_GET['achieveID']!="") {
	$achieveID = $_GET['achieveID'];
	$achieveID_query = "SELECT * FROM achievement WHERE achieveID= '$achieveID'";
	$achieveID_result =mysqli_query($con, $achieveID_query);
	$achieveID_data = mysqli_fetch_row($achieveID_result);
	$programID = $achieveID_data[1];
	$achieveyear = $achieveID_data[2];
	$name = $achieveID_data[3];
	$achievement = $achieveID_data[4];
	$achieveID = $achieveID_data[0];
}
else {
	$programID = "";
	$achieveyear = "";
	$name = "";
	$achievement = "";
	$achieveID = "";
}

if (isset($_POST['editsaveachivementprog'])) {
	if (!empty($_POST['programID']) && !empty($_POST['achieveyear']) && !empty($_POST['name']) && !empty($_POST['achievement'])) {
		
		$programID = $_POST['programID'];
		$achieveyear = $_POST['achieveyear'];
		$name = $_POST['name'];
		$achievement = $_POST['achievement'];
		$achieveID = $_POST['achieveID'];

		if (!empty($achieveID)) {

				$editquery = "UPDATE achievement SET programID = '$programID', achieveyear = '$achieveyear', name = '$name', achievement = '$achievement' WHERE achieveID = '$achieveID' ";

				$updateresult = mysqli_query($con, $editquery);

				if ($updateresult) {
					header("location: achievement-prog.php?success= the data is successfully added");
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
<title>PROGRAM ACHIEVEMENT EDIT</title>

<style type="text/css">
	.errormsgp {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 400px;
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
			<h1>ACHIEVEMENT PROGRAM</h1>
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
						<label>Title</label>
						<input type="text" name="name" value="<?php echo $name; ?>">
						<label>Year:</label>
						<input type="number" name="achieveyear" value="<?php echo $achieveyear; ?>">
						<label>Description:</label>
						<textarea name="achievement"><?php echo $achievement; ?></textarea>
				<input type="hidden" name="achieveID" value="<?php echo $achieveID; ?>">
				<button class="edit-save" name="editsaveachivementprog">Save</button>
				<button class="edit-back"><a href="achievement-prog.php">Back</button></a>
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