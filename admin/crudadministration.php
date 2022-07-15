<?php


	$con=mysqli_connect("localhost", "root", "", "pup");

	// add admin

if (isset($_POST['add_admin'])) {
	if (!empty($_POST['lastname_']) && !empty($_POST['firstname_']) && !empty($_POST['mi_']) && !empty($_POST['positionname']) && !empty($_POST['username']) && !empty($_POST['password_']) && !empty($_POST['cpassword'])) {
		if ($_POST['password_'] === $_POST['cpassword']) {
		
			$lastname_ = $_POST['lastname_'];
			$firstname_ = $_POST['firstname_'];
			$mi_ = $_POST['mi_'];
			$positionname = $_POST['positionname'];
			$username = $_POST['username'];
			$password_ = $_POST['password_'];
			$cpassword = $_POST['cpassword'];
			$password_ = md5($password_);

			$query = "INSERT INTO account(lastname_, firstname_, mi_, positionname, username, password_) VALUES('$lastname_', '$firstname_', '$mi_', '$positionname', '$username', '$password_')";

			$run = mysqli_query($con,$query) or die(mysqli_error($con));

			if ($run) {
				header("location: admin.php?success= the data is successfully added");
			}
			else{
				
				header("location: admin.php?error=something went wrong");
			}
		} else {
			header("location: admin.php?error=confirm password and passwords are not same");
			}
	} else {
		
		header("location: admin.php?error= All field is required! try again");
		exit();
	}
}

?>

<?php

// delete admin
if (!empty($_GET['admin_id'])) {
 	$admin_id = $_GET['admin_id'];
 	$del_query = "DELETE FROM account WHERE adminID = '$admin_id'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: admin.php?success=Data is successfully deleted    ");
 	}
 }


  ?>

  <?php
// add position
  if (isset($_POST['add_position'])) {
	if (!empty($_POST['positionname'])) {
		
		$positionname = $_POST['positionname'];

		$position_query = "INSERT INTO position (positionname) VALUES('$positionname')";

		$run = mysqli_query($con,$position_query) or die(mysqli_error($con));

		if ($run) {
			header("location: position.php?success= the data is successfully added");
		}
		else{
			
			header("location: position.php?error=something went wrong");
		}


	} else {
		
		header("location: position.php?error= All field is required! try again");
		exit();
	}
}  ?>

<?php
// delete position
if (!empty($_GET['positionID'])) {
 	$positionID = $_GET['positionID'];
 	$del_query = "DELETE FROM position WHERE positionID = '$positionID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: position.php?success=Data is successfully deleted    ");
 	}
 }

  ?>

    <?php
// add area
if (isset($_POST['add_area'])) {
	if (!empty($_POST['areaname']) && !empty($_FILES['area_img'])) {

		$areaname = $_POST['areaname'];
		$area_img = $_FILES["area_img"]['name'];

		$fileExt = explode('.', $area_img);
		$fileActualExt = strtolower(end($fileExt));
		$allow = array('jpg', 'jpeg', 'png');

		if (in_array($fileActualExt, $allow)) {

				
				if (file_exists("photos/".$_FILES["area_img"]["name"])) {
						$store = $_FILES["area_img"]["name"];
						header("location: area.php?error= photo is already exists");
				}
				else {
					$areasql = "INSERT INTO area(areaname, area_img) VALUES ('$areaname', '$area_img')";

					$run = mysqli_query($con,$areasql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["area_img"]["tmp_name"], "photos/".$_FILES["area_img"]["name"]);
						header("location: area.php?success= Area is added");
					}
					else{
						header("location: area.php?error= Area is not added");
					}
				}
		}
		else {
			header("location: area.php?error= invalid file type");
		}
	}
	else {
		header("location: area.php?error= all fields are required");
	}
}

?>

<?php
// delete area
if (!empty($_GET['areaID'])) {
 	$areaID = $_GET['areaID'];
 	$del_query = "DELETE FROM area WHERE areaID = '$areaID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: area.php?success=Data is successfully deleted    ");
 	}
 }

  ?>

