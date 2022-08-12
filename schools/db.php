<?php
include '../db.class.php';

DB::$user = 'root';
DB::$password = '';
DB::$dbName = 'schoolerp';
DB::$host = 'localhost'; //defaults to localhost if omitted
DB::$port = '3306'; // defaults to 3306 if omitted
DB::$encoding = 'utf8'; // defaults to latin1 if omitted

?>