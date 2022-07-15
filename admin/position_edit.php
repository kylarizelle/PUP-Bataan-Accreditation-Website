
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['positionID']) && $_GET['positionID']!="") {
	$positionID = $_GET['positionID'];
	$positionID_query = "SELECT * FROM position WHERE positionID= '$positionID'";
	$positionID_result =mysqli_query($con, $positionID_query);
	$positionID_data = mysqli_fetch_row($positionID_result);
	$positionname = $positionID_data[1];
	$positionID = $positionID_data[0];
}
else {
	$positionname = "";
	$positionID = "";
}

if (isset($_POST['editsaveposition'])) {
	if (!empty($_POST['positionname'])) {
		
		$positionname = $_POST['positionname'];
		$positionID = $_POST['positionID'];

		if (!empty($positionID)) {

				$editquery = "UPDATE position SET positionname = '$positionname' WHERE positionID = '$positionID' ";

				$updateresult = mysqli_query($con, $editquery);

				if ($updateresult) {
					header("location: position.php?success= the data is successfully added");
				}
				else {
					?>
					<p class="errormsgp">
					<?php echo "Something went wrong! try again"; ?>
					</p>
			<?php	}
		}
		else {
			?>
			<p class="errormsgp">
			<?php echo "Cannot execute query, try again!"; ?>
			</p>
	<?php	}
	}
	else {
		?>
		<p class="errormsgp">
		<?php echo "all fields are required"; ?>
		</p>
<?php	}
}
?>

<link rel="stylesheet" type="text/css" href="css/edit1.css">
<link rel="shortcut icon"  href="photos/PUP LOGO.png">
<title>POSITION EDIT</title>

<style type="text/css">
	.errormsgp {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 270px;
		margin-left: 300px;
	}
</style>

<section class="edit_form">
	<h1>EDIT FORM</h1>

	<div class="edit" id="edit_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="edit_modal" role="document">
		<img src="photos/PUP LOGO.png">
			<h1>Position</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>Position Title:</label>
				<input type="text" name="positionname" placeholder="Position Title" value="<?php echo $positionname; ?>">
				<input type="hidden" name="positionID" value="<?php echo $positionID; ?>">
				<button class="edit-save" name="editsaveposition">Save</button>
				<button class="edit-back"><a href="position.php">Back</button></a>
		</form>
		</div>
	</div>
</div>

</section>

<?php  
					include 'nav.php';
} else {
	header("location: index.php");
} ?>