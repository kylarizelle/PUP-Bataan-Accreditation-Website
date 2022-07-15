<?php 
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon"  href="photos/PUP LOGO.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Account</title>
    </head>
    <style>
        .admin {
            position: fixed;
            margin-top: 100px;
        }
        .name {
            position: fixed;
            margin-left:400px;
        }
        .update {
            margin-left:750px;
            position:fixed;
            margin-top:100px;
        }
        .update-set {
            width: 500px;
        }
    </style>
    <body>

<div class="admin">
    <center>
        <img src="edit/administrator.png" class="img-fluid" alt="..." width="20%"></a>
    <h3><?php echo $_SESSION['positionname']; ?></h3>
    <br>
    </center>
    <div class="name">
        <b><p>Name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $_SESSION['firstname_'] ?> <?php echo $_SESSION['mi_'] ?> <?php echo $_SESSION['lastname_'] ?></p>
        <b><p>username:</b>&nbsp;&nbsp;<?php echo $_SESSION['username'] ?></p>

    </div>
</div>
<div class="update">
<?php
include 'change_pass.php';
    if(isset($_SESSION['error'])){
?>
	    <p style="color:red; "><?php echo $_SESSION['error']; ?></p>

<?php	unset($_SESSION['error']);			
		}
        
    ?>
    <div class="mb-3">
        <form method="post" >
        <label  class="form-label">Current Password:</label>
        <input type="password" class="form-control" name="password_">
        <label  class="form-label">New Password:</label>
        <input type="password" class="form-control" name="npassword" >
        <label  class="form-label">Confirm Password:</label>
        <input type="password" class="form-control" name="cpassword" >
        <br>
        <button class="btn btn-danger" name="back">Back</button>
        <button class="btn btn-success" name="submit" style="margin-left:150px;">Submit</button>
        
        </form>
    </div>
</div>

    <?php 
				if ($_SESSION['positionname'] === "Faculty") {
					include 'nav_faculty.php';
				}
				else if ($_SESSION['positionname'] === "Administration") {
					include 'navbar.php';
				}
                else if ($_SESSION['positionname'] === "Accreditation Task Force") {
					include 'nav_accre.php';
				}
	 ?> 
        </body>
        </html>
    <?php

} else {
	header("location: index.php");
}
?>