<?php
// add program
if (isset($_POST['add_program'])) {
	if (!empty($_POST['programname']) && !empty($_POST['prog_ac']) && !empty($_POST['description']) && !empty($_POST['definition']) && !empty($_FILES['prog_img'])) {

		$programname = $_POST['programname'];
		$prog_ac = $_POST['prog_ac'];
		$description = $_POST['description'];
		$definition = $_POST['definition'];
		$prog_img = $_FILES["prog_img"]['name'];

		$fileExt = explode('.', $prog_img);
		$fileActualExt = strtolower(end($fileExt));
		$allow = array('jpg', 'jpeg', 'png');

		if (in_array($fileActualExt, $allow)) {
				
				if (file_exists("photos/".$_FILES["prog_img"]["name"])) {
						$store = $_FILES["prog_img"]["name"];
						header("location: program.php?error= photo is already exists");
				}
				else {
					$programsql = "INSERT INTO program(programname, prog_ac, description, definition, prog_img) VALUES ('$programname', '$prog_ac', '$description','$definition', '$prog_img')";

					$run = mysqli_query($con,$programsql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["prog_img"]["tmp_name"], "photos/".$_FILES["prog_img"]["name"]);
						header("location: program.php?success= program successfully added");
					}
					else{
						header("location: program.php?error= program is not added");
					}
				}
		}
		else {
			header("location: program.php?error= invalid file type");
		}
	}
	else
		header("location: program.php?error= all fields are required");
}
 
?>

<?php
// delete program
if (!empty($_GET['program_id'])) {
 	$program_id = $_GET['program_id'];
 	$del_query = "DELETE FROM program WHERE program_id = '$program_id'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: program.php?success=Data is successfully deleted    ");
 	}
 }

  ?>
<?php
// add administration
if (isset($_POST['add_administration'])) {
	if (!empty($_POST['positionID']) && !empty($_POST['fullname']) && !empty($_POST['professionalname']) && !empty($_FILES['image_'])) {

		$positionID = $_POST['positionID'];
		$fullname = $_POST['fullname'];
		$professionalname = $_POST['professionalname'];
		$image_ = $_FILES["image_"]['name'];

		$fileExt = explode('.', $image_);
		$fileActualExt = strtolower(end($fileExt));
		$allow = array('jpg', 'jpeg', 'png');

		if (in_array($fileActualExt, $allow)) {

				
				if (file_exists("photos/".$_FILES["image_"]["name"])) {
						$store = $_FILES["image_"]["name"];
						header("location: faculty.php?error= photo is already exists");
				}
				else {
					$facultysql = "INSERT INTO administration(positionID, fullname, professionalname, image_) VALUES ('$positionID', '$fullname', '$professionalname', '$image_')";

					$run = mysqli_query($con,$facultysql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["image_"]["tmp_name"], "photos/".$_FILES["image_"]["name"]);
						header("location: faculty.php?success= administartion added");
					}
					else{
						header("location: faculty.php?error= administartion is not added");
					}
				}
			
		}
		else {
			header("location: faculty.php?error= invalid file type");
		}
	}
	else
		header("location: faculty.php?error= all fields are required");
}
?>

<?php
// delete administration
if (!empty($_GET['adminID'])) {
 	$adminID = $_GET['adminID'];
 	$del_query = "DELETE FROM administration WHERE adminID = '$adminID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: faculty.php?success=Data is successfully deleted    ");
 	}
 }

  ?>

  <?php
  if (isset($_POST['add_accomplishment'])) {
	if (!empty($_POST['year_']) && !empty($_POST['achievement'])) {

		$year_ = $_POST['year_'];
		$achievement = $_POST['achievement'];

		$query = "INSERT INTO accomplishment(year_, achievement) VALUES('$year_', '$achievement')";

		$run = mysqli_query($con,$query) or die(mysqli_error($con));

		if ($run) {
			header("location: accomplishment.php?success= the data is successfully added");
		}
		else{
			
			header("location: accomplishment.php?error=something went wrong");
		}


	} else {
		
		header("location: accomplishment.php?error= All field is required! try again");
		exit();
	}
} ?>

<?php
// delete accomplishment
if (!empty($_GET['accom_id'])) {
 	$accom_id = $_GET['accom_id'];
 	$del_query = "DELETE FROM accomplishment WHERE accom_id = '$accom_id'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: accomplishment.php?success=Data is successfully deleted    ");
 	}
 }

  ?>

 <?php
// add facility
if (isset($_POST['add_facility'])) {
	if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_FILES['picture'])) {

		$name = $_POST['name'];
		$description = $_POST['description'];
		$picture = $_FILES["picture"]['name'];

		$fileExt = explode('.', $picture);
		$fileActualExt = strtolower(end($fileExt));
		$allow = array('jpg', 'jpeg', 'png');

		if (in_array($fileActualExt, $allow)) {

				
				if (file_exists("photos/".$_FILES["picture"]["name"])) {
						$store = $_FILES["picture"]["name"];
						header("location: facility.php?error= photo is already exists");
				}
				else {
					$facilitysql = "INSERT INTO facility(name, picture, description) VALUES ('$name', '$picture', '$description')";

					$run = mysqli_query($con,$facilitysql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["picture"]["tmp_name"], "photos/".$_FILES["picture"]["name"]);
						header("location: facility.php?success= Facility is added");
					}
					else{
						header("location: facility.php?error= Facility is not added");
					}
				}
			
		}
		else {
			header("location: facility.php?error= invalid file type");
		}
	}
	else
		header("location: facility.php?error= all fields are required");
}
?>

