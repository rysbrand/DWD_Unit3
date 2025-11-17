<?php
//$host = 'localhost';
$dsn = 'mysql:host=localhost;dbname=dwd_unit3db';
$username = 'mgs_user';
$password = 'pa55word';
//$hash = password_hash($password, PASSWORD_DEFAULT);
$database = 'dwd_unit3db';

$db = new PDO($dsn, $username, $password);//, $database);

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