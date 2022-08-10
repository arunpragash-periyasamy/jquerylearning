<?php 
// include 'db.class.php';

// DB::$user = 'root';
// DB::$password = '';
// DB::$dbName = 'infogreen';
// DB::$host = 'localhost'; //defaults to localhost if omitted
// DB::$port = '3306'; // defaults to 3306 if omitted
// DB::$encoding = 'utf8'; // defaults to latin1 if omitted

// DB::insert();
// DB::insert('infogreen',['username'=>'Arun','password'=>'Welcome']);


// multiple entries
// $rows=[];
// $rows[]=['username'=>'Nisanth','password'=>'Aswin'];
// $rows[]=['username'=>'Nelson','password'=>'Samuvel'];
// $rows[]=['username'=>'Nithish','password'=>'password'];
// DB::insert('infogreen',$rows);


// DB::queryFirstRows();
// $a=DB::queryFirstRow("SELECT * FROM infogreen WHERE username=%s",'Nelson');
// echo $a['username'];
// echo $a['password'];


// DB::queryFirstField();
// $a=DB::queryFirstField("SELECT * FROM infogreen WHERE username=%s",'Arun');
// echo $a; //8


// DB::queryFirstColumn
// $usernames=DB::queryFirstColumn("SELECT DISTINCT username FROM infogreen");
// foreach($usernames as $row){
//     echo $row."<br>";
// }


// DB::queryFirstLine();
// list($sno,$username,$password,$timestamp)=DB::queryFirstList("SELECT * FROM infogreen WHERE username =%s",'Nithish');
// echo $sno."<br>";
// echo $username."<br>";
// echo $password."<br>";
// echo $timestamp."<br>";


// DB::insert();
// DB::insert('infogreen',['username'=>'Dinesh','password'=>'Welcome']);
// $a=DB::insertId();
// echo $a;


// DB::insertIgnore();
// DB::insertIgnore('infogreen',['id'=>8,'username'=>'Arunpragash','password'=>'Hello']);


// DB::insertUpdate();
// DB::insertUpdate('infogreen',['id'=>5,'username'=>'Suresh','password'=>'Welcome']);


// DB::replace();
// DB::replace('infogreen',['username'=>'Arun','password'=>'Welcome']);


// DB::update('infogreen',['password'=>'sw2345'],"username=%s",'Nithish');
// DB::query("UPDATE infogreen SET password=%s WHERE username=%s",'de0003','Nelson');


// DB::delete();
// DB::delete('infogreen','username=%s','Suresh');
// DB::query("DELETE FROM infogreen WHERE username=%s",'Joe');


// counter for the affected fields
// $counter=DB::affectedRows();
// echo "$counter<br>";


// DB::startTransaction();
// DB::startTransaction();
// DB::UPDATE('infogreen',['password'=>'ra4443'],"username=%s",'Arun');
// $count=DB::affectedRows();
// if($count==3){
//     echo "Data Updated";
//     DB::commit();
// }
// else{
//     echo "Sorry Not Updated";
//     DB::rollback();
// }


// DB::$nested_transaction=true;
// DB::$nested_transactions=true;
// DB::startTransaction();
// $depth=DB::startTransaction();
// DB::UPDATE('infogreen',['password'=>'arr3445'],"username=%s",'Arun');
// $count=DB::affectedRows();
// echo "$depth";
// if($count<=3){
//     echo "Data Updated";
//     DB::commit();
// }
// DB::rollback(); //Data not updated


// WhereClause
// $where =new WhereClause('and');
// $where->add('username=%s','Arun');
// $where->add('password=%s','ra4443');
// $results=DB::query("SELECT * FROM infogreen WHERE %l",$where);
// $subclause=$where->addClause('or');
// $subclause->add('username','Nelson');
// foreach ($results as $row) {
//     echo "Serail Number: " . $row['id'] . "<br>";
//     echo "Name: " . $row['username'] . "<br>";
//     echo "password: " . $row['password'] . "<br>";
//     echo "time: " . $row['timestamp'] . "<br>";
//     echo "-------------<br>";
//   }


// SELECT query,DB::query();
// $a=DB::query("SELECT * FROM infogreen");
// foreach ($a as $row) {
//     echo "Serail Number: " . $row['id'] . "<br>";
//     echo "Name: " . $row['username'] . "<br>";
//     echo "password: " . $row['password'] . "<br>";
//     echo "time: " . $row['timestamp'] . "<br>";
//     echo "-------------<br>";
//   }
?>
<!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#but").click(function(){
                    value1=parseFloat($('#number1').val());
                    value2=parseFloat($('#number2').val());
                    add=value1+value2;
                    add=add.toFixed(2);
                    $(".ae").html(add);
                    if(add<12){
                    $("img").show();
                }
                else{
                    $("img").hide();
                }
                });
            });
        </script>
    </head>
    <body>
        <input id="number1" type="number" placeholder="Enter the number 1"/><br>
        <input id="number2" type="number" placeholder="Enter the number 2"/><br>
    <button type="" id="but" >Add</button>

    <center><img src="login-background.jpg" alt="">
    </body>
</html> -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            
    $(document).ready(function(){
        $(".button").click(function(){
            $.post("/database.php", $("#loginForm").serialize(), function(data) {

                $("#demo").html(data);
	 });
                });
            });
    
        </script>
    </head>
    <body>
        <form id="loginForm">
        Username
        <input id="username" type="text" placeholder="Username" name="username"/><br>
        Password
        <input id="pass" type="password" placeholder="Password" name="pass"/><br>
    <button type="button" id="but"  class="button">Login</button>
    </form>
    <p id="demo"></p>
    </body>
</html>
