<html> <!-- Jacob Quick Last Edit May 2 - 1:53 AM -->
<head>
    <title> Welcome </title>
    <link rel="stylesheet" href="style2.css" />
</head>
<?php
    //check user logged in
    if(!isset($_COOKIE["user_id"])||($_COOKIE["user_id"]<0)) {
        echo "<a href='index.html'>-return to directory-</a>";
        echo "Please login first!<br>\n";
        die;
    }
    $user_id=$_COOKIE["user_id"];
    
    require "dbconfig.php";
    $db_handler=mysql_connect($hostname,$username,$password) OR DIE ("<br>Unable to connect to database! Please try again later.\n");
    mysql_select_db($dbname);
    //query DB to get row count, this is the only way I could get count to work properly, couldn't get a cookie to work to pass the var.
    $query="select Products_quickja.*, Vendors.Name, Users.login, concat( Users.last_name,' ', Users.first_name) as UserName from Products_quickja left join Vendors on vendor_id = V_Id left join Users on user_id = Users.id";
    $result = mysql_query($query);
    $count=mysql_num_rows($result);
    //pull all data from chart on previous page
    for($i=0; $i < $count; $i++) {
        $id[$i] = $_POST['id'][$i];
        $description[$i] = $_POST['description'][$i];
        $cost[$i] = $_POST['cost'][$i];
        $sell_price[$i] = $_POST['sell_price'][$i];
        $quantity[$i] = $_POST['quantity'][$i];
        //update relevant rows
        $query="update Products_quickja set description = '$description[$i]', cost = '$cost[$i]', sell_price = '$sell_price[$i]', quantity = '$quantity[$i]' where id = '$id[$i]'";
        $result = mysql_query($query);
    }
    //close connection and send back to previous page when done
    mysql_free_result($result);
    mysql_close($db_handler);
    echo "Sucessfully ran update, returning to table.";
    header("Refresh:2;url=display_update.php");
    exit;  
?>