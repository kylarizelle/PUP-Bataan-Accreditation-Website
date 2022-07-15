			<?php 	Require'crud/pup.php';
			$admin ="SELECT a.admin_id, a.lastname_, a.firstname_, a.mi_, p.positionID, p.positionname, a.username, a.password_ FROM admin a JOIN position p ON p.positionID = a.positionID order by positionname asc";
			$run = mysqli_query($con, $admin);
			$admintbl = mysqli_num_rows($run);
	?>	

	<section class="body">
		<section class="index">
			<h1>Admin</h1>
			
			<hr>
			<button class="btn" id="btn_add">ADD</button>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error"> <?php echo $_GET['error']; ?>
			<?php } ?> <a href="dashboard_index.php"><i class="fa fa-times close"></a></i>
		</p>

		<?php if (isset($_GET['success'])) { ?>
				<p class="success"> <?php echo $_GET['success']; ?>
			<?php } ?> <a href="dashboard_index.php"><i class="fa fa-times close"></a></i>
		</p>
			<table class="tbl_admin">
				<thead>
			<tr>
				<th>Name</th>
				<th>Position</th>
				<th>Username</th>
				<th>Password</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody id="administration_list">

				<?php 
				if (!empty($admintbl)) {
					While($row = mysqli_fetch_assoc($run)) {
						?>
							<tr>
									<?php $row['admin_id']; ?>
									<td><?php echo $row['firstname_'].' '.$row['mi_'].' '.$row['lastname_']; ?></td>
									<td><?php echo $row['positionname']; ?></td>
									<td><?php echo $row['username']; ?></td>
									<td><?php echo $row['password_']; ?></td>
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


<!-- add administration
 -->


<div class="pop-up" id="add_administration_modal" tabindex="-1" role="dialog" aria-labeelledby="administration_modal" aria-hidden="true">
	<div class="overlay" role="document">
			<i class="fa fa-times add_exit"></i>
			<img src="photos/pup LOGO.png">
			<p>PUP-BATAAN</p>
			<hr>
			<h1>Admin</h1>
			
			<div class="adm_form">
		<form action = "crudadministration.php"method="post" enctype="multipart/form-data">
				<input type="text" name="lastname_" placeholder="Last Name">
				<input type="text" name="firstname_" placeholder="First Name">
				<input type="text" name="mi_" placeholder="Middle Initial">
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
				<input type="text" name="username" placeholder="Username">
				<input type="text" name="password_" placeholder="Password">
				<button name="add_admin" class="add_save add-administration">Save</button>
		</form>
	</div>
</div>

<script src="javascript/all.js"></script>

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

			// edit_btn.addEventListener("click", ()=>{
			// edit_modal_.style.display = "block";
			// });
			// exitEditModal.addEventListener("click", ()=>{
			// edit_modal_.style.display = "none";
			// });

			add_btn.addEventListener("click", ()=>{
			blur_effect.style.filter = "blur(30px)";
			});
			exitModal.addEventListener("click", ()=>{
			blur_effect.style.filter = "blur(0px)";
			});

			// edit_btn.addEventListener("click", ()=>{
			// blur_effect.style.filter = "blur(30px)";
			// });
			// exitEditModal.addEventListener("click", ()=>{
			// blur_effect.style.filter = "blur(0px)";
			// });
		</script>

		



</body>
</html>