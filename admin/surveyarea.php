<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	 require 'crud/pup.php';
	$surveyarea = "SELECT s.surveyareaID, p.program_id, p.programname, a.areaID, a.areaname, s.areades, s.areappp, s.areass, s.area_addfile FROM surveyarea s JOIN program p on p.program_id = s.programID JOIN area a on a.areaID = s.areaID order by programname asc";
	$run = mysqli_query($con, $surveyarea);
	$surveyareatbl = mysqli_num_rows($run);
	?>

	<style type="text/css">
	.pdf {
	width: 30px;
	height: 30px;
	background: red;
	outline: none;
	border: none;
	cursor: pointer;
}

.pdf:focus,
.pdf:hover{
	background: brown;
}

.pdf .fa-file-pdf-o {
	font-size: 15px;
	color: white;
}
textarea {
	margin-top: 10px;
	margin-left: 20px;
	width: 80%;
	padding: 5px;
	border: 1px solid black;
	outline: 0;
	font-size: 15px;
	border-top: none;
	border-left: none;
	border-right: none;
	}
</style>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon"  href="photos/PUP LOGO.png">
<link rel="stylesheet" type="text/css" href="css/dash.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
<title>Survey Area</title>
</head>
<body>
<section class="body">
        <section class="index">
            <h1>Program Survey Area</h1>
            <hr>

<button class="buttons" id="btn_add">ADD</button>
<?php if (isset($_GET['success'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:15px">
  <strong>Success:</strong> <?php echo $_GET['success']; ?>
  <a href="surveyarea.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>
</div>
<?php } ?>
<?php if (isset($_GET['error'])) { ?>
<div class="alert-success"><div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:15px">
  <strong>Error:</strong> <?php echo $_GET['error']; ?>
  <a href="surveyarea.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>
</div>
<?php } ?>
<div class="table">
<table id="table_id" class="display table table-striped table-bordered">
				<thead>
			<tr>
				<th width="300">Program</th>
				<th>Area</th>
				<th>Area Description</th>
				<th>PPP</th>
				<th>SS</th>
				<th>Add File</th>
				<th width="100px">Action</th>
			</tr>
			</thead>
			<tbody id="administration_list">

				<?php 
				if (!empty($surveyareatbl)) {
					While($row = mysqli_fetch_assoc($run)) {
						?>

						<tr>
							 <?php  $row['surveyareaID']; ?> 
							<td> <?php echo $row['programname']; ?> </td>
							<td> <?php echo $row['areaname']; ?> </td>
							<td> <?php echo $row['areades']; ?> </td>
							<td><a href="areappp.php?surveyareaID=<?php echo $row['surveyareaID']; ?>" target="_blank"><button class='pdf'><i class='fa fa-file-pdf-o'></i></button></a></td>
							<td><a href="areass.php?surveyareaID=<?php echo $row['surveyareaID']; ?>" target="_blank"><button class='pdf'><i class='fa fa-file-pdf-o'></i></button></a></td>
							<td><a href="areaaddfile.php?surveyareaID=<?php echo $row['surveyareaID']; ?>" target="_blank"><button class='pdf'><i class='fa fa-file-pdf-o'></i></button></a></td>
							<td><a href="surveyarea_edit.php?surveyareaID=<?php echo $row['surveyareaID']; ?>"><button class='edit-administration'><i class='fa fa-pencil'></i></button></a><a href="crudadministration.php?surveyareaID=<?php echo $row['surveyareaID']; ?>"><button class='delete-administration'><i class='fa fa-trash'></i></button></a></td>
						</tr>
			<?php	}
				}
				?>

			</tbody>
			
		</table>
		</section>
		</section>

		<?php 
				if ($_SESSION['positionname'] === "Accreditation Task Force") {
					include 'nav_accre.php';
				}
				else if ($_SESSION['positionname'] === "Administration") {
					include 'navbar.php';
				}
	 ?> 
<!-- add administration
 -->


<div class="pop-up" id="add_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="overlay" role="document">
			<i class="fa fa-times add_exit"></i>
			<img src="photos/pup LOGO.png" style="margin-left:110px">
			<p>PUP-BATAAN</p>
			<hr>
			<h1>Survey Area</h1>
			
			<div class="adm_form">
		<form action = "crudadministration.php"method="post" enctype="multipart/form-data">
				<label for="programID">Program</label>
						<?php
						$sql = mysqli_query($con, "Select * from program");
				 		?>
						<select class="form-controls area_list" name="programID">
							<option value="">Select Program</option>
							<?php
							While($rows = $sql->fetch_assoc()) {
								$programname = $rows['programname'];
								$program_id = $rows['program_id'];
						Echo "<option value='$program_id'>$programname</option>";
							}

					 		?>
						</select>
				<label for="areaID">Area</label>
				<?php
				$sql = mysqli_query($con, "Select * from area");
				 ?>
				<select class="form-controls area_list" name="areaID">
					<option value="">Select Area</option>
					<?php
					While($rows = $sql->fetch_assoc()) {
						$areaname = $rows['areaname'];
						$areaID = $rows['areaID'];
						Echo "<option value='$areaID'>$areaname</option>";
					}

					 ?>
				</select>
				<textarea name="areades" placeholder="Description"></textarea>
				<label for="office_img">PPP file<small>(formats: pdf)</small></label>
				<input type="file" name="areappp" class="form-control">
				<label for="office_img">SS file<small>(formats: pdf)</small></label>
				<input type="file" name="areass" class="form-control">
				<label for="office_img">Additional File<small>(formats: pdf)</small></label>
				<input type="file" name="area_addfile" class="form-control">
				<button name="add_surveyarea" class="add_save add-administration">Save</button>
		</form>
	</div>
</div>

<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );
window.$ = window.jquery = require('./node_modules/jquery');
window.dt = require('./node_modules/datatables.net')();
window.$('#table_id').DataTable();

</script>

<script type="text/javascript">
    let add_btn = document.querySelector(".buttons");
            let exitModal = document.querySelector(".add_exit");
            let modal_ =document.querySelector(".pop-up .overlay");
            let blur_effect =document.querySelector(".body");
            let edit_btn = document.querySelector(".edit-administration");
            let exitEditModal = document.querySelector(".edit_exit");
            let edit_modal_ =document.querySelector(".pop-up-edit .overlay");

            add_btn.addEventListener("click", ()=>{
            modal_.style.display = "block";
            });
            exitModal.addEventListener("click", ()=>{
            modal_.style.display = "none";
            });

            add_btn.addEventListener("click", ()=>{
            blur_effect.style.filter = "blur(30px)";
            });
            exitModal.addEventListener("click", ()=>{
            blur_effect.style.filter = "blur(0px)";
            });
</script>

</body>
</html>
<?php } else {
	header("location: index.php");
}
?>