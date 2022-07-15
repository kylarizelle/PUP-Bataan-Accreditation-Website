
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['addfileID']) && $_GET['addfileID']!="") {
	$addfileID = $_GET['addfileID'];
	$addfileID_query = "SELECT * FROM addfile WHERE addfileID= '$addfileID'";
	$addfileID_result =mysqli_query($con, $addfileID_query);
	$addfileID_data = mysqli_fetch_row($addfileID_result);
	$programID = $addfileID_data[1];
	$addfilename = $addfileID_data[2];
	$addfile_docu = $addfileID_data[3];
	$addfileID = $addfileID_data[0];
}
else {
	$programID = "";
	$addfilename = "";
	$addfile_docu = "";
	$addfileID = "";
}

if (isset($_POST['editsaveaddfile'])) {
	if (!empty($_POST['programID']) && !empty($_POST['addfilename']) && !empty($_FILES['addfile_docu'])) {
		$addfilename = $_POST['addfilename'];
		$programID = $_POST['programID'];
		$addfile_docu = $_FILES["addfile_docu"]['name'];

		if ($addfileID) {

			$fileExt = explode('.', $addfile_docu);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('pdf');

			if (isset($_FILES["addfile_docu"]['name']) && !empty($_FILES["addfile_docu"]['name'])) {
				if (in_array($fileActualExt, $allow)) {

						if (file_exists("documents/".$_FILES["addfile_docu"]["name"])) {
							$store = $_FILES["addfile_docu"]["name"];
							header("location: addfile.php?error= pdf is already exists");
						}
						else {

								$addfilesql = "UPDATE addfile SET addfilename = '$addfilename', programID = '$programID', addfile_docu = '$addfile_docu' where addfileID = '$addfileID' ";

								$run = mysqli_query($con,$addfilesql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["addfile_docu"]["tmp_name"], "documents/".$_FILES["addfile_docu"]["name"]);
									header("location: addfile.php?success= Self Survey is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Self Survey addfile is not added!"; ?>
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
				$addfilesql = "UPDATE addfile SET addfilename = '$addfilename', programID = '$programID' where addfileID = '$addfileID' ";

				$run = mysqli_query($con,$addfilesql) or die(mysqli_error($con));

				if ($run) {

					header("location: addfile.php?success= Self Survey is updated");

				}
				else{
				?>
				<p class="errormsgf">
				<?php echo " addfile is not added!"; ?>
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
<title>ADDFILE EDIT</title>

<style type="text/css">
.errormsgf {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 400px;
		margin-left: 300px;
	}


</style>

<section class="edit_form">
	<h1>EDIT FORM</h1>

	<div class="edit" id="edit_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="edit_modal" role="document">
		<img src="photos/PUP LOGO.png">
			<h1>Program Add File</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>Title:</label>
				<input type="text" name="addfilename" placeholder="Laboratory Name" class="input" style="margin-left:230px;" value="<?php echo $addfilename; ?>">
				<label for="categoryID">Program</label>
						<?php
						$sql = mysqli_query($con, "Select * from program");
				 		?>
						<select class="form-control area_list" name="programID" style="width: 300px; margin-left: 150px;">
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
				<label for="file">Self-Survey<small>(formats: pdf):</small></label>
				<input type="file" name="addfile_docu" class="form-control" style="margin-left:230px;" value="<?php echo $addfile_docu; ?>">
				<input type="hidden" name="addfileID" value="<?php echo $addfileID; ?>">
				<button class="edit-save" name="editsaveaddfile">Save</button>
				<button class="edit-back"><a href="addfile.php">Back</button></a>
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