<?php
// delete facility
if (!empty($_GET['facilityID'])) {
 	$facilityID = $_GET['facilityID'];
 	$del_query = "DELETE FROM facility WHERE facilityID = '$facilityID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: facility.php?success=Data is successfully deleted    ");
 	}
 }
  ?>

  <?php
// add laboratory
if (isset($_POST['add_laboratory'])) {
	if (!empty($_POST['labtitle']) && !empty($_FILES['lab_img'])) {

		$labtitle = $_POST['labtitle'];
		$lab_img = $_FILES["lab_img"]['name'];

		$fileExt = explode('.', $lab_img);
		$fileActualExt = strtolower(end($fileExt));
		$allow = array('jpg', 'jpeg', 'png');

		if (in_array($fileActualExt, $allow)) {

				
				if (file_exists("photos/".$_FILES["lab_img"]["name"])) {
						$store = $_FILES["lab_img"]["name"];
						header("location: laboratory.php?error= photo is already exists");
				}
				else {
					$laboratorysql = "INSERT INTO laboratory(labtitle, lab_img) VALUES ('$labtitle', '$lab_img')";

					$run = mysqli_query($con,$laboratorysql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["lab_img"]["tmp_name"], "photos/".$_FILES["lab_img"]["name"]);
						header("location: laboratory.php?success= laboratory is added");
					}
					else{
						header("location: laboratory.php?error= laboratory is not added");
					}
				}
			
		}
		else {
			header("location: laboratory.php?error= invalid file type");
		}
	}
	else
		header("location: laboratory.php?error= all fields are required");
}
?>

<?php
// delete laboratory
if (!empty($_GET['labID'])) {
 	$labID = $_GET['labID'];
 	$del_query = "DELETE FROM laboratory WHERE labID = '$labID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: laboratory.php?success=Data is successfully deleted    ");
 	}
 }
  ?>

  <?php
// add office
if (isset($_POST['add_office'])) {
	if (!empty($_POST['officetitle']) && !empty($_FILES['office_img'])) {

		$officetitle = $_POST['officetitle'];
		$office_img = $_FILES["office_img"]['name'];

		$fileExt = explode('.', $office_img);
		$fileActualExt = strtolower(end($fileExt));
		$allow = array('jpg', 'jpeg', 'png');

		if (in_array($fileActualExt, $allow)) {

				
				if (file_exists("photos/".$_FILES["office_img"]["name"])) {
						$store = $_FILES["office_img"]["name"];
						header("location: office.php?error= photo is already exists");
				}
				else {
					$officesql = "INSERT INTO office(officetitle, office_img) VALUES ('$officetitle', '$office_img')";

					$run = mysqli_query($con,$officesql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["office_img"]["tmp_name"], "photos/".$_FILES["office_img"]["name"]);
						header("location: office.php?success= office is added");
					}
					else{
						header("location: office.php?error= office is not added");
					}
				}
			
		}
		else {
			header("location: office.php?error= invalid file type");
		}
	}
	else
		header("location: office.php?error= all fields are required");
}
?>

<?php
// delete office
if (!empty($_GET['officeID'])) {
 	$officeID = $_GET['officeID'];
 	$del_query = "DELETE FROM office WHERE officeID = '$officeID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: office.php?success=Data is successfully deleted    ");
 	}
 }
  ?>

<?php
// add alumni
if (isset($_POST['add_alumni'])) {
	if (!empty($_POST['programID']) && !empty($_POST['alumniyear']) && !empty($_POST['alumniname_']) && !empty($_POST['alumniposition']) && !empty($_FILES['alumni_img'])) {

		$programID = $_POST['programID'];
		$alumniyear = $_POST['alumniyear'];
		$alumniname_ = $_POST['alumniname_'];
		$alumniposition = $_POST['alumniposition'];
		$alumni_img = $_FILES["alumni_img"]['name'];

		$fileExt = explode('.', $alumni_img);
		$fileActualExt = strtolower(end($fileExt));
		$allow = array('jpg', 'jpeg', 'png');

		if (in_array($fileActualExt, $allow)) {

				
				if (file_exists("photos/".$_FILES["alumni_img"]["name"])) {
						$store = $_FILES["alumni_img"]["name"];
						header("location: alumni.php?error= photo is already exists");
				}
				else {
					$alumnisql = "INSERT INTO alumni(programID, alumniyear, alumniname_, alumniposition, alumni_img) VALUES ('$programID', '$alumniyear', '$alumniname_', '$alumniposition', '$alumni_img')";

					$run = mysqli_query($con,$alumnisql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["alumni_img"]["tmp_name"], "photos/".$_FILES["alumni_img"]["name"]);
						header("location: alumni.php?success= alumni added");
					}
					else{
						header("location: alumni.php?error= alumni is not added");
					}
				}
			
		}
		else {
			header("location: alumni.php?error= invalid file type");
		}
	}
	else
		header("location: alumni.php?error= all fields are required");
}
?>

