
<?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];

        $password = hash("sha512", $_POST['password']);
        if(!empty($_POST["remember"])) {
            setcookie( "email", $email, time() + 300);
            setcookie( "password", $password, time() + 300); 
        }
        
        include __DIR__ . "/../config.php";

        $sql = "SELECT * from users where email = '$email' && password = '$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {

            //session_start();
            $row = mysqli_fetch_array($result);
            echo "<h2>Login Successful</h2>";
            $_SESSION['login'] = true;
            $_SESSION['user'] = $row;
            $_SESSION['type'] = $row['level'];
            echo "<script type='text/javascript'>window.location.href='index.php';</script>";
            //header("location: index.php");
        } else {
            $err_msg = "Invalid username or password";
            echo "<script type='text/javascript'>",
            "showAlert('form-alert','$err_msg');",
            "</script>";
            //echo $err_msg;
        }
    }

?>