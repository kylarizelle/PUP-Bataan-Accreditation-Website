
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['officeID']) && $_GET['officeID']!="") {
	$officeID = $_GET['officeID'];
	$officeID_query = "SELECT * FROM office WHERE officeID= '$officeID'";
	$officeID_result =mysqli_query($con, $officeID_query);
	$officeID_data = mysqli_fetch_row($officeID_result);
	$officetitle = $officeID_data[1];
	$office_img = $officeID_data[2];
	$officeID = $officeID_data[0];
}
else {
	$officetitle = "";
	$office_img = "";
	$officeID = "";
}

if (isset($_POST['editsaveoffice'])) {
	if (!empty($_POST['officetitle'])) {
		$officetitle = $_POST['officetitle'];
		$office_img = $_FILES["office_img"]['name'];

		if ($officeID) {

			$fileExt = explode('.', $office_img);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('jpg', 'jpeg', 'png');

			if (isset($_FILES["office_img"]['name']) && !empty($_FILES["office_img"]['name'])) {
				if (in_array($fileActualExt, $allow)) {

						if (file_exists("photos/".$_FILES["office_img"]["name"])) {
							$store = $_FILES["office_img"]["name"];
							header("location: office.php?error= photo is already exists");
						}
						else {

								$officesql = "UPDATE office SET officetitle = '$officetitle', office_img = '$office_img' where officeID = '$officeID' ";

								$run = mysqli_query($con,$officesql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["office_img"]["tmp_name"], "photos/".$_FILES["office_img"]["name"]);
									header("location: office.php?success= office is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "office is not added!"; ?>
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
				$officesql = "UPDATE office SET officetitle = '$officetitle' where officeID = '$officeID' ";

				$run = mysqli_query($con,$officesql) or die(mysqli_error($con));

				if ($run) {

					header("location: office.php?success= office is updated");

				}
				else{
				?>
				<p class="errormsgf">
				<?php echo "office is not added!"; ?>
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
<title>OFFICE EDIT</title>

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
			<h1>Office</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>Office Name</label>
				<input type="text" name="officetitle" placeholder="Laboratory Name" class="input" style="margin-left:230px;" value="<?php echo $officetitle; ?>">
				<label for="image_">Image<small>(formats: jpg, jpeg, png):</small></label>
				<input type="file" name="office_img" class="form-control" style="margin-left:230px;" value="<?php echo $office_img; ?>">
				<input type="hidden" name="officeID" value="<?php echo $officeID; ?>">
				<button class="edit-save" name="editsaveoffice">Save</button>
				<button class="edit-back"><a href="office.php">Back</button></a>
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