<?php
// delete alumni
if (!empty($_GET['alumniID'])) {
 	$alumniID = $_GET['alumniID'];
 	$del_query = "DELETE FROM alumni WHERE alumniID = '$alumniID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: alumni.php?success=Data is successfully deleted    ");
 	}
 }
  ?>

<?php
// add activity program
if (isset($_POST['add_actprogram'])) {
	if (!empty($_POST['programID']) && !empty($_POST['activity_prog']) && !empty($_FILES['act_img'])) {

		$programID = $_POST['programID'];
		$activity_prog = $_POST['activity_prog'];
		$act_img = $_FILES["act_img"]['name'];

		$fileExt = explode('.', $act_img);
		$fileActualExt = strtolower(end($fileExt));
		$allow = array('jpg', 'jpeg', 'png');

		if (in_array($fileActualExt, $allow)) {

				
				if (file_exists("photos/".$_FILES["act_img"]["name"])) {
						$store = $_FILES["act_img"]["name"];
						header("location: prog-activity.php?error= photo is already exists");
				}
				else {
					$actprogramsql = "INSERT INTO actprogram(programID, activity_prog, act_img) VALUES ('$programID', '$activity_prog', '$act_img')";

					$run = mysqli_query($con,$actprogramsql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["act_img"]["tmp_name"], "photos/".$_FILES["act_img"]["name"]);
						header("location: prog-activity.php?success= Program activity added");
					}
					else{
						header("location: prog-activity.php?error= Program activity is not added");
					}
				}
			
		}
		else {
			header("location: prog-activity.php?error= invalid file type");
		}
	}
	else
		header("location: prog-activity.php?error= all fields are required");
}
?>

<?php
// delete activity program
if (!empty($_GET['actprogID'])) {
 	$actprogID = $_GET['actprogID'];
 	$del_query = "DELETE FROM actprogram WHERE actprogID = '$actprogID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: prog-activity.php?success=Data is successfully deleted    ");
 	}
 }
  ?>

 <?php
 // add survey prog
  if (isset($_POST['add_surveyprog'])) {
	if (!empty($_POST['programID']) && !empty($_POST['objective'])) {

		$programID = $_POST['programID'];
		$objective = $_POST['objective'];

		$query = "INSERT INTO surveyprogram(programID, objective) VALUES('$programID', '$objective')";

		$run = mysqli_query($con,$query) or die(mysqli_error($con));

		if ($run) {
			header("location: survey-prog-obj.php?success= the data is successfully added");
		}
		else{
			
			header("location: survey-prog-obj.php?error=something went wrong");
		}


	} else {
		
		header("location: survey-prog-obj.php?error= All field is required! try again");
		exit();
	}
} ?>

<?php
// delete surveyprogram
if (!empty($_GET['surveyID'])) {
 	$surveyID = $_GET['surveyID'];
 	$del_query = "DELETE FROM surveyprogram WHERE surveyID = '$surveyID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: survey-prog-obj.php?success=Data is successfully deleted    ");
 	}
 }

  ?>

 <?php
 // add achievement program
if (isset($_POST['add_prog-achievement'])) {
	if (!empty($_POST['programID']) && !empty($_POST['achieveyear']) && !empty($_POST['name']) && !empty($_POST['achievement'])) {

		$programID = $_POST['programID'];
		$achieveyear = $_POST['achieveyear'];
		$name = $_POST['name'];
		$achievement = $_POST['achievement'];

		$query = "INSERT INTO achievement(programID, achieveyear, name, achievement) VALUES('$programID', '$achieveyear', '$name', '$achievement')";

		$run = mysqli_query($con,$query) or die(mysqli_error($con));

		if ($run) {
			header("location: achievement-prog.php?success= the data is successfully added");
		}
		else{
			
			header("location: achievement-prog.php?error=something went wrong");
		}


	} else {
		
		header("location: achievement-prog.php?error= All field is required! try again");
		exit();
	}
} ?>

<?php
// delete achievement program
if (!empty($_GET['achieveID'])) {
 	$achieveID = $_GET['achieveID'];
 	$del_query = "DELETE FROM achievement WHERE achieveID = '$achieveID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: achievement-prog.php?success=Data is successfully deleted    ");
 	}
 }

  ?>

  <?php
