
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['adminID']) && $_GET['adminID']!="") {
	$adminID = $_GET['adminID'];
	$adminID_query = "SELECT * FROM administration WHERE adminID= '$adminID'";
	$adminID_result =mysqli_query($con, $adminID_query);
	$adminID_data = mysqli_fetch_row($adminID_result);
	$positionID = $adminID_data[1];
	$fullname = $adminID_data[2];
	$professionalname = $adminID_data[3];
	$image_ = $adminID_data[4];
	$adminID = $adminID_data[0];
}
else {
	$positionID = "";
	$fullname = "";
	$professionalname = "";
	$image_ = "";
	$adminID = "";
}

if (isset($_POST['editsave'])) {
	if (!empty($_POST['positionID']) && !empty($_POST['fullname']) && !empty($_POST['professionalname'])) {
		
		$positionID = $_POST['positionID'];
		$fullname = $_POST['fullname'];
		$professionalname = $_POST['professionalname'];
		$image_ = $_FILES["image_"]['name'];

		if ($adminID) {

			$fileExt = explode('.', $image_);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('jpg', 'jpeg', 'png');

			if (isset($_FILES["image_"]['name']) && !empty($_FILES["image_"]['name'])) {
				if (in_array($fileActualExt, $allow)) {

						if (file_exists("photos/".$_FILES["image_"]["name"])) {
							$store = $_FILES["image_"]["name"];
							header("location: faculty.php?error= photo is already exists");
						}
						else {

								$administrationsql = "UPDATE administration SET positionID = '$positionID', fullname = '$fullname', professionalname = '$professionalname', image_ = '$image_' where adminID = '$adminID' ";

								$run = mysqli_query($con,$administrationsql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["image_"]["tmp_name"], "photos/".$_FILES["image_"]["name"]);
									header("location: faculty.php?success= administration is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "administration is not added!"; ?>
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
				$administrationsql = "UPDATE administration SET positionID = '$positionID', fullname = '$fullname', professionalname = '$professionalname' where adminID = '$adminID' ";

				$run = mysqli_query($con,$administrationsql) or die(mysqli_error($con));

				if ($run) {

					header("location: faculty.php?success= administration is updated");

				}
				else{
				?>
				<p class="errormsgf">
				<?php echo "administration is not added!"; ?>
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
<title>FACULTY EDIT</title>
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
			<h1>ADMINISTRATION</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>Full Name:</label>
				<input type="text" name="fullname" placeholder="Full Name" value="<?php echo $fullname; ?>" style="margin-left: 220px;">
				<label>Professional Name:</label>
				<input type="text" name="professionalname" placeholder="Professional Name" value="<?php echo $professionalname; ?>" style="margin-left: 220px;">
				<label for="positionID">Position:</label>
				<?php
				$sql = mysqli_query($con, "Select * from position");
				 ?>
				<select style="width:300px; margin-left:149px;" class="form-control position_list" name="positionID">
					<option value="<?php echo $positionID; ?>">Select Position</option>
					<?php
					While($rows = $sql->fetch_assoc()) {
						$positionname = $rows['positionname'];
						$positionID = $rows['positionID'];
						Echo "<option value='$positionID'>$positionname</option>";
					}

					 ?>
				</select>
				<br>
				<br>
				<label for="image_">Image<small>(formats: jpg, jpeg, png):</small></label>
				<input type="file" name="image_" class="form-control" value="<?php echo $image_; ?>" style="margin-left: 220px;">
				<input type="hidden" name="adminID" value="<?php echo $adminID; ?>">
				<button class="edit-save" name="editsave">Save</button>
				<button class="edit-back"><a href="faculty.php">Back</button></a>
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