<?php
    //! ADMIN VIEW OF ALL RESERVATIONS

    $now = date("Y-m-d");   
    $details = $_SESSION['user'];
    //$user_id = $details['id'];
    //$sql = "SELECT * FROM users_reservations WHERE user_id = '$user_id' AND reserve_date >= '$now' AND status=1";
    $sql = "SELECT id, first_name, last_name, contact_num, email, table_id, reserve_date, reserve_time
                FROM users
                RIGHT JOIN users_reservations
                ON id = user_id WHERE status=1";
    $res = mysqli_query($conn, $sql);
    #echo mysqli_num_rows($res);
    if (mysqli_num_rows($res) == 0) {
        echo "<div class='text-center'><h3>no reservations made yet</h3></div>";
    } else {
        echo "<table id='res-table'>";
        echo "<thead><tr>",
        "<th>First Name</th>",
        "<th>Last Name</th>",
        "<th>Contact #</th>",
        "<th>Email</th>",
        "<th>Table #</th>",
        "<th>Date</th>",
        "<th>Time</th>",
        //"<th>Edit</th>",
        "<th>Cancel</th>",
        "</tr></thead><tbody id='allRes-table'>";
        while($row = mysqli_fetch_array($res)) {
            $user_id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $contact_num = $row['contact_num'];
            $email = $row['email'];
            $table_id = $row['table_id'];
            $reserve_date = $row['reserve_date'];
            $reserve_time = $row['reserve_time'];
            $res_det = $user_id.",".$table_id.",".$reserve_date.",".$reserve_time;
            echo "<tr>";
            echo "<td>".$first_name . "</td>"; 
            echo "<td>".$last_name . "</td>"; 
            echo "<td>".$contact_num . "</td>"; 
            echo "<td>".$email . "</td>"; 
            echo "<td>".$table_id . "</td>"; 
            echo "<td>".$reserve_date . "</td>";
            echo "<td>".$reserve_time . "</td>";
            echo "<form method='post' action=''>";
            echo "<input type='text' style='display:none;' value='$res_det' name='reserve_det'>";
            //echo "<td><button type='submit' name='edit' value='' id='edit'>Edit</button></td>";
            echo "<td><button type='submit' name='cancel' value='' id='cancel' onclick='' style='background-color: #ed1d23; color: white;'>Cancel</button></td></tr>";
            echo "</form>";
        }
        echo "</tbody></table>";
    }
    
?>