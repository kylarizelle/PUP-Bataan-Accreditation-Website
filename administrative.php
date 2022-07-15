<!DOCTYPE html>
<html lang="en" dir="ltr">
<html>
<head>
	<link rel="shortcut icon"  href="PUP LOGO.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="css/administrative1.css">
	<link rel="stylesheet" type="text/css" href="footer1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>PUP BATAAN ADMINISTRATIVE MANUAL</title>
</head>
<body>
	<section>
		<div class="header">

			<div class="text-box">
				<h1>PUP ADMINISTRATIVE MANUAL</h1>
				</p>
				<hr>
				
			</div>
			
		</div>
	</section>
<br>

<!-- <div class="card mb-3" style="max-width: 1200px; margin-left:100px">
  <div class="row g-0">
    <div class="col-md-4">
	<a href="charter_docu.php?exhibitID=4" target="_blank"><img src="photos/pdf.png" class="img-fluid rounded-start" alt="..." width="10%"></a>
	Administrative Manual
    </div>
  </div>
</div> -->
<?php include 'db.php';


	$exhibitID_query = "SELECT * FROM exhibit WHERE exhibitID= 4";
	$exhibitID_result =mysqli_query($con, $exhibitID_query);
    $exhibitID_data = mysqli_num_rows($exhibitID_result);

    if (!empty($exhibitID_result)) {
        while ($row = mysqli_fetch_assoc($exhibitID_result)) {
            if(!empty($row['documents'])) {
            ?>
            
            <link rel="shortcut icon"  href="PUP LOGO.png">    
            <center>
            <h1 style="text-transform: uppercase;"><?php echo $row['exhibitname']; ?></h1>

            <embed type="application/pdf" src="admin/documents/<?php echo $row['documents']; ?>" width="700" height="900"></embed></center>
            <?php
            }
         else {
            ?>
        <link rel="shortcut icon"  href="PUP LOGO.png">
        <center><h1>No data available</h1></center>
            <?php
        }
    }
    }
?>
<br>
<br>

<!-- <center>

<div class="pdf">
		<embed src="try.pdf" type="application/pdf">
			
		</embed>
		</div>
		
	</div>

</center> -->

  <?php  include 'footer.php';?>
   <?php  include 'nav.php';?>
 
 <script src="pup.js"></script>

</body>
</html>