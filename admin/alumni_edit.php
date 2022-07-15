
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['alumniID']) && $_GET['alumniID']!="") {
	$alumniID = $_GET['alumniID'];
	$alumniID_query = "SELECT * FROM alumni WHERE alumniID= '$alumniID'";
	$alumniID_result =mysqli_query($con, $alumniID_query);
	$alumniID_data = mysqli_fetch_row($alumniID_result);
	$programID = $alumniID_data[1];
	$alumniyear = $alumniID_data[2];
	$alumniname_ = $alumniID_data[3];
	$alumniposition = $alumniID_data[4];
	$alumni_img = $alumniID_data[5];
	$alumniID = $alumniID_data[0];
}
else {
	$programID = "";
	$alumniyear = "";
	$alumniname_ = "";
	$alumniposition = "";
	$alumni_img = "";
	$alumniID = "";
}

if (isset($_POST['editsavealumni'])) {
	if (!empty($_POST['programID']) && !empty($_POST['alumniyear']) && !empty($_POST['alumniname_']) && !empty($_POST['alumniposition'])) {
		
		$programID = $_POST['programID'];
		$alumniyear = $_POST['alumniyear'];
		$alumniname_ = $_POST['alumniname_'];
		$alumniposition = $_POST['alumniposition'];
		$alumni_img = $_FILES["alumni_img"]['name'];

		if ($alumniID) {

			$fileExt = explode('.', $alumni_img);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('jpg', 'jpeg', 'png');

			if (isset($_FILES["alumni_img"]['name']) && !empty($_FILES["alumni_img"]['name'])) {
				if (in_array($fileActualExt, $allow)) {

						if (file_exists("photos/".$_FILES["alumni_img"]["name"])) {
							$store = $_FILES["alumni_img"]["name"];
							header("location: alumni.php?error= photo is already exists");
						}
						else {

								$alumnisql = "UPDATE alumni SET programID = '$programID', alumniyear = '$alumniyear', alumniname_ = '$alumniname_', alumniposition = '$alumniposition', alumni_img = '$alumni_img' where alumniID = '$alumniID' ";

								$run = mysqli_query($con,$alumnisql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["alumni_img"]["tmp_name"], "photos/".$_FILES["alumni_img"]["name"]);
									header("location: alumni.php?success= alumni is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "alumni is not added!"; ?>
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
				$alumnisql = "UPDATE alumni SET programID = '$programID', alumniyear = '$alumniyear', alumniname_ = '$alumniname_', alumniposition = '$alumniposition' where alumniID = '$alumniID' ";

				$run = mysqli_query($con,$alumnisql) or die(mysqli_error($con));

				if ($run) {

					header("location: alumni.php?success= alumni is updated");

				}
				else{
				?>
				<p class="errormsgf">
				<?php echo "alumni is not added!"; ?>
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
<title>ALUMNI EDIT</title>
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

</style>

<section class="edit_form">
	<h1>EDIT FORM</h1>

	<div class="edit" id="edit_alumni_modal" tabindex="-1" role="dialog" aria-labeelledby="alumni_modal" aria-hidden="true">
	<div class="edit_modal" role="document">
		<img src="photos/PUP LOGO.png">
			<h1>PUP ALUMNI</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>Full Name:</label>
				<input type="text" name="alumniname_" placeholder="Full Name" value="<?php echo $alumniname_; ?>" style="margin-left: 220px;">
				<label>Year:</label>
				<input type="number" name="alumniyear" placeholder="Year Graduated" value="<?php echo $alumniyear; ?>" style="margin-left: 220px;">
				<label>Position:</label>
				<input type="text" name="alumniposition" placeholder="Job Position" value="<?php echo $alumniposition; ?>" style="margin-left: 220px;">
				<label for="programID">Program:</label>
				<?php
				$sql = mysqli_query($con, "Select * from program");
				 ?>
				<select style="width:300px; margin-left:150px;" class="form-control area_list" name="programID">
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
				<label for="alumni_img">Image<small>(formats: jpg, jpeg, png):</small></label>
				<input type="file" name="alumni_img" class="form-control" value="<?php echo $alumni_img; ?>" style="margin-left: 220px;">
				<input type="hidden" name="alumniID" value="<?php echo $alumniID; ?>">
				<button class="edit-save" name="editsavealumni">Save</button>
				<button class="edit-back"><a href="alumni.php">Back</button></a>
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