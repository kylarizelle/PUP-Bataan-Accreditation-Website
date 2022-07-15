<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/laboratory.css">
	<link rel="stylesheet" type="text/css" href="footer1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>PUP BATAAN'S lABORATORY</title>
</head>
<body>
	<section>
		<div class="header">

			<div class="text-box">
				<h1>LABORATORY</h1>
				</p>
				<hr>
				
			</div>
			
		</div>
	</section>

<?php 
include 'db.php';
$laboratory = "SELECT * FROM laboratory";
$laboratory_query = mysqli_query($con, $laboratory);
$laboratory_data = mysqli_num_rows($laboratory_query);

if (!empty($laboratory_data)) {
	while ($row = mysqli_fetch_assoc($laboratory_query)) {
		?>
	<section class="title">
		<br>

	<center><h1 class="past" style="text-transform: uppercase;"><?php echo $row['labtitle']; ?></h1></center>

	</section>
<br>

<center>
	<img src="admin/photos/<?php echo $row['lab_img']; ?>" class="img-fluid" alt="..." width="80%">
</center>
<?php
	}
}
?>
	
<!-- <section class="title">
		<br>

	<center><h1 class="past">COMPUTER LABORATORY</h1></center>

	</section>

	<section class="title">
		<br>

	<center><h1 class="past">SPEECH LABORATORY</h1></center>

	</section> -->



  <?php  include 'footer.php';?>
  <?php  include 'nav.php';?>
 
 <script src="pup.js"></script>

</body>
</html>