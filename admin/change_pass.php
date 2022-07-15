<?php 
    include'crud/pup.php';
    if(isset($_GET['adminID'])) {
        $adminID = $_GET['adminID'];
        $admin="SELECT * FROM account WHERE adminID = '$adminID'";
        $admin_query = mysqli_query($con, $admin);
        $admin_data = mysqli_num_rows($admin_query);
        $row= mysqli_fetch_assoc($admin_query);
    
    if(isset($_POST['submit'])) {
        if (!empty($_POST['password_']) && !empty($_POST['npassword']) && !empty($_POST['cpassword'])) {
            $password_ = $_POST['password_'];
            $npassword = $_POST['npassword'];
            $cpassword = $_POST['cpassword'];

            if ($row['adminID']) {
                
                $password_ = md5($password_);

                $sql = "SELECT adminID FROM account WHERE password_ = '$password_'";
                $check_query = mysqli_query($con,$sql);
                $count_email = mysqli_num_rows($check_query);
                if ($cpassword === $npassword) {
                    if( $row['password_'] === $password_) {
                        $npassword = md5($npassword);
                        $admin = "UPDATE account SET password_ = '$npassword' WHERE adminID = '$adminID'";
                        $run_query = mysqli_query($con,$admin);

                            if ($run_query) {
                                
                                header("location: index.php");
                                
                                
                            }
                    } else {
                            $_SESSION['error'] = "Cuurent password was incorrect";
                            header("location:change_password.php?adminID=".$row['adminID']."");
                            exit();
                    }
                }
                else {
                    $_SESSION['error'] = "New and Confirm password are not the same";
                    header("location:change_password.php?adminID=".$row['adminID']."");
                    exit();
                }
            }
        }
        else {
            $_SESSION['error'] = "Fill password and New password";
            header("location:change_password.php?adminID=".$row['adminID']."");
            exit();
        }
    } else if (isset($_POST['back'])) {
        header("location: settings.php");
    }

    }
    
    ?>