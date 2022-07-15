<?php 
include 'crud/pup.php';
if (!empty($_GET['admin_id'])) {
 	$admin_id = $_GET['admin_id'];
 	$del_query = "DELETE FROM accounts WHERE adminID = '$admin_id'";
 	$result = mysqli_query($con, $del_query);
 	if ($result) {
 		header ("location: notif.php?success= The account was successfully rejected ");
 	}
 }
 ?>