
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

if (isset($_GET['adminID']) && $_GET['adminID']!="") {
	$adminID = $_GET['adminID'];
	$adminID_query = "SELECT * FROM account WHERE adminID= '$adminID'";
	$adminID_result =mysqli_query($con, $adminID_query);
	$adminID_data = mysqli_fetch_row($adminID_result);
	$lastname_ = $adminID_data[1];
	$firstname_ = $adminID_data[2];
	$mi_ = $adminID_data[3];
	$positionname = $adminID_data[4];
	$username = $adminID_data[5];
	$password_ = $adminID_data[6];
	$adminID = $adminID_data[0];
}
else {
	$lastname_ = "";
	$firstname_ = "";
	$mi_ = "";
	$positionname = "";
	$username = "";
	$password_ = "";
	$adminID = "";
}

if (isset($_POST['editsave'])) {
	if (!empty($_POST['lastname_']) && !empty($_POST['firstname_']) && !empty($_POST['mi_']) && !empty($_POST['positionname']) && !empty($_POST['username']) && !empty($_POST['password_']) && !empty($_POST['cpassword'])) {
		if ($_POST['password_'] === $_POST['cpassword']) {
			$lastname_ = $_POST['lastname_'];
			$firstname_ = $_POST['firstname_'];
			$mi_ = $_POST['mi_'];
			$positionname = $_POST['positionname'];
			$username = $_POST['username'];
			$password_ = $_POST['password_'];
			$cpassword = $_POST['cpassword'];
			$adminID = $_POST['adminID'];

			if (!empty($adminID)) {

					$password_ = md5($password_);
					$editquery = "UPDATE account SET lastname_ = '$lastname_', firstname_ = '$firstname_', mi_ = '$mi_', positionname = '$positionname', username = '$username', password_ = '$password_' WHERE adminID = '$adminID' ";

					$updateresult = mysqli_query($con, $editquery);

					if ($updateresult) {
						header("location: admin.php?success= the data is successfully updated");
					}
					else {
						?>
						<p class="errormsg">
						<?php echo "Something went wrong! try again"; ?>
						</p>
				<?php	}
			}
			else {
				?>
				<p class="errormsg">
				<?php echo "Cannot execute query, try again!"; ?>
				</p>
			<?php	}
		} else {
			?>
		<p class="errormsg">
		<?php echo "Confirm password and Password are not same"; ?>
		</p>
<?php
		}
	}
	else {
		?>
		<p class="errormsg">
		<?php echo "all fields are required"; ?>
		</p>
<?php	}
}
?>

<link rel="stylesheet" type="text/css" href="css/edit1.css">
<link rel="shortcut icon"  href="photos/PUP LOGO.png">
<style>
	.errormsg{
		margin-top: 540px;
	}
</style>
<title>ADMINISTRATION EDIT</title>

<section class="edit_form">
	<h1>EDIT FORM</h1>

	<div class="edit" id="edit_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="edit_modal" role="document">
		<img src="photos/PUP LOGO.png">
			<h1>Admin</h1>
			<hr>
			<div class="form">
				<form  method="post" enctype="multipart/form-data">
				<label>Last Name:</label>
				<input type="text" style="margin-left: 200px;" name="lastname_" placeholder="Last Name" value="<?php echo $lastname_; ?>">
				<label>First Name:</label>
				<input type="text" style="margin-left: 200px;" name="firstname_" placeholder="First Name" value="<?php echo $firstname_; ?>">
				<label>Middle Name:</label>
				<input type="text" style="margin-left: 200px;" name="mi_" placeholder="Middle Initial" value="<?php echo $mi_; ?>">
				<label for="positionID">Position: &nbsp;&nbsp;&nbsp;&nbsp;</label>
				<select style=" width: 300px; margin-left: 100px;" class="form-control position_list txt" name="positionname">
				<option value="<?php echo $positionname; ?>">Select Position</option>
  				    <option value="Faculty">Faculty</option>
  					<option value="Administration">Administration</option>
 					<option value="Accreditation Task Force">Accreditation Task Force</option>
				</select>
				<br>
				<br>
				<label>Username:</label>
				<input type="text" style="margin-left: 200px;" name="username" placeholder="Username" value="<?php echo $username; ?>">
				<label>Password:</label>
				<input type="password" style="margin-left: 200px;" name="password_" placeholder="Password" value="<?php $password_; ?>">
				<label>Confirm Password:</label>
				<input type="password" style="margin-left: 200px;" name="cpassword" placeholder="Password">
				<input type="hidden" name="adminID" value="<?php echo $adminID; ?>">
				<button class="edit-save" name="editsave">Save</button>
				<button class="edit-back"><a href="admin.php">Back</button></a>
		</form>
		</div>
	</div>
</div>

</section>

<?php  include 'nav.php'; 
} else {
	header("location: index.php");
} ?>