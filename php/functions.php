<?php

    //see available tables
    if (isset($_POST['see'])) {
        /**get from db */
        $res_date = $_POST['res_date'];
        $res_time = $_POST['time'];
        $sql = "SELECT * FROM users_reservations WHERE reserve_date='$res_date' AND reserve_time='$res_time'";
        $res = mysqli_query($conn, $sql);
        $types = array();

        while(($row =  mysqli_fetch_assoc($res))) {
            $types[] = $row['table_id'];
        }
        //echo var_dump($types);
        for ($i = 0; $i < count($types); $i++) {
            $arg_table = $types[$i];
            echo $arg_table;
            echo "<script type='text/javascript'>",
            "change_color('$arg_table');",
            "</script>";
        }
    }

?>