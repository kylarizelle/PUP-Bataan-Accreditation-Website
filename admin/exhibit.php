<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
		 	Require'crud/pup.php';
			$exhibit ="SELECT * FROM `exhibit`";
			$run = mysqli_query($con, $exhibit);
			$exhibittbl = mysqli_num_rows($run);
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
<title>exhibit</title>
<style type="text/css">

.add-administration {
    width: 30px;
    height: 30px;
    background: green;
    outline: none;
    border: none;
    cursor: pointer;
 }

.add-administration:focus,
.add-administration:hover{
    background: darkblue;
}
.add-administration .fa-add {
    font-size: 15px;
    color: white;
}

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

<body>
<section class="body">
        <section class="index">
            <h1>Exhibit</h1>
            <hr>

<!-- <button class="buttons" id="btn_add">ADD</button> -->
<?php if (isset($_GET['success'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:50px">
  <strong>Success:</strong> <?php echo $_GET['success']; ?>
  <a href="exhibit.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>
</div>
<?php } ?>
<?php if (isset($_GET['error'])) { ?>
<div class="alert-success"><div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:50px">
  <strong>Error:</strong> <?php echo $_GET['error']; ?>
  <a href="exhibit.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>
</div>
<?php } ?>
<div class="table">
<table id="table_id" class="display table table-striped table-bordered">
				<thead>
			<tr>
				<th>Exhibit Title</th>
				<th>Documents</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>

				<?php 
				if ($exhibittbl) {
					While($row = mysqli_fetch_assoc($run)) {
						?>
							<tr>
									<td><?php echo $row['exhibitname']; ?></td>
									<?php if(!empty($row['documents'])) {?>
									<td><a href="exhibit_view.php?exhibitID=<?php echo $row['exhibitID']; ?>" target="_blank"><button class='pdf'><i class='fa fa-file-pdf-o'></i></button></a>&nbsp;<?php echo $row['documents']; ?></td>
									<?php } else {?>
									<td>N/A</td>
									<?php }?>
									<td><a href="exhibit_edit.php?exhibitID=<?php echo $row['exhibitID']; ?>"><button class='add-administration'><i class='fa fa-plus'></i></button></a></td>

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


<!-- <div class="pop-up" id="add_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="overlay" role="document">
			<i class="fa fa-times add_exit"></i>
			<img src="photos/pup LOGO.png">
			<p>PUP-BATAAN</p>
			<hr>
			<h1>Exhibt</h1>
			
			<div class="adm_form">
		<form action = "crudadministration.php"method="post" enctype="multipart/form-data">
				<label for="office_img">Documents<small>(formats: jpg, jpeg, png)</small></label>
				<input type="file" name="documents" class="form-control">
				<button name="add_exhibit" class="add_save add-administration">Save</button>
		</form>
	</div>
</div> -->

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