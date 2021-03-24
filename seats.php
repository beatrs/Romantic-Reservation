<?php
    session_start();
    include 'php/config.php';

    
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel='stylesheet' href='css/custom.css'>

   

</head>
<body>

    <form method='post' action=''>
    <div style="border:1px solid gray; width:130px;">
        <table>
            <tr>
                <td colspan="4"></td>
                <td align="right"> <div id="driver"></div> </td>
            </tr>
            <tr>
                <td><div class="seat"></div> </td>
                <td><div class="seat"></div></td>
                <td class="walk">  </td>
                <td><div class="seat"></div></td>
                <td><div class="seat"></div></td>
            </tr>
            <tr>
                <td><div class="seat"></div> </td>
                <td><div class="seat"></div></td>
                <td class="walk">  </td>
                <td><div class="seat"></div></td>
                <td><div class="seat"></div></td>
            </tr>
            <tr>
                <td><div class="seat"></div> </td>
                <td><div class="seat"></div></td>
                <td class="walk">  </td>
                <td><div class="seat"></div></td>
                <td><div class="seat"></div></td>
            </tr>
            <tr>
                <td><div class="seat"></div> </td>
                <td><div class="seat"></div></td>
                <td class="walk">  </td>
                <td><div class="seat"></div></td>
                <td><div class="seat"></div></td>
            </tr>
            <tr>
                <td><div class="seat"></div> </td>
                <td><div class="seat"></div></td>
                <td class="walk">  </td>
                <td><div class="seat"></div></td>
                <td><div class="seat"></div></td>
            </tr>
            <tr>
                <td><div class="seat"></div> </td>
                <td><div class="seat"></div></td>
                <td class="walk">  </td>
                <td><div class="seat"></div></td>
                <td><div class="seat"></div></td>
            </tr>
            <tr>
                <td><div class="seat"></div> </td>
                <td><div class="seat"></div></td>
                <td class="walk">  </td>
                <td><div class="seat"></div></td>
                <td><div class="seat"></div></td>
            </tr>
            <tr>
                <td><div class="seat"></div> </td>
                <td><div class="seat"></div></td>
                <td class="walk">  </td>
                <td><div class="seat"></div></td>
                <td><div class="seat"></div></td>
            </tr>
            <tr>
                <td><div class="seat" value='b1'></div> </td>
                <td><div class="seat" value='b2'></div></td>
                <td class="walk">  </td>
                <td><div class="seat" value='b3'></div></td>
                <td><div class="seat" value='b4'></div></td>
            </tr>
        </table>
    </div>
    <input type='text' id='seats' value='' name='reserved' style="display:none;">
    <input type='date' id='date' name='res_date' required>
    <button type="submit" id="save" name="save">Reserve seats</button>
    </form>
    


    <script src="js/main.js"></script>
</body>

<?php
    
    include 'php/reserve.php';
?>
</html>