<?php

$dsn = 'mysql:host=sql306.infinityfree.com;dbname=if0_41840821_dwd_unit3db';
$username = 'if0_41840821';
$password = 'YOUR_MYSQL_PASSWORD_HERE';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('errors/db_error_connect.php');
    exit();
}
?>