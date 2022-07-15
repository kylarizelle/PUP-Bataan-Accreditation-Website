<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/about1.css">
	<link rel="stylesheet" type="text/css" href="footer1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>ABOUT PUP BATAAN</title>
</head>
<body>
	<section>
		<div class="header">

			<div class="text-box">
				<h1>ABOUT PUP-BATAAN</h1>
				</p>
				<hr>
				
			</div>
			
		</div>
	</section>

	<section class="aboutpup">

		<p>
		The Polytechnic University of the Philippines Bataan Branch has undergone a number of transformations since its inception in 1976. Now in its 37th year of existence, the University provides a wide range of educational services, which includes diploma courses, baccalaureate degree programs and post-baccalaureate degree in education.
		</p>
		

	</section>

<section class="title">
		<br>

	<center><h1 class="accomplish">PUP BATAAN ACCOMPLISHMENT</h1></center>

	</section>
<br>

<div class="container">
	<table class="table">
  		<thead class="table-dark">
   			<th>Year</th>
   			<th>ACCOMPLISHMENT</th>
  		</thead>
  		<tbody>
<?php
include 'db.php';
$accomplishment = "SELECT * FROM accomplishment ORDER BY year_ asc";
$run = mysqli_query($con, $accomplishment);
$accompishli = mysqli_num_rows($run);

if (!empty($accompishli)) {
	while ($row = mysqli_fetch_assoc($run)) {
?>

    	<tr>
    		<td><?php echo $row['year_']; ?></td>
    		<td><?php echo $row['achievement']; ?></td>
    	</tr>

<?php
	}
}
?>
  </tbody>
</table>
</div>

  <?php  include 'footer.php';?>
   <?php  include 'nav.php';?>
 
 <script src="pup.js"></script>

</body>
</html>