// add library parameter
if (isset($_POST['add_sslibrary'])) {
	if (!empty($_FILES['ss']) && !empty($_FILES['ppp'])) {

		$ss = $_FILES["ss"]['name'];
		$ppp = $_FILES["ppp"]['name'];

		// ss
		$fileExtppp = explode('.', $ss);
		$fileActualExtppp = strtolower(end($fileExtppp));
		$allowppp = array('pdf');
		// ppp
		$fileExtss = explode('.', $ppp);
		$fileActualExtss = strtolower(end($fileExtss));
		$allowss = array('pdf');

		if (in_array($fileActualExtppp, $allowppp) && in_array($fileActualExtss, $allowss)) {

				
				if (file_exists("documents/".$_FILES["ss"]["name"])) {
						$storeppp = $_FILES["ss"]["name"];
						$storess = $_FILES["ppp"]["name"];
						header("location: library.php?error= pdf filename is already exists");
				}
				else {
					$librarysql = "INSERT INTO sslibrary(ss, ppp) VALUES ('$ss', '$ppp')";

					$run = mysqli_query($con,$librarysql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["ss"]["tmp_name"], "documents/".$_FILES["ss"]["name"]);
						move_uploaded_file($_FILES["ppp"]["tmp_name"], "documents/".$_FILES["ppp"]["name"]);
						header("location: library.php?success= Library files is added");
					}
					else{
						header("location: library.php?error= Library Files is not added");
					}
				}
			
		}
		else {
			header("location: library.php?error= all files should be in pdf file and all fields are required");
		}
	}
	else
		header("location: library.php?error= all fields are required");
}
?>
<?php
// delete self survey library
if (!empty($_GET['sslibraryID'])) {
 	$sslibraryID = $_GET['sslibraryID'];
 	$del_query = "DELETE FROM sslibrary WHERE sslibraryID = '$sslibraryID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: library.php?success=Data is successfully deleted    ");
 	}
 }

  ?>

  <?php
// add surveyarea
if (isset($_POST['add_surveyarea'])) {
	if (!empty($_POST['programID']) && !empty($_POST['areaID']) && !empty($_POST['areades']) && !empty($_FILES['areappp']) && !empty($_FILES['areass']) && !empty($_FILES['area_addfile'])) {

		$programID = $_POST['programID'];
		$areaID = $_POST['areaID'];
		$areades = $_POST['areades'];
		$areappp = $_FILES["areappp"]['name'];
		$areass = $_FILES["areass"]['name'];
		$area_addfile = $_FILES["area_addfile"]['name'];

		// ppp
		$fileExtppp = explode('.', $areappp);
		$fileActualExtppp = strtolower(end($fileExtppp));
		$allowppp = array('pdf');
		// ss
		$fileExtss = explode('.', $areass);
		$fileActualExtss = strtolower(end($fileExtss));
		$allowss = array('pdf');
		// addfiles
		$fileExtadd = explode('.', $area_addfile);
		$fileActualExtadd = strtolower(end($fileExtadd));
		$allowadd = array('pdf');

		if (in_array($fileActualExtppp, $allowppp) && in_array($fileActualExtss, $allowss) && in_array($fileActualExtadd, $allowadd)) {

				
				if (file_exists("documents/".$_FILES["areappp"]["name"])) {
						$storeppp = $_FILES["areappp"]["name"];
						$storess = $_FILES["areass"]["name"];
						$storeadd = $_FILES["area_addfile"]["name"];
						header("location: surveyarea.php?error= pdf filename is already exists");
				}
				else {
					$surveyareasql = "INSERT INTO surveyarea(programID, areaID, areades, areappp, areass, area_addfile) VALUES ('$programID', '$areaID', '$areades', '$areappp', '$areass', '$area_addfile')";

					$run = mysqli_query($con,$surveyareasql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["areappp"]["tmp_name"], "documents/".$_FILES["areappp"]["name"]);
						move_uploaded_file($_FILES["areass"]["tmp_name"], "documents/".$_FILES["areass"]["name"]);
						move_uploaded_file($_FILES["area_addfile"]["tmp_name"], "documents/".$_FILES["area_addfile"]["name"]);
						header("location: surveyarea.php?success= survey area is added");
					}
					else{
						header("location: surveyarea.php?error= survey area is not added");
					}
				}
			
		}
		else {
			header("location: surveyarea.php?error= invalid file type");
		}
	}
	else
		header("location: surveyarea.php?error= all fields are required");
}
?>

<?php
// delete surveyarea
if (!empty($_GET['surveyareaID'])) {
 	$surveyareaID = $_GET['surveyareaID'];
 	$del_query = "DELETE FROM surveyarea WHERE surveyareaID = '$surveyareaID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: surveyarea.php?success=Data is successfully deleted    ");
 	}
 }

  ?>

  <?php
