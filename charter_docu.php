
<?php include 'db.php';

if (isset($_GET['exhibitID']) && $_GET['exhibitID']!="") {
	$exhibitID = $_GET['exhibitID'];
	$exhibitID_query = "SELECT * FROM exhibit WHERE exhibitID= '$exhibitID'";
	$exhibitID_result =mysqli_query($con, $exhibitID_query);
    $exhibitID_data = mysqli_num_rows($exhibitID_result);

    if (!empty($exhibitID_result)) {
        while ($row = mysqli_fetch_assoc($exhibitID_result)) {
            if(!empty($row['documents'])) {
            ?>
            
            <link rel="shortcut icon"  href="PUP LOGO.png">    
            <center>
            <h1><?php echo $row['exhibitname']; ?></h1>

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
}
?>

