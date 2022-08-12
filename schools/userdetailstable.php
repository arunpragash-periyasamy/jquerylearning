<?php
include 'db.php';
$list=DB::query("SELECT * FROM userdetails");


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
            <th>User Id</th>
            <th>User Name</th>
            <th>Password</th>
            <th>User Type</th>
            <!-- <th>Action</th> -->
        </tr>
    <?php 
    foreach($list as $a){
        echo "<tr class='".$a['userid']."' ><td class='value'>".$a['userid']."</td>";
        echo "<td class='value'>".$a['username']."</td>";
        echo "<td class='value'>".$a['usertype']."</td>";
        echo "<td class='value'>".$a['password']."</td>";
        // echo "<td>"."<button class='btn'>Delete</button>"."</td>";
    }
    ?>
    </table>
    
    </body>
</html>