// add library parameter
if (isset($_POST['add_paralib'])) {
	if (!empty($_POST['libpara_let']) && !empty($_FILES['libSIP']) && !empty($_FILES['lib_imp']) && !empty($_FILES['lib_outcome'])) {

		$libpara_let = $_POST['libpara_let'];
		$libSIP = $_FILES["libSIP"]['name'];
		$lib_imp = $_FILES["lib_imp"]['name'];
		$lib_outcome = $_FILES["lib_outcome"]['name'];

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

		if (in_array($fileActualExtppp, $allowppp) && in_array($fileActualExtss, $allowss) && in_array($fileActualExtadd, $allowadd)) {

				
				if (file_exists("documents/".$_FILES["libSIP"]["name"])) {
						$storeppp = $_FILES["libSIP"]["name"];
						$storess = $_FILES["lib_imp"]["name"];
						$storeadd = $_FILES["lib_outcome"]["name"];
						header("location: parameterlib.php?error= pdf filename is already exists");
				}
				else {
					$paralibsql = "INSERT INTO parameterlibrary(libpara_let, libSIP, lib_imp, lib_outcome) VALUES ('$libpara_let', '$libSIP', '$lib_imp', '$lib_outcome')";

					$run = mysqli_query($con,$paralibsql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["libSIP"]["tmp_name"], "documents/".$_FILES["libSIP"]["name"]);
						move_uploaded_file($_FILES["lib_imp"]["tmp_name"], "documents/".$_FILES["lib_imp"]["name"]);
						move_uploaded_file($_FILES["lib_outcome"]["tmp_name"], "documents/".$_FILES["lib_outcome"]["name"]);
						header("location: parameterlib.php?success= Parameter Library is added");
					}
					else{
						header("location: parameterlib.php?error= Parameter Library is not added");
					}
				}
			
		}
		else {
			header("location: parameterlib.php?error= invalid file type");
		}
	}
	else
		header("location: parameterlib.php?error= all fields are required");
}
?>

<?php
// delete library parameter
if (!empty($_GET['paralib_ID'])) {
 	$paralib_ID = $_GET['paralib_ID'];
 	$del_query = "DELETE FROM parameterlibrary WHERE paralib_ID = '$paralib_ID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: parameterlib.php?success=Data is successfully deleted    ");
 	}
 }

  ?>

<?php
// add survey parameter
if (isset($_POST['add_surveypara'])) {
	if (!empty($_POST['programID']) && !empty($_POST['areaID']) && !empty($_POST['parameterletter']) && !empty($_POST['parametertitle']) && !empty($_FILES['sip_']) && !empty($_FILES['implementation']) && !empty($_FILES['outcome'])) {

		$programID = $_POST['programID'];
		$areaID = $_POST['areaID'];
		$parameterletter = $_POST['parameterletter'];
		$parametertitle = $_POST['parametertitle'];
		$sip_ = $_FILES["sip_"]['name'];
		$implementation = $_FILES["implementation"]['name'];
		$outcome = $_FILES["outcome"]['name'];

		// ppp
		$fileExtppp = explode('.', $sip_);
		$fileActualExtppp = strtolower(end($fileExtppp));
		$allowppp = array('pdf');
		// ss
		$fileExtss = explode('.', $implementation);
		$fileActualExtss = strtolower(end($fileExtss));
		$allowss = array('pdf');
		// addfiles
		$fileExtadd = explode('.', $outcome);
		$fileActualExtadd = strtolower(end($fileExtadd));
		$allowadd = array('pdf');

		if (in_array($fileActualExtppp, $allowppp) && in_array($fileActualExtss, $allowss) && in_array($fileActualExtadd, $allowadd)) {

				
				if (file_exists("documents/".$_FILES["sip_"]["name"])) {
						$storeppp = $_FILES["sip_"]["name"];
						$storess = $_FILES["implementation"]["name"];
						$storeadd = $_FILES["outcome"]["name"];
						header("location: surveyparameter.php?error= pdf filename is already exists");
				}
				else {
					$surveyparasql = "INSERT INTO surveyparameter(programID, areaID, parameterletter, parametertitle, sip_, implementation, outcome) VALUES ('$programID', '$areaID', '$parameterletter', '$parametertitle', '$sip_', '$implementation', '$outcome')";

					$run = mysqli_query($con,$surveyparasql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["sip_"]["tmp_name"], "documents/".$_FILES["sip_"]["name"]);
						move_uploaded_file($_FILES["implementation"]["tmp_name"], "documents/".$_FILES["implementation"]["name"]);
						move_uploaded_file($_FILES["outcome"]["tmp_name"], "documents/".$_FILES["outcome"]["name"]);
						header("location: surveyparameter.php?success= survey parameter is added");
					}
					else{
						header("location: surveyparameter.php?error= survey parameter is not added");
					}
				}
			
		}
		else {
			header("location: surveyparameter.php?error= invalid file type");
		}
	}
	else
		header("location: surveyparameter.php?error= all fields are required");
}
?>

