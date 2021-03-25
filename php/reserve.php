<?php
    
   /*  $sql = "SELECT * FROM users_reservations WHERE status=1";
    $res = mysqli_query($conn, $sql);
    $types = array();

    while(($row =  mysqli_fetch_assoc($res))) {
        $types[] = $row['table_id'];
    }
    echo var_dump($types);
    for ($i = 0; $i < count($types); $i++) {
        $arg_table = $types[$i];
        echo $arg_table;
        echo "<script type='text/javascript'>",
        "change_color('$arg_table');",
        "</script>";
    } */
    
    //$show = false;
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
        //echo var_dump($types);
        for ($i = 0; $i < count($types); $i++) {
            $arg_table = $types[$i];
            //echo $arg_table;
            echo "<script type='text/javascript'>",
            "change_color('$arg_table');",
            "</script>";
        }
        //$show = true;
    }

    /** submit reservation */
    if(isset($_POST['save'])) {
        $res = $_POST['reserved'];
        //echo $res;
        $res = trim($res);
        if (empty($res)) {
            echo "empty";
        }
        //$res_date = $_POST['res_date'];
        //echo $res;
        #echo isset($_SESSION['user']);
        if (!empty($_SESSION['user'])) {
            $details = $_SESSION['user'];
            $user_id = $details['id'];
        } else {
            //echo "no user";
        }
        //$res_time = $_POST['time'];
        #echo $username;
        #echo var_dump($details);
        #print_r(explode(" ", $res));
        $arr_tables = explode(" ", $res);
        //$arr_tables = array_reverse($arr_tables);
        //$res_date = array_pop($arr_tables);
        //$res_time = array_pop($arr_tables);
        //echo var_dump($arr_tables); 
        
        $res_date = $_SESSION['set-date'];
        $res_time = $_SESSION['set-time'];
        //echo $res_date. " ";
        //echo $res_time;
        #echo count($arr_seats);

        if (!empty($_SESSION['user'])) {
            if (!empty($res) && $res != 'null') {
                for ($i = 0; $i < count($arr_tables); $i++) {
                    $table_id = $arr_tables[$i];
                    $sql = "SELECT * FROM users_reservations WHERE table_id = '$table_id' AND reserve_date='$res_date' AND reserve_time='$res_time' AND status=1";
                    $result = mysqli_query($conn, $sql);
                    //echo mysqli_num_rows($res);
                    //echo $user_id;
                    if(mysqli_num_rows($result) == 0) {
                        $sql = "INSERT INTO users_reservations (user_id, table_id, reserve_date, reserve_time, status) VALUES ('$user_id', '$table_id', '$res_date', '$res_time', 1)";
                        $result = mysqli_query($conn, $sql);

                        //echo mysqli_result($res);
                        if ($result) {
                            //echo "<p>successfully inserted</p>";
                            
                        } else {
                            $sql = "UPDATE users_reservations SET status=1 WHERE user_id='$user_id' AND table_id='$arr_tables[$i]' AND reserve_date='$res_date' AND reserve_time='$res_time' AND status=0 ";
                            $result = mysqli_query($conn, $sql);
                            //echo "<p>".$arr_tables[$i].": error</p>";
                        }
                        echo "<script type='text/javascript'>",
                            "window.alert('reservation successful');",
                            "reload_page();",
                            "</script>";
                    } else {
                        echo "seat unavailable";
                    }
                    //echo $arr_seats[$i];
                }
            } else {
                echo "<script type='text/javascript'>",
                    "window.alert('no table chosen');",
                    "</script>";
            }
        } else {
            echo "<script type='text/javascript'>",
                    "window.alert('please sign in to book a table');",
                    "</script>";
        }
        
    } else {}
?>