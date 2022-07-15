
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

 if (isset($_GET['sslibraryID']) && $_GET['sslibraryID']!="") {
	$sslibraryID = $_GET['sslibraryID'];
	$sslibraryID_query = "SELECT * FROM sslibrary where sslibraryID = '$sslibraryID'";
	$sslibraryID_result =mysqli_query($con, $sslibraryID_query);
	$sslibraryID_data = mysqli_fetch_row($sslibraryID_result);
	$ss = $sslibraryID_data[1];
	$ppp = $sslibraryID_data[2];
	$sslibraryID = $sslibraryID_data[0];
}
else {
	$ss = "";
	$ppp = "";
	$sslibraryID = "";
}

if (isset($_POST['editsavesslibrary'])) {
	if (!empty($_FILES['ss']) && !empty($_FILES['ppp'])) {
		$ss = $_FILES["ss"]['name'];
		$ppp = $_FILES['ppp']['name'];

		if ($sslibraryID) {

			$fileExt = explode('.', $ss);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('pdf');

			$fileExtppp = explode('.', $ppp);
			$fileActualExtppp = strtolower(end($fileExtppp));
			$allow = array('pdf');

			if (isset($_FILES["ss"]['name']) && !empty($_FILES["ss"]['name'])) {
				if (in_array($fileActualExt, $allow)) {

						if (file_exists("documents/".$_FILES["ss"]["name"])) {
							$store = $_FILES["ss"]["name"];
							header("location: library.php?error= pdf is already exists");
						}
						else {

								$sslibrarysql = "UPDATE sslibrary SET ss = '$ss' where sslibraryID = '$sslibraryID' ";

								$run = mysqli_query($con,$sslibrarysql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["ss"]["tmp_name"], "documents/".$_FILES["ss"]["name"]);
									header("location: library.php?success= Self Survey is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Self Survey Library is not added!"; ?>
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
			elseif (isset($_FILES["ppp"]['name']) && !empty($_FILES["ppp"]['name'])) {
				if (in_array($fileActualExtppp, $allow)) {

						if (file_exists("documents/".$_FILES["ppp"]["name"])) {
							$store = $_FILES["ppp"]["name"];
							header("location: library.php?error= pdf is already exists");
						}
						else {

								$sslibrarysql = "UPDATE sslibrary SET ppp = '$ppp' where sslibraryID = '$sslibraryID' ";

								$run = mysqli_query($con,$sslibrarysql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["ppp"]["tmp_name"], "documents/".$_FILES["ppp"]["name"]);
									header("location: library.php?success= Program Performance Profile  is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Program Performance Profile is not added!"; ?>
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
<title>SELF-SURVEY LIBRARY EDIT</title>

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
			<h1>Library</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label for="file">Self-Survey<small>(formats: pdf):</small></label>
				<input type="file" name="ss" class="form-control" style="margin-left:350px;" value="<?php echo $ss; ?>">
				<label for="file">Program Performance Profile<small>(formats: pdf):</small></label>
				<input type="file" name="ppp" class="form-control" style="margin-left:350px;" value="<?php echo $ppp; ?>">
				<input type="hidden" name="sslibraryID" value="<?php echo $sslibraryID; ?>">
				<button class="edit-save" name="editsavesslibrary">Save</button>
				<button class="edit-back"><a href="library.php">Back</button></a>
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