
<?php
    if(isset($_POST['reg'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $cnum = $_POST['cnum'];
        $email = $_POST['email'];
        $password1 = hash("sha512", $_POST['password1']);
        $password2 = hash("sha512", $_POST['password2']);

        include 'config.php';
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) != 0) {
            echo "<p>Email already in use!</p>";
        } else if ($password1 != $password2) {
            echo "<p>Passwords do not match!</p>";
        } else {
            $sql = "INSERT INTO users (first_name, last_name, contact_num, email, password) VALUES('$fname', '$lname', '$cnum', '$email', '$password1')";

            $res = mysqli_query($conn, $sql);

            if ($res) {
                echo "<h2>Registration Successful</h2>";

                echo "<p>Sign in to your account <a href='my_acc.php'>here</a></p>";
            } else {
                echo "<h2>Oops! Something went wrong</h2>";
            }
        }
    }
?>