
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['labID']) && $_GET['labID']!="") {
	$labID = $_GET['labID'];
	$labID_query = "SELECT * FROM laboratory WHERE labID= '$labID'";
	$labID_result =mysqli_query($con, $labID_query);
	$labID_data = mysqli_fetch_row($labID_result);
	$labtitle = $labID_data[1];
	$lab_img = $labID_data[2];
	$labID = $labID_data[0];
}
else {
$labtitle = "";
	$lab_img = "";
	$labID = "";
}

if (isset($_POST['editsavelaboratory'])) {
	if (!empty($_POST['labtitle'])) {
		$labtitle = $_POST['labtitle'];
		$lab_img = $_FILES["lab_img"]['name'];

		if ($labID) {

			$fileExt = explode('.', $lab_img);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('jpg', 'jpeg', 'png');

			if (isset($_FILES["lab_img"]['name']) && !empty($_FILES["lab_img"]['name'])) {
				if (in_array($fileActualExt, $allow)) {

						if (file_exists("photos/".$_FILES["lab_img"]["name"])) {
							$store = $_FILES["lab_img"]["name"];
							header("location: laboratory.php?error= photo is already exists");
						}
						else {

								$labsql = "UPDATE laboratory SET labtitle = '$labtitle', lab_img = '$lab_img' where labID = '$labID' ";

								$run = mysqli_query($con,$labsql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["lab_img"]["tmp_name"], "photos/".$_FILES["lab_img"]["name"]);
									header("location: laboratory.php?success= lab is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "lab is not added!"; ?>
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
				$labsql = "UPDATE laboratory SET labtitle = '$labtitle' where labID = '$labID' ";

				$run = mysqli_query($con,$labsql) or die(mysqli_error($con));

				if ($run) {

					header("location: laboratory.php?success= lab is updated");

				}
				else{
				?>
				<p class="errormsgf">
				<?php echo "laboratory is not added!"; ?>
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
}?>

<link rel="stylesheet" type="text/css" href="css/edit1.css">
<link rel="shortcut icon"  href="photos/PUP LOGO.png">
<title>LABORATORY EDIT</title>

<style type="text/css">
.errormsgf {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 330px;
		margin-left: 300px;
	}


</style>

<section class="edit_form">
	<h1>EDIT FORM</h1>

	<div class="edit" id="edit_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="edit_modal" role="document">
		<img src="photos/PUP LOGO.png">
			<h1>Laboratory</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>Laboratory Name</label>
				<input type="text" name="labtitle" placeholder="Laboratory Name" class="input" style="margin-left:230px;" value="<?php echo $labtitle; ?>">
				<label for="image_">Image<small>(formats: jpg, jpeg, png):</small></label>
				<input type="file" name="lab_img" class="form-control" style="margin-left:230px;" value="<?php echo $lab_img; ?>">
				<input type="hidden" name="labID" value="<?php echo $labID; ?>">
				<button class="edit-save" name="editsavelaboratory">Save</button>
				<button class="edit-back"><a href="laboratory.php">Back</button></a>
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