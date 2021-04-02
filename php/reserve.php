<?php

    function showError($err_msg) {
        echo "<script type='text/javascript'>",
        "showAlert('reserve-alert', '$err_msg');",
        "</script>";
    }

    //see available tables
    if (isset($_POST['see'])) {
        /**get from db */
        $res_date = $_POST['res_date'];
        $res_time = $_POST['time'];
        $_SESSION['set-date'] = $res_date;
        $_SESSION['set-time'] = $res_time;
        $sql = "SELECT * FROM users_reservations WHERE reserve_date='$res_date' AND reserve_time='$res_time' AND status=1";
        $res = mysqli_query($conn, $sql);
        $types = array();

        while(($row =  mysqli_fetch_assoc($res))) {
            $types[] = $row['table_id'];
        }
        for ($i = 0; $i < count($types); $i++) {
            $arg_table = $types[$i];
            echo "<script type='text/javascript'>",
            "change_color('$arg_table', 'gray');",
            "</script>";
        }
    }

    /** submit reservation */
    if(isset($_POST['save'])) {
        $res = $_POST['reserved'];

        $res = trim($res);
        if (empty($res)) {
            echo "empty";
        }

        if (!empty($_SESSION['user'])) {
            $details = $_SESSION['user'];
            $user_id = $details['id'];
        }


        $arr_tables = explode(" ", $res);

        $res_date = $_SESSION['set-date'];
        $res_time = $_SESSION['set-time'];

        $now = date("Y-m-d");

        if ($res_date >= $now) {
            if (!empty($_SESSION['user'])) {
                if (!empty($res) && $res != 'null') {
                    for ($i = 0; $i < count($arr_tables); $i++) {
                        $table_id = $arr_tables[$i];
                        $sql = "SELECT * FROM users_reservations WHERE table_id = '$table_id' AND reserve_date='$res_date' AND reserve_time='$res_time' AND status=1";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) == 0) {
                            $sql = "INSERT INTO users_reservations (user_id, table_id, reserve_date, reserve_time, status) VALUES ('$user_id', '$table_id', '$res_date', '$res_time', 1)";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {

                            } else {
                                $sql = "UPDATE users_reservations SET status=1 WHERE user_id='$user_id' AND table_id='$arr_tables[$i]' AND reserve_date='$res_date' AND reserve_time='$res_time' AND status=0 ";
                                $result = mysqli_query($conn, $sql);
                            }
                                echo "<script type='text/javascript'>",
                                "showSuccessMsg('Reservation made successfully');",
                                "</script>";
                        }
                    }
                } else {
                    $err_msg = "No table chosen.";
                    showError($err_msg);
                }
            } else {
                    echo "<script type='text/javascript'>",
                                "showMsg();",
                                "</script>";
            }
        } else {
                    $err_msg = "Invalid date entered.";
                    showError($err_msg);
        }


    } else {}

    /**edit reservation */
    if(isset($_POST['edit'])) {
        echo "edit works";
        $res_det = $_POST['reserve_det'];
        $res_det = explode(",", $res_det);
        $user_id = $res_det[0];
        $table_id = $res_det[1];
        $res_date = $res_det[2];
        $res_time = $res_det[3];
        echo "<script type='text/javascript'>
                console.log('hello');
                toggleSeeAvailable();
                </script>";

        $_SESSION['set-date'] = $res_date;
        $_SESSION['set-time'] = $res_time;
        //turn non-edit to gray
        $sql = "SELECT * FROM users_reservations WHERE reserve_date='$res_date' AND reserve_time='$res_time' AND status=1";
        $res = mysqli_query($conn, $sql);
        $types = array();

        while(($row =  mysqli_fetch_assoc($res))) {
            $types[] = $row['table_id'];
        }
        for ($i = 0; $i < count($types); $i++) {
            $arg_table = $types[$i];
            echo "<script type='text/javascript'>",
            "change_color('$arg_table', 'gray');",
            "</script>";
        }

        //turn selected edit to red
        $sql = "SELECT * FROM users_reservations WHERE user_id='$user_id' AND table_id='$table_id' AND reserve_date='$res_date' AND reserve_time='$res_time' AND status=1";
        $res = mysqli_query($conn, $sql);
        $types = array();

        while(($row =  mysqli_fetch_assoc($res))) {
            $types[] = $row['table_id'];
        }
        for ($i = 0; $i < count($types); $i++) {
            $arg_table = $types[$i];
            echo "<script type='text/javascript'>",
            "change_color('$arg_table', 'red');",
            "</script>";
        }

        //cancel previous
        $sql = "UPDATE users_reservations SET status=0 WHERE user_id='$user_id' AND table_id='$table_id' AND reserve_date='$res_date' AND reserve_time='$res_time' AND status=1 ";
        $res = mysqli_query($conn, $sql);
        if ($res) {
           /*  echo "<script type='text/javascript'>",
                "window.alert('reservation cancelled successfully');",
                "reload_page();",
                "</script>"; */
        } else {
            //echo "something went wrong";
        }
    }

    /**cancel reservation */
    if (isset($_POST['cancel'])) {
        $res_det = $_POST['reserve_det'];
        $res_det = explode(",", $res_det);
        $user_id = $res_det[0];
        $table_id = $res_det[1];
        $res_date = $res_det[2];
        $res_time = $res_det[3];

        $msg = "You are cancelling reservation for table ".$table_id." scheduled on ".$res_date." (".$res_time.")";
        echo "<script type='text/javascript'>",
        "showCancelConfirm('$msg');",
        "</script>";

        $_SESSION['cancel-id'] = $user_id;
        $_SESSION['cancel-tbl'] = $table_id;
        $_SESSION['cancel-date'] = $res_date;
        $_SESSION['cancel-time'] = $res_time;

        //header("location:../my_acc.php");
    }

    if (isset($_POST['cancel-confirm'])) {
        $user_id = $_SESSION['cancel-id'];
        $table_id = $_SESSION['cancel-tbl'];
        $res_date = $_SESSION['cancel-date'];
        $res_time = $_SESSION['cancel-time'];

        $sql = "UPDATE users_reservations SET status=0 WHERE user_id='$user_id' AND table_id='$table_id' AND reserve_date='$res_date' AND reserve_time='$res_time' AND status=1 ";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "<script type='text/javascript'>",
            "showSuccessMsg('Reservation cancelled successfully');",
            "</script>";
        } else {
            echo "something went wrong";
        }
    }
?>