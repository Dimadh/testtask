<?php
require_once "setting.php";
try{
    $dbh = new PDO("mysql:host=$host; dbname=$data_base", $user_name, $password);
}
catch (PDOException $e){
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
session_start();
