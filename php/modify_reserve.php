<?php
    include 'config.php';
    /* $details = $_SESSION['user'];
    $user_id = $details['id']; */

    if (isset($_POST['cancel'])) {
        //$details = $_SESSION['user'];
        //echo var_dump($details);
        $res_det = $_POST['reserve_det'];
        $res_det = explode(",", $res_det);
        $user_id = $res_det[0];
        $table_id = $res_det[1];
        $res_date = $res_det[2];
        $res_time = $res_det[3];
        $sql = "UPDATE users_reservations SET status=0 WHERE user_id='$user_id' AND table_id='$table_id' AND reserve_date='$res_date' AND reserve_time='$res_time' AND status=1 ";
        $res = mysqli_query($conn, $sql);
        echo "successfully cancelled";
        header("location:../my_acc.php");
    } 
    /**get from db */
    //$sql = "UPDATE users_reservations SET status=0 WHERE user_id='$user_id' AND status=1";
    /* $sql = "SELECT * FROM users_reservations WHERE user_id='$user_id' ";
    $res = mysqli_query($conn, $sql);
    $types = array(); */

    /* while(($row =  mysqli_fetch_assoc($res))) {
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
?>