<?php
session_start();
// database connection
include 'db.php';

// getting input from the login page
$userid=$_POST['userid'];
$password=$_POST['password'];

// checking the username and password
$account = DB::queryFirstRow("SELECT * FROM userdetails WHERE userid=%s AND password=%s", $userid,$password);
if($account){
    echo $account['usertype'];
    $_SESSION['user']=$account['usertype'];
}
else{
    echo "invalid user";
}

?>