
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

include 'crud/pup.php';
 if (isset($_GET['cmoID']) && $_GET['cmoID']!="") {
	$cmoID = $_GET['cmoID'];
	$cmoID_query = "SELECT * FROM cmo where cmoID = '$cmoID'";
	$cmoID_result =mysqli_query($con, $cmoID_query);
	$cmoID_data = mysqli_fetch_row($cmoID_result);
	$programID = $cmoID_data[1];
	$cmotitle_ = $cmoID_data[2];
	$cmo_img = $cmoID_data[3];
	$cmodocument = $cmoID_data[4];
	$cmoID = $cmoID_data[0];
}
else {
	$programID = "";
	$cmotitle_ = "";
	$cmo_img = "";
	$cmodocument = "";
	$cmoID = "";
}

if (isset($_POST['editsavecmo'])) {
	if (!empty($_POST['programID']) && !empty($_POST['cmotitle_']) && !empty($_FILES['cmo_img']) && !empty($_FILES['cmodocument'])) {

		$programID = $_POST['programID'];
		$cmotitle_ = $_POST['cmotitle_'];
		$cmo_img = $_FILES["cmo_img"]['name'];
		$cmodocument = $_FILES["cmodocument"]['name'];

		if ($cmoID) {

			// ss
			$fileExtss = explode('.', $cmo_img);
			$fileActualExtss = strtolower(end($fileExtss));
			$allowss = array('jpg', 'jpeg', 'png');
			// addfiles
			$fileExtadd = explode('.', $cmodocument);
			$fileActualExtadd = strtolower(end($fileExtadd));
			$allowadd = array('pdf');

			if (isset($_FILES["cmo_img"]['name']) && !empty($_FILES["cmo_img"]['name'])) {
				if (in_array($fileActualExtss, $allowss)) {


						if (file_exists("photos/".$_FILES["cmo_img"]["name"])) {
							$store = $_FILES["cmo_img"]["name"];
							header("location: cmo.php?error= image is already exists");
						}
						else {

								$cmosql = "UPDATE cmo SET programID = '$programID', cmotitle_ = '$cmotitle_', cmo_img = '$cmo_img' where cmoID = '$cmoID' ";

								$run = mysqli_query($con,$cmosql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["cmo_img"]["tmp_name"], "photos/".$_FILES["cmo_img"]["name"]);
									header("location: cmo.php?success= CMO image is updated");
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
			elseif (isset($_FILES["cmodocument"]['name']) && !empty($_FILES["cmodocument"]['name'])) {
				if (in_array($fileActualExtadd, $allowadd)) {


						if (file_exists("documents/".$_FILES["cmodocument"]["name"])) {
							$store = $_FILES["cmodocument"]["name"];
							header("location: cmo.php?error= pdf is already exists");
						}
						else {

								$cmosql = "UPDATE cmo SET programID = '$programID', cmotitle_ = '$cmotitle_', cmodocument = '$cmodocument' where cmoID = '$cmoID' ";

								$run = mysqli_query($con,$cmosql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["cmodocument"]["tmp_name"], "documents/".$_FILES["cmodocument"]["name"]);
									header("location: cmo.php?success= CMO document is updated");
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
				$cmosql = "UPDATE cmo SET programID = '$programID', cmotitle_ = '$cmotitle_' where cmoID = '$cmoID' ";


				$run = mysqli_query($con,$cmosql) or die(mysqli_error($con));

				if ($run) {

					header("location: cmo.php?success= The data is updated");

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
<title>CMO EDIT</title>

<style type="text/css">
.errormsgf {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 575px;
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
			<h1>Ched Memorandum Order</h1>
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
				<label>CMO Title:</label>
				<input type="text" name="cmotitle_" placeholder="CMO Title" value="<?php echo $cmotitle_; ?>" style="margin-left:275px;">
				<label for="office_img">CMO Image<small>(formats: jpg, png, jpeg):</small></label>
				<input type="file" name="cmo_img" class="form-control" value="<?php echo $cmo_img; ?>" style="margin-left:275px;">
				<label for="office_img">CMO Document<small>(formats: pdf):</small></label>
				<input type="file" name="cmodocument" class="form-control" value="<?php echo $cmodocument; ?>" style="margin-left:275px;">

				<input type="hidden" name="cmoID" value="<?php echo $cmoID; ?>">
				<button class="edit-save" name="editsavecmo">Save</button>
				<button class="edit-back"><a href="cmo.php">Back</button></a>
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