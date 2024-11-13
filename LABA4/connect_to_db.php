<?php

$host = 'localhost';
$db = 'plants_db';
$user = 'root';
$password = '';
$charset = 'utf8';


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_STRINGIFY_FETCHES => false,
    PDO::ATTR_EMULATE_PREPARES => false
];

$connect = new PDO($dsn, $user, $password, $options);


if (!$connect) {
    die('Error connect to Database');
}