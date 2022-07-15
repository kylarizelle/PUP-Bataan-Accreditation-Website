
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['program_id']) && $_GET['program_id']!="") {
	$program_id = $_GET['program_id'];
	$program_id_query = "SELECT * FROM program WHERE program_id= '$program_id'";
	$program_id_result =mysqli_query($con, $program_id_query);
	$program_id_data = mysqli_fetch_row($program_id_result);
	$programname = $program_id_data[1];
	$prog_ac = $program_id_data[2];
	$description = $program_id_data[3];
	$prog_img = $program_id_data[4];
	$definition = $program_id_data[5];
	$program_id = $program_id_data[0];
}
else {
	$programname = "";
	$prog_ac = "";
	$description = "";
	$prog_img = "";
	$definition = "";
	$program_id = "";
}

if (isset($_POST['editsaveprogram'])) {
	if (!empty($_POST['programname']) && !empty($_POST['prog_ac']) && !empty($_POST['description']) && !empty($_POST['definition'])) {
		
		$programname = $_POST['programname'];
		$prog_ac = $_POST['prog_ac'];
		$description = $_POST['description'];
		$definition = $_POST['definition'];
		$prog_img = $_FILES["prog_img"]['name'];

		if ($program_id) {

			$fileExt = explode('.', $prog_img);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('jpg', 'jpeg', 'png');

			if (isset($_FILES["prog_img"]['name']) && !empty($_FILES["prog_img"]['name'])) {
				if (in_array($fileActualExt, $allow)) {

						if (file_exists("photos/".$_FILES["prog_img"]["name"])) {
							$store = $_FILES["prog_img"]["name"];
							header("location: program.php?error= photo is already exists");
						}
						else {

								$programsql = "UPDATE program SET programname = '$programname', prog_ac = '$prog_ac', description = '$description', prog_img = '$prog_img', definition = '$definition' where program_id = '$program_id' ";

								$run = mysqli_query($con,$programsql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["prog_img"]["tmp_name"], "photos/".$_FILES["prog_img"]["name"]);
									header("location: program.php?success= program is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Program is not added!"; ?>
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
				$programsql = "UPDATE program SET programname = '$programname', prog_ac = '$prog_ac', description = '$description', definition = '$definition' where program_id = '$program_id' ";

				$run = mysqli_query($con,$programsql) or die(mysqli_error($con));

				if ($run) {

					header("location: program.php?success= program is updated");

				}
				else{
				?>
				<p class="errormsgf">
				<?php echo "facility is not added!"; ?>
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
<title>PROGRAM EDIT</title>

<style type="text/css">
	.errormsgf {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 470px;
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
	margin-top: -25px;
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
			<h1>Program</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>Program Name:</label>
				<input type="text" name="programname" placeholder="Program" value="<?php echo $programname; ?>" style="margin-left: 220px;">
				<label>Accronym</label>
				<input type="text" name="prog_ac" placeholder="Program Accronym" value="<?php echo $prog_ac; ?>" style="margin-left: 220px;">
				<label>Description:</label>
				<textarea name="description" placeholder="Description"  style="margin-left: 220px;" ><?php echo $description; ?></textarea>
				<label>Definition:</label>
				<textarea name="definition" placeholder="Definition"  style="margin-left: 220px;" ><?php echo $definition; ?></textarea>
				<label for="office_img">Image<small>(formats: jpg, jpeg, png):</small></label>
				<input type="file" name="prog_img" class="form-control" value="<?php echo $prog_img; ?>" style="margin-left: 220px;" >
				<input type="hidden" name="program_id" value="<?php echo $program_id; ?>">
				<button class="edit-save" name="editsaveprogram">Save</button>
				<button class="edit-back"><a href="program.php">Back</button></a>
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