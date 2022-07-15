
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
include 'crud/pup.php';

    if (isset($_GET['adminID']) && $_GET['adminID']!="") {
        $adminID = $_GET['adminID'];
        $adminID_query = "SELECT * FROM accounts WHERE adminID= '$adminID'";
        $adminID_result =mysqli_query($con, $adminID_query);
        $adminID_data = mysqli_num_rows($adminID_result);

        if(!empty($adminID_data)) {
            $row = mysqli_fetch_assoc($adminID_result);

                $lastname = $row['lastname_'];
                $firstname = $row['firstname_'];
                $mi = $row['mi_'];
                $position = $row['positionname'];
                $user = $row['username'];
                $pass = $row['password_'];
                
                $grant = "INSERT INTO account(lastname_, firstname_, mi_, positionname, username, password_) VALUES('$lastname', '$firstname', '$mi', '$position', '$user', '$pass')";
                $run = mysqli_query($con, $grant);

                if ($run) {
                    $del_query = "DELETE FROM accounts WHERE adminID = '$adminID'";
                    $result = mysqli_query($con, $del_query);
                    if ($result) {
                    header("location: admin.php?success= The access request was granted");
                    exit();
                    }
                }
        }
    }

} else {
	header("location: index.php");
} ?>