
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['accom_id']) && $_GET['accom_id']!="") {
	$accom_id = $_GET['accom_id'];
	$accom_id_query = "SELECT * FROM accomplishment WHERE accom_id= '$accom_id'";
	$accom_id_result =mysqli_query($con, $accom_id_query);
	$accom_id_data = mysqli_fetch_row($accom_id_result);
	$year_ = $accom_id_data[1];
	$achievement = $accom_id_data[2];
	$accom_id = $accom_id_data[0];
}
else {
	$year_ = "";
	$achievement = "";
	$accom_id = "";
}

if (isset($_POST['editsaveaccomplishment'])) {
	if (!empty($_POST['year_']) && !empty($_POST['achievement'])) {
		
		$year_ = $_POST['year_'];
		$achievement = $_POST['achievement'];
		$accom_id = $_POST['accom_id'];

		if (!empty($accom_id)) {

				$editquery = "UPDATE accomplishment SET year_ = '$year_', achievement = '$achievement' WHERE accom_id = '$accom_id' ";

				$updateresult = mysqli_query($con, $editquery);

				if ($updateresult) {
					header("location: accomplishment.php?success= the data is successfully added");
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
<title>ACCOMPLISHMENT EDIT</title>

<style type="text/css">
	.errormsgp {
		color: white;
		background: red;
		padding: 10px 10px;
		font-size: 17px;
		position: absolute;
		margin-top: 315px;
		margin-left: 300px;
	}
</style>

<section class="edit_form">
	<h1>EDIT FORM</h1>

	<div class="edit" id="edit_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="edit_modal" role="document">
		<img src="photos/PUP LOGO.png">
			<h1>PUP ACHIEVEMENT</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>Year:</label>
				<input type="number" name="year_" placeholder="Year of Achievement" value="<?php echo $year_; ?>" style="margin-left: 200px;">
				<label>PUP Achievement:</label>
				<input type="text" name="achievement" placeholder="Year of Achievement" value="<?php echo $achievement; ?>"style="margin-left: 200px;">
				<input type="hidden" name="accom_id" value="<?php echo $accom_id; ?>">
				<button class="edit-save" name="editsaveaccomplishment">Save</button>
				<button class="edit-back"><a href="accomplishment.php">Back</button></a>
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