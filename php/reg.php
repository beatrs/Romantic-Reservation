
<?php
    if(isset($_POST['reg'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $cnum = $_POST['cnum'];
        $email = $_POST['email'];
        $unhashed_pword1 = $_POST['password1'];
        $unhashed_pword2 = $_POST['password2'];
        $password1 = hash("sha512", $_POST['password1']);
        $password2 = hash("sha512", $_POST['password2']);

        //! PASSWORD REGEX IN CASE
        /* $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        // tell the user something went wrong
        } */

        include 'config.php';
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $sql);
        $err_msg = "";
        //$alert_trg = "<script type='text/javascript'>showAlert();</script>";
        function showError($err_msg) {
            echo "<script type='text/javascript'>",
            "showAlert('form-alert','$err_msg');",
            "</script>";
        }
        if(mysqli_num_rows($res) != 0) {
            //echo "<p>Email already in use!</p>";
            $err_msg = "Email already in use!";
            showError($err_msg);
        } else if(strlen($unhashed_pword1) < 4 || strlen($unhashed_pword2) < 4) {
            // tell the user something went wrong
            //echo $alert_trg;
            $err_msg = "Password should be at least 4 characters long.";
            showError($err_msg);
        } else if ((ctype_alnum($unhashed_pword1) || ctype_alnum ($unhashed_pword2)) == false){
            // tell the user something went wrong
            //echo $alert_trg;
            $err_msg = "Password should contain letters and numbers.";
            showError($err_msg);
        } else if ((preg_match('/[A-Z]/', $unhashed_pword1) || preg_match('/[A-Z]/', $unhashed_pword2)) == 0){
            // tell the user something went wrong
            //echo $alert_trg;
            $err_msg = "Password should contain at least ONE uppercase letter.";
            showError($err_msg);
        } else if ($password1 != $password2) {
            //echo "<p>Passwords do not match!</p>";
            //echo $alert_trg;
            $err_msg = "Passwords do not match!";
            showError($err_msg);
        } else {
            $sql = "INSERT INTO users (first_name, last_name, contact_num, email, password, level) VALUES('$fname', '$lname', '$cnum', '$email', '$password1', 0)";

            $res = mysqli_query($conn, $sql);

            if ($res) {
                echo "<script type='text/javascript'>",
                "showSuccess();",
                "</script>";
            } else {
                echo "<h2>Oops! Something went wrong</h2>";
            }
        }
    }
?>