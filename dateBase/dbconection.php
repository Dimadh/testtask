<?php
require_once "setting.php";
try {
    $dbh = new PDO("mysql:host=$host; dbname=$database", $username, $password);
}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
session_start();
