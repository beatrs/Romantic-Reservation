<?php
    if (isset($_POST[''])) {
        $details = $_SESSION['user'];
        $verifyPassword = hash("sha512", $_POST['verifyPassword']);
        $user_id = $details['id'];

        $sql = "SELECT * FROM users where id = '$user_id' AND password = '$verifyPassword'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {

            $first_name = $_POST['fname'];
            $last_name = $_POST['lname'];
            $email = $_POST['email'];
            $contact_num = $_POST['cnum'];
            $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', contact_num = $contact_num WHERE id = '$user_id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $sql = "SELECT * from users where id='$user_id'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) == 1) {

                    $row = mysqli_fetch_array($result);
                    unset($_SESSION['login']);
                    unset($_SESSION['user']);
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $row;
                    
                } else {}
                echo '<script type="text/javascript">
                alert("Update Successful.");
                reload_page();
                </script>';

            }
            //header("location: index.php");
        } else {
            $err_msg = "Incorrect password.";
            echo "<script type='text/javascript'>",
            "showVerifyPword();",
            "showAlert('verify-alert','$err_msg');",
            "</script>";
        }
    }

    if(isset($_POST['change_pass'])) {
        $old_pass = hash("sha512", $_POST['old_password']);
        $unhashed_pword1 = $_POST['new_password1'];
        $new_pass1 = hash("sha512", $_POST['new_password1']);
        $new_pass2 = hash("sha512", $_POST['new_password2']);

        $details = $_SESSION['user'];
        function showError($err_msg) {
            echo "<script type='text/javascript'>",
            "showAlert('changePword-alert', '$err_msg');",
            "</script>";
        }
        if ($old_pass != $details['password']) {
            $err_msg = "Entered old password is incorrect.";
            showError($err_msg);
            
        }
        else if ($new_pass1 != $new_pass2) {
            $err_msg = "New password and Re-Enter new password should be the same.";
            showError($err_msg);
            
        } else if(strlen($unhashed_pword1) < 4) {
            // tell the user something went wrong
            //echo $alert_trg;
            $err_msg = "Password should be at least 4 characters long.";
            showError($err_msg);
            
        } else {
            $user_id = $details['id'];
            $sql = "UPDATE users SET password='$new_pass1' WHERE id='$user_id'";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script type='text/javascript'>",
                "showSuccess();",
                "</script>";
            } else {
                echo "<p>Oops! Something went wrong.</p>";
            }
        }
    }
    
    if(isset($_POST['confirm'])) {
        $confirmPassword = hash("sha512", $_POST['confirmPassword']);
        $user_id = $details['id'];

        $sql = "SELECT * FROM users where id = '$user_id' AND password = '$confirmPassword'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $sql="DELETE from users where id = '$user_id'";

            if ($result) {
                $result = mysqli_query($conn, $sql);
                unset($_SESSION['login']);
                unset($_SESSION['user']);
                echo '<script type="text/javascript">
                alert("Account Deleted!");
                reload_page();
                </script>';
            }
            else {
                $err_msg = "Incorrect password.";
                echo "<script type='text/javascript'>",
                "showVerifyDel();",
                "showAlert('verify-alert','$err_msg');",
                "</script>";
            }
        }
    }
?>
<script src="js/main.js"></script>