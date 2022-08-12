<?php
include 'db.php';
$list=DB::query("SELECT * FROM studentdetails");


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <style>
            table{
                border:1px solid;
            }
            td,th,th{
                padding:15px;
                border:2px solid;
            }
        </style>
    </head>
    <body>
    
<table id='mytable'>
        <tr>
            <th>Student Id</th>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Father Number</th>
            <th>Mother Name</th>
            <th>Mother Number</th>
            <th>Blood Group</th>
            <th>Class</th>
            <th>Section</th>
            <!-- <th>Action</th> -->
        </tr>
    <?php 
    foreach($list as $a){
        echo "<tr class='".$a['studentid']."' ><td class='value'>".$a['studentid']."</td>";
        echo "<td class='value'>".$a['studentname']."</td>";
        echo "<td class='value'>".$a['fathername']."</td>";
        echo "<td class='value'>".$a['fathernumber']."</td>";
        echo "<td class='value'>".$a['mothername']."</td>";
        echo "<td class='value'>".$a['mothernumber']."</td>";
        echo "<td class='value'>".$a['bloodgroup']."</td>";
        echo "<td class='value'>".$a['class']."</td>";
        echo "<td class='value'>".$a['section']."</td>";
        // echo "<td>"."<button class='btn'>Delete</button>"."</td>";
    }
    ?>
    </table>
    
    </body>
</html>