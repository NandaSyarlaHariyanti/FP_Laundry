<?php
// Connect ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'laundry';

$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$conn->query("SET FOREIGN_KEY_CHECKS=0;");

