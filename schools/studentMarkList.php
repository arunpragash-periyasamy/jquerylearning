<?php
include 'db.php';

$marklist=DB::query("SELECT * FROM studentmarkdetails");

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
            <th>Semester</th>
            <th>Mark 1</th>
            <th>Mark 2</th>
            <th>Mark 3</th>
            <th>Mark 4</th>
            <th>Mark 5</th>
            <th>Total</th>
            <th>Grade</th>
            <!-- <th>Action</th> -->
        </tr>
    <?php 
    foreach($marklist as $a){
        echo "<tr class='".$a['studentid']."' ><td class='value'>".$a['studentid']."</td>";
        echo "<td class='value'>".$a['semester']."</td>";
        echo "<td class='value'>".$a['Mark1']."</td>";
        echo "<td class='value'>".$a['Mark2']."</td>";
        echo "<td class='value'>".$a['Mark3']."</td>";
        echo "<td class='value'>".$a['Mark4']."</td>";
        echo "<td class='value'>".$a['Mark5']."</td>";
        echo "<td class='value'>".$a['total']."</td>";
        echo "<td class='value'>".$a['grade']."</td>";
        // echo "<td>"."<button class='btn'>Delete</button>"."</td>";
    }
    ?>
    </table>
    
    </body>
</html>