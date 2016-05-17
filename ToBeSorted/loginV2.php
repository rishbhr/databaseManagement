<html>
<head>
    <title> Welcome </title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <a href='index.html'>-return to directory-</a>
    ||
    <a href='logout.php'>-user logout-</a><br><br>
<?php
$user_id=0;
if(isset($_COOKIE["user_id"])||($_COOKIE["user_id"]>0)) {
        $user_id=$_COOKIE["user_id"];
    }

//passing variables from user input page
$keyword = str_replace(" ","+",$_POST["keywords"]);
$busername=$_POST['username'];
$bpassword=$_POST['password'];

require "dbconfig.php";

//kill program when fields are empty
if (empty($busername)) {
echo "Please enter your username. \n ";
echo "<br><br>";
echo "<a href='cps3740_p3.html'>-return-";
die;
}

if (empty($bpassword)) {
echo "Please enter your password. \n ";
echo "<br><br>";
echo "<a href='cps3740_p3.html'>-return-";
die;
}

if (empty($keyword)) {
echo "Please enter some keywords. \n ";
echo "<br><br>";
echo "<a href='cps3740_p3.html'>-return-";
die;
}

//check users ip, if user is not from kean kean program
if (!empty($_SERVER['HTTP_CLIENT_IP'])){$ip=$_SERVER['HTTP_CLIENT_IP'];}
elseif (!empty($_SERVER['HTTP_X_FORWARED_FOR'])){$ip=$_SERVER['HTTP_X_FORWARDED FOR'];}
else {$ip=$_SERVER['REMOTE_ADDR'];}

$IPv4 = explode(".",$ip);
if (($IPv4[0]==10) or ($IPv4[0] . "." . $IPv4[1] == "131.125"))
    {echo "Your IP address indicates that you are from Kean, welcome Kean user!\n";}
else
    {echo "Your IP address indicates that you are not from Kean, welcome guest!\n";}    
 
//establish connection to db    
$db_handler=mysql_connect($hostname,$username,$password) OR DIE ("<br>Unable to connect to database! Please try again later.\n");
mysql_select_db($dbname);

//pull information from db by the inputed username
$query = "SELECT id, login, password, role, last_name, first_name, address, zipcode, state FROM $table where login='$busername'";

$result = mysql_query($query);

//check if username and password match db
if($result){
    if (mysql_num_rows($result)>0){
        while($row = mysql_fetch_array($result)){
            $user_id = $row['id'];
            $login_id = $row['login'];
            $upassword = $row['password'];
            $role = $row['role'];
            $address = $row['address'];
            $zipcode = $row['zipcode'];
            $state = $row['state'];
            $last_name = $row['last_name'];
            $first_name = $row['first_name'];
        }
        if ($upassword==$bpassword) {
            display_welcome($user_id, $busername,$keyword,$ip,$address,$zipcode,$state,$last_name,$first_name,$role);
        }
        else {
            echo "<br>User $busername is in the databse, but the wrong password was entered.\n";
        }
    }
    else {
        echo "<br>User $busername is not in the database.\n";
    }
}
else {
        echo "<br>No results.\n";
}

//close db connection
mysql_free_result($result);
mysql_close($db_handler);

//function for displaying user info pulled from db
function display_welcome($user_id, $username,$keyword,$ip,$address,$zipcode,$state,$last_name,$first_name,$role) {
    setcookie("user_id", $user_id, time() + (86400 * 30), "/");
    echo"<br><br>Hello $first_name $last_name from IP: $ip";
    echo"<br><br>Our records show you are a $role.";
    echo"<br><br>Your address is $address $zipcode $state";
    echo "<br>";
    echo "<br><a href='add_product.php'>Add Product</a>";
    echo "<br><a href='view_product.php'>View Product</a>";
    echo "<br><br>";
    echo "<a href='http://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords=$keyword' target='blank'>Click here to see search results on Amazon.</a>";
}


?>
</html>