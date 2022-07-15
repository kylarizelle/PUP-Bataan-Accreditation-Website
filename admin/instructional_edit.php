
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

 if (isset($_GET['materialID']) && $_GET['materialID']!="") {
	$materialID = $_GET['materialID'];
	$materialID_query = "SELECT * from instructional where materialID = '$materialID'";
	$materialID_result =mysqli_query($con, $materialID_query);
	$materialID_data = mysqli_fetch_row($materialID_result);
	$programID = $materialID_data[1];
	$yearlevel = $materialID_data[2];
	$semester = $materialID_data[3];
	$materialtitle_ = $materialID_data[4];
	$materialdocument = $materialID_data[5];
	$materialID = $materialID_data[0];
}
else {
	$programID = "";
	$yearlevel = "";
	$semester = "";
	$materialtitle_ = "";
	$materialdocument = "";
	$materialID = "";
}

if (isset($_POST['editsaveinstructional'])) {
	if (!empty($_POST['programID']) && !empty($_POST['yearlevel']) && !empty($_POST['semester']) && !empty($_POST['materialtitle_']) && !empty($_FILES['materialdocument'])) {

		$programID = $_POST['programID'];
		$yearlevel = $_POST['yearlevel'];
		$semester = $_POST['semester'];
		$materialtitle_ = $_POST['materialtitle_'];
		$materialdocument = $_FILES["materialdocument"]['name'];

		if ($materialID) {


			// addfiles
			$fileExtadd = explode('.', $materialdocument);
			$fileActualExtadd = strtolower(end($fileExtadd));
			$allowadd = array('pdf');

			if (isset($_FILES["materialdocument"]['name']) && !empty($_FILES["materialdocument"]['name'])) {
				if (in_array($fileActualExtadd, $allowadd)) {


						if (file_exists("documents/".$_FILES["materialdocument"]["name"])) {
							$store = $_FILES["materialdocument"]["name"];
							header("location: instructional.php?error= pdf is already exists");
						}
						else {

								$instructionalsql = "UPDATE instructional SET programID = '$programID', yearlevel = '$yearlevel', semester = '$semester', materialtitle_ = '$materialtitle_', materialdocument = '$materialdocument' where materialID = '$materialID' ";

								$run = mysqli_query($con,$instructionalsql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["materialdocument"]["tmp_name"], "documents/".$_FILES["materialdocument"]["name"]);
									header("location: instructional.php?success= the document is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Instructional Material is not added!"; ?>
									</p>
									<?php 
								}
						}
					
				}
				else {
					?>
					<p class="errormsgf">
					<?php	Echo "invalid file type"; ?>
					</p>
					<?php
				}
			}
			else {
				$instructionalsql = "UPDATE instructional SET programID = '$programID', yearlevel = '$yearlevel', semester = '$semester', materialtitle_ = '$materialtitle_' where materialID = '$materialID' ";


				$run = mysqli_query($con,$instructionalsql) or die(mysqli_error($con));

				if ($run) {

					header("location: instructional.php?success= The data is updated");

				}
				else{
				?>
				<p class="errormsgf">
				<?php echo "the data is not added!"; ?>
				</p>
				<?php }
			}
		}
		else {
			?>
			<p class="errormsgf">
			<?php	Echo "cannot execute a query"; ?>
			</p>
			<?php
		}
	}
	else {
	?>
		<p class="errormsgf">
	<?php	Echo "all fields required"; ?>
	</p>
	<?php
	}
}
?>

<link rel="stylesheet" type="text/css" href="css/edit1.css">
<link rel="shortcut icon"  href="photos/PUP LOGO.png">
<title>INSTRUCTIONAL MATERIAL EDIT</title>

<style type="text/css">
.errormsgf {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 500px;
		margin-left: 300px;
	}

</style>

<section class="edit_form">
	<h1>EDIT FORM</h1>

	<div class="edit" id="edit_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="edit_modal" role="document">
		<img src="photos/PUP LOGO.png">
			<h1>INSTRUCTIONAL MATERIAL</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label for="programID">Program:</label>
						<?php
						$sql = mysqli_query($con, "Select * from program");
				 		?>
						<select class="form-control area_list" name="programID" style="width:300px; margin-left:200px;">
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
					<label>Year Level:</label>
					<select class="form-control" name="yearlevel" style="width:300px; margin-left:183px;">
						<option value="<?php echo $yearlevel; ?>">Select Year</option>
						<option value="1st">1st Year</option>
						<option value="2nd">2nd Year</option>
						<option value="3rd">3rd Year</option>
						<option value="4th">4th Year</option>
						<option value="5th">5th Year</option>
					</select>
					<br>
					<br>
					<label>Semester:</label>
					<select class="form-control" name="semester" style="width:300px; margin-left: 190px;">
					<option value="<?php echo $semester; ?>">Select Semester</option>
					<option value="1st">1st Sem</option>
					<option value="2nd">2nd Sem</option>
					<option value="Summer">Summer</option>
					</select>
					<br>
					<br>
				<label>Title:</label>
				<input type="text" name="materialtitle_" placeholder="Title" value="<?php echo $materialtitle_; ?>" style="margin-left: 270px;">
				<label for="office_img">Material Document<small>(formats: pdf):</small></label>
				<input type="file" name="materialdocument" class="form-control" value="<?php echo $materialdocument; ?>" style="margin-left: 270px;">
				<input type="hidden" name="materialID" value="<?php echo $materialID; ?>">
				<button class="edit-save" name="editsaveinstructional">Save</button>
				<button class="edit-back"><a href="instructional.php">Back</button></a>
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