
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['actprogID']) && $_GET['actprogID']!="") {
	$actprogID = $_GET['actprogID'];
	$actprogID_query = "SELECT * FROM actprogram WHERE actprogID= '$actprogID'";
	$actprogID_result =mysqli_query($con, $actprogID_query);
	$actprogID_data = mysqli_fetch_row($actprogID_result);
	$programID = $actprogID_data[1];
	$activity_prog = $actprogID_data[2];
	$act_img = $actprogID_data[3];
	$actprogID = $actprogID_data[0];
}
else {
	$programID = "";
	$activity_prog = "";
	$act_img = "";
	$actprogID = "";
}

if (isset($_POST['editsaveactprog'])) {
	if (!empty($_POST['programID']) && !empty($_POST['activity_prog']) && !empty($_FILES['act_img'])) {
		
		$programID = $_POST['programID'];
		$activity_prog = $_POST['activity_prog'];
		$act_img = $_FILES["act_img"]['name'];

		if ($actprogID) {

			$fileExt = explode('.', $act_img);
			$fileActualExt = strtolower(end($fileExt));
			$allow = array('jpg', 'jpeg', 'png');

			if (isset($_FILES["act_img"]['name']) && !empty($_FILES["act_img"]['name'])) {
				if (in_array($fileActualExt, $allow)) {

						if (file_exists("photos/".$_FILES["act_img"]["name"])) {
							$store = $_FILES["act_img"]["name"];
							header("location: prog-activity.php?error= photo is already exists");
						}
						else {

								$actprogsql = "UPDATE actprogram SET programID = '$programID', activity_prog = '$activity_prog', act_img = '$act_img' where actprogID = '$actprogID' ";

								$run = mysqli_query($con,$actprogsql) or die(mysqli_error($con));

								if ($run) {
									move_uploaded_file($_FILES["act_img"]["tmp_name"], "photos/".$_FILES["act_img"]["name"]);
									header("location: prog-activity.php?success= Program activity is updated");
								}
								else{
									?>
									<p class="errormsgf">
									<?php echo "Activity program is not added!"; ?>
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
				$actprogsql = "UPDATE actprogram SET programID = '$programID', activity_prog = '$activity_prog' where actprogID = '$actprogID' ";

				$run = mysqli_query($con,$actprogsql) or die(mysqli_error($con));

				if ($run) {

					header("location: prog-activity.php?success= Program Activity is updated");

				}
				else{
				?>
				<p class="errormsgf">
				<?php echo "Program activity is not added!"; ?>
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
<title>PROGRAM ACTIVITY EDIT</title>
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

	<div class="edit" id="edit_actprog_modal" tabindex="-1" role="dialog" aria-labeelledby="actprog_modal" aria-hidden="true">
	<div class="edit_modal" role="document">
		<img src="photos/PUP LOGO.png">
			<h1>Activity Program</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>Activity Name</label>
				<input type="text" name="activity_prog" placeholder="Activity Name" value="<?php echo $activity_prog; ?>" style="margin-left: 220px;">
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
				<label for="act_img">Image<small>(formats: jpg, jpeg, png):</small></label>
				<input type="file" name="act_img" class="form-control" value="<?php echo $act_img; ?>" style="margin-left: 220px;">
				<input type="hidden" name="actprogID" value="<?php echo $actprogID; ?>">
				<button class="edit-save" name="editsaveactprog">Save</button>
				<button class="edit-back"><a href="actprog.php">Back</button></a>
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