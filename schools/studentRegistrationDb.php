<?php
include 'db.php';

$studentid=$_POST['studentid'];
$studentname=$_POST['studentname'];
$fathername=$_POST['fathername'];
$fathernumber=$_POST['fathernumber'];
$mothername=$_POST['mothername'];
$mothernumber=$_POST['mothernumber'];
$bloodgroup=$_POST['bloodgroup'];
$class=$_POST['class'];
$section=$_POST['section'];

$mobileregex = "/^[6-9][0-9]{9}$/" ; 

$result=DB::query("SELECT * FROM studentdetails WHERE studentid=%s",$studentid);
if($result){
  echo "Student Id is already taken";
}
else if($studentid=="" || $studentname=="" || $fathername=="" || $fathernumber=="" || $mothername=="" || $mothernumber==""){
  echo "No Field Should be empty";
}
else{
  if(!preg_match($mobileregex, $fathernumber)){
      echo "Father mobile number is not valid<br>";
    }
    else{
      if(!preg_match($mobileregex, $mothernumber)){
          echo "Mother mobile number is not valid<br>";
        }
        else{
          DB::insert('studentdetails',['studentid'=>$studentid,'studentname'=>$studentname,'fathername'=>$fathername,'fathernumber'=>$fathernumber,'mothername'=>$mothername,'mothernumber'=>$mothernumber,'bloodgroup'=>$bloodgroup,'class'=>$class,'section'=>$section]);
          echo "inserted";
        }
    }
  }
?>