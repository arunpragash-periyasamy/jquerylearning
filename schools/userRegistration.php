<?php
include 'db.php';

$userid=$_POST['userid'];
$username=$_POST['username'];
$usertype=$_POST['usertype'];
$password=$_POST['password'];
$result=DB::query("SELECT * from userdetails WHERE userid=%s",$userid);
if($result){
    echo "user id is already taken please check it";
}
else{
    DB::insert('userdetails',['userid'=>$userid,'username'=>$username,'usertype'=>$usertype,'password'=>$password]);
    echo "Data inserted";
}
?>