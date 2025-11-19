<?php

$dsn = 'mysql:host=localhost;dbname=dwd_unit3db';
$username = 'mgs_user';
$password = 'pa55word';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error = $e->getMessage();
    include('view/error.php');
    exit();
}

// $error_message = $db->connect_error;
// if($error_message != null) {
//     include 'errors/db_error_connect.php';
//     exit;
// }

// function display_db_error($error_message) {
//     global $app_path;
//     include 'errors/db_error.php';
//     exit;
// }
?>