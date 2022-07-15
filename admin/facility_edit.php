
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['facilityID']) && $_GET['facilityID']!="") {
	$facilityID = $_GET['facilityID'];
	$facilityID_query = "SELECT * FROM facility WHERE facilityID= '$facilityID'";
	$facilityID_result =mysqli_query($con, $facilityID_query);
	$facilityID_data = mysqli_fetch_row($facilityID_result);
	$name = $facilityID_data[1];
	$picture = $facilityID_data[2];
	$description = $facilityID_data[3];
	$facilityID = $facilityID_data[0];
}
else {
	$name = "";
	$picture = "";
	$description = "";
	$facilityID = "";
}

if (isset($_POST['editsavefacility'])) {
	if (!empty($_POST['name']) && !empty($_POST['description'])) {
		
		$name = $_POST['name'];
		$description = $_POST['description'];
		$picture = $_FILES["picture"]['name'];

		if ($facilityID) {

			$fileExt = explode('.', $picture);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('jpg', 'jpeg', 'png');

			if (isset($_FILES["picture"]['name']) && !empty($_FILES["picture"]['name'])) {
				if (in_array($fileActualExt, $allow)) {

						if (file_exists("photos/".$_FILES["picture"]["name"])) {
							$store = $_FILES["picture"]["name"];
							header("location: facility.php?error= photo is already exists");
						}
						else {

								$facilitysql = "UPDATE facility SET name = '$name', description = '$description', picture = '$picture' where facilityID = '$facilityID' ";

								$run = mysqli_query($con,$facilitysql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["picture"]["tmp_name"], "photos/".$_FILES["picture"]["name"]);
									header("location: facility.php?success= facility is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Facility is not added!"; ?>
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
				$facilitysql = "UPDATE facility SET name = '$name', description = '$description' where facilityID = '$facilityID' ";

				$run = mysqli_query($con,$facilitysql) or die(mysqli_error($con));

				if ($run) {

					header("location: facility.php?success= facility is updated");

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
<title>FACILITY EDIT</title>

<style type="text/css">
.errormsgf {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 380px;
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
			<h1>Facility</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>Facility Name</label>
				<input type="text" name="name" placeholder="Facilty Name" class="input" style="margin-left:230px;" value="<?php echo $name; ?>">
				<label>facility Description</label>
				<textarea name="description" placeholder="Facility Description" style="margin-left:230px;"><?php echo $description; ?></textarea>
				<label for="picture">Image<small>(formats: jpg, jpeg, png):</small></label>
				<input type="file" name="picture" class="form-control" style="margin-left:230px;" value="<?php echo $picture; ?>">
				<input type="hidden" name="facilityID" value="<?php echo $facilityID; ?>">
				<button class="edit-save" name="editsavefacility">Save</button>
				<button class="edit-back"><a href="facility.php">Back</button></a>
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