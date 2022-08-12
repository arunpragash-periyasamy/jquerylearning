<?php
include 'db.php';

$studentid=$_POST['studentid'];
$semester=$_POST['semester'];
$Mark1=$_POST['Mark1'];
$Mark2=$_POST['Mark2'];
$Mark3=$_POST['Mark3'];
$Mark4=$_POST['Mark4'];
$Mark5=$_POST['Mark5'];
$total=$_POST['total'];
$grade=$_POST['grade'];

if($studentid=="" || $semester=="" || $Mark1==""|| $Mark2=="" || $Mark3==""|| $Mark4=="" || $Mark5==""|| $total=="" || $grade==""){
    echo "No field should be empty";
}
else{
    DB::insert('studentmarkdetails',['studentid'=>$studentid,'semester'=>$semester,'Mark1'=>$Mark1,'Mark2'=>$Mark2,'Mark3'=>$Mark3,'Mark4'=>$Mark4,'Mark5'=>$Mark5,'total'=>$total,'grade'=>$grade]);
    echo $studentid." marks added";
}
?>