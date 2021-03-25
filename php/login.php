
<?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];

        $password = hash("sha512", $_POST['password']);
        if(!empty($_POST["remember"])) 
    {
        setcookie( "email", $email, time() + 300);
        setcookie( "password", $password, time() + 300); 
    }
        include 'config.php';

        $sql = "SELECT * from users where email = '$email' && password = '$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {

            //session_start();
            $row = mysqli_fetch_array($result);
            echo "<h2>Login Successful</h2>";
            $_SESSION['login'] = true;
            $_SESSION['user'] = $row;
            header("location: index.php");
        } else {
            echo "<h2>Invalid username or password</h2>";
        }
    }

?>