<?php
// delete library parameter
if (!empty($_GET['surveyparaID'])) {
 	$surveyparaID = $_GET['surveyparaID'];
 	$del_query = "DELETE FROM surveyparameter WHERE surveyparaID = '$surveyparaID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: surveyparameter.php?success=Data is successfully deleted    ");
 	}
 }

  ?>

<?php
// add cmo
if (isset($_POST['add_cmo'])) {
	if (!empty($_POST['programID']) && !empty($_POST['cmotitle_']) && !empty($_FILES['cmo_img']) && !empty($_FILES['cmodocument'])) {

		$programID = $_POST['programID'];
		$cmotitle_ = $_POST['cmotitle_'];
		$cmo_img = $_FILES["cmo_img"]['name'];
		$cmodocument = $_FILES["cmodocument"]['name'];

		// ss
		$fileExtss = explode('.', $cmo_img);
		$fileActualExtss = strtolower(end($fileExtss));
		$allowss = array('jpg', 'jpeg', 'png');
		// addfiles
		$fileExtadd = explode('.', $cmodocument);
		$fileActualExtadd = strtolower(end($fileExtadd));
		$allowadd = array('pdf');

		if (in_array($fileActualExtss, $allowss) && in_array($fileActualExtadd, $allowadd)) {

				
				if (file_exists("photos/".$_FILES["cmo_img"]["name"]) && file_exists("documents/".$_FILES["cmodocument"]["name"])) {
						$storess = $_FILES["cmo_img"]["name"];
						$storeadd = $_FILES["cmodocument"]["name"];
						header("location: cmo.php?error= pdf filename is already exists");
				}
				else {
					$cmosql = "INSERT INTO cmo(programID, cmotitle_, cmo_img, cmodocument) VALUES ('$programID', '$cmotitle_', '$cmo_img', '$cmodocument')";

					$run = mysqli_query($con,$cmosql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["cmo_img"]["tmp_name"], "photos/".$_FILES["cmo_img"]["name"]);
						move_uploaded_file($_FILES["cmodocument"]["tmp_name"], "documents/".$_FILES["cmodocument"]["name"]);
						header("location: cmo.php?success= Ched Memo Order is added");
					}
					else{
						header("location: cmo.php?error= Ched Memo Order is not added");
					}
				}
			
		}
		else {
			header("location: cmo.php?error= invalid file type");
		}
	}
	else
		header("location: cmo.php?error= all fields are required");
}
?>

<?php
// delete cmo
if (!empty($_GET['cmoID'])) {
 	$cmoID = $_GET['cmoID'];
 	$del_query = "DELETE FROM cmo WHERE cmoID = '$cmoID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: cmo.php?success=Data is successfully deleted    ");
 	}
 }

?>

<?php
// add instructional material
if (isset($_POST['add_material'])) {
	if (!empty($_POST['programID']) && !empty($_POST['yearlevel']) && !empty($_POST['semester']) && !empty($_POST['materialtitle_'])  && !empty($_FILES['materialdocument'])) {

		$programID = $_POST['programID'];
		$yearlevel = $_POST['yearlevel'];
		$semester = $_POST['semester'];
		$materialtitle_ = $_POST['materialtitle_'];
		$materialdocument = $_FILES["materialdocument"]['name'];


		// addfiles
		$fileExtadd = explode('.', $materialdocument);
		$fileActualExtadd = strtolower(end($fileExtadd));
		$allowadd = array('pdf');

		if (in_array($fileActualExtadd, $allowadd)) {

				
				if (file_exists("documents/".$_FILES["materialdocument"]["name"])) {
						$storeadd = $_FILES["materialdocument"]["name"];
						header("location: instructional.php?error= pdf filename is already exists");
				}
				else {
					$instructionalsql = "INSERT INTO instructional(programID, yearlevel, semester, materialtitle_, materialdocument) VALUES ('$programID', '$yearlevel', '$semester', '$materialtitle_', '$materialdocument')";

					$run = mysqli_query($con,$instructionalsql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["materialdocument"]["tmp_name"], "documents/".$_FILES["materialdocument"]["name"]);
						header("location: instructional.php?success= The data is added");
					}
					else{
						header("location: instructional.php?error= Instrcutional Material is not added");
					}
				}
			
		}
		else {
			header("location: instructional.php?error= invalid file type");
		}
	}
	else
		header("location: instructional.php?error= all fields are required");
}
?>

