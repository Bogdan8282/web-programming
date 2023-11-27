<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

require_once 'Model.php';
require_once __DIR__ . '/../models/User.php';

$materialsModel = new Model($pdo, 'materials');
$userModel = new User($pdo, 'users');
?>