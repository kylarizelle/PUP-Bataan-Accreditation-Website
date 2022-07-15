<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	 require 'crud/pup.php';
	$actprogram = "SELECT a.actprogID, p.program_id, p.programname, a.activity_prog, a.act_img FROM actprogram a JOIN program p on p.program_id = a.programID order by programname asc";
	$run = mysqli_query($con, $actprogram);
	$actprogramtbl = mysqli_num_rows($run);
	?>

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
<title>Program Activity</title>
</head>
<body>
<section class="body">
        <section class="index">
            <h1>Program Activity</h1>
            <hr>

<button class="buttons" id="btn_add">ADD</button>
<?php if (isset($_GET['success'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success:</strong> <?php echo $_GET['success']; ?>
  <a href="prog-activity.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>
</div>
<?php } ?>
<?php if (isset($_GET['error'])) { ?>
<div class="alert-success"><div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error:</strong> <?php echo $_GET['error']; ?>
  <a href="prog-activity.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>
</div>
<?php } ?>
<div class="table">
<table id="table_id" class="display table table-striped table-bordered">
				<thead>
			<tr>
				<th width="400px;">Program Name</th>
				<th>Program Activity</th>
				<th>Pictures</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>

				<?php 
				if (!empty($actprogramtbl)) {
					While($row = mysqli_fetch_assoc($run)) {
						?>

						<tr>
							<?php $row['actprogID']; ?>
							<td> <?php echo $row['programname']; ?> </td>
							<td> <?php echo $row['activity_prog']; ?> </td>
				<?php echo "<td><img src='../admin/photos/".$row['act_img']." 'width='60' height='60'/></td>" ?>
							<td><a href="prog-activity_edit.php?actprogID=<?php echo $row['actprogID']; ?>"><button class='edit-administration'><i class='fa fa-pencil'></i></button></a><a href="crudadministration.php?actprogID=<?php echo $row['actprogID'];  ?>"><button class='delete-administration'><i class='fa fa-trash'></i></button></a></td>
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


<div class="pop-up" id="add_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="overlay" role="document">
			<i class="fa fa-times add_exit"></i>
			<img src="photos/pup LOGO.png" style="margin-left:110px">
			<p>PUP-BATAAN</p>
			<hr>
			<h1>Program Activity</h1>
			
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
				
				<input type="text" name="activity_prog" placeholder="Name of Activity">
				<label for="image_">Image<small>(formats: jpg, jpeg, png)</small></label>
				<input type="file" name="act_img" class="form-control">
				<button name="add_actprogram" class="add_save add-administration">Save</button>
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