
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['exhibitID']) && $_GET['exhibitID']!="") {
	$exhibitID = $_GET['exhibitID'];
	$exhibitID_query = "SELECT * FROM exhibit WHERE exhibitID= '$exhibitID'";
	$exhibitID_result =mysqli_query($con, $exhibitID_query);
	$exhibitID_data = mysqli_fetch_row($exhibitID_result);
	$exhibitname = $exhibitID_data[1];
	$documents = $exhibitID_data[2];
	$exhibitID = $exhibitID_data[0];
}
else {
	$exhibitname = "";
	$documents = "";
	$exhibitID = "";
}

if (isset($_POST['editsaveexhibit'])) {

	$documents = $_FILES["documents"]['name'];

		if ($exhibitID) {

			$fileExt = explode('.', $documents);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('pdf');

			if (isset($_FILES["documents"]['name']) && !empty($_FILES["documents"]['name'])) {
				if (in_array($fileActualExt, $allow)) {

						if (file_exists("documents/".$_FILES["documents"]["name"])) {
							$store = $_FILES["documents"]["name"];
							header("location: exhibit.php?error= photo is already exists");
						}
						else {

								$exhibitsql = "UPDATE exhibit SET documents = '$documents' where exhibitID = '$exhibitID' ";

								$run = mysqli_query($con,$exhibitsql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["documents"]["tmp_name"], "documents/".$_FILES["documents"]["name"]);
									header("location: exhibit.php?success= exhibit is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "exhibit is not added!"; ?>
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

		}
		else {
			?>
			<p class="errormsgf">
			<?php	Echo "cannot execute a query"; ?>
			</p>
			<?php
		}
	
	
}
?>

<link rel="stylesheet" type="text/css" href="css/edit1.css">
<link rel="shortcut icon"  href="photos/PUP LOGO.png">
<title>exhibit EDIT</title>
<style type="text/css">
	.errormsgf {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 320px;
		margin-left: 300px;
	}
</style>

<section class="edit_form">
	<h1>ADD/EDIT FORM</h1>

	<div class="edit" id="edit_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="edit_modal" role="document">
		<img src="photos/PUP LOGO.png">
			<h1>EXHIBIT</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>exhibit Title:</label>
				<input type="text" name="exhibitname" placeholder="exhibit Title" value="<?php echo $exhibitname; ?>"  style="margin-left: 220px;">
				<label for="documents">Image<small>(formats: pdf)</small></label>
				<input type="file" name="documents" class="form-control" value="<?php echo $documents; ?>" style="margin-left: 220px;">
				<input type="hidden" name="exhibitID" value="<?php echo $exhibitID; ?>">
				<button class="edit-save" name="editsaveexhibit">Save</button>
				<button class="edit-back"><a href="exhibit.php">Back</button></a>
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