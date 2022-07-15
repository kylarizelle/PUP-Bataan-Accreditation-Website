
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['areaID']) && $_GET['areaID']!="") {
	$areaID = $_GET['areaID'];
	$areaID_query = "SELECT * FROM area WHERE areaID= '$areaID'";
	$areaID_result =mysqli_query($con, $areaID_query);
	$areaID_data = mysqli_fetch_row($areaID_result);
	$areaname = $areaID_data[1];
	$area_img = $areaID_data[2];
	$areaID = $areaID_data[0];
}
else {
	$areaname = "";
	$area_img = "";
	$areaID = "";
}

if (isset($_POST['editsavearea'])) {
	if (!empty($_POST['areaname'])) {
		$areaname = $_POST['areaname'];
		$area_img = $_FILES["area_img"]['name'];

		if ($areaID) {

			$fileExt = explode('.', $area_img);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('jpg', 'jpeg', 'png');

			if (isset($_FILES["area_img"]['name']) && !empty($_FILES["area_img"]['name'])) {
				if (in_array($fileActualExt, $allow)) {

						if (file_exists("photos/".$_FILES["area_img"]["name"])) {
							$store = $_FILES["area_img"]["name"];
							header("location: area.php?error= photo is already exists");
						}
						else {

								$areasql = "UPDATE area SET areaname = '$areaname', area_img = '$area_img' where areaID = '$areaID' ";

								$run = mysqli_query($con,$areasql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["area_img"]["tmp_name"], "photos/".$_FILES["area_img"]["name"]);
									header("location: area.php?success= area is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "area is not added!"; ?>
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
				$areasql = "UPDATE area SET areaname = '$areaname' where areaID = '$areaID' ";

				$run = mysqli_query($con,$areasql) or die(mysqli_error($con));

				if ($run) {

					header("location: area.php?success= area is updated");

				}
				else{
				?>
				<p class="errormsgf">
				<?php echo "area is not added!"; ?>
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
<title>AREA EDIT</title>
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
	<h1>EDIT FORM</h1>

	<div class="edit" id="edit_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="edit_modal" role="document">
		<img src="photos/PUP LOGO.png">
			<h1>AREAS UNDER SURVEY</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>area Title:</label>
				<input type="text" name="areaname" placeholder="area Title" value="<?php echo $areaname; ?>"  style="margin-left: 220px;">
				<label for="area_img">Image<small>(formats: jpg, jpeg, png)</small></label>
				<input type="file" name="area_img" class="form-control" value="<?php echo $area_img; ?>" style="margin-left: 220px;">
				<input type="hidden" name="areaID" value="<?php echo $areaID; ?>">
				<button class="edit-save" name="editsavearea">Save</button>
				<button class="edit-back"><a href="area.php">Back</button></a>
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