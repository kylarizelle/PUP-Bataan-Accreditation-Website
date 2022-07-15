<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {

    Require'crud/pup.php';
    $admin ="SELECT * FROM accounts";
    $run = mysqli_query($con, $admin);
    $admintbl = mysqli_num_rows($run);
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
<title>Admin</title>
</head>
<body>
    <style>
        .show{
            margin-top: 50px;
        }
    </style>
<section class="body">
        <section class="index">
            <h1>Access Request</h1>
            <hr>
<?php if (isset($_GET['success'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success:</strong> <?php echo $_GET['success']; ?>
  <a href="notif.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>
</div>
<?php } ?>
<?php if (isset($_GET['error'])) { ?>
<div class="alert-success"><div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error:</strong> <?php echo $_GET['error']; ?>
  <a href="notif.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>
</div>
<?php } ?>

<div class="table">
<table id="table_id" class="display table table-striped table-bordered">
    <thead>
        <tr>
           <th>Name</th>
            <th>Position</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php 
                if (!empty($admintbl)) {
                    While($row = mysqli_fetch_assoc($run)) {
                        ?>
                            <tr>
                                    <?php $row['adminID']; ?>
                                    <td><?php echo $row['firstname_'].' '.$row['mi_'].' '.$row['lastname_']; ?></td>
                                    <td><?php echo $row['positionname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><a href="grant_request.php?adminID=<?php echo $row['adminID']; ?>"><button class='edit-administration'><i class='fa fa-check'></i></button></a><a href="del_request.php?admin_id=<?php echo $row['adminID']; ?>"><button class='delete-administration'><i class='fa fa-times'></i></button></a></td>

                            </tr>

            <?php   }
                }
                ?>
    </tbody>
</table>
</div>
</section>
</section>

<?php include 'navbar.php'; ?> 

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
<script type="text/javascript">
    let navLinks = document.querySelector(".nav-links");
    let pupArrow = document.querySelector(".pup-arrow");
    let programArrow = document.querySelector(".program-arrow");
    pupArrow.addEventListener("click", ()=> {
        navLinks.classList.toggle("show1");
        });

        programArrow.addEventListener("click", ()=> {
            navLinks.classList.toggle("show2");
        });
</script>

</body>
</html>
<?php
} else {
	header("location: index.php");
}
?>
