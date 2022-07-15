<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/library1.css">
	<link rel="stylesheet" type="text/css" href="footer1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>PUP BATAAN'S LIBRARY</title>
</head>
<style type="text/css">
.cardx {
	margin: 0 auto;
	max-width: 1350px;
	display: grid;
	grid-template-columns: repeat(4,1fr);
	gap: 5px;
}

.card {
	margin-top: 10px;
	margin-left: 20px;
	margin-right: 20px;
	text-decoration: none;
}



@media(max-width: 900px) {
.cardx {
	margin: 0 auto;
	max-width: 1350px;
	display: grid;
	grid-template-columns: repeat(2,1fr);
	gap: 5px;
}
}

@media(max-width: 400px) {
	.cardx {
	margin: 0 auto;
	max-width: 1350px;
	display: grid;
	grid-template-columns: repeat(2,1fr);
	gap: 5px;
}}
</style>
<body>
	<section>
		<div class="header">

			<div class="text-box">

				<p>LIBRARY</p>
				<hr>
				
			</div>
			
		</div>
	</section>

<?php
include 'db.php';
$library = "SELECT sslibraryID, ss FROM sslibrary";
$library_query = mysqli_query($con, $library);
$library_data = mysqli_num_rows($library_query);
$count = 0;
$newrow = true;
if (!empty($library_data)) {
	while ($row = mysqli_fetch_assoc($library_query)) {

		?>

<div class="card mb-3" style="max-width: 1200px; margin-left:100px">
  <div class="row g-0">
    <div class="col-md-4">
	<a href="libraryssview.php?sslibraryID=<?php echo $row['sslibraryID']; ?>" target="_blank"><img src="photos/pdf.png" class="img-fluid rounded-start" alt="..." width="10%"></a>
	Self Survey
    </div>
  </div>
</div>
<br>
			<?php

	}
}
?>



<br>
<br>
<br>
<br>
<br>
<br>
  <?php  include 'footer.php';?>
  <?php  include 'nav.php';?>
 
 <script src="pup.js"></script>

</body>
</html>