<?php
// delete instructional material
if (!empty($_GET['materialID'])) {
 	$materialID = $_GET['materialID'];
 	$del_query = "DELETE FROM instructional WHERE materialID = '$materialID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: instructional.php?success=Data is successfully deleted    ");
 	}
 }

?>

<?php
// add syllabi
if (isset($_POST['add_syllabi'])) {
	if (!empty($_POST['programID']) && !empty($_POST['syllabititle_']) && !empty($_FILES['syllabi_img']) && !empty($_FILES['syllabidocument'])) {

		$programID = $_POST['programID'];
		$syllabititle_ = $_POST['syllabititle_'];
		$syllabi_img = $_FILES["syllabi_img"]['name'];
		$syllabidocument = $_FILES["syllabidocument"]['name'];

		// ss
		$fileExtss = explode('.', $syllabi_img);
		$fileActualExtss = strtolower(end($fileExtss));
		$allowss = array('jpg', 'jpeg', 'png');
		// addfiles
		$fileExtadd = explode('.', $syllabidocument);
		$fileActualExtadd = strtolower(end($fileExtadd));
		$allowadd = array('pdf');

		if (in_array($fileActualExtss, $allowss) && in_array($fileActualExtadd, $allowadd)) {

				
				if (file_exists("photos/".$_FILES["syllabi_img"]["name"]) && file_exists("documents/".$_FILES["syllabidocument"]["name"])) {
						$storess = $_FILES["syllabi_img"]["name"];
						$storeadd = $_FILES["syllabidocument"]["name"];
						header("location: syllabi.php?error= pdf filename is already exists");
				}
				else {
					$syllabisql = "INSERT INTO syllabi(programID, syllabititle_, syllabi_img, syllabidocument) VALUES ('$programID', '$syllabititle_', '$syllabi_img', '$syllabidocument')";

					$run = mysqli_query($con,$syllabisql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["syllabi_img"]["tmp_name"], "photos/".$_FILES["syllabi_img"]["name"]);
						move_uploaded_file($_FILES["syllabidocument"]["tmp_name"], "documents/".$_FILES["syllabidocument"]["name"]);
						header("location: syllabi.php?success= Ched Memo Order is added");
					}
					else{
						header("location: syllabi.php?error= Ched Memo Order is not added");
					}
				}
			
		}
		else {
			header("location: syllabi.php?error= invalid file type");
		}
	}
	else
		header("location: syllabi.php?error= all fields are required");
}
?>

<?php
// delete syllabi
if (!empty($_GET['syllabiID'])) {
 	$syllabiID = $_GET['syllabiID'];
 	$del_query = "DELETE FROM syllabi WHERE syllabiID = '$syllabiID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: syllabi.php?success=Data is successfully deleted    ");
 	}
 }
?>

 <?php
// add program addfile
if (isset($_POST['add_prog_addfile'])) {
	if (!empty($_POST['programID']) && !empty($_POST['addfilename']) && !empty($_FILES['addfile_docu'])) {

		$addfilename = $_POST['addfilename'];
		$programID = $_POST['programID'];
		$addfile_docu = $_FILES["addfile_docu"]['name'];

		$fileExt = explode('.', $addfile_docu);
		$fileActualExt = strtolower(end($fileExt));
		$allow = array('pdf');

		if (in_array($fileActualExt, $allow)) {

				
				if (file_exists("documents/".$_FILES["addfile_docu"]["name"])) {
						$store = $_FILES["addfile_docu"]["name"];
						header("location: addfile.php?error= pdf filename is already exists");
				}
				else {
					$addfilesql = "INSERT INTO addfile(programID, addfilename, addfile_docu) VALUES ('$programID', '$addfilename', '$addfile_docu')";

					$run = mysqli_query($con,$addfilesql) or die(mysqli_error($con));

					if ($run) {
						move_uploaded_file($_FILES["addfile_docu"]["tmp_name"], "documents/".$_FILES["addfile_docu"]["name"]);
						header("location: addfile.php?success= file is added");
					}
					else{
						header("location: addfile.php?error= file is not added");
					}
				}
			
		}
		else {
			header("location: addfile.php?error= invalid file type");
		}
	}
	else
		header("location: addfile.php?error= all fields are required");
}
?>

<?php
// delete addfile
if (!empty($_GET['addfileID'])) {
 	$addfileID = $_GET['addfileID'];
 	$del_query = "DELETE FROM addfile WHERE addfileID = '$addfileID'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: addfile.php?success=Data is successfully deleted    ");
 	}
 }
?>

