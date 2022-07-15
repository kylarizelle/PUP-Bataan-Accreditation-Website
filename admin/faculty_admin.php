	<?php require 'crud/pup.php';
	$faculty = "SELECT a.adminID, a.fullname, a.professionalname, a.image_, p.positionID, p.positionname, ar.areaID, ar.areaname FROM administration a JOIN position p on p.positionID = a.positionID JOIN area ar ON ar.areaID = a.areaID";
	$run = mysqli_query($con, $faculty);
	$facultytbl = mysqli_num_rows($run);
	?>
		
	<section class="body">
		<section class="index">
			<h1>Administration</h1>
			<hr>
			<button class="btn" id="btn_add">ADD</button>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error"> <?php echo $_GET['error']; ?>
			<?php } ?> <a href="faculty_admin.php"><i class="fa fa-times close"></a></i>
		</p>

		<?php if (isset($_GET['success'])) { ?>
				<p class="success"> <?php echo $_GET['success']; ?>
			<?php } ?> <a href="faculty_admin.php"><i class="fa fa-times close"></a></i>
		</p>
			<table class="tbl_admin">
				<thead>
			<tr>
				<th>#</th>
				<th>Position</th>
				<th>Area</th>
				<th>Full Name</th>
				<th>Professional Name</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody id="administration_list">

				<?php 
				// Require'crud/pup.php';

				// $sql = mysqli_query($con, "SELECT a.adminID, a.fullname, a.professionalname, a.image_, p.positionID, p.positionname, ar.areaID, ar.areaname FROM administration a JOIN position p ON p.positionID = a.positionID JOIN area ar ON ar.areaID = a.areaID");
				// 		While($row = mysqli_fetch_array($sql)) {
				// 			Echo "<tr>
				// 					<td>".$row['adminID']."</td>
				// 					<td>".$row['positionname']."</td>
				// 					<td>".$row['areaname']."</td>
				// 					<td>".$row['fullname']."</td>
				// 					<td>".$row['professionalname']."</td>
				// 					<td><img src='../photos/".$row['image_']." 'width='60' height='60'/></td>
				// 					<td><button class='edit-administration'><i class='fa fa-pencil'></i></button><button class='delete-administration'><i class='fa fa-trash'></i></button></td>

				// 			</tr>";
				// 		}

				if (!empty($facultytbl)) {
					While($row = mysqli_fetch_assoc($run)) {
						?>

						<tr>
							<td> <?php echo $row['adminID']; ?> </td>
							<td> <?php echo $row['positionname']; ?> </td>
							<td> <?php echo $row['areaname']; ?> </td>
							<td> <?php echo $row['fullname']; ?> </td>
							<td> <?php echo $row['professionalname']; ?> </td>
				<?php echo "<td><img src='../photos/".$row['image_']." 'width='60' height='60'/></td>" ?>
							<td><a href="edit_admin.php?admin_id=<?php echo $row['admin_id']; ?>"><button class='edit-administration'><i class='fa fa-pencil'></i></button></a><a href="crudadministration.php?admin_id=<?php echo $row['admin_id']; ?>"><button class='delete-administration'><i class='fa fa-trash'></i></button></a></td>
						</tr>
			<?php	}
				}

				?>
				
			</tbody>
			
		</table>
		</section>
	</section>

		<?php  include 'navbar.php';?>

<div class="pop-up" id="add_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="overlay" role="document">
			<i class="fa fa-times add_exit"></i>
			<img src="photos/pup LOGO.png">
			<p>PUP-BATAAN</p>
			<hr>
			<h1>Administration</h1>
			<div class="adm_form">
		<form id="add_administration_form" enctype="multipart/form-data">

				
				<input type="text" name="fullame" id="fullname" placeholder="Full Name">

				
				<input type="text" name="professionalname" id="professionalname" placeholder="Professional Name">

				<label for="positionID">Position</label>
				<?php

				$sql = mysqli_query($con, "Select * from position");
				 ?>
				<select class="form-control position_list" name="positionID">
					<option value="">Select Position</option>
					<?php
					While($rows = $sql->fetch_assoc()) {
						$positionname = $rows['positionname'];
						$positionID = $rows['positionID'];
						Echo "<option value='$positionID'>$positionname</option>";
					}

					 ?>
				</select>

				<label for="areaID" >Area <small>(This option is only for Accreditation task force)</small></label>
				<?php

				$sql = mysqli_query($con, "Select * from area");
				 ?>
				<select class="form-control area_list" name="areaID" placeholder="Select Area">
					<option value="">Select Area</option>
					<?php
					While($rows = $sql->fetch_assoc()) {
						$areaname = $rows['areaname'];
						$areaID = $rows['areaID'];
						Echo "<option value='$areaID'>$areaname</option>";
					}

					 ?>
				</select>

				<label for="image_">Image
				<small>(format: jpg, jpeg, png)</small>
				</label>
				<input type="file" name="image_" class="form-control">
			</div>
			<input type="hidden" name="add_administration" value="1">
				<button class="add_save add-administration">Save</button>
		</form>
	</div>
</div>


		<script type="text/javascript">
			let add_btn = document.querySelector(".btn");
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

			edit_btn.addEventListener("click", ()=>{
			edit_modal_.style.display = "block";
			});
			exitEditModal.addEventListener("click", ()=>{
			edit_modal_.style.display = "none";
			});

			add_btn.addEventListener("click", ()=>{
			blur_effect.style.filter = "blur(30px)";
			});
			exitModal.addEventListener("click", ()=>{
			blur_effect.style.filter = "blur(0px)";
			});

			edit_btn.addEventListener("click", ()=>{
			blur_effect.style.filter = "blur(30px)";
			});
			exitEditModal.addEventListener("click", ()=>{
			blur_effect.style.filter = "blur(0px)";
			});
		</script>

		



</body>
</html>