<?php 
    include'crud/pup.php';
    if(isset($_GET['adminID'])) {
        $adminID = $_GET['adminID'];
        $admin="SELECT * FROM account WHERE adminID = '$adminID'";
        $admin_query = mysqli_query($con, $admin);
        $admin_data = mysqli_num_rows($admin_query);
        $row= mysqli_fetch_assoc($admin_query);
    
    if(isset($_POST['submit'])) {
        if (!empty($_POST['lastname_']) && !empty($_POST['firstname_']) && !empty($_POST['mi_']) && !empty($_POST['username']) && !empty($_POST['password_'])) {
            $lastname_ = $_POST['lastname_'];
            $firstname_ = $_POST['firstname_'];
            $mi_ = $_POST['mi_'];
            $username = $_POST['username'];
            $password_ = $_POST['password_'];

            if ($row['adminID']) {
                
                $password_ = md5($password_);

                $sql = "SELECT adminID FROM account WHERE password_ = '$password_'";
                $check_query = mysqli_query($con,$sql);
                $count_email = mysqli_num_rows($check_query);
                if( $row['password_'] === $password_) {

                    $admin = "UPDATE account SET lastname_ = '$lastname_', firstname_ = '$firstname_', mi_ = '$mi_', username = '$username' WHERE adminID = '$adminID' ";
                    $run_query = mysqli_query($con,$admin);

                        if ($run_query) {
                            header("location: settings.php");
                            
                        }
                } else {
                        $_SESSION['error'] = "Incorrect Password";
                        header("location:acc_validation.php?adminID=".$row['adminID']."");
                        exit();
                }
            }
        }
        else {
            $_SESSION['error'] = "All fields are required";
            header("location:acc_validation.php?adminID=".$row['adminID']."");
            exit();
        }
    } else if (isset($_POST['back'])) {
        header("location: settings.php");
    }

    }
    
    ?>