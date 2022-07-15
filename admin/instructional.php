<?php 
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
Require'crud/pup.php';
$instructional ="SELECT m.materialID, p.program_id, p.prog_ac, m.yearlevel, m.semester, m.materialtitle_, m.materialdocument from instructional m JOIN program p on p.program_id = m.programID order by prog_ac asc, yearlevel asc, semester asc";
$run = mysqli_query($con, $instructional);
$instructionaltbl = mysqli_num_rows($run);
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
<title>Instructional Material</title>
</head>
<body>
<section class="body">
        <section class="index">
            <h1>Instructional Material</h1>
            <hr>

<button class="buttons" id="btn_add">ADD</button>
<?php if (isset($_GET['success'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:15px">
  <strong>Success:</strong> <?php echo $_GET['success']; ?>
  <a href="instructional.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>
</div>
<?php } ?>
<?php if (isset($_GET['error'])) { ?>
<div class="alert-success"><div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:15px">
  <strong>Error:</strong> <?php echo $_GET['error']; ?>
  <a href="instructional.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>
</div>
<?php } ?>
<div class="table">
<table id="table_id" class="display table table-striped table-bordered">
				<thead>
			<tr>
				<th>Program</th>
				<th>Year Level</th>
				<th>Semester</th>
				<th>Material Title</th>
				<th>Document</th>
				<th width="100px">Actions</th>
			</tr>
			</thead>
			<tbody>

				<?php 
				if (!empty($instructionaltbl)) {
					While($row = mysqli_fetch_assoc($run)) {
						?>
							<tr>
									<?php $row['materialID']; ?>
									<td><?php echo $row['prog_ac']; ?></td>
									<td><?php echo $row['yearlevel']; ?></td>
									<td><?php echo $row['semester']; ?></td>
									<td><?php echo $row['materialtitle_']; ?></td>
									<td><a href="instructionaldoc.php?materialID=<?php echo $row['materialID']; ?>" target="_blank"><button class='pdf'><i class='fa fa-file-pdf-o'></i></button></a></td>
									<td><a href="instructional_edit.php?materialID=<?php echo $row['materialID']; ?>"><button class='edit-administration'><i class='fa fa-pencil'></i></button></a><a href="crudadministration.php?materialID=<?php echo $row['materialID']; ?>"><button class='delete-administration'><i class='fa fa-trash'></i></button></a></td>

							</tr>

			<?php	}
				}
				?>

			</tbody>
			
		</table>
		</section>
		</section>

		<?php 
				if ($_SESSION['positionname'] === "Faculty") {
					include 'nav_faculty.php';
				}
				else if ($_SESSION['positionname'] === "Administration") {
					include 'navbar.php';
				}
	 ?> 


<!-- add administration
 -->
<style type="text/css">
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

<div class="pop-up" id="add_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="overlay" role="document">
			<i class="fa fa-times add_exit"></i>
			<img src="photos/pup LOGO.png" style="margin-left:110px">
			<p>PUP-BATAAN</p>
			<hr>
			<h1>Instructional Material</h1>
			
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
					<label>Year Level</label>
					<select class="form-controls" name="yearlevel">
						<option value="">Select Year</option>
						<option value="1st">1st Year</option>
						<option value="2nd">2nd Year</option>
						<option value="3rd">3rd Year</option>
						<option value="4th">4th Year</option>
						<option value="5th">5th Year</option>
					</select>
					<label>Semester</label>
					<select class="form-controls" name="semester">
					<option value="">Select Semester</option>
					<option value="1st">1st Sem</option>
					<option value="2nd">2nd Sem</option>
					<option value="Summer">Summer</option>
					</select>
				<input type="text" name="materialtitle_" placeholder="Title">
				<label for="office_img">Material Document<small>(formats: pdf)</small></label>
				<input type="file" name="materialdocument" class="form-control">
				<button name="add_material" class="add_save add-administration">Save</button>
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