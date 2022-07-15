
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

include 'crud/pup.php';
 if (isset($_GET['syllabiID']) && $_GET['syllabiID']!="") {
	$syllabiID = $_GET['syllabiID'];
	$syllabiID_query = "SELECT * FROM syllabi where syllabiID = '$syllabiID'";
	$syllabiID_result =mysqli_query($con, $syllabiID_query);
	$syllabiID_data = mysqli_fetch_row($syllabiID_result);
	$programID = $syllabiID_data[1];
	$syllabititle_ = $syllabiID_data[2];
	$syllabi_img = $syllabiID_data[3];
	$syllabidocument = $syllabiID_data[4];
	$syllabiID = $syllabiID_data[0];
}
else {
	$programID = "";
	$syllabititle_ = "";
	$syllabi_img = "";
	$syllabidocument = "";
	$syllabiID = "";
}

if (isset($_POST['editsavesyllabi'])) {
	if (!empty($_POST['programID']) && !empty($_POST['syllabititle_']) && !empty($_FILES['syllabi_img']) && !empty($_FILES['syllabidocument'])) {

		$programID = $_POST['programID'];
		$syllabititle_ = $_POST['syllabititle_'];
		$syllabi_img = $_FILES["syllabi_img"]['name'];
		$syllabidocument = $_FILES["syllabidocument"]['name'];

		if ($syllabiID) {

			// ss
			$fileExtss = explode('.', $syllabi_img);
			$fileActualExtss = strtolower(end($fileExtss));
			$allowss = array('jpg', 'jpeg', 'png');
			// addfiles
			$fileExtadd = explode('.', $syllabidocument);
			$fileActualExtadd = strtolower(end($fileExtadd));
			$allowadd = array('pdf');

			if (isset($_FILES["syllabi_img"]['name']) && !empty($_FILES["syllabi_img"]['name'])) {
				if (in_array($fileActualExtss, $allowss)) {


						if (file_exists("photos/".$_FILES["syllabi_img"]["name"])) {
							$store = $_FILES["syllabi_img"]["name"];
							header("location: syllabi.php?error= image is already exists");
						}
						else {

								$syllabisql = "UPDATE syllabi SET programID = '$programID', syllabititle_ = '$syllabititle_', syllabi_img = '$syllabi_img' where syllabiID = '$syllabiID' ";

								$run = mysqli_query($con,$syllabisql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["syllabi_img"]["tmp_name"], "photos/".$_FILES["syllabi_img"]["name"]);
									header("location: syllabi.php?success= syllabi image is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Ched Memo Order is not added!"; ?>
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
			elseif (isset($_FILES["syllabidocument"]['name']) && !empty($_FILES["syllabidocument"]['name'])) {
				if (in_array($fileActualExtadd, $allowadd)) {


						if (file_exists("documents/".$_FILES["syllabidocument"]["name"])) {
							$store = $_FILES["syllabidocument"]["name"];
							header("location: syllabi.php?error= pdf is already exists");
						}
						else {

								$syllabisql = "UPDATE syllabi SET programID = '$programID', syllabititle_ = '$syllabititle_', syllabidocument = '$syllabidocument' where syllabiID = '$syllabiID' ";

								$run = mysqli_query($con,$syllabisql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["syllabidocument"]["tmp_name"], "documents/".$_FILES["syllabidocument"]["name"]);
									header("location: syllabi.php?success= syllabi document is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Ched Memo Order is not added!"; ?>
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
				$syllabisql = "UPDATE syllabi SET programID = '$programID', syllabititle_ = '$syllabititle_' where syllabiID = '$syllabiID' ";


				$run = mysqli_query($con,$syllabisql) or die(mysqli_error($con));

				if ($run) {

					header("location: syllabi.php?success= The data is updated");

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
<title>PROGRAM SYLLABI EIDT</title>

<style type="text/css">
.errormsgf {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 410px;
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
			<h1>Syllaby</h1>
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
				<label>syllabi Title:</label>
				<input type="text" name="syllabititle_" placeholder="syllabi Title" value="<?php echo $syllabititle_; ?>" style="margin-left:275px;">
				<label for="office_img">syllabi Image<small>(formats: jpg, png, jpeg):</small></label>
				<input type="file" name="syllabi_img" class="form-control" value="<?php echo $syllabi_img; ?>" style="margin-left:275px;">
				<label for="office_img">syllabi Document<small>(formats: pdf):</small></label>
				<input type="file" name="syllabidocument" class="form-control" value="<?php echo $syllabidocument; ?>" style="margin-left:275px;">

				<input type="hidden" name="syllabiID" value="<?php echo $syllabiID; ?>">
				<button class="edit-save" name="editsavesyllabi">Save</button>
				<button class="edit-back"><a href="syllabi.php">Back</button></a>
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