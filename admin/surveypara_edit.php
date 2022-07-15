
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['surveyparaID']) && $_GET['surveyparaID']!="") {
	$surveyparaID = $_GET['surveyparaID'];
	$surveyparaID_query = "SELECT * FROM surveyparameter WHERE surveyparaID= '$surveyparaID'";
	$surveyparaID_result =mysqli_query($con, $surveyparaID_query);
	$surveyparaID_data = mysqli_fetch_row($surveyparaID_result);
	$programID = $surveyparaID_data[1];
	$areaID = $surveyparaID_data[2];
	$parameterletter = $surveyparaID_data[3];
	$parametertitle = $surveyparaID_data[4];
	$sip_ = $surveyparaID_data[5];
	$implementation = $surveyparaID_data[6];
	$outcome = $surveyparaID_data[7];
	$surveyparaID = $surveyparaID_data[0];
}
else {
	$programID = "";
	$areaID = "";
	$parameterletter = "";
	$parametertitle = "";
	$sip_ = "";
	$implementation = "";
	$outcome = "";
	$surveyparaID = "";
}

if (isset($_POST['editsavesurveyparameter'])) {
	if (!empty($_POST['programID']) && !empty($_POST['areaID']) && !empty($_POST['parameterletter']) && !empty($_POST['parametertitle']) && !empty($_FILES['sip_']) && !empty($_FILES['implementation']) && !empty($_FILES['outcome'])) {
		$programID = $_POST['programID'];
		$areaID = $_POST['areaID'];
		$parameterletter = $_POST['parameterletter'];
		$parametertitle = $_POST['parametertitle'];
		$sip_ = $_FILES["sip_"]['name'];
		$implementation = $_FILES["implementation"]['name'];
		$outcome = $_FILES["outcome"]['name'];
		if ($surveyparaID) {

			$fileExt = explode('.', $sip_);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('pdf');

			$fileExtss = explode('.', $implementation);
			$fileActualExtss = strtolower(end($fileExtss));
			$allowss = array('pdf');

			$fileExtadd = explode('.', $outcome);
			$fileActualExtadd = strtolower(end($fileExtadd));
			$allowadd = array('pdf');

			if (isset($_FILES["sip_"]['name']) && !empty($_FILES["sip_"]['name'])) {
				if (in_array($fileActualExt, $allow)) {


						if (file_exists("documents/".$_FILES["sip_"]["name"])) {
							$store = $_FILES["sip_"]["name"];
							header("location: surveyparameter.php?error= pdf is already exists");
						}
						else {

								$surveyparametersql = "UPDATE surveyparameter SET programID = '$programID', areaID = '$areaID', parameterletter = '$parameterletter', parametertitle = '$parametertitle', sip_ = '$sip_' where surveyparaID = '$surveyparaID' ";

								$run = mysqli_query($con,$surveyparametersql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["sip_"]["tmp_name"], "documents/".$_FILES["sip_"]["name"]);
									header("location: surveyparameter.php?success= System, Input, Process is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "System, Input, Process is not added!"; ?>
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
			elseif (isset($_FILES["implementation"]['name']) && !empty($_FILES["implementation"]['name'])) {
				if (in_array($fileActualExtss, $allowss)) {


						if (file_exists("documents/".$_FILES["implementation"]["name"])) {
							$store = $_FILES["implementation"]["name"];
							header("location: surveyparameter.php?error= pdf is already exists");
						}
						else {

								$surveyparametersql = "UPDATE surveyparameter SET programID = '$programID', areaID = '$areaID', parameterletter = '$parameterletter', parametertitle = '$parametertitle', implementation = '$implementation' where surveyparaID = '$surveyparaID' ";

								$run = mysqli_query($con,$surveyparametersql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["implementation"]["tmp_name"], "documents/".$_FILES["implementation"]["name"]);
									header("location: surveyparameter.php?success= Implementation is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Implementation is not added!"; ?>
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
			elseif (isset($_FILES["outcome"]['name']) && !empty($_FILES["outcome"]['name'])) {
				if (in_array($fileActualExtadd, $allowadd)) {


						if (file_exists("documents/".$_FILES["outcome"]["name"])) {
							$store = $_FILES["outcome"]["name"];
							header("location: surveyparameter.php?error= pdf is already exists");
						}
						else {

								$surveyparametersql = "UPDATE surveyparameter SET programID = '$programID', areaID = '$areaID', parameterletter = '$parameterletter', parametertitle = '$parametertitle', outcome = '$outcome' where surveyparaID = '$surveyparaID' ";

								$run = mysqli_query($con,$surveyparametersql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["outcome"]["tmp_name"], "documents/".$_FILES["outcome"]["name"]);
									header("location: surveyparameter.php?success= Outcome is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Outcome is not added!"; ?>
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
				$surveyparametersql = "UPDATE surveyparameter SET programID = '$programID', areaID = '$areaID', parameterletter = '$parameterletter', parametertitle = '$parametertitle' where surveyparaID = '$surveyparaID' ";


				$run = mysqli_query($con,$surveyparametersql) or die(mysqli_error($con));

				if ($run) {

					header("location: surveyparameter.php?success= The data is updated");

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
<title>SURVEY-PARAMETER EDIT</title>

<style type="text/css">
.errormsgf {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 575px;
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
			<h1>Surveyparameter Program</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label for="programID">Program</label>
						<?php
						$sql = mysqli_query($con, "Select * from program");
				 		?>
						<select class="form-control area_list" name="programID" style="width:300px; margin-left:235px">
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
				<select class="form-control area_list" name="areaID" style="width:300px; margin-left:265px">
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
				<label>Parameter Letter</label>
				<input type="text" name="parameterletter" placeholder="Parameter Letter" value="<?php echo $parameterletter; ?>" style="margin-left:305px;">
				<label>Parameter Title</label>
				<input type="text" name="parametertitle" placeholder="Title" value="<?php echo $parametertitle; ?>" style="margin-left:305px;">
				<label for="office_img">System, Input, Output file:<small>(formats: pdf):</small></label>
				<input type="file" name="sip_" class="form-control" value="<?php echo $sip_; ?>" style="margin-left:305px;">
				<label for="office_img">Implementation file:<small>(formats: pdf):</small></label>
				<input type="file" name="implementation" class="form-control" value="<?php echo $implementation; ?>" style="margin-left:305px;">
				<label for="office_img">Outcome<small>(formats: pdf):</small></label>
				<input type="file" name="outcome" class="form-control" value="<?php echo $outcome; ?>" style="margin-left:305px;">
				<input type="hidden" name="surveyparaID" value="<?php echo $surveyparaID; ?>">
				<button class="edit-save" name="editsavesurveyparameter">Save</button>
				<button class="edit-back"><a href="surveyparameter.php">Back</button></a>
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