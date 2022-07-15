
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['surveyareaID']) && $_GET['surveyareaID']!="") {
	$surveyareaID = $_GET['surveyareaID'];
	$surveyareaID_query = "SELECT * FROM surveyarea WHERE surveyareaID= '$surveyareaID'";
	$surveyareaID_result =mysqli_query($con, $surveyareaID_query);
	$surveyareaID_data = mysqli_fetch_row($surveyareaID_result);
	$programID = $surveyareaID_data[1];
	$areaID = $surveyareaID_data[2];
	$areades = $surveyareaID_data[3];
	$areappp = $surveyareaID_data[4];
	$areass = $surveyareaID_data[5];
	$area_addfile = $surveyareaID_data[6];
	$surveyareaID = $surveyareaID_data[0];
}
else {
	$programID = "";
	$areaID = "";
	$areades = "";
	$areappp = "";
	$areass = "";
	$area_addfile = "";
	$surveyareaID = "";
}

if (isset($_POST['editsavesurveyarea'])) {
	if (!empty($_POST['programID']) && !empty($_POST['areaID']) && !empty($_POST['areades']) && !empty($_FILES['areappp']) && !empty($_FILES['areass']) && !empty($_FILES['area_addfile'])) {
		$programID = $_POST['programID'];
		$areaID = $_POST['areaID'];
		$areades = $_POST['areades'];
		$areappp = $_FILES["areappp"]['name'];
		$areass = $_FILES["areass"]['name'];
		$area_addfile = $_FILES["area_addfile"]['name'];
		if ($surveyareaID) {

			$fileExt = explode('.', $areappp);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('pdf');

			$fileExtss = explode('.', $areass);
			$fileActualExtss = strtolower(end($fileExtss));
			$allowss = array('pdf');

			$fileExtadd = explode('.', $area_addfile);
			$fileActualExtadd = strtolower(end($fileExtadd));
			$allowadd = array('pdf');

			if (isset($_FILES["areappp"]['name']) && !empty($_FILES["areappp"]['name'])) {
				if (in_array($fileActualExt, $allow)) {


						if (file_exists("documents/".$_FILES["areappp"]["name"])) {
							$store = $_FILES["areappp"]["name"];
							header("location: surveyarea.php?error= pdf is already exists");
						}
						else {

								$surveyareasql = "UPDATE surveyarea SET programID = '$programID', areaID = '$areaID', areades = '$areades', areappp = '$areappp' where surveyareaID = '$surveyareaID' ";

								$run = mysqli_query($con,$surveyareasql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["areappp"]["tmp_name"], "documents/".$_FILES["areappp"]["name"]);
									header("location: surveyarea.php?success= Prog. Performance Profile is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Program Performance Profile is not added!"; ?>
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
			elseif (isset($_FILES["areass"]['name']) && !empty($_FILES["areass"]['name'])) {
				if (in_array($fileActualExtss, $allowss)) {


						if (file_exists("documents/".$_FILES["areass"]["name"])) {
							$store = $_FILES["areass"]["name"];
							header("location: surveyarea.php?error= pdf is already exists");
						}
						else {

								$surveyareasql = "UPDATE surveyarea SET programID = '$programID', areaID = '$areaID', areades = '$areades', areass = '$areass' where surveyareaID = '$surveyareaID' ";

								$run = mysqli_query($con,$surveyareasql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["areass"]["tmp_name"], "documents/".$_FILES["areass"]["name"]);
									header("location: surveyarea.php?success= Self Survey is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Self Survey is not added!"; ?>
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
			elseif (isset($_FILES["area_addfile"]['name']) && !empty($_FILES["area_addfile"]['name'])) {
				if (in_array($fileActualExtadd, $allowadd)) {


						if (file_exists("documents/".$_FILES["area_addfile"]["name"])) {
							$store = $_FILES["area_addfile"]["name"];
							header("location: surveyarea.php?error= pdf is already exists");
						}
						else {

								$surveyareasql = "UPDATE surveyarea SET programID = '$programID', areaID = '$areaID', areades = '$areades', area_addfile = '$area_addfile' where surveyareaID = '$surveyareaID' ";

								$run = mysqli_query($con,$surveyareasql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["area_addfile"]["tmp_name"], "documents/".$_FILES["area_addfile"]["name"]);
									header("location: surveyarea.php?success= Additional Files is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "additional files is not added!"; ?>
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
				$surveyareasql = "UPDATE surveyarea SET programID = '$programID', areaID = '$areaID', areades = '$areades' where surveyareaID = '$surveyareaID' ";


				$run = mysqli_query($con,$surveyareasql) or die(mysqli_error($con));

				if ($run) {

					header("location: surveyarea.php?success= The data is updated");

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
<title>PROGRAM OBJECTIVE EDIT</title>

<style type="text/css">
.errormsgf {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 520px;
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
			<h1>Surveyarea Program</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label for="programID">Program</label>
						<?php
						$sql = mysqli_query($con, "Select * from program");
				 		?>
						<select class="form-control area_list" name="programID" style="width:300px; margin-left:150px">
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
				<label for="areaID">Area</label>
				<?php
				$sql = mysqli_query($con, "Select * from area");
				 ?>
				<select class="form-control area_list" name="areaID" style="width:300px; margin-left:181px">
					<option value="<?php echo $areaID; ?>">Select Area</option>
					<?php
					While($rows = $sql->fetch_assoc()) {
						$areaname = $rows['areaname'];
						$areaID = $rows['areaID'];
						Echo "<option value='$areaID'>$areaname</option>";
					}

					 ?>
				</select>
				<br>
				<br>
				<br>
				<label>Description</label>
				<textarea name="areades" placeholder="Description" style="margin-left: 220px;"><?php echo $areades; ?></textarea>
				<label for="office_img">PPP file:<small>(formats: pdf):</small></label>
				<input type="file" name="areappp" class="form-control" value="<?php echo $areappp; ?>" style="margin-left:220px;">
				<label for="office_img">SS file:<small>(formats: pdf):</small></label>
				<input type="file" name="areass" class="form-control" value="<?php echo $areass; ?>" style="margin-left:220px;">
				<label for="office_img">Additional File<small>(formats: pdf):</small></label>
				<input type="file" name="area_addfile" class="form-control" value="<?php echo $area_addfile; ?>" style="margin-left:220px;">
				<input type="hidden" name="surveyareaID" value="<?php echo $surveyareaID; ?>">
				<button class="edit-save" name="editsavesurveyarea">Save</button>
				<button class="edit-back"><a href="surveyarea.php">Back</button></a>
		</form>
		</div>
	</div>
</div>

</section>

<?php  if ($_SESSION['positionname'] === "Accreditation Task Force") {
					include 'navbar_accre.php';
				}
				else if ($_SESSION['positionname'] === "Administration") {
					include 'nav.php';
				}
} else {
	header("location: index.php");
} ?>