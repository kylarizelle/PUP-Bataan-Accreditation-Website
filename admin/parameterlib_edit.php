<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';
 if (isset($_GET['paralib_ID']) && $_GET['paralib_ID']!="") {
	$paralib_ID = $_GET['paralib_ID'];
	$paralib_ID_query = "SELECT * FROM parameterlibrary where paralib_ID = '$paralib_ID'";
	$paralib_ID_result =mysqli_query($con, $paralib_ID_query);
	$paralib_ID_data = mysqli_fetch_row($paralib_ID_result);
	$libpara_let = $paralib_ID_data[1];
	$libSIP = $paralib_ID_data[2];
	$lib_imp = $paralib_ID_data[3];
	$lib_outcome = $paralib_ID_data[4];
	$paralib_ID = $paralib_ID_data[0];
}
else {
	$libpara_let = "";
	$libSIP = "";
	$lib_imp = "";
	$lib_outcome = "";
	$paralib_ID = "";
}

if (isset($_POST['editsaveparalib'])) {
	if (!empty($_POST['libpara_let']) && !empty($_FILES['libSIP']) && !empty($_FILES['lib_imp']) && !empty($_FILES['lib_outcome'])) {
		$libpara_let = $_POST['libpara_let'];
		$libSIP = $_FILES["libSIP"]['name'];
		$lib_imp = $_FILES["lib_imp"]['name'];
		$lib_outcome = $_FILES["lib_outcome"]['name'];

		if ($paralib_ID) {

				// ppp
				$fileExtppp = explode('.', $libSIP);
				$fileActualExtppp = strtolower(end($fileExtppp));
				$allowppp = array('pdf');
				// ss
				$fileExtss = explode('.', $lib_imp);
				$fileActualExtss = strtolower(end($fileExtss));
				$allowss = array('pdf');
				// addfiles
				$fileExtadd = explode('.', $lib_outcome);
				$fileActualExtadd = strtolower(end($fileExtadd));
				$allowadd = array('pdf');

if (isset($_FILES["libSIP"]['name']) && !empty($_FILES["libSIP"]['name'])) {
				if (in_array($fileActualExtppp, $allowppp)) {


						if (file_exists("documents/".$_FILES["libSIP"]["name"])) {
							$store = $_FILES["libSIP"]["name"];
							header("location: parameterlib.php?error= pdf is already exists");
						}
						else {

								$parameterlibsql = "UPDATE parameterlibrary SET libpara_let = '$libpara_let', libSIP = '$libSIP' where paralib_ID = '$paralib_ID' ";

								$run = mysqli_query($con,$parameterlibsql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["libSIP"]["tmp_name"], "documents/".$_FILES["libSIP"]["name"]);
									header("location: parameterlib.php?success= System, input, process is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "System, input, process is not added!"; ?>
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
			elseif (isset($_FILES["lib_imp"]['name']) && !empty($_FILES["lib_imp"]['name'])) {
				if (in_array($fileActualExtss, $allowss)) {


						if (file_exists("documents/".$_FILES["lib_imp"]["name"])) {
							$store = $_FILES["lib_imp"]["name"];
							header("location: parameterlib.php?error= pdf is already exists");
						}
						else {

								$parameterlibsql = "UPDATE parameterlibrary SET libpara_let = '$libpara_let', lib_imp = '$lib_imp' where paralib_ID = '$paralib_ID' ";

								$run = mysqli_query($con,$parameterlibsql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["lib_imp"]["tmp_name"], "documents/".$_FILES["lib_imp"]["name"]);
									header("location: parameterlib.php?success= Implementation is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Implementation is not added!"; ?>
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
			elseif (isset($_FILES["lib_outcome"]['name']) && !empty($_FILES["lib_outcome"]['name'])) {
				if (in_array($fileActualExtadd, $allowadd)) {


						if (file_exists("documents/".$_FILES["lib_outcome"]["name"])) {
							$store = $_FILES["lib_outcome"]["name"];
							header("location: parameterlib.php?error= pdf is already exists");
						}
						else {

								$parameterlibsql = "UPDATE parameterlibrary SET libpara_let = '$libpara_let', lib_outcome = '$lib_outcome' where paralib_ID = '$paralib_ID' ";

								$run = mysqli_query($con,$parameterlibsql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["lib_outcome"]["tmp_name"], "documents/".$_FILES["lib_outcome"]["name"]);
									header("location: parameterlib.php?success= Outcome is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Outcome is not added!"; ?>
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
				$paralibsql = "UPDATE parameterlibrary SET libpara_let = '$libpara_let' where paralib_ID = '$paralib_ID' ";


				$run = mysqli_query($con,$paralibsql) or die(mysqli_error($con));

				if ($run) {

					header("location: parameterlib.php?success= The data is updated");

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
<title>LIBRARY PARAMETER EDIT</title>
<style type="text/css">
.errormsgf {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 520px;
		margin-left: 300px;
	}
	
</style>
<section class="edit_form">
	<h1>EDIT FORM</h1>

	<div class="edit" id="edit_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="edit_modal" role="document">
		<img src="photos/PUP LOGO.png">
			<h1>Library Parameter</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>Parameter Letter:</label>
				<input type="text" name="libpara_let" placeholder="Parameter Letter"value="<?php echo $libpara_let; ?>" style="margin-left: 280px;">
				<label for="office_img">System Input Process<small>(formats: pdf):</small></label>
				<input type="file" name="libSIP" class="form-control"value="<?php echo $libSIP; ?>" style="margin-left: 280px;">
				<label for="office_img">Implementation<small>(formats: pdf):</small></label>
				<input type="file" name="lib_imp" class="form-control" value="<?php echo $lib_imp; ?>" style="margin-left: 280px;">
				<label for="office_img">Outcome<small>(formats: pdf):</small></label>
				<input type="file" name="lib_outcome" class="form-control" value="<?php echo $lib_outcome; ?>" style="margin-left: 280px;">
				<input type="hidden" name="paralib_ID" value="<?php echo $paralib_ID; ?>">
				<button class="edit-save" name="editsaveparalib">Save</button>
				<button class="edit-back"><a href="parameterlib.php">Back